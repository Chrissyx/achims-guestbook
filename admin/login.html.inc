<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<HTML>
<HEAD>
	<TITLE>Guestbook - Administration</TITLE>
	<LINK HREF="../guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>

<BODY>

<TABLE BORDER="0" ALIGN="center" VALIGN="middle" CELLPADDING="10" CELLSPACING="1" WIDTH="70%" HEIGHT="100%">
<TR HEIGHT="50%">
	<TD WIDTH="35%"></TD>
	<TD ALIGN="center" VALIGN="bottom" WIDTH="30%">
	<FORM ACTION="admin.php" METHOD="post">
	<INPUT TYPE="password" NAME="login" SIZE="<?php echo $inputsize; ?>"><BR>
	</TD>
	<TD ALIGN="left" VALIGN="bottom" WIDTH="35%">
	<INPUT TYPE="checkbox" NAME="store" CHECKED VALUE="yes" ONFOCUS="filter:blur()">&nbsp;
	<FONT CLASS="normalcol">store password</FONT><BR>
	</TD>
</TR>
<TR HEIGHT="50%">
	<TD WIDTH="35%"></TD>
	<TD ALIGN="center" VALIGN="top" WIDTH="30%">
	<INPUT TYPE="submit" VALUE="Send" ONFOCUS="filter:blur()">&nbsp;
	<INPUT TYPE="reset" VALUE="Reset" ONFOCUS="filter:blur()"></FORM>
	</TD>
	<TD WIDTH="35%"></TD>
</TR>
</TABLE>

</BODY>
</HTML>