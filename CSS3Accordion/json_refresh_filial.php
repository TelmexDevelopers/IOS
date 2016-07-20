<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
require("../adodb/adodb.inc.php");
require("../includes/connection.php");

//$referencia = $_POST['referencia'];
//$ser_n = $_POST['ser_n'];
$referencia = $_GET['referencia'];
$ser_n = $_GET['ser_n'];

	$SQL = "SELECT id_Fase_IOS_Filial, str_Fase_IOS_Filial, dt_Fecha_Fase_IOS_Filial, id_Aceptacion_OT, str_Aceptacion_OT,	dt_Fecha_Aceptacion FROM vw_filial_2 WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n."' AND id_Filial = '".$_SESSION["id_Filial"]."'"  ;
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
		if ($num_registros > 0)
		{
			$id_Fase_IOS_Filial = $RS->fields(0);
			$str_Fase_IOS_Filial = $RS->fields(1);
			$dt_Fecha_Fase_IOS_Filial = $RS->fields(2);
			$id_Aceptacion_OT = $RS->fields(3);
			$str_Aceptacion_OT = $RS->fields(4);
			$dt_Fecha_Aceptacion = $RS->fields(5);
		}
	$json = array('id_Fase_IOS_Filial' => $id_Fase_IOS_Filial, 'str_Fase_IOS_Filial' => $str_Fase_IOS_Filial, 'dt_Fecha_Fase_IOS_Filial' => $dt_Fecha_Fase_IOS_Filial, 'id_Aceptacion_OT' => $id_Aceptacion_OT, 'str_Aceptacion_OT' => $str_Aceptacion_OT, 'dt_Fecha_Aceptacion' => $dt_Fecha_Aceptacion);
	
	header('Content-type: text/json');
	header('Content-type: application/json');
	echo json_encode($json);

?>