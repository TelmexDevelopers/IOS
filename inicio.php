<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
require("adodb/adodb.inc.php");
require("includes/connection.php");
require("includes/funciones.php");

	if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] != "is_set" || !isset($_SESSION["id_Usuario"]) || $_SESSION["id_Usuario"] == "" || !isset($_SESSION["id_Tipo_Usuario"]) || $_SESSION["id_Tipo_Usuario"] == "" || !isset($_SESSION["id_Area_Responsable"]) || $_SESSION["id_Area_Responsable"] == "" || !isset($_SESSION["id_Acceso"]) || $_SESSION["id_Acceso"] == "" )
	{
		header("Location: .../iosphp/TELMEX_IOS/logout.php");
	} else {
		$Redirect = Redirect($_SESSION["id_Area_Responsable"],$_SESSION["id_Tipo_Usuario"]);
	}
?>