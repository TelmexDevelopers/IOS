<?php 
function ImprimeCombo($numero,$seleccion)
{
	if ($numero)
	{
		switch($numero){
			case 22:
				$tabla = "cat_prioridad";	
				$moo = 'class="mootools combos_busqueda"';	
				$nombre_combo = "prioridad";
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
/*			  if ($tabla == "vw_subgerentes" || $tabla == "vw_supervisores" || $tabla == "cat_con_ot" || $tabla == "cat_area_responsable" || $tabla == "cat_fase_ios" || $tabla == "vw_combo_cns" || $tabla == "VW_SUPERVISORES_ANALISIS" || $tabla == "VW_IPE_ANALISIS" || $tabla == "vw_CM_Mantto" || $tabla == "vw_ipe_entrega" || $tabla == "vw_supervisores_entrega")
			  {
				$option_value = $RS->fields(0); 
			  }
			
*/	/*		  if ( $tabla == "cat_Entidad"  || $tabla == "cat_dd" || $tabla == "cat_fase_sisa" || $tabla == "cat_edo_serv"  || $tabla == "cat_combo_area_cm"  || $tabla == "cat_fases" )
			  {
				 $option_value = $RS->fields(1);
			  } */
			   if ( $tabla == "cat_prioridad" )
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