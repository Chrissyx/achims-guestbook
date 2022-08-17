<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Guestbook - Change Config</TITLE>
	<LINK HREF="../guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>
<BODY>
<TABLE BORDER="0" ALIGN="center" CELLPADDING="0" CELLSPACING="1" WIDTH="60%">
<TR CLASS="tableheader">
	<TD CLASS="header" COLSPAN="3" HEIGHT="40" VALIGN="top">
	<DIV ALIGN="left"><FONT CLASS="header" SIZE="5">Change Config</DIV><P>
	</TD>
</TR>
<TR CLASS="tableheader">
	<TD CLASS="header" ROWSPAN="2" WIDTH="10%">&nbsp;</TD>
	<TD WIDTH="80%">
	<TABLE BORDER="0" ALIGN="center" CELLPADDING="0" CELLSPACING="0" WIDTH="100%">
	<FORM ACTION="admin.php" METHOD="post">
	<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $login; ?>">
	<INPUT TYPE="hidden" NAME="act" VALUE="<?php echo $act; ?>">
	<INPUT TYPE="hidden" NAME="do" VALUE="write">
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%"><BR>
		<FONT CLASS="normalcol" SIZE="2">Language:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%"><BR>
		<SELECT NAME="_language" SIZE="1">
<?php
$lang = array("eng" => "English", "ger" => "German", "swe" => "Swedish", "fre" => "French", "ita" => "Italian", "por" => "Portuguese", "dut" => "Dutch", "spa" => "Spanish", "rus" => "Russian", "cze" => "Czech", "fin" => "Finnish", "chi" => "Chinese", "dan" => "Danish", "pol" => "Polish", "ice" => "Icelandic", "svk" => "Slovak", "hug" => "Hungarian");
foreach($lang as $key => $value)
{
    if($key == $language)
        echo "<OPTION SELECTED VALUE=\"$key\">$value";
    else
        echo "<OPTION VALUE=\"$key\">$value";
}
?>
		</SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">Indexsize:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if(filesize("../" . $datapath . "/index.dat") == 0)
{
    echo "<INPUT TYPE=\"text\" NAME=\"_indexsize\" SIZE=\"$inputsize\" MAXLENGTH=\"2\" VALUE=\"$indexsize\"><P></TD></TR>";
}
else
{
    echo "<INPUT TYPE=\"text\" NAME=\"_indexsize\" SIZE=\"$inputsize\" MAXLENGTH=\"2\" DISABLED VALUE=\"$indexsize\"><INPUT TYPE=\"hidden\" NAME=\"_indexsize\" VALUE=\"$indexsize\"><P>";
}
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">Entries per Page:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_entriesperpage" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $entriesperpage; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">Page Index:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_pageindex" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $pageindex; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">HTML Filter:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($html_filter != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_html_filter\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_html_filter\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_html_filter\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_html_filter\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">Wordfilter:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($word_filter != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_word_filter\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_word_filter\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_word_filter\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_word_filter\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">Smileys:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($smileypics != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_smileypics\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_smileypics\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_smileypics\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_smileypics\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">LimitShownSmileylist:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_limitshownsmileylist" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $limitshownsmileylist; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">MaxSmileys:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_maxsmileys" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $maxsmileys; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1"><TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">MaxChars:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_maxchars" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $maxchars; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1"><TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">MinText:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_mintext" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $mintext; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1"><TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">MaxText:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_maxtext" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $maxtext; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1"><TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">MaxLines:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_maxlines" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $maxlines; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1"><TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">MaxPictures:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_maxpictures" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $maxpictures; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">FloodWait:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_floodwait" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $floodwait; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">LogIP:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($logip != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_logip\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_logip\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_logip\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_logip\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">Messengers:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($messengers != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_messengers\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_messengers\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_messengers\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_messengers\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">ShortMessengerFormat:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($shortmessengerformat != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shortmessengerformat\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shortmessengerformat\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shortmessengerformat\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shortmessengerformat\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">Pictures:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($pictures != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_pictures\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_pictures\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_pictures\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_pictures\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">Checkpic:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($checkpic != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_checkpic\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_checkpic\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_checkpic\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_checkpic\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">ShrinkImages:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($shrinkimages != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shrinkimages\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shrinkimages\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shrinkimages\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shrinkimages\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">MaxXsize:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_maxXsize" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $maxXsize; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">MaxYsize:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_maxYsize" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $maxYsize; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">ShowSmileys:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($showsmileys != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showsmileys\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showsmileys\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showsmileys\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showsmileys\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
  <TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">ShowOptions:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($showoptions != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showoptions\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showoptions\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showoptions\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showoptions\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">ShowHelp:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($showhelp != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showhelp\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showhelp\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showhelp\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showhelp\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">ShortHelpFormat:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($shorthelpformat != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shorthelpformat\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shorthelpformat\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shorthelpformat\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_shorthelpformat\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">ShowLocation:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($showlocation != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showlocation\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showlocation\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showlocation\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_showlocation\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
  <TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">PreviewChecked:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($previewchecked != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_previewchecked\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_previewchecked\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_previewchecked\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_previewchecked\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
  <TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">EmotionChecked:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($emotionchecked != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_emotionchecked\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_emotionchecked\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_emotionchecked\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_emotionchecked\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
  <TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">NewDateOnEdit:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($newdateonedit != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_newdateonedit\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_newdateonedit\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_newdateonedit\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_newdateonedit\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">FixedTime:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_fixedtime" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $fixedtime; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">DateFormat:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($dateformat != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_dateformat\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">MM:DD:YY&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_dateformat\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">DD:MM:YY</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_dateformat\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">MM:DD:YY&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_dateformat\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">DD:MM:YY</FONT><P>";
		?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">Adminpassword:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_adminpass" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $login; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">Moderatorpassword:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="password" NAME="_moderatorpass" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $moderatorpass; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">AdminMail:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_adminmail" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="40" VALUE="<?php echo $adminmail; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">ModeratorMail:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_moderatormail" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="40" VALUE="<?php echo $moderatormail; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">PassForNewEntries:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
<?php
if($passfornewentries != 0)
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_passfornewentries\" CHECKED VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_passfornewentries\" VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
else
    echo "<FONT CLASS=\"normalcol\" SIZE=\"2\">&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_passfornewentries\" VALUE=\"1\" ONFOCUS=\"filter:blur()\">ON&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"_passfornewentries\" CHECKED VALUE=\"0\" ONFOCUS=\"filter:blur()\">OFF</FONT><P>";
?>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">Cookielifetime:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_cookielifetime" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $cookielifetime; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="right" WIDTH="50%">
		<FONT CLASS="normalcol" SIZE="2">DataPath:&nbsp;</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="top" WIDTH="50%">
		<INPUT TYPE="text" NAME="_datapath" SIZE="<?php echo $inputsize; ?>" MAXLENGTH="15" VALUE="<?php echo $datapath; ?>"><P>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" COLSPAN="2"><BR></TD>
	</TR>
	</TABLE>
	</TD>
	<TD CLASS="header" ROWSPAN="2" WIDTH="10%">&nbsp;</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" ALIGN= "center" VALIGN="middle" WIDTH="80%">
	<INPUT TYPE="submit" VALUE="Send" ONFOCUS="filter:blur()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<INPUT TYPE="reset" VALUE="Reset" ONFOCUS="filter:blur()">
	</TD></FORM>
</TR>
<TR CLASS="tableheader">
	<TD CLASS="header" COLSPAN="3" HEIGHT="8"><FONT SIZE="2">&nbsp;</FONT>
	</TD>
</TR>
</TABLE>
</BODY>
</HTML>