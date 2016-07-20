<?php 
function ImprimeCombo($numero, $valor_seleccion)//
{
	if ($numero)
	{
		$SQL = "SELECT * FROM ";
		switch($numero){
		
			case 1:
				$tabla = "cat_fase_ios";
				$moo = 'class="mootools combos_referencia"';
				$campo = 1;
			break;
			case 2:
				$tabla = "cat_document";
				$moo = 'class="mootools combos_referencia"';	
				$campo = 1;
			break;
			case 3:
				$tabla = "cat_motivo_ppu";	
				$moo = 'class="mootools combos_referencia"';	
				$campo =1;
			break;
			case 4:
				$tabla = "cat_con_ot";	
				$moo = 'class="mootools combos_referencia"';	
				$campo =1;
			break;
			case 5:
				$tabla = "cat_proy_complet";	
				$moo = 'class="mootools combos_referencia"';	
				$campo =1;
			break;
			case 6:
				$tabla = "cat_medio_transmision";	
				$moo = 'class="mootools combos_referencia"';	
				$campo =1;
			break;
			case 7:
				$tabla = "cat_Filial";	
				$moo = 'class="mootools combos_referencia"';	
				$campo =1;
			break;
			
			default:
				$tabla = "cat_con_ot";	
			break;
			}
		$SQL .= $tabla;
		//echo $SQL;
		$html = "";
		$html .= '<select name="'.$tabla.'" id="'.$tabla.'" '.$moo.'>';
        $html .= '<option value="">*</option>';
		$RS = TraeRecordset($SQL);
		if (!$RS) die("No Recordset");
		while(!$RS->EOF)
		{
			$html .= '<option value="'.$RS->fields(0).'"';
			if($valor_seleccion == $RS->fields(0))
			{
				$html .= ' selected="selected"';	
			}
			
			$html .= '>'.$RS->fields($campo).'</option>';
			$RS->MoveNext();
		}
		$html .= '</select>';
	}
	return strval($html);	
}
?>