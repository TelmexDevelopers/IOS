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
	require("libreria_ALE.php");
	$id_Tipo_Usuario = $_SESSION['id_Tipo_Usuario'];
	$id_Area_Responsable = $_SESSION['id_Area_Responsable'];

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
<title>IOS - M&oacute;dulo ALE</title>
	
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
	background:transparent url(../images/cerrarpopup.png) no-repeat scroll 0 0;
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
		
	.combos_referencia
	{
		width:200px;
		
	}
	</style>
    
	<style>
		@import "../CSS3Accordion/LightFace/Assets/LightFace.css";
	</style>
 
		<link rel="stylesheet" type="text/css" href="../css/ios.css"/>
		<script type="text/javascript" src="../scripts/mootools-core-1.4.5-full-compat.js"></script>  
		<script type="text/javascript" src="../scripts/mootools-more-1.4.0.1.js"></script>
		<script type="text/javascript" src="../autocomplete/scripts/Observer.js"></script>
		<script type="text/javascript" src="../autocomplete/scripts/Autocompleter.js"></script>
		<!--<script type="text/javascript" src="ajax.js"></script>-->
		<link rel="stylesheet" type="text/css" href="../autocomplete/styles/Autocompleter.css"/>
        
             <script src="../CSS3Accordion/LightFace/Source/LightFace.js"></script>
	        <link rel="stylesheet" href="../CSS3Accordion/LightFace/Assets/lightface.css" />
			<script src="../CSS3Accordion/LightFace/Source/LightFace.js"></script>
			<script src="../CSS3Accordion/LightFace/Source/LightFace.IFrame.js"></script>
			<script src="../CSS3Accordion/LightFace/Source/LightFace.Image.js"></script>
			<script src="../CSS3Accordion/LightFace/Source/LightFace.Request.js"></script>

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
 
    <script type="text/javascript"><script language="php"></script>
   
    window.addEvent('domready', function() {
		
		$('enviar').addEvent('click',ejecuta);
		new Autocompleter.Ajax.Json('caja1', '../Busqueda_Principal/autocomplete_cns.php',
		 
		{	
			'postVar': 'q',
			 onRequest: function() {
			  $('cargando').set('html','<img src="../images/loading.gif" width="22" height="22" alt="Cargando..." />');
			},
			 onComplete: function() {
			  $('cargando').set('html','');
			}
		});

		new Autocompleter.Ajax.Json ('direccion', '../Busqueda_Principal/autocomplete_direccion.php',
		{	
			'postVar': 'h',
			 onRequest: function() {
			  $('direccion_text').set('html','<img src="../images/loading.gif" width="22" height="22" alt="Cargando..." />');
			},
			 onComplete: function() {
			  $('direccion_text').set('html','');
			}
		});//--FIN -SEGUNDO AUTOCOMPLETE--------------


		ejecuta();
		
	});

function ejecuta()
{
	MooTools.lang.setLanguage('es-ES');
	validate = new Form.Validator.Inline("formulario_busqueda");
		if (validate.validate())
		{
			//var datos = 't='+$('caja1').value;
			var referencia= $('caja1').value;
			var Fase_IOS_ALE= $('Fase_IOS_ALE').value;
			var division_ale= $('division_ale').value;
			var subgerente= $('subgerente').value;
			var supervisor= $('supervisor').value;
			var entidad= $('entidad').value;
			var area_responsable= $('area_responsable').value;
			
			var cliente= $('cliente').value;
			var tipo_servicio= $('tipo_servicio').value;
			var direccion= $('direccion').value;
		
			var datos = 
			+'referencia='+referencia
			+'&Fase_IOS_ALE='+Fase_IOS_ALE		
			+'&division_ale='+division_ale
			+'&subgerente='+subgerente
			+'&supervisor='+supervisor
			+'&entidad='+entidad
			+'&area_responsable='+area_responsable
			+'&cliente='+cliente
			+'&tipo_servicio='+tipo_servicio
			+'&direccion='+direccion;
		
			
			var myHTMLRequest = new Request.HTML({
				url: 'ALE_paginacion.php',
				onRequest : function (){
			$('txtHint').set('html','<br /><br /><br /><img src="../images/loading.gif" width="32" height="32" alt="Cargando..." />');
		
				},
				onSuccess : function(tree, elements, html)	{
					$('txtHint').set('html',html);
					//$('pdf').addEvent('click',PDF);
				}	
				}).send({ 
					method:'get',
					data: datos
				});
		}
}
  
  
  
  function cambia_pagina(referencia,page)
  {
			var referencia= $('caja1').value;
			var Fase_IOS_ALE= $('Fase_IOS_ALE').value;
			var division_ale= $('division_ale').value;
			var subgerente= $('subgerente').value;
			var supervisor= $('supervisor').value;
			var entidad= $('entidad').value;
			var area_responsable= $('area_responsable').value;
		
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
	
	//var datos 
	//= 't='+texto+'&adodb_next_page='+page;
			var datos = 
			+'referencia='+referencia
			+'&Fase_IOS_ALE='+Fase_IOS_ALE		
			+'&division_ale='+division_ale
			+'&subgerente='+subgerente
			+'&supervisor='+supervisor
			+'&entidad='+entidad
			+'&area_responsable='+area_responsable
			+'&adodb_next_page='+page;

	
	var myHTMLRequest = new Request.HTML({
		url: 'equipamiento_paginacion.phps',
		onRequest : function (){
			$('txtHint').set('html','<br /><br /><br /><img src="../../images/loading.gif" width="32" height="32" alt="Cargando..." />');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			}	
		}).send({ 
			method:'get',
			data: datos
		});
	  }

	function busca_tramos(tramos)
	{
	
	//alert(tramos);
	
	light = new LightFace.IFrame
					(
		{
				height:400, 
				width:1200,
				url: '../Busqueda_Principal/tramos_paginacion.php?tramos='+tramos,
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
				url: '../CSS3Accordion/acordeon_ALE.php?referencia='+referencia+"&ser_n="+ser_n,
				title: 'Detalle del Servicio' 
		}).addButton('Cerrar', function() 
			{ 	light.close(); 
			}	,true).open();
	}
	
	</script>

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
            <p style="font-size:10px;"><?php echo date("l, F jS Y "); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../logout.php">Cerrar Sistema</a></p>
			</div>
			<!-- end login -->
			<!-- search -->
			<div id="search">
            <!-- search 
			  <form name="search" method="get" action="" >
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
	    <div id="content">
	      <div id="content-padding">
  
        <!-- start content -->
    	<form action="#" id="formulario_busqueda" method="post">
            <table width="950" border="0" class="Texto_Mediano_Gris">
                <tr>
                	<td align="center">Referencia:
                    <input type="text" name="caja1" maxlength="16" id="caja1" class="validate-referencia-telmex" /></td>
                </tr>
                <tr>
                	<td align="center" height="25"><div id="cargando"></div></td>
                </tr>
                    <td align="center">
                    
                    <table width="750" border="0">
                      <tr>
                        <td>Fase IOS ALE:</td>
                        <td><?php echo ImprimeCombo(1,''); ?></td>
                        <td>Punta Divisi&oacute;n:</td>
                        <td><?php echo ImprimeCombo(4,''); ?></td>
                      </tr>
                      <tr>
                        <td>Subgerente:</td>
                        <td><?php echo ImprimeCombo(2,''); ?></td>
                        <td>Supervisor:</td>
                        <td><?php echo ImprimeCombo(3,''); ?></td>
                      </tr>
                        <tr>
                        <td>Entidad:</td>
                        <td><?php echo ImprimeCombo(5,''); ?></td>
                        <td>&Aacute;rea Responsable:</td>
                        <td><?php echo ImprimeCombo(6,''); ?></td>
                      </tr>
                         <tr>
                        <td>Cliente:</td>
                        <td><?php echo ImprimeCombo(7,"Elige una opcion"); ?></td>
                    </tr>
                     <tr>
                        <td>Tipo de servicio:</td>
                        <td><?php echo ImprimeCombo(8,"Elige una opcion"); ?></td>
                    </tr>
                    <tr>
                       <td>BUSQUEDA-DIRECCION:</td>
                       <td>&nbsp;</td>
                  </tr>
                    <tr>
                        <td colspan="2">
                        <input type="text" size="55" name="direccion"  id="direccion" class="validation-passed Busqueda_direccion"/><div id="direccion_text">
                        </div></td>
                       </tr>                      
                    </table>

                    </td>
                </tr>
                <tr>
                	<td align="center"><input name="enviar"  type="button" id="enviar" value="Buscar" /></td>
                     
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
