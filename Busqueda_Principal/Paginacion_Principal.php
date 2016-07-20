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
	$Supervisores_Entrega=$_GET["Supervisores_Entrega"];
	$ipe_entrega=$_GET["ipe_entrega"];
	$referencia=$_GET["referencia"];
	$Supervisores_Analisis=$_GET["Supervisores_Analisis"];
	$Supervisores_Documentacion=$_GET["Supervisores_Documentacion"];
	$ipe_analisis=$_GET["ipe_analisis"];
	$ipe_Documentacion=$_GET["ipe_Documentacion"];
	$cm=$_GET["cm"];
	$area_cm=$_GET["area_cm"];
	$punta =  $_GET["punta"];
	$ipe = $_GET["ipe"];
	$subgerente_entrega = $_GET["subgerente_entrega"];

	$cliente = $_GET["cliente"];
	$tipo_servicio = $_GET["tipo_servicio"];
	$direccion = $_GET["direccion"];
	
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
	$_GET["Supervisores_Entrega"] != ""||
	$_GET["ipe_entrega"] != ""||
	$_GET["Supervisores_Analisis"] != ""||
	$_GET["Supervisores_Documentacion"] != ""||
	$_GET["ipe_analisis"] != ""||
	$_GET["ipe_Documentacion"] != ""||
	$_GET["cm"] != ""||
	$_GET["area_cm"] != ""||
	$_GET["punta"] != ""||
	$ipe = $_GET["ipe"]!= ""||
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


if ($_GET["subgerente_entrega"] != "" || $_GET["subgerente_entrega"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Usuario_Subgerente = '".$_GET["subgerente_entrega"]."'  ";
	$cont++;
}


if ($_GET["ipe_entrega"] != "" || $_GET["ipe_entrega"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_usuario_ipe_entrega = '".$_GET["ipe_entrega"]."'  ";
	$cont++;
}

if ($_GET["Supervisores_Analisis"] != "" || $_GET["Supervisores_Analisis"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_usuario_jefe_inmediato = '".$_GET["Supervisores_Analisis"]."'  ";
	$cont++;
}

if ($_GET["Supervisores_Documentacion"] != "" || $_GET["Supervisores_Documentacion"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_usuario_jefe_inmediato = '".$_GET["Supervisores_Documentacion"]."'  ";
	$cont++;
}

if ($_GET["Supervisores_Entrega"] != "" || $_GET["Supervisores_Entrega"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_usuario_supervisor = '".$_GET["Supervisores_Entrega"]."'  ";
	$cont++;
}


if ($_GET["ipe_analisis"] != "" || $_GET["ipe_analisis"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_usuario_ipe_analisis = '".$_GET["ipe_analisis"]."'  ";
	$cont++;
}

if ($_GET["ipe_Documentacion"] != "" || $_GET["ipe_Documentacion"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_usuario_ipe_documentacion = '".$_GET["ipe_Documentacion"]."'  ";
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

if ($_GET["punta"] != "" || $_GET["punta"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" punta = '".$_GET["punta"]."'  ";
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
if ($_GET["ipe"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" ipe = '$ipe'";
	$cont++;
}
//////////////////////////////////////////////////////
//////////////////////////////////////////////////////
if ($_GET["cliente"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" usuario = '$cliente'";
	$cont++;
}

if ($_GET["tipo_servicio"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" Tipo_de_proyecto  = '$tipo_servicio'";
	$cont++;
}

if ($_GET["direccion"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" direccion LIKE '%$direccion%'";
	$cont++;
}

//////////////////////////////////////////////////////
//////////////////////////////////////////////////////

//if ($_SESSION["id_Area_Responsable"] == 1)
//{
//	if($cont>0)
//	{
//		$campos.=" AND";	
//	}
//	else {
//		$where.="WHERE";
//		
//		 }
//	//$campos.=" dir_division = 'METRO'  ";
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
	sector
	

	 FROM vw_ios_reg ".$where." ".$campos;
	 
	 if ($_SESSION["id_Tipo_Usuario"] == 4)
	 {
		 switch ($_SESSION["id_Area_Responsable"])
		 {
			 case 1:
				$sql .= " AND (id_usuario_ipe_analisis =  ".$_SESSION["id_Usuario"]." OR id_usuario_ipe_seguimiento = ".$_SESSION["id_Usuario"]." OR id_usuario_ipe_documentacion = ".$_SESSION["id_Usuario"].")";
			break;
			 case 2:
				$sql .= " AND (id_usuario_ipe_analisis =  ".$_SESSION["id_Usuario"]." OR id_usuario_ipe_seguimiento = ".$_SESSION["id_Usuario"]." OR id_usuario_ipe_documentacion = ".$_SESSION["id_Usuario"].")";
			break;
			 case 3:
				$sql .= " AND (id_usuario_ipe_analisis =  ".$_SESSION["id_Usuario"]." OR id_usuario_ipe_seguimiento = ".$_SESSION["id_Usuario"]." OR id_usuario_ipe_documentacion = ".$_SESSION["id_Usuario"].")";
			break;
			 case 4:
				$sql .= " AND (id_usuario_ipe_entrega =  ".$_SESSION["id_Usuario"].")";
			break;
			default:
				$sql .= "";
			break;
		 }
	 }
	echo $sql;

	if (isset($_GET['referencia'])!="")
	{
		$_SESSION['ref_telmex'] = $_GET['referencia'];

	}
	$rows_per_page = 500;
   
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);


?>
<br>
<!--<input type="button" name="xls" id="xls"  value="Enviar a MS Excel"/>-->