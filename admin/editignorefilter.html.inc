<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Guestbook - Edit IP-Filter</TITLE>
	<LINK HREF="../guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>
<BODY>
<FORM ACTION="admin.php" METHOD="post">
<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $login; ?>">
<INPUT TYPE="hidden" NAME="act" VALUE="<?php echo $act; ?>">
<INPUT TYPE="hidden" NAME="do" VALUE="write">

<TABLE BORDER="0" ALIGN="center" CELLPADDING="3" CELLSPACING="1" WIDTH="70%">
<TR CLASS="tableheader">
	<TD ALIGN="left" CLASS="header" COLSPAN="2">
	<FONT CLASS="header" SIZE="4">Edit Ignore-Filter</FONT>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="top">
	<FONT CLASS="normalcol" SIZE="2">Ignore-Filter</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><TEXTAREA COLS="<?php echo $textfieldsize + 10; ?>" NAME="ignorefilter" ROWS="20"><?php echo $filter; ?></TEXTAREA></FONT>
	</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT SIZE="2">&nbsp;</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><INPUT TYPE="submit" VALUE="Send" ONFOCUS="filter:blur()"></FONT>
	</TD></FORM>
</TR>
<TR CLASS="tableheader">
	<TD ALIGN="middle" CLASS="header" COLSPAN="2" HEIGHT="8">
	<FONT SIZE="2">&nbsp;</FONT>
	</TD>
</TR>
</TABLE>
</BODY>
</HTML>