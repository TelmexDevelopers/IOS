<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../../../adodb/adodb.inc.php');
include('../../../../includes/connection.php');
include('../../../../includes/libreria.php');
require("../includes/funciones.php");

$referencia = $_GET['referencia'];

	$SQL = "SELECT referencia, desc_serv, due_date, GRUPO_DIL_SERVICIO, edo_serv, fecha_estado, TECNOLOGIA, usuario, sector, coordinacion_abrev, dir_division, str_Fase_IOS, str_Area_responsable, SUBGERENTE_RESPONSABLE, SUPERVISOR FROM vw_ios_reg WHERE referencia = '".$referencia."'";
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
$referencia= $RS->fields(0);
$desc_serv=  $RS->fields(1);
$due_date=  $RS->fields(2);
$GRUPO_DIL_SERVICIO=  $RS->fields(3);
$edo_serv=  $RS->fields(4);
$fecha_estado=  $RS->fields(5);
$TECNOLOGIA=  $RS->fields(6);
$usuario=  $RS->fields(7);
$sector=  $RS->fields(8);
$coordinacion_abrev=  $RS->fields(9);
$dir_division=  $RS->fields(10);
$str_Fase_IOS=  $RS->fields(11);
$str_Area_responsable=  $RS->fields(12);
$SUBGERENTE_RESPONSABLE=  $RS->fields(13);
$SUPERVISOR=  $RS->fields(14);

?>
<?php
	
	//set the user id
	$_SESSION['user_id'] = 1;
	
	//connect to the db
	$link = @mysql_connect('10.94.130.36','ios_new','provi');
	@mysql_select_db('ios_new',$link);
	
	/* form submission post */
	if(isset($_POST['status']) && $_SESSION['user_id'])
	{
		//record the occurence
		$query = 'INSERT INTO test (user_id, status,fecha) VALUES ('.$_SESSION['user_id'].',\''.mysql_escape_string(htmlentities(strip_tags($_POST['status']))).'\',NOW())';
		$result = @mysql_query($query,$link);
		
		//die if this was done via ajax...
		if($_POST['ajax']) { die(); } else { $message = 'Updated!'; }
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<style type="text/css">
		*				{ font-family:tahoma; }
		h3				{ border-bottom:0; }
		
		#message	{ padding:7px 10px; float:left; width:350px; }
		#status		{ border:1px solid #999; padding:5px; width:500px; height:75px; margin:5px 0; }
		#statuses	{ width:512px; }
		#submit		{ cursor:pointer; padding:5px; border:1px solid #ccc; float:left; margin:0 20px 0 0; }
		
		.status-box	{ padding:10px 20px 10px 70px; height:48px; background:url(jose) 10px 10px no-repeat; border-bottom:1px dotted #aaa; }
		.status-box:hover	{ background-color:#eee; }
		.success		{ color:#008000; }
		.failure		{ color:#f00; }
		.time			{ color:#2a447b; font-size:10px; }
		
		
		
		.txtbox
		{
			font-family:Verdana, Geneva, sans-serif;
			font-size:12px;
			background-color: #EBEBEB;
			color: #666666;
			width: 150px;
			
			
			} 
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

/************************************************************************/
	
		function detalle_referencia(referencia)
	{
	
	//alert(referencia);
	
	light = new LightFace.IFrame
					(
		{
				height:600, 
				width:1040,
				url: 'search_ref.php?referencia=<?php echo $referencia; ?>',
				title: 'Detalle referencia' 
		}
					)
				.addButton('Close', function() 
			{ 	light.close(); 
			}	,true).open();
	}



/************************************************************************/
				window.addEvent('domready',function()
			{
				document.id('start').addEvent('click',function() 
			{
				
				light = new LightFace.IFrame(
			{
				height:450, 
				width:753,
				url: 'search_ref.php?referencia=<?php echo $referencia; ?>',
				title: 'Actualizaci&oacute;n del Detalle de Servicio' 
			}	)
				.addButton('Close', function() 
			{ 	light.close(); },true).open();
				
			});
			
		});


/********************************************************/
      	
////	alert ('hola');
	var referencia= '<?php echo $referencia; ?>';
	var desc_serv= '<?php echo $desc_serv; ?>';
	var due_date= '<?php echo $due_date; ?>';
	var GRUPO_DIL_SERVICIO= '<?php echo $GRUPO_DIL_SERVICIO; ?>';
	var edo_serv= '<?php echo $edo_serv; ?>';
	var fecha_estado= '<?php echo $fecha_estado; ?>';
	var TECNOLOGIA= '<?php echo $TECNOLOGIA; ?>';
	var usuario= '<?php echo $usuario; ?>';
	var sector= '<?php echo $sector; ?>';
	var coordinacion_abrev= '<?php echo $coordinacion_abrev; ?>';
	var dir_division= '<?php echo $dir_division; ?>';
	var str_Fase_IOS= '<?php echo $str_Fase_IOS; ?>';
	var str_Area_responsable= '<?php echo $str_Area_responsable; ?>';
	var SUBGERENTE_RESPONSABLE= '<?php echo $SUBGERENTE_RESPONSABLE; ?>';
	var SUPERVISOR= '<?php echo $SUPERVISOR; ?>';
//	alert(coment);

var datos = "referencia="+referencia+"&desc_serv="+desc_serv+"&due_date="+due_date+"&GRUPO_DIL_SERVICIO="+GRUPO_DIL_SERVICIO+"&edo_serv="+edo_serv+"&fecha_estado="+fecha_estado+"&TECNOLOGIA="+TECNOLOGIA+"&usuario="+usuario+"&sector="+sector+"&coordinacion_abrev="+coordinacion_abrev+"&dir_division="+dir_division+"&str_Fase_IOS="+str_Fase_IOS+"&str_Area_responsable="+str_Area_responsable+"&SUBGERENTE_RESPONSABLE="+SUBGERENTE_RESPONSABLE+"&SUPERVISOR="+SUPERVISOR;

//		var myHTMLRequest = new Request.HTML({
//		url: '/servicio_ref.php',
//		onRequest : function (){
//			$('html').set('html','Cargando..');
//			}	,
//		
//		onSuccess : function(tree, elements, html)	{
//			$('resultado').set('html',html);
//			}	
//		}).send({ 
//			method:'get',
//			data: datos
//		});
//	}

		window.addEvent('domready', function() {
			
			//create the message slider
			var fx = new Fx.Slide('message', {
				mode: 'horizontal'
			}).hide();
			
			//make the ajax call to the database to save the update
			var request = new Request({
				url: '<?php echo $_SERVER['PHP_SELF']; ?>',
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
							'ajax': 1
						}
					});
					
				}
				
			});
			
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
      <table width="950" border="0" align="center" class="Texto_Mediano_Gris" height="200">
      	<tr align="right">
        	<td>
              Referencia: <input type="text" name="referencia" id="referencia" class="txtbox" value="<?php echo $referencia; ?>" />
            </td>
            <td>
              Due Date: <input type="text" name="due_date" id="due_date" class="txtbox" value="<?php echo $due_date; ?>" />
            </td>
            <td>
            	Sector: <input type="text" name="sector" id="sector" class="txtbox" value="<?php echo $sector; ?>" />
            </td>
            <td>
            	Area: <input type="text" name="str_Area_responsable" id="str_Area_responsable" class="txtbox" value="<?php echo $str_Area_responsable; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
            	Fase serv: <input type="text" name="str_Fase_IOS" id="str_Fase_IOS" class="txtbox"  value="<?php echo $str_Fase_IOS; ?>" />
            </td>
            <td>
            	Usuario: <input type="text" name="usuario" id="usuario" class="txtbox" value="<?php echo $usuario; ?>" />
            </td>
            <td>
            	Tecnologia: <input type="text" name="TECNOLOGIA" id="TECNOLOGIA" class="txtbox" value="<?php echo $TECNOLOGIA; ?>" />
            </td>
            <td>
            	Dir Division: <input type="text" name="dir_division" id="dir_division" class="txtbox"  value="<?php echo $dir_division; ?>"/>
            </td>
        </tr>
      	<tr align="right">
            <td>
            	Edo del servicio: <input type="text" name="edo_serv" id="edo_serv" class="txtbox" value="<?php echo $edo_serv; ?>" />
            </td>
            <td>
            	Subgerente: <input type="text" name="SUBGERENTE_RESPONSABLE" id="SUBGERENTE_RESPONSABLE" class="txtbox" value="<?php echo $SUBGERENTE_RESPONSABLE; ?>" />
            </td>
            <td>
            	Fecha Estado: <input type="text" name="fecha_estado" id="fecha_estado" class="txtbox" value="<?php echo $fecha_estado; ?>" />
            </td>
            <td>
				Estado OT: <input type="text" name="edo_ot" id="edo_ot" class="txtbox" />
            </td>
        </tr>
      	<tr align="right">
            <td>
            	Desc servicio: <input type="text" name="desc_serv" id="desc_serv" class="txtbox" value="<?php echo $desc_serv; ?>" />
            </td>
            <td>
            	Supervisor: <input type="text" name="SUPERVISOR" id="SUPERVISOR" class="txtbox" value="<?php echo $SUPERVISOR; ?>" />
            </td>
            <td>
            	Dilacion total: <input type="text" name="GRUPO_DIL_SERVICIO" id="GRUPO_DIL_SERVICIO" class="txtbox" value="<?php echo $GRUPO_DIL_SERVICIO; ?>" />
            </td>
            <td>
            	OT: <input type="text" name="ot" id="ot" class="txtbox" />
            </td>
        </tr>
      	<tr align="right">
            <td>
            	Fase IOS: <input type="text" name="str_Fase_IOS" id="str_Fase_IOS" class="txtbox" />
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
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
    <!--TERMINA PRIMER TAB-->
    
	<div>
	<input id="ac-2" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-2">Registro de Avances</label>
		<article class="ac-large"><br />
        <left>
          <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                <table width="800" border="0" align="center" class="Texto_Mediano_Gris">
                  <tr valign="bottom">
                    <td align="left">&nbsp;&nbsp;
                        <textarea name="status" id="status" cols="300"></textarea><br />
                    </td>
                    <td>
                        <div id="message"><?php echo $message; ?></div>
                        <input type="button" value="Registrar Comentario" id="submit" />
                    </td>
                  </tr>
<!--                  <tr>
                    <td>
                        <input type="button" value="Refrescar" onclick="document.location.reload()" />
                    </td>
                  </tr>
-->                </table>
            </form>
        </left>
   
	<div class="clear"></div>
	<br />
	<h3>&nbsp;&nbsp;Comentarios recientes</h3>
	<div id="statuses" style="max-height:350px; width:800px; overflow:auto;">
		<?php
			//get the latest 20
$query  = 'SELECT status, DATE_FORMAT(fecha,\'%M %D, %Y @ % %l:%i:%s %p\') AS ds FROM test ORDER BY fecha DESC LIMIT 20';
			$result = mysql_query($query,$link) or die(mysql_error().': '.$query);
			while($row = mysql_fetch_assoc($result))
			{
	echo '<div class="status-box" >',stripslashes($row['status']),'<br /><span class="time">',$row['ds'],'</span></div>';
			}
		?>
    </div>    
    <br />
	</article>
	</div>
    <!--TERMINA SEGUNDO TAB-->

<div>
	<input id="ac-3" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-3">PUNTA A</label>
	<article class="ac-small">
	<br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
        Usuario: <input type="text" name="caja3" id="caja3" class="txtbox" />
            </td>
            <td>
        Direccion: <input type="text" name="caja7" id="caja7" class="txtbox" />
            </td>
            <td>
        Estado: <input type="text" name="caja11" id="caja11" class="txtbox" />
            </td>
            <td>
		Poblacion: <input type="text" name="caja13" id="caja13" class="txtbox" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		Responsable: <input type="text" name="caja4" id="caja4" class="txtbox" />
            </td>
            <td>
		Telefono: <input type="text" name="caja8" id="caja8" class="txtbox" />
            </td>
            <td>
		Dir Division: <input type="text" name="dir_division2" id="dir_division2" class="txtbox" />
            </td>
            <td>
		Coordinacion: <input type="text" name="coordinacion_abrev" id="coordinacion_abrev" class="txtbox" value="<?php echo $coordinacion_abrev; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
        Coordinacion Abrev: <input type="text" name="caja5" id="caja5" class="txtbox" />
            </td>
            <td>
		Pta Dir Div: <input type="text" name="caja9" id="caja9" class="txtbox" />
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
        	<td>
        Usuario: <input type="text" name="caja3" id="caja3" class="txtbox" />
            </td>
            <td>
        Direccion: <input type="text" name="caja7" id="caja7" class="txtbox" />
            </td>
            <td>
        Estado: <input type="text" name="caja11" id="caja11" class="txtbox" />
            </td>
            <td>
		Poblacion: <input type="text" name="caja13" id="caja13" class="txtbox" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		Responsable: <input type="text" name="caja4" id="caja4" class="txtbox" />
            </td>
            <td>
		Telefono: <input type="text" name="caja8" id="caja8" class="txtbox" />
            </td>
            <td>
		Dir Division: <input type="text" name="caja12" id="caja12" class="txtbox" />
            </td>
            <td>
		Coordinacion: <input type="text" name="coordinacion_abrev" id="coordinacion_abrev" class="txtbox" />
            </td>
        </tr>
      	<tr align="right">
            <td>
        Coordinacion Abrev: <input type="text" name="caja5" id="caja5" class="txtbox" />
            </td>
            <td>
		Pta Dir Div: <input type="text" name="caja9" id="caja9" class="txtbox" />
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

    <!--TERMINA CUARTO TAB-->

<div>
	<input id="ac-5" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-5">SUBENLACES</label>
	<article class="ac-small">
    <br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
			A1: <input type="text" name="caja15" id="caja15" class="txtbox" />
            </td>
            <td>
		    AN: <input type="text" name="caja19" id="caja19" class="txtbox" />
            </td>
            <td>
			D1: <input type="text" name="caja24" id="caja36" class="txtbox" />
            </td>
            <td>
		    DN:
          <input type="text" name="caja26" id="caja37" class="txtbox" />
            </td>
        </tr>
      	<tr align="right">
            <td>
   			BN: <input type="text" name="caja17" id="caja17" class="txtbox" />
            </td>
            <td>
		    B1: <input type="text" name="caja20" id="caja20" class="txtbox" />
            </td>
            <td>
   			RIN_A: <input type="text" name="caja25" id="caja40" class="txtbox" />
            </td>
            <td>
		    RIN_B: <input type="text" name="caja34" id="caja41" class="txtbox" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    RSE_B: <input type="text" name="caja18" id="caja18" class="txtbox" />
            </td>
            <td>
		    RSE_A: <input type="text" name="caja23" id="caja23" class="txtbox" />
			</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
 		</tr>
  </table>
  </article>
	</div>
    <!--TERMINA QUINTO TAB-->
 
 <div>
    <input id="ac-6" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-6">OBSERVACIONES SISA</label>
	<article class="ac-medium">
    <br />
    <textarea name="observaciones" id="observaciones" cols="45" rows="5"></textarea>
    <br />
	   </article>
   			</div>
    <!--TERMINA SEXTO TAB-->

 <div>
   	<input id="ac-7" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-7">ENTREGA A </label>
	<article class="ac-large">
    <br />
	<table width="950" border="0" align="center" class="Texto_Mediano_Gris" height="350">
      	<tr align="right">
        	<td>
            OT: <input type="text" name="caja27" id="caja24" style="width: 180px" />
            </td>
            <td>
   			Fecha_Envio_Entrega: <input type="text" name="caja44" id="caja43" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Empresa Filial: <input type="text" name="caja29" id="caja25" style="width: 180px" />
            </td>
            <td>
		    Fecha_Envio_Const: <input type="text" name="caja45" id="caja44" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
    		Coord_Contratista: <input type="text" name="caja30" id="caja26" style="width: 180px" />
            </td>
            <td>
		    Fecha Elaboraci&oacute;n: <input type="text" name="caja46" id="caja45" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Tel_Coord: <input type="text" name="caja31" id="caja27" style="width: 180px" />
            </td>
            <td>
		    Fecha Asignaci&oacute;n: <input type="text" name="caja47" id="caja46" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Estatus Filial: <input type="text" name="caja32" id="caja29" style="width: 180px" />
            </td>
            <td>
    		Fecha Aceptaci&oacute;n: <input type="text" name="caja36" id="caja47" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
    		Respon. Instalador: <input type="text" name="caja33" id="caja30" style="width: 180px" />
            </td>
            <td>
		    Fecha Programada Construcci&oacute;n: <input type="text" name="caja37" id="caja48" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
			Asosiado: <input type="text" name="caja57" id="caja31" style="width: 180px" />
            </td>
            <td>
		    Fecha Programada: <input type="text" name="caja38" id="caja49" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Actividad: <input type="text" name="caja65" id="caja32" style="width: 180px" />
            </td>
            <td>
		    Fecha Programada Entrega: <input type="text" name="caja39" id="caja50" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
    		CTL A: <input type="text" name="caja69" id="caja33" style="width: 180px" />
            </td>
            <td>
		    Fecha Construcci&oacute;n Terminado: <input type="text" name="caja40" id="caja51" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Contratista A: <input type="text" name="caja70" id="caja34" style="width: 180px" />
            </td>
            <td>
		    Fecha Devoluci&oacute;n: <input type="text" name="caja41" id="caja52" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Tel_Contratista_A : <input type="text" name="caja71" id="caja35" style="width: 180px" />
            </td>
            <td>
		    Fecha_Real_Entrega: <input type="text" name="caja42" id="caja53" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    CTL B: <input type="text" name="caja72" id="caja38" style="width: 180px" />
            </td>
            <td>
		    Fecha_obras_Canceladas: <input type="text" name="caja43" id="caja54" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Contratista B: <input type="text" name="caja73" id="caja39" style="width: 180px" />
            </td>
            <td>
		    Tel_Contratista_B: <input type="text" name="caja35" id="caja42" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		</table>
  		</article>
	</div>
    <!--TERMINA SÉPTIMO TAB-->
 
<div>
   	<input id="ac-8" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-8">ENTREGA B </label>
	<article class="ac-large">
    <br />
	<table width="950" border="0" align="center" class="Texto_Mediano_Gris" height="350">
      	<tr align="right">
        	<td>
            OT: <input type="text" name="caja27" id="caja24" style="width: 180px" />
            </td>
            <td>
   			Fecha_Envio_Entrega: <input type="text" name="caja44" id="caja43" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Empresa Filial: <input type="text" name="caja29" id="caja25" style="width: 180px" />
            </td>
            <td>
		    Fecha_Envio_Const: <input type="text" name="caja45" id="caja44" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
    		Coord_Contratista: <input type="text" name="caja30" id="caja26" style="width: 180px" />
            </td>
            <td>
		    Fecha Elaboraci&oacute;n: <input type="text" name="caja46" id="caja45" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Tel_Coord: <input type="text" name="caja31" id="caja27" style="width: 180px" />
            </td>
            <td>
		    Fecha Asignaci&oacute;n: <input type="text" name="caja47" id="caja46" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Estatus Filial: <input type="text" name="caja32" id="caja29" style="width: 180px" />
            </td>
            <td>
    		Fecha Aceptaci&oacute;n: <input type="text" name="caja36" id="caja47" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
    		Respon. Instalador: <input type="text" name="caja33" id="caja30" style="width: 180px" />
            </td>
            <td>
		    Fecha Programada Construcci&oacute;n: <input type="text" name="caja37" id="caja48" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
			Asosiado: <input type="text" name="caja57" id="caja31" style="width: 180px" />
            </td>
            <td>
		    Fecha Programada: <input type="text" name="caja38" id="caja49" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Actividad: <input type="text" name="caja65" id="caja32" style="width: 180px" />
            </td>
            <td>
		    Fecha Programada Entrega: <input type="text" name="caja39" id="caja50" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
    		CTL A: <input type="text" name="caja69" id="caja33" style="width: 180px" />
            </td>
            <td>
		    Fecha Construcci&oacute;n Terminado: <input type="text" name="caja40" id="caja51" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Contratista A: <input type="text" name="caja70" id="caja34" style="width: 180px" />
            </td>
            <td>
		    Fecha Devoluci&oacute;n: <input type="text" name="caja41" id="caja52" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Tel_Contratista_A : <input type="text" name="caja71" id="caja35" style="width: 180px" />
            </td>
            <td>
		    Fecha_Real_Entrega: <input type="text" name="caja42" id="caja53" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    CTL B: <input type="text" name="caja72" id="caja38" style="width: 180px" />
            </td>
            <td>
		    Fecha_obras_Canceladas: <input type="text" name="caja43" id="caja54" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Contratista B: <input type="text" name="caja73" id="caja39" style="width: 180px" />
            </td>
            <td>
		    Tel_Contratista_B: <input type="text" name="caja35" id="caja42" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		</table>
  		</article>
	</div>
    <!--TERMINA OCTAVO TAB-->

<div>
	<input id="ac-9" name="accordion-1" type="checkbox" style="visibility:hidden" />
  	<label for="ac-9">RESPONSABLE RDA </label>
    <article class="ac-medium">
    <br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
			Subgerente Responsable: <input type="text" name="caja48" id="caja70" style="width: 180px" />
            </td>
            <td>
			IPE Documentaci&oacute;n: <input type="text" name="caja50" id="caja72" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
			IPE_Entrega: <input type="text" name="caja51" id="caja73" style="width: 180px" />
            </td>
            <td>
			IPE Registrado en SISA: <input type="text" name="SISA" id="SISA" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
			IPE_Seguimiento: <input type="text" name="caja52" id="caja74" style="width: 180px" />
            </td>
            <td>
			IPE_Analisis: <input type="text" name="caja53" id="caja75" style="width: 180px" />
			</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
 		</tr>
  		</table>
   	 </article>
	</div>
    <!--TERMINA NOVENO TAB-->
    
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
   	 </article>
	</section>
	</div>
    <!--TERMINA DÉCIMO TAB-->
    <div id="resultado"></div>
        </body>
</html>