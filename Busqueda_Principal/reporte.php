<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Reportes.xls");
header("../../../adodb/adodb.inc.php");
header("../../../adodb/adodb-pager.inc.php");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>

<?php
$link = @mysql_connect("10.94.130.36", "ios_new", "provi");
mysql_select_db("ios_new", $link);


// maximo por pagina
$limit = 100;

// pagina pedida
//	var datos = 'q='+combo1+'&r='+combo2+'&s='+combo3+'&t='+texto+'&pag='+page;
			
	$id_DD=$_GET["id_DD"];
	$idcat_edo_servicio=$_GET["idcat_edo_servicio"];
	$id_Area_Responsable=$_GET["id_Area_Responsable"];
	$id_Fase_IOS=$_GET["id_Fase_IOS"];
	$id_Entidad=$_GET["id_Entidad"];
	$id_Fase_SISA=$_GET["id_Fase_SISA"];
	$idcat_con_OT=$_GET["idcat_con_OT"];
	$id_Usuario=$_GET["id_Usuario"];
	$id_Usuario=$_GET["id_Usuario"];
	$referencia=$_GET["referencia"];
	

	$campos="";
	$cont = 0;

if 
(
	$_GET["id_DD"] != "" ||
	$_GET["idcat_edo_servicio"] != "" ||
	$_GET["id_Area_Responsable"] != "" ||
	$_GET["id_Fase_IOS"] != "" ||
	$_GET["id_Entidad"] != "" ||
	$_GET["id_Fase_SISA"] != "" ||
	$_GET["idcat_con_OT"] != ""|| 
	$_GET["id_Usuario"] != ""||
	$_GET["id_Usuario"] != ""||
	$_GET["referencia"] != ""


	
	)
{
	$campos.="WHERE ";
}
if ($_GET["id_DD"] != "" || $_GET["id_DD"] == "*")
{
	
	$campos.="id_DD = '".$_GET["id_DD"]."'  ";
	$cont++;
}

if ($_GET["idcat_edo_servicio"] != "" || $_GET["idcat_edo_servicio"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" idcat_edo_servicio = '".$_GET["idcat_edo_servicio"]."'  ";
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
	$campos.=" id_Entidad = '".$_GET["id_Entidad"]."'  ";
	$cont++;
}
if ($_GET["id_Fase_SISA"] != "" || $_GET["id_Fase_SISA"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Fase_SISA = '".$_GET["id_Fase_SISA"]."'  ";
	$cont++;
}
if ($_GET["idcat_con_OT"] != "" || $_GET["idcat_con_OT"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" idcat_con_OT = '".$_GET["idcat_con_OT"]."'  ";
	$cont++;
}
if ($_GET["id_Usuario"] != "" || $_GET["id_Usuario"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Usuario = '".$_GET["id_Usuario"]."'  ";
	$cont++;
}
if ($_GET["id_Usuario"] != "" || $_GET["id_Usuario"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" id_Usuario = '".$_GET["id_Usuario"]."'  ";
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

if ($_GET["v"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" referencia = '$v'";
	$cont++;
}


$pag = (int) $_GET["pag"];
if ($pag < 1)
{
   $pag = 1;
}
$offset = ($pag-1) * $limit;
//echo $pag;

$sql = "SELECT SQL_CALC_FOUND_ROWS 
referencia,
referencia,
ser_n,
desc_serv,
due_date,
Grupo_dil_servicio,
fase_serv,
edo_serv,
fecha_estado,
tipo_art,
Tipo_de_proyecto,
Familia,
TECNOLOGIA,
ancho_banda,
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
ipe_wifa,
id_usuario_ipe_wifa,
id_usuario_jefe_inmediato,
sup_analisis,
dt_Fecha_Fase_IOS,
dt_Fecha_INI_Analisis,
dt_Fecha_FIN_Analisis,
dt_Fecha_INI_Equipamiento,
dt_Fecha_FIN_Equipamiento,
dt_Fecha_INI_Seguimiento,
dt_Fecha_FIN_Seguimiento,
dt_Fecha_INI_Documentacion,
dt_Fecha_FIN_Documentacion,
dt_Fecha_INI_Construccion,
dt_Fecha_FIN_Construccion,
dt_Fecha_INI_Entrega,
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
Programa,
siglas,
area,
cto_mantto,
usuario_pta,
direccion




 FROM vw_ios_reg ".$campos." LIMIT $offset, $limit";
//echo $sql;
$sqlTotal = "SELECT FOUND_ROWS() as total";

$rs = mysql_query($sql);
$rsTotal = mysql_query($sqlTotal);

$rowTotal = mysql_fetch_assoc($rsTotal);
// Total de registros sin limit
$total = $rowTotal["total"];
/* FROM tb_seguimiento_servicios ";
$result=mysql_query($sql,$IdConexion);*/

?>
<table border="1">
<tr>
<td>referencia</td>
<td>referencia</td>
<td>ser_n</td>
<td>desc_serv</td>
<td>due_date</td>
<td>Grupo_dil_servicio</td>
<td>fase_serv</td>
<td>edo_serv</td>
<td>fecha_estado</td>
<td>tipo_art</td>
<td>Tipo_de_proyecto</td>
<td>Familia</td>
<td>TECNOLOGIA</td>
<td>ancho_banda</td>
<td>usuario</td>
<td>sector</td>
<td>coordinacion_abrev</td>
<td>dir_division</td>
<td>str_Fase_IOS</td>
<td>id_fase_ios</td>
<td>str_Area_responsable</td>
<td>id_area_responsable</td>
<td>id_Usuario_Subgerente</td>
<td>SUBGERENTE_RESPONSABLE</td>
<td>id_Usuario_supervisor</td>
<td>SUPERVISOR</td>
<td>ipe_analisis</td>
<td>id_usuario_ipe_analisis</td>
<td>ipe_seguimiento</td>
<td>id_usuario_ipe_seguimiento</td>
<td>ipe_documentacion</td>
<td>id_usuario_ipe_documentacion</td>
<td>ipe_entrega</td>
<td>id_usuario_ipe_entrega</td>
<td>ipe_wifa</td>
<td>id_usuario_ipe_wifa</td>
<td>id_usuario_jefe_inmediato</td>
<td>sup_analisis</td>
<td>dt_Fecha_Fase_IOS</td>
<td>dt_Fecha_INI_Analisis</td>
<td>dt_Fecha_FIN_Analisis</td>
<td>dt_Fecha_INI_Equipamiento</td>
<td>dt_Fecha_FIN_Equipamiento</td>
<td>dt_Fecha_INI_Seguimiento</td>
<td>dt_Fecha_FIN_Seguimiento</td>
<td>dt_Fecha_INI_Documentacion</td>
<td>dt_Fecha_FIN_Documentacion</td>
<td>dt_Fecha_INI_Construccion</td>
<td>dt_Fecha_FIN_Construccion</td>
<td>dt_Fecha_INI_Entrega</td>
<td>dt_Fecha_FIN_Entrega</td>
<td>int_Documentado</td>
<td>id_Motivo_PPU</td>
<td>int_CON_OT</td>
<td>str_conOT</td>
<td>id_Medio_Acceso</td>
<td>str_problema_acceso</td>
<td>str_coment_probl_acceso</td>
<td>clas_1</td>
<td>clas_2</td>
<td>Programa</td>
<td>siglas</td>
<td>area</td>
<td>cto_mantto</td>
<td>usuario_pta</td>
<td>direccion</td>


 
</TR>


<?php

if(count($total)==0)
{
echo "<h2>No hay resultados para su búsqueda...</h2>";
}
else{
for($i=0;$i<sizeof($total);$i++)
{

   /*$pager = new ADODB_Pager($total,$rs);

   $pager->Render($rows_per_page=10);

mysql_free_result($rs);
mysql_close($link);  //Cierras la Conexión*/

	if (isset($_GET['referencia'])!="")
	{
		$_SESSION['ref_telmex'] = $_GET['referencia'];

	}
    $rows_per_page = 100;

	$pager = Pager($total,$rows_per_page, $_SESSION['ref_telmex']);


}

}
?>
</table>
</body>
</html>



