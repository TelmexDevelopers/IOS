<?php 

function ImprimeCombo($numero, $valor_seleccion)//
{
	if ($numero)
	{
		session_start;
		
		$SQL = "SELECT * FROM ";
		switch($numero){
			case 1:
//			echo  $valor_seleccion;
			
				$tabla = "vw_cat_fases";
				$id='id_fase_ios';
				$string = 'str_fase_ios';
				$id_nombre_combo = 'fase_ios';
				$moo = 'class="mootools combos_referencia"';
				$campo = 1;
			break;
			case 2:
				$tabla = "vw_nom_ipes_cns";
				$id='id_usuario';
				$string = 'str_nombre';
				$id_nombre_combo = 'nombre_ipe';
				$moo = 'class="mootools combos_referencia"';	
				$campo = 1;
			break;
			case 3:
//			echo  $valor_seleccion;
			
				$tabla = "cat_fases_ios_cns";
				$id='id_Fase_IOS_CNS';
				$string = 'str_Fase_IOS_CNS';
				$id_nombre_combo = 'fase_ios_cns';
				$moo = 'class="mootools combos_referencia"';
				$campo = 1;
			break;
			case 4:
//			echo  $valor_seleccion;
			
				$tabla = "cat_tipo_hub";
				$id='id_tipo_hub';
				$string = 'str_tipo_hub';
				$id_nombre_combo = 'tipo_hub';
				$moo = 'class="mootools combos_referencia"';
				$campo = 1;
			break;

			default:
				$tabla = "tb_cns_update";	
			break;
			}

		//$SQL .= $tabla;
		$SQL = "SELECT ";
		$SQL .= $id;
		$SQL .= ",";
		$SQL .= $string;
		$SQL .= " FROM ";
		$SQL .= $tabla;
		
		if ($tabla == "vw_cat_fases") $SQL .= " WHERE id_area_responsable = ".$_SESSION["id_Area_Responsable"]." ORDER BY str_fase_ios ";
		
		/*if ($numero == 1)
		{
			$SQL .= " WHERE id_Area_Responsable = 10";
		} else {
		}*/
		
		//$SQL .= " ORDER BY ".$string;
		//echo $SQL;
		$html = "";
		$html .= '<select name="'.$id_nombre_combo.'" id="'.$id_nombre_combo.'" '.$moo.'>';
        $html .= '<option value="">Selecciona</option>';
		$RS = TraeRecordset($SQL);
		if (!$RS) die("No Recordset");
		while(!$RS->EOF)
		{
			$html .= '<option value="'.$RS->fields(0).'"';
			if($valor_seleccion == $RS->fields(0))
			{
				$html .= ' selected="selected"';	
			}
			
			$html .= '>'.htmlentities($RS->fields($campo)).'</option>';
			$RS->MoveNext();
		}
		$html .= '</select>';
	}
	return strval($html);	
}
?>