<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');

$referencia = $_GET['referencia'];
$ser_n = $_GET['ser_n'];
$filial_a=$_GET["filial_a"];
$filial_b=$_GET["filial_b"];


if (isset($_GET['referencia']) && $_GET['referencia'] != "")
{
	$SQL_SER_N = "SELECT ser_n FROM tb_control WHERE referencia = '".$referencia."' LIMIT 1";
	
	$RS_SER_N = TraeRecordset($SQL_SER_N);
	
	if (!$RS_SER_N)
	{ 
		die("No SER_N");
	} else {
		$mensaje = "";
		$cont = 0;
		$ser_n =  $RS_SER_N->fields(0);
		
		if (isset($_GET['filial_a']) && $_GET['filial_a'] != "")
		{
		$sql_A="REPLACE INTO tb_Asignacion_Filial (referencia,ser_n,str_Punta,id_Filial) VALUES ('".$referencia."','".$ser_n."' ,'A',".$filial_a.")";
	
			//echo $sql_A;
			$RS_A = EjecutaQuery($sql_A);
			if ($RS_A)
			{
				$mensaje .= "Punta A";
				$cont++;
			}
		}
		if (isset($_GET['filial_b']) && $_GET['filial_b'] != "")
		{
		$sql_B="REPLACE INTO tb_Asignacion_Filial (referencia,ser_n,str_Punta,id_Filial) VALUES ('".$referencia."','".$ser_n."' ,'B',".$filial_b.")";
	
			//echo $sql_B;
			$RS_B = EjecutaQuery($sql_B);
			if ($RS_B)
			{
				if ($cont > 0)
				{
					$mensaje .= " y ";
				}
				$mensaje .= "Punta B.";
			}
		}
		
		if ($mensaje!="") {
			echo "Asignaci&oacute;n Exitosa de Filial en ".$mensaje;
		}else{
			echo "Error";
		}
	}
} else {
	echo "No hay referencia especificada...";
}

?>
