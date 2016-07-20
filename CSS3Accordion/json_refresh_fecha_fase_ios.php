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

	$SQL = "SELECT dt_Fecha_Fase_IOS FROM tb_IOS WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n."'"  ;
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
		if ($num_registros > 0) {
			
			$fecha_fase = $RS->fields(0);
		}
	$json = array('fecha_fase' => $fecha_fase);
	
	header('Content-type: text/json');
	header('Content-type: application/json');
	echo json_encode($json);

?>