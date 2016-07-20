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

$id_Fase_IOS=$_GET["id_Fase_IOS"];
$fase_ios_hidden=$_GET["fase_ios_hidden"];
$id_Fase_IOS_cns=$_GET["id_Fase_IOS_cns"];
$fase_ios_cns_hidden=$_GET["fase_ios_cns_hidden"];

$dt_Fecha_Fase_IOS_G=$_GET["dt_Fecha_Fase_IOS_G"];
$dt_FECHA_FASE_IOS=$_GET["dt_FECHA_FASE_IOS"];

$id_ipe_eth=$_GET["id_ipe_eth"];
$str_referencia_hub=$_GET["str_referencia_hub"];
$id_tipo_hub=$_GET["id_tipo_hub"];
$PBA_TRASPASO_A_C=$_GET["bol_PBA_TRASPASO_A_C"];
$PBA_TRASPASO_A_TX=$_GET["bol_PBA_TRASPASO_C_TX"];
$config_eth=$_GET["bol_config_eth"];
$dt_FECHA_LIQ_CNA=$_GET["dt_FECHA_LIQ_CNA"];
$dt_FECHA_ING_CNA=$_GET["dt_FECHA_ING_CNA"];
$dt_FECHA_FASE_IOS=$_GET["dt_FECHA_FASE_IOS"];
$dt_FECHA_PRO_RES=$_GET["dt_FECHA_PRO_RES"];
$str_FECHA_PROG=$_GET["str_FECHA_PROG"];
$str_NOM_SOLICITANTE=$_GET["str_NOM_SOLICITANTE"];


$contador=0;
//Creamos un if para la signacion de valores en cada caja de nuestro formulario.
if ($referencia!='' && $ser_n !='')
{
	
	$SQL_count = "SELECT COUNT(*) FROM tb_cns WHERE referencia='".$referencia."' AND ser_n='".$ser_n."'";
//	echo $SQL_count."<br>";
	$RS_count = TraeRecordset($SQL_count);
	$cuantos = intval($RS_count->fields(0));
	
	if ($cuantos > 0)
	{
$valores='';
$campos='';
///////////////////////////////////////////////////////////						
///////////////////////////////////////////////////////////			
		if ($id_Fase_IOS_cns!='' && $id_Fase_IOS_cns!=$fase_ios_cns_hidden)
		{
			$id_Tipo_Cambio_Fase = 2;
			$script = $_SERVER["PHP_SELF"];
			$insert_ID = Insert_Bitacora_Cambios($referencia,$ser_n,$fase_ios_cns_hidden,$dt_FECHA_FASE_IOS,$id_Fase_IOS_cns,$script,$id_Tipo_Cambio_Fase);
			
			$campos.="id_Fase_IOS = '".$id_Fase_IOS_cns."', dt_fec_fase_IOS = NOW()";
			$contador++;
		}
		if ($id_ipe_eth!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_ipe_eth = '".$id_ipe_eth."'";
			$contador++;
		}
		if ($str_referencia_hub!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_referencia_hub = '".$str_referencia_hub."'";
			$contador++;
		}
		if ($id_tipo_hub!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_tipo_hub = '".$id_tipo_hub."'";
			$contador++;
		}
		if ($PBA_TRASPASO_A_C!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="bol_PBA_TRASPASO_A_C = '".$PBA_TRASPASO_A_C."'";
			$contador++;
		}
		if ($PBA_TRASPASO_A_TX!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="bol_PBA_TRASPASO_C_TX = '".$PBA_TRASPASO_A_TX."'";
			$contador++;
		}
		if ($config_eth!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="bol_config_eth = '".$config_eth."'";
			$contador++;
		}
		if ($dt_FECHA_LIQ_CNA!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_FECHA_LIQ_CNA = '".$dt_FECHA_LIQ_CNA."'";
			$contador++;
		}
		if ($dt_FECHA_ING_CNA!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_FECHA_ING_CNA = '".$dt_FECHA_ING_CNA."'";
			$contador++;
		}
		if ($dt_FECHA_PRO_RES!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_FECHA_PRO_RES = '".$dt_FECHA_PRO_RES."'";
			$contador++;
		}
		if ($str_FECHA_PROG!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_FECHA_PROG = '".$str_FECHA_PROG."'";
			$contador++;
		}
		if ($str_NOM_SOLICITANTE!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_NOM_SOLICITANTE = '".$str_NOM_SOLICITANTE."'";
			$contador++;
		}
		
		$SQL_UPDATE ="UPDATE tb_cns SET ".$campos." WHERE referencia ='".$referencia."' AND ser_n ='".$ser_n."'";
		//echo $SQL_UPDATE."<br>";
		$RS_UPDATE = EjecutaQuery($SQL_UPDATE);
		
		if ($id_Fase_IOS!='' && $id_Fase_IOS!=$fase_ios_hidden)
		{
			
			$id_Tipo_Cambio_Fase = 1;
			$script = $_SERVER["PHP_SELF"];
			$insert_ID = Insert_Bitacora_Cambios($referencia,$ser_n,$fase_ios_hidden,$dt_Fecha_Fase_IOS_G,$id_Fase_IOS,$script,$id_Tipo_Cambio_Fase);
			
			$SQL_IOS.="UPDATE tb_IOS SET id_Fase_IOS = '".$id_Fase_IOS."', dt_Fecha_Fase_IOS = NOW(), id_Bitacora = ".$insert_ID." WHERE referencia ='".$referencia."' AND ser_n ='".$ser_n."'";
			//echo $SQL_IOS."<br>";
			$RS_UPDATE = EjecutaQuery($SQL_IOS);
		}
		if ($RS_UPDATE==false) {
			echo "Error1";
		}else{
			echo '<script type="text/javascript">update_hiddens(\''.$id_Fase_IOS_cns.'\',\''.$id_Fase_IOS.'\');</script>';
			echo "<br />Actualiz&oacute; Registro Correctamente!";
		}
///////////////////////////////////////////////////////////						
///////////////////////////////////////////////////////////			
	} else {
$valores='';
$campos='';
		if ($id_Fase_IOS_cns!='')
		{
			$campos.=", id_Fase_IOS, dt_fec_fase_IOS";
			$valores.=	", '".$id_Fase_IOS_cns."', NOW()";
			$contador++;
		}
		if ($id_ipe_eth!='')
		{
			$campos.=", id_ipe_eth";
			$valores.=", '".$id_ipe_eth."'";
			$contador++;
		}
		if ($str_referencia_hub!='')
		{
			$campos.=", str_referencia_hub";
			$valores.=", '".$str_referencia_hub."'";
			$contador++;
		}
		if ($id_tipo_hub!='')
		{
			$campos.=", id_tipo_hub";
			$valores.=", '".$id_tipo_hub."'";
			$contador++;
		}
		if ($PBA_TRASPASO_A_C!='')
		{
			$campos.=", bol_PBA_TRASPASO_A_C";
			$valores.=", '".$PBA_TRASPASO_A_C."'";
			$contador++;
		}
		if ($PBA_TRASPASO_A_TX!='')
		{
			$campos.=", bol_PBA_TRASPASO_C_TX";
			$valores.=", '".$PBA_TRASPASO_A_TX."'";
			$contador++;
		}
		if ($config_eth!='')
		{
			$campos.=", bol_config_eth";
			$valores.=", '".$config_eth."'";
			$contador++;
		}
		if ($dt_FECHA_LIQ_CNA!='')
		{
			$campos.=", dt_FECHA_LIQ_CNA";
			$valores.=", '".$dt_FECHA_LIQ_CNA."'";
			$contador++;
		}
		if ($dt_FECHA_ING_CNA!='')
		{
			$campos.=", dt_FECHA_ING_CNA";
			$valores.=", '".$dt_FECHA_ING_CNA."'";
			$contador++;
		}
		if ($dt_FECHA_PRO_RES!='')
		{
			$campos.=", dt_FECHA_PRO_RES";
			$valores.=", '".$dt_FECHA_PRO_RES."'";
			$contador++;
		}
		if ($str_FECHA_PROG!='')
		{
			$campos.=", str_FECHA_PROG";
			$valores.=", '".$str_FECHA_PROG."'";
			$contador++;
		}
		if ($str_NOM_SOLICITANTE!='')
		{
			$campos.=", str_NOM_SOLICITANTE";
			$valores.=", '".$str_NOM_SOLICITANTE."'";
			$contador++;
		}
			
		//echo $campos."<br>";
		//echo $valores."<br>";
		$SQL="INSERT INTO tb_cns (referencia, ser_n".$campos.") VALUES ('".$referencia."','".$ser_n."'".$valores.")";
		//echo $SQL;
		$RS = EjecutaQuery($SQL);
		if ($id_Fase_IOS!='' && $id_Fase_IOS!=$fase_ios_hidden)
		{
			$id_Tipo_Cambio_Fase = 1;
			$script = $_SERVER["PHP_SELF"];
			$insert_ID = Insert_Bitacora_Cambios($referencia,$ser_n,$fase_ios_hidden,$dt_Fecha_Fase_IOS_G,$id_Fase_IOS,$script,$id_Tipo_Cambio_Fase);
			
			$SQL_IOS.="UPDATE tb_IOS SET id_Fase_IOS = '".$id_Fase_IOS."', dt_Fecha_Fase_IOS = NOW(), id_Bitacora = ".$insert_ID." WHERE referencia ='".$referencia."' AND ser_n ='".$ser_n."'";
			//echo $SQL_IOS."<br>";
			$RS_UPDATE = EjecutaQuery($SQL_IOS);
		}		
		if ($RS==false) {
			echo "Error2";
		} else {
			echo '<script type="text/javascript">update_hiddens(\''.$id_Fase_IOS_cns.'\',\''.$id_Fase_IOS.'\');</script>';
			echo "<br />Actualiz&oacute; Registro Correctamente!";
		}
	}
			
}
?>
