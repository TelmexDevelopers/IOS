<?php
function conectar()
{
	//mysql_connect('10.94.130.36', 'ios_new', 'provi');
	//mysql_select_db('ios_new');

    $conexion = mysql_connect('10.94.130.36', 'ios_new','provi');
	mysql_select_db('ios_new',$conexion);
	
}
/*	function conectar(){
	// $conn = ADONewConnection("mysql"); 
    $conn->Connect('10.94.130.36','ios_new','provi','ios_new') or die('Connection Failed');

	 return $conn;
	}
*/
function desconectar()
{
	
 mysql_close();
}
?>