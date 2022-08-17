<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Guestbook - Save Cookie</TITLE>
	<LINK HREF="../guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>
<BODY>
<TABLE ALIGN="center" BORDER="0" CELLPADDING="10" CELLSPACING="1" WIDTH="60%" HEIGHT="30%">
<TR ALIGN="center">
	<TD COLSPAN="2" VALIGN="middle">
	<FONT CLASS="attention" SIZE="4">Are you sure that you want to store the admincookie on this computer?<P></FONT>
	</TD>
</TR>
<TR>
	<TD ALIGN="right" WIDTH="50%">
	<FORM ACTION="admin.php" METHOD="post">
	<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $login; ?>">
	<INPUT TYPE="hidden" NAME="do" VALUE="store">
	<INPUT TYPE="submit" VALUE="Yes" ONFOCUS="filter:blur()">
	</TD></FORM>
	<TD ALIGN="left" WIDTH="50%">
	<FORM ACTION="admin.php" METHOD="post">
	<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $login; ?>">
	<INPUT TYPE="hidden" NAME="do" VALUE="nostore">
	<INPUT TYPE="submit" VALUE="No" ONFOCUS="filter:blur()">
	</TD></FORM>
</TR>
</TABLE>
</BODY>
</HTML>