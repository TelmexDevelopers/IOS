<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');

//$referencia = $_POST['referencia'];
//$ser_n = $_POST['ser_n'];
$referencia = $_GET['referencia'];
$id_tramos = $_GET['id_tramos'];

if ($referencia != "" && $id_tramos != "")
{
	$SQL = "SELECT 
a.dt_entrega_esp, a.dt_rec_site, a.id_prtx_status, c.str_prtx_status, a.dt_proy_concl, 
b.id_FO_Const_Estatus, f.str_fo_const_estatus, b.dt_entrega_fo, b.id_problem_cons, d.str_problema,
b.id_cons_status, e.str_estatus  
FROM (tb_equip_fo a
LEFT JOIN tb_eq_construcion b ON a.id_tramos = b.id_tramos)
LEFT JOIN cat_prtx_status c ON a.id_prtx_status = c.id_prtx_status
LEFT JOIN cat_problem_const d ON b.id_problem_cons = d.id_problem_cons
LEFT JOIN cat_estatus_cons e ON b.id_cons_estatus = e.id_cons_estatus
LEFT JOIN cat_FO_Const_Estatus f ON b.id_FO_Const_Estatus = f.id_FO_Const_Estatus
WHERE a.referencia = '".$referencia."' AND a.id_tramos = ".$id_tramos."" ;

	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
		if ($num_registros > 0) {
			
			$dt_entrega_esp = $RS->fields(0);
			$dt_rec_site = $RS->fields(1);
			$id_prtx_status = $RS->fields(2);
			$str_prtx_status = $RS->fields(3);
			$dt_proy_concl = $RS->fields(4);
			$id_FO_Const_Estatus = $RS->fields(5);
			$str_fo_const_estatus = $RS->fields(6);
			$dt_entrega_fo = $RS->fields(7);
			$id_problem_const = $RS->fields(8);
			$str_problema = $RS->fields(9);
			$id_cons_status = $RS->fields(10);
			$str_estatus = $RS->fields(11);
			
		
			$json = array(
			'dt_entrega_esp' => $dt_entrega_esp, 
			'dt_rec_site' => $dt_rec_site, 
			'id_prtx_status' => $id_prtx_status, 
			'str_prtx_status' => $str_prtx_status, 
			'dt_proy_concl' => $dt_proy_concl, 
			'id_FO_Const_Estatus' => $id_FO_Const_Estatus, 
			'str_fo_const_estatus' => $str_fo_const_estatus,
			'dt_entrega_fo' => $dt_entrega_fo,
			'id_problem_const' => $id_problem_const,
			'str_problema' => $str_problema,
			'id_cons_status' => $id_cons_status, 
			'str_estatus' => $str_estatus);
			
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