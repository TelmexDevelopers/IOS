<?php 
function ImprimeCombo1($numero,$seleccion)
{
	if ($numero)
	{
		switch($numero){
			case 1:
				$tabla = "cat_prioridad";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "id_prioridad";
				$id='id_Prioridad';
				$string = 'str_Prioridad';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Prioridad ASC";
			break;

			}
			
		$SQL = "SELECT ".$campos." FROM ".$tabla.$orderby.$campos_sql;
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
			  $html .= '<option value=';
			/*  if ($tabla == "cat_prioridad")
			  {
				$option_value = $RS->fields(1); 
			  }
			*/
			  if ($tabla == "cat_prioridad" )
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