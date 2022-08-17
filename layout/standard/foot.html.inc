	<TR CLASS="tableheader">
		<TD ALIGN="middle" CLASS="normalcol" COLSPAN="2">
		<TABLE BORDER="0" CELLPADDING="9" CELLSPACING="1" WIDTH="100%">
			<TR CLASS="tableheader">
				<TD ALIGN="left" CLASS="header" WIDTH="25%" NOWRAP="nowrap">
				<?php
					echo $lang;
				
					if ($this->page == 1) {
						echo "<FONT SIZE=\"1\" CLASS=\"header\">[ ".$this->messages[5]." ]</FONT>\n";
					}	else {
						echo "<FONT SIZE=\"1\" CLASS=\"header\">[ <A CLASS=\"normlink\" HREF=\"guestbook.php?act=show&amp;page=".($this->page - 1);
						if (isset($lang)) echo "&lang=".$lang;
						echo "\" ONFOCUS=\"filter:blur()\">".$this->messages[5]."</A> ]</FONT>\n";
					}
				?>
				</TD>
				<TD ALIGN="middle" CLASS="header" WIDTH="50%">
				<?php
					global $lang;
				
					if ($this->datacount > 0) {
						$allpages = intval((($this->datacount - 1) / $this->entriesperpage) + 1);
					} else { 
						$allpages = 0;
					}
					if ($allpages > 3) {
						if ($this->pageindex < 3) $this->pageindex = 3;
						if (($this->pageindex % 2) == 0) $this->pageindex++;
						$pages = ($allpages < $this->pageindex) ? $allpages : $this->pageindex;
						$low = $this->page - (($this->pageindex - 1) / 2);
						$high = $this->page + (($this->pageindex - 1) / 2);
						while ($low < 1) {
							$low++;
							$high++;
						}
						while ($high > $allpages) {
							$low--;
							$high--;
						}
						$range = range($low, $high);						
						for ($i = 0; $i < count($range); $i++) {
							if (!($range[$i] < 1) && !($range[$i] > $allpages)) {
								if ($range[$i] == $this->page) {
									echo "<FONT SIZE=\"1\" CLASS=\"header\">> $this->page <</FONT>\n";
								} else {
									echo "<FONT SIZE=\"1\" CLASS=\"header\">[ <A CLASS=\"normlink\" HREF=\"guestbook.php?act=show&amp;page=$range[$i]";
									if (isset($lang)) echo "&lang=".$lang;
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
					
					if ($this->datacount > ($this->page * $this->entriesperpage)) {
						echo "<FONT SIZE=\"1\" CLASS=\"header\">[ <A CLASS=\"normlink\" HREF=\"guestbook.php?act=show&amp;page=".($this->page + 1);
						if (isset($lang)) echo "&lang=".$lang;
						echo "\" ONFOCUS=\"filter:blur()\">".$this->messages[6]."</A> ]</FONT>\n";
					}	else {
						echo "<FONT SIZE=\"1\" CLASS=\"header\">[ ".$this->messages[6]." ]</FONT>\n";
					}
				?>
				</TD>
			</TR>
		</TABLE>
		</TD>
	</TR>
</TABLE><P>
<!-- DON'T REMOVE THE COPYRIGHT OR YOU OFFEND AGAINST THE LICENSE AGREEMENT!!! //-->
<DIV ALIGN="center"><FONT CLASS="copyright" SIZE="2">Copyright (C) 2001 Achim Winkler</FONT><BR>
<FONT SIZE="1"><B><A CLASS="normlink" HREF="http://www.lkcc.org/achim" TARGET="_blank" ONFOCUS="filter:blur()">http://www.lkcc.org/achim</A></B></FONT></DIV>
</BODY>
</HTML> 