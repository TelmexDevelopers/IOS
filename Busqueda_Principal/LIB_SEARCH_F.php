<?php 
function ImprimeCombo($numero)
{
	if ($numero)
	{
		$SQL = "SELECT * FROM ";
		switch($numero){
		
			case 1:
				$tabla = "cat_con_ot";
				$moo = 'class="mootools combos_busqueda"';
				$campo = 1;
			break;
			case 2:
				$tabla = "cat_area_responsable";
				$moo = 'class="mootools combos_busqueda"';	
				$campo = 1;
			break;
			case 3:
				$tabla = "cat_combo_cm";	
				$moo = 'class="mootools combos_busqueda"';	
				$campo =1;
			
			break;
			case 4:
				$tabla = "cat_combo_area_cm";	
				$moo = 'class="mootools combos_busqueda"';	
				$campo =1;
			break;
			case 5:
				$tabla = "cat_Filial";	
				$moo = 'class="mootools combos_busqueda"';	
				$campo =1;
			break;	
			
			
			default:
				$tabla = "vw_reg_seg_serv";	
			break;
			}
		$SQL .= $tabla;
		//echo $SQL;
		$html = "";
		$html .= '<select name="'.$tabla.'" id="'.$tabla.'" '.$moo.' ">';
        $html .= '<option value="">Elige una opcion</option>';
		$RS = TraeRecordset($SQL);
		if (!$RS) die("No Recordset");
		
		
		
			if ($numero == 9)
		{
			while(!$RS->EOF)
			{
				$html .= '<option value="'.$RS->fields(0).'">'.htmlentities($RS->fields(1)." ".$RS->fields(2)." ".$RS->fields(3)).'</option>';
				$RS->MoveNext();
			}
		} else
		
		if ($numero == 8)
		{
			while(!$RS->EOF)
			{
				$html .= '<option value="'.$RS->fields(0).'">'.htmlentities($RS->fields(1)." ".$RS->fields(2)." ".$RS->fields(3)).'</option>';
				$RS->MoveNext();
			}
		} else {
			//termina condicion de concatenamiento 
			while(!$RS->EOF)
			{
				
				
				
				$html .= '<option value="'.$RS->fields($campo).'">'.htmlentities($RS->fields($campo)).'</option>';
				$RS->MoveNext();
			}
		}

		$html .= '</select>';
	}
	return strval($html);	
} // termina iclo 
//style="widith: 200px;

?>