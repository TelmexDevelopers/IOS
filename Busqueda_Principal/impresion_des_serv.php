<?php
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');	
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');

	include('../../adodb/adodb.inc.php');
	include('connection.php');	
	
	$referencia = $_GET['referencia'];
	$ser_n = $_GET['ser_n'];
	$num_ot = $_GET['num_ot'];

	$sql = "select 

	str_referencia,
	CLIENTE,
	id_Responsable_Contratista_A,
	id_Responsable_Contratista_B,
	DOMICILIO,
	RESPONSABLE_CLIENTE ,
	TELEFONO_CLIENTE,
	str_Tipo_Servicio,
	id_Tipo_Trabajo, 
	str_Descripcion_Trabajo_Otro,
	dt_Fecha_Inicio_Programada,
	dt_Fecha_Terminacion_Programada,
	dt_Fecha_Terminacion_Real,
	dt_Fecha_Elaboracion
	from tb_ot 
	
	"; 		

//realiza una consulta para poder mostrar el resultado con una variable y pintarlo str_replace en un html

	$RS =  TraeRecordset($sql);
	echo ($sql);
	if (!$RS) die("No Recordset");


	$referencia = 						$RS->fields(32);
	$CLIENTE = 							$RS->fields(2); 		
	$id_Responsable_Contratista_A = 	$RS->fields(8); 
	$id_Responsable_Contratista_B = 	$RS->fields(10);		
	$DOMICILIO = 						$RS->fields(3); 	
	$RESPONSABLE_CLIENTE = 				$RS->fields(4); 	
	$TELEFONO_CLIENTE = 				$RS->fields(5); 
	$str_Tipo_Servicio = 				$RS->fields(11);	
	$id_Tipo_Trabajo = 					$RS->fields(12); 	
	$str_Descripcion_Trabajo_Otro =  	$RS->fields(22); 
	$dt_Fecha_Inicio_Programada = 		$RS->fields(27);  
	$dt_Fecha_Terminacion_Programada = 	$RS->fields(28); 	
	$dt_Fecha_Terminacion_Real = 		$RS->fields(29);	 
	$dt_Fecha_Elaboracion = 			$RS->fields(1); 	
	
		$html = file_get_contents('formato.html');
		
		
	function impresion_ot($html) 
	{
	$html = str_replace('<#NUM_OT>',		$referencia,$html);
	$html = str_replace('<#RESPONSABLE_A>',	$CLIENTE,$html);
	$html = str_replace('<#RESP_OT>',		$id_Responsable_Contratista_A,$html);
	$html = str_replace('<#SIG_OT_1>',		$id_Responsable_Contratista_B,$html);
	$html = str_replace('<#DOM_OT_1>',		$DOMICILIO,$html);
	$html = str_replace('<#CNTRL_OT>',		$RESPONSABLE_CLIENTE,$html);
	$html = str_replace('<#CNTRALB_OT>',	$TELEFONO_CLIENTE,$html);
	$html = str_replace('<#TELF_OT>',		$str_Tipo_Servicio,$html);
	$html = str_replace('<#TRNS_OT>',		$id_Tipo_Trabajo,$html);
	$html = str_replace('<#TRNSMI_OT>',		$str_Descripcion_Trabajo_Otro,$html);
	$html = str_replace('<#REF1_OT>',		$dt_Fecha_Inicio_Programada,$html);	
	$html = str_replace('<#REF2_OT>',		$dt_Fecha_Terminacion_Programada,$html);
	$html = str_replace('<#TPSERV_OT>',		$dt_Fecha_Terminacion_Real,$html);
	$html = str_replace('<#TRBJ_OT>',		$dt_Fecha_Elaboracion,$html);
	}
	
	echo $html;

//echo '<script>print();
// /script>';
?>