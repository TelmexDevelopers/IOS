<?php
include('../autocomplete/adodb/adodb.inc.php');
include ('../autocomplete/includes/connection.php');

$q = $_POST["q"];
if (strlen($q) >=2)
{
$query = "SELECT referencia FROM TB_ASIGNACION_FILIAL WHERE referencia LIKE '$q%' order by referencia desc LIMIT 10";

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
