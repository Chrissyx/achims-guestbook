<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE><?php echo $this->messages[31]; ?></TITLE>
	<?php echo $this->messages[32]; ?>
	<LINK HREF="guestbook.css" REL="stylesheet" TYPE="text/css">
</HEAD>
<BODY>
<?php
if(isset($this->language) && file_exists('help_' . $this->language . '.html.inc'))
    include('help_' . $this->language . '.html.inc');
elseif(file_exists('help_eng.html.inc'))
    include('help_eng.html.inc');
?>
</BODY>
</HTML>