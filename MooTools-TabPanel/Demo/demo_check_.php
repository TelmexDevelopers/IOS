<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');
include('../../CSS3Accordion/libreria_equipo_fo.php');
require("../../includes/funciones.php");
$CheckSession = CheckSession();

//require("../includes/funciones.php");
//$CheckSession = CheckSession();

$referencia = $_GET['referencia'];
$id_tramos = $_GET['id_tramos'];


if (isset($_GET['referencia']));
{
	$SQL = "SELECT id_tramos, referencia, ref_tramo, edo_tramo, coordinacion_abrev, fecha_afect, edo_serv, tipo_proy, DUE_DATE, tra_obser, tra_punta, SIGLAS_ios, area, central, division, usuario, usuario_puntas, direccion, fec_real_term FROM vw_tramos_fo WHERE referencia = '".$referencia."' and id_tramos = '".$id_tramos."'";
//echo $SQL."<br />";
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB1!');
	
	//while (!RS->EOF)
	
	
	$num_registros = $RS->RecordCount();
	
	$id_tramos= $RS->fields(0);
	$referencia= $RS->fields(1);
	$ref_tramo=  $RS->fields(2);
	$edo_tramo=  $RS->fields(3);
	$coordinacion_abrev=  $RS->fields(4);
	$fecha_afect=  $RS->fields(5);
	$edo_serv=  $RS->fields(6);
	$tipo_proy=  $RS->fields(7);
	$DUE_DATE=  $RS->fields(8);
	$tra_obser=  $RS->fields(9);
	$tra_punta=  $RS->fields(10);
	$SIGLAS_ios=  $RS->fields(11);
	$area=  $RS->fields(12);
	$central=  $RS->fields(13);
	$division=  $RS->fields(14);
	$usuario=  $RS->fields(15);
	$usuario_puntas=  $RS->fields(16);
	$direccion=  $RS->fields(17);
	$fec_real_term= $RS->fields(18);
//
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////	
	$SQL_2 = "SELECT id_tramos, id_analisa_ing_eq, dt_ok_ing_eq, id_proy_sisa, dt_fecha_prog, documento_pagina_web, id_proy_rda, id_vencido, id_cancelado,  id_principal, str_ref_relacionada, id_Fase_IOS, id_proy_eqp, dt_requiere_fo, id_res_super, id_ipe_proyecto, id_pendt_cliente, id_req_pto, id_nivel_pto_tx, dt_req_pto_tx, id_status_pto, id_proy_concl, dt_proy_concl, id_filial, id_modelo, id_cap_enlace, str_PEP, id_filial_prov, str_colectora, id_trabajo_colectora, dt_trabcol_ok, str_top_fo, str_anillo_rof, int_fot1, int_fot2, id_prtx_status, dt_meta_term_proy, dt_carga_mat_ok, dt_asig_PEP, dt_asig_p45, dt_ots_ok, dt_anexos, dt_pagina_web, dt_sol_clli, dt_clli_ok, dt_sol_gestion, dt_gestion_ok, dt_carga_sise, dt_entrega_esp, dt_rec_site, dt_reporte_site, id_eq_client, id_instalado, Observaciones_Eq, dt_liquidada FROM tb_equip_fo WHERE referencia = '".$referencia."' and id_tramos = '".$id_tramos."'";
	//echo $SQL_2;
	$RS_2 = TraeRecordset($SQL_2);
	if (!$RS_2) die('Error en DB2!');
	
	$num_registros = $RS_2->RecordCount();
	
	$id_tramos = $RS_2->fields(0);
	$id_analisa_ing_eq = $RS_2->fields(1);
	$dt_ok_ing_eq = $RS_2->fields(2);
	$id_proy_sisa = $RS_2->fields(3);
	$dt_fecha_prog = $RS_2->fields(4);
	$documento_pagina_web = $RS_2->fields(5);
	$id_proy_rda = $RS_2->fields(6);
	$id_vencido	= $RS_2->fields(7);
	$id_cancelado = $RS_2->fields(8);
//////////INICIA CAMPOS DE PROYECTO EQUIPO///////////////
	$id_principal = $RS_2->fields(9);
	$str_ref_relacionada = $RS_2->fields(10);
	$id_Fase_IOS = $RS_2->fields(11);
	$id_proy_eqp = $RS_2->fields(12);
	$dt_requiere_fo = $RS_2->fields(13);
	$id_res_super = $RS_2->fields(14);
	$id_ipe_proyecto = $RS_2->fields(15);
	$id_pendt_cliente = $RS_2->fields(16);
	$id_req_pto = $RS_2->fields(17);
	$id_nivel_pto_tx = $RS_2->fields(18);
	$dt_req_pto_tx = $RS_2->fields(19);
	$id_status_pto = $RS_2->fields(20);
	$id_proy_concl = $RS_2->fields(21);
	$dt_proy_concl = $RS_2->fields(22);
	$id_filial = $RS_2->fields(23);
	$id_modelo = $RS_2->fields(24);
	$id_cap_enlace = $RS_2->fields(25);
	$str_PEP = $RS_2->fields(26);
	$id_filial_prov = $RS_2->fields(27);
	$str_colectora = $RS_2->fields(28);
	$id_trabajo_colectora = $RS_2->fields(29);
	$dt_trabcol_ok = $RS_2->fields(30);
	$str_top_fo = $RS_2->fields(31);
	$str_anillo_rof = $RS_2->fields(32);
	$int_fot1 = $RS_2->fields(33);
	$int_fot2 = $RS_2->fields(34);
	$id_prtx_status = $RS_2->fields(35);
	$dt_meta_term_proy = $RS_2->fields(36);
	$dt_carga_mat_ok = $RS_2->fields(37);
	$dt_asig_PEP = $RS_2->fields(38);
	$dt_asig_p45 = $RS_2->fields(39);
	$dt_ots_ok = $RS_2->fields(40);
	$dt_anexos = $RS_2->fields(41);
	$dt_pagina_web = $RS_2->fields(42);
	$dt_sol_clli = $RS_2->fields(43);
	$dt_clli_ok = $RS_2->fields(44);
	$dt_sol_gestion = $RS_2->fields(45);
	$dt_gestion_ok = $RS_2->fields(46);
	$dt_carga_sise = $RS_2->fields(47);
	$dt_entrega_esp = $RS_2->fields(48);
	$dt_rec_site = $RS_2->fields(49);
	$dt_reporte_site = $RS_2->fields(50);
	$id_eq_client = $RS_2->fields(51);
	$id_instalado = $RS_2->fields(52);
	$Observaciones_Eq= $RS_2->fields(53);
	$dt_liquidada= $RS_2->fields(54);
	
	$SQL_3 = "SELECT id_requerimiento, id_edo_acometida, dt_PROGRAMADA, id_supervisor_fo, id_resp_sucope, id_resp_ipr, dt_solicitud_fo, str_planificador, dt_sol_planificacion, dt_rec_planificacion, dt_sol_permiso_ssp, dt_rec_permiso, dt_entrega_esp_fo, dt_ok_adecuaciones, delegacion, dt_elab_ot, dt_Entr_ot, str_recibe_OT, PEP_09, str_ped45, id_problematica, str_Constructor, dt_proyecto_Ok, id_cancel, FOt1, FOt2, clte_fo1, clte_fo2, id_tipo, FOT1_resp, FOT2_resp,  clte_fo1_resp, clte_fo2_resp, id_tipo_fo, id_FO_Const_Estatus, id_problem_cons, SubAnillo_Fi, PES, Atenuacion_Trab, Atenuacion_Resp, Longitud_Trab, Longitud_Resp, dt_ini_real, dt_remate_fo, dt_entrega_fo, str_sup_cons, id_cons_estatus, dt_ins_col, dt_entrega_gestion_col, dt_integracion_colectora, dt_enlace_adva_colectora, dt_inst_equipo_acceso, dt_entrega_equipo_acceso, dt_gestion_equipo_acceso, dt_instalacion, dt_alimen_entrega, dt_inst_eq_acceso, dt_entraga_eq_acceso, dt_gestion_eq_acceso, const_rech, dt_rechazado, idcat_motvo_rch_fo, folio_gestion_nx, folio_gestion_cns, str_pend_clte_const FROM tb_eq_construcion WHERE referencia = '".$referencia."' and id_tramos = '".$id_tramos."'";
//echo $SQL."<br />";
	$RS_3 = TraeRecordset($SQL_3);
	if (!$RS_3) die('Error en DB3!');
	
	$num_registros = $RS_3->RecordCount();
	
	$id_requerimiento= $RS_3->fields(0);
	$id_edo_acometida= $RS_3->fields(1);
	$dt_PROGRAMADA=  $RS_3->fields(2);
	$id_supervisor_fo=  $RS_3->fields(3);
	$id_resp_sucope=  $RS_3->fields(4);
	$id_resp_ipr=  $RS_3->fields(5);
	$dt_solicitud_fo=  $RS_3->fields(6);
	$str_planificador=  $RS_3->fields(7);
	$dt_sol_planificacion=  $RS_3->fields(8);
	$dt_rec_planificacion=  $RS_3->fields(9);
	$dt_sol_permiso_ssp=  $RS_3->fields(10);
	$dt_rec_permiso=  $RS_3->fields(11);
	$dt_entrega_esp_fo=  $RS_3->fields(12);
	$dt_ok_adecuaciones=  $RS_3->fields(13);
	$delegacion=  $RS_3->fields(14);
	$dt_elab_ot=  $RS_3->fields(15);
	$dt_Entr_ot=  $RS_3->fields(16);
	$str_recibe_OT=  $RS_3->fields(17);
	$PEP_09=  $RS_3->fields(18);
	$str_ped45=  $RS_3->fields(19);
	$id_problematica=  $RS_3->fields(20);
	$str_Constructor=  $RS_3->fields(21);
	$dt_proyecto_Ok=  $RS_3->fields(22);
	$id_cancel=  $RS_3->fields(23);
	$FOt1=  $RS_3->fields(24);
	$FOt2=  $RS_3->fields(25);
	$clte_fo1=  $RS_3->fields(26);
	$clte_fo2=  $RS_3->fields(27);
	$id_tipo= $RS_3->fields(28); 
	$FOT1_resp=  $RS_3->fields(29);
	$FOT2_resp=  $RS_3->fields(30);
	$clte_fo1_resp=  $RS_3->fields(31);
	$clte_fo2_resp=  $RS_3->fields(32);
	$id_tipo_fo=  $RS_3->fields(33);
	$id_FO_Const_Estatus=  $RS_3->fields(34);
	$id_problem_cons=  $RS_3->fields(35);
	$SubAnillo_Fi=  $RS_3->fields(36);
	$PES=  $RS_3->fields(37);
	$Atenuacion_Trab= $RS_3->fields(38);
	$Atenuacion_Resp= $RS_3->fields(39);
	$Longitud_Trab= $RS_3->fields(40);
	$Longitud_Resp= $RS_3->fields(41);
	$dt_ini_real= $RS_3->fields(42);
	$dt_remate_fo= $RS_3->fields(43);
	$dt_entrega_fo= $RS_3->fields(44);
	$str_sup_cons= $RS_3->fields(45);
/////////INICIA CAMPOS DEL MOD CONSTRUCCION///////////////////
	$id_cons_estatus=  $RS_3->fields(46);
	$dt_ins_col=  $RS_3->fields(47);
	$dt_entrega_gestion_col=  $RS_3->fields(48);
	$dt_integracion_colectora=  $RS_3->fields(49);
	$dt_enlace_adva_colectora=  $RS_3->fields(50);
	$dt_inst_equipo_acceso=  $RS_3->fields(51);
	$dt_entrega_equipo_acceso=  $RS_3->fields(52);
	$dt_gestion_equipo_acceso=  $RS_3->fields(53);
	$dt_instalacion=  $RS_3->fields(54);
	$dt_alimen_entrega=  $RS_3->fields(55);
	$dt_inst_eq_acceso=  $RS_3->fields(56);
	$dt_entraga_eq_acceso=  $RS_3->fields(57);
	$dt_gestion_eq_acceso=  $RS_3->fields(58);
	$const_rech=  $RS_3->fields(59);
	$dt_rechazado=  $RS_3->fields(60);
	$idcat_motvo_rch_fo=  $RS_3->fields(61);
	$folio_gestion_nx=  $RS_3->fields(62);
	$folio_gestion_cns=  $RS_3->fields(63);
	$str_pend_clte_const=  $RS_3->fields(64);
	
	$SQL_10 = "SELECT 
	id_ot,
	id_referencias_ot,
	id_tramos,
	str_OT,
	referencia,
	referncia_principal,
	str_prioridad,
	dt_fecha_OT,
	id_cat_usuarios_elab,
	id_cat_usuarios_vobo,
	id_cat_usuario_subgte,
	id_cat_usuario_filial,
	id_URR_cat_usuario_1,
	id_URR_cat_usuario_2,
	id_tb_equip_fo,
	codigo,
	n_accesso,
	CLL,
	f_REF,
	anillo,
	posicion_dbfo,
	F_ini,
	F_term,
	f_asignadas,
	element,
	elemnt_pep,
	trabajos_realizar,
	nota,
	P_DBFO,
	observaciones,
	prioridad,
	id_prioridad,
	str_tipo_servicio
	
	FROM tb_ot_equip  WHERE referencia = '".$referencia."'";
	$RS_10 = TraeRecordset($SQL_10);
	if (!$RS_10) die('Error en DB3!');
	
	$num_registros = $RS_10->RecordCount();
	
	$id_ot = $RS_10->fields(0);
	$id_referencias_ot = $RS_10->fields(1);
	$id_tramos = $RS_10->fields(2);
	$str_OT = $RS_10->fields(3);
	$referencia = $RS_10->fields(4);
	$referncia_principal = $RS_10->fields(5);
	$str_prioridad = $RS_10->fields(6);
	$dt_fecha_OT = $RS_10->fields(7);
	$id_cat_usuarios_elab = $RS_10->fields(8);
	$id_cat_usuarios_vobo = $RS_10->fields(9);
	$id_cat_usuario_subgte = $RS_10->fields(10);
	$id_cat_usuario_filial = $RS_10->fields(11);
	$id_URR_cat_usuario_1 = $RS_10->fields(12);
	$id_URR_cat_usuario_2 = $RS_10->fields(13);
	$id_tb_equip_fo = $RS_10->fields(14);
	$codigo = $RS_10->fields(15);
	$n_accesso = $RS_10->fields(16);
	$CLL = $RS_10->fields(17);
	$f_REF = $RS_10->fields(18);
	$anillo = $RS_10->fields(19);
	$posicion_dbfo = $RS_10->fields(20);
	$F_ini = $RS_10->fields(21);
	$F_term = $RS_10->fields(22);
	$f_asignadas = $RS_10->fields(23);
	$element = $RS_10->fields(24);
	$elemnt_pep = $RS_10->fields(25);
	$trabajos_realizar = $RS_10->fields(26);
	$nota = $RS_10->fields(27);
	$P_DBFO = $RS_10->fields(28);
	$observaciones = $RS_10->fields(29);
	$prioridad = $RS_10->fields(30);
	$id_prioridad = $RS_10->fields(31);
	$str_tipo_servicio = $RS_10->fields(32);
		
	$SQL_4 = "SELECT 
a.referencia, a.id_tramos,a.dt_entrega_esp, a.dt_rec_site, a.id_prtx_status, c.str_prtx_status, a.dt_proy_concl,  
b.id_FO_Const_Estatus, f.str_fo_const_estatus, b.dt_entrega_fo, b.id_problem_cons, d.str_problema,
b.id_cons_status, e.str_estatus  
FROM (tb_equip_fo a
LEFT JOIN tb_eq_construcion b ON a.id_tramos = b.id_tramos)
LEFT JOIN cat_prtx_status c ON a.id_prtx_status = c.id_prtx_status
LEFT JOIN cat_problem_const d ON b.id_problem_cons = d.id_problem_cons
LEFT JOIN cat_estatus_cons e ON b.id_cons_estatus = e.id_cons_estatus
LEFT JOIN cat_FO_Const_Estatus f ON b.id_FO_Const_Estatus = f.id_FO_Const_Estatus WHERE a.referencia = '".$referencia."' and a.id_tramos = '".$id_tramos."'";
	$RS_4 = TraeRecordset($SQL_4);
	if (!$RS_4) die('Error en DB4!');
	
	$num_registros = $RS_4->RecordCount();
	
			$referencia = $RS_4->fields(0);
			$id_tramos = $RS_4->fields(1);
			$dt_entrega_esp = $RS_4->fields(2);
			$dt_rec_site = $RS_4->fields(3);
			$id_prtx_status = $RS_4->fields(4);
			$str_prtx_status = $RS_4->fields(5);
			$dt_proy_concl = $RS_4->fields(6);
			$id_FO_Const_Estatus = $RS_4->fields(7);
			$str_fo_const_estatus = $RS_4->fields(8);
			$dt_entrega_fo = $RS_4->fields(9);
			$id_problem_const = $RS_4->fields(10);
			$str_problema = $RS_4->fields(11);
			$id_cons_status = $RS_4->fields(12);
			$str_estatus = $RS_4->fields(13);
	

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<style>
		@import "../../Busqueda_Principal/LightFace/Assets/LightFace.css";
	</style>
      <style type="text/css">
		*				{ font-family:tahoma; }
		h3				{ border-bottom:0; }
		
		#message		{ padding:7px 10px; float:left; width:350px; }
		#status		{ border:1px solid #999; padding:5px; width:500px; height:75px; margin:5px 0; }
		#statuses	{ width:512px; }
		#submit		{ cursor:pointer; padding:5px; border:1px solid #ccc; float:left; margin:0 20px 0 0; }
		
		.status-box	{ padding:10px 20px 10px 70px; height:48px; background:url(jose) 10px 10px no-repeat; border-bottom:1px dotted #aaa; }
		.status-box:hover	{ background-color:#eee; }
		.success		{ color:#008000; }
		.failure		{ color:#f00; }
		.time			{ color:#2a447b; font-size:10px; }
		
	</style>
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
	.cant_combo { width:20px;}
	 
	.descrip_combo{width:350px;}
 </style>
    <title>Simple MooTools TabPane component</title>
    <script src="mootools-core-1.4.2.js" type="text/javascript"></script>
    <script src="../Source/TabPane.js" type="text/javascript"></script>
    <script src="../Source/TabPane.Extra.js" type="text/javascript"></script>
    <script type="text/javascript" src="../scripts_datepicker/mootools-core-1.4.5-full-compat.js"></script>
    <script type="text/javascript" src="../scripts_datepicker/mootools-more-1.4.0.1.js"></script>
	<script type="text/javascript" src="../scripts_datepicker/datepicker/Source/Locale.es-ES-DatePicker.js"></script>
    <script type="text/javascript" src="../scripts_datepicker/datepicker/Source/Picker.js"></script>
    <script type="text/javascript" src="../scripts_datepicker/datepicker/Source/Picker.Attach.js"></script>
    <script type="text/javascript" src="../scripts_datepicker/datepicker/Source/Picker.Date.js"></script>
    <link rel="stylesheet" type="text/css" href="../scripts_datepicker/datepicker/Source/datepicker_vista/datepicker_vista.css"/>
<link rel="stylesheet" href="../../Busqueda_Principal/LightFace/Assets/lightface.css" />
    		 <script src="../../Busqueda_Principal/LightFace/Source/LightFace.js"></script>
			<script src="../../Busqueda_Principal/LightFace/Source/LightFace.IFrame.js"></script>
			<script src="../../Busqueda_Principal/LightFace/Source/LightFace.Image.js"></script>
			<script src="../../Busqueda_Principal/LightFace/Source/LightFace.Request.js"></script>
			<script  src="../../Busqueda_Principal/LightFace/Source/LightFace.Static.js"></script>
    <script type="text/javascript">
	
			   function abre_ventana_comentarios()
	  {
	  var referencia = '<?php echo $referencia; ?>';
	  var id_tramos = '<?php echo $id_tramos; ?>';
		  light = new LightFace.IFrame({
					  height:400, 
					  width:800,
					  url: 'OT_COMENTARIOS.php?referencia='+referencia+"&id_tramos="+id_tramos,
					  title: 'Comentarios' 
			  }).addButton('Cerrar', function() 
				  { 	light.close(); 
				  }	,true).open();
	  }
	  
		 window.addEvent('domready',function()
			  {
				  document.id('start').addEvent('click',abre_ventana_comentarios);
			  
			    });
 window.addEvent('domready',function()
			  {
				  document.id('start').addEvent('click',abre_ventana_comentarios);
			  
			    });
				
	 function abre_ventana_const()
	  {
	  var referencia = '<?php echo $referencia; ?>';
	  var id_tramos = '<?php echo $id_tramos; ?>';
		  light = new LightFace.IFrame({
					  height:400, 
					  width:800,
					  url: 'OT_COMENTARIOS_const.php?referencia='+referencia+"&id_tramos="+id_tramos,
					  title: 'Comentarios' 
			  }).addButton('Cerrar', function() 
				  { 	light.close(); 
				  }	,true).open();
	  }
	  
		 window.addEvent('domready',function()
			  {
				  document.id('abrir').addEvent('click',abre_ventana_const);
			  
			    });


function Carga_JSON()
{
	
///////////////////INICIA JSON///////////////////////////////////////////		
		var datos = 'referencia=<?php echo $referencia; ?>&id_tramos=<?php echo $id_tramos; ?>';
		var myHTMLRequest = new Request.JSON({
		url: 'json_refresh_proyecto_construccion.php',
		onRequest : function (){
			}	,
		
		onSuccess : function(responseJSON, responseText)	{
			var json = JSON.parse(responseText);
						
			$('dt_entrega_esp_sisa').set('value',json.dt_entrega_esp);
			$('dt_rec_site_sisa').set('value',json.dt_rec_site);
			$('str_prtx_status').set('value',json.str_prtx_status);
			$('dt_proy_concl_sisa').set('value',json.dt_proy_concl);
			$('str_fo_const_estatus').set('value',json.str_fo_const_estatus);
			$('dt_entrega_fo_sisa').set('value',json.dt_entrega_fo);
			$('str_problema').set('value',json.str_problema);
			$('str_estatus').set('value',json.str_estatus);
			}
		}).send({ 
			method:'get',
			data: datos
		});
///////////////////FIN JSON///////////////////////////////////////////		
	
}

function dt_fecha_sisa_JSON()
{
	
///////////////////INICIA JSON DT FECHA LIQ.///////////////////////////////////////////		
		var datos = 'referencia=<?php echo $referencia; ?>&id_tramos=<?php echo $id_tramos; ?>';
		var myHTMLRequest = new Request.JSON({
		url: 'json_refresh_fecha_liq_sisa.php',
		onRequest : function (){
			}	,
		
		onSuccess : function(responseJSON, responseText)	{
			var json = JSON.parse(responseText);
						
			$('dt_liquidada').set('value',json.dt_liquidada);
			}
		}).send({ 
			method:'get',
			data: datos
		});
///////////////////FIN JSON///////////////////////////////////////////		
	
}

	function string_evento(id,valor)
	{
		switch(id)
		{
			case 'dt_carga_mat_ok':
				var campo = "Carga Mat. OK";
			break;
			case 'dt_asig_PEP':
				var campo = "Asig. PEP";
			break;
			case 'dt_asig_p45':
				var campo = "Asig. P-45";
			break;
			case 'dt_ots_ok':
				var campo = "OTs OK";
			break;
			case 'dt_anexos':
				var campo = "Anexos OK";
			break;
			case 'dt_pagina_web':
				var campo = "Pag. Web OK";
			break;
			case 'dt_sol_clli':
				var campo = "Sol_CLLI";
			break;
			case 'dt_clli_ok':
				var campo = "CLLI Ok";
			break;
			case 'dt_sol_gestion':
				var campo = "Sol_Gestión";
			break;
			case 'dt_gestion_ok':
				var campo = "Gestión_OK";
			break;
				case 'dt_carga_sise':
				var campo = "Carga SISE";
			break;
//			case '':
//				var campo = "";
//			break;
//			case '':
//				var campo = "";
//			break;
		
			
		}
		var string = "Se pone bandera de "+campo+" ("+valor+")";
		
		return string;
	}
	
	function Asigna_Valor_Observaciones(id)
	{
		//alert($(id).value);
		var fecha = new Date().format('db');
		var str_evento = string_evento(id,$(id).value);
		var string = fecha+": "+str_evento+"\n"+$('Observaciones_Eq').value;
		$('Observaciones_Eq').set('html',string);
	}

        document.addEvent('domready', function() {
            var tabPane = new TabPane('demo', {}, function() {
				var showTab = window.location.hash.match(/tab=(\d+)/);
				return showTab ? showTab[1] : 0;
			});

            $('demo').addEvent('click:relay(.remove)', function(e) {
				// stop the event from bubbling up and causing a native click
                e.stop();
                var parent = this.getParent('.tab');
				// close the tab (closeTab takes care of selecting an adjacent tab) 
                tabPane.close(parent);
            });
      		
			window.addEvent('domready', function() {		
			
			Locale.use('es-ES');
			new Date().format('db');
			var Fecha_prog = new Picker.Date($$('#dt_fecha_prog'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			
			var F_OK_Ing_Eqp = new Picker.Date($$('#dt_ok_ing_eq'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			
			var Fecha_Req_FO = new Picker.Date($$('#dt_requiere_fo'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
	
			var F_Req_Pto_Tx = new Picker.Date($$('#dt_req_pto_tx'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var F_trabCol_OK = new Picker.Date($$('#dt_trabcol_ok'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var F_proy_Concluido = new Picker.Date($$('#dt_proy_concl'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var F_Entrega_Esp = new Picker.Date($$('#dt_entrega_esp'), {
				pickerClass: 'datepicker_vista',
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var F_Rec_Site = new Picker.Date($$('#dt_rec_site'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var F_Reporte_Site = new Picker.Date($$('#dt_reporte_site'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var F_meta_Term_Proy = new Picker.Date($$('#dt_meta_term_proy'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Carga_Mat_OK = new Picker.Date($$('#dt_carga_mat_ok'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01',
				onSelect: function() {
					var id = 'dt_carga_mat_ok';
					Asigna_Valor_Observaciones(id);
				}
			});
			var Asig_PEP = new Picker.Date($$('#dt_asig_PEP'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01',
				onSelect: function() {
					var id = 'dt_asig_PEP';
					Asigna_Valor_Observaciones(id);
				}
			});
			var Asig_P_45 = new Picker.Date($$('#dt_asig_p45'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01',
				onSelect: function() {
					var id = 'dt_asig_p45';
					Asigna_Valor_Observaciones(id);
				}
			});
			var OT_OK = new Picker.Date($$('#dt_ots_ok'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01',
				onSelect: function() {
					var id = 'dt_ots_ok';
					Asigna_Valor_Observaciones(id);
				}
			});
			var Anexos_OK = new Picker.Date($$('#dt_anexos'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01',
				onSelect: function() {
					var id = 'dt_anexos';
					Asigna_Valor_Observaciones(id);
				}
			});
			var Pagina_Web_OK = new Picker.Date($$('#dt_pagina_web'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01',
				onSelect: function() {
					var id = 'dt_pagina_web';
					Asigna_Valor_Observaciones(id);
				}
			});
			var Sol_CLLI = new Picker.Date($$('#dt_sol_clli'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01',
				onSelect: function() {
					var id = 'dt_sol_clli';
					Asigna_Valor_Observaciones(id);
				}
			});
			var CLLI_Ok = new Picker.Date($$('#dt_clli_ok'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01',
				onSelect: function() {
					var id = 'dt_clli_ok';
					Asigna_Valor_Observaciones(id);
				}
			});
			var Sol_Gestion = new Picker.Date($$('#dt_sol_gestion'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01',
				onSelect: function() {
					var id = 'dt_sol_gestion';
					Asigna_Valor_Observaciones(id);
				}
			});
			var Gestion_OK = new Picker.Date($$('#dt_gestion_ok'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01',
				onSelect: function() {
					var id = 'dt_gestion_ok';
					Asigna_Valor_Observaciones(id);
				}
			});
			var Carga_SISE = new Picker.Date($$('#dt_carga_sise'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01',
				onSelect: function() {
					var id = 'dt_carga_sise';
					Asigna_Valor_Observaciones(id);
				}
			});
			var F_Meta_Term = new Picker.Date($$('#dt_meta_term_proy'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var F_Meta_Term_FO = new Picker.Date($$('#dt_meta_term_const'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
//			var Fecha_Sol_Planificación = new Picker.Date($$('#dt_sol_planificacion'), {
//				pickerClass: 'datepicker_vista', 
//	//			timePicker: true,
//				format: '%Y-%m-%d',
//				positionOffset: {x: 5, y: 0},
//				useFadeInOut: !Browser.ie,
//				minDate: '2013-01-01'
//			});
//			var Fecha_Rechazo = new Picker.Date($$('#dt_rch'), {
//				pickerClass: 'datepicker_vista', 
//	//			timePicker: true,
//				format: '%Y-%m-%d',
//				positionOffset: {x: 5, y: 0},
//				useFadeInOut: !Browser.ie,
//				minDate: '2013-01-01'
//			});
//			var Fecha_Iden_Trayectoria = new Picker.Date($$('#dt_def_trayectoria'), {
//				pickerClass: 'datepicker_vista', 
//	//			timePicker: true,
//				format: '%Y-%m-%d',
//				positionOffset: {x: 5, y: 0},
//				useFadeInOut: !Browser.ie,
//				minDate: '2013-01-01'
//			});
//			var Fecha_Ok_Acometida = new Picker.Date($$('#dt_ok_acometida'), {
//				pickerClass: 'datepicker_vista', 
//	//			timePicker: true,
//				format: '%Y-%m-%d',
//				positionOffset: {x: 5, y: 0},
//				useFadeInOut: !Browser.ie,
//				minDate: '2013-01-01'
//			});
//			var Fecha_Elab_OT = new Picker.Date($$('#dt_elab_ot'), {
//				pickerClass: 'datepicker_vista', 
//	//			timePicker: true,
//				format: '%Y-%m-%d',
//				positionOffset: {x: 5, y: 0},
//				useFadeInOut: !Browser.ie,
//				minDate: '2013-01-01'
//			});
//			var Fecha_Entr_OT = new Picker.Date($$('#dt_Entr_ot'), {
//				pickerClass: 'datepicker_vista', 
//	//			timePicker: true,
//				format: '%Y-%m-%d',
//				positionOffset: {x: 5, y: 0},
//				useFadeInOut: !Browser.ie,
//				minDate: '2013-01-01'
//			});
//			var Fecha_Ini_Real = new Picker.Date($$('#dt_ini_real'), {
//				pickerClass: 'datepicker_vista', 
//	//			timePicker: true,
//				format: '%Y-%m-%d',
//				positionOffset: {x: 5, y: 0},
//				useFadeInOut: !Browser.ie,
//				minDate: '2013-01-01'
//			});
//			var Fecha_Term_Real = new Picker.Date($$('#dt_term_real'), {
//				pickerClass: 'datepicker_vista', 
//	//			timePicker: true,
//				format: '%Y-%m-%d',
//				positionOffset: {x: 5, y: 0},
//				useFadeInOut: !Browser.ie,
//				minDate: '2013-01-01'
//			});
			var Fecha_Prog = new Picker.Date($$('#dt_PROGRAMADA'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_solicitud_fo'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_sol_planificacion'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_rec_planificacion'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_sol_permiso_ssp'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_rec_permiso'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_entrega_esp_fo'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_ok_adecuaciones'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_elab_ot'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_Entr_ot'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_proyecto_Ok'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_ini_real'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_remate_fo'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_entrega_fo'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_ins_col'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_entrega_gestion_col'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_integracion_colectora'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_enlace_adva_colectora'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_inst_equipo_acceso'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_entrega_equipo_acceso'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_gestion_equipo_acceso'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_instalacion'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_alimen_entrega'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_inst_eq_acceso'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Instalacion = new Picker.Date($$('#dt_entraga_eq_acceso'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_gestion_eq_acceso'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var Fecha_Prog = new Picker.Date($$('#dt_rechazado'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});		
			var Fecha_Prog = new Picker.Date($$('#F_ini'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});		
			var Fecha_Prog = new Picker.Date($$('#F_term'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});		

	<?php if ($id_vencido == 1){ ?>
		$('Vencido').checked = true;
	<?php } ?>
	<?php if ($id_cancelado == 1){ ?>
		$('Cancelado').checked = true;
	<?php } ?>
	<?php if ($id_analisa_ing_eq == 1){ ?>
		$('id_analisa_ing_eq').checked = true;
	<?php } ?>
	<?php if ($id_principal == 1){ ?>
		$('Principal').checked = true;
	<?php } ?>
	<?php if ($id_proy_concl == 1){ ?>
		$('proyecto_concluido').checked = true;
	<?php } ?>
	<?php if ($id_cancel == 1){ ?>
		$('FO_Cancel').checked = true;
	<?php } ?>
});
			
        });
    //});
	
		window.addEvent('domready', function()
		{
			$('guarda_sisa').addEvent('click',guarda_sisa);
			$('guarda_eqpo').addEvent('click',guarda_proy_eqp);
			//$('guarda_eqpo_fo').addEvent('click',guarda_proy_fo);
			$('guarda_construccion').addEvent('click',guarda_cons);
			$('guarda_proy_fo').addEvent('click',guarda_proye_fo);
		});
		
function guarda_sisa(e)
{
	var referencia = '<?php echo $referencia; ?>';
	var id_tramos = '<?php echo $id_tramos; ?>';
	
	var id_proy_sisa = $('proyecto_sisa').value;
	var dt_fecha_prog = $('dt_fecha_prog').value;
	var documento_pagina_web = $('documento_pagina_web').value;
	var id_proy_rda = $('edo_proy_rda').value;
	var	dt_ok_ing_eq = $('dt_ok_ing_eq').value;
	var dt_liquidada = $('dt_liquidada').value;
		if ($('Vencido').checked == true)
		{
			var	id_vencido = 1;
		} else {
			var	id_vencido = 0;
		}
		if ($('Cancelado').checked == true)
		{
			var	id_cancelado = 1;
		} else {
			var	id_cancelado = 0;
		}
		if ($('id_analisa_ing_eq').checked == true)
		{
			var	id_analisa_ing_eq = 1;
		} else {
			var	id_analisa_ing_eq = 0;
		}

	var datos = "referencia="+referencia
	
	+"&id_tramos="+id_tramos
	+"&id_proy_sisa="+id_proy_sisa
	+"&dt_fecha_prog="+dt_fecha_prog
	+"&documento_pagina_web="+documento_pagina_web
	+"&id_proy_rda="+id_proy_rda
	+"&dt_ok_ing_eq="+dt_ok_ing_eq
	+"&dt_liquidada="+dt_liquidada

	+"&id_vencido="+id_vencido
	+"&id_cancelado="+id_cancelado
	+"&id_analisa_ing_eq="+id_analisa_ing_eq;

	//alert (datos);

		var myHTMLRequest = new Request.HTML({
		url: 'SISA_insert.php',
		onRequest : function (){
			//Si nos muestra el resultado correcto, pinta en pantalla
			$('resultado').set('html','');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('resultado').set('html',html);
			dt_fecha_sisa_JSON();
			}	
		}).send({ 
			method:'get',
			data: datos
		});
	}

function guarda_proy_eqp(e)
{
	var referencia = '<?php echo $referencia; ?>';
	var id_tramos = '<?php echo $id_tramos; ?>';
	
	var str_ref_relacionada = $('str_ref_relacionada').value;
	var id_Fase_IOS = $('fase_ios').value;
	var id_proy_eqp = $('Tipo_Trabajo').value;
	var id_requiere_trbj = $('requiere_trabajo').value;
	var	dt_requiere_fo = $('dt_requiere_fo').value;
	var	id_res_super = $('responsable_sup').value;
	var id_ipe_proyecto = $('ipe_proy').value;
	var	id_pendt_cliente = $('pendiente_cliente').value;
	var	id_req_pto = $('requiere_pto_tx').value;
	var	id_nivel_pto_tx = $('nivel_pto').value;
	var	dt_req_pto_tx = $('dt_req_pto_tx').value;
	var	id_status_pto = $('status_pto').value;
	var	dt_carga_mat_ok = $('dt_carga_mat_ok').value;
	var	dt_asig_PEP = $('dt_asig_PEP').value;
	var	dt_asig_p45 = $('dt_asig_p45').value;
	var dt_ots_ok = $('dt_ots_ok').value;
	var	dt_anexos = $('dt_anexos').value;
	var	dt_pagina_web = $('dt_pagina_web').value;
	var	dt_sol_clli = $('dt_sol_clli').value;
	var dt_clli_ok = $('dt_clli_ok').value;
	var	dt_sol_gestion = $('dt_sol_gestion').value;
	var	dt_gestion_ok = $('dt_gestion_ok').value;
	var	dt_carga_sise = $('dt_carga_sise').value;
	var	dt_proy_concl = $('dt_proy_concl').value;
	var	id_Filial = $('filial').value;
	var	id_modelo = $('modelo').value;
	var	id_cap_enlace = $('capacidad_enlace').value;
	var	str_PEP = $('str_PEP').value;
	var	id_filial_prov = $('proveedor_instalacion').value;
	var	str_colectora = $('str_colectora').value;
	var	id_trabajo_colectora = $('trabajo_colectora').value;
	var	dt_trabcol_ok = $('dt_trabcol_ok').value;
	var	dt_entrega_esp = $('dt_entrega_esp').value;
	var	dt_rec_site = $('dt_rec_site').value;
	var	dt_reporte_site = $('dt_reporte_site').value;
	var	id_eq_client = $('equipo_cliente').value;
	var	id_instalado = $('instalado').value;
	var	str_top_fo = $('str_top_fo').value;
	var	str_anillo_rof = $('str_anillo_rof').value;
	var	int_fot1 = $('int_fot1').value;
	var	int_fot2 = $('int_fot2').value;
	var	id_prtx_status = $('prtx_status').value;
	var	dt_meta_term_proy = $('dt_meta_term_proy').value;
	var Observaciones_Eq = encodeURIComponent($('Observaciones_Eq').value);
	
		if ($('Principal').checked == true)
		{
			var	id_principal = 1;
		} else {
			var	id_principal = 0;
		}
		if ($('proyecto_concluido').checked == true)
		{
			var	id_proy_concl = 1;
		} else {
			var	id_proy_concl = 0;
		}

	var datos = "referencia="+referencia
	
	+"&id_tramos="+id_tramos
	+"&str_ref_relacionada="+str_ref_relacionada
	+"&id_Fase_IOS="+id_Fase_IOS
	+"&id_proy_eqp="+id_proy_eqp
	+"&id_requiere_trbj="+id_requiere_trbj
	+"&dt_requiere_fo="+dt_requiere_fo
	+"&id_res_super="+id_res_super
	+"&id_ipe_proyecto"+id_ipe_proyecto
	+"&id_pendt_cliente="+id_pendt_cliente
	+"&id_req_pto="+id_req_pto
	+"&id_nivel_pto_tx="+id_nivel_pto_tx
	+"&dt_req_pto_tx="+dt_req_pto_tx
	+"&id_status_pto="+id_status_pto
	+"&dt_carga_mat_ok="+dt_carga_mat_ok
	+"&dt_asig_PEP="+dt_asig_PEP
	+"&dt_asig_p45="+dt_asig_p45
	+"&dt_ots_ok="+dt_ots_ok
	+"&dt_anexos="+dt_anexos
	+"&dt_pagina_web="+dt_pagina_web
	+"&dt_sol_clli="+dt_sol_clli
	+"&dt_clli_ok="+dt_clli_ok
	+"&dt_sol_gestion="+dt_sol_gestion
	+"&dt_gestion_ok="+dt_gestion_ok
	+"&dt_carga_sise="+dt_carga_sise
	+"&dt_proy_concl="+dt_proy_concl
	+"&id_Filial="+id_Filial
	+"&id_modelo="+id_modelo
	+"&id_cap_enlace="+id_cap_enlace
	+"&str_PEP="+str_PEP
	+"&id_filial_prov="+id_filial_prov
	+"&str_colectora="+str_colectora
	+"&id_trabajo_colectora="+id_trabajo_colectora
	+"&dt_trabcol_ok="+dt_trabcol_ok
	+"&dt_entrega_esp="+dt_entrega_esp
	+"&dt_rec_site="+dt_rec_site
	+"&dt_reporte_site="+dt_reporte_site
	+"&id_eq_client="+id_eq_client
	+"&id_instalado="+id_instalado
	+"&str_top_fo="+str_top_fo
	+"&str_anillo_rof="+str_anillo_rof
	+"&int_fot1="+int_fot1
	+"&int_fot2="+int_fot2
	+"&id_prtx_status="+id_prtx_status
	+"&dt_meta_term_proy="+dt_meta_term_proy
	+"&Observaciones_Eq="+Observaciones_Eq
	+"&id_principal="+id_principal
	+"&id_proy_concl="+id_proy_concl;

	//alert (datos);

		var myHTMLRequest = new Request.HTML({
		url: 'Eqpo_proy_insert.php',
		onRequest : function (){
			//Si nos muestra el resultado correcto, pinta en pantalla
			$('resultado_eqpo').set('html','');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('resultado_eqpo').set('html',html);
			Carga_JSON();
			}	
		}).send({ 
			method:'get',
			data: datos
		});
	}
	
//function guarda_proy_fo(e)
//{
//	var referencia = '<?php //echo $referencia; ?>';
//	var id_tramos = '<?php //echo $id_tramos; ?>';
//	
//	var id_requerimiento = $('requerimiento').value;
//	var id_resp_sucope = $('resp_sucope').value;
//	var id_resp_ipr = $('resp_ipr').value;
//	var str_tipo_proy = $('str_tipo_proy').value;
//	var	dt_meta_term_const = $('dt_meta_term_const').value;
//	var	id_edo_fo = $('edo_fo').value;
//	var	id_atraso = $('motivo_rechaso').value;
//	var	str_planificador = $('str_planificador').value;
//	var	dt_sol_planificacion = $('dt_sol_planificacion').value;
//	var	dt_rch = $('dt_rch').value;
//	var	dt_def_trayectoria = $('dt_def_trayectoria').value;
//	var	dt_ok_acometida = $('dt_ok_acometida').value;
//	var	str_ot_fo = $('str_ot_fo').value;
//	var	str_pep = $('str_pep').value;
//	var	dt_elab_ot = $('dt_elab_ot').value;
//	var	str_ped45 = $('str_ped45').value;
//	var	dt_Entr_ot = $('dt_Entr_ot').value;
//	var	dt_ini_real = $('dt_ini_real').value;
//	var	str_recibe_OT = $('str_recibe_OT').value;
//	var	dt_term_real = $('dt_term_real').value;
//	var	dt_PROGRAMADA = $('dt_PROGRAMADA').value;
//	var	str_Constructor = $('str_Constructor').value;
//	var	id_res_super = $('responsable_sup').value;
//	var	str_problematica = $('str_problematica').value;
//	var	ctrl_fo = $('ctrl_fo').value;
//	var	str_anillo_rof = $('str_anillo_rof').value;
//	var	clte_fo = $('clte_fo').value;
//	var str_tipo = $('str_tipo').value;
//
//	var datos = "referencia="+referencia
//	
//	+"&id_tramos="+id_tramos
//	+"&id_requerimiento="+id_requerimiento
//	+"&id_resp_sucope="+id_resp_sucope
//	+"&id_resp_ipr="+id_resp_ipr
//	+"&str_tipo_proy="+str_tipo_proy
//	+"&dt_meta_term_const="+dt_meta_term_const
//	+"&id_edo_fo="+id_edo_fo
//	+"&id_atraso="+id_atraso
//	+"&str_planificador="+str_planificador
//	+"&dt_sol_planificacion="+dt_sol_planificacion
//	+"&dt_rch="+dt_rch
//	+"&dt_def_trayectoria="+dt_def_trayectoria
//	+"&dt_ok_acometida="+dt_ok_acometida
//	+"&str_ot_fo="+str_ot_fo
//	+"&str_pep="+str_pep
//	+"&dt_elab_ot="+dt_elab_ot
//	+"&str_ped45="+str_ped45
//	+"&dt_Entr_ot="+dt_Entr_ot
//	+"&dt_ini_real="+dt_ini_real
//	+"&str_recibe_OT="+str_recibe_OT
//	+"&dt_term_real="+dt_term_real
//	+"&dt_PROGRAMADA="+dt_PROGRAMADA
//	+"&str_Constructor="+str_Constructor
//	+"&id_res_super="+id_res_super
//	+"&str_problematica="+str_problematica
//	+"&ctrl_fo="+ctrl_fo
//	+"&str_anillo_rof="+str_anillo_rof
//	+"&clte_fo="+clte_fo
//	+"&str_tipo="+str_tipo;
//
//	//alert (datos);
//
//		var myHTMLRequest = new Request.HTML({
//		url: 'Eqpo_proy_fo.php',
//		onRequest : function (){
//			//Si nos muestra el resultado correcto, pinta en pantalla
//			$('resultado_fo').set('html','');
//			}	,
//		
//		onSuccess : function(tree, elements, html)	{
//			$('resultado_fo').set('html',html);
//			}	
//		}).send({ 
//			method:'get',
//			data: datos
//		});
//	}
	
function guarda_cons(e)
{
		var myHTMLRequest = new Request.HTML({
		url: 'Construccion.php',
		onRequest : function (){
			$('resultado_cons').set('html','');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('resultado_cons').set('html',html);
			Carga_JSON();

			}	
		}).post($('form_construccion'));
	}
	
function guarda_proye_fo(e)
{
	var referencia = '<?php echo $referencia; ?>';
	var id_tramos = '<?php echo $id_tramos; ?>';
	
	var id_requerimiento = $('requerimiento').value;
	var id_edo_acometida = $('edo_acometida').value;
	var	dt_PROGRAMADA = $('dt_PROGRAMADA').value;
	var id_supervisor_fo = $('supervisor_fo').value;
	var id_resp_sucope = $('resp_sucope').value;
	var id_resp_ipr = $('resp_ipr').value;
	var dt_solicitud_fo = $('dt_solicitud_fo').value;
	var	str_planificador = $('str_planificador').value;
	var	dt_sol_planificacion = $('dt_sol_planificacion').value;
	var dt_rec_planificacion = $('dt_rec_planificacion').value;
	var dt_sol_permiso_ssp = $('dt_sol_permiso_ssp').value;
	var dt_rec_permiso = $('dt_rec_permiso').value;
	var dt_entrega_esp_fo = $('dt_entrega_esp_fo').value;
	var dt_ok_adecuaciones = $('dt_ok_adecuaciones').value;
	var delegacion = $('delegacion').value;
	var dt_elab_ot = $('dt_elab_ot').value;
	var dt_Entr_ot = $('dt_Entr_ot').value;
	var str_recibe_OT = $('str_recibe_OT').value;
	var PEP_09 = $('PEP_09').value;
	var str_ped45 = $('str_ped45').value;
	var id_problematica = $('problematica_eqp').value;
	var str_Constructor = $('str_Constructor').value;
	var dt_proyecto_Ok = $('dt_proyecto_Ok').value;
	var FOt1 = $('FOt1').value;
	var FOt2 = $('FOt2').value;
	var clte_fo1 = $('clte_fo1').value;
	var	clte_fo2 = $('clte_fo2').value;
	var id_tipo = $('tipo').value;
	var	FOT1_resp = $('FOT1_resp').value;
	var	FOT2_resp = $('FOT2_resp').value;
	var	clte_fo1_resp = $('clte_fo1_resp').value;
	var	clte_fo2_resp = $('clte_fo2_resp').value;
	var	id_tipo_fo = $('dt_ok_acometida').value;
	var	id_FO_Const_Estatus = $('FO_Const_Estatus').value;
	var	id_problem_cons = $('problem_const').value;
	var	SubAnillo_Fi = $('SubAnillo_Fi').value;
	var	PES = $('PES').value;
	var	Atenuacion_Trab = $('Atenuacion_Trab').value;
	var	Atenuacion_Resp = $('Atenuacion_Resp').value;
	var	Longitud_Trab = $('Longitud_Trab').value;
	var	Longitud_Resp = $('Longitud_Resp').value;
	var	dt_ini_real = $('dt_ini_real').value;
	var	dt_remate_fo = $('dt_remate_fo').value;
	var dt_entrega_fo = $('dt_entrega_fo').value;
	var	str_sup_cons = $('str_sup_cons').value;
		if ($('FO_Cancel').checked == true)
		{
			var	id_cancel = 1;
		} else {
			var	id_cancel = 0;
		}

	var datos = "referencia="+referencia
	
	+"&id_tramos="+id_tramos
	+"&id_requerimiento="+id_requerimiento
	+"&id_edo_acometida="+id_edo_acometida
	+"&dt_PROGRAMADA="+dt_PROGRAMADA
	+"&id_supervisor_fo="+id_supervisor_fo
	+"&id_resp_sucope="+id_resp_sucope
	+"&id_resp_ipr="+id_resp_ipr
	+"&dt_solicitud_fo="+dt_solicitud_fo
	+"&str_planificador="+str_planificador
	+"&dt_sol_planificacion="+dt_sol_planificacion
	+"&dt_rec_planificacion="+dt_rec_planificacion
	+"&dt_sol_permiso_ssp="+dt_sol_permiso_ssp
	+"&dt_rec_permiso="+dt_rec_permiso
	+"&dt_entrega_esp_fo="+dt_entrega_esp_fo
	+"&dt_ok_adecuaciones="+dt_ok_adecuaciones
	+"&delegacion="+delegacion
	+"&dt_elab_ot="+dt_elab_ot
	+"&dt_Entr_ot="+dt_Entr_ot
	+"&str_recibe_OT="+str_recibe_OT
	+"&PEP_09="+PEP_09
	+"&str_ped45="+str_ped45
	+"&id_problematica="+id_problematica
	+"&str_Constructor="+str_Constructor
	+"&dt_proyecto_Ok="+dt_proyecto_Ok
	+"&FOt1="+FOt1
	+"&FOt2="+FOt2
	+"&clte_fo1="+clte_fo1
	+"&clte_fo2="+clte_fo2
	+"&id_tipo="+id_tipo
	+"&FOT1_resp="+FOT1_resp
	+"&FOT2_resp="+FOT2_resp
	+"&clte_fo1_resp="+clte_fo1_resp
	+"&clte_fo2_resp="+clte_fo2_resp
	+"&id_tipo_fo="+id_tipo_fo
	+"&id_FO_Const_Estatus="+id_FO_Const_Estatus
	+"&id_problem_cons="+id_problem_cons
	+"&SubAnillo_Fi="+SubAnillo_Fi
	+"&PES="+PES
	+"&Atenuacion_Trab="+Atenuacion_Trab
	+"&Atenuacion_Resp="+Atenuacion_Resp
	+"&Longitud_Trab="+Longitud_Trab
	+"&Longitud_Resp="+Longitud_Resp
	+"&dt_ini_real="+dt_ini_real
	+"&dt_remate_fo="+dt_remate_fo
	+"&dt_entrega_fo="+dt_entrega_fo
	+"&str_sup_cons="+str_sup_cons
	+"&id_cancel="+id_cancel;

	//alert (datos);

		var myHTMLRequest = new Request.HTML({
		url: 'Equipo_proy_fibra.php',
		onRequest : function (){
			//Si nos muestra el resultado correcto, pinta en pantalla
			$('resultado_proyecto_fo').set('html','');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			Carga_JSON();
			$('resultado_proyecto_fo').set('html',html);
			}	
		}).send({ 
			method:'get',
			data: datos
		});
	}
	
		
//            $('new-tab').addEvent('click', function() {
//                var title = $('new-tab-title').get('value');
//                var content = $('new-tab-content').get('value');
//
//                if (!title || !content) {
//                    window.alert('Title or content text empty, please fill in some text.');
//                    return;
//                }

//                title = new Element('li', {'class': 'tab', text: title}).adopt(new Element('span', {'class': 'remove', html: '&times'}));
//				content = new Element('p', {'class': 'content', text: content}).setStyle('display', 'none');
//				tabPane.add(title, content);
/*------------------------------------------------------OPCIONE GUARDAR----------------------------------------*/


window.addEvent('domready', function() {
			$('save_ot').addEvent('click',guardar_ot);
		});
		
		function guardar_ot(e)
{
	var referencia = '<?php echo $referencia; ?>';
	var id_tramos = '<?php echo $id_tramos; ?>';
	var form_ot = $('form_ot').toQueryString();
//	"referencia="+referencia+"&id_tramos="+id_tramos+"&"+
	datos = form_ot;
//	alert (datos);

		var myHTMLRequest = new Request.HTML({
		url: 'insert_OT.php',
		onRequest : function (){
			$('resultado_ot').set('html','');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('resultado_ot').set('html',html);
			var hidden_num_ot = $('hidden_num_ot').value;
			var url_ot = 'http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/print_formato_ot_fo.php?id_ot='+hidden_num_ot;
			
			alert(url_ot);
			//window.open(url_ot,"ventana_ot");
			 mywindow = window.open(url_ot, "mywindow", "location=1,status=1,scrollbars=1,width=1000,height=1000");
					//'referencia=F20-1303-0026&id_tramos=2&str_OT=UIL-1332/2013&dt_fecha_OT=2013-08-28&n_accesso=MADRID&anillo=MA/FT&CLL=CDMXDFMA&posicion_dbfo=01.Q10B61&f_ini=2013-05-28&f_REF=2013-05-09&F_term=2013-05-28&element=C-4505422 B014&elemnt_pep=N.A&trabajos_realizar=AMPLIACION DE FIBRAS PARA EL USUARIO INDICADO&nota=PARA INICIAR LA CONST. DEL PROYECTO&observaciones=ENTREGAR UN REPORTE DE LOS CLIENTES QUE SE ENCUENTRAN DERIVADOS EN EL CIERRE A INTERVENIR&str_tipo_servicio=AMPLIACION FIBRA&codigo=2&prioridad=PROGRAMA&str_prioridad=b'	
			}	
		}).post($('form_ot'));
//		send({ 
//			method:'get',
//			data: datos
//		});
	}
/*------------------------------------------------------OPCION DE GUARDAR----------------------------------------*/
		window.addEvent('domready', function() {
			$('ultima_fila').set('value', 0);
			//$('crea_tabla_referencias').addEvent('click',agrega_bloque_filas);
			$('agregar').addEvent('click',agrega_filas);
			//$('guardar').addEvent('click',guarda_informacion);
		});
		
		function crea_combo_subgerentes(fila)
		{
			var html = '<select name="referencia[][subgerente]" id="subgerente_'+fila+'" class="required combo"><option value="">Seleccione</option><?php echo opciones_usuarios(2, 4,''); ?></select>';
			
			return html;	
		}

		function crea_combo_supervisores(fila)
		{
			var html = '<select name="referencia[][supervisor]" id="supervisor_'+fila+'" class="required combo"><option value="">Seleccione</option><?php echo opciones_usuarios(3, 4,''); ?></select>';
			
			return html;	
		}
		
		function dispose_row(fila)
		{
			$('cant_'+fila).dispose();
			$('descrip_'+fila).dispose();
			$('tabla_responsables_'+fila).dispose();
			$('filas_tabla').value = ($('filas_tabla').value*1)-1;
			var myElement = document.id('mensaje');
			myElement.set('html', '');

		}

		function add_row(referencia)
		{
			var myElement = document.id('mensaje');
			myElement.set('html', '');

			var fila = ($('ultima_fila').value*1) + 1;
			$('ultima_fila').set('value', fila);
			//alert("hola");
			var myTable = new HtmlTable($('tabla_responsables'));
			myTable.push([
			{// 1
				content: fila,
				properties: {
					align: 'center'
				}
			},
			{// 2
				content: '<input name="cantidad[][cant]" type="text" id="cant_'+fila+'" tabindex="'+fila+'" maxlength="3" value="'+referencia+'" class="cant_combo requeried" />',
				properties: {
					align: 'center'
				}
			},
			{// 3
				content:  '<input name="cantidad[][descripcion]" type="text" id="descrip_'+fila+'" tabindex="'+fila+'" maxlength="100" value="'+referencia+'" class="descrip_combo requeried" />',
				properties: {
					align: 'center'
				}	
			},
			/*{// 4
				content: crea_combo_supervisores(fila),
				properties: {
					align: 'center'
				}
			},*/
			{// 5
				content: '<a href="javascript:dispose_row('+fila+');"><img src="../../../kike/images/trash_16x16.gif" width="16" height="16" alt="Eliminar" border="0" /></a>',
				properties: {
					align: 'center'
				}}
			],
			{
				id : 'tabla_responsables_'+fila,
				class : 'filas_tabla_responsables'
			});
			$('filas_tabla').value = ($('filas_tabla').value*1)+1;

		}
		
		function agrega_filas()
		{
			var numero_filas = $('numero_filas').value;
			for (x=0;x<=((numero_filas*1)-1);x++)
			{
				var addrow = add_row('');
			}

		}

		function agrega_bloque_filas()
		{
			var textarea_referencias = $('textarea_referencias').value;
			var elementos_textarea = textarea_referencias.split('\n');
			if (textarea_referencias != '')
			{
				for (x=0;x<=(elementos_textarea.length-1);x++)
				{
					var addrow = add_row(elementos_textarea[x]);
				}
				 $('textarea_referencias').value = '';
			} else {
				alert ("Ingrese referencias por favor...");
			}
		}
		
		function guarda_informacion()
		{
			var myElement = document.id('mensaje');
			myElement.set('html', '');
			if ($('filas_tabla').value > 0)
			{
				var tabla_responsables = document.id('tabla_responsables');
				MooTools.lang.setLanguage("es-ES");
				validate = new Form.Validator.Inline("registro_responsables");
				if (validate.validate())
				{
					if (confirm('¿Desea guardar la informacion?'))
					{
						var myHTMLRequest = new Request.HTML({
							url: 'asigna_responsables.php',
							onRequest: function(){
								myElement.set('html', '<img src="../../../kike/images/loading.gif" width="20" height="20" alt="Loading..." />');
							},
							onSuccess: function(responseTree, responseElements, responseHTML, responseJavaScript){
								myElement.set('html', responseHTML);
								//tabla_responsables.set('html', '<tr align="center" bgcolor="#0066CC" class="Texto_Mediano_Blanco"><td><b>#</b></td><td><b>Referencia</b></td><td><b>Subgerente</b></td><td><b>Supervisor</b></td><td><b>Opciones</b><input name="ultima_fila" type="hidden" id="ultima_fila" value="0" /><input name="filas_tabla" type="hidden" id="filas_tabla" value="0" /></td></tr>');
							},
							onFailure: function(){
								myElement.set('text', 'Sorry, your request failed :(');
							}
						}).post($('registro_responsables'));
					}
				}
			} else {
				alert ("Ingrese referencias por favor...");
				
			}
		}
/*------------------------------------------------------OPCIONES DE FILA----------------------------------------*/
    </script>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <style type="text/css">
        .input-wrapper {
            padding: .2em;
            border: 1px #333 solid;
        }
        .input-wrapper input, .input-wrapper textarea {
            width: 100%;
            margin: 0;
            padding: 0;
            font: inherit;
            color: inherit;
            border: 0;
            background-color: transparent;
        }
    </style>
    <link href="../../../SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <table width="100" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td>Referencia:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="<?php echo $referencia ?>" /></td>
    <td><input type="text" name="SIGLAS_ios" id="SIGLAS_ios" class="combo_pink_ch" value="<?php echo $SIGLAS_ios ?>" /></td>
    <td><input type="text" name="usuario" id="usuario" class="combo_purple" value="<?php echo $usuario ?>" /></td>
    <td><input type="text" name="usuario_puntas" id="usuario_puntas" class="combo_purple" value="<?php echo $usuario_puntas ?>" /></td>
    <td><input type="text" name="direccion" id="direccion" class="combos_4" value="<?php echo $direccion ?>" /></td>
  </tr>
  <tr>
    <td><input type="hidden" name="id_tramos" id="id_tramos" class="combos_3" value="<?php echo $id_tramos ?>" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<div id="demo">
    <ul class="tabs">
        <li class="tab">Sisa </li>
        <li class="tab">Proyecto Equipamiento </li>
        <li class="tab">Proyecto de Fibra &Oacute;ptica </li>
        <li class="tab">Consulta Proy. de Fibra &Oacute;ptica </li>
        <li class="tab">Construcci&oacute;n </li>
        <li class="tab">Generacion de OT </li>
    </ul>
<!-- INICIA PRIMER TAB SISA -->    
    
    <div class="content">
   <table width="1000" border="0">
  <tr>
    <td>
		<fieldset>
    		<legend><strong>Informaci&oacute;n Sisa</strong></legend>   
    <table width="950" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td>Empresa:</td>
    <td><input type="text" name="usuario" id="usuario" class="combos_3" value="<?php echo $usuario ?>" /></td>
    <td>Tipo_Serv</td>
    <td><input type="text" name="tipo_proy" id="tipo_proy" class="combos_3" value="<?php echo $tipo_proy ?>" /></td>
    <td>Edo_Serv:</td>
    <td><input type="text" name="edo_serv" id="edo_serv" class="combos_3" value="<?php echo $edo_serv ?>" /></td>
    <td>SISA Pend</td>
    <td><input name="Pendiente" type="checkbox" value="" /></td>
  </tr>
  <tr>
    <td>Empresa_UNINET:</td>
    <td><input type="text" name="usuario_puntas" id="usuario_puntas" class="combo_purple" value="<?php echo $usuario_puntas ?>" /></td>
    <td>Edo_Tramo</td>
    <td><input type="text" name="edo_tramo" id="edo_tramo" class="combos_3" value="<?php echo $edo_tramo ?>" /></td>
    <td>Entidad</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="WIFE" /></td>
    <td>Tramo_Afe</td>
    <td><input name="Tramo_Afe" id="Tramo_Afe" type="checkbox" value="" /></td>
  </tr>
  <tr>
    <td>Puntas:</td>
    <td><input type="text" name="tra_punta" id="tra_punta" class="combos_3" value="<?php echo $tra_punta ?>" /></td>
    <td>F Tramo Afe</td>
    <td><input type="text" name="fecha_afect" id="fecha_afect" class="combos_3" value="<?php echo $fecha_afect ?>" /></td>
    <td>Entidad Vig:</td>
    <td><input type="text" name="Entidad_Vig" id="Entidad_Vig" class="combos_3" value="" /></td>
    <td>Edo Serv</td>
    <td><input type="text" name="edo_serv" id="edo_serv" class="combo_1" value="<?php echo $edo_serv ?>" /></td>
  </tr>
  <tr>
    <td height="32">Direcci&oacute;n:</td>
    <td rowspan="2"><textarea name="direccion" id="direccion" cols="20" rows="4"><?php echo htmlentities ($direccion,ENT_QUOTES); ?></textarea></td>
    <td>Due Date:</td>
    <td><input type="text" name="DUE_DATE" id="DUE_DATE" class="combos_3" value="<?php echo $DUE_DATE ?>" /></td>
    <td>Tramo:</td>
    <td colspan="3"><input type="text" name="ref_tramo" id="ref_tramo" class="combos_4" value="<?php echo $ref_tramo ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Obs_tramo:</td>
    <td colspan="5"><textarea name="tra_obser" id="tra_obser" cols="50" rows="2"><?php echo $tra_obser ?></textarea>
   </td>
  </tr>
	</table>
		</fieldset>
                    
     <table width="950" height="143" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td>GOA:</td>
    <td><input type="text" name="area" id="area" class="combos_3" value="<?php echo $area ?>" /></td>
    <td>Analiza Ing-Equipo:</td>
    <td><input type="checkbox" name="id_analisa_ing_eq" value="1" id="id_analisa_ing_eq" /></td>
    <td>F_OK_Ing-Eqp:</td>
    <td><input type="text" name="dt_ok_ing_eq" id="dt_ok_ing_eq" class="combo_red" value="<?php echo $dt_ok_ing_eq ?>" /></td>
  </tr>
  <tr>
    <td>Central:</td>
    <td><input type="text" name="SIGLAS_ios" id="SIGLAS_ios" class="combo_pink" value="<?php echo $SIGLAS_ios ?>" /></td>
    <td>Zona:</td>
    <td><input type="text" name="division" id="division" class="combos_3" value="<?php echo $division ?>" /></td>
    <td>Nombre Central:</td>
    <td><input type="text" name="central" id="central" class="combos_3" value="<?php echo $central ?>" /></td>
  </tr>
  <tr>
    <td>Grupo de Proyecto:</td>
    <td><?php echo ImprimeCombo(7,$id_proy_sisa);?></td>
    <td>Edo_proy_RDA:</td>
    <td><?php echo ImprimeCombo(6,$id_proy_rda);?></td>
    <td>Observaciones:</td>
    <td><textarea name="obs_tramo" cols="32" rows="1">&nbsp;</textarea></td>
  </tr>
  <tr>
    <td>Fecha_prog:</td>
    <td><input type="text" name="dt_fecha_prog" id="dt_fecha_prog" class="combo_green" value="<?php echo $dt_fecha_prog ?>" /></td>
    <td>Vencido:</td>
    <td><input type="checkbox" name="Vencido" value="1" id="Vencido" /></td>
    <td>Estado del Cliente</td>
    <td><input type="text" name="edo_cliente" id="edo_cliente" class="combo_pink" /></td>
  </tr>
  <tr>
    <td>Documento p&aacute;g. Web:</td>
    <td><input type="text" name="documento_pagina_web" id="documento_pagina_web" class="combos_3" value="<?php echo $documento_pagina_web ?>" /></td>
    <td>Cancelado:</td>
    <td><input type="checkbox" name="Cancelado" value="1" id="Cancelado" /></td>
    <td>Pendiente Cliente</td>
    <td><input type="text" name="pendiente_cliente" id="pendiente_cliente" class="combo_pink" /></td>
  </tr>
</table>

<table width="845" border="0">
  <tr>
    <td width="364">
<fieldset>
	<legend><strong>Site</strong></legend>
     <table width="350" border="0" class="Texto_Mediano_Negro">
	 <tr>
      <td width="130">Fecha Entrega Esp:</td>
      <td width="209"><input type="text" name="dt_entrega_esp_sisa" id="dt_entrega_esp_sisa" class="combo_yellow" value="<?php echo $dt_entrega_esp ?>" /></td>
    </tr>
 <tr>
    <td>Fecha Rec Site:</td>
    <td><input type="text" name="dt_rec_site_sisa" id="dt_rec_site_sisa" class="combo_yellow" value="<?php echo $dt_rec_site ?>" /></td>
    </tr>
	</table>
</fieldset>
    </td>
    <td width="353">
<fieldset>
    <legend><strong>Proyecto:</strong></legend>
     <table width="351" height="43" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td width="103">PrTxStatus:</td>
    <td width="273"><input type="text" name="str_prtx_status" id="str_prtx_status" class="combo_yellow" value="<?php echo $str_prtx_status ?>"  /></td>
    </tr>
  <tr>
    <td>F Proy Concl:</td>
    <td><input type="text" name="dt_proy_concl_sisa" id="dt_proy_concl_sisa" class="combo_yellow" value="<?php echo $dt_proy_concl ?>" /></td>
    </tr>
	</table>
</fieldset>		
    </td>
    <td width="114">
		<input type="button" name="guarda_sisa" id="guarda_sisa"  value="Guardar" />    
    </td>
  </tr>		
  <tr> 	
    <td>
<fieldset>
    <legend><strong>Fibra Opt&iacute;ca:</strong></legend>
    <table width="350" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td width="60">FO status:</td>
    <td width="60"><input type="text" name="str_fo_const_estatus" id="str_fo_const_estatus" class="combo_yellow" value="<?php echo$str_fo_const_estatus ?>" /></td>
    </tr>
  <tr>
    <td>F Term Real FO:</td>
    <td><input type="text" name="dt_entrega_fo_sisa" id="dt_entrega_fo_sisa" class="combo_yellow" value="<?php echo$dt_entrega_fo ?>" /></td>
    </tr>
  <tr>
    <td>Problem&aacute;tica:</td>
    <td><input type="text" name="str_problema" id="str_problema" class="combo_yellow" value="<?php echo$str_problema ?>" /></td>
    </tr>
</table>
</fieldset>
    </td>
    <td>
<fieldset>
    <legend><strong>Construcci&oacute;n:</strong></legend>
    <table width="350" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td width="60">Const Status:</td>
    <td width="60"><input type="text" name="str_estatus" id="str_estatus" class="combo_yellow" value="<?php echo$str_estatus ?>" /></td>
    </tr>
  <tr>
    <td>Fecha Liq:</td>
    <td><input type="text" name="dt_liquidada" id="dt_liquidada" class="combo_blue" value="<?php echo$dt_liquidada ?>" /></td>
    </tr>
</table>
</fieldset>
    </td>
    <td><div id="resultado" style="font-weight:bold;"></div></td>
  </tr>
</table>
    </td>
  </tr>
</table>
    </div>
<!-- FIN DEL PRIMER TAB SISA -->    
<div class="content">
<table width="1000" border="0">
  	<tr>
    <td width="376" height="99">
 <fieldset>
    <legend><strong>Grupo de Referencias:</strong></legend>
<table width="320" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td colspan="2" align="right">
    Principal:
      <input type="checkbox" name="Principal" value="1" id="Principal" /></td>
    </tr>
  <tr>
    <td width="100">Relacionado a</td>
    <td width="163"><input type="text" name="str_ref_relacionada" id="str_ref_relacionada" class="combo_green" value="<?php echo $str_ref_relacionada ?>" /></td>
  </tr>
  </table>
</fieldset></td>
  <td width="650" rowspan="2">
  <table width="618" border="0" class="Texto_Mediano_Negro">
    <tr>
      <td colspan="2" align="right">
      Proyecto Concluido
         <input type="checkbox" name="proyecto_concluido" value="1" id="proyecto_concluido" /></td>
      <td width="339" colspan="2">
      F proy Concluido:
      <input type="text" name="dt_proy_concl" id="dt_proy_concl" class="combo_green" value="<?php echo $dt_proy_concl ?>" /></td>
    </tr>
   <!-- <tr>-->
      <td width="308">
  <fieldset>
        <legend><strong>Proyecto Tx Central</strong></legend>
    <table width="300" border="0">
      <tr>
        <td>Proveedor:</td>
        <td><?php echo ImprimeCombo(4,$id_Filial);?></td>
      </tr>
      <tr>
        <td>Modelo:</td>
        <td><?php echo ImprimeCombo(16,$id_modelo);?></td>
      </tr>
      <tr>
        <td>Capacidad Enlace:</td>
        <td><?php echo ImprimeCombo(17,$id_cap_enlace);?></td>
      </tr>
      <tr>
        <td>PEP:</td>
        <td><input type="text" name="str_PEP" id="str_PEP" class="combos_3" value="<?php echo $str_PEP ?>" /></td>
      </tr>
      <tr>
        <td>Proveedor Inst.</td>
        <td><?php echo ImprimeCombo(23,$id_filial_prov);?></td>
      </tr>
    </table>
    </fieldset>
    </td>
  <td colspan="3">
  <fieldset><legend><strong>Cliente</strong></legend>
 <table width="300" border="0">
  <tr>
      <td>
      <fieldset><legend><strong>Site</strong></legend>
<table width="300" border="0">
  <tr>
      <td>F_Entrega_Esp:</td>
      <td><input type="text" name="dt_entrega_esp" id="dt_entrega_esp" class="combo_yellow" value="<?php echo $dt_entrega_esp ?>" /></td>
      </tr>
  <tr>
      <td>F_Rec_Site</td>
      <td><input type="text" name="dt_rec_site" id="dt_rec_site" class="combo_yellow" value="<?php echo $dt_rec_site ?>" /></td>
      </tr>
  <tr>
      <td>F_Reporte_Site</td>
      <td><input type="text" name="dt_reporte_site" id="dt_reporte_site" class="combo_yellow" value="<?php echo $dt_reporte_site ?>" /></td>              
    </tr>
</table>
</fieldset>
   </td>
     <tr>
        <tr>
        	<td>
<fieldset>
 	<legend><strong>Tx</strong></legend>
  <table width="300" border="0">
    <tr>
      <td>Eq_Cliente:
        <t/d></td>
      <td><?php echo ImprimeCombo(18,$id_eq_client);?>
        <t/d></td>
      </tr>
    <tr>
      <td>Instalado en:
        <t/d></td>
      <td><?php echo ImprimeCombo(19,$id_instalado);?>
        <t/d></td>
      </tr>
    </table>   
</fieldset>     </td>
              </tr>
          </table> 
</fieldset> 
  </td>
     </tr>
       <tr>
 <td height="183" colspan="4">
  <fieldset>
      <legend><strong>Colectora</strong></legend>
      <table width="663" border="0" >
        <tr>
          <td width="87" height="30">Colectora:</td>
          <td width="150"><input name="str_colectora" id="str_colectora" type="text" class="combo_green" value="<?php echo $str_colectora ?>" /></td>
          <td width="23">&nbsp;</td>
          <td width="385">&nbsp;</td>
        </tr>
        <tr>
          <td>Trab_Col</td>
          <td><?php echo ImprimeCombo(22,$id_trabajo_colectora);?></td>
          <td>&nbsp;</td>
          <td>
          <table width="284" border="0">
            <tr>
              <td width="63">TOP FO:</td>
              <td width="73">Anillo ROF:</td>
              <td width="61">Fot1:</td>
              <td width="59">Fot2:</td>
            </tr>
            <tr>
              <td><input name="str_top_fo" id="str_top_fo" type="text" class="combo_pink_ch" value="<?php echo $str_top_fo ?>" /></td>
              <td><input name="str_anillo_rof" id="str_anillo_rof" type="text" class="combo_1" value="<?php echo $str_anillo_rof ?>" /></td>
              <td><input name="int_fot1" id="int_fot1" type="text" class="combo_1" value="<?php echo $int_fot1 ?>" /></td>
              <td><input name="int_fot2" id="int_fot2" type="text" class="combo_1" value="<?php echo $int_fot2 ?>" /></td>
            </tr>
          </table>
          </td>
        </tr>
        <tr>
          <td height="30">F_trabCol_OK</td>
          <td><input name="dt_trabcol_ok" id="dt_trabcol_ok" type="text" class="combo_green" value="<?php echo $dt_trabcol_ok ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30" colspan="4" align="center">
          </td>
          </tr>
      </table></fieldset>
      <br>
   <table width="200" border="0" align="center">
      <tr>
        <td >PrTx_Status</td>
        <td><?php echo ImprimeCombo(21,$id_prtx_status);?></td>
        <td>F_Meta_Term</td>
        <td><input name="dt_meta_term_proy" id="dt_meta_term_proy" type="text" class="combo_azul" value="<?php echo $dt_meta_term_proy ?>"/></td>
      </tr>
    </table>
     </td>
        </tr>
    </table>
      </td>
	  </tr>
  <tr>
    <td>
    <table width="320" border="0" class="Texto_Mediano_Negro">
      <tr>
        <td>Fase:</td>
        <td><?php echo ImprimeCombo(20,$id_Fase_IOS);?></td>
      </tr>
      <tr>
        <td>Sub Fase:</td>
        <td><input type="text" name="sub_fase" id="sub_fase" class="combos_3" value="" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Tipo de Trabajo:</td>
        <td><?php echo ImprimeCombo(1,$id_proy_eqp);?></td>
      </tr>
      <tr>
        <td>Requiere Trabajo de FO:</td>
        <td><?php echo ImprimeCombo(9,$id_requiere_trbj);?></td>
      </tr>
      <tr>
        <td>Fecha_Req_FO:</td>
        <td><input type="text" name="dt_requiere_fo" id="dt_requiere_fo" class="combo_green" value="<?php echo $dt_requiere_fo ?>" /></td>
      </tr>
      <tr>
        <td>Responsable Supervisor:</td>
        <td><?php echo ImprimeCombo(10,$id_res_super);?></td>
      </tr>
      <tr>
        <td>IPE Proyecto:</td>
        <td><?php echo ImprimeCombo(11,$id_ipe_proyecto);?></td>
      </tr>
      <tr>
        <td>Pendiente por Clte_Proy:</td>
        <td><?php echo ImprimeCombo(12,$id_pendt_cliente);?></td>
      </tr>
      <tr>
  <td colspan="2"><fieldset>
    <legend><strong>Puerto Tx:</strong></legend>
    <table width="300" border="0">
      <tr>
        <td colspan="2">
        <table width="290" border="0">
        <tr>
          <td width="74">Req Pto Tx</td>
          <td width="50"><?php echo ImprimeCombo(13,$id_req_pto);?></td>
          <td width="57">Nivel Pto</td>
          <td width="81"><?php echo ImprimeCombo(14,$id_nivel_pto_tx);?></td>
        </tr>
      </table>
   </td>
        </tr>
      <tr>
        <td>F_Req Pto Tx</td>
        <td><input type="text" name="dt_req_pto_tx" id="dt_req_pto_tx" class="combo_green" value="<?php echo $dt_req_pto_tx ?>" /></td>
      </tr>
      <tr>
        <td>Estatus Pto Tx</td>
        <td><?php echo ImprimeCombo(15,$id_status_pto);?></td>
      </tr>
    </table>
        </fieldset></td>
      </tr>
    </table> </td>
    </tr>
  <tr>
    <td colspan="2">
      <table width="700" border="0">
        <tr>
          <td>
          <fieldset>
          <legend><strong>Intra SISA</strong></legend>
            <table width="300" border="0" class="Texto_Mediano_Negro">
              <tr>
                <td colspan="2">
		<table width="289" border="0">
            <tr>
              <td width="20"><input type="checkbox" name="carga_mat_ok" value="1" id="carga_mat_ok" /></td>
              <td width="150"><input type="text" name="dt_carga_mat_ok" id="dt_carga_mat_ok" class="combos_3" value="<?php echo $dt_carga_mat_ok ?>" /> </td>
              <td width="97">Carga Mat. OK</td>
            </tr>
          </table>
                  </td>
                </tr>
              <tr>
                <td colspan="2">
		<table width="289" border="0">
            <tr>
              <td width="20"><input type="checkbox" name="PEP" value="1" id="PEP" /></td>
              <td width="150"><input type="text" name="dt_asig_PEP" id="dt_asig_PEP" class="combos_3" value="<?php echo $dt_asig_PEP ?>" /> </td>
              <td width="97">Asig. PEP</td>
            </tr>
          </table>
                  </td>
                </tr>
              <tr>
                <td colspan="2">
		<table width="289" border="0">
            <tr>
              <td width="20"><input type="checkbox" name="P_45" value="1" id="P_45" /></td>
              <td width="150"><input type="text" name="dt_asig_p45" id="dt_asig_p45" class="combos_3" value="<?php echo $dt_asig_p45 ?>" /> </td>
              <td width="97">Asig. P-45</td>
            </tr>
          </table>
                  </td>
                </tr>
              </table></fieldset></td>
          <td>
          <fieldset>
          <legend><strong>Anexos</strong></legend>
            <table width="300" border="0" class="Texto_Mediano_Negro">
              <tr>
                <td colspan="2">
                <table width="269" border="0">
                <tr>
                  <td width="20"><input type="checkbox" name="ots_ok" value="1" id="ots_ok" /></td>
                  <td width="150"><input type="text" name="dt_ots_ok" id="dt_ots_ok" class="combos_3" value="<?php echo $dt_ots_ok ?>" /> </td>
                  <td width="85">OT OK</td>
                </tr>
              </table>
              </td>
                </tr>
              <tr>
                <td colspan="2">
                <table width="269" border="0">
                <tr>
                  <td width="20"><input type="checkbox" name="OT_OK" value="1" id="OT_OK" /></td>
                  <td width="150"><input type="text" name="dt_anexos" id="dt_anexos" class="combos_3" value="<?php echo $dt_anexos ?>" /> </td>
                  <td width="85">Anexos OK</td>
                </tr>
              </table>
                </tr>
              <tr>
                <td colspan="2">
                <table width="269" border="0">
                <tr>
                  <td width="20"><input type="checkbox" name="pagina_web" value="1" id="pagina_web" /></td>
                  <td width="150"><input type="text" name="dt_pagina_web" id="dt_pagina_web" class="combos_3" value="<?php echo $dt_pagina_web ?>" /> </td>
                  <td width="85">Pag. Web OK</td>
                </tr>
              </table>
                </tr>
              </table></fieldset></td>
          <td>
          <fieldset>
          <legend><strong>Gesti&oacute;n:</strong></legend>
            <table width="300" border="0" class="Texto_Mediano_Negro">
              <tr>
                <td colspan="2">
                <table width="269" border="0">
                <tr>
                  <td width="20"><input type="checkbox" name="OT_OK" value="1" id="OT_OK" /></td>
                  <td width="150"><input type="text" name="dt_sol_clli" id="dt_sol_clli" class="combos_3" value="<?php echo $dt_sol_clli ?>" /> </td>
                  <td width="85">Sol_CLLI</td>
                </tr>
              </table>
                </tr>
              <tr>
                <td colspan="2">
                <table width="269" border="0">
                <tr>
                  <td width="20"><input type="checkbox" name="OT_OK" value="1" id="OT_OK" /></td>
                  <td width="150"><input type="text" name="dt_clli_ok" id="dt_clli_ok" class="combos_3" value="<?php echo $dt_clli_ok ?>" /> </td>
                  <td width="85">CLLI Ok</td>
                </tr>
              </table>
                </tr>
              <tr>
                <td colspan="2">
                <table width="269" border="0">
                <tr>
                  <td width="20"><input type="checkbox" name="OT_OK" value="1" id="OT_OK" /></td>
                  <td width="150"><input type="text" name="dt_sol_gestion" id="dt_sol_gestion" class="combos_3" value="<?php echo $dt_sol_gestion ?>" /> </td>
                  <td width="85">Sol_Gestión</td>
                </tr>
              </table>
                </tr>
              <tr>
                <td colspan="2">
                <table width="269" border="0">
                <tr>
                  <td width="20"><input type="checkbox" name="OT_OK" value="1" id="OT_OK" /></td>
                  <td width="150"><input type="text" name="dt_gestion_ok" id="dt_gestion_ok" class="combos_3" value="<?php echo $dt_gestion_ok ?>" /> </td>
                  <td width="85">Gestión_OK</td>
                </tr>
              </table>
                </tr>
              <tr>
                <td colspan="2">
                <table width="269" border="0">
                <tr>
                  <td width="20"><input type="checkbox" name="OT_OK" value="1" id="OT_OK" /></td>
                  <td width="150"><input type="text" name="dt_carga_sise" id="dt_carga_sise" class="combos_3" value="<?php echo $dt_carga_sise ?>" /> </td>
                  <td width="85">Carga SISE</td>
                </tr>
              </table>
                </tr>
              </table></fieldset></td>
          </tr>
        </table>
      </td>
  </tr>
  <tr>
    <td>Observaciones de Proyecto:</td>
    <td>
     <table width="596" border="0">
  <tr>
    <td width="437"><p>
        <textarea name="Observaciones_Eq" id="Observaciones_Eq" cols="70" rows="5" tabindex="20" readonly="readonly"><?php echo htmlentities ($Observaciones_Eq,ENT_QUOTES); ?></textarea>
        </p></td>
    <td width="143"><input name="guarda_eqpo" type="button" id="guarda_eqpo" value="Guardar" /></td>
  </tr>
</table><div id="resultado_eqpo" style="font-weight:bold;"></div>
     </td>
  </tr>
</table>
  </div>
  
<!-- FIN DEL SEGUNDO TAB PROYECTO EQUIPAMIENTO -->    

    <div class="content">
<table width="1000" border="0">
  <tr>
    <td width="338">
		<fieldset><legend></legend>
    <table width="336" border="0" class="Texto_Mediano_Negro">
    <tr>
        <td width="130">Requierimiento:</td>
        <td width="190"><?php echo ImprimeCombo(24,$id_requerimiento);?></td>
    </tr>
    <tr>
        <td>Edo.Acometida</td>
        <td><?php echo ImprimeCombo(2,$id_edo_acometida);?></td>
    </tr>
    <tr>
        <td>Fecha programada</td>
        <td><input type="text" name="dt_PROGRAMADA" id="dt_PROGRAMADA" class="combos_3" value="<?php echo $dt_PROGRAMADA ?>" /></td>
    </tr>
    </table>
 </fieldset>
    </td>
<td width="610"><fieldset><legend></legend>
  <table width="613" border="0" class="Texto_Mediano_Negro"> 
  <tr>
      <td width="144">Supervisor FO</td>
      <td width="157"><?php echo ImprimeCombo(30,$id_supervisor_fo);?></td>
      <td width="104">F Tramo Afe</td>
      <td width="180"><input type="text" name="fecha_afect" id="fecha_afect" class="combos_3" value="<?php echo $fecha_afect ?>" /></td>
  </tr>
  <tr>
      <td>Resp SUCOPE</td>
      <td><?php echo ImprimeCombo(26,$id_resp_sucope);?></td>
      <td>Due Date</td>
      <td><input type="text" name="DUE_DATE" id="DUE_DATE" class="combos_3" value="<?php echo $DUE_DATE ?>" /></td>
  </tr>
   <tr>
      <td>Resp IPR</td>
      <td><?php echo ImprimeCombo(27,$id_resp_ipr);?></td>
      <td>F asignacion</td>
      <td><input type="text" name="asignacion" id="asignacion" class="combos_3"  /></td>
  </tr>
  <tr>
      <td colspan="2">&nbsp;</td>
      <td>Fec Solicitud FO</td>
      <td><input type="text" name="dt_solicitud_fo" id="dt_solicitud_fo" class="combos_3" value="<?php echo $dt_solicitud_fo ?>" /></td>
  </tr>
  </table>
    </fieldset>
    </td>
  </tr>
  <tr>
    <td><fieldset><legend><strong>Planificaci&oacute;n</strong></legend>
  <table width="336" border="0" class="Texto_Mediano_Negro">
   <tr>
        <td width="130">Planificador:</td>
        <td width="190"><input type="text" name="str_planificador" id="str_planificador" class="combos_3" value="<?php echo $str_planificador ?>" /></td>
   </tr>
   <tr>
        <td>F sol_planificaci&oacute;n:</td>
        <td><input type="text" name="dt_sol_planificacion" id="dt_sol_planificacion" class="combos_3" value="<?php echo $dt_sol_planificacion ?>" /></td>
   </tr>
   <tr>
        <td>F rec_planificaci&oacute;n:</td>
        <td><input type="text" name="dt_rec_planificacion" id="dt_rec_planificacion" class="combos_3" value="<?php echo $dt_rec_planificacion ?>" /></td>
   </tr>
   <tr>
        <td>F sol Permiso SSP:</td>
        <td><input type="text" name="dt_sol_permiso_ssp" id="dt_sol_permiso_ssp" class="combos_3" value="<?php echo $dt_sol_permiso_ssp ?>"  /></td>
   </tr>
   <tr>
        <td>F rec Permiso</td>
        <td><input type="text" name="dt_rec_permiso" id="dt_rec_permiso" class="combos_3" value="<?php echo $dt_rec_permiso ?>"  /></td>
   </tr>
   <tr>
        <td>F Entrega esp FO</td>
        <td><input type="text" name="dt_entrega_esp_fo" id="dt_entrega_esp_fo" class="combos_3" value="<?php echo $dt_entrega_esp_fo ?>" /></td>
   </tr>
   
   
      <tr>
        <td>F ok adecuaciones</td>
        <td><input type="text" name="dt_ok_adecuaciones" id="dt_ok_adecuaciones" class="combos_3" value="<?php echo $dt_ok_adecuaciones ?>" /></td>
   </tr>

   
   <tr>
        <td>Delegacion</td>
        <td><input type="text" name="delegacion" id="delegacion" class="combos_3" value="<?php echo $delegacion ?>" /></td>
        
   </tr>
   <tr>
         <td colspan="2">&nbsp;</td>
    </tr>
  </table>    
    </fieldset>
    </td>
    <td>
 <fieldset>
 <legend><strong>Proyectos</strong></legend>
  <table width="592" border="0" class="Texto_Mediano_Negro">
  <tr>
      <td width="144">OT FO</td>
      <td width="161"><input type="text" name="str_num_ot" id="str_num_ot" class="combos_3" value="<?php echo $str_num_ot ?>" /></td>
      <td width="100">PEP-09</td>
      <td width="159"><input type="text" name="PEP_09" id="PEP_09" class="combos_3" value="<?php echo $PEP_09 ?>" /></td>
  </tr>
  <tr>
      <td>F elab ot</td>
      <td><input type="text" name="dt_elab_ot" id="dt_elab_ot" class="combos_3" value="<?php echo $dt_elab_ot ?>" /></td>
      <td>Ped45-09</td>
      <td><input type="text" name="str_ped45" id="str_ped45" class="combos_3" value="<?php echo $str_ped45 ?>" /></td>
  </tr> 
  <tr>
      <td>F Entr ot</td>
      <td><input type="text" name="dt_Entr_ot" id="dt_Entr_ot" class="combos_3" value="<?php echo $dt_Entr_ot ?>" /></td>
      <td>Problematica</td>
      <td><?php echo ImprimeCombo(3,$id_problematica);?></td>
  </tr> 
  <tr>
      <td>Recibe OT</td>
      <td><input type="text" name="str_recibe_OT" id="str_recibe_OT" class="combos_3" value="<?php echo $str_recibe_OT ?>" /></td>
      <td>Constructor</td>
      <td><input type="text" name="str_Constructor" id="str_Constructor" class="combos_3" value="<?php echo $str_Constructor ?>" /></td>
  </tr> 
  <tr>
      <td>FO Proy ES</td>
      <td><input type="text" name="Proy" id="Proy" class="combos_3"  /></td>
      <td>FProyecto OK</td>
      <td><input type="text" name="dt_proyecto_Ok" id="dt_proyecto_Ok" class="combos_3" value="<?php echo $dt_proyecto_Ok ?>" /></td>
  </tr> 
  <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>FO Cancel</td>
      <td><input type="checkbox" name="FO_Cancel" value="1" id="FO_Cancel" /></td>
    </tr> 
  <tr>
        <td>&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
  </tr>     
  </table>
</fieldset>
    </td>
  </tr>
  <tr>
    <td>
    	<button id="start">Ingresar comentarios</button>
    
<div style="height:300px; overflow:auto; width:400px;">
	<fieldset>
        <div class="avances_referencia">
        </div>
        
        <h3>Comentarios Recientes</h3>
        <div id="statuses_2">
            <?php
            
            if (isset($_GET['referencia']))
            {
                $meses = array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diiembre");
                //get the latest 20
                $query  = "SELECT tb_Avances_Referencia_FO.txt_Avance_Referencia,DAY(tb_Avances_Referencia_FO.dt_Fecha_Registro) as dia,MONTH(tb_Avances_Referencia_FO.dt_Fecha_Registro) as mes, YEAR(tb_Avances_Referencia_FO.dt_Fecha_Registro) as anio, DATE_FORMAT(tb_Avances_Referencia_FO.dt_Fecha_Registro,' @ % %l:%i:%s %p') AS ds, CONCAT(cat_Usuarios.str_Nombre,' ',cat_Usuarios.str_Ap_Paterno,' ',cat_Usuarios.str_Ap_Materno) as Nombre_Usuario FROM tb_Avances_Referencia_FO LEFT JOIN cat_Usuarios ON tb_Avances_Referencia_FO.id_Usuario =  cat_Usuarios.id_Usuario WHERE tb_Avances_Referencia_FO.referencia = '".$_GET['referencia']."'  ORDER BY dt_Fecha_Registro DESC";
                //echo $query;
                $RS_avances= TraeRecordset($query);
                if (!$RS_avances) die('Error en DB2!');
                $cuantas_filas = $RS_avances->RecordCount();
                if ($cuantas_filas > 0)
                {
                    while(!$RS_avances->EOF)
                    {
                        echo '<div class="status-box">',stripslashes($RS_avances->fields(0)),'<br /><span class="time">'.ucwords(strtolower($RS_avances->fields(5))).' - '.$RS_avances->fields(1).' de '.$meses[$RS_avances->fields(2)].' de '.$RS_avances->fields(3).$RS_avances->fields(4).'</span></div>';
                        $RS_avances->MoveNext();
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
    
    
    
    
    </td>
    <td><fieldset style="width:450"><legend><strong>Construcci&oacute;n</strong></legend>
<table width="550" border="0" class="Texto_Mediano_Negro">    
  <tr>
<td colspan="4">
    <table width="600" border="0">
    <tr>
        <td width="74">FOt1</td>
        <td width="34" ><input type="text" name="FOt1" id="FOt1" class="combo_green_ch" value="<?php echo $FOt1 ?>" /></td>
        <td width="42">Fot2</td>
        <td width="40"><input type="text" name="FOt2" id="FOt2" class="combo_green_ch" value="<?php echo $FOt2 ?>" /></td>
        <td width="102">Clte FO</td>
        <td width="30"><input type="text" name="clte_fo1" id="clte_fo1" class="combo_green_ch" value="<?php echo $clte_fo1 ?>" /></td>
        <td width="45"><input type="text" name="clte_fo2" id="clte_fo2" class="combo_green_ch" value="<?php echo $clte_fo2 ?>" /></td>
        <td width="40">Tipo</td>
        <td width="155"><?php echo ImprimeCombo(34,$id_tipo);?></td>
	<tr>
</table>

   </td>
      </tr>
         <tr>
           <td colspan="4">
      <table width="600" border="0">
          <tr>
              <td width="55">FOt1</td>
              <td width="55" ><input type="text" name="FOT1_resp" id="FOT1_resp" class="combo_green_ch" value="<?php echo $FOT1_resp ?>" /></td>
              <td width="35">Fot2</td>
              <td width="55"><input type="text" name="FOT2_resp" id="FOT2_resp" class="combo_green_ch" value="<?php echo $FOT2_resp ?>" /></td>
              <td width="64">Clte FO</td>
              <td width="55"><input type="text" name="clte_fo1_resp" id="clte_fo1_resp" class="combo_green_ch" value="<?php echo $clte_fo1_resp ?>" /></td>
              <td width="86"><input type="text" name="clte_fo2_resp" id="clte_fo2_resp" class="combo_green_ch" value="<?php echo $clte_fo2_resp ?>" /></td>
              <td width="34"><input type="hidden" name="id_tipo_fo" class="combos_3" /></td>
              <td width="123"><input type="hidden" name="id_tipo_fo" class="combos_3" /></td>
          <tr>
      </table>           
           </td>
           </tr>
         <tr>
      <td>FO Const Estatus</td>
      <td><?php echo ImprimeCombo(31,$id_FO_Const_Estatus);?></td>
      <td>F ini real</td>
      <td><input type="text" name="dt_ini_real" id="dt_ini_real" class="combo_green" value="<?php echo $dt_ini_real ?>" /></td>
  </tr>
   <tr>
      <td>Problematica</td>
      <td><?php echo ImprimeCombo(32,$id_problem_cons);?></td>
      <td>F remate fo</td>
      <td><input type="text" name="dt_remate_fo" id="dt_remate_fo" class="combo_blue" value="<?php echo $dt_remate_fo ?>" /></td>
  </tr>
   <tr>
      <td>Anillo ROF</td>
      <td><input type="text" name="Anillo" id="Anillo" class="combo_green"  /></td>
      <td>Sup cons</td>
      <td><input type="text" name="str_sup_cons" id="str_sup_cons" class="combo_green" value="<?php echo $str_sup_cons ?>"  /></td>
  </tr>
   <tr>
      <td>SubAnillo Fi</td>
      <td><input type="text" name="SubAnillo_Fi" id="SubAnillo_Fi" class="combo_green" value="<?php echo $Problematica ?>" /></td>
      <td>F entrega FO</td>
      <td><input type="text" name="dt_entrega_fo" id="dt_entrega_fo" class="combo_pink" value="<?php echo $dt_entrega_fo ?>" /></td>
  </tr>
   <tr>
      <td>PES</td>
      <td><input type="text" name="PES" id="PES" class="combo_green" value="<?php echo $PES ?>" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
   <tr>
      <td>Atenuacion Trab</td>
      <td><input type="text" name="Atenuacion_Trab" id="Atenuacion_Trab" class="combo_green" value="<?php echo $Atenuacion_Trab ?>" /></td>
      <td>Atenuacion Resp</td>
      <td><input type="text" name="Atenuacion_Resp" id="Atenuacion_Resp" class="combo_green" value="<?php echo $Atenuacion_Resp ?>" /></td>
  </tr>
   <tr>
     <td>Longitud Trab</td>
     <td><input type="text" name="Longitud_Trab" id="Longitud_Trab" class="combo_green" value="<?php echo $Longitud_Trab ?>" /></td>
     <td>Longitud Resp</td>
     <td><input type="text" name="Longitud_Resp" id="Longitud_Resp" class="combo_green" value="<?php echo $Longitud_Resp ?>" /></td>
   </tr>
   <tr>
      <td colspan="2"><div id="resultado_proyecto_fo" style="font-weight:bold;"></div></td>
      <td colspan="2" align="center"><input name="guarda_proy_fo" type="button" id="guarda_proy_fo" value="Guardar" /></td>
      </tr>
</table>
    </fieldset>
    </td>
  </tr>
</table>
    </div>

<!-- FIN DEL TERCEDR TAB PROYECTO DE FIBRA OPTICA --> 

    <div class="content">

<table width="100" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td colspan="2">
    <table width="900" border="0" class="Texto_Mediano_Negro">
      <tr>
        <td>Requerimiento</td>
        <td><input type="text" name="id_requerimiento" id="id_requerimiento" class="combos_3" value="<?php echo $id_requerimiento ?>" /></td>
        <td>Resp. Sucope</td>
        <td><input type="text" name="id_resp_sucope" id="id_resp_sucope" class="combos_3" value="<?php echo $id_resp_sucope ?>" /></td>
        <td>Resp. IPR</td>
        <td><input type="text" name="id_resp_ipr" id="id_resp_ipr" class="combos_3" value="<?php echo $id_resp_ipr ?>" /></td>
      </tr>
      <tr>
        <td>Tipo Proyecto</td>
        <td><input type="text" name="str_tipo_proy" id="str_tipo_proy" class="combos_3" value="<?php echo $str_tipo_proy ?>" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>F_Meta_Term FO</td>
        <td><input type="text" name="dt_meta_term_const" id="dt_meta_term_const" class="combo_blue" value="<?php echo $dt_meta_term_const ?>" /></td>
      </tr>
      <tr>
        <td>Estado de FO&middot;</td>
        <td><input type="text" name="id_edo_fo" id="id_edo_fo" class="combos_3" value="<?php echo $id_edo_fo ?>" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    </td>
    </tr>
  <tr>
    <td>
    	<fieldset><legend><strong>Planificaci&oacute;n</strong></legend>
    <table width="300" border="0" class="Texto_Mediano_Negro">
      <tr>
        <td>Motivo Rechazo</td>
        <td><?php echo ImprimeCombo(28,$id_atraso);?></td>
      </tr>
      <tr>
        <td>Planificador</td>
        <td><input type="text" name="str_planificador" id="str_planificador" class="combos_3" value="<?php echo $str_planificador ?>" /></td>
      </tr>
      <tr>
        <td>Fecha Sol. Planificaci&oacute;n</td>
        <td><input type="text" name="dt_sol_planificacion" id="dt_sol_planificacion" class="combos_3" value="<?php echo $dt_sol_planificacion ?>" /></td>
      </tr>
      <tr>
        <td>Fecha Rechazo</td>
        <td><input type="text" name="dt_rch" id="dt_rch" class="combos_3" value="<?php echo $dt_rch ?>" /></td>
      </tr>
      <tr>
        <td>Fecha Idef. Trayectoria</td>
        <td><input type="text" name="dt_def_trayectoria" id="dt_def_trayectoria" class="combos_3" value="<?php echo $dt_def_trayectoria ?>" /></td>
      </tr>
      <tr>
        <td>Fecha Ok Acometida</td>
        <td><input type="text" name="dt_ok_acometida" id="dt_ok_acometida" class="combos_3" value="<?php echo $dt_ok_acometida ?>" /></td>
      </tr>
      <tr>
        <td colspan="2">
        Comentarios
        <textarea name="Comentarios" id="Comentarios" cols="25" rows="5" tabindex="20"><?php echo $Comentarios ?></textarea>
        </td>
        </tr>
    </table>
		</fieldset>    
    </td>
    <td>
    	<fieldset><legend><strong>Proyectos y Construcci&oacute;n</strong></legend>
    <table width="600" border="0" class="Texto_Mediano_Negro">
      <tr>
        <td>OT FO</td>
        <td><input type="text" name="str_ot_fo" id="str_ot_fo" class="combos_3" value="<?php echo $str_ot_fo ?>" /></td>
        <td>Pep</td>
        <td><input type="text" name="str_pep" id="str_pep" class="combos_3" value="<?php echo $str_pep ?>" /></td>
      </tr>
      <tr>
        <td>Fecha Elab. OT</td>
        <td><input type="text" name="dt_elab_ot" id="dt_elab_ot" class="combos_3" value="<?php echo $dt_elab_ot ?>" /></td>
        <td>Ped45</td>
        <td><input type="text" name="str_ped45" id="str_ped45" class="combos_3" value="<?php echo $str_ped45 ?>" /></td>
      </tr>
      <tr>
        <td>Fecha Entr. OT</td>
        <td><input type="text" name="dt_Entr_ot" id="dt_Entr_ot" class="combos_3" value="<?php echo $dt_Entr_ot ?>" /></td>
        <td>Fecha Ini. Real</td>
        <td><input type="text" name="dt_ini_real" id="dt_ini_real" class="combos_3" value="<?php echo $dt_ini_real ?>" /></td>
      </tr>
      <tr>
        <td>Recibe OT</td>
        <td><input type="text" name="str_recibe_OT" id="str_recibe_OT" class="combos_3" value="<?php echo $str_recibe_OT ?>" /></td>
        <td>Fecha Term. Real</td>
        <td><input type="text" name="dt_term_real" id="dt_term_real" class="combos_3" value="<?php echo $dt_term_real ?>" /></td>
      </tr>
      <tr>
        <td>Fecha Prog.</td>
        <td><input type="text" name="dt_PROGRAMADA" id="dt_PROGRAMADA" class="combos_3" value="<?php echo $dt_PROGRAMADA ?>" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Constructor</td>
        <td><input type="text" name="str_Constructor" id="str_Constructor" class="combos_3" value="<?php echo $str_Constructor ?>" /></td>
        <td>Sup. Cons.</td>
        <td><?php echo ImprimeCombo(10,$id_res_super);?></td>
      </tr>
      <tr>
        <td>Problem&aacute;tica</td>
        <td><input type="text" name="str_problematica" id="str_problematica" class="combos_3" value="<?php echo $str_problematica ?>" /></td>
        <td>Ctrl FO</td>
        <td><input type="text" name="ctrl_fo" id="ctrl_fo" class="combos_3" value="<?php echo $ctrl_fo ?>" /></td>
      </tr>
      <tr>
        <td>Anillo ROF</td>
        <td><input type="text" name="str_anillo_rof" id="str_anillo_rof" class="combos_3" value="<?php echo $str_anillo_rof ?>" /></td>
        <td>Clte FO</td>
        <td><input type="text" name="clte_fo" id="clte_fo" class="combos_3" value="<?php echo $clte_fo ?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Tipo:</td>
        <td><input type="text" name="str_tipo" id="str_tipo" class="combo_green" value="<?php echo $str_tipo ?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    	</fieldset>
    </td>
  </tr>
  <tr>
    <td><!--<div id="resultado_fo" style="font-weight:bold;"></div></td>-->
    <td align="right"><!--<input name="guarda_eqpo_fo" type="button" id="guarda_eqpo_fo" value="Guardar_3" />--></td>
  </tr>
</table>
    </div>
    
<!-- FIN DEL CUARTO TAB CONSULTA PROY DE FIBRA OPTICA --> 
    
        <div class="content">
             <form action="" method="post" name="form_construccion" id="form_construccion">
  <input name="id_tramos" type="hidden" id="id_tramos" value="<?php echo $id_tramos; ?>" />         
  <input name="referencia" type="hidden" id="referencia" value="<?php echo $referencia; ?>" /> 
    <table width="950" height="441" border="0"><!--inicio tabla principal-->
    <tr><!--inicio primera fila de tabla principal-->
    	<td colspan="10"><!--inicio primer td con  10 columnas-->
        &nbsp;
        <table width="939" border="0" class="Texto_Mediano_Negro">
          <tr>
            <td colspan="10"><table width="858" border="0" class="Texto_Mediano_Negro">
              <tr>
                <td width="58" align="center">Central</td>
                <td width="164" align="center">Nombre Cetral</td>
                <td width="150" align="center">Centro de manto.</td>
                <td width="161" align="center">Jefe de manto</td>
                <td width="153" align="center">Tel&egrave;fono</td>
                <td width="215" align="center">Subd/GOA</td>
              </tr>
              <tr>
                <td><input type="text" name="SIGLAS_ios" id="SIGLAS_ios" class="combo_pink_ch" value="<?php echo $SIGLAS_ios ?>" /></td>
                <td><input type="text" name="central" id="central" class="combos_3" value="<?php echo $central ?>" /></td>
                <td><input type="text" name="centro_manto" id="centro_manto" class="combo_pink"  /></td>
                <td><input type="text" name="jefe_manto" id="jefe_manto" class="combo_pink"  /></td>
                <td><input type="text" name="telefono_jefe" id="telefono_jefe" class="combo_pink"  /></td>
                <td><input type="text" name="division2" id="division2" class="combos_3" value="<?php echo $division ?>" /></td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td align="right">Jefe Goa</td>
                <td><input type="text" name="jefe_goa" id="jefe_goa" class="combos_3"  /></td>
                <td align="right">Tel&egrave;fono</td>
                <td><input type="text" name="tel_goa" id="tel_goa" class="combos_3"  /></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td width="90">Const Status</td>
            <td width="111">
			<?php echo ImprimeCombo(33,$id_cons_estatus);?></td>
            <td width="153">F meta Term Const</td>
            <td width="120"><input type="text" name="fec_real_term" id="fec_real_term" class="combo_blue" value="<?php echo $fec_real_term ?>" /></td>
            <td width="196">Pendiente por Clte Const</td>
            <td width="243"><input type="text" name="str_pend_clte_const" id="str_pend_clte_const" class="combos_3" value="<?php echo $str_pend_clte_const ?>" /></td>
          </tr>
       </table></td><!--fin td 10 columnas-->
    </tr><!--termina fila 1 -->
    <tr><!--inicia segunda fila-->
   <!--inicia td 2.1--> <td colspan="6"><table width="550" border="0" class="Texto_Mediano_Negro">
     <tr>
       <td>Instalaci&oacute;n Colectora:</td>
       <td>&nbsp;</td>
       <td>Instalacion Eq. Acceso</td>
     </tr>
     <tr>
       <td><input type="text" name="dt_ins_col" id="dt_ins_col" class="combos_3" value="<?php echo $dt_ins_col ?>" /></td>
       <td>&nbsp;</td>
       <td><input type="text" name="dt_inst_equipo_acceso" id="dt_inst_equipo_acceso" class="combos_3" value="<?php echo $dt_inst_equipo_acceso ?>" /></td>
     </tr>
     <tr>
       <td width="159">Entrega y Gestion Col.</td>
       <td width="164">&nbsp;</td>
       <td width="287">Enrega Eq. Acceso</td>
     </tr>
     <tr>
       <td><input type="text" name="dt_entrega_gestion_col" id="dt_entrega_gestion_col" class="combos_3" value="<?php echo $dt_entrega_gestion_col ?>" /></td>
       <td>&nbsp;</td>
       <td><input type="text" name="dt_entrega_equipo_acceso" id="dt_entrega_equipo_acceso" class="combos_3" value="<?php echo $dt_entrega_equipo_acceso ?>" /></td>
     </tr>
     <tr>
       <td>Integraci&oacute;n Colectora</td>
       <td>&nbsp;</td>
       <td>Gesti&oacute;n Eq. Acceso</td>
     </tr>
     <tr>
       <td><input type="text" name="dt_integracion_colectora" id="dt_integracion_colectora" class="combos_3" value="<?php echo $dt_integracion_colectora ?>" /></td>
       <td>&nbsp;</td>
       <td><input type="text" name="dt_gestion_equipo_acceso" id="dt_gestion_equipo_acceso" class="combos_3" value="<?php echo $dt_gestion_equipo_acceso ?>" /></td>
     </tr>
     <tr>
       <td>Enlace Adva-Colectora</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td><input type="text" name="dt_enlace_adva_colectora" id="dt_enlace_adva_colectora" class="combos_3" value="<?php echo $dt_enlace_adva_colectora ?>" /></td>
       <td colspan="2"></td>
     </tr>
   </table></td><!--termina 2.1-->
    <!--inicia td 2.2--><td colspan="4"><fieldset>
      <legend><strong>Rechazo por Proyecto</strong></legend>
      <table width="280" border="0" class="Texto_Mediano_Negro">
        <tr>
          <td width="81">Cont Rech</td>
          <td width="194"><input type="text" name="const_rech" id="const_rech" class="combo_pink_ch" value="<?php echo $const_rech ?>" /></td>
        </tr>
        <tr>
          <td>Fecha Rech</td>
          <td><input type="text" name="dt_rechazado" id="dt_rechazado" class="combos_3" value="<?php echo $dt_rechazado ?>" /></td>
        </tr>
        <tr>
          <td>Motivo</td>
          <td><?php echo ImprimeCombo(29,$idcat_motvo_rch_fo);?></td>
        </tr>
      </table>
    </fieldset>
      <table width="315" border ="0" class="Texto_Mediano_Negro">
        <tr>
          <td width="75">Folio Gestion NX</td>
          <td width="127"><input type="text" name="folio_gestion_nx" id="folio_gestion_nx" class="combos_3" value="<?php echo $folio_gestion_nx ?>" /></td>
        </tr>
        <tr>
          <td>Folio Gestion CNS-1</td>
          <td><input type="text" name="folio_gestion_cns" id="folio_gestion_cns" class="combos_3" value="<?php echo $folio_gestion_cns ?>" /></td>
        </tr>
        <tr>
          <td height="30" colspan="2"><div id="resultado_cons" style="font-weight:bold;"></div></td>
          <!--    <td><div id="resultado_cons" style="font-weight:bold;"></div></td>
    <td><input name="guarda_construccion" type="button" id="guarda_construccion" value="Guardar_4" /></td>-->
        </tr>
        </table >
      </td><!--termina 2.2-->
    </tr><!--termina segunda fila-->
    <tr><!--inicia tercer fila-->
		<td width="450" height="103" colspan="10"><!--inicia 3.1--->
        &nbsp;
        <table width="987" border="0" class="Texto_Mediano_Negro">
          <tr>
            <td width="170"><input type="text" name="dt_instalacion" id="dt_instalacion" class="combos_3" value="<?php echo $dt_instalacion ?>" /></td>
            <td width="170">Instalaci&oacute;n</td>
            <td width="199"><input type="text" name="dt_entraga_eq_acceso" id="dt_entraga_eq_acceso" class="combos_3" value="<?php echo $dt_entraga_eq_acceso ?>" /></td>
            <td width="430">Entrega Eq. Acceso</td>
          </tr>
          <tr>
            <td><input type="text" name="dt_alimen_entrega" id="dt_alimen_entrega" class="combos_3" value="<?php echo $dt_alimen_entrega ?>" /></td>
            <td>Alimentaci&oacute;n Entrega</td>
            <td><input type="text" name="dt_gestion_eq_acceso" id="dt_gestion_eq_acceso" class="combos_3" value="<?php echo $dt_gestion_eq_acceso ?>" /></td>
            <td>Gestion Eq. Acceso(FRIDA/Gesti&oacute;n NX)</td>
          </tr>
          <tr>
            <td height="24"><input type="text" name="dt_inst_eq_acceso" id="dt_inst_eq_acceso" class="combos_3" value="<?php echo $dt_inst_eq_acceso ?>" /></td>
            <td>Instalaci&oacute;n Eq. Acceso</td>
            <td>&nbsp;</td>
            <td align="center"><input name="guarda_construccion" type="button" id="guarda_construccion" value="Guardar" /></td>
          </tr>
        </table></td><!--termina3.1-->
    </tr><!--termina tercer fila-->
    </table><!--Fin tabla principal-->
      </form>
    
    <table width="950" border="1">
    <tr><td height="358" colspan="10" align="center">
<button id="abrir">Ingresar comentarios Construccion</button>
    <div style="height:300px; overflow:auto; width:950px;">
	<fieldset>
        <div class="avances_referencia">
        </div>
        <h3>Comentarios Recientes</h3>
        <div id="statuses">
            <?php
            
          if (isset($_GET['referencia']))
            {
                $meses = array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diiembre");
                //get the latest 20
                $query  = "SELECT tb_avances_referencia_const.txt_Avance_Referencia,DAY(tb_avances_referencia_const.dt_Fecha_Registro) as dia,MONTH(tb_avances_referencia_const.dt_Fecha_Registro) as mes, YEAR(tb_avances_referencia_const.dt_Fecha_Registro) as anio, DATE_FORMAT(tb_avances_referencia_const.dt_Fecha_Registro,' @ % %l:%i:%s %p') AS ds, CONCAT(cat_Usuarios.str_Nombre,' ',cat_Usuarios.str_Ap_Paterno,' ',cat_Usuarios.str_Ap_Materno) as Nombre_Usuario FROM tb_avances_referencia_const LEFT JOIN cat_Usuarios ON tb_avances_referencia_const.id_Usuario =  cat_Usuarios.id_Usuario WHERE tb_avances_referencia_const.referencia = '".$_GET['referencia']."'  ORDER BY dt_Fecha_Registro DESC";
                //echo $query;
                $RS_avances= TraeRecordset($query);
                if (!$RS_avances) die('Error en DB2!');
                $cuantas_filas = $RS_avances->RecordCount();
                if ($cuantas_filas > 0)
                {
                    while(!$RS_avances->EOF)
                    {
                        echo '<div class="status-box">',stripslashes($RS_avances->fields(0)),'<br /><span class="time">'.ucwords(strtolower($RS_avances->fields(5))).' - '.$RS_avances->fields(1).' de '.$meses[$RS_avances->fields(2)].' de '.$RS_avances->fields(3).$RS_avances->fields(4).'</span></div>';
                        $RS_avances->MoveNext();
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
</td></tr></table>
    </div>
<!-- FIN DEL QUINTO TAB CONSTRUCCION -->
<!-- GENEREACION DE OT------------------------------- -->
<div class="content"><div>
           <form action="" method="get" name="form_ot" id="form_ot">
       
		<table width="950" border="0" class="Texto_Mediano_Negro">
          <tr>
            <td colspan="6">
            <table width="100%" border="0">
                 <tr>
                   <td>Codigo:</td>
                   <td><input name="codigo" id="codigo" type="text" value = "<?php echo $codigo ?>"  /></td>
                   <td>Prioridad:</td>
                   <td ><?php echo imprimecombo(8,$id_prioridad);?></td>
                  <!-- <td ><?php echo imprimecombo(8,$id_prioridad);?></td>-->
                   <td><input type="hidden" name="id_tramos" id="id_tramos" class="combos_3" value="<?php echo $id_tramos ?>" /></td>
                   <td>&nbsp;</td>
                 </tr>
                 <tr>
                   <td>Nodo de acceso:</td>
                   <td><input name="n_accesso" id="n_accesso" type="text" value="<?php echo $n_accesso ?>" /></td>
                   <td>Anillo:</td>
                   <td ><input name="anillo" id="anillo" type="text"  value="<?php echo $anillo ?>" /></td>
                   <td>Fibras Asignadas:</td>
                   <td><input type="text" name="f_asignadas" id="f_asignadas" value="<?php echo $f_asignadas ?>" /></td>
                 </tr>
                 <tr>
                   <td>CLL:</td>
                   <td><input type="text" name="cll" id="cll" value="<?php echo $CLL ?>"  /></td>
                   <td>Posicion del DBFO:</td>
                   <td><input type="text" name="posicion_dbfo" id="posicion_dbfo" value="<?php echo $posicion_dbfo ?>" />
                   </td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                 </tr>
                 <tr>
                   <td width="149">Referencia SISA:</td>
                   <td width="181"><input type="text" name="referencia" id="referencia" value="<?php echo $referencia; ?>"/></td>
                   <td width="169">Fecha Inicio:</td>
                   <td width="225"><input type="text" name="F_ini" id="F_ini"  value="<?php echo $F_ini ?>" /></td>
                   <td width="226">Elemento PEP De F.O:</td>
                   <td width="528"><input type="text" name="element" id="element"  value="<?php echo $element ?>"/></td>
                 </tr>
                 <tr>
                   <td>Fecha Ingreso SISA:</td>
                   <td><input type="text" name="f_REF" id="f_REF" value="<?php echo $f_REF ?>" /></td>
                   <td>Fecha Termino:</td>
                   <td><input type="text" name="F_term" id="F_term" value="<?php echo $F_term ?>" /></td>
                   <td>Elemento PEP Canalizacion:</td>
                   <td><input type="text" name="elemnt_pep" id="elemnt_pep" value="<?php echo $elemnt_pep ?>"/></td>
                 </tr>
            </table>
            </td>
          </tr>
          <tr>
        	 <td align="center">Trabajos a realizar:</td>
             <td colspan="5"><textarea name="trabajos_realizar" id="trabajos_realizar" cols="60" rows="5" ><?php echo $trabajos_realizar?></textarea></td>
          </tr>
          <tr>
             <td align="center">Nota:             </td>
             <td colspan="5">
           <textarea name="nota" id="nota" cols="60" rows="5" ><?php echo $nota ?></textarea></td>
          </tr>
          <tr>
             <td rowspan="2" align="center">Observaciones:</td>
             <td colspan="3" rowspan="2">
            <textarea name="observaciones" id="observaciones" cols="60" rows="5" ><?php echo $observaciones ?></textarea></td>
             <td colspan="2" align="center">Tipo de Servicio:</td>
          </tr>
          <tr>
             <td colspan="2" align="center"><input name="str_tipo_servicio" id ="str_tipo_servicio" type="text" value="<?php echo $str_tipo_servicio ?>" SIZE="30" /></td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <tr>
          <tr>
            <td colspan="6">
<!--INICIO DE TABLA CON OPCIONES---------------------------------------------------->
            <!--<div align="center">-->
   <!-- <div id="container">
      <div id="body_space">
        <div id="header">-->
		  <div id="logo-block">
		    <!-- type your logo and small slogan here -->
  
		    <!-- <p id="slogan">a small website slogan goes here</p>
			end logo and small slogan -->
		  </div>
		<!--  <div id="definels">-->
		    <!-- login -->
		  <br>
			<!-- end login -->
			<!-- search -->
			<!--<div id="search">-->
			  <!--<form name="search" method="get" action="">
			  </form>-->
          <!--  </div>
		    <!-- end search -->
		 <!-- </div>-->
		  <div class="cls"></div>
  		  <div id="top-nav-bg">
            <div id="top-nav">
			  <!-- start top navigation bar --><!-- end top navigation bar -->
            </div>
	      </div>          
	  <!--  </div>
	  </div>
	</div>-->
<!--  <div id="page">
	  <div id="page-padding">
        <!-- start content -->
	   <!-- <div id="content">
	   <!--   <div id="content-padding">-->
<table width="350" border="0" align="center">
  <tr align="center">
    <td colspan="2"><b>Agregar filas</b></td>
  </tr>
  <tr align="center">
      <td colspan="2" height="5"><spacer></spacer></td>
  </tr>
  <tr align="center">
    <td>N&uacute;mero Filas: <input name="numero_filas" type="text" id="numero_filas" size="2" maxlength="2" value="1" /></td>
    <td align="left"><input name="agregar" type="button" id="agregar" value="Agregar" /></td>
  </tr>
  <tr align="center">
    <td colspan="2" height="5"><spacer></spacer></td>
  </tr>
  <tr align="center">
    <td colspan="2" id="mensaje"></td>
  </tr>
</table>
<br />
<table width="900" border="0">
  <tr align="center">
    <td width="880" valign="top">
      <!--<form action="" method="get" name="registro_responsables" id="registro_responsables">-->
        <p align="center"><center>
        <b>2. UNIDADES DE CONSTRUCCION REQUERIDAS PARA ESTE PROYECTO</b>
        </center></p>
        <table width="700" border="1" cellspacing="1" id="tabla_responsables" bgcolor="#999999">
          <tr align="center" bgcolor="#0066CC" class="Texto_Mediano_Blanco">
            <td><b>#</b></td>
            <td><b>Cantidad</b></td>
            <td><b>Descripcion</b></td>
            <td><b>Opciones</b><input name="ultima_fila" type="hidden" id="ultima_fila" value="0" /><input name="filas_tabla" type="hidden" id="filas_tabla" value="0" /></td>
            </tr>
          </table>
        <!--</form>-->
    </td>
  </tr>
</table>
</form>
		  </div>
		<!--</div>
		<!-- end content -->
	  <!--</div>-->
	<!--  <div id="footer">
	    <div id="footer-pad">
	      <div class="line"></div>-->
		  <!-- footer and copyright notice -->
	     
		  <!-- end footer and copyright notice -->
<!--	    </div>
	  </div>
	</div>-->
<!--FIN DE  TABLA CON OPCIONES---------------------------------------------------->         
            <td>          
          </tr>
  <tr>
   		  <td colspan="7" align="center">
 <br>
                     
                   
  <table width="767" border="0" align="center" >

<tr>
	<td width="137" align="right">

	</td>
    <td width="165"><input type="button" name="save_ot" id="save_ot"  value="Imprimir y Guardar" />
    </td>
    <td width="87">&nbsp;</td>
    <td width="360"><div id="resultado_ot" style="font-weight:bold;"></div></td>
</tr>

</table>
  </td>
  </tr>
  </div>
<!-- FIN GENEREACION DE OT------------------------------- -->
<!--fin tabs-->
</div>    
</body>
</html>
