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

if ($referencia != "" && $ser_n != "")
{
	$SQL = "SELECT 
a.id_Fase_IOS,  
a.dt_fecha_fase_ios,
c.str_Fase_IOS,
a.id_supervisor,
CONCAT(d.str_Nombre,' ',d.str_Ap_Paterno,' ',d.str_Ap_Materno) as Supervisor_Eq,
a.referencia_base,
b.dt_Fecha_INI_Equipamiento,
a.id_edo_proyecto,
e.edo_proyecto, 
a.dt_fecha_proyecto,
a.dt_fecha_real_term,
a.id_estado_fo,
f.estado_fo, 
a.dt_fecha_fo,
a.id_Filial,
g.str_Filial,
a.id_edo_construccion,
h.edo_construccion, 
a.dt_fecha_provedor, 
a.dt_fecha_meta, 
a.dt_fecha_term_const,
b.id_Fase_ios,
b.str_Fase_IOS as str_Fase_IOS_Equipa,  
b.dt_fecha_fase_ios as dt_fecha_fase_IOS_Equipa
FROM tb_equipamiento a 
LEFT JOIN vw_ios b ON a.referencia = b.referencia 
AND a.ser_n = b.ser_n 
LEFT JOIN cat_Fase_IOS c ON a.id_Fase_IOS = c.id_Fase_IOS 
LEFT JOIN cat_Usuarios d ON a.id_supervisor = d.id_Usuario 
LEFT JOIN cat_edo_proyecto e ON a.id_edo_proyecto = e.id_edo_proyecto 
LEFT JOIN cat_edo_fo f ON a.id_estado_fo = f.id_edo_fo 
LEFT JOIN cat_Filial g ON a.id_Filial = g.id_Filial 
LEFT JOIN cat_edo_construccion h ON a.id_edo_construccion = h.id_edo_construccion 

WHERE a.referencia = '".$referencia."' AND a.ser_n = '".$ser_n."'" ;

	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
		if ($num_registros > 0) {
			
			$id_Fase_IOS = $RS->fields(0);
			$dt_fecha_fase_IOS_Equipa = $RS->fields(1);  //tb-equipamiento
			$str_Fase_IOS = htmlentities($RS->fields(2));
			$id_supervisor = $RS->fields(3);
			$Supervisor_Eq = htmlentities($RS->fields(4));
			$referencia_base = htmlentities($RS->fields(5));
			$dt_Fecha_INI_Equipamiento = $RS->fields(6);
			$id_edo_proyecto = $RS->fields(7);
			$edo_proyecto = htmlentities($RS->fields(8));
			$dt_fecha_proyecto = $RS->fields(9);
			$dt_fecha_real_term = $RS->fields(10);
			$id_estado_fo = $RS->fields(11);
			$estado_fo = htmlentities($RS->fields(12));
			$dt_fecha_fo = $RS->fields(13);
			$id_Filial = $RS->fields(14);
			$str_Filial = htmlentities($RS->fields(15));
			$id_edo_construccion = $RS->fields(16);
			$edo_construccion = htmlentities($RS->fields(17));
			$dt_fecha_provedor = $RS->fields(18);
			$dt_fecha_meta = $RS->fields(19);
			$dt_fecha_term_const = $RS->fields(20);
			$id_Fase_IOS_Equipa = $RS->fields(21);
			$str_Fase_IOS_Equipa = htmlentities($RS->fields(22));
			$dt_fecha_fase_IOS = $RS->fields(23); //tb_ios
		
		
			$json = array(
			'id_Fase_IOS' => $id_Fase_IOS, 
			'dt_fecha_fase_IOS_Equipa' => $dt_fecha_fase_IOS_Equipa, 
			'str_Fase_IOS' => $str_Fase_IOS, 
			'id_supervisor' => $id_supervisor, 
			'Supervisor_Eq' => $Supervisor_Eq, 
			'referencia_base' => $referencia_base, 
			'dt_Fecha_INI_Equipamiento' => $dt_Fecha_INI_Equipamiento, 
			'id_edo_proyecto' => $id_edo_proyecto, 
			'edo_proyecto' => $edo_proyecto, 
			'dt_fecha_proyecto' => $dt_fecha_proyecto,
			'dt_fecha_real_term' => $dt_fecha_real_term,
			'id_estado_fo' => $id_estado_fo,
			'estado_fo' => $estado_fo,
			'dt_fecha_fo' => $dt_fecha_fo,
			'id_Filial' => $id_Filial,
			'str_Filial' => $str_Filial,
			'id_edo_construccion' => $id_edo_construccion,
			'edo_construccion' => $edo_construccion,
			'dt_fecha_provedor' => $dt_fecha_provedor,
			'dt_fecha_meta' => $dt_fecha_meta,
			'dt_fecha_term_const' => $dt_fecha_term_const,
			'id_Fase_ios' => $id_Fase_IOS_Equipa,
			'str_Fase_IOS_Equipa' => $str_Fase_IOS_Equipa, 
			'dt_fecha_fase_IOS' => $dt_fecha_fase_IOS);
			
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