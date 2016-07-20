<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
require("../../adodb/adodb.inc.php");
require("connection.php");

$Sup_Analisis = $_GET['id_usuario_Jefe_Inmediato'];

function pedirDatos($Sup_Analisis)
{
$arreglo = array();
$SQL = "SELECT id_usuario,
CONCAT(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as IPE,
id_usuario_Jefe_Inmediato
FROM cat_usuarios WHERE id_usuario_Jefe_Inmediato = '".$Sup_Analisis."'" ;

//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
	$num_registros1 = 1;
	
	 	  while($num_registros1 < 6)
	  {

			echo $num_registros1;
		
	  
		if ($num_registros > 0) {
			
			$id_Usuario = $RS->fields(0);
			$str_Nombre_ipe = $RS->fields(1);  
		
			$json = array(
			'id_Usuario' => $id_Usuario, 
			'str_Nombre_ipe' => $str_Nombre_ipe);
			
			array_push($arreglo,$json);
			$RS->MoveNext();
			
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		echo json_encode($arreglo);
		
		 
		} 
		 $num_registros1++;
		
/*		else {
			echo "no hay registro";	
			
				}
*/		 
	 }
}

pedirDatos($Sup_Analisis);

?>