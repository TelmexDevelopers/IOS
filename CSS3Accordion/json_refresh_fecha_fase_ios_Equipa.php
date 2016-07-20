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

$SQL = "SELECT 
a.dt_fecha_fase_ios,
b.dt_fecha_fase_ios
FROM tb_equipamiento a
LEFT JOIN vw_ios b ON a.referencia = b.referencia
AND a.ser_n = b.ser_n  
WHERE a.referencia = '".$referencia."' AND a.ser_n = '".$ser_n."'"  ;
	
	//echo $SQL;
	
	$RS = TraeRecordset($SQL);
	
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
		if ($num_registros > 0) {
			
			$dt_fecha_fase_IOS = $RS->fields(0);
			$dt_fecha_fase_IOS_Equipa = $RS->fields(1);
		}
	$json = array('dt_fecha_fase_IOS' => $dt_fecha_fase_IOS,'dt_fecha_fase_IOS_Equipa' => $dt_fecha_fase_IOS_Equipa);
	
	header('Content-type: text/json');
	header('Content-type: application/json');
	echo json_encode($json);

?>