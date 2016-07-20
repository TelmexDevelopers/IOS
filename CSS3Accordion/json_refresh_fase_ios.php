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

	$SQL = "SELECT a.id_Fase_IOS,b.str_Fase_IOS FROM tb_IOS a LEFT JOIN cat_Fase_IOS b ON a.id_Fase_IOS = b.id_Fase_IOS WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n."'"  ;
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
		if ($num_registros > 0) {
			$id = $RS->fields(0);
			$fase = $RS->fields(1);
		}
	$json = array('id' => $id,'fase' => $fase);
	
	header('Content-type: text/json');
	header('Content-type: application/json');
	echo json_encode($json);

?>