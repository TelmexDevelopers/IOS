<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../../../adodb/adodb.inc.php');
include('../../../../includes/connection.php');
include('../../../../includes/libreria.php');



$_SESSION['id_Usuario'] = 2;
$_SESSION['id_Tipo_Usuario'] = 2;
$_SESSION['id_Area_Responsable'] = 4;


	//set the user id
	//$_SESSION['user_id'] = 1;
	
	//connect to the db
//	$link = @mysql_connect('10.94.130.36','ios_new','provi');
//	@mysql_select_db('ios_new',$link);
	
	/* form submission post */
	if(isset($_POST['referencia']) && isset($_POST['ser_n']) && isset($_POST['txt_Avance_Referencia']) && isset($_SESSION['id_Usuario']))
	{
		$referencia = $_POST['referencia'];
		$ser_n = $_POST['ser_n'];
		$txt_Avance_Referencia = $_POST['txt_Avance_Referencia'];
		$dt_Fecha_Registro = $_POST['dt_Fecha_Registro'];
		
		$query = '
		
		INSERT INTO tb_Avances_Referencia (referencia, ser_n, txt_Avance_Referencia, id_Usuario, dt_Fecha_Registro)
		VALUES ('.$referencia.',\''.$ser_n.'\', \''.mysql_escape_string(htmlentities(strip_tags($_POST['txt_Avance_Referencia']))).'\','.$_SESSION['id_Usuario'].',NOW())';
		$result = TraeRecordset($query);
		
		//die if this was done via ajax...
		if($_POST['ajax']) { die(); } else { $message = 'Actualizado...!'; }
	}
	
?>

