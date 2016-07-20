<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();	
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');
include('libreria_filial.php');
require("../includes/funciones.php");
$CheckSession = CheckSession();
	
$referencia = $_GET['referencia'];
$ser_n_ok = $_GET['ser_n'];

$id_Fase_IOS = $_GET['id_Fase_IOS'];
$dt_Fecha_Fase_IOS = $_GET['dt_Fecha_Fase_IOS'];

if (isset($_GET['referencia']) && $_GET['referencia'] != "")
{
	$SQL = "SELECT str_Filial, dt_Fecha_Envio_Construccion,	str_OT,	id_Aceptacion_OT, id_Coordinador_Contratista, str_Tel_Coord_Contratista, id_Fase_IOS_Filial, dt_Fecha_Fase_IOS_Filial, str_Asociado, id_Actividad_Filial, str_Central_A, id_Resp_Contratista_A, str_Tel_Cont_A, str_Central_B, id_Resp_Contratista_B, str_Tel_Cont_B, dt_Fecha_Envio_Entrega, dt_Fecha_Aceptacion, dt_Fecha_Asignacion, dt_Fecha_Elaboracion, dt_Fecha_Programada_Construccion, dt_Fecha_Programada_Entrega, dt_Fecha_Construccion_Terminada, dt_Fecha_Devolucion, dt_Fecha_Real_Entrega, dt_Fecha_Obras_Canceladas FROM vw_filial_2  WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n_ok."' AND id_filial = '".$_SESSION['id_Filial']."'";
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	while (!$RS->EOF)
	{
		$str_Filial = $RS->fields(0);
		$dt_Fecha_Envio_Construccion = $RS->fields(1);
		$str_OT = $RS->fields(2);
		$id_Aceptacion_OT = $RS->fields(3);
		$id_Coordinador_Contratista = $RS->fields(4);
		$str_Tel_Coord_Contratista = $RS->fields(5);
		$id_Fase_IOS_Filial = $RS->fields(6);
		$dt_Fecha_Fase_IOS_Filial = $RS->fields(7);
		$str_Asociado = $RS->fields(8);
		$id_Actividad_Filial = $RS->fields(9);
		$str_Central_A = $RS->fields(10);
		$id_Resp_Contratista_A = $RS->fields(11);
		$str_Tel_Cont_A = $RS->fields(12);
		$str_Central_B = $RS->fields(13);
		$id_Resp_Contratista_B = $RS->fields(14);
		$str_Tel_Cont_B = $RS->fields(15);
		$dt_Fecha_Envio_Entrega = $RS->fields(16);
		$dt_Fecha_Aceptacion = $RS->fields(17);
		$dt_Fecha_Asignacion = $RS->fields(18);
		$dt_Fecha_Elaboracion = $RS->fields(19);
		$dt_Fecha_Programada_Construccion = $RS->fields(20);
		$dt_Fecha_Programada_Entrega = $RS->fields(21);
		$dt_Fecha_Construccion_Terminada = $RS->fields(22);
		$dt_Fecha_Devolucion = $RS->fields(23);
		$dt_Fecha_Real_Entrega = $RS->fields(24);
		$dt_Fecha_Obras_Canceladas = $RS->fields(25);
				
		$RS->MoveNext();
	}
	$RS->Close();
	$RS = NULL;

////CENTRAL A
//
//	$SQL_2 = "SELECT
//	CENTRAL,
//	Contratista,
//	str_telefono
// FROM vw_filial_2  WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n_ok."' AND str_Punta='A'
// UNION
//SELECT
//	CENTRAL,
//	Contratista,
//	str_telefono
// FROM vw_filial_2  WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n_ok."' AND str_Punta='B' ";
//	
//	$RS_2 = TraeRecordset($SQL_2);
//	if (!$RS_2) die('Error en DB!');
//	
//	
//	$CENTRAL_A= $RS_2->fields(0);
//	$CONTRATISTA_A= $RS_2->fields(1);
//	$TELEFONO_CONTRATISTA_A= $RS_2->fields(2);
//	
////CENTRAL B

}
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
		*				{ font-family:tahoma; }
		h3				{ border-bottom:0; }
		
		#message		{ padding:7px 10px; float:left; width:350px; }
		#status		{ border:1px solid #999; padding:5px; width:500px; height:75px; margin:5px 0; }
		#statuses	{ width:512px; }
		#submit		{ cursor:pointer; padding:5px; border:1px solid #ccc; float:left; margin:0 20px 0 0; }
		
		.status-box	{ padding:10px 20px 10px 30px; height:48px; border-bottom:1px dotted #aaa; }
		.status-box:hover	{ background-color:#eee; }
		.success		{ color:#008000; }
		.failure		{ color:#f00; }
		.time			{ color:#2a447b; font-size:10px; }
		
	</style>
   <link rel="stylesheet" media="screen" type="text/css" href="css/ios.css" />
   <link rel="stylesheet" type="text/css" href="scripts_datepicker/datepicker/Source/datepicker_vista/datepicker_vista.css"/>
        <script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"></script>
        <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"></script>
        <script type="text/javascript" src="scripts_datepicker/datepicker/Source/Locale.es-ES-DatePicker.js"></script>
        <script type="text/javascript" src="scripts_datepicker/datepicker/Source/Picker.js"></script>
        <script type="text/javascript" src="scripts_datepicker/datepicker/Source/Picker.Attach.js"></script>
        <script type="text/javascript" src="scripts_datepicker/datepicker/Source/Picker.Date.js"></script>
        
			<script src="LightFace/Source/LightFace.js"></script>
	        <link rel="stylesheet" href="LightFace/Assets/lightface.css" />
			<script src="LightFace/Source/LightFace.js"></script>
			<script src="LightFace/Source/LightFace.IFrame.js"></script>
			<script src="LightFace/Source/LightFace.Image.js"></script>
			<script src="LightFace/Source/LightFace.Request.js"></script>
        <script type="text/javascript">
		
			window.addEvent('domready', function() {	
		$('actualizar').addEvent('click',actualiza_detalle_filial)
		//$('nombre_responsable_filial').addEvent('change',pedirDatos)
			Locale.use('es-ES');
			new Date().format('db');
			var fecha_elaboracion = new Picker.Date($$('#FECHA_ELABORACION'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var fecha_asignacion = new Picker.Date($$('#FECHA_ASIGNACION'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var fecha_programada_const = new Picker.Date($$('#FECHA_PROGRAMADA_CONSTRUCCION'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var fecha_prog_entrega = new Picker.Date($$('#FECHA_PROGRAMA_ENTREGA'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var fecha_construccion_term = new Picker.Date($$('#FECHA_CONSTRUCCION_TERMINADA'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var fecha_devolucion= new Picker.Date($$('#FECHA_DEVOLUCION'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var fecha_real_entrega = new Picker.Date($$('#FECHA_REAL_ENTREGA'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var fecha_obras_canceladas = new Picker.Date($$('#FECHA_OBRAS_CANCELADAS'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
		});

function actualiza_detalle_filial()
{
//      	MooTools.lang.setLanguage("es-ES");
//        var validate = new Form.Validator.Inline("nuevo_registro");
//		if (validate.validate())
		var datos = $('form_filial').toQueryString()
//alert (datos);

		var myHTMLRequest = new Request.HTML({
		url: 'update_detalle_filial.php',
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
	
	
function update_hiddens(aceptacion_ot,fase_ios_filial)
{
	if (aceptacion_ot != '' && $('id_Aceptacion_OT').value != aceptacion_ot)
	{
		$('id_Aceptacion_OT').value = aceptacion_ot;
	}
	if (fase_ios_filial != '' && $('id_Fase_IOS_Filial').value != fase_ios_filial)
	{
		$('id_Fase_IOS_Filial').value = fase_ios_filial;
	}
		var datos = 'referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n_ok; ?>';
		var myHTMLRequest = new Request.JSON({
		url: 'json_refresh_filial.php',
		onRequest : function (){
			//$('resultado').set('html','Cargando..');
			}	,
		
		onSuccess : function(responseJSON, responseText)	{
			var json = JSON.parse(responseText);
						
			$('FECHA_DE_ACEPTACION').set('value',json.dt_Fecha_Aceptacion);
			$('FECHA_ESTADO_FILIAL').set('value',json.dt_Fecha_Fase_IOS_Filial);
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
    <td colspan="2" align="center"><div id="referencia" style="float:center; width:750px; background:#FFF url(images/page-background.jpg) repeat-x top left; min-height: 300px; max-height: 500px; margin-left: 5px; margin-right: 5px;margin-top: 0px; font-family:Verdana, Geneva, sans-serif; color: #666666; font-size:12px;" >
<form action="" method="get" name="form_filial" id="form_filial">
      <table width="750" border="0" align="left" class="Texto_Mediano_Gris" height="300">
      	<tr align="right">
          <td align="center">Referencia:
      	     <?php echo "<font size='2'><b>$referencia </b></font> " ?>
      	  <td>
            <input type="hidden" name="referencia" id="referencia" value="<?php echo $referencia; ?>" />
      	    <input type="hidden" name="ser_n" id="ser_n" value="<?php echo $ser_n_ok; ?>" /></td>
    	</tr>
        <tr align="right">
          <td> OT:
      	    <input type="text" name="OT" id="OT" style="width: 195px" value="<?php echo $str_OT; ?>" /></td>
      	  <td> Fecha Envio Entrega:
      	    <input type="text" name="FECHA_ENVIO_ENTREGA" id="FECHA_ENVIO_ENTREGA" style="width: 180px" value="<?php echo $dt_Fecha_Envio_Entrega; ?>" /></td>
    	  </tr>
      	<tr align="right">
      	  <td> Empresa Filial:
      	    <input type="text" name="str_filial" id="str_filial" style="width: 195px" value="<?php echo $str_Filial; ?>" /></td>
      	  <td> Fecha Envio Const.:
      	    <input type="text" name="FECHA_ENVIO_CONST" id="FECHA_ENVIO_CONST" style="width: 180px" value="<?php echo $dt_Fecha_Envio_Construccion; ?>" /></td>
    	  </tr>
      	<tr align="right">
      	  <td>Aceptacion de OT:
      	    <?php echo ImprimeCombo(3,$id_Aceptacion_OT);?>
            <input type="hidden" name="id_Aceptacion_OT" id="id_Aceptacion_OT" value="<?php echo $id_Aceptacion_OT; ?>" />
            </td>
      	  <td> Fecha Aceptaci&oacute;n:
      	    <input type="text" name="FECHA_DE_ACEPTACION" id="FECHA_DE_ACEPTACION" style="width: 180px" value="<?php echo $dt_Fecha_Aceptacion; ?>" /></td>
    	  </tr>
      	<tr align="right">
      	  <td>Coord. Contratista:
      	    <?php echo ImprimeCombo(1,$id_Coordinador_Contratista);?></td>
      	  <td> Fecha Asignaci&oacute;n:
      	    <input type="text" name="FECHA_ASIGNACION" id="FECHA_ASIGNACION" style="width: 180px" value="<?php echo $dt_Fecha_Asignacion; ?>" /></td>
    	  </tr>
      	<tr align="right">
      	  <td> Tel. Coordinador:
      	    <input type="text" name="telefono_coordinador" id="telefono_coordinador" style="width: 195px" value="<?php echo $str_Tel_Coord_Contratista; ?>" /></td>
                  	  <td> Fecha Elaboraci&oacute;n:
      	    <input type="text" name="FECHA_ELABORACION" id="FECHA_ELABORACION" style="width: 180px" value="<?php echo $dt_Fecha_Elaboracion; ?>" /></td>

    	  </tr>
      	<tr align="right">
      	  <td> Status Filial: 
      	    <?php echo ImprimeCombo(2,$id_Fase_IOS_Filial);?>
            <input type="hidden" name="id_Fase_IOS_Filial" id="id_Fase_IOS_Filial" value="<?php echo $id_Fase_IOS_Filial; ?>" /></td>
            </td>
      	  <td> Fecha Status Filial:
      	    <input type="text" name="FECHA_ESTADO_FILIAL" id="FECHA_ESTADO_FILIAL" style="width: 180px" value="<?php echo $dt_Fecha_Fase_IOS_Filial; ?>" /></td>
    	  </tr>
      	<tr align="right">
      	  <td> Asociado:
      	    <input type="text" name="ASOCIADO" id="ASOCIADO" style="width: 195px" value="<?php echo $str_Asociado; ?>" /></td>
      	  <td> Fecha Programada Construcci&oacute;n:
      	    <input type="text" name="FECHA_PROGRAMADA_CONSTRUCCION" id="FECHA_PROGRAMADA_CONSTRUCCION" style="width: 180px" value="<?php echo $dt_Fecha_Programada_Construccion; ?>" /></td>
    	  </tr>
      	<tr align="right">
      	  <td> Actividad:
      	    <?php echo ImprimeCombo(4,$id_Actividad_Filial);?></td>
      	  <td> Fecha Programada Entrega:
      	    <input type="text" name="FECHA_PROGRAMA_ENTREGA" id="FECHA_PROGRAMA_ENTREGA" style="width: 180px" value="<?php echo $dt_Fecha_Programada_Entrega; ?>" /></td>
    	  </tr>
      	<tr align="right">
      	  <td> CTL A:
<input type="text" name="CENTRAL_A" id="CENTRAL_A" style="width: 195px" value="<?php echo $str_Central_A; ?>"  /></td>
      	  <td> Fecha Construcci&oacute;n Terminada:
      	    <input type="text" name="FECHA_CONSTRUCCION_TERMINADA" id="FECHA_CONSTRUCCION_TERMINADA" style="width: 180px" value="<?php echo $dt_Fecha_Construccion_Terminada; ?>" /></td>
    	  </tr>
      	<tr align="right">
      	  <td> Contratista A:
      	    <?php echo ImprimeCombo(6,$id_Resp_Contratista_A);?></td>
      	  <td> Fecha Devoluci&oacute;n:
      	    <input type="text" name="FECHA_DEVOLUCION" id="FECHA_DEVOLUCION" style="width: 180px" value="<?php echo $dt_Fecha_Devolucion; ?>" /></td>
    	  </tr>
      	<tr align="right">
      	  <td> Tel. Contratista_A :
      	    <input type="text" name="tel_contratista_a" id="tel_contratista_a" style="width: 195px" value="<?php echo $str_Tel_Cont_A; ?>" /></td>
      	  <td> Fecha Real Entrega:
      	    <input type="text" name="FECHA_REAL_ENTREGA" id="FECHA_REAL_ENTREGA" style="width: 180px" value="<?php echo $dt_Fecha_Real_Entrega; ?>" /></td>
    	  </tr>
      	<tr align="right">
      	  <td> CTL B:
      	    <input type="text" name="CENTRAL_B" id="CENTRAL_B" style="width: 195px" value="<?php echo $str_Central_B; ?>" /></td>
      	  <td> Fecha Obras Canceladas:
      	    <input type="text" name="FECHA_OBRAS_CANCELADAS" id="FECHA_OBRAS_CANCELADAS" style="width: 180px" value="<?php echo $dt_Fecha_Obras_Canceladas; ?>" /></td>
    	  </tr>
      	<tr align="right">
      	  <td> Contratista B:
      	    <?php echo ImprimeCombo(7,$id_Resp_Contratista_B);?></td>
      	  <td>&nbsp;</td>
    	  </tr>
      	<tr align="right">
    	    <td>Tel. Contratista B:
            <input type="text" name="tel_contratista_b" id="tel_contratista_b" style="width: 195px" value="<?php echo $str_Tel_Cont_B; ?>" /></td>
    	    <td><div align="center">
                <input type="button" name="actualizar" id="actualizar" value="Registrar Actualizaci&oacute;n" />
              </div></td>   
        </table>
        </form>
        <div id="resultado" style="font-weight:bold;"></div>
    </div></td>
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
	<p>&nbsp;</p><br />
	<h3 class="Titulo_Negro"><b>Comentarios Recientes</b></h3>
	<div id="statuses">
		<?php
		
		if (isset($_GET['referencia']))
		{
			$meses = array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diiembre");
			//get the latest 20
			$query  = "SELECT tb_avances_referencia_filial.txt_Avance_Referencia,DAY(tb_avances_referencia_filial.dt_Fecha_Registro) as dia,MONTH(tb_avances_referencia_filial.dt_Fecha_Registro) as mes, YEAR(tb_avances_referencia_filial.dt_Fecha_Registro) as anio, DATE_FORMAT(tb_avances_referencia_filial.dt_Fecha_Registro,' @ % %l:%i:%s %p') AS ds, CONCAT(cat_Usuarios.str_Nombre,' ',cat_Usuarios.str_Ap_Paterno,' ',cat_Usuarios.str_Ap_Materno) as Nombre_Usuario,cat_Filial.str_Filial FROM tb_avances_referencia_filial LEFT JOIN cat_Usuarios ON tb_avances_referencia_filial.id_Usuario =  cat_Usuarios.id_Usuario LEFT JOIN cat_Filial ON tb_avances_referencia_filial.id_Filial = cat_Filial.id_Filial WHERE tb_avances_referencia_filial.referencia = '".$_GET['referencia']."'  AND tb_avances_referencia_filial.ser_n = '".$ser_n_ok."' ORDER BY dt_Fecha_Registro DESC";
		//echo $query;
			$RS_avances= TraeRecordset($query);
			if (!$RS_avances) die('Error en DB!');
			$cuantas_filas = $RS_avances->RecordCount();
			if ($cuantas_filas > 0)
			{
				while(!$RS_avances->EOF)
				{
					$comentario = '<div class="status-box">'.stripslashes($RS_avances->fields(0)).'<br /><span class="time">'.ucwords(strtolower($RS_avances->fields(5)));
					if ($RS_avances->fields(6)!= "")
					{
						$comentario .= ' - '.$RS_avances->fields(6);
					}
					$comentario .= ' - '.$RS_avances->fields(1).' de '.$meses[$RS_avances->fields(2)].' de '.$RS_avances->fields(3).$RS_avances->fields(4).'</span></div>';
					echo strval($comentario);
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
    <br>
  </body>
</html>