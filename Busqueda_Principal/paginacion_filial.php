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
 	
// valor $q= valor del combo		


	$r=$_GET["r"];
	$s=$_GET["s"];
	$d=$_GET["d"];
	$o=$_GET["o"];
	$e=$_GET["e"];
	$t=$_GET["t"];

	$campos="";
	$cont = 0;
// si hace seleccion del cualquier opcion del combo nos traera la consulta elegida por el combo usando where
if 
(
	
	$_GET["r"] != "" ||
	$_GET["s"] != "" ||
	$_GET["d"] != ""||
	$_GET["o"] != ""||
	$_GET["e"] != ""||
	$_GET["t"] != ""
	
	
	)
{
	$campos.="WHERE ";
}

if ($_GET["r"] != "" || $_GET["r"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" area = '".$_GET["r"]."'  ";
	$cont++;
}
if ($_GET["s"] != "" || $_GET["s"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Filial = '".$_GET["s"]."'  ";
	$cont++;
}
if ($_GET["d"] != "" || $_GET["d"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" cto_mantto = '".$_GET["d"]."'  ";
	$cont++;
}
if ($_GET["o"] != "" || $_GET["o"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Area_Responsable = '".$_GET["o"]."'  ";
	$cont++;
}
if ($_GET["e"] != "" || $_GET["e"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_OT = '".$_GET["e"]."'  ";
	$cont++;
}

if ($_GET["punta"] != "" || $_GET["punta"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" str_Punta = '".$_GET["punta"]."'  ";
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
	
	
	
	
	$sql = "select * from vw_filial ".$campos."";
	echo $sql;
	

	if (isset($_GET['t'])!="")
	{
		$_SESSION['ref_telmex'] = $_GET['t'];

	}
	$rows_per_page = 10;
    
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);




//
//	referencia,
//	desc_serv,
//	due_date,
//	fase_serv,
//	edo_serv,
//	TECNOLOGIA,
//	usuario,
//	SUBGERENTE_RESPONSABLE,
//	SUPERVISOR,
//	str_fase_ios,
//	dt_Fecha_Fase_IOS,
//	id_Asignacion_Filial,
//	ser_n,
//	str_Punta,
//	str_filial,
//	id_Filial,
//	dt_Fecha_Registro,
//	id_OT,
//	id_ACEPTACION_OT,
//	Contratista,
//	ID_COORD_CONTRATISTA,
//	Coordinado_Contratista,
//	ID_RESP_INSTALADOR,
//	Responsable_Instalador,
//	ID_CONTRATISTA,
//	str_telefono,
//	id_Fase_IOS_Filial,
//	CENTRAL,
//	cto_mantto,
//	area,
//	ASIGNADA_A,
//	id_ACTIVIDAD_filial,
//	FECHA_ENVIO_ENTREGA,
//	FECHA_ELABORACION,
//	FECHA_ASIGNACION,
//	FECHA_DE_ACEPTACION,
//	FECHA_PROGRAMADA_CONSTRUCCION,
//	FECHA_PROGRAMA_ENTREGA,
//	FECHA_CONSTRUCCION_TERMINADA,
//	FECHA_DEVOLUCION,
//	FECHA_REAL_ENTREGA,
//	FECHA_OBRAS_CANCELADAS,
//	FECHA_ESTADO_FILIAL,
//	FECHA_REPROGRAMADA,
//	FECHA_ENTREGA_SERVICIO,
//	FECHA_ENVIO_CONST,
//	COMENTARIO_CONTRATISTA,
//	ASOCIADO
?>