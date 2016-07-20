<?php 
session_start();

function ImprimeCombo($numero)
{
	if ($numero)
	{
		switch($numero){
		
			case 1:
				$tabla = "cat_Area_Responsable";	
				$moo = 'class="required mootools combos_busqueda"';	
				$nombre_combo = "area_responsable";
				$id='id_Area_Responsable';
				$string = "str_Area_Responsable";
				$campos = $id.",".$string;			
				$where = " id_Area_Responsable IN(1,2,3)";
				$orderby=" ORDER BY str_Area_Responsable ASC";
			break;
			case 10:
				$tabla = "cat_Usuarios";	
				$moo = 'class="required mootools combos_busqueda"';	
				$nombre_combo = "usuarios";
				$id='id_Usuario';
				$string = "CONCAT(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) AS str_Nombre_IPE";
				$campos = $id.",".$string;			
				$where = "id_Area_Responsable in (".$_SESSION['id_Area_Responsable'].") AND (id_Tipo_Usuario = 4)";
				$orderby=" ORDER BY str_Nombre_IPE ASC";
			break;
			}
						
		$SQL = "SELECT ".$campos." FROM ".$tabla;
		if ($where != "")
		{
			$SQL .= " WHERE ".$where.$orderby;
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
			  $html .= '<option value="'.$RS->fields(0).'">'.htmlentities($RS->fields(1)).'</option>';
			  
			  $RS->MoveNext();
			  //Fin Option value 
		  }
		  
		$html .= '</select>';
	}
	return strval($html);	
} // termina iclo 
//style="widith: 200px;

?>