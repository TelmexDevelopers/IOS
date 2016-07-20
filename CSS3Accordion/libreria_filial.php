<?php 
function ImprimeCombo($numero,$valor_seleccionado)
{
	if ($numero)
	{
		switch($numero){
		
			case 1:
				$campos_sql ="id_Responsable_Filial,CONCAT(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as nombre_responsable_filial";
				$tabla = "cat_responsable_filial";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "coordinador_contratista";	
				$campo =1;
			break;
			case 2:
				$campos_sql ="*";
				$tabla = "cat_fases_ios_filial";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "fase_filial";	
				$campo =1;
			break;
			case 3:
				$campos_sql ="*";
				$tabla = "cat_aceptacion_ot";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "aceptacion_ot";	
				$campo =1;
			break;
			case 4:
				$campos_sql ="*";
				$tabla = "cat_actividad_filial";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "Actividad";	
				$campo =1;
			break;
			case 5:
				$campos_sql ="*";
				$tabla = "cat_filial";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "Filial";	
				$campo =1;
			break;
			case 6:
				$campos_sql ="id_Responsable_Filial,CONCAT(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as nombre_responsable_filial";
				$tabla = "cat_responsable_filial";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "responsable_filial_a";	
				$campo =1;
			break;
			case 7:
				$campos_sql ="id_Responsable_Filial,CONCAT(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as nombre_responsable_filial";
				$tabla = "cat_responsable_filial";	
				$moo = 'class="mootools combos_referencia"';
				$name_id = "responsable_filial_b";	
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
		if ($tabla == "cat_responsable_filial") $SQL .= " ORDER BY nombre_responsable_filial";
		if ($tabla == "cat_fase_ios") $SQL .= " where id_Area_Responsable = 24";
		//echo $SQL;
		$html = "";
		$html .= '<select name="'.$name_id.'" id="'.$name_id.'" '.$moo.'>';
        $html .= '<option value="">Elige una opcion</option>';
		$RS = TraeRecordset($SQL);
		if (!$RS) die("No Recordset");
		while(!$RS->EOF)
  {
   $html .= '<option value=';
   
   if ($tabla != "cat_cm")
   {
   		$html .= '"'.$RS->fields(0).'"';
   } else {
		$html .= '"'.$RS->fields(5).'"';
		if ($numero == 2)
   		{
			$html .= ' id="opt_CM_A_'.$RS->fields(5).'"';	
		} else {
			$html .= ' id="opt_CM_B_'.$RS->fields(5).'"';
		}
   if ($tabla != "cat_ot_edo_serv")
   {
   		$html .= '"'.$RS->fields(0).'"';
   } else {
		$html .= '"'.$RS->fields(1).'"';
		if ($numero == 1)
   		{
			$html .= ' id="opt_EDO_SERV_'.$RS->fields(1).'"';	
		} 
	}
}
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

