<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../../../adodb/adodb.inc.php');
include('../../../includes/connection.php');
include('libreria.php');

$referencia = $_GET['referencia'];

	$SQL = "SELECT 
	referencia,
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
	ser_n
	FROM vw_ios_reg where referencia = '".$referencia."'";
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
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
	$coordinacion_abrev=  $RS->fields(10);
	$dir_division=  $RS->fields(11);
	$str_Fase_IOS=  $RS->fields(12);
	$str_Area_responsable=  $RS->fields(13);
	$SUBGERENTE_RESPONSABLE=  $RS->fields(14);
	$SUPERVISOR=  $RS->fields(15);
	$ser_n = $RS->fields(16);
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
			
	}
    </style>
    <!--<link rel="stylesheet" media="screen" type="text/css" href="css/ios.css" />-->
        <link rel="stylesheet" type="text/css" href="mootools-calendar/css/calendar.css"/>
        <script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"></script>
        <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"></script>
			<script src="LightFace/Source/LightFace.js"></script>
	        <link rel="stylesheet" href="LightFace/Assets/lightface.css" />
			<script src="LightFace/Source/LightFace.js"></script>
			<script src="LightFace/Source/LightFace.IFrame.js"></script>
			<script src="LightFace/Source/LightFace.Image.js"></script>
			<script src="LightFace/Source/LightFace.Request.js"></script>
        <script type="text/javascript">
		
	window.addEvent('domready', function() {
      //myCal = new Calendar({ fech_prog_equip: 'Y/m/d' });
	  //myCal = new Calendar({ fech_envio_a: 'Y/m/d' });
	  //myCal = new Calendar({ fech_envio_b: 'Y/m/d' });
		$('actualizar').addEvent('click',update)
		$('fase_ios').addEvent('change',abre_ventana_enconstruccion)

});


<!--funcion onclick construccion-->

/*	function abre_ventana_enconstruccion()
	{
	var referencia = '<?php // echo $referencia; ?>';
	var id_fase_ios = ($('cat_fase_ios_bere').value*1);	
	if (id_fase_ios == 46)
	{
		
		var light = new LightFace.IFrame
					(
				{
				height:500, 
				width:1040,
				url: 'new0.php?referencia='+referencia,
				title: 'Detalle Tramos' 
				}
					)
				.addButton('Cerrar', function() 
			{ 	light.close(); },true).open();
	}
}

*/

		function update(){

//      	MooTools.lang.setLanguage("es-ES");
//        var validate = new Form.Validator.Inline("nuevo_registro");
//		if (validate.validate())

		var referencia=	 '<?php echo $referencia; ?>';
		var desc_serv= 	 '<?php echo $desc_serv; ?>';
		var due_date= 	 '<?php echo $due_date; ?>';
		var GRUPO_DIL_SERVICIO= '<?php echo $GRUPO_DIL_SERVICIO; ?>';
		var fase_serv= 	 '<?php echo $fase_serv; ?>';
		var edo_serv=    '<?php echo $edo_serv; ?>';
		var fecha_estado='<?php echo $fecha_estado; ?>';
		var TECNOLOGIA=  '<?php echo $TECNOLOGIA; ?>';
		var usuario= '<?php echo $usuario; ?>';
		var sector=  '<?php echo $sector; ?>';
		var coordinacion_abrev= '<?php echo $coordinacion_abrev; ?>';
		var dir_division= '<?php echo $dir_division; ?>';
		var str_Fase_IOS= '<?php echo $str_Fase_IOS; ?>';
		var str_Area_responsable=   '<?php echo $str_Area_responsable; ?>';
		var SUBGERENTE_RESPONSABLE= '<?php echo $SUBGERENTE_RESPONSABLE; ?>';
		var SUPERVISOR= '<?php echo $SUPERVISOR; ?>';
		var ser_n=      '<?php echo $ser_n; ?>';
		



		var datos = 
	"referencia="+referencia
	+"&desc_serv="+desc_serv
	+"&due_date="+due_date
	+"&GRUPO_DIL_SERVICIO="+GRUPO_DIL_SERVICIO
	+"&fase_serv="+fase_serv
	+"&edo_serv="+edo_serv
	+"&fecha_estado="+fecha_estado
	+"&TECNOLOGIA="+TECNOLOGIA
	+"&usuario="+usuario
	+"&sector="+sector
	+"&coordinacion_abrev="+coordinacion_abrev
	+"&dir_division="+dir_division
	+"&str_Fase_IOS="+str_Fase_IOS
	+"&str_Area_responsable="+str_Area_responsable
	+"&SUBGERENTE_RESPONSABLE="+SUBGERENTE_RESPONSABLE
	+"&SUPERVISOR="+SUPERVISOR
	+"&ser_n="+ser_n;

//alert (datos);

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
		
	function abre_ventana_enconstruccion()
	{
	var referencia = '<?php echo $referencia; ?>';
	
	
	var id_fase_ios = ($('fase_ios').value*1);	
	if (id_fase_ios == 46)
	{
		
	light = new LightFace.IFrame
					(
		{
				height:350, 
				width:547,
				url: 'asignacion_filial.php?referencia='+referencia,
				title: 'Detalle Tramos' 
		}
					)
				.addButton('Close', function() 
			{ 	light.close(); 
			}	,true).open();
	}
}
		
</script>       
  </head>
  <body style="margin: 0; padding: 0;">
  <table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td><img src="images/telmex.jpg" width="158" height="89" alt="TELMEX" /></td>
    <td><img src="images/login.gif" width="585" height="35" alt="TELMEX" border="0" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><div id="referencia" style="float:center; width:750px; overflow:auto; background:#FFF url(images/page-background.jpg) repeat-x top left; min-height: 250px; max-height: 500px; margin-left: 5px; margin-right: 5px;margin-top: 0px; font-family:Verdana, Geneva, sans-serif; color: #666666; font-size:12px;" >
    <br />
    <b>DETALLE DE SERVICIO</b>
    <br /><br /><br />
      <table width="750" border="0" align="left" class="Texto_Mediano_Gris" height="200">
      	<tr align="right">
        	<td>       
			REFERENCIA: <input type="text" name="referencia" id="referencia" style="width: 150px" value="<?php echo $referencia; ?>" />
            </td>
            <td>Tipo_Proy:
            <input type="text" name="referencia" id="referencia" class="txtbox" value="<?php echo $referencia; ?>" /></td>
        </tr>
      	<tr align="right">
            <td>Fase serv:              <input type="text" name="fase_serv" id="fase_serv" style="width: 150px" value="<?php echo $fase_serv; ?>" /></td>
            <td>Usuario:
            <input type="text" name="usuario" id="usuario" class="txtbox" value="<?php echo $usuario; ?>" /></td>
        </tr>
      	<tr align="right">
            <td>Edo del servicio:              <input type="text" name="edo_serv" id="edo_serv" style="width: 150px" value="<?php echo $edo_serv; ?>" /></td>
            <td>Pta Usuario:
            <input type="text" name="usuario" id="usuario" class="txtbox" value="<?php echo $usuario; ?>" /></td>
        </tr>
      	<tr align="right">
            <td>Desc servicio::
            <input type="text" name="desc_serv" id="desc_serv" style="width: 150px" value="<?php echo $desc_serv; ?>" /></td>
            <td>Subgerente:
            <input type="text" name="SUBGERENTE_RESPONSABLE" id="SUBGERENTE_RESPONSABLE" class="txtbox" value="<?php echo $SUBGERENTE_RESPONSABLE; ?>" /></td>
        </tr>
      	<tr align="right">
            <td>Fase IOS:
            <input type="text" name="dt_Fecha_Fase_IOS5" id="dt_Fecha_Fase_IOS5" style="width: 150px" value="<?php echo $str_Fase_IOS; ?>" /></td>
            <td>Supervisor:
            <input type="text" name="SUPERVISOR" id="SUPERVISOR" class="txtbox" value="<?php echo $SUPERVISOR; ?>" /></td>
        </tr>
      	<tr align="right">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
      	<tr align="right">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
      	<tr align="right">
            <td>&nbsp;</td>
            <td>
      <input type="submit" name="actualizar" id="actualizar" value="Registrar Actualizaci&oacute;n" />

</table>
    </div></td>
  </tr>
</table>
    <div id="resultado"></div>
  </body>
</html>