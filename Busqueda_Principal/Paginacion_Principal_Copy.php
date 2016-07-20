<table border="0px">
<tr>
	<td align="center"><br>
<!--<input type="button"  width="250" name="xls" id="xls"  value="Enviar a MS Excel"/>--><INPUT TYPE="image" SRC="../../images/xsl.jpeg" BORDER="0" name="xls" id="xls" width="40" height="40" ><br>Enviar a MS Excel
	</td>
    
</tr>
</table>
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

	$id_DD=$_GET["id_DD"];
	$idcat_edo_servicio=$_GET["idcat_edo_servicio"];
	$id_Area_Responsable=$_GET["id_Area_Responsable"];
	$id_Fase_IOS=$_GET["id_Fase_IOS"];
	$id_Entidad=$_GET["id_Entidad"];
	$id_Fase_SISA=$_GET["id_Fase_SISA"];
	$idcat_con_OT=$_GET["idcat_con_OT"];
	$Subgerentes=$_GET["Subgerentes"];
	$Supervisores=$_GET["Supervisores"];
	$referencia=$_GET["referencia"];
	$cm=$_GET["cm"];
	$area_cm=$_GET["area_cm"];
	$direccion=$_GET["direccion"];
	//$Supervisores_Analisis=$_GET["Supervisores_Analisis"];
	//$ipe_analisis=$_GET["ipe_analisis"];
	//$punta =  $_GET["punta"];

	$campos="";
	$cont = 0;
// si hace seleccion del cualquier opcion del combo nos traera la consulta elegida por el combo usando where
if 
(
	$_GET["id_DD"] != "" ||
	$_GET["idcat_edo_servicio"] != "" ||
	$_GET["id_Area_Responsable"] != "" ||
	$_GET["id_Fase_IOS"] != "" ||
	$_GET["id_Entidad"] != "" ||
	$_GET["id_Fase_SISA"] != "" ||
	$_GET["idcat_con_OT"] != ""|| 
	$_GET["Subgerentes"] != ""||
	$_GET["Supervisores"] != ""||
	$_GET["Supervisores_Analisis"] != ""||
	$_GET["ipe_analisis"] != ""||
	$_GET["cm"] != ""||
	$_GET["area_cm"] != ""||
	$_GET["direccion"] != ""||
	//$_GET["punta"] != ""||
	$_GET["referencia"] != ""
	
	)
{
	$campos.="WHERE ";
	
	
}
if ($_GET["id_DD"] != "" || $_GET["id_DD"] == "*")
{
	
	$campos.="dir_division = '".$_GET["id_DD"]."'  ";
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

if ($_GET["cm"] != "" || $_GET["cm"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" siglas = '".$_GET["cm"]."'  ";
	$cont++;
}

if ($_GET["area_cm"] != "" || $_GET["area_cm"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" area = '".$_GET["area_cm"]."'  ";
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
if ($_GET["direccion"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" direccion = '$direccion'";
	$cont++;
}

/*if ($_SESSION["id_Area_Responsable"] == 1)
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	else {
		$where.="where";
		 }
	$campos.=" dir_division = 'METRO'  ";
	$cont++;
}*/

//if ($_SESSION["id_Area_Responsable"] == 1)
//{
//	if($cont>0)
//	{
//		$Union.=" UNION ";	
//	}
//	
//	$Union.="  Select count(referencias) ".$campos." ";
//	$cont++;
//}


	$sql = "SELECT 
	referencia,
	ser_n,
	fase_serv,
	Tipo_de_proyecto,
	edo_serv,
	str_Fase_IOS,
	str_Area_responsable,
	ipe_analisis,
	ipe_documentacion,
	ipe_wifa,
	clas_1,
	clas_2,
	due_date,
	usuario,
	usuario_pta,
	direccion,
	SUBGERENTE_RESPONSABLE,
	SUPERVISOR,
	Familia,
	ancho_banda,
	tipo_art,
	fecha_estado,
	dt_Fecha_Fase_IOS,
	Programa,
	Grupo_dil_servicio,
	coordinacion_abrev,
	dir_division,
	ipe_entrega,
	int_Documentado,
	id_Medio_Acceso,
	area,
	siglas,
	cto_mantto,
	sector,
	direccion
	
	 FROM vw_ios_reg ".$where." ".$campos."";
//	 FROM vw_ios_reg ".$where." ".$campos." ";
 // referencia,
//	  ser_n,
//	  Programa,
//	  desc_serv,
//	  due_date,
//	  GRUPO_DIL_SERVICIO,
//	  fase_serv,
//	  edo_serv,
//	  fecha_estado,
//	  FAMILIA,
//	  TECNOLOGIA,
//	  usuario,
//	  sector,
//	  coordinacion_abrev,
//	  dir_division,
//	  str_Fase_IOS,
//	  id_fase_ios,
//	  str_Area_responsable,
//	  id_area_responsable,
//	  id_Usuario_Subgerente,
//	  SUBGERENTE_RESPONSABLE,
//	  id_Usuario_supervisor,
//	  SUPERVISOR,
//	  ipe_analisis,
//	  id_usuario_ipe_analisis,
//	  ipe_seguimiento,
//	  id_usuario_ipe_seguimiento,
//	  ipe_documentacion,
//	  id_usuario_ipe_documentacion,
//	  ipe_entrega,
//	  id_usuario_ipe_entrega,
//	  dt_Fecha_FIN_Entrega,
//	  int_Documentado,
//	  id_Motivo_PPU,
//	  int_CON_OT,
//	  str_conOT,
//	  id_Medio_Acceso,
//	  str_problema_acceso,
//	  str_coment_probl_acceso,
//	  clas_1,
//	  clas_2,
//	  siglas,
//	  area,
//	  cto_mantto
	//echo $sql;
	
	//count ($sql);
	
	if (isset($_GET['referencia'])!="")
	{
		$_SESSION['ref_telmex'] = $_GET['referencia'];

	}
	$rows_per_page = 100;
   
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);


?>
