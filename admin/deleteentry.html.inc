<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Guestbook - Delete Entry</TITLE>
	<LINK HREF="../guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>
<BODY>
<FORM ACTION="admin.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" METHOD="post">
<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $login; ?>">
<INPUT TYPE="hidden" NAME="act" VALUE="<?php echo $act; ?>">

<TABLE BORDER="0" ALIGN="center" CELLPADDING="3" CELLSPACING="1" WIDTH="50%">
<TR CLASS="tableheader">
	<TD ALIGN="left" CLASS="header" COLSPAN="2">
	<FONT CLASS="header" SIZE="4">Delete Entry</FONT>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="center" WIDTH="20%">
	<FONT CLASS="normalcol" SIZE="2">Entry</FONT>
	</TD>
	<TD CLASS="normalcol" WIDTH="80%">
	<FONT SIZE="2"><INPUT NAME="entry" SIZE="<?php echo $inputsize; ?>"></FONT>
	</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT SIZE="2">&nbsp;</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><INPUT TYPE="submit" VALUE="Send" ONFOCUS="filter:blur()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<INPUT TYPE="reset" VALUE="Reset" ONFOCUS="filter:blur()"></FONT>
	</TD>
</TR>
<TR CLASS="tableheader">
	<TD ALIGN="middle" CLASS="header" COLSPAN="2" HEIGHT="8">
	<FONT SIZE="2">&nbsp;</FONT>
	</TD>
</TR>
</TABLE></FORM>
</BODY>
</HTML>