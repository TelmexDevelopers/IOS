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


	$sql = " SELECT *

 	FROM vw_ios_reg_cns 
	ORDER BY referencia ASC";
	

	if (isset($_GET['t'])!="")
	{
		$_SESSION['ref_telmex'] = $_GET['t'];

	}
	$rows_per_page = 10;
    
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);


?>

