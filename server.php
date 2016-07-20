<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

//if($_SERVER["REDIRECT_REMOTE_USER"] == "")
//{
//	header("Location: ".$_SERVER["PHP_SELF"]);
//}

echo "PHP_SELF: ".$_SERVER["PHP_SELF"]."<br /><br />\n"; //OK script
echo "SERVER_ADDR: ".$_SERVER["SERVER_ADDR"]."<br /><br />\n";//OK ip server
echo "HTTP_USER_AGENT: ".$_SERVER["HTTP_USER_AGENT"]."<br /><br />\n"; //OK navegador
echo "REMOTE_ADDR: ".$_SERVER["REMOTE_ADDR"]."<br /><br />\n"; //OK ip usuario
echo "REDIRECT_REMOTE_USER: ".$_SERVER["REDIRECT_REMOTE_USER"]."<br /><br />\n"; //OK redirect




?>