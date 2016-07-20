<?php
include('autocomplete/adodb/adodb.inc.php');
include ('autocomplete/includes/connection.php');

$q = $_POST["q"];
if (strlen($q) >=1)
{
$query = "SELECT DISTINCT str_Login FROM cat_usuarios WHERE str_Login LIKE '$q%' order by str_Login desc LIMIT 10";

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
