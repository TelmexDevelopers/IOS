<?php 
function ImprimeCombo($numero)
{
	if ($numero)
	{
		switch($numero){
		
			
			case 10:
				$tabla = "cat_fases";	
				$moo = 'class="required mootools combos_busqueda"';	
				$nombre_combo = "Fases";
				$id='str_Fases';
				$string = 'str_Fases';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_Fases ASC";
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
			  $html .= '<option value="';
			  
			  if ($tabla == "cat_fases")
			  {
				$html .= $RS->fields(1); 
			  } 
			  $html .= '">'.htmlentities($RS->fields(1));
			  if ($RS->fields(1) == 'SERVICIOS NUEVOS')
			  {
				  $html .= " - TELCEL CE";
			  }
			  $html .= '</option>';
			  
			  $RS->MoveNext();
			  //Fin Option value 
			  

		  }
		  
		  
		$html .= '</select>';
	}
	return strval($html);	
} // termina iclo 
//style="widith: 200px;

?>