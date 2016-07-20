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
// valor $q= valor del combo		

	$DD=$_GET["DD"];
	$idcat_edo_servicio=$_GET["idcat_edo_servicio"];
	$id_Area_Responsable=$_GET["id_Area_Responsable"];
	$id_Fase_IOS=$_GET["id_Fase_IOS"];
	$id_Entidad=$_GET["id_Entidad"];
	$id_Fase_SISA=$_GET["id_Fase_SISA"];
	$idcat_con_OT=$_GET["idcat_con_OT"];
	$Subgerentes=$_GET["Subgerentes"];
	$Supervisores=$_GET["Supervisores"];
	$referencia=$_GET["referencia"];

	$campos="";
	$cont = 0;
// si hace seleccion del cualquier opcion del combo nos traera la consulta elegida por el combo usando where
if 
(
	$_GET["DD"] != "" ||
	$_GET["idcat_edo_servicio"] != "" ||
	$_GET["id_Area_Responsable"] != "" ||
	$_GET["id_Fase_IOS"] != "" ||
	$_GET["id_Entidad"] != "" ||
	$_GET["id_Fase_SISA"] != "" ||
	$_GET["idcat_con_OT"] != ""|| 
	$_GET["Subgerentes"] != ""||
	$_GET["Supervisores"] != ""||
	$_GET["referencia"] != ""
	
	)
{
	$campos.="WHERE ";
}
if ($_GET["DD"] != "" || $_GET["DD"] == "*")
{
	
	$campos.="dir_division = '".$_GET["DD"]."'  ";
	$cont++;
}

if ($_GET["idcat_edo_servicio"] != "" || $_GET["idcat_edo_servicio"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" edo_serv = '".$_GET["idcat_edo_servicio"]."'  ";
	$cont++;
}
if ($_GET["id_Area_Responsable"] != "" || $_GET["id_Area_Responsable"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Area_Responsable = '".$_GET["id_Area_Responsable"]."'  ";
	$cont++;
}
if ($_GET["id_Fase_IOS"] != "" || $_GET["id_Fase_IOS"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Fase_IOS = '".$_GET["id_Fase_IOS"]."'  ";
	$cont++;
}
if ($_GET["id_Entidad"] != "" || $_GET["id_Entidad"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" coordinacion_abrev = '".$_GET["id_Entidad"]."'  ";
	$cont++;
}
if ($_GET["id_Fase_SISA"] != "" || $_GET["id_Fase_SISA"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" fase_serv = '".$_GET["id_Fase_SISA"]."'  ";
	$cont++;
}
if ($_GET["idcat_con_OT"] != "" || $_GET["idcat_con_OT"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" int_con_OT = '".$_GET["idcat_con_OT"]."'  ";
	$cont++;
}
if ($_GET["Subgerentes"] != "" || $_GET["Subgerentes"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Usuario_Subgerente = '".$_GET["Subgerentes"]."'  ";
	$cont++;
}
if ($_GET["Supervisores"] != "" || $_GET["Supervisores"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Usuario_Supervisor = '".$_GET["Supervisores"]."'  ";
	$cont++;
}

if ($_GET["referencia"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" referencia = '$referencia'";
	$cont++;
}


	$sql = "SELECT  
	  referencia,
	  ser_n,
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
	  str_Fase_IOS,
	  id_fase_ios,
	  str_Area_responsable,
	  id_area_responsable,
	  id_Usuario_Subgerente,
	  SUBGERENTE_RESPONSABLE,
	  id_Usuario_supervisor,
	  SUPERVISOR,
	  ipe_analisis,
	  id_usuario_ipe_analisis,
	  ipe_seguimiento,
	  id_usuario_ipe_seguimiento,
	  ipe_documentacion,
	  id_usuario_ipe_documentacion,
	  ipe_entrega,
	  id_usuario_ipe_entrega,
	  dt_Fecha_FIN_Entrega,
	  int_Documentado,
	  id_Motivo_PPU,
	  int_CON_OT,
	  str_conOT,
	  id_Medio_Acceso,
	  str_problema_acceso,
	  str_coment_probl_acceso,
	  clas_1,
	  clas_2,
	  Programa
	 FROM vw_ios_reg ".$campos."";
	//echo $sql;

	if (isset($_GET['referencia'])!="")
	{
		$_SESSION['ref_telmex'] = $_GET['referencia'];

	}
	$rows_per_page = 100;
   
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);


?>
