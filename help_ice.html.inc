<P><BR>
<TABLE BORDER="0" ALIGN="center" CELLPADDING="10" CELLSPACING="1" WIDTH="90%" >
	<TR CLASS="tableheader">
		<TD CLASS="header" COLSPAN="2" HEIGHT="40" VALIGN="top">
		<DIV ALIGN="left"><FONT CLASS="header" SIZE="3"><B>Help</B></FONT></DIV>
		</TD>
	</TR>
	<TR CLASS="tableheader">
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="38%">
		<FONT CLASS="normalcol" SIZE="2">HTML Tags (normal)</FONT>
		</TD>
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="62%">
		<FONT CLASS="normalcol" SIZE="2">[BR] - Ný lína<P>
		[P] - Ný málsgrein<P>
		[B]<B>FEITLETRAÐ</B>[/B]<P>
		[I]<I>SKÁLETRAÐ</I>[/I]<P>
		[U]<U>UNDIRSTRIKAÐ</U>[/U]<P>
		[S(1-6)]<FONT SIZE=4>LETURSTÆRÐ 4</FONT>[/S(1-6)]<P>
		[COLOR FF0000]<FONT COLOR="FF0000">LITUR</FONT>[/COLOR]<P>
		[LINK http://www.php.net]<A CLASS="normlink" HREF="http://www.php.net">TENGILL</A>[/LINK]<P>
		[MAIL achim@lkcc.org]<A CLASS="normlink" HREF="mailto:achim@lkcc.org">NETFANG</A>[/MAIL]
		<?php
			if ($this->pictures != 0) {
				echo "<P>[PIC]http://www.lkcc.org:8500/guestbook/gif/test.gif <IMG BORDER=\"0\" ALIGN=\"middle\" SRC=\"gif/test.gif\"> [/PIC]</FONT>";
			} else {
				echo "</FONT>";
			}
		?>
		</TD>
	</TR>
	<TR CLASS="tableheader">
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="38%">
		<FONT CLASS="normalcol" SIZE="2">Sérstök merki</FONT>
		</TD>
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="62%">
		<FONT CLASS="normalcol" SIZE="2">&lt; = &amp;lt;<P>
		&gt; = &amp;gt;</FONT>
		</TD>
	</TR>
	<TR CLASS="tableheader">
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="38%">
		<FONT CLASS="normalcol" SIZE="2">Broskallar</FONT>
		</TD>
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="62%">
		<FONT CLASS="normalcol" SIZE="2">:) & :-) = <IMG SRC="gif/lustig.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		;) & ;-) = <IMG SRC="gif/wink.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		:( & :-( = <IMG SRC="gif/traurig.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		:p & :P = <IMG SRC="gif/tongue.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		:o = <IMG SRC="gif/redface.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		:cool: = <IMG SRC="gif/cool.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		:D = <IMG SRC="gif/biggrin.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		:confused: = <IMG SRC="gif/confused.gif" BORDER="0" WIDTH="15" HEIGHT="22"><P>
		:eek: = <IMG SRC="gif/eek.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		:mad: = <IMG SRC="gif/mad.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		:rolleyes: = <IMG SRC="gif/rolleyes.gif" BORDER="0" WIDTH="15" HEIGHT="15"></FONT>
		</TD>	
	</TR>
</TABLE>
