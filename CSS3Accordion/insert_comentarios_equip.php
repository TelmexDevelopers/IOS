<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
session_start();	
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');
require("../includes/funciones.php");
$CheckSession = CheckSession();

	if(isset($_POST['referencia']) && isset($_POST['status']) && $_SESSION['id_Usuario'])
	{
		$query = 'INSERT INTO tb_Avances_Referencia_FO (referencia,txt_Avance_Referencia,id_Usuario,dt_Fecha_Registro) VALUES (\''.$_POST['referencia'].'\',\''.mysql_escape_string(htmlentities(strip_tags($_POST['status']))).'\','.$_SESSION['id_Usuario'].',NOW())';
		echo $query;
		$result = TraeRecordset($query);
		//die if this was done via ajax...
		if($_POST['ajax']) { die(); } else { $message = 'Updated!'; }
	}
?>