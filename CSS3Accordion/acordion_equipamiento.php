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
	dt_Fecha_INI_Equipamiento	
	FROM vw_ios_reg WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n."'";
	//echo $SQL;	
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	while (!$RS->EOF)
	{
	$num_registros = $RS->RecordCount();
	
	$referencia=         $RS->fields(0);
	$desc_serv=          $RS->fields(1);
	$due_date=           $RS->fields(2);
	$GRUPO_DIL_SERVICIO= $RS->fields(3);
	$fase_serv=          $RS->fields(4);
	$edo_serv=           $RS->fields(5);
	$fecha_estado=       $RS->fields(6);
	$TECNOLOGIA=         $RS->fields(7);
	$usuario=            $RS->fields(8);
	$sector=             $RS->fields(9);
	$coordinacion_abrev= $RS->fields(10);
	$dir_division=       $RS->fields(11);
	$str_Fase_IOS_Equipa=       $RS->fields(12);
	$str_Area_responsable= 		$RS->fields(13);
	$SUBGERENTE_RESPONSABLE=  	$RS->fields(14);
	$SUPERVISOR=         		$RS->fields(15);
	$str_problema_acceso=       $RS->fields(16);
	$str_coment_probl_acceso=   $RS->fields(17);
	$Programa=   				$RS->fields(18);
	$ser_n_ok =             	$RS->fields(19);
	$dt_Fecha_INI_Equipamiento =$RS->fields(20);
	
	
	$RS->MoveNext();
	}
	$RS->Close();
	$RS = NULL;
	
	// TRAE DATOS PUNTAS A Y B
	
	$SQL_1 = "SELECT 
	usuario_puntas,
	responsable,
	coordinacion_abrev,
	direccion,
	telefono,
	est_abrev,
	dir_division,
	poblacion,
	coordinacion,	
	pta,
	ser_n  
	FROM vw_puntas WHERE referencia = '".$referencia."' ";
	//echo $SQL_3."<br />";
	$RS_1 = TraeRecordset($SQL_1);
	if (!$RS_1) die('Error en DB!');
	while (!$RS_1->EOF)
	{
	$num_registros = $RS_1->RecordCount();
	
	if ($RS_1->fields(9) == 'A')
	{
		$usuario_puntas   	= $RS_1->fields(0);
		$responsable      	= $RS_1->fields(1);
		$coordinacion_abrev = $RS_1->fields(2);
		$direccion  		= $RS_1->fields(3);
		$telefono         	= $RS_1->fields(4);
		$est_abrev        	= $RS_1->fields(5);
		$dir_division       = $RS_1->fields(6);
		$poblacion   		= $RS_1->fields(7);
		$coordinacion       = $RS_1->fields(8);
		$pta   			    = $RS_1->fields(9);
		$ser_n              = $RS_1->fields(10);
	} else {
		$usuario_puntasb     = $RS_1->fields(0);
		$responsableb        = $RS_1->fields(1);
		$coordinacion_abrevb = $RS_1->fields(2);
		$direccionb  		 = $RS_1->fields(3);
		$telefonob        	 = $RS_1->fields(4);
		$est_abrev_b         = $RS_1->fields(5);
		$dir_divisionb       = $RS_1->fields(6);
		$poblacionb    		 = $RS_1->fields(7);
		$coordinacionb       = $RS_1->fields(8);
		$ptab   			 = $RS_1->fields(9);
		$ser_nb              = $RS_1->fields(10);
	}
	
	$RS_1->MoveNext();
	}
	$RS_1->Close();
	$RS_1 = NULL;
	
	// 	EQUIPAMIENTO
	$SQL_2 = "SELECT
	Fase_IOS_Eq,
	supervisor,
	referencia_base,
	edo_proyecto,
	dt_fecha_proyecto,
	estado_fo,
	dt_fecha_fo,
	str_Filial,
	edo_construccion,
	dt_fecha_provedor,
	dt_fecha_meta,
	dt_fecha_term_const
	FROM vw_equipa_2 
	WHERE referencia = '".$referencia."' AND ser_n = '".$ser_n_ok."'";
	//echo $SQL_2;
	$RS_2 = TraeRecordset($SQL_2);
	if (!$RS_2) die('Error en DB!');
	
	$num_registros =	 $RS_2->RecordCount();
	
	//$referencia=  	$RS->fields(4);
	
	$id_Fase_IOS   		= $RS_2->fields(0);
	$Supervisor_Eq     	= $RS_2->fields(1);
	$referencia_base 	= $RS_2->fields(2);
	$edo_proyecto		= $RS_2->fields(3);
	$dt_fecha_proyecto	= $RS_2->fields(4);
	$estado_fo			= $RS_2->fields(5);
	$dt_fecha_fo		= $RS_2->fields(6);
	$str_Filial			= $RS_2->fields(7);
	$edo_construccion	= $RS_2->fields(8);
	$dt_fecha_provedor 	= $RS_2->fields(9);
	$dt_fecha_meta 		= $RS_2->fields(10);
	$dt_fecha_term_const = $RS_2->fields(11);
	
	// 	DILACION 
	$SQL_3 = "SELECT fecha_afect, DILACION_AFECTACION, DUE_DATE, dilacion FROM vw_tramos_fo WHERE referencia = '".$referencia."'";
	//echo $SQL_3;
	$RS_3 = TraeRecordset($SQL_3);
	if (!$RS_3) die('Error en DB TRAMOS!');
	
	$num_registros =	 $RS_3->RecordCount();
	
	//$referencia=  	$RS->fields(4);
	
	$fecha_afect = $RS_3->fields(0);
	$DILACION_AFECTACION = $RS_3->fields(1);
	$DUE_DATE = $RS_3->fields(2);
	$DILACION = $RS_3->fields(3);
	
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

		<title>Telmex IOS - Equipamiento </title>
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
		
		    .combo1
	{
		width: 50px;
		text-align:center;
	}
		    .combo_green
	{
		width: 50px;
		text-align:center;
		background-color:#0F3;
	}
		    .combo_yellow
	{
		width: 50px;
		text-align:center;
		background-color:#FF6;
	}
		    .combo_red
	{
		width: 50px;
		text-align:center;
		background-color:#F00;
		color:#FFF;
	}
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
	var datos_referencia = 'update_equipamiento.php?referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n_ok; ?>';
	light = new LightFace.IFrame
					(
		{
				height:440, 
				width:820,
				url: datos_referencia,
				title: 'Actualiza Referencia' 
		}
					)
				.addButton('Cerrar', function() 
			{ 	
				
		var datos = 'referencia=<?php echo $referencia; ?>&ser_n=<?php echo $ser_n_ok; ?>';
		var myHTMLRequest = new Request.JSON({
		url: 'json_refresh_Equipamiento.php',
		onRequest : function (){
			//$('resultado').set('html','Cargando..');
			}	,
		
		onSuccess : function(responseJSON, responseText)	{
			var json = JSON.parse(responseText);
						
			$('id_Fase_IOS').set('value',json.str_Fase_IOS);
			$('str_Fase_IOS_Equipa').set('value',json.str_Fase_IOS_Equipa);
			$('Supervisor_Eq').set('value',json.Supervisor_Eq);
			$('referencia_base').set('value',json.referencia_base);
			$('edo_proyecto').set('value',json.edo_proyecto);
			$('dt_fecha_proyecto').set('value',json.dt_fecha_proyecto);
			$('estado_fo').set('value',json.estado_fo);
			$('dt_fecha_fo').set('value',json.dt_fecha_fo);
			$('str_Filial').set('value',json.str_Filial);
			$('edo_construccion').set('value',json.edo_construccion);
			$('dt_fecha_provedor').set('value',json.dt_fecha_provedor);
			$('dt_fecha_meta').set('value',json.dt_fecha_meta);
			$('dt_fecha_term_const').set('value',json.dt_fecha_term_const);
	//		$('dt_fecha_real_term').set('value',json.dt_fecha_real_term);

			}	
		}).send({ 
			method:'get',
			data: datos
		});
		light.close(); 
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
//function dilacion_servicios()			
//
//	if ( DILACION > 7)
//{
//		pinta_caja(class="combo2");
//		
//		
//		
//		}
			
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
    <table width="950" border="0" align="center" class="Texto_Mediano_Gris" height="200">
   	<tr align="right">
      	<td>
        Referencia: 
        <input type="text" name="referencia" id="referencia" class="txtbox" value="<?php echo  htmlentities ($referencia); ?>" />
         </td>
         <td>
        Tipo de Proyecto: 
        <input type="text" name="Tipo_Proyecto" id="Tipo_Proyecto" class="txtbox" value="<?php //echo $due_date; ?>" />
         </td>
         <td>
         Tecnologia:
         <input type="text" name="TECNOLOGIA" id="TECNOLOGIA" class="txtbox" value="<?php echo htmlentities ($TECNOLOGIA); ?>" /></td>
         <td>&nbsp;</td>
         </tr>
      	<tr align="right">
            <td>
         Fase Servicio: 
         <input type="text" name="fase_serv" id="fase_serv" class="txtbox"  value="<?php echo htmlentities ($fase_serv); ?>" />
            </td>
            <td>
         Usuario: 
         <input type="text" name="usuario" id="usuario" class="txtbox" value="<?php echo htmlentities ($usuario); ?>" />
            </td>
            <td>
         IPE Ethernet:
        <input type="text" name="ipe_ethernet" id="ipe_ethernet" class="txtbox" value="<?php echo htmlentities ($ipe_ethernet); ?>" />
         	</td>
         	<td>
            </td>
        	</tr>
      		<tr align="right">
            <td>
        Estado del servicio: 
        <input type="text" name="edo_serv" id="edo_serv" class="txtbox" value="<?php echo htmlentities ($edo_serv); ?>" />
            </td>
            <td>
        Pta Usuario:
        <input type="text" name="usuario2" id="usuario2" class="txtbox" value="<?php echo htmlentities ($usuario); ?>" />
        </td>
            <td>
            Motivo de Atraso CM:
        <input type="text" name="str_problema_acceso" id="str_problema_acceso" class="txtbox" value="<?php echo htmlentities ($str_problema_acceso); ?>" />
            </td>
        	<td>&nbsp;</td>
        </tr>
      	<tr align="right">
            <td>
        Descripci&oacute;n servicio: 
        <input type="text" name="desc_serv" id="desc_serv" class="txtbox" value="<?php echo htmlentities ($desc_serv); ?>" />
            </td>
            <td>
        Subgerente:
        <input type="text" name="SUBGERENTE_RESPONSABLE" id="SUBGERENTE_RESPONSABLE" class="txtbox" value="<?php echo htmlentities ($SUBGERENTE_RESPONSABLE); ?>" /></td>
            <td>Motivo de Atraso:
        <input type="text" name="str_coment_probl_acceso" id="str_coment_probl_acceso" class="txtbox" value="<?php echo htmlentities ($str_coment_probl_acceso); ?>" />
			</td>
            <td>&nbsp;</td>
        </tr>
      	<tr align="right">
      	  <td>Fase IOS Gral.:
            <input type="text" name="str_Fase_IOS_Equipa" id="str_Fase_IOS_Equipa" class="txtbox" value="<?php echo htmlentities ($str_Fase_IOS_Equipa); ?>" /></td>
      	  <td>Supervisor:
            <input type="text" name="SUPERVISOR" id="SUPERVISOR" class="txtbox" value="<?php echo htmlentities ($SUPERVISOR); ?>" /></td>
      	  <td>Programa:
            <input type="text" name="Programa" id="Programa" class="txtbox" value="<?php echo htmlentities ($Programa); ?>" /></td>
      	  <td>&nbsp;</td>
    	  </tr>
      	<tr align="right">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Dilaci&oacute;n Due Date:
            <input type="text" name="DILACION" id="DILACION" value="<?php echo ($DILACION); ?>" size="5" class="<?php 
			if ($DILACION != 0)
			{
				if ($DILACION <=7)
				{
					echo ('combo_green'); 
					
				}else if ($DILACION >=8 && $DILACION <=15){
				
					echo ('combo_yellow');
					
				}else{  
					
					echo ('combo_red');	
				}
			}
			?>" />&nbsp;&nbsp;d&iacute;as</td>
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
	<label for="ac-2"> DETALLE EQUIPAMIENTO</label>
	 <article class="ac-medium"><br />
	<div align="center">
    <table width="700" border="0" align="center" class="Texto_Mediano_Gris" height="200">
    <tr>
    <td>Fase IOS Equipamiento:</td>
    <td><input type="text" name="id_Fase_IOS" id="id_Fase_IOS" class="txtbox" value="<?php echo htmlentities ($id_Fase_IOS); ?>" /></td>
    <td>Dilaci&oacute;n Afect.</td>
    <td><input type="text" name="DILACION_AFECTACION" id="DILACION_AFECTACION" value="<?php echo ($DILACION_AFECTACION); ?>" size="5" class="<?php 
			if ($DILACION_AFECTACION != 0)
			{
				if ($DILACION_AFECTACION <=7)
				{
					echo ('combo_green'); 
					
				}else if ($DILACION_AFECTACION >=8 && $DILACION_AFECTACION <=15){
				
					echo ('combo_yellow');
					
				}else{  
					
					echo ('combo_red');	
				}
			}
			?>" />&nbsp;&nbsp;d&iacute;as</td>
  </tr>
  <tr>
    <td>Supervisor Equipamiento:</td>
    <td><input type="text" name="Supervisor_Eq" id="Supervisor_Eq" class="txtbox" value="<?php echo htmlentities ($Supervisor_Eq, ENT_QUOTES); ?>" /></td>
    <td>Fecha Termino FO:</td>
    <td><input type="text" name="dt_fecha_fo" id="dt_fecha_fo" class="txtbox" value="<?php echo htmlentities ($dt_fecha_fo); ?>" /></td>
  </tr>
  <tr>
    <td>Referencia Base:</td>
    <td><input type="text" name="referencia_base" id="referencia_base" class="txtbox" value="<?php echo htmlentities ($referencia_base); ?>" />  </td>
    <td>Proveedor:</td>
    <td><input type="text" name="str_Filial" id="str_Filial" class="txtbox" value="<?php echo htmlentities ($str_Filial); ?>" /></td>
  </tr>
  <tr>
    <td> Fecha Afectaci&oacute;n Equipamiento: </td>
    <td><input type="text" name="dt_Fecha_INI_Equipamiento" id="dt_Fecha_INI_Equipamiento" class="txtbox" value="<?php echo htmlentities ($dt_Fecha_INI_Equipamiento); ?>" /></td>
    <td>Estado Construcci&oacute;n:</td>
    <td><input type="text" name="edo_construccion" id="edo_construccion" class="txtbox" value="<?php echo htmlentities ($edo_construccion); ?>" /></td>
  </tr>
  <tr>
    <td>Estado Proyecto:</td>
    <td><input type="text" name="edo_proyecto" id="edo_proyecto" class="txtbox" value="<?php echo htmlentities ($edo_proyecto); ?>" /></td>
    <td>Fecha Entrega Proveedor:</td>
    <td><input type="text" name="dt_fecha_provedor" id="dt_fecha_provedor" class="txtbox" value="<?php echo htmlentities ($dt_fecha_provedor); ?>" /></td>
  </tr>
  <tr>
    <td>Fecha Proyecto Concluido:</td>
    <td><input type="text" name="dt_fecha_proyecto" id="dt_fecha_proyecto" class="txtbox" value="<?php echo htmlentities ($dt_fecha_proyecto); ?>" /></td>
    <td>Fecha Meta Construcci&oacute;n:</td>
    <td><input type="text" name="dt_fecha_meta" id="dt_fecha_meta" class="txtbox" value="<?php echo  htmlentities ($dt_fecha_meta); ?>" /></td>
  </tr>
  <tr>
    <td>Estado FO:</td>
    <td><input type="text" name="estado_fo" id="estado_fo" class="txtbox" value="<?php echo htmlentities ($estado_fo); ?>" /></td>
    
    <td>Fecha Termino Construcci&oacute;n:</td>
    <td><input type="text" name="dt_fecha_term_const" id="dt_fecha_term_const" class="txtbox" value="<?php echo htmlentities($dt_fecha_term_const); ?>" /></td>
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
    <!--**************************COMENTARIOS****************************************-->
    <!--<div style="height:384px; overflow:scroll; width:988px;">
    <fieldset>
    <div class="avances_referencia">
    
	<h3>Comentarios</h3>
	<form action="<?php //echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<textarea name="status" class="centerRight" id="status"></textarea><br />
		<input type="button" value="Agregar Comentario" id="submit" />
		<div id="message"><?php //echo $message; ?></div><br />
	</form>
	
	<div class="clear"></div>
	<p>&nbsp;</p>
	<h3>Comentarios recientes</h3>
	<div id="statuses">
		<?php
//		
//		if (isset($_GET['referencia']))
//		{
//			$meses = array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diiembre");
//
//			//get the latest 20
//			$query  = "SELECT tb_Avances_Referencia.txt_Avance_Referencia,DAY(tb_Avances_Referencia.dt_Fecha_Registro) as dia,MONTH(tb_Avances_Referencia.dt_Fecha_Registro) as mes, YEAR(tb_Avances_Referencia.dt_Fecha_Registro) as anio, DATE_FORMAT(tb_Avances_Referencia.dt_Fecha_Registro,' @ % %l:%i:%s %p') AS ds, CONCAT(cat_Usuarios.str_Nombre,' ',cat_Usuarios.str_Ap_Paterno,' ',cat_Usuarios.str_Ap_Materno) as Nombre_Usuario FROM tb_Avances_Referencia LEFT JOIN cat_Usuarios ON tb_Avances_Referencia.id_Usuario =  cat_Usuarios.id_Usuario WHERE tb_Avances_Referencia.referencia = '".$referencia."'  AND tb_Avances_Referencia.ser_n = '".$ser_n."' ORDER BY dt_Fecha_Registro DESC"; // LIMIT 20
//			$result = TraeRecordset($query);
//			$cuantas_filas = $result->RecordCount();
//			if ($cuantas_filas > 0)
//			{
//				while(!$result->EOF)
//				{
//					echo '<div class="status-box">',stripslashes($result->fields(0)),'<br /><span class="time">'.ucwords(strtolower($result->fields(5))).' - '.$result->fields(1).' de '.$meses[$result->fields(2)].' de '.$result->fields(3).$result->fields(4).'</span></div>';
//					$result->MoveNext();
//				}
//			} else {
//				echo '<br /><b>No hay comentarios...</b>';	
//			}
//		} else {
//			echo '<br /><b>Error: No hay referecia especificada!!</b>';	
//			
//		}
		?>
	</div>
	</div>
</fieldset>
    </div>
    <!--***********************************FIN COMENTARIOS**********************************-->    
	<!--</article>
    </div>
-->    
			<!--TERMINA TERCER TAB-->

<div>
	<input id="ac-4" name="accordion-1" type="checkbox" style="visibility:hidden" />
	<label for="ac-4">PUNTA A</label>
	<article class="ac-small">
	<br />
	<table width="970" border="0" align="center" class="Texto_Mediano_Gris" height="100">
      	<tr align="right">
        	<td>
        Usuario: <input type="text" name="usuario_puntas" id="usuario_puntas" class="txtbox" value="<?php echo htmlentities ($usuario_puntas) ?>" />
            </td>
            <td>
        Direcci&oacute;n: <input type="text" name="direccion" id="direccion" class="txtbox" value="<?php echo htmlentities ($direccion) ?>" />
            </td>
            <td>
        Estado: <input type="text" name="est_abrev" id="est_abrev" class="txtbox" value="<?php echo htmlentities ($est_abrev) ?>" />
            </td>
            <td>
		Poblaci&oacute;n: <input type="text" name="poblacion" id="poblacion" class="txtbox" value="<?php echo htmlentities ($poblacion) ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		Responsable: <input type="text" name="responsable" id="responsable" class="txtbox" value="<?php echo htmlentities ($responsable) ?>" />
            </td>
            <td>
		Tel&eacute;fono: <input type="text" name="telefono" id="telefono" class="txtbox" value="<?php echo htmlentities ($telefono) ?>" />
            </td>
            <td>
		Dir Division: <input type="text" name="dir_division" id="dir_division" class="txtbox" value="<?php echo htmlentities ($dir_division) ?>" />
            </td>
            <td>
		Coordinacion: <input type="text" name="coordinacion" id="coordinacion" class="txtbox" value="<?php echo  htmlentities ($coordinacion); ?>" />
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
        Usuario: <input type="text" name="usuario_puntasb" id="usuario_puntasb" class="txtbox" value="<?php echo htmlentities ($usuario_puntasb); ?>" />
            </td>
            <td>
        Direcci&oacute;n: <input type="text" name="direccionb" id="direccionb" class="txtbox" value="<?php echo htmlentities ($direccionb); ?>" />
            </td>
            <td>
        Estado: <input type="text" name="est_abrevb" id="est_abrevb" class="txtbox" value="<?php echo htmlentities ($est_abrevb); ?>" />
            </td>
            <td>
		Poblaci&oacute;n: <input type="text" name="poblacionb" id="poblacionb" class="txtbox" value="<?php echo htmlentities ($poblacionb); ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
		Responsable: <input type="text" name="responsableb" id="responsableb" class="txtbox" value="<?php echo htmlentities ($responsableb); ?>" />
            </td>
            <td>
		Tel&eacute;fono: <input type="text" name="telefonob" id="telefonob" class="txtbox" value="<?php echo htmlentities ($telefonob); ?>" />
            </td>
            <td>
		Dir Division: <input type="text" name="dir_divisionb" id="dir_divisionb" class="txtbox" value="<?php  echo htmlentities ($dir_divisionb); ?>" />
            </td>
            <td>
		Coordinacion: <input type="text" name="coordinacionb" id="coordinacionb" class="txtbox" value="<?php echo htmlentities ($coordinacionb); ?>" />
            </td>
        </tr>
      	<tr align="right">
            <td>
        Coordinacion Abrev: <input type="text" name="coordinacion_abrevb" id="coordinacion_abrevb" class="txtbox" value="<?php echo htmlentities ($coordinacion_abrevb); ?>" />
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