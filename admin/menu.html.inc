<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Guestbook - Administration</TITLE>
	<LINK HREF="../guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>
<BODY>
<TABLE BORDER="0" ALIGN="center" CELLPADDING="2" CELLSPACING="1" WIDTH="60%">
<TR CLASS="tableheader">
	<TD CLASS="header" COLSPAN="3" HEIGHT="40" VALIGN="top">
	<DIV ALIGN="left"><FONT CLASS="header" SIZE="5">Administrationmenu</DIV><P>
	</TD>
</TR>
<TR CLASS="tableheader">
	<TD CLASS="header" WIDTH="20%">&nbsp;</TD>
	<TD CLASS="normalcol">
	<TABLE BORDER="0" ALIGN="center" CELLPADDING="2" CELLSPACING="0" WIDTH="100%">
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" ALIGN="left" VALIGN="middle" WIDTH="20%">&nbsp;</TD>
		<TD CLASS="normalcol" ALIGN="left" VALIGN="middle" WIDTH="60%" NOWRAP="nowrap">
		<FONT CLASS="normalcol" SIZE="2"><P>
		<FORM ACTION="admin.php" METHOD="post"><BR>
		<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $login; ?>">
		<INPUT TYPE="radio" NAME="act" VALUE="changeentry" ONFOCUS="filter:blur()">&nbsp;Change Entry<P>
		<INPUT TYPE="radio" NAME="act" VALUE="deleteentry" ONFOCUS="filter:blur()">&nbsp;Delete Entry<P>
		<INPUT TYPE="radio" NAME="act" VALUE="deleterange" ONFOCUS="filter:blur()">&nbsp;Delete Range<P>
		<INPUT TYPE="radio" NAME="act" VALUE="editwordfilter" ONFOCUS="filter:blur()">&nbsp;Edit Wordfilterlist<P>
		<INPUT TYPE="radio" NAME="act" VALUE="editipfilter" ONFOCUS="filter:blur()">&nbsp;Edit IP-Filter<P>
		<INPUT TYPE="radio" NAME="act" VALUE="editignorefilter" ONFOCUS="filter:blur()">&nbsp;Edit Ignore-Filter<P>
<?php
global $adminpass;
if(md5($login) == $adminpass)
{
    #the following is only for admins visible
?>
		<INPUT TYPE="radio" NAME="act" VALUE="changeconfig" ONFOCUS="filter:blur()">&nbsp;Change Config<P>
		<INPUT TYPE="radio" NAME="act" VALUE="newdatabase" ONFOCUS="filter:blur()">&nbsp;Rebuild Database<P>
		<INPUT TYPE="radio" NAME="act" VALUE="resizeindex" ONFOCUS="filter:blur()">&nbsp;Resize Indexsize<P>
		<INPUT TYPE="radio" NAME="act" VALUE="rebuildindex" ONFOCUS="filter:blur()">&nbsp;Rebuild Indexfile<P>
		<INPUT TYPE="radio" NAME="act" VALUE="importcsv" ONFOCUS="filter:blur()">&nbsp;Import CSV-File<P>
<?php
}
?>
		<INPUT TYPE="radio" NAME="act" VALUE="deletecookie" ONFOCUS="filter:blur()">&nbsp;Delete Cookies</FONT><P>
		</TD>
		<TD CLASS="normalcol" ALIGN="center" VALIGN="middle" WIDTH="20%">&nbsp;</TD>
	</TR>
	<TR CLASS="tablerow2">
		<TD CLASS=header ALIGN=center COLSPAN=3 WIDTH=100%>
		<FONT CLASS="normalcol" SIZE="2"><INPUT TYPE="submit" VALUE="Send" ONFOCUS="filter:blur()"></FONT>
		</TD></FORM>
	</TR>
	</TABLE>
	</TD>
	<TD CLASS="header" WIDTH="20%">&nbsp;</TD>
</TR>
<TR CLASS=tableheader>
	<TD ALIGN=center CLASS=header COLSPAN=3 HEIGHT=8>
	<FONT CLASS="header" SIZE="2">[ <A CLASS="tablelink" HREF="../guestbook.php" ONFOCUS="filter:blur()">Exit</A> ]</FONT>
	</TD>
</TR>
</TABLE>
</BODY>
</HTML>