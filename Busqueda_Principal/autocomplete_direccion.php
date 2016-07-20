<?php
include('../autocomplete/adodb/adodb.inc.php');
include ('../autocomplete/includes/connection.php');

$h= $_POST["h"];
if (strlen($h) >=2)
{
$query = "SELECT DISTINCT direccion FROM vw_ios_reg WHERE direccion LIKE '%$h%' ORDER BY direccion ASC LIMIT 10";
//echo $query;
	$exe = TraeRecordset($query);
	if(!$exe) die ('no es valido');
	$stack=array ();
	while (!$exe->EOF){
	array_push ($stack,$exe->fields (0));
	$exe->MoveNext();
	}
	header('Content-type: text/json');
	header('Content-type: application/json');
    echo json_encode($stack);
}

?>
