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
$limit = 100;

// pagina pedida
//	var datos = 'q='+combo1+'&r='+combo2+'&s='+combo3+'&t='+texto+'&pag='+page;
			
	$t=$_GET["t"];

	$campos="";
	$cont = 0;
	
	
	if ($_GET["t"] != "")
	{
		$campos.=" AND referencia = '$t' ";
	}
	
	$cont++;

	

$pag = (int) $_GET["pag"];
if ($pag < 1)
{
   $pag = 1;
}
$offset = ($pag-1) * $limit;
//echo $pag;

$sql = "SELECT SQL_CALC_FOUND_ROWS 
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
	str_Area_responsable,
	SUBGERENTE_RESPONSABLE,
	SUPERVISOR,
	ipe_analisis,
	ipe_seguimiento,
	ipe_documentacion,
	ipe_entrega,
	dt_Fecha_FIN_Entrega,
	int_Documentado,
	int_CON_OT,
	str_conOT,
	str_problema_acceso,
	str_coment_probl_acceso,
	clas_1,
	clas_2,
	Programa
 FROM vw_ios_reg WHERE id_area_responsable IN (4,5,6,7,8,9) ".$campos." LIMIT $offset, $limit";
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

<table border="1px">

<tr id="tr">


<td>referencia</td>
<td>ser_n</td>
<td>desc_serv</td>
<td>due_date</td>
<td>GRUPO_DIL_SERVICIO</td>
<td>fase_serv</td>
<td>edo_serv</td>
<td>fecha_estado</td>
<td>FAMILIA</td>
<td>TECNOLOGIA</td>
<td>usuario</td>
<td>sector</td>
<td>coordinacion_abrev</td>
<td>dir_division</td>
<td>str_Fase_IOS</td>
<td>str_Area_responsable</td>
<td>SUBGERENTE_RESPONSABLE</td>
<td>SUPERVISOR</td>
<td>ipe_analisis</td>
<td>ipe_seguimiento</td>
<td>ipe_documentacion</td>
<td>ipe_entrega</td>
<td>dt_Fecha_FIN_Entrega</td>
<td>int_Documentado</td>
<td>int_CON_OT</td>
<td>str_conOT</td>
<td>str_problema_acceso</td>
<td>str_coment_probl_acceso</td>
<td>clas_1</td>
<td>clas_2</td>
<td>Programa</td>
 
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
$row["ser_n"],
$row["desc_serv"],
$row["due_date"],
$row["GRUPO_DIL_SERVICIO"],
$row["fase_serv"],
$row["edo_serv"],
$row["fecha_estado"],
$row["FAMILIA"],
$row["TECNOLOGIA"],
$row["usuario"],
$row["sector"],
$row["coordinacion_abrev"],
$row["dir_division"],
$row["str_Fase_IOS"],
$row["str_Area_responsable"],
$row["SUBGERENTE_RESPONSABLE"],
$row["SUPERVISOR"],
$row["ipe_analisis"],
$row["ipe_seguimiento"],
$row["ipe_documentacion"],
$row["ipe_entrega"],
$row["dt_Fecha_FIN_Entrega"],
$row["int_Documentado"],
$row["int_CON_OT"],
$row["str_conOT"],
$row["str_problema_acceso"],
$row["str_coment_probl_acceso"],
$row["clas_1"],
$row["clas_2"],
$row["Programa"]);

}
mysql_free_result($rs);
mysql_close($link);  //Cierras la Conexión
?>
</table>
</body>
</html>



