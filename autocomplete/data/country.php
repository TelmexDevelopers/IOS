<?php
include('../adodb/adodb.inc.php');
include ('../includes/connection.php');

$q = $_POST["q"];
$query = "SELECT referencia FROM tb_seg_serv WHERE referencia LIKE '%$q%'";

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


?>
