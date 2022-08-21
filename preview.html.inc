<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<?php echo $this->messages[32]; ?>
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
	<META HTTP-EQUIV="Expires" CONTENT="0">
	<TITLE><?php echo $this->messages[19]; ?></TITLE>
	<LINK HREF="guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>
<BODY>
<TABLE BORDER="0" ALIGN="center" CELLPADDING="2" CELLSPACING="1" WIDTH="80%">
<TR CLASS="tableheader">
	<TD CLASS="header" COLSPAN="2" HEIGHT="40" VALIGN="top">
	<DIV ALIGN="left"><FONT SIZE="5" CLASS="header"><?php echo $this->messages[14]; ?>, </FONT>
	<FONT SIZE="1" CLASS="header"><?php echo $this->messages[1] . " 1 " . $this->messages[2]; ?></FONT></DIV>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="top" WIDTH="30%" NOWRAP="nowrap">
	<FONT CLASS="number" SIZE="1">1</FONT><BR>
	<FONT CLASS="normalcol" SIZE="2"><?php echo $newdate; ?><BR>
	<DIV CLASS="fat"><?php echo $newname; ?></DIV></FONT>
	<FONT CLASS="normalcol" style="font-size: 8pt;">
<?php
switch($this->language)
{
    case "ger":
	require("location_ger.php");
	break;

	default:
	require("location_eng.php");
    break;
}

if($newloc != 0)
    echo $location[$newloc];
?>
	</FONT><FONT SIZE="1px"><DIV><BR></DIV></FONT>
<?php
if($newmail != "")
    echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"mailto:$newmail\"><IMG BORDER=\"0\" SRC=\"gif/email.gif\" HEIGHT=\"16\" WIDTH=\"33\"></IMG>&nbsp;</A></FONT>";
if($newurl != "")
    echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" href=\"$newurl\" TARGET=\"_blank\"><IMG BORDER=\"0\" SRC=\"gif/home.gif\" HEIGHT=\"16\" WIDTH=\"32\"></IMG></A></FONT>";
if(($newicq != "" || $newaim != "" || $newyim != "" || $newmsn != "") && ($newmail != "" || $newurl != ""))
    echo "<BR>";
if($this->shortmessengerformat == 1)
{
    if($newicq != "")
        echo "<A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"https://icq.com/people/$newicq\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/icq.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"$newicq\"></IMG></A>&nbsp;";
    if($newaim != "")
        echo "<A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"aim:goim?screenname=$newaim\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/aim.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"$newaim\"></IMG></A>&nbsp;";
    if($newyim != "")
        echo "<A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"http://edit.yahoo.com/config/send_webmesg?.target=$newyim&.src=pg\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/yim.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"$newyim\"></IMG></A>&nbsp;";
    if($newmsn != "")
        echo "<A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"mailto:$newmsn\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/msn.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"$newmsn\"></IMG></A><BR>";
}
else
{
    if($newicq != "")
        echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"https://icq.com/people/$newicq\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/icq.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"ICQ\">&nbsp;$newicq</IMG></A></FONT><BR>";
    if($newaim != "")
        echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"aim:goim?screenname=$newaim\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/aim.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"AIM\">&nbsp;$newaim</IMG></A></FONT><BR>";
    if($newyim != "")
        echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"http://edit.yahoo.com/config/send_webmesg?.target=$newyim&.src=pg\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/yim.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"YIM\">&nbsp;$newyim</IMG></A></FONT><BR>";
    if($newmsn != "")
        echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"mailto:$newmsn\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/msn.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"MSN\">&nbsp;$newmsn</IMG></A></FONT><BR>";
}
?>
	</TD>
	<TD CLASS="normalcol" VALIGN="top" WIDTH="70%">
	<FONT SIZE="2" CLASS="normalcol"><?php echo $newtext; ?><BR></FONT>
	</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="top">
	<FONT SIZE="2">&nbsp;</FONT>
	</TD>
	<TD CLASS="normalcol">
	<TABLE BORDER="0" ALIGN="left" CELLPADDING="2" CELLSPACING="1" WIDTH="100%">
	<TR CLASS="tablerow2">
		<TD CLASS="normalcol" WIDTH="20%">
		<FONT CLASS="header" SIZE="2">
		<FORM ACTION="guestbook.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" METHOD="post">
		<INPUT TYPE="hidden" NAME="act" VALUE="write">
		<INPUT TYPE="hidden" NAME="pre" VALUE="yes">
		<INPUT TYPE="hidden" NAME="presave" VALUE="yes">
		<INPUT TYPE="hidden" NAME="emotion" VALUE="<?php echo $this->emotion; ?>">
		<INPUT TYPE="hidden" NAME="random" VALUE="<?php echo $random; ?>">
        <INPUT TYPE="hidden" NAME="captcha" VALUE="<?php echo $_POST['captcha']; ?>">
		<INPUT TYPE="submit" VALUE="<?php echo $this->messages[16]; ?>" ONFOCUS="filter:blur()">&nbsp;&nbsp;&nbsp;&nbsp;</FONT>
		</TD></FORM>
		<TD CLASS="normalcol" WIDTH="80%">
		<FONT CLASS="header" SIZE="2">
		<FORM ACTION="guestbook.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" METHOD="post">
		<INPUT TYPE="hidden" NAME="act" VALUE="new">
		<INPUT TYPE="hidden" NAME="newname" VALUE="<?php echo $this->newname; ?>">
		<INPUT TYPE="hidden" NAME="newmail" VALUE="<?php echo $this->newmail; ?>">
		<INPUT TYPE="hidden" NAME="newurl" VALUE="<?php echo $this->newurl; ?>">
		<INPUT TYPE="hidden" NAME="newicq" VALUE="<?php echo $this->newicq; ?>">
		<INPUT TYPE="hidden" NAME="newaim" VALUE="<?php echo $this->newaim; ?>">
		<INPUT TYPE="hidden" NAME="newyim" VALUE="<?php echo $this->newyim; ?>">
		<INPUT TYPE="hidden" NAME="newmsn" VALUE="<?php echo $this->newmsn; ?>">
		<INPUT TYPE="hidden" NAME="newloc" VALUE="<?php echo $this->newloc; ?>">
		<INPUT TYPE="hidden" NAME="newtext" VALUE="<?php echo $this->newtext; ?>">
        <INPUT TYPE="hidden" NAME="captcha" VALUE="<?php echo $_POST['captcha']; ?>">
		<INPUT TYPE="submit" VALUE="<?php echo $this->messages[17]; ?>" ONFOCUS="filter:blur()"></FONT>
		</TD></FORM>
	</TR>
	</TABLE>
	</TD>
</TR>
<TR CLASS="tableheader">
	<TD CLASS="header" COLSPAN="2" HEIGHT="8">
	<FONT SIZE="2">&nbsp;</FONT>
	</TD>
</TR>
</TABLE>
</BODY>
</HTML>