<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
require("../adodb/adodb.inc.php");
require("../includes/connection.php");

$referencia = $_GET['referencia'];
$ser_n = $_GET['ser_n'];

//str_OT, str_Aceptacion_OT, Contratista, str_Tel_Coord_Contratista, str_Fase_IOS_Filial, dt_Fecha_Fase_IOS_Filial, str_Asociado, str_Actividad, str_Central_A, Responsable_Contratista_A, str_Tel_Cont_A, str_Central_B, Responsable_Contratista_B, str_Tel_Cont_B, dt_Fecha_Envio_Entrega, dt_Fecha_Aceptacion, dt_Fecha_Asignacion, dt_Fecha_Elaboracion, dt_Fecha_Programada_Construccion, dt_Fecha_Programada_Entrega, dt_Fecha_Construccion_Terminada, dt_Fecha_Devolucion, dt_Fecha_Real_Entrega, dt_Fecha_Obras_Canceladas

	$SQL = "SELECT str_OT, str_Aceptacion_OT, Contratista, str_Tel_Coord_Contratista, str_Fase_IOS_Filial, dt_Fecha_Fase_IOS_Filial, str_Asociado, str_Actividad, str_Central_A, Responsable_Contratista_A, str_Tel_Cont_A, str_Central_B, Responsable_Contratista_B, str_Tel_Cont_B, dt_Fecha_Envio_Entrega, dt_Fecha_Aceptacion, dt_Fecha_Asignacion, dt_Fecha_Elaboracion, dt_Fecha_Programada_Construccion, dt_Fecha_Programada_Entrega, dt_Fecha_Construccion_Terminada, dt_Fecha_Devolucion, dt_Fecha_Real_Entrega, dt_Fecha_Obras_Canceladas FROM vw_filial_2 WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n."' AND id_Filial = '".$_SESSION["id_Filial"]."'"  ;
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
		if ($num_registros > 0)
		{
			$str_OT = stripslashes($RS->fields(0));
			$str_Aceptacion_OT = $RS->fields(1);
			$Contratista = $RS->fields(2);
			$str_Tel_Coord_Contratista = $RS->fields(3);
			$str_Fase_IOS_Filial = $RS->fields(4);
			$dt_Fecha_Fase_IOS_Filial = $RS->fields(5);
			$str_Asociado = $RS->fields(6);
			$str_Actividad = $RS->fields(7);
			$str_Central_A = $RS->fields(8);
			$Responsable_Contratista_A = $RS->fields(9);
			$str_Tel_Cont_A = $RS->fields(10);
			$str_Central_B = $RS->fields(11);
			$Responsable_Contratista_B = $RS->fields(12);
			$str_Tel_Cont_B = $RS->fields(13);
			$dt_Fecha_Envio_Entrega = $RS->fields(14);
			$dt_Fecha_Aceptacion = $RS->fields(15);
			$dt_Fecha_Asignacion = $RS->fields(16);
			$dt_Fecha_Elaboracion = $RS->fields(17);
			$dt_Fecha_Programada_Construccion = $RS->fields(18);
			$dt_Fecha_Programada_Entrega = $RS->fields(19);
			$dt_Fecha_Construccion_Terminada = $RS->fields(20);
			$dt_Fecha_Devolucion = $RS->fields(21);
			$dt_Fecha_Real_Entrega = $RS->fields(22);
			$dt_Fecha_Obras_Canceladas = $RS->fields(23);
		}
		
			$json = array('str_OT' => $str_OT, 'str_Aceptacion_OT' => $str_Aceptacion_OT, 'Contratista' => $Contratista, 'str_Tel_Coord_Contratista' => $str_Tel_Coord_Contratista, 'str_Fase_IOS_Filial' => $str_Fase_IOS_Filial, 'dt_Fecha_Fase_IOS_Filial' => $dt_Fecha_Fase_IOS_Filial, 'str_Asociado' => $str_Asociado, 'str_Actividad' => $str_Actividad, 'str_Central_A' => $str_Central_A, 'Responsable_Contratista_A' => $Responsable_Contratista_A, 'str_Tel_Cont_A' => $str_Tel_Cont_A, 'str_Central_B' => $str_Central_B, 'Responsable_Contratista_B' => $Responsable_Contratista_B, 'str_Tel_Cont_B' => $str_Tel_Cont_B, 'dt_Fecha_Envio_Entrega' => $dt_Fecha_Envio_Entrega, 'dt_Fecha_Aceptacion' => $dt_Fecha_Aceptacion, 'dt_Fecha_Asignacion' => $dt_Fecha_Asignacion, 'dt_Fecha_Elaboracion' => $dt_Fecha_Elaboracion, 'dt_Fecha_Programada_Construccion' => $dt_Fecha_Programada_Construccion, 'dt_Fecha_Programada_Entrega' => $dt_Fecha_Programada_Entrega, 'dt_Fecha_Construccion_Terminada' => $dt_Fecha_Construccion_Terminada, 'dt_Fecha_Devolucion' => $dt_Fecha_Devolucion, 'dt_Fecha_Real_Entrega' => $dt_Fecha_Real_Entrega, 'dt_Fecha_Obras_Canceladas' => $dt_Fecha_Obras_Canceladas);	
		
	
	header('Content-type: text/json');
	header('Content-type: application/json');
	echo json_encode($json);

?>