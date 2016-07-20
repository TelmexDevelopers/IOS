<?php
include('../autocomplete/adodb/adodb.inc.php');
include ('../autocomplete/includes/connection.php');

$q = $_POST["q"];
if (strlen($q) >=2)
{
$query = "SELECT DISTINCT referencia FROM tb_control WHERE referencia LIKE '$q%' ORDER BY referencia ASC LIMIT 10";

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
