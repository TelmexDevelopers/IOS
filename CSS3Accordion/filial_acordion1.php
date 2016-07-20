	<?php 
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');

	session_start();
	include('../../adodb/adodb.inc.php');
	include('../includes/connection.php');
	include('../includes/funciones.php');
	$CheckSession = CheckSession();
	
	$referencia = $_GET['referencia'];
	$ser_n = $_GET['ser_n'];
	
	if (isset($_GET['referencia']) && isset($_GET['ser_n']));
	{
		$SQL= "SELECT ser_n, desc_serv, due_date, Grupo_dil_servicio, fase_serv, edo_serv, usuario, Familia, id_Fase_IOS, SUBGERENTE_RESPONSABLE, SUPERVISOR, str_Fase_IOS, dt_Fecha_Fase_IOS, str_Area_responsable, str_Punta, str_Filial, dt_Fecha_Envio_Construccion, str_OT, str_Aceptacion_OT,Contratista, str_Tel_Coord_Contratista, str_Fase_IOS_Filial, dt_Fecha_Fase_IOS_Filial, str_Asociado, str_Actividad, str_Central_A, Responsable_Contratista_A, str_Tel_Cont_A, str_Central_B, Responsable_Contratista_B, str_Tel_Cont_B, dt_Fecha_Envio_Entrega, dt_Fecha_Aceptacion, dt_Fecha_Asignacion, dt_Fecha_Elaboracion, dt_Fecha_Programada_Construccion, dt_Fecha_Programada_Entrega, dt_Fecha_Construccion_Terminada, dt_Fecha_Devolucion, dt_Fecha_Real_Entrega, dt_Fecha_Obras_Canceladas FROM vw_filial_2 WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n."' AND id_Filial =".$_SESSION['id_Filial'];

	//echo $SQL."<br>";
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB 1!');
	
	while (!$RS->EOF)
	{
		$ser_n_ok = $RS->fields(0);
		$desc_serv = $RS->fields(1); 
		$due_date = $RS->fields(2); 
		$Grupo_dil_servicio = $RS->fields(3); 
		$fase_serv = $RS->fields(4); 
		$edo_serv = $RS->fields(5); 
		$usuario = $RS->fields(6); 
		$Familia = $RS->fields(7); 
		$id_Fase_IOS = $RS->fields(8); 
		$SUBGERENTE_RESPONSABLE = $RS->fields(9); 
		$SUPERVISOR = $RS->fields(10); 
		$str_Fase_IOS = $RS->fields(11); 
		$dt_Fecha_Fase_IOS = $RS->fields(12); 
		$str_Area_responsable = $RS->fields(13); 
		$str_Punta = $RS->fields(14); 
		$str_Filial = $RS->fields(15); 
		$dt_Fecha_Envio_Construccion = $RS->fields(16); 
		$str_OT = $RS->fields(17); 
		$str_Aceptacion_OT = $RS->fields(18); 
		$Contratista = $RS->fields(19); 
		$str_Tel_Coord_Contratista = $RS->fields(20); 
		$str_Fase_IOS_Filial = $RS->fields(21); 
		$dt_Fecha_Fase_IOS_Filial = $RS->fields(22); 
		$str_Asociado = $RS->fields(23); 
		$str_Actividad = $RS->fields(24); 
		$str_Central_A = $RS->fields(25); 
		$Responsable_Contratista_A = $RS->fields(26); 
		$str_Tel_Cont_A = $RS->fields(27); 
		$str_Central_B = $RS->fields(28); 
		$Responsable_Contratista_B = $RS->fields(29); 
		$str_Tel_Cont_B = $RS->fields(30); 
		$dt_Fecha_Envio_Entrega = $RS->fields(31); 
		$dt_Fecha_Aceptacion = $RS->fields(32); 
		$dt_Fecha_Asignacion = $RS->fields(33); 
		$dt_Fecha_Elaboracion = $RS->fields(34); 
		$dt_Fecha_Programada_Construccion = $RS->fields(35); 
		$dt_Fecha_Programada_Entrega = $RS->fields(36); 
		$dt_Fecha_Construccion_Terminada = $RS->fields(37); 
		$dt_Fecha_Devolucion = $RS->fields(38); 
		$dt_Fecha_Real_Entrega = $RS->fields(39); 
		$dt_Fecha_Obras_Canceladas = $RS->fields(40); 

		$RS->MoveNext();
	}
	$RS->Close();
	$RS = NULL;

	// TRAE DATOS PUNTAS A Y B
	
	$SQL_3 = "SELECT usuario_puntas, responsable, coordinacion_abrev, direccion, telefono, est_abrev, dir_division, poblacion, coordinacion, pta, ser_n FROM vw_puntas WHERE referencia = '".$referencia."' ";
	//echo $SQL_3."<br />";
	$RS_3 = TraeRecordset($SQL_3);
	if (!$RS_3) die('Error en DB!');
	while (!$RS_3->EOF)
	{
	$num_registros = $RS_3->RecordCount();
	
	if ($RS_3->fields(9) == 'A')
	{
		$usuario_puntas   	= $RS_3->fields(0);
		$responsable      	= $RS_3->fields(1);
		$coordinacion_abrev   = $RS_3->fields(2);
		$direccion  		    = $RS_3->fields(3);
		$telefono         	= $RS_3->fields(4);
		$est_abrev        	= $RS_3->fields(5);
		$dir_division         = $RS_3->fields(6);
		$poblacion   		= $RS_3->fields(7);
		$coordinacion         = $RS_3->fields(8);
		$pta   			    = $RS_3->fields(9);
		$ser_n                = $RS_3->fields(10);
	} else {
		$usuario_puntasb     = $RS_3->fields(0);
		$responsableb        = $RS_3->fields(1);
		$coordinacion_abrevb = $RS_3->fields(2);
		$direccionb  		 = $RS_3->fields(3);
		$telefonob        	 = $RS_3->fields(4);
		$est_abrev_b         = $RS_3->fields(5);
		$dir_divisionb       = $RS_3->fields(6);
		$poblacionb    		 = $RS_3->fields(7);
		$coordinacionb       = $RS_3->fields(8);
		$ptab   			 = $RS_3->fields(9);
		$ser_nb              = $RS_3->fields(10);
	}
	$RS_3->MoveNext();
	}
	$RS_3->Close();
	$RS_3 = NULL;
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
		#status		    { border:1px solid #999; padding:5px; width:800px; height:75px; margin:5px 0; }
		#statuses	    { width:800px; }
		#submit		    { cursor:pointer; padding:5px; border:1px solid #ccc; float:left; margin:0 20px 0 0; }
		
		.status-box	    { padding:10px 20px 10px 70px; height:30px; border-bottom:1px dotted #aaa; }
		.status-box:hover	{ background-color:#eee; }
		.success		{ color:#008000; }
		.failure		{ color:#f00; }
		.time			{ color:#2a447b; font-size:10px; }
		
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
		
		var id_Fase_IOS = $('id_Fase_IOS').value;
		var dt_Fecha_Fase_IOS = $('dt_Fecha_Fase_IOS').value;
		
	light = new LightFace.IFrame
					(
		{
				height:420, 
				width:790,
				url: 'Update_serch_filial.php?referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n_ok; ?>&id_Fase_IOS='+id_Fase_IOS+'&dt_Fecha_Fase_IOS='+dt_Fecha_Fase_IOS,
				title: 'Actualiza Referencia' 
		}
					)
				.addButton('Cerrar', function() 
			{ 	light.close();
		
	
	var datos = 'referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n_ok; ?>';	
		
		var myHTMLRequest = new Request.JSON({
		url: 'json_refresh_filial_acordeon.php',
		onRequest : function (){

			}	,
		onSuccess : function(responseJSON, responseText)	{
//alert(datos);
				var json = JSON.parse(responseText);
	
				$('str_OT').set('value',json.str_OT);
				$('ACEPTACION_DE_OT').set('value',json.str_Aceptacion_OT);
				$('Coordinado_Contratista').set('value',json.Contratista);
				$('str_Tel_Coord_Contratista').set('value',json.str_Tel_Coord_Contratista);
				$('ESTATUS_FILIAL').set('value',json.str_Fase_IOS_Filial);
				$('FECHA_ESTADO_FILIAL').set('value',json.dt_Fecha_Fase_IOS_Filial);
				$('ASOCIADO').set('value',json.str_Asociado);
				$('ACTIVIDAD').set('value',json.str_Actividad);
				$('str_Central_A').set('value',json.str_Central_A);
				$('Responsable_Contratista_A').set('value',json.Responsable_Contratista_A);
				$('str_Tel_Cont_A').set('value',json.str_Tel_Cont_A);
				$('str_Central_B').set('value',json.str_Central_B);
				$('Responsable_Contratista_B').set('value',json.Responsable_Contratista_B);
				$('str_Tel_Cont_B').set('value',json.str_Tel_Cont_B);
				$('Fecha_Envio_Entrega').set('value',json.dt_Fecha_Envio_Entrega);
				$('FECHA_DE_ACEPTACION').set('value',json.dt_Fecha_Aceptacion);
				$('FECHA_ASIGNACION').set('value',json.dt_Fecha_Asignacion);
				$('FECHA_ELABORACION').set('value',json.dt_Fecha_Elaboracion);
				$('FECHA_PROGRAMADA_CONSTRUCCION').set('value',json.dt_Fecha_Programada_Construccion);
				$('FECHA_PROGRAMA_ENTREGA').set('value',json.dt_Fecha_Programada_Entrega);
				$('FECHA_CONSTRUCCION_TERMINADA').set('value',json.dt_Fecha_Construccion_Terminada);
				$('FECHA_DEVOLUCION').set('value',json.dt_Fecha_Devolucion);
				$('FECHA_REAL_ENTREGA').set('value',json.dt_Fecha_Real_Entrega);
				$('FECHA_OBRAS_CANCELADAS').set('value',json.dt_Fecha_Obras_Canceladas);
	
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
      <center>
      <table width="650" border="0" align="center" class="Texto_Mediano_Gris" height="198">
      	<tr>
      	  <td align="right">Referencia: </td>
      	  <td align="left"> <input type="text" name="referencia" id="referencia" class="txtbox" value="<?php echo $referencia; ?>" /></td>
        	<td align="right">Usuario: </td>
			<td align="left"> <input type="text" name="usuario2" id="usuario2" class="txtbox" value="<?php echo $usuario; ?>" /></td>
          </tr>
      	<tr>
      	  <td align="right">Fase serv: </td>
      	  <td align="left"> <input type="text" name="fase_serv" id="fase_serv" class="txtbox"  value="<?php echo $fase_serv; ?>" /></td>
          <td align="right">Subgerente: </td>
          <td align="left"> <input type="text" name="SUBGERENTE_RESPONSABLE" id="SUBGERENTE_RESPONSABLE" class="txtbox" value="<?php echo $SUBGERENTE_RESPONSABLE; ?>" /></td>
          </tr>
      	<tr>
      	  <td align="right">Edo del servicio: </td>
      	  <td align="left"> <input type="text" name="edo_serv" id="edo_serv" class="txtbox" value="<?php echo $edo_serv; ?>" /></td>
          <td align="right">Supervisor: </td>
          <td align="left"> <input type="text" name="SUPERVISOR" id="SUPERVISOR" class="txtbox" value="<?php echo $SUPERVISOR; ?>" /></td>
          </tr>
      	<tr>
      	  <td align="right">Desc servicio: </td>
          <td align="left"> <input type="text" name="desc_serv" id="desc_serv" class="txtbox" value="<?php echo $desc_serv; ?>" /></td>
      	  <td align="right">Tecnologia: </td>
          <td align="left"> <input type="text" name="TECNOLOGIA" id="TECNOLOGIA" class="txtbox" value="<?php echo $TECNOLOGIA; ?>" /></td>
   	    </tr>
      	<tr>
      	  <td align="right">Tipo Proy: </td>
          <td align="left"> <input type="text" name="Tipo_Proy" id="Tipo_Proy" class="txtbox" value="<?php // echo $desc_serv; ?>" /></td>
          <td align="right">Programa: </td>
		  <td align="left"> <input type="text" name="Programa" id="Programa" class="txtbox" value="<?php  echo $Programa; ?>" /></td>
          </tr>
      	<tr>
      	  <td align="right">Fase IOS: </td>
      	  <td align="left">
          	<input type="text" name="str_Fase_IOS" id="str_Fase_IOS" class="txtbox" value="<?php echo $str_Fase_IOS; ?>" />
          	<input type="hidden" name="id_Fase_IOS" id="id_Fase_IOS" class="txtbox" value="<?php echo $id_Fase_IOS; ?>" />
          	<input type="hidden" name="dt_Fecha_Fase_IOS" id="dt_Fecha_Fase_IOS" class="txtbox" value="<?php echo $dt_Fecha_Fase_IOS; ?>" />
          </td>
          <td>Due Date:</td>
          <td><input type="text" name="due_date" id="due_date" class="txtbox" value="<?php echo $due_date; ?>" /></td>
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
 <div>
   	<input id="ac-7" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-7">ENTREGA </label>
	<article class="ac-large">
    <br />
	<table width="950" border="0" align="center" class="Texto_Mediano_Gris" height="350">
      	<tr align="right">
      	  <td> OT:
      	    <input type="text" name="str_OT" id="str_OT" style="width: 180px" value="<?php  echo $str_OT; ?>" /></td>
      	  <td> Fecha Env&iacute;o Entrega:
      	    <input type="text" name="Fecha_Envio_Entrega" id="Fecha_Envio_Entrega" style="width: 180px" value="<?php echo $dt_Fecha_Envio_Entrega; ?>" /></td>
       	</tr>
      	<tr align="right">
      	  <td> Empresa Filial:
      	    <input type="text" name="str_filial" id="str_filial" style="width: 180px" value="<?php echo $str_Filial; ?>"/></td>
      	  <td> Fecha Env&iacute;o Const:
      	    <input type="text" name="FECHA_ENVIO_CONST" id="FECHA_ENVIO_CONST" style="width: 180px" value="<?php echo $dt_Fecha_Envio_Construccion; ?>"/></td>
        </tr>
      	<tr align="right">
      	  <td>Aceptaci&oacute;n de OT:
      	    <input type="text" name="ACEPTACION_DE_OT" id="ACEPTACION_DE_OT" style="width: 180px" value="<?php echo $str_Aceptacion_OT; ?>"/></td>
      	  <td> Fecha Elaboraci&oacute;n:
      	    <input type="text" name="FECHA_ELABORACION" id="FECHA_ELABORACION" style="width: 180px" value="<?php echo $dt_Fecha_Elaboracion; ?>" /></td>
        </tr>
      	<tr align="right">
      	  <td>Coordinador Contratista:
      	    <input type="text" name="Coordinado_Contratista" id="Coordinado_Contratista" style="width: 180px" value="<?php echo htmlentities($Contratista, ENT_QUOTES); ?>" /></td>
      	  <td> Fecha Asignaci&oacute;n:
      	    <input type="text" name="FECHA_ASIGNACION" id="FECHA_ASIGNACION" style="width: 180px" value="<?php echo $dt_Fecha_Asignacion; ?>"/></td>
        </tr>
      	<tr align="right">
      	  <td> Tel_Coordinado:
      	    <input type="text" name="str_Tel_Coord_Contratista" id="str_Tel_Coord_Contratista" style="width: 180px" value="<?php echo $str_Tel_Coord_Contratista; ?>"/></td>
      	  <td> Fecha Aceptaci&oacute;n:
      	    <input type="text" name="FECHA_DE_ACEPTACION" id="FECHA_DE_ACEPTACION" style="width: 180px" value="<?php echo $dt_Fecha_Aceptacion; ?>" /></td>
        </tr>
      	<tr align="right">
      	  <td> Estatus filial:
      	    <input type="text" name="ESTATUS_FILIAL" id="ESTATUS_FILIAL" style="width: 180px" value="<?php echo $str_Fase_IOS_Filial; ?>" /></td>
      	  <td> Fecha Programada Construcci&oacute;n:
      	    <input type="text" name="FECHA_PROGRAMADA_CONSTRUCCION" id="FECHA_PROGRAMADA_CONSTRUCCION" style="width: 180px"  value="<?php echo $dt_Fecha_Programada_Construccion; ?>" /></td>
        </tr>
      	<tr align="right">
      	  <td> Asosiado:
      	    <input type="text" name="ASOCIADO" id="ASOCIADO" style="width: 180px" value="<?php echo $str_Asociado; ?>" /></td>
      	  <td> Fecha Estado Filial:
      	    <input type="text" name="FECHA_ESTADO_FILIAL" id="FECHA_ESTADO_FILIAL" style="width: 180px" value="<?php echo $dt_Fecha_Fase_IOS_Filial; ?>"/></td>
        </tr>
      	<tr align="right">
      	  <td> Actividad:
      	    <input type="text" name="ACTIVIDAD" id="ACTIVIDAD" style="width: 180px" value="<?php echo $str_Actividad; ?>" /></td>
      	  <td> Fecha Programada Entrega:
      	    <input type="text" name="FECHA_PROGRAMA_ENTREGA" id="FECHA_PROGRAMA_ENTREGA" style="width: 180px" value="<?php echo $dt_Fecha_Programada_Entrega; ?>"/></td>
        </tr>
      	<tr align="right">
      	  <td> CTL A:
      	    <input type="text" name="str_Central_A" id="str_Central_A" style="width: 180px" value="<?php echo $str_Central_A; ?>"/></td>
      	  <td> Fecha Construcci&oacute;n Terminada:
      	    <input type="text" name="FECHA_CONSTRUCCION_TERMINADA" id="FECHA_CONSTRUCCION_TERMINADA" style="width: 180px"   value="<?php echo $dt_Fecha_Construccion_Terminada; ?>"/></td>
        </tr>
      	<tr align="right">
      	  <td> Contratista A:
      	    <input type="text" name="Responsable_Contratista_A" id="Responsable_Contratista_A" style="width: 180px" value="<?php echo $Responsable_Contratista_A; ?>" /></td>
      	  <td> Fecha Devoluci&oacute;n:
      	    <input type="text" name="FECHA_DEVOLUCION" id="FECHA_DEVOLUCION" style="width: 180px" value="<?php echo $dt_Fecha_Devolucion; ?>" /></td>
        </tr>
      	<tr align="right">
      	  <td> Tel. Contratista A :
      	    <input type="text" name="str_Tel_Cont_A" id="str_Tel_Cont_A" style="width: 180px" value="<?php echo $str_Tel_Cont_A; ?>"/></td>
      	  <td> Fecha Real Entrega:
      	    <input type="text" name="FECHA_REAL_ENTREGA" id="FECHA_REAL_ENTREGA" style="width: 180px" value="<?php echo $dt_Fecha_Real_Entrega; ?>"/></td>
        </tr>
      	<tr align="right">
      	  <td> CTL B:
      	    <input type="text" name="str_Central_B" id="str_Central_B" style="width: 180px"  value="<?php echo $str_Central_B; ?>" /></td>
      	  <td> Fecha Obras Canceladas:
      	    <input type="text" name="FECHA_OBRAS_CANCELADAS" id="FECHA_OBRAS_CANCELADAS" style="width: 180px" value="<?php echo $dt_Fecha_Obras_Canceladas; ?>"/></td>
        </tr>
      	<tr align="right">
      	  <td> Contratista B:
      	    <input type="text" name="Responsable_Contratista_B" id="Responsable_Contratista_B" style="width: 180px" value="<?php echo $Responsable_Contratista_B; ?>" /></td>
      	  <td>&nbsp;</td>
        </tr>
      	<tr align="right">
      	  <td>Tel. Contratista B:
      	    <input type="text" name="str_Tel_Cont_B" id="str_Tel_Cont_B" style="width: 180px" value="<?php echo $str_Tel_Cont_B; ?>"/></td>
        </table>
	  </article>
	</div>
    <div>
	<input id="ac-3" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-3">PUNTA A</label>
	<article class="ac-small">
	<br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
        Usuario:
         <input type="text" name="usuario_puntas" id="usuario_puntas" class="txtbox" value="<?php echo $usuario_puntas; ?>" />
            </td>
            <td>
        Direccion: <input type="text" name="direccion" id="direccion" class="txtbox" value="<?php echo $direccion; ?>"/>
            </td>
            <td>
        Estado: <input type="text" name="Estado" id="Estado" class="txtbox" value="<?php //echo $direccion; ?>"/>
            </td>
            <td> 
		Poblacion: <input type="text" name="poblacion" id="poblacion" class="txtbox" value="<?php echo $poblacion; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		Responsable: <input type="text" name="responsable" id="responsable" class="txtbox" value="<?php echo $responsable; ?>" />
            </td>
            <td>
		Telefono: <input type="text" name="telefono" id="telefono" class="txtbox" value="<?php echo $telefono; ?>" />
            </td>
            <td>
		Dir Division: <input type="text" name="dir_division" id="dir_division" class="txtbox"  value="<?php echo $dir_division; ?>"/>
            </td>
            <td>
		Coordinacion: <input type="text" name="coordinacion" id="coordinacion" class="txtbox" value="<?php  echo $coordinacion; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
        Coordinacion Abrev: <input type="text" name="coordinacion_abrev" id="coordinacion_abrev" class="txtbox" value="<?php echo $coordinacion_abrev; ?>"/>
            </td>
            <td>
	<!--	Pta Dir Div: <input type="text" name="caja9" id="caja9" class="txtbox"  value="<?php //echo $coordinacion_abrev; ?>" />-->
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
        	<td>Usuario:
            <input type="text" name="usuario_puntasb" id="usuario_puntasb" class="txtbox" value="<?php echo $usuario_puntasb; ?>" /></td>
            <td>Direccion:
            <input type="text" name="direccionb" id="direccionb" class="txtbox"   value="<?php echo $direccionb; ?>"/></td>
            <td>Estado:
            <input type="text" name="direccion3" id="direccion3" class="txtbox"  value="<?php //echo $direccion; ?>"/></td>
            <td>Poblacion:
            <input type="text" name="poblacionb" id="poblacionb" class="txtbox" value="<?php echo $poblacionb; ?>" /></td>
        </tr>
      	<tr align="right">
            <td>Responsable:
            <input type="text" name="responsableb" id="responsableb" class="txtbox" value="<?php echo $responsableb; ?>" /></td>
            <td>Telefono:
            <input type="text" name="telefonob" id="telefonob" class="txtbox" value="<?php echo $telefonob; ?>" /></td>
            <td>Dir Division:
            <input type="text" name="dir_divisionb" id="dir_divisionb" class="txtbox"  value="<?php echo $dir_divisionb; ?>"/></td>
            <td>Coordinacion:
            <input type="text" name="coordinacionb" id="coordinacionb" class="txtbox" value="<?php  echo $coordinacionb; ?>" /></td>
        </tr>
      	<tr align="right">
            <td>Coordinacion Abrev:
            <input type="text" name="coordinacion_abrevb" id="coordinacion_abrevb" class="txtbox"  value="<?php echo $coordinacion_abrevb; ?>"/></td>
            
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
		</table>
        <br />	
      </article>
	</div>
 <div>
    <input id="ac-6" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-6">OBSERVACIONES SISA</label>
	<article class="ac-medium">
    <br />
    <textarea name="observaciones" id="observaciones" cols="45" rows="5"></textarea>
    <br />
      </article>
	</div>
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
    </article></div>
	</section>
	</div>
    <!--TERMINA DÉCIMO TAB-->
    <div id="resultado"></div>
        
        </body>
</html>