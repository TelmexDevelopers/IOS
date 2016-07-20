<?php 
session_start();

function ImprimeCombo($numero,$valor_seleccionado)
{
	if ($numero)
	{
		switch($numero){
		
			case 1:
				$campos_sql ="id_fase_ios, str_fase_ios";
				$tabla = "vw_cat_fases";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "Fase_IOS_Equipa";	
				$campo =1;
			break;
			case 2:
//				$tabla = "cat_medio_transmision";	
//				$id='id_Medio_Transmision';
//				$string = 'str_Medio_Transmision';
//				$id_nombre_combo = 'medio_transmision';
//				$moo = 'class="mootools combos_referencia"';	
//				$campo =1;
				
				$campos_sql ="*";
				$tabla = "cat_medio_transmision";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "medio_transmision";	
				$campo =1;
			break;
			case 3:
				$campos_sql ="id_Usuario, concat(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as supervisor";
				$tabla = "cat_usuarios";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "supervisor";	
				$campo =1;
			break;
			case 4:
				$campos_sql ="*";
				$tabla = "cat_edo_proyecto";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "edo_proyecto";	
				$campo =1;
			break;
			case 5:
				$campos_sql ="*";
				$tabla = "cat_edo_fo";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "estado_fo";	
				$campo =1;
			break;
			case 6:
				$campos_sql ="*";
				$tabla = "cat_filial";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "filial";	
				$campo =1;
			break;
			case 7:
				$campos_sql ="*";
				$tabla = "cat_edo_construccion";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "edo_construccion";	
				$campo =1;
			break;
			case 8:
				$campos_sql ="id_Usuario, concat(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as ipe";
				$tabla = "cat_usuarios";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "ipe";	
				$campo =1;
			break;
			case 9:
				$campos_sql ="*";
				$tabla = "cat_motivo_rechaso";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "id_atraso";	
				$campo =1;
			break;
			case 10:
				$campos_sql ="id_fase_ios, str_fase_ios";
				$tabla = "vw_cat_fases";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "id_Fase_IOS";	
				$campo =1;
			break;
			default:
				//die();
			break;
			}
		$SQL = "SELECT ";
		$SQL .= $campos_sql;
		$SQL .= " FROM ";
		$SQL .= $tabla;
		if ($numero == 1) $SQL .= " WHERE id_Area_Responsable = ".$_SESSION['id_Area_Responsable']." ORDER BY str_fase_ios";
		if ($numero == 10) $SQL .= " WHERE id_area_responsable = 5 AND str_bandera = 1 ORDER BY str_fase_ios";
		if ($tabla == "cat_fase_ios") $SQL .= " ORDER BY str_Fase_IOS ASC";
		if ($tabla == "cat_medio_transmision") $SQL .= " WHERE id_Medio_Transmision IN (2,4,7)";
		if ($numero == 3) $SQL .= " WHERE id_area_responsable = 5 AND id_tipo_usuario = 3 ORDER BY supervisor";
		if ($numero == 8) $SQL .= " WHERE id_area_responsable = 5 AND id_tipo_usuario = 4 ORDER BY ipe";
		if ($tabla == "cat_filial") $SQL .= " ORDER BY str_filial";
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

