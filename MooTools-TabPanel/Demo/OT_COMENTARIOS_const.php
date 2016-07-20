<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');
include('../../CSS3Accordion/libreria_equipo_fo.php');
require("../../includes/funciones.php");
$CheckSession = CheckSession();

$referencia = $_GET['referencia'];
$id_tramos = $_GET['id_tramos'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta http-equiv="refresh" content="156099671098563" > 
<!--<meta http-equiv="refresh" content="156099671098563" > -->
<head>
	<title>Historico</title>
	<style type="text/css">
		*				{ font-family:tahoma; }
		h3				{ border-bottom:0; }
		
		#message		{ padding:7px 10px; float:left; width:350px; }
		#status		{ border:1px solid #999; padding:5px; width:500px; height:75px; margin:5px 0; }
		#statuses	{ width:512px; }
		#submit		{ cursor:pointer; padding:5px; border:1px solid #ccc; float:left; margin:0 20px 0 0; }
		
		.status-box	{ padding:10px 20px 10px 70px; height:48px; background:url(jose) 10px 10px no-repeat; border-bottom:1px dotted #aaa; }
		.status-box:hover	{ background-color:#eee; }
		.success		{ color:#008000; }
		.failure		{ color:#f00; }
		.time			{ color:#2a447b; font-size:10px; }
		
	</style>
	<style>
		@import "../../Busqueda_Principal/LightFace/Assets/LightFace.css";
	</style>
<!--	librerias mootoools-->
<!--<script type="text/javascript" src="moo1.2.js">-->
</script>

<script type="text/javascript" src="../../scripts/mootools-core-1.4.5-full-compat.js"></script>
<script type="text/javascript" src="../../scripts/mootools-more-1.4.0.1.js"></script>
<link rel="stylesheet" href="../../Busqueda_Principal/LightFace/Assets/lightface.css" />
    		 <script src="../../Busqueda_Principal/LightFace/Source/LightFace.js"></script>
			<script src="../../Busqueda_Principal/LightFace/Source/LightFace.IFrame.js"></script>
			<script src="../../Busqueda_Principal/LightFace/Source/LightFace.Image.js"></script>
			<script src="../../Busqueda_Principal/LightFace/Source/LightFace.Request.js"></script>
			<script  src="../../Busqueda_Principal/LightFace/Source/LightFace.Static.js"></script>

	<script type="text/javascript">
	
		
		window.addEvent('domready', function() {
			
			//create the message slider
			var fx = new Fx.Slide('message', {
				mode: 'horizontal'
			}).hide();
			
			//make the ajax call to the database to save the update
			var request = new Request({
				url: 'insert_comentarios_equip_const.php',
				method: 'post',
				onRequest: function() {
					$('submit').disabled = 1;
				},
				onComplete: function(response) {
					$('submit').disabled = 0;
					$('message').removeClass('success').removeClass('failure');
					(function() { fx.slideOut(); }).delay(300);
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
					$('message').set('text','El comentario no pudo ser ingresado. Intente de nuevo').addClass('failure');
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
							'ajax': 1
						}
					});
					
				}
				
			});
			
		});
		
				   function abre_ventana_const()
	  {
	  var referencia = '<?php echo $referencia; ?>';
	  var id_tramos = '<?php echo $id_tramos; ?>';
		  light = new LightFace.IFrame({
					  height:400, 
					  width:800,
					  url: 'OT_COMENTARIOS.php?referencia='+referencia+"&id_tramos="+id_tramos,
					  title: 'Comentarios' 
			  }).addButton('Cerrar', function() 
				  { 	light.close(); 
				  }	,true).open();
	  }
	  
		 window.addEvent('domready',function()
			  {
				  document.id('abrir').addEvent('click',abre_ventana_const);
			  
			    });
		   function abre_ventana_comentarios()
	  {
	  var referencia = '<?php echo $referencia; ?>';
	  var id_tramos = '<?php echo $id_tramos; ?>';
		  light = new LightFace.IFrame({
					  height:400, 
					  width:800,
					  url: 'OT_COMENTARIOS.php?referencia='+referencia+"&id_tramos="+id_tramos,
					  title: 'Comentarios' 
			  }).addButton('Cerrar', function() 
				  { 	light.close(); 
				  }	,true).open();
	  }
	  
		 window.addEvent('domready',function()
			  {
				  document.id('start').addEvent('click',abre_ventana_comentarios);
			  
			    });

	</script>
</head>
<body>
<button id="abrir">Ingresar comentarios Const</button>
<button id="start">Ingresar comentarios FO</button>
	    <div style="height:384px; overflow:auto; width:950px;">
    <fieldset>
    <legend><strong>Comentarios</strong></legend>  
    <div class="avances_referencia">
	</div>
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
			$query  = "SELECT tb_avances_referencia_const.txt_Avance_Referencia,DAY(tb_avances_referencia_const.dt_Fecha_Registro) as dia,MONTH(tb_avances_referencia_const.dt_Fecha_Registro) as mes, YEAR(tb_avances_referencia_const.dt_Fecha_Registro) as anio, DATE_FORMAT(tb_avances_referencia_const.dt_Fecha_Registro,' @ % %l:%i:%s %p') AS ds, CONCAT(cat_Usuarios.str_Nombre,' ',cat_Usuarios.str_Ap_Paterno,' ',cat_Usuarios.str_Ap_Materno) as Nombre_Usuario FROM tb_avances_referencia_const LEFT JOIN cat_Usuarios ON tb_avances_referencia_const.id_Usuario =  cat_Usuarios.id_Usuario WHERE tb_avances_referencia_const.referencia = '".$_GET['referencia']."'  ORDER BY dt_Fecha_Registro DESC";
			//echo $query;
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

</body></html>
