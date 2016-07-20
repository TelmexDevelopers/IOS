<?php
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
     session_start();
     include_once('../../../adodb/adodb.inc.php');
     include_once('../../../adodb/adodb-pager.inc.php');
     require_once("connection.php");

// valor $q= valor del combo		

	$q=$_GET["q"];
	$r=$_GET["r"];
	$s=$_GET["s"];
	$h=$_GET["h"];
	$y=$_GET["y"];
	$d=$_GET["d"];
	$o=$_GET["o"];
	$e=$_GET["e"];
	$l=$_GET["l"];
	$t=$_GET["t"];

	$campos="";
	$cont = 0;
// si hace seleccion del cualquier opcion del combo nos traera la consulta elegida por el combo usando where
if 
(
	$_GET["q"] != "" ||
	$_GET["r"] != "" ||
	$_GET["s"] != "" ||
	$_GET["t"] != "" ||
	$_GET["h"] != ""|| 
	$_GET["y"] != ""||
	$_GET["d"] != ""||
	$_GET["e"] != ""||
	$_GET["l"] != ""||
	$_GET["o"] != ""
	
	)
{
	$campos.="WHERE ";
}
if ($_GET["q"] != "" || $_GET["q"] == "*")
{
	
	$campos.="dir_division = '".$_GET["q"]."'  ";
	$cont++;
}

if ($_GET["r"] != "" || $_GET["r"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" edo_serv = '".$_GET["r"]."'  ";
	$cont++;
}
if ($_GET["s"] != "" || $_GET["s"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" fase_serv = '".$_GET["s"]."'  ";
	$cont++;
}
if ($_GET["h"] != "" || $_GET["h"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" str_Fase_ios = '".$_GET["h"]."'  ";
	$cont++;
}
if ($_GET["y"] != "" || $_GET["y"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" coordinacion_abrev = '".$_GET["y"]."'  ";
	$cont++;
}
if ($_GET["d"] != "" || $_GET["d"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" cat_Fase_SISA = '".$_GET["d"]."'  ";
	$cont++;
}
if ($_GET["o"] != "" || $_GET["o"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" bt_CON_OT = '".$_GET["o"]."'  ";
	$cont++;
}
if ($_GET["e"] != "" || $_GET["e"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" SUBGERENTE_RESPONSABLE = '".$_GET["e"]."'  ";
	$cont++;
}
if ($_GET["l"] != "" || $_GET["l"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" SUPERVISOR = '".$_GET["l"]."'  ";
	$cont++;
}

if ($_GET["t"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" referencia = '$t'";
	$cont++;
}
	$sql = "SELECT 
	referencia,
	desc_serv,
	due_date,
	GRUPO_DIL_SERVICIO,
	fase_serv,
	edo_serv,
	fecha_estado,
	FAMILIA,
	TECNOLOGIA,
	usuario,
	sector,
	coordinacion_abrev,
	dir_division,
	str_Fase_Ios,
	str_Area_responsable,
	SUBGERENTE_RESPONSABLE, 
	SUPERVISOR ,
	dt_Fecha_Fase_IOS,
	dt_Fecha_INI_Analisis,
	dt_Fecha_FIN_Analisis,
	dt_Fecha_INI_Equipamiento,
	dt_Fecha_INI_Seguimiento,
	dt_Fecha_FIN_Seguimiento,
	dt_Fecha_INI_Documentacion, 
	dt_Fecha_INI_Construccion,
	dt_Fecha_FIN_Construccion,
	dt_Fecha_INI_Entrega,
	dt_Fecha_FIN_Entrega,
	bt_Documentado 

 	FROM vw_ios_reg ".$campos."";
	

	if (isset($_GET['t'])!="")
	{
		$_SESSION['ref_telmex'] = $_GET['t'];

	}
	$rows_per_page = 10;
    
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);


?>
