<?php
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
     session_start();
     include_once('../../../adodb/adodb.inc.php');
     include_once('../../../adodb/adodb-pager.inc.php');
     require_once("connection.php");

// valor $q= valor del combo		

	$q=$_GET["q"];
	$t=$_GET["t"];

	$campos="";
	$cont = 0;
// si hace seleccion del cualquier opcion del combo nos traera la consulta elegida por el combo usando where
if 
(
	$_GET["q"] != "" ||
	$_GET["t"] != "" 
	
	)
{
	$campos.="WHERE ";
}
if ($_GET["q"] != "" || $_GET["q"] == "*")
{
	
	$campos.="tipo_art = '".$_GET["q"]."'  ";
	$cont++;
}

if ($_GET["t"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" referencia = '$t'";
	$cont++;
}
	$sql = " SELECT *

 	FROM vw_cns ".$campos." ";
	

	if (isset($_GET['t'])!="")
	{
		$_SESSION['ref_telmex'] = $_GET['t'];

	}
	$rows_per_page = 10;
    
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);


?>

