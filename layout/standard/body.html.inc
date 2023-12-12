<TR CLASS="
<?php
global $phrase;

$entrypos = explode(":", $this->entrypos);
if(in_array($entrynum, $entrypos))
{
    echo "searchresult\">";

    $words = explode(" " , trim(strtolower($phrase)));
	$dummy[0] = $date[$i];
	$dummy[1] = $name[$i];
	$dummy[2] = $text[$i];
	foreach($words as $word)
    {
	    for($n = 0; $n < 3; $n++)
        {
		    $lastposition = 0;

			while(is_integer($position = strpos(strtolower($dummy[$n]), $word, $lastposition)) && $position >= 0)
            {
			    $firstpart = substr($dummy[$n], 0, $position);
				$secondpart = substr($dummy[$n], $position + 1);
				if(!(substr_count($firstpart, "<") > substr_count($firstpart, ">") && substr_count($secondpart, ">") > substr_count($secondpartpart, "<")))
                {
				    if(!(((strrpos($firstpart, "&") === false) ? 0 : strrpos($firstpart, "&")) > ((strrpos($firstpart, ";") === false) ? 0 : strrpos($firstpart, ";"))
                        && ((stristr($secondpart, "&") === false) ? 0 : stristr($secondpart, "&")) < ((stristr($secondpart, ";") === false) ? 0 : stristr($secondpart, ";"))))
                    {
					    $dummy[$n] = substr_replace($dummy[$n], "<FONT CLASS=\"attention\"><B>", $position, 0);
						$dummy[$n] = substr_replace($dummy[$n], "</B></FONT>", $position + strlen($word) + 27, 0);
						$lastposition = $position + strlen($word) + 30;
					}
                    else
                    {
					    $lastposition = $position + strlen($word);
					}
				}
                else
                {
				    $lastposition = $position + strlen($word);
				}
			}
		}
	}
	$date[$i] = $dummy[0];
	$name[$i] = $dummy[1];
	$text[$i] = $dummy[2];
}
else
{
    echo $fligflag . "\">";
}
?>
	<TD CLASS="normalcol" VALIGN="top" WIDTH="30%" NOWRAP="nowrap">
<?php
if($entrypos[0] == $entrynum)
    echo "<A NAME=\"searchresult\">";
?>
	<FONT SIZE="1" CLASS="number"><?php echo $entrynum; ?></FONT><BR>
	<FONT CLASS="normalcol" SIZE="2"><?php echo $date[$i]; ?><BR>
	<DIV CLASS="fat"><?php echo $name[$i]; ?></DIV></FONT>
	<FONT CLASS="normalcol" style="font-size: 8pt;">
<?php
switch($this->language)
{
    case "ger":
    require("location_ger.php");
	break;

    default:
	require("location_eng.php");
}

if($loc[$i] != 0)
    echo $location[$loc[$i]];
?>
	</FONT><FONT SIZE="1px"><DIV><BR></DIV></FONT>
<?php
if($mail[$i] != "")
    echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"mailto:$mail[$i]\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/email.gif\" HEIGHT=\"16\" WIDTH=\"33\" ALT=\"E-Mail\"></IMG>&nbsp;</A></FONT>";
if($url[$i] != "")
    echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"$url[$i]\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/home.gif\" HEIGHT=\"16\" WIDTH=\"32\" ALT=\"Homepage\"></IMG></A></FONT>";
if($this->messengers != 0)
{
    if(($icq[$i] != "" || $aim[$i] != "" || $yim[$i] != "" || $msn[$i] != "") && ($mail[$i] != "" || $url[$i] != ""))
        echo "<BR>";
    if($this->shortmessengerformat == 1)
    {
        if($icq[$i] != "")
            echo "<A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"https://icq.com/people/$icq[$i]\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/icq.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"$icq[$i]\"></IMG></A>&nbsp;";
        if($aim[$i] != "")
            echo "<A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"aim:goim?screenname=$aim[$i]\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/aim.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"$aim[$i]\"></IMG></A>&nbsp;";
        if($yim[$i] != "")
            echo "<A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"http://edit.yahoo.com/config/send_webmesg?.target=$yim[$i]&.src=pg\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/yim.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"$yim[$i]\"></IMG></A>&nbsp;";
        if($msn[$i] != "")
            echo "<A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"javascript:void(0);\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/msn.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"$msn[$i]\"></IMG></A><BR>";
    }
    else
    {
        if($icq[$i] != "")
            echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"https://icq.com/people/$icq[$i]\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/icq.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"ICQ\">&nbsp;$icq[$i]</IMG></A></FONT><BR>";
        if($aim[$i] != "")
            echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"aim:goim?screenname=$aim[$i]\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/aim.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"AIM\">&nbsp;$aim[$i]</IMG></A></FONT><BR>";
        if($yim[$i] != "")
            echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"http://edit.yahoo.com/config/send_webmesg?.target=$yim[$i]&.src=pg\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/yim.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"YIM\">&nbsp;$yim[$i]</IMG></A></FONT><BR>";
        if($msn[$i] != "")
            echo "<FONT SIZE=\"1\" CLASS=\"normalcol\"><A CLASS=\"tablelink\" STYLE=\"text-decoration: none\" HREF=\"javascript:void(0);\" TARGET=\"_blank\" ONFOCUS=\"filter:blur()\"><IMG BORDER=\"0\" SRC=\"gif/msn.gif\" ALIGN=\"bottom\" HEIGHT=\"16\" WIDTH=\"16\" ALT=\"MSN\">&nbsp;$msn[$i]</IMG></A></FONT><BR>";
    }
}
?>
	</TD>
	<TD CLASS="normalcol" VALIGN="top" WIDTH="70%">
	<FONT CLASS="normalcol" SIZE="2"><?php echo $text[$i]; ?><BR></FONT>
	</TD>
</TR>
<?php
global $GuestbookAdmin, $GuestbookModerator, $lang;

if(isset($GuestbookAdmin) && password_verify($GuestbookAdmin, $this->adminpass) || isset($GuestbookModerator) && password_verify($GuestbookModerator, $this->moderatorpass))
{
    echo "<TR CLASS=\"$fligflag\">\n";
	echo "\t<TD CLASS=\"normalcol\" ALIGN=\"right\" COLSPAN=\"2\" HEIGHT=\"8\">\n";
	echo "\t<FONT SIZE=\"1\" CLASS=\"header\">\n";
	if($this->logip != 0)
    {
	    if($ip[$i] == "")
            $ip[$i] = "not logged";
        echo "\tip: $ip[$i]&nbsp;&nbsp;&nbsp;&nbsp;\n";
    }
	echo "\t[ <A CLASS=\"tablelink\" HREF=\"admin/admin.php?act=changeentry&amp;entry=$entrynum&amp;page=$this->page";
	if(isset($lang))
        echo "&lang=" . $lang;
    echo "\" ONFOCUS=\"filter:blur()\">Edit</A> ]&nbsp;&nbsp;&nbsp;&nbsp;\n";
	echo "\t[ <A CLASS=\"tablelink\" HREF=\"admin/admin.php?act=deleteentry&amp;entry=$entrynum&amp;page=$this->page";
	if(isset($lang))
        echo "&lang=" . $lang;
    echo "\" ONFOCUS=\"filter:blur()\">Delete</A> ]</FONT>\n";
	echo "\t</TD>\n";
	echo "</TR>\n";
}
?>