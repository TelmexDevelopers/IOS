<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../adodb/adodb.inc.php');
include('../includes/connection.php');
require("includes/funciones.php");

$referencia = $_POST['referencia'];
$UPDATE = "";
$cont = 0;
$cont_fail = 0;
$cont_update = 0;


$_SESSION['id_Tipo_Usuario'] = 2;
$_SESSION['id_Area_Responsable'] = 4;

$id_Tipo_Usuario = $_SESSION['id_Tipo_Usuario'];
$id_Area_Responsable = $_SESSION['id_Area_Responsable'];

if ($_SESSION['id_Tipo_Usuario'] == 4 || $_SESSION['id_Tipo_Usuario'] == 5)
{
	header('Location: index.php');
} else {
	if (count($referencia) > 0)
	{
		//var_dump($referencia);
		if ($id_Area_Responsable == 1 || $id_Area_Responsable == 2 || $id_Area_Responsable == 3)
		{
			foreach($_POST['referencia'] as $nombre_campo => $valor)
			{
				if ($cont == 4)
				{
					$cont = 0;
				}
				foreach($valor as $value => $texto)
				{
				   //echo $asignacion = $nombre_campo."=".$texto.", ";
				   $SQL = "UPDATE tb_IOS A JOIN tb_control B ON A.referencia = B.referencia SET";
				   switch($cont)
				   {
						case 0:
							$referencia = $texto;
							$SQL_RF = " WHERE A.referencia = '".$texto."' AND A.ser_n = B.ser_n; ";
						break;
						case 1:// Analisis
								$SQL_IPE_A = " A.id_Usuario_IPE_Analisis = '".$texto."',";
							
							
						break;
						case 2:// Documentacion
								$SQL_IPE_D = " A.id_Usuario_IPE_Documentacion = '".$texto."',";
							
							
						break;
						case 3:// Seguimiento
								$SQL_IPE_S = " A.id_Usuario_IPE_Seguimiento = '".$texto."'";
						break;
				   }
				   //echo $cont;
				   $cont++;
				}
				if ($cont == 4)
				{
					$UPDATE = strval($SQL.$SQL_IPE_A.$SQL_IPE_D.$SQL_IPE_S.$SQL_RF);
					//echo $UPDATE;
					$RS = EjecutaQuery($UPDATE);
					if (!$RS) die('Error en DB!');
					
					if($RS == false)
					{
						$fail .= $referencia."<br />";
						$cont_fail++;
					} else {
						$cont_update++;
					}
				}
			}
		} else {
			foreach($_POST['referencia'] as $nombre_campo => $valor){
				if ($cont == 2)
				{
					$cont = 0;
				}
				foreach($valor as $value => $texto)
				{
				   //echo $asignacion = $nombre_campo."=".$texto.", ";
				   $SQL = "UPDATE tb_IOS A JOIN tb_control B ON A.referencia = B.referencia SET";
				   switch($cont)
				   {
						case 0:
							$referencia = $texto;
							$SQL_RF = " WHERE A.referencia = '".$texto."' AND A.ser_n = B.ser_n; ";
						break;
						case 1:
							switch($id_Area_Responsable)
							{
								case 4:
									$SQL_IPE = " A.id_Usuario_IPE_Entrega = '".$texto."'";
								break;
								case 5:
									$SQL_IPE = " A.id_Usuario_IPE_Equipamiento = '".$texto."'";
								break;								
							}
						break;
				   }
				   //echo $cont;
				   $cont++;
				}
				if ($cont == 2)
				{
					$UPDATE = strval($SQL.$SQL_IPE.$SQL_RF);
					//echo $UPDATE;
					$RS = EjecutaQuery($UPDATE);
					if (!$RS) die('Error en DB!');
					
					if($RS == false)
					{
						$fail .= $referencia."<br />";
						$cont_fail++;
					} else {
						$cont_update++;
					}
				}
			} 
		}
	}
	echo "<b>Referencias actualizadas correctamente: (".$cont_update.")</b>\n";	
	if ($cont_fail > 0)
	{
		echo "<br />Las siguientes referencias no se actualizaron correctamente:<br />\n<b>".$fail."</b>";
	} 
	
	
}
?>