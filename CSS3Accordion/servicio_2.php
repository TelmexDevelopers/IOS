<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
require("../../../../adodb/adodb.inc.php");
require("../../../../includes/connection.php");
require("funciones_2.php");

$referencia = $_GET['referencia'];
$e = $_GET['str_Fase_IOS'];
$f = $_GET['dt_Fecha_Fase_IOS'];

header('Content-type: text/json');
header('Content-type: application/json');
echo pedirDatos($referencia);

?>