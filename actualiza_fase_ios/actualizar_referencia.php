<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../adodb/adodb.inc.php');
include('includes/connection.php');
require("../includes/funciones.php");


$fase=$_POST["fase"];
$cadena_referencias = $_POST["cadena_referencias"];

if(isset($_POST["fase"]) && $fase != "" && isset($_POST["cadena_referencias"]) && $cadena_referencias != "")
{
	$sql = " UPDATE ios SET `Fase IOS` = '".$fase."',`Fecha Fase IOS` = NOW() WHERE referencia IN('".$cadena_referencias."')";
	//echo $sql;
	$Ejecuta_SQL = EjecutaQuery($sql);
	if ($Ejecuta_SQL == false)
	{
		echo "ERROR DE ACTUALIZACION !!!";
	} else {
		echo "Actualización correcta";
	}

  }
?>