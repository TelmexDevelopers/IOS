<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../adodb/adodb.inc.php');
include('../ios/includes/connection.php');

$tipo_usuario = $_GET['tipo_usuario'];
$area_responsable = $_GET['area_responsable'];

function opciones_usuarios($tipo_usuario, $area_responsable)
{
	$SQL = "SELECT * FROM cat_usuarios WHERE id_Tipo_Usuario IN (".$tipo_usuario.") AND id_Area_Responsable IN (".$area_responsable.") ORDER BY str_Nombre ASC";
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	$html = "";
	while (!$RS->EOF)
	{
		$id = $RS->fields(0);
		$nombre = htmlspecialchars(strval($RS->fields(1)." ".$RS->fields(2)." ".$RS->fields(3)));
		$html .= '<option value="'+$id+'">'+$nombre+'</option>';

		$RS->MoveNext();
	}
	
	
	return strval($html);
}

echo opciones_usuarios($tipo_usuario, $area_responsable);


?>