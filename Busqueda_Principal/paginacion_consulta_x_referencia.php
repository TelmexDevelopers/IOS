<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
session_start();
include_once('../../adodb/adodb.inc.php');
include_once('../../adodb/adodb-pager.inc.php');
require_once("connection.php");
require("../includes/funciones.php");
$CheckSession = CheckSession();

$cadena_referencias = $_POST["cadena_referencias"];

$campos="";
$cont = 0;

if ($_POST["cadena_referencias"])
{
	$where.="WHERE referencia IN ('".$cadena_referencias."')";
}

	$sql = "SELECT referencia,
ser_n, fase_serv, Tipo_de_proyecto, edo_serv, str_Fase_IOS, str_Area_responsable, ipe_analisis, ipe_documentacion, ipe_wifa, clas_1, clas_2, due_date, usuario, usuario_pta, direccion, SUBGERENTE_RESPONSABLE, SUPERVISOR, Familia, ancho_banda, tipo_art, fecha_estado, dt_Fecha_Fase_IOS, Programa, Grupo_dil_servicio, coordinacion_abrev, dir_division, ipe_entrega, int_Documentado, id_Medio_Acceso, area, siglas, clas_1, clas_2, cto_mantto, sector FROM vw_ios_reg ".$where."";
	//echo $sql;

	if ($_POST["cadena_referencias"]!="")
	{
		$_SESSION['string_referencias'] = $_POST["cadena_referencias"];

	}
	$rows_per_page = 100;
	$pager = Pager($sql,$rows_per_page, $_SESSION['string_referencias']);
?>
