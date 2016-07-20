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
<!--<div id="demo">
    <ul class="tabs">
        <li class="tab">Status de Proyecto </li>
    </ul>-->
<!-- INICIA PRIMER TAB SISA -->    
    
    <div class="content">
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
		<!--<input type="button" name="guarda_sisa" id="guarda_sisa"  value="Guardar" />    -->
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
    <td><input type="text" name="dt_liquidada" id="dt_liquidada" class="combo_blue" value="<?php echo$dt_liquidada ?>" readonly="readonly" /></td>
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
<!-- FIN GENEREACION DE OT------------------------------- -->
<!--fin tabs-->
</div>    
</body>
</html>
