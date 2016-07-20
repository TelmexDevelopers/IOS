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

	//$SQL = "SELECT str_Fase_IOS_CNS,str_referencia_hub,PBA_TRASPASO_C_A,PBA_TRASPASO_C_TX,dt_FECHA_LIQ_CNA,dt_FECHA_ING_CNA,str_FECHA_PROG,str_NOM_SOLICITANTE, id_Fase_IOS,id_Fase_IOS FROM vw_cns_2 WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n."'"  ;
	
	$SQL = "SELECT a.str_Fase_IOS_CNS,a.str_referencia_hub,a.str_tipo_hub,a.PBA_TRASPASO_C_A,a.PBA_TRASPASO_C_TX,a.dt_FECHA_LIQ_CNA,
a.dt_FECHA_ING_CNA,a.dt_FECHA_PRO_RES,a.str_FECHA_PROG,a.str_NOM_SOLICITANTE,a.id_Fase_IOS,a.id_Fase_IOS, b.id_Fase_IOS,c.str_Fase_IOS,a.dt_fec_fase_IOS, b.dt_Fecha_Fase_IOS
FROM vw_cns_2 a
LEFT JOIN tb_IOS b ON a.referencia = b.referencia AND a.ser_n = b.ser_n
LEFT JOIN cat_Fase_IOS c ON b.id_Fase_IOS = c.id_Fase_IOS WHERE a.referencia = '".$referencia."' AND a.ser_n = '".$ser_n."'"  ;
//	echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
		if ($num_registros > 0) {
			$str_Fase_IOS = $RS->fields(0);
			$id_Fase_IOS_cns = $RS->fields(11);
			$str_referencia_hub = $RS->fields(1);
			$str_tipo_hub = $RS->fields(2);
			$bol_PBA_TRASPASO_A_C = $RS->fields(3);
			$bol_PBA_TRASPASO_C_TX = $RS->fields(4);
			$dt_FECHA_LIQ_CNA = $RS->fields(5);
			$dt_FECHA_ING_CNA = $RS->fields(6);
			$dt_FECHA_PRO_RES = $RS->fields(7);
			$str_FECHA_PROG = $RS->fields(8);
			$str_NOM_SOLICITANTE = $RS->fields(9);
			$id_Fase_IOS_cns = $RS->fields(10);
			$id_Fase_IOS_G = $RS->fields(12);
			$str_Fase_IOS_G = $RS->fields(13);
			$Fecha_Fase_IOS_CNS = $RS->fields(14);
			$Fecha_Fase_IOS_G = $RS->fields(15);
		}
	$json = array('str_Fase_IOS' => $str_Fase_IOS,'id_Fase_IOS_cns' => $id_Fase_IOS_cns,'str_referencia_hub' => $str_referencia_hub,'str_tipo_hub' => $str_tipo_hub,'bol_PBA_TRASPASO_A_C' => $bol_PBA_TRASPASO_A_C,'bol_PBA_TRASPASO_C_TX' => $bol_PBA_TRASPASO_C_TX,'dt_FECHA_LIQ_CNA' => $dt_FECHA_LIQ_CNA,'dt_FECHA_ING_CNA' => $dt_FECHA_ING_CNA,'dt_FECHA_PRO_RES' => $dt_FECHA_PRO_RES,'str_FECHA_PROG' => $str_FECHA_PROG,'str_NOM_SOLICITANTE' => $str_NOM_SOLICITANTE,'id_Fase_IOS_G' => $id_Fase_IOS_G,'str_Fase_IOS_G' => $str_Fase_IOS_G,'Fecha_Fase_IOS_CNS' => $Fecha_Fase_IOS_CNS,'Fecha_Fase_IOS_G' => $Fecha_Fase_IOS_G);
	
	header('Content-type: text/json');
	header('Content-type: application/json');
	echo json_encode($json);

?>