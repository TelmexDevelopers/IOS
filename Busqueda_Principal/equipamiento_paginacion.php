<table border="0px">
<tr>
	<td><br>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="button"  width="250" name="xls" id="xls"  value="Enviar a MS Excel"/>
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
  
//	
	
	$t=$_GET["t"];

	$campos="";
	$cont = 0;
	
	
	if ($_GET["t"] != "")
	{
		$campos.=" AND referencia = '$t' ";
	}
	
	$cont++;


	$sql = " SELECT 
	
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

 	FROM vw_ios_reg WHERE id_area_responsable IN (4,5,6,7,8,9) ".$campos."  ";
	//echo $sql;
	if (isset($_GET['t'])!="")
	{
		$_SESSION['ref_telmex'] = $_GET['t'];

	}
		$rows_per_page = 100;
    
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);

?>

