	<?php 
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');	
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');

	session_start();
	include('../../adodb/adodb.inc.php');
	include('connection.php');
	include('libreria.php');
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
body{
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
 
		<link rel="stylesheet" type="text/css" href="css/ios.css"/>
		<script type="text/javascript" src="mootools-core-1.4.5-full-compat.js"></script>  
		<script type="text/javascript" src="mootools-more-1.4.0.1.js"></script>
		<script type="text/javascript" src="../autocomplete/scripts/Observer.js"></script>
		<script type="text/javascript" src="../autocomplete/scripts/Autocompleter.js"></script>
		<script type="text/javascript" src="ajax.js"></script>
		<link rel="stylesheet" type="text/css" href="Autocompleter.css"/>
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
	window.addEvent('domready', function (){
		$('enviar').addEvent('click',ejecuta);
	/*	
	ingresando valores pequeños
		var tokens = ['hola1','hola2'];
	
		// Our instance for the element with id "demo-local"
		new Autocompleter.Local('caja2', tokens, {
			'minLength': 1, // We wait for at least one character
			'overflow': true // Overflow for more entries
		});*/
		new Autocompleter.Ajax.Json('caja1', 'autocomplete.php',
		 
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
		
		 
	function excel()
	{
		var combo1= $('cat_dd').value;
	var combo2= $('cat_edo_serv').value;
	var combo3= $('cat_area_responsable').value;
	var combo4= $('cat_fase_ios').value;
    var combo5= $('cat_Entidad').value;
	var combo6= $('cat_fase_sisa').value;
	var combo7= $('cat_con_ot').value;
	var combo8= $('subgerentes').value;
	var combo9= $('supervisores').value;
//	var combo7= $('?').value;
	var texto= $('caja1').value;
	//var texto1= $('caja2').value;
	
	var datos 
	= 'q='+combo1
	+'&r='+combo2
	+'&s='+combo3
	+'&h='+combo4
	+'&y='+combo5
	+'&d='+combo6
	+'&o='+combo7
	+'&b='+combo8
	+'&sup='+combo9

	+'&t='+texto;

	var URL = 'reporte.php?'+datos;
	//alert(URL);
	
	window.location = URL;
	
	}

	function PDF()
	{
	var combo1= $('cat_dd').value;
	var combo2= $('cat_edo_serv').value;
	var combo3= $('vw_fase_serv').value;
	var combo4= $('cat_fase_ios').value;
    var combo5= $('cat_Entidad').value;
	var combo6= $('cat_fase_sisa').value;
	var combo7= $('cat_con_ot').value;
	var combo8= $('subgerentes').value;
//	var combo7= $('?').value;
	var texto= $('caja1').value;
		//var texto1= $('caja2').value;
	
	var datos 
	= 'q='+combo1
	+'&r='+combo2
	+'&s='+combo3
	+'&h='+combo4
	+'&y='+combo5
	+'&d='+combo6
	+'&t='+texto;

	var URL = 'PDF.php?'+datos;
	alert(URL);
	
	window.location = URL;
	
}
	function ejecuta()
{
	
	var combo1= $('cat_dd').value;
	var combo2= $('cat_edo_serv').value;
	var combo3= $('cat_area_responsable').value;
	var combo4= $('cat_fase_ios').value;
    var combo5= $('cat_Entidad').value;
	var combo6= $('cat_fase_sisa').value;
	var combo7= $('cat_con_ot').value;
	var combo8= $('subgerentes').value;
	var combo9= $('supervisores').value;
	
	
	

	var texto= $('caja1').value;
	//var texto1= $('caja2').value;
	
	
	
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
	= 'q='+combo1
	+'&r='+combo2
	+'&s='+combo3
	+'&h='+combo4
	+'&y='+combo5
	+'&d='+combo6
	+'&o='+combo7
	+'&b='+combo8
	+'&sup='+combo9

	+'&t='+texto;
	
	var myHTMLRequest = new Request.HTML({
		url: 'paginacion.php',
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
	var combo1= $('cat_dd').value;
	var combo2= $('cat_edo_serv').value;
	var combo3= $('cat_area_responsable').value;
	var combo4= $('cat_fase_ios').value;
    var combo5= $('cat_Entidad').value;
	var combo6= $('cat_fase_sisa').value;
	var combo7= $('cat_con_ot').value;
	var combo8= $('subgerentes').value;
	var combo9= $('supervisores').value;
	
	
//	var combo7= $('?').value;
//	var texto= $('caja1').value;
	var texto= referencia;
	//var texto= $('caja2').value;
	//alert(page);
	
	
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
	= 'q='+combo1
	+'&r='+combo2
	+'&s='+combo3
	+'&h='+combo4
	+'&y='+combo5
	+'&d='+combo6
	+'&o='+combo7
	+'&b='+combo8
	+'&sup='+combo9

	+'&t='+texto
	+'&adodb_next_page='+page;
	
	var myHTMLRequest = new Request.HTML({
		url: 'Tramos.php',
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
	/*function busca_tramos(referencia)
	{
	
	alert(referencia);
	
     // e.stop();
	
	
	var MiPopup = new Class({
   initialize: function(miHtml,ancho,alto,titulo){
      this.titulo=titulo;
      this.tamanoBody = window.getScrollSize();
      this.posScroll = window.getScroll();
      this.espacioDisponibleVentana = window.getSize();
      this.capaSombra = new Element("div", {'id': 'capasombra', 'style': 'width: ' + this.tamanoBody.x + 'px; height: ' + this.tamanoBody.y + 'px; ' });
      this.capaSombra.inject(document.body);
      var myFx = new Fx.Tween(this.capaSombra,{'duration': 300});
      myFx.start('opacity',0,0.8);
      
      this.contenido = new Element("div", {'id': 'contenidopopup'});
      this.contenido.set('html', "<div class=cuerpotextopopup>" + miHtml + "</div>");
      var titulo = new Element("div", {'id': 'titulopopup'});
      titulo.set('html', this.titulo);
      var cerrar = new Element("div", {'id': 'cerrarpopup'});
      cerrar.addEvent('click', function(){
         this.cerrar();
      }.bind(this));
      cerrar.inject(titulo,'top');
      titulo.inject(this.contenido,'top');
            
      this.capaPopup = new Element("div", {'id': 'capapopup', 'style': 'margin-left:-' + ancho/2 +'px; top:' + (this.posScroll.y + (this.espacioDisponibleVentana.y/2) - (alto/2)-15) +'px'});
      this.capaPopup.inject(this.capaSombra,'after');
      
      var myFx2 = new Fx.Tween(this.capaPopup,{'duration': 700});
      myFx2.start('width',4,ancho);
      myFx2.addEvent('complete', function(){
         var myFx3 = new Fx.Tween(this.capaPopup,{'duration': 700});
         myFx3.start('height',4,alto+30);
         myFx3.addEvent('complete', function(){
            this.contenido.inject(this.capaPopup);
            this.contenido.setStyle('opacity', 0);
            this.contenido.setStyle('display', 'block');
            var myFx4 = new Fx.Tween(this.contenido,{'duration': 300});
            myFx4.start('opacity',0,1);
         }.bind(this));
      }.bind(this));
      
      this.capaSombra.addEvent('click', function(){
            this.cerrar();
         }.bind(this)
      );
   },
   
   cerrar: function(){
      var myFx = new Fx.Tween(this.capaPopup,{'duration': 500});
      myFx.start('opacity',1,0);
      myFx.addEvent('complete', function(){
         var myFx2 = new Fx.Tween(this.capaSombra,{'duration': 500});
         myFx2.start('opacity',0.8,0);
         myFx2.addEvent('complete', function(){
            this.capaSombra.destroy();
            this.capaPopup.destroy();
         }.bind(this));
      }.bind(this));
   }
});

	      var htmlPopup = "<b>Hola amigos!</b>,<p>Esto es una prueba de un popup DHTML con la típica capa de sombra!</p><p>Podríamos hacerlo fácilmente con Mootools, aunque este script he de aceptar que podría mejorarse.";
      new MiPopup(htmlPopup, 400, 160, "Primer Popup desde un enlace");

	}*/


	/**********************************************fin enlace***************************/
	
/****************************************Inicia POPUP******************************************/

/*
	window.addEvent("domready", function(){
   $("referencia").addEvent("click", function(e){
      e.stop();
      var htmlPopup = "<b>Hola amigos!</b>,<p>Esto es una prueba de un popup DHTML con la típica capa de sombra!</p><p>Podríamos hacerlo fácilmente con Mootools, aunque este script he de aceptar que podría mejorarse.";
      new MiPopup(htmlPopup, 400, 160, "Primer Popup desde un enlace");
   });
   
   
   $("capa").addEvent("click", function(e){
      e.stop();
      var htmlPopup = "Este popup es sencillo de usar, pero con funcionalidad limitada!";
      new MiPopup(htmlPopup, 600, 50, "Primer Popup desde un enlace");
	   });
	});

var MiPopup = new Class({
   initialize: function(miHtml,ancho,alto,titulo){
      this.titulo=titulo;
      this.tamanoBody = window.getScrollSize();
      this.posScroll = window.getScroll();
      this.espacioDisponibleVentana = window.getSize();
      this.capaSombra = new Element("div", {'id': 'capasombra', 'style': 'width: ' + this.tamanoBody.x + 'px; height: ' + this.tamanoBody.y + 'px; ' });
      this.capaSombra.inject(document.body);
      var myFx = new Fx.Tween(this.capaSombra,{'duration': 300});
      myFx.start('opacity',0,0.8);
      
      this.contenido = new Element("div", {'id': 'contenidopopup'});
      this.contenido.set('html', "<div class=cuerpotextopopup>" + miHtml + "</div>");
      var titulo = new Element("div", {'id': 'titulopopup'});
      titulo.set('html', this.titulo);
      var cerrar = new Element("div", {'id': 'cerrarpopup'});
      cerrar.addEvent('click', function(){
         this.cerrar();
      }.bind(this));
      cerrar.inject(titulo,'top');
      titulo.inject(this.contenido,'top');
            
      this.capaPopup = new Element("div", {'id': 'capapopup', 'style': 'margin-left:-' + ancho/2 +'px; top:' + (this.posScroll.y + (this.espacioDisponibleVentana.y/2) - (alto/2)-15) +'px'});
      this.capaPopup.inject(this.capaSombra,'after');
      
      var myFx2 = new Fx.Tween(this.capaPopup,{'duration': 700});
      myFx2.start('width',4,ancho);
      myFx2.addEvent('complete', function(){
         var myFx3 = new Fx.Tween(this.capaPopup,{'duration': 700});
         myFx3.start('height',4,alto+30);
         myFx3.addEvent('complete', function(){
            this.contenido.inject(this.capaPopup);
            this.contenido.setStyle('opacity', 0);
            this.contenido.setStyle('display', 'block');
            var myFx4 = new Fx.Tween(this.contenido,{'duration': 600});
            myFx4.start('opacity',0,1);
         }.bind(this));
      }.bind(this));
      
      this.capaSombra.addEvent('click', function(){
            this.cerrar();
         }.bind(this)
      );
   },
   
   cerrar: function(){
      var myFx = new Fx.Tween(this.capaPopup,{'duration': 500});
      myFx.start('opacity',1,0);
      myFx.addEvent('complete', function(){
         var myFx2 = new Fx.Tween(this.capaSombra,{'duration': 500});
         myFx2.start('opacity',0.8,0);
         myFx2.addEvent('complete', function(){
            this.capaSombra.destroy();
            this.capaPopup.destroy();
         }.bind(this));
      }.bind(this));
   }
});
*/
/****************************************FIN POPUP******************************************/
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
            <p style="font-size:10px;"><?php echo date("l, F jS Y "); ?>&nbsp;&nbsp;|&nbsp;&nbsp;
            
            <!--INICIO Cerrar sistema  head right coner-->
           <!--<a href="logout.php">Cerrar Sistema</a>-->
            <!--FIN Cerrar sistema  head right coner-->
           </p>
			</div>
			<!-- end login -->
			<!-- search -->
			<div id="search">
			  <!--Top logo referencia-->
              
              <!--<form name="search" method="get" action="">
              Buscar Referencia: 
                <input type="text" class="box" />
                <button class="btn" title="Buscar Referencia">	Buscar</button>
              </form>-->
              
              <!--Fin Top logo referencia-->
              
              
            </div>
		    <!-- end search -->
		  </div>
		  <div class="cls"></div>
  		  <div id="top-nav-bg">
            <div id="top-nav">
			  <!-- start top navigation bar -->
				<?php /*?> <?php echo CreaHeader(); ?><?php */?>
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
                    <input type="text" name="caja1" maxlength="16" id="caja1" /></td>
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
                                <td>Division:</td>
                                <td><?php echo ImprimeCombo(1); ?></td>
                            </tr>
                            <tr>
                                <td>Entidad:</td>
                                <td><?php echo ImprimeCombo(5); ?></td>
                            </tr>
                            <tr>
                                <td>Subgerente:</td>
                                <td><?php echo ImprimeCombo(8); ?></td>
                            </tr>
                            <tr>
                                <td>Supervisor:</td>
                                <td><?php echo ImprimeCombo(9); ?></td>
                            </tr>
                            <tr>
                                <td>Con OT:</td>
                                <td><?php echo ImprimeCombo(7); ?></td>
                            </tr>
                        </table>
                    </td>
 <?php }?>                    
                	<td valign="top" align="left">
                    	<table  width="475" border="0" class="Texto_Mediano_Gris">
                            <tr>
                                <td>Fase SISA:</td>
                                <td><?php echo ImprimeCombo(6); ?></td>
                            </tr>
                            <tr>
                                <td>Estado SISA:</td>
                                <td><?php echo ImprimeCombo(2); ?></td>
                            </tr>
                            <tr>
                                <td>Fase IOS:</td>
                                <td><?php echo ImprimeCombo(4); ?></td>
                            </tr>
                            <tr>
                                <td>Area responsable:</td>
                                <td><?php echo ImprimeCombo(3); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
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
            <a href="#" id="referencia">Este enlace abre un popup!</a>
            		<div id="capa">Haciendo clic en esta capa también se abre un popup!</div>
            <!--ENLACE POP-->        
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
