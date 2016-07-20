<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../../../adodb/adodb.inc.php');
include('../../../includes/connection.php');
include('libreria_tramos.php');

	$referencia = $_GET['referencia'];

	$SQL = "SELECT id_Medio_Acceso, id_Fase_IOS, dt_Fecha_Fase_IOS, bt_Documentado, id_Motivo_PPU, bt_CON_OT, id_Proyecto_Completo FROM tb_ios WHERE referencia = '".$referencia."'";
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
	$id_Medio_Acceso= $RS->fields(0);
	$id_Fase_IOS=  $RS->fields(1);
	$dt_Fecha_Fase_IOS=  $RS->fields(2);
	$bt_Documentado=  $RS->fields(3);
	$id_Motivo_PPU=  $RS->fields(4);
	$bt_CON_OT=  $RS->fields(5);
	$id_Proyecto_Completo=  $RS->fields(6);
	

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
	<!--<link rel="stylesheet" media="screen" type="text/css" href="css/ios.css" />-->
	 <link rel="stylesheet" type="text/css" href="../../../../css/cerabox.css"/>
	<link rel="stylesheet" type="text/css" href="../../../Referencia/mootools-calendar/css/calendar.css"/>
	<script type="text/javascript" src="../../../scripts/mootools-core-1.4.5-full-compat.js"></script>
	<script type="text/javascript" src="../../../scripts/mootools-more-1.4.0.1.js"></script>
	<script type="text/javascript" src="../../../../scripts/cerabox.min.js"></script>
	<script type="text/javascript" src="../../../Referencia/mootools-calendar/javascript/mootools/calendar.js"></script>
	<script type="text/javascript">
		
	window.addEvent ('domready', function ()

 	{

	$$('#example3 a').cerabox({
	group: false,
	displayTitle: false,
	// Overrules all possible options from Swiff (http://mootools.net/docs/core/Utilities/Swiff)
	swf: {
		params:{ allowScriptAccess: 'never' }
	},
	// Overrules all possible options from Request (http://mootools.net/docs/core/Request/Request)
	ajax: {
		data: 'mydata=test&q=more&vars=true'
	}
		});

	}); 

/*	window.addEvent('domready', function() {
      myCal = new Calendar({ fech_prog_equip: 'Y/m/d' });
	  myCal = new Calendar({ fech_envio_a: 'Y/m/d' });
	  myCal = new Calendar({ fech_envio_b: 'Y/m/d' });
});

		
        window.addEvent('domready', function() {
		pedirDatos();
		$('actualizar').addEvent('click',update)
    });
*/
function pedirDatos(){
      	
//	alert ('hola');
	var referencia= '<?php echo $referencia; ?>';
	var id_Medio_Acceso= '<?php echo $id_Medio_Acceso; ?>';
	var id_Fase_IOS= '<?php echo $id_Fase_IOS; ?>';
	var dt_Fecha_Fase_IOS= '<?php echo $dt_Fecha_Fase_IOS; ?>';
	var bt_Documentado= '<?php echo $bt_Documentado; ?>';
	var id_Motivo_PPU= '<?php echo $id_Motivo_PPU; ?>';
	var bt_CON_OT= '<?php echo $bt_CON_OT; ?>';
	var id_Proyecto_Completo= '<?php echo $id_Proyecto_Completo; ?>';


	
//	alert(coment);
// var nombre de la variable = "varible="+nombre de la variable anterior	
var datos = "referencia="+referencia+"&id_Medio_Acceso="+id_Medio_Acceso+"&id_Fase_IOS="+id_Fase_IOS+"&dt_Fecha_Fase_IOS="+dt_Fecha_Fase_IOS+"&bt_Documentado="+bt_Documentado+"&id_Motivo_PPU="+id_Motivo_PPU+"&bt_CON_OT="+bt_CON_OT+"&id_Proyecto_Completo="+id_Proyecto_Completo;

//alert(datos);
		var myHTMLRequest = new Request.HTML({
		url: 'servicio_2.php',
		onRequest : function (){
			//Si nos muestra el resultado correcto, pinta en pantalla
			$('html').set('html','Cargando..');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('resultado').set('html',html);
			}	
		}).send({ 
			method:'get',
			data: datos
		});
		}

function update(){

      	MooTools.lang.setLanguage("es-ES");
        var validate = new Form.Validator.Inline("nuevo_registro");
		if (validate.validate())

	
		var referencia= $('referencia').value;
		var t= $('id_Medio_Acceso').value;
		var e= $('id_Fase_IOS').value;
		var l= $('dt_Fecha_Fase_IOS').value;
		var m= $('bt_Documentado').value;
		var e= $('id_Motivo_PPU').value;
		var x= $('bt_CON_OT').value;
		var d= $('id_Proyecto_Completo').value;

var datos = "referencia="+referencia+"&t="+t+"&e="+e+"&l="+l+"&m="+m+"&e="+e+"&x="+x+"&d="+d;

		var myHTMLRequest = new Request.HTML({
		url: 'update.php',
		onRequest : function (){
			//Si nos muestra el resultado correcto, pinta en pantalla
			$('resultado').set('html','Cargando..');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('resultado').set('html',html);
			}	
		}).send({ 
			method:'get',
			data: datos
		});
		}
 
	</script>       
	</head>
	  <body style="margin: 0; padding: 0;">
	  <table width="517" height="514" border="0" cellpadding="0" cellspacing="0">
	  <tr valign="top">
      <td width="158" height="101"><a href="index3.php">
      <img src="../../../../images/telmex.jpg" width="158" height="89" alt="TELMEX" border="0" /></a></td>
      <td width="359">
      <img src="../../../../images/login.gif" width="348" height="35" alt="ojo" />
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
 		<div id="referencia" style="float:center; width:500px; overflow:auto; background:#FFF url(../../../../images/page-background.jpg) repeat-x top left; min-height: 250px; max-height: 500px; margin-left: 5px; margin-right: 5px;margin-top: 0px; font-family:Verdana, Geneva, sans-serif; color: #666666; font-size:12px;" >
 			<p align="center"><br />
      				<b>ACTUALIZACI&Oacute;N DEL DETALLE DE SERVICIO</b> </p>
		    <table width="433" height="392" border="0" align="center">
      		<tr>
	        <td width="248" class="combos_referencia">REFERENCIA:</td>
    		<td width="175"><div align="left">
     
    <input type="text" name="referencia" id="referencia" style="width: 150px" value="
	<?php echo $referencia; ?>" />
    </div>
    </td>
    </tr>
      <tr>
        <td>MEDIO DE ACCESO:</td>
        <td><div align="left"><?php echo ImprimeCombo(6,$id_Medio_Acceso);?></div></td>
    </tr>
    <tr>
        <td><div align="left">FASE IOS:</div></td>
    	<td><div align="left"><?php echo ImprimeCombo(1,$id_Fase_IOS);?>
    	</div></td>
    </tr>
  	<tr>
    	<td>FECHA FASE IOS:</td>
    	<td><div align="left">
   <input type="text" name="dt_Fecha_Fase_IOS" id="dt_Fecha_Fase_IOS" style="width: 150px" value="
   <?php echo $dt_Fecha_Fase_IOS; ?>" />
    </div>
    	</td>
    </tr>
  	<tr>
    	<td>DOCUMENTADO:</td>
    	<td><div align="left"><?php echo ImprimeCombo(2,$bt_Documentado);?>
    </div>
    </td>
    </tr>
  	<tr>
    	<td>MOTIVO PPU:</td>
    	<td><div align="left"><?php echo ImprimeCombo(3,$id_Motivo_PPU);?>
    </div>
    </td>
    </tr>
  	<tr>
    	<td>FECHA PROG ENTREGA EQUIPAMIENTO:</td>
    	<td><div align="left">
    <input type="text" name="fech_prog_equip" id="fech_prog_equip" style="width: 150px" class="calendar" />
    </div></td>
    </tr>
    <tr>
    	<td>EMPRESA FILIAL PTA A:</td>
    	<td><div align="left"><?php echo ImprimeCombo(7,'');?>
    </div></td>
    </tr>
  	<tr>
    	<td>FECHA ENVIO CONS. PTA A:</td>
    	<td><div align="left">
    <input type="text" name="fech_envio_a" id="fech_envio_a" style="width: 150px" class="calendar" />
    </div>
    </td>
    </tr>
  	<tr>
    	<td>EMPRESA FILIAL PTA B:</td>
    	<td><div align="left"><?php echo ImprimeCombo(7,'');?>
    </div>
    	</td>
    </tr>
  	<tr>
    	<td>FECHA ENVIO CONS. PTA B:</td>
    	<td><div align="left">
    <input type="text" name="fech_envio_b" id="fech_envio_b" style="width: 150px" class="calendar" />
    </div>
    </td>
    </tr>
  <tr>
    <td>OT DE ETREGA:</td>
    <td><div align="left"><?php echo ImprimeCombo(4,$bt_CON_OT);?>
    </div></td>
    </tr>
  <tr>
    <td>PROY_COMPLETO:</td>
    <td><div align="left"><?php echo ImprimeCombo(5,$id_Proyecto_Completo);?>
    </div></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="left">
      <input type="submit" name="actualizar" id="actualizar" value="Registrar Actualizaci&oacute;n" />
    </div></td>
    </tr>
</table>
    </div></td>
  </tr>
</table>
<div id="resultado"></div>	

<!-- <div style= "display: none">
	 <div class= id= "inline-example" "popup container">
		 <h3> prueba </ h3>
		 <hr />
		 <p> Esto es una prueba de HTML en línea. </ p>
	 </ Div>
--> 
</body>
</html>