<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<HTML>
<HEAD>
	<TITLE><?php echo $this->messages[31]; ?></TITLE>
	<?php echo $this->messages[32]; ?>
	<LINK HREF="guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>

<BODY>
<?php
	switch ($this->language) {
		case "eng":
			if (file_exists("help_eng.html.inc")) include("help_eng.html.inc");
			break;
		case "ger":
			if (file_exists("help_ger.html.inc")) include("help_ger.html.inc");
			break;
		case "swe":
			if (file_exists("help_swe.html.inc")) include("help_swe.html.inc");
			break;
		case "fre":
			if (file_exists("help_fre.html.inc")) include("help_fre.html.inc");
			break;
		case "ita":
			if (file_exists("help_ita.html.inc")) include("help_ita.html.inc");
			break;
		case "por":
			if (file_exists("help_por.html.inc")) include("help_por.html.inc");
			break;
		case "dut":
			if (file_exists("help_dut.html.inc")) include("help_dut.html.inc");
			break;
		case "spa":
			if (file_exists("help_spa.html.inc")) include("help_spa.html.inc");
			break;
		case "rus":
			if (file_exists("help_rus.html.inc")) include("help_rus.html.inc");
			break;
		case "cze":
			if (file_exists("help_cze.html.inc")) include("help_cze.html.inc");
			break;
		case "fin":
			if (file_exists("help_fin.html.inc")) include("help_fin.html.inc");
			break;
		case "chi":
			if (file_exists("help_chi.html.inc")) include("help_chi.html.inc");
			break;
		case "dan":
			if (file_exists("help_dan.html.inc")) include("help_dan.html.inc");
			break;
		case "pol":
			if (file_exists("help_pol.html.inc")) include("help_pol.html.inc");
			break;
		case "ice":
			if (file_exists("help_ice.html.inc")) include("help_ice.html.inc");
			break;
		case "svk":
			if (file_exists("help_svk.html.inc")) include("help_svk.html.inc");
			break;
		case "hug":
			if (file_exists("help_hug.html.inc")) include("help_hug.html.inc");
			break;
		default:
			if (file_exists("help_eng.html.inc")) include("help_eng.html.inc");
			break;
	}
?>
</BODY>

</HTML>