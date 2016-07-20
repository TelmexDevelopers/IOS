<?php 
session_start();

function ImprimeCombo($numero,$valor_seleccionado)
{
	if ($numero)
	{
		switch($numero){
		
			case 1:
				$campos_sql ="*";
				$tabla = "cat_tipo_proyecto_eqp";	
				$moo = 'class="mootools combos_3"';
				$name_id = "Tipo_Trabajo";	
				$campo =1;
			break;
			case 2:
				$campos_sql ="*";
				$tabla = "cat_edo_acometida";	
				$moo = 'class="mootools combos_3"';
				$name_id = "edo_acometida";	
				$campo =1;
			break;
			case 3:
				$campos_sql ="*";
				$tabla = "cat_problematica_eqp";	
				$moo = 'class="mootools combos_3"';
				$name_id = "problematica_eqp";	
				$campo =1;
			break;
			case 4:
				$campos_sql ="*";
				$tabla = "cat_filial";	
				$moo = 'class="mootools combo_green"';
				$name_id = "filial";	
				$campo =1;
			break;
			case 5:
				$campos_sql ="*";
				$tabla = "cat_edo_serv";	
				$moo = 'class="mootools combo_1"';
				$name_id = "edo_serv";	
				$campo =1;
			break;
			case 6:
				$campos_sql ="*";
				$tabla = "cat_edo_proy_rda";	
				$moo = 'class="mootools combo_green"';
				$name_id = "edo_proy_rda";	
				$campo =1;
			break;
			case 7:
				$campos_sql ="*";
				$tabla = "cat_proyecto_SISA";	
				$moo = 'class="mootools combo_green"';
				$name_id = "proyecto_sisa";	
				$campo =1;
			break;
			case 8:
				$campos_sql ="*";
				$tabla = "cat_prioridad";	
				$moo = 'class="mootools"';
				$name_id = "id_prioridad";	
				$campo =1;
			break;
			case 9:
				$campos_sql ="*";
				$tabla = "cat_requiere_trabajo";	
				$moo = 'class="mootools combos_3"';
				$name_id = "requiere_trabajo";	
				$campo =1;
			break;
			case 10:
				$campos_sql ="id_res_super, concat(str_nombre,' ',str_ap_paterno,' ',str_ap_materno) as responsable_sup";
				$tabla = "cat_res_super";	
				$moo = 'class="mootools combos_3"';
				$name_id = "responsable_sup";	
				$campo =1;
			break;
			case 11:
				$campos_sql ="id_usuario, CONCAT(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as ipe_proy";
				$tabla = "cat_usuarios";	
				$moo = 'class="mootools combo_green"';
				$name_id = "ipe_proy";	
				$campo =1;
			break;
			case 12:
				$campos_sql ="*";
				$tabla = "cat_pendt_cliente";	
				$moo = 'class="mootools combos_3"';
				$name_id = "pendiente_cliente";	
				$campo =1;
			break;
			case 13:
				$campos_sql ="*";
				$tabla = "cat_req_pto_tx";	
				$moo = 'class="mootools combo_green_ch"';
				$name_id = "requiere_pto_tx";	
				$campo =1;
			break;
			case 14:
				$campos_sql ="*";
				$tabla = "cat_nivel_pto";	
				$moo = 'class="mootools combo_green_ch"';
				$name_id = "nivel_pto";	
				$campo =1;
			break;
			case 15:
				$campos_sql ="*";
				$tabla = "cat_status_pto";	
				$moo = 'class="mootools combos_3"';
				$name_id = "status_pto";	
				$campo =1;
			break;
			case 16:
				$campos_sql ="*";
				$tabla = "cat_modelo";	
				$moo = 'class="mootools combo_green"';
				$name_id = "modelo";	
				$campo =1;
			break;
			case 17:
				$campos_sql ="*";
				$tabla = "cat_cap_enlace";	
				$moo = 'class="mootools combos_3"';
				$name_id = "capacidad_enlace";	
				$campo =1;
			break;
			case 18:
				$campos_sql ="*";
				$tabla = "cat_eq_client";	
				$moo = 'class="mootools combo_green"';
				$name_id = "equipo_cliente";	
				$campo =1;
			break;
			case 19:
				$campos_sql ="*";
				$tabla = "cat_instalado";	
				$moo = 'class="mootools combo_green"';
				$name_id = "instalado";	
				$campo =1;
			break;
			case 20:
				$campos_sql ="*";
				$tabla = "cat_fase_ios";	
				$moo = 'class="mootools combos_3"';
				$name_id = "fase_ios";	
				$campo =1;
			break;
			case 21:
				$campos_sql ="*";
				$tabla = "cat_prtx_status";	
				$moo = 'class="mootools combo_yellow"';
				$name_id = "prtx_status";	
				$campo =1;
			break;
			case 22:
				$campos_sql ="*";
				$tabla = "cat_trabajo_colectora";	
				$moo = 'class="mootools combo_green"';
				$name_id = "trabajo_colectora";	
				$campo =1;
			break;
			case 23:
				$campos_sql ="*";
				$tabla = "cat_proveedor_inst";	
				$moo = 'class="mootools combo_green"';
				$name_id = "proveedor_instalacion";	
				$campo =1;
			break;
			case 24:
				$campos_sql ="*";
				$tabla = "cat_requerimiento";	
				$moo = 'class="mootools combos_3"';
				$name_id = "requerimiento";	
				$campo =1;
			break;
			case 25:
				$campos_sql ="*";
				$tabla = "cat_edo_fo";	
				$moo = 'class="mootools combo_yellow"';
				$name_id = "edo_fo";	
				$campo =1;
			break;
			case 26:
				$campos_sql ="id_resp_sucope, concat(str_nombre,' ',str_ap_paterno,' ',str_ap_materno) as resp_sucope";
				$tabla = "cat_resp_sucope";	
				$moo = 'class="mootools combo_yellow"';
				$name_id = "resp_sucope";	
				$campo =1;
			break;
			case 27:
				$campos_sql ="id_resp_ipr, concat(str_resp_ipr,' ',str_ap_paterno,' ',str_ap_materno) as resp_ipr";
				$tabla = "cat_resp_ipr";	
				$moo = 'class="mootools combos_3"';
				$name_id = "resp_ipr";	
				$campo =1;
			break;
			case 28:
				$campos_sql ="*";
				$tabla = "cat_motivo_rechaso";	
				$moo = 'class="mootools combos_3"';
				$name_id = "motivo_rechaso";	
				$campo =1;
			break;
			case 29:
				$campos_sql ="*";
				$tabla = "cat_motvo_rch_fo";	
				$moo = 'class="mootools combos_3"';
				$name_id = "idcat_motvo_rch_fo";	
				$campo =1;
			break;
			case 30:
				$campos_sql ="id_usuario, CONCAT(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as supervisor_fo";
				$tabla = "cat_usuarios";	
				$moo = 'class="mootools combos_3"';
				$name_id = "supervisor_fo";	
				$campo =1;
			break;
			case 31:
				$campos_sql ="*";
				$tabla = "cat_FO_Const_Estatus";	
				$moo = 'class="mootools combo_green"';
				$name_id = "FO_Const_Estatus";	
				$campo =1;
			break;
			case 32:
				$campos_sql ="*";
				$tabla = "cat_problem_const";	
				$moo = 'class="mootools combo_green"';
				$name_id = "problem_const";	
				$campo =1;
			break;
			case 33:
				$campos_sql ="*";
				$tabla = "cat_estatus_cons";	
				$moo = 'class="mootools combo_yellow"';
				$name_id = "id_cons_estatus";	
				$campo =1;
			break;
			case 34:
				$campos_sql ="*";
				$tabla = "cat_tipo";	
				$moo = 'class="mootools combo_green"';
				$name_id = "tipo";	
				$campo =1;
			break;
			case 35:
				$campos_sql ="id_usuario, CONCAT(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as supervisor_fo";
				$tabla = "cat_usuarios";	
				$moo = 'class="mootools combos_3"';
				$name_id = "supervisor_construccion";	
				$campo =1;
			break;
			case 36:
				$campos_sql ="*";
				$tabla = "cat_filial";	
				$moo = 'class="mootools combo_green"';
				$name_id = "constructor";	
				$campo =1;
			break;
			break;
			
			default:
				//die();
			break;
			}
		$SQL = "SELECT ";
		$SQL .= $campos_sql;
		$SQL .= " FROM ";
		$SQL .= $tabla;
		//if ($tabla == "cat_edo_serv") $SQL .= " WHERE id_Area_Responsable = ".$_SESSION['id_Area_Responsable']." ORDER BY str_fase_ios";
		if ($tabla == "cat_proyecto_SISA") $SQL .= " ORDER BY Proyecto_sisa ASC";
		if ($numero == 11) $SQL .= " WHERE  id_usuario_jefe_inmediato = 208";
		if ($numero == 30) $SQL .= " WHERE  id_tipo_usuario = 3 AND id_area_responsable = 21 ORDER BY supervisor_fo";
		if ($numero == 35) $SQL .= " WHERE  id_tipo_usuario = 3 AND id_area_responsable = 21 ORDER BY supervisor_fo";
		if ($tabla == "cat_requerimiento") $SQL .= " ORDER BY str__requerimiento";
		//if ($numero == 3) $SQL .= " WHERE id_area_responsable = 5 AND id_tipo_usuario = 3 ORDER BY supervisor";
		//if ($numero == 8) $SQL .= " WHERE id_area_responsable = 5 AND id_tipo_usuario = 4 ORDER BY ipe";
		//if ($tabla == "cat_filial") $SQL .= " ORDER BY str_filial";
		//if ($tabla == "cat_usuarios") $SQL .= " id_area_responsable = 5 and id_tipo_usuario = 4 order by tecnico_equipamiento";


		//echo $SQL;
		$html = "";
		$html .= '<select name="'.$name_id.'" id="'.$name_id.'" '.$moo.'>';
        $html .= '<option value="">Elige una opci&oacute;n</option>';
		$RS = TraeRecordset($SQL);
		if (!$RS) die("No Recordset");
		while(!$RS->EOF)
		  {
		   $html .= '<option value=';
		   
				$html .= '"'.$RS->fields(0).'"';
						if($valor_seleccionado == $RS->fields(0))
						{
							$html .= ' selected="selected"'; 
						}
					$html .='>'.htmlentities($RS->fields($campo)).'</option>';
		
		   $RS->MoveNext();
		  }
	
		$html .= '</select>';
	}
	return strval($html);	
}

?>

