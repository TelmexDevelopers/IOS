<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');	
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('connection.php');
include('Libreria_Principal.php');
require("../includes/funciones.php");
//require("../includes/header_principal.php");
$CheckSession = CheckSession();

$id_tipo_usuario = $_SESSION['id_Tipo_Usuario'];
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
<title>IOS - Seguimiento de Lada Enlaces NXE1</title>
	
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
        <link rel='stylesheet' href='../mootable/mootable.css' type='text/css' />

		<script type="text/javascript" src="mootools-core-1.4.5-full-compat.js"></script>  
		<script type="text/javascript" src="mootools-more-1.4.0.1.js"></script>
<script type='text/javascript' src='../mootable/mootable_functions.js'></script>
<script type='text/javascript' src='../mootable/Debugger.js'></script>
<script type='text/javascript' src='../mootable/mootable.js'></script>
<!--		<script type="text/javascript" src="../autocomplete/scripts/Observer.js"></script>
		<script type="text/javascript" src="../autocomplete/scripts/Autocompleter.js"></script>
		<script type="text/javascript" src="ajax.js"></script>
		<link rel="stylesheet" type="text/css" href="Autocompleter.css"/>
-->        
             <script src="LightFace/Source/LightFace.js"></script>
	        <link rel="stylesheet" href="LightFace/Assets/lightface.css" />
			<script src="LightFace/Source/LightFace.js"></script>
			<script src="LightFace/Source/LightFace.IFrame.js"></script>
			<script src="LightFace/Source/LightFace.Image.js"></script>
			<script src="LightFace/Source/LightFace.Request.js"></script>
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
		MooTools.lang.setLanguage('es-ES');
		validate = new Form.Validator.Inline("formulario_busqueda");
		$('enviar').addEvent('click', function()
		 { 
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
		//ejecuta();
		//Load_Table();

	});
	
	
	window.addEvent('domready', function (){
		$('enviar').addEvent('click',Load_Table);
//	    
//	
//		new Autocompleter.Ajax.Json('caja1', 'Autocomplete_Principal.php',
//		 
//		{	
//			'postVar': 'q',
//			 onRequest: function() {
//			  $('cargando').set('html','<img src="../../images/loading.gif" width="22" height="22" alt="Cargando..." />');
//			},
//			 onComplete: function() {
//			  $('cargando').set('html','');
//			}
//		});
	});
		
	function Ejecuta_Busqueda()
	{
		$('test').set('html','<br /><br /><br /><img src="../../images/loading.gif" width="32" height="32" alt="Cargando..." />');

	Load_Table();
	}


	function excel()
	{

/*    var Supervisores_Analisis= $('Supervisores_Analisis').value;
    var ipe_analisis= $('ipe_analisis').value;
    var ipe_entrega= $('ipe_entrega').value;
    var Supervisores_Entrega= $('Supervisores_Entrega').value;
    var id_Entidad= $('Entidad').value;
    var cm= $('cm').value;
    var area_cm= $('area_cm').value;
	var referencia= $('caja1').value;
	var idcat_edo_servicio= $('Estado_Servicio').value;
	var id_Area_Responsable= $('area_responsable').value;
	var id_Fase_IOS= $('Fase_IOS').value;
	var id_Fase_SISA= $('Fase_sisa').value;

	var datos = 
	+'Supervisores_Analisis='+Supervisores_Analisis
	+'&ipe_analisis='+ipe_analisis		
	+'&ipe_entrega='+ipe_entrega
	+'&Supervisores_Entrega='+Supervisores_Entrega
	+'&id_Entidad='+id_Entidad
	+'&cm='+cm
	+'&area_cm='+area_cm
	+'referencia='+referencia
	+'&idcat_edo_servicio='+idcat_edo_servicio
	+'&id_Area_Responsable='+id_Area_Responsable
	+'&id_Fase_IOS='+id_Fase_IOS
	'&id_Fase_SISA='+id_Fase_SISA;
*/	
	<?php
		if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3 )
		{
?>
<?php
			if ($id_Area_Responsable == 1 || $id_Area_Responsable == 2 || $id_Area_Responsable == 3  )
			{
?> 
  var Supervisores_Analisis= $('Supervisores_Analisis').value;
  var ipe_analisis= $('ipe_analisis').value;
<?php 		}
			if ($id_Area_Responsable == 4)
			{
?> 
   var ipe_entrega= $('ipe_entrega').value;
   var Supervisores_Entrega= $('Supervisores_Entrega').value;
<?php		
			}
?> 
   //var id_Entidad= $('Entidad').value;
   var cm= $('cm').value;
   var area_cm= $('area_cm').value;
   	 
<?php		
		}
?> 
	var referencia= $('caja1').value;
	var idcat_edo_servicio= $('Estado_Servicio').value;
	var id_Area_Responsable= $('area_responsable').value;
	var id_Fase_IOS= $('Fase_IOS').value;
	var id_Fase_SISA= $('Fase_sisa').value;

	var datos = 
<?php
	if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3 )
	{
		 if ($id_Area_Responsable == 1 || $id_Area_Responsable == 2  || $id_Area_Responsable == 3  )
		 {
?>
	'Supervisores_Analisis='+Supervisores_Analisis+
	'&ipe_analisis='+ipe_analisis+
<?php
		  }
		  if ($id_Area_Responsable == 4)
		  {
?>		
	'&ipe_entrega='+ipe_entrega+
	'&Supervisores_Entrega='+Supervisores_Entrega+
<?php
		  }
?> 
	//'&id_Entidad='+id_Entidad+
	'&cm='+cm+
	'&area_cm='+area_cm+'&'+
<?php
	}
?> 
	'referencia='+referencia+
	'&idcat_edo_servicio='+idcat_edo_servicio+
	'&id_Area_Responsable='+id_Area_Responsable+
	'&id_Fase_IOS='+id_Fase_IOS+
	'&id_Fase_SISA='+id_Fase_SISA;

	var URL = 'reporte_busqueda.php?'+datos;
	//alert(URL);
	
	window.location = URL;
	
	}
//
//	function PDF()
//	{
//	var combo1= $('cat_dd').value;
//	var combo2= $('cat_edo_serv').value;
//	var combo3= $('vw_fase_serv').value;
//	var combo4= $('cat_fase_ios').value;
//    var combo5= $('cat_Entidad').value;
//	var combo6= $('cat_fase_sisa').value;
//	var combo7= $('cat_con_ot').value;
//	var combo8= $('subgerentes').value;
////	var combo7= $('?').value;
//	var texto= $('caja1').value;
//		//var texto1= $('caja2').value;
//	
//	var datos 
//	= 'q='+combo1
//	+'&r='+combo2
//	+'&s='+combo3
//	+'&h='+combo4
//	+'&y='+combo5
//	+'&d='+combo6
//	+'&t='+texto;
//
//	var URL = 'PDF.php?'+datos;
//	alert(URL);
//	
//	window.location = URL;
//	
//	}



	function ejecuta()
	{
<?php
		if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3 )
		{
?>
	/*var combo1= $('cat_dd').value;
    var combo5= $('cat_Entidad').value;
	var combo7= $('cat_con_ot').value;
	var combo8= $('subgerentes').value;
	var combo9= $('supervisores').value;*/
<?php
			if ($id_Area_Responsable == 1 || $id_Area_Responsable == 2 || $id_Area_Responsable == 3  )
			{
?> 
   //var id_DD= $('Division').value; 
   //var idcat_con_OT= $('Con_OT').value;
  var Supervisores_Analisis= $('Supervisores_Analisis').value;
  var ipe_analisis= $('ipe_analisis').value;
<?php 		}
			if ($id_Area_Responsable == 4)
			{
?> 
   var ipe_entrega= $('ipe_entrega').value;
   var Supervisores_Entrega= $('Supervisores_Entrega').value;
<?php		
			}
?> 
   //var id_Entidad= $('Entidad').value;
   var cm= $('cm').value;
   var area_cm= $('area_cm').value;
   	 
	//var texto1= $('caja2').value;
<?php		
		}
?> 
	/*var texto= $('caja1').value;
	var combo2= $('cat_edo_serv').value;
	var combo3= $('cat_area_responsable').value;
	var combo4= $('cat_fase_ios').value;
	var combo6= $('cat_fase_sisa').value;*/
	var referencia= $('caja1').value;
	var idcat_edo_servicio= $('Estado_Servicio').value;
	var id_Area_Responsable= $('area_responsable').value;
	var id_Fase_IOS= $('Fase_IOS').value;
	var id_Fase_SISA= $('Fase_sisa').value;

	var datos = 
<?php
	if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3 )
	{
		 if ($id_Area_Responsable == 1 || $id_Area_Responsable == 2  || $id_Area_Responsable == 3  )
		 {
?>
	//'id_DD='+id_DD+
	//'&idcat_con_OT='+idcat_con_OT+
	
	'Supervisores_Analisis='+Supervisores_Analisis+
	'&ipe_analisis='+ipe_analisis+
<?php
		  }
		  if ($id_Area_Responsable == 4)
		  {
?>		
	'&ipe_entrega='+ipe_entrega+
	'&Supervisores_Entrega='+Supervisores_Entrega+
<?php
		  }
?> 
	//'&id_Entidad='+id_Entidad+
	'&cm='+cm+
	'&area_cm='+area_cm+'&'+
<?php
	}
?> 
	'referencia='+referencia+
	'&idcat_edo_servicio='+idcat_edo_servicio+
	'&id_Area_Responsable='+id_Area_Responsable+
	'&id_Fase_IOS='+id_Fase_IOS+
	'&id_Fase_SISA='+id_Fase_SISA;
                   
	var myHTMLRequest = new Request.HTML({
		url: 'Paginacion_Principal.php',
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
  
  function cambia_pagina(referencia,page)
  {
<?php
		if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3 )
		{
?>
	/*var combo1= $('cat_dd').value;
    var combo5= $('cat_Entidad').value;
	var combo7= $('cat_con_ot').value;
	var combo8= $('subgerentes').value;
	var combo9= $('supervisores').value;*/
<?php
			if ($id_Area_Responsable == 1 || $id_Area_Responsable == 2 || $id_Area_Responsable == 3  )
			{
?>
   //var id_DD= $('Division').value;
   //var idcat_con_OT= $('Con_OT').value;
   var Supervisores_Analisis= $('Supervisores_Analisis').value;
   var ipe_analisis= $('ipe_analisis').value;
   
<?php
			}
			if ($id_Area_Responsable == 4)
			{
?>
   var ipe_entrega= $('ipe_entrega').value;
   var Supervisores_Entrega= $('Supervisores_Entrega').value;
<?php
			}
?>
   //var id_Entidad= $('Entidad').value;
   var cm= $('cm').value;
   var area_cm= $('area_cm').value;
<?php
		}
?>
	/*var combo2= $('cat_edo_serv').value;
	var combo3= $('cat_area_responsable').value;
	var combo4= $('cat_fase_ios').value;
	var combo6= $('cat_fase_sisa').value;
	var texto= referencia;*/
	var referencia= $('caja1').value;
	var idcat_edo_servicio= $('Estado_Servicio').value;
	var id_Area_Responsable= $('area_responsable').value;
	var id_Fase_IOS= $('Fase_IOS').value;
	var id_Fase_SISA= $('Fase_sisa').value;

	var datos =
<?php
		if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3)
		{
        	    if ($id_Area_Responsable == 1 ||$id_Area_Responsable == 2 || $id_Area_Responsable == 3)
				{ 
?>
	//'id_DD='+id_DD+
	//'&idcat_con_OT='+idcat_con_OT+
	'Supervisores_Analisis='+Supervisores_Analisis+
	'&ipe_analisis='+ipe_analisis+
	
<?php 
				}
			   if ($id_Area_Responsable == 4)
			   {
?>

	'&ipe_entrega='+ipe_entrega+
	'&Supervisores_Entrega='+Supervisores_Entrega+
<?php
				}
?>
	//'&id_Entidad='+id_Entidad+
	'&cm='+cm+
	'&area_cm='+area_cm+'&'+
		
<?php } ?> 
	'referencia='+referencia+
	'&idcat_edo_servicio='+idcat_edo_servicio+
	'&id_Area_Responsable='+id_Area_Responsable+
	'&id_Fase_IOS='+id_Fase_IOS+
	'&id_Fase_SISA='+id_Fase_SISA+
	'&adodb_next_page='+page;

	var myHTMLRequest = new Request.HTML({
		url: 'Paginacion_Principal.php',
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
	
	
function Load_Table()
{
<?php
		if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3 )
		{
			if ($id_Area_Responsable == 1 || $id_Area_Responsable == 2 || $id_Area_Responsable == 3  )
			{
?>
   var Supervisores_Analisis= $('Supervisores_Analisis').value;
   var ipe_analisis= $('ipe_analisis').value;
<?php
			}
			if ($id_Area_Responsable == 4)
			{
?>
   var ipe_entrega= $('ipe_entrega').value;
   var Supervisores_Entrega= $('Supervisores_Entrega').value;
<?php
			}
?>
   //var id_Entidad= $('Entidad').value;
   var cm= $('cm').value;
   var area_cm= $('area_cm').value;
<?php
		}
?>
	var referencia= $('caja1').value;
	var idcat_edo_servicio= $('Estado_Servicio').value;
	var id_Area_Responsable= $('area_responsable').value;
	var id_Fase_IOS= $('Fase_IOS').value;
	var id_Fase_SISA= $('Fase_sisa').value;

	var datos =
<?php
		if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3)
		{
        	    if ($id_Area_Responsable == 1 ||$id_Area_Responsable == 2 || $id_Area_Responsable == 3)
				{ 
?>
	//'id_DD='+id_DD+
	//'&idcat_con_OT='+idcat_con_OT+
	'Supervisores_Analisis='+Supervisores_Analisis+
	'&ipe_analisis='+ipe_analisis+
	
<?php 
				}
			   if ($id_Area_Responsable == 4)
			   {
?>

	'&ipe_entrega='+ipe_entrega+
	'&Supervisores_Entrega='+Supervisores_Entrega+
<?php
				}
?>
	//'&id_Entidad='+id_Entidad+
	'&cm='+cm+
	'&area_cm='+area_cm+'&'+
		
<?php } ?> 
	'referencia='+referencia+
	'&idcat_edo_servicio='+idcat_edo_servicio+
	'&id_Area_Responsable='+id_Area_Responsable+
	'&id_Fase_IOS='+id_Fase_IOS+
	'&id_Fase_SISA='+id_Fase_SISA;
		
//		alert(datos);
		var myHTMLRequest = new Request.JSON({
		url: '../mootable/json_data.php',
		onRequest : function (){
			document.getElementById('test').innerHTML = '';
			document.getElementById('loading').innerHTML = '<br /><br /><br /><img src="../../images/loading.gif" width="32" height="32" alt="Cargando..." /><br /><br /><br />';
			}	,
		onSuccess : function(responseJSON, responseText)	{
			document.getElementById('loading').innerHTML = '';
			var headers = [{"text":"Ref","key":"referencia"},{"text":"SER_N","key":"ser_n"},{"text":"desc_serv","key":"desc_serv"},{"text":"due_date","key":"due_date"},{"text":"Grupo_dil_servicio","key":"Grupo_dil_servicio"},{"text":"fase_serv","key":"fase_serv"},{"text":"edo_serv","key":"edo_serv"},{"text":"fecha_estado","key":"fecha_estado"},{"text":"tipo_art","key":"tipo_art"},{"text":"Tipo_de_proyecto","key":"Tipo_de_proyecto"},{"text":"Familia","key":"Familia"},{"text":"TECNOLOGIA","key":"TECNOLOGIA"},{"text":"ancho_banda","key":"ancho_banda"},{"text":"usuario","key":"usuario"},{"text":"sector","key":"sector"},{"text":"coordinacion_abrev","key":"coordinacion_abrev"},{"text":"dir_division","key":"dir_division"},{"text":"str_Fase_IOS","key":"str_Fase_IOS"},{"text":"str_Area_responsable","key":"str_Area_responsable"},{"text":"SUBGERENTE_RESPONSABLE","key":"SUBGERENTE_RESPONSABLE"},{"text":"SUPERVISOR","key":"SUPERVISOR"},{"text":"IPE_Analisis","key":"ipe_analisis"},{"text":"IPE_Seguimiento","key":"ipe_seguimiento"},{"text":"IPE_Documentacion","key":"ipe_documentacion"},{"text":"IPE_Entrega","key":"ipe_entrega"},{"text":"IPE_WIFA","key":"ipe_wifa"},{"text":"Supervisor_Analisis","key":"sup_analisis"},{"text":"CON_OT","key":"str_conOT"},{"text":"Problema Acceso","key":"str_problema_acceso"},{"text":"str_coment_probl_acceso","key":"str_coment_probl_acceso"},{"text":"clas_1","key":"clas_1"},{"text":"clas_2","key":"clas_2"},{"text":"Programa","key":"Programa"},{"text":"Siglas","key":"siglas"},{"text":"Area","key":"area"},{"text":"CTO_MANTTO","key":"cto_mantto"},{"text":"usuario_pta","key":"usuario_pta"},{"text":"Direccion","key":"direccion"}];
			var data = responseJSON;
			
				//mootable = new MooTable( $('test'), {debug: true, height: '200px', headers: headers, data: data, sortable: true, useloading: true, resizable: true } );
				function exampleClick(ev){
					detalle_referencia(this.data.referencia,this.data.ser_n);
				}
				mootable = new MooTable('test', {debug: false, height: '350px', headers: headers, sortable: true, useloading: true, resizable: true});
				
				mootable.addEvent( 'afterRow', function(data, row){
					//debug.log( row );
					row.cols[0].element.setStyle('cursor', 'pointer');
					row.cols[0].element.addEvent( 'click', exampleClick.bind(row) );
				});				
				mootable.loadData(data);
			}	
		}).send({ 
			method:'get',
			data: datos
		});	
}		
	
</script>
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
            <p style="font-size:10px;"><?php echo date("l, F jS Y "); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../logout.php">Cerrar Sistema</a></p>
			</div>
			<!-- end login -->
			<!-- search -->
			<div id="search">
            <!--busqueda header--------------------------------------------------->
			 <!-- <form name="search" method="get" action="">
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
    	<form action="" id="formulario_busqueda" name="formulario_busqueda" method="get">
            <table width="950" border="0" class="Texto_Mediano_Gris">
                <tr>
                	<td 
<?php
        	    if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3 )
				{
?>
                     colspan="2"
<?php }?>                     
                      align="center">Referencia:
                    <input type="text" name="caja1" maxlength="16" id="caja1"  class="validate-referencia-telmex"/></td>
                </tr>
                <tr>
                	<td
<?php
        	    if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3 )
				{
?>
                     colspan="2"
<?php }?>                     
                      align="center" height="25"><div id="cargando"></div></td>
                </tr>
<?php
        	    if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3 )
				{
?>
                <tr>
                	<td valign="top" align="left">
                    	<table width="475" border="0" class="Texto_Mediano_Gris">

<?php if ($id_Area_Responsable == 1 || $id_Area_Responsable == 2 || $id_Area_Responsable == 3 ) { ?>
        	    
                              <tr>
                                <td>Supervisores:</td>
                                <td><?php echo ImprimeCombo(10,""); ?></td>
                            </tr>
                            <tr>
                                <td>IPE´s:</td>
                                <td><?php echo ImprimeCombo(11,""); ?></td>

<?php  }if ($id_Area_Responsable == 4)  { ?> 
                            <tr>
                                <td>Supervisor Entrega</td>
                                <td><?php echo ImprimeCombo(8,$_SESSION["id_Usuario"]); ?></td>
                            </tr>
                            <tr>
                                <td>IPE entrega:</td>
                                <td><?php echo ImprimeCombo(9,""); ?></td>
                            </tr>
<?php  }   ?>
<!--                            <tr>
                                <td>Entidad:</td>
                                <td><?php// echo ImprimeCombo(5,""); ?> </td>
                            </tr>
-->                            <tr>
                                <td>GOA:</td>
                                <td><?php echo ImprimeCombo(13,""); ?> </td>
                            </tr>
                             <tr>
                                <td>CM:</td>
                                <td><?php echo ImprimeCombo(12,""); ?> </td>
                            </tr>
	 
                        </table>
                    </td>
 <?php } ?>                     
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
                                <td>&Aacute;rea responsable:</td>
                                <td><?php echo ImprimeCombo(3,$_SESSION['id_Area_Responsable']); ?></td>
                            </tr>
                            <tr>
                                 <td><!--Punta:--></td>
                                <td colspan="2"><!--<select id="punta" name="punta" class="mootools combos_busqueda"><option value="">Elige una opcion</option><option value="A">A</option><option value="B">B</option></select>--></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                	<td
<?php
        	    if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3 )
				{
?>
                     colspan="2"
 <?php }?>
                      align="center">
                      <input name="enviar"  type="button" id="enviar" value="Buscar" class="btn"/>
                      
                       </td>
                      
                </tr>
            </table>
            </form><br />
            <div id='loading'>&nbsp;</div> 
            <div id='test'>&nbsp;</div>
            <!--ENLACE POP-->
           <!-- <a href="#" id="referencia">Este enlace abre un popup!</a>
            		<div id="capa">Haciendo clic en esta capa también se abre un popup!</div>-->
            <!--ENLACE POP----->
            <!--Pop facelight-->
           <!-- <button id="start">IFrame Google</button>-->
            <!--Pop facelight-->
            <!--<div id="txtHint" style=" min-height:200px; max-height:500px; width:900px; overflow:auto;"></div>      
            </div>-->
            
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
