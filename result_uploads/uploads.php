<?php
ini_set("post_max_size","640M");
/*---------------------
----------------------------------+
| File Upload In PHP With Database
| http://www.kvcodes.com/
+--------------------------------------------------------+
| Author: Varadha  
| Email: admin@kvcodes.com
+--------------------------------------------------------+*/
$kv = new mysqli('localhost:3306', 'lsmscmeiran_user', 'Consistency@@2018', 'lsmscmeiran_portal');

if ($kv->connect_error) { // Check connection
 die("Connection failed: " . $kv->connect_error);
}

if(count($_FILES['attachment']['name']) > 0){
    		
		// File Error Checking 
		foreach($_FILES['attachment']['error'] as $error) {
			if($error)
				die( "Error: ".$error); 		
		}
		
		// File size Resctrictions
		$maxsize = 20 * 1024 * 1024; //2MB maximum allowed.
		foreach($_FILES['attachment']['size'] as $size) {
			if($size > $maxsize)
				die("Error: File size is larger than the allowed limit.");		
		}
		
		// File Type Restrictions
		$allowed = array(  'pdf','jpg', 'jpeg', 'gif', 'png', 'bmp', 'PNG', 'JPG', 'JPEG');
		foreach($_FILES['attachment']['name'] as $name) {
			$type = pathinfo($name, PATHINFO_EXTENSION); //echo "type = $type<br/>";
			if(!in_array($type, $allowed)) 
				die("Error: Please select a valid file format.-".$type);	
		}
        print_r($allowed);
		$Kv_items =  array();	
		$Kv = 0;
		$uploads_dir = "uploads/";
        //print_r($_FILES['attachment']['name']);
		foreach($_FILES['attachment']['name'] as $filename) {
			move_uploaded_file($_FILES["attachment"]["tmp_name"][$Kv], $uploads_dir. basename($filename)); 
			mysqli_query($kv, "INSERT INTO res_upload (filename, type, size, date) values ( '".$_FILES["attachment"]["name"][$Kv]."', '".$_FILES["attachment"]["type"][$Kv]."', '".$_FILES["attachment"]["size"][$Kv]."', '".date('Y-m-d')."')");
			if(mysqli_insert_id($kv)){
				$Kv++;
				$Kv_items[] = mysqli_insert_id($kv);  
			}					
		} 
		if(count($Kv_items))
			echo count($Kv_items).' Files Inserted Successfully!' ; 
} 

$kv->close();

?>