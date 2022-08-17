<?php
/*
 admin.php - administration modul

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

	global $HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_COOKIE_VARS;

	ob_start();

	error_reporting(0);

	if (!file_exists("../config.php")) die ("Can't open config.php!");
	include("../config.php");

	$i = 0;
	while (file_exists("../".$datapath."/data.lck") || file_exists("../".$datapath."/index.lck")) {
		if ((filemtime("../".$datapath."/data.lck") + 300) < time())	unlink("../".$datapath."/data.lck");
		if ((filemtime("../".$datapath."/index.lck") + 300) < time())	unlink("../".$datapath."/index.lck");
		usleep(500000);
		$i++;
		if ($i > 19) die ("User activities in progress! Please wait a little bit and try it again!");
	}

	if (!ignore_user_abort()) ignore_user_abort(true);

	if (isset($HTTP_GET_VARS['act'])) $act = $HTTP_GET_VARS['act'];
	if (isset($HTTP_POST_VARS['act'])) $act = $HTTP_POST_VARS['act'];
	if (isset($HTTP_POST_VARS['login'])) $login = $HTTP_POST_VARS['login'];
	if (isset($HTTP_POST_VARS['store'])) $store = $HTTP_POST_VARS['store'];
	if (isset($HTTP_COOKIE_VARS['GuestbookAdmin'])) $GuestbookAdmin = $HTTP_COOKIE_VARS['GuestbookAdmin'];
	if (isset($HTTP_GET_VARS['entry'])) $entry = $HTTP_GET_VARS['entry'];
	if (isset($HTTP_POST_VARS['entry'])) $entry = $HTTP_POST_VARS['entry'];
	if (isset($HTTP_GET_VARS['page'])) $page = $HTTP_GET_VARS['page'];
	if (isset($HTTP_POST_VARS['page'])) $page = $HTTP_POST_VARS['page'];
	if (isset($HTTP_POST_VARS['warning'])) $warning = $HTTP_POST_VARS['warning'];
	if (isset($HTTP_GET_VARS['lang'])) $lang = $HTTP_GET_VARS['lang'];
	if (isset($HTTP_POST_VARS['emotion'])) $emotion = $HTTP_POST_VARS['emotion'];
	if (isset($HTTP_POST_VARS['newname'])) $newname = $HTTP_POST_VARS['newname'];
	if (isset($HTTP_POST_VARS['newmail'])) $newmail = $HTTP_POST_VARS['newmail'];
	if (isset($HTTP_POST_VARS['newurl'])) $newurl = $HTTP_POST_VARS['newurl'];
	if (isset($HTTP_POST_VARS['newicq'])) $newicq = $HTTP_POST_VARS['newicq'];
	if (isset($HTTP_POST_VARS['newaim'])) $newaim = $HTTP_POST_VARS['newaim'];
	if (isset($HTTP_POST_VARS['newyim'])) $newyim = $HTTP_POST_VARS['newyim'];
	if (isset($HTTP_POST_VARS['newmsn'])) $newmsn = $HTTP_POST_VARS['newmsn'];
	if (isset($HTTP_POST_VARS['newloc'])) $newloc = $HTTP_POST_VARS['newloc'];
	if (isset($HTTP_POST_VARS['newdate'])) $newdate = $HTTP_POST_VARS['newdate'];
	if (isset($HTTP_POST_VARS['newip'])) $newip = $HTTP_POST_VARS['newip'];
	if (isset($HTTP_POST_VARS['newtext'])) $newtext = $HTTP_POST_VARS['newtext'];
	if (isset($HTTP_POST_VARS['do'])) $do = $HTTP_POST_VARS['do'];
	if (isset($HTTP_POST_VARS['datapos'])) $datapos = $HTTP_POST_VARS['datapos'];
	if (isset($HTTP_POST_VARS['signature'])) $signature = $HTTP_POST_VARS['signature'];
	if (isset($HTTP_POST_VARS['first'])) $first = $HTTP_POST_VARS['first'];
	if (isset($HTTP_POST_VARS['last'])) $last = $HTTP_POST_VARS['last'];
	if (isset($HTTP_POST_VARS['wordfilter'])) $wordfilter = $HTTP_POST_VARS['wordfilter'];
	if (isset($HTTP_POST_VARS['ipfilter'])) $ipfilter = $HTTP_POST_VARS['ipfilter'];
	if (isset($HTTP_POST_VARS['ignorefilter'])) $ignorefilter = $HTTP_POST_VARS['ignorefilter'];
	if (isset($HTTP_POST_VARS['newindex'])) $newindex = $HTTP_POST_VARS['newindex'];
	if (isset($HTTP_POST_VARS['pname'])) $pname = $HTTP_POST_VARS['pname'];
	if (isset($HTTP_POST_VARS['pmail'])) $newmail = $HTTP_POST_VARS['pmail'];
	if (isset($HTTP_POST_VARS['purl'])) $purl = $HTTP_POST_VARS['purl'];
	if (isset($HTTP_POST_VARS['picq'])) $picq = $HTTP_POST_VARS['picq'];
	if (isset($HTTP_POST_VARS['paim'])) $paim = $HTTP_POST_VARS['paim'];
	if (isset($HTTP_POST_VARS['pyim'])) $pyim = $HTTP_POST_VARS['pyim'];
	if (isset($HTTP_POST_VARS['pmsn'])) $pmsn = $HTTP_POST_VARS['pmsn'];
	if (isset($HTTP_POST_VARS['ploc'])) $ploc = $HTTP_POST_VARS['ploc'];
	if (isset($HTTP_POST_VARS['pdate'])) $pdate = $HTTP_POST_VARS['pdate'];
	if (isset($HTTP_POST_VARS['pip'])) $pip = $HTTP_POST_VARS['pip'];
	if (isset($HTTP_POST_VARS['ptext'])) $ptext = $HTTP_POST_VARS['ptext'];
	if (isset($HTTP_POST_VARS['term'])) $term = $HTTP_POST_VARS['term'];
	if (isset($HTTP_POST_VARS['filename'])) $filename = $HTTP_POST_VARS['filename'];
	# config variables
	if (isset($HTTP_POST_VARS['_language'])) $_language = $HTTP_POST_VARS['_language'];
	if (isset($HTTP_POST_VARS['_indexsize'])) $_indexsize = $HTTP_POST_VARS['_indexsize'];
	if (isset($HTTP_POST_VARS['_pageindex'])) $_pageindex = $HTTP_POST_VARS['_pageindex'];
	if (isset($HTTP_POST_VARS['_entriesperpage'])) $_entriesperpage = $HTTP_POST_VARS['_entriesperpage'];
	if (isset($HTTP_POST_VARS['_html_filter'])) $_html_filter = $HTTP_POST_VARS['_html_filter'];
	if (isset($HTTP_POST_VARS['_word_filter'])) $_word_filter = $HTTP_POST_VARS['_word_filter'];
	if (isset($HTTP_POST_VARS['_smileypics'])) $_smileypics = $HTTP_POST_VARS['_smileypics'];
	if (isset($HTTP_POST_VARS['_limitshownsmileylist'])) $_limitshownsmileylist = $HTTP_POST_VARS['_limitshownsmileylist'];
	if (isset($HTTP_POST_VARS['_maxsmileys'])) $_maxsmileys = $HTTP_POST_VARS['_maxsmileys'];
	if (isset($HTTP_POST_VARS['_maxchars'])) $_maxchars = $HTTP_POST_VARS['_maxchars'];
	if (isset($HTTP_POST_VARS['_maxtext'])) $_maxtext = $HTTP_POST_VARS['_maxtext'];
	if (isset($HTTP_POST_VARS['_mintext'])) $_mintext = $HTTP_POST_VARS['_mintext'];
	if (isset($HTTP_POST_VARS['_maxlines'])) $_maxlines = $HTTP_POST_VARS['_maxlines'];
	if (isset($HTTP_POST_VARS['_maxpictures'])) $_maxpictures = $HTTP_POST_VARS['_maxpictures'];
	if (isset($HTTP_POST_VARS['_floodwait'])) $_floodwait = $HTTP_POST_VARS['_floodwait'];
	if (isset($HTTP_POST_VARS['_logip'])) $_logip = $HTTP_POST_VARS['_logip'];
	if (isset($HTTP_POST_VARS['_messengers'])) $_messengers = $HTTP_POST_VARS['_messengers'];
	if (isset($HTTP_POST_VARS['_shortmessengerformat'])) $_shortmessengerformat = $HTTP_POST_VARS['_shortmessengerformat'];
	if (isset($HTTP_POST_VARS['_pictures'])) $_pictures = $HTTP_POST_VARS['_pictures'];
	if (isset($HTTP_POST_VARS['_checkpic'])) $_checkpic = $HTTP_POST_VARS['_checkpic'];
	if (isset($HTTP_POST_VARS['_shrinkimages'])) $_shrinkimages = $HTTP_POST_VARS['_shrinkimages'];
	if (isset($HTTP_POST_VARS['_maxXsize'])) $_maxXsize = $HTTP_POST_VARS['_maxXsize'];
	if (isset($HTTP_POST_VARS['_maxYsize'])) $_maxYsize = $HTTP_POST_VARS['_maxYsize'];
	if (isset($HTTP_POST_VARS['_showsmileys'])) $_showsmileys = $HTTP_POST_VARS['_showsmileys'];
	if (isset($HTTP_POST_VARS['_showoptions'])) $_showoptions = $HTTP_POST_VARS['_showoptions'];
	if (isset($HTTP_POST_VARS['_showhelp'])) $_showhelp = $HTTP_POST_VARS['_showhelp'];
	if (isset($HTTP_POST_VARS['_shorthelpformat'])) $_shorthelpformat = $HTTP_POST_VARS['_shorthelpformat'];
	if (isset($HTTP_POST_VARS['_showlocation'])) $_showlocation = $HTTP_POST_VARS['_showlocation'];
	if (isset($HTTP_POST_VARS['_previewchecked'])) $_previewchecked = $HTTP_POST_VARS['_previewchecked'];
	if (isset($HTTP_POST_VARS['_emotionchecked'])) $_emotionchecked = $HTTP_POST_VARS['_emotionchecked'];
	if (isset($HTTP_POST_VARS['_newdateonedit'])) $_newdateonedit = $HTTP_POST_VARS['_newdateonedit'];
	if (isset($HTTP_POST_VARS['_fixedtime'])) $_fixedtime = $HTTP_POST_VARS['_fixedtime'];
	if (isset($HTTP_POST_VARS['_dateformat'])) $_dateformat = $HTTP_POST_VARS['_dateformat'];
	if (isset($HTTP_POST_VARS['_adminpass'])) $_adminpass = $HTTP_POST_VARS['_adminpass'];
	if (isset($HTTP_POST_VARS['_moderatorpass'])) $_moderatorpass = $HTTP_POST_VARS['_moderatorpass'];
	if (isset($HTTP_POST_VARS['_adminmail'])) $_adminmail = $HTTP_POST_VARS['_adminmail'];
	if (isset($HTTP_POST_VARS['_moderatormail'])) $_moderatormail = $HTTP_POST_VARS['_moderatormail'];
	if (isset($HTTP_POST_VARS['_passfornewentries'])) $_passfornewentries = $HTTP_POST_VARS['_passfornewentries'];
	if (isset($HTTP_POST_VARS['_cookielifetime'])) $_cookielifetime = $HTTP_POST_VARS['_cookielifetime'];
	if (isset($HTTP_POST_VARS['_datapath'])) $_datapath = $HTTP_POST_VARS['_datapath'];

	if ((!isset($GuestbookAdmin) || md5($GuestbookAdmin) != $adminpass) && isset($login)) {
		if (md5($login) == $adminpass && isset($store)) {
			if (isset($GuestbookModerator) && md5($GuestbookModerator) == $moderatorpass) {
				$cookielifetime = 0;
			} else {
				$cookielifetime = ($cookielifetime > 31536000) ? 31536000 : $cookielifetime;
			}
			setcookie("GuestbookAdmin", $login, time() + $cookielifetime, "/");
		}
	} else {
		if (isset($GuestbookAdmin) && md5($GuestbookAdmin) == $adminpass)
			$login = $GuestbookAdmin;

	}
	if (md5($login) != $adminpass && (!isset($GuestbookModerator) || md5($GuestbookModerator) != $moderatorpass) && isset($login)) {
		if (md5($login) == $moderatorpass && isset($store)) {
			$cookielifetime = ($cookielifetime > 31536000) ? 31536000 : $cookielifetime;
			setcookie("GuestbookModerator", $login, time() + $cookielifetime, "/");
		}
	} else {
		if (md5($login) != $adminpass && isset($GuestbookModerator) && md5($GuestbookModerator) == $moderatorpass)
			$login = $GuestbookModerator;
	}

	function Unlock() {
		global $datapath;
		if (file_exists("../".$datapath."/lock.lck")) unlink("../".$datapath."/lock.lck");
	}

	register_shutdown_function("Unlock");

	if (!file_exists("../".$datapath."/lock.lck")) {
		$lock = fopen("../".$datapath."/lock.lck", "w") or die ("Can't create lock.lck!");
		fclose($lock);
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


	function Format_String(&$formstring, $emotion, $what) {
		$formstring = trim($formstring);

		if ($what == "text") {
			#parse pseudo html commands and replace it with real html commands
			$formstring = eregi_replace("\[BR\]", "<BR>", $formstring);
			$formstring = eregi_replace("\[P\]", "<P>", $formstring);

			if ($emotion == "yes") {
				if (!file_exists("../smileys.php")) die ("Can't open smileys.php!");
				include("../smileys.php");

				reset($smileylist);

				while (list($key, $value) = each($smileylist)) {
					$formstring = eregi_replace($key, $value, $formstring);
				}
			}

			Parse_HTML($formstring, "B");
			Parse_HTML($formstring, "I");
			Parse_HTML($formstring, "U");
			Parse_HTML($formstring, "S1");
			Parse_HTML($formstring, "S2");
			Parse_HTML($formstring, "S3");
			Parse_HTML($formstring, "S4");
			Parse_HTML($formstring, "S5");
			Parse_HTML($formstring, "S6");
			Parse_HTML($formstring, "COLOR");
			Parse_HTML($formstring, "LINK");
			Parse_HTML($formstring, "MAIL");
			Parse_HTML($formstring, "PIC");

			$formstring = eregi_replace("<BR>\r\n", "<BR>", $formstring);
			$formstring = eregi_replace("<P>\r\n", "<P>", $formstring);
			$formstring = ereg_replace("\r\n", "<BR>", $formstring);
		}

		if ($what == "url") {
			if (strtolower(substr($formstring, 0, 7)) != "http://") $formstring = "http://"."$formstring";
			if (strtolower($formstring) == "http://") $formstring = "";
		}
	}


	function Format_String1(&$formstring) {
		if (!file_exists("../smileys.php")) die ("Can't open smileys.php!");
		include("../smileys.php");

		reset($smileylist);

		while (list($key, $value) = each($smileylist)) {
			$formstring = eregi_replace($value, stripslashes($key), $formstring);
		}
		$formstring = str_replace("&", "&amp;", $formstring);
	}


	function Browser_Detection(&$inputsize, &$inputsize1, &$textfieldsize) {
		if (strstr(getenv("HTTP_USER_AGENT"), "MSIE")) {
			$inputsize = 15;
			$inputsize1 = 40;
	    	$textfieldsize = 50;
	    } else {
	    	$inputsize = 10;
	    	$inputsize1 = 25;
	    	$textfieldsize = 35;
	    }
	}


	function Show_Menu(&$login) {
		if (!file_exists("menu.html.inc")) die ("Can't open menu.html.inc!");
		include("menu.html.inc");

		Unlock();
	}

	$inputsize = $inputsize1 = $textfieldsize = 0;
	Browser_Detection($inputsize, $inputsize1, $textfieldsize);

	if (!isset($login)) {
		if (!file_exists("login.html.inc")) die ("Can't open login.html.inc!");
		include("login.html.inc");
	}
	elseif (md5($login) == $adminpass || md5($login) == $moderatorpass) {
		if (!isset($act)) {
			Show_Menu($login);
		}	elseif ($act == "new") {
			Unlock();
			if (isset($lang)) header ("Location: ../guestbook.php?act=new&lang=$lang");
			else header ("Location: ../guestbook.php?act=new");
		}
		elseif ($act == "changeentry") {
			if (!isset($entry)) {
				if (!file_exists("changeentry_a.html.inc")) die ("Can't open changeentry_a.html.inc!");
				include("changeentry_a.html.inc");
			}
			elseif (isset($entry) && !isset($do)) {
				$datacount = filesize("../".$datapath."/index.dat") / $indexsize;
				if (--$entry < 0 || $entry > $datacount) {
					Show_Menu($login);
					echo "<P><BR><BR><CENTER>The entry is out of range!</CENTER>";
					exit();
				}

				$input = fopen("../".$datapath."/index.dat", "r") or die ("Can't open index.dat for reading!");

				fseek($input, ($entry * $indexsize), SEEK_SET);
				$datapos = (int)fgets($input, $indexsize + 1);

				fclose($input);

				$input = fopen("../".$datapath."/data.dat", "r") or die ("Can't open data.dat for reading!");

				fseek($input, $datapos, SEEK_SET);
				$name = rtrim(stripslashes(substr(fgets($input, 1024), 5)));
				$mail = rtrim(stripslashes(substr(fgets($input, 1024), 5)));
				$icq = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$aim = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$yim = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$msn = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$loc = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$url = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$text = rtrim(stripslashes(substr(fgets($input, 16384), 5)));
				$date = rtrim(stripslashes(substr(fgets($input, 1024), 5)));
				$ip = rtrim(stripslashes(substr(fgets($input, 1024), 3)));
				$text .= "<BR>--------------------<BR>";
				$text = ereg_replace("<BR>", "\r\n", $text);

				fclose($input);

				Format_String1($name);
				Format_String1($mail);
				Format_String1($icq);
				Format_String1($aim);
				Format_String1($yim);
				Format_String1($msn);
				Format_String1($loc);
				Format_String1($url);
				Format_String1($text);

				if (!file_exists("changeentry_b.html.inc")) die ("Can't open changeentry_b.html.inc!");
				include("changeentry_b.html.inc");
			}
			elseif (isset($entry) && $do == "write") {
				if ($newdateonedit != 0) {
					$fixedtime = ($fixedtime < -24) ? -24 : ($fixedtime > 24) ? 24 : $fixedtime;
					if ($dateformat > 0) {
						$newdate = strftime("%m.%d.%Y %H:%M", time() + ($fixedtime * 3600));
					} else {
						$newdate = strftime("%d.%m.%Y %H:%M", time() + ($fixedtime * 3600));
					}
				}

				#read signature file
				if (file_exists("../signature.adm") && md5($login) == $adminpass && $signature == true) {
					$input = fopen("../signature.adm", "r");
					while ($input && !feof($input)) {
						$buffer = trim(fgets($input, 1024));
						$newtext .= $buffer;
					}
					fclose($input);
				}
				elseif (file_exists("../signature.mod") && md5($login) == $moderatorpass && $signature == true) {
					$input = fopen("../signature.mod", "r");
					while ($input && !feof($input)) {
						$buffer = trim(fgets($input, 1024));
						$newtext .= $buffer;
					}
					fclose($input);
				}

				Format_String($newname, $emotion, "name");
				Format_String($newmail, $emotion, "mail");
				Format_String($newicq, $emotion, "icq");
				Format_String($newaim, $emotion, "aim");
				Format_String($newyim, $emotion, "yim");
				Format_String($newmsn, $emotion, "msn");
				Format_String($newloc, $emotion, "loc");
				Format_String($newurl, $emotion, "url");
				Format_String($newtext, $emotion, "text");

				$output = fopen("../".$datapath."/data.dat", "a") or die ("The file data.dat is write protected!");

				$output1 = fopen("../".$datapath."/index.dat", "r+") or die ("The file index.dat is write protected!");

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
				fputs($output, rtrim("ip=".$newip)."\r\n");

				for ($i = strlen($position); $i < $indexsize; $i++)
					$dummy .= "0";
				$position = $dummy.$position;
				fseek($output1, ($entry * $indexsize), SEEK_SET);
				fputs($output1, $position, $indexsize);

				fclose($output);
				fclose($output1);

				if (isset($page) && $page != "") {
					Unlock();
					if (isset($lang)) header ("Location: ../guestbook.php?act=show&page=$page&lang=$lang");
					else header ("Location: ../guestbook.php?act=show&amp;page=$page");
				} else {
					Show_Menu($login);
				}
			}
		}
		elseif ($act == "deleteentry") {
			if (!isset($entry)) {
				if (!file_exists("deleteentry.html.inc")) die ("Can't open deleteentry.html.inc!");
				include("deleteentry.html.inc");
			}
			elseif (isset($page) && !isset($warning)) {
				if (!file_exists("warning.html.inc")) die ("Can't open warning.html.inc!");
				include("warning.html.inc");
			}
			elseif (isset($page) && !$warning) {
				if (isset($lang)) header ("Location: ../guestbook.php?act=show&page=$page&lang=$lang");
				else header ("Location: ../guestbook.php?act=show&amp;page=$page");
			} else {
				$input = fopen("../".$datapath."/index.dat", "r+") or die ("The file index.dat is write protected!");

				$datacount = filesize("../".$datapath."/index.dat") / $indexsize;
				if (($entry - 1) < 0 || ($entry - 1) > $datacount) {
					Show_Menu($login);
					echo "<P><BR><BR><CENTER>The entry is out of range!</CENTER>";
					exit();
				}

				$position = $entry * $indexsize;

				if ($datacount == $entry) {
					fseek($input, $position - $indexsize);
				} else {
					for ($i = 0; $i < $datacount - $entry; $i++) {
						fseek($input, $position + ($i * $indexsize));
						$buffer = fgets($input, $indexsize + 1);
						fseek($input, $position + (($i - 1) * $indexsize));
						fputs($input, $buffer, $indexsize);
					}
				}

				ftruncate($input, ftell($input));

				fclose($input);

				if (isset($page)) {
					Unlock();
					if (isset($lang)) header ("Location: ../guestbook.php?act=show&page=$page&lang=$lang");
					else header ("Location: ../guestbook.php?act=show&amp;page=$page");
				} else {
					Show_Menu($login);
				}
			}
		}
		elseif ($act == "deleterange") {
			if (!isset($first) || !isset($last)) {
				if (!file_exists("deleterange.html.inc")) die ("Can't open deleterange.html.inc!");
				include("deleterange.html.inc");
			} else {
				$input = fopen("../".$datapath."/index.dat", "r+") or die ("The file index.dat is write protected!");

				$datacount = filesize("../".$datapath."/index.dat") / $indexsize;
				if (($first - 1) < 0 || ($last - 1) > $datacount || $first > $last) {
					Show_Menu($login);
					echo "<P><BR><BR><CENTER>The values are out of range!</CENTER>";
					exit();
				}

				$position_first = $first * $indexsize;
				$position_last = $last * $indexsize;

				if ($datacount == $last) {
					fseek($input, $position_first - $indexsize);
				} else {
					for ($i = 0; $i < $datacount - $first - ($last - $first); $i++) {
						fseek($input, $position_last + ($i * $indexsize));
						$buffer = fgets($input, $indexsize + 1);
						fseek($input, $position_first + (($i - 1) * $indexsize));
						fputs($input, $buffer, $indexsize);
					}
				}

				ftruncate($input, ftell($input));

				fclose($input);

				Show_Menu($login);
			}
		}
		elseif ($act == "editwordfilter") {
			if (!isset($do)) {
				$input = fopen("../".$datapath."/wordfilter.dat", "r") or die ("Can't open wordfilter.dat for reading!");

				$filter = "";
				while (!feof($input)) {
					$filter .= trim(fgets($input, 1024))." ";
				}

				fclose($input);

				if (!file_exists("editwordfilter.html.inc")) die ("Can't open editwordfilter.html.inc!");
				include("editwordfilter.html.inc");
			} else {
				$filter = explode(" ", trim($wordfilter));

				$output = fopen("../".$datapath."/wordfilter.dat", "w") or die ("Can't open wordfilter.dat for writing!");

				for ($i = 0; $i < count($filter); $i++) {
					if ($filter[$i] != "")
						fputs($output, rtrim($filter[$i])."\r\n");
				}

				fclose($output);

				Show_Menu($login);
			}
		}
		elseif ($act == "editipfilter") {
			if (!isset($do)) {
				$input = fopen("../".$datapath."/ipfilter.dat", "r") or die ("Can't open ipfilter.dat for reading!");

				$filter = "";
				while (!feof($input)) {
					$filter .= trim(fgets($input, 1024))." ";
				}

				fclose($input);

				if (!file_exists("editipfilter.html.inc")) die ("Can't open editipfilter.html.inc!");
				include("editipfilter.html.inc");
			} else {
				$filter = explode(" ", trim($ipfilter));

				$output = fopen("../".$datapath."/ipfilter.dat", "w") or die ("Can't open ipfilter.dat for writing!");

				for ($i = 0; $i < count($filter); $i++) {
					if ($filter[$i] != "")
						fputs($output, rtrim($filter[$i])."\r\n");
				}

				fclose($output);

				Show_Menu($login);
			}
		}
		elseif ($act == "editignorefilter") {
				if (!isset($do)) {
					$input = fopen("../".$datapath."/ignorefilter.dat", "r") or die ("Can't open ignorefilter.dat for reading!");

					$filter = "";
					while (!feof($input)) {
						$filter .= trim(fgets($input, 1024))."\r\n";
					}
					trim($filter);

					fclose($input);

					if (!file_exists("editignorefilter.html.inc")) die ("Can't open editignorefilter.html.inc!");
					include("editignorefilter.html.inc");
				} else {
					$filter = explode("\n", trim($ignorefilter));
					
					$output = fopen("../".$datapath."/ignorefilter.dat", "w") or die ("Can't open ignorefilter.dat for writing!");

					for ($i = 0; $i < count($filter); $i++) {
						if ($filter[$i] != "")
							fputs($output, trim($filter[$i])."\r\n");
					}

					fclose($output);

					Show_Menu($login);
				}
		}
		elseif ($act == "changeconfig" && md5($login) == $adminpass) {
			if (!isset($do)) {
				if (!file_exists("changeconfig.html.inc")) die ("Can't open changeconfig.html.inc!");
				include("changeconfig.html.inc");
			} else {
				$output = fopen("../config.php", "w") or die ("Can't open config.php for writing!");

				if (strlen($_language) != 3) $_language = "eng";
				if ($_indexsize == "") $_indexsize = 8;
				if ($_entriesperpage == "") $_entriesperpage = 10;
				if ($_pageindex == "") $_pageindex = 5;
				if ($_html_filter == "") $_html_filter = 0;
				if ($_word_filter == "") $_word_filter = 1;
				if ($_smileypics == "") $_smileypics = 0;
				if ($_limitshownsmileylist == "") $_limitshownsmileylist = 20;
				if ($_maxsmileys == "") $_maxsmileys = 50;
				if ($_maxchars == "") $_maxchars = 50;
				if ($_maxtext == "") $_maxtext = 1000;
				if ($_mintext == "") $_mintext = 2;
				if ($_maxlines == "") $_maxlines = 20;
				if ($_maxpictures == "") $_maxpictures = 1;
				if ($_floodwait == "") $_floodwait = 120;
				if ($_logip == "") $_logip = 0;
				if ($_messengers == "") $_messengers = 1;
				if ($_shortmessengerformat == "") $_shortmessengerformat = 0;
				if ($_pictures == "") $_pictures = 1;
				if ($_checkpic == "") $_checkpic = 1;
				if ($_shrinkimages == "") $_shrinkimages = 1;
				if ($_maxXsize == "") $_maxXsize = 200;
				if ($_maxYsize == "") $_maxYsize = 100;
				if ($_showsmileys == "") $_showsmileys = 1;
				if ($_showoptions == "") $_showoptions = 1;
				if ($_showhelp == "") $_showhelp = 0;
				if ($_shorthelpformat == "") $_shorthelpformat = 1;
				if ($_showlocation == "") $_showlocation = 1;
				if ($_previewchecked == "") $_previewchecked = 1;
				if ($_emotionchecked == "") $_emotionchecked = 1;
				if ($_newdateonedit == "") $_newdateonedit = 1;
				if ($_fixedtime == "") $_fixedtime = 0;
				if ($_dateformat == "") $_dateformat = 0;
				if ($_adminpass == "") $_adminpass = "admin";
				if ($_passfornewentries == "") $_passfornewentries = 0;
				if ($_cookielifetime == "") $_cookielifetime = 31536000;
				if ($_datapath == "") $_datapath = "data";

				fputs($output, rtrim("<?php")."\r\n");
				fputs($output, rtrim("\t\$language = \"$_language\";")."\r\n");
				fputs($output, rtrim("\t\$indexsize = $_indexsize;")."\r\n");
				fputs($output, rtrim("\t\$entriesperpage = $_entriesperpage;")."\r\n");
				fputs($output, rtrim("\t\$pageindex = $_pageindex;")."\r\n");
				fputs($output, rtrim("\t\$html_filter = $_html_filter;")."\r\n");
				fputs($output, rtrim("\t\$word_filter = $_word_filter;")."\r\n");
				fputs($output, rtrim("\t\$smileypics = $_smileypics;")."\r\n");
				fputs($output, rtrim("\t\$limitshownsmileylist = $_limitshownsmileylist;")."\r\n");
				fputs($output, rtrim("\t\$maxsmileys = $_maxsmileys;")."\r\n");
				fputs($output, rtrim("\t\$maxchars = $_maxchars;")."\r\n");
				fputs($output, rtrim("\t\$maxtext = $_maxtext;")."\r\n");
				fputs($output, rtrim("\t\$mintext = $_mintext;")."\r\n");
				fputs($output, rtrim("\t\$maxlines = $_maxlines;")."\r\n");
				fputs($output, rtrim("\t\$maxpictures = $_maxpictures;")."\r\n");
				fputs($output, rtrim("\t\$floodwait = $_floodwait;")."\r\n");
				fputs($output, rtrim("\t\$logip = $_logip;")."\r\n");
				fputs($output, rtrim("\t\$messengers = $_messengers;")."\r\n");
				fputs($output, rtrim("\t\$shortmessengerformat = $_shortmessengerformat;")."\r\n");
				fputs($output, rtrim("\t\$pictures = $_pictures;")."\r\n");
				fputs($output, rtrim("\t\$checkpic = $_checkpic;")."\r\n");
				fputs($output, rtrim("\t\$shrinkimages = $_shrinkimages;")."\r\n");
				fputs($output, rtrim("\t\$maxXsize = $_maxXsize;")."\r\n");
				fputs($output, rtrim("\t\$maxYsize = $_maxYsize;")."\r\n");
				fputs($output, rtrim("\t\$showsmileys = $_showsmileys;")."\r\n");
				fputs($output, rtrim("\t\$showoptions = $_showoptions;")."\r\n");
				fputs($output, rtrim("\t\$showhelp = $_showhelp;")."\r\n");
				fputs($output, rtrim("\t\$shorthelpformat = $_shorthelpformat;")."\r\n");
				fputs($output, rtrim("\t\$showlocation = $_showlocation;")."\r\n");
				fputs($output, rtrim("\t\$previewchecked = $_previewchecked;")."\r\n");
				fputs($output, rtrim("\t\$emotionchecked = $_emotionchecked;")."\r\n");
				fputs($output, rtrim("\t\$newdateonedit = $_newdateonedit;")."\r\n");
				fputs($output, rtrim("\t\$fixedtime = $_fixedtime;")."\r\n");
				fputs($output, rtrim("\t\$dateformat = $_dateformat;")."\r\n");
				fputs($output, rtrim("\t\$adminpass = \"".md5($_adminpass)."\";")."\r\n");
				if ($_moderatorpass != "") {
					if ($_moderatorpass != $moderatorpass) {
						fputs($output, rtrim("\t\$moderatorpass = \"".md5($_moderatorpass)."\";")."\r\n");
					} else {
						fputs($output, rtrim("\t\$moderatorpass = \"".$moderatorpass."\";")."\r\n");
					}
				} else {
					fputs($output, rtrim("\t\$moderatorpass = \"\";")."\r\n");
				}
				fputs($output, rtrim("\t\$adminmail = \"$_adminmail\";")."\r\n");
				fputs($output, rtrim("\t\$moderatormail = \"$_moderatormail\";")."\r\n");
				fputs($output, rtrim("\t\$passfornewentries = \"$_passfornewentries\";")."\r\n");
				fputs($output, rtrim("\t\$cookielifetime = $_cookielifetime;")."\r\n");
				fputs($output, rtrim("\t\$datapath = \"$_datapath\";")."\r\n");
				fputs($output, rtrim("?>")."\r\n");

				fclose($output);

				Show_Menu($login);
			}
		}
		elseif ($act == "changeconfig" && md5($login) != $adminpass) {
			Show_Menu($login);
			exit();
		}
		elseif ($act == "newdatabase" && md5($login) == $adminpass) {
			if (!isset($do)) {
				if (!file_exists("newdatabase.html.inc")) die ("Can't open newdatabase.html.inc!");
				include("newdatabase.html.inc");
			} else {
				set_time_limit(300);

				$input = fopen("../".$datapath."/index.dat", "r+") or die ("Can't open index.dat for reading!");

				$input1 = fopen("../".$datapath."/data.dat", "r+") or die ("Can't open data.dat for reading!");

				mt_srand((double)microtime() * 1000000);
				$random = mt_rand(0, 1000);
				while (file_exists("../temp/temp".$random.".dat")) {
					$random = mt_rand(0, 1000);
				}
				while (file_exists("../temp/temp".$random1.".dat")) {
					$random1 = mt_rand(0, 1000);
				}

				$output = fopen("../temp/temp".$random.".dat", "w") or die ("Can't create temp".$random.".dat!");

				$output1 = fopen("../temp/temp".$random1.".dat", "w") or die ("Can't create temp".$random1.".dat!");

				$datacount = filesize("../".$datapath."/index.dat") / $indexsize;

				for ($i = 0; $i < $datacount; $i++) {
					$position = (string)ftell($output1);
					$dummy = "";
					for ($n = strlen($position); $n < $indexsize; $n++)
						$dummy .= "0";
					$position = $dummy.$position;
					fputs($output, $position);

					$datapos = (int)fgets($input, $indexsize + 1);
					fseek($input1, $datapos, SEEK_SET);
					$name = fgets($input1, 1024);
					$mail = fgets($input1, 1024);
					$icq = fgets($input1, 1024);
					$aim = fgets($input1, 1024);
					$yim = fgets($input1, 1024);
					$msn = fgets($input1, 1024);
					$loc = fgets($input1, 1024);
					$url = fgets($input1, 1024);
					$text = fgets($input1, 16384);
					$date = fgets($input1, 1024);
					$ip = fgets($input1, 1024);
					fputs($output1, rtrim($name)."\r\n");
					fputs($output1, rtrim($mail)."\r\n");
					fputs($output1, rtrim($icq)."\r\n");
					fputs($output1, rtrim($aim)."\r\n");
					fputs($output1, rtrim($yim)."\r\n");
					fputs($output1, rtrim($msn)."\r\n");
					fputs($output1, rtrim($loc)."\r\n");
					fputs($output1, rtrim($url)."\r\n");
					fputs($output1, rtrim($text)."\r\n");
					fputs($output1, rtrim($date)."\r\n");
					fputs($output1, rtrim($ip)."\r\n");
				}

				fclose($input);
				fclose($input1);

				unlink("../".$datapath."/index.dat");
				unlink("../".$datapath."/data.dat");

				fclose($output);
				fclose($output1);

				rename("../temp/temp".$random.".dat", "../".$datapath."/index.dat");
				rename("../temp/temp".$random1.".dat", "../".$datapath."/data.dat");

				Show_Menu($login);
			}
		}
		elseif ($act == "newdatabase" && md5($login) != $adminpass) {
			Show_Menu($login);
			exit();
		}
		elseif ($act == "resizeindex" && md5($login) == $adminpass) {
			if (!isset($newindex)) {
				if (!file_exists("resizeindex.html.inc")) die ("Can't open resizeindex.html.inc!");
				include("resizeindex.html.inc");
			} else {
				$writeconfig = false;
				set_time_limit(300);
				$random = mt_rand(0, 1000);

				$input = fopen("../".$datapath."/index.dat", "r") or die ("Can't open index.dat!");

				$datacount = filesize("../".$datapath."/index.dat") / $indexsize;

				if ($indexsize < $newindex) {
					while (file_exists("../temp/temp".$random.".dat")) {
						$random = mt_rand(0, 1000);
					}
					$output = fopen("../temp/temp".$random.".dat", "w") or die ("Can't open temp".$random.".dat!");

					for ($i = 0; $i < $datacount; $i++) {
						$position = (int)fgets($input, $indexsize + 1);

						$dummy = "";
						for ($n = strlen($position); $n < $newindex; $n++)
							$dummy .= "0";
						$position = $dummy.$position;
						fputs($output, $position);
					}

					fclose($output);
					fclose($input);

					unlink("../".$datapath."/index.dat");
					rename("../temp/temp".$random.".dat", "../".$datapath."/index.dat");

					$writeconfig = true;
				}
				elseif ($indexsize > $newindex && $newindex > 3) {
					while (file_exists("../temp/temp".$random.".dat")) {
						$random = mt_rand(0, 1000);
					}
					$output = fopen("../temp/temp".$random.".dat", "w") or die ("Can't open temp".$random.".dat!");

					fseek($input, filesize("../".$datapath."/index.dat") - $indexsize, SEEK_SET);
					$position = (int)fgets($input, $indexsize + 1);

					if (strlen($position) <= $newindex) {
						fseek($input, 0, SEEK_SET);

						for ($i = 0; $i < $datacount; $i++) {
							$position = (int)fgets($input, $indexsize + 1);

							$dummy = "";
							for ($n = strlen($position); $n < $newindex; $n++)
								$dummy .= "0";
							$position = $dummy.$position;

							fputs($output, $position);
						}

						fclose($output);
						fclose($input);

						unlink("../".$datapath."/index.dat");
						rename("../temp/temp".$random.".dat", "../".$datapath."/index.dat");

						$writeconfig = true;
					} else {
						fclose($output);
						fclose($input);
					}
				}

				if ($writeconfig) {
					$output = fopen("../config.php", "w") or die ("Can't open config.php for writing!");

					fputs($output, rtrim("<?php")."\r\n");
					fputs($output, rtrim("\t\$language = \"$language\";")."\r\n");
					fputs($output, rtrim("\t\$indexsize = $newindex;")."\r\n");
					fputs($output, rtrim("\t\$entriesperpage = $entriesperpage;")."\r\n");
					fputs($output, rtrim("\t\$pageindex = $pageindex;")."\r\n");
					fputs($output, rtrim("\t\$html_filter = $html_filter;")."\r\n");
					fputs($output, rtrim("\t\$word_filter = $word_filter;")."\r\n");
					fputs($output, rtrim("\t\$smileypics = $smileypics;")."\r\n");
					fputs($output, rtrim("\t\$limitshownsmileylist = $limitshownsmileylist;")."\r\n");
					fputs($output, rtrim("\t\$maxsmileys = $maxsmileys;")."\r\n");
					fputs($output, rtrim("\t\$maxchars = $maxchars;")."\r\n");
					fputs($output, rtrim("\t\$maxtext = $maxtext;")."\r\n");
					fputs($output, rtrim("\t\$mintext = $mintext;")."\r\n");
					fputs($output, rtrim("\t\$maxlines = $maxlines;")."\r\n");
					fputs($output, rtrim("\t\$maxpictures = $maxpictures;")."\r\n");
					fputs($output, rtrim("\t\$floodwait = $floodwait;")."\r\n");
					fputs($output, rtrim("\t\$logip = $logip;")."\r\n");
					fputs($output, rtrim("\t\$messengers = $messengers;")."\r\n");
					fputs($output, rtrim("\t\$shortmessengerformat = $shortmessengerformat;")."\r\n");
					fputs($output, rtrim("\t\$pictures = $pictures;")."\r\n");
					fputs($output, rtrim("\t\$checkpic = $checkpic;")."\r\n");
					fputs($output, rtrim("\t\$shrinkimages = $shrinkimages;")."\r\n");
					fputs($output, rtrim("\t\$maxXsize = $maxXsize;")."\r\n");
					fputs($output, rtrim("\t\$maxYsize = $maxYsize;")."\r\n");
					fputs($output, rtrim("\t\$showsmileys = $showsmileys;")."\r\n");
					fputs($output, rtrim("\t\$showoptions = $showoptions;")."\r\n");
					fputs($output, rtrim("\t\$showhelp = $showhelp;")."\r\n");
					fputs($output, rtrim("\t\$shorthelpformat = $shorthelpformat;")."\r\n");
					fputs($output, rtrim("\t\$showlocation = $showlocation;")."\r\n");
					fputs($output, rtrim("\t\$previewchecked = $previewchecked;")."\r\n");
					fputs($output, rtrim("\t\$emotionchecked = $emotionchecked;")."\r\n");
					fputs($output, rtrim("\t\$newdateonedit = $newdateonedit;")."\r\n");
					fputs($output, rtrim("\t\$fixedtime = $fixedtime;")."\r\n");
					fputs($output, rtrim("\t\$dateformat = $dateformat;")."\r\n");
					fputs($output, rtrim("\t\$adminpass = \"$adminpass\";")."\r\n");
					fputs($output, rtrim("\t\$moderatorpass = \"$moderatorpass\";")."\r\n");
					fputs($output, rtrim("\t\$adminmail = \"$adminmail\";")."\r\n");
					fputs($output, rtrim("\t\$moderatormail = \"$moderatormail\";")."\r\n");
					fputs($output, rtrim("\t\$passfornewentries = \"$passfornewentries\";")."\r\n");
					fputs($output, rtrim("\t\$cookielifetime = $cookielifetime;")."\r\n");
					fputs($output, rtrim("\t\$datapath = \"$datapath\";")."\r\n");
					fputs($output, rtrim("?>")."\r\n");

					fclose($output);
				}

				Show_Menu($login);
			}
		}
		elseif ($act == "resizeindex" && md5($login) != $adminpass) {
			Show_Menu($login);
			exit();
		}
		elseif ($act == "rebuildindex" && md5($login) == $adminpass) {
			if (!isset($do)) {
				if (!file_exists("rebuildindex.html.inc")) die ("Can't open rebuildindex.html.inc!");
				include("rebuildindex.html.inc");
			} else {
				set_time_limit(300);

				$input = fopen("../".$datapath."/data.dat", "r") or die ("Can't open data.dat!");

				if (file_exists("../".$datapath."/index.dat"))
					unlink("../".$datapath."/index.dat");

				$output = fopen("../".$datapath."/index.dat", "w") or die ("Can't open index.dat for writing!");

				while (!feof($input)) {
					$position = (string)ftell($input);

					$dummy = fgets($input, 16384);

					if (substr($dummy, 0, 4) == "name") {
						$dummy = "";
						for ($i = strlen($position); $i < $indexsize; $i++)
							$dummy .= "0";
						$position = $dummy.$position;

						fputs($output, $position);
					}
				}

				fclose($output);
				fclose($input);

				Show_Menu($login);
			}
		}
		elseif ($act == "rebuildindex" && md5($login) != $adminpass) {
			Show_Menu($login);
			exit();
		}
		elseif ($act == "importcsv" && md5($login) == $adminpass) {
			if (!isset($do)) {
				if (!file_exists("importcsv.html.inc")) die ("Can't open importcsv.html.inc!");
				include("importcsv.html.inc");
			} else {
				set_time_limit(300);
				$posName = (integer)$pname;
				$posMail = (integer)$pmail;
				$posIcq = (integer)$picq;
				$posAim = (integer)$paim;
				$posYim = (integer)$pyim;
				$posMsn = (integer)$pmsn;
				$posLoc = (integer)$ploc;
				$posUrl = (integer)$purl;
				$posText = (integer)$ptext;
				$posDate = (integer)$pdate;
				$posIp = (integer)$pip;
				$fn = $filename;
				$terminator = $term;

				if (!file_exists($fn)) die ("Can't find " . $fn . "!");

				mt_srand((double)microtime() * 1000000);
				$random = mt_rand(0, 1000);
				$random1 = mt_rand(0, 1000);

				while (file_exists("../temp/temp".$random.".dat")) {
					$random = mt_rand(0, 1000);
				}
				while (file_exists("../temp/temp".$random1.".dat")) {
					$random1 = mt_rand(0, 1000);
				}

				if (file_exists("../".$datapath."/data.dat")) {
					copy("../".$datapath."/data.dat", "../temp/temp".$random.".dat");
				}
				if (file_exists("../".$datapath."/index.dat")) {
					copy("../".$datapath."/index.dat", "../temp/temp".$random1.".dat");
				}

				if ($fn == "") die ("There is no filename specified!");
				$input = fopen($fn, "r") or die ("Can't open " . $fn . "!");

				$output = fopen("../temp/temp".$random.".dat", "a") or die ("Can't open temp".$random.".dat!");

				$output1 = fopen("../temp/temp".$random1.".dat", "a") or die ("Can't open temp".$random1.".dat!");

				while ($row = fgetcsv($input, 16384, $terminator)) {
					fseek($output, 0, SEEK_END);
					$position = (string)ftell($output);
					$value = "";
					if ($posName >= 0) $value = $row[$posName];
					fputs($output, rtrim("name=".$value)."\r\n");
					$value = "";
					if ($posMail >= 0) $value = $row[$posMail];
					fputs($output, rtrim("mail=".$value)."\r\n");
					$value = "";
					if ($posIcq >= 0) $value = $row[$posIcq];
					fputs($output, rtrim("icq=".$value)."\r\n");
					$value = "";
					if ($posAim >= 0) $value = $row[$posAim];
					fputs($output, rtrim("aim=".$value)."\r\n");
					$value = "";
					if ($posYim >= 0) $value = $row[$posYim];
					fputs($output, rtrim("yim=".$value)."\r\n");
					$value = "";
					if ($posMsn >= 0) $value = $row[$posMsn];
					fputs($output, rtrim("msn=".$value)."\r\n");
					$value = "";
					if ($posLoc >= 0) $value = $row[$posLoc];
					fputs($output, rtrim("loc=".$value)."\r\n");
					$value = "";
					if ($posUrl >= 0) $value = $row[$posUrl];
					fputs($output, rtrim("url=".$value)."\r\n");
					$value = "";
					if ($posText >= 0) $value = $row[$posText];
					fputs($output, rtrim("text=".$value)."\r\n");
					$value = "";
					if ($posDate >= 0) $value = $row[$posDate];
					fputs($output, rtrim("date=".$value)."\r\n");
					$value = "";
					if ($posIp >= 0) $value = $row[$posIp];
					fputs($output, rtrim("ip=".$value)."\r\n");

					$dummy = "";
					for ($i = strlen($position); $i < $indexsize; $i++)
						$dummy .= "0";
					$position = $dummy.$position;
					fseek($output1, 0, SEEK_END);
					fputs($output1, $position, $indexsize);
				}

				fclose($input);
				fclose($output1);
				fclose($output);

				unlink("../".$datapath."/data.dat");
				rename("../temp/temp".$random.".dat", "../".$datapath."/data.dat");
				unlink("../".$datapath."/index.dat");
				rename("../temp/temp".$random1.".dat", "../".$datapath."/index.dat");
				Show_Menu($login);
			}
		}
		elseif ($act == "importcsv" && md5($login) != $adminpass) {
			Show_Menu($login);
			exit();
		}
		elseif ($act == "deletecookie") {
			setcookie("GuestbookAdmin", "", time() - 3600, "/");
			setcookie("GuestbookModerator", "", time() - 3600, "/");

			Show_Menu($login);
		}
	} else {
		setcookie("GuestbookAdmin", "", time() - 3600, "/");
		setcookie("GuestbookModerator", "", time() - 3600, "/");

		if (!file_exists("error.html.inc")) die ("Can't open error.html.inc!");
		include("error.html.inc");
	}

	Unlock();

	ob_end_flush();

?>