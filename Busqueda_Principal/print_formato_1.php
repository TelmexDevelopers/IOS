<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');	
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('connection.php');	

$referencia = $_GET['referencia'];
$ser_n = $_GET['ser_n'];
$num_ot = $_GET['num_ot'];
	
	$sql = "
	SELECT 
	str_Num_OT,
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
	referencia,
	ser_n,
	CLIENTE_B,
	DOMICILIO_B,
	RESPONSABLE_CLIENTE_B,
	TELEFONO_CLIENTE_B,
	str_Observaciones,
	dt_due_date,
	bol_nocturno

	FROM vw_ot 
	WHERE referencia ='".$referencia."' AND ser_n = '".$ser_n."' AND str_Num_OT = '".$num_ot."' LIMIT 1";
//echo $sql;
	//realiza una consulta para poder mostrar el resultado con una variable y pintarlo str_replace en un html
	$RS = TraeRecordset($sql);
	//echo $sql;
	if (!$RS) die("No Recordset");
			
	while (!$RS->EOF)
	{
	
		$str_Num_OT = 			htmlentities($RS->fields(0));
		$dt_Fecha_Elaboracion = htmlentities($RS->fields(1));
		$CLIENTE = 				htmlentities($RS->fields(2));
		$DOMICILIO = 			htmlentities($RS->fields(3));
		$RESPONSABLE_CLIENTE = 	htmlentities($RS->fields(4));
		$TELEFONO_CLIENTE = 	htmlentities($RS->fields(5));
		$Responsable_OT_A = 	htmlentities($RS->fields(6));
		$Responsable_Contratista_A = htmlentities($RS->fields(7));
		$Responsable_OT_B = 	htmlentities($RS->fields(8));
		$Responsable_Contratista_B = htmlentities($RS->fields(9));
		$str_Tipo_Servicio = 	htmlentities($RS->fields(10));
		$str_tipo_trabajo = 	htmlentities($RS->fields(11));
		$str_Medio_Transmision =htmlentities($RS->fields(12));
		$edo_serv = 			htmlentities($RS->fields(13));
		$Elaboro_OT = 			htmlentities($RS->fields(14));
		$str_telefono_fijo_ipe =htmlentities($RS->fields(15));
		$Supervisor = 			htmlentities($RS->fields(16));
		$str_telefono_fijo_sup = htmlentities($RS->fields(17));
		$Subgerente = 		    htmlentities($RS->fields(18));
		$str_Descripcion_Trabajo = htmlentities($RS->fields(19));
		$cto_manto_A = 		   htmlentities( $RS->fields(20));
		$Jefe_TX_A = 		    htmlentities($RS->fields(21));
		$cto_manto_B = 	        htmlentities($RS->fields(22));
		$Jefe_TX_B =            htmlentities($RS->fields(23));
		$dt_Fecha_Inicio_Programada = htmlentities($RS->fields(24));
		$dt_Fecha_Terminacion_Programada = htmlentities($RS->fields(25));
		$referencia =           htmlentities($RS->fields(26));
		$ser_n =               htmlentities( $RS->fields(27));
		$CLIENTE_B =            htmlentities($RS->fields(28));
		$DOMICILIO_B =          htmlentities($RS->fields(29));
		$RESPONSABLE_CLIENTE_B = htmlentities($RS->fields(30));
		$TELEFONO_CLIENTE_B =   htmlentities($RS->fields(31));
		$str_Observaciones =    htmlentities($RS->fields(32));
		$dt_due_date =          htmlentities($RS->fields(33));
		$bol_nocturno =          htmlentities($RS->fields(34));
		if ($bol_nocturno == "1")
		{
			$bol_nocturno = "SI";
		}
		
		$RS->MoveNext();
		}
		
		if($RS)
		{
			$sql_ref_ot = "SELECT * FROM tb_referencias_ot WHERE referencia_principal = '".$referencia."' AND ser_n = '".$ser_n."' AND str_OT = '".$num_OT."'";
			$RS_ref_ot = TraeRecordset($sql_ref_ot);
			echo $sql_ref_ot;
			if (!$RS_ref_ot) die("No Recordset");
			$contador = 0;
			$cuantos = $RS_ref_ot->RecordCount();
			
			if ($cuantos > 0)
			{
			$tabla_ref .= '<table width="800" border="0" >';
				while(!$RS_ref_ot->EOF)
				{
					if ($contador == 0)
					{
						$tabla_ref .= '<tr>';
					}
						if ($RS_ref_ot->fields(0) != "")
						{
							$tabla_ref .= '<td align="left"><b>'.$RS_ref_ot->fields(1).'</b></td>';
						} else {
							$tabla_ref .= '<td>&nbsp;</td>';
						}
					if ($contador == 3)
					{
						$tabla_ref .= '</tr>';
						$contador == 0;
					}
					$contador++;
					$RS_ref_ot->MoveNext();
				}
			$tabla_ref .= '</table>';
			} else {
				$tabla_ref .= '&nbsp;
				';
			}
			
		$RS_ref_ot->Close();
		$RS_ref_ot = NULL;
			
		}
		$RS->Close();
		$RS = NULL;
	
	
	
		$html = file_get_contents('formato_1.html');	
		
		$html = str_replace('<#REF1_OT>',		     $referencia,$html);
		$html = str_replace('<#REFERENCIAS_OT>',		     $tabla_ref,$html);
		$html = str_replace('<#NUM_OT>',		     $str_Num_OT,$html);
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
		$html = str_replace('<#DUE_DATE>',	         $dt_due_date,$html);
		$html = str_replace('<#NOCTURNO>',	     $bol_nocturno,$html);


    echo strval($html); 
	

//echo '<script>print();<script>';

$yay = str_ireplace($find, $replace , $html); 
?>