<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');

$referencia=$_GET["referencia"];
$ser_n=$_GET["ser_n"];
$Fase_IOS_Equipa=$_GET["Fase_IOS_Equipa"];
$dt_fecha_fase_IOS_Equipa=$_GET["dt_fecha_fase_IOS_Equipa"];

//$id_Fase_IOS_hidden = $_GET["id_Fase_IOS_hidden"];
//$Fase_IOS_GRAL_hidden=$_GET["Fase_IOS_GRAL_hidden"];


$valores='';
$campos='';
$contador=0;
//Creamos un if para la signacion de valores en cada caja de nuestro formulario.
if ($referencia!='' && $ser_n!='')
{
	if ($Fase_IOS_Equipa != '')// && $Fase_IOS_GRAL != $Fase_IOS_GRAL_hidden)
	
	{
		$campos.="id_Fase_IOS = '".$Fase_IOS_Equipa."', dt_fecha_fase_IOS = NOW()";
		$contador++;
	} else {
		$Fase_IOS_GRAL = "''";
	}
	$SQL="UPDATE tb_ios SET ".$campos." WHERE referencia='".$referencia."' AND ser_n='".$ser_n."'";
echo $SQL;
	
	$RS = EjecutaQuery($SQL);
		if ($RS==false) {
			echo "Error";
		} else {
			echo "<br />Actualiz&oacute; Registro";
		}
	}

?>


