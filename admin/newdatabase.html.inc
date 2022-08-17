<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Guestbook - Rebuild Database</TITLE>
	<LINK HREF="../guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>
<BODY>
<TABLE ALIGN="center" BORDER="0" CELLPADDING="10" CELLSPACING="1" WIDTH="60%" HEIGHT="30%">
<TR ALIGN="center">
	<TD COLSPAN="2" VALIGN="middle">
	<FONT CLASS="attention" SIZE="4">Please make a backup if you want to rebuild the database!<BR>
	It is possible that you lose all your data if you don't do that before!<P>
	<B>Continue?</B></FONT>
	</TD>
</TR>
<TR>
	<TD ALIGN="right" WIDTH="50%">
	<FORM ACTION="admin.php" METHOD="post">
	<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $login; ?>">
	<INPUT TYPE="hidden" NAME="act" VALUE="<?php echo $act; ?>">
	<INPUT TYPE="hidden" NAME="do" VALUE="write">
	<INPUT TYPE="submit" VALUE="Yes" ONFOCUS="filter:blur()">
	</TD></FORM>
	<TD ALIGN="left" WIDTH="50%">
	<FORM ACTION="admin.php" METHOD="post">
	<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $login; ?>">
	<INPUT TYPE="submit" VALUE="No" ONFOCUS="filter:blur()">
	</TD></FORM>
</TR>
</TABLE>
</BODY>
</HTML>