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

global $HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_COOKIE_VARS;

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

if(isset($HTTP_GET_VARS['act']))
    $act = $HTTP_GET_VARS['act'];
if(isset($HTTP_POST_VARS['act']))
    $act = $HTTP_POST_VARS['act'];
if(isset($HTTP_POST_VARS['write']))
    $write = $HTTP_POST_VARS['write'];
if(isset($HTTP_POST_VARS['what']))
    $what = $HTTP_POST_VARS['what'];
if(isset($HTTP_GET_VARS['page']))
    $page = $HTTP_GET_VARS['page'];
if(isset($HTTP_POST_VARS['page']))
    $page = $HTTP_POST_VARS['page'];
if(isset($HTTP_GET_VARS['phrase']))
    $phrase = $HTTP_GET_VARS['phrase'];
if(isset($HTTP_POST_VARS['phrase']))
    $phrase = $HTTP_POST_VARS['phrase'];
if(isset($HTTP_POST_VARS['next']))
    $next = $HTTP_POST_VARS['next'];
if(isset($HTTP_GET_VARS['entrypos']))
    $entrypos = $HTTP_GET_VARS['entrypos'];
if(isset($HTTP_GET_VARS['lang']))
    $lang = $HTTP_GET_VARS['lang'];
if(isset($HTTP_POST_VARS['pre']))
    $pre = $HTTP_POST_VARS['pre'];
if(isset($HTTP_POST_VARS['presave']))
    $presave = $HTTP_POST_VARS['presave'];
if(isset($HTTP_POST_VARS['preview']))
    $preview = $HTTP_POST_VARS['preview'];
if(isset($HTTP_POST_VARS['random']))
    $random = $HTTP_POST_VARS['random'];
if(isset($HTTP_POST_VARS['emotion']))
    $emotion = $HTTP_POST_VARS['emotion'];
if(isset($HTTP_POST_VARS['newname']))
    $newname = $HTTP_POST_VARS['newname'];
if(isset($HTTP_POST_VARS['newmail']))
    $newmail = $HTTP_POST_VARS['newmail'];
if(isset($HTTP_POST_VARS['newurl']))
    $newurl = $HTTP_POST_VARS['newurl'];
if(isset($HTTP_POST_VARS['newicq']))
    $newicq = $HTTP_POST_VARS['newicq'];
if(isset($HTTP_POST_VARS['newaim']))
    $newaim = $HTTP_POST_VARS['newaim'];
if(isset($HTTP_POST_VARS['newyim']))
    $newyim = $HTTP_POST_VARS['newyim'];
if(isset($HTTP_POST_VARS['newmsn']))
    $newmsn = $HTTP_POST_VARS['newmsn'];
if(isset($HTTP_POST_VARS['newloc']))
    $newloc = $HTTP_POST_VARS['newloc'];
if(isset($HTTP_POST_VARS['newtext']))
    $newtext = $HTTP_POST_VARS['newtext'];
if(isset($HTTP_COOKIE_VARS['GuestbookAdmin']))
    $GuestbookAdmin = $HTTP_COOKIE_VARS['GuestbookAdmin'];

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
            header ("Location: guestbook.php?act=show&lang=$lang");
        else
            header ("Location: guestbook.php?act=show");
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
    if(!isset($phrase) || $phrase == "")
        $phrase = "";

    SearchEntry($next);
}

ob_end_flush();
?>