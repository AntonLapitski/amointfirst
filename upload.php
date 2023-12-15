<?php

if (($_FILES['my_file']['name']!="")){
	$target_dir = "files/";
	$file = $_FILES['my_file']['name'];
	$path = pathinfo($file);
	$filename = $path['filename'];
	$ext = $path['extension'];
	$temp_name = $_FILES['my_file']['tmp_name'];
	$path_filename_ext = $target_dir.$filename.".".$ext;
 
if (file_exists($path_filename_ext)) {
	echo "Sorry, file already exists.";
 
 } else {
 	move_uploaded_file($temp_name,$path_filename_ext);
    
    if (!file_exists($path_filename_ext)) {

 		echo '<div style="width: 40px;height:40px; background:red;"></div>';
 		exit();
 }
 		echo '<div style="width: 40px;height:40px; background:green;"></div>';
 }
}

$cnt = 0;
$text = file_get_contents(__DIR__ . '/files/'. $filename .'.txt');
$sentences = explode('.', $text);

foreach ($sentences as $key => $value) {
	preg_replace('~\\d~', '', $value, -1, $cnt);
	echo $value . '=' . $cnt;
}