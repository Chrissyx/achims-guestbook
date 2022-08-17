<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<?php echo $this->messages[32]; ?>
	<TITLE><?php echo $this->messages[26]; ?></TITLE>
	<LINK HREF="guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>
<BODY>
<TABLE BORDER="0" ALIGN="center" VALIGN="middle" CELLPADDING="10" CELLSPACING="1" WIDTH="70%" HEIGHT="100%">
<TR HEIGHT="50%">
	<TD ALIGN="center" VALIGN="bottom" WIDTH="50%">
	<FONT SIZE="4" CLASS="attention"><?php echo $this->messages[28]; ?></FONT><P>
	<FORM ACTION="guestbook.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" METHOD="post">
	<INPUT TYPE="hidden" NAME="act" VALUE="search">
	<INPUT TYPE="hidden" NAME="what" VALUE="search">
	<INPUT TYPE="hidden" NAME="page" VALUE="<?php echo ($page + 1); ?>">
	<INPUT TYPE="text" NAME="phrase" SIZE="
<?php
if(strstr(getenv("HTTP_USER_AGENT"), "MSIE"))
{
    echo "50";
}
else
{
    echo "35";
}
?>
	" MAXLENGTH="50" <?php if(isset($phrase)) echo "VALUE=\"".$phrase."\""; ?>><BR>
	<FONT CLASS="normalcol">
	<INPUT TYPE="checkbox" <?php if($next == "yes") echo "CHECKED"; ?> NAME="next" VALUE="<?php echo $next; ?>" ONFOCUS="filter:blur()">&nbsp;<?php echo $this->messages[27]; ?><BR>
	</FONT>
	</TD>
</TR>
<TR HEIGHT="50%">
	<TD ALIGN="center" VALIGN="top" WIDTH="50%">
	<INPUT TYPE="submit" VALUE="Search" ONFOCUS="filter:blur()">&nbsp;
	<INPUT TYPE="reset" VALUE="Reset" ONFOCUS="filter:blur()"></FORM>
	</TD>
</TR>
<TR>
	<TD ALIGN="middle" COLSPAN="2" HEIGHT="8">
	<FONT SIZE="2" CLASS="header">
	[ <A CLASS="tablelink" HREF="guestbook.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" ONFOCUS="filter:blur()"><?php echo $this->messages[18]; ?></A> ]</FONT>
	</TD>
</TR>
</TABLE>
</BODY>
</HTML>