<?php
 // Define the path to file
$file = 'Firefox_Setup_20.0.1.exe';
$size=filesize($file);

 if(!file)
 {
     // File doesn't exist, output error
     die('file not found');
 } else {
     // Set headers
     header("Cache-Control: public");
     header("Content-Description: File Transfer");
     header("Content-Disposition: attachment; filename=$file");
	 header("Content-Length: $size");
     header("Content-Transfer-Encoding: binary");
    
     // Read the file from disk
     readfile($file);
 }
 ?>