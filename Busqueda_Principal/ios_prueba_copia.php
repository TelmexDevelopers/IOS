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
<!--hola-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="ios.css"/>
<script type="text/javascript" src="../../scripts/mootools-core-1.4.5-full-compat.js"></script>  
<script type="text/javascript" src="../../scripts/mootools-more-1.4.0.1.js"></script><script type="text/javascript">

	window.addEvent('domready', function (){
		$('enviar').addEvent('click',ejecuta);
		//$('xls').addEvent('click',excel);
		//$('pdf').addEvent('click',pdf);
		
		
		})
		 
function excel()
{
	var combo1= $('vw_dd').value;
	var combo2= $('vw_sector').value;
	var combo3= $('vw_fase_serv').value;
	var texto= $('caja1').value;
	
	var datos = 'q='+combo1+'&r='+combo2+'&s='+combo3+'&t='+texto;

	var URL = 'reporte.php?'+datos;
	//alert(URL);
	//$('txtHint').set('html','Espere se esta procesando la informacion requerida....');
	
	window.location = URL;
	
}

function pdf()
{
	var combo1= $('vw_dd').value;
	var combo2= $('vw_sector').value;
	var combo3= $('vw_fase_serv').value;
	var texto= $('caja1').value;
	
	var datos = 'q='+combo1+'&r='+combo2+'&s='+combo3+'&t='+texto;

	var URL = 'PDF.php?'+datos;
	//alert(URL);
	//$('txtHint').set('html','Espere se esta procesando la informacion requerida....');

	window.location = URL;
	
}



function ejecuta()
{
	
	var combo1= $('vw_dd').value;
	var combo2= $('vw_sector').value;
	var combo3= $('vw_fase_serv').value;
	var texto= $('caja1').value;
	
	//alert(pagina);
	
	
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
				var datos = 'q='+combo1+'&r='+combo2+'&s='+combo3+'&t='+texto;
	
	var myHTMLRequest = new Request.HTML({
		url: 'paginacion.php',
		onRequest : function (){
			$('txtHint').set('html','Espere se esta procesando ....');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			$('xls').addEvent('click',excel);
			$('pdf').addEvent('click',pdf);
			// ejecuta primer click $('xls').addEvent('click',excel);
}	
		}).send({ 
			method:'get',
			data: datos
		});
				    
	}
  
  function cambia_pagina(page)
  {
	var combo1= $('vw_dd').value;
	var combo2= $('vw_sector').value;
	var combo3= $('vw_fase_serv').value;
	var texto= $('caja1').value;
	
	//alert(pagina);
	
	
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
	
				var datos = 'q='+combo1+'&r='+combo2+'&s='+combo3+'&t='+texto+'&pag='+page;
	
	var myHTMLRequest = new Request.HTML({
		url: 'paginacion.php',
		onRequest : function (){
			$('txtHint').set('html','Espere se esta procesando ....');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
			$('xls').addEvent('click',excel);
						$('pdf').addEvent('click',pdf);
//click de la otra pagina php paginacion	$('pdf').addEvent('click',excel);

			}	
		}).send({ 
			method:'get',
			data: datos
		});
  
	  }
  
function validatePass(caja1) {
    var RegExPattern = /^[\w-\.]{3,}-? ?[\d-\.]{4,}-? ?[\d-\.]{4,}$/ ;
    if ((caja1.match(RegExPattern)) && (caja1 !='')) {
        alert('Referencia Correcta'); 
		return true;
    } else {

	return false;
} 
}



</script>


<style type="text/css">
.auto-style1 {
	text-align: left;
}
.auto-style2 {
	margin-left: 40px;
}
</style>

</head>
<body>
<p><fieldset>		
<legend>Seguimiento Servicios</legend>
<legend></legend>
<legend></legend>
<legend></legend>
<div align="left">Detalle de servicios

 <table width="1068" border="0">
  <tr>
    <td width="260"><div align="right">Referencia:
      <input type="text" name="caja1" id="caja1" style="width: 110px">
    </div></td>
    <td width="260"><div align="right">Due Date:
          <input type="text" name="caja6" id="caja6" style="width: 110px" />
    </div></td>
    <td width="260"><div align="right">Sector:
        <input type="text" name="caja16" id="caja16" style="width: 110px" />
    </div></td>
    <td width="260"><div align="right">Area:
        <input type="text" name="caja28" id="caja28" style="width: 110px" />
    </div></td>
  </tr>
  <tr>
    <td> <div align="right">Fase serv:&nbsp;
      <input type="text" name="caja10" id="caja10" style="width: 110px" />
    </div></td>
    <td><div align="right">Usuario:&nbsp;
      <input type="text" name="caja55" id="caja77" style="width: 110px" />
    </div></td>
    <td><div align="right">Tecnologia:&nbsp;&nbsp;
      <input type="text" name="caja56" id="caja78" style="width: 110px" />
    </div></td>
    <td><div align="right">
      <div align="right">&nbsp;Dir Division:&nbsp;
        <input type="text" name="caja2" id="caja2" style="width: 110px" />
      </div>
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Edo del servicio:&nbsp;
      <input type="text" name="caja58" id="caja80" style="width: 110px" />
    </div></td>
    <td><div align="right">Subgerente:&nbsp;
      <input type="text" name="caja59" id="caja81" style="width: 110px" />
    </div></td>
    <td><div align="right">Fech Estado
      :
        <input type="text" name="caja60" id="caja82" style="width: 110px" />
    </div></td>
    <td><div align="right">&nbsp; 
      Estado OT:&nbsp;
      <input type="text" name="caja61" id="caja83" style="width: 110px" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Desc servicio:&nbsp;
      <input type="text" name="caja62" id="caja84" style="width: 110px" />
    </div></td>
    <td><div align="right">Supervisor:&nbsp;
      <input type="text" name="caja64" id="caja86" style="width: 110px" />
    </div></td>
    <td><div align="right">Dilacion total:
        <input type="text" name="caja66" id="caja88" style="width: 110px" />
    </div></td>
    <td><div align="right">OT:
      <input type="text" name="caja68" id="caja90" style="width: 110px" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right"><span class="auto-style1">&nbsp;Fase IOS:</span>&nbsp;
      <input type="text" name="caja63" id="caja85" style="width: 110px" />
    </div></td>
    <td>&nbsp;</td>
    <td><div align="right"><span class="auto-style1">Due Date:</span>:&nbsp;
      <input type="text" name="caja67" id="caja89" style="width: 110px" />
    </div></td>
    <td>&nbsp;</td>
  </tr>
</table>

 
 
  <tr>
  </div>

    <p align="left">
      
  </p>
    <td>
  </fieldset>
</fieldset>
      
<fieldset>
  <legend>Registro de Avances</legend>
  <p>Bitacora de comentarios </p>
  <p>(mostrar tabla de historico, cuando se ingresa un comentario en la caja de texto se alamacenara en un campo llamado "comentarios" en la BD, y debera reflejarse el comentario en la tabla de historico)
</p>
  <p><span class="auto-style1">Usuario:
      <input type="text" name="caja21" id="caja21" />
  </span> <span class="auto-style1">Fecha::
  <input type="text" name="caja22" id="caja22" />
  </span></p>
  <p>Agregar comentarios</p>
  <form id="form2" name="form2" method="post" action="">
    <textarea name="comentarios" id="comentarios" cols="45" rows="5"></textarea>
    <input type="submit" name="agregar" id="agregar" value="Enviar" />
  </form>
  <p>Bitacora de Comentarios</p>
  <table width="200" border="1">
  <tr>    </tr>
  </table>
  <table width="628" height="77" border="1">
    <tr>
      <th scope="col">Usuario</th>
      <th scope="col">Fecha</th>
      <th scope="col">Comentarios</th>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <fieldset>
    <legend>Puntas A-B    </legend>
    <table width="1086" border="0">
      <tr>
        <td width="262" height="37"><div align="right">
          <div align="right">Puntas :
            <select name="Puntas" id="Puntas" style="width: 145px">
              <option value="Selecciones Punta">Selecciones Punta</option>
              <option value="Punta A">Punta A</option>
              <option value="Punta B">Punta B</option>
            </select>
          </div>
        </td>
        <td width="262">&nbsp;</td>
        <td width="262">&nbsp;</td>
        <td width="272">&nbsp;</td>
        
      </tr>
      <tr>
        <td>  <div align="right"><span class="auto-style1"> Usuario:
          <input type="text" name="caja3" id="caja3" style="width: 110px" />
        </span></div></td>
        <td><div align="right"><span class="auto-style1">Direccion:
          <input type="text" name="caja7" id="caja7" style="width: 110px" />
        </span></div></td>
        <td><div align="right"><span class="auto-style1">Estado:
          <input type="text" name="caja11" id="caja11" style="width: 110px" />
        </span></div></td>
        <td><div align="right"><span class="auto-style1">&nbsp;&nbsp;Poblacion:
          <input type="text" name="caja13" id="caja13" style="width: 110px" />
        </span></div></td>
      </tr>
      <tr>
        <td><div align="right">
          <div align="right"><span class="auto-style1"> Responsable:
            <input type="text" name="caja4" id="caja4" style="width: 110px" />
        </span></div></td>
        <td><div align="right"><span class="auto-style1">&nbsp;&nbsp; Telefono:
          <input type="text" name="caja8" id="caja8" style="width: 110px" />
        </span></div></td>
        <td><div align="right"><span class="auto-style1">&nbsp; Dir Division:
          <input type="text" name="caja12" id="caja12" style="width: 110px" />
        </span></div></td>
        <td><div align="right"><span class="auto-style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    &nbsp;Coordinacionr:
              <input type="text" name="caja14" id="caja14" style="width: 110px" />
        </span></div></td>
      </tr>
      <tr>
        <td><div align="right">
          <div align="right"><span class="auto-style1">Coordinacion Abrev:
              <input type="text" name="caja5" id="caja5" style="width: 110px" />
        </span></div></td>
        <td><div align="right"><span class="auto-style1">&nbsp;&nbsp; Pta Dir Div:
          <input type="text" name="caja9" id="caja9" style="width: 110px" />
        </span></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </fieldset>
  <fieldset>
    <legend>Sub Enlaces</legend>
    
    <table width="1084" border="0">
  <tr>
    <td width="264"><div align="right"><span class="auto-style1">&nbsp; A1:
      <input type="text" name="caja15" id="caja15" style="width: 110px" />
    </span></div></td>
    <td width="264"><div align="right"><span class="auto-style1">AN:
      <input type="text" name="caja19" id="caja19" style="width: 110px" />
    </span></div></td>
    <td width="264"><div align="right"><span class="auto-style1">&nbsp;&nbsp;D1:
          <input type="text" name="caja24" id="caja36" style="width: 110px" />
    </span></div></td>
    <td width="274"><div align="right"><span class="auto-style1">DN:
          <input type="text" name="caja26" id="caja37" style="width: 110px" />
    </span></div></td>
  </tr>
  <tr>
    <td><div align="right"><span class="auto-style1">BN:
      <input type="text" name="caja17" id="caja17" style="width: 110px" />
    </span></div></td>
    <td><div align="right"><span class="auto-style1">B1:
      <input type="text" name="caja20" id="caja20" style="width: 110px" />
    </span></div></td>
    <td><div align="right"><span class="auto-style1"> RIN_A:
          <input type="text" name="caja25" id="caja40" style="width: 110px" />
    </span></div></td>
    <td><div align="right"><span class="auto-style1">RIN_B:
          <input type="text" name="caja34" id="caja41" style="width: 110px" />
    </span></div></td>
  </tr>
  <tr>
    <td><div align="right"><span class="auto-style1">RSE_B:
      <input type="text" name="caja18" id="caja18" style="width: 110px" />
    </span></div></td>
    <td><div align="right"><span class="auto-style1">RSE_A:
      <input type="text" name="caja23" id="caja23" style="width: 110px" />
    </span></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </fieldset>
  <fieldset>
    <legend>Observaciones SISA</legend>
    <form id="form5" name="form5" method="post" action="">
      <textarea name="observaciones" id="observaciones" cols="45" rows="5"></textarea>
    </form>
    <p>&nbsp;</p>
  </fieldset>
  <fieldset>
    <legend>Entrega A - B    </legend>
    <p>&nbsp;</p>
    
  <!--  alinecion de tabla-->
    <div align="center">
    <table width="648" border="0">
      <tr>
    <td width="264"><div align="right">OT:
      <span class="auto-style1">
        <input type="text" name="caja27" id="caja24" style="width: 110px" />
      </span></div></td>
    <td width="368"><div align="right">Fecha_Envio_Entrega:&nbsp;<span class="auto-style1">
      <input type="text" name="caja44" id="caja43" style="width: 110px" />
    </span></div></td>
    </tr>
  <tr>
    <td><div align="right">Empresa Filial
      : <span class="auto-style1">
        <input type="text" name="caja29" id="caja25" style="width: 110px" />
      </span></div></td>
    <td><div align="right">Fecha_Envio_Const:
      <span class="auto-style1">
        <input type="text" name="caja45" id="caja44" style="width: 110px" />
      </span></div></td>
    </tr>
  <tr>
    <td><div align="right">Coord_Contratista:
      <span class="auto-style1">
        <input type="text" name="caja30" id="caja26" style="width: 110px" />
      </span></div></td>
    <td><div align="right"><span class="auto-style1">Fecha Elaboración:
      <input type="text" name="caja46" id="caja45" style="width: 110px" />
    </span></div></td>
    </tr>
  <tr>
    <td><div align="right">Tel_Coord:      <span class="auto-style1">
      <input type="text" name="caja31" id="caja27" style="width: 110px" />
    </span></div></td>
    <td><div align="right"><span class="auto-style1">Fecha Asignación:
      <input type="text" name="caja47" id="caja46" style="width: 110px" />
    </span></div></td>
    </tr>
  <tr>
    <td><div align="right">Estatus Filial:      <span class="auto-style1">
      <input type="text" name="caja32" id="caja29" style="width: 110px" />
    </span></div></td>
    <td><div align="right"><span class="auto-style1">Fecha Aceptación:
      <input type="text" name="caja36" id="caja47" style="width: 110px" />
    </span></div></td>
    </tr>
  <tr>
    <td><div align="right">Respon. Instalador:
      <span class="auto-style1">
        <input type="text" name="caja33" id="caja30" style="width: 110px" />
      </span></div></td>
    <td><div align="right"><span class="auto-style1"> Fecha Programada Construcción:
      <input type="text" name="caja37" id="caja48" style="width: 110px" />
    </span></div></td>
    </tr>
  <tr>
    <td><div align="right"><span class="auto-style2">&nbsp; Asosiado:
      <span class="auto-style1">
        <input type="text" name="caja57" id="caja31" style="width: 110px" />
      </span></span></div></td>
    <td><div align="right"><span class="auto-style1">Fecha Programada:
      <input type="text" name="caja38" id="caja49" style="width: 110px" />
    </span></div></td>
    </tr>
  <tr>
    <td><div align="right"><span class="auto-style2">Actividad:
      <span class="auto-style1">
        <input type="text" name="caja65" id="caja32" style="width: 110px" />
      </span></span></div></td>
    <td><div align="right"><span class="auto-style1"> Fecha Programada Entrega:
      <input type="text" name="caja39" id="caja50" style="width: 110px" />
    </span></div></td>
    </tr>
  <tr>
    <td><div align="right"><span class="auto-style2"> CTL A:
      <span class="auto-style1">
        <input type="text" name="caja69" id="caja33" style="width: 110px" />
      </span></span></div></td>
    <td><div align="right"><span class="auto-style1">Fecha Construcción Terminado:
      <input type="text" name="caja40" id="caja51" style="width: 110px" />
    </span></div></td>
    </tr>
  <tr>
    <td><div align="right"><span class="auto-style2">Contratista A:
      <span class="auto-style1">
        <input type="text" name="caja70" id="caja34" style="width: 110px" />
      </span></span></div></td>
    <td><div align="right"><span class="auto-style1">Fecha Devolución:
      <input type="text" name="caja41" id="caja52" style="width: 110px" />
    </span></div></td>
    </tr>
  <tr>
    <td><div align="right">Tel_Contratista_A :&nbsp;<span class="auto-style1">
      <input type="text" name="caja71" id="caja35" style="width: 110px" />
    </span></div></td>
    <td><div align="right"><span class="auto-style1"> Fecha_Real_Entrega:
      <input type="text" name="caja42" id="caja53" style="width: 110px" />
    </span></div></td>
    </tr>
  <tr>
    <td><div align="right"><span class="auto-style2">CTL B:
      <span class="auto-style1">
        <input type="text" name="caja72" id="caja38" style="width: 110px" />
      </span></span></div></td>
    <td><div align="right"><span class="auto-style1">Fecha_obras_Canceladas:&nbsp;
      <input type="text" name="caja43" id="caja54" style="width: 110px" />
    </span></div></td>
    </tr>
  <tr>
    <td><div align="right"><span class="auto-style2">Contratista B:
      <span class="auto-style1">
        <input type="text" name="caja73" id="caja39" style="width: 110px" />
      </span></span></div></td>
    <td><div align="right"></div></td>
    </tr>
  <tr>
    <td><div align="right">Tel_Contratista_B:
      <span class="auto-style1">
        <input type="text" name="caja35" id="caja42" style="width: 110px" />
      </span></div></td>
    <td><div align="right"></div></td>
    </tr>
</table>

    <p align="center"> </p>
  </fieldset>
  <fieldset>
    <legend>Responsable RDA    </legend>
    <div align="center">
    <table width="400" border="0">
      <tr>
        <td width="390"><div align="right">Subgerente Responsable:
          <input type="text" name="caja48" id="caja70" />
        </div></td>
      </tr>
      <tr>
        <td><div align="right">Supervisor:
          <input type="text" name="caja49" id="caja71" />
        </div></td>
      </tr>
      <tr>
        <td><div align="right">IPE Documentación:
          <input type="text" name="caja50" id="caja72" />
        </div></td>
      </tr>
      <tr>
        <td><div align="right">IPE_Entrega:
          <input type="text" name="caja51" id="caja73" />
        </div></td>
      </tr>
      <tr>
        <td><div align="right">IPE_Seguimiento:
          <input type="text" name="caja52" id="caja74" />
        </div></td>
      </tr>
      <tr>
        <td><div align="right">IPE_Analisis:
          <input type="text" name="caja53" id="caja75" />
        </div></td>
      </tr>
      <tr>
        <td><div align="right">IPE Registrado en SISA:
          <input type="text" name="caja54" id="caja76" />
        </div></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
      </tr>
    </table>
    <p>;  </p>
  </fieldset>
  <fieldset>
    <legend>Historico Movimientos Fase IOS    </legend>
    <table width="988" height="130" border="1">
      <tr>
        <th height="24" scope="col">Usuario</th>
        <th scope="col">Fase IOS INI</th>
        <th scope="col">Fecha IOS Inicial</th>
        <th scope="col">Fase IOS Fin</th>
        <th scope="col">Fase IOS Final</th>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </fieldset>
  <fieldset>
    <legend>datos</legend>
    <p>Division:<?php echo ImprimeCombo(1); ?></p>
    <p>Entidad: <?php echo ImprimeCombo(2); ?></p>
    <p>Fase: <?php echo ImprimeCombo(3); ?></p>
    <p>
      <input name="enviar" type="button" id="enviar" value="Enviar Datos" />
    </p> <td><p>&nbsp;</p></td>
  <tr><br> <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
   <td>
     </td>
</tr>
  <tr>
    <td colspan="2"><br>
    </td>
	<div id="txtHint"></div>
  </fieldset>
</fieldset>
      
     
</body>
</html>
