<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Guestbook - Change Entry</TITLE>
	<LINK HREF="../guestbook.css" REL="stylesheet" TYPE="text/css">

	<SCRIPT TYPE="text/javascript">
/* <![CDATA[ */
	function SetSmiley(Which)
    {
   		document.changeentry.newtext.value = document.changeentry.newtext.value + Which;
	}
/* ]]> */
	</SCRIPT>
</HEAD>
<BODY>
<FORM NAME="changeentry" ACTION="admin.php<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" METHOD="post">
<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $login; ?>">
<INPUT TYPE="hidden" NAME="act" VALUE="<?php echo $act; ?>">
<INPUT TYPE="hidden" NAME="entry" VALUE="<?php echo $entry; ?>">
<INPUT TYPE="hidden" NAME="newip" VALUE="<?php echo $ip; ?>">
<INPUT TYPE="hidden" NAME="newdate" VALUE="<?php echo $date; ?>">
<INPUT TYPE="hidden" NAME="do" VALUE="write">
<INPUT TYPE="hidden" NAME="datapos" VALUE="<?php echo $datapos; ?>">
<INPUT TYPE="hidden" NAME="page" VALUE="<?php echo $page; ?>">

<TABLE BORDER="0" ALIGN="center" CELLPADDING="3" CELLSPACING="1" WIDTH="70%">
<TR CLASS="tableheader">
	<TD ALIGN="left" CLASS="header" COLSPAN="2">
	<FONT CLASS="header" SIZE="4">Change Entry</FONT>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="center" WIDTH="20%">
	<FONT CLASS="normalcol" SIZE="2">Name</FONT>
	</TD>
	<TD CLASS="normalcol" WIDTH="80%">
	<FONT SIZE="2"><INPUT NAME="newname" VALUE="<?php echo $name; ?>" SIZE="<?php echo $inputsize1; ?>"></FONT>
	</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT CLASS="normalcol" SIZE="2">E-Mail</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><INPUT NAME="newmail" VALUE="<?php echo $mail; ?>" SIZE="<?php echo $inputsize1; ?>"></FONT>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT CLASS="normalcol" SIZE="2">ICQ</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><INPUT NAME="newicq" VALUE="<?php echo $icq; ?>" SIZE="<?php echo $inputsize1; ?>"></FONT>
	</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT CLASS="normalcol" SIZE="2">AIM</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><INPUT NAME="newaim" VALUE="<?php echo $aim; ?>" SIZE="<?php echo $inputsize1; ?>"></FONT>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT CLASS="normalcol" SIZE="2">YIM</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><INPUT NAME="newyim" VALUE="<?php echo $yim; ?>" SIZE="<?php echo $inputsize1; ?>"></FONT>
	</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT CLASS="normalcol" SIZE="2">MSN</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><INPUT NAME="newmsn" VALUE="<?php echo $msn; ?>" SIZE="<?php echo $inputsize1; ?>"></FONT>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT CLASS="normalcol" SIZE="2">Location</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2">
<?php
switch($this->language)
{
    case "ger":
	require("../location_ger.php");
	break;

    default:
	require("../location_eng.php");
    break;
}

asort($location);
reset($location);

echo "<SELECT name=\"newloc\" size=\"1\">";
foreach($location as $key => $value)
{
    if($key == $loc)
        echo "<OPTION SELECTED VALUE=\"$key\">$value</OPTION>";
    else
        echo "<OPTION VALUE=\"$key\">$value</OPTION>";
}
echo "</SELECT>";
?>
	</FONT>
	</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT CLASS="normalcol" SIZE="2">Homepage</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><INPUT NAME="newurl" VALUE="<?php echo $url; ?>" SIZE="<?php echo $inputsize1; ?>"></FONT>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="top">
	<FONT CLASS="normalcol" SIZE="2">Text</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><TEXTAREA COLS="<?php echo $textfieldsize; ?>" NAME="newtext" ROWS="20"><?php echo $text; ?></TEXTAREA></FONT>
	</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="top">
	<FONT SIZE="2" CLASS="normalcol">Smileys:</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2">
<?php
global $limitshownsmileylist;

require("../smileys.php");

reset($smileylist);

$count = 0;
while((list($key, $value) = each($smileylist)) && ($count < $limitshownsmileylist))
{
    if($count != 0 && ($count % 20) == 0)
        echo "<BR>";
    echo "<A HREF=\"javascript:SetSmiley('" . $key . "')\" ONFOCUS=\"filter:blur()\">" . str_replace("gif/", "../gif/", stripslashes($value)) . "</A>";
    $count++;
}
?>
	</FONT>
	</TD>
</TR>
<TR CLASS="tablerow1">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT CLASS="normalcol" SIZE="2">Options</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT CLASS="normalcol" SIZE="2"><INPUT TYPE="checkbox" NAME="emotion" CHECKED VALUE="yes" ONFOCUS="filter:blur()">&nbsp;Emotions</FONT>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<FONT CLASS="normalcol" SIZE="2"><INPUT TYPE="checkbox" NAME="signature" CHECKED VALUE="yes" ONFOCUS="filter:blur()">&nbsp;Signature</FONT>
	</TD>
</TR>
<TR CLASS="tablerow2">
	<TD CLASS="normalcol" VALIGN="center">
	<FONT SIZE="2">&nbsp;</FONT>
	</TD>
	<TD CLASS="normalcol">
	<FONT SIZE="2"><INPUT TYPE="submit" VALUE="Send" ONFOCUS="filter:blur()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<INPUT TYPE="reset" VALUE="Reset" ONFOCUS="filter:blur()"></FONT>
	</TD>
</TR>
<TR CLASS="tableheader">
	<TD ALIGN="middle" CLASS="header" COLSPAN="2" HEIGHT="8">
	<FONT CLASS="header" SIZE="2">[ <A CLASS="tablelink" HREF="admin.php" ONFOCUS="filter:blur()">Back</A> ]</FONT>
	</TD>
</TR>
</TABLE></FORM>

<?php
if(file_exists("help_eng.html.inc"))
    include("help_eng.html.inc");
?>
</BODY>
</HTML>