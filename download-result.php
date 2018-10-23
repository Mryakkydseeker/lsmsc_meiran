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
//print_r($_GET);//die();
$file_arr = explode("/",$_GET["file"]); 
//print_r($file_arr);
$file = $_GET["file"] .".pdf";
$upload_path  = "./result_uploads/uploads/".$file_arr[3]."/".$file_arr[4]."/";
/*echo "This is file path  ".$upload_path;//die();
echo "This is mainfile ".$file;die();*/
$filename = str_replace($upload_path,"",$file);
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="' . $filename . '"');//\"file.exe\"
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
@readfile($file);

/*
$file = $_GET["file"] .".pdf";
$upload_path  = "./result_uploads/uploads/";
//echo "This is file ".$file;//die();
//echo str_replace("world", "Dolly", "Hello world!"); // outputs Hello Dolly!
$filename = str_replace("./result_uploads/uploads/","",$file);
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="' . $filename . '"');//\"file.exe\"
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
@readfile($file);

*/
?>