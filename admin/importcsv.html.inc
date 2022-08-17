<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<HTML>
<HEAD>
	<TITLE>Guestbook - Import CSV-File</TITLE>
	<LINK HREF="../guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>

<BODY>

<FORM ACTION="admin.php" name="input" METHOD="post">
<INPUT TYPE="hidden" NAME="login" VALUE="<?php echo $login; ?>">
<INPUT TYPE="hidden" NAME="act" VALUE="<?php echo $act; ?>">
<INPUT TYPE="hidden" NAME="do" VALUE="import">

<TABLE BORDER="0" ALIGN="center" CELLPADDING="3" CELLSPACING="1" WIDTH="70%">
<TR CLASS="tableheader">
	<TD ALIGN="left" CLASS="header" COLSPAN="3">
	<FONT CLASS="header" SIZE="4">Import CSV-File by Uwe Hackbarth</FONT>
	</TD>
</TR>
<TR CLASS="tableheader">
	<TD CLASS="header" WIDTH="5%">&nbsp;</TD>
	<TD CLASS="normalcol" WIDTH="90%">
	<TABLE BORDER="0" ALIGN="center" CELLPADDING="2" CELLSPACING="0" WIDTH="100%">
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Position of Name</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	        <SELECT SIZE="1" NAME="pname">
	        <OPTION>-1</OPTION>
	        <OPTION SELECTED>0</OPTION>
	        <OPTION>1</OPTION>
	        <OPTION>2</OPTION>
	        <OPTION>3</OPTION>
	        <OPTION>4</OPTION>
	        <OPTION>5</OPTION>
	        <OPTION>6</OPTION>
	        <OPTION>7</OPTION>
	        <OPTION>8</OPTION>
	        <OPTION>9</OPTION>
	        <OPTION>10</OPTION>
	        </SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow2">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Position of Mail</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	        <SELECT SIZE="1" NAME="pmail">
	        <OPTION>-1</OPTION>
	        <OPTION>0</OPTION>
	        <OPTION SELECTED>1</OPTION>
	        <OPTION>2</OPTION>
	        <OPTION>3</OPTION>
	        <OPTION>4</OPTION>
	        <OPTION>5</OPTION>
	        <OPTION>6</OPTION>
	        <OPTION>7</OPTION>
	        <OPTION>8</OPTION>
	        <OPTION>9</OPTION>
	        <OPTION>10</OPTION>
	        </SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Position of ICQ</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	        <SELECT SIZE="1" NAME="picq">
	        <OPTION>-1</OPTION>
	        <OPTION>0</OPTION>
	        <OPTION>1</OPTION>
	        <OPTION SELECTED>2</OPTION>
	        <OPTION>3</OPTION>
	        <OPTION>4</OPTION>
	        <OPTION>5</OPTION>
	        <OPTION>6</OPTION>
	        <OPTION>7</OPTION>
	        <OPTION>8</OPTION>
	        <OPTION>9</OPTION>
	        <OPTION>10</OPTION>
	        </SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow2">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Position of AIM</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	        <SELECT SIZE="1" NAME="paim">
	        <OPTION>-1</OPTION>
	        <OPTION>0</OPTION>
	        <OPTION>1</OPTION>
	        <OPTION>2</OPTION>
	        <OPTION SELECTED>3</OPTION>
	        <OPTION>4</OPTION>
	        <OPTION>5</OPTION>
	        <OPTION>6</OPTION>
	        <OPTION>7</OPTION>
	        <OPTION>8</OPTION>
	        <OPTION>9</OPTION>
	        <OPTION>10</OPTION>
	        </SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Position of YIM</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	        <SELECT SIZE="1" NAME="pyim">
	        <OPTION>-1</OPTION>
	        <OPTION>0</OPTION>
	        <OPTION>1</OPTION>
	        <OPTION>2</OPTION>
	        <OPTION>3</OPTION>
	        <OPTION SELECTED>4</OPTION>
	        <OPTION>5</OPTION>
	        <OPTION>6</OPTION>
	        <OPTION>7</OPTION>
	        <OPTION>8</OPTION>
	        <OPTION>9</OPTION>
	        <OPTION>10</OPTION>
	        </SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow2">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Position of MSN</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	        <SELECT SIZE="1" NAME="pmsn">
	        <OPTION>-1</OPTION>
	        <OPTION>0</OPTION>
	        <OPTION>1</OPTION>
	        <OPTION>2</OPTION>
	        <OPTION>3</OPTION>
	        <OPTION>4</OPTION>
	        <OPTION SELECTED>5</OPTION>
	        <OPTION>6</OPTION>
	        <OPTION>7</OPTION>
	        <OPTION>8</OPTION>
	        <OPTION>9</OPTION>
	        <OPTION>10</OPTION>
	        </SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Position of Location</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	        <SELECT SIZE="1" NAME="ploc">
	        <OPTION>-1</OPTION>
	        <OPTION>0</OPTION>
	        <OPTION>1</OPTION>
	        <OPTION>2</OPTION>
	        <OPTION>3</OPTION>
	        <OPTION>4</OPTION>
	        <OPTION>5</OPTION>
	        <OPTION SELECTED>6</OPTION>
	        <OPTION>7</OPTION>
	        <OPTION>8</OPTION>
	        <OPTION>9</OPTION>
	        <OPTION>10</OPTION>
	        </SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow2">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Position of Url</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	        <SELECT SIZE="1" NAME="purl">
	        <OPTION>-1</OPTION>
	        <OPTION>0</OPTION>
	        <OPTION>1</OPTION>
	        <OPTION>2</OPTION>
	        <OPTION>3</OPTION>
	        <OPTION>4</OPTION>
	        <OPTION>5</OPTION>
	        <OPTION>6</OPTION>
	        <OPTION SELECTED>7</OPTION>
	        <OPTION>8</OPTION>
	        <OPTION>9</OPTION>
	        <OPTION>10</OPTION>
	        </SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Position of Text</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	        <SELECT SIZE="1" NAME="ptext">
	        <OPTION>-1</OPTION>
	        <OPTION>0</OPTION>
	        <OPTION>1</OPTION>
	        <OPTION>2</OPTION>
	        <OPTION>3</OPTION>
	        <OPTION>4</OPTION>
	        <OPTION>5</OPTION>
	        <OPTION>6</OPTION>
	        <OPTION>7</OPTION>
	        <OPTION SELECTED>8</OPTION>
	        <OPTION>9</OPTION>
	        <OPTION>10</OPTION>
	        </SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow2">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Position of Date</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	        <SELECT SIZE="1" NAME="pdate">
	        <OPTION>-1</OPTION>
	        <OPTION>0</OPTION>
	        <OPTION>1</OPTION>
	        <OPTION>2</OPTION>
	        <OPTION>3</OPTION>
	        <OPTION>4</OPTION>
	        <OPTION>5</OPTION>
	        <OPTION>6</OPTION>
	        <OPTION>7</OPTION>
	        <OPTION>8</OPTION>
	        <OPTION SELECTED>9</OPTION>
	        <OPTION>10</OPTION>
	        </SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Position of IP</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	        <SELECT SIZE="1" NAME="pip">
	        <OPTION>-1</OPTION>
	        <OPTION>0</OPTION>
	        <OPTION>1</OPTION>
	        <OPTION>2</OPTION>
	        <OPTION>3</OPTION>
	        <OPTION>4</OPTION>
	        <OPTION>5</OPTION>
	        <OPTION>6</OPTION>
	        <OPTION>7</OPTION>
	        <OPTION>8</OPTION>
	        <OPTION>9</OPTION>
	        <OPTION SELECTED>10</OPTION>
	        </SELECT>
		</TD>
	</TR>
	<TR CLASS="tablerow2">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Terminated by</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	    <INPUT TYPE="text" NAME="term" SIZE="1" MAXLENGTH="1" VALUE=";">
		</TD>
	</TR>
	<TR CLASS="tablerow1">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT CLASS="normalcol" SIZE="2">Filename</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
	    <INPUT TYPE="file" NAME="filename" SIZE="<?php echo $inputsize1 - 5; ?>">
		</TD>
	</TR>
	<TR CLASS="tablerow2">
		<TD CLASS="normalcol" VALIGN="center" WIDTH="30%">
		<FONT SIZE="2">&nbsp;</FONT>
		</TD>
		<TD CLASS="normalcol" WIDTH="70%">
		<FONT SIZE="2"><INPUT TYPE="submit" VALUE="Send" ONFOCUS="filter:blur()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<INPUT TYPE="reset" VALUE="Reset" ONFOCUS="filter:blur()"></FONT>
		</TD>
	</TR>
	<TR CLASS="tableheader">
		<TD ALIGN="middle" CLASS="header" COLSPAN="2" HEIGHT="8">
		<FONT CLASS="header" SIZE="2">[ <A CLASS="tablelink" HREF="admin.php" ONFOCUS="filter:blur()">Back</A> ]</FONT>
		</TD>
	</TR>
	</TABLE>
	</TD>
	<TD CLASS="header" WIDTH="5%">&nbsp;</TD>
</TR>	
</TABLE></FORM>

</BODY>
</HTML>
