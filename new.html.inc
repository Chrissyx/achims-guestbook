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
    echo "        document.newentry.newicq.value = \"\";\n";
    echo "        document.newentry.newaim.value = \"\";\n";
  	echo "        document.newentry.newyim.value = \"\";\n";
  	echo "        document.newentry.newmsn.value = \"\";\n";
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

	function CreateHelp()
    {
		window.open("help.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>", "help", "dependent=yes, resizable=yes, scrollbars=yes, width=500, height=400");
	}
/* ]]> */
	</SCRIPT>
</HEAD>
<BODY onLoad="javascript:CheckLength(<?php echo $this->maxtext; ?>);">

<FORM NAME="newentry" ACTION="guestbook.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" METHOD="post">
<INPUT NAME="act" TYPE="hidden" VALUE="write">

<TABLE BORDER="0" ALIGN="center" CELLPADDING="3" CELLSPACING="1" WIDTH="70%">
<TR CLASS="tableheader">
	<TD ALIGN="left" CLASS="header" COLSPAN="2">
	<FONT SIZE="4" CLASS="header"><?php echo $this->messages[8]; ?></FONT>
	<?php if($this->shorthelpformat) { ?>
	<FONT SIZE="1" CLASS="header"><DIV ALIGN="right">[ <A CLASS="normlink" HREF="javascript:CreateHelp();" ONFOCUS="filter:blur();"><?php echo $this->messages[31]; ?></A> ]</DIV>
	<?php } ?>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="center" WIDTH="20%">
	<FONT SIZE="2"<?php	if($which == 1) echo " CLASS=\"attention\""; else echo " CLASS=\"normalcol\""; ?>><?php echo $this->messages[9]; ?></FONT>
	</TD>
	<TD CLASS="normalcol" WIDTH="80%">
	<FONT SIZE="2"><INPUT NAME="newname" <?php if($which != 0) echo "VALUE=\"$this->newname\" "; else echo "VALUE=\"$newname\" "; ?>SIZE="<?php echo $this->inputsize; ?>" MAXLENGTH="20"></FONT>
	</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT SIZE="2"<?php	if($which == 2)  echo " CLASS=\"attention\""; else echo " CLASS=\"normalcol\""; ?>><?php echo $this->messages[10]; ?></FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><INPUT NAME="newmail" <?php if($which != 0) echo "VALUE=\"$this->newmail\" "; else echo "VALUE=\"$newmail\" "; ?>SIZE="<?php echo $this->inputsize; ?>"></FONT>
	</TD>
</TR>
<?php
#include messengers
if($this->messengers != 0)
{
    require("messenger.html.inc");
}
if($this->showlocation != 0)
{
?>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT SIZE="2" CLASS="normalcol"><?php echo $this->messages[30]; ?></FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2">
<?php
    switch($this->language)
    {
        case "ger":
        require("location_ger.php");
	    break;

	    default:
	    require("location_eng.php");
        break;
    }

    asort($location);
    reset($location);

    echo "<SELECT name=\"newloc\" size=\"1\">";
    foreach($location as $key => $value)
    {
        if($which != 0)
        {
	        if($key == $this->newloc)
                echo "<OPTION SELECTED VALUE=\"$key\">$value</OPTION>";
            else
                echo "<OPTION VALUE=\"$key\">$value</OPTION>";
        }
        else
        {
            if($key == $newloc)
                echo "<OPTION SELECTED VALUE=\"$key\">$value</OPTION>";
            else
                echo "<OPTION VALUE=\"$key\">$value</OPTION>";
        }
    }
    echo "</SELECT>";
?>
	</FONT>
	</TD>
</TR>
<?php
}
?>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT SIZE="2" CLASS="normalcol"><?php echo $this->messages[11]; ?></FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><INPUT NAME="newurl" <?php if($which != 0) echo "VALUE=\"$this->newurl\" "; else echo "VALUE=\"$newurl\" "; ?>SIZE="<?php echo $this->inputsize; ?>" MAXLENGTH="100"></FONT>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="top">
	<FONT SIZE="2"<?php	if($which == 3) echo " CLASS=\"attention\""; else echo " CLASS=\"normalcol\""; ?>><?php echo $this->messages[12]; ?></FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><TEXTAREA COLS="<?php echo $this->textfieldsize; ?>" NAME="newtext" ROWS="10"><?php if($which != 0) echo str_replace("<BR>", "\n", $this->newtext); else echo str_replace("<BR>", "\n", $newtext); ?></TEXTAREA></FONT>
	</TD>
</TR>
<?php
if($this->showsmileys != 0)
{
?>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="top">
	<FONT SIZE="2" CLASS="normalcol"><?php echo $this->messages[23]; ?>:</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2">
<?php
    global $limitshownsmileylist;

    require("smileys.php");

    $smileylist = array_unique($smileylist);
    reset($smileylist);

    $count = 0;
    $lastvalue = 0;
    foreach($smileylist as $key => $value)
        if($count < $limitshownsmileylist)
        {
            if($count != 0 && ($count % 20) == 0)
                echo "<BR>";
	        if($value != $lastvalue)
                echo "<A HREF=\"javascript:SetSmiley('" . $key . "')\" ONFOCUS=\"filter:blur();\">" . stripslashes($value) . "</A>";
	        $lastvalue = $value;
	        $count++;
        }
?>
	</FONT>
	</TD>
</TR>
<?php
}
if($this->showoptions != 0)
{
?>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT SIZE="2" CLASS="normalcol"><?php echo $this->messages[13]; ?></FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2" CLASS="normalcol">
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
	&nbsp;<?php echo $this->messages[15]; ?></FONT>
	</TD>
</TR>
<?php
}
?>
<tr class="tablerow2">
 <td class="normalcol" style="vertical-align:middle;"><font size="2" class="normalcol">CAPTCHA</font></td>
 <td class="normalcol"><font size="2" class="normalcol"><input type="text" name="captcha" value="<?php if(isset($_POST['captcha'])) echo $_POST['captcha']; ?>"> &larr; Enter &quot;Hello&quot;</font></td>
</tr>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT SIZE="2" CLASS="normalcol">&nbsp;</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2" CLASS="normalcol">
	<INPUT TYPE="submit" VALUE="<?php echo $this->messages[16]; ?>" ONFOCUS="filter:blur()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<INPUT TYPE="reset" VALUE="<?php echo $this->messages[17]; ?>" ONFOCUS="filter:blur()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<INPUT TYPE="button" VALUE="<?php echo $this->messages[24]; ?>" ONCLICK="javascript:ClearText()"></FONT>
	</TD>
</TR>
<TR CLASS="tableheader">
	<TD ALIGN="middle" CLASS="header" COLSPAN="2" HEIGHT="8">
	<FONT SIZE="2" CLASS="header">
	[ <A CLASS="tablelink" HREF="guestbook.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" ONFOCUS="filter:blur()"><?php echo $this->messages[18]; ?></A> ]</FONT>
	</TD>
</TR>
</TABLE>
</FORM>

<?php
if($this->showhelp != 0)
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