<body style="margin: 0; padding: 0;">
  <table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td><img src="../../images/telmex.jpg" width="158" height="89" alt="TELMEX" /></td>
    <td><img src="../../images/login.gif" width="585" height="35" alt="TELMEX" border="0" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><div id="referencia" style="float:center; width:750px; overflow:auto; background:#FFF url(../../images/page-background.jpg) repeat-x top left; min-height: 250px; max-height: 500px; margin-left: 5px; margin-right: 5px;margin-top: 0px; font-family:Verdana, Geneva, sans-serif; color: #666666; font-size:12px;" >
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

if ($_SESSION["carga_datos"] == "is_set" && isset($_FILES['uploadedfile']))
{
	$_SESSION["carga_datos"] = "unset";

$target_path = "txt_ope/";

$explode = explode(".",$_FILES['uploadedfile']['name']);

$file_name = $explode[0]."_".date("YmdHis");
$file_ext = strtolower($explode[1]);

$nombre_archivo = strval($file_name.".".$file_ext);

$target_path = $target_path . basename($nombre_archivo); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "<br />El archivo ".  basename( $_FILES['uploadedfile']['name']). " se ha cargado.<br><br>";
	
$fp = fopen($target_path,"r");

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
$loop = 0; // contador de líneas
while (!feof($fp)) { // loop hasta que se llegue al final del archivo
//echo $loop."<br>";
$line = fgets($fp);
// guardamos toda la línea en $line como un string
// dividimos $line en sus celdas, separadas por el caracter |
// e incorporamos la línea a la matriz $field
//$field[$loop] = explode ('|', $line);
	if ($loop > 1)
	{
       //echo $line . "<br>"; 
		if ($line != "")
		{
			$datos = explode("|",$line);
			
			$ser_n = trim($datos[0]);
			$referencia = trim($datos[1]);
			$usuario = trim($datos[5]);
			$fase = trim($datos[7]);
			$edo = trim($datos[8]);
			$tipo_proy = trim($datos[9]);
			$fecha_edo = trim($datos[10]);
			if ($datos[13] == "")
			{
				$criticidad = "NULL";
			} else {
				$criticidad = "'".trim($datos[13])."'";
			}
			//echo $referencia."<br>";
			//echo $ser_n."<br>";
			//echo $usuario."<br>";
			//echo $fase."<br>";
			//echo $edo."<br>";
			//echo $tipo_proy."<br>";
			//echo $fecha_edo."<br>";
			//echo $criticidad."<br>";
			//$sql = "INSERT INTO tb_hist_corte (ser_n, referencia, usuario, fase, edo, tipo_proy, fecha_edo, criticidad) VALUES ";
			$sql = "REPLACE INTO tb_hist_corte (ser_n, referencia, usuario, fase, edo, tipo_proy, fecha_edo, criticidad) VALUES ";

			$sql .= " ('".$ser_n."', '".$referencia."', '".$usuario."', '".$fase."', '".$edo."', '".$tipo_proy."', '".$fecha_edo."',".$criticidad.");";
	$RS = EjecutaQuery($sql);
	if (!$RS) die('Error en DB!');
		}
	}
	$loop++;
}	
	$sql = rtrim($sql, ",").";";
	//echo $sql;
	fclose($fp);
//	unlink($fp);
	session_unset();
	
	if ($RS == true)
	{
		echo "<strong>Carga exitosa en DB</strong>";	
	} else {
		echo "<strong>Error en carga de datos en DB</strong>";
	}
} else{
    echo "<strong>Error en carga de archivo, intenta de nuevo!</strong>";
}
} else {
	header("Location: example2.php");	
	
}
?>
</div>
</table>
</body>
</html>
