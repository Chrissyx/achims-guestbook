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
<TABLE ALIGN="center" BORDER="0" CELLSPACING="0" CELLPADDING="1" MARGIN="1" WIDTH="90%">
<TR>
	<TD CLASS="border1">
	<TABLE ALIGN="center" BORDER="0" CELLSPACING="0" CELLPADDING="3" WIDTH="100%">
	<TR>
		<TD CLASS="border2">
		<TABLE>
		<TR>
			<TD WIDTH="1%">
			<DIV CLASS="header"><?php echo $this->messages[14]; ?></DIV>
			</TD>
		</TR>
		</TABLE>
		<TABLE ALIGN="center" CELLSPACING="1" CELLPADDING="3" WIDTH="100%" BORDER="0">
		<TR>
     		<TD CLASS="table1">
        	<DIV CLASS="number">1</DIV><P>
        	<DIV CLASS="name"><?php echo $newname; ?><P><BR>
<?php
if($newmail != "")
    echo "<A HREF=\"mailto:$newmail\"><IMG BORDER=\"0\" SRC=\"gif/email.gif\" HEIGHT=\"16\" WIDTH=\"33\"></IMG></A>";
if($newurl != "")
    echo "&nbsp;&nbsp;<A HREF=\"$newurl\" TARGET=\"_blank\"><IMG BORDER=\"0\" SRC=\"gif/home.gif\" HEIGHT=\"16\" WIDTH=\"32\"></IMG></A><BR>";
if($newicq != "")
    echo "<A HREF=\"https://icq.com/people/$newicq\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/icq.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\"></IMG></A>";
if($newaim != "")
    echo "&nbsp;&nbsp;<A HREF=\"aim:goim?screenname=$newaim\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/aim.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\"></IMG></A>";
if($newyim != "")
    echo "&nbsp;&nbsp;<A HREF=\"http://edit.yahoo.com/config/send_webmesg?.target=$newyim&.src=pg\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/yim.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\"></IMG></A>";
if($newmsn != "")
    echo "&nbsp;&nbsp;<A HREF=\"javascript:void(0);\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/msn.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"$newmsn\"></IMG></A><BR>";
?>
					</DIV>
        	</TD>
        	<TD CLASS="table2">
        	<DIV CLASS="number"><?php echo $newdate; ?></DIV>
        	<HR>
        	<DIV CLASS="text"><?php echo $newtext; ?></DIV>
			</TD>
		</TR>
		<TR>
			<TD>&nbsp;</TD>
			<TD>
			<TABLE BORDER="0" ALIGN="left" CELLPADDING="2" CELLSPACING="1" WIDTH="100%">
			<TR>
				<TD WIDTH="20%">
				<FORM ACTION="guestbook.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" METHOD="post">
				<INPUT TYPE="hidden" NAME="act" VALUE="write">
				<INPUT TYPE="hidden" NAME="pre" VALUE="yes">
				<INPUT TYPE="hidden" NAME="presave" VALUE="yes">
				<INPUT TYPE="hidden" NAME="emotion" VALUE="<?php echo $this->emotion; ?>">
				<INPUT TYPE="hidden" NAME="random" VALUE="<?php echo $random; ?>">
				<INPUT TYPE="submit" VALUE="<?php echo $this->messages[16]; ?>" ONFOCUS="filter:blur()">&nbsp;&nbsp;&nbsp;&nbsp;
				</TD></FORM>
				<TD WIDTH="80%">
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
				<INPUT TYPE="submit" VALUE="<?php echo $this->messages[17]; ?>" ONFOCUS="filter:blur()">
				</TD></FORM>
			</TR>
			</TABLE>
			</TD>
		</TR>
		</TABLE>
		</TD>
	</TR>
	</TABLE>
	</TD>
</TR>
</TABLE>
</BODY>
</HTML>