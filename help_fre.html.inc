<P><BR>
<TABLE BORDER="0" ALIGN="center" CELLPADDING="10" CELLSPACING="1" WIDTH="90%">
	<TR CLASS="tableheader">
		<TD CLASS="header" COLSPAN="2" HEIGHT="40" VALIGN="top">
		<DIV ALIGN="left"><FONT CLASS="header" SIZE="3"><B>Aide</B></FONT></DIV>
		</TD>
	</TR>
	<TR CLASS="tableheader">
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="38%">
		<FONT CLASS="normalcol" SIZE="2">Tags HTML (normal)</FONT>
		</TD>
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="62%">
		<FONT CLASS="normalcol" SIZE="2">[BR] - Retour � la Ligne<P>
		[P] - Nouveau Paragraphe<P>
		[B]<B>CARACT�RE GRAS</B>[/B]<P>
		[I]<I>ITALIQUE</I>[/I]<P>
		[U]<U>SOULIGN�</U>[/U]<P>
		[S(1-6)]<FONT SIZE=4>TAILLE DE LA POLICE : 4</FONT>[/S(1-6)]<P>
		[COLOR FF0000]<FONT COLOR="FF0000">COULEUR</FONT>[/COLOR]<P>
		[LINK http://www.php.net]<A CLASS="normlink" HREF="http://www.php.net">LIEN</A>[/LINK]<P>
		[MAIL achim@lkcc.org]<A CLASS="normlink" HREF="mailto:achim@lkcc.org">MAIL</A>[/MAIL]
		<?php
			if ($this->pictures != 0) {
				echo "<P>[PIC]http://www.lkcc.org:8500/guestbook/gif/test.gif <IMG BORDER=\"0\" ALIGN=\"middle\" SRC=\"gif/test.gif\"></IMG> [/PIC]</FONT>";
			} else {
				echo "</FONT>";
			}
		?>
		</TD>
	</TR>
	<TR CLASS="tableheader">
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="38%">
		<FONT CLASS="normalcol" SIZE="2">caract�res sp�ciaux</FONT>
		</TD>
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="62%">
		<FONT CLASS="normalcol" SIZE="2">&lt; = &amp;lt;<P>
		&gt; = &amp;gt;</FONT>
		</TD>
	</TR>
	<TR CLASS="tableheader">
		<TD ALIGN="left" VALIGN="top" CLASS="normalcol" WIDTH="38%">
		<FONT CLASS="normalcol" SIZE="2">Smileys (Emotic�nes)</FONT>
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
