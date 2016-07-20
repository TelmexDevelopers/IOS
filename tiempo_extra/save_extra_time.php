<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../adodb/adodb.inc.php');
include('../includes/connection.php');
require("../includes/funciones.php");

$_SESSION['id_Usuario_CargaTE'] = 19;
$id_Usuario_Captura = $_SESSION['id_Usuario_CargaTE'];
$ipe = $_POST['ipe'];
$hora_ini = $_POST['hora_ini'];
$hora_fin = $_POST['hora_fin'];
$horas_totales_hidden = $_POST['horas_totales_hidden'];
$motivos = $_POST['motivos'];
$referencias = $_POST['referencias'];
$comentarios = $_POST['comentarios'];

if ($id_Usuario_Captura != "" && $ipe != "" && $hora_ini != "" && $hora_fin != "" && $horas_totales_hidden != "" && $motivos != "")
{
	$INSERT = strval("INSERT INTO tb_Tiempo_Extra (id_Usuario, txt_referencia, id_Motivo, dt_hora_inicio, dt_hora_fin, ft_Total_Horas, id_Usuario_Captura, txt_Comentarios) VALUES ('".$ipe."','".mysql_escape_string(htmlentities(strip_tags($referencias)))."','".$motivos."','".$hora_ini."','".$hora_fin."','".$horas_totales_hidden."','".$id_Usuario_Captura."','".mysql_escape_string(htmlentities(strip_tags($comentarios)))."')");
	//echo $INSERT;
	$RS = EjecutaQuery($INSERT);
	if (!$RS) die('Error en DB!');
		
		if($RS == false)
		{
			$cont_fail++;
		}
		$RS->Close();
		$RS = NULL;

}
if ($cont_fail > 0)
{
	echo "<br /><br /><b>Error: Registro No Capturado</b><br /><br />";
} else {
	echo "<br /><br /><b>Registro Ingresado Correctamente</b><br /><br />";	
}

?>