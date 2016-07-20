<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../../../adodb/adodb.inc.php');
include('../../../includes/connection.php');
include('libreria_bere.php');

$referencia = $_GET['referencia'];

	$SQL = "SELECT id_Medio_Acceso, id_Fase_IOS, dt_Fecha_Fase_IOS,int_Documentado, id_Motivo_PPU, iint_CON_OT, id_Proyecto_Completo FROM tb_ios WHERE referencia = '".$referencia."'";
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
			
	}
    </style>
    <!--<link rel="stylesheet" media="screen" type="text/css" href="css/ios.css" />-->
        <link rel="stylesheet" type="text/css" href="mootools-calendar/css/calendar.css"/>
        <script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"></script>
        <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"></script>
        <script type="text/javascript" src="mootools-calendar/javascript/mootools/calendar.js"></script>
        <script type="text/javascript">
		
window.addEvent('domready', function() {
      myCal = new Calendar({ fech_prog_equip: 'Y/m/d' });
	  myCal = new Calendar({ fech_envio_a: 'Y/m/d' });
	  myCal = new Calendar({ fech_envio_b: 'Y/m/d' });
});

        window.addEvent('domready', function() {
		$('actualizar').addEvent('click',update)
//		$('cat_fase_ios').addEvent('onchange',enconstruccion)
    });


function update(){

//      	MooTools.lang.setLanguage("es-ES");
//        var validate = new Form.Validator.Inline("nuevo_registro");
//		if (validate.validate())

	
		var referencia= '<?php echo $referencia; ?>';
		var id_Medio_Acceso= $('cat_medio_transmision').value;
		var id_Fase_IOS= $('cat_fase_ios').value;
		var dt_Fecha_Fase_IOS= $('dt_Fecha_Fase_IOS').value;
		var bt_Documentado= $('cat_document').value;
		var id_Motivo_PPU= $('cat_motivo_ppu').value;
		var bt_CON_OT= $('cat_con_ot').value;
		var id_Proyecto_Completo= $('cat_proy_complet').value;

var datos = "referencia="+referencia
+"&id_Medio_Acceso="+id_Medio_Acceso
+"&id_Fase_IOS="+id_Fase_IOS
+"&dt_Fecha_Fase_IOS="+dt_Fecha_Fase_IOS
+"&bt_Documentado="+bt_Documentado
+"&id_Motivo_PPU="+id_Motivo_PPU
+"&bt_CON_OT="+bt_CON_OT
+"&id_Proyecto_Completo="+id_Proyecto_Completo;

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
<!--    <br />
    <b>DETALLE DE SERVICIO</b>
    <br /><br /><br />
-->      <table width="750" border="0" align="left" class="Texto_Mediano_Gris" height="200">
      	<tr align="right">
        	<td>       
			REFERENCIA: <input type="text" name="referencia" id="referencia" style="width: 150px" value="<?php echo $referencia; ?>" />
            </td>
            <td>
        	MEDIO DE ACCESO: <?php echo ImprimeCombo(6,$id_Medio_Acceso);?>
            </td>
        </tr>
      	<tr align="right">
            <td>
        	FASE IOS: <?php echo ImprimeCombo(1,$id_Fase_IOS);?>
            </td>
            <td>
    		FECHA FASE IOS: <input type="text" name="dt_Fecha_Fase_IOS" id="dt_Fecha_Fase_IOS" style="width: 150px" value="<?php echo $dt_Fecha_Fase_IOS; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
    		DOCUMENTADO: <?php echo ImprimeCombo(2,$bt_Documentado);?>
            </td>
            <td>
    		MOTIVO PPU: <?php echo ImprimeCombo(3,$id_Motivo_PPU);?>
            </td>
        </tr>
      	<tr align="right">
            <td>
    		FECHA PROG. ENTREGA EQUIP.: <input type="text" name="fech_prog_equip" id="fech_prog_equip" style="width: 150px" class="calendar" />
            </td>
            <td>
    		EMPRESA FILIAL PTA A: <?php echo ImprimeCombo(7,'');?>
            </td>
        </tr>
      	<tr align="right">
            <td>
    		FECHA ENVIO CONS. PTA A: <input type="text" name="fech_envio_a" id="fech_envio_a" style="width: 150px" class="calendar" />
            </td>
            <td>
    		EMPRESA FILIAL PTA B: <?php echo ImprimeCombo(7,'');?>
            </td>
        </tr>
      	<tr align="right">
            <td>
    		FECHA ENVIO CONS. PTA B: <input type="text" name="fech_envio_b" id="fech_envio_b" style="width: 150px" class="calendar" />
            </td>
            <td>
    		OT DE ETREGA: <?php echo ImprimeCombo(4,$bt_CON_OT);?>
            </td>
        </tr>
      	<tr align="right">
            <td>
    		PROY_COMPLETO: <?php echo ImprimeCombo(5,$id_Proyecto_Completo);?>
            </td>
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