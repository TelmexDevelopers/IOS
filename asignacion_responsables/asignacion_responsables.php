ndex.ph<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../adodb/adodb.inc.php');
include('../includes/connection.php');
require("../includes/funciones.php");
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
    <link rel="stylesheet" media="screen" type="text/css" href="../css/ios.css" />
	<script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"> </script>
    <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"> </script>
	<script type="text/javascript">
		window.addEvent('domready', function() {
			$('ultima_fila').set('value', 0);
			$('crea_tabla_referencias').addEvent('click',agrega_bloque_filas);
			$('agregar').addEvent('click',agrega_filas);
			$('guardar').addEvent('click',guarda_informacion);
		});
		
		function crea_combo_subgerentes(fila)
		{
			var html = '<select name="referencia[][subgerente]" id="subgerente_'+fila+'" class="required combo"><option value="">Seleccione</option><?php echo opciones_usuarios(2, 4,''); ?></select>';
			
			return html;	
		}

		function crea_combo_supervisores(fila)
		{
			var html = '<select name="referencia[][supervisor]" id="supervisor_'+fila+'" class="required combo"><option value="">Seleccione</option><?php echo opciones_usuarios(3, 4,''); ?></select>';
			
			return html;	
		}
		
		function dispose_row(fila)
		{
			$('referencia_'+fila).dispose();
			$('subgerente_'+fila).dispose();
			$('supervisor_'+fila).dispose();
			$('tabla_responsables_'+fila).dispose();
			$('filas_tabla').value = ($('filas_tabla').value*1)-1;
			var myElement = document.id('mensaje');
			myElement.set('html', '');

		}

		function add_row(referencia)
		{
			var myElement = document.id('mensaje');
			myElement.set('html', '');

			var fila = ($('ultima_fila').value*1) + 1;
			$('ultima_fila').set('value', fila);
			//alert("hola");
			var myTable = new HtmlTable($('tabla_responsables'));
			myTable.push([
			{// 1
				content: fila,
				properties: {
					align: 'center'
				}
			},
			{// 2
				content: '<input name="referencia[][referencia]" type="text" id="referencia_'+fila+'" tabindex="'+fila+'" maxlength="13" value="'+referencia+'" class="required validate-referencia-telmex" />',
				properties: {
					align: 'center'
				}
			},
			{// 3
				content: crea_combo_subgerentes(fila),
				properties: {
					align: 'center'
				}	
			},
			{// 4
				content: crea_combo_supervisores(fila),
				properties: {
					align: 'center'
				}
			},
			{// 5
				content: '<a href="javascript:dispose_row('+fila+');"><img src="images/trash_16x16.gif" width="16" height="16" alt="Eliminar" border="0" /></a>',
				properties: {
					align: 'center'
				}}
			],
			{
				id : 'tabla_responsables_'+fila,
				class : 'filas_tabla_responsables'
			});
			$('filas_tabla').value = ($('filas_tabla').value*1)+1;

		}
		
		function agrega_filas()
		{
			var numero_filas = $('numero_filas').value;
			for (x=0;x<=((numero_filas*1)-1);x++)
			{
				var addrow = add_row('');
			}

		}

		function agrega_bloque_filas()
		{
			var textarea_referencias = $('textarea_referencias').value;
			var elementos_textarea = textarea_referencias.split('\n');
			if (textarea_referencias != '')
			{
				for (x=0;x<=(elementos_textarea.length-1);x++)
				{
					var addrow = add_row(elementos_textarea[x]);
				}
				 $('textarea_referencias').value = '';
			} else {
				alert ("Ingrese referencias por favor...");
			}
		}
		
		function guarda_informacion()
		{
			var myElement = document.id('mensaje');
			myElement.set('html', '');
			if ($('filas_tabla').value > 0)
			{
				var tabla_responsables = document.id('tabla_responsables');
				MooTools.lang.setLanguage("es-ES");
				validate = new Form.Validator.Inline("registro_responsables");
				if (validate.validate())
				{
					if (confirm('¿Desea guardar la informacion?'))
					{
						var myHTMLRequest = new Request.HTML({
							url: 'asigna_responsables.php',
							onRequest: function(){
								myElement.set('html', '<img src="images/loading.gif" width="20" height="20" alt="Loading..." />');
							},
							onSuccess: function(responseTree, responseElements, responseHTML, responseJavaScript){
								myElement.set('html', responseHTML);
								//tabla_responsables.set('html', '<tr align="center" bgcolor="#0066CC" class="Texto_Mediano_Blanco"><td><b>#</b></td><td><b>Referencia</b></td><td><b>Subgerente</b></td><td><b>Supervisor</b></td><td><b>Opciones</b><input name="ultima_fila" type="hidden" id="ultima_fila" value="0" /><input name="filas_tabla" type="hidden" id="filas_tabla" value="0" /></td></tr>');
							},
							onFailure: function(){
								myElement.set('text', 'Sorry, your request failed :(');
							}
						}).post($('registro_responsables'));
					}
				}
			} else {
				alert ("Ingrese referencias por favor...");
				
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
            <p id="logo"><a href="logout.php"><img src="images/telmex.jpg" width="158" height="89" alt="TELMEX" border="0" /></a></p>
		    <!-- <p id="slogan">a small website slogan goes here</p>
			end logo and small slogan -->
		  </div>
		  <div id="definels">
		    <!-- login -->
		    <div id="login_top">
            <p style="font-size:10px;"><?php echo date("l, F jS Y "); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Cerrar Sistema</a></p>
			</div>
			<!-- end login -->
			<!-- search -->
			<div id="search">
			  <form name="search" method="get" action="">
              Buscar Referencia: 
                <input type="text" class="box" />
                <button class="btn" title="Buscar Referencia">Buscar</button>
              </form>
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
<table width="350" border="0">
  <tr align="center">
    <td colspan="2"><b>Agregar filas</b></td>
  </tr>
  <tr align="center">
      <td colspan="2" height="5"><spacer></spacer></td>
  </tr>
  <tr align="center">
    <td>N&uacute;mero Filas: <input name="numero_filas" type="text" id="numero_filas" size="2" maxlength="2" value="1" /></td>
    <td align="left"><input name="agregar" type="button" id="agregar" value="Agregar" /></td>
  </tr>
  <tr align="center">
      <td colspan="2" height="5"><spacer></spacer></td>
  </tr>
  <tr align="center">
      <td colspan="2"><input name="guardar" type="button" id="guardar" value="Guardar Informaci&oacute;n" /></td>
  </tr>
  <tr align="center">
      <td colspan="2" id="mensaje"></td>
  </tr>
</table>
<br />

<table width="900" border="0">
  <tr align="center">
    <td valign="top">
        <p align="center"><center><b>1. Ingresa Referencias</b></center></p>
        <textarea name="textarea_referencias" cols="15" rows="15" id="textarea_referencias"></textarea>
    </td>
    <td valign="top"><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    	<input name="crea_tabla_referencias" type="button" id="crea_tabla_referencias" value="&nbsp;&gt;&nbsp;&gt;&nbsp;" />
    </td>
    <td valign="top">
    <form action="" method="get" name="registro_responsables" id="registro_responsables">
    <p align="center"><center><b>2. Asignaci&oacute;n de Responsable</b></center></p>
    <table width="700" border="0" cellspacing="1" id="tabla_responsables" bgcolor="#999999">
      <tr align="center" bgcolor="#0066CC" class="Texto_Mediano_Blanco">
        <td><b>#</b></td>
        <td><b>Referencia</b></td>
        <td><b>Subgerente</b></td>
        <td><b>Supervisor</b></td>
        <td><b>Opciones</b><input name="ultima_fila" type="hidden" id="ultima_fila" value="0" /><input name="filas_tabla" type="hidden" id="filas_tabla" value="0" /></td>
      </tr>
    </table>
    </form>
    </td>
  </tr>
</table>

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