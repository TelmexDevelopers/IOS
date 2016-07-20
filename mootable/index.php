<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
require("../../adodb/adodb.inc.php");
require("../../includes/connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>mootable example</title>
		<link rel='stylesheet' href='mootable.css' type='text/css' />
<script type="text/javascript" src="../scripts/mootools-core-1.4.5-full-compat.js"></script>
<script type='text/javascript' src='mootable_functions.js'></script>
<script type='text/javascript' src='Debugger.js'></script>
<script type='text/javascript' src='mootable.js'></script>
<script type='text/javascript'>
function Load_Table()
{
		var datos = "";
		var myHTMLRequest = new Request.JSON({
		url: 'json_data.php',
		onSuccess : function(responseJSON, responseText)	{
			
			var headers = [{"text":"Ref","key":"referencia"},{"text":"SER_N","key":"ser_n"},{"text":"desc_serv","key":"desc_serv"},{"text":"due_date","key":"due_date"},{"text":"Grupo_dil_servicio","key":"Grupo_dil_servicio"},{"text":"fase_serv","key":"fase_serv"},{"text":"edo_serv","key":"edo_serv"},{"text":"fecha_estado","key":"fecha_estado"},{"text":"tipo_art","key":"tipo_art"},{"text":"Tipo_de_proyecto","key":"Tipo_de_proyecto"},{"text":"Familia","key":"Familia"},{"text":"TECNOLOGIA","key":"TECNOLOGIA"},{"text":"ancho_banda","key":"ancho_banda"},{"text":"usuario","key":"usuario"},{"text":"sector","key":"sector"},{"text":"coordinacion_abrev","key":"coordinacion_abrev"},{"text":"dir_division","key":"dir_division"},{"text":"str_Fase_IOS","key":"str_Fase_IOS"},{"text":"str_Area_responsable","key":"str_Area_responsable"},{"text":"SUBGERENTE_RESPONSABLE","key":"SUBGERENTE_RESPONSABLE"},{"text":"SUPERVISOR","key":"SUPERVISOR"},{"text":"IPE_Analisis","key":"ipe_analisis"},{"text":"IPE_Seguimiento","key":"ipe_seguimiento"},{"text":"IPE_Documentacion","key":"ipe_documentacion"},{"text":"IPE_Entrega","key":"ipe_entrega"},{"text":"IPE_WIFA","key":"ipe_wifa"},{"text":"Supervisor_Analisis","key":"sup_analisis"},{"text":"CON_OT","key":"str_conOT"},{"text":"Problema Acceso","key":"str_problema_acceso"},{"text":"str_coment_probl_acceso","key":"str_coment_probl_acceso"},{"text":"clas_1","key":"clas_1"},{"text":"clas_2","key":"clas_2"},{"text":"Programa","key":"Programa"},{"text":"Siglas","key":"siglas"},{"text":"Area","key":"area"},{"text":"CTO_MANTTO","key":"cto_mantto"},{"text":"usuario_pta","key":"usuario_pta"},{"text":"Direccion","key":"direccion"}];
			var data = responseJSON;
			
			//
			
				//mootable = new MooTable( $('test'), {debug: true, height: '200px', headers: headers, data: data, sortable: true, useloading: true, resizable: true } );
//				function exampleClick(ev){
//					debug.log( 'Seleccionaste referencia: ' + (this.data.referencia) );
//				}
				mootable = new MooTable( 'test', {debug: false, height: '350px', headers: headers, sortable: true, useloading: false, resizable: true});
				mootable.addEvent( 'afterRow', function(data, row){
					//debug.log( row );
					//row.cols[0].element.innerHTML = ( data.id + 1);
					row.cols[0].element.setStyle('cursor', 'pointer');
					row.cols[0].element.addEvent( 'click', function() { alert(data.referencia); });
				});
				
				mootable.loadData(data);
			}	
		}).send({ 
			method:'get',
			data: datos
		});	
}		
window.addEvent('domready', function()		
{
	Load_Table();
});
		</script>
	</head>
	<body>
		<h1>mootable example</h1>	
		<div id='test'>&nbsp;</div>
		<br />
<!--		<form action='index.php' method='get' style='margin: 0px; display: inline;'>
		<p>Test with <select name='num'>
					<option >50</option>
					<option >100</option>
					<option >150</option>
					<option >200</option>
					<option >250</option>
					<option >300</option>
					<option >350</option>
					<option >400</option>
					<option >450</option>
					<option >500</option>
					<option >550</option>
					<option >600</option>
					<option >650</option>
					<option >700</option>
					<option >750</option>
					<option >800</option>
					<option >850</option>
					<option >900</option>
					<option >950</option>
					<option selected>1000</option>
			`		</select>
			<label for'source'>Source:</label><select name='source' id='source'>
								<option  >table</option>
								<option  >array</option>
								<option selected >object</option>
							</select>
			<label for='useloading'>Use Loading Image?</label> <input name='useloading' id='useloading' type='checkbox' checked />
			<label for='sortable'>Sortable?</label> <input name='sortable' id='sortable' type='checkbox' checked />
			<label for='resizable'>Resizable?</label> <input name='resizable' id='resizable' type='checkbox' checked>
			<input type='hidden' name='user' value='true' />
			<input type='submit' value='Test'>
		</p>
		</form>
		<p>MooTables are created from standard html tables, with this syntax:</p>
		<pre>new MooTable( element, options );</pre>
		<p>Because they are made from standard tables, they degrade nicely.</p>
		<p><a href='mootable.zip'>Download source</a></p>
		<p>Tested in FF2, IE7, Opera9</p>
		<p>Anyone interested in helping to make this better should respond to <a href='http://forum.mootools.net/topic.php?id=1267'>my post at the mootools forum</a>.
		If you would like to contact me directly, <a href='mailto:mark.fabrizio@gmail.com'>send me an email</a>.</p>
		<fieldset>
			<legend>(Hopefully) Future Enhancements</legend>
			<ul>
				<li>Increase speed and performance</li>
				<li>Create a table from an array instead of table element.</li>
				<li>Add functions to dynamically add / remove rows.</li>
				<li>Ajax/Json integration for populating a table</li>
				<li>Server side sorting (replace rows with new array)</li>
				<li><strike>Cool popup for display options (instead of showing underneath the table).
					Like when you right click on a windows explorer heading bar.</strike>
				</li>
			</ul>
			<p>Any other enhancements should be posted on the forum.</p>
		</fieldset>
-->	</body>
</html>
