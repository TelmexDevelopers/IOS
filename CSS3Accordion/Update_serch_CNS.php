<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');
include('CNS_LIBRERIA.php');

$referencia = $_GET['referencia'];
$ser_n = $_GET['ser_n'];
$id_Fase_IOS = $_GET['id_Fase_IOS'];
$id_Fase_IOS_cns = $_GET['id_Fase_IOS_cns'];
$dt_Fecha_Fase_IOS = $_GET['dt_Fecha_Fase_IOS'];

$SQL = "SELECT a.id_CNS_update, a.ser_n, a.id_Fase_IOS, a.id_ipe_eth, a.str_referencia_hub, a.id_tipo_hub, a.bol_PBA_TRASPASO_A_C, a.bol_PBA_TRASPASO_C_TX, a.bol_config_eth, a.dt_FECHA_LIQ_CNA, a.dt_FECHA_ING_CNA, a.dt_fec_fase_IOS, a.dt_FECHA_PRO_RES, a.str_FECHA_PROG, a.str_NOM_SOLICITANTE, b.dt_Fecha_Fase_IOS FROM tb_cns a LEFT JOIN tb_IOS b ON a.referencia = b.referencia AND a.ser_n = b.ser_n WHERE a.referencia = '".$referencia."' AND a.ser_n = '".$ser_n."' ";
//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	if ($num_registros > 0)
	{
		$id_CNS_update= $RS->fields(0);
		//$ser_n= $RS->fields(1);
		$id_Fase_IOS_cns= $RS->fields(2);
		$id_usuario= $RS->fields(3);
		$str_referencia_hub= $RS->fields(4);
		$id_tipo_hub= $RS->fields(5);
		$bol_PBA_TRASPASO_A_C= $RS->fields(6);
		$bol_PBA_TRASPASO_C_TX= $RS->fields(7);
		$bol_config_eth= $RS->fields(8);
		$dt_FECHA_LIQ_CNA= $RS->fields(9);
		$dt_FECHA_ING_CNA= $RS->fields(10);
		$dt_FECHA_FASE_IOS= $RS->fields(11);
		$dt_FECHA_PRO_RES= $RS->fields(12);
		$str_FECHA_PROG= $RS->fields(13);
		$str_NOM_SOLICITANTE= $RS->fields(14);
		$dt_Fecha_Fase_IOS_G= $RS->fields(15);
	}
//	echo $bol_PBA_TRASPASO_A_C."<br />".$bol_PBA_TRASPASO_C_TX."<br />".$str_config_eth."<br />";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>TELMEX - MODULO "CNS"</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    .combos_referencia
	{
		width: 153px;
	}
	
	.Texto_Gris {
		font-family:Verdana, Geneva, sans-serif;
		font-size: 12px;
		font-weight:bold;
		text-align:center;
		color: #666666;
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
<link rel="stylesheet" type="text/css" href="scripts_datepicker/datepicker/Source/datepicker_vista/datepicker_vista.css"/>
<script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"></script>
<script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"></script>
<script type="text/javascript" src="scripts_datepicker/datepicker/Source/Locale.es-ES-DatePicker.js"></script>
<script type="text/javascript" src="scripts_datepicker/datepicker/Source/Picker.js"></script>
<script type="text/javascript" src="scripts_datepicker/datepicker/Source/Picker.Attach.js"></script>
<script type="text/javascript" src="scripts_datepicker/datepicker/Source/Picker.Date.js"></script>
<!--<script src="LightFace/Source/LightFace.js"></script>
<script src="LightFace/Source/LightFace.js"></script>
<script src="LightFace/Source/LightFace.IFrame.js"></script>
<script src="LightFace/Source/LightFace.Image.js"></script>
<script src="LightFace/Source/LightFace.Request.js"></script>
<link rel="stylesheet" href="LightFace/Assets/lightface.css" />
-->           
<script type="text/javascript">
	/******************************************************************************************/
	window.addEvent('domready', function() {	
		$('actualizar').addEvent('click',update_cns);
			Locale.use('es-ES');
			new Date().format('db');
			
	<?php if ($dt_FECHA_LIQ_CNA == "") {?>		
		var FECHA_LIQUIDADA = new Picker.Date($$('#dt_FECHA_LIQ_CNA'), {
			pickerClass: 'datepicker_vista',
			//timePicker: true,format: '%Y-%m-%d %H:%M:%S',
			format: '%Y-%m-%d',
			positionOffset: {x: 5, y: 0},
			useFadeInOut: !Browser.ie,
			minDate: '2013-01-01',
		});
	<?php } else {?>
		$('dt_FECHA_LIQ_CNA').disabled = true;
	<?php }?>
	<?php if ($dt_FECHA_ING_CNA == "") {?>		
			var FECHA_INGENIERIA = new Picker.Date($$('#dt_FECHA_ING_CNA'), {
			pickerClass: 'datepicker_vista',
//			timePicker: true,
			format: '%Y-%m-%d',
			positionOffset: {x: 5, y: 0},
			useFadeInOut: !Browser.ie,
			minDate: '2013-01-01'
		});
	<?php } else {?>
		$('dt_FECHA_ING_CNA').disabled = true;
	<?php } ?>
	<?php if ($dt_FECHA_PRO_RES == "") {?>		
		var Fecha_Pro_RES = new Picker.Date($$('#dt_FECHA_PRO_RES'), {
			pickerClass: 'datepicker_vista',
			//timePicker: true,format: '%Y-%m-%d ',
			format: '%Y-%m-%d',
			positionOffset: {x: 5, y: 0},
			useFadeInOut: !Browser.ie,
			minDate: '2013-01-01',
		});
	<?php } else {?>
		$('dt_FECHA_PRO_RES').disabled = true;
	<?php } ?>
	<?php if ($str_FECHA_PROG == "") {?>		
		var FECHA_PROG = new Picker.Date($$('#str_FECHA_PROG'), {
			pickerClass: 'datepicker_vista',
			//timePicker: true,format: '%Y-%m-%d ',
			format: '%Y-%m-%d',
			positionOffset: {x: 5, y: 0},
			useFadeInOut: !Browser.ie,
			minDate: '2013-01-01',
		});
	<?php } else {?>
		$('str_FECHA_PROG').disabled = true;
	<?php } ?>
	<?php if ($bol_PBA_TRASPASO_A_C == 1){ ?>
		$('PBA_TRASPASO_A_C').checked = true;
	<?php } ?>
	<?php if ($bol_PBA_TRASPASO_C_TX == 1){ ?>
		$('PBA_TRASPASO_A_TX').checked = true;
	<?php } ?>
	<?php if ($bol_config_eth == 1){ ?>
		$('config_eth').checked = true;
	<?php } ?>
});

function update_cns(e)
{
	var referencia = '<?php echo $referencia; ?>';
	var ser_n = '<?php echo $ser_n; ?>';
	
	var id_Fase_IOS = $('fase_ios').value;
	var id_Fase_IOS_cns = $('fase_ios_cns').value;
	var fase_ios_hidden = $('fase_ios_hidden').value;
	var fase_ios_cns_hidden = $('fase_ios_cns_hidden').value;
	
	var dt_Fecha_Fase_IOS_G = $('dt_Fecha_Fase_IOS_G').value;
	var dt_FECHA_FASE_IOS = $('dt_FECHA_FASE_IOS').value;
	
	var id_ipe_eth = $('nombre_ipe').value;
	var	str_referencia_hub = $('str_referencia_hub').value;
	var	id_tipo_hub = $('tipo_hub').value;
		if ($('PBA_TRASPASO_A_C').checked == true)
		{
			var	bol_PBA_TRASPASO_A_C = 1;
		} else {
			var	bol_PBA_TRASPASO_A_C = 0;
		}
		if ($('PBA_TRASPASO_A_TX').checked == true)
		{
			var	bol_PBA_TRASPASO_C_TX = 1;
		} else {
			var	bol_PBA_TRASPASO_C_TX = 0;
		}
		if ($('config_eth').checked == true)
		{
			var	bol_config_eth = 1;
		} else {
			var	bol_config_eth = 0;
		}
		
	var	dt_FECHA_LIQ_CNA = $('dt_FECHA_LIQ_CNA').value;
	var	dt_FECHA_ING_CNA = $('dt_FECHA_ING_CNA').value;
	var	dt_FECHA_FASE_IOS = $ ('dt_FECHA_FASE_IOS').value;
	var	dt_FECHA_PRO_RES = $('dt_FECHA_PRO_RES').value;
	var	str_FECHA_PROG = $('str_FECHA_PROG').value;
	var	str_NOM_SOLICITANTE = $('str_NOM_SOLICITANTE').value;
	var datos = "referencia="+referencia+"&ser_n="+ser_n
	
	+"&id_Fase_IOS="+id_Fase_IOS
	+"&id_Fase_IOS_cns="+id_Fase_IOS_cns
	+"&fase_ios_hidden="+fase_ios_hidden
	+"&fase_ios_cns_hidden="+fase_ios_cns_hidden
	
	+"&dt_Fecha_Fase_IOS_G="+dt_Fecha_Fase_IOS_G
	+"&dt_FECHA_FASE_IOS="+dt_FECHA_FASE_IOS

	+"&id_ipe_eth="+id_ipe_eth
	+"&str_referencia_hub="+str_referencia_hub
	+"&id_tipo_hub="+id_tipo_hub
	+"&bol_PBA_TRASPASO_A_C="+bol_PBA_TRASPASO_A_C
	+"&bol_PBA_TRASPASO_C_TX="+bol_PBA_TRASPASO_C_TX
	+"&bol_config_eth="+bol_config_eth
	+"&dt_FECHA_LIQ_CNA="+dt_FECHA_LIQ_CNA
	+"&dt_FECHA_ING_CNA="+dt_FECHA_ING_CNA
	+"&dt_FECHA_FASE_IOS="+dt_FECHA_FASE_IOS
	+"&dt_FECHA_PRO_RES="+dt_FECHA_PRO_RES
	+"&str_FECHA_PROG="+str_FECHA_PROG
	+"&str_NOM_SOLICITANTE="+str_NOM_SOLICITANTE;
//	alert (datos);

		var myHTMLRequest = new Request.HTML({
		url: 'CNS_update.php',
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
							'referencia': '<?php echo $referencia; ?>',
							'ser_n': '<?php echo $ser_n; ?>',
							'ajax': 1
						}
					});
				}
			});
		});
function update_hiddens(fase_cns,fase_ios)
{
	//alert("update_hiddens");
	if (fase_cns != '' && $('fase_ios_cns_hidden').value != fase_cns)
	{
		$('fase_ios_cns_hidden').value = fase_cns;
	}
	if (fase_ios != '' && $('fase_ios_hidden').value != fase_ios)
	{
		$('fase_ios_hidden').value = fase_ios;
	}
		var datos = 'referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n; ?>';
		var myHTMLRequest = new Request.JSON({
		url: 'json_refresh_CNS.php',
		onRequest : function (){
			//$('resultado').set('html','Cargando..');
			}	,
		
		onSuccess : function(responseJSON, responseText)	{
			var json = JSON.parse(responseText);
						
			$('dt_FECHA_FASE_IOS').set('value',json.Fecha_Fase_IOS_CNS);
			$('dt_Fecha_Fase_IOS_G').set('value',json.Fecha_Fase_IOS_G);
			}	
		}).send({ 
			method:'get',
			data: datos
		});
		
}
</script>       
  </head>
  <body style="margin: 0; padding: 0;">
  <table width="767" height="350" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td width="167"><img src="images/telmex.jpg" width="158" height="89" alt="TELMEX" /></td>
    <td width="600"><img src="images/login.gif" width="585" height="35" alt="TELMEX" border="0" /></td>
  </tr>
  <tr>
    <td height="312" colspan="2" align="center"><div id="referencia" style="float:center; width:750px; overflow:auto; background:#FFF url(images/page-background.jpg) repeat-x top left; min-height: 250px; max-height: 500px; margin-left: 5px; margin-right: 5px;margin-top: 0px; font-family:Verdana, Geneva, sans-serif; color: #666666; font-size:12px;" >
      
      <table width="750" border="0" align="left" class="Texto_Mediano_Gris" height="200">
      	<tr>
    <td>Referencia:</td>
    <td><b><?php echo $referencia;  ?> </b></td>
    <td>&nbsp;<input type="hidden" id="ser_n" name="ser_n" value="<?php  echo $ser_n;  ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Fase IOS:</td>
    <td><?php echo ImprimeCombo(1,$id_Fase_IOS);?><input name="fase_ios_hidden" id="fase_ios_hidden" type="hidden" value="<?php echo $id_Fase_IOS; ?>" />
      <td>Fecha Fase IOS:</td>
    <td><input type="text" name="dt_Fecha_Fase_IOS_G" id="dt_Fecha_Fase_IOS_G" style="width: 150px" value="<?php echo $dt_Fecha_Fase_IOS_G; ?>" />
    </td>
  </tr>
  <tr>
    <td>Fase IOS CNS:</td>
    <td><?php echo ImprimeCombo(3,$id_Fase_IOS_cns); ?><input name="fase_ios_cns_hidden" id="fase_ios_cns_hidden" type="hidden" value="<?php echo $id_Fase_IOS_cns; ?>" />
    </td>
    <td>Fecha Fase IOS CNS:</td>
    <td><input type="text" name="dt_FECHA_FASE_IOS" id="dt_FECHA_FASE_IOS" style="width: 150px" value="<?php echo $dt_FECHA_FASE_IOS; ?>" />
    </td>
  </tr>
  <tr>
    <td>IPE Ethernet:</td>
    <td><?php echo ImprimeCombo(2,$id_usuario);?>
    </td>
    <td>Fecha Liquidada CNA:</td>
    <td><input type="text" name="dt_FECHA_LIQ_CNA" id="dt_FECHA_LIQ_CNA" style="width:150px" value="<?php echo $dt_FECHA_LIQ_CNA; ?>" />
    </td>
  </tr>
  <tr>
    <td>Referencia Hub:</td>
    <td><input type="text" name="str_referencia_hub" id="str_referencia_hub" style="width: 150px" value="<?php echo $str_referencia_hub; ?>" />
    </td>
    <td>Fecha Ing CNA:</td>
    <td><input type="text" name="dt_FECHA_ING_CNA" id="dt_FECHA_ING_CNA" style="width: 150px" value="<?php echo $dt_FECHA_ING_CNA; ?>" />
    </td>
  </tr>
  <tr>
    <td>Tipo Hub:</td>
    <td><?php echo ImprimeCombo(4,$id_tipo_hub);?>
    </td>
    <td>Fecha PRO RES:</td>
    <td><input type="text" name="dt_FECHA_PRO_RES" id="dt_FECHA_PRO_RES" style="width: 150px"  value="<?php echo $dt_FECHA_PRO_RES; ?>"  />
    </td>
  </tr>
  <tr>
    <td>PBA_TRASPASO(A-C):    </td>
    <td><input type="checkbox" name="PBA_TRASPASO_A_C" value="1" id="PBA_TRASPASO_A_C" />Exitoso 
    </td>
    <td>Fecha Programada:</td>
    <td><input  type="text" name="str_FECHA_PROG" id="str_FECHA_PROG" style="width: 150px" value="<?php echo $str_FECHA_PROG; ?>" />
    </td>
  </tr>
  <tr>
    <td>PBA_TRASPASO(C-TX):</td>
    <td><input type="checkbox" name="PBA_TRASPASO_A_TX" value="1" id="PBA_TRASPASO_A_TX" />Exitoso
    </td>
    <td>Nombre Solicitante:</td>
    <td><input type="text" name="str_NOM_SOLICITANTE" id="str_NOM_SOLICITANTE" style="width: 150px" value="<?php echo $str_NOM_SOLICITANTE; ?>" />
    </td>
  </tr>
  <tr>
    <td>Configuraci&oacute;n Ethernet:</td>
    <td><input type="checkbox" name="config_eth" value="1" id="config_eth" />Configurado</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td colspan="3"><div id="resultado" class="Texto_Gris"></div></td>
    <td><input type="submit" name="actualizar" id="actualizar" value="Registrar Actualizaci&oacute;n" />
    </td>
  </tr>
</table>
    </div></td>
  </tr>
</table>
    <div style="height:384px; overflow:scroll; width:750px;">
    <fieldset>
    <div class="avances_referencia">
	</div>
    	<h3>Comentarios</h3>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<textarea name="status" id="status"></textarea><br />
		<input type="button" value="Registrar Comentario" id="submit" />
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
		//echo $query;
			
			$RS_avances= TraeRecordset($query);
			if (!$RS_avances) die('Error en DB!');
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
  </body>
</html>