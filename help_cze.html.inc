<P><BR>
<TABLE BORDER="0" ALIGN="center" CELLPADDING="10" CELLSPACING="1" WIDTH="90%">
	<TR CLASS="tableheader">
		<TD CLASS="header" COLSPAN="2" HEIGHT="40" VALIGN="top">
		<DIV ALIGN="left"><FONT CLASS="header" SIZE="3"><B>N�pov�da</B></FONT></DIV>
		</TD>
	</TR>
	<TR CLASS="tableheader">
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="38%">
		<FONT CLASS="normalcol" SIZE="2">HTML zna�ky (oby�ejn�)</FONT>
		</TD>
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="62%">
		<FONT CLASS="normalcol" SIZE="2">[BR] - nov� ��dek<P>
		[P] - nov� odstavec<P>
		[B]<B>TU�N�</B>[/B]<P>
		[I]<I>KURZ�VA</I>[/I]<P>
		[U]<U>PODTR�EN�</U>[/U]<P>
		[S(1-6)]<FONT SIZE=4>VELIKOST P�SMA 4</FONT>[/S(1-6)]<P>
		[COLOR FF0000]<FONT COLOR="FF0000">BARVA</FONT>[/COLOR]<P>
		[LINK http://www.php.net]<A CLASS="normlink" HREF="http://www.php.net">ODKAZ</A>[/LINK]<P>
		[MAIL achim@lkcc.org]<A CLASS="normlink" HREF="mailto:achim@lkcc.org">PO�TA</A>[/MAIL]
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
		<FONT CLASS="normalcol" SIZE="2">Speci�ln� znaky</FONT>
		</TD>
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="62%">
		<FONT CLASS="normalcol" SIZE="2">&lt; = &amp;lt;<P>
		&gt; = &amp;gt;</FONT>
		</TD>
	</TR>
	<TR CLASS="tableheader">
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="38%">
		<FONT CLASS="normalcol" SIZE="2">Obli�eje (Smajl�ky)</FONT>
		</TD>
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="62%">
		<FONT CLASS="normalcol" SIZE="2">:) &amp; :-) = <IMG SRC="gif/lustig.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		;) &amp; ;-) = <IMG SRC="gif/wink.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		:( &amp; :-( = <IMG SRC="gif/traurig.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
		:p &amp; :P = <IMG SRC="gif/tongue.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
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
