<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');	
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

	session_start();
	include('../../adodb/adodb.inc.php');
	include('connection.php');
	include('CNS_LIBRERIA.PHP');
	require("includes/funciones.php");

	$_SESSION['id_tipo_usuario'] = 1;
	$_SESSION['id_area_responsable'] = 1;

	$id_tipo_usuario = $_SESSION['id_tipo_usuario'];
	$id_area_responsable = $_SESSION['id_area_responsable'];

//check they are set:
//
//echo 'Usuario: Subgerente <br>';
//echo '<br>';
//echo "Usuario: ".$_SESSION['id_tipo_usuario']."<br>";
//echo "Area: ".$_SESSION['id_area_responsable']."<br>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>IOS - Generaci&oacute;n de Orden de Trabajo</title>
	
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

<!--//<link rel="stylesheet" type="text/css" href="ios.css"/>
-->
	</head>
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
		.combos_busqueda2
	{
		width: 50px;
		font-family:Verdana, Geneva, sans-serif;
		size: 11px;
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
 
    <script type="text/javascript"><script language="php"></script>
	window.addEvent('domready', function (){
		$('enviar').addEvent('click',ejecuta,ejecuta1);
	/*	
	ingresando valores pequeños
		var tokens = ['hola1','hola2'];
	
		// Our instance for the element with id "demo-local"
		new Autocompleter.Local('caja2', tokens, {
			'minLength': 1, // We wait for at least one character
			'overflow': true // Overflow for more entries
		});*/
		  ejecuta1()
		
		
		new Autocompleter.Ajax.Json('caja1', 'autocomplete_cns.php',
		 
		{	
			'postVar': 'q',
			 onRequest: function() {
			  $('cargando').set('html','<img src="../../../images/loading.gif" width="22" height="22" alt="Cargando..." />');
			},
			 onComplete: function() {
			  $('cargando').set('html','');
			}
		});
	
	});
		
		 
	/*function excel()
	{
	
	var texto= $('caja1').value;
	
	var datos 
	= 't='+texto;

	var URL = 'reporte.php?'+datos;
	//alert(URL);
	
	window.location = URL;
	
	}*/


	function ejecuta()
	{
		
	var texto= $('caja1').value;
	var combo1= $('cat_articulos_CNS').value;
	
	
	if (texto != "") {
	var valida = validatePass(texto);	
		 	//alert('Referencia Correcta'); 
	
	if (valida==false){
		var errorMessage = 'Referencia no valida';
       //alert(errorMessage);
       $('caja1').focus();
		return false;
			}
	}
	var datos 
	= 't='+texto
	+'&q='+combo1;
	
	var myHTMLRequest = new Request.HTML({
		url: 'CNS.php',
		onRequest : function (){
	$('txtHint').set('html','<br /><br /><br /><img src="../../../images/loading.gif" width="32" 	height="32" alt="Cargando..." />');

			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			$('xls').addEvent('click',excel);
			//$('pdf').addEvent('click',PDF);
	}	
		}).send({ 
			method:'get',
			data: datos
		})
				    
	}
  
  
  
  function cambia_pagina(referencia,page)
  {
	var texto= referencia;
	var combo1= $('cat_articulos_CNS').value;
	
	
	if (texto != "") {
	var valida = validatePass(texto);	
//		 	alert('Referencia Correcta'); 
	
	if (valida==false){
		var errorMessage = 'Referencia no valida';
      // alert(errorMessage);
       $('caja1').focus();
		return false;
			}
	}
	
	var datos 
	= 't='+texto
	+'&q='+combo1
	+'&adodb_next_page='+page;
	
	var myHTMLRequest = new Request.HTML({
		url: 'CNS.php',
		onRequest : function (){
			$('txtHint').set('html','<br /><br /><br /><img src="../../../images/loading.gif" width="32" height="32" alt="Cargando..." />');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			$('xls').addEvent('click',excel);
			//$('pdf').addEvent('click',PDF);
			}	
		}).send({ 
			method:'get',
			data: datos
		});
	  }
  
	function validatePass(caja1)
	{
    var RegExPattern = /^[\w-\.]{3,}-? ?[\d-\.]{4,}-? ?[\d-\.]{4,}$/ ;
    if ((caja1.match(RegExPattern)) && (caja1 !='')) 
	{
        //alert('Referencia Correcta'); 
		return true;
	}
	 else 
	 
	 {

	return false;
	} 
	}
	
	function ejecuta1()
	{
		
	var texto= $('caja1').value;
	var combo1= $('cat_articulos_CNS').value;
	
	
	if (texto != "") {
	var valida = validatePass(texto);	
		 	//alert('Referencia Correcta'); 
	
	if (valida==false){
		var errorMessage = 'Referencia no valida';
       //alert(errorMessage);
       $('caja1').focus();
		return false;
			}
	}
	var datos 
	= 't='+texto
	+'&q='+combo1;
	
	var myHTMLRequest = new Request.HTML({
		url: 'CNS1.php',
		onRequest : function (){
	$('txtHint').set('html','<br /><br /><br /><img src="../../../images/loading.gif" width="32" 	height="32" alt="Cargando..." />');

			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			$('xls').addEvent('click',excel);
			//$('pdf').addEvent('click',PDF);
	}	
		}).send({ 
			method:'get',
			data: datos
		})
				    
	}
  
  
  
  function cambia_pagina(referencia,page)
  {
	var texto= referencia;
	var combo1= $('cat_articulos_CNS').value;
	
	
	if (texto != "") {
	var valida = validatePass(texto);	
//		 	alert('Referencia Correcta'); 
	
	if (valida==false){
		var errorMessage = 'Referencia no valida';
      // alert(errorMessage);
       $('caja1').focus();
		return false;
			}
	}
	
	var datos 
	= 't='+texto
	+'&q='+combo1
	+'&adodb_next_page='+page;
	
	var myHTMLRequest = new Request.HTML({
		url: 'CNS1.php',
		onRequest : function (){
			$('txtHint').set('html','<br /><br /><br /><img src="../../../images/loading.gif" width="32" height="32" alt="Cargando..." />');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			$('xls').addEvent('click',excel);
			//$('pdf').addEvent('click',PDF);
			}	
		}).send({ 
			method:'get',
			data: datos
		});
	  }
  
	function validatePass(caja1)
	{
    var RegExPattern = /^[\w-\.]{3,}-? ?[\d-\.]{4,}-? ?[\d-\.]{4,}$/ ;
    if ((caja1.match(RegExPattern)) && (caja1 !='')) 
	{
        //alert('Referencia Correcta'); 
		return true;
	}
	 else 
	 
	 {

	return false;
	} 
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
				.addButton('Close', function() 
			{ 	light.close(); 
			}	,true).open();
	}
	
	function detalle_referencia(referencia)
	{
	
	//alert(referencia);
	
	light = new LightFace.IFrame
					(
		{
				height:400, 
				width:1200,
				url: '../pantalla de servicios/CSS3Accordion/index3.php?referencia='+referencia,
				title: 'Detalle del Servicio' 
		}
					)
				.addButton('Close', function() 
			{ 	light.close(); 
			}	,true).open();
	}
	



/*****************************Fin  Face light*************************************************/

	</script>

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
	    <div id="content">
	      <div id="content-padding">
  
        <!-- start content -->
    	<form action="#" method="post">
            <table width="950" border="1" class="Texto_Mediano_Gris">
                <tr>
                	<td

                     colspan="2"
                     
                      align="center">Referencia:
                    <input type="text" name="caja1" maxlength="16" id="caja1" /></td>
                </tr>
                <tr>
                	<td

                     colspan="2"
                     
                      align="center" height="25"><div id="cargando"></div>
                      <?php echo ImprimeCombo(1); ?></td>
                </tr>

                
                	
                   
             
                        </table>
                    </td>
                </tr>
                <tr>
                	<td

                     colspan="2"
                    
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
