<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE><?php echo $this->messages[7]; ?></TITLE>
	<?php echo $this->messages[32]; ?>
	<LINK HREF="guestbook.css" REL="stylesheet" TYPE="text/css">

	<SCRIPT TYPE="text/javascript">
/* <![CDATA[ */
	function SetSmiley(Which)
    {
  	    if(document.newentry.newtext.createTextRange)
        {
  		    document.newentry.newtext.focus();
  		    document.selection.createRange().duplicate().text = Which;
   	    }
        else
        {
  		    document.newentry.newtext.value += Which;
   	    }
    }

	function ClearText()
    {
<?php
if($this->messengers != 0)
{
    echo "\t\tdocument.newentry.newicq.value = \"\";\n";
    echo "\t\tdocument.newentry.newaim.value = \"\";\n";
  	echo "\t\tdocument.newentry.newyim.value = \"\";\n";
  	echo "\t\tdocument.newentry.newmsn.value = \"\";\n";
}
?>
  	    document.newentry.newname.value = "";
  	    document.newentry.newmail.value = "";
  	    document.newentry.newurl.value = "http://";
  	    document.newentry.newtext.value = "";
	}

	function CheckLength(max)
    {
		if(document.newentry.newtext.value.length > max)
        {
			alert("Maximal input characters reached!");
			document.newentry.newtext.value = document.newentry.newtext.value.substring(0, max);
		}
		window.setTimeout("CheckLength(<?php echo $this->maxtext; ?>)", 500);
	}
/* ]]> */
	</SCRIPT>
</HEAD>

<BODY onLoad="javascript:CheckLength(<?php echo $this->maxtext; ?>);">

<FORM NAME="newentry" ACTION="guestbook.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" METHOD="post">
<INPUT NAME="act" TYPE="hidden" VALUE="write">

<TABLE ALIGN="center" BORDER="0" CELLSPACING="0" CELLPADDING="1" MARGIN="1" WIDTH="90%">
<TR>
	<TD CLASS="border1">
	<TABLE ALIGN="center" BORDER="0" CELLSPACING="0" CELLPADDING="3" WIDTH="100%">
	<TR>
		<TD CLASS="border2">
		<TABLE>
		<TR>
			<TD WIDTH="1%"><DIV CLASS="header"><?php echo $this->messages[8]; ?></DIV></TD>
		</TR>
		</TABLE><P>
		<TABLE ALIGN="center">
		<TR>
			<TD>
			<DIV CLASS="text"><FONT<?php if($which == 1) echo " CLASS=\"attention\""; else echo " CLASS=\"text\""; ?>><?php echo $this->messages[9]; ?></FONT></DIV>
			</TD>
			<TD>
			<DIV CLASS="text"><INPUT NAME="newname" <?php if($which != 0) echo "VALUE=\"$this->newname\" "; else echo "VALUE=\"$newname\" "; ?>SIZE="<?php echo $this->inputsize; ?>" MAXLENGTH="20"></DIV>
			</TD>
		</TR>
		<TR>
			<TD>
			<DIV CLASS="text"><FONT<?php if($which == 2) echo " CLASS=\"attention\""; else  echo " CLASS=\"text\""; ?>><?php echo $this->messages[10]; ?></FONT></DIV>
			</TD>
			<TD>
			<DIV CLASS="text"><INPUT NAME="newmail" <?php if($which != 0) echo "VALUE=\"$this->newmail\" "; else echo "VALUE=\"$newmail\" "; ?>SIZE="<?php echo $this->inputsize; ?>"></FONT></DIV>
			</TD>
		</TR>
<?php
#include messengers
if($this->messengers != 0)
{
    require("messenger.html.inc");
}
?>
		<TR>
			<TD>
			<DIV CLASS="text"><?php echo $this->messages[11]; ?></DIV>
			</TD>
			<TD>
			<DIV CLASS="text"><INPUT NAME="newurl" <?php if($which != 0) echo "VALUE=\"$this->newurl\" "; else echo "VALUE=\"$newurl\" "; ?>SIZE="<?php echo $this->inputsize; ?>" MAXLENGTH="100" VALUE="http://"></DIV>
			</TD>
		</TR>
		<TR>
			<TD>
			<DIV CLASS="text"><FONT<?php if($which == 3) echo " CLASS=\"attention\""; else echo " CLASS=\"text\""; ?>><?php echo $this->messages[12]; ?></FONT></DIV>
			</TD>
			<TD>
			<DIV CLASS="text"><TEXTAREA COLS="<?php echo $this->textfieldsize; ?>" NAME="newtext" ROWS="10"><?php if($which != 0) echo str_replace("<BR>", "\n", $this->newtext); else echo str_replace("<BR>", "\n", $newtext); ?></TEXTAREA></DIV>
			</TD>
		</TR>
		<?php if($this->showsmileys != 0) { ?>
		<TR>
			<TD>
			<DIV CLASS="text"><?php echo $this->messages[23]; ?></DIV>
			</TD>
			<TD>
			<DIV CLASS="text">
<?php
require("smileys.php");

reset($smileylist);

$count = 0;
foreach($smileylist as $key => $value)
{
    if($count != 0 && ($count % 20) == 0)
        echo "<BR>";
    echo "<A HREF=\"javascript:SetSmiley('" . $key . "')\" ONFOCUS=\"filter:blur()\">" . stripslashes($value) . "</A>";
    $count++;
}
?>
			</DIV>
			</TD>
		</TR>
		<?php } if($this->showoptions != 0) { ?>
		<TR>
			<TD>
			<DIV CLASS="text"><?php echo $this->messages[13]; ?></DIV>
			</TD>
			<TD>
			<DIV CLASS="text">
<?php
if($this->previewchecked != 0)
    echo "<INPUT TYPE=\"checkbox\" NAME=\"pre\" CHECKED VALUE=\"yes\" ONFOCUS=\"filter:blur()\">";
else
    echo "<INPUT TYPE=\"checkbox\" NAME=\"pre\" VALUE=\"yes\" ONFOCUS=\"filter:blur()\">";
?>
			&nbsp;<?php echo $this->messages[14]; ?>&nbsp;&nbsp;&nbsp;
<?php
if($this->emotionchecked != 0)
    echo "<INPUT TYPE=\"checkbox\" NAME=\"emotion\" CHECKED VALUE=\"yes\" ONFOCUS=\"filter:blur()\">";
else
    echo "<INPUT TYPE=\"checkbox\" NAME=\"emotion\" VALUE=\"yes\" ONFOCUS=\"filter:blur()\">";
?>
			&nbsp;<?php echo $this->messages[15]; ?></DIV>
			</TD>
		</TR>
		<?php } ?>
		<TR>
			<TD>
			<DIV CLASS="text">&nbsp;</DIV>
			</TD>
			<TD>
			<DIV CLASS="text">
			<INPUT TYPE="submit" VALUE="<?php echo $this->messages[16]; ?>" ONFOCUS="filter:blur()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<INPUT TYPE="reset" VALUE="<?php echo $this->messages[17]; ?>" ONFOCUS="filter:blur()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<INPUT TYPE="button" VALUE="<?php echo $this->messages[24]; ?>" ONCLICK="javascript:ClearText()"></DIV>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN="2">
			<DIV CLASS="text1"><P><BR>
			[ <A HREF="guestbook.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" ONFOCUS="filter:blur()"><?php echo $this->messages[18]; ?></A> ]</DIV>
			</TD>
		</TR>
		</TABLE>
		</TD>
	</TR>
	</TABLE>
	</TD>
</TR>
</TABLE>

</FORM>

<?php
if($this->showhelp)
{
    #include the helpfile
    if(isset($this->language) && file_exists('help_' . $this->language . '.html.inc'))
        include('help_' . $this->language . '.html.inc');
    elseif(file_exists('help_eng.html.inc'))
        include('help_eng.html.inc');
}
?>
</BODY>
</HTML>