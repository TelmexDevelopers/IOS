<?php 
function ImprimeCombo($numero,$seleccion)
{
	if ($numero)
	{
		switch($numero){
			case 1:
				$tabla = "cat_dd";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Division";
				$id='id_DD';
				$string = 'str_DD';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_DD ASC";
			break;
			case 2:
				$tabla = "cat_edo_serv";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Estado_Servicio";
				$id='idcat_edo_servicio';
				$string = 'edo_serv';
				$campos = $id.",".$string;			
				$where = "";
	            $orderby=" ORDER BY edo_serv ASC";
			break;
			case 3:
				$tabla = "cat_area_responsable";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "area_responsable";
				$id='id_Area_Responsable';
				$string = 'str_Area_Responsable';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Area_Responsable ASC";
			break;
			case 4:
				$tabla = "cat_fase_ios";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Fase_IOS";
				$id='id_Fase_IOS';
				$string = 'str_Fase_IOS';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Fase_IOS ASC";
			break;
			case 5:
				$tabla = "cat_Entidad";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Entidad";
				$id='id_Entidad';
				$string = 'str_Entidad';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Entidad ASC";
			break;
			case 6:
				$tabla = "cat_fase_sisa";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Fase_sisa";
				$id='id_Fase_SISA';
				$string = 'str_Fase_SISA';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Fase_SISA ASC";
			break;
			case 7:
				$tabla = "cat_con_ot";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Con_OT";
				$id='idcat_con_OT';
				$string = 'str_conOT';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_conOT ASC";
			break;
			case 8:
				$tabla = "vw_supervisores_entrega";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Supervisores_Entrega";
				$id='id_Usuario';
				$string = 'str_Nombre_Sup';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Nombre_Sup ASC";
			break;
			case 9:
				$tabla = "vw_ipe_entrega";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "ipe_entrega";
				$id='id_Usuario';
				$string = 'str_Nombre_ipe';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Nombre_ipe ASC";
			break;
			case 10:
				$tabla = "VW_SUPERVISORES_ANALISIS";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Supervisores_Analisis";
				$id='id_Usuario';
				$string = 'str_Nombre_Sup';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Nombre_Sup ASC";
			break;
			case 11:
				$tabla = "VW_IPE_ANALISIS";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "ipe_analisis";
				$id='id_Usuario';
				$string = 'str_Nombre_ipe';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Nombre_ipe ASC";
			break;
			case 12:
				$tabla = "vw_CM_Mantto";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "cm";
				$id='siglas';
				$string = 'str_siglas';
				$campos = $id.",".$string;			
				$where = "";
				//$orderby=" ORDER BY str_cto_mantto ASC";
			break;
			case 13:
				$tabla = "cat_combo_area_cm";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "area_cm";
				$id='id_Area_CM';
				$string = 'str_Area_CM';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Area_CM ASC";
			break;
			case 14:
				$tabla = "cat_fases";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Fases";
				$id='id_Fases';
				$string = 'str_Fases';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Fases ASC";
			case 15:
				$tabla = "VW_SUPERVISORES_ANALISIS";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Supervisores_Documentacion";
				$id='id_Usuario';
				$string = 'str_Nombre_Sup';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Nombre_Sup ASC";
			break;
			case 16:
				$tabla = "VW_IPE_ANALISIS";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "ipe_Documentacion";
				$id='id_Usuario';
				$string = 'str_Nombre_ipe';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Nombre_ipe ASC";
			break;
			case 17:
				$tabla = "vw_combo_cns";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Fase_IOS_CNS";
				$id='id_Fase_IOS';
				$string = 'str_Fase_IOS';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Fase_IOS ASC";	
			break;
			case 18:
				$tabla = "nom_subgerente_eqp";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "nom_subgerente";
				$id='id_Usuario';
				$string = 'nom_subgerente';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY nom_subgerente ASC";	
			break;
			case 19:
				$tabla = "cat_Usuarios";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "nom_supervisor";
				$id='id_Usuario';
				$string = 'str_Nombre,str_Ap_Paterno,str_Ap_Materno';
				$campos = $id.",".$string;			
				$where = " id_Tipo_Usuario = 3 AND id_Area_Responsable = 5";
				$orderby=" ORDER BY str_Nombre ASC";	
			break;
			case 20:
				$tabla = "cat_tipo_proy_eqp";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "tipo_servicio";
				$id='id_proy_eqp';
				$string = 'str_tipo_proy_eqp';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_tipo_proy_eqp ASC";	
			break;
			case 21:
				$tabla = "cat_cliente_eqp";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "cliente";
				$id='id_usuario';
				$string = 'usuario';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY usuario ASC";	
			break;
			}
			
		$SQL = "SELECT ".$campos." FROM ".$tabla;
		if ($where != "")
		{
			$SQL .= " WHERE ".$where;
		}
		$SQL .= $orderby.$campos_sql;
		//echo $SQL;
		$html = "";
		$html .= '<select name="'.$nombre_combo.'" id="'.$nombre_combo.'" '.$moo.' >';
        $html .= '<option value="">Todos * </option>';
		$RS = TraeRecordset($SQL);
		if (!$RS) die("No Recordset");
		  while(!$RS->EOF)
		  {
			  //Option value str /numeric
			  $html .= '<option value=';
			  if ($tabla == "vw_subgerentes" || $tabla == "vw_supervisores" || $tabla == "cat_con_ot" || $tabla == "cat_area_responsable" || $tabla == "cat_fase_ios" || $tabla == "vw_combo_cns" || $tabla == "VW_SUPERVISORES_ANALISIS" || $tabla == "VW_IPE_ANALISIS" || $tabla == "vw_CM_Mantto" || $tabla == "vw_ipe_entrega" || $tabla == "vw_supervisores_entrega" || $tabla == "cat_Usuarios" || $tabla == "nom_supervisor_eqp" || $tabla == "vw_edo_tramo_eqp"  )
			  {
				$option_value = $RS->fields(0); 
			  }
			
			  if ( $tabla == "cat_Entidad"  || $tabla == "cat_dd" || $tabla == "cat_fase_sisa" || $tabla == "cat_edo_serv"  || $tabla == "cat_combo_area_cm"  || $tabla == "cat_fases" || $tabla == "cat_cliente_eqp" || $tabla == "cat_tipo_proy_eqp" )
			  {
				 $option_value = $RS->fields(1);
			  } 
			  $html .= '"'.$option_value.'"';
			  if ($seleccion == $option_value)
			  {
			  	$html .= 'selected="selected"';
			  }
			  $html .= '>';
			  
			  if ($tabla = "cat_Usuarios")
			  {
				  $nombre_supervisor = $RS->fields(1);
				  if ($RS->fields(2) != "")
				  {
				  	  $nombre_supervisor .= " ".$RS->fields(2);
				  }
				  if ($RS->fields(3) != "")
				  {
					  $nombre_supervisor .= " ".$RS->fields(3);
				  }
				  $html .= htmlentities($nombre_supervisor);
		      } else {
				  $html .=  htmlentities($RS->fields(1));
			  }
			  $html .= '</option>';
			  
			  $RS->MoveNext();
		  }
		$html .= '</select>';
	}
	return strval($html);	
} 

?>