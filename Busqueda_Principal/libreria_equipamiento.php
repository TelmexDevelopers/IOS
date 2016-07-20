<?php 
function ImprimeCombo($numero)
{
	if ($numero)
	{
		$SQL = "SELECT * FROM ";
		switch($numero){
		
			case 1:
				$tabla = "cat_articulos_CNS";
				$moo = 'class="mootools combos_busqueda2"';
				$campo = 1;
			break;
			
			default:
				$tabla = "cat_articulos_CNS";	
			break;
			}
		$SQL .= $tabla;
		//echo $SQL;
		$html = "";
		$html .= '<select name="'.$tabla.'" id="'.$tabla.'" '.$moo.' ">';
        $html .= '<option value="">*</option>';
		$RS = TraeRecordset($SQL);
		if (!$RS) die("No Recordset");
		
		 else 
	   	    {
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