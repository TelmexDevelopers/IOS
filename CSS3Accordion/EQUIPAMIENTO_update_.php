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
$Fase_IOS_Eq=$_GET["Fase_IOS_Eq"];
$Fase_IOS_GRAL=$_GET["Fase_IOS_GRAL"];
$id_Medio_Transmision=$_GET["id_Medio_Transmision"];
$dt_fecha_fase_IOS=$_GET["dt_fecha_fase_IOS"];
$id_supervisor=$_GET["id_supervisor"];
$id_tecnico_eq=$_GET["id_tecnico_eq"];
$id_edo_proyecto=$_GET["id_edo_proyecto"];
$dt_fecha_proyecto=$_GET["dt_fecha_proyecto"];
$id_estado_fo=$_GET["id_estado_fo"];
$dt_fecha_fo=$_GET["dt_fecha_fo"];
$id_Filial=$_GET["id_Filial"];
$id_edo_construccion=$_GET["id_edo_construccion"];
$dt_fecha_provedor=$_GET["dt_fecha_provedor"];
$dt_fecha_meta=$_GET["dt_fecha_meta"];
$dt_fecha_term_const=$_GET["dt_fecha_term_const"];
$dt_fecha_programa_equip=$_GET["dt_fecha_programa_equip"];
$referencia_base=$_GET["referencia_base"];
$dt_fecha_real_term=$_GET["dt_fecha_real_term"];
$id_atraso=$_GET["id_atraso"];
$obs_retraso=$_GET["obs_retraso"];

$valores='';
$campos='';
$contador=0;
//Creamos un if para la signacion de valores en cada caja de nuestro formulario.
if ($referencia!='' && $ser_n!='')
{
	if ($Fase_IOS_Eq!='')
	
	{
		$campos.="id_Fase_IOS = '".$Fase_IOS_Eq."', dt_fecha_fase_IOS = NOW()";
		$contador++;
	}
	if ($id_Medio_Transmision!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="id_Medio_Transmision = '".$id_Medio_Transmision."'";
		$contador++;
		}
	if ($id_supervisor!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="id_supervisor = '".$id_supervisor."'";
		$contador++;
		}
	if ($id_tecnico_eq!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="id_tecnico_eq = '".$id_tecnico_eq."'";
		$contador++;
		}
	if ($id_edo_proyecto!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="id_edo_proyecto = '".$id_edo_proyecto."'";
		$contador++;
		}
	if ($dt_fecha_proyecto!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="dt_fecha_proyecto = '".$dt_fecha_proyecto."'";
		$contador++;
		}
	if ($id_estado_fo!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="id_estado_fo = '".$id_estado_fo."'";
		$contador++;
		}
	if ($dt_fecha_fo!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="dt_fecha_fo = '".$dt_fecha_fo."'";
		$contador++;
		}
	if ($id_Filial!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="id_Filial = '".$id_Filial."'";
		$contador++;
		}
	if ($id_edo_construccion!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="id_edo_construccion = '".$id_edo_construccion."'";
		$contador++;
		}
	if ($dt_fecha_provedor!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="dt_fecha_provedor = '".$dt_fecha_provedor."'";
		$contador++;
		}
	if ($dt_fecha_meta!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="dt_fecha_meta = '".$dt_fecha_meta."'";
		$contador++;
		}
	if ($dt_fecha_term_const!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="dt_fecha_term_const = '".$dt_fecha_term_const."'";
		$contador++;
		}
	if ($dt_fecha_programa_equip!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="dt_fecha_programa_equip = '".$dt_fecha_programa_equip."'";
		$contador++;
		}
	if ($referencia_base!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="referencia_base = '".$referencia_base."'";
		$contador++;
		}
	if ($dt_fecha_real_term!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="dt_fecha_real_term = '".$dt_fecha_real_term."'";
		$contador++;
		}
	if ($id_atraso!='')
	
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="id_atraso = '".$id_atraso."'";
		$contador++;
		}
	if ($obs_retraso!='')
	{
		if($contador>0)
		{
			$campos.=" ,";	
		}
		$campos.="obs_retraso = '".$obs_retraso."'";
		$contador++;
		}
	$SQL="REPLACE INTO tb_equipamiento SET referencia='".$referencia."', ser_n='".$ser_n."', ".$campos."";
//echo $SQL;
	
	$RS = EjecutaQuery($SQL);
			if ($RS==false) {//,'.$Fase_IOS_GRAL.'
				echo "Error";
							}
			
		   else
		        {
			echo '<script type="text/javascript">update_hiddens_equipa('.$Fase_IOS_Eq.','.$Fase_IOS_GRAL.')</script>';
			echo "<br />Actualizaci&oacute;n Exitosa!";
		     	   }
				}
			
			
/*else {
			echo "<br />No hay cambios que actualizar";	
				}*/
?>


