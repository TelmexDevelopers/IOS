<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');
include('libreria_index3.php');
require("../includes/funciones.php");
$CheckSession = CheckSession();

$referencia = $_GET['referencia'];
$ser_n = $_GET['ser_n'];
if (isset($_GET['referencia']));
{
	$SQL = "SELECT referencia,
	 desc_serv, 
	 due_date, 
	 GRUPO_DIL_SERVICIO, 
	 fase_serv, 
	 edo_serv,
	 fecha_estado, 
	 TECNOLOGIA, 
	 usuario, 
	 sector, 
	 coordinacion_abrev, 
	 dir_division, 
	 str_Fase_IOS, 
	 str_Area_responsable, 
	 SUBGERENTE_RESPONSABLE, 
	 SUPERVISOR,
	 ipe_documentacion,
	 ipe_entrega,
	 ipe_seguimiento,
	 ipe_analisis,
	 Programa,
	 ser_n,
	 clas_1
	 FROM vw_ios_reg WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n."'";
//echo $SQL."<br />";
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB1!');
	
	$num_registros = $RS->RecordCount();
	
	$referencia= $RS->fields(0);
	$desc_serv=  $RS->fields(1);
	$due_date=  $RS->fields(2);
	$GRUPO_DIL_SERVICIO=  $RS->fields(3);
	$fase_serv=  $RS->fields(4);
	$edo_serv=  $RS->fields(5);
	$fecha_estado=  $RS->fields(6);
	$TECNOLOGIA=  $RS->fields(7);
	$usuario=  $RS->fields(8);
	$sector=  $RS->fields(9);
	$coordinacion_abrev_1=  $RS->fields(10);
	$dir_division=  $RS->fields(11);
	$str_Fase_IOS=  $RS->fields(12);
	$str_Area_responsable=  $RS->fields(13);
	$SUBGERENTE_RESPONSABLE=  $RS->fields(14);
	$SUPERVISOR=  $RS->fields(15);
	$ipe_documentacion=  $RS->fields(16);
	$ipe_entrega=  $RS->fields(17);
	$ipe_seguimiento=  $RS->fields(18);
	$ipe_analisis=  $RS->fields(19);
	$Programa=  $RS->fields(20);
	$ser_n_ok = $RS->fields(21);
	$clas_1 = $RS->fields(22);

	// TRAE DATOS PUNTAS A Y B
	
//	$SQL_3 = "SELECT 
//	usuario_puntas,
//	responsable,
//	coordinacion_abrev,
//	direccion,
//	telefono,
//	est_abrev,
//	dir_division,
//	poblacion,
//	coordinacion,	
//	pta,
//	ser_n
//	  
//	FROM vw_puntas WHERE referencia = '".$referencia."' ";
//	//echo $SQL_3."<br />";
//	$RS_3 = TraeRecordset($SQL_3);
//	if (!$RS_3) die('Error en DB!');
//	while (!$RS_3->EOF)
//	{
//	$num_registros = $RS_3->RecordCount();
//	
//	if ($RS_3->fields(9) == 'A')
//	{
//		$usuario_puntas   	= $RS_3->fields(0);
//		$responsable      	= $RS_3->fields(1);
//		$coordinacion_abrev   = $RS_3->fields(2);
//		$direccion  		    = $RS_3->fields(3);
//		$telefono         	= $RS_3->fields(4);
//		$est_abrev        	= $RS_3->fields(5);
//		$dir_division         = $RS_3->fields(6);
//		$poblacion   		= $RS_3->fields(7);
//		$coordinacion         = $RS_3->fields(8);
//		$pta   			    = $RS_3->fields(9);
//		$ser_n                = $RS_3->fields(10);
//	} else {
//		$usuario_puntasb     = $RS_3->fields(0);
//		$responsableb        = $RS_3->fields(1);
//		$coordinacion_abrevb = $RS_3->fields(2);
//		$direccionb  		 = $RS_3->fields(3);
//		$telefonob        	 = $RS_3->fields(4);
//		$est_abrev_b         = $RS_3->fields(5);
//		$dir_divisionb       = $RS_3->fields(6);
//		$poblacionb    		 = $RS_3->fields(7);
//		$coordinacionb       = $RS_3->fields(8);
//		$ptab   			 = $RS_3->fields(9);
//		$ser_nb              = $RS_3->fields(10);
//			
//	
//	}
//	
//	$RS_3->MoveNext();
//	}
//	$RS_3->Close();
//	$RS_3 = NULL;
	
	
	// TRAE DATOS PUNTA B
	
//	$SQL_4 = "SELECT 
//	usuario_puntas,
//	responsable,
//	coordinacion_abrev,
//	direccion,
//	telefono,
//	est_abrev,
//	dir_division,
//	poblacion,
//	coordinacion,	
//	pta,
//	ser_n
//	  
//	FROM vw_puntas WHERE referencia = '".$referencia."' and pta = 'b' ";
//	//echo $SQL_4."<br />";
//	$RS_4 = TraeRecordset($SQL_4);
//	if (!$RS_4) die('Error en DB!');
//	while (!$RS_4->EOF)
//	{
//	$num_registros = $RS_4->RecordCount();
//	
//	$usuario_puntasb     = $RS_4->fields(0);
//	$responsableb        = $RS_4->fields(1);
//	$coordinacion_abrevb = $RS_4->fields(2);
//	$direccionb  		 = $RS_4->fields(3);
//	$telefonob        	 = $RS_4->fields(4);
//	$est_abrev_b         = $RS_4->fields(5);
//	$dir_divisionb       = $RS_4->fields(6);
//	$poblacionb    		 = $RS_4->fields(7);
//	$coordinacionb       = $RS_4->fields(8);
//	$ptab   			 = $RS_4->fields(9);
//	$ser_nb              = $RS_4->fields(10);
//	
//	
//	$RS_4->MoveNext();
//	}
//	$RS_4->Close();
//	$RS_4 = NULL;
	
	// TRAE DATOS ENTREGA A Y B
		$SQL_2 = "SELECT str_Filial, dt_Fecha_Envio_Construccion,	str_OT,	id_Aceptacion_OT, id_Coordinador_Contratista, str_Tel_Coord_Contratista, id_Fase_IOS_Filial, dt_Fecha_Fase_IOS_Filial, str_Asociado, id_Actividad_Filial, str_Central_A, id_Resp_Contratista_A, str_Tel_Cont_A, str_Central_B, id_Resp_Contratista_B, str_Tel_Cont_B, dt_Fecha_Envio_Entrega, dt_Fecha_Aceptacion, dt_Fecha_Asignacion, dt_Fecha_Elaboracion, dt_Fecha_Programada_Construccion, dt_Fecha_Programada_Entrega, dt_Fecha_Construccion_Terminada, dt_Fecha_Devolucion, dt_Fecha_Real_Entrega, dt_Fecha_Obras_Canceladas, str_Punta FROM vw_filial_2  WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n_ok."'";

	//echo $SQL_2."<br />";
	$RS_2 = TraeRecordset($SQL_2);
	if (!$RS_2) die('Error en DB2!');
	
	while (!$RS_2->EOF)
	{
		$num_registros = $RS_2->RecordCount();
	
		if ($RS_2->fields(26) == 'A')
		{
			$str_Filial_A = $RS_2->fields(0);
			$dt_Fecha_Envio_Construccion_A = $RS_2->fields(1);
			$str_OT_A = $RS_2->fields(2);
			$id_Aceptacion_OT_A = $RS_2->fields(3);
			$id_Coordinador_Contratista_A = $RS_2->fields(4);
			$str_Tel_Coord_Contratista_A = $RS_2->fields(5);
			$id_Fase_IOS_Filial_A = $RS_2->fields(6);
			$dt_Fecha_Fase_IOS_Filial_A = $RS_2->fields(7);
			$str_Asociado_A = $RS_2->fields(8);
			$id_Actividad_Filial_A = $RS_2->fields(9);
			$str_Central_A_A = $RS_2->fields(10);
			$id_Resp_Contratista_A_A = $RS_2->fields(11);
			$str_Tel_Cont_A_A = $RS_2->fields(12);
			$str_Central_B_A = $RS_2->fields(13);
			$id_Resp_Contratista_B_A = $RS_2->fields(14);
			$str_Tel_Cont_B_A = $RS_2->fields(15);
			$dt_Fecha_Envio_Entrega_A = $RS_2->fields(16);
			$dt_Fecha_Aceptacion_A = $RS_2->fields(17);
			$dt_Fecha_Asignacion_A = $RS_2->fields(18);
			$dt_Fecha_Elaboracion_A = $RS_2->fields(19);
			$dt_Fecha_Programada_Construccion_A = $RS_2->fields(20);
			$dt_Fecha_Programada_Entrega_A = $RS_2->fields(21);
			$dt_Fecha_Construccion_Terminada_A = $RS_2->fields(22);
			$dt_Fecha_Devolucion_A = $RS_2->fields(23);
			$dt_Fecha_Real_Entrega_A = $RS_2->fields(24);
			$dt_Fecha_Obras_Canceladas_A = $RS_2->fields(25);
			$str_Punta_A = $RS_2->fields(26);
		} //else {
//			$id_OT_E_B= 	            $RS_2->fields(0);
//			$ser_n_E_B= 	            $RS_2->fields(1);
//			$str_filial_E_B= 	        $RS_2->fields(2);
//			$Coordinado_Contratista_E_B=$RS_2->fields(3);
//			$Responsable_Instalador_E_B=$RS_2->fields(4);
//			$central_E_B=               $RS_2->fields(5);
//			$ASOCIADO_E_B=              $RS_2->fields(6);
//			$Contratista_E_B=           $RS_2->fields(7);
//			$str_telefono_E_B=    		$RS_2->fields(8);
//			$FECHA_ENVIO_ENTREGA_E_B=   $RS_2->fields(9);
//			$FECHA_ENVIO_CONST_E_B=     $RS_2->fields(10);
//			$FECHA_ELABORACION_E_B=     $RS_2->fields(11);
//			$FECHA_ASIGNACION_E_B=      $RS_2->fields(12);
//			$FECHA_DE_ACEPTACION_E_B=   $RS_2->fields(13);
//			$FECHA_PROGRAMADA_CONSTRUCCION_E_B= $RS_2->fields(14);
//			$FECHA_REPROGRAMADA_E_B=     $RS_2->fields(15);
//			$FECHA_PROGRAMA_ENTREGA_E_B=$RS_2->fields(16);
//			$FECHA_ESTADO_FILIAL_E_B=   $RS_2->fields(17);
//			$FECHA_CONSTRUCCION_TERMINADA_E_B=   $RS_2->fields(18);
//			$FECHA_DEVOLUCION_E_B=       $RS_2->fields(19);
//			$FECHA_REAL_ENTREGA_E_B=     $RS_2->fields(20);
//			$FECHA_OBRAS_CANCELADAS_E_B= $RS_2->fields(21);
//		}
	$RS_2->MoveNext();
	}
	$RS_2->Close();
	$RS_2 = NULL;
	
	
	// TRAE DATOS ENTREGA B
	
//	$SQL_5 = "SELECT 
//	  id_OT,
//	  ser_n,
//	  str_filial,
//	  Coordinado_Contratista,
//	  Responsable_Instalador,
//	  CONCAT (CENTRAL,'',cto_mantto) as central,
//	  ASOCIADO,
//	  Contratista,
//	  str_telefono,
//	  FECHA_ENVIO_ENTREGA,
//	  FECHA_ENVIO_CONST,
//	  FECHA_ELABORACION,
//	  FECHA_ASIGNACION,
//	  FECHA_DE_ACEPTACION,
//	  FECHA_PROGRAMADA_CONSTRUCCION,
//	  FECHA_REPROGRAMADA,
//	  FECHA_PROGRAMA_ENTREGA,
//	  FECHA_ESTADO_FILIAL,
//	  FECHA_CONSTRUCCION_TERMINADA,
//	  FECHA_DEVOLUCION,
//	  FECHA_REAL_ENTREGA,
//	  FECHA_OBRAS_CANCELADAS
//	  
//	  FROM vw_filial WHERE referencia = '".$referencia."' and str_punta = 'b'";
//	//echo $SQL_5."<br />";
//	$RS_5 = TraeRecordset($SQL_5);
//	if (!$RS_5) die('Error en DB!');
//	
//	while (!$RS_5->EOF)
//	{
//	$num_registros = $RS_5->RecordCount();
//	
//	$id_OT_E_B= 	            $RS_5->fields(0);
//	$ser_n_E_B= 	            $RS_5->fields(1);
//	$str_filial_E_B= 	        $RS_5->fields(2);
//	$Coordinado_Contratista_E_B=$RS_5->fields(3);
//	$Responsable_Instalador_E_B=$RS_5->fields(4);
//	$central_E_B=               $RS_5->fields(5);
//	$ASOCIADO_E_B=              $RS_5->fields(6);
//	$Contratista_E_B=           $RS_5->fields(7);
//	$str_telefono_E_B=    		$RS_5->fields(8);
//	$FECHA_ENVIO_ENTREGA_E_B=   $RS_5->fields(9);
//	$FECHA_ENVIO_CONST_E_B=     $RS_5->fields(10);
//	$FECHA_ELABORACION_E_B=     $RS_5->fields(11);
//	$FECHA_ASIGNACION_E_B=      $RS_5->fields(12);
//	$FECHA_DE_ACEPTACION_E_B=   $RS_5->fields(13);
//	$FECHA_PROGRAMADA_CONSTRUCCION_E_B= $RS_5->fields(14);
//	$FECHA_REPROGRAMADA_E_B=     $RS_5->fields(15);
//	$FECHA_PROGRAMA_ENTREGA_E_B=$RS_5->fields(16);
//	$FECHA_ESTADO_FILIAL_E_B=   $RS_5->fields(17);
//	$FECHA_CONSTRUCCION_TERMINADA_E_B=   $RS_5->fields(18);
//	$FECHA_DEVOLUCION_E_B=       $RS_5->fields(19);
//	$FECHA_REAL_ENTREGA_E_B=     $RS_5->fields(20);
//	$FECHA_OBRAS_CANCELADAS_E_B= $RS_5->fields(21);
//
//
//	$RS_5->MoveNext();
//	}
//	$RS_5->Close();
//	$RS_5 = NULL;
	
	// TRAE DATOS SUBENLACES
	
	$SQL_6 = "SELECT 
	referencia,
	ser_n,
	A1,
	AN,
	D1,
	DN,
	BN,
	B1,
	RIN_A,
	RIN_B
	FROM tb_nodos WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n_ok."'";
	//echo $SQL_6."<br />";
	$RS_6 = TraeRecordset($SQL_6);
	if (!$RS_6) die('Error en DB3!');
	$num_registros = $RS_6->RecordCount();
	while (!$RS_6->EOF)
	{
		$referencia = $RS_6->fields(0);
		//$ser_n = $RS_6->fields(1);
		$A1 = $RS_6->fields(2);
		$AN = $RS_6->fields(3);
		$D1 = $RS_6->fields(4);
		$DN = $RS_6->fields(5);
		$BN = $RS_6->fields(6);
		$B1 = $RS_6->fields(7);
		$RIN_A = $RS_6->fields(8);
		$RIN_B = $RS_6->fields(9);
		
		$RS_6->MoveNext();
	}
	$RS_6->Close();
	$RS_6 = NULL;
	
//		// TRAE DATOS RESPONSABLES RDA
//	
//	$SQL_7 = "SELECT
//	referencia,
//	ser_n, 
//	nombre_subgerente,
//	nombre_supervisor,
//	nombre_ipe_documentacion,
//	nombre_ipe_entrega,
//	nombre_ipe_seguimiento,
//	nombre_ipe_analisis
//	
//	FROM vw_nombre_responsables_rda WHERE referencia = '".$referencia."'";
//	//echo $SQL_7;
//	$RS_7 = TraeRecordset($SQL_7);
//	if (!$RS_7) die('Error en DB!');
//	while (!$RS_7->EOF)
//	{
//	$num_registros = $RS_7->RecordCount();
//	
//	$referencia = $RS_7->fields(0);
//	$ser_n = $RS_7->fields(1);
//	$nombre_subgerente = $RS_7->fields(2);
//	$nombre_supervisor = $RS_7->fields(3);
//	$nombre_ipe_documentacion = $RS_7->fields(4);
//	$nombre_ipe_entrega = $RS_7->fields(5);
//	$nombre_ipe_seguimiento = $RS_7->fields(6);
//	$nombre_ipe_analisis = $RS_7->fields(7);
//	
//	
//	$RS_7->MoveNext();
//	}
//	$RS_7->Close();
//	$RS_7 = NULL;

	//TRAE DATOS DE OT
	
//	$SQL_8 = "SELECT 
//	str_Num_OT
//	FROM tb_ot WHERE referencia = '".$referencia."'";
//	//echo $SQL_6."<br />";
//	$RS_8 = TraeRecordset($SQL_8);
//	if (!$RS_8) die('Error en DB!');
//	while (!$RS_8->EOF)
//	{
//	$num_registros = $RS_8->RecordCount();
//	
//	$str_Num_OT = $RS_6->fields(0);
//
//	$RS_8->MoveNext();
//	}
//	$RS_8->Close();
//	$RS_8 = NULL;
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title>Telmex IOS - Datos de Referencia</title>
	<style type="text/css">
		*				{ font-family:tahoma; }
		h3				{ border-bottom:0; }
		
		#message		{ padding:7px 10px; float:left; margin-left:150px; width:350px; }
		#status		{ border:1px solid #999; padding:5px; width:800px; height:75px; margin:5px 0; }
		#statuses	{ width:800px; }
		#submit		{ cursor:pointer; padding:5px; border:1px solid #ccc; float:left; margin:0 20px 0 0; }
		
		.status-box	{ padding:10px 20px 10px 70px; height:30px; border-bottom:1px dotted #aaa; }
		.status-box:hover	{ background-color:#eee; }
		.success		{ color:#008000; }
		.failure		{ color:#f00; }
		.time			{ color:#2a447b; font-size:10px; }
		
		    .combo_green
	{
		width: 150px;
		text-align:center;
		background-color:#0F3;
	}
		    .combo_yellow
	{
		width: 150px;
		text-align:center;
		background-color:#FF6;
	}
		    .combo_red
	{
		width: 150px;
		text-align:center;
		background-color:#F00;
		color:#FFF;
	}
	
	</style>
    <style>
		@import "LightFace/Assets/LightFace.css"; 
	</style>
        <title>Accordion</title>
        <link rel="stylesheet" type="text/css" href="ios.css" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="mootools-calendar/css/calendar.css"/>
		<script type="text/javascript" src="js/modernizr.custom.29473.js"></script>
        <script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"></script>
        <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"></script>
        <script type="text/javascript" src="mootools-calendar/javascript/mootools/calendar.js"></script>
        <script type="text/javascript" src="LightFace/Source/LightFace.js"></script>
        <script type="text/javascript" src="LightFace/Source/LightFace.IFrame.js"></script>
        <script type="text/javascript" src="LightFace/Source/LightFace.Image.js"></script>
        <script type="text/javascript" src="LightFace/Source/LightFace.Request.js"></script>
		<script type="text/javascript" src="LightFace/Source/LightFace.Static.js"></script>
		<script type="text/javascript">

	function actualiza_referencia()
	{
	var datos_referencia = 'search_ref.php?referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n_ok; ?>';
	//alert (datos_referencia);
	light = new LightFace.IFrame
					(
		{
				height:420, 
				width:800,
				url: datos_referencia,
				title: 'Actualiza Referencia' 
		}
					)
				.addButton('Cerrar', function() 
			{ 	light.close();
			
		var datos = 'referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n_ok; ?>';
		var myHTMLRequest = new Request.JSON({
		url: 'json_refresh_fase_ios.php',
		onRequest : function (){
			//Si nos muestra el resultado correcto, pinta en pantalla
			//$('resultado').set('html','Cargando..');
			}	,
		
		onSuccess : function(responseJSON, responseText)	{
//alert(datos);
			var json = JSON.parse(responseText);
						
			$('str_Fase_IOS').set('value',json.fase);

			}	
		}).send({ 
			method:'get',
			data: datos
		});

			 
			}	,true).open();
	}
		window.addEvent('domready', function() {
			$('start').addEvent('click',actualiza_referencia);
		});
<?php 
if ($_SESSION["id_Area_Responsable"] == 4)
{
?>		
	window.addEvent('domready', function() {
			
			//create the message slider
			var fx = new Fx.Slide('message', {
				mode: 'horizontal'
			}).hide();
			
			//make the ajax call to the database to save the update
			var request = new Request({
				//url: '<?php //echo $_SERVER['PHP_SELF']; ?>',
				url: 'insert_comentarios_filial.php',
				method: 'post',
				onRequest: function() {
					$('submit').disabled = 1;
				},
				onComplete: function(response) {
					$('submit').disabled = 0;
					$('message').removeClass('success').removeClass('failure');
					(function() { fx.slideOut(); }).delay(2000);
				},
				onSuccess: function() {
					//update message
					$('message').set('text','Actualizado!').addClass('success');
					fx.slideIn();
					
					//store value, clear out box
					var status = $('status').value;
					$('status').value = '';
					
					//add new status to the statuses container
					var element = new Element('div', {
						'class': 'status-box',
						'html': status + '<br /><span class="time">Hace un momento</span>'
					}).inject('statuses','top');
					
					//create a slider for it, slide it in.
					var slider = new Fx.Slide(element).hide().slideIn();
					
					//place the cursor in the text area
					$('status').focus();
					
				},
				onFailure: function() {
					//update message
					$('message').set('text','Status could not be updated.  Try again.').addClass('failure');
					fx.slideIn();
				}
			});
			
			//when the submit button is clicked...
			$('submit').addEvent('click', function(event) {
				
				//stop regular form submission
				event.preventDefault();
				
				//if there's anything in the textbox
				if($('status').value.length && !$('status').disabled) {
					
					request.send({
						data: {
							'status': $('status').value,
							'referencia': '<?php echo $referencia; ?>',
							'ser_n': '<?php echo $ser_n_ok; ?>',
							'ajax': 1
						}
					});
					
				}
				
			});
			
		});
<?php } ?>

	function detalle_eq_tramo(id_tramos)
	{
	//alert(tramos);
	light = new LightFace.IFrame
					(
		{
				height:420, 
				width:800,
				url: '../MooTools-TabPanel/Demo/resumen_eqpo.php?id_tramos='+id_tramos,
				title: 'Resumen de Tramos ' 
		}
					)
				.addButton('Cerrar', function() 
			{ 	light.close(); 
			}	,true).open();
	}


</script>      
</head>
    <body>
		<div class="container">
<!-- Codrops top bar --><!--/ Codrops top bar -->
<section class="ac-container">
	<div>
	<input id="ac-1" name="accordion-1" type="checkbox" checked style="visibility:hidden"  />
	<label for="ac-1">Seguimiento Servicios <br/><br></label>
	  <article class="ac-medium">
      <br />
      <table width="950" border="0" align="center" class="Texto_Mediano_Gris" height="200">
      	<tr align="right">
        	<td>
              Referencia: <input type="text" name="referencia" id="referencia" class="txtbox" value="<?php echo htmlentities ($referencia); ?>" />
            </td>
            <td>
              Due Date: <input type="text" name="due_date" id="due_date" class="txtbox" value="<?php echo htmlentities ($due_date); ?>" />
            </td>
            <td>
            	Sector: <input type="text" name="sector" id="sector" class="txtbox" value="<?php echo htmlentities($sector); ?>" />
            </td>
            <td>
            	Area: <input type="text" name="str_Area_responsable" id="str_Area_responsable" class="txtbox" value="<?php echo htmlentities($str_Area_responsable); ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
            	Fase serv: <input type="text" name="fase_serv" id="fase_serv" class="txtbox"  value="<?php echo htmlentities($fase_serv); ?>" />
            </td>
            <td>
            	Usuario: <input type="text" name="usuario" id="usuario" class="txtbox" value="<?php echo htmlentities($usuario); ?>" />
            </td>
            <td>
            	Tecnologia: <input type="text" name="TECNOLOGIA" id="TECNOLOGIA" class="txtbox" value="<?php echo htmlentities($TECNOLOGIA); ?>" />
            </td>
            <td>
            	Dir Division: <input type="text" name="dir_division" id="dir_division" class="txtbox"  value="<?php echo htmlentities($dir_division); ?>"/>
            </td>
        </tr>
      	<tr align="right">
            <td>
            	Edo del servicio: <input type="text" name="edo_serv" id="edo_serv" class="txtbox" value="<?php echo htmlentities($edo_serv); ?>" />
            </td>
            <td>
            	Subgerente: <input type="text" name="SUBGERENTE_RESPONSABLE" id="SUBGERENTE_RESPONSABLE" class="txtbox" value="<?php echo htmlentities ($SUBGERENTE_RESPONSABLE); ?>" />
            </td>
            <td>
            	Fecha Estado: <input type="text" name="fecha_estado" id="fecha_estado" class="txtbox" value="<?php echo htmlentities ($fecha_estado); ?>" />
            </td>
            <td>
				Estado OT: <input type="text" name="edo_ot" id="edo_ot" class="txtbox" />
            </td>
        </tr>
      	<tr align="right">
            <td>
            	Desc servicio: <input type="text" name="desc_serv" id="desc_serv" class="txtbox" value="<?php echo htmlentities ($desc_serv); ?>" />
            </td>
            <td>
            	Supervisor: <input type="text" name="SUPERVISOR" id="SUPERVISOR" class="txtbox" value="<?php echo htmlentities ($SUPERVISOR); ?>" />
            </td>
            <td>
            	Dilacion total: <input type="text" name="GRUPO_DIL_SERVICIO" id="GRUPO_DIL_SERVICIO" class="txtbox" value="<?php echo htmlentities ($GRUPO_DIL_SERVICIO); ?>" />
            </td>
            <td>
            	N&uacute;mero de OT: <input type="text" name="str_Num_OT" id="str_Num_OT" class="txtbox" value="<?php echo htmlentities ($str_Num_OT); ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
            	Fase IOS: <input type="text" name="str_Fase_IOS" id="str_Fase_IOS" class="txtbox" value="<?php echo htmlentities ($str_Fase_IOS); ?>" />
            </td>
            <td>&nbsp;</td>
            <td>
            Fecha Programa: <input type="text" name="clas_1" id="clas_1" class="txtbox" value="<?php echo htmlentities ($clas_1); ?>" />
            </td>
            <td>
            Programa: <input type="text" name="Programa" id="Programa" class="txtbox" value="<?php echo htmlentities ($Programa); ?>" />
            
            </td>
        </tr>
        <tr>
            <td align="center" colspan="4">
	<button id="start">Actualizaci&oacute;n Servicio </button>
<!--                <a href="update_ref.php" class="cerabox" data-type="ajax"><img src="../../../../images/button.jpg" width="131" height="31" alt="Actualizar Avance" /></a></div>
-->            </td>
        </tr>
    </table>
    <br />
    </article>
	</div>
    <!--TERMINA PRIMER TAB-->
<?php 
if ($_SESSION["id_Area_Responsable"] == 4)
{
?>		
	<div>
	<input id="ac-2" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-2">Registro de Avances Contratista</label>
		<article class="ac-large"><br />
               
    <!--**************************COMENTARIOS****************************************-->
    <div style="height:384px; overflow:scroll; width:988px;">
    <fieldset>
    <div class="avances_referencia">
    
	<h3>Comentarios</h3>
	<form action="<?php //echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<textarea name="status" class="centerRight" id="status"></textarea><br />
		<input type="button" value="Agregar Comentario" id="submit" />
		<div id="message"><?php echo $message; ?></div><br />
	</form>
	
	<!--<div class="clear"></div>-->
	<p>&nbsp;</p>
	<h3>Comentarios recientes</h3>
	<div id="statuses">
		<?php 
		
		if (isset($_GET['referencia']))
		{
			$meses = array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diiembre");
			$query  = "SELECT tb_avances_referencia_filial.txt_Avance_Referencia,DAY(tb_avances_referencia_filial.dt_Fecha_Registro) as dia,MONTH(tb_avances_referencia_filial.dt_Fecha_Registro) as mes, YEAR(tb_avances_referencia_filial.dt_Fecha_Registro) as anio, DATE_FORMAT(tb_avances_referencia_filial.dt_Fecha_Registro,' @ % %l:%i:%s %p') AS ds, CONCAT(cat_Usuarios.str_Nombre,' ',cat_Usuarios.str_Ap_Paterno,' ',cat_Usuarios.str_Ap_Materno) as Nombre_Usuario,cat_Filial.str_Filial FROM tb_avances_referencia_filial LEFT JOIN cat_Usuarios ON tb_avances_referencia_filial.id_Usuario =  cat_Usuarios.id_Usuario LEFT JOIN cat_Filial ON tb_avances_referencia_filial.id_Filial = cat_Filial.id_Filial WHERE tb_avances_referencia_filial.referencia = '".$referencia."'  AND tb_avances_referencia_filial.ser_n = '".$ser_n_ok."' ORDER BY dt_Fecha_Registro DESC";
			echo $query;
			$result = TraeRecordset($query);
			$cuantas_filas = $result->RecordCount();
			if ($cuantas_filas > 0)
			{
				while(!$result->EOF)
				{
					$comentario = '<div class="status-box">'.stripslashes($result->fields(0)).'<br /><span class="time">'.ucwords(strtolower($result->fields(5)));
					if ($result->fields(6)!= "")
					{
						$comentario .= ' - '.$result->fields(6);
					}
					$comentario .= ' - '.$result->fields(1).' de '.$meses[$result->fields(2)].' de '.$result->fields(3).$result->fields(4).'</span></div>';
					echo strval($comentario);
					$result->MoveNext();
				}
			} else {
				echo '<br /><b>No hay comentarios...</b>';	
			}
		} else {
			echo '<br /><b>Error: No hay referecia especificada!!</b>';	
		}
		?>
	</div>
	</div>
</fieldset>
    </div>
    <!--***********************************FIN COMENTARIOS**********************************-->    
    <br/>
	</article>
    </div>
   
    <!--TERMINA SEGUNDO TAB-->
<?php } ?>

<div>
	<input id="ac-5" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-5">SUBENLACES</label>
	<article class="ac-small">
    <br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
			A1: <input type="text" name="A1" id="A1" class="txtbox" value="<?php echo $A1; ?>" />
            </td>
            <td>
		    AN: <input type="text" name="AN" id="AN" class="txtbox" value="<?php echo $AN; ?>"  />
            </td>
            <td>
			D1: <input type="text" name="D1" id="D1" class="txtbox" value="<?php echo $D1; ?>"  />
            </td>
            <td>
		    DN:
          <input type="text" name="DN" id="DN" class="txtbox" value="<?php echo $DN; ?>"  />
            </td>
        </tr>
      	<tr align="right">
            <td>
   			BN: <input type="text" name="BN" id="BN" class="txtbox" value="<?php echo $BN; ?>"  />
            </td>
            <td>
		    B1: <input type="text" name="B1" id="B1" class="txtbox" value="<?php echo $B1; ?>"  />
            </td>
            <td>
   			RIN_A: <input type="text" name="RIN_A" id="RIN_A" class="txtbox" value="<?php echo $RIN_A; ?>"  />
            </td>
            <td>
		    RIN_B: <input type="text" name="RIN_B" id="RIN_B" class="txtbox" value="<?php echo $RIN_B; ?>"  />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    RSE_B: <input type="text" name="caja18" id="caja18" class="txtbox" />
            </td>
            <td>
		    RSE_A: <input type="text" name="caja23" id="caja23" class="txtbox" />
			</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
 		</tr>
  </table>
  </article>
	</div>
<!--	TERMINA QUINTO TAB	-->
<!--	INICIA TAB DEL DETALLE DE EQUIPO	-->
<?php echo Print_Detalle_Equipamiento($referencia); ?>
<!--	TERMINA TAB EQUIPAMIENTO	-->
<!--	INICIA TAB DE FORMULARIO DE SEMAFOROS	-->
<?php echo Form_Dilaciones($referencia,$ser_n); ?>
<!--	TERMINA TAB DE FORMULARIO DE SEMAFOROS	-->
 <div>
   	<input id="ac-7" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-7">ENTREGA A </label>
	<article class="ac-large">
    <br />
	<table width="950" border="0" align="center" class="Texto_Mediano_Gris" height="350">
      	<tr align="right">
        	<td>
            OT: <input type="text" name="id_OT_E_A" id="id_OT_E_A" style="width: 180px" value= "<?php echo $id_OT_E_A;?>"/>
            </td>
            <td>
   			Fecha_Envio_Entrega: <input type="text" name="FECHA_ENVIO_ENTREGA_E_A" id="FECHA_ENVIO_ENTREGA_E_A" style="width: 180px" value = "<?php echo $FECHA_ENVIO_ENTREGA_E_A; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Empresa Filial: <input type="text" name="str_filial_E_A" id="str_filial_E_A" style="width: 180px" value = "<?php echo htmlentities ($str_filial_E_A);?>"/>
            </td>
            <td>
		    Fecha_Envio_Const: <input type="text" name="FECHA_ENVIO_CONST_E_A" id="FECHA_ENVIO_CONST_E_A" style="width: 180px"  value = "<?php echo $FECHA_ENVIO_CONST_E_A;?>"/>
            </td>
        </tr>
      	<tr align="right">
            <td>
    		Coord_Contratista: <input type="text" name="Coordinado_Contratista_E_A" id="Coordinado_Contratista_E_A" style="width: 180px" value = "<?php echo htmlentities($Coordinado_Contratista_E_A, ENT_QUOTES); ?>"/>
            </td>
            <td>
		    Fecha Elaboraci&oacute;n: <input type="text" name="FECHA_ELABORACION_E_A" id="FECHA_ELABORACION_E_A" style="width: 180px" value = "<?php echo $FECHA_ELABORACION_E_A;?>"/>
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Tel_Coord: <input type="text" name="Tel_Coord" id="Tel_Coord" style="width: 180px" value = "<?php //echo $Tel_Coord;?>"/>
            </td>
            <td>
		    Fecha Asignaci&oacute;n: <input type="text" name="FECHA_ASIGNACION_E_A" id="FECHA_ASIGNACION_E_A" style="width: 180px" value = "<?php echo $FECHA_ASIGNACION_E_A;?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Estatus Filial: <input type="text" name="ESTATUS_FILIAL_E_A" id="ESTATUS_FILIAL_E_A" style="width: 180px" value = "<?php echo htmlentities($ESTATUS_FILIAL_E_A); ?>"/>
            </td>
            <td>
    		Fecha Aceptaci&oacute;n: <input type="text" name="FECHA_DE_ACEPTACION_E_A" id="FECHA_DE_ACEPTACION_E_A" style="width: 180px" value = "<?php $FECHA_DE_ACEPTACION_E_A; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
    		Respon. Instalador: <input type="text" name="Responsable_Instalador_E_A" id="Responsable_Instalador_E_A" style="width: 180px"   value = "<?php echo htmlentities ($Responsable_Instalador_E_A); ?>" />
            </td>
            <td>
		    Fecha Programada Construcci&oacute;n: <input type="text" name="FECHA_PROGRAMADA_CONSTRUCCION_E_A" id="FECHA_PROGRAMADA_CONSTRUCCION_E_A" style="width: 180px" value = "<?php echo $FECHA_PROGRAMADA_CONSTRUCCION_E_A; ?>"  />
            </td>
        </tr>
      	<tr align="right">
            <td>
			Asosiado: <input type="text" name="ASOCIADO_E_A" id="ASOCIADO_E_A" style="width: 180px"   value = "<?php echo htmlentities ($ASOCIADO_E_A); ?>" />
            </td>
            <td>
		    Fecha Reprogramada: 
		      <input type="text" name="FECHA_REPROGRAMADA_E_A" id="FECHA_REPROGRAMADA_E_A" style="width: 180px" value = "<?php echo $FECHA_REPROGRAMADA_E_A; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Actividad: <input type="text" name="id_ACTIVIDAD_filial_E_A" id="id_ACTIVIDAD_filial_E_A" style="width: 180px" value = "<?php echo htmlentities ($id_ACTIVIDAD_filial_E_A); ?>" />
            </td>
            <td>
		    Fecha Programada Entrega: <input type="text" name="FECHA_PROGRAMA_ENTREGA_E_A" id="FECHA_PROGRAMA_ENTREGA_E_A" style="width: 180px" value = "<?php echo $FECHA_PROGRAMA_ENTREGA_E_A; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
    		CTL A: <input type="text" name="central_E_A" id="central_E_A" style="width: 180px" value = "<?php echo htmlentities($central_E_A); ?>" />
            </td>
            <td>
		    Fecha Construcci&oacute;n Terminado: <input type="text" name="FECHA_CONSTRUCCION_TERMINADA_E_A" id="FECHA_CONSTRUCCION_TERMINADA_E_A" style="width: 180px" value = "<?php echo $FECHA_CONSTRUCCION_TERMINADA_E_A; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Contratista A: <input type="text" name="Contratista_E_A" id="Contratista_E_A" style="width: 180px" value = "<?php echo htmlentities ($Contratista_E_A);?>" />
            </td>
            <td>
		    Fecha Devoluci&oacute;n: <input type="text" name="FECHA_DEVOLUCION_E_A" id="FECHA_DEVOLUCION_E_A" style="width: 180px"  value = "<?php echo $FECHA_DEVOLUCION_E_A; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Tel_Contratista_A : <input type="text" name="str_telefono_E_A" id="str_telefono_E_A" style="width: 180px" value = "<?php echo $str_telefono_E_A; ?>"  />
            </td>
            <td>
		    Fecha_Real_Entrega: <input type="text" name="FECHA_REAL_ENTREGA_E_A" id="FECHA_REAL_ENTREGA_E_A" style="width: 180px"   value = "<?php echo $FECHA_REAL_ENTREGA_E_A; ?>"/>
            </td>
        </tr>
      	<tr align="right">
            <td>
		    CTL B: <input type="text" name="central_E_B" id="central_E_B" style="width: 180px" value = "<?php echo htmlentities($central_E_B); ?>" />
            </td>
            <td>
		    Fecha_obras_Canceladas: <input type="text" name="FECHA_OBRAS_CANCELADAS_E_A" id="FECHA_OBRAS_CANCELADAS_E_A" style="width: 180px"  value = "<?php echo $FECHA_OBRAS_CANCELADAS_E_A; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Contratista B: <input type="text" name="Contratista_E_B" id="Contratista_E_B" style="width: 180px" value = "<?php echo htmlentities($Contratista_E_B);?>" />
            </td>
            <td>
		    Tel_Contratista_B: <input type="text" name="str_telefono_E_B" id="str_telefono_E_B" style="width: 180px" value = "<?php echo $str_telefono_E_B;?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		</table>
	  </article>
	</div>
    <!--TERMINA SÉPTIMO TAB-->
 
<div>
   	<input id="ac-8" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-8">ENTREGA B </label>
	<article class="ac-large">
    <br />
	<table width="950" border="0" align="center" class="Texto_Mediano_Gris" height="350">
      	<tr align="right">
        	<td>
        	  OT: <input type="text" name="id_OT_E_B" id="id_OT_E_B" style="width: 180px" value= "<?php echo $id_OT_E_B;?>"/>
      	  </td>
        	<td> Fecha_Envio_Entrega:
        	  <input type="text" name="FECHA_ENVIO_ENTREGA_E_B" id="FECHA_ENVIO_ENTREGA_E_B" style="width: 180px" value = "<?php echo $FECHA_ENVIO_ENTREGA_E_B; ?>" /></td>
          </tr>
      	<tr align="right">
            <td>
              Empresa Filial: <input type="text" name="str_filial_E_B" id="str_filial_E_B" style="width: 180px" value = "<?php echo htmlentities($str_filial_E_B);?>"/>
            </td>
            <td> Fecha_Envio_Const:
              <input type="text" name="FECHA_ENVIO_CONST_E_B" id="FECHA_ENVIO_CONST_E_B" style="width: 180px"  value = "<?php echo $FECHA_ENVIO_CONST_E_B;?>"/></td>
          </tr>
      	<tr align="right">
            <td>
              Coord_Contratista: <input type="text" name="Coordinado_Contratista_E_B" id="Coordinado_Contratista_E_B" style="width: 180px" value = "<?php echo htmlentities($Coordinado_Contratista_E_B, ENT_QUOTES); ?>"/>
            </td>
            <td> Fecha Elaboraci&oacute;n:
              <input type="text" name="FECHA_ELABORACION_E_B" id="FECHA_ELABORACION_E_B" style="width: 180px" value = "<?php echo $FECHA_ELABORACION_E_B;?>"/></td>
          </tr>
      	<tr align="right">
            <td>
              Tel_Coord: <input type="text" name="caja31" id="caja27" style="width: 180px" />
            </td>
            <td> Fecha Asignaci&oacute;n:
              <input type="text" name="FECHA_ASIGNACION_E_B" id="FECHA_ASIGNACION_E_B" style="width: 180px" value = "<?php echo $FECHA_ASIGNACION_E_B;?>" /></td>
          </tr>
      	<tr align="right">
            <td>
              Estatus Filial:<input type="text" name="ESTATUS_FILIAL_E_B" id="ESTATUS_FILIAL_E_B" style="width: 180px" value = "<?php echo htmlentities($ESTATUS_FILIAL_E_B); ?>"/>
            </td>
            <td> Fecha Aceptaci&oacute;n:
              <input type="text" name="FECHA_DE_ACEPTACION_E_B" id="FECHA_DE_ACEPTACION_E_B" style="width: 180px" value = "<?php $FECHA_DE_ACEPTACION_E_B; ?>" /></td>
          </tr>
      	<tr align="right">
            <td>
              Respon. Instalador: <input type="text" name="Responsable_Instalador_E_B" id="Responsable_Instalador_E_B" style="width: 180px"   value = "<?php echo htmlentities($Responsable_Instalador_E_B); ?>" />
            </td>
            <td> Fecha Programada Construcci&oacute;n:
              <input type="text" name="FECHA_PROGRAMADA_CONSTRUCCION_E_B" id="FECHA_PROGRAMADA_CONSTRUCCION_E_B" style="width: 180px" value = "<?php echo $FECHA_PROGRAMADA_CONSTRUCCION_E_B; ?>"  /></td>
          </tr>
      	<tr align="right">
            <td>
              Asosiado: <input type="text" name="ASOCIADO_E_B" id="ASOCIADO_E_B" style="width: 180px"   value = "<?php echo $ASOCIADO_E_B; ?>" />
            </td>
            <td> Fecha Reprogramada:
              <input type="text" name="FECHA_REPROGRAMADA_E_B" id="FECHA_REPROGRAMADA_E_B" style="width: 180px" value = "<?php echo $FECHA_REPROGRAMADA_E_B; ?>" /></td>
          </tr>
      	<tr align="right">
            <td>
              Actividad: <input type="text" name="id_ACTIVIDAD_filial_E_B" id="id_ACTIVIDAD_filial_E_B" style="width: 180px" value = "<?php echo $id_ACTIVIDAD_filial_E_B; ?>" />
            </td>
            <td> Fecha Programada Entrega:
              <input type="text" name="FECHA_PROGRAMA_ENTREGA_E_B" id="FECHA_PROGRAMA_ENTREGA_E_B" style="width: 180px" value = "<?php echo $FECHA_PROGRAMA_ENTREGA_E_B; ?>" /></td>
          </tr>
      	<tr align="right">
            <td>
              CTL A:  <input type="text" name="central_E_A" id="central_E_A" style="width: 180px" value = "<?php echo $central_E_A; ?>" />
            </td>
            <td> Fecha Construcci&oacute;n Terminado:
              <input type="text" name="FECHA_CONSTRUCCION_TERMINADA_E_B" id="FECHA_CONSTRUCCION_TERMINADA_E_B" style="width: 180px" value = "<?php echo $FECHA_CONSTRUCCION_TERMINADA_E_B; ?>" /></td>
          </tr>
      	<tr align="right">
            <td>
              Contratista A:  <input type="text" name="Contratista_E_A" id="Contratista_E_A" style="width: 180px" value = "<?php echo htmlentities($Contratista_E_A);?>" />
            </td>
            <td> Fecha Devoluci&oacute;n:
              <input type="text" name="FECHA_DEVOLUCION_E_B" id="FECHA_DEVOLUCION_E_B" style="width: 180px"  value = "<?php echo $FECHA_DEVOLUCION_E_B; ?>" /></td>
          </tr>
      	<tr align="right">
            <td>
              Tel_Contratista_A :<input type="text" name="str_telefono_E_A" id="str_telefono_E_A" style="width: 180px" value = "<?php echo $str_telefono_E_A; ?>"  />
            </td>
            <td> Fecha_Real_Entrega:
              <input type="text" name="FECHA_REAL_ENTREGA_E_B" id="FECHA_REAL_ENTREGA_E_B" style="width: 180px"   value = "<?php echo $FECHA_REAL_ENTREGA_E_B; ?>"/></td>
          </tr>
      	<tr align="right">
            <td>
              CTL B: <input type="text" name="central_E_B" id="central_E_B" style="width: 180px" value = "<?php echo $central_E_B;?>" />
            </td>
            <td> Fecha_obras_Canceladas:
              <input type="text" name="FECHA_OBRAS_CANCELADAS_E_B" id="FECHA_OBRAS_CANCELADAS_E_B" style="width: 180px"  value = "<?php echo $FECHA_OBRAS_CANCELADAS_E_B; ?>" /></td>
          </tr>
      	<tr align="right">
            <td>
              Contratista B: <input type="text" name="Contratista_E_B" id="Contratista_E_B" style="width: 180px" value = "<?php echo htmlentities($Contratista_E_B);?>" />
            </td>
            <td> Tel_Contratista_B:
              <input type="text" name="str_telefono_E_B" id="str_telefono_E_B" style="width: 180px" value = "<?php echo $str_telefono_E_B;?>" /></td>
          </tr>
      	<tr align="right">
            <td>
		</table>
	  </article>
	</div>
    <!--TERMINA OCTAVO TAB-->

<div>
	<input id="ac-9" name="accordion-1" type="checkbox" style="visibility:hidden" />
  	<label for="ac-9">RESPONSABLE RDA </label>
    <article class="ac-medium">
    <br />
<div align= "center" >
    <table width="350" border="0" align="center" class="Texto_Mediano_Gris" height="200">
      	<tr align="left">
    <td>Subgerente Responsable:</td>
    <td><input type="text" name="SUBGERENTE_RESPONSABLE" id="SUBGERENTE_RESPONSABLE" style="width: 200px" value="<?php echo htmlentities ($SUBGERENTE_RESPONSABLE); ?>" /></td>
  </tr>
      	<tr align="left">
    <td>Supervisor:</td>
    <td><input type="text" name="SUPERVISOR" id="SUPERVISOR" style="width: 200px" value="<?php echo htmlentities($SUPERVISOR); ?>" /></td>
  </tr>
      	<tr align="left">
    <td>IPE Documentaci&oacute;n:</td>
    <td><input type="text" name="ipe_documentacion" id="ipe_documentacion" style="width: 200px" value="<?php echo htmlentities ($ipe_documentacion); ?>" /></td>
  </tr>
      	<tr align="left">
    <td>IPE Entrega:</td>
    <td><input type="text" name="ipe_entrega" id="ipe_entrega" style="width: 200px" value="<?php echo htmlentities ($ipe_entrega); ?>" /></td>
  </tr>
      	<tr align="left">
    <td>IPE Seguimiento:</td>
    <td><input type="text" name="ipe_seguimiento" id="ipe_seguimiento" style="width: 200px" value="<?php echo htmlentities ($ipe_seguimiento); ?>" /></td>
  </tr>
      	<tr align="left">
    <td>IPE Analisis:</td>
    <td><input type="text" name="ipe_analisis" id="ipe_analisis" style="width: 200px" value="<?php echo htmlentities ($ipe_analisis); ?>" /></td>
  </tr>
</table>
  </div>
    </article>
  </div>
    <!--TERMINA NOVENO TAB-->
<div>
	<input id="ac-3" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-3">PUNTA A</label>
	<article class="ac-small">
	<br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
        Usuario: <input type="text" name="usuario_puntas" id="usuario_puntas" class="txtbox"  value="<?php echo htmlentities ($usuario_puntas); ?>"/>
            </td>
            <td>
        Direccion: <input type="text" name="direccion" id="direccion" class="txtbox" value = "<?php echo htmlentities ($direccion); ?>" />
            </td>
            <td>
        Estado: <input type="text" name="est_abrev" id="est_abrev" class="txtbox" value = "<?php echo htmlentities ($est_abrev); ?>"  />
            </td>
            <td>
		Poblacion: <input type="text" name="poblacion" id="poblacion" class="txtbox"  value = "<?php echo htmlentities ($poblacion); ?>"/>
            </td>
        </tr>
      	<tr align="right">
            <td>
		Responsable: <input type="text" name="responsable" id="responsable" class="txtbox"  value="<?php echo htmlentities ($responsable); ?>"/>
            </td>
            <td>
		Telefono: <input type="text" name="telefono" id="telefono" class="txtbox"  value = "<?php echo htmlentities ($telefono); ?>"/>
            </td>
            <td>
		Dir Division: <input type="text" name="dir_division_a" id="dir_division_a" class="txtbox" 
value = "<?php echo htmlentities ($dir_division_a); ?>" />
            </td>
            <td>
		Coordinacion: <input type="text" name="coordinacion" id="coordinacion" class="txtbox" value="<?php echo htmlentities ($coordinacion); ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
        Coordinacion Abrev: <input type="text" name="coordinacion_abrev_a" id="coordinacion_abrev_a" class="txtbox"  value="<?php echo htmlentities ($coordinacion_abrev_a); ?>"/>
            </td>
        
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
    </table>
        <br />	
      </article>
	</div>
    <!--TERMINA TERCER TAB-->

<div>
	<input id="ac-4" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-4">PUNTA B</label>
	<article class="ac-small">
	<br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
        Usuario: <input type="text" name="usuario_puntas" id="usuario_puntas" class="txtbox"  value="<?php echo htmlentities ($usuario_puntasb); ?>"/>
            </td>
            <td>
        Direccion: <input type="text" name="direccion" id="direccion" class="txtbox" value = "<?php echo htmlentities ($direccionb); ?>" />
            </td>
            <td>
        Estado: <input type="text" name="est_abrev_b" id="est_abrev_b" class="txtbox" value = "<?php echo htmlentities ($est_abrev_b); ?>" />
            </td>
            <td>
		Poblacion: <input type="text" name="poblacion" id="poblacion" class="txtbox"  value = "<?php echo htmlentities ($poblacionb); ?>"/>
            </td>
        </tr>
      	<tr align="right">
            <td>
		Responsable:  <input type="text" name="responsableb" id="responsableb" class="txtbox"  value="<?php echo htmlentities ($responsableb); ?>"/>
            </td>
            <td>
		Telefono:<input type="text" name="telefono" id="telefono" class="txtbox"  value = "<?php echo htmlentities ($telefonob); ?>"/>
            </td>
            <td>
		Dir Division:<input type="text" name="dir_division" id="dir_division" class="txtbox" 
value = "<?php echo htmlentities ($dir_divisionb); ?>" />
            </td>
            <td>
		Coordinacion: <input type="text" name="coordinacion" id="coordinacion" class="txtbox" value="<?php echo htmlentities ($coordinacionb); ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
        Coordinacion Abrev: <input type="text" name="coordinacion_abrev" id="coordinacion_abrev" class="txtbox"  value="<?php echo htmlentities($coordinacion_abrev); ?>"/>
            </td>
           
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
		</table>
        <br />	
      </article>
	</div>

    <!--TERMINA CUARTO TAB-->
 <div>
    <input id="ac-6" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-6">OBSERVACIONES SISA</label>
	<article class="ac-medium">
    <br />
    <textarea name="observaciones" id="observaciones" cols="45" rows="5"></textarea>
    <br />
      </article>
	</div>
    <!--TERMINA SEXTO TAB-->
    
  <div>
  	<input id="ac-10" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-10">HISTORICO DE MOVIMIENTOS</label>
    <article class="ac-medium">
    <br />
<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
           Usuario
            </td>
            <td>
            Fase IOS INI
            </td>
            <td>
           	Fecha Fase IOS Inicial
            </td>
            <td>
           	Fase IOS Fin
            </td>
            <td>
           	Fecha Fase IOS Final
	  </table>
    </article>
	</div>
	</section>
	</div>
    <!--TERMINA DÉCIMO TAB-->
    <div id="resultado"></div>
        </body>
</html>