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
$id_Area_Responsable = $_GET['id_Area_Responsable'];

function  aHtml($RS){
		$minusculas = array ("á"=>"&aacute;","é"=>"&eacute;","í"=>"&iacute;","ó"=>"&oacute;", "ú"=>"&uacute;","ñ"=>"&ntilde;");
		$mayusculas = array ("Á"=>"&Aacute;","É"=>"&Eacute;","Í"=>"&Iacute;","Ó"=>"&Oacute;", "Ú"=>"&Uacute;","Ñ"=>"&Ntilde;");
		$RS = str_replace($RS,$minusculas);
		$RS = str_replace($RS,$mayusculas);
	return $RS;
}
function pedirDatos($Sup_Analisis,$id_Area_Responsable)
{

$arreglo = array();

$SQL = "SELECT id_usuario,
CONCAT(str_Nombre,' ',str_Ap_Paterno,' ',str_Ap_Materno) as IPE,
id_usuario_Jefe_Inmediato
FROM cat_usuarios WHERE id_Tipo_Usuario IN(4) ";

if ($Sup_Analisis != "")
{
	$SQL .= " AND id_usuario_Jefe_Inmediato = '".$Sup_Analisis."'" ;
} else {
	if ($$id_Area_Responsable == '1' || $$id_Area_Responsable == '2')
	{
		$SQL .= " AND id_Area_Responsable IN(1,2)";
	} else {
		$SQL .= " AND id_Area_Responsable IN(".$id_Area_Responsable.")";
	}
}

$SQL .= " ORDER BY IPE";

//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
		
	$num_registros = $RS->RecordCount();

	while(!$RS->EOF)
	{
		if ($num_registros > 0) {

			$id_Usuario  = $RS->fields(0);
			$str_Nombre_ipe = htmlentities($RS->fields(1));
		
			$json = array(
			'id_Usuario' => $id_Usuario, 
			'str_Nombre_ipe' => $str_Nombre_ipe);
			
			array_push($arreglo,$json);
			
			$RS->MoveNext();
		
			header('Content-type: text/json');
			header('Content-type: application/json');
		
		} else {
			echo "no hay registro";	
		}
	}	
		echo json_encode($arreglo);

}
pedirDatos($Sup_Analisis,$id_Area_Responsable);

?>