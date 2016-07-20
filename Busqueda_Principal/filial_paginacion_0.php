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


//	$_SESSION['id_Filial'] = 4;

	$referencia =     $_POST["caja1"];
	$con_ot =         $_POST["con_ot"];
	$area_responsable = $_POST["area_responsable"];
	$area_cm =        $_POST["area_cm"];
	$cm =             $_POST["cm"];
	//$filial =         $_POST["filial"];
	$punta =          $_POST["punta"];
	
	$sql= 'SELECT referencia, ser_n, str_Punta, desc_serv, due_date, Grupo_dil_servicio, fase_serv, edo_serv, usuario, Familia, TECNOLOGIA, SUBGERENTE_RESPONSABLE, SUPERVISOR, str_Fase_IOS, dt_Fecha_Fase_IOS, str_Area_responsable, str_Filial, dt_Fecha_Envio_Construccion, str_OT, str_Aceptacion_OT, Contratista, str_Tel_Coord_Contratista, str_Fase_IOS_Filial, dt_Fecha_Fase_IOS_Filial, str_Asociado, str_Actividad, str_Central_A, Responsable_Contratista_A, str_Tel_Cont_A, str_Central_B, Responsable_Contratista_B, str_Tel_Cont_B, dt_Fecha_Envio_Entrega, dt_Fecha_Aceptacion, dt_Fecha_Asignacion,  dt_Fecha_Elaboracion, dt_Fecha_Programada_Construccion, dt_Fecha_Programada_Entrega, dt_Fecha_Construccion_Terminada, dt_Fecha_Devolucion, dt_Fecha_Real_Entrega, dt_Fecha_Obras_Canceladas FROM vw_filial_2 WHERE id_Filial ='.$_SESSION['id_Filial'];
	
	if ($referencia!="")
	{
		$_SESSION['ref_telmex'] =   $_POST["caja1"];
		$sql.=" AND referencia = '".$referencia."'";
	}
	if ($area_cm != "" && $area_cm  != "*")
	{
		
		$sql.=" AND area = '".$area_cm ."'  ";
	}
	if ($cm != "" && $cm  != "*")
	{
		
		$sql.=" AND cto_mantto = '".$cm ."'  ";
	}
	if ($punta != "" && $punta  != "*")
	{
		$sql.=" AND str_Punta = '".$punta ."'  ";
	}
	
	$rows_per_page = 100;
    echo $sql;
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);
	

?>
