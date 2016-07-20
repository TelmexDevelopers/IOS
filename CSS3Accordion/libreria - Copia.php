<?php 
function ImprimeCombo($numero)
{
	if ($numero)
	{
		$SQL = "SELECT * FROM ";
		switch($numero){
		
			case 1:
				$tabla = "vw_dd";
				$moo = 'class="mootools"';
				$campo = 0;
			break;
			case 2:
				$tabla = "vw_sector";
				$moo = 'class="mootools"';	
				$campo = 0;
			break;
			case 3:
				$tabla = "vw_fase_serv";	
				$moo = 'class="mootools"';	
				$campo =0;
			break;
			case 4:
				$tabla = "vw_reg_seg_serv";	
				$moo = 'class="mootools"';	
				$campo =1;
			break;	
			default:
				$tabla = "vw_reg_seg_serv";	
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
			$html .= '<option value="'.$RS->fields($campo).'">'.$RS->fields($campo).'</option>';
			$RS->MoveNext();
		}
		$html .= '</select>';
	}
	return strval($html);	
}


?>