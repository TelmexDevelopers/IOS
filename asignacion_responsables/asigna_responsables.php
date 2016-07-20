<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../adodb/adodb.inc.php');
include('../includes/connection.php');
require("../includes/funciones.php");

$referencia = $_POST['referencia'];
$UPDATE = "";
$cont = 0;
$cont_fail = 0;
$cont_update = 0;

$_SESSION['id_Tipo_Usuario'] = 2;
$_SESSION['id_Area_Responsable'] = 2;

$id_Tipo_Usuario = $_SESSION['id_Tipo_Usuario'];
$id_Area_Responsable = $_SESSION['id_Area_Responsable'];

if ($_SESSION['id_Tipo_Usuario'] == 4 || $_SESSION['id_Tipo_Usuario'] == 5)
{
	header('Location: index.php');
} else {
	if (count($referencia) > 0)
	{
		foreach($_POST['referencia'] as $nombre_campo => $valor){
			if ($cont == 3)
			{
				$cont = 0;
			}
			foreach($valor as $value => $texto){
		
			   //echo $asignacion = $nombre_campo."=".$texto.", ";
			   
			   $SQL = "UPDATE tb_IOS A JOIN tb_control B ON A.referencia = B.referencia SET";
			   switch($cont)
			   {
					case 0:
						$referencia = $texto;
						$SQL_RF = " WHERE A.referencia = '".$texto."' AND A.ser_n = B.ser_n; ";
					break;
					case 1:
						$SQL_SG = " A.id_Usuario_Subgerente = '".$texto."',";
					break;
					case 2:
						$SQL_SP = " A.id_Usuario_Supervisor = '".$texto."'";
					break;			
			   }
			   //echo $cont;
			   
			   $cont++;
			   
			}
			if ($cont == 3)
			{
				$UPDATE = strval($SQL.$SQL_SG.$SQL_SP.$SQL_RF);
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
	if ($cont_fail > 0)
	{
		echo "Las siguientes referencias no se actualizaron correctamente:<br />\n<b>".$fail."</b>";
	} else {
		echo "<b>Referencias actualizadas correctamente: (".$cont_update.")</b>\n";	
	}
} // TERMINA IF TIPO_USUARIO
?>