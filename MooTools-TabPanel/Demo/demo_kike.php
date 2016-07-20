<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');
include('../../CSS3Accordion/libreria_equipo_fo.php.');
//require("../includes/funciones.php");
//$CheckSession = CheckSession();

$referencia = $_GET['referencia'];
$id_tramos = $_GET['id_tramos'];


if (isset($_GET['referencia']));
{
	$SQL = "SELECT id_tramos, referencia, ref_tramo, edo_tramo, coordinacion_abrev, fecha_afect, edo_serv, tipo_proy, DUE_DATE, tra_obser, 
tra_punta, SIGLAS_ios, area, central, division, usuario, usuario_puntas, direccion FROM vw_tramos_fo WHERE referencia = '".$referencia."' and id_tramos = '".$id_tramos."'";
//echo $SQL."<br />";
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB1!');
	
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

////////////////////////////////////////////////////////
////////////////////////////////////////////////////////	
	$SQL_2 = "SELECT id_tramos, id_analisa_ing_eq, dt_ok_ing_eq, id_proy_sisa, dt_fecha_prog, documento_pagina_web, id_proy_rda, id_vencido, id_cancelado FROM tb_equip_fo WHERE referencia = '".$referencia."' and id_tramos = '".$id_tramos."'";
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

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
    <title>kike</title>
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
    <script type="text/javascript">
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
				var campo = "OT's OK";
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
			var OT_OK = new Picker.Date($$('#dt_anexos'), {
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
			var OT_OK = new Picker.Date($$('#dt_pagina_web'), {
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
			var Sol_Gestión = new Picker.Date($$('#dt_sol_gestion'), {
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
			var Gestión_OK = new Picker.Date($$('#dt_gestion_ok'), {
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
			
	<?php if ($id_vencido == 1){ ?>
		$('Vencido').checked = true;
	<?php } ?>
	<?php if ($id_cancelado == 1){ ?>
		$('Cancelado').checked = true;
	<?php } ?>
	<?php if ($id_analisa_ing_eq == 1){ ?>
		$('id_analisa_ing_eq').checked = true;
	<?php } ?>
});
			
        });
    //});
	
		window.addEvent('domready', function()
		{
			$('guarda_sisa').addEvent('click',guarda_sisa);
			$('guarda_eqpo').addEvent('click',guarda_proy_eqp);
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
	var	id_filial_prov = $('id_filial_prov').value;
	var	str_colectora = $('str_colectora').value;
	var	id_trabajo_colectora = $('trabajo_colectora').value;
	var	dt_trabcol_ok = $('dt_trabcol_ok').value;
	var	dt_entrega_esp = $('dt_entrega_esp').value;
	var	dt_rec_site = $('dt_rec_site').value;
	var	dt_reporte_site = $('dt_reporte_site').value;
	var	id_eq_client = $('equipo_cliente').value;
	var	id_instalado = $('instalado').value;
	var	str_top_fo = $('str_top_fo').value;
	var	int_anillo_rof = $('int_anillo_rof').value;
	var	int_fot1 = $('int_fot1').value;
	var	int_fot2 = $('int_fot2').value;
	var	id_prtx_status = $('prtx_status').value;
	var	dt_meta_term_proy = $('dt_meta_term_proy').value;
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
	+"&int_anillo_rof="+int_anillo_rof
	+"&int_fot1="+int_fot1
	+"&int_fot2="+int_fot2
	+"&id_prtx_status="+id_prtx_status
	+"&dt_meta_term_proy="+dt_meta_term_proy
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
        <li class="tab">Construcci&oacute;n </li>
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
    <td>Direcci&oacute;n:</td>
    <td><textarea name="direccion" id="direccion" cols="20" rows="3"><?php echo htmlentities ($direccion,ENT_QUOTES); ?></textarea></td>
    <td>Due Date:</td>
    <td><input type="text" name="DUE_DATE" id="DUE_DATE" class="combos_3" value="<?php echo $DUE_DATE ?>" /></td>
    <td>Tramo:</td>
    <td colspan="3"><input type="text" name="ref_tramo" id="ref_tramo" class="combos_4" value="<?php echo $ref_tramo ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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
      <td width="209"><input type="text" name="referencia7" id="referencia7" class="combo_yellow" value="" /></td>
    </tr>
 <tr>
    <td>Fecha Rec Site:</td>
    <td><input type="text" name="referencia" id="referencia" class="combo_yellow" value="" /></td>
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
    <td width="273"><input type="text" name="referencia9" id="referencia9" class="combo_yellow" value="" /></td>
    </tr>
  <tr>
    <td>F Proy Concl:</td>
    <td><input type="text" name="referencia" id="referencia" class="combo_yellow" value="" /></td>
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
    <td width="60"><input type="text" name="referencia10" id="referencia10" class="combo_yellow" value="" /></td>
    </tr>
  <tr>
    <td>F Term Real FO:</td>
    <td><input type="text" name="referencia" id="referencia" class="combo_yellow" value="" /></td>
    </tr>
  <tr>
    <td>Problem&aacute;tica:</td>
    <td><input type="text" name="referencia11" id="referencia11" class="combo_yellow" value="" /></td>
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
    <td width="60"><input type="text" name="referencia10" id="referencia10" class="combo_yellow" value="" /></td>
    </tr>
  <tr>
    <td>Fecha Liq:</td>
    <td><input type="text" name="referencia" id="referencia" class="combo_blue" value="" /></td>
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
        <td><input type="text" name="id_filial_prov" id="id_filial_prov" class="combo_green" value="<?php echo $id_filial_prov ?>" /></td>
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
              <td><input name="int_anillo_rof" id="int_anillo_rof" type="text" class="combo_1" value="<?php echo $int_anillo_rof ?>" /></td>
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
                  <td width="85">OT's OK</td>
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
        <textarea name="Observaciones_Eq" id="Observaciones_Eq" cols="70" rows="5" tabindex="20"></textarea>
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
        <td width="190"><input type="text" name="Requierimiento" id="Requierimiento" class="combos_3"  /></td>
    </tr>
    <tr>
        <td>Edo.Acometida</td>
        <td><?php echo ImprimeCombo(2,$id_edo_acometida);?></td>
    </tr>
    <tr>
        <td>Clave Sucursal</td>
        <td><input type="text" name="Sucursal" id="Sucursal" class="combos_3"  /></td>
    </tr>
    <tr>
        <td>Fecha programada</td>
        <td><input type="text" name="programada" id="programada" class="combos_3"  /></td>
    </tr>
    </table>
 </fieldset>
    </td>
<td width="610"><fieldset><legend></legend>
  <table width="613" border="0" class="Texto_Mediano_Negro"> 
  <tr>
      <td width="144">Supervisor FO</td>
      <td width="157"><input type="text" name="Supervisor" id="Supervisor" class="combos_3"  /></td>
      <td width="104">F Tramo Afe</td>
      <td width="180"><input type="text" name="Supervisor" id="Tramo" class="combos_3"  /></td>
  </tr>
  <tr>
      <td>Resp SUCOPE</td>
      <td><input type="text" name="Resp_SUCOPE" id="Resp_SUCOPE" class="combos_3"  /></td>
      <td>Due Date</td>
      <td><input type="text" name="Date" id="Date" class="combos_3"  /></td>
  </tr>
   <tr>
      <td>Resp IPR</td>
      <td><input type="text" name="Resp" id="Resp" class="combos_3"  /></td>
      <td>F asignacion</td>
      <td><input type="text" name="asignacion" id="asignacion" class="combos_3"  /></td>
  </tr>
  <tr>
      <td colspan="2">&nbsp;</td>
      <td>Fec Solicitud FO</td>
      <td><input type="text" name="Solicitud" id="Solicitud" class="combos_3"  /></td>
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
        <td width="190"><input type="text" name="Planificador" id="Planificador" class="combos_3"  /></td>
   </tr>
   <tr>
        <td>F sol_planificaci&oacute;n:</td>
        <td><input type="text" name="planificacion_sol" id="planificacion_sol" class="combos_3"  /></td>
   </tr>
   <tr>
        <td>F rec_planificaci&oacute;n:</td>
        <td><input type="text" name="planificacion_rec" id="planificacion_rec" class="combos_3"  /></td>
   </tr>
   <tr>
        <td>F sol Permiso SSP;</td>
        <td><input type="text" name="Permiso_sol" id="Permiso_sol" class="combos_3"  /></td>
   </tr>
   <tr>
        <td>F rec Permiso</td>
        <td><input type="text" name="Permiso_rec" id="Permiso_rec" class="combos_3"  /></td>
   </tr>
   <tr>
        <td>F Entrega esp FO</td>
        <td><input type="text" name="Entrega" id="Entrega" class="combos_3"  /></td>
   </tr>
   <tr>
        <td>F ok adecuaciones</td>
        <td><input type="text" name="adecuaciones" id="adecuaciones" class="combos_3"  /></td>
   </tr>
   <tr>
        <td>Delegacion</td>
        <td><input type="text" name="Delegacion" id="Delegacion" class="combos_3"  /></td>
        
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
      <td width="161"><input type="text" name="OT" id="OT" class="combos_3"  /></td>
      <td width="100">PEP-09</td>
      <td width="159"><input type="text" name="PEP" id="PEP" class="combos_3"  /></td>
  </tr>
  <tr>
      <td>F elab ot</td>
      <td><input type="text" name="elab" id="elab" class="combos_3"  /></td>
      <td>Ped45-09</td>
      <td><input type="text" name="Ped45" id="Ped45" class="combos_3"  /></td>
  </tr> 
  <tr>
      <td>F Entr ot</td>
      <td><input type="text" name="Entr" id="Entr" class="combos_3"  /></td>
      <td>Problematica</td>
      <td><?php echo ImprimeCombo(3,$id_problematica);?></td>
  </tr> 
  <tr>
      <td>Recibe OT</td>
      <td><input type="text" name="Recibe" id="Recibe" class="combos_3"  /></td>
      <td>Constructor</td>
      <td><input type="text" name="Constructor" id="Constructor" class="combos_3"  /></td>
  </tr> 
  <tr>
      <td>FO Proy ES</td>
      <td><input type="text" name="Proy" id="Proy" class="combos_3"  /></td>
      <td>FProyecto OK</td>
      <td><input type="text" name="FProyecto" id="FProyecto" class="combos_3"  /></td>
  </tr> 
  <tr>
      <td>Fecha Envio Map Edit</td>
      <td><input type="text" name="Envio" id="Envio" class="combo_blue"  /></td>
      <td>FO Cancel</td>
      <td><form id="form1" name="form1" method="post" action="">
        <input type="checkbox" name="fo_cancel" id="fo_cancel" />
        <label for="fo_cancel"></label>
      </form></td>
    </tr> 

  <tr>
      <td>Fecha Ent 50</td>
      <td><input type="text" name="Ent" id="Ent" class="combos_3"  /></td>
      <td>Fecha_Liq FO</td>
      <td><input type="text" name="Ent" id="Ent" class="combo_purple"  /></td>
      
  </tr>
  <tr>
        <td>&nbsp;</td>
        <td><!--<form id="form2" name="form2" method="post" action="">-->
          <input type="submit" name="solicitud" id="solicitud" value="Solicitud de Planificacion " />
      </td>
        <td>&nbsp;</td>
        <td><input type="submit" name="solicitud2" id="solicitud2" value="Solicitud de Permiso SSP" /></td>
  </tr>     
  </table>
</fieldset>
    </td>
  </tr>
  <tr>
    <td><textarea name="comentario" cols="40" rows="10"></textarea></td>
    <td><fieldset style="width:450"><legend><strong>Construcci&oacute;n</strong></legend>
<table width="550" border="0" class="Texto_Mediano_Negro">    
  <tr>
<td colspan="4">
    <table width="600" border="0">
    <tr>
        <td width="74">FOt1</td>
        <td width="34" ><input name="FOt" type="text" class="combo_green_ch" /></td>
        <td width="42">Fot2</td>
        <td width="40"><input name="FOt2" type="text" class="combo_green_ch" /></td>
        <td width="102">Clte FO</td>
        <td width="30"><input name="FOt3" type="text" class="combo_green_ch" /></td>
        <td width="45"><input name="FOt4" type="text" class="combo_green_ch" /></td>
        <td width="40">Tipo</td>
        <td width="155"><input type="text" name="Tipo" id="Tipo" class="combo_green" value= "COMBO" /></td>
<tr>
</table>
   </td>
      </tr>
         <tr>
      <td>FO Const Estatus</td>
      <td><input type="text" name="Const" id="Const" class="combo_green" VALUE= "COMBO" /></td>
      <td>F ini real</td>
      <td><input type="text" name="ini" id="ini" class="combo_green"  /></td>
  </tr>
   <tr>
      <td>Problematica</td>
      <td><input type="text" name="Problematica" id="Problematica" class="combo_green" VALUE= "COMBO" /></td>
      <td>F remate fo</td>
      <td><input type="text" name="remate" id="remate" class="combo_blue"  /></td>
  </tr>
   <tr>
      <td>Anillo ROF</td>
      <td><input type="text" name="Anillo" id="Anillo" class="combo_green"  /></td>
      <td>Sup cons</td>
      <td><input type="text" name="Sup" id="Sup" class="combo_green"  /></td>
  </tr>
   <tr>
      <td>SubAnillo Fi</td>
      <td><input type="text" name="SubAnillo" id="SubAnillo" class="combo_green"  /></td>
      <td>F entrega fo</td>
      <td><input type="text" name="entrega" id="entrega" class="combo_pink"  /></td>
  </tr>
   <tr>
      <td>PES</td>
      <td><input type="text" name="PES" id="PES" class="combo_green"  /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
   <tr>
      <td>Atenuacion Trab</td>
      <td><input type="text" name="Atenuacion" id="Atenuacion" class="combo_green"  /></td>
      <td>Atenuacion Resp</td>
      <td><input type="text" name="Atenuacion" id="Atenuacion" class="combo_green"  /></td>
  </tr>
   <tr>
      <td>Longitud Trab</td>
      <td><input type="text" name="Longitud" id="Longitud" class="combo_green"  /></td>
      <td>Longitud Resp</td>
      <td><input type="text" name="Longitud" id="Longitud" class="combo_green"  /></td>
  </tr>
</table>
    </fieldset>
    </td>
  </tr>
</table>
    </div>
<!-- FIN DEL TERCEDR TAB PROYECTO DE FIBRA OPTICA -->    
    <div class="content"><div>
<table width="500" border="0">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
          <table width="939" border="0" class="Texto_Mediano_Negro">                                	
    <tr>
      <td colspan="10">
              <table width="927" border="0" class="Texto_Mediano_Negro">
          <tr>
              <td width="106">Central</td>
              <td width="101">N Ctrl</td>
              <td width="111">Centro de manto</td>
              <td width="106">Jefe de manto</td>
              <td width="106">Telefono</td>
              <td width="106">&nbsp;</td>
              </tr>
          <tr>
            <td><input type="text" name="Longitud8" id="Longitud8" class="combo_pink_ch"  /></td>
            <td><input type="text" name="Longitud9" id="Longitud9" class="combos_3"  /></td>
            <td><input type="text" name="Longitud10" id="Longitud10" class="combo_pink"  /></td>
            <td><input type="text" name="Longitud11" id="Longitud11" class="combo_pink"  /></td>
            <td><input type="text" name="Longitud12" id="Longitud12" class="combo_pink"  /></td>
            <td>&nbsp;</td>
            </tr>
          <tr>
              <td align="right">Subd/GOA</td>
              <td><input type="text" name="Longitud13" id="Longitud13" class="combos_3"  /></td>
              <td align="right">Jefe Goa</td>
              <td><input type="text" name="Longitud14" id="Longitud14" class="combos_3"  /></td>
              <td align="right">Telefono</td>
              <td><input type="text" name="Longitud15" id="Longitud15" class="combos_3"  /></td>
              </tr>
          </table>                          
	  </td>
          <tr>
            <td width="90">Const Status</td>
            <td width="111"><input type="text" name="Longitud" id="Longitud" class="combo_yellow"  /></td>
            <td width="153">F meta Term Const</td>
            <td width="120"><input type="text" name="Longitud" id="Longitud" class="combo_blue"  /></td>				 
            <td width="196">Pendiente por Clte Const</td>
            <td width="243"><input name="Pendiente" type="text" size="15" /></td>
         </table>
          </td>
        </tr>
        <tr>
          <td width="559">
  <fieldset><legend><strong>Equipamiento Central</strong></legend>
        <table width="554" border="0" class="Texto_Mediano_Negro">
                <tr>
                  <td>Instalaci&oacute;n</td>
                  <td>&nbsp;</td>
                  <td>Instalacion Eq. Acceso</td>
                </tr>
                <tr>
                  <td><input type="text" name="Longitud2" id="Longitud2" class="combos_3"  /></td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="Longitud3" id="Longitud3" class="combos_3"  /></td>
                </tr>
                <tr>
                    <td width="159">Entrega y Gestion Col.</td>
                    <td width="164">&nbsp;</td>
                    <td width="287">Enrega Eq. Acceso</td>
                </tr>
                <tr>
                  <td><input type="text" name="Longitud4" id="Longitud4" class="combos_3"  /></td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="Longitud5" id="Longitud5" class="combos_3"  /></td>
                </tr>
                <tr>
                  <td>Integracion </td>
                  <td>&nbsp;</td>
                  <td>Gesti&oacute;n Eq. Acceso</td>
                </tr>
                <tr>
                  <td><input type="text" name="Longitud6" id="Longitud6" class="combos_3"  /></td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="Longitud7" id="Longitud7" class="combos_3"  /></td>
                </tr>
                <tr>
                  <td>Colectora</td>
                <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              <tr>
                  <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
                  <td colspan="2">Enlace Adva-Colectora</td>
                </tr>
    	</table>
 </fieldset>
            </td>
              <td width="629">
 <fieldset><legend><strong>Rechazo por Proyecto</strong></legend>
      <table width="400" border="0" class="Texto_Mediano_Negro">      
           <tr>
            <td width="179" align="center"><input type="submit" name="btn" id="btn" value="BTN" /></td>
            <td width="96">Cont Rech</td>
            <td width="211"><input type="text" name="Longitud" id="Longitud" class="combo_pink_ch"  /></td>
      </tr>
      <tr>
            <td>&nbsp;</td>
            <td>Fecha Rech:</td>
            <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
      </tr>
      <tr>
            <td>&nbsp;</td>
            <td>Motivo:</td>
            <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
      </tr>
  </table>
  </fieldset>
<table width="400" border ="0" class="Texto_Mediano_Negro">
  <tr>
    <td width="75">&nbsp;</td>
    <td width="127">IPE construccion</td>
    <td width="184"><input type="text" name="Longitud" id="Longitud" class="combo_green"  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Folio Gestion NX</td>
    <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Folio Gestion NX</td>
    <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
  </tr>
</table >
    </td>
        </tr>
    <tr>
         <td>
 <fieldset><legend><strong>Cliente</strong></legend>
   <table width="500" border="0" class="Texto_Mediano_Negro">
        <tr>
          <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
          <td>Instalaci&oacute;n</td>
        </tr>
        
        <tr>
          <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
          <td>Alimentaci&oacute;n Entrega</td>
        </tr>
        <tr>
          <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
          <td>Instalaci&oacute;n Eq. Acceso</td>
        </tr>
        <tr>
          <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
          <td>Entrega Eq. Acceso</td>
        </tr>
        <tr>
          <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
          <td>Gestion Eq. Acceso(FRIDA/Gesti&oacute;n NX)</td>
        </tr>
    </table>
    </fieldset>
        </td>
        <td><textarea name="comentario2" cols="40" rows="10"></textarea></td>
    </tr>
 </table>
 	</div>
 		</div>
 			</div>
<!-- FIN DEL CUARTO TAB CONSTRUCCION -->    
</body>
</html>
