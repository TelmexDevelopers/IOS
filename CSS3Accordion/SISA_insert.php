<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');

$referencia=$_GET["referencia"];

$id_proy_sisa=$_GET["id_proy_sisa"];
$dt_fecha_prog=$_GET["dt_fecha_prog"];
$documento_pagina_web=$_GET["documento_pagina_web"];
$id_proy_rda=$_GET["id_proy_rda"];

$Vencido=$_GET["id_vencido"];
$Cancelado=$_GET["id_cancelado"];
$id_analisa_ing_eq=$_GET["id_analisa_ing_eq"];

$dt_ok_ing_eq=$_GET["dt_ok_ing_eq"];

$contador=0;
//Creamos un if para la signacion de valores en cada caja de nuestro formulario.
if ($referencia!='')
{
$valores='';
$campos='';
		if ($id_proy_sisa!='')
		{
			$campos.="id_proy_sisa";
			$valores.=	".$id_proy_sisa.";
			$contador++;
		}
		if ($dt_fecha_prog!='')
		{
			$campos.=", dt_fecha_prog";
			$valores.=", '".$dt_fecha_prog."'";
			$contador++;
		}
		if ($documento_pagina_web!='')
		{
			$campos.=", documento_pagina_web";
			$valores.=", '".$documento_pagina_web."'";
			$contador++;
		}
		if ($id_proy_rda!='')
		{
			$campos.=", id_proy_rda";
			$valores.=", '".$id_proy_rda."'";
			$contador++;
		}
		if ($Vencido!='')
		{
			$campos.=", id_vencido";
			$valores.=", '".$Vencido."'";
			$contador++;
		}
		if ($Cancelado!='')
		{
			$campos.=", id_cancelado";
			$valores.=", '".$Cancelado."'";
			$contador++;
		}
		if ($id_analisa_ing_eq!='')
		{
			$campos.=", id_analisa_ing_eq";
			$valores.=", '".$id_analisa_ing_eq."'";
			$contador++;
		}
		if ($dt_ok_ing_eq!='')
		{
			$campos.=", dt_ok_ing_eq";
			$valores.=", '".$dt_ok_ing_eq."'";
			$contador++;
		}
			
		//echo $campos."<br>";
		//echo $valores."<br>";
		$SQL="INSERT INTO tb_equip_fo (".$campos.") VALUES ('".$valores."')";
		echo $SQL;
//		$RS = EjecutaQuery($SQL);
$RS = EjecutaQuery($SQL);
		if ($RS==false) {
			echo "Error";
		}else{
			echo "Registro Actualizaci&oacute;n";
		}
}
?>
        
