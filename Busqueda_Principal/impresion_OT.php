<?php
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');	
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');

	include('../../adodb/adodb.inc.php');
	include('connection.php');	
	
	$referencia = 		$_GET['referencia'];
	$id_ot= 			$_GET['id_ot'];
	$str_filial = 		$_GET['str_filial'];
	$DOMICILIO = 		$_GET['DOMICILIO'];
	$str_Nombre = 		$_GET['str_Nombre'];
	$str_Ap_paterno = 	$_GET['str_Ap_paterno'];
	$str_Ap_Materno = 	$_GET['str_Ap_Materno'];	
	$CLIENTE = 			$_GET['CLIENTE'];
	$RESPONSABLE_CLIENTE = $_GET['RESPONSABLE_CLIENTE'];
	$ID_CM_A = 			$_GET['ID_CM_A'];
	$ID_CM_B = 			$_GET['ID_CM_B'];
	$responsable = 		$_GET['responsable'];
	$TELEFONO_CLIENTE = $_GET['TELEFONO_CLIENTE'];
	$str_Tipo_Servicio =$_GET['str_Tipo_Servicio'];
	$str_tipo_trabajo =$_GET['str_tipo_trabajo'];
	
	//$str_ser_n = $_GET['str_ser_n'];
	//$num_ot = $_GET['num_ot'];
	
	$sql = "
	select 

	id_ot,
	dt_Fecha_Elaboracion,
	CLIENTE,
	DOMICILIO,
	RESPONSABLE_CLIENTE,
	TELEFONO_CLIENTE,
	str_prioridad,
	Responsable_OT_A,
	Responsable_Contratista_A,
	Responsable_OT_B,
	Responsable_Contratista_B,
	str_Tipo_Servicio,
	str_tipo_trabajo,
	str_tipo_enlace,
	str_Medio_Transmision,
	edo_serv,
	str_Tipo_Mercado,
	Elaboro_OT,
	str_telefono_fijo_ipe,
	Supervisor,
	str_telefono_fijo_sup,
	Subgerente,
	str_Descripcion_Trabajo,
	str_Descripcion_Trabajo_Otro,
	cto_manto_A,
	Jefe_TX_A,
	cto_manto_B,
	Jefe_TX_B,
	dt_Fecha_Inicio_Programada,
	dt_Fecha_Terminacion_Programada,
	dt_Fecha_Terminacion_Real,
	int_Recibio_Cliente,
	str_Numero_Reporte,
	referencia,
	ser_n,
	CLIENTE_B,
	DOMICILIO_B,
	RESPONSABLE_CLIENTE_B,
	TELEFONO_CLIENTE_B,
	DD_A,
	DD_B,
	str_Observaciones,
	dt_due_date
	
	 from VW_OT
	
				WHERE str_referencia = '".$referencia."'
	
	AND id_ot =  	     	'".$id_ot."'	
 	AND CLIENTE = 	     	'".$CLIENTE."' 
	AND str_filial = 	 	'".$str_filial."'
	AND str_Nombre =     	'".$str_Nombre."'
	AND str_Ap_paterno = 	'".$str_Ap_paterno."'
	AND str_Ap_Materno = 	'".$str_Ap_Materno."'
	AND DOMICILIO =      	'".$DOMICILIO."' 
	AND RESPONSABLE_CLIENTE = '".$RESPONSABLE_CLIENTE."'
	AND ID_CM_A = 		 	'".$ID_CM_A."'
	AND ID_CM_B = 		 	'".$ID_CM_B."'
	and responsable = 		'".$responsable."'
	AND TELEFONO_CLIENTE =  '".$TELEFONO_CLIENTE."'
	AND str_Tipo_Servicio = '".$str_Tipo_Servicio."'
	AND str_tipo_trabajo  = '".$str_tipo_trabajo."';
	";
	
	  		
	//realiza una consulta para poder mostrar el resultado con una variable y pintarlo str_replace en un html
	$RS =  TraeRecordset($sql);
	//echo ($sql);
	if (!$RS) die("No Recordset");
			
	$REF               = $referencia;
	//$N_OT              = $id_ot;
	$NOMBRE            = $str_Nombre;
	$AP_P              = $str_Ap_paterno;
	$AP_M              = $str_Ap_Materno;
	$DOM  			   = $DOMICILIO;
	$CLIENT 		   = $CLIENTE;
	$RESPN_CLIENTE 	   = $RESPONSABLE_CLIENTE;
	$ID_CM_A 		   = $ID_CM_A;
	$ID_CM_B 		   = $ID_CM_B;
	$responsabl 	   = $responsable;
	$TELEFONO_CLIENTE  = $TELEFONO_CLIENTE;
	$TELEFONO_CLIENTE  = $TELEFONO_CLIENTE;
	$str_Tipo_Servicio = $str_Tipo_Servicio;
	
	
	
	
	
	/*********************INICIO**datos sin bd**********************/
	$jefe_resp  = 'RAMON ALTAMIRANO CARDENAS';
	$REFERENCIA2  = 'A32-1212-0205';
	$TIPO_TRABajo = 'ALTA';
	$ELABORO = 'FRANCISCO GARCIA HUITRON';
	$str_tipo_trabajo = 'PRUEBA DE MEDIO';
	$N_OT = 'UIL-55414/2012';
	/******************FIN *****datos sin bd**********************/
	
	$html = file_get_contents('formato.html');	
	
	
	$html = str_replace('<#NUM_OT>',		     $N_OT,$html);
	$html = str_replace('<#REF1_OT>',		     $REF,$html);
	$html = str_replace('<#RESPONSABLE_A>',	     $str_filial,$html);
	$html = str_replace('<#DOM_OT_1>',	       	 $DOM,$html);
	//$html = str_replace('<#RESP_OT>',	       	 $RESPONSABLE_CLIENTE,$html);
	$html = str_replace('<#RESP_OT>',	       	 $RESPN_CLIENTE,$html);
	$html = str_replace('<#SIG_OT_1>',	         $CLIENTE,$html);
	$html = str_replace('<#RESP_OT_CONTRATISTA>',strval($NOMBRE.' '.$AP_P.' '.$AP_M),$html);
	$html = str_replace('<#CNTRL_OT>',	         $ID_CM_A,$html);
	$html = str_replace('<#CNTRALB_OT>',	     $ID_CM_B,$html);
	$html = str_replace('<#TELF_OT>',	    	 $TELEFONO_CLIENTE,$html);
	$html = str_replace('<#TPSERV_OT>',	    	 $str_Tipo_Servicio,$html);
	$html = str_replace('<#DESPTR_OT>',	    	 $str_tipo_trabajo,$html);
	
	
	
	
     /****inicio de datos sin BD **************************************************/
	
	$html = str_replace('<#TRNS_OT>',	    	 $jefe_resp,$html);
	$html = str_replace('<#TRNSMI_OT>',	    	 $jefe_resp,$html);
	$html = str_replace('<#REF2_OT>',	    	 $REFERENCIA2,$html);
	$html = str_replace('<#TRBJ_OT>',	    	 $TIPO_TRABajo,$html);
	$html = str_replace('<#ELABORO_OT>',	     $ELABORO,$html);
	
	/****FIN de datos sin BD **************************************************/
	
	echo $html;

//echo '<script>print();
// /script>';
//$yay = str_ireplace($find, $replace , $html); 
?>