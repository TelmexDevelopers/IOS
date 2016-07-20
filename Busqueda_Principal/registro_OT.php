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
	<title>Registro</title>
	<link rel="stylesheet" media="screen" type="text/css" href="../css/ios.css" />
	<link rel="stylesheet" type="text/css" href="mootools-calendar/css/calendar.css"/>
	<link href="calendar.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../../scripts/mootools-core-1.4.5-full-compat.js"></script>
	<script type="text/javascript" src="../../scripts/mootools-more-1.4.0.1.js"></script>
	<script type="text/javascript" src="mootools-calendar/javascript/mootools/min/calendar.js"></script>
	<script type="text/javascript">

    
	window.addEvent('domready', function() {
     // myCal = new Calendar({ fecha: 'Y/m/d' });
	  //myCal = new Calendar({ fecha2: 'Y/m/d' });
	});

	window.addEvent('domready', function() {
		$('grabar').addEvent('click',ejecuta)
	 });

	function ejecuta()
	{
      	MooTools.lang.setLanguage("es-ES");
        var validate = new Form.Validator.Inline("nuevo_registro");
		if (validate.validate())
		{
	//var nombre de la variable = $('id de la caja de texto').value;	
	var folio= $('folio').value;
	var referencia= $('referencia').value;
	var desc_serv= $('desc_serv').value;
	var fase= $('fase').value;
	var edo= $('edo').value;
	//var tipo_proy= $('cat_proyecto').value;
	var tipo_art= $('tipo_art').value;
	var cliente= $('cliente').value;
	var entidad= $('entidad').value;
	var due_date= $('fecha').value;
	var date_edo= $('fecha2').value;
	var division= $('division').value;
	var siglas= $('siglas').value;
	var area= $('area').value;
	var cm= $('cm').value;

//	alert(coment);
// var nombre de la variable = "varible="+nombre de la variable anterior	
	var datos 
	= "folio="+folio
	+"&referencia="+referencia
	+"&desc_serv="+desc_serv
	+"&fase="+fase
	+"&edo="+edo
	//+"&tipo_proy="+tipo_proy
	+"&tipo_art="+tipo_art
	+"&cliente="+cliente
	+"&entidad="+entidad
	+"&due_date="+due_date
	+"&date_edo="+date_edo
	+"&division="+division
	+"&siglas="+siglas
	+"&area="+area
	+"&cm="+cm;

	//alert(datos);
		var myHTMLRequest = new Request.HTML({
		url: 'registro_OT_SQL.php',
		onRequest : function (){
			//Si nos muestra el resultado correcto, pinta en pantalla
			$('resultado').set('html','Cargando..');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('resultado').set('html',html);
			}	
		}).send({ 
			method:'post',
			data: datos
		});
		}
	}

</script>
	</head>
		<body>
			<!--Creamos el formulario-->
		<form name="nuevo_registro" id="nuevo_registro" action="">
		<h2>Nuevo Registro Referencia</h2>
		<table width="500" border="1">
		    <tr>
			    <td>Folio de Servicio</td>
			    <td>
    
	    <input name="folio" type="text" id="folio" class="required validate-alphanum" />

			    </td>
		  </tr>
		  <tr>
			    <td>Referencia</td>
			    <td>
    
	   <input name="referencia" type="text" id="referencia" class="validate-referencia-telmex minLength:12" maxlength="13" />
    			</td>
		  </tr>
		  <tr>
			    <td>Descripcion del Servicio</td>
			    <td>
        
    <textarea rows="2" cols="25" input name="desc_serv" type="text" id="desc_serv" class="required validate-alphanum" /></textarea>
        
			    </td>
		  </tr>
		  <tr>
			    <td>Fase</td>
			    <td>
        
        <input name="fase" type="text" id="fase" class="required validate-alphanum minLength:3" />
        
			    </td>
		  </tr>
		  <tr>
			    <td>Estado</td>
			    <td>
    <!--<input name="edo" type="text" id="edo" class="required validate-alphanum minLength:4" /> -->
        <label>
          <select name="edo" id="edo" class="required validate-alphanum">
            <option value="null">Elije un valor</option>
            <option value="1">AFE</option>
            <option value="2">EFE</option>
            <option value="3">ESF</option>
          </select>
        </label>
            
			    </td>
		  </tr>
		  <tr>
			    <td>Tipo de Proyecto</td>
			    <td>
	    <?php //echo ImprimeCombo(1); ?>
    <!--<input name="tipo_proy" type="text" id="tipo_proy" class="required validate-alphanum"/>-->
    
    			</td>
		  </tr>
	      <tr>
			    <td>Tipo de Articulo</td>
			    <td>
    
    <input name="tipo_art" type="text" id="tipo_art" class="required validate-alphanum" />
    
			    </td>
		  </tr>
		  <tr>
			    <td>Cliente</td>
			    <td>
    
    <input name="cliente" type="text" id="cliente" class="required validate-alphanum" />
    
			    </td>
		  </tr>

		  <tr>
			    <td>Entidad</td>
			    <td>
    
    <!--<input name="entidad" type="text" id="entidad" class="required validate-numeric" /> -->
        <label>
	      <select name="entidad" id="entidad" class="required validate-alphanum">
        <option value="null">Elije un valor</option>
        <option value="1">DSFS</option>
        <option value="2">DSFE</option>
        <option value="3">PCS</option>
        <option value="4">WICX</option>
        <option value="5">ALE</option>
        <option value="6">LLF</option>
      </select>
    </label>

    		</td>
	    </tr>
        <tr>
		    <td>Fecha Programada</td>
		    <td>
    
	    <input name="fecha" type="text" id="fecha" />
    <!--<input type="text" name="fecha" id="fecha" size="16" class="required validate-numeric">-->
		    </td>
	  </tr>
	  <tr>
		    <td>Fecha Estado</td>
		    <td>
    
	  	<input id="fecha2" class="calendar" type="text" name="fecha2" />
   <!--<input type="text" name="fecha" id="fech2" size="16" class="required validate-numeric">-->
    		</td>
	  </tr>
      <tr>
		    <td>Division:</td>
	        <td> <label>
      <select name="division" id="division" class="required validate-alphanum">
        <option value="null">Elije un valor</option>
        <option value="1">ALE</option>
        <option value="2">ALEINT</option>
        <option value="3">METRO</option>
        <option value="4">METRO INFRA</option>
        <option value="5">METRO ADMIN</option>
        <option value="6">SUR</option>
      </select>
    </label>
		    </td>
	  </tr>
	  <tr>
    		<td>Siglas del Edificio</td>
		    <td>
    <input name="siglas" type="text" id="siglas" />
		    </td>
	  </tr>
	  <tr>
		    <td>Area</td>
		    <td>

    <input name="area" type="text" id="area" class="required validate-alphanum" />
    
		    </td>
	  </tr>
	  <tr>
    		<td>Centro de Mantenimiento</td>
		    <td>
    
    <input name="cm" type="text" id="cm" />    
		    </td>
	  </tr>
	  <tr>
    		<td colspan="2" align="right">    
    <input type="button" name="grabar" value="Registrar" id="grabar" />
		    </td>
	</table>
	</form>
<!--Despues de validar los datos correctos mande los resultados-->
	<div id="resultado"></div>
</body>
</html>