<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../../../adodb/adodb.inc.php');
include('../../../includes/connection.php');
include('CNS_LIBRERIA.php');

$referencia = $_GET['referencia'];
$ser_n = $_GET['ser_n'];
	
	$SQL = "SELECT 
	id_CNS_update,
	ser_n,
	id_Fase_IOS,
	id_ipe_eth,
	str_referencia_hub,
	bol_PBA_TRASPASO_A_C,
	bol_PBA_TRASPASO_C_TX,
	bol_config_eth,
	dt_FECHA_LIQ_CNA,
	dt_FECHA_ING_CNA,
	DATE_FORMAT(dt_FECHA_FASE_IOS,'%Y-%m-%d') as dt_FECHA_FASE_IOS,
	dt_FECHA_PRO_RES,
	str_FECHA_PROG,
	str_NOM_SOLICITANTE
	FROM tb_cns WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n."' ";
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros =	 $RS->RecordCount();
	

	//$referencia=  	$RS->fields(4);
	
	$id_CNS_update= $RS->fields(0);
	$ser_n= $RS->fields(1);
	$id_Fase_IOS= $RS->fields(2);
	$id_usuario= $RS->fields(3);
	$str_referencia_hub= $RS->fields(4);
	$bol_PBA_TRASPASO_A_C= $RS->fields(5);
	$bol_PBA_TRASPASO_C_TX= $RS->fields(6);
	$bol_config_eth= $RS->fields(7);
	$dt_FECHA_LIQ_CNA= $RS->fields(8);
	$dt_FECHA_ING_CNA= $RS->fields(9);
	$dt_FECHA_FASE_IOS= $RS->fields(10);
	$dt_FECHA_PRO_RES= $RS->fields(11);
	$str_FECHA_PROG= $RS->fields(12);
	$str_NOM_SOLICITANTE= $RS->fields(13);
	
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
		$('actualizar').addEvent('click',update_cns)
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
		function update_cns(){

//      	MooTools.lang.setLanguage("es-ES");
//        var validate = new Form.Validator.Inline("nuevo_registro");
//		if (validate.validate())

		var referencia = '<?php echo $referencia; ?>';
		var id_Fase_IOS = $('fase_ios').value;
		var id_ipe_eth = $('nombre_ipe').value;
		var	str_referencia_hub = $('str_referencia_hub').value;
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
		
	

		var datos = "referencia="+referencia
		+"&id_Fase_IOS="+id_Fase_IOS
		+"&id_ipe_eth="+id_ipe_eth
		+"&str_referencia_hub="+str_referencia_hub
		+"&bol_PBA_TRASPASO_A_C="+bol_PBA_TRASPASO_A_C
		+"&bol_PBA_TRASPASO_C_TX="+bol_PBA_TRASPASO_C_TX
		+"&bol_config_eth="+bol_config_eth
		
		+"&dt_FECHA_LIQ_CNA="+dt_FECHA_LIQ_CNA
		+"&dt_FECHA_ING_CNA="+dt_FECHA_ING_CNA
		+"&dt_FECHA_FASE_IOS="+dt_FECHA_FASE_IOS
		+"&dt_FECHA_PRO_RES="+dt_FECHA_PRO_RES
		+"&str_FECHA_PROG="+str_FECHA_PROG;
		+"&str_NOM_SOLICITANTE="+str_NOM_SOLICITANTE;
		

	//alert (datos);

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

//funcion onclick construccion

//	function abre_ventana_enconstruccion()
//	{
//	var referencia = '<?php// echo //$referencia; ?>';
//	var id_fase_ios = ($('cat_fase_ios_bere').value*1);	
//	if (id_fase_ios == 46)
//	{
//		
//		var light = new LightFace.IFrame
//					(
//				{
//				height:500, 
//				width:1040,
//				url: 'new0.php?referencia='+referencia,
//				title: 'Detalle Tramos' 
//				}
//					)
//				.addButton('Cerrar', function() 
//			{ 	light.close(); },true).open();
//	}
//}
//
//
//
		
//	function abre_ventana_enconstruccion()
//	{
//	var referencia = '<?php //echo $referencia; ?>';
//	
//	
//	var id_fase_ios = ($('fase_ios').value*1);	
//	if (id_fase_ios == 46)
//	{
//		
//	light = new LightFace.IFrame
//					(
//		{
//				height:350, 
//				width:547,
//				url: 'asignacion_filial.php?referencia='+referencia,
//				title: 'Detalle Tramos' 
//		}
//					)
//				.addButton('Close', function() 
//			{ 	light.close(); 
//			}	,true).open();
//	}
//}

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
    <td><b><?php  echo $referencia;  ?> </b></td>
    <td>Fecha Liquidada CNA:</td>
    <td><input type="text" name="dt_FECHA_LIQ_CNA" id="dt_FECHA_LIQ_CNA" style="width:150px" value="<?php echo $dt_FECHA_LIQ_CNA; ?>" />
    </td>
  </tr>
  <tr>
    <td>Fase IOS:</td>
    <td><?php echo ImprimeCombo(1,$id_Fase_IOS);?>
    </td>
    <td>Fecha Fase IOS:</td>
    <td><input type="text" name="dt_FECHA_FASE_IOS" id="dt_FECHA_FASE_IOS" style="width: 150px" value="<?php echo $dt_FECHA_FASE_IOS; ?>" disabled="disabled" />
    </td>
  </tr>
  <tr>
    <td>IPE Ethernet:</td>
    <td><?php echo ImprimeCombo(2,$id_usuario);?>
    </td>
    <td>Fecha Ing CNA:</td>
    <td><input type="text" name="dt_FECHA_ING_CNA" id="dt_FECHA_ING_CNA" style="width: 150px" value="<?php echo $dt_FECHA_ING_CNA; ?>" />
    </td>
  </tr>
  <tr>
    <td>Referencia Hub:</td>
    <td><input type="text" name="str_referencia_hub" id="str_referencia_hub" style="width: 150px" value="<?php echo $str_referencia_hub; ?>" />
    </td>
    <td>Fecha PRO RES:</td>
    <td><input type="text" name="dt_FECHA_PRO_RES" id="dt_FECHA_PRO_RES" style="width: 150px"  value="<?php echo $dt_FECHA_PRO_RES; ?>"  />
    </td>
  </tr>
  <tr>
    <td>PBA_TRASPASO(A-C):</td>
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
    <td><input type="text" name="str_NOM_SOLICITANTE" id="str_NOM_SOLICITANTE" style="width: 150px" value="<?php echo $str_NOM_SOLICITANTE ?>" />
    </td>
  </tr>
  <tr>
    <td>Configuraci&oacute;n Ethernet:</td>
    <td><input type="checkbox" name="config_eth" value="1" id="config_eth" />Configurado
    </td>
    <td></td>
    <td style="visibility:hidden"><input type="text" id="ser_n" name="ser_n" value="<?php  echo $str_ser_n;  ?>" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="actualizar" id="actualizar" value="Registrar Actualizaci&oacute;n" />
    </td>
  </tr>
</table>
    </div></td>
  </tr>
</table>
    <div id="resultado"></div>
  </body>
</html>