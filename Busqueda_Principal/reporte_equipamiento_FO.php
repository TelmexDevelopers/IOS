<?php
//Exportar datos de php a Excel
//header("Content-Type: Application/vnd.openxmlformats-officedocument.SpreadsheetML.Sheet");
header("Content-type: application/vnd.ms-excel;charset=utf-8");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Reportes");
header("../../../adodb/adodb.inc.php");
header("../../../adodb/adodb-pager.inc.php");

/*$file = "myfile.xlsx" ;
header('Content-Disposition: attachment; filename=' . $file );
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Length: ' . filesize($file));
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');
readfile('myfile.xlsx');*/

?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>

<!--<style>
#table
{
font-size: 0.9em;
width: 100%;
background-color: #ffffff;
padding: 1em;
text-align:center

}
#tr
{
background-color: #06F;
}

</style>-->
	

</head>
<body>

<?php
$link = @mysql_connect("10.94.130.36", "ios_new", "provi");
mysql_select_db("ios_new", $link);


// maximo por pagina
$limit = 4000;

// pagina pedida
//	var datos = 'q='+combo1+'&r='+combo2+'&s='+combo3+'&t='+texto+'&pag='+page;




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
	$id_Usuario=$_GET["id_Usuario"];
	$nom_supervisor=$_GET["nom_supervisor"];
	$direccion=$_GET["direccion"];
	$area_cm=$_GET["area_cm"];
	$punta =  $_GET["punta"];
	$ipe = $_GET["ipe"];
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
	$_GET["id_Usuario"] != ""||
	$_GET["nom_supervisor"] != ""||
	$_GET["direccion"] != ""||
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
	
	$campos.="division = '".$_GET["id_DD"]."'  ";
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
	$campos.=" area_responsable = '".$_GET["id_Area_Responsable"]."'  ";
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
if ($_GET["Supervisores_Entrega"] != "" || $_GET["Supervisores_Entrega"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Usuario_supervisor = '".$_GET["Supervisores_Entrega"]."'  ";
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
	$campos.=" SIGLAS_ios = '".$_GET["cm"]."'  ";
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

if ($_GET["direccion"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" direccion like '%$direccion%'";
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
if ($_GET["id_Usuario"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Usuario_sub = '$id_Usuario'";
	$cont++;
}
if ($_GET["nom_supervisor"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Usuario_sup = '$nom_supervisor'";
	$cont++;
}
 
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

			
/*	$t=$_GET["t"];

	$campos="";
	$cont = 0;
	
	
	if ($_GET["t"] != "" )
		{
	$campos.="WHERE "; 
         }
	if ($_GET["t"] != "")
	{
		$campos.=" referencia = '$t' ";
	}
	$cont++;*/

	

$pag = (int) $_GET["pag"];
if ($pag < 1)
{
   $pag = 1;
}
$offset = ($pag-1) * $limit;
//echo $pag;

$sql = "SELECT SQL_CALC_FOUND_ROWS 
	  referencia,
	  ref_tramo,
	  edo_tramo,
	  coordinacion_abrev,
	  coordinacion,
	  fecha_afect,
	  ete_n,
	  fase_serv,
	  edo_serv,
	  tipo_tecnologia,
	  tipo_lada_enlace,
	  fec_act,
	  tra_obser,
	  tra_punta,
	  ete_n_rc,
	  area_responsable,
	  fec_real_term,
	  aca_n_alc,
	  SIGLAS_ios,
	  area,
	  central,
	  usuario_puntas,
	  direccion
 FROM vw_tramos_fo ".$campos." LIMIT $offset, $limit";
echo $sql;
$sqlTotal = "SELECT FOUND_ROWS() as total";

$rs = mysql_query($sql);
$rsTotal = mysql_query($sqlTotal);

$rowTotal = mysql_fetch_assoc($rsTotal);
// Total de registros sin limit
$total = $rowTotal["total"];
/* FROM tb_seguimiento_servicios ";
$result=mysql_query($sql,$IdConexion);*/

?>

<table border="1px">

<tr id="tr">

<td>referencia</td>
<td>ref_tramo</td>
<td>edo_tramo</td>
<td>coordinacion_abrev</td>
<td>coordinacion</td>
<td>fecha_afect</td>
<td>ete_n</td>
<td>fase_serv</td>
<td>edo_serv</td>
<td>tipo_tecnologia</td>
<td>tipo_lada_enlace</td>
<td>fec_act</td>
<td>tra_obser</td>
<td>tra_punta</td>
<td>ete_n_rc</td>
<td>area_responsable</td>
<td>fec_real_term</td>
<td>aca_n_alc</td>
<td>SIGLAS_ios</td>
<td>area</td>
<td>central</td>
<td>usuario_puntas</td>
<td>direccion</td>
 
</TR>


<?php

while($row = mysql_fetch_assoc($rs)) {
printf("<tr>

<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>

</tr>", 

$row["referencia"],
$row["ref_tramo"],
$row["edo_tramo"],
$row["coordinacion_abrev"],
$row["coordinacion"],
$row["fecha_afect"],
$row["ete_n"],
$row["fase_serv"],
$row["edo_serv"],
$row["tipo_tecnologia"],
$row["tipo_lada_enlace"],
$row["fec_act"],
$row["tra_obser"],
$row["tra_punta"],
$row["ete_n_rc"],
$row["area_responsable"],
$row["fec_real_term"],
$row["aca_n_alc"],
$row["SIGLAS_ios"],
$row["area"],
$row["central"],
$row["usuario_puntas"],
$row["direccion"]);

}
mysql_free_result($rs);
mysql_close($link);  //Cierras la Conexión
?>
</table>
</body>
</html>



