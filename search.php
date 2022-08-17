<?php
/*
 search.php - search modul

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

class CSearch {

	var $datapath;
	var $messages;
	var $datacount;
	var $entriesperpage;
	var $indexsize;
	var $phrase;
	
	function CSearch() {
		global $lang;
		
		if (!file_exists("config.php")) die ("Can't open config.php!");
		include("config.php");
		
		$this->datapath = $datapath;
		
		$this->datacount = filesize($this->datapath."/index.dat") / $indexsize;
		$this->entriesperpage = $entriesperpage;
		$this->indexsize = $indexsize;
		$this->phrase = $phrase;

		if (!file_exists("language.php")) die ("Can't open language.php!");
		include("language.php");
		if (isset($lang)) $language = $lang;
		switch ($language) {
			case "eng":
				$this->messages = $english;
				break;
			case "ger":
				$this->messages = $german;
				break;
			case "swe":
				$this->messages = $swedish;
				break;
			case "fre":
				$this->messages = $french;
				break;
			case "ita":
				$this->messages = $italian;
				break;
			case "por":
				$this->messages = $portuguese;
				break;
			case "dut":
				$this->messages = $dutch;
				break;
			case "spa":
				$this->messages = $spanish;
				break;
			case "rus":
				$this->messages = $russian;
				break;
			case "cze":
				$this->messages = $czech;
				break;
			case "fin":
				$this->messages = $finnish;
				break;
			case "chi":
				$this->messages = $chinese;
				break;
			case "dan":
				$this->messages = $danish;
				break;
			case "pol":
				$this->messages = $polish;
				break;
			case "ice":
				$this->messages = $icelandic;
				break;
			case "svk":
				$this->messages = $slovak;
				break;
			case "hug":
				$this->messages = $hungarian;
				break;
			default:
				$this->messages = $english;
				break;
		}
	}

	
	function SearchScreen(&$phrase, $page, $next) {
		if (!file_exists("search.html.inc")) die ("Can't open search.html.inc!");
		include("search.html.inc");
	}
	
	function Search(&$phrase, $page, $next) {
		global $lang;
		
		if ($this->datacount > 0) {
			$entrynumber = 0;
			if ($page < 1) $page = 1;
			$position = $this->datacount - ($page * $this->entriesperpage);

			$i = 0;
			while (file_exists($this->datapath."/index.lck")) {
				if ((filemtime($this->datapath."/index.lck") + 300) < time()) unlink($this->datapath."/index.lck");
				usleep(500000);
				$i++;
				if ($i > 9) die ("Index.dat is locked! Please try it later again!");
			}
			$lock = fopen($this->datapath."/index.lck", "w") or die ("Can't create index.lck!");
			fclose($lock);

			$i = 0;
			while (file_exists($this->datapath."/data.lck")) {
				if ((filemtime($this->datapath."/data.lck") + 300) < time())	unlink($this->datapath."/data.lck");
				usleep(500000);
				$i++;
				if ($i > 9) die ("Data.dat is locked! Please try it later again!");
			}
			$lock = fopen($this->datapath."/data.lck", "w") or die ("Can't create data.lck!");
			fclose($lock);

			$input1 = fopen($this->datapath."/index.dat", "r") or die ("Can't open index.dat for reading!");
			$input2 = fopen($this->datapath."/data.dat", "r") or die ("Can't open data.dat for reading!");

			while (($position >= 0 && $entrynumber > 0) || ($page >= 1 && $entrynumber == 0 && $this->datacount > 0)) {
				#get the data position from the index file
				fseek($input1, ($position * $this->indexsize), SEEK_SET);
				for ($i = 0; $i < $this->entriesperpage; $i++) {
					$datapos[] = (int)fgets($input1, $this->indexsize + 1);
				}

				#get the data
				$entrynumber = $this->datacount - (($page - 1) * $this->entriesperpage);
				if ($entrynumber > $this->entriesperpage) $entrynumber = $this->entriesperpage;
				for ($i = 0; $i < $entrynumber; $i++) {
					fseek($input2, $datapos[$i], SEEK_SET);
					$entry[] = strtolower(rtrim(stripslashes(substr(fgets($input2, 1024), 5)))).
							   strtolower(rtrim(stripslashes(substr(fgets($input2, 1024), 5)))).
							   strtolower(rtrim(stripslashes(substr(fgets($input2, 1024), 4)))).
							   strtolower(rtrim(stripslashes(substr(fgets($input2, 1024), 4)))).
							   strtolower(rtrim(stripslashes(substr(fgets($input2, 1024), 4)))).
							   strtolower(rtrim(stripslashes(substr(fgets($input2, 1024), 4)))).
							   strtolower(rtrim(stripslashes(substr(fgets($input2, 1024), 4)))).
							   strtolower(rtrim(stripslashes(substr(fgets($input2, 1024), 4)))).
							   strtolower(rtrim(stripslashes(substr(fgets($input2, 16384), 5)))).
							   strtolower(rtrim(stripslashes(substr(fgets($input2, 1024), 4))));
				}

				#find the search phrase
				$words = explode(" " , trim(strtolower($phrase)));
				$words = array_diff($words, array("", " "));
				$result = array();
				for ($i = $entrynumber - 1; $i >= 0; $i--) {
					$found = 0;
					foreach ($words as $word) {
						if (substr_count($entry[$i], $word) > 0) {
							$found++;
							if ($found >= count($words)) {
								$position = ($position < 0) ? 0 : $position;
								$result[] = ($position + $i + 1);
							}
						}
					}
				}
				
				if (count($result) > 0) {
					fclose($input2);
					unlink($this->datapath."/data.lck");
					fclose($input1);
					unlink($this->datapath."/index.lck");

					$phrase = str_replace("&", "%26", $phrase);
					$phrase = str_replace(";", "%3B", $phrase);
					$phrase = str_replace("#", "%23", $phrase);
					if (isset($lang)) header ("Location: guestbook.php?act=show&lang=".$lang."&phrase=".$phrase."&page=".$page."&entrypos=".implode(":", $result)."#searchresult");
					else header ("Location: guestbook.php?act=show&phrase=".$phrase."&page=".$page."&entrypos=".implode(":", $result)."#searchresult");
					exit();
				}

				#clean buffer
				unset($datapos);
				unset($entry);

				$position -= $entrynumber;
				if ($position < 0) $position = 0;
				$page++;
			}
			fclose($input2);
			unlink($this->datapath."/data.lck");
			fclose($input1);
			unlink($this->datapath."/index.lck");
		}
		if (!file_exists("notfound.html.inc")) die ("Can't open notfound.html.inc!");
		include("notfound.html.inc");
	}
	
}

?>
