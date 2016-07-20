<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../adodb/adodb.inc.php');
include('includes/connection.php');
//require("includes/funciones.php");
include("includes/libreria.php");


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
	.combos_busqueda
	{
		width: 350px;
		font-family:Verdana, Geneva, sans-serif;
		size: 12px;
		background-color:#FFF;
		color:#666;
		}
 </style>
    <link rel="stylesheet" media="screen" type="text/css" href="../css/ios.css" />
	<script type="text/javascript" src="../scripts/mootools-core-1.4.5-full-compat.js"> </script>
    <script type="text/javascript" src="../scripts/mootools-more-1.4.0.1.js"> </script>
	<script type="text/javascript">
		window.addEvent('domready', function() {
			
			
			$('guardar').addEvent('click',actualiza);
			//cambia_pagina()
		});
		
function actualiza()
{
			MooTools.lang.setLanguage("es-ES");
			validate = new Form.Validator.Inline("update_fase");
	
	if (validate.validate()) {
		var fase= $('Fases').value;
		var textarea_referencias= $('textarea_referencias').value;
		var cadena_referencias = '';
		var elementos_textarea = textarea_referencias.split('\n');
		var cont = 0;
			for (x=0;x<=(elementos_textarea.length-1);x++)
			{
				if (elementos_textarea[x] != "")
				{
					cadena_referencias += elementos_textarea[x];
					if(cont < (elementos_textarea.length-1))
					{
						cadena_referencias += "','";
					}
				}
					cont++;
			}
					
		var datos= 'fase='+fase+'&cadena_referencias='+cadena_referencias;
		var stringLength = datos.length;
		var lastChar = datos.charAt(stringLength - 1);
		var lastChar2 = datos.charAt(stringLength - 2);
		var lastChar3 = datos.charAt(stringLength - 3);
		var long = stringLength-3;
		if(lastChar == "'" && lastChar2 == "," && lastChar3 == "'")
		{
			datos = datos.slice(0,long);
		}
		
		var myHTMLRequest = new Request.HTML({
		url: 'actualizar_referencia.php',
		onRequest : function (){
		$('actualizado').set('html','<br /><br /><br /><img src="../../images/loading.gif" width="32" 	height="32" alt="Cargando..." />');
			}	,
		onSuccess : function(tree, elements, html)	{
			$('actualizado').set('html',html);
			$('textarea_referencias').value = '';
			}	
		}).send({
		method : 'post',
		data : datos
		});
	}
}
	
/*	function cambia_pagina(referencia,page)
		{
		var fase= $('Fases').value;
		var textarea_referencias= $('textarea_referencias').value;
		var cadena_referencias = '';
		var elementos_textarea = textarea_referencias.split('\n');

		var datos= 'fase='+fase+'&cadena_referencias='+cadena_referencias+'&adodb_next_page='+page;
		var myHTMLRequest = new Request.HTML({
		url: '../../ios/busq_esp/FILTRO_BUSQUEDA_j/paginacion.php',
		onRequest : function (){
	$('actualizado').set('html','<br /><br /><br /><img src="../../images/loading.gif" width="32" 	height="32" alt="Cargando..." />');
			}	,
		onSuccess : function(tree, elements, html)	{
			$('actualizado').set('html',html);
			}	
		}).send({
		method : 'post',
		data : datos
		});

	}*/
    </script>
</head>

<body>
<div align="center">
    <div id="container">
      <div id="body_space">
        <div id="header">
		  <div id="logo-block">
		    <!-- type your logo and small slogan here -->
            <p id="logo"><!--<a href="logout.php">--><img src="../images/telmex.jpg" width="158" height="89" alt="TELMEX" border="0" /><!--</a>--></p>
		    <!-- <p id="slogan">a small website slogan goes here</p>
			end logo and small slogan -->
		  </div>
		  <div id="definels">
		    <!-- login -->
		    <div id="login_top">
            <p style="font-size:10px;"><?php echo date("l, F jS Y "); ?><!--&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../logout.php">Cerrar Sistema</a>--></p>
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
				<?php //echo CreaHeader(); ?>
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

<br />
    <form action="" method="post" name="update_fase" id="update_fase">

<table width="720" border="0">
  <tr align="center">
    <td valign="top">
    	  <p align="center"><center><b>1. Ingresa Referencias</b></center></p>
          <center>
          <p>
            <textarea name="textarea_referencias[]" cols="15" rows="15" id="textarea_referencias" class="required"></textarea>
          </p>
        </center></td>
    <td valign="top"><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
     <!-- <input name="crea_tabla_referencias" type="button" id="crea_tabla_referencias" value="&nbsp;&gt;&nbsp;&gt;&nbsp;" />-->
    </td>
    <td valign="top">
    <p align="center"><center><b>2. Actualizaci&oacute;n de referencias</b></center></p>
    
    <table width="500" border="0">
      <tr align="center">
          <td colspan="2" height="5"><?php  echo ImprimeCombo(10);?> </td>
      </tr>
      <tr align="center">
          <td colspan="2" height="5"><spacer></spacer></td>
      </tr>
      <tr align="center">
          <td colspan="2"><input name="guardar" type="button" id="guardar" value="Actualizar Referencias" /></td>
      </tr>
      <tr>
        <td align="center" id="mensaje">
        <br>
      <div id="actualizado" style=" width:300px; overflow:auto;"></div>
      
       <!--<div id="actualizado" style=" min-height:200px; max-height:330px; width:750px; overflow:auto;"></div>-->
            </td>
    </table>
    </td>
  </tr>
</table>
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


</div>
</body>
</html>
