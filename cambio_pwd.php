<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
require("adodb/adodb.inc.php");
require("includes/connection.php");
require("includes/funciones.php");

$CheckSession = CheckSession();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
	<title>TELMEX - IOS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<link rel="stylesheet" media="screen" type="text/css" href="css/ios.css" />
		<script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"> </script>
        <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"> </script>
        <script type="text/javascript"> 
window.addEvent('domready', function() {
		MooTools.lang.setLanguage('es-ES');
		validate = new Form.Validator.Inline("formulario_CAMBIO_PWD");
		$('enviar').addEvent('click', function() { 
			if (validate.validate()) {
				var myElement = $('mensaje');
				
				myElement.set('html','');
					var myHTMLRequest = new Request.HTML({
					url: 'update_pwd.php',
					onRequest : function (){
						//Si nos muestra el resultado correcto, pinta en pantalla
						myElement.set('html','Cargando..');
						}	,
					onSuccess : function(tree, elements, html)	{
						myElement.set('html',html);
						},
						onFailure: function(){
							myElement.set('text', 'Sorry, your request failed :(');
						}
					}).post($('formulario_CAMBIO_PWD'));
			}
		});
//		window.addEvent('keydown',function(event){
//			if (event.key == 'enter')
//			{
//			event.stop();
//			event.stopPropagation();
//				setTimeout('ejecuta()', 250);
//			}
//		});
//		ejecuta()
	});
        
        
        
        </script>
  </head>

  <body>
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
            <!-- search 
			  <form name="search" method="get" action="">
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
<form action="" method="get" name="formulario_CAMBIO_PWD" id="formulario_CAMBIO_PWD">
<center><br />
<table width="500" border="0" bgcolor="#999999" cellspacing="1" height="260">
  <tr>
    <td colspan="2" class="Titulo_Blanco" align="center" bgcolor="#0066CC"><b>Cambio de Contrase&ntilde;a</b></td>
  </tr>
  <tr>
    <td colspan="2" class="Texto_Mediano_Gris" align="left" bgcolor="#FFFFFF"><b>Ingresa los siguientes datos:</b></td>
  </tr>
  <tr class="Texto_Mediano_Gris" bgcolor="#FFFFFF">
    <td>Nombre de Usuario:</td>
    <td align="center"><input name="nombre_usuario" type="text" id="nombre_usuario" class="required Texto_Mediano_Gris" /></td>
  </tr>
  <tr class="Texto_Mediano_Gris" bgcolor="#FFFFFF">
    <td>Contrase&ntilde;a Anterior: </td>
    <td align="center"><input name="old_pwd" type="text" id="old_pwd" class="required Texto_Mediano_Gris" /></td>
  </tr>
  <tr class="Texto_Mediano_Gris" bgcolor="#FFFFFF">
    <td>Nueva Contrase&ntilde;a: </td>
    <td align="center"><input name="new_pwd_1" type="password" id="new_pwd_1" class="required Texto_Mediano_Gris" /></td>
  </tr>
  <tr class="Texto_Mediano_Gris" bgcolor="#FFFFFF">
    <td>Confirma Nueva Contrase&ntilde;a: </td>
    <td align="center"><input name="new_pwd_2" type="password" id="new_pwd_2" class="required Texto_Mediano_Gris" /></td>
  </tr>
  <tr>
    <td colspan="2" class="Texto_Mediano_Gris" align="center" bgcolor="#FFFFFF" height="30"><div id="mensaje"></div></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF"><input name="enviar" type="button" id="enviar" value="Guardar Datos" /></td>
  </tr>
</table>
<br /><br />
</center>
</form>
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
  </body>
</html>