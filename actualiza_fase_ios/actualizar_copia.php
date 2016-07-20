<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../adodb/adodb.inc.php');
include('includes/connection.php');
require("../includes/funciones.php");
include_once("../../adodb/adodb-pager.inc.php");

$fase=$_POST["fase"];
$cadena_referencias = $_POST["cadena_referencias"];

if(isset($_POST["fase"]) && $fase != "" && isset($_POST["cadena_referencias"]) && $cadena_referencias != "")
{
	$sql = " UPDATE ios SET `Fase IOS` = '".$fase."',`Fecha Fase IOS` = NOW() WHERE referencia IN('".$cadena_referencias."')";
	//echo $sql;
	$Ejecuta_SQL = EjecutaQuery($sql);
	if ($Ejecuta_SQL == false)
	{
		echo "ERROR DE ACTUALIZACION !!!";
	}
	 
		   
/***************************************************************************************************************************************/		   
 if ($Ejecuta_SQL == true)
   			{
		  $sql_2 = " SELECT id_bitacora,referencia,Fase_ios,DATE_FORMAT(Fecha_Fase_IOS,'%d/%m/%Y - %H:%i:%s') AS FECHA FROM bitacora_fase_ios_referencia  ORDER BY Fecha_Fase_IOS DESC" ;
			}
//pager $valores	
	
/***************************************************************************************************************************************/
	if ($Ejecuta_SQL == true ||$sql_2 == true )
	{
$fase=$_POST["fase"];
$cadena_referencias = $_POST["cadena_referencias"];
$string_ref = explode("','",$cadena_referencias);
$cont = 0;
		$sql_0 = "INSERT INTO bitacora_fase_ios_referencia (Fase_ios,referencia) VALUES ";
		foreach($string_ref as $valor => $ref)
		 {
			if ($cont>0)
			 	{
				$sql_0 .= ", ";	 
				 }
			 $sql_0 .= "('".$fase."','".$ref."')";
			 $cont++;
		}		
		//echo $sql_0;
		$Ejecuta_SQL_0 = EjecutaQuery($sql_0);
		if ($Ejecuta_SQL_0 == false)
		{
			echo "ERROR DE ACTUALIZACION !!!";
		}
		 else {
			echo "Actualización correcta";
			   }
			   /*******************************************rows de la consulta*********************************************/
			   	$rows_per_page = 200;
    
				$pager = Pager($sql_2,$rows_per_page, $_SESSION['ref_telmex']);	
	}	
}
?>