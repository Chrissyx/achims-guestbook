<?php
/*
 * guestbook.php - main guestbook modul
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
function ShowEntries($page, $entrypos)
{
    global $phrase;

    require("output.php");
    $output = new COutput($page, $entrypos, $phrase);
    $output->Output_All();
    unset($output);
    $action = "show";
}

function NewEntry()
{
    global $newname, $newmail, $newurl, $newicq, $newaim, $newyim, $newmsn, $newloc, $newtext;

    require("tools.php");
    require("input.php");
    $input = new CInput();
    $input->Formular_Show(0, $newname, $newmail, $newurl, $newicq, $newaim, $newyim, $newmsn, $newloc, $newtext);
    unset($input);
}

function WriteEntry($emotion = "no", $preview = 0, $write = 0, $random = -1)
{
    global $newname, $newmail, $newurl, $newicq, $newaim, $newyim, $newmsn, $newloc, $newtext, $lang;

    require("tools.php");
    require("input.php");
    $input = new CInput($emotion);
    if($preview != 0 && $write != 0)
    {
        $input->Write_Data($newname, $newmail, $newicq, $newaim, $newyim, $newmsn, $newloc, $newurl, $newtext, $random);
        if(isset($lang))
            header("Location: guestbook.php?act=show&lang=$lang");
        else
            header("Location: guestbook.php?act=show");
    }
    elseif($preview != 0)
    {
        require("preview.php");

        $preview = new CPreview($emotion);
        $preview->Show_Preview($newname, $newmail, $newicq, $newaim, $newyim, $newmsn, $newloc, $newurl, $newtext);
    }
    else
        $input->Write_Data($newname, $newmail, $newicq, $newaim, $newyim, $newmsn, $newloc, $newurl, $newtext, $random);
    unset($input);
}

function SearchEntry($next = "no")
{
    global $what, $phrase, $page;

    require("search.php");
    $search = new CSearch();

    if(!isset($what))
        $search->SearchScreen($phrase, $page, $next);
    else
        $search->Search($phrase, $page, $next);
}

ob_start();

error_reporting(0);

if(!ignore_user_abort())
    ignore_user_abort(true);

#administration in progress?
require("config.php");

if(!function_exists("Unlock"))
{
    function Unlock()
    {
        global $datapath;

        if(file_exists($datapath . "/data.lck"))
            unlink($datapath . "/data.lck");
        if(file_exists($datapath . "/index.lck"))
            unlink($datapath . "/index.lck");
        if(file_exists("temp/ip.lck"))
            unlink("temp/ip.lck");
    }
}

register_shutdown_function("Unlock");

while(file_exists($datapath . "/lock.lck"))
{
    if((filemtime($datapath . "/lock.lck") + 1800) < time())
        unlink($datapath . "/lock.lck");
    usleep(500000);
    $i++;
    if($i > 9)
    {
        echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">";
        echo "<HTML><HEAD><TITLE>Guestbook</TITLE><LINK HREF=\"guestbook.css\" REL=\"stylesheet\" TYPE=\"text/css\"></HEAD>";
        echo "<BODY>";
        echo "<TABLE BORDER=\"0\" VALIGN=\"middle\" WIDTH=\"100%\" HEIGHT=\"100%\">";
        echo "<TR><TD ALIGN=\"center\">";
        echo "<FONT SIZE=\"5\" COLOR=\"E01010\">Administration activities in progress.<BR>Please try it later again!</FONT>";
        echo "</TD></TR></TABLE></BODY></HTML>";
    }
}

if(isset($_GET['act']))
    $act = $_GET['act'];
if(isset($_POST['act']))
    $act = $_POST['act'];
if(isset($_POST['write']))
    $write = $_POST['write'];
if(isset($_POST['what']))
    $what = $_POST['what'];
if(isset($_GET['page']))
    $page = $_GET['page'];
if(isset($_POST['page']))
    $page = $_POST['page'];
if(isset($_GET['phrase']))
    $phrase = $_GET['phrase'];
if(isset($_POST['phrase']))
    $phrase = $_POST['phrase'];
if(isset($_POST['next']))
    $next = $_POST['next'];
if(isset($_GET['entrypos']))
    $entrypos = $_GET['entrypos'];
if(isset($_GET['lang']))
    $lang = $_GET['lang'];
if(isset($_POST['pre']))
    $pre = $_POST['pre'];
if(isset($_POST['presave']))
    $presave = $_POST['presave'];
if(isset($_POST['preview']))
    $preview = $_POST['preview'];
if(isset($_POST['random']))
    $random = $_POST['random'];
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
if(isset($_POST['newtext']))
    $newtext = $_POST['newtext'];
if(isset($_COOKIE['GuestbookAdmin']))
    $GuestbookAdmin = $_COOKIE['GuestbookAdmin'];

if(!isset($act) || $act == "" || $act == "show")
{
    #show guestbook
    if(!isset($page))
        $page = 1;
    if($page < 1)
        $page = 1;
    if(!isset($entrypos))
        $entrypos = -1;
    if(!isset($phrase))
        $phrase = "";
    ShowEntries($page, $entrypos);
}
elseif($act == "new")
{
    #new guestbook entry
    if(!isset($newname))
        $newname = "";
    if(!isset($newmail))
        $newmail = "";
    if(!isset($newurl) || $newurl == "")
        $newurl = "http://";
    if(!isset($newicq))
        $newicq = "";
    if(!isset($newaim))
        $newaim = "";
    if(!isset($newyim))
        $newyim = "";
    if(!isset($newmsn))
        $newmsn = "";
    if(!isset($newloc))
        $newloc = "";
    if(!isset($newtext))
        $newtext = "";
    NewEntry();
}
elseif($act == "write")
{
    if(!isset($emotion))
        $emotion = null;
    if($pre == "yes" && isset($presave))
    {
        #save the preview data
        WriteEntry($emotion, 1, 1, $random);
    }
    elseif($pre == "yes")
    {
        #save data with preview
        WriteEntry($emotion, 1);
    }
    else
    {
        #save data without preview
        WriteEntry($emotion);
        if(isset($lang))
            header("Location: guestbook.php?act=show&lang=$lang");
        else
            header("Location: guestbook.php?act=show");
    }
}
elseif($act == "search")
{
    if(!isset($next))
        $next = "no";
    if(isset($entrypos))
        $next = "yes";
    if($next == "no")
        $page = 1;
    if(!isset($phrase))
        $phrase = "";

    SearchEntry($next);
}

ob_end_flush();
?>