<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../adodb/adodb.inc.php');
include('../includes/connection.php');
require("../includes/funciones.php");

$id_Usuario_IPE = $_GET['ipe'];

header('Content-type: text/json');
header('Content-type: application/json');
if (isset($id_Usuario_IPE) && $id_Usuario_IPE != "")
{
	echo Trae_Datos_IPE_TE($id_Usuario_IPE);
} else {
	echo "Seleccione IPE";	
}
?>