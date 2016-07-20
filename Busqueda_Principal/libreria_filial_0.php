<?php 
function ImprimeCombo($numero)
{
	if ($numero)
	{
		switch($numero){
		
			case 1:
				$tabla = "cat_con_ot";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "con_ot";
				$id='idcat_con_OT';
				$string = 'str_conOT';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_conOT ASC";
			break;
			case 2:
				$tabla = "cat_area_responsable";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "area_responsable";
				$id = 'id_Area_Responsable';
				$string = 'str_Area_Responsable';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Area_Responsable ASC";
			break;
			case 3:
				$tabla = "cat_combo_cm";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "cm";
				$id='id_centro_mantto';
				$string = 'str_cto_mantto';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_cto_mantto ASC";
			break;
			case 4:
				$tabla = "cat_combo_area_cm";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "area_cm";
				$id='id_Area_CM';
				$string = 'str_Area_CM';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Area_CM ASC";
			break;
			case 5:
				$tabla = "cat_filial";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "filial";
				$id='id_Filial';
				$string = 'str_Filial';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Filial ASC";
			break;
			}
			
		$SQL = "SELECT ".$campos." FROM ".$tabla.$orderby;
		if ($where != "")
		{
			$SQL .= " WHERE ".$where;
		}
		//echo $SQL;
		$html = "";
		$html .= '<select name="'.$nombre_combo.'" id="'.$nombre_combo.'" '.$moo.' >';
        $html .= '<option value="">Elige una opcion</option>';
		$RS = TraeRecordset($SQL);
		if (!$RS) die("No Recordset");
		  while(!$RS->EOF)
		  {
			  //Option value str /numeric
			  $html .= '<option value="';
			  if ($tabla == "cat_con_ot")
			  {
				$html .= $RS->fields(0); 
			  }
			  if ($tabla == "cat_area_responsable")
			  {
				$html .= $RS->fields(0); 
			  }
			  if ($tabla == "cat_combo_area_cm")
			  {
				$html .= $RS->fields(1); 
			  }/* else {
			  	$html .= $RS->fields(0);
			  }
*/
			  if ($tabla == "cat_combo_cm")
			  {
				$html .= $RS->fields(1); 
			  } /*else {
			  	$html .= $RS->fields(0);
			  }*/
			  $html .= '">'.htmlentities($RS->fields(1)).'</option>';
			  //fin option str
			  
			  $RS->MoveNext();
		  }
		$html .= '</select>';
	}
	return strval($html);	
} 

?>