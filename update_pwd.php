<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
require("adodb/adodb.inc.php");
require("includes/connection.php");
require("includes/funciones.php");

//$usuario = $_POST['usr'];
//$password = $_POST['pwd'];
$nombre_usuario = $_POST['nombre_usuario'];
$old_pwd = $_POST['old_pwd'];
$new_pwd_1 = $_POST['new_pwd_1'];
$new_pwd_2 = $_POST['new_pwd_2'];
$id_Usuario = $_SESSION['id_Usuario'];

if ($id_Usuario != "" && $nombre_usuario != "" && $old_pwd != "" && $new_pwd_1 != "" && $new_pwd_2 != "")
{
	if ($new_pwd_1 == $new_pwd_2)
	{
		$Update_PWD = Update_PWD($id_Usuario,$nombre_usuario,$old_pwd,$new_pwd_1,$new_pwd_2);
	} else {
		echo "Los datos de nueva contrase&ntilde;a no coinciden!";	
	}
} else {
	echo "Error en Datos!";	
}
?>