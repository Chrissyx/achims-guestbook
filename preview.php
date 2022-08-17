<?php
/*
 preview.php - preview modul

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

class CPreview extends CTools {

	function CPreview($emotion = "no") {
		$this->CTools($emotion);
	}
	
	
	function Show_Preview(&$newname, &$newmail, &$newicq, &$newaim, &$newyim, &$newmsn, &$newloc, &$newurl, &$newtext) {
		header ("Expires: Mon, 08 Jan 1990 01:00:00 GMT");
		header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
		
		if ($this->dateformat > 0) {
			$newdate = strftime("%m.%d.%Y %H:%M", time() + ($this->fixedtime * 3600));
		} else {
			$newdate = strftime("%d.%m.%Y %H:%M", time() + ($this->fixedtime * 3600));
		}
		
		#delete old temp files
		$handle = opendir("temp"); 
		while ($file = readdir ($handle)) { 
	    	if (preg_match("/temp(\d+).dat/", $file, $number)) {
	    		$time = filemtime("temp/".$file);
	    		if (($time + 3600) < time())
	    			unlink("temp/".$file); 
	       	}	    		  		
	    }
		closedir($handle);
				
		#tempfile for the preview data
		mt_srand((double)microtime() * 1000000);
		$random = mt_rand(0, 1000);
		while (file_exists("temp/temp".$random.".dat")) {
			$random = mt_rand(0, 1000);		
		}
		
		$output = fopen("temp/temp".$random.".dat", "w") or die ("Can't create temp".$random.".dat!");
		
		$newtext = str_replace("\r\n", "[BR]", $newtext);
		fputs($output, $newname."\r\n");
		fputs($output, $newmail."\r\n");
		fputs($output, $newicq."\r\n");
		fputs($output, $newaim."\r\n");
		fputs($output, $newyim."\r\n");
		fputs($output, $newmsn."\r\n");
		fputs($output, $newloc."\r\n");
		fputs($output, $newurl."\r\n");
		fputs($output, $newtext."\r\n");
		
		fclose($output);
		
		$this->newname = str_replace("&", "&amp;amp;", str_replace("\"", "&#34;", stripslashes($newname)));
		$this->newmail = str_replace("&", "&amp;amp;", str_replace("\"", "&#34;", stripslashes($newmail)));
		$this->newicq = str_replace("&", "&amp;amp;", str_replace("\"", "&#34;", stripslashes($newicq)));
		$this->newaim = str_replace("&", "&amp;amp;", str_replace("\"", "&#34;", stripslashes($newaim)));
		$this->newyim = str_replace("&", "&amp;amp;", str_replace("\"", "&#34;", stripslashes($newyim)));
		$this->newmsn = str_replace("&", "&amp;amp;", str_replace("\"", "&#34;", stripslashes($newmsn)));
		$this->newloc = str_replace("&", "&amp;amp;", str_replace("\"", "&#34;", stripslashes($newloc)));
		$this->newurl = str_replace("&", "&amp;amp;", str_replace("\"", "&#34;", stripslashes($newurl)));
		$this->newtext = str_replace("&", "&amp;amp;", str_replace("\"", "&#34;", stripslashes($newtext)));
		$this->newtext = eregi_replace("\[BR\]", "\r\n", $this->newtext);
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
		$newname = stripslashes($newname);
		$newmail = stripslashes($newmail);
		$newicq = stripslashes($newicq);
		$newaim = stripslashes($newaim);
		$newyim = stripslashes($newyim);
		$newmsn = stripslashes($newmsn);
		$newloc = stripslashes($newloc);
		$newurl = stripslashes($newurl);
		$newtext = stripslashes($newtext);
		
		#show preview
		if (!file_exists("preview.html.inc")) die ("Can't open preview.html.inc!");
		include("preview.html.inc");
	}

}