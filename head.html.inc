<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<?php echo $this->messages[32]; ?>
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
	<META HTTP-EQUIV="Expires" CONTENT="0">
	<TITLE><?php echo $this->messages[0]; ?></TITLE>
	<LINK HREF="guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>
<BODY>
<TABLE BORDER="0" ALIGN="center" CELLPADDING="2" CELLSPACING="1" WIDTH="80%">
	<TR CLASS="tableheader">
		<TD CLASS="header" COLSPAN="2" HEIGHT="40" VALIGN="top">
		<DIV ALIGN="left"><FONT SIZE="5" CLASS="header"><?php echo $this->messages[0]; ?>, </FONT><FONT SIZE="1" CLASS="header"><?php echo $this->messages[1]; ?>
		<?php
			echo $this->datacount;
		?>
		<?php echo $this->messages[2]; ?></FONT></DIV><P>
		<DIV ALIGN="right"><FONT SIZE="1" CLASS="header">[ <A CLASS="normlink" HREF="guestbook.php?act=show<?php global $lang; if(isset($lang)) echo "&amp;lang=" . $lang; ?>" ONFOCUS="filter:blur()"><?php echo $this->messages[3]; ?></A> ]
		[ <A CLASS="normlink" HREF="guestbook.php?act=search
<?php
global $lang;

if($this->entrypos > -1)
{
    echo "&amp;phrase=" . $this->phrase . "&amp;page=" . $this->page . "&amp;entrypos=" . $this->entrypos;
}

if(isset($lang))
    echo "&amp;lang=" . $lang;
?>
		" ONFOCUS="filter:blur()"><?php echo $this->messages[25]; ?></A> ]
		[ <A CLASS="normlink" HREF="guestbook.php?act=new<?php global $lang; if(isset($lang)) echo "&amp;lang=" . $lang; ?>" ONFOCUS="filter:blur()"><?php echo $this->messages[4]; ?></A> ]</FONT></DIV>
		</TD>
	</TR>
	<TR CLASS="tableheader">
		<TD ALIGN="middle" CLASS="normalcol" COLSPAN="2">
		<TABLE BORDER="0" CELLPADDING="9" CELLSPACING="1" WIDTH="100%">
			<TR CLASS="tableheader">
				<TD ALIGN="left" CLASS="header" WIDTH="25%" NOWRAP="nowrap">
<?php
global $lang;

if($this->page <= 1)
{
    echo "<FONT SIZE=\"1\" CLASS=\"header\">[ " . $this->messages[5] . " ]</FONT>\n";
}
else
{
    echo "<FONT SIZE=\"1\" CLASS=\"header\">[ <A CLASS=\"normlink\" HREF=\"guestbook.php?act=show&amp;page=" . ($this->page - 1);
    if(isset($lang))
        echo "&amp;lang=" . $lang;
    echo "\" ONFOCUS=\"filter:blur()\">" . $this->messages[5] . "</A> ]</FONT>\n";
}
?>
				</TD>
				<TD ALIGN="middle" CLASS="header" WIDTH="50%">
<?php
global $lang;

if($this->datacount > 0)
{
    $allpages = intval((($this->datacount - 1) / $this->entriesperpage) + 1);
}
else
{
    $allpages = 0;
}
if($allpages > 3)
{
    if($this->pageindex < 3)
        $this->pageindex = 3;
    if(($this->pageindex % 2) == 0)
        $this->pageindex++;
    $pages = ($allpages < $this->pageindex) ? $allpages : $this->pageindex;
    $low = $this->page - (($this->pageindex - 1) / 2);
    $high = $this->page + (($this->pageindex - 1) / 2);
    while($low < 1)
    {
        $low++;
        $high++;
    }
    while($high > $allpages)
    {
        $low--;
        $high--;
    }
    $range = range($low, $high);
    for($i = 0; $i < count($range); $i++)
    {
        if(!($range[$i] < 1) && !($range[$i] > $allpages))
        {
            if($range[$i] == $this->page)
            {
                echo "<FONT SIZE=\"1\" CLASS=\"header\">&gt; $this->page &lt;</FONT>\n";
            }
            else
            {
                echo "<FONT SIZE=\"1\" CLASS=\"header\">[ <A CLASS=\"normlink\" HREF=\"guestbook.php?act=show&amp;page=$range[$i]";
                if(isset($lang))
                    echo "&amp;lang=" . $lang;
                echo "\" ONFOCUS=\"filter:blur()\">$range[$i]</A> ]&nbsp;</FONT>\n";
            }
        }
    }
}
?>
				</TD>
				<TD ALIGN="right" CLASS="header" WIDTH="25%" NOWRAP="nowrap">
<?php
global $lang;

if($this->datacount > ($this->page * $this->entriesperpage))
{
    echo "<FONT SIZE=\"1\" CLASS=\"header\">[ <A CLASS=\"normlink\" HREF=\"guestbook.php?act=show&amp;page=" . ($this->page + 1);
    if(isset($lang))
        echo "&amp;lang=" . $lang;
    echo "\" ONFOCUS=\"filter:blur()\">" . $this->messages[6] . "</A> ]</FONT>\n";
}
else
{
    echo "<FONT SIZE=\"1\" CLASS=\"header\">[ " . $this->messages[6] . " ]</FONT>\n";
}
?>
				</TD>
			</TR>
		</TABLE>
		</TD>
	</TR>