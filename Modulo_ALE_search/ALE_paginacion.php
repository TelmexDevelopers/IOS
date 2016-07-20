<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
session_start();
include_once('../../adodb/adodb.inc.php');
include_once('../../adodb/adodb-pager.inc.php');
require_once("../includes/connection.php");
require("../includes/funciones.php");

/* GET
Fase_IOS_ALE
division_ale
subgerente
supervisor
entidad
area_responsable
*/

	$t=$_GET["t"];
	$Fase_IOS_ALE=$_GET["Fase_IOS_ALE"];
	$division_ale=$_GET["division_ale"];
	$subgerente=$_GET["subgerente"];
	$supervisor=$_GET["supervisor"];
	$entidad=$_GET["entidad"];
    $area_responsable=$_GET["area_responsable"];
	
	$cliente = $_GET["cliente"];
	$tipo_servicio = $_GET["tipo_servicio"];
	$direccion = $_GET["direccion"];

	
	$campos="";
	$cont = 0;
	
	if 
($_GET["Fase_IOS_ALE"] != "" || $_GET["division_ale"] != "" || $_GET["subgerente"] != "" || $_GET["supervisor"] != "" ||$_GET["entidad"] != "" || $_GET["area_responsable"] != ""|| $_GET["t"] != "")
{
	$campos.="WHERE ";
}
if ($_GET["Fase_IOS_ALE"] != "" || $_GET["Fase_IOS_ALE"] == "*")
{
	$campos.="id_fase_ale = '".$_GET["Fase_IOS_ALE"]."'  ";
	$cont++;
}
if ($_GET["division_ale"] != "" || $_GET["division_ale"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" dir_division = '".$_GET["division_ale"]."'  ";
	$cont++;
}
if ($_GET["subgerente"] != "" || $_GET["subgerente"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Usuario_Subgerente = '".$_GET["subgerente"]."'  ";
	$cont++;
}
if ($_GET["supervisor"] != "" || $_GET["supervisor"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Usuario_supervisor = '".$_GET["supervisor"]."'  ";
	$cont++;
}
if ($_GET["entidad"] != "" || $_GET["entidad"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" coordinacion_abrev = '".$_GET["entidad"]."'  ";
	$cont++;
}
if ($_GET["area_responsable"] != "" || $_GET["area_responsable"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_area_responsable = '".$_GET["area_responsable"]."'  ";
	$cont++;
}
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
if ($_GET["cliente"] != "" || $_GET["cliente"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" cliente = '".$_GET["cliente"]."'  ";
	$cont++;
}
if ($_GET["tipo_servicio"] != "" || $_GET["tipo_servicio"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" Tipo_de_proyecto = '".$_GET["tipo_servicio"]."'  ";
	$cont++;
}
if ($_GET["direccion"] != "" || $_GET["direccion"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" direccion LIKE '%$direccion%' = '".$_GET["direccion"]."'  ";
	$cont++;
}
/////////////////////////////////////////////////////////////////////////////
if ($_GET["t"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" referencia = '$referencia'";
	$cont++;
}
	$sql = " SELECT * FROM vw_ios_reg_ale";
	//echo $sql;

	if (isset($_GET['t'])!="")
	{
		$_SESSION['ref_telmex'] = $_GET['t'];

	}
	$rows_per_page = 100;
    
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);

?>

