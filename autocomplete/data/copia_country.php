<?php
include('../adodb/adodb.inc.php');
include ('../includes/connection.php');

$q = $_POST["q"];
$query = "SELECT str_referencia FROM cat_referencia WHERE str_referencia LIKE '%$q%'";
$exe = TraeRecordset($query);

if(!$exe) die ('ya valio mad');

$stack=array ();


while (!$exe->EOF){
	array_push ($stack,$exe->fields (0));
	
	$exe->MoveNext();

	}
	
	header('Content-type: text/json');
	header('Content-type: application/json');
    echo json_encode($stack);


?>
