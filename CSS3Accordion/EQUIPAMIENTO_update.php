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

$id_Fase_IOS=$_GET["id_Fase_IOS"]; //Principal -tb_equipamiento
$Subfase_IOS_Equipa_hidden=$_GET["Subfase_IOS_Equipa_hidden"];

$Fase_IOS_Equipa=$_GET["Fase_IOS_Equipa"];//Secundaria -tb_ios
$Fase_IOS_Equipa_hidden = $_GET["Fase_IOS_Equipa_hidden"];

$id_Medio_Transmision=$_GET["id_Medio_Transmision"];

$dt_fecha_fase_IOS=$_GET["dt_fecha_fase_IOS"];
$dt_fecha_fase_IOS_Equipa=$_GET["dt_fecha_fase_IOS_Equipa"];

$id_supervisor=$_GET["id_supervisor"];
$id_tecnico_eq=$_GET["id_tecnico_eq"];
$id_edo_proyecto=$_GET["id_edo_proyecto"];
$dt_fecha_proyecto=$_GET["dt_fecha_proyecto"];
$estado_fo=$_GET["estado_fo"];
$dt_fecha_fo=$_GET["dt_fecha_fo"];
$id_Filial=$_GET["id_Filial"];
$id_edo_construccion=$_GET["id_edo_construccion"];
$dt_fecha_provedor=$_GET["dt_fecha_provedor"];
$dt_fecha_meta=$_GET["dt_fecha_meta"];
$dt_fecha_term_const=$_GET["dt_fecha_term_const"];
$dt_fecha_programa_equip=$_GET["dt_fecha_programa_equip"];
$referencia_base=$_GET["referencia_base"];
$dt_fecha_real_term=$_GET["dt_fecha_real_term"];
$dt_fecha_prog=$_GET["dt_fecha_prog"];
$id_atraso=$_GET["id_atraso"];
$obs_retraso=$_GET["obs_retraso"];

$contador=0;
//Creamos un if para la signacion de valores en cada caja de nuestro formulario.
if ($referencia!='' && $ser_n!='')
{
	$SQL_count = "SELECT COUNT(*) FROM tb_equipamiento WHERE referencia='".$referencia."' AND ser_n='".$ser_n."'";
//	echo $SQL_count."<br>";
	$RS_count = TraeRecordset($SQL_count);
	$cuantos = $RS_count->fields(0);
	
	if ($cuantos > 0)
	{
$valores='';
$campos='';
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
	
		if ($id_Fase_IOS != '' && $id_Fase_IOS != $Subfase_IOS_Equipa_hidden)
		{
			$id_Tipo_Cambio_Fase = 5;
			$script = $_SERVER["PHP_SELF"];			
			$insert_ID = Insert_Bitacora_Cambios($referencia,$ser_n,$Subfase_IOS_Equipa_hidden,$dt_fecha_fase_IOS,$id_Fase_IOS,$script,$id_Tipo_Cambio_Fase);
				
			$campos.="id_Fase_IOS = '".$id_Fase_IOS."', dt_fecha_fase_IOS = NOW()";
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
		if ($estado_fo!='')
		
		{
			if($contador>0)
			{
				$campos.=" ,";	
			}
			$campos.="id_estado_fo = '".$estado_fo."'";
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
		if ($dt_fecha_prog!='')
		
		{
			if($contador>0)
			{
				$campos.=" ,";	
			}
			$campos.="dt_fecha_prog = '".$dt_fecha_prog."'";
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
			
			if ($campos != "")		
			{
				$SQL_UPDATE="UPDATE tb_equipamiento SET ".$campos." WHERE referencia='".$referencia."' AND ser_n='".$ser_n."'";
				//echo $SQL_UPDATE."<br>";
				$RS_UPDATE = EjecutaQuery($SQL_UPDATE);
				if ($RS_UPDATE==false) {
					echo "Error EQUIPO<br />";
				}else{
					echo '<script type="text/javascript">update_hiddens_equipa(\''.$id_Fase_IOS.'\',\''.$Fase_IOS_Equipa.'\');</script>';
					echo "<br />Actualiz&oacute; Registro Correctamente!<br />";
				}
			} else {
				echo "Ingrese valores.<br />";	
			}

				if ($Fase_IOS_Equipa!='' && $Fase_IOS_Equipa!=$Fase_IOS_Equipa_hidden)
				{
					$id_Tipo_Cambio_Fase = 1;
					$script = $_SERVER["PHP_SELF"];			
					$insert_ID = Insert_Bitacora_Cambios($referencia,$ser_n,$Fase_IOS_Equipa_hidden,$dt_fecha_fase_IOS_Equipa,$Fase_IOS_Equipa,$script,$id_Tipo_Cambio_Fase);
					
					$SQL_IOS.="UPDATE tb_ios SET id_Fase_IOS = '".$Fase_IOS_Equipa."', dt_fecha_fase_IOS = NOW(), id_Bitacora = ".$insert_ID." WHERE referencia ='".$referencia."' AND ser_n ='".$ser_n."'";
		
		//			echo $SQL_IOS."<br>";
					
					$RS_UPDATE_TB_IOS = EjecutaQuery($SQL_IOS);
				if ($RS_UPDATE_TB_IOS==false) {
					echo "Error IOS";
				}else{
					echo '<script type="text/javascript">update_hiddens_equipa(\''.$id_Fase_IOS.'\',\''.$Fase_IOS_Equipa.'\');</script>';
					echo "<br />Actualiz&oacute; Registro Correctamente!";
				}

					
				}
///////////////////////////////////////////////////////////						
///////////////////////////////////////////////////////////			
	} else {
$valores='';
$campos='';

		if ($id_Fase_IOS != '')
		{
			$id_Tipo_Cambio_Fase = 5;
			$script = $_SERVER["PHP_SELF"];			
			$insert_ID = Insert_Bitacora_Cambios($referencia,$ser_n,$Subfase_IOS_Equipa_hidden,$dt_fecha_fase_IOS,$id_Fase_IOS,$script,$id_Tipo_Cambio_Fase);
			
			$campos.=", id_Fase_IOS, dt_Fecha_Fase_IOS"; //= NOW()";
			$valores.=	", '".$id_Fase_IOS."', NOW()";
			$contador++;
		}
		if ($id_Medio_Transmision!='')
		{
			$campos.=", id_Medio_Transmision";
			$valores.=", '".$id_Medio_Transmision."'";
			$contador++;
		}
		if ($id_supervisor!='')
		{
			$campos.=", id_supervisor";
			$valores.=", '".$id_supervisor."'";
			$contador++;
		}
		if ($id_tecnico_eq!='')
		{
			$campos.=", id_tecnico_eq";
			$valores.=", '".$id_tecnico_eq."'";
			$contador++;
		}
		if ($id_edo_proyecto!='')
		{
			$campos.=", id_edo_proyecto";
			$valores.=", '".$id_edo_proyecto."'";
			$contador++;
		}
		if ($dt_fecha_proyecto!='')
		{
			$campos.=", dt_fecha_proyecto";
			$valores.=", '".$dt_fecha_proyecto."'";
			$contador++;
		}
		if ($estado_fo!='')
		{
			$campos.=", id_estado_fo";
			$valores.=", '".$estado_fo."'";
			$contador++;
		}
		if ($dt_fecha_fo!='')
		{
			$campos.=", dt_fecha_fo";
			$valores.=", '".$dt_fecha_fo."'";
			$contador++;
		}
		if ($id_Filial!='')
		{
			$campos.=", id_Filial";
			$valores.=", '".$id_Filial."'";
			$contador++;
		}
		if ($id_edo_construccion!='')
		{
			$campos.=", id_edo_construccion";
			$valores.=", '".$id_edo_construccion."'";
			$contador++;
		}
		if ($dt_fecha_provedor!='')
		{
			$campos.=", dt_fecha_provedor";
			$valores.=", '".$dt_fecha_provedor."'";
			$contador++;
		}
		if ($dt_fecha_meta!='')
		{
			$campos.=", dt_fecha_meta";
			$valores.=", '".$dt_fecha_meta."'";
			$contador++;
		}
		if ($dt_fecha_term_const!='')
		{
			$campos.=", dt_fecha_term_const";
			$valores.=", '".$dt_fecha_term_const."'";
			$contador++;
		}
		if ($dt_fecha_programa_equip!='')
		{
			$campos.=", dt_fecha_programa_equip";
			$valores.=", '".$dt_fecha_programa_equip."'";
			$contador++;
		}
		if ($referencia_base!='')
		{
			$campos.=", referencia_base";
			$valores.=", '".$referencia_base."'";
			$contador++;
		}
		if ($dt_fecha_real_term!='')
		{
			$campos.=", dt_fecha_real_term";
			$valores.=", '".$dt_fecha_real_term."'";
			$contador++;
		}
		if ($dt_fecha_prog!='')
		{
			$campos.=", dt_fecha_prog";
			$valores.=", '".$dt_fecha_prog."'";
			$contador++;
		}
		if ($id_atraso!='')
		{
			$campos.=", id_atraso";
			$valores.=", '".$id_atraso."'";
			$contador++;
		}
		if ($obs_retraso!='')
		{
			$campos.=", obs_retraso";
			$valores.=", '".$obs_retraso."'";
			$contador++;
		}	
			
		//echo $campos."<br>";
		//echo $valores."<br>";
		//Ejecucion del query, concatenamos valores
		$SQL="INSERT INTO tb_equipamiento (referencia, ser_n".$campos.") VALUES ('".$referencia."','".$ser_n."'".$valores.")";
		//echo $SQL;
		$RS = EjecutaQuery($SQL);
		if ($Fase_IOS_Equipa!='' && $Fase_IOS_Equipa!=$Fase_IOS_Equipa_hidden)
		{
			$id_Tipo_Cambio_Fase = 1;
			$script = $_SERVER["PHP_SELF"];			
			$insert_ID = Insert_Bitacora_Cambios($referencia,$ser_n,$Fase_IOS_Equipa_hidden,$dt_fecha_fase_IOS_Equipa,$Fase_IOS_Equipa,$script,$id_Tipo_Cambio_Fase);
	
			$SQL_IOS.="UPDATE tb_IOS SET id_Fase_IOS = '".$Fase_IOS_Equipa."', dt_Fecha_Fase_IOS = NOW(), id_Bitacora = ".$insert_ID." WHERE referencia ='".$referencia."' AND ser_n ='".$ser_n."'";
//			echo $SQL_IOS."<br>";
			$RS_UPDATE = EjecutaQuery($SQL_IOS);
		}		
		if ($RS==false) {
			echo "Error2";
		} else {
			echo '<script type="text/javascript">update_hiddens_equipa(\''.$id_Fase_IOS.'\',\''.$Fase_IOS_Equipa.'\');</script>';
			echo "<br />Actualiz&oacute; Registro Correctamente!";
		}
		
	}
			
}
	
?>


