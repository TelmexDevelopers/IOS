<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');

$id_tramos=$_GET["id_tramos"];
$referencia=$_GET["referencia"];

$id_proy_sisa=$_GET["id_proy_sisa"];
$dt_fecha_prog=$_GET["dt_fecha_prog"];
$documento_pagina_web=$_GET["documento_pagina_web"];
$id_proy_rda=$_GET["id_proy_rda"];
$dt_ok_ing_eq=$_GET["dt_ok_ing_eq"];
$dt_liquidada=$_GET["dt_liquidada"];

$Vencido=$_GET["id_vencido"];
$Cancelado=$_GET["id_cancelado"];
$id_analisa_ing_eq=$_GET["id_analisa_ing_eq"];


$contador=0;

if ($referencia!='' && $id_tramos !='')
{
	
	$SQL_count = "SELECT COUNT(*) FROM tb_equip_fo WHERE referencia = '".$referencia."' and id_tramos = '".$id_tramos."'";
	//echo $SQL_count."<br>";
	$RS_count = TraeRecordset($SQL_count);
	$cuantos = intval($RS_count->fields(0));
	//echo $cuantos."<br>";
	if ($cuantos > 0)
	{
$valores='';
$campos='';
///////////////////////////////////////////////////////////						
///////////////////////////////////////////////////////////			
		if ($id_proy_sisa!='')
		{		
			$campos.="id_proy_sisa = '".$id_proy_sisa."'";
			$contador++;
		}
		if ($dt_fecha_prog!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_fecha_prog = '".$dt_fecha_prog."'";
			$contador++;
		}
		if ($documento_pagina_web!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="documento_pagina_web = '".$documento_pagina_web."'";
			$contador++;
		}
		if ($id_proy_rda!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_proy_rda = '".$id_proy_rda."', dt_liquidada = NOW()";
			$contador++;
		}
		if ($dt_ok_ing_eq!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_ok_ing_eq = '".$dt_ok_ing_eq."'";
			$contador++;
		}
		if ($Vencido!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_vencido = '".$Vencido."'";
			$contador++;
		}
		if ($Cancelado!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_cancelado = '".$Cancelado."'";
			$contador++;
		}
		if ($id_analisa_ing_eq!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_analisa_ing_eq = '".$id_analisa_ing_eq."'";
			$contador++;
		}

		$SQL_UPDATE ="UPDATE tb_equip_fo SET ".$campos." WHERE referencia = '".$referencia."' and id_tramos = '".$id_tramos."'";
		//echo $SQL_UPDATE."<br>";
		$RS_UPDATE = EjecutaQuery($SQL_UPDATE);
				$RS_UPDATE = EjecutaQuery($SQL_UPDATE);
				if ($RS_UPDATE==false) {
					echo "Error EQUIPO<br />";
				}else{
					echo "<br />Actualiz&oacute; Registro Correctamente!<br />";
				}		
///////////////////////////////////////////////////////////						
///////////////////////////////////////////////////////////			
	} else {
$valores='';
$campos='';
		if ($id_proy_sisa!='')
		{
			$campos.=", id_proy_sisa";
			$valores.=	", '".$id_proy_sisa."'";
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
			$campos.=", id_proy_rda, dt_liquidada";
			$valores.=", '".$id_proy_rda."', NOW()";
			$contador++;
		}
		if ($dt_ok_ing_eq!='')
		{
			$campos.=", dt_ok_ing_eq";
			$valores.=", '".$dt_ok_ing_eq."'";
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
			
		//echo $campos."<br>";
		//echo $valores."<br>";
		$SQL="INSERT INTO tb_equip_fo (referencia, id_tramos".$campos.") VALUES ('".$referencia."','".$id_tramos."'".$valores.")";
		//echo $SQL;
		$RS = EjecutaQuery($SQL);
		if ($RS==false) {
			echo "Error2";
		} else {
			echo "<br />Actualiz&oacute; Registro Correctamente!";
		}
	}
			
}
?>
