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
<TABLE ALIGN="center" BORDER="0" CELLSPACING="0" CELLPADDING="1" MARGIN="1" WIDTH="90%">
<TR>
	<TD CLASS="border1">
	<TABLE ALIGN="center" BORDER="0" CELLSPACING="0" CELLPADDING="3" WIDTH="100%">
	<TR>
		<TD CLASS="border2">
		<TABLE>
		<TR>
			<TD WIDTH="1%">
			<DIV CLASS="header"><?php echo $this->messages[0]; ?></DIV>
			</TD>
			<TD>
			<DIV CLASS="menu"><A HREF="guestbook.php?act=new<?php global $lang; if(isset($lang)) echo "?lang=" . $lang; ?>" ONFOCUS="filter:blur()"><?php echo $this->messages[4]; ?></A>&nbsp;&nbsp;
			<A CLASS="normlink" HREF="guestbook.php?act=search
<?php
global $lang;

if($this->entrypos > -1)
{
    echo "&phrase=" . $this->phrase . "&page=" . $this->page . "&entrypos=" . $this->entrypos;
}

if(isset($lang))
    echo "&lang=" . $lang;
?>
			" ONFOCUS="filter:blur()"><?php echo $this->messages[25]; ?></A></DIV>
			</TD>
		</TR>
		</TABLE>
		<TABLE ALIGN="center" CELLSPACING="0" CELLPADDING="3" WIDTH="100%" BORDER="0">
		<TR>
			<TD>
			<DIV CLASS="pages">
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
if($allpages > 0)
{
    if($this->pageindex < 3)
        $this->pageindex = 3;
    if(($this->pageindex % 2) == 0)
        $this->pageindex++;
    $pages = ($allpages < $this->pageindex) ? $allpages : $this->pageindex;
    $low = $this->page - (($this->pageindex - 1) / 2);
    $high = $this->page + (($this->pageindex - 1) / 2);
	while ($low < 1)
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
			    echo ">$this->page<\n";
			}
            else
            {
			    echo "[<A HREF=\"guestbook.php?act=show&amp;page=$range[$i]";
			    if(isset($lang))
                    echo "&lang=" . $lang;
                    echo "\" ONFOCUS=\"filter:blur()\">$range[$i]</A>]&nbsp;\n";
            }
        }
    }
}
?>
			</DIV>
			</TD>
		</TR>
		</TABLE>
		<TABLE ALIGN="center" CELLSPACING="1" CELLPADDING="3" WIDTH="100%" BORDER="0">
