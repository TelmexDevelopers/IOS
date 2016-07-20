<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');

$referencia = $_GET["referencia"];
$ser_n = $_GET["ser_n"];

$id_Fase_IOS = $_GET["fase_ios"];
$Fecha_Fase_IOS = $_GET["Fecha_Fase_IOS"];
$id_Medio_Acceso = $_GET["medio_transmision"];
$int_Documentado = $_GET["document"];

$Fase_IOS_hidden = $_GET["Fase_IOS_hidden"];
$Medio_Acceso_hidden = $_GET["Medio_Acceso_hidden"];
$Documentado_hidden = $_GET["Documentado_hidden"];

$valores='';
$campos='';
$contador=0;
//Creamos un if para la signacion de valores en cada caja de nuestro formulario.
if ($referencia != '' && $ser_n != "")
{
	if ($id_Fase_IOS != '' && $id_Fase_IOS != $Fase_IOS_hidden)
	{
		$id_Tipo_Cambio_Fase = 1;
		$script = $_SERVER["PHP_SELF"];
		$insert_ID = Insert_Bitacora_Cambios($referencia,$ser_n,$Fase_IOS_hidden,$Fecha_Fase_IOS,$id_Fase_IOS,$script,$id_Tipo_Cambio_Fase);
		
		$campos .= "id_Fase_IOS = '".$id_Fase_IOS."', dt_Fecha_Fase_IOS = NOW()";
		if ($insert_ID != "")
		{
			$campos .= ",id_Bitacora = ".$insert_ID;
		}
		$contador++;
	} else {
		$id_Fase_IOS = "''";
	}
	if ($id_Medio_Acceso != '' && $id_Medio_Acceso != $Medio_Acceso_hidden)
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="id_Medio_Acceso = '".$id_Medio_Acceso."'";
		$contador++;
	} else {
		$id_Medio_Acceso = "''";
	}
	
	if ($int_Documentado != '' && $int_Documentado != $Documentado_hidden)
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="int_Documentado = '".$int_Documentado."'";
		$contador++;
	} else {
		$int_Documentado = "''";
	}
	//echo $campos."<br>";
	//echo $valores."<br>";
	//Ejecucion del query, concatenamos valores
	if($contador > 0)
	{
	$SQL="UPDATE tb_ios SET ".$campos." WHERE referencia='".$referencia."' AND ser_n = '".$ser_n."'";
	//echo $SQL;
	$RS = EjecutaQuery($SQL);
		if ($RS==false) {
			echo "Error1";
		} else {
			echo '<script type="text/javascript">update_hiddens('.$id_Fase_IOS.','.$id_Medio_Acceso.','.$int_Documentado.')</script>';
			echo "<br />Actualiz&oacute; Registro";
		}
	} else {
		echo "No hay cambios que actualizar";	
	}
}

?>
