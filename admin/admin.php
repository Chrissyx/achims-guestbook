<?php
/*
 * admin.php - administration modul
 *
 * Copyright (C) 2001 Achim Winkler <achim@lkcc.org>
 *
 * This is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2, or (at your option)
 * any later version.
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this package; see the file COPYING.  If not, write to
 * the Free Software Foundation, Inc., 59 Temple Place - Suite 330,
 * Boston, MA 02111-1307, USA.
 */
ob_start();

error_reporting(0);

require("../config.php");

$i = 0;
while(file_exists("../" . $datapath . "/data.lck") || file_exists("../" . $datapath . "/index.lck"))
{
    if((filemtime("../" . $datapath . "/data.lck") + 300) < time())
        unlink("../" . $datapath . "/data.lck");
    if((filemtime("../" . $datapath . "/index.lck") + 300) < time())
        unlink("../" . $datapath . "/index.lck");
    usleep(500000);
    $i++;
    if($i > 19)
        die("User activities in progress! Please wait a little bit and try it again!");
}

if(!ignore_user_abort())
    ignore_user_abort(true);

if(isset($_GET['act']))
    $act = $_GET['act'];
if(isset($_POST['act']))
    $act = $_POST['act'];
if(isset($_POST['login']))
    $login = $_POST['login'];
if(isset($_POST['store']))
    $store = $_POST['store'];
if(isset($_COOKIE['GuestbookAdmin']))
    $GuestbookAdmin = $_COOKIE['GuestbookAdmin'];
if(isset($_COOKIE['GuestbookModerator']))
    $GuestbookModerator = $_COOKIE['GuestbookModerator'];
if(isset($_GET['entry']))
    $entry = $_GET['entry'];
if(isset($_POST['entry']))
    $entry = $_POST['entry'];
if(isset($_GET['page']))
    $page = $_GET['page'];
if(isset($_POST['page']))
    $page = $_POST['page'];
if(isset($_POST['warning']))
    $warning = $_POST['warning'];
if(isset($_GET['lang']))
    $lang = $_GET['lang'];
if(isset($_POST['emotion']))
    $emotion = $_POST['emotion'];
if(isset($_POST['newname']))
    $newname = $_POST['newname'];
if(isset($_POST['newmail']))
    $newmail = $_POST['newmail'];
if(isset($_POST['newurl']))
    $newurl = $_POST['newurl'];
if(isset($_POST['newicq']))
    $newicq = $_POST['newicq'];
if(isset($_POST['newaim']))
    $newaim = $_POST['newaim'];
if(isset($_POST['newyim']))
    $newyim = $_POST['newyim'];
if(isset($_POST['newmsn']))
    $newmsn = $_POST['newmsn'];
if(isset($_POST['newloc']))
    $newloc = $_POST['newloc'];
if(isset($_POST['newdate']))
    $newdate = $_POST['newdate'];
if(isset($_POST['newip']))
    $newip = $_POST['newip'];
if(isset($_POST['newtext']))
    $newtext = $_POST['newtext'];
if(isset($_POST['do']))
    $do = $_POST['do'];
if(isset($_POST['datapos']))
    $datapos = $_POST['datapos'];
if(isset($_POST['signature']))
    $signature = $_POST['signature'];
if(isset($_POST['first']))
    $first = $_POST['first'];
if(isset($_POST['last']))
    $last = $_POST['last'];
if(isset($_POST['wordfilter']))
    $wordfilter = $_POST['wordfilter'];
if(isset($_POST['ipfilter']))
    $ipfilter = $_POST['ipfilter'];
if(isset($_POST['ignorefilter']))
    $ignorefilter = $_POST['ignorefilter'];
if(isset($_POST['newindex']))
    $newindex = $_POST['newindex'];
if(isset($_POST['pname']))
    $pname = $_POST['pname'];
if(isset($_POST['pmail']))
    $pmail = $_POST['pmail'];
if(isset($_POST['purl']))
    $purl = $_POST['purl'];
if(isset($_POST['picq']))
    $picq = $_POST['picq'];
if(isset($_POST['paim']))
    $paim = $_POST['paim'];
if(isset($_POST['pyim']))
    $pyim = $_POST['pyim'];
if(isset($_POST['pmsn']))
    $pmsn = $_POST['pmsn'];
if(isset($_POST['ploc']))
    $ploc = $_POST['ploc'];
if(isset($_POST['pdate']))
    $pdate = $_POST['pdate'];
if(isset($_POST['pip']))
    $pip = $_POST['pip'];
if(isset($_POST['ptext']))
    $ptext = $_POST['ptext'];
if(isset($_POST['term']))
    $term = $_POST['term'];
if(isset($_POST['filename']))
    $filename = $_POST['filename'];
# config variables
if(isset($_POST['_language']))
    $_language = $_POST['_language'];
if(isset($_POST['_indexsize']))
    $_indexsize = $_POST['_indexsize'];
if(isset($_POST['_pageindex']))
    $_pageindex = $_POST['_pageindex'];
if(isset($_POST['_entriesperpage']))
    $_entriesperpage = $_POST['_entriesperpage'];
if(isset($_POST['_html_filter']))
    $_html_filter = $_POST['_html_filter'];
if(isset($_POST['_word_filter']))
    $_word_filter = $_POST['_word_filter'];
if(isset($_POST['_smileypics']))
    $_smileypics = $_POST['_smileypics'];
if(isset($_POST['_limitshownsmileylist']))
    $_limitshownsmileylist = $_POST['_limitshownsmileylist'];
if(isset($_POST['_maxsmileys']))
    $_maxsmileys = $_POST['_maxsmileys'];
if(isset($_POST['_maxchars']))
    $_maxchars = $_POST['_maxchars'];
if(isset($_POST['_maxtext']))
    $_maxtext = $_POST['_maxtext'];
if(isset($_POST['_mintext']))
    $_mintext = $_POST['_mintext'];
if(isset($_POST['_maxlines']))
    $_maxlines = $_POST['_maxlines'];
if(isset($_POST['_maxpictures']))
    $_maxpictures = $_POST['_maxpictures'];
if(isset($_POST['_floodwait']))
    $_floodwait = $_POST['_floodwait'];
if(isset($_POST['_logip']))
    $_logip = $_POST['_logip'];
if(isset($_POST['_messengers']))
    $_messengers = $_POST['_messengers'];
if(isset($_POST['_shortmessengerformat']))
    $_shortmessengerformat = $_POST['_shortmessengerformat'];
if(isset($_POST['_pictures']))
    $_pictures = $_POST['_pictures'];
if(isset($_POST['_checkpic']))
    $_checkpic = $_POST['_checkpic'];
if(isset($_POST['_shrinkimages']))
    $_shrinkimages = $_POST['_shrinkimages'];
if(isset($_POST['_maxXsize']))
    $_maxXsize = $_POST['_maxXsize'];
if(isset($_POST['_maxYsize']))
    $_maxYsize = $_POST['_maxYsize'];
if(isset($_POST['_showsmileys']))
    $_showsmileys = $_POST['_showsmileys'];
if(isset($_POST['_showoptions']))
    $_showoptions = $_POST['_showoptions'];
if(isset($_POST['_showhelp']))
    $_showhelp = $_POST['_showhelp'];
if(isset($_POST['_shorthelpformat']))
    $_shorthelpformat = $_POST['_shorthelpformat'];
if(isset($_POST['_showlocation']))
    $_showlocation = $_POST['_showlocation'];
if(isset($_POST['_previewchecked']))
    $_previewchecked = $_POST['_previewchecked'];
if(isset($_POST['_emotionchecked']))
    $_emotionchecked = $_POST['_emotionchecked'];
if(isset($_POST['_newdateonedit']))
    $_newdateonedit = $_POST['_newdateonedit'];
if(isset($_POST['_fixedtime']))
    $_fixedtime = $_POST['_fixedtime'];
if(isset($_POST['_dateformat']))
    $_dateformat = $_POST['_dateformat'];
if(isset($_POST['_adminpass']))
    $_adminpass = $_POST['_adminpass'];
if(isset($_POST['_moderatorpass']))
    $_moderatorpass = $_POST['_moderatorpass'];
if(isset($_POST['_adminmail']))
    $_adminmail = $_POST['_adminmail'];
if(isset($_POST['_moderatormail']))
    $_moderatormail = $_POST['_moderatormail'];
if(isset($_POST['_passfornewentries']))
    $_passfornewentries = $_POST['_passfornewentries'];
if(isset($_POST['_cookielifetime']))
    $_cookielifetime = $_POST['_cookielifetime'];
if(isset($_POST['_datapath']))
    $_datapath = $_POST['_datapath'];

if(isset($login) && (!isset($GuestbookAdmin) || !password_verify($GuestbookAdmin, $adminpass)))
{
    if(password_verify($login, $adminpass) && isset($store))
    {
        if(isset($GuestbookModerator) && password_verify($GuestbookModerator, $moderatorpass))
        {
            $cookielifetime = 0;
        }
        else
        {
            $cookielifetime = ($cookielifetime > 31536000) ? 31536000 : $cookielifetime;
        }
        setcookie("GuestbookAdmin", $login, time() + $cookielifetime, "/");
    }
}
else
{
    if(isset($GuestbookAdmin) && password_verify($GuestbookAdmin, $adminpass))
        $login = $GuestbookAdmin;
}
if(isset($login) && !password_verify($login, $adminpass) && (!isset($GuestbookModerator) || !password_verify($GuestbookModerator, $moderatorpass)))
{
    if(password_verify($login, $moderatorpass) && isset($store))
    {
        $cookielifetime = ($cookielifetime > 31536000) ? 31536000 : $cookielifetime;
        setcookie("GuestbookModerator", $login, time() + $cookielifetime, "/");
    }
}
else
{
    if(isset($GuestbookModerator) && password_verify($GuestbookModerator, $moderatorpass))
        $login = $GuestbookModerator;
}

function Unlock()
{
    global $datapath;
    if(file_exists("../" . $datapath . "/lock.lck"))
        unlink("../" . $datapath . "/lock.lck");
}

register_shutdown_function("Unlock");

if(!file_exists("../" . $datapath . "/lock.lck"))
{
    $lock = fopen("../" . $datapath . "/lock.lck", "w") or die("Can't create lock.lck!");
    fclose($lock);
}

function Parse_HTML(&$formstring, $htmltag, $delete = false)
{
    $i = $size = 0;
    $htmltag = strtolower($htmltag);
    $dummy = strtolower($formstring);
    while(is_integer($startpos1 = strpos($dummy, "[$htmltag", $i)) && $startpos1 >= 0)
    {
        $i = $startpos1 + 1;
        if(is_integer($startpos2 = strpos($dummy, "]", $startpos1)) && $startpos2 >= 0)
        {
            if(is_integer($endpos = strpos($dummy, "[/$htmltag]", $startpos2)) && $endpos >= 0 && $endpos > $startpos2)
            {
                $length = strlen($htmltag) + 1;
                if(!$delete)
                {
                    switch(strtoupper($htmltag))
                    {
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
                        if($size == 0)
                            $size = 2;

                        case "S3":
                        if($size == 0)
                            $size = 3;

                        case "S4":
                        if($size == 0)
                            $size = 4;

                        case "S5":
                        if($size == 0)
                            $size = 5;

                        case "S6":
                        if($size == 0)
                            $size = 6;
                        $formstring = substr_replace($formstring, "<FONT SIZE=\"$size\">", $startpos1, $startpos2 - $startpos1 + 1);
                        $formstring = substr_replace($formstring, "</FONT>", $endpos + 11, $length + 2);
                        break;
                    }
                }
                else
                {
                    $formstring = substr_replace($formstring, "", $startpos1, $startpos2 - $startpos1 + 1);
                    $endpos -= ($startpos2 - $startpos1 + 1);
                    $formstring = substr_replace($formstring, "", $endpos, $length + 2);
                }
            }
        }
        $dummy = strtolower($formstring);
    }
}

function Format_String(&$formstring, $emotion, $what)
{
    $formstring = trim($formstring);

    if($what == "text")
    {
        #parse pseudo html commands and replace it with real html commands
        $formstring = str_ireplace("[BR]", "<BR>", $formstring);
        $formstring = str_ireplace("[P]", "<P>", $formstring);

        if($emotion == "yes")
        {
            require("../smileys.php");

            reset($smileylist);

            foreach($smileylist as $key => $value)
            {
                $formstring = str_ireplace($key, $value, $formstring);
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

        $formstring = str_ireplace("<BR>\r\n", "<BR>", $formstring);
        $formstring = str_ireplace("<P>\r\n", "<P>", $formstring);
        $formstring = str_replace("\r\n", "<BR>", $formstring);
    }

    if($what == "url")
    {
        if(strtolower(substr($formstring, 0, 7)) != 'http://' && strtolower(substr($formstring, 0, 8)) != 'https://')
            $formstring = 'https://' . "$formstring";
        if(strtolower($formstring) == 'http://' || strtolower($formstring) == 'https://')
            $formstring = '';
    }
}

function Format_String1(&$formstring)
{
    require("../smileys.php");

    reset($smileylist);

    foreach($smileylist as $key => $value)
    {
        $formstring = str_ireplace($value, stripslashes($key), $formstring);
    }
    $formstring = str_replace("&", "&amp;", $formstring);
}

function Browser_Detection(&$inputsize, &$inputsize1, &$textfieldsize)
{
    if(strstr(getenv("HTTP_USER_AGENT"), "MSIE"))
    {
        $inputsize = 15;
        $inputsize1 = 40;
        $textfieldsize = 50;
    }
    else
    {
        $inputsize = 10;
        $inputsize1 = 25;
        $textfieldsize = 35;
    }
}

function Show_Menu(&$login)
{
    require("menu.html.inc");

    Unlock();
}

$inputsize = $inputsize1 = $textfieldsize = 0;
Browser_Detection($inputsize, $inputsize1, $textfieldsize);

if(!isset($login))
{
    require("login.html.inc");
}
elseif(password_verify($login, $adminpass) || password_verify($login, $moderatorpass))
{
    if(!isset($act))
    {
        Show_Menu($login);
    }
    elseif($act == "new")
    {
        Unlock();
        if(isset($lang))
            header("Location: ../guestbook.php?act=new&lang=$lang");
        else
            header("Location: ../guestbook.php?act=new");
    }
    elseif($act == "changeentry")
    {
        if(!isset($entry))
        {
            require("changeentry_a.html.inc");
        }
        elseif(isset($entry) && !isset($do))
        {
            $datacount = filesize("../" . $datapath . "/index.dat") / $indexsize;
            if(--$entry < 0 || $entry > $datacount)
            {
                Show_Menu($login);
                echo "<P><BR><BR><CENTER>The entry is out of range!</CENTER>";
                exit();
            }

            $input = fopen("../" . $datapath . "/index.dat", "r") or die("Can't open index.dat for reading!");

            fseek($input, ($entry * $indexsize), SEEK_SET);
            $datapos = (int) fgets($input, $indexsize + 1);

            fclose($input);

            $input = fopen("../" . $datapath . "/data.dat", "r") or die("Can't open data.dat for reading!");

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
            $text = str_replace("<BR>", "\r\n", $text);

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

            require("changeentry_b.html.inc");
        }
        elseif(isset($entry) && $do == "write")
        {
            if($newdateonedit != 0)
            {
                $fixedtime = ($fixedtime < -24) ? -24 : (($fixedtime > 24) ? 24 : $fixedtime);
                if($dateformat > 0)
                {
                    $newdate = strftime("%m.%d.%Y %H:%M", time() + ($fixedtime * 3600));
                }
                else
                {
                    $newdate = strftime("%d.%m.%Y %H:%M", time() + ($fixedtime * 3600));
                }
            }

            #read signature file
            if(file_exists("../signature.adm") && password_verify($login, $adminpass) && $signature)
            {
                $input = fopen("../signature.adm", "r");
                while($input && !feof($input))
                {
                    $buffer = trim(fgets($input, 1024));
                    $newtext .= $buffer;
                }
                fclose($input);
            }
            elseif(file_exists("../signature.mod") && password_verify($login, $moderatorpass) && $signature)
            {
                $input = fopen("../signature.mod", "r");
                while($input && !feof($input))
                {
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

            $output = fopen("../" . $datapath."/data.dat", "a") or die("The file data.dat is write protected!");

            $output1 = fopen("../" . $datapath."/index.dat", "r+") or die("The file index.dat is write protected!");

            fseek($output, 0, SEEK_END);    #fix for windows?!?!
            $position = (string) ftell($output);
            fputs($output, rtrim("name=" . $newname) . "\r\n");
            fputs($output, rtrim("mail=" . $newmail) . "\r\n");
            fputs($output, rtrim("icq=" . $newicq) . "\r\n");
            fputs($output, rtrim("aim=" . $newaim) . "\r\n");
            fputs($output, rtrim("yim=" . $newyim) . "\r\n");
            fputs($output, rtrim("msn=" . $newmsn) . "\r\n");
            fputs($output, rtrim("loc=" . $newloc) . "\r\n");
            fputs($output, rtrim("url=" . $newurl) . "\r\n");
            fputs($output, rtrim("text=" . $newtext) . "\r\n");
            fputs($output, rtrim("date=" . $newdate) . "\r\n");
            fputs($output, rtrim("ip=" . $newip) . "\r\n");

            $dummy = '';
            for($i = strlen($position); $i < $indexsize; $i++)
                $dummy .= "0";
            $position = $dummy.$position;
            fseek($output1, ($entry * $indexsize), SEEK_SET);
            fputs($output1, $position, $indexsize);

            fclose($output);
            fclose($output1);

            if(isset($page) && $page != "")
            {
                Unlock();
                if(isset($lang))
                    header("Location: ../guestbook.php?act=show&page=$page&lang=$lang");
                else
                    header("Location: ../guestbook.php?act=show&page=$page");
            }
            else
            {
                Show_Menu($login);
            }
        }
    }
    elseif($act == "deleteentry")
    {
        if(!isset($entry))
        {
            require("deleteentry.html.inc");
        }
        elseif(isset($page) && !isset($warning))
        {
            require("warning.html.inc");
        }
        elseif(isset($page) && !$warning)
        {
            if(isset($lang))
                header("Location: ../guestbook.php?act=show&page=$page&lang=$lang");
            else
                header("Location: ../guestbook.php?act=show&page=$page");
        }
        else
        {
            $input = fopen("../" . $datapath . "/index.dat", "r+") or die("The file index.dat is write protected!");

            $datacount = filesize("../" . $datapath . "/index.dat") / $indexsize;
            if(($entry - 1) < 0 || ($entry - 1) > $datacount)
            {
                Show_Menu($login);
                echo "<P><BR><BR><CENTER>The entry is out of range!</CENTER>";
                exit();
            }

            $position = $entry * $indexsize;

            if($datacount == $entry)
            {
                fseek($input, $position - $indexsize);
            }
            else
            {
                for($i = 0; $i < $datacount - $entry; $i++)
                {
                    fseek($input, $position + ($i * $indexsize));
                    $buffer = fgets($input, $indexsize + 1);
                    fseek($input, $position + (($i - 1) * $indexsize));
                    fputs($input, $buffer, $indexsize);
                }
            }

            ftruncate($input, ftell($input));

            fclose($input);

            if(isset($page))
            {
                Unlock();
                if(isset($lang))
                    header("Location: ../guestbook.php?act=show&page=$page&lang=$lang");
                else
                    header("Location: ../guestbook.php?act=show&page=$page");
            }
            else
            {
                Show_Menu($login);
            }
        }
    }
    elseif($act == "deleterange")
    {
        if(!isset($first) || !isset($last))
        {
            require("deleterange.html.inc");
        }
        else
        {
            $input = fopen("../" . $datapath . "/index.dat", "r+") or die("The file index.dat is write protected!");

            $datacount = filesize("../" . $datapath . "/index.dat") / $indexsize;
            if(($first - 1) < 0 || ($last - 1) > $datacount || $first > $last)
            {
                Show_Menu($login);
                echo "<P><BR><BR><CENTER>The values are out of range!</CENTER>";
                exit();
            }

            $position_first = $first * $indexsize;
            $position_last = $last * $indexsize;

            if($datacount == $last)
            {
                fseek($input, $position_first - $indexsize);
            }
            else
            {
                for($i = 0; $i < $datacount - $first - ($last - $first); $i++)
                {
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
    elseif($act == "editwordfilter")
    {
        if(!isset($do))
        {
            $input = fopen("../" . $datapath . "/wordfilter.dat", "r") or die("Can't open wordfilter.dat for reading!");

            $filter = "";
            while(!feof($input))
            {
                $filter .= trim(fgets($input, 1024)) . " ";
            }

            fclose($input);

            require("editwordfilter.html.inc");
        }
        else
        {
            $filter = explode(" ", trim($wordfilter));

            $output = fopen("../" . $datapath . "/wordfilter.dat", "w") or die("Can't open wordfilter.dat for writing!");

            for($i = 0; $i < count($filter); $i++)
            {
                if($filter[$i] != "")
                    fputs($output, rtrim($filter[$i]) . "\r\n");
            }

            fclose($output);

            Show_Menu($login);
        }
    }
    elseif($act == "editipfilter")
    {
        if(!isset($do))
        {
            $input = fopen("../" . $datapath . "/ipfilter.dat", "r") or die("Can't open ipfilter.dat for reading!");

            $filter = "";
            while(!feof($input))
            {
                $filter .= trim(fgets($input, 1024)) . " ";
            }

            fclose($input);

            require("editipfilter.html.inc");
        }
        else
        {
            $filter = explode(" ", trim($ipfilter));

            $output = fopen("../" . $datapath . "/ipfilter.dat", "w") or die("Can't open ipfilter.dat for writing!");

            for($i = 0; $i < count($filter); $i++)
            {
                if($filter[$i] != "")
                    fputs($output, rtrim($filter[$i]) . "\r\n");
            }

            fclose($output);

            Show_Menu($login);
        }
    }
    elseif($act == "editignorefilter")
    {
        if(!isset($do))
        {
            $input = fopen("../" . $datapath . "/ignorefilter.dat", "r") or die("Can't open ignorefilter.dat for reading!");

            $filter = "";
            while(!feof($input))
            {
                $filter .= trim(fgets($input, 1024)) . "\r\n";
            }
            trim($filter);

            fclose($input);

            require("editignorefilter.html.inc");
        }
        else
        {
            $filter = explode("\n", trim($ignorefilter));

            $output = fopen("../" . $datapath . "/ignorefilter.dat", "w") or die("Can't open ignorefilter.dat for writing!");

            for($i = 0; $i < count($filter); $i++)
            {
                if($filter[$i] != "")
                    fputs($output, trim($filter[$i]) . "\r\n");
            }

            fclose($output);

            Show_Menu($login);
        }
    }
    elseif($act == "changeconfig" && password_verify($login, $adminpass))
    {
        if(!isset($do))
        {
            require("changeconfig.html.inc");
        }
        else
        {
            $output = fopen("../config.php", "w") or die("Can't open config.php for writing!");

            if(strlen($_language) != 3)
                $_language = "eng";
            if($_indexsize == "")
                $_indexsize = 8;
            if($_entriesperpage == "")
                $_entriesperpage = 10;
            if($_pageindex == "")
                $_pageindex = 5;
            if($_html_filter == "")
                $_html_filter = 0;
            if($_word_filter == "")
                $_word_filter = 1;
            if($_smileypics == "")
                $_smileypics = 0;
            if($_limitshownsmileylist == "")
                $_limitshownsmileylist = 20;
            if($_maxsmileys == "")
                $_maxsmileys = 50;
            if($_maxchars == "")
                $_maxchars = 50;
            if($_maxtext == "")
                $_maxtext = 1000;
            if($_mintext == "")
                $_mintext = 2;
            if($_maxlines == "")
                $_maxlines = 20;
            if($_maxpictures == "")
                $_maxpictures = 1;
            if($_floodwait == "")
                $_floodwait = 120;
            if($_logip == "")
                $_logip = 0;
            if($_messengers == "")
                $_messengers = 1;
            if($_shortmessengerformat == "")
                $_shortmessengerformat = 0;
            if($_pictures == "")
                $_pictures = 1;
            if($_checkpic == "")
                $_checkpic = 1;
            if($_shrinkimages == "")
                $_shrinkimages = 1;
            if($_maxXsize == "")
                $_maxXsize = 200;
            if($_maxYsize == "")
                $_maxYsize = 100;
            if($_showsmileys == "")
                $_showsmileys = 1;
            if($_showoptions == "")
                $_showoptions = 1;
            if($_showhelp == "")
                $_showhelp = 0;
            if($_shorthelpformat == "")
                $_shorthelpformat = 1;
            if($_showlocation == "")
                $_showlocation = 1;
            if($_previewchecked == "")
                $_previewchecked = 1;
            if($_emotionchecked == "")
                $_emotionchecked = 1;
            if($_newdateonedit == "")
                $_newdateonedit = 1;
            if($_fixedtime == "")
                $_fixedtime = 0;
            if($_dateformat == "")
                $_dateformat = 0;
            if($_adminpass == "")
                $_adminpass = "admin";
            if($_passfornewentries == "")
                $_passfornewentries = 0;
            if($_cookielifetime == "")
                $_cookielifetime = 31536000;
            if($_datapath == "")
                $_datapath = "data";

            fputs($output, rtrim("<?php")."\r\n");
            fputs($output, rtrim("\$language = \"$_language\";") . "\r\n");
            fputs($output, rtrim("\$indexsize = $_indexsize;") . "\r\n");
            fputs($output, rtrim("\$entriesperpage = $_entriesperpage;") . "\r\n");
            fputs($output, rtrim("\$pageindex = $_pageindex;") . "\r\n");
            fputs($output, rtrim("\$html_filter = $_html_filter;") . "\r\n");
            fputs($output, rtrim("\$word_filter = $_word_filter;") . "\r\n");
            fputs($output, rtrim("\$smileypics = $_smileypics;") . "\r\n");
            fputs($output, rtrim("\$limitshownsmileylist = $_limitshownsmileylist;") . "\r\n");
            fputs($output, rtrim("\$maxsmileys = $_maxsmileys;") . "\r\n");
            fputs($output, rtrim("\$maxchars = $_maxchars;") . "\r\n");
            fputs($output, rtrim("\$maxtext = $_maxtext;") . "\r\n");
            fputs($output, rtrim("\$mintext = $_mintext;") . "\r\n");
            fputs($output, rtrim("\$maxlines = $_maxlines;") . "\r\n");
            fputs($output, rtrim("\$maxpictures = $_maxpictures;") . "\r\n");
            fputs($output, rtrim("\$floodwait = $_floodwait;") . "\r\n");
            fputs($output, rtrim("\$logip = $_logip;") . "\r\n");
            fputs($output, rtrim("\$messengers = $_messengers;") . "\r\n");
            fputs($output, rtrim("\$shortmessengerformat = $_shortmessengerformat;") . "\r\n");
            fputs($output, rtrim("\$pictures = $_pictures;") . "\r\n");
            fputs($output, rtrim("\$checkpic = $_checkpic;") . "\r\n");
            fputs($output, rtrim("\$shrinkimages = $_shrinkimages;") . "\r\n");
            fputs($output, rtrim("\$maxXsize = $_maxXsize;") . "\r\n");
            fputs($output, rtrim("\$maxYsize = $_maxYsize;") . "\r\n");
            fputs($output, rtrim("\$showsmileys = $_showsmileys;") . "\r\n");
            fputs($output, rtrim("\$showoptions = $_showoptions;") . "\r\n");
            fputs($output, rtrim("\$showhelp = $_showhelp;") . "\r\n");
            fputs($output, rtrim("\$shorthelpformat = $_shorthelpformat;") . "\r\n");
            fputs($output, rtrim("\$showlocation = $_showlocation;") . "\r\n");
            fputs($output, rtrim("\$previewchecked = $_previewchecked;") . "\r\n");
            fputs($output, rtrim("\$emotionchecked = $_emotionchecked;") . "\r\n");
            fputs($output, rtrim("\$newdateonedit = $_newdateonedit;") . "\r\n");
            fputs($output, rtrim("\$fixedtime = $_fixedtime;") . "\r\n");
            fputs($output, rtrim("\$dateformat = $_dateformat;") . "\r\n");
            fputs($output, rtrim("\$adminpass = '" . password_hash($_adminpass, PASSWORD_BCRYPT) . "';") . "\r\n");
            if($_moderatorpass != "")
            {
                if($_moderatorpass != $moderatorpass)
                {
                    fputs($output, rtrim("\$moderatorpass = '" . password_hash($_moderatorpass, PASSWORD_BCRYPT) . "';") . "\r\n");
                }
                else
                {
                    fputs($output, rtrim("\$moderatorpass = '" . $moderatorpass . "';") . "\r\n");
                }
            }
            else
            {
                fputs($output, rtrim("\$moderatorpass = '';") . "\r\n");
            }
            fputs($output, rtrim("\$adminmail = \"$_adminmail\";") . "\r\n");
            fputs($output, rtrim("\$moderatormail = \"$_moderatormail\";") . "\r\n");
            fputs($output, rtrim("\$passfornewentries = $_passfornewentries;") . "\r\n");
            fputs($output, rtrim("\$cookielifetime = $_cookielifetime;") . "\r\n");
            fputs($output, rtrim("\$datapath = \"$_datapath\";") . "\r\n");
            fputs($output, rtrim("?>"));

            fclose($output);

            Show_Menu($login);
        }
    }
    elseif($act == "changeconfig" && !password_verify($login, $adminpass))
    {
        Show_Menu($login);
        exit();
    }
    elseif($act == "newdatabase" && password_verify($login, $adminpass))
    {
        if(!isset($do))
        {
            require("newdatabase.html.inc");
        }
        else
        {
            set_time_limit(300);

            $input = fopen("../" . $datapath . "/index.dat", "r+") or die("Can't open index.dat for reading!");
            $input1 = fopen("../" . $datapath . "/data.dat", "r+") or die("Can't open data.dat for reading!");

            mt_srand((double) microtime() * 1000000);
            $random = mt_rand(0, 1000);
            $random1 = mt_rand(0, 1000);
            while(file_exists("../temp/temp" . $random . ".dat"))
            {
                $random = mt_rand(0, 1000);
            }
            while(file_exists("../temp/temp" . $random1 . ".dat"))
            {
                $random1 = mt_rand(0, 1000);
            }

            $output = fopen("../temp/temp" . $random . ".dat", "w") or die("Can't create temp" . $random . ".dat!");
            $output1 = fopen("../temp/temp" . $random1 . ".dat", "w") or die("Can't create temp" . $random1 . ".dat!");

            $datacount = filesize("../" . $datapath . "/index.dat") / $indexsize;

            for($i = 0; $i < $datacount; $i++)
            {
                $position = (string) ftell($output1);
                $dummy = "";
                for($n = strlen($position); $n < $indexsize; $n++)
                    $dummy .= "0";
                $position = $dummy . $position;
                fputs($output, $position);

                $datapos = (int) fgets($input, $indexsize + 1);
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
                fputs($output1, rtrim($name) . "\r\n");
                fputs($output1, rtrim($mail) . "\r\n");
                fputs($output1, rtrim($icq) . "\r\n");
                fputs($output1, rtrim($aim) . "\r\n");
                fputs($output1, rtrim($yim) . "\r\n");
                fputs($output1, rtrim($msn) . "\r\n");
                fputs($output1, rtrim($loc) . "\r\n");
                fputs($output1, rtrim($url) . "\r\n");
                fputs($output1, rtrim($text) . "\r\n");
                fputs($output1, rtrim($date) . "\r\n");
                fputs($output1, rtrim($ip) . "\r\n");
            }

            fclose($input);
            fclose($input1);

            unlink("../" . $datapath . "/index.dat");
            unlink("../" . $datapath . "/data.dat");

            fclose($output);
            fclose($output1);

            rename("../temp/temp" . $random . ".dat", "../" . $datapath . "/index.dat");
            rename("../temp/temp" . $random1 . ".dat", "../" . $datapath . "/data.dat");

            Show_Menu($login);
        }
    }
    elseif($act == "newdatabase" && !password_verify($login, $adminpass))
    {
        Show_Menu($login);
        exit();
    }
    elseif($act == "resizeindex" && password_verify($login, $adminpass))
    {
        if(!isset($newindex))
        {
            require("resizeindex.html.inc");
        }
        else
        {
            $writeconfig = false;
            set_time_limit(300);
            $random = mt_rand(0, 1000);

            $input = fopen("../" . $datapath . "/index.dat", "r") or die("Can't open index.dat!");

            $datacount = filesize("../" . $datapath . "/index.dat") / $indexsize;

            if($indexsize < $newindex)
            {
                while(file_exists("../temp/temp" . $random . ".dat"))
                {
                    $random = mt_rand(0, 1000);
                }
                $output = fopen("../temp/temp" . $random . ".dat", "w") or die("Can't open temp" . $random . ".dat!");

                for($i = 0; $i < $datacount; $i++)
                {
                    $position = (int) fgets($input, $indexsize + 1);

                    $dummy = "";
                    for($n = strlen($position); $n < $newindex; $n++)
                        $dummy .= "0";
                    $position = $dummy . $position;
                    fputs($output, $position);
                }

                fclose($output);
                fclose($input);

                unlink("../" . $datapath . "/index.dat");
                rename("../temp/temp" . $random . ".dat", "../" . $datapath . "/index.dat");

                $writeconfig = true;
            }
            elseif($indexsize > $newindex && $newindex > 3)
            {
                while(file_exists("../temp/temp" . $random . ".dat"))
                {
                    $random = mt_rand(0, 1000);
                }
                $output = fopen("../temp/temp" . $random . ".dat", "w") or die("Can't open temp" . $random . ".dat!");

                fseek($input, filesize("../" . $datapath . "/index.dat") - $indexsize, SEEK_SET);
                $position = (int) fgets($input, $indexsize + 1);

                if(strlen($position) <= $newindex)
                {
                    fseek($input, 0, SEEK_SET);

                    for($i = 0; $i < $datacount; $i++)
                    {
                        $position = (int) fgets($input, $indexsize + 1);

                        $dummy = "";
                        for($n = strlen($position); $n < $newindex; $n++)
                            $dummy .= "0";
                        $position = $dummy . $position;

                        fputs($output, $position);
                    }

                    fclose($output);
                    fclose($input);

                    unlink("../" . $datapath . "/index.dat");
                    rename("../temp/temp" . $random . ".dat", "../" . $datapath . "/index.dat");

                    $writeconfig = true;
                }
                else
                {
                    fclose($output);
                    fclose($input);
                }
            }

            if($writeconfig)
            {
                $output = fopen("../config.php", "w") or die("Can't open config.php for writing!");

                fputs($output, rtrim("<?php") . "\r\n");
                fputs($output, rtrim("\$language = \"$language\";") . "\r\n");
                fputs($output, rtrim("\$indexsize = $newindex;") . "\r\n");
                fputs($output, rtrim("\$entriesperpage = $entriesperpage;") . "\r\n");
                fputs($output, rtrim("\$pageindex = $pageindex;") . "\r\n");
                fputs($output, rtrim("\$html_filter = $html_filter;") . "\r\n");
                fputs($output, rtrim("\$word_filter = $word_filter;") . "\r\n");
                fputs($output, rtrim("\$smileypics = $smileypics;") . "\r\n");
                fputs($output, rtrim("\$limitshownsmileylist = $limitshownsmileylist;") . "\r\n");
                fputs($output, rtrim("\$maxsmileys = $maxsmileys;") . "\r\n");
                fputs($output, rtrim("\$maxchars = $maxchars;") . "\r\n");
                fputs($output, rtrim("\$maxtext = $maxtext;") . "\r\n");
                fputs($output, rtrim("\$mintext = $mintext;") . "\r\n");
                fputs($output, rtrim("\$maxlines = $maxlines;") . "\r\n");
                fputs($output, rtrim("\$maxpictures = $maxpictures;") . "\r\n");
                fputs($output, rtrim("\$floodwait = $floodwait;") . "\r\n");
                fputs($output, rtrim("\$logip = $logip;") . "\r\n");
                fputs($output, rtrim("\$messengers = $messengers;") . "\r\n");
                fputs($output, rtrim("\$shortmessengerformat = $shortmessengerformat;") . "\r\n");
                fputs($output, rtrim("\$pictures = $pictures;") . "\r\n");
                fputs($output, rtrim("\$checkpic = $checkpic;") . "\r\n");
                fputs($output, rtrim("\$shrinkimages = $shrinkimages;") . "\r\n");
                fputs($output, rtrim("\$maxXsize = $maxXsize;") . "\r\n");
                fputs($output, rtrim("\$maxYsize = $maxYsize;") . "\r\n");
                fputs($output, rtrim("\$showsmileys = $showsmileys;") . "\r\n");
                fputs($output, rtrim("\$showoptions = $showoptions;") . "\r\n");
                fputs($output, rtrim("\$showhelp = $showhelp;") . "\r\n");
                fputs($output, rtrim("\$shorthelpformat = $shorthelpformat;") . "\r\n");
                fputs($output, rtrim("\$showlocation = $showlocation;") . "\r\n");
                fputs($output, rtrim("\$previewchecked = $previewchecked;") . "\r\n");
                fputs($output, rtrim("\$emotionchecked = $emotionchecked;") . "\r\n");
                fputs($output, rtrim("\$newdateonedit = $newdateonedit;") . "\r\n");
                fputs($output, rtrim("\$fixedtime = $fixedtime;") . "\r\n");
                fputs($output, rtrim("\$dateformat = $dateformat;") . "\r\n");
                fputs($output, rtrim("\$adminpass = '$adminpass';") . "\r\n");
                fputs($output, rtrim("\$moderatorpass = '$moderatorpass';") . "\r\n");
                fputs($output, rtrim("\$adminmail = \"$adminmail\";") . "\r\n");
                fputs($output, rtrim("\$moderatormail = \"$moderatormail\";") . "\r\n");
                fputs($output, rtrim("\$passfornewentries = \"$passfornewentries\";") . "\r\n");
                fputs($output, rtrim("\$cookielifetime = $cookielifetime;") . "\r\n");
                fputs($output, rtrim("\$datapath = \"$datapath\";") . "\r\n");
                fputs($output, rtrim("?>"));

                fclose($output);
            }

            Show_Menu($login);
        }
    }
    elseif($act == "resizeindex" && !password_verify($login, $adminpass))
    {
        Show_Menu($login);
        exit();
    }
    elseif($act == "rebuildindex" && password_verify($login, $adminpass))
    {
        if(!isset($do))
        {
            require("rebuildindex.html.inc");
        }
        else
        {
            set_time_limit(300);

            $input = fopen("../" . $datapath . "/data.dat", "r") or die("Can't open data.dat!");

            if(file_exists("../" . $datapath . "/index.dat"))
                unlink("../" . $datapath . "/index.dat");

            $output = fopen("../" . $datapath . "/index.dat", "w") or die("Can't open index.dat for writing!");

            while(!feof($input))
            {
                $position = (string) ftell($input);

                $dummy = fgets($input, 16384);

                if(substr($dummy, 0, 4) == "name")
                {
                    $dummy = "";
                    for($i = strlen($position); $i < $indexsize; $i++)
                        $dummy .= "0";
                    $position = $dummy . $position;

                    fputs($output, $position);
                }
            }

            fclose($output);
            fclose($input);

            Show_Menu($login);
        }
    }
    elseif($act == "rebuildindex" && !password_verify($login, $adminpass))
    {
        Show_Menu($login);
        exit();
    }
    elseif($act == "importcsv" && password_verify($login, $adminpass))
    {
        if(!isset($do))
        {
            require("importcsv.html.inc");
        }
        else
        {
            set_time_limit(300);
            $posName = (integer) $pname;
            $posMail = (integer) $pmail;
            $posIcq = (integer) $picq;
            $posAim = (integer) $paim;
            $posYim = (integer) $pyim;
            $posMsn = (integer) $pmsn;
            $posLoc = (integer) $ploc;
            $posUrl = (integer) $purl;
            $posText = (integer) $ptext;
            $posDate = (integer) $pdate;
            $posIp = (integer) $pip;
            $fn = $filename;
            $terminator = $term;

            if(!file_exists($fn))
                die("Can't find " . $fn . "!");

            mt_srand((double) microtime() * 1000000);
            $random = mt_rand(0, 1000);
            $random1 = mt_rand(0, 1000);

            while(file_exists("../temp/temp" . $random . ".dat"))
            {
                $random = mt_rand(0, 1000);
            }
            while(file_exists("../temp/temp" . $random1 . ".dat"))
            {
                $random1 = mt_rand(0, 1000);
            }

            if(file_exists("../" . $datapath . "/data.dat"))
            {
                copy("../" . $datapath . "/data.dat", "../temp/temp" . $random . ".dat");
            }
            if(file_exists("../" . $datapath . "/index.dat"))
            {
                copy("../" . $datapath . "/index.dat", "../temp/temp" . $random1 . ".dat");
            }

            if($fn == "")
                die("There is no filename specified!");
            $input = fopen($fn, "r") or die("Can't open " . $fn . "!");

            $output = fopen("../temp/temp" . $random . ".dat", "a") or die("Can't open temp" . $random . ".dat!");
            $output1 = fopen("../temp/temp" . $random1 . ".dat", "a") or die("Can't open temp" . $random1 . ".dat!");

            while($row = fgetcsv($input, 16384, $terminator))
            {
                fseek($output, 0, SEEK_END);
                $position = (string) ftell($output);
                $value = "";
                if($posName >= 0)
                    $value = $row[$posName];
                fputs($output, rtrim("name=" . $value) . "\r\n");
                $value = "";
                if($posMail >= 0)
                    $value = $row[$posMail];
                fputs($output, rtrim("mail=" . $value) . "\r\n");
                $value = "";
                if($posIcq >= 0)
                    $value = $row[$posIcq];
                fputs($output, rtrim("icq=" . $value) . "\r\n");
                $value = "";
                if($posAim >= 0)
                    $value = $row[$posAim];
                fputs($output, rtrim("aim=" . $value) . "\r\n");
                $value = "";
                if($posYim >= 0)
                    $value = $row[$posYim];
                fputs($output, rtrim("yim=" . $value) . "\r\n");
                $value = "";
                if($posMsn >= 0)
                    $value = $row[$posMsn];
                fputs($output, rtrim("msn=" . $value) . "\r\n");
                $value = "";
                if($posLoc >= 0)
                    $value = $row[$posLoc];
                fputs($output, rtrim("loc=" . $value) . "\r\n");
                $value = "";
                if($posUrl >= 0)
                    $value = $row[$posUrl];
                fputs($output, rtrim("url=" . $value) . "\r\n");
                $value = "";
                if($posText >= 0)
                    $value = $row[$posText];
                fputs($output, rtrim("text=" . $value) . "\r\n");
                $value = "";
                if($posDate >= 0)
                    $value = $row[$posDate];
                fputs($output, rtrim("date=" . $value) . "\r\n");
                $value = "";
                if($posIp >= 0)
                    $value = $row[$posIp];
                fputs($output, rtrim("ip=" . $value) . "\r\n");

                $dummy = "";
                for($i = strlen($position); $i < $indexsize; $i++)
                    $dummy .= "0";
                $position = $dummy . $position;
                fseek($output1, 0, SEEK_END);
                fputs($output1, $position, $indexsize);
            }

            fclose($input);
            fclose($output1);
            fclose($output);

            unlink("../" . $datapath . "/data.dat");
            rename("../temp/temp" . $random . ".dat", "../" . $datapath . "/data.dat");
            unlink("../" . $datapath . "/index.dat");
            rename("../temp/temp" . $random1 . ".dat", "../" . $datapath . "/index.dat");
            Show_Menu($login);
        }
    }
    elseif($act == "importcsv" && !password_verify($login, $adminpass))
    {
        Show_Menu($login);
        exit();
    }
    elseif($act == "deletecookie")
    {
        setcookie("GuestbookAdmin", "", time() - 3600, "/");
        setcookie("GuestbookModerator", "", time() - 3600, "/");

        Show_Menu($login);
    }
}
else
{
    setcookie("GuestbookAdmin", "", time() - 3600, "/");
    setcookie("GuestbookModerator", "", time() - 3600, "/");

    require("error.html.inc");
}

Unlock();

ob_end_flush();
?>