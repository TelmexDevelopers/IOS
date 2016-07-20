<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
require("../../adodb/adodb.inc.php");
require("../../includes/connection.php");

$referencia = $_GET['referencia'];
$ser_n = $_GET['ser_n'];
$arreglo = array();
	$SQL = "SELECT referencia, ser_n, desc_serv, due_date, Grupo_dil_servicio, fase_serv, edo_serv, fecha_estado, tipo_art, Tipo_de_proyecto, Familia, TECNOLOGIA, ancho_banda, usuario, sector, coordinacion_abrev, dir_division, str_Fase_IOS, str_Area_responsable, SUBGERENTE_RESPONSABLE, SUPERVISOR, ipe_analisis, ipe_seguimiento, ipe_documentacion, ipe_entrega, ipe_wifa, sup_analisis, str_conOT, str_problema_acceso, str_coment_probl_acceso, clas_1, clas_2, Programa, siglas, area, cto_mantto, usuario_pta, direccion 	FROM vw_ios_reg LIMIT 1000"  ;
//	echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
		while(!$RS->EOF)
		{
			if ($RS->fields(0) != "" && $RS->fields(0)!= "null")
			{
				$referencia = $RS->fields(0);
			} else {
				$referencia = "&nbsp;";
			}
			if ($RS->fields(1) != "" && $RS->fields(1)!= "null")
			{
				$ser_n = $RS->fields(1);
			} else {
				$ser_n = "&nbsp;";
			}
			
			$order   = array("\r\n", "\n", "\r");
			$replace = ' ';
			
			if ($RS->fields(2) != "" && $RS->fields(2)!= "null")
			{
				$newstr = str_replace($order, $replace, $RS->fields(2));
				$desc_serv = stripslashes($newstr);
			} else {
				$desc_serv = "&nbsp;";
			}
			if ($RS->fields(3) != "" && $RS->fields(3)!= "null")
			{
				$due_date = $RS->fields(3);
			} else {
				$due_date = "&nbsp;";
			}
			if ($RS->fields(4) != "" && $RS->fields(4)!= "null")
			{
				$Grupo_dil_servicio = $RS->fields(4);
			} else {
				$Grupo_dil_servicio = "&nbsp;";
			}
			if ($RS->fields(5) != "" && $RS->fields(5)!= "null")
			{
				$fase_serv = $RS->fields(5);
			} else {
				$fase_serv = "&nbsp;";
			}
			if ($RS->fields(6) != "" && $RS->fields(6)!= "null")
			{
				$edo_serv = $RS->fields(6);
			} else {
				$edo_serv = "&nbsp;";
			}
			if ($RS->fields(7) != "" && $RS->fields(7)!= "null")
			{
				$fecha_estado = $RS->fields(7);
			} else {
				$fecha_estado = "&nbsp;";
			}
			if ($RS->fields(8) != "" && $RS->fields(8)!= "null")
			{
				$tipo_art = $RS->fields(8);
			} else {
				$tipo_art = "&nbsp;";
			}
			if ($RS->fields(9) != "" && $RS->fields(9)!= "null")
			{
				$Tipo_de_proyecto = $RS->fields(9);
			} else {
				$Tipo_de_proyecto = "&nbsp;";
			}
			if ($RS->fields(10) != "" && $RS->fields(10)!= "null")
			{
				$Familia = $RS->fields(10);
			} else {
				$Familia = "&nbsp;";
			}
			if ($RS->fields(11) != "" && $RS->fields(11)!= "null")
			{
				$TECNOLOGIA = $RS->fields(11);
			} else {
				$TECNOLOGIA = "&nbsp;";
			}
			if ($RS->fields(12) != "" && $RS->fields(12)!= "null")
			{
				$ancho_banda = $RS->fields(12);
			} else {
				$ancho_banda = "&nbsp;";
			}
			if ($RS->fields(13) != "" && $RS->fields(13)!= "null")
			{
				$usuario = $RS->fields(13);
			} else {
				$usuario = "&nbsp;";
			}
			if ($RS->fields(14) != "" && $RS->fields(14)!= "null")
			{
				$sector = $RS->fields(14);
			} else {
				$sector = "&nbsp;";
			}
			if ($RS->fields(15) != "" && $RS->fields(15)!= "null")
			{
				$coordinacion_abrev = $RS->fields(15);
			} else {
				$coordinacion_abrev = "&nbsp;";
			}
			if ($RS->fields(16) != "" && $RS->fields(16)!= "null")
			{
				$dir_division = $RS->fields(16);
			} else {
				$dir_division = "&nbsp;";
			}
			if ($RS->fields(17) != "" && $RS->fields(17)!= "null")
			{
				$str_Fase_IOS = $RS->fields(17);
			} else {
				$str_Fase_IOS = "&nbsp;";
			}
			if ($RS->fields(18) != "" && $RS->fields(18)!= "null")
			{
				$str_Area_responsable = $RS->fields(18);
			} else {
				$str_Area_responsable = "&nbsp;";
			}
			if ($RS->fields(19) != "" && $RS->fields(19)!= "null")
			{
				$SUBGERENTE_RESPONSABLE = $RS->fields(19);
			} else {
				$SUBGERENTE_RESPONSABLE = "&nbsp;";
			}
			if ($RS->fields(20) != "" && $RS->fields(20)!= "null")
			{
				$SUPERVISOR = $RS->fields(20);
			} else {
				$SUPERVISOR = "&nbsp;";
			}
			if ($RS->fields(21) != "" && $RS->fields(21)!= "null")
			{
				$ipe_analisis = $RS->fields(21);
			} else {
				$ipe_analisis = "&nbsp;";
			}
			if ($RS->fields(22) != "" && $RS->fields(22)!= "null")
			{
				$ipe_seguimiento = $RS->fields(22);
			} else {
				$ipe_seguimiento = "&nbsp;";
			}
			if ($RS->fields(23) != "" && $RS->fields(23)!= "null")
			{
				$ipe_documentacion = $RS->fields(23);
			} else {
				$ipe_documentacion = "&nbsp;";
			}
			if ($RS->fields(24) != "" && $RS->fields(24)!= "null")
			{
				$ipe_entrega = $RS->fields(24);
			} else {
				$ipe_entrega = "&nbsp;";
			}
			if ($RS->fields(25) != "" && $RS->fields(25)!= "null")
			{
				$ipe_wifa = $RS->fields(25);
			} else {
				$ipe_wifa = "&nbsp;";
			}
			if ($RS->fields(26) != "" && $RS->fields(26)!= "null")
			{
				$sup_analisis = $RS->fields(26);
			} else {
				$sup_analisis = "&nbsp;";
			}
			if ($RS->fields(27) != "" && $RS->fields(27)!= "null")
			{
				$str_conOT = $RS->fields(27);
			} else {
				$str_conOT = "&nbsp;";
			}
			if ($RS->fields(28) != "" && $RS->fields(28)!= "null")
			{
				$str_problema_acceso = $RS->fields(28);
			} else {
				$str_problema_acceso = "&nbsp;";
			}
			if ($RS->fields(29) != "" && $RS->fields(29)!= "null")
			{
				$str_coment_probl_acceso = $RS->fields(29);
			} else {
				$str_coment_probl_acceso = "&nbsp;";
			}
			if ($RS->fields(30) != "" && $RS->fields(30)!= "null")
			{
				$clas_1 = $RS->fields(30);
			} else {
				$clas_1 = "&nbsp;";
			}
			if ($RS->fields(31) != "" && $RS->fields(31)!= "null")
			{
				$clas_2 = $RS->fields(31);
			} else {
				$clas_2 = "&nbsp;";
			}
			if ($RS->fields(32) != "" && $RS->fields(32)!= "null")
			{
				$Programa = $RS->fields(32);
			} else {
				$Programa = "&nbsp;";
			}
			if ($RS->fields(33) != "" && $RS->fields(33)!= "null")
			{
				$siglas = $RS->fields(33);
			} else {
				$siglas = "&nbsp;";
			}
			if ($RS->fields(34) != "" && $RS->fields(34)!= "null")
			{
				$area = $RS->fields(34);
			} else {
				$area = "&nbsp;";
			}
			if ($RS->fields(35) != "" && $RS->fields(35)!= "null")
			{
				$cto_mantto = $RS->fields(35);
			} else {
				$cto_mantto = "&nbsp;";
			}
			if ($RS->fields(36) != "" && $RS->fields(36)!= "null")
			{
				$usuario_pta = $RS->fields(36);
			} else {
				$usuario_pta = "&nbsp;";
			}
			if ($RS->fields(37) != "" && $RS->fields(37)!= "null")
			{
				$direccion = $RS->fields(37);
			} else {
				$direccion = "&nbsp;";
			}
		
			$json = array('referencia' => $referencia, 'ser_n' => $ser_n, 'desc_serv' => $desc_serv, 'due_date' => $due_date, 'Grupo_dil_servicio' => $Grupo_dil_servicio, 'fase_serv' => $fase_serv, 'edo_serv' => $edo_serv, 'fecha_estado' => $fecha_estado, 'tipo_art' => $tipo_art, 'Tipo_de_proyecto' => $Tipo_de_proyecto, 'Familia' => $Familia, 'TECNOLOGIA' => $TECNOLOGIA, 'ancho_banda' => $ancho_banda, 'usuario' => $usuario, 'sector' => $sector, 'coordinacion_abrev' => $coordinacion_abrev, 'dir_division' => $dir_division, 'str_Fase_IOS' => $str_Fase_IOS, 'str_Area_responsable' => $str_Area_responsable, 'SUBGERENTE_RESPONSABLE' => $SUBGERENTE_RESPONSABLE, 'SUPERVISOR' => $SUPERVISOR, 'ipe_analisis' => $ipe_analisis, 'ipe_seguimiento' => $ipe_seguimiento, 'ipe_documentacion' => $ipe_documentacion, 'ipe_entrega' => $ipe_entrega, 'ipe_wifa' => $ipe_wifa, 'sup_analisis' => $sup_analisis, 'str_conOT' => $str_conOT, 'str_problema_acceso' => $str_problema_acceso, 'str_coment_probl_acceso' => $str_coment_probl_acceso, 'clas_1' => $clas_1, 'clas_2' => $clas_2, 'Programa' => $Programa, 'siglas' => $siglas, 'area' => $area, 'cto_mantto' => $cto_mantto, 'usuario_pta' => $usuario_pta, 'direccion' => $direccion); 
			
			array_push($arreglo,$json);
			$RS->MoveNext();
		}
	header('Content-type: text/json');
	header('Content-type: application/json');
	echo json_encode($arreglo);

?>