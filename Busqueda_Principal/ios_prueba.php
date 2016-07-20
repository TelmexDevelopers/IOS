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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script type="text/javascript" src="mootools-core-1.4.5-full-compat.js"></script>  
<script type="text/javascript" src="mootools-more-1.4.0.1.js"></script>
<script type="text/javascript">

	window.addEvent('domready', function (){
		$('enviar').addEvent('click',ejecuta);
		
		})
		 
function excel()
{
	var combo1= $('vw_dd').value;
	var combo2= $('vw_dd').value;
	var combo3= $('vw_fase_serv').value;
	var texto= $('caja1').value;
	
	var datos = 'q='+combo1+'&r='+combo2+'&s='+combo3+'&t='+texto;

	var URL = 'reporte.php?'+datos;
	alert(URL);
	
	window.location = URL;
	
}

function ejecuta()
{
	
	var combo1= $('vw_dd').value;
	var combo2= $('vw_dd').value;
	var combo3= $('vw_fase_serv').value;
	var texto= $('caja1').value;
	
	
	
	
	if (texto != "") {
	var valida = validatePass(texto);	
		 	alert('Referencia Correcta'); 
	
	if (valida==false){
		var errorMessage = 'Referencia no valida';
       alert(errorMessage);
       $('caja1').focus();
		return false;
			}
	}
				var datos = 'q='+combo1+'&r='+combo2+'&s='+combo3+'&t='+texto;
	
	var myHTMLRequest = new Request.HTML({
		url: 'paginacion.php',
		onRequest : function (){
			$('txtHint').set('html','Espere se esta procesando ....');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			$('xls').addEvent('click',excel);
}	
		}).send({ 
			method:'get',
			data: datos
		});
				    
	}
  
  function cambia_pagina(page)
  {
	var combo1= $('vw_dd').value;
	var combo2= $('vw_dd').value;
	var combo3= $('vw_fase_serv').value;
	var texto= $('caja1').value;
	
	alert(page);
	
	
	if (texto != "") {
	var valida = validatePass(texto);	
//		 	alert('Referencia Correcta'); 
	
	if (valida==false){
		var errorMessage = 'Referencia no valida';
       alert(errorMessage);
       $('caja1').focus();
		return false;
			}
	}
				var datos = 'q='+combo1+'&r='+combo2+'&s='+combo3+'&t='+texto+'&pag='+page;
	
	var myHTMLRequest = new Request.HTML({
		url: 'paginacion.php',
		onRequest : function (){
			$('txtHint').set('html','Espere se esta procesando ....');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			$('xls').addEvent('click',excel);
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
</head>
<body>
  <tr>
   <form action="#" method="post">
 Referencia:<input type="text" name="caja1" id="caja1">
    <td>
    <br>
	</td>
    <br>  <td>Division:</td>
    <td><?php echo ImprimeCombo(1); ?>
  <br>
    </td>
  </tr>
  <tr>
  
    <br>
    <td>Division_prueba:</td>
    <td><?php echo ImprimeCombo(2); ?>
    </td>
  </tr>
  <br>
  <tr>
    <br> <td>Fase:</td>
    <td><?php echo ImprimeCombo(3); ?>
    </td>
  </tr>
   <tr>
   <td>
      </td>
  </tr>
  <tr>
    <td colspan="2">
    <input name="enviar" type="button" id="enviar" value="Enviar Datos" />
     	<form method="post"></form>
  <br>
        </td>
	<div id="txtHint"></div>
</body>
</html>
