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

$referencia = explode("\n",$_POST['textarea_referencias']);
$ipe = $_POST['usuarios'];
$UPDATE = "";
$cont = 0;
$cont_fail = 0;
$cont_update = 0;

$id_Tipo_Usuario = $_SESSION['id_Tipo_Usuario'];
$id_Area_Responsable = $_SESSION['id_Area_Responsable'];
//echo "id_Area_Responsable: ".$id_Area_Responsable."<br>";
//echo "Referencias: ".count($referencia)."<br>";
if ($_SESSION['id_Tipo_Usuario'] == 4 || $_SESSION['id_Tipo_Usuario'] == 5)
{
	header('Location: index.php');
} else {
	if (count($referencia) > 0)
	{
		//var_dump($referencia);
		if ($id_Area_Responsable == 1 || $id_Area_Responsable == 2 || $id_Area_Responsable == 3)
		{
			$area_responsable = $_POST["area_responsable"];
		} else {
			$area_responsable = $id_Area_Responsable;
		}
		
			foreach($referencia as $nombre_campo => $valor)
			{
			   $referencia = $valor;
			   if ($referencia != "")
			   {
				   $SQL = "UPDATE tb_IOS A JOIN tb_control B ON A.referencia = B.referencia SET";
				   switch($area_responsable)
				   {
						case 1:// Analisis
								$SQL_IPE = " A.id_Usuario_IPE_Analisis";
						break;
						case 2:// Documentacion
								$SQL_IPE = " A.id_Usuario_IPE_Documentacion";
						break;
						case 3:// Seguimiento
								$SQL_IPE = " A.id_Usuario_IPE_Seguimiento";
						break;
						case 4:// Entrega
							$SQL_IPE = " A.id_Usuario_IPE_Entrega";
						break;
						case 5:// Equipamiento
							$SQL_IPE = " A.id_Usuario_IPE_Equipamiento";
						break;								
				   }
				   $cont++;
				   $UPDATE = strval($SQL.$SQL_IPE." = '".$ipe."' WHERE A.referencia = '".$referencia."' AND A.ser_n = B.ser_n; ");
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
	echo "<b>Referencias actualizadas correctamente: (".$cont_update.")</b>\n";	
	if ($cont_fail > 0)
	{
		echo "<br />Las siguientes referencias no se actualizaron correctamente:<br />\n<b>".$fail."</b>";
	} 
	
	
}
?>