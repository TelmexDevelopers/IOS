<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');
include ('../includes/funciones.php');
//include('../../../../includes/libreria.php');

	$referencia = $_GET['referencia'];
	$ser_n = $_GET['ser_n'];
	
	if (isset($_GET['referencia']) && isset($_GET['ser_n']));
	{
	$SQL = "SELECT 
	referencia,
	desc_serv,
	due_date,
	GRUPO_DIL_SERVICIO,
	fase_serv,
	edo_serv,
	fecha_estado,
	TECNOLOGIA,
	usuario,
	sector,
	coordinacion_abrev,
	dir_division,
	str_Fase_IOS,
	str_Area_responsable,
	SUBGERENTE_RESPONSABLE,
	SUPERVISOR,
	str_problema_acceso,
	str_coment_probl_acceso,
	Programa,
	ser_n,
	id_Fase_IOS,
	dt_Fecha_Fase_IOS
	FROM vw_ios_reg WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n."'";
	//echo $SQL."<br />";
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
//	$num_registros = $RS->RecordCount();
	while (!$RS->EOF)
	{
	
	//$referencia=         $RS->fields(0);
	$desc_serv=          $RS->fields(1);
	$due_date=           $RS->fields(2);
	$GRUPO_DIL_SERVICIO=  $RS->fields(3);
	$fase_serv=          $RS->fields(4);
	$edo_serv=           $RS->fields(5);
	$fecha_estado=       $RS->fields(6);
	$TECNOLOGIA=         $RS->fields(7);
	$usuario=            $RS->fields(8);
	$sector=             $RS->fields(9);
	$coordinacion_abrev= $RS->fields(10);
	$dir_division=       $RS->fields(11);
	$str_Fase_IOS=       $RS->fields(12);
	$str_Area_responsable= $RS->fields(13);
	$SUBGERENTE_RESPONSABLE=  $RS->fields(14);
	$SUPERVISOR=        	  $RS->fields(15);
	$str_problema_acceso=     $RS->fields(16);
	$str_coment_probl_acceso= $RS->fields(17);
	$Programa= 				  $RS->fields(18);
	$ser_n_ok =               $RS->fields(19);
	$id_Fase_IOS_G = $RS->fields(20);
	$dt_Fecha_Fase_IOS_G = $RS->fields(21);
	
	$RS->MoveNext();
	}
	$RS->Close();
	$RS = NULL;
	
	// TRAE DATOS PUNTAS A Y B
	
//	$SQL_3 = "SELECT 
//	usuario_puntas,
//	responsable,
//	coordinacion_abrev,
//	direccion,
//	telefono,
//	est_abrev,
//	dir_division,
//	poblacion,
//	coordinacion,	
//	pta,
//	ser_n
//	  
//	FROM vw_puntas WHERE referencia = '".$referencia."' ";
//	//echo $SQL_3."<br />";
//	$RS_3 = TraeRecordset($SQL_3);
//	if (!$RS_3) die('Error en DB!');
//	while (!$RS_3->EOF)
//	{
//	$num_registros = $RS_3->RecordCount();
//	
//	if ($RS_3->fields(9) == 'A')
//	{
//		$usuario_puntas   	= $RS_3->fields(0);
//		$responsable      	= $RS_3->fields(1);
//		$coordinacion_abrev   = $RS_3->fields(2);
//		$direccion  		    = $RS_3->fields(3);
//		$telefono         	= $RS_3->fields(4);
//		$est_abrev        	= $RS_3->fields(5);
//		$dir_division         = $RS_3->fields(6);
//		$poblacion   		= $RS_3->fields(7);
//		$coordinacion         = $RS_3->fields(8);
//		$pta   			    = $RS_3->fields(9);
//		$ser_n                = $RS_3->fields(10);
//	} else {
//		$usuario_puntasb     = $RS_3->fields(0);
//		$responsableb        = $RS_3->fields(1);
//		$coordinacion_abrevb = $RS_3->fields(2);
//		$direccionb  		 = $RS_3->fields(3);
//		$telefonob        	 = $RS_3->fields(4);
//		$est_abrev_b         = $RS_3->fields(5);
//		$dir_divisionb       = $RS_3->fields(6);
//		$poblacionb    		 = $RS_3->fields(7);
//		$coordinacionb       = $RS_3->fields(8);
//		$ptab   			 = $RS_3->fields(9);
//		$ser_nb              = $RS_3->fields(10);
//			
//	
//	}
//	
//	$RS_3->MoveNext();
//	}
//	$RS_3->Close();
//	$RS_3 = NULL;
	
	// TRAE DATOS CENTRO NACIONALES 
	
	$SQL = "SELECT 
		id_Fase_IOS,
		str_Fase_IOS_CNS,
		dt_fec_fase_IOS,
		IPE_Eth,
		str_referencia_hub,
		str_tipo_hub,
		PBA_TRASPASO_C_A,
		PBA_TRASPASO_C_TX,
		dt_FECHA_LIQ_CNA,
		dt_FECHA_ING_CNA,
		dt_FECHA_PRO_RES,
		str_FECHA_PROG,
		str_NOM_SOLICITANTE
	FROM vw_cns_2
	WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n_ok."'";
	//echo $SQL."<br />";
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros =	 $RS->RecordCount();

	if ($num_registros > 0)
	{
		$id_Fase_IOS_cns = $RS->fields(0);
		$str_Fase_IOS_cns = $RS->fields(1);
		$dt_fec_fase_IOS = $RS->fields(2);
		$IPE_Eth = $RS->fields(3);
		$str_referencia_hub = $RS->fields(4);
		$str_tipo_hub = $RS->fields(5);
		$PBA_TRASPASO_A_C = $RS->fields(6);
		$PBA_TRASPASO_C_TX = $RS->fields(7);
		$dt_FECHA_LIQ_CNA = $RS->fields(8);
		$dt_FECHA_ING_CNA = $RS->fields(9);
		$dt_FECHA_PRO_RES = $RS->fields(10);
		$str_FECHA_PROG = $RS->fields(11);
		$str_NOM_SOLICITANTE = $RS->fields(12);
	}
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
		var fase_ios_g = $('id_Fase_IOS').value
		var fase_ios_eq = $('id_Fase_IOS_cns').value
		var dt_Fecha_Fase_IOS = $('dt_Fecha_Fase_IOS').value
	var datos_referencia = 'Update_serch_CNS.php?referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n_ok; ?>&id_Fase_IOS='+fase_ios_g+'&id_Fase_IOS_cns='+fase_ios_eq+'&dt_Fecha_Fase_IOS='+dt_Fecha_Fase_IOS;

	//alert (datos_referencia);
	light = new LightFace.IFrame
					(
		{
				height:410, 
				width:790,
				url: datos_referencia,
				title: 'Actualiza Referencia' 
		}
					)
				.addButton('Cerrar', function() 
			{ 	
				light.close(); 
			
		var datos = 'referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n_ok; ?>';
		var myHTMLRequest = new Request.JSON({
		url: 'json_refresh_CNS.php',
		onRequest : function (){
			//$('resultado').set('html','Cargando..');
			}	,
		
		onSuccess : function(responseJSON, responseText)	{
//alert(datos);
			var json = JSON.parse(responseText);
						
	//"str_Fase_IOS":"ADVA NO CONFIGURADO","str_referencia_hub":"G10-1105-0001_A","bol_PBA_TRASPASO_A_C":"NO EXITOSO","bol_PBA_TRASPASO_C_TX":"EXITOSO","dt_FECHA_LIQ_CNA":"2012-08-17","dt_FECHA_ING_CNA":"2012-07-12","str_FECHA_PROG":"2012-07-12","str_NOM_SOLICITANTE":"BERENICE MENDOZA","dt_FECHA_PRO_RES":"2012-07-12"}
			$('Fase_IOS_cns').set('value',json.str_Fase_IOS);
			$('id_Fase_IOS_cns').set('value',json.id_Fase_IOS_cns);
			$('str_referencia_hub').set('value',json.str_referencia_hub);
			$('str_tipo_hub').set('value',json.str_tipo_hub);
			$('bol_PBA_TRASPASO_A_C').set('value',json.bol_PBA_TRASPASO_A_C);
			$('bol_PBA_TRASPASO_C_TX').set('value',json.bol_PBA_TRASPASO_C_TX);
			$('dt_FECHA_LIQ_CNA').set('value',json.dt_FECHA_LIQ_CNA);
			$('dt_FECHA_ING_CNA').set('value',json.dt_FECHA_ING_CNA);
			$('dt_FECHA_PRO_RES').set('value',json.dt_FECHA_PRO_RES);
			$('str_FECHA_PROG').set('value',json.str_FECHA_PROG);
			$('str_NOM_SOLICITANTE').set('value',json.str_NOM_SOLICITANTE);
			$('id_Fase_IOS').set('value',json.id_Fase_IOS_G);
			$('str_Fase_IOS').set('value',json.str_Fase_IOS_G);
			$('dt_Fecha_Fase_IOS').set('value',json.Fecha_Fase_IOS_G);
			$('Fecha_Fase_IOS_cns').set('value',json.Fecha_Fase_IOS_CNS);

			}	
		}).send({ 
			method:'get',
			data: datos
		});
	
				
			
			}	,true).open();
	}
		window.addEvent('domready', function() {

			$('start').addEvent('click',actualiza_referencia);
			});
			
	function detalle_eq_tramo(id_tramos)
	{
	//alert(tramos);
	light = new LightFace.IFrame
					(
		{
				height:420, 
				width:800,
				url: '../MooTools-TabPanel/Demo/resumen_eqpo.php?id_tramos='+id_tramos,
				title: 'Resumen de Tramos ' 
		}
					)
				.addButton('Cerrar', function() 
			{ 	light.close(); 
			}	,true).open();
	}
				
</script>      
</head>
    <body>
		<div class="container">
<!-- Codrops top bar --><!--/ Codrops top bar -->
<section class="ac-container">
	<div>
	<input id="ac-1" name="accordion-1" type="checkbox" checked style="visibility:hidden"  />
	<label for="ac-1">DETALLE CENTROS NACIONALES<br/><br></label>
	 <article class="ac-medium">
      <br />
    <table width="950" border="0" align="center" class="Texto_Mediano_Gris" height="200">
   	<tr align="right">
      	<td>
        Referencia: 
        <input type="text" name="$referencia" id="$referencia" class="txtbox" value="<?php echo $referencia; ?>" />
         </td>
         <td>
        Tipo de Proyecto: 
        <input type="text" name="Tipo_Proyecto" id="Tipo_Proyecto" class="txtbox" value="<?php //echo $due_date; ?>" />
         </td>
         <td>
         Tecnologia:
         <input type="text" name="TECNOLOGIA" id="TECNOLOGIA" class="txtbox" value="<?php echo $TECNOLOGIA; ?>" /></td>
         <td>&nbsp;</td>
         </tr>
      	<tr align="right">
            <td>
         Fase Servicio: 
         <input type="text" name="fase_serv" id="fase_serv" class="txtbox"  value="<?php echo $fase_serv; ?>" />
            </td>
            <td>
         Usuario: 
         <input type="text" name="usuario" id="usuario" class="txtbox" value="<?php echo $usuario; ?>" />
            </td>
            <td>
         IPE Ethernet:
        <input type="text" name="ipe_ethernet" id="ipe_ethernet" class="txtbox" value="<?php echo $IPE_Eth; ?>" />
         	</td>
         	<td>
            </td>
        	</tr>
      		<tr align="right">
            <td>
        Estado del servicio: 
        <input type="text" name="edo_serv" id="edo_serv" class="txtbox" value="<?php echo $edo_serv; ?>" />
            </td>
            <td>
        Pta Usuario:
        <input type="text" name="usuario2" id="usuario2" class="txtbox" value="<?php echo $usuario; ?>" />
        </td>
            <td>
            Motivo de Atraso CM:
        <input type="text" name="str_problemas_acceso" id="str_problemas_acceso" class="txtbox" value="<?php echo $str_problemas_acceso; ?>" />
            </td>
        	<td>&nbsp;</td>
        </tr>
      	<tr align="right">
            <td>
        Descripci&oacute;n servicio: 
        <input type="text" name="desc_serv" id="desc_serv" class="txtbox" value="<?php echo $desc_serv; ?>" />
            </td>
            <td>
        Subgerente:
        <input type="text" name="SUBGERENTE_RESPONSABLE" id="SUBGERENTE_RESPONSABLE" class="txtbox" value="<?php echo $SUBGERENTE_RESPONSABLE; ?>" /></td>
            <td>Motivo de Atraso:
        <input type="text" name="str_coment_probl_acceso" id="str_coment_probl_acceso" class="txtbox" value="<?php echo $str_coment_probl_acceso; ?>" />
			</td>
            <td>&nbsp;</td>
        </tr>
      	<tr align="right">
            <td>
        Fase IOS: 
        <input type="text" name="str_Fase_IOS" id="str_Fase_IOS" class="txtbox" value="<?php echo $str_Fase_IOS; ?>" />
        <input type="hidden" name="dt_Fecha_Fase_IOS" id="dt_Fecha_Fase_IOS" value="<?php echo $dt_Fecha_Fase_IOS_G; ?>" />
        <input type="hidden" name="id_Fase_IOS" id="id_Fase_IOS" value="<?php echo $id_Fase_IOS_G; ?>" />
            </td>
            <td>
        Supervisor:
        <input type="text" name="SUPERVISOR" id="SUPERVISOR" class="txtbox" value="<?php echo $SUPERVISOR; ?>" />
        </td>
            <td>Programa:
        <input type="text" name="Programa" id="Programa" class="txtbox" value="<?php echo $Programa; ?>" />
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="center" colspan="4">
	<button id="start">Actualizaci&oacute;n Servicio </button>
            </td>
        </tr>
    </table>
    <br />
    </article>
	</div>
    <!--TERMINA PRIMER TAB-->
	<div>
	<input id="ac-2" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-2">CENTROS NACIONALES</label>
	 <article class="ac-large"><br />
	<div align="center"><br />
    <table width="650" border="0" align="center" class="Texto_Mediano_Gris" height="200">
            
  <tr align="right">
    <td>Fase IOS CNS:</td>
    <td><input type="text" name="Fase_IOS_cns" id="Fase_IOS_cns" class="txtbox" value="<?php echo $str_Fase_IOS_cns; ?>" />
    <input type="hidden" name="id_Fase_IOS_cns" id="id_Fase_IOS_cns" value="<?php echo $id_Fase_IOS_cns; ?>" />
    </td>
    <td>Fecha Fase IOS:</td>
    <td><input type="text" name="Fecha_Fase_IOS_cns" id="Fecha_Fase_IOS_cns" class="txtbox" value="<?php echo $dt_fec_fase_IOS; ?>" /></td>
    <td>&nbsp;</td>
  </tr>

    
    
  <tr align="right">
    <td>Area:</td>
    <td><input type="text" name="area" id="area" class="txtbox" value="<?php //echo $due_date; ?>" />
    </td>
    <td>Referencia Hub:</td>
    <td><input type="text" name="str_referencia_hub" id="str_referencia_hub" class="txtbox" value="<?php echo $str_referencia_hub; ?>" />
    </td>
  </tr>
  <tr align="right">
    <td>Centro de Mantenimiento:</td>
    <td><input type="text" name="cm" id="cm" class="txtbox" value="<?php //echo $due_date; ?>" />
    </td>
    <td>Tipo Hub:</td>
    <td><input type="text" name="str_tipo_hub" id="str_tipo_hub" class="txtbox" value="<?php echo $str_tipo_hub; ?>" />
    </td>
  </tr>
  <tr align="right">
    <td>Fecha Liquidada CNA:</td>
    <td><input type="text" name="dt_FECHA_LIQ_CNA" id="dt_FECHA_LIQ_CNA" class="txtbox" value="<?php echo $dt_FECHA_LIQ_CNA; ?>" />
    </td>
    <td>Prueba Traspaso (A-C):</td>
    <td><input type="text" name="bol_PBA_TRASPASO_A_C" id="bol_PBA_TRASPASO_A_C" class="txtbox" value="<?php echo $PBA_TRASPASO_A_C; ?>" />
    </td>
  </tr>
  <tr align="right">
    <td>Fecha Ingenieria CNA:</td>
    <td><input type="text" name="dt_FECHA_ING_CNA" id="dt_FECHA_ING_CNA" class="txtbox" value="<?php echo $dt_FECHA_ING_CNA; ?>" />			</td>
    <td>Prueba Traspaso (C-TX):</td>
    <td><input type="text" name="bol_PBA_TRASPASO_C_TX" id="bol_PBA_TRASPASO_C_TX" class="txtbox" value="<?php echo $PBA_TRASPASO_C_TX; ?>" /></td>
  </tr>
  <tr align="right">
    <td>Fecha Programada:</td>
    <td><input type="text" name="str_FECHA_PROG" id="str_FECHA_PROG" class="txtbox" value="<?php echo $str_FECHA_PROG; ?>" />
    </td>
    <td>Nombre del Solicitante:</td>
    <td><input type="text" name="str_NOM_SOLICITANTE" id="str_NOM_SOLICITANTE" class="txtbox" value="<?php echo $str_NOM_SOLICITANTE; ?>" />
    </td>
  </tr>
  <tr align="right">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Fecha PRO RES:</td>
    <td><input type="text" name="dt_FECHA_PRO_RES" id="dt_FECHA_PRO_RES" class="txtbox" value="<?php echo $dt_FECHA_PRO_RES; ?>" />
    </td>
  </tr>
</table>
</div>
    <br/>
	</article>
    </div>
<!--	INICIA TAB DEL DETALLE DE EQUIPO-->
<?php echo Print_Detalle_Equipamiento($referencia); ?>
<!--TERMINA TAB EQUIPAMIENTO-->
    
    <!--TERMINA SEGUNDO TAB-->

<!--<div>
	<input id="ac-3" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-3">COMENTARIO TELMEX</label>
	<article class="ac-large">
    <br />
-->    <!--**************************COMENTARIOS****************************************-->
    <!--<div style="height:384px; overflow:scroll; width:988px;">
    <fieldset>
    <div class="avances_referencia">-->
    
	<!--<h3>Comentarios</h3>
	<form action="<?php //echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<textarea name="status" class="centerRight" id="status"></textarea><br />
		<input type="button" value="Agregar Comentario" id="submit" />
		<div id="message"><?php //echo $message; ?></div><br />
	</form>-->
	
	<!--<div class="clear"></div>
	<p>&nbsp;</p>
	<h3>Comentarios recientes</h3>
	<div id="statuses">-->
		<?php /*?><?php
		
		if (isset($_GET['referencia']))
		{
			$meses = array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diiembre");

			//get the latest 20
			$query  = "SELECT tb_Avances_Referencia.txt_Avance_Referencia,DAY(tb_Avances_Referencia.dt_Fecha_Registro) as dia,MONTH(tb_Avances_Referencia.dt_Fecha_Registro) as mes, YEAR(tb_Avances_Referencia.dt_Fecha_Registro) as anio, DATE_FORMAT(tb_Avances_Referencia.dt_Fecha_Registro,' @ % %l:%i:%s %p') AS ds, CONCAT(cat_Usuarios.str_Nombre,' ',cat_Usuarios.str_Ap_Paterno,' ',cat_Usuarios.str_Ap_Materno) as Nombre_Usuario FROM tb_Avances_Referencia LEFT JOIN cat_Usuarios ON tb_Avances_Referencia.id_Usuario =  cat_Usuarios.id_Usuario WHERE tb_Avances_Referencia.referencia = '".$referencia."'  AND tb_Avances_Referencia.ser_n = '".$ser_n."' ORDER BY dt_Fecha_Registro DESC"; // LIMIT 20
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
		?><?php */?>
	<!--</div>
	</div>
</fieldset>
    </div>-->
    <!--***********************************FIN COMENTARIOS**********************************-->    
	<!--</article>
    </div>-->
    <!--TERMINA TERCER TAB-->

<div>
	<input id="ac-4" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-4">PUNTA A</label>
	<article class="ac-small">
	<br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
        Usuario: <input type="text" name="usuario_puntas" id="usuario_puntas" class="txtbox" value="<?php echo $usuario_puntas ?>" />
            </td>
            <td>
        Direccion: <input type="text" name="direccion" id="direccion" class="txtbox" value="<?php echo htmlentities ($direccion) ?>" />
            </td>
            <td>
        Estado: <input type="text" name="est_abrev" id="est_abrev" class="txtbox" value="<?php echo $est_abrev ?>" />
            </td>
            <td>
		Poblacion: <input type="text" name="poblacion" id="poblacion" class="txtbox" value="<?php echo $poblacion ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		Responsable: <input type="text" name="responsable" id="responsable" class="txtbox" value="<?php echo $responsable ?>" />
            </td>
            <td>
		Telefono: <input type="text" name="telefono" id="telefono" class="txtbox" value="<?php echo $telefono ?>" />
            </td>
            <td>
		Dir Division: <input type="text" name="dir_division" id="dir_division" class="txtbox" value="<?php echo $dir_division ?>" />
            </td>
            <td>
		Coordinacion: <input type="text" name="coordinacion" id="coordinacion" class="txtbox" value="<?php echo $coordinacion; ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
        Coordinacion Abrev: <input type="text" name="coordinacion_abrev" id="coordinacion_abrev" class="txtbox"  value="<?php echo htmlentities ($coordinacion_abrev) ?>" />
            </td>
            <td>&nbsp;</td>
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
	<input id="ac-5" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-5">PUNTA B</label>
	<article class="ac-small">
	<br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
        Usuario: <input type="text" name="usuario_puntasb" id="usuario_puntasb" class="txtbox" value="<?php echo $usuario_puntasb ?>" />
            </td>
            <td>
        Direccion: <input type="text" name="direccionb" id="direccionb" class="txtbox" value="<?php echo $direccionb ?>" />
            </td>
            <td>
        Estado: <input type="text" name="est_abrev_b" id="est_abrev_b" class="txtbox" value="<?php echo $est_abrev_b ?>" />
            </td>
            <td>
		Poblacion: <input type="text" name="poblacionb" id="poblacionb" class="txtbox" value="<?php echo $poblacionb ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		Responsable: <input type="text" name="responsableb" id="responsableb" class="txtbox" value="<?php echo htmlentities ($responsableb) ?>" />
            </td>
            <td>
		Telefono: <input type="text" name="telefonob" id="telefonob" class="txtbox" value="<?php echo $telefonob ?>" />
            </td>
            <td>
		Dir Division: <input type="text" name="dir_divisionb" id="dir_divisionb" class="txtbox" value="<?php echo $dir_divisionb ?>" />
            </td>
            <td>
		Coordinacion: <input type="text" name="coordinacionb" id="coordinacionb" class="txtbox" value="<?php echo $coordinacionb ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
        Coordinacion Abrev: <input type="text" name="coordinacion_abrevb" id="coordinacion_abrevb" class="txtbox" value="<?php echo $coordinacion_abrevb ?>" />
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
		</table>
        <br />	
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

	</section>
	</div>
    <!--TERMINA DÉCIMO TAB-->
    <div id="resultado"></div>
        </body>
</html>