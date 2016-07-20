<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');
include('libreria_serch_ref.php');
require("../includes/funciones.php");
$CheckSession = CheckSession();


$referencia = $_GET['referencia'];
$ser_n = $_GET['ser_n'];

	$SQL = "SELECT id_Fase_IOS,id_Medio_Acceso,int_Documentado,dt_Fecha_Fase_IOS
	FROM tb_ios WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n."'";
	
	//id_Medio_Acceso,id_Fase_IOS,dt_Fecha_Fase_IOS,int_Documentado,	dt_Fecha_FIN_Equipamiento,dt_fecha_envio_const_pta_a,dt_fecha_envio_const_pta_b,	id_Motivo_PPU,int_CON_OT,id_Proyecto_Completo,	id_empresa_filial_pta_A,id_empresa_fiial_pta_B	
	
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB1!');
	
	$num_registros = $RS->RecordCount();
	if ($num_registros > 0)
	{
		$id_Fase_IOS=  $RS->fields(0);
		$id_Medio_Acceso= $RS->fields(1);
		$int_Documentado=  $RS->fields(2);
		$dt_Fecha_Fase_IOS=  $RS->fields(3);
	}
//	$dt_Fecha_FIN_Equipamiento=  $RS->fields(4);
//	$dt_fecha_envio_const_pta_a=  $RS->fields(5);
//	$dt_fecha_envio_const_pta_b=  $RS->fields(6);
//	$id_Motivo_PPU=  $RS->fields(7);
//	$int_CON_OT=  $RS->fields(8);
//	$id_Proyecto_Completo=  $RS->fields(9);
//	$id_empresa_filial_pta_A=  $RS->fields(10);
//	$id_empresa_fiial_pta_B=  $RS->fields(11);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>TELMEX - IOS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    .combos_referencia
	{
		width: 200px;
			
	}
    </style>
       </style>
    
    	<style type="text/css">
		*				{ font-family:tahoma; }
		h3				{ border-bottom:0; }
		
		#message		{ padding:7px 10px; float:left; width:350px; }
		#status		{ border:1px solid #999; padding:5px; width:500px; height:75px; margin:5px 0; }
		#statuses	{ width:512px; }
		#submit		{ cursor:pointer; padding:5px; border:1px solid #ccc; float:left; margin:0 20px 0 0; }
		
		.status-box	{ padding:10px 20px 10px 70px; height:48px; border-bottom:1px dotted #aaa; }
		.status-box:hover	{ background-color:#eee; }
		.success		{ color:#008000; }
		.failure		{ color:#f00; }
		.time			{ color:#2a447b; font-size:10px; }
		
	</style>
    <link rel="stylesheet" type="text/css" href="../Busqueda_Principal/scripts_datepicker/datepicker/Source/datepicker_vista/datepicker_vista.css"/>
        <script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"></script>
        <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"></script>
<script type="text/javascript" src="../Busqueda_Principal/scripts_datepicker/datepicker/Source/Locale.es-ES-DatePicker.js"></script>
<script type="text/javascript" src="../Busqueda_Principal/scripts_datepicker/datepicker/Source/Picker.js"></script>
<script type="text/javascript" src="../Busqueda_Principal/scripts_datepicker/datepicker/Source/Picker.Attach.js"></script>
<script type="text/javascript" src="../Busqueda_Principal/scripts_datepicker/datepicker/Source/Picker.Date.js"></script>
			<script src="LightFace/Source/LightFace.js"></script>
            <link rel="stylesheet" type="text/css" href="../Busqueda_Principal/LightFace/Assets/LightFace.css"/>
			<script src="LightFace/Source/LightFace.js"></script>
			<script src="LightFace/Source/LightFace.IFrame.js"></script>
			<script src="LightFace/Source/LightFace.Image.js"></script>
			<script src="LightFace/Source/LightFace.Request.js"></script>
        <script type="text/javascript">
		
		window.addEvent('domready', function()
		{
			$('actualizar').addEvent('click',update);
			$('fase_ios').addEvent('change',abre_ventana_enconstruccion);
				
//			Locale.use('es-ES');
//			new Date().format('db');
//			var fecha_programa_entrega_equip = new Picker.Date($$('#dt_Fecha_FIN_Equipamiento'), {
//				pickerClass: 'datepicker_vista',
//				//timePicker: true,format: '%Y-%m-%d %H:%M:%S',
//				format: '%Y-%m-%d',
//				positionOffset: {x: 5, y: 0},
//				useFadeInOut: !Browser.ie,
//				minDate: '2013-01-01',
//			});
//			
//			var fecha_envio_construccion_PTA_A = new Picker.Date($$('#dt_fecha_envio_const_pta_a'), {
//				pickerClass: 'datepicker_vista',
//	//			timePicker: true,
//				format: '%Y-%m-%d',
//				positionOffset: {x: 5, y: 0},
//				useFadeInOut: !Browser.ie,
//				minDate: '2013-01-01'
//			});
//			var fecha_envio_construccion_PTA_B = new Picker.Date($$('#dt_fecha_envio_const_pta_b'), {
//				pickerClass: 'datepicker_vista',
//	//			timePicker: true,
//				format: '%Y-%m-%d',
//				positionOffset: {x: 5, y: 0},
//				useFadeInOut: !Browser.ie,
//				minDate: '2013-01-01'
//			});
		});
		
	function update(){
		var datos = $('form_update').toQueryString();
		var myHTMLRequest = new Request.HTML({
		url: 'update.php',
		onRequest : function (){
			//Si nos muestra el resultado correcto, pinta en pantalla
			$('resultado').set('html','');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('resultado').set('html',html);
			}	
		}).send({ 
			method:'get',
			data: datos
		});
	}
<!--funcion onclick construccion-->
	function abre_ventana_enconstruccion()
	{
	var referencia = '<?php echo $referencia; ?>';
	var ser_n= '<?php echo $ser_n; ?>';
	
	var id_fase_ios = ($('fase_ios').value*1);	
	if (id_fase_ios == 44)
	{
		
	light = new LightFace.IFrame
					(
		{
				height:350, 
				width:550,
				url: 'asignacion_filial.php?referencia='+referencia+"&ser_n="+ser_n,
				title: 'Detalle de Asignaci&oacute;n Filial' 
		}
					)
				.addButton('Cerrar', function() 
			{ 	light.close(); 
			}	,true).open();
		}
	}
	
		window.addEvent('domready', function() {
			
			//create the message slider
			var fx = new Fx.Slide('message', {
				mode: 'horizontal'
			}).hide();
			
			//make the ajax call to the database to save the update
			var request = new Request({
				//url: '<?php //echo $_SERVER['PHP_SELF']; ?>',
				url: 'insert_comentarios.php',
				
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
							'ser_n': '<?php echo $ser_n; ?>',
							'ajax': 1
						}
					});
					
				}
				
			});
			
		});
		
		
	function update_hiddens(fase,medio,documentado)
	{
		if (fase != '' && fase != $('Fase_IOS_hidden').value)
		{
			var datos = 'referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n; ?>';
			var myHTMLRequest = new Request.JSON({
			url: 'json_refresh_fecha_fase_ios.php',
			onRequest : function (){
				}	,
			
			onSuccess : function(responseJSON, responseText)	{
				var json = JSON.parse(responseText);
				$('Fecha_Fase_IOS').set('value',json.fecha_fase);
				$('Fase_IOS_hidden').value = fase;
				}	
			}).send({ 
				method:'get',
				data: datos
			});
		}
		if (medio != '' && medio != $('Medio_Acceso_hidden').value)
		{
			$('Medio_Acceso_hidden').value = medio;
		}
		if (documentado != '' && documentado != $('Documentado_hidden').value)
		{
			$('Documentado_hidden').value = documentado;
		}
	}
</script>       
  </head>
  <body style="margin: 0; padding: 0;">
  <form action="" method="get" name="form_update" id="form_update">
  <table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td><img src="images/telmex.jpg" width="158" height="89" alt="TELMEX" /></td>
    <td><img src="images/login.gif" width="585" height="35" alt="TELMEX" border="0" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><div id="referencia" style="float:center; width:750px; overflow:auto; background:#FFF url(images/page-background.jpg) repeat-x top left; min-height: 250px; max-height: 500px; margin-left: 5px; margin-right: 5px;margin-top: 0px; font-family:Verdana, Geneva, sans-serif; color: #666666; font-size:12px;" >

      <table width="750" border="0" align="left" class="Texto_Mediano_Gris" height="200">
      	<tr>
    <td>Referencia: </td>
    <td>
    	<b><font size=3><?php echo $referencia ?><input type="hidden" name="referencia" id="referencia" value="<?php echo $referencia; ?>" /><input type="hidden" name="ser_n" id="ser_n"value="<?php echo $ser_n; ?>" /></font> </b>
    </td>
  </tr>
  <tr>
    <td>Fase IOS: </td>
    <td><?php echo ImprimeCombo(1,$id_Fase_IOS);?><input type="hidden" name="Fase_IOS_hidden" id="Fase_IOS_hidden" value="<?php echo $id_Fase_IOS; ?>" /></td>
  </tr>
  <tr>
    <td>Medio de Acceso:</td>
    <td><?php echo ImprimeCombo(6,$id_Medio_Acceso);?><input type="hidden" name="Medio_Acceso_hidden" id="Medio_Acceso_hidden" value="<?php echo $id_Medio_Acceso; ?>" /></td>
  </tr>
  <tr>
    <td>Documentado:</td>
    <td><?php echo ImprimeCombo(2,$int_Documentado);?><input type="hidden" name="Documentado_hidden" id="Documentado_hidden" value="<?php echo $int_Documentado; ?>" /></td>
  </tr>
  <tr>
    <td>Fecha Fase IOS:</td>
    <td><input type="text" name="Fecha_Fase_IOS" id="Fecha_Fase_IOS" style="width: 150px" value="<?php echo $dt_Fecha_Fase_IOS; ?>" /></td>
     <td><input type="button" name="actualizar" id="actualizar" value="Registrar Actualizaci&oacute;n" /></td>

</table><div id="resultado" style="font-weight:bold;"></div>
    </div></td>
  </tr>
</table>
</form>

    <div style="height:384px; overflow:scroll; width:750px;">
    <fieldset>
    <div class="avances_referencia">
	</div>
    
    	<h3>Comentarios</h3>
	<form action="<?php //echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<textarea name="status" id="status"></textarea><br />
		<input type="button" value="Agregar Comentario" id="submit" />
		<div id="message"><?php echo $message; ?></div>
        <!--<input type="button" value="Refrescar" onclick="document.location.reload()" />-->
	</form>
	
		<div class="clear"></div>
	<p>&nbsp;</p>
	<h3>Comentarios recientes</h3>
	<div id="statuses">
		<?php
		
		if (isset($_GET['referencia']))
		{
			$meses = array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diiembre");
			//get the latest 20
			$query  = "SELECT tb_Avances_Referencia.txt_Avance_Referencia,DAY(tb_Avances_Referencia.dt_Fecha_Registro) as dia,MONTH(tb_Avances_Referencia.dt_Fecha_Registro) as mes, YEAR(tb_Avances_Referencia.dt_Fecha_Registro) as anio, DATE_FORMAT(tb_Avances_Referencia.dt_Fecha_Registro,' @ % %l:%i:%s %p') AS ds, CONCAT(cat_Usuarios.str_Nombre,' ',cat_Usuarios.str_Ap_Paterno,' ',cat_Usuarios.str_Ap_Materno) as Nombre_Usuario FROM tb_Avances_Referencia LEFT JOIN cat_Usuarios ON tb_Avances_Referencia.id_Usuario =  cat_Usuarios.id_Usuario WHERE tb_Avances_Referencia.referencia = '".$_GET['referencia']."'  AND tb_Avances_Referencia.ser_n = '".$ser_n."' ORDER BY dt_Fecha_Registro DESC";
			$RS_avances= TraeRecordset($query);
			if (!$RS_avances) die('Error en DB2!');
			$cuantas_filas = $RS_avances->RecordCount();
			if ($cuantas_filas > 0)
			{
				while(!$RS_avances->EOF)
				{
					echo '<div class="status-box">',stripslashes($RS_avances->fields(0)),'<br /><span class="time">'.ucwords(strtolower($RS_avances->fields(5))).' - '.$RS_avances->fields(1).' de '.$meses[$RS_avances->fields(2)].' de '.$RS_avances->fields(3).$RS_avances->fields(4).'</span></div>';
					$RS_avances->MoveNext();
				}
			} else {
				echo '<br /><b>No hay comentarios...</b>';	
			}
		} else {
			echo '<br /><b>Error: No hay referecia especificada!!</b>';	
			
		}
		?>
	</div>
</fieldset>
    </div>









<!--      <table width="750" border="0" align="left" class="Texto_Mediano_Gris" height="200">
      	<tr align="right">
        	<td>       
			
            </td>
            <td>
        	 
            </td>
        </tr>
      	<tr align="right">
            <td>
        	
            </td>
            <td>
    		 
            </td>
        </tr>
      	<tr align="right">
            <td>
    		 
            </td>
            <td>
    		MOTIVO PPU: <?php //echo ImprimeCombo(3,$id_Motivo_PPU);?>
            </td>
        </tr>
      	<tr align="right">
            <td>
    		FECHA PROG. ENTREGA EQUIP.: <input type="text" name="dt_Fecha_FIN_Equipamiento" id="dt_Fecha_FIN_Equipamiento" style="width: 150px" value="<?php //echo $dt_Fecha_FIN_Equipamiento; ?>"  />
            </td>
            <td>
    		EMPRESA FILIAL PTA A: <?php //echo ImprimeCombo(7,$id_empresa_filial_pta_A);?>
            </td>
        </tr>
      	<tr align="right">
            <td>
    		FECHA ENVIO CONS. PTA A: <input type="text" name="dt_fecha_envio_const_pta_a" id="dt_fecha_envio_const_pta_a" style="width: 150px" value="<?php //echo $dt_fecha_envio_const_pta_a; ?>" />
            </td>
            <td>
    		EMPRESA FILIAL PTA B: <?php //echo ImprimeCombo(8,$id_empresa_fiial_pta_B);?>
            </td>
        </tr>
      	<tr align="right">
            <td>
    		FECHA ENVIO CONS. PTA B: <input type="text" name="dt_fecha_envio_const_pta_b" id="dt_fecha_envio_const_pta_b" style="width: 150px" value="<?php //echo $dt_fecha_envio_const_pta_b; ?>" />
            </td>
            <td>
    		OT DE ETREGA: <?php //echo ImprimeCombo(4,$int_CON_OT);?>
            </td>
        </tr>
      	<tr align="right">
            <td>
    		PROY_COMPLETO: <?php //echo ImprimeCombo(5,$id_Proyecto_Completo);?>
            </td>
            <td>&nbsp;</td>
        </tr>
      	<tr align="right">
            <td>&nbsp;</td>
            <td>
      <input type="submit" name="actualizar" id="actualizar" value="Registrar Actualizaci&oacute;n" />

</table><div id="resultado"></div>
    </div></td>
  </tr>
</table>
-->    
  </body>
</html>