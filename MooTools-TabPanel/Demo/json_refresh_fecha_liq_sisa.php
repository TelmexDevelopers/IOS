<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');

$referencia = $_GET['referencia'];
$id_tramos = $_GET['id_tramos'];

if ($referencia != "" && $id_tramos != "")
{
	$SQL = "SELECT a.referencia, a.id_tramos, a.id_proy_rda,b.Edo_proy_rda, a.dt_liquidada
FROM tb_equip_fo a
LEFT JOIN cat_edo_proy_rda b ON a.id_proy_rda = b.id_proy_rda
WHERE a.referencia = '".$referencia."' AND a.id_tramos = ".$id_tramos."" ;

	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
		if ($num_registros > 0) {
			
			$referencia = $RS->fields(0);
			$id_tramos = $RS->fields(1);
			$id_proy_rda = $RS->fields(2);
			$Edo_proy_rda = $RS->fields(3);
			$dt_liquidada = $RS->fields(4);
		
		
			$json = array(
			'referencia' => $referencia, 
			'id_tramos' => $id_tramos, 
			'id_proy_rda' => $id_proy_rda, 
			'Edo_proy_rda' => $Edo_proy_rda, 
			'dt_liquidada' => $dt_liquidada); 
			
		header('Content-type: text/json');
		header('Content-type: application/json');
		echo json_encode($json);
		} else {
			echo "no hay registro";	
			
		}
} else {
	echo "Datos incompletos";	
}
?>