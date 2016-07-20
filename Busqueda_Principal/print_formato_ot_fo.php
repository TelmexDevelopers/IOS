<?php
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');	
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');

	include('../../adodb/adodb.inc.php');
	include('connection.php');	
    $id_ot = $_GET['id_ot'];
	
	if ($id_ot != "")
	{
		$sql = "select a.*,b.str_prioridad,b.str_descripcion FROM tb_ot_equip a LEFT JOIN cat_prioridad b ON a.id_prioridad = b.id_prioridad WHERE id_ot =".$id_ot." LIMIT 1";
		//realiza una consulta para poder mostrar el resultado con una variable y pintarlo str_replace en un html
		$RS =  TraeRecordset($sql);
		//echo $sql."<br>";
		if (!$RS) die("No Recordset");
		$cuantos = $RS->RecordCount();		
		if ($cuantos > 0)
		{
/*
str_OT, referencia, dt_fecha_OT, id_cat_usuarios_elab, id_cat_usuarios_vobo, id_cat_usuario_subgte, id_cat_usuario_filial, id_URR_cat_usuario_1, id_URR_cat_usuario_2, id_tb_equip_fo, codigo,n_accesso, CLL , f_REF, anillo, posicion_dbfo, F_ini, F_term, f_asignadas, element, elemnt_pep, trabajos_realizar, nota, P_DBFO, observaciones, prioridad, id_prioridad, str_prioridad, str_tipo_servicio, int_cantidad, str_descripcion
*/			
			$str_OT            =    $RS->fields(3);		
			$referencia        =    $RS->fields(4);
			$dt_fecha_OT       =    $RS->fields(6);
			$codigo            =    $RS->fields(14);
			$n_accesso         =    $RS->fields(15);
			$CLL               =    $RS->fields(16);
			$f_REF             =    $RS->fields(17);
			$anillo	           =    $RS->fields(18);
			$posicion_dbfo     =    $RS->fields(19);
			$F_ini             =    $RS->fields(20);
			$F_term			   =    $RS->fields(21);
			$element		   =    $RS->fields(23);
			$elemnt_pep 	   =    $RS->fields(24);
			$trabajos_realizar =    $RS->fields(25);
			$nota              =    $RS->fields(26);
			$prioridad         =    $RS->fields(29);
			$str_prioridad     =    $RS->fields(31);
			$str_tipo_servicio =    $RS->fields(32);
	
			//$RS->MoveNext();
		}
			
		$sql_2 = "SELECT * FROM vw_ot_tramos_fo WHERE referencia ='".$referencia."' LIMIT 1";
		//realiza una consulta para poder mostrar el resultado con una variable y pintarlo str_replace en un html
		$RS_2 =  TraeRecordset($sql_2);
		echo $sql_2."<br>";
		if (!$RS_2) die("No Recordset");
		$cuantos_2 = $RS_2->RecordCount();		
			if ($cuantos_2 > 0)
			{
				//$referencia            =    $RS_2->fields(0);	
				$central               =    $RS_2->fields(1);	
				$usuario               =    $RS_2->fields(2);		
				$usuario_puntas        =    $RS_2->fields(3);
				$direccion             =    $RS_2->fields(4);		
				$id_equip_FO           =    $RS_2->fields(5);	
				$dt_requiere_fo        =    $RS_2->fields(6);	
				$str_PEP               =    $RS_2->fields(7);	
				$str_anillo_rof        =    $RS_2->fields(8);
				$dt_asig_PEP           =    $RS_2->fields(9);		
		
				//$RS_2->MoveNext();
			}
			$RS_2->Close();
			$RS_2 = NULL;
			
			
/*				
			if($RS)
			{
				$sql_ref_ot = " SELECT int_cantidad,str_descripcion FROM tb_insumos WHERE id_ot = ".$id_ot." ";
				$RS_ref_ot = TraeRecordset($sql_ref_ot);
				echo $sql_ref_ot."<br>";
				if (!$RS_ref_ot) die("No Recordset");
				$contador = 0;
				$cuantos = $RS_ref_ot->RecordCount();
				
				if ($cuantos > 0)
				{
					while(!$RS_ref_ot->EOF)
					{
						$filas_unidades .= '
							<tr>
							  <td  align="center">'.$RS_ref_ot->fields(0).'</td>
							  <td  align="center">'.$RS_ref_ot->fields(1).'</td>
							</tr>
						';
						$RS_ref_ot->MoveNext();
					}
				} else {
					$tabla_ref .= '';
				}
			}
			$RS_ref_ot->Close();
			$RS_ref_ot = NULL;
			$RS->Close();
			$RS = NULL;
			$RS_4->Close();
			$RS_4 = NULL;
*/	
	
	
		$html = file_get_contents('Formato_ot_FO_TEST.html');	
		
        $meses = array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diiembre");
		$fecha = strval(date("d")."/".$meses[date("m")]."/".date("Y"));

		$html = str_replace('<#CODIGO>',$codigo,$html);
		$html = str_replace('<#PRIORIDAD>',$prioridad,$html);
		$html = str_replace('<#UIL>',$str_Num_OT,$html);
		//$html = str_replace('<#ASIGNADO_A>',$str_Num_OT,$html);
		$html = str_replace('<#DOMICILIO>',$direccion,$html);
		//$html = str_replace('<#TELEFONO>',$telefono,$html);
		$html = str_replace('<#FECHA>',$dt_fecha_OT,$html);
		$html = str_replace('<#RAZON_SOCIAL>',$usuario,$html);
		$html = str_replace('<#DOMICILIO_RAZON_SOCIAL>',$direccion,$html);
		$html = str_replace('<#RESPONSABLE_RAZON_SOCIAL>',$resp_razon_soc,$html);
		$html = str_replace('<#NODO_ACCESO>',$n_accesso,$html);
		$html = str_replace('<#CLL>',$CLL,$html);
		$html = str_replace('<#ANILLO>',$anillo,$html);
		$html = str_replace('<#TELEFONO_RAZON_SOCIAL>',$telefono_rs,$html);
		//$html = str_replace('<#FIBRAS_ASIGNADAS>',$fibras_asignadas,$html);
		$html = str_replace('<#POSICION_DBFO>',$posicion_dbfo,$html);
		$html = str_replace('<#referencia>',$referencia,$html);
		$html = str_replace('<#FECHA_INGRESO_SISA>',$f_REF,$html);
		$html = str_replace('<#FECHA_INICIO>',$F_ini,$html);
		$html = str_replace('<#FECHA_TERM>',$F_term,$html);
		$html = str_replace('<#ELEMENTO_FO>',$element,$html);
		$html = str_replace('<#ELEMENTO_CANALIZACION>',$elemnt_pep,$html);
		$html = str_replace('<#NOTA>',$nota,$html);
		$html = str_replace('<#OBSERVACIONES>',$observaciones,$html);
		$html = str_replace('<#TIPO_SERVICIO>',$str_tipo_servicio,$html);
		$html = str_replace('<#ELABORO>',$_SESSION['id_Usuario'],$html);
		$html = str_replace('<#VOBO>',$_SESSION['id_Usuario_Jefe_Inmediato'],$html);




//		$html = str_replace('<#referencia>',$referencia,$html);
//		$html = str_replace('<#UIL>',$str_Num_OT,$html);
//		$html = str_replace('<#FECHA>',$fecha,$html);
//		$html = str_replace('<#NODO_ACCESO>',$n_accesso,$html);
//		$html = str_replace('<#ANILLO>',$anillo,$html);
//		$html = str_replace('<#CLL>',$CLL,$html);
//		$html = str_replace('<#POSICION_DBFO>',$posicion_dbfo,$html);
//		$html = str_replace('<#FECHA_INICIO>',$F_ini,$html);
//		$html = str_replace('<#FECHA_INGRESO_SISA>',$f_REF,$html);
//		$html = str_replace('<#FECHA_TERM>',$F_term,$html);
//		$html = str_replace('<#ELEMENTO_FO>',$element,$html);
//		$html = str_replace('<#ELEMENTO_CANALIZACION>',$elemnt_pep,$html);
//		$html = str_replace('<#TRABAJO_REALIZAR>',$trabajos_realizar,$html);
//		$html = str_replace('<#NOTA>',$nota,$html);
//		$html = str_replace('<#OBSERVACIONES>',$observaciones,$html);
//		$html = str_replace('<#TIPO_SERVICIO>',$str_tipo_servicio,$html);
//		$html = str_replace('<#CODIGO>',$codigo,$html);
//		$html = str_replace('<#str_prioridad>',$str_prioridad,$html);
//		$html = str_replace('<#prioridad>',$prioridad,$html);
//		$html = str_replace('<#filas_unidades>',$filas_unidades,$html);
//		$html = str_replace('<#RAZON_SOCIAL>',$usuario,$html);
//		$html = str_replace('<#DOMICILIO_RAZON_SOCIAL>',$direccion,$html);
//		$html = str_replace('<#PRIORIDAD>',$str_Prioridad,$html);
//		$html = str_replace('<#LETRA_PRIORIDAD>',$str_descripcion,$html);
		
		
	
		echo strval($html);
	
	}

//echo '<script>print();<script>';

//$yay = str_ireplace($find, $replace , $html); 
?>