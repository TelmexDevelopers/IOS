<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();

require("../../../kike/includes/funciones.php");
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');
include('../../CSS3Accordion/libreria_equipo_fo.php.');

//require("../includes/funciones.php");
//$CheckSession = CheckSession();

$referencia = $_GET['referencia'];
$id_tramos = $_GET['id_tramos'];

if (isset($_GET['referencia']));
{
	$SQL = "SELECT referencia,id_tramos, ref_tramo, edo_tramo, coordinacion_abrev, fecha_afect, edo_serv, tipo_proy, DUE_DATE, tra_obser, 
tra_punta, SIGLAS_ios, area, central, division, usuario, usuario_puntas, direccion FROM vw_tramos_fo WHERE referencia = '".$referencia."'";
//echo $SQL."<br />";
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB1!');
	
	$num_registros = $RS->RecordCount();
	
	$referencia= $RS->fields(0);
	$ref_tramo=  $RS->fields(1);
	$edo_tramo=  $RS->fields(2);
	$coordinacion_abrev=  $RS->fields(3);
	$fecha_afect=  $RS->fields(4);
	$edo_serv=  $RS->fields(5);
	$tipo_proy=  $RS->fields(6);
	$DUE_DATE=  $RS->fields(7);
	$tra_obser=  $RS->fields(8);
	$tra_punta=  $RS->fields(9);
	$SIGLAS_ios=  $RS->fields(10);
	$area=  $RS->fields(11);
	$central=  $RS->fields(12);
	$division=  $RS->fields(13);
	$usuario=  $RS->fields(14);
	$usuario_puntas=  $RS->fields(15);
	$direccion=  $RS->fields(16);
	
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
	//echo $SQL_10."<br />";
	$RS_10 = TraeRecordset($SQL_10);
	if (!$RS_10) die('Error en DB10!');
	$num_registros = $RS_10->RecordCount();
	while (!$RS_10->EOF)
	{
	
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
		
		
		
		
		
		$RS_10->MoveNext();
	}
	$RS_10->Close();
	$RS_10 = NULL;
	
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
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
    <script type="text/javascript">
	
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
			
			var F_Req_FO = new Picker.Date($$('#dt_requiere_fo'), {
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
			var F_Reporte_Site = new Picker.Date($$('#dt_resporte_site'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			
			var F_Reporte_Site = new Picker.Date($$('#f_REF'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var F_Reporte_Site = new Picker.Date($$('#F_ini'), {
				pickerClass: 'datepicker_vista', 
	//			timePicker: true,
				format: '%Y-%m-%d',
				positionOffset: {x: 5, y: 0},
				useFadeInOut: !Browser.ie,
				minDate: '2013-01-01'
			});
			var F_Reporte_Site = new Picker.Date($$('#F_term'), {
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
			
			
        });
    });
	
/*		window.addEvent('domready', function()
		{
			$('guarda_sisa').addEvent('click',guarda_sisa);
		});
		
function guarda_sisa(e)
{
	var referencia = '<?php //echo $referencia; ?>';
	
	var id_proy_sisa = $('proyecto_sisa').value;
	var dt_fecha_prog = $('dt_fecha_prog').value;
	var documento_pagina_web = $('documento_pagina_web').value;
	var id_proy_rda = $('edo_proy_rda').value;
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
	var	dt_ok_ing_eq = $('dt_ok_ing_eq').value;

	var datos = "referencia="+referencia+
	
	+"&id_proy_sisa="+id_proy_sisa
	+"&dt_fecha_prog="+dt_fecha_prog
	+"&documento_pagina_web="+documento_pagina_web
	+"&id_proy_rda="+id_proy_rda

	+"&id_vencido="+id_vencido
	+"&id_cancelado="+id_cancelado
	+"&id_analisa_ing_eq="+id_analisa_ing_eq
	+"&dt_ok_ing_eq="+dt_ok_ing_eq;

//	alert (datos);

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
	}*/

	
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

/*------------------------------------------------------OPCIONES DE FILA----------------------------------------*/

/*------------------------------------------------------OPCIONE GUARDAR----------------------------------------*/


window.addEvent('domready', function() {
			$('save_ot').addEvent('click',guardar_ot);
		});
		
		function guardar_ot(e)
{
	var referencia = '<?php echo $referencia; ?>';
	var id_tramos = '<?php echo $id_tramos; ?>';
//	
//	var codigo = $('codigo').value;
//	var	n_accesso = $('n_accesso').value;
//	var	cll = $('cll').value;
//	var	f_REF = $('f_REF').value;
//	var id_prioridad = $('prioridad').value;
//	var	anillo = $('anillo').value;
//	var	posicion_dbfo = $('posicion_dbfo').value;
//	var	F_ini = $('F_ini').value;
//	var	F_term = $('F_term').value;
//	var	f_asignadas = $('f_asignadas').value;
//	var	element = $('element').value;
//	var	elemnt_pep = $('elemnt_pep').value;
//	var	trabajos_realizar = $('trabajos_realizar').value;
//	var	nota = $('nota').value;
//	var	observaciones = $('observaciones').value;
//	var	str_tipo_servicio = $('str_tipo_servicio').value;
//
//	var datos = "referencia="+referencia
//
//	+"&id_tramos="+id_tramos
//	+"&codigo="+codigo
//	+"&n_accesso="+n_accesso
//	+"&cll="+cll
//	+"&f_REF="+f_REF
//	+"&id_prioridad="+id_prioridad
//	+"&anillo="+anillo
//	+"&posicion_dbfo="+posicion_dbfo
//	+"&F_ini="+F_ini
//	+"&F_term="+F_term
//	+"&f_asignadas="+f_asignadas
//	+"&element="+element
//	+"&elemnt_pep="+elemnt_pep
//	+"&trabajos_realizar="+trabajos_realizar
//	+"&nota="+nota
//	+"&observaciones="+observaciones
//	+"&str_tipo_servicio="+str_tipo_servicio;


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
			 mywindow = window.open(url_ot, "mywindow", "location=1,status=1,scrollbars=1,width=100,height=100");
					//'referencia=F20-1303-0026&id_tramos=2&str_OT=UIL-1332/2013&dt_fecha_OT=2013-08-28&n_accesso=MADRID&anillo=MA/FT&CLL=CDMXDFMA&posicion_dbfo=01.Q10B61&f_ini=2013-05-28&f_REF=2013-05-09&F_term=2013-05-28&element=C-4505422 B014&elemnt_pep=N.A&trabajos_realizar=AMPLIACION DE FIBRAS PARA EL USUARIO INDICADO&nota=PARA INICIAR LA CONST. DEL PROYECTO&observaciones=ENTREGAR UN REPORTE DE LOS CLIENTES QUE SE ENCUENTRAN DERIVADOS EN EL CIERRE A INTERVENIR&str_tipo_servicio=AMPLIACION FIBRA&codigo=2&prioridad=PROGRAMA&str_prioridad=b'
			
			
			
			
			
			
			}	
		}).post($('form_ot'));
		
		
//		send({ 
//			method:'get',
//			data: datos
//		});
	}
		





/*------------------------------------------------------OPCIONE GUARDAR----------------------------------------*/
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
    <td>&nbsp;</td>
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
        <li class="tab">Generaci&oacute;n de OT </li>
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
    <td><input type="text" name="direccion" id="direccion" class="combos_3" value="<?php echo $direccion ?>" /></td>
    <td>Due Date:</td>
    <td><input type="text" name="DUE_DATE" id="DUE_DATE" class="combos_3" value="<?php echo $DUE_DATE ?>" /></td>
    <td>Tramo:</td>
    <td colspan="3"><input type="text" name="ref_tramo" id="ref_tramo" class="combos_4" value="<?php echo $ref_tramo ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Obs_tramo:</td>
    <td colspan="5"><input type="text" name="tra_obser" id="tra_obser" class="combos_2" value="<?php echo $tra_obser ?>" /></td>
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
    <td><input type="text" name="dt_ok_ing_eq" id="dt_ok_ing_eq" class="combo_red" /></td>
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
    <td><input type="text" name="dt_fecha_prog" id="dt_fecha_prog" class="combo_green" /></td>
    <td>Vencido:</td>
    <td><input type="checkbox" name="vencido" value="1" id="vencido" /></td>
    <td>Estado del Cliente</td>
    <td><input type="text" name="edo_cliente" id="edo_cliente" class="combo_pink" /></td>
  </tr>
  <tr>
    <td>Documento p&aacute;g. Web:</td>
    <td><input type="text" name="documento_pagina_web" id="documento_pagina_web" class="combos_3" /></td>
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
    <td><div id="resultado2" style="font-weight:bold;"></div></td>
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
    <td width="376" height="175">
 <fieldset>
    <legend><strong>Grupo de Referencias:</strong></legend>
<table width="273" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td colspan="2" align="right">
    Principal:
      <input name="principal" id="principal" type="checkbox" value="" /></td>
    </tr>
  <tr>
    <td width="100">Relacionado a</td>
    <td width="163"><input type="text" name="referencia" id="referencia" class="combo_green" value="" /></td>
    </tr>
  </table>
</fieldset></td>
  <td width="650" rowspan="2">
  <table width="618" border="0" class="Texto_Mediano_Negro">
    <tr>
      <td colspan="2" align="right">
      Proyecto Concluido
         <input type="checkbox" name="proyecto_concluido" id="proyecto_concluido" /></td>
      <td colspan="2">
      F proy Concluido:
      <input type="text" name="dt_proy_concl" id="dt_proy_concl" class="combo_green" value="" /></td>
    </tr>
   <!-- <tr>-->
      <td width="302">
  <fieldset>
        <legend><strong>Proyecto Tx Central</strong></legend>
    <table width="300" border="0">
      <tr>
        <td>Proveedor:</td>
        <td><?php echo ImprimeCombo(4,$id_Filial);?></td>
      </tr>
      <tr>
        <td>Modelo:</td>
        <td><input type="text" name="Modelo" id="Modelo" class="combo_green" value="" /></td>
      </tr>
      <tr>
        <td>Capacidad Enlace:</td>
        <td><input type="text" name="Enlace" id="Enlace" class="combos_3" value="" /></td>
      </tr>
      <tr>
        <td>PEP:</td>
        <td><input type="text" name="PEP" id="PEP" class="combos_3" value="" /></td>
      </tr>
      <tr>
        <td>Proveedor Inst.</td>
        <td><input type="text" name="Proveedor_Inst" id="Proveedor_Inst" class="combo_green" value="COMBO FILIAL" /></td>
      </tr>
    </table>
    </fieldset>
    </td>
  <td colspan="3">
  <fieldset><legend>Cliente</legend>
 <table width="300" border="0">
  <tr>
      <td>
      <fieldset><legend>Site </legend>
<table width="300" border="0">
  <tr>
      <td>F_Entrega_Esp:</td>
      <td><input type="text" name="referencia12" id="referencia12" class="combos_3" value="" /></td>
      </tr>
  <tr>
      <td>F_Rec_Site</td>
      <td><input type="text" name="referencia12" id="referencia12" class="combos_3" value="" /></td>
      </tr>
  <tr>
      <td>F_Reporte_Site</td>
      <td><input type="text" name="referencia14" id="referencia14" class="combos_3" value="" /></td>              
    </tr>
</table>
</fieldset>
   </td>
     <tr>
        <tr>
        	<td>
<fieldset>
 	<legend>Tx</legend>
  <table width="300" border="0">
    <tr>
      <td>Cap:
        <t/d></td>
      <td><input name="cap" id="cap" type="text" size="15"  value="Combo"/>
        <t/d></td>
      </tr>
    <tr>
      <td>Tipo:
        <t/d></td>
      <td><input name="Tipo2" id="Tipo2" type="text" size="15" value="Combo" />
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
 <td colspan="4">
  <fieldset>
      <legend><strong>Colectora</strong></legend>
      <table width="300" border="0" >
        <tr>
          <td>Colectora:</td>
          <td><input name="Colectora" id="Colectora" type="text" class="combo_green" value="" /></td>
        </tr>
        <tr>
          <td>Trab_Col</td>
          <td><input name="Trab_Col" id="Trab_Col" type="text" class="combo_green" /></td>
        </tr>
        <tr>
          <td>F_trabCol_OK</td>
          <td><input name="dt_trabcol_ok" id="dt_trabcol_ok" type="text" class="combo_green" /></td>
        </tr>
      </table></fieldset>
    <table width="300" border="0">
      <tr>
        <td width="63">TOP FO:</td>
        <td width="80">Anillo ROF:</td>
        <td width="68">Fot1:</td>
        <td width="390">Fot2:</td>
      </tr>
      <tr>
        <td><input name="TOP_FO" id="TOP_FO" type="text" class="combo_pink_ch" /></td>
        <td><input name="Anillo_ROF" id="Anillo_ROF" type="text" class="combo_1" /></td>
        <td><input name="Fot1" id="Fot1" type="text" class="combo_1" /></td>
        <td><input name="Fot2" id="Fot2" type="text" class="combo_1" /></td>
      </tr>
      <tr>
    <td colspan="4">

  <table width="613" border="0">
      <tr>
          <td width="50">PrTx Status</td>
          <td width="150"><input name="F_trabCol_OK" id="F_trabCol_OK" type="text" class="combo_yellow" /></td>
          <td width="58">F meta Term Proy</td>
          <td width="150"><input name="dt_meta_term_proy" id="dt_meta_term_proy" type="text" class="combo_blue" /></td>
          
      </tr>
  </table>
 </td>
</tr>
   	<tr>
      <td colspan="4">&nbsp;
      </td>
    </tr>
  </table>
     </td>
        </tr>
    </table>
      </td>
		</tr>
  <tr>
    <td><table width="320" border="0" class="Texto_Mediano_Negro">
      <tr>
        <td>Tipo de Trabajo:</td>
        <td><?php echo ImprimeCombo(1,$id_proy_eqp);?></td>
      </tr>
      <tr>
        <td>Requiere Trabajo de FO:</td>
        <td><input type="text" name="tipo_trabajo" id="tipo_trabajo" class="combos_3" value="ckeckbox" /></td>
      </tr>
      <tr>
        <td>F_Req_FO:</td>
        <td><input type="text" name="dt_requiere_fo" id="dt_requiere_fo" class="combo_green" value="" /></td>
      </tr>
      <tr>
        <td>Responsable Supervisor:</td>
        <td><input type="text" name="referencia5" id="referencia5" class="combos_3" value="combo" /></td>
      </tr>
      <tr>
        <td>IPE Proyecto:</td>
        <td><input type="text" name="tipo_trabajo" id="tipo_trabajo" class="combo_green" value="combo" /></td>
      </tr>
      <tr>
        <td>Pendiente por Clte_Proy:</td>
        <td><input type="text" name="referencia3" id="referencia3" class="combos_3" value="" /></td>
      </tr>
      <tr>
  <td colspan="2"><fieldset>
    <legend><strong>Puerto Tx:</strong></legend>
    <table width="300" border="0">
      <tr>
        <td>Requiere Pto Tx</td>
        <td><input type="text" name="referencia2" id="referencia2" class="combo_green" value="" /></td>
      </tr>
      <tr>
        <td>F_Req Pto Tx</td>
        <td><input type="text" name="dt_req_pto_tx" id="dt_req_pto_tx" class="combo_green" value="" /></td>
      </tr>
      <tr>
        <td>Estatus Pto Tx</td>
        <td><input type="text" name="referencia2" id="referencia2" class="combos_3" value="" /></td>
      </tr>
    </table>
        </fieldset></td>
      </tr>
    </table>      <legend></legend></td>
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
                <td width="155"><input type="text" name="Carga" id="Carga" class="combos_3" value="" /></td>
                <td width="135">Carga Mat. OK</td>
                </tr>
              <tr>
                <td><input type="text" name="Asig" id="Asig" class="combos_3" value="" /></td>
                <td>Asig. PEP</td>
                </tr>
              <tr>
                <td><input type="text" name="45" id="45" class="combos_3" value="" /></td>
                <td>Asig. P-45</td>
                </tr>
              </table></fieldset></td>
          <td>
          <fieldset>
          <legend><strong>Anexos</strong></legend>
            <table width="300" border="0" class="Texto_Mediano_Negro">
              <tr>
                <td width="157"><input type="text" name="OK" id="OK" class="combos_3" value="" /></td>
                <td width="133">OT&acute;s OK</td>
                </tr>
              <tr>
                <td><input type="text" name="Anexos" id="Anexos" class="combos_3" value="" /></td>
                <td>Anexos OK</td>
                </tr>
              <tr>
                <td><input type="text" name="Pag" id="Pag" class="combos_3" value="" /></td>
                <td>Pag. Web OK</td>
                </tr>
              </table></fieldset></td>
          <td>
          <fieldset>
          <legend><strong>Gesti&oacute;n:</strong></legend>
            <table width="300" border="0" class="Texto_Mediano_Negro">
              <tr>
                <td width="155"><input type="text" name="referencia8" id="referencia8" class="combos_3" value="" /></td>
                <td width="135">Sol_CLLI</td>
                </tr>
              <tr>
                <td><input type="text" name="referencia8" id="referencia8" class="combos_3" value="" /></td>
                <td>CLLI Ok</td>
                </tr>
              <tr>
                <td><input type="text" name="referencia8" id="referencia8" class="combos_3" value="" /></td>
                <td>Sol_Gesti&oacute;n</td>
                </tr>
              <tr>
                <td><input type="text" name="referencia8" id="referencia8" class="combos_3" value="" /></td>
                <td>Gesti&oacute;n_OK</td>
                </tr>
              <tr>
                <td><input type="text" name="referencia8" id="referencia8" class="combos_3" value="" /></td>
                <td>Carga SISE </td>
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
        <textarea name="Observaciones" id="Observaciones" cols="70" rows="5" tabindex="20"></textarea>
        </p></td>
    <td width="143"><input name="save" type="button" id="save" value="Guardar_2" /></td>
  </tr>
</table><div id="resultado2" style="font-weight:bold;"></div>
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
<!-- FIN DEL CUARTO TAB CONSTRUCCION -->  
		<br>
<div class="content">
          <div>
           <form action="" method="get" name="form_ot" id="form_ot">
       
		<table width="950" border="1" class="Texto_Mediano_Negro" rules="rows">
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
        </div><!--</div>-->

<!-- FIN DEL TABS NO BORRAR DIV--><!--</div>--><!-- FIN TABS-->  
  <!--</div>-->


</body>
</html>
