<?php 
// DB credentials.

/*define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','lsmsc_meiran');*/
// Establish database connection.
define('DB_HOST','localhost:3306');
define('DB_USER','lsmscmeiran_user');
define('DB_PASS','Consistency@@2018');
define('DB_NAME','lsmscmeiran_portal');
// Establish database connection

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);
 if(!$connect){
    die('Could not connect: ' . mysqli_error());
 }
 //echo 'Connected successfully';
// mysqli_close($conn);
/*
//mysqli_select_db($conect,"form_testing");
try
{
//echo "DB Host =". DB_HOST." DB Name = ".DB_NAME." DB User = " .DB_USER. "DB PASS = ". DB_PASS;die();
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
PDO::MYSQL_ATTR_FOUND_ROWS => true));
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}*/
?>