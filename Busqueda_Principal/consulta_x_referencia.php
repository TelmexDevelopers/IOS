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

$CheckSession = CheckSession();

//include("includes/libreria.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>IOS - Consulta Por Referencia</title>
<link rel="stylesheet" media="screen" type="text/css" href="../css/ios.css" />
<script type="text/javascript" src="../scripts/mootools-core-1.4.5-full-compat.js"> </script>
<script type="text/javascript" src="../scripts/mootools-more-1.4.0.1.js"> </script>
<script src="LightFace/Source/LightFace.js"></script>
<link rel="stylesheet" href="LightFace/Assets/lightface.css" />
<script src="LightFace/Source/LightFace.js"></script>
<script src="LightFace/Source/LightFace.IFrame.js"></script>
<script src="LightFace/Source/LightFace.Image.js"></script>
<script src="LightFace/Source/LightFace.Request.js"></script>

<script type="text/javascript">		
function actualiza()
{
	MooTools.lang.setLanguage("es-ES");
	validate = new Form.Validator.Inline("consulta_referencias");

	if (validate.validate()) {
		var textarea_referencias= $('textarea_referencias').value;
		var cadena_referencias = '';
		var elementos_textarea = textarea_referencias.split('\n');
		var cont = 0;
			for (x=0;x<=(elementos_textarea.length-1);x++)
			{
				cadena_referencias += elementos_textarea[x];
				if(cont < (elementos_textarea.length-1))
				{
					cadena_referencias += "','";
				}
				cont++;
			}
							
		var datos= 'cadena_referencias='+cadena_referencias;
		var myHTMLRequest = new Request.HTML({
		url: 'paginacion_consulta_x_referencia.php',
		onRequest : function (){
	$('resultado').set('html','<br /><br /><br /><img src="../../images/loading.gif" width="32" height="32" alt="Cargando..." />');
			}	,
		onSuccess : function(tree, elements, html)	{
			$('resultado').set('html',html);
			//$('textarea_referencias').value = '';
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
	
	/*****************************FUNCION PARA ENLACE****************************************/
	function busca_tramos(tramos)
	{
	//alert(tramos);
	light = new LightFace.IFrame
					(
		{
				height:400, 
				width:1200,
				url: 'tramos_paginacion.php?tramos='+tramos,
				title: 'Detalle Tramos' 
		}
					)
				.addButton('Cerrar', function() 
			{ 	light.close(); 
			}	,true).open();
	}
	
	function detalle_referencia(referencia,ser_n)
	{
	//alert(referencia);
	light = new LightFace.IFrame
					(
		{
				height:500, 
				width:1000,
				url: '../CSS3Accordion/index3.php?referencia='+referencia+"&ser_n="+ser_n,
				title: 'Detalle referencia' 
		}
					)
				.addButton('Cerrar Ventana', function() 
			{ 	light.close(); 
			}	,true).open();
	}
	
window.addEvent('domready', function() {
	$('consultar').addEvent('click',actualiza);
});
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
            <p style="font-size:10px;"><?php echo date("l, F jS Y "); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../logout.php">Cerrar Sistema</a></p></p>
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
    <form action="" method="post" name="consulta_referencias" id="consulta_referencias">
<table width="950" border="0" class="Texto_Mediano_Gris">
  <tr align="center">
    <td valign="middle" align="center" width="170" height="20">
    	<b>1. Ingresa Referencias</b>
    </td>
    <td valign="top" rowspan="2" width="40">
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <input name="consultar" type="button" id="consultar" value="&nbsp;&gt;&nbsp;&gt;&nbsp;" />
    </td>
    <td valign="middle" align="left">
    	<b>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        2. - Consulta por referencia</b>
    </td>
  </tr>
  <tr align="center">
    <td valign="top" width="170">
        <p align="center"><center>
        	<textarea name="textarea_referencias[]" cols="15" rows="15" id="textarea_referencias" class="required"></textarea>
        </center></p>
    </td>
    <td valign="top">
      <div id="resultado" style="overflow:auto;"></div>
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
