<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');

$referencia=$_GET["referencia"];
$ser_n=$_GET["ser_n"];

//$FECHA_ENVIO_CONST=$_GET["FECHA_ENVIO_CONST"];
//$FECHA_DE_ACEPTACION=$_GET["FECHA_DE_ACEPTACION"];
//$FECHA_ESTADO_FILIAL=$_GET["FECHA_ESTADO_FILIAL"];

$valores='';
$campos='';
$contador=0;

if ($referencia!='' && $ser_n != '')
{
	$str_OT=$_GET["OT"];
	$ACEPTACION_OT=$_GET["aceptacion_ot"];
	$id_Aceptacion_OT=$_GET["id_Aceptacion_OT"];
	$ID_COORD_CONTRATISTA=$_GET["coordinador_contratista"];
	$str_Telefono_Coord_Contratista = $_GET["telefono_coordinador"];
	$Fase_IOS_Filial=$_GET["fase_filial"];
	$id_Fase_IOS_Filial=$_GET["id_Fase_IOS_Filial"];
	$ASOCIADO=$_GET["ASOCIADO"];
	$id_Actividad_Filial=$_GET["Actividad"];
	$CENTRAL_A=$_GET["CENTRAL_A"];
	$id_responsable_filial_a= $_GET["responsable_filial_a"];
	$str_Telefono_Contratista_A = $_GET["tel_contratista_a"];
	$CENTRAL_B=$_GET["CENTRAL_B"];
	$id_responsable_filial_b= $_GET["responsable_filial_b"];
	$str_Telefono_Contratista_B = $_GET["tel_contratista_b"];
	//$FECHA_ENVIO_ENTREGA=$_GET["FECHA_ENVIO_ENTREGA"];
	$FECHA_ASIGNACION=$_GET["FECHA_ASIGNACION"];
	$FECHA_ELABORACION=$_GET["FECHA_ELABORACION"];
	$FECHA_PROGRAMADA_CONSTRUCCION=$_GET["FECHA_PROGRAMADA_CONSTRUCCION"];
	$FECHA_PROGRAMA_ENTREGA=$_GET["FECHA_PROGRAMA_ENTREGA"];
	$FECHA_CONSTRUCCION_TERMINADA=$_GET["FECHA_CONSTRUCCION_TERMINADA"];
	$FECHA_DEVOLUCION=$_GET["FECHA_DEVOLUCION"];
	$FECHA_REAL_ENTREGA=$_GET["FECHA_REAL_ENTREGA"];
	$FECHA_OBRAS_CANCELADAS=$_GET["FECHA_OBRAS_CANCELADAS"];
	$FECHA_ESTADO_FILIAL=$_GET["FECHA_ESTADO_FILIAL"];
	
	if ($str_OT!='')
	{
		$campos.="str_OT = '".$str_OT."'";
		$contador++;
	}
	if ($ACEPTACION_OT!='' && $ACEPTACION_OT!=$id_Aceptacion_OT)
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="id_Aceptacion_OT = '".$ACEPTACION_OT."', dt_Fecha_Aceptacion = NOW()";
		$contador++;
	}
	if ($ID_COORD_CONTRATISTA!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="id_Coordinador_Contratista = '".$ID_COORD_CONTRATISTA."'";
		$contador++;
	}
	if ($str_Telefono_Coord_Contratista!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="str_Tel_Coord_Contratista = '".$str_Telefono_Coord_Contratista."'";
		$contador++;
	}
	
	if ($Fase_IOS_Filial!='' && $Fase_IOS_Filial!=$id_Fase_IOS_Filial)
	{
		if($contador>0)
		{
			$campos.=", ";	
		}

		$id_Tipo_Cambio_Fase = 3;
		$script = $_SERVER["PHP_SELF"];
		$insert_ID = Insert_Bitacora_Cambios($referencia,$ser_n,$id_Fase_IOS_Filial,$FECHA_ESTADO_FILIAL,$Fase_IOS_Filial,$script,$id_Tipo_Cambio_Fase);

		$campos.="id_Fase_IOS_Filial = '".$Fase_IOS_Filial."', dt_Fecha_Fase_IOS_Filial = NOW()";
		$contador++;
	}
	if ($ASOCIADO!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="str_Asociado = '".$ASOCIADO."'";
		$contador++;
	}
	if ($id_Actividad_Filial!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="id_Actividad_Filial = '".$id_Actividad_Filial."'";
		$contador++;
	}
	if ($CENTRAL_A!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="str_Central_A = '".$CENTRAL_A."'";
		$contador++;
	}
	if ($id_responsable_filial_a!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="id_Resp_Contratista_A = '".$id_responsable_filial_a."'";
		$contador++;
	}
	if ($str_Telefono_Contratista_A!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="str_Tel_Cont_A = '".$str_Telefono_Contratista_A."'";
		$contador++;
	}

	if ($CENTRAL_B!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="str_Central_B = '".$CENTRAL_B."'";
		$contador++;
	}
	if ($id_responsable_filial_b!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="id_Resp_Contratista_B = '".$id_responsable_filial_b."'";
		$contador++;
	}
	if ($str_Telefono_Contratista_B!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="str_Tel_Cont_B = '".$str_Telefono_Contratista_B."'";
		$contador++;
	}
	if ($FECHA_ASIGNACION!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="dt_Fecha_Asignacion = '".$FECHA_ASIGNACION."'";
		$contador++;
	}
	if ($FECHA_ELABORACION!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="dt_Fecha_Elaboracion = '".$FECHA_ELABORACION."'";
		$contador++;
	}
	if ($FECHA_PROGRAMADA_CONSTRUCCION!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="dt_Fecha_Programada_Construccion = '".$FECHA_PROGRAMADA_CONSTRUCCION."'";
		$contador++;
	}
	if ($FECHA_PROGRAMA_ENTREGA!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="dt_Fecha_Programada_Entrega = '".$FECHA_PROGRAMA_ENTREGA."'";
		$contador++;
	}
	if ($FECHA_CONSTRUCCION_TERMINADA!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="dt_Fecha_Construccion_Terminada = '".$FECHA_CONSTRUCCION_TERMINADA."'";
		$contador++;
	}
	if ($FECHA_DEVOLUCION!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="dt_Fecha_Devolucion = '".$FECHA_DEVOLUCION."'";
		$contador++;
	}
	if ($FECHA_REAL_ENTREGA!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="dt_Fecha_Real_Entrega = '".$FECHA_REAL_ENTREGA."'";
		$contador++;
	}
	if ($FECHA_OBRAS_CANCELADAS!='')
	{
		if($contador>0)
		{
			$campos.=", ";	
		}
		$campos.="dt_Fecha_Obras_Canceladas = '".$FECHA_OBRAS_CANCELADAS."'";
		$contador++;
	}

	//echo $campos."<br>";
	//echo $valores."<br>";
	$SQL="UPDATE tb_asignacion_filial SET ".$campos." WHERE referencia='".$referencia."' AND ser_n = '".$ser_n."' AND id_Filial = '".$_SESSION["id_Filial"]."'";
	//echo $SQL."<br>";
	$RS = EjecutaQuery($SQL);
	if ($RS==false) {
		echo "Error";
	} else {
		echo '<script type="text/javascript">update_hiddens(\''.$ACEPTACION_OT.'\',\''.$Fase_IOS_Filial.'\');</script>';
		echo "<br /> Actualiz&oacute; Registro Correctamente!";
	}
} else {
	
	echo "Datos Incompletos";	
}

?>
