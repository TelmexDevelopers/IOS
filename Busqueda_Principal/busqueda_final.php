<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../adodb/adodb.inc.php');
include('connection.php');
include('libreria.php');

?>
<?php 
session_start();
//the above script tags to please FrontPage rather than <?php

//set some variables:

$_SESSION['id_tipo_usuario'] = 3;
$_SESSION['id_area_responsable'] = 1;

$id_tipo_usuario = $_SESSION['id_tipo_usuario'];
$id_area_responsable = $_SESSION['id_area_responsable'];

//check they are set:

echo 'Usuario: Subgerente <br>';
echo '<br>';
echo "Usuario: ".$_SESSION['id_tipo_usuario']."<br>";
echo "Area: ".$_SESSION['id_area_responsable']."<br>";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script type="text/javascript" src="mootools-core-1.4.5-full-compat.js"></script>  
<script type="text/javascript" src="mootools-more-1.4.0.1.js"></script>
<script type="text/javascript" src="../autocomplete/scripts/Observer.js"></script>
<script type="text/javascript" src="../autocomplete/scripts/Autocompleter.js"></script>
<link rel="stylesheet" type="text/css" href="Autocompleter.css"/>
<style type="text/css">
	.combos_busqueda
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
		
		 
/*function excel()
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
*/
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
$('txtHint').set('html','<img src="../../../images/loading.gif" width="22" height="22" alt="Cargando..." />');

			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			$('xls').addEvent('click',excel);
			$('pdf').addEvent('click',PDF);
}	
		}).send({ 
			method:'get',
			data: datos
		});u
				    
	}
  
  function cambia_pagina(page)
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
+'&pag='+page;
	
	var myHTMLRequest = new Request.HTML({
		url: 'paginacion.php',
		onRequest : function (){
			$('txtHint').set('html','Espere se esta procesando ....');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			$('xls').addEvent('click',excel);
			$('pdf').addEvent('click',PDF);
			}	
		}).send({ 
			method:'get',
			data: datos
		});
	  }
  
function validatePass(caja1) {
    var RegExPattern = /^[\w-\.]{3,}-? ?[\d-\.]{4,}-? ?[\d-\.]{4,}$/ ;
    if ((caja1.match(RegExPattern)) && (caja1 !='')) {
        //alert('Referencia Correcta'); 
		return true;
    } else {

	return false;
} 
}


</script>

<style type="text/css">
	#caja1,#caja2
	{
		width:160px;
		border:1px solid #444;
	}
	</style>
</head>
<body>
  <tr>
   <td>
    
</td>
      

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
   <td>
      </td>
  </tr>
  <tr>
    <td colspan="2">
<form method="post"></form>
  <br>
    </td>
        <fieldset style="border:1px solid #999">
          <legend>BUSQUEDA</legend>
          <form action="#" method="post">
           <br>
           <br>
            <table width="850" border="0">
              <tr>
                <td><div align="right">Referencia:
                <input type="text" name="caja1" maxlength="16" id="caja1" />
                </div></td>
                <td><div id="cargando">
                  <div align="right"></div>
                </div></td>
              </tr>
              <tr>
              		  <?php
        	    if ($id_tipo_usuario == 1 || $id_tipo_usuario == 2 || $id_tipo_usuario == 3)
        	{
            
    			?>
                <td><div align="right">Division:<?php echo ImprimeCombo(1); ?></div></td>
                <td><div align="right"></div></td>
              <?php }  ?>
              </tr>
              <tr>
                <td><div align="right">Estado SISA:<?php echo ImprimeCombo(2); ?></div></td>
                <td><div align="right"></div></td>
              </tr>
              <tr>
                <td><div align="right"></div></td>
                <td><div id="cargando2">
                  <div align="right"></div>
                </div></td>
              </tr>
              <tr>
                <td><div align="right">Fase IOS:<?php echo ImprimeCombo(4); ?></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <tr>
                <td><div align="right">Entidad:<?php echo ImprimeCombo(5); ?></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <tr>
                <td><div align="right">Fase SISA:<?php echo ImprimeCombo(6); ?></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><div align="right">Subgerente:<?php echo ImprimeCombo(8); ?></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><div align="right">Supervisor:<?php echo ImprimeCombo(9); ?></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><div align="right">Area responsable:<?php echo ImprimeCombo(3); ?></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="267"><div id="cargando3">
                  <div align="right">Con OT:<?php echo ImprimeCombo(7); ?></div>
                </div></td>
                <td width="184"><div align="right">
                  <input name="enviar"  type="button" id="enviar" value="Enviar Datos" />
                </div></td>
              </tr>
            </table>
            <p></p>
            <td><br /></td>
  <br />
  <!--      
  forma para agregar otra caja de texto adicional
  <form action="#" method="post">
 Referencia2:<input type="text" name="caja2" maxlength="16" id="caja2">-->
  
  
          </form> <div id="txtHint"></div>
        </fieldset>
   
</body>
</html>
