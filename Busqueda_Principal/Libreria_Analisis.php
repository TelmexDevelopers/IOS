<?php 
function ImprimeCombo($numero)
{
	if ($numero)
	{
		switch($numero){
		
			
		/*	case 1:
				$tabla = "cat_dd";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Division";
				$id='id_DD';
				$string = 'str_DD';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_DD ASC";
			break;*/
		
			
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
				$tabla = "vw_subgerentes";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Subgerentes";
				$id='id_Usuario';
				$string = 'str_nombres';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_nombres ASC";

			break;
	
			case 9:
				$tabla = "vw_supervisores";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "Supervisores";
				$id='id_Usuario';
				$string = 'str_nombres';
				$campos = $id.",".$string;			
				$where = "";
				$orderby=" ORDER BY str_nombres ASC";

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
			  if ($tabla == "vw_subgerentes")
			  {
				$html .= $RS->fields(0); 
			  }
			  if ($tabla == "vw_supervisores")
			  {
				$html .= $RS->fields(0); 
			  }
			  if ($tabla == "cat_con_ot")
			  {
				$html .= $RS->fields(0); 
			  }
			  if ($tabla == "cat_area_responsable")
			  {
				$html .= $RS->fields(0); 
			  }
			  
			  if ($tabla == "cat_fase_ios")
			  {
				$html .= $RS->fields(0); 
			  }
			  if ($tabla == "cat_Entidad")
			  {
				$html .= $RS->fields(1); 
			  } /*else {
			  	$html .= $RS->fields(1);
			  }*/
			  if ($tabla == "cat_dd")
			  {
				$html .= $RS->fields(1); 
			  }
			  if ($tabla == "cat_fase_sisa")
			  {
				$html .= $RS->fields(1); 
			  }
			  if ($tabla == "cat_edo_serv")
			  {
				$html .= $RS->fields(1); 
			  }
			  $html .= '">'.htmlentities($RS->fields(1)).'</option>';
			  
			  $RS->MoveNext();
			
		  }
		  
		  
		$html .= '</select>';
	}
	return strval($html);	
} // termina iclo 
//style="widith: 200px;

?>