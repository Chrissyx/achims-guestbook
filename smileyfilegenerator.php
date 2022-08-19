<?php
# You can start this script with your browser to generate a smileys.php automatically if you have really much smiley pictures.

$output = fopen("smileys.php", "w") or die("Can't create smileys.php!");

fputs($output, "<?php\n");
fputs($output, "\$smileylist = array(");

$count = 1;
$handle = opendir('gif');
while(false !== ($file = readdir($handle)))
{
    if($file != "."
        && $file != ".."
        && $file != "bg.gif"
        && $file != "test.gif")
    {
        if(preg_match("/([0-9_a-z])*(?i).(gif|jpg|png)(?i)/", $file, $number))
        {
            echo "-&gt; working on: gif/" . $file . "...<BR>";
            $size = GetImageSize("gif/$file");
            fputs($output, "\"" . $count . "\" => \"<IMG SRC=\\\"gif/" . $file . "\\\" BORDER=\\\"0\\\" WIDTH=\\\"" . $size[0] . "\\\" HEIGHT=\\\"" . $size[1] . "\\\" ALT=\\\"\\\">\",\n");
            $count++;
        }
    }
}
closedir($handle);

echo "-&gt; done!";

fputs($output, ");\n");
fputs($output, "?>");

fclose($output);
?>