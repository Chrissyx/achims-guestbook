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
	<TD ALIGN="middle" VALIGN="bottom">
	<FONT SIZE="5" CLASS="attention"><?php echo $this->messages[29]; ?></FONT>
	</TD>
</TR>
<TR HEIGHT="50%">
	<TD ALIGN="middle" VALIGN="bottom" HEIGHT="8">
	<FONT SIZE="2" CLASS="header">
	[ <A CLASS="tablelink" HREF="guestbook.php?act=search<?php global $lang; if(isset($lang)) echo "&lang=" . $lang; ?>" ONFOCUS="filter:blur()"><?php echo $this->messages[25]; ?></A> ]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	[ <A CLASS="tablelink" HREF="guestbook.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" ONFOCUS="filter:blur()"><?php echo $this->messages[18]; ?></A> ]</FONT>
	</TD>
</TR>
</TABLE>
</BODY>
</HTML>