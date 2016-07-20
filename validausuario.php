<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
require("adodb/adodb.inc.php");
require("includes/connection.php");
require("includes/funciones.php");

//$usuario = $_POST['usr'];
//$password = $_POST['pwd'];
$usuario = $_GET['usr'];
$password = $_GET['pwd'];

header('Content-type: text/json');
header('Content-type: application/json');
echo ValidaUsuario($usuario,$password);

?>