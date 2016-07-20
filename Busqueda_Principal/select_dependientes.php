<?php
function encadenacombo()
{
	include 'conexion.php';
	
	conectar();
	//$consulta=mysql_query("SELECT id, opcion FROM lista_paises");
	$consulta=mysql_query("select id_usuario,str_Nombre_Sup from VW_SUPERVISORES_ANALISIS");
	//desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='supervisores' id='supervisores' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<!-- 



Este contenido es de libre uso y modificación bajo la siguiente licencia: http://creativecommons.org/licenses/by-nc-sa/2.5/deed.es

Sobre el reconocimiento:
Todos los códigos han sido realizados con la idea de que sirvan para colaborar con el aprendizage de aquellos que se están introduciendo
en estas tecnologías y no con el objetivo de que sean utilizados directamente en sitios web. No obstante si utilizas algún código en tu sitio 
(ya sea sin modificar o modificado), o si ofreces los fuentes para descargar o si bien decides publicar alguno de los artículos debes cumplir con:
-Colocar un link a http://www.formatoweb.com.ar/ajax/ visible por tus usuarios como forma de mención a la fuente original del contenido.
-Enviar un correo a edanps@gmail.com informando la URL donde el contenido se ha publicado o se va a publicar en un futuro.
-Si publicas los fuentes para descargar este texto no debe ser eliminado ni alterado.

Más ejemplos y material sobre AJAX en: http://www.formatoweb.com.ar/ajax/
Cualquier sugerencia, crítica o comentario son bienvenidos.
Contacto: edanps@gmail.com



-->

<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>AJAX, Ejemplos: Combos (select) dependientes, codigo fuente - ejemplo</title>
<link rel="stylesheet" type="text/css" href="select_dependientes.css">
<script type="text/javascript" src="select_dependientes.js"></script>
<script type="text/javascript" src="mootools-core-1.4.5-full-compat.js"></script>  
<script type="text/javascript" src="mootools-more-1.4.0.1.js"></script>
<script type="text/javascript"><script language="php"></script>
	
	
       var myHTMLRequest = new Request.HTML({
		url: 'Paginacion_Principal.php',
		onRequest : function (){
	$('txtHint').set('html','<br /><br /><br /><img src="../../images/loading.gif" width="32" 	height="32" alt="Cargando..." />');

			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('txtHint').set('html',html);
	}	
		}).send({ 
			method:'get',
			data: datos
		})
				    
	//}


</script>

</head>

<body>
			<div id="demoIzq"><?php encadenacombo(); ?></div>
			<div id="demo" style="width:200px;">
				<div id="demoDer">
					<select disabled="disabled" name="ipe" id="ipe">
						<option value="0">Selecciona opci&oacute;n...</option>
					</select>
				</div>
				
			</div>
            
			
</body>
</html>