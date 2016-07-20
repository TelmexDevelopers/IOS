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

$id_Usuario_IPE = $_GET['ipe'];

$contador = 1;
if (isset($_GET['ipe']) && $_GET['ipe'] != "")
{
	$SQL = "SELECT  b.str_Expediente,CONCAT(b.str_Nombre,' ',b.str_Ap_Paterno,' ',b.str_Ap_Materno) as str_Nombre_IPE, WEEK(dt_hora_inicio),YEAR(dt_hora_inicio), SUM(ft_Total_Horas),a.id_Usuario FROM tb_Tiempo_Extra a LEFT JOIN cat_Usuarios b ON a.id_Usuario = b.id_Usuario WHERE a.id_Usuario = '".$id_Usuario_IPE."' GROUP BY a.id_Usuario,week(dt_hora_inicio),YEAR(dt_hora_inicio) ORDER BY week(dt_hora_inicio),YEAR(dt_hora_inicio)";
//	echo $SQL;
	$RS = TraeRecordset($SQL);
	$cuantos = $RS->RecordCount();
	if ($cuantos > 0)
	{
		$html = '<br /><br />
		<b>Horas Extras Cargadas Por Semana</b>
		<br /><br />
			<table width="700" border="0" class="Texto_Mediano_Gris" cellpadding="5" cellspacing="1" bgcolor="#EBEBEB">
			  <tr class="Texto_Mediano_Blanco" align="center" bgcolor="#003399" style=" font-weight:bold;">
				<td>#</td>
				<td>Expediente</td>
				<td>IPE</td>
				<td>Semana</td>
				<td>A&ntilde;o</td>
				<td>Horas Totales</td>
			  </tr>
		';
	
		while(!$RS->EOF)
		{
			$html .= '
			  <tr align="center">
				<td bgcolor="#FFF">'.$contador.'</td>
				<td bgcolor="#FFF">'.$RS->fields(0).'</td>
				<td bgcolor="#FFF" align="left">'.$RS->fields(1).'</td>
				<td bgcolor="#FFF"><a href="javascript:void()">'.$RS->fields(2).'</td>
				<td bgcolor="#FFF">'.$RS->fields(3).'</td>
				<td bgcolor="#FFF">'.$RS->fields(4).'</td>
			  </tr>			
			';
			$contador++;
			$RS->MoveNext();  
		}
		$RS->Close();
		$RS = NULL;

		$html .= '
			</table>
		<br /><br />
		';
	} else {
		$html = "<br /><br /><b>El IPE no tiene horas extras registradas.</b><br /><br />";
	}

		echo $html;
} else {
	echo "Error: IPE no especificado.";
	
}




?>