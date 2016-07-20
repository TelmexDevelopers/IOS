<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');	
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

	session_start();
	include('../equipamiento_adodb/adodb/adodb.inc.php');
	include('connection.php');
	include('Libreria_equipamiento_FO.php');
	require("../includes/funciones.php");

	
	$CheckSession = CheckSession();

//	$_SESSION['id_Tipo_Usuario'] = 1;
//	$_SESSION['id_area_responsable'] = 1;

	$id_Tipo_Usuario = $_SESSION['id_Tipo_Usuario'];
	$id_Area_Responsable = $_SESSION['id_Area_Responsable'];

//check they are set:
//
//echo 'Usuario: Subgerente <br>';
//echo '<br>';
//echo "Usuario: ".$_SESSION['id_Tipo_Usuario']."<br>";
//echo "Area: ".$_SESSION['id_area_responsable']."<br>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>IOS - M&oacute;dulo Equipamiento</title>
	
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
		<script type="text/javascript" src="../scripts/mootools-core-1.4.5-full-compat.js"></script>  
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
		.combos_busqueda 
	{
		width: 200px;
		font-family:Verdana, Geneva, sans-serif;
		size: 12px;
		background-color:#FFF;
		color:#666;
		}
		.Busqueda_direccion 
	{
		width: 403px;
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
	window.addEvent('domready', function (){
		$('enviar').addEvent('click',ejecuta);

    window.addEvent('domready', function() {
	MooTools.lang.setLanguage('es-ES');
	validate = new Form.Validator.Inline("formulario_busqueda");
		$('enviar').addEvent('click', function() { 
			validate.validate();
			
		});
		window.addEvent('keydown',function(event){
			if (event.key == 'enter')
			{
			event.stop();
			event.stopPropagation();
				setTimeout('ejecuta()', 250);
			}
		});
	});
	
		  //ejecuta()
		
	//--funcion autocomplete---------------------------------------------------------------------------------------------------
		new Autocompleter.Ajax.Json('caja1', 'autocomplete_cns.php',
		{	
			'postVar': 'q',
			 onRequest: function() {
			  $('cargando').set('html','<img src="../../images/loading.gif" width="22" height="22" alt="Cargando..." />');
			},
			 onComplete: function() {
			  $('cargando').set('html','');
			}
		});
	//--FIN REFERENCIA----------INICIA SEGUNDO AUTOCOMPLETE--------------------------------------------------------------------
		new Autocompleter.Ajax.Json ('direccion', 'autocomplete_direccion.php',
		{	
			'postVar': 'h',
			 onRequest: function() {
			  $('direccion_text').set('html','<img src="../../images/loading.gif" width="22" height="22" alt="Cargando..." />');
			},
			 onComplete: function() {
			  $('direccion_text').set('html','');
			}
		});//--FIN -SEGUNDO AUTOCOMPLETE--------------
	});//=====FIN });--CIERRA FUNCION AUTOCOMPLETE==============================================================================
//===============================================================================================================================				 
	function excel()
	
	{
<?php
		if ($id_Tipo_Usuario == 1 || $id_Tipo_Usuario == 2 || $id_Tipo_Usuario == 3 )
		{
			//if ( $id_Area_Responsable == 5  ) {  
?> 

   var id_DD= $('Division').value;
   var cm= $('cm').value;
   var id_Usuario_sup= $('nom_supervisor').value;
   var id_Usuario= $('nom_subgerente').value;
   var area_cm= $('area_cm').value;
   var direccion= $('direccion').value;
<?php } //} ?> 

	var referencia= $('caja1').value;
	var idcat_edo_servicio= $('Estado_Servicio').value;
	var id_Area_Responsable= $('area_responsable').value;
	//var id_edo_tramos= $('edo_tramos').value;
	var id_usuario_cliente= $('cliente').value;
	var id_proy_eqp= $('tipo_servicio').value;
	var id_Fase_IOS= $('Fase_IOS').value;
	var id_Fase_SISA= $('Fase_sisa').value;

	var datos = 
<?php
	if ($id_Tipo_Usuario == 1 || $id_Tipo_Usuario == 2 || $id_Tipo_Usuario == 3 )
	{
		 // if ( $id_Area_Responsable == 5  ) { 
?> 
	'&id_DD='+id_DD+
	'&cm='+cm+
	'&id_Usuario_sup='+id_Usuario_sup+
	'&id_Usuario='+id_Usuario+
	'&direccion='+direccion+
	'&area_cm='+area_cm+'&'+
<?php
	}// }
?> 
	'referencia='+referencia+
	'&idcat_edo_servicio='+idcat_edo_servicio+
	'&id_Area_Responsable='+id_Area_Responsable+
	//'&id_edo_tramos ='+id_edo_tramos+
	'&id_usuario_cliente='+id_usuario_cliente+
	'&id_proy_eqp='+id_proy_eqp+
	'&id_Fase_IOS='+id_Fase_IOS+
	'&id_Fase_SISA='+id_Fase_SISA;

	var URL = 'reporte_equipamiento_FO.php?'+datos;
	//alert(URL);
	
	window.location = URL;
	
	}

//===============================================================================================================		

	function ejecuta()
	{
<?php
		if ($id_Tipo_Usuario == 1 || $id_Tipo_Usuario == 2 || $id_Tipo_Usuario == 3 )
		{
			//if ( $id_Area_Responsable == 5  ) {  
?> 
   var id_DD= $('Division').value;
   var cm= $('cm').value;
   var id_Usuario_sup= $('nom_supervisor').value;
   var id_Usuario= $('nom_subgerente').value;
   var area_cm= $('area_cm').value;
   var direccion= $('direccion').value;
<?php }// } ?> 

	var referencia= $('caja1').value;
	var idcat_edo_servicio= $('Estado_Servicio').value;
	var id_Area_Responsable= $('area_responsable').value;
	//var id_edo_tramos= $('edo_tramos').value;
	var id_usuario_cliente= $('cliente').value;
	var id_proy_eqp= $('tipo_servicio').value;
	var id_Fase_IOS= $('Fase_IOS').value;
	var id_Fase_SISA= $('Fase_sisa').value;

	var datos = 
<?php
	if ($id_Tipo_Usuario == 1 || $id_Tipo_Usuario == 2 || $id_Tipo_Usuario == 3 )
	{
		  //if ( $id_Area_Responsable == 5  ) { 
?> 
	'&id_DD='+id_DD+
	'&cm='+cm+
	'&id_Usuario_sup='+id_Usuario_sup+
	'&id_Usuario='+id_Usuario+
	'&direccion='+direccion+
	'&area_cm='+area_cm+'&'+
<?php
	} //}
?> 
	'referencia='+referencia+
	'&idcat_edo_servicio='+idcat_edo_servicio+
	'&id_Area_Responsable='+id_Area_Responsable+
	//'&id_edo_tramos ='+id_edo_tramos +
	'&id_usuario_cliente='+id_usuario_cliente+
	'&id_proy_eqp='+id_proy_eqp+
	'&id_Fase_IOS='+id_Fase_IOS+
	'&id_Fase_SISA='+id_Fase_SISA;
                   
	var myHTMLRequest = new Request.HTML({
		url: 'equipamiento_paginacion_FO_combos.php',
		onRequest : function (){
	$('txtHint').set('html','<br /><br /><br /><img src="../../images/loading.gif" width="32" 	height="32" alt="Cargando..." />');

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
//===============================================================================================================		  
  function cambia_pagina(referencia,page)
  {
<?php
		if ($id_Tipo_Usuario == 1 || $id_Tipo_Usuario == 2 || $id_Tipo_Usuario == 3 )
		{
//			 if ( $id_Area_Responsable == 5  )  { 
?>
   var id_DD= $('Division').value;
   var cm= $('cm').value;
   var id_Usuario_sup= $('nom_supervisor').value;
   var id_Usuario= $('nom_subgerente').value;
   var direccion= $('direccion').value;
   var area_cm= $('area_cm').value;
<?php
		} //}
?>
	var referencia= $('caja1').value;
	var idcat_edo_servicio= $('Estado_Servicio').value;
	var id_Area_Responsable= $('area_responsable').value;
	//var id_edo_tramos= $('edo_tramos').value;
	var id_usuario_cliente= $('cliente').value;
	var id_proy_eqp= $('tipo_servicio').value;
	var id_Fase_IOS= $('Fase_IOS').value;
	var id_Fase_SISA= $('Fase_sisa').value;

	var datos =
<?php
		if ($id_Tipo_Usuario == 1 || $id_Tipo_Usuario == 2 || $id_Tipo_Usuario == 3)
		{
		//if ( $id_Area_Responsable == 5  ) { 
?>
	'&id_DD='+id_DD+
	'&cm='+cm+
	'&id_Usuario_sup='+id_Usuario_sup+
	'&id_Usuario='+id_Usuario+
	'&direccion='+direccion+
	'&area_cm='+area_cm+'&'+
		
<?php } //} ?> 
	'referencia='+referencia+
	'&idcat_edo_servicio='+idcat_edo_servicio+
	'&id_Area_Responsable='+id_Area_Responsable+
	//'&id_edo_tramos='+id_edo_tramos +
	'&id_usuario_cliente='+id_usuario_cliente+
	'&id_proy_eqp='+id_proy_eqp+
	'&id_Fase_IOS='+id_Fase_IOS+
	'&id_Fase_SISA='+id_Fase_SISA+
	'&adodb_next_page='+page;

	var myHTMLRequest = new Request.HTML({
		url: 'equipamiento_paginacion_FO_combos.php',
		onRequest : function (){
			$('txtHint').set('html','<br /><br /><br /><img src="../../images/loading.gif" width="32" height="32" alt="Cargando..." />');
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
  

/*********************************************FUNCION PARA ENLACE****************************************/

/*	function busca_tramos(tramos)
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
	}*/
	
	function detalle_referencia(referencia,id_tramos)
	{
	
	//alert(referencia);
	
	light = new LightFace.IFrame
					(
		{
				height:500, 
				width:1050,
				url: '../MooTools-TabPanel/Demo/demo.php?referencia='+referencia+"&id_tramos="+id_tramos,
				title: 'Detalle del Servicio' 
		}
					)
				.addButton('Cerrar Ventana', function() 
			{ 	light.close();
			
			
			 
			}	,true).open();
	}
	
//===============================================================================================================			
/*	window.addEvent('domready', function() {
		$('Supervisores_Documentacion').addEvent('change', function(event) {
			Combo_Encadenado(event);
		});
		$('Supervisores_Analisis').addEvent('change', function(event) {
			Combo_Encadenado(event);
		});
    });
	
	
	function Combo_Encadenado(e){
			var id_combo = $(e.target.id).value;
			switch (e.target.id)
			{
				case 'Supervisores_Documentacion':
					var combo_ipes = 'ipe_Documentacion';
				break;
				case 'Supervisores_Analisis':
					var combo_ipes = 'ipe_analisis';
				break;
				default:
				break;
			}
			var combo = $(combo_ipes);
			var datos = 'id_usuario_Jefe_Inmediato='+id_combo;
			var myHTMLRequest = new Request.JSON({
			url: 'json_combo_ipe.php',
			onRequest : function (){
			}	,
			onSuccess : function(responseJSON, responseText)	{
				var json = JSON.parse(responseText);
				combo.options.length = 0;
				combo.grab(new Element('option', { 'value' : '', 'text' : 'Elige una opcion' }));
				var cont = 0;
				for (var i in json)
				{
					if(cont < json.length)
					{
						combo.grab(new Element('option', { 'value' : json[i].id_Usuario, 'text' : json[i].str_Nombre_ipe}));
					}
					cont++;
				}		
			}	
		}).send({ 
			method:'get',
			data: datos
		});
}
       
*/

	</script>

<body>
<div align="center">
    <div id="container">
      <div id="body_space">
        <div id="header">
		  <div id="logo-block">
		    <!-- type your logo and small slogan here -->
            <p id="logo"><a href=" ../index.php"><img src="images/telmex.jpg" width="158" height="89" alt="TELMEX" border="0" /></a></p>
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
    	<form action="#" id="formulario_busqueda" method="get">
            <table width="950" border="0" class="Texto_Mediano_Gris">
                <tr>
                	<td colspan="2" align="center">Referencia:
                    <input type="text" name="caja1" maxlength="16" id="caja1"  class="validate-referencia-telmex validation-passed "/></td>
                </tr>
                <tr>
                	<td colspan="2" align="center" height="25"><div id="cargando"></div></td>
                </tr>
<?php
        	    if ($id_Tipo_Usuario == 1 || $id_Tipo_Usuario == 2 || $id_Tipo_Usuario == 3 )
				{
?>
                <tr>
                	<td valign="top" align="left">
                    	<table width="475" border="0" class="Texto_Mediano_Gris">
            <?php    //  if ( $id_Area_Responsable == 5  ) { ?>    	
						    <tr>
                                <td>SUBGERENTE:</td>
                                <td><?php echo ImprimeCombo(18,$_SESSION["id_Usuario"]); ?> </td>
                            </tr>
                            <tr>
                                <td>SUPERVISOR:</td>
                                <td><?php echo ImprimeCombo(19,""); ?> </td>
                            </tr>
                            <tr>
                                <td>DIVISION:</td>
                                <td><?php echo ImprimeCombo(1,""); ?> </td>
                            </tr>
                           <tr>
                                <td>Cliente:</td>
                                <td><?php echo ImprimeCombo(21,"Elige una opcion"); ?></td>
                            </tr>
                             <tr>
                                <td>Tipo de servicio:</td>
                                <td><?php echo ImprimeCombo(20,""); ?></td>
                            </tr>
                            <tr>
                               <td>BUSQUEDA-DIRECCION:</td>
                               <td>&nbsp;</td>
                          </tr>
                            <tr>
								<td colspan="2">
                                <input type="text" name="direccion"  id="direccion" class="validation-passed Busqueda_direccion"/><div id="direccion_text"></div></td>
                               </tr>
	 <?php // } ?>    
                        </table>
                    </td>
 <?php }  ?>                     
                	<td valign="top" align="left">
                    	<table  width="475" border="0" class="Texto_Mediano_Gris">
                            <tr>
                                <td>Fase SISA:</td>
                                <td><?php echo ImprimeCombo(6,"ALT"); ?></td>
                            </tr>
                            <tr>
                                <td>Estado SISA:</td>
                                <td><?php echo ImprimeCombo(2,""); ?></td>
                            </tr>
                            <tr>
                                <td>Fase IOS:</td>
                                <td><?php echo ImprimeCombo(4,""); ?></td>
                            </tr>
                             <tr>
                                <td>GOA:</td>
                                <td><?php echo ImprimeCombo(13,""); ?> </td>
                            </tr>
                            <tr>
                                <td>CM:</td>
                                <td><?php echo ImprimeCombo(12,""); ?> </td>
                            </tr>
                            <tr>
                              <td>Area responsable:</td>
                                <td><?php echo ImprimeCombo(3,""); ?></td>
                            </tr>
                            <!--<tr>
                                <td>Cliente:</td>
                                <td><?php //echo ImprimeCombo(21,"Elige una opcion"); ?></td>
                            </tr>
                             <tr>
                                <td>Tipo de servicio:</td>
                                <td><?php //echo ImprimeCombo(20,""); ?></td>
                            </tr>
                            <tr>
                                <td>Tipo de servicio:</td>
                                <td><?php //echo ImprimeCombo(20,""); ?></td>
                            </tr>-->
                            <tr>
                                 <td><!--Punta:--></td>
                                <td colspan="2"><!--<select id="punta" name="punta" class="mootools combos_busqueda"><option value="">Elige una opcion</option><option value="A">A</option><option value="B">B</option></select>--></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
                      <input name="enviar"  type="button" id="enviar" value="Buscar" class="button1"/>
                    </td>
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
