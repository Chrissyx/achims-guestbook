<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<HTML>
<HEAD>
	<TITLE>Guestbook - Delete Entry</TITLE>
	<LINK HREF="../guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>

<BODY>

<TABLE ALIGN="center" BORDER="0" CELLPADDING="10" CELLSPACING="1" WIDTH="60%" HEIGHT="30%">
<TR ALIGN="center">
	<TD COLSPAN="2" VALIGN="middle">
	<FONT CLASS="attention" SIZE="4">Are you sure that you want delete entry: <?php echo $entry; ?><P>
	<B>Continue?</B></FONT>
	</TD>
</TR>
<TR>
	<TD ALIGN="right" WIDTH="50%">
	<FORM ACTION="admin.php<?php global $lang; if (isset($lang)) echo "?lang=".$lang; ?>" METHOD="post">
	<INPUT TYPE="hidden" NAME="act" VALUE="<?php echo $act; ?>">
	<INPUT TYPE="hidden" NAME="entry" VALUE="<?php echo $entry; ?>">
	<INPUT TYPE="hidden" NAME="page" VALUE="<?php echo $page; ?>">
	<INPUT TYPE="hidden" NAME="warning" VALUE="1">			
	<INPUT TYPE="submit" VALUE="Yes" ONFOCUS="filter:blur()">
	</TD></FORM>
	<TD ALIGN="left" WIDTH="50%"><FORM ACTION="admin.php<?php global $lang; if (isset($lang)) echo "?lang=".$lang; ?>" METHOD="post">
	<INPUT TYPE="hidden" NAME="act" VALUE="<?php echo $act; ?>">
	<INPUT TYPE="hidden" NAME="entry" VALUE="<?php echo $entry; ?>">
	<INPUT TYPE="hidden" NAME="page" VALUE="<?php echo $page; ?>">
	<INPUT TYPE="hidden" NAME="warning" VALUE="0">	
	<INPUT TYPE="submit" VALUE="No" ONFOCUS="filter:blur()">
	</TD></FORM>
</TR>
</TABLE>

</BODY>
</HTML>