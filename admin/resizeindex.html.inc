<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<HTML>
<HEAD>
	<TITLE>Guestbook - Resize Indexsize</TITLE>
	<LINK HREF="../guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>

<BODY>

<FORM ACTION="admin.php" METHOD="post">
<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $login; ?>">
<INPUT TYPE="hidden" NAME="act" VALUE="<?php echo $act; ?>">

<TABLE BORDER="0" ALIGN="center" CELLPADDING="3" CELLSPACING="1" WIDTH="50%">
<TR CLASS="tableheader">
	<TD ALIGN="left" CLASS="header" COLSPAN="2">
	<FONT CLASS="header" SIZE="4">Resize Indexsize</FONT>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="center" WIDTH="35%">
	<FONT CLASS="normalcol" SIZE="2">Old Indexsize</FONT>
	</TD>
	<TD CLASS="normalcol" WIDTH="65%">
	<FONT SIZE="2"><INPUT NAME="oldindex" SIZE="<?php echo $inputsize; ?>" VALUE="<?php echo $indexsize; ?>" disabled></FONT>
	</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="center" WIDTH="35%">
	<FONT CLASS="normalcol" SIZE="2">New Indexsize</FONT>
	</TD>
	<TD CLASS="normalcol" WIDTH="65%">
	<FONT SIZE="2"><INPUT NAME="newindex" SIZE="<?php echo $inputsize; ?>"></FONT>
	</TD>
</TR>
<TR CLASS="tablerow1">
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