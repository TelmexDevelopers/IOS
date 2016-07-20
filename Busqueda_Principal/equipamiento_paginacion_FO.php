<table border="0px">
<tr>
	<td><br>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="button"  width="250" name="xls" id="xls"  value="Enviar a MS Excel"/>
	</td>
</tr>
</table>
<?php
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
   session_start();
   include_once('../../adodb/adodb.inc.php');
   include_once('../../adodb/adodb-pager.inc.php');
   require_once("connection.php");
   require("../includes/funciones.php");
	$CheckSession = CheckSession();
  
//	
	
	$t=$_GET["t"];

	$campos="";
	$cont = 0;
	
	
	if ($_GET["t"] != "" )
		{
	$campos.="WHERE "; 
         }
	if ($_GET["t"] != "")
	{
		$campos.=" referencia = '$t' ";
	}
	$cont++;


	$sql = " SELECT 
	  referencia,
	  ref_tramo,
	  edo_tramo,
	  coordinacion_abrev,
	  coordinacion,
	  fecha_afect,
	  ete_n,
	  fase_serv,
	  edo_serv,
	  tipo_tecnologia,
	  tipo_lada_enlace,
	  fec_act,
	  tra_obser,
	  tra_punta,
	  ete_n_rc,
	  area_responsable,
	  fec_real_term,
	  aca_n_alc,
	  SIGLAS_ios,
	  area,
	  central,
	  usuario_puntas,
	  direccion

 	FROM vw_tramos_fo ".$campos." ";
	echo $sql;
	if (isset($_GET['t'])!="")
	{
		$_SESSION['ref_telmex'] = $_GET['t'];

	}
		$rows_per_page = 100;
    
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);

?>

