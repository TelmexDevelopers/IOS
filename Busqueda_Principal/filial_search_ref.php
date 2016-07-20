<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');	
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include_once('../../adodb/adodb.inc.php');
include('connection.php');
include('libreria_filial_0.php');
require("../includes/funciones.php");
//require("../includes/header_filial.php");
$CheckSession = CheckSession();

$id_tipo_usuario = $_SESSION['id_Tipo_Usuario'];
$id_area_responsable = $_SESSION['id_Area_Responsable'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Telmex IOS - M&oacute;dulo Filial</title>
<!--***********************************INICIO ESTILO POPup******************************-->
	<style type="text/css">
	body
	{
     font-family: verdana, arial;
	}

/*POPUP*/
	#capasombra {
	  background:#000000 none repeat scroll 0 0;
	  cursor:pointer;
	left:0;
	opacity:0;
	position:absolute;
	text-align:center;
	top:0;
	}
	#capapopup {
	background-color:#ccF;
	border:3px solid #339;
	height:5px;
	left:50%;
	overflow:hidden;
	padding:4px;
	position:absolute;
	text-align:left;
	width:4px;
	}
	#cerrarpopup {
	background:transparent url(images/cerrarpopup.png) no-repeat scroll 0 0;
	cursor:pointer;
	float:right;
	height:28px;
	width:35px;
	}
	#titulopopup {
	background: #cf6 none repeat scroll 0 0;
	border-bottom: 2px solid #ffc;
	font-size:1em;
	font-weight:bold;
	height:32px;
	line-height:27px;
	margin-bottom:3px;
	overflow:hidden;
	padding:2px 3px 0 10px;
	text-align:left;
	}
	#contenidopopup {
	display:none;
	opacity:0;
	}
	.cuerpotextopopup{padding:5px;font-size: 0.75em;}
	</style>
<!--*********************************FIN ESTILO POPup************************************-->
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
	<style>
		@import "LightFace/Assets/LightFace.css";
	</style>
 	<style type="text/css">
		#caja1,#caja2.
	{
		width:200px;
		border:1px solid #444;
	}
	
		.Estilo1 {
		font-family:Lucida Sans Unicode;
		font-size:11px;
		color:#003366;
		}
		.combos_busqueda
	{
		width: 200px;
		font-family:Verdana, Geneva, sans-serif;
		size: 12px;
		background-color:#FFF;
		color:#666;
		}
		.referencia
	{
		width: 200px;
		font-family:Verdana, Geneva, sans-serif;
		size: 10px;
		background-color:#FFF;
		color:#666;
		}
	</style>

<link rel="stylesheet" type="text/css" href="css/ios.css"/>
<script type="text/javascript" src="mootools-core-1.4.5-full-compat.js"></script>  
<script type="text/javascript" src="mootools-more-1.4.0.1.js"></script>
<script type="text/javascript" src="../autocomplete/scripts/Observer.js"></script>
<script type="text/javascript" src="../autocomplete/scripts/Autocompleter.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<link rel="stylesheet" type="text/css" href="Autocompleter.css"/>
        
<script src="LightFace/Source/LightFace.js"></script>
<link rel="stylesheet" href="LightFace/Assets/lightface.css" />
<script src="LightFace/Source/LightFace.js"></script>
<script src="LightFace/Source/LightFace.IFrame.js"></script>
<script src="LightFace/Source/LightFace.Image.js"></script>
<script src="LightFace/Source/LightFace.Request.js"></script>
<script type="text/javascript"><script language="php"></script>
	window.addEvent('domready', function (){
		$('enviar').addEvent('click',ejecuta);
	
		new Autocompleter.Ajax.Json('caja1', 'autocomplete_filial.php',
		 
		{	
			'postVar': 'q',
			 onRequest: function() {
			  $('cargando').set('html','<img src="../../../images/loading.gif" width="22" height="22" alt="Cargando..." />');
			},
			 onComplete: function() {
			  $('cargando').set('html','');
			}
		});
		
		window.addEvent('keydown',function(event){
			if (event.key == 'enter')
			{
			event.stop();
			event.stopPropagation();
				setTimeout('ejecuta()', 250);
			}
		});
		
		ejecuta()
	});
		
		 
	function ejecuta()
	{
	var cm= $('cm').value;
	
	var referencia= $('caja1').value;
MooTools.lang.setLanguage('es-ES');
validate = new Form.Validator.Inline('formulario_busqueda');
	if (validate.validate())
	{
	var myHTMLRequest = new Request.HTML({
		url: 'filial_paginacion_0.php',
		onRequest : function (){
			$('txtHint').set('html','<br /><br /><br /><img src="../../images/loading.gif" width="32" height="32" alt="Cargando..." />');
			}	,
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			//$('pdf').addEvent('click',PDF);
			}	
		}).post($('formulario_busqueda'));
	}
}
  
  function cambia_pagina(referencia,page)
  {
	var cm= $('cm').value;
	
	var referencia= $('caja1').value;
	if (referencia != "") {
	var valida = validatePass(referencia);	
//		 	alert('Referencia Correcta'); 
	
	if (valida==false){
		var errorMessage = 'Referencia no valida';
      // alert(errorMessage);
       $('caja1').focus();
		return false;
			}
	}
	//alert (datos);
	var datos = 
	'cm='+cm+
	'&adodb_next_page='+page;
	
	var myHTMLRequest = new Request.HTML({
		url: 'filial_paginacion_0.php',
		onRequest : function (){
			$('txtHint').set('html','<br /><br /><br /><img src="../../images/loading.gif" width="32" height="32" alt="Cargando..." />');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			//$('xls').addEvent('click',excel);
			//$('pdf').addEvent('click',PDF);
			}	
		}).post($('formulario_busqueda'));
	  }
  	
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
				url: '../CSS3Accordion/filial_acordion1.php?referencia='+referencia+"&ser_n="+ser_n,
				title: 'Detalle referencia' 
		}
					)
				.addButton('Cerrar', function() 
			{ 	light.close(); 
			}	,true).open();
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
            <p id="logo"><a href="../index.php"><img src="images/telmex.jpg" width="158" height="89" alt="TELMEX" border="0" /></a></p>
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
	    <div id="content">
	      <div id="content-padding">
  
        <!-- start content -->
    	<form action="#" id="formulario_busqueda" method="post">
            <table width="950" border="0" class="Texto_Mediano_Gris">
                <tr>
                	<td
<?php
        	    if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3)
				{
?>
                     colspan="2"
<?php }?>                     
                      align="center">Referencia:
                    <input type="text" name="caja1" maxlength="16" id="caja1" class="validate-referencia-telmex" /></td>
                </tr>
                <tr>
                	<td
<?php
        	    if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3)
				{
?>
                     colspan="2"
<?php }?>                     
                      align="center" height="25"><div id="cargando"></div></td>
                </tr>
<?php
        	    if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3)
				{
?>
                <tr>
                	<td valign="top" align="left">
                    	<table width="475" border="0" class="Texto_Mediano_Gris">
                            <tr>
                                <td>Con OT:</td>
                                <td><?php echo ImprimeCombo(1); ?></td>
                            </tr>
                            <tr>
                                <td>&Aacute;rea Responsable:</td>
                                <td><?php echo ImprimeCombo(2); ?></td>
                            </tr>
                            <tr>
                                <td>&Aacute;rea:</td>
                                <td><?php echo ImprimeCombo(4); ?></td>
                            </tr>
                        </table>
                    </td>
 <?php }?>                    
                	<td valign="top" align="left">
                    	<table  width="475" border="0" class="Texto_Mediano_Gris">
                            <tr>
                                <td>CM:</td>
                                <td><?php echo ImprimeCombo(3); ?></td>
                            </tr>
                            <tr>
                                 <td>Punta:</td>
                                <td colspan="2"><select id="punta" name="punta" class="mootools combos_busqueda"><option value="">Elige una opcion</option><option value="A">A</option><option value="B">B</option></select></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                	<td
<?php
        	    if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3)
				{
?>
                     colspan="2"
<?php }?>                     
                      align="center"><input name="enviar"  type="button" id="enviar" value="Buscar" /></td>
                     
                </tr>
            </table>
            </form> 
            <!--ENLACE POP-->
           <!-- <a href="#" id="referencia">Este enlace abre un popup!</a>
            		<div id="capa">Haciendo clic en esta capa también se abre un popup!</div>-->
            <!--ENLACE POP----->
            <!--Pop facelight-->
           <!-- <button id="start">IFrame Google</button>-->
            <!--Pop facelight-->
            <div id="txtHint" style=" min-height:200px; max-height:500px; width:900px; overflow:auto;"></div>      
            </div>
            
	<!-- end content -->
		  </div>
		</div>
	  </div>
	  <div id="footer">
	    <div id="footer-pad">
	      <div class="line"></div>
		  <!-- footer and copyright notice -->
	      <p class="Texto_Chico_Blanco">Telmex&reg; 2013</p>
		  <!-- end footer and copyright notice -->
	    </div>
	  </div>
	</div>


</div>
</body>
</html>
