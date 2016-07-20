<?php
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');	
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');

	include('../../adodb/adodb.inc.php');
	include('connection.php');	
	
	$referencia = 		               $_GET['referencia'];
	$No_OT= 			               $_GET['No_OT'];
	$Responsable_OT_A =                $_GET['Responsable_OT_A'];
	$Responsable_OT_B =                $_GET['Responsable_OT_B'];
	$Responsable_Contratista_A =       $_GET['Responsable_Contratista_A'];
	$Responsable_Contratista_B =       $_GET['Responsable_Contratista_B'];
	$CLIENTE = 		                   $_GET['CLIENTE'];
	$DOMICILIO = 	                   $_GET['DOMICILIO'];
	$RESPONSABLE_CLIENTE =             $_GET['RESPONSABLE_CLIENTE'];	
	$cto_manto_A = 			           $_GET['cto_manto_A'];
	$cto_manto_B = 			           $_GET['cto_manto_B'];
	$TELEFONO_CLIENTE =                $_GET['TELEFONO_CLIENTE'];
    $Jefe_TX_A = 			           $_GET['Jefe_TX_A'];
	$Jefe_TX_B = 			           $_GET['Jefe_TX_B'];
	$str_Tipo_Servicio = 	           $_GET['str_Tipo_Servicio'];
	$str_tipo_trabajo =                $_GET['str_tipo_trabajo'];
	$str_Descripcion_Trabajo =         $_GET['str_Descripcion_Trabajo'];
	$Elaboro_OT =				       $_GET['Elaboro_OT'];
	$Supervisor  =				       $_GET['Supervisor'];
	$dt_Fecha_Elaboracion =            $_GET['dt_Fecha_Elaboracion'];
	$dt_Fecha_Inicio_Programada =      $_GET['dt_Fecha_Inicio_Programada'];
	$dt_Fecha_Terminacion_Programada = $_GET['dt_Fecha_Terminacion_Programada'];
	$dt_Fecha_Terminacion_Real =       $_GET['dt_Fecha_Terminacion_Real'];
	$Subgerente =       $_GET['Subgerente'];
	
	
	
	
	$sql = "
	select 
	No_OT,
	dt_Fecha_Elaboracion,
	CLIENTE,
	DOMICILIO,
	RESPONSABLE_CLIENTE,
	TELEFONO_CLIENTE,
	Responsable_OT_A,
	Responsable_Contratista_A,
	Responsable_OT_B,
	Responsable_Contratista_B,
	str_Tipo_Servicio,
	str_tipo_trabajo,
	str_Medio_Transmision,
	edo_serv,
	Elaboro_OT,
	str_telefono_fijo_ipe,
	Supervisor,
	str_telefono_fijo_sup,
	Subgerente,
	str_Descripcion_Trabajo,
	cto_manto_A,
	Jefe_TX_A,
	cto_manto_B,
	Jefe_TX_B,
	dt_Fecha_Inicio_Programada,
	dt_Fecha_Terminacion_Programada,
	dt_Fecha_Terminacion_Real,
	str_Numero_Reporte,
	referencia,
	str_ser_n,
	CLIENTE_B,
	DOMICILIO_B,
	RESPONSABLE_CLIENTE_B,
	TELEFONO_CLIENTE_B,
	str_Observaciones

	from vw_ot 
				WHERE referencia ='".$referencia."'
				AND No_OT  =                    '".$No_OT."'
				AND Responsable_OT_A =          '".$Responsable_OT_A."'
				AND Responsable_OT_B =          '".$Responsable_OT_B."'
				AND Responsable_Contratista_A = '".$Responsable_Contratista_A."'
				AND Responsable_Contratista_B = '".$Responsable_Contratista_B."'
				AND CLIENTE = 					'".$CLIENTE."'
				AND DOMICILIO = 				'".$DOMICILIO."'
				AND RESPONSABLE_CLIENTE = 		'".$RESPONSABLE_CLIENTE."'
				AND cto_manto_A = 				'".$cto_manto_A."'
				AND cto_manto_B = 				'".$cto_manto_B."'
				AND TELEFONO_CLIENTE = 			'".$TELEFONO_CLIENTE."'
				AND Jefe_TX_A = 				'".$Jefe_TX_A."'
				AND Jefe_TX_A = 				'".$Jefe_TX_B."'
				AND str_Tipo_Servicio = 		'".$str_Tipo_Servicio."'
				AND str_tipo_trabajo =		    '".$str_tipo_trabajo."'
				AND str_Descripcion_Trabajo =   '".$str_Descripcion_Trabajo."'
				AND Elaboro_OT = 				'".$Elaboro_OT."'
				AND Supervisor = 				'".$Supervisor."'
				AND dt_Fecha_Elaboracion  = 	'".$dt_Fecha_Elaboracion."'
				AND dt_Fecha_Inicio_Programada ='".$dt_Fecha_Inicio_Programada."'
				AND dt_Fecha_Terminacion_Programada = '".$dt_Fecha_Terminacion_Programada."'
				AND dt_Fecha_Terminacion_Real = 	  '".$dt_Fecha_Terminacion_Real."'
				AND Subgerente =  					  '".$Subgerente."'
				";	
	
	
	
	  		
	//realiza una consulta para poder mostrar el resultado con una variable y pintarlo str_replace en un html
	$RS =  TraeRecordset($sql);
	//echo ($sql);
	if (!$RS) die("No Recordset");
			
	$referencia           = $referencia;
	$No_OT                = $No_OT;
	$Responsable_OT_A     = $Responsable_OT_A;
	$Responsable_OT_B     = $Responsable_OT_B;
	$Responsable_Contratista_A  = $Responsable_Contratista_A;
	$Responsable_Contratista_B = $Responsable_Contratista_B;
	$CLIENTE              = $CLIENTE;
	$DOMICILIO 		      = $DOMICILIO;
	$RESPONSABLE_CLIENTE  = $RESPONSABLE_CLIENTE;
	$cto_manto_A 		  = $cto_manto_A;
	$cto_manto_B          = $cto_manto_B;
	$TELEFONO_CLIENTE 	  = $TELEFONO_CLIENTE;
	$Jefe_TX_A 	          = $Jefe_TX_A;
	$Jefe_TX_B            = $Jefe_TX_B;
	$str_Tipo_Servicio    = $str_Tipo_Servicio;
	$str_tipo_trabajo     = $str_tipo_trabajo;
	$str_Descripcion_Trabajo  = $str_Descripcion_Trabajo;
	$Elaboro_OT 		  = $Elaboro_OT;
    $Supervisor           =  $Supervisor;
	$dt_Fecha_Elaboracion = $dt_Fecha_Elaboracion;
	$dt_Fecha_Inicio_Programada = $dt_Fecha_Inicio_Programada;
	$dt_Fecha_Terminacion_Programada = $dt_Fecha_Terminacion_Programada;
	$dt_Fecha_Terminacion_Real = $dt_Fecha_Terminacion_Real;
	$Subgerente            = $Subgerente;
	
	
	
	$html = file_get_contents('formato.html');	
	
	
	$html = str_replace('<#REF1_OT>',		     $referencia,$html);
	$html = str_replace('<#NUM_OT>',		     $No_OT,$html);
	$html = str_replace('<#RESPONSABLE_A>',	     $Responsable_OT_A,$html);
	$html = str_replace('<#RESPONSABLE_B>',	     $Responsable_OT_B,$html);
	$html = str_replace('<#RESP_OT_CONTRATISTA>',$Responsable_Contratista_A,$html);
	$html = str_replace('<#RESP_OT_CONTRATISTA>',$Responsable_Contratista_B,$html);
	$html = str_replace('<#SIG_OT_1>',	       	 $CLIENTE,$html);
	$html = str_replace('<#DOM_OT_1>',	       	 $DOMICILIO,$html);
	$html = str_replace('<#SIG_OT_1>',	         $CLIENTE,$html);
	$html = str_replace('<#RESP_CLIENTE>',	     $RESPONSABLE_CLIENTE,$html);
	//$html = str_replace('<#RESP_OT_CONTRATISTA>',strval($NOMBRE.' '.$AP_P.' '.$AP_M),$html);
	$html = str_replace('<#CNTRL_OT>',	         $cto_manto_A,$html);
	$html = str_replace('<#CNTRALB_OT>',         $cto_manto_B,$html);
	$html = str_replace('<#TELF_OT>',	         $TELEFONO_CLIENTE,$html);
	$html = str_replace('<#TRNS_OT>',	    	 $Jefe_TX_A,$html);
	$html = str_replace('<#TRNSMI_OT_B>',        $Jefe_TX_B,$html);
    $html = str_replace('<#TIPO_S_OT>',	         $str_Tipo_Servicio,$html);
	$html = str_replace('<#T_D_TRABAJO>',	     $str_tipo_trabajo,$html);
	$html = str_replace('<#DESPTR_OT>',	         $str_Descripcion_Trabajo,$html);
	$html = str_replace('<#ELABORO_OT>',         $Elaboro_OT,$html);
	$html = str_replace('<#AUTORIZO>',	         $Supervisor,$html);
	$html = str_replace('<#FECHA_ELABORACION>',	 $dt_Fecha_Elaboracion,$html);
	$html = str_replace('<#FECHA_INICIO>',	     $dt_Fecha_Inicio_Programada,$html);
	$html = str_replace('<#FECHA_PROGRAMADA> ',	 $dt_Fecha_Terminacion_Programada,$html);
	$html = str_replace('<#FECHA_TERMINACION_REAL>', $dt_Fecha_Terminacion_Real,$html);
	$html = str_replace('<#SUBGERENTE>',	     $Subgerente,$html);
	$html = str_replace('<#SUPERVISOR_1>',	     $Supervisor,$html);
	
	
	
	echo $html;

echo '<script>print();
<script>';
//$yay = str_ireplace($find, $replace , $html); 
?>