<?php
/*
 tools.php - tool modul

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

class CTools {

	var $newname;
	var $newmail;
	var $newicq;
	var $newaim;
	var $newyim;
	var $newmsn;
	var $newloc;
	var $newurl;
	var $newtext;
	var $indexsize;
	var $html_filter;
	var $word_filter;
	var $smileypics;
	var $maxsmileys;
	var $maxchars;
	var $mintext;
	var $maxtext;
	var $maxlines;
	var $maxpictures;
	var $floodwait;
	var $logip;
	var $messengers;
	var $shortmessengerformat;
	var $pictures;
	var $checkpic;
	var $shrinkimages;
	var $maxXsize;
	var $maxYsize;
	var $emotion;
	var $language;
	var $messages;
	var $adminmail;
	var $moderatormail;
	var $inputsize;
	var $textfieldsize;
	var $fixedtime;
	var $dateformat;
	var $datapath;
	var $showsmileys;
	var $showoptions;
	var $showhelp;
	var $shorthelpformat;
	var $showlocation;
	var $previewchecked;
  var $emotionchecked;
	

	function CTools($emotion = "no") {
		global $lang;
	
		if (!file_exists("config.php")) die ("Can't open config.php!");
		include("config.php");

		$this->indexsize = $indexsize;
		$this->html_filter = $html_filter;
		$this->word_filter = $word_filter;
		$this->smileypics = $smileypics;
		$this->maxsmileys = $maxsmileys;
		$this->maxchars = $maxchars;
		$this->mintext = $mintext;
		$this->maxtext = $maxtext;
		$this->maxlines = $maxlines;
		$this->maxpictures = $maxpictures;
		$this->floodwait = $floodwait;
		$this->logip = $logip;
		$this->messengers = $messengers;
		$this->shortmessengerformat = $shortmessengerformat;
		$this->pictures = $pictures;
		$this->checkpic = $checkpic;
		$this->shrinkimages = $shrinkimages;
		$this->maxXsize = $maxXsize;
		$this->maxYsize = $maxYsize;
		$this->showsmileys = $showsmileys;
		$this->showoptions = $showoptions;
		$this->showhelp = $showhelp;
		$this->shorthelpformat = $shorthelpformat;
		$this->showlocation = $showlocation;
    $this->previewchecked = $previewchecked;
    $this->emotionchecked = $emotionchecked;
    $this->emotion = $emotion;
		$this->language = $language;
		$this->adminmail = $adminmail;
		$this->moderatormail = $moderatormail;
		$this->passfornewentries = $passfornewentries;
		$this->fixedtime = ($fixedtime < -24) ? -24 : ($fixedtime > 24) ? 24 : $fixedtime;
		$this->dateformat = $dateformat;
		$this->datapath = $datapath;
		$this->login = $adminpass;

		if (!is_dir("temp")) mkdir("temp", 0777);

		if (!file_exists("language.php")) die ("Can't open language.php!");
		include("language.php");
		if (isset($lang)) $this->language = $language = $lang;
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


	function Browser_Detection() {
		if (strstr(getenv("HTTP_USER_AGENT"), "MSIE")) {
			$this->inputsize = 40;
	    	$this->textfieldsize = 50;
	    } else {
	    	$this->inputsize = 25;
	    	$this->textfieldsize = 30;
	    }
	}


	function Formular_Show($which = 0, $newname = "", $newmail = "", $newurl = "", $newicq = "", $newaim = "", $newyim = "", $newmsn = "", $newloc = "", $newtext = "") {
		global $GuestbookAdmin;
		
		$newname = stripslashes($newname);
		$newmail = stripslashes($newmail);
		$newurl = stripslashes($newurl);
		$newicq = stripslashes($newicq);
		$newaim = stripslashes($newaim);
		$newyim = stripslashes($newyim);
		$newmsn = stripslashes($newmsn);
		$newloc = stripslashes($newloc);
		$newtext = stripslashes($newtext);

		$this->Browser_Detection();

		if ($this->passfornewentries != 0 && md5($GuestbookAdmin) != $this->login) {
			$act = "new";
			header ("Location: admin/admin.php");
		} else {
			if (!file_exists("new.html.inc")) die ("Can't open new.html.inc!");
			include("new.html.inc");
		}
	}


	function Check_Empty() {
		if ($this->newname == "") {
			echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">";
			echo "<HTML><HEAD>";
			echo "<SCRIPT LANGUAGE=\"JavaScript\">function ShowError() {alert(\"".$this->messages[20]."\");}</SCRIPT>";
			echo "<LINK HREF=\"guestbook.css\" REL=\"stylesheet\" TYPE=\"text/css\">";
			echo "</HEAD><BODY ONLOAD=\"javascript:ShowError()\"></BODY></HTML>";
			$this->Formular_Show(1);
			exit();
		}
		elseif ($this->newmail != "" && !eregi("^([-.]?[0-9_a-z])([-.]?[0-9_a-z])*@[0-9_a-z]([-._]?[0-9_a-z])*\\.[a-z]{2,4}$", $this->newmail)) {
			echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">";
			echo "<HTML><HEAD>";
			echo "<SCRIPT LANGUAGE=\"JavaScript\">function ShowError() {alert(\"".$this->messages[21]."\");}</SCRIPT>";
			echo "<LINK HREF=\"guestbook.css\" REL=\"stylesheet\" TYPE=\"text/css\">";
			echo "</HEAD><BODY ONLOAD=\"javascript:ShowError()\"></BODY></HTML>";
			$this->Formular_Show(2);
			exit();
		}
		elseif ($this->newtext == "") {
			echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">";
			echo "<HTML><HEAD>";
			echo "<SCRIPT LANGUAGE=\"JavaScript\">function ShowError() {alert(\"".$this->messages[22]."\");}</SCRIPT>";
			echo "<LINK HREF=\"guestbook.css\" REL=\"stylesheet\" TYPE=\"text/css\">";
			echo "</HEAD><BODY ONLOAD=\"javascript:ShowError()\"></BODY></HTML>";
			$this->Formular_Show(3);
			exit();
		}
	}


	function Parse_HTML(&$formstring, $htmltag, $delete = false) {
		$i = $size = 0;
		$htmltag = strtolower($htmltag);
		$dummy = strtolower($formstring);
		while (is_integer($startpos1 = strpos($dummy, "[$htmltag", $i)) && $startpos1 >= 0) {
			$i = $startpos1 + 1;
			if (is_integer($startpos2 = strpos($dummy, "]", $startpos1)) && $startpos2 >= 0) {
				if (is_integer($endpos = strpos($dummy, "[/$htmltag]", $startpos2)) && $endpos >= 0 && $endpos > $startpos2) {
					$length = strlen($htmltag) + 1;
					if (!$delete) {
						switch (strtoupper($htmltag)) {
						case "PIC":
							$picture = trim(substr($formstring, $startpos2 + 1, $endpos - $startpos2 - 1));
							$formstring = substr_replace($formstring, "<IMG SRC=\"$picture\" BORDER=\"0\" ALIGN=\"middle\" HSPACE=\"5\">", $startpos1, $endpos - $startpos1);
							$endpos += 44;
							$formstring = substr_replace($formstring, "</IMG>", $endpos, $length + 2);
							if (--$this->maxpictures <= 0)
								break(2);
							else
								break;
						case "COLOR":
							$color = trim(substr($formstring, $startpos1 + $length, $startpos2 - $startpos1 - $length));
							$formstring = substr_replace($formstring, "<FONT COLOR=$color>", $startpos1, $startpos2 - $startpos1 + 1);
							$endpos += 5 - ($startpos2 - $startpos1 - strlen($color) - 7);
							$formstring = substr_replace($formstring, "</FONT>", $endpos, $length + 2);
							break;
						case "LINK":
							$url = trim(substr($formstring, $startpos1 + $length, $startpos2 - $startpos1 - $length));
							$formstring = substr_replace($formstring, "<A CLASS=\"normlink\" HREF=\"$url\" TARGET=\"_blank\">", $startpos1, $startpos2 - $startpos1 + 1);
							$endpos += 37 - ($startpos2 - $startpos1 - strlen($url) - 6);
							$formstring = substr_replace($formstring, "</A>", $endpos, $length + 2);
							break;
						case "MAIL":
							$mail = trim(substr($formstring, $startpos1 + $length, $startpos2 - $startpos1 - $length));
							$formstring = substr_replace($formstring, "<A CLASS=\"normlink\" HREF=\"mailto:$mail\" TARGET=\"_blank\">", $startpos1, $startpos2 - $startpos1 + 1);
							$endpos += 44 - ($startpos2 - $startpos1 - strlen($mail) - 6);
							$formstring = substr_replace($formstring, "</A>", $endpos, $length + 2);
							break;
						case "B":
							$formstring = substr_replace($formstring, "<B>", $startpos1, $startpos2 - $startpos1 + 1);
							$formstring = substr_replace($formstring, "</B>", $endpos, $length + 2);
							break;
						case "I":
							$formstring = substr_replace($formstring, "<I>", $startpos1, $startpos2 - $startpos1 + 1);
							$formstring = substr_replace($formstring, "</I>", $endpos, $length + 2);
							break;
						case "U":
							$formstring = substr_replace($formstring, "<U>", $startpos1, $startpos2 - $startpos1 + 1);
							$formstring = substr_replace($formstring, "</U>", $endpos, $length + 2);
							break;
						case "S1":
							$size = 1;
						case "S2":
							if ($size == 0) $size = 2;
						case "S3":
							if ($size == 0) $size = 3;
						case "S4":
							if ($size == 0) $size = 4;
						case "S5":
							if ($size == 0) $size = 5;
						case "S6":
							if ($size == 0) $size = 6;
							$formstring = substr_replace($formstring, "<FONT SIZE=\"$size\">", $startpos1, $startpos2 - $startpos1 + 1);
							$formstring = substr_replace($formstring, "</FONT>", $endpos + 11, $length + 2);
							break;
						}
					} else {
						$formstring = substr_replace($formstring, "", $startpos1, $startpos2 - $startpos1 + 1);
						$endpos -= ($startpos2 - $startpos1 + 1);
						$formstring = substr_replace($formstring, "", $endpos, $length + 2);
					}
				}
			}
			$dummy = strtolower($formstring);
		}
	}


	function Format_String(&$formstring, $what) {
		$formstring = trim($formstring);
		$formstring = strip_tags($formstring);

		if (strlen($formstring) > $dummy = (($this->maxtext > 16380) ? 16380 : $this->maxtext)) {
			$formstring = substr($formstring, 0, $dummy);
		}

		if ($this->language == "ger") {
			$dummy = array("ä"=>"&auml;", "Ä"=>"&Auml;", "ö"=>"&ouml;", "Ö"=>"&Ouml;", "ü"=>"&uuml;", "Ü"=>"&Uuml;", "ß"=>"&szlig;", "\""=>"&quot;");
		} else {
			$dummy = array("\""=>"&quot;");
		}
		$formstring = strtr($formstring, $dummy);

		#javascript protection
		$dummy = strtoupper($formstring);
		while (is_integer($first = strpos($dummy, "JAVASCRIPT:")) && $first >= 0) {
			$formstring = substr_replace($formstring, "", $first, 11);
			$dummy = strtoupper($formstring);			
		}
		while (is_integer($first = strpos($dummy, "TEXT/JAVASCRIPT")) && $first >= 0) {
			$formstring = substr_replace($formstring, "", $first, 15);
			$dummy = strtoupper($formstring);			
		}
		while (is_integer($first = strpos($dummy, "APPLICATION/X-JAVASCRIPT")) && $first >= 0) {
			$formstring = substr_replace($formstring, "", $first, 24);
			$dummy = strtoupper($formstring);			
		}
		
		# php protection
		$second = 0;
		while ((is_integer($first = strpos($dummy, "<?")) && $first >= 0) &&
					 (is_integer($second = strpos($dummy, "?>")) && $second >= 0)) {
			$formstring = substr_replace($formstring, "", $first, $second - $first);
			$dummy = strtoupper($formstring);			
		}
		while ((is_integer($first = strpos($dummy, "<%")) && $first >= 0) &&
					 (is_integer($second = strpos($dummy, "%>")) && $second >= 0)) {
			$formstring = substr_replace($formstring, "", $first, $second - $first);
			$dummy = strtoupper($formstring);			
		}
						
		#max smiley protection
		if (!file_exists("smileys.php")) die ("Can't open smileys.php!");
		include("smileys.php");

		$smileys = array_keys($smileylist);
		$countsmileys = 0;
		for ($i = 0; $i < count($smileys); $i++) {
			$countsmileys += substr_count($formstring, $smileys[$i]);
		}
		if ($countsmileys > $this->maxsmileys) {
			$dummy = strrev($formstring);
			for ($i = 0; $i < ($countsmileys - $this->maxsmileys); $i++) {
				$position = 20000;		//must be bigger than the maximum amount of chars
				$pos = $pos1 = $length = 0;
				for ($n = 0; $n < count($smileys); $n++) {
					if (is_integer($pos = strpos($dummy, strrev($smileys[$n]), $pos1)) && $pos >= 0 && $pos < $position) {
						$position = $pos;
						$length = strlen($smileys[$n]);
					}
				}
				$pos1 = $position;
				$dummy = substr_replace($dummy, "", $position, $length);
			}
			$formstring = strrev($dummy);
		}
		
		if ($what == "icq") {
			for ($i = 0; $i < strlen($formstring); $i++) {
				if (ord($formstring[$i]) < 48 || ord($formstring[$i]) > 57) {
					$formstring = "";
					break;
				}
			}
		}
		
		if ($what == "msn") {
			if (!eregi("^([-.]?[0-9_a-z])([-.]?[0-9_a-z])*@[0-9_a-z]([-._]?[0-9_a-z])*\\.[a-z]{2,4}$", $formstring)) $formstring = "";
		}

		if ($what == "text" && $this->html_filter == 0) {
			if ($this->pictures != 0) {
				#imagesize check
				if ($this->checkpic != 0) {
					$last = 0;
					$dummy = strtoupper($formstring);
					while ((is_integer($first = strpos($dummy, "[PIC]", $last)) && $first >= 0) && (--$this->maxpictures >= 0)) {
						$first += 5;
						if ((is_integer($last = strpos($dummy, "[/PIC]", $first)) && $last >= 0) && ($last > $first)) {
							$url = parse_url(trim(substr($formstring, $first, $last - $first)));
							if (!isset($url["port"])) $url["port"] = 80;
							if (!isset($url["scheme"])) $url["scheme"] = "http";
							elseif ($url["scheme"] != "http") {
								$url["host"] = $url["scheme"];
								$url["scheme"] = "http";
								$url["port"] = "";
							}
							if (!isset($url["host"])) {
								$url["host"] = $url["path"];
								$url["path"] = "";
							}

							$tobig = false;
							if ($input = fopen($url["scheme"]."://".$url["host"]/*.":".$url["port"]*/.$url["path"], "rb")) {
								$filename = substr($url["path"], strrpos($url["path"], "/") + 1);
								
								# hacking protection!!!
								if (strtolower(substr($filename, -3)) == "gif" ||
										strtolower(substr($filename, -3)) == "jpg" ||
										strtolower(substr($filename, -3)) == "png" ||
										strtolower(substr($filename, -3)) == "swf" ||
										strtolower(substr($filename, -3)) == "bmp") {								
									# ignore user aborts!
									ignore_user_abort(true);
									
									socket_set_timeout($input, 5, 0);
	
									$i = 0;
									$buffer = "";
									while (!feof($input)) {
										if ($i > 10) {
											$tobig = true;
											break;
										}
										$buffer .= fread($input, 32000);
										$i++;
									}
									fclose($input);
									
									# generate a random filename for more security
									list($usec, $sec) = explode(' ', microtime());
    							srand((float)$sec + ((float)$usec * 100000));
									
									$randomname = rand().".".strtolower(substr($filename, -3));
									
									# write the file and close it
									$output = fopen("temp/$randomname", "wb");
									fwrite($output, $buffer);
									fclose($output);
									
									$size = GetImageSize("temp/$randomname");
									
									unlink("temp/$randomname");
	
									$first -= 5;
									if ($size[0] <= $this->maxXsize && $size[1] <= $this->maxYsize) {
										$formstring = substr_replace($formstring, "<IMG SRC=\"".$url["scheme"]."://".$url["host"].":".$url["port"].$url["path"]."\" BORDER=\"0\" ALIGN=\"middle\" HSPACE=\"5\">", $first, $last - $first + 6);
									} else {
										#shrink the image
										if ($size[0] > $this->maxXsize && $size[1] > $this->maxYsize) {
											while ($size[0] > $this->maxXsize || $size[1] > $this->maxYsize) {
												if ($size[0] > $this->maxXsize) {
													$size[1] = intval(round(($this->maxXsize * $size[1]) / $size[0]));
													$size[0] = $this->maxXsize;
												} else {
													$size[0] = intval(round(($this->maxYsize * $size[0]) / $size[1]));
													$size[1] = $this->maxYsize;
												}
											}
											$formstring = substr_replace($formstring, "<IMG SRC=\"".$url["scheme"]."://".$url["host"].":".$url["port"].$url["path"]."\" BORDER=\"0\" ALIGN=\"middle\" HSPACE=\"5\" HEIGHT=\"".$size[1]."\" WIDTH=\"".$size[0]."\">", $first, $last - $first + 6);
										}
										elseif ($size[0] > $this->maxXsize) {
											$formstring = substr_replace($formstring, "<IMG SRC=\"".$url["scheme"]."://".$url["host"].":".$url["port"].$url["path"]."\" BORDER=\"0\" ALIGN=\"middle\" HSPACE=\"5\" WIDTH=\"".$this->maxXsize."\">", $first, $last - $first + 6);
										} else {
											$formstring = substr_replace($formstring, "<IMG SRC=\"".$url["scheme"]."://".$url["host"].":".$url["port"].$url["path"]."\" BORDER=\"0\" ALIGN=\"middle\" HSPACE\"=5\" HEIGHT=\"".$this->maxYsize."\">", $first, $last - $first + 6);
										}
									}
								}
							}
							if (!$input || $tobig) {
								$formstring = substr_replace($formstring, "", $first - 5, $last - $first + 11);
							}
						}
						$dummy = strtoupper($formstring);
					}
				} else {
					$this->Parse_HTML($formstring, "PIC");
				}
			} else {
				$this->Parse_HTML($formstring, "PIC", true);
			}

			#parse pseudo html commands and replace it with real html commands
			$formstring = eregi_replace("\[BR\]", "<BR>", $formstring);
			$formstring = eregi_replace("\[P\]", "<P>", $formstring);
			$this->Parse_HTML($formstring, "B");
			$this->Parse_HTML($formstring, "I");
			$this->Parse_HTML($formstring, "U");
			$this->Parse_HTML($formstring, "S1");
			$this->Parse_HTML($formstring, "S2");
			$this->Parse_HTML($formstring, "S3");
			$this->Parse_HTML($formstring, "S4");
			$this->Parse_HTML($formstring, "S5");
			$this->Parse_HTML($formstring, "S6");
			$this->Parse_HTML($formstring, "COLOR");
			$this->Parse_HTML($formstring, "LINK");
			$this->Parse_HTML($formstring, "MAIL");
		} else {
			#parse pseudo html commands and delete them
			$formstring = eregi_replace("\[BR\]", "", $formstring);
			$formstring = eregi_replace("\[P\]", "", $formstring);
			$this->Parse_HTML($formstring, "B", true);
			$this->Parse_HTML($formstring, "I", true);
			$this->Parse_HTML($formstring, "U", true);
			$this->Parse_HTML($formstring, "S1", true);
			$this->Parse_HTML($formstring, "S2", true);
			$this->Parse_HTML($formstring, "S3", true);
			$this->Parse_HTML($formstring, "S4", true);
			$this->Parse_HTML($formstring, "S5", true);
			$this->Parse_HTML($formstring, "S6", true);
			$this->Parse_HTML($formstring, "COLOR", true);
			$this->Parse_HTML($formstring, "LINK", true);
			$this->Parse_HTML($formstring, "MAIL", true);
			$this->Parse_HTML($formstring, "PIC", true);
		}

		#long line protection
		if ($what == "text") {
			if (!file_exists("smileys.php")) die ("Can't open smileys.php!");
			include("smileys.php");
	
			$smileys = array_keys($smileylist);			
			$picture = $link = -1;
			$dummy = str_replace("<", " <", $formstring);
			$dummy = str_replace(">", "> ", $dummy);
			$words = explode(" " , $dummy);
			$i = 0;
			foreach ($words as $word) {
				if (strcasecmp(substr($word, 0, 4), "<IMG") == 0) {
					$picture = $i;
				}
				elseif (strcasecmp(substr($word, 0, 2), "<A") == 0) {
					$link = $i;
				}
				$pos = $last = $negchars = 0;
				while (is_integer($pos = strpos($word, "&#", $last)) && $pos >= 0) {
					if (substr($word, $pos + 7, 1) == ";" && is_numeric(substr($word, $pos + 2, 5))) {
						$negchars += 7;
						$last = $pos + 8;
					}
					else if (substr($word, $pos + 6, 1) == ";" && is_numeric(substr($word, $pos + 2, 4))) {
						$negchars += 6;
						$last = $pos + 7;
					}
					else if (substr($word, $pos + 5, 1) == ";" && is_numeric(substr($word, $pos + 2, 3))) {
						$negchars += 5;
						$last = $pos + 6;
					}
					else {
						$last += 2;
					}
				}
				if ((strlen($word) - $negchars) > $this->maxchars) {
					if (($picture != -1) && ($i == $picture + 1)) {
						$picture = -1;
						continue;
					}
					if (($link != -1) && ($i == $link + 2)) {
						$link = -1;
						continue;
					}
					
					$chunkword = $word;
					$maxsize = 0;
					for ($n = 0; $n < count($smileys); $n++) {
						if (strlen($smileys[$n]) > $maxsize) {
							$maxsize = strlen($smileys[$n]);
						}
					}
					for ($n = 0; $n < intval(strlen($chunkword) / $this->maxchars); $n++) {
						$lastpos = strlen($chunkword) + 1;
						$lastsmiley = 0;
						$dummy = (($n + 1) * $this->maxchars) + ($n * 1);
						$last = $dummy - $maxsize;
					
						for ($k = 0; $k < count($smileys); $k++) {
							if (is_integer($pos = strpos($chunkword, str_replace("\(", "(", $smileys[$k]), $last)) && $pos >= 0) {
								if ($pos < $lastpos) {
									$lastpos = $pos;
									$lastsmiley = $k;
								}
							}
						}
						
						if ($dummy > $lastpos) {
							$chunkword = substr_replace($chunkword, " ", $dummy + ($lastpos + strlen(str_replace("\(", "(", $smileys[$lastsmiley])) - $dummy), 0);
						} else {
							$chunkword = substr_replace($chunkword, " ", $dummy, 0);
						}	
					}
					$formstring = str_replace($word, $chunkword, $formstring);
				}
				$i++;
			}
		}
		
		if ($this->word_filter != 0) {
			$input = fopen($this->datapath."/wordfilter.dat", "r") or die ("Can't open wordfilter.dat for reading!");

			while (!feof($input)) {
				$badwords[] = rtrim(fgets($input, 1024));
			}

			fclose($input);

			if (count($badwords) > 1) {
				for ($i = 0; $i < count($badwords) - 1; $i++) {
					$dummy = "";
					for ($n = 0; $n < strlen($badwords[$i]); $n++) $dummy .= "*";
					$formstring = eregi_replace($badwords[$i], $dummy, $formstring);
				}
			}
		}

		if ($this->emotion == "yes" || $this->smileypics != 0) {
			if (!file_exists("smileys.php")) die ("Can't open smileys.php!");
			include("smileys.php");

			reset($smileylist);

			while (list($key, $value) = each($smileylist)) {
				$formstring = eregi_replace($key, $value, $formstring);
			}
		}

		if ($what == "url") {
			if (strtolower(substr($formstring, 0, 7)) != "http://") $formstring = "http://"."$formstring";
			if (strtolower($formstring) == "http://") $formstring = "";
		}

		if ($what == "text") {
			$formstring = eregi_replace("<BR>\r\n", "<BR>", $formstring);
			$formstring = eregi_replace("<P>\r\n", "<P>", $formstring);
			$formstring = str_replace("\r\n", "<BR>", $formstring);

			#maxline protection
			$countlines = substr_count($formstring, "<BR>") + substr_count($formstring, "<P>");
			if ($countlines >= $this->maxlines) {
				$dummy = ereg_replace("<P>", "<BR>", $formstring);
				$countlines = $position = 0;
				while ($countlines < $this->maxlines) {
					$position = strpos($dummy, "<BR>", $position) + 4;
					$countlines++;
				}
				$formstring = substr($formstring, 0, $position - 4);
			}
		}
	}
}

?>