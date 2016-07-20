<?php 

session_start;
function ImprimeCombo($numero,$valor_seleccionado)
{
	if ($numero)
	{
		switch($numero){
			case 1:
				$campos_sql ="*";
				$tabla = "cat_fase_ios_ale";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "Fase_IOS_ALE";	
				$campo =1;
			break;
			case 2:
				$campos_sql ="id_Usuario, CONCAT(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as str_Subgerente";
				$tabla = "cat_Usuarios";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "subgerente";	
				$campo =1;
			break;
			case 3:
				$campos_sql ="id_Usuario, CONCAT(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as str_Supervisor";
				$tabla = "cat_Usuarios";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "supervisor";	
				$campo =1;
			break;
			case 4:
				$campos_sql ="*";
				$tabla = "cat_Division_ALE";
				$moo = 'class="mootools combos_referencia"';
				$name_id = "division_ale";	
				$campo =1;
			break;
			case 5:
				$campos_sql ="*";
				$tabla = "cat_entidad";
				$moo = 'class="mootools combos_referencia"';
				$name_id = "entidad";	
				$campo =1;
			break;
			case 6:
				$campos_sql ="*";
				$tabla = "cat_Area_Responsable";
				$moo = 'class="mootools combos_referencia"';
				$name_id = "area_responsable";	
				$campo =1;
			break;
			case 7:
				$campos_sql ="*";
				$tabla = "cat_cliente_eqp";	
				$moo = 'class="mootools combos_referencia"';	
				$name_id = "cliente";
				$campo =1;
			break;
			case 8:
				$campos_sql = "*";
				$tabla = "cat_tipo_proy_eqp";	
				$moo = 'class="mootools combos_referencia"';	
				$name_id = "tipo_servicio";
				$campo =1;
			break;
			default:
				die();
			break;
			}
		$SQL = "SELECT ";
		$SQL .= $campos_sql;
		$SQL .= " FROM ";
		$SQL .= $tabla;
		if ($numero == 1) $SQL .= " ORDER BY str_fase_ios_ale";
		if ($numero == 2) $SQL .= " WHERE id_Tipo_Usuario = 2 AND id_Area_Responsable NOT IN (23) ORDER BY str_Subgerente";
		if ($numero == 3) $SQL .= " WHERE id_Tipo_Usuario = 3 AND id_Area_Responsable NOT IN (23) ORDER BY str_Supervisor";
		if ($numero == 4) $SQL .= " ORDER BY str_Division_ALE";
		if ($numero == 5) $SQL .= " ORDER BY str_Entidad";
		if ($numero == 6) $SQL .= " ORDER BY str_Area_Responsable";
		if ($numero == 7) $SQL .= " ORDER BY usuario ASC";
		if ($numero == 8) $SQL .= " ORDER BY str_tipo_proy_eqp ASC";
		//echo $SQL;
		
		$html = "";
		$html .= '<select name="'.$name_id.'" id="'.$name_id.'" '.$moo.'>';
        $html .= '<option value="">Todos *</option>';
		$RS = TraeRecordset($SQL);
		if (!$RS) die("No Recordset");
		while(!$RS->EOF)
		  {
			/*$html .= '<option value=';
		   
				$html .= '"'.$RS->fields(0).'"';
						if($valor_seleccionado == $RS->fields(0))
						{
							$html .= ' selected="selected"'; 
						}
			$html .='>'.htmlentities($RS->fields($campo)).'</option>';
		
		   $RS->MoveNext();
		   */
		   			  $html .= '<option value=';
			  if ($tabla == "cat_fase_ios_ale" || $tabla == "cat_Usuarios" ||  $tabla == "cat_Usuarios"  ||$tabla == "cat_Area_Responsable" )
			  {
				$option_value = $RS->fields(0); 
			  }
			
			  if ( $tabla == "cat_Division_ALE"  || $tabla == "cat_entidad" || $tabla == "cat_cliente_eqp" || $tabla == "cat_tipo_proy_eqp" )
			  {
				 $option_value = $RS->fields(1);
			  } 
			  $html .= '"'.$option_value.'"';
			  if ($seleccion == $option_value)
			  {
			  	$html .= 'selected="selected"';
			  }
			  $html .= '>'.htmlentities($RS->fields(1)).'</option>';
			  
			  $RS->MoveNext();

		  }
	
		$html .= '</select>';
	}
	return strval($html);	
}

?>

