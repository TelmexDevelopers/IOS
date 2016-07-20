<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
	
	session_start();
	include('../../adodb/adodb.inc.php');
	include('../../includes/connection.php');
	include('libreria_equipamiento.php');
	require("../includes/funciones.php");
	$CheckSession = CheckSession();
	
	$referencia_ok = $_GET['referencia'];
	$ser_n_ok = $_GET['ser_n'];
	$dt_fecha_fase_IOS = $_GET['dt_fecha_fase_IOS'];

$SQL = "SELECT referencia, ser_n, id_Fase_IOS, id_Medio_Transmision, dt_fecha_fase_IOS, id_supervisor, id_tecnico_eq, id_edo_proyecto, dt_fecha_proyecto, id_estado_fo, dt_fecha_fo, id_Filial, id_edo_construccion, dt_fecha_provedor, dt_fecha_meta, dt_fecha_term_const, dt_fecha_programa_equip, referencia_base, dt_fecha_real_term, id_atraso, obs_retraso, dt_fecha_prog FROM tb_equipamiento WHERE referencia = '".$referencia_ok."' and ser_n = '".$ser_n_ok."'";
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros =	 $RS->RecordCount();

	$referencia= $RS->fields(0);
	//$ser_n_ok= $RS->fields(1);
	$id_Fase_IOS= $RS->fields(2);
	$id_Medio_Transmision= $RS->fields(3);
	$dt_fecha_fase_IOS= $RS->fields(4);
	$id_supervisor= $RS->fields(5);
	$id_tecnico_eq= $RS->fields(6);
	$id_edo_proyecto= $RS->fields(7);
	$dt_fecha_proyecto= $RS->fields(8);
	$estado_fo= $RS->fields(9);
	$dt_fecha_fo= $RS->fields(10);
	$id_Filial= $RS->fields(11);
	$id_edo_construccion= $RS->fields(12);
	$dt_fecha_provedor= $RS->fields(13);
	$dt_fecha_meta= $RS->fields(14);
	$dt_fecha_term_const= $RS->fields(15);
	$dt_fecha_programa_equip= $RS->fields(16);
	$referencia_base= $RS->fields(17);
	$dt_fecha_real_term= $RS->fields(18);
	$id_atraso= $RS->fields(19);
	$obs_retraso= $RS->fields(20);
	$dt_fecha_prog= $RS->fields(21);
	
$SQL_2 = "SELECT referencia, ser_n, id_Fase_IOS, dt_fecha_fase_IOS FROM tb_ios WHERE referencia = '".$referencia_ok."' and ser_n = '".$ser_n_ok."'";

	//echo $SQL;
	$RS_2 = TraeRecordset($SQL_2);
	if (!$RS_2) die('Error en DB!');
	
	//$num_registros =	 $RS_2->RecordCount();

	$referencia= $RS_2->fields(0);
	$Fase_IOS_Equipa= $RS_2->fields(2);
	$dt_fecha_fase_IOS_Equipa= $RS_2->fields(3);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>TELMEX - IOS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
    <style type="text/css">
    .combos_referencia
	{
		width: 200px;
		font-family:Verdana, Geneva, sans-serif;
		color:#666;
		font-size:12px;
			
	}
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
<script type="text/javascript" src="../../scripts/mootools-core-1.4.5-full-compat.js"></script>
<script type="text/javascript" src="../../scripts/mootools-more-1.4.0.1.js"></script>
<script type="text/javascript" src="scripts_datepicker/datepicker/Source/Locale.es-ES-DatePicker.js"></script>
<script type="text/javascript" src="scripts_datepicker/datepicker/Source/Picker.js"></script>
<script type="text/javascript" src="scripts_datepicker/datepicker/Source/Picker.Attach.js"></script>
<script type="text/javascript" src="scripts_datepicker/datepicker/Source/Picker.Date.js"></script>
<link rel="stylesheet" type="text/css" href="scripts_datepicker/datepicker/Source/datepicker_vista/datepicker_vista.css"/>
</script>
<script type="text/javascript">
		
      		window.addEvent('domready', function() {		
			Locale.use('es-ES');
			new Date().format('db');
			var fecha_proyecto = new Picker.Date($$('#dt_fecha_proyecto'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
	
			var fecha_fo = new Picker.Date($$('#dt_fecha_fo'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			
			var fecha_provedor = new Picker.Date($$('#dt_fecha_provedor'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			
			var fecha_meta = new Picker.Date($$('#dt_fecha_meta'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			
			var fecha_termino_construccion = new Picker.Date($$('#dt_fecha_term_const'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			
			var fecha_real_termino= new Picker.Date($$('#dt_fecha_real_term'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			
			var programa_equipa= new Picker.Date($$('#dt_fecha_programa_equip'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var fecha_programada= new Picker.Date($$('#dt_fecha_prog'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});			
})

	    window.addEvent('domready', function() {
		$('actualizar').addEvent('click',update_fase_equip)
		//$('actualizar').addEvent('click',Fase_IOS_Equipa)
    });

function update_fase_equip(){
	
	//var datos_referencia = 'EQUIPAMIENTO_update.php?referencia=<?php //echo $referencia_ok; ?>&ser_n=<?php //echo $ser_n_ok; ?>';
	//alert (datos_referencia);

		var referencia= '<?php echo $referencia_ok; ?>';
		var ser_n = '<?php echo $ser_n_ok; ?>';
	
		
		var id_Fase_IOS = $('id_Fase_IOS').value;
		var Fase_IOS_Equipa_hidden = $('Fase_IOS_Equipa_hidden').value;
		var Fase_IOS_Equipa = $('Fase_IOS_Equipa').value;
		var Subfase_IOS_Equipa_hidden = $('Subfase_IOS_Equipa_hidden').value;


		var id_Medio_Transmision = $('medio_transmision').value;
		var dt_fecha_fase_IOS_Equipa = $('dt_fecha_fase_IOS_Equipa').value;
		var dt_fecha_fase_IOS = $('dt_fecha_fase_IOS').value;
		var id_supervisor = $('supervisor').value;
		var id_tecnico_eq = $('ipe').value;
		var id_edo_proyecto = $('edo_proyecto').value;
		var dt_fecha_proyecto = $('dt_fecha_proyecto').value;
		var estado_fo = $('estado_fo').value;
		var dt_fecha_fo = $('dt_fecha_fo').value;
		var id_Filial = $('filial').value;
		var id_edo_construccion = $('edo_construccion').value;
		var dt_fecha_provedor = $('dt_fecha_provedor').value;
		var dt_fecha_meta = $('dt_fecha_meta').value;
		var dt_fecha_term_const = $('dt_fecha_term_const').value;
		var dt_fecha_programa_equip = $('dt_fecha_programa_equip').value;
		var referencia_base = $('referencia_base').value;
		var dt_fecha_real_term = $('dt_fecha_real_term').value;
		var dt_fecha_prog = $('dt_fecha_prog').value;
		var id_atraso = $('id_atraso').value;
		var obs_retraso = $('obs_retraso').value;
		
		//var id_Fase_IOS = $('id_Fase_IOS').value;


		var datos = "referencia="+referencia+"&ser_n="+ser_n
		
		+"&id_Fase_IOS="+id_Fase_IOS
		+"&Fase_IOS_Equipa_hidden="+Fase_IOS_Equipa_hidden
		+"&Fase_IOS_Equipa="+Fase_IOS_Equipa
		+"&Subfase_IOS_Equipa_hidden="+Subfase_IOS_Equipa_hidden
		
		+"&id_Medio_Transmision="+id_Medio_Transmision
		
		+"&dt_fecha_fase_IOS_Equipa="+dt_fecha_fase_IOS_Equipa
		+"&dt_fecha_fase_IOS="+dt_fecha_fase_IOS
		
		+"&id_supervisor="+id_supervisor
		+"&id_tecnico_eq="+id_tecnico_eq
		+"&id_edo_proyecto="+id_edo_proyecto
		+"&dt_fecha_proyecto="+dt_fecha_proyecto
		+"&estado_fo="+estado_fo
		+"&dt_fecha_fo="+dt_fecha_fo
		+"&id_Filial="+id_Filial
		+"&id_edo_construccion="+id_edo_construccion
		+"&dt_fecha_provedor="+dt_fecha_provedor
		+"&dt_fecha_meta="+dt_fecha_meta
		+"&dt_fecha_term_const="+dt_fecha_term_const
		+"&dt_fecha_programa_equip="+dt_fecha_programa_equip
		+"&referencia_base="+referencia_base
		+"&dt_fecha_real_term="+dt_fecha_real_term
		+"&dt_fecha_prog="+dt_fecha_prog
		+"&id_atraso="+id_atraso
		+"&obs_retraso="+obs_retraso;
		

	//alert (datos);

		var myHTMLRequest = new Request.HTML({
		url: 'EQUIPAMIENTO_update.php',
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
							'referencia': '<?php echo $referencia_ok; ?>',
							'ser_n': '<?php echo $ser_n_ok; ?>',
							'ajax': 1
						}
					});
					
				}
				
			});
			
		});
		
function update_hiddens_equipa(id_Fase_IOS,Fase_IOS_Equipa)
{
	if (Fase_IOS_Equipa != '' && $('Fase_IOS_Equipa_hidden').value != Fase_IOS_Equipa)
	{
		$('Fase_IOS_Equipa_hidden').value = Fase_IOS_Equipa;
	}
	if (id_Fase_IOS != '' && $('Subfase_IOS_Equipa_hidden').value != id_Fase_IOS)
	{
		$('Subfase_IOS_Equipa_hidden').value = id_Fase_IOS;
	}
			var datos = 'referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n_ok; ?>';
			var myHTMLRequest = new Request.JSON({
			url: 'json_refresh_fecha_fase_ios_Equipa.php',
			onRequest : function (){
				}	,
			
			onSuccess : function(responseJSON, responseText)	{
				var json = JSON.parse(responseText);
			
			//alert ('hola');
				$('dt_fecha_fase_IOS').set('value',json.dt_fecha_fase_IOS);
				$('dt_fecha_fase_IOS_Equipa').set('value',json.dt_fecha_fase_IOS_Equipa);
			}	
		}).send({ 
			method:'get',
			data: datos
		});
		
	}

		
</script>       
</head>
  <body style="margin: 0; padding: 0;">
  <table border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td><img src="images/telmex.jpg" width="158" height="89" alt="TELMEX" /></td>
    <td><img src="images/login.gif" width="645" height="35" alt="TELMEX" border="0" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <div id="referencia" style="float:center; width:800px; overflow:auto; background:#FFF url(images/page-background.jpg) repeat-x top left; min-height: 350px; margin-left: 5px; margin-right: 5px;margin-top: 0px; font-family:Verdana, Geneva, sans-serif; color: #666666; font-size:12px;" >
      
      <table width="800" border="0" align="left" class="Texto_Mediano_Gris" height="250">
  <tr>
    <td>Referencia:</td>
    <td><b><?php echo $referencia_ok ?></b></td>
    <td><input type="hidden" name="ser_n_ok" id="ser_n_ok" value="<?php echo $ser_n_ok; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Fase IOS Equipamiento:</td>
    <td><?php echo ImprimeCombo(1,$Fase_IOS_Equipa); ?><input type="hidden" name="Fase_IOS_Equipa_hidden" id="Fase_IOS_Equipa_hidden" value="<?php echo $Fase_IOS_Equipa; ?>" /></td>
    <td>Fecha Fase IOS:</td>
    <td><input type="text" name="dt_fecha_fase_IOS_Equipa" id="dt_fecha_fase_IOS_Equipa" style="width: 200px" value="<?php echo htmlentities ($dt_fecha_fase_IOS_Equipa); ?>" /></td>
  </tr>
  <tr>
    <td>Subfases IOS Equipamiento:</td>
    <td><?php echo ImprimeCombo(10,$id_Fase_IOS);?><input type="hidden" name="Subfase_IOS_Equipa_hidden" id="Subfase_IOS_Equipa_hidden" value="<?php echo $id_Fase_IOS; ?>" /></td>
    <td>Fecha Subfase Equipa.:</td>
    <td><input type="text" name="dt_fecha_fase_IOS" id="dt_fecha_fase_IOS" style="width: 200px" value="<?php echo htmlentities ($dt_fecha_fase_IOS); ?>" /></td>
  </tr>
  <tr>
    <td>Medio de Acceso:</td>
    <td><?php echo ImprimeCombo(2,$id_Medio_Transmision);?></td>
    <td>Estado Construcci&oacute;n:</td>
    <td><?php echo ImprimeCombo(7,$id_edo_construccion);?></td>
  </tr>
  <tr>
    <td>Supervisor:</td>
    <td><?php echo ImprimeCombo(3,$id_supervisor);?></td>
    <td>Fecha Meta:</td>
    <td><input type="text" name="dt_fecha_meta" id="dt_fecha_meta" style="width: 200px" value="<?php echo $dt_fecha_meta; ?>" /></td>
  </tr>
  <tr>
    <td>Tecnico Equipamiento:</td>
    <td><?php echo ImprimeCombo(8,$id_tecnico_eq);?></td>
    <td>Fecha Termino Construcci&oacute;n:</td>
    <td><input type="text" name="dt_fecha_term_const" id="dt_fecha_term_const" style="width: 200px" value="<?php echo $dt_fecha_term_const; ?>" /></td>
  </tr>
  <tr>
    <td>Estado Proyecto:</td>
    <td><?php echo ImprimeCombo(4,$id_edo_proyecto);?></td>
    <td>Programa Equipamiento:</td>
    <td><input type="text" name="dt_fecha_programa_equip" id="dt_fecha_programa_equip" style="width: 200px" value="<?php echo $dt_fecha_programa_equip; ?>" /></td>
  </tr>
  <tr>
    <td>Fecha Proyecto:</td>
    <td><input type="text" name="dt_fecha_proyecto" id="dt_fecha_proyecto" style="width: 200px" value="<?php echo $dt_fecha_proyecto; ?>" /></td>
    <td>Referencia Base:</td>
    <td><input type="text" name="referencia_base" id="referencia_base" style="width: 200px" value="<?php echo $referencia_base; ?>" /></td>
  </tr>
  <tr>
    <td>Estado FO:</td>
    <td><?php echo ImprimeCombo(5,$estado_fo);?></td>
    <td>Fecha Real de Termino:</td>
    <td><input type="text" name="dt_fecha_real_term" id="dt_fecha_real_term" style="width: 200px" value="<?php echo $dt_fecha_real_term; ?>" /></td>
  </tr>
  <tr>
    <td>Fecha FO:</td>
    <td><input type="text" name="dt_fecha_fo" id="dt_fecha_fo" style="width: 200px" value="<?php echo $dt_fecha_fo; ?>" /></td>
    <td>Motivo de Retraso:</td>
    <td><?php echo ImprimeCombo(9,$id_atraso);?></td>
  </tr>
  <tr>
    <td>Provedor:</td>
    <td><?php echo ImprimeCombo(6,$id_Filial);?></td>
    <td>Observaciones de Retraso:</td>
    <td><input type="text" name="obs_retraso" id="obs_retraso" style="width: 200px" value="<?php echo $obs_retraso; ?>" /></td>
  </tr>
  <tr>
    <td>Fecha Provedor:</td>
    <td><input type="text" name="dt_fecha_provedor" id="dt_fecha_provedor" style="width: 200px" value="<?php echo $dt_fecha_provedor; ?>" /></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
    <tr>
    <td>Fecha Programada:</td>
    <td><input type="text" name="dt_fecha_prog" id="dt_fecha_prog" style="width: 200px" value="<?php echo $dt_fecha_prog; ?>" /></td>
    <td>&nbsp;</td>
    <td align="center"><input type="button" name="actualizar" id="actualizar" value="Registrar Actualizaci&oacute;n" /></td>
  </tr>

  <tr>
    <td colspan="4"><div id="resultado" style="height:25px; text-align:center; font-weight:bold;"></div></td>
  </tr>
</table>
    </div>
    </td>
  </tr>
</table>

<br /><br />
    <div style="height:384px; overflow:scroll; width:750px;">
    <fieldset>
    <div class="avances_referencia">
	</div>
    
    	<h3>Comentarios</h3>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
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
			$query  = "SELECT tb_Avances_Referencia.txt_Avance_Referencia,DAY(tb_Avances_Referencia.dt_Fecha_Registro) as dia,MONTH(tb_Avances_Referencia.dt_Fecha_Registro) as mes, YEAR(tb_Avances_Referencia.dt_Fecha_Registro) as anio, DATE_FORMAT(tb_Avances_Referencia.dt_Fecha_Registro,' @ % %l:%i:%s %p') AS ds, CONCAT(cat_Usuarios.str_Nombre,' ',cat_Usuarios.str_Ap_Paterno,' ',cat_Usuarios.str_Ap_Materno) as Nombre_Usuario FROM tb_Avances_Referencia LEFT JOIN cat_Usuarios ON tb_Avances_Referencia.id_Usuario =  cat_Usuarios.id_Usuario WHERE tb_Avances_Referencia.referencia = '".$_GET['referencia']."'  AND tb_Avances_Referencia.ser_n = '".$ser_n_ok."' ORDER BY dt_Fecha_Registro DESC";
		//echo $query;
			
			 // LIMIT 20
//			$result = mysql_query($query,$link) or die(mysql_error().': '.$query);
//			$cuantas_filas = mysql_num_rows($result);
			
			
			$RS_avances= TraeRecordset($query);
			if (!$RS_avances) die('Error en DB!');
			$cuantas_filas = $RS_avances->RecordCount();
			if ($cuantas_filas > 0)
			{
				//while($row = mysql_fetch_assoc($result))
				while(!$RS_avances->EOF)
				{
					//echo '<div class="status-box">',stripslashes($row['txt_Avance_Referencia']),'<br /><span class="time">'.ucwords(strtolower($row['Nombre_Usuario'])).' - '.$row['dia'].' de '.$meses[$row['mes']].' de '.$row['anio'].$row['ds'].'</span></div>';
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

</body>
</html>
