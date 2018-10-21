<?php 
/*header("Content-Type: application/octet-stream");

$file = $_GET["file"] .".pdf";
header("Content-Disposition: attachment; filename=" . urlencode($file));   
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file));
flush(); // this doesn't really ./uploads/matter.
$fp = fopen($file, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush(); // this is essential for large downloads
} 
fclose($fp);*/ 
?>

<?php

$file = $_GET["file"] .".pdf";
//echo "This is file ".$file;//die();
//echo str_replace("world", "Dolly", "Hello world!"); // outputs Hello Dolly!
$filename = str_replace("./result_uploads/uploads/","",$file);
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="' . $filename . '"');//\"file.exe\"
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
@readfile($file);


?>