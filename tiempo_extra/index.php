<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../adodb/adodb.inc.php');
include('../includes/connection.php');
require("../includes/funciones.php");
//$_SESSION['id_Usuario'] = 2;
//$_SESSION['id_Tipo_Usuario'] = 2;
//$_SESSION['id_Area_Responsable'] = 4;

$id_Usuario_CargaTE = $_SESSION['id_Usuario'];
$id_Tipo_Usuario = $_SESSION['id_Tipo_Usuario'];
$id_Area_Responsable = $_SESSION['id_Area_Responsable'];

if ($_SESSION['id_Tipo_Usuario'] == 4 || $_SESSION['id_Tipo_Usuario'] == 5)
{
	header('Location: index.php');
} else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>IOS - Asignaci&oacute;n de Responsables</title>
 <style type="text/css">
  .filas_tabla_responsables
  {
	  padding: 3px;
	  height: 25px;
	  background-color:#FFF;
	}
	
	.combo
	{
		width: 150px;	
		
		}
 </style>
    <script type="text/javascript" src="../scripts/mootools-core-1.4.5-full-compat.js"> </script>
    <script type="text/javascript" src="../scripts/mootools-more-1.4.0.1.js"> </script>

	<script src="../scripts/datepicker/Source/Locale.es-ES-DatePicker.js" type="text/javascript"></script>
    <script src="../scripts/datepicker/Source/Picker.js" type="text/javascript"></script>
    <script src="../scripts/datepicker/Source/Picker.Attach.js" type="text/javascript"></script>
    <script src="../scripts/datepicker/Source/Picker.Date.js" type="text/javascript"></script>

    <link href="../scripts/datepicker/Source/datepicker_vista/datepicker_vista.css" rel="stylesheet">
    <link rel="stylesheet" media="screen" type="text/css" href="../css/ios.css" />

    <!--<script type="text/javascript" src="mootools-calendar/javascript/mootools/calendar.js"></script>-->
	<script type="text/javascript">
	
	window.addEvent('domready', function() {		
			Locale.use('es-ES');
			new Date().format('db');
		var fecha_ini = new Picker.Date($$('#hora_ini'), {
			pickerClass: 'datepicker_vista',
			timePicker: true,
			format: '%Y-%m-%d %H:%M:%S',
			positionOffset: {x: 5, y: 0},
			useFadeInOut: !Browser.ie,
			minDate: '2013-01-01',
		});
		
		var fecha_fin = new Picker.Date($$('#hora_fin'), {
			pickerClass: 'datepicker_vista',
			timePicker: true,
			format: '%Y-%m-%d %H:%M:%S',
			positionOffset: {x: 5, y: 0},
			useFadeInOut: !Browser.ie,
			minDate: '2013-01-01'
		});

		$('ipe').addEvent('change', function(){
			busca_datos_ipe();
			horas_extras_cargadas_ipe();
		}
		);
		$('calcular_hrs').addEvent('click',calcula_tiempo);
		$('guardar_datos').addEvent('click',guardar_datos);

});

function Tabla_Horas_cargadas()
{
			var myHTMLRequest = new Request.HTML({
			url: 'busca_datos_ipe_te.php',
			onRequest: function(){
				myElement.set('html', 'Cargando Datos...');
			},
			onSuccess: function(responseTree, responseElements, responseHTML, responseJavaScript){
				$('tabla_horas_cargadas').set('html', responseHTML);
			},
			onFailure: function(){
				myElement.set('text', 'Sorry, your request failed :(');
			}
		}).send(
		{
			method : 'get',
			data : 'ipe='+id_Usuario_IPE
		}
		);
}

function busca_datos_ipe()
{
	var id_Usuario_IPE = $('ipe').value;
	var myElement = $('expediente');
	
	if (id_Usuario_IPE != "")
	{
//		var horas_cargadas = Tabla_Horas_cargadas();
		
		var myHTMLRequest = new Request.JSON({
			url: 'busca_datos_ipe_te.php',
			onRequest: function(){
				myElement.set('html', 'Cargando Datos...');
			},
			onSuccess: function(responseJSON, responseText){
				//myElement.set('html', responseHTML);
				var json = JSON.parse(responseText);
				myElement.set('html', '');

				$('expediente').set('html', json.str_Expediente);
				$('supervisor').set('html', json.str_Nombre_Sup);
				$('subgerente').set('html', json.str_Nombre_SG);
				
				
			},
			onFailure: function(){
				myElement.set('text', 'Sorry, your request failed :(');
			}
		}).send(
		{
			method : 'get',
			data : 'ipe='+id_Usuario_IPE
		}
		);
	} else {
				$('expediente').set('html', 'Seleccione IPE...');
				$('supervisor').set('html', '');
				$('subgerente').set('html', '');
	}
	
}

function horas_extras_cargadas_ipe()
{
	var id_Usuario_IPE = $('ipe').value;
	var myElement = $('tabla_horas_cargadas');
	
	if (id_Usuario_IPE != "")
	{
//		var horas_cargadas = Tabla_Horas_cargadas();
		
		var myHTMLRequest = new Request.HTML({
			url: 'tiempo_extra_cargado.php',
			onRequest: function(){
				myElement.set('html', '<img src="../images/loading.gif" width="32" height="32" alt="Loading..." />');
			},
			onSuccess: function(responseTree, responseElements, responseHTML, responseJavaScript){
				myElement.set('html', responseHTML);
			},
			onFailure: function(){
				myElement.set('text', 'Sorry, your request failed :(');
			}
		}).send(
		{
			method : 'get',
			data : 'ipe='+id_Usuario_IPE
		});
	} else {
		myElement.set('html', '');	
	}
	
}

function calcula_tiempo()
{
	var hora_ini = $('hora_ini').value;
	var hora_fin = $('hora_fin').value;

	if (hora_ini != '' && hora_fin != '')
	{
			hora_ini = hora_ini;
			hora_fin = hora_fin;
			
			var ini = hora_ini.split(' ');
			var fin = hora_fin.split(' ');

			var fecha_ini = ini[0];
			var fecha_fin = fin[0];

			var f_ini = fecha_ini.split('-');
			var f_fin = fecha_fin.split('-');
			
			var dia_ini = f_ini[2];
			var mes_ini = f_ini[1];
			var anio_ini = f_ini[0];

			var dia_fin = f_fin[2];
			var mes_fin = f_fin[1];
			var anio_fin = f_fin[0]
			;
			var fecha_ini_OK = mes_ini+"/"+dia_ini+"/"+anio_ini+" "+ini[1];
			var fecha_fin_OK = mes_fin+"/"+dia_fin+"/"+anio_fin+" "+fin[1];
			
			var d1 = new Date(fecha_ini_OK); //"now"
			var d2 = new Date(fecha_fin_OK);  // some date
//			alert (d1+" - "+d2)
			
		if (Math.abs(d1>=d2))
		{
			$('hrs_totales').value = '';
			$('horas_totales_hidden').value = '';
			alert('La hora de inicio es mayor que o igual a la hora fin, favor de corregir datos');
			return false;
		} else {
			var diff = Math.abs(d1-d2);
			diff = diff*1; 
			diff = diff/1000;
			if (dia_ini < dia_fin)
			{
				diff = diff-2505600;
				var diferencia = dia_fin-dia_ini;
				var resta = diferencia * diff;
				diff = resta;
			}
			diff = diff/60;
			diff = diff/60;
			
			$('hrs_totales').value = diff;
			$('horas_totales_hidden').value = diff;
		}
	} else {
		alert("Ingrese Hora Inicio y Fin");
		return false;
	}
}

function guardar_datos()
{
	MooTools.lang.setLanguage("es-ES");
	validate = new Form.Validator.Inline("frmValidar");
	var myElement = $('tabla_horas_cargadas');
	if (validate.validate()) {
		if (confirm('¿Desea guardar la informacion?'))
		{
			var myHTMLRequest = new Request.HTML({
				url: 'save_extra_time.php',
				onRequest: function(){
					myElement.set('html', '<br /><br /><img src="../images/loading.gif" width="20" height="20" alt="Loading..." />');
				},
				onSuccess: function(responseTree, responseElements, responseHTML, responseJavaScript){
					myElement.set('html', responseHTML);
				},
				onFailure: function(){
					myElement.set('text', 'Sorry, your request failed :(');
				}
			}).post($('frmValidar'));
		}
	}
}

    </script>
</head>

<body>
<div align="center">
    <div id="container">
      <div id="body_space">
        <div id="header">
		  <div id="logo-block">
		    <!-- type your logo and small slogan here -->
            <p id="logo"><a href="logout.php"><img src="../images/telmex.jpg" width="158" height="89" alt="TELMEX" border="0" /></a></p>
		    <!-- <p id="slogan">a small website slogan goes here</p>
			end logo and small slogan -->
		  </div>
		  <div id="definels">
		    <!-- login -->
		    <div id="login_top">
            <p style="font-size:10px;"><?php echo date("l, F jS Y "); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://10.94.130.36/iosphp/TELMEX_IOS/logout.php">Cerrar Sistema</a></p>
			</div>
			<!-- end login -->
			<!-- search -->
			<div id="search">
			  <!--<form name="search" method="get" action="">
              Buscar Referencia: 
                <input type="text" class="box" />
                <button class="btn" title="Buscar Referencia">Buscar</button>
              </form>-->
            </div>
		    <!-- end search -->
		  </div>
		  <div class="cls"></div>
  		  <div id="top-nav-bg">
            <div id="top-nav">
			  <!-- start top navigation bar -->
				<?php echo CreaHeader(); ?>
			  <!-- end top navigation bar -->
            </div>
	      </div>          
	    </div>
	  </div>
	</div>
  <div id="page">
	  <div id="page-padding">
        <!-- start content -->
	    <div id="content">
	      <div id="content-padding">
          <center>
          <p class="Titulo_Gris"><center><b>Tiempo Extra</b></center></p>
<form id="frmValidar" name="frRegister" method="post" action=""> 
<table width="650" border="0">
  <tr>
    <td width="130"><input name="id_Usuario_CargaTE" type="hidden" id="id_Usuario_CargaTE" value="<?php echo $id_Usuario_CargaTE; ?>" />IPE:</td>
    <td width="300"><?php echo imprime_combo_ipe_TE(); ?></td>
    <td width="100">Referencia(s):</td>
    <td rowspan="8"><textarea name="referencias" cols="13" rows="12" id="referencias" class="required"></textarea></td>
 </tr>
  <tr>
    <td>Expediente:</td>
    <td width="300" colspan="2"><div id="expediente" style=" font-weight:bold">Seleccione IPE...</div></td>
  </tr>
  <tr>
    <td>Supervisor:</td>
    <td colspan="2"><div id="supervisor" style=" font-weight:bold"></div></td>
  </tr>
  <tr>
    <td>Subgerente:</td>
    <td colspan="2"><div id="subgerente" style=" font-weight:bold"></div></td>
  </tr>
  <tr>
    <td>Hora Inicio:</td>
    <td colspan="2"><input name="hora_ini" type="text" id="hora_ini" class="required" /></td>
  </tr>  
  <tr>
    <td>Hora Fin:</td>
    <td colspan="2"><input name="hora_fin" type="text" id="hora_fin" class="required" /></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
  	<td colspan="2"><input name="calcular_hrs" type="button" id="calcular_hrs" value="Calcular Horas Totales" /></td>
  </tr>
  <tr>
    <td>Horas Totales:</td>
    <td colspan="2"><input name="hrs_totales" type="text" id="hrs_totales" disabled="disabled" /> <input name="horas_totales_hidden" type="text" id="horas_totales_hidden" style=" visibility:hidden;" class="required" /><!-- --></td>
  </tr>  
    <tr>
    <td>Motivo:</td>
    <td colspan="3"><?php echo Combo_Motivos_TE(''); ?></td>
  </tr>  
  <tr>
    <td>Comentarios:</td>
    <td colspan="3"><textarea name="comentarios" cols="60" rows="3" id="comentarios"></textarea></td>
  </tr> 
  <tr>
    <td colspan="4" align="center"><input name="guardar_datos" type="button" id="guardar_datos" value="Guardar Datos" /></td>
  </tr> 
   
</table>
</form>
<div id="tabla_horas_cargadas" align="center"></div>
    </center>      

		  </div>
		</div>
		<!-- end content -->
	  </div>
	  <div id="footer">
	    <div id="footer-pad">
	      <div class="line"></div>
		  <!-- footer and copyright notice -->
	      <p>Telmex&reg; 2013</p>
		  <!-- end footer and copyright notice -->
	    </div>
	  </div>
	</div>


</div>
</body>
</html>
<?php 
}
?>