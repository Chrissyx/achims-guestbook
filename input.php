<?php
/*
 input.php - input modul

 Copyright (C) 2001 Achim Winkler <achim@lkcc.org>

 This is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2, or (at your option)
 any later version.
 
 This software is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 
 You should have received a copy of the GNU General Public License
 along with this package; see the file COPYING.  If not, write to
 the Free Software Foundation, Inc., 59 Temple Place - Suite 330,
 Boston, MA 02111-1307, USA.  
*/

class CInput extends CTools {

	function CInput($emotion = "no") {
		$this->CTools($emotion);
	}
	

	function Flood_Check() {
		global $HTTP_SERVER_VARS;
		
		$i = 0;
		while (file_exists("temp/ip.lck")) {
			if ((filemtime("temp/ip.lck") + 300) < time()) unlink("temp/ip.lck");
			usleep(500000);
			$i++;
			if ($i > 9) die("ip.tmp is locked! Please try it later again!");
		}
		$lock = fopen("temp/ip.lck", "w") or die();
		fclose($lock);
		
		$write = true;
		if (!file_exists("temp/ip.log")) {
			# create a new ip datafile
			$logfile = fopen("temp/ip.log", "w") or die();
			
			fputs($logfile, rtrim($HTTP_SERVER_VARS['REMOTE_ADDR'])."\r\n");
			fputs($logfile, rtrim(time()));
			
			fclose($logfile);
		} else {
			$logfile = fopen("temp/ip.log", "r") or die();
		
			# read the ip data into an array
			$data = array();
			while (!feof($logfile)) {
	    	$ip = trim(fgets($logfile, 1024));
				$time = trim(fgets($logfile, 1024));
				
				# remove old ip's
				if ((time() - $this->floodwait) < $time) {
					$dummy = array("$ip" => "$time");
					$data = array_merge($data, $dummy);
				}
			}
			fclose($logfile);
	
			# is the actual ip in the list and not to old?
			$position = 0;
			while (list($ip, $time) = each($data)) {
	    	if ($HTTP_SERVER_VARS['REMOTE_ADDR'] == $ip && (time() - $this->floodwait) < $time) {
	    		$write = false;
	    		$dummy = array_slice($data, 0, $position);		# array_splice does not work!
	    		$data = array_slice($data, $position + 1);
	    		$data = array_merge($data, $dummy);	    		
	    	}
	    	$position++; 
			}
			
			# save the ip's into a file
			$logfile = fopen("temp/ip.log", "w") or die();
				
			reset($data);
			while (list($ip, $time) = each($data)) {
	    	fputs($logfile, rtrim($ip)."\r\n");
				fputs($logfile, rtrim($time)."\r\n");
			}
			# write the actual used ip too
			fputs($logfile, rtrim($HTTP_SERVER_VARS['REMOTE_ADDR'])."\r\n");
			fputs($logfile, rtrim(time()));
			
			fclose($logfile);
		}
		unlink("temp/ip.lck");
				
		if ($write) return(true);
		else return(false);
	}
	
	function IP_Check() {
		global $HTTP_SERVER_VARS;
		
		# read ip filter data into an array
		if (file_exists($this->datapath."/ipfilter.dat") && filesize($this->datapath."/ipfilter.dat") == 0) return(true);
		if (file_exists($this->datapath."/ipfilter.dat")) $ipfilter = file($this->datapath."/ipfilter.dat") or die ("Can't open ipfilter.dat for reading!");
		
		# ip filterfunction
		$different = false;
		while (list($linenumber, $ip) = each($ipfilter)) {
			$ip = trim($ip);
			$ip = explode(".", $ip);
			$remoteip = explode(".", $HTTP_SERVER_VARS['REMOTE_ADDR']);
			
			for ($i = 0; $i < count($ip); $i++) {
				$ip[$i] = str_pad($ip[$i], 3, "0", STR_PAD_LEFT);
				$remoteip[$i] = str_pad($remoteip[$i], 3, "0", STR_PAD_LEFT);
				
				// check for '*'
				if ($ip[$i] == '*') $ip[$i] = $remoteip[$i];
				
				// check for '?'
				while (is_integer($pos = strpos($ip[$i], '?')) && $pos >= 0) {
					$ip[$i] = substr_replace($ip[$i], " ", $pos, 1);
					$remoteip[$i] = substr_replace($remoteip[$i], " ", $pos, 1);	
				}
				
				// is the ip different in any case?
				if ($ip[$i] != $remoteip[$i]) $different = true;
			}
		}
		
		// should the ip filtered out?
		if (!$different) return(false);
		else return(true);
	}
	
	function Write_Data(&$newname, &$newmail, &$newicq, &$newaim, &$newyim, &$newmsn, &$newloc, &$newurl, &$newtext, &$random) {
		global $HTTP_SERVER_VARS, $lang; 
		
		if ($this->IP_Check() && $this->Flood_Check()) {
			if ($this->dateformat > 0) {
				$newdate = strftime("%m.%d.%Y %H:%M", time() + ($this->fixedtime * 3600));
			} else {
				$newdate = strftime("%d.%m.%Y %H:%M", time() + ($this->fixedtime * 3600));
			}
						
			#tempfile available? (preview)
			if ($random != -1) {
				if (file_exists("temp/temp".$random.".dat")) {
					$input = fopen("temp/temp".$random.".dat", "r");
					
					$newname = rtrim(fgets($input, 1024));
					$newmail = rtrim(fgets($input, 1024));
					$newicq = rtrim(fgets($input, 1024));
					$newaim = rtrim(fgets($input, 1024));
					$newyim = rtrim(fgets($input, 1024));
					$newmsn = rtrim(fgets($input, 1024));
					$newloc = rtrim(fgets($input, 1024));
					$newurl = rtrim(fgets($input, 1024));
					$newtext = rtrim(fgets($input, 16384));
										
					fclose($input);
					unlink("temp/temp".$random.".dat");
				} else {
					if (isset($lang)) header ("Location: guestbook.php?act=show&lang=$lang");
					else header ("Location: guestbook.php?act=show");
					exit(0);	
				}
			}
			
			#mintext protection
			if (strlen($newtext) <= $this->mintext) {
				if (isset($lang)) header ("Location: guestbook.php?act=show&lang=$lang");
				else header ("Location: guestbook.php?act=show");
				exit(0);			
			}
			
			$this->newname = $newname;
			$this->newmail = $newmail;
			$this->newicq = $newicq;
			$this->newaim = $newaim;
			$this->newyim = $newyim;
			$this->newmsn = $newmsn;
			$this->newloc = $newloc;
			$this->newurl = $newurl;
			$this->newtext = $newtext;
			$this->Check_Empty();
			
			$this->Format_String($newname, "name");
			$this->Format_String($newmail, "mail");
			$this->Format_String($newicq, "icq");
			$this->Format_String($newaim, "aim");
			$this->Format_String($newyim, "yim");
			$this->Format_String($newmsn, "msn");
			$this->Format_String($newloc, "loc");
			$this->Format_String($newurl, "url");
			$this->Format_String($newtext, "text");
			
			#write data
			$i = 0;
			while (file_exists($this->datapath."/data.lck")) {
				if ((filemtime($this->datapath."/data.lck") + 300) < time())	unlink($this->datapath."/data.lck");
				usleep(500000);
				$i++;
				if ($i > 9) die ("Data.dat is locked! Please try it later again!");
			}
			$lock = fopen($this->datapath."/data.lck", "w") or die ("Can't create data.lck!");
			fclose($lock);
			
			$output = fopen($this->datapath."/data.dat", "a") or die ("The file data.dat is write protected!");
					
			$i = 0;
			while (file_exists($this->datapath."/index.lck")) {
				if ((filemtime($this->datapath."/index.lck") + 300) < time())	unlink($this->datapath."/index.lck");
				usleep(500000);
				$i++;
				if ($i > 9) die ("Index.dat is locked! Please try it later again!");
			}
			$lock = fopen($this->datapath."/index.lck", "w") or die ("Can't create index.lck!");
			fclose($lock);
			
			$output1 = fopen($this->datapath."/index.dat", "a") or die ("The file index.dat is write protected!");
					
			fseek($output, 0, SEEK_END);		#fix for windows?!?!
			$position = (string)ftell($output);
			fputs($output, rtrim("name=".$newname)."\r\n");
			fputs($output, rtrim("mail=".$newmail)."\r\n");
			fputs($output, rtrim("icq=".$newicq)."\r\n");
			fputs($output, rtrim("aim=".$newaim)."\r\n");
			fputs($output, rtrim("yim=".$newyim)."\r\n");
			fputs($output, rtrim("msn=".$newmsn)."\r\n");
			fputs($output, rtrim("loc=".$newloc)."\r\n");
			fputs($output, rtrim("url=".$newurl)."\r\n");
			fputs($output, rtrim("text=".$newtext)."\r\n");
			fputs($output, rtrim("date=".$newdate)."\r\n");
			if ($this->logip != 0) {
				fputs($output, rtrim("ip=".$HTTP_SERVER_VARS['REMOTE_ADDR'])."\r\n");
			} else {
				fputs($output, rtrim("ip=")."\r\n");
			}
					
			for ($i = strlen($position); $i < $this->indexsize; $i++)
				$dummy .= "0";
			$position = $dummy.$position;
			fputs($output1, $position);
					
			fclose($output);
			unlink($this->datapath."/data.lck");
			fclose($output1);
			unlink($this->datapath."/index.lck");
			
			$entrynum = (filesize($this->datapath."/index.dat") / $this->indexsize);
			$uri = substr($HTTP_SERVER_VARS['REQUEST_URI'], 0, strrpos($HTTP_SERVER_VARS['REQUEST_URI'], '/'));
			
			if ($this->adminmail != "") {
				mail("$this->adminmail", "New entry in your guestbook!", "name = $newname\nmail = $newmail\nicq = $newicq\naim = $newaim\nyim = $newyim\nmsn = $newmsn\nlocation = $newloc\nurl = $newurl\ntext = $newtext\ndate = $newdate\nip = ".$HTTP_SERVER_VARS['REMOTE_ADDR']."\nedit entry: http://".$HTTP_SERVER_VARS['SERVER_NAME'].":".$HTTP_SERVER_VARS['SERVER_PORT']."$uri/admin/admin.php?act=changeentry&entry=$entrynum&page=1\ndelete entry: http://".$HTTP_SERVER_VARS['SERVER_NAME'].":".$HTTP_SERVER_VARS['SERVER_PORT']."$uri/admin/admin.php?act=deleteentry&entry=$entrynum&page=1\n\nYour guestbook!");
			}
			if ($this->moderatormail != "") {
				mail("$this->moderatormail", "New entry in your guestbook!", "name = $newname\nmail = $newmail\nicq = $newicq\naim = $newaim\nyim = $newyim\nmsn = $newmsn\nlocation = $newloc\nurl = $newurl\ntext = $newtext\ndate = $newdate\nip = ".$HTTP_SERVER_VARS['REMOTE_ADDR']."\nedit entry: http://".$HTTP_SERVER_VARS['SERVER_NAME'].":".$HTTP_SERVER_VARS['SERVER_PORT']."$uri/admin/admin.php?act=changeentry&entry=$entrynum&page=1\ndelete entry: http://".$HTTP_SERVER_VARS['SERVER_NAME'].":".$HTTP_SERVER_VARS['SERVER_PORT']."$uri/admin/admin.php?act=deleteentry&entry=$entrynum&page=1\n\nYour guestbook!");
			}
		} else {
			#tempfile available? (preview)
			if ($random != -1) {
				if (file_exists("temp/temp".$random.".dat")) {
					# delete the tempfile
					unlink("temp/temp".$random.".dat");
				}
			}		
		}
	}
	
}
?>