<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include_once('../../adodb/adodb.inc.php');
 include_once("connection.php");
include('../../../../includes/libreria.php');

$referencia = $_GET['referencia'];
if (isset($_GET['referencia']));
{
	$SQL = "SELECT referencia, desc_serv, due_date, GRUPO_DIL_SERVICIO, fase_serv, edo_serv, fecha_estado, TECNOLOGIA, usuario, sector, coordinacion_abrev, dir_division, str_Fase_IOS, str_Area_responsable, SUBGERENTE_RESPONSABLE, SUPERVISOR,ser_n FROM vw_ios_reg WHERE referencia = '".$referencia."'";
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
	$referencia= $RS->fields(0);
	$desc_serv=  $RS->fields(1);
	$due_date=  $RS->fields(2);
	$GRUPO_DIL_SERVICIO=  $RS->fields(3);
	$fase_serv=  $RS->fields(4);
	$edo_serv=  $RS->fields(5);
	$fecha_estado=  $RS->fields(6);
	$TECNOLOGIA=  $RS->fields(7);
	$usuario=  $RS->fields(8);
	$sector=  $RS->fields(9);
	$coordinacion_abrev=  $RS->fields(10);
	$dir_division=  $RS->fields(11);
	$str_Fase_IOS=  $RS->fields(12);
	$str_Area_responsable=  $RS->fields(13);
	$SUBGERENTE_RESPONSABLE=  $RS->fields(14);
	$SUPERVISOR=  $RS->fields(15);
	$ser_n = $RS->fields(16);
	
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title>Telmex IOS - Datos de Referencia</title>
	<style type="text/css">
		*				{ font-family:tahoma; }
		h3				{ border-bottom:0; }
		
		#message		{ padding:7px 10px; float:left; margin-left:150px; width:350px; }
		#status		{ border:1px solid #999; padding:5px; width:800px; height:75px; margin:5px 0; }
		#statuses	{ width:800px; }
		#submit		{ cursor:pointer; padding:5px; border:1px solid #ccc; float:left; margin:0 20px 0 0; }
		
		.status-box	{ padding:10px 20px 10px 70px; height:30px; border-bottom:1px dotted #aaa; }
		.status-box:hover	{ background-color:#eee; }
		.success		{ color:#008000; }
		.failure		{ color:#f00; }
		.time			{ color:#2a447b; font-size:10px; }
		
	</style>
    <style>
		@import "LightFace/Assets/LightFace.css";
	</style>
        <title>Accordion</title>
        <link rel="stylesheet" type="text/css" href="ios.css" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="mootools-calendar/css/calendar.css"/>
		<script type="text/javascript" src="js/modernizr.custom.29473.js"></script>
        <script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"></script>
        <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"></script>
        <script type="text/javascript" src="mootools-calendar/javascript/mootools/calendar.js"></script>
        <script type="text/javascript" src="LightFace/Source/LightFace.js"></script>
        <script type="text/javascript" src="LightFace/Source/LightFace.IFrame.js"></script>
        <script type="text/javascript" src="LightFace/Source/LightFace.Image.js"></script>
        <script type="text/javascript" src="LightFace/Source/LightFace.Request.js"></script>
		<script type="text/javascript" src="LightFace/Source/LightFace.Static.js"></script>
		<script type="text/javascript">

	function actualiza_referencia()
	{
		
	light = new LightFace.IFrame
					(
		{
				height:550, 
				width:790,
				url: 'search_ref.php?referencia=<?php echo $referencia; ?>',
				title: 'Actualiza Referencia' 
		}
					)
				.addButton('Cerrar', function() 
			{ 	light.close(); 
			}	,true).open();
	}
		window.addEvent('domready', function() {

			$('start').addEvent('click',actualiza_referencia);
			});
</script>      
</head>
    <body>
		<div class="container">
<!-- Codrops top bar --><!--/ Codrops top bar -->
<section class="ac-container">
	<div>
	<input id="ac-1" name="accordion-1" type="checkbox" checked style="visibility:hidden"  />
	<label for="ac-1">Seguimiento Servicios <br/><br></label>
	  <article class="ac-medium">
      <br />
      <table width="907" border="0" align="center" class="Texto_Mediano_Gris" height="192">
      	<tr align="right">
        	<td width="321">
              Referencia: <input type="text" name="referencia" id="referencia" class="txtbox" value="<?php echo $referencia; ?>" />
            </td>
            <td width="619">Tecnologia:
            <input type="text" name="TECNOLOGIA" id="TECNOLOGIA" class="txtbox" value="<?php echo $TECNOLOGIA; ?>" /></td>
          </tr>
      	<tr align="right">
            <td>
            	Fase serv: <input type="text" name="fase_serv" id="fase_serv" class="txtbox"  value="<?php echo $fase_serv; ?>" />
            </td>
            <td>
            	PTA Usuario: 
            	  <input type="text" name="usuario" id="usuario" class="txtbox" value="<?php echo $usuario; ?>" />
            </td>
          </tr>
      	<tr align="right">
            <td>
            	Edo del servicio: <input type="text" name="edo_serv" id="edo_serv" class="txtbox" value="<?php echo $edo_serv; ?>" />
            </td>
            <td>
            	Subgerente: <input type="text" name="SUBGERENTE_RESPONSABLE" id="SUBGERENTE_RESPONSABLE" class="txtbox" value="<?php echo $SUBGERENTE_RESPONSABLE; ?>" />
            </td>
          </tr>
      	<tr align="right">
            <td>
            	Desc servicio: <input type="text" name="desc_serv" id="desc_serv" class="txtbox" value="<?php echo $desc_serv; ?>" />
            </td>
            <td>
            	Supervisor: <input type="text" name="SUPERVISOR" id="SUPERVISOR" class="txtbox" value="<?php echo $SUPERVISOR; ?>" />
            </td>
          </tr>
      	<tr align="right">
            <td>
            	Fase IOS: <input type="text" name="str_Fase_IOS" id="str_Fase_IOS" class="txtbox" value="<?php echo $str_Fase_IOS; ?>" />
            </td>
            <td>&nbsp;</td>
          </tr>
        <tr>
            <td align="center" colspan="2">
	<button id="start">Actualizaci&oacute;n Servicio </button>
<!--                <a href="update_ref.php" class="cerabox" data-type="ajax"><img src="../../../../images/button.jpg" width="131" height="31" alt="Actualizar Avance" /></a></div>
-->            </td>
        </tr>
    </table>
    <br />
    </article>
	</div>
    <!--TERMINA PRIMER TAB-->
    
	<div>
	<input id="ac-2" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-2">Registro de Avances</label>
		<article class="ac-large"><br />
               
    <!--**************************COMENTARIOS****************************************-->
    <div style="height:384px; overflow:scroll; width:988px;">
    <fieldset>
    <div class="avances_referencia">
    
	<h3>Comentarios</h3>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<textarea name="status" class="centerRight" id="status"></textarea><br />
		<input type="button" value="Agregar Comentario" id="submit" />
		<div id="message"><?php echo $message; ?></div><br />
	</form>
	
	<div class="clear"></div>
	<p>&nbsp;</p>
	<h3>Comentarios recientes</h3>
	<div id="statuses">
		<?php
		
		if (isset($_GET['referencia']))
		{
			$meses = array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diiembre");

			//get the latest 20
			$query  = "SELECT txt_Avance_Referencia,DAY(dt_Fecha_Registro) as dia,MONTH(dt_Fecha_Registro) as mes, YEAR(dt_Fecha_Registro) as anio, DATE_FORMAT(dt_Fecha_Registro,' @ % %l:%i:%s %p') AS ds, CONCAT(cat_Usuarios.str_Nombre,' ',cat_Usuarios.str_Ap_Paterno,' ',cat_Usuarios.str_Ap_Materno) as Nombre_Usuario FROM tb_Avances_Referencia LEFT JOIN cat_Usuarios ON tb_Avances_Referencia.id_Usuario =  cat_Usuarios.id_Usuario ORDER BY dt_Fecha_Registro DESC"; // LIMIT 20
			$result = mysql_query($query,$link) or die(mysql_error().': '.$query);
			$cuantas_filas = mysql_num_rows($result);
			if ($cuantas_filas > 0)
			{
				while($row = mysql_fetch_assoc($result))
				{
					echo '<div class="status-box">',stripslashes($row['txt_Avance_Referencia']),'<br /><span class="time">'.ucwords(strtolower($row['Nombre_Usuario'])).' - '.$row['dia'].' de '.$meses[$row['mes']].' de '.$row['anio'].$row['ds'].'</span></div>';
				}
			} else {
				echo '<br /><b>No hay comentarios...</b>';	
			}
		} else {
			echo '<br /><b>Error: No hay referecia especificada!!</b>';	
			
		}
		?>
	</div>
    
</fieldset>
    </div>
    <!--***********************************FIN COMENTARIOS**********************************-->    
    <br/>
	</article>
    </div>
    
    <!--TERMINA SEGUNDO TAB-->

<div>
	<input id="ac-3" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-3">PUNTA A</label>
	<article class="ac-small">
	<br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
        Usuario: <input type="text" name="caja3" id="caja3" class="txtbox" />
            </td>
            <td>
        Direccion: <input type="text" name="caja7" id="caja7" class="txtbox" />
            </td>
            <td>
        Estado: <input type="text" name="caja11" id="caja11" class="txtbox" />
            </td>
            <td>
		Poblacion: <input type="text" name="caja13" id="caja13" class="txtbox" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		Responsable: <input type="text" name="caja4" id="caja4" class="txtbox" />
            </td>
            <td>
		Telefono: <input type="text" name="caja8" id="caja8" class="txtbox" />
            </td>
            <td>
		Dir Division: <input type="text" name="dir_division2" id="dir_division2" class="txtbox" />
            </td>
            <td>
		Coordinacion: <input type="text" name="coordinacion_abrev" id="coordinacion_abrev" class="txtbox" value="<?php echo $coordinacion_abrev; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
        Coordinacion Abrev: <input type="text" name="caja5" id="caja5" class="txtbox" />
            </td>
            <td>
		Pta Dir Div: <input type="text" name="caja9" id="caja9" class="txtbox" />
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
    </table>
        <br />	
      </article>
	</div>
    <!--TERMINA TERCER TAB-->

<div>
	<input id="ac-4" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-4">PUNTA B</label>
	<article class="ac-small">
	<br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
        Usuario: <input type="text" name="caja3" id="caja3" class="txtbox" />
            </td>
            <td>
        Direccion: <input type="text" name="caja7" id="caja7" class="txtbox" />
            </td>
            <td>
        Estado: <input type="text" name="caja11" id="caja11" class="txtbox" />
            </td>
            <td>
		Poblacion: <input type="text" name="caja13" id="caja13" class="txtbox" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		Responsable: <input type="text" name="caja4" id="caja4" class="txtbox" />
            </td>
            <td>
		Telefono: <input type="text" name="caja8" id="caja8" class="txtbox" />
            </td>
            <td>
		Dir Division: <input type="text" name="caja12" id="caja12" class="txtbox" />
            </td>
            <td>
		Coordinacion: <input type="text" name="coordinacion_abrev" id="coordinacion_abrev" class="txtbox" />
            </td>
        </tr>
      	<tr align="right">
            <td>
        Coordinacion Abrev: <input type="text" name="caja5" id="caja5" class="txtbox" />
            </td>
            <td>
		Pta Dir Div: <input type="text" name="caja9" id="caja9" class="txtbox" />
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
		</table>
        <br />	
      </article>
	</div>

    <!--TERMINA CUARTO TAB-->

<div>
	
      	
  </article>
	</div>
    <!--TERMINA QUINTO TAB-->
 
 <div>
    <input id="ac-6" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-6">OBSERVACIONES SISA</label>
	<article class="ac-medium">
    <br />
    <textarea name="observaciones" id="observaciones" cols="45" rows="5"></textarea>
    <br />
      </article>
	</div>
    <!--TERMINA SEXTO TAB-->

 <div>
   	<input id="ac-7" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-7">ENTREGA </label>
	<article class="ac-large">
    <br />
	<table width="950" border="0" align="center" class="Texto_Mediano_Gris" height="350">
      	<tr align="right">
        	<td>
            OT: <input type="text" name="caja27" id="caja24" style="width: 180px" />
            </td>
            <td>
   			Fecha_Envio_Entrega: <input type="text" name="caja44" id="caja43" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Empresa Filial: <input type="text" name="caja29" id="caja25" style="width: 180px" />
            </td>
            <td>
		    Fecha_Envio_Const: <input type="text" name="caja45" id="caja44" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>Aceptacion de OT: 
    		  <input type="text" name="caja30" id="caja26" style="width: 180px" />
            </td>
            <td>
		    Fecha Elaboraci&oacute;n: <input type="text" name="caja46" id="caja45" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>Coord_contratista:
              <input type="text" name="caja31" id="caja27" style="width: 180px" />
            </td>
            <td>
		    Fecha Asignaci&oacute;n: <input type="text" name="caja47" id="caja46" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Tel_Coordinadorl: 
		      <input type="text" name="caja32" id="caja29" style="width: 180px" />
            </td>
            <td>
    		Fecha Aceptaci&oacute;n: <input type="text" name="caja36" id="caja47" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
    		Estatus fiscalr: 
    		  <input type="text" name="caja33" id="caja30" style="width: 180px" />
            </td>
            <td>
		    Fecha Programada Construcci&oacute;n: <input type="text" name="caja37" id="caja48" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
			Asosiado: <input type="text" name="caja57" id="caja31" style="width: 180px" />
            </td>
            <td>
		    Fecha Estado Filial: 
		      <input type="text" name="caja38" id="caja49" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Actividad: <input type="text" name="caja65" id="caja32" style="width: 180px" />
            </td>
            <td>
		    Fecha Programada Entrega: <input type="text" name="caja39" id="caja50" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
    		CTL A: <input type="text" name="caja69" id="caja33" style="width: 180px" />
            </td>
            <td>
		    Fecha Construcci&oacute;n Terminado: <input type="text" name="caja40" id="caja51" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Contratista A: <input type="text" name="caja70" id="caja34" style="width: 180px" />
            </td>
            <td>
		    Fecha Devoluci&oacute;n: <input type="text" name="caja41" id="caja52" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Tel_Contratista_A : <input type="text" name="caja71" id="caja35" style="width: 180px" />
            </td>
            <td>
		    Fecha_Real_Entrega: <input type="text" name="caja42" id="caja53" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    CTL B: <input type="text" name="caja72" id="caja38" style="width: 180px" />
            </td>
            <td>
		    Fecha_obras_Canceladas: <input type="text" name="caja43" id="caja54" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		    Contratista B: <input type="text" name="caja73" id="caja39" style="width: 180px" />
            </td>
            <td>
		    Tel_Contratista_B: <input type="text" name="caja35" id="caja42" style="width: 180px" />
            </td>
        </tr>
      	<tr align="right">
            <td>Tel_Contratista B:
              <input type="text" name="caja" id="caja" style="width: 180px" />
	      </table>
	  </article>
	</div>
    <!--TERMINA SÉPTIMO TAB-->
 
<div>
   	
	  </article>
	</div>
    <!--TERMINA OCTAVO TAB-->

<div>
	
   	 </article>
	</div>
    <!--TERMINA NOVENO TAB-->
    
  
  	<input id="ac-10" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-10">HISTORICO DE MOVIMIENTOS</label>
    <article class="ac-medium">
   </br>
<table width="990" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
           Usuario
            </td>
            <td>
            Fase IOS INI
            </td>
            <td>
           	Fecha Fase IOS Inicial
            </td>
            <td>
           	Fase IOS Fin
            </td>
            <td>
           	Fecha Fase IOS Final
	  </table>
    </article>
	</section>
	</div>
   
    
    <!--TERMINA DÉCIMO TAB-->
    <div id="resultado"></div>
        </body>
</html>