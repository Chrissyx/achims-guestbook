<P><BR>
<TABLE ALIGN="center" BORDER="0" CELLSPACING="0" CELLPADDING="1" MARGIN="1" WIDTH="90%">
<TR>
	<TD CLASS="border1">
	<TABLE ALIGN="center" BORDER="0" CELLSPACING="0" CELLPADDING="3" WIDTH="100%">
	<TR>
		<TD CLASS="border2">
		<TABLE>
		<TR>
			<TD WIDTH="1%"><DIV CLASS="header">Help</DIV></TD>
		</TR>
		</TABLE><P>
		<TABLE ALIGN="center">
		<TR>
			<TD CLASS="table1" VALIGN="top" WIDTH="30%">
			<DIV CLASS="text">HTML Tags (normal)</DIV>
			</TD>
			<TD CLASS="table2">
			<DIV CLASS="text">
			[BR] - New Line<P>
			[P] - New Paragraph<P>
			[B]<B>BOLD</B>[/B]<P>
			[I]<I>ITALIC</I>[/I]<P>
			[U]<U>UNDERLINED</U>[/U]<P>
			[S(1-6)]<FONT SIZE=4>FONT SIZE 4</FONT>[/S(1-6)]<P>
			[COLOR FF0000]<FONT COLOR="FF0000">COLOR</FONT>[/COLOR]<P>
			[LINK http://www.php.net]<A HREF="http://www.php.net">LINK</A>[/LINK]<P>
			[MAIL achim@lkcc.org]<A HREF="mailto:achim@lkcc.org">MAIL</A>[/MAIL]
			<?php
				if ($this->pictures != 0) {
					echo "<P>[PIC]http://www.lkcc.org:8500/guestbook/gif/test.gif <IMG BORDER=\"0\" ALIGN=\"middle\" SRC=\"gif/test.gif\"> [/PIC]<BR>";
				} else {
					echo "<BR>";
				}
			?></DIV>
			</TD>
		</TR>
		<TR>
			<TD CLASS="table1" VALIGN="top" WIDTH="30%">
			<DIV CLASS="text">special chars</DIV>
			</TD>
			<TD CLASS="table2">
			<DIV CLASS="text">
			&lt; = &amp;lt;<P>
			&gt; = &amp;gt;<BR>
			</DIV>
			</TD>
		</TR>
		<TR>
			<TD CLASS="table1" VALIGN="top" WIDTH="30%">
			<DIV CLASS="text">Smileys</DIV>
			</TD>
			<TD CLASS="table2">
			<DIV CLASS="text">
			:) & :-) = <IMG SRC="gif/lustig.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
			;) & ;-) = <IMG SRC="gif/wink.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
			:( & :-( = <IMG SRC="gif/traurig.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
			:p & :P = <IMG SRC="gif/tongue.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
			:o = <IMG SRC="gif/redface.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
			:cool: = <IMG SRC="gif/cool.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
			:D = <IMG SRC="gif/biggrin.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
			:confused: = <IMG SRC="gif/confused.gif" BORDER="0" WIDTH="15" HEIGHT="22"><P>
			:eek: = <IMG SRC="gif/eek.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
			:mad: = <IMG SRC="gif/mad.gif" BORDER="0" WIDTH="15" HEIGHT="15"><P>
			:rolleyes: = <IMG SRC="gif/rolleyes.gif" BORDER="0" WIDTH="15" HEIGHT="15">
			</DIV>
			</TD>
		</TR>
		</TABLE>
		</TD>
	</TR>
	</TABLE>
	</TD>
</TR>
</TABLE>