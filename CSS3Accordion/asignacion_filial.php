<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
	session_start();
	include('../../adodb/adodb.inc.php');
	include('../../includes/connection.php');
	include('libreria_serch_ref.php');
	require("../includes/funciones.php");
	$CheckSession = CheckSession();

//if (isset($_GET['referencia']) && $_GET['referencia'] != "")
//{
	$referencia_ok = $_GET['referencia'];
	$ser_n_ok = $_GET['ser_n'];
	//Trae datos punta A,Filial
	$SQL = "SELECT 
	id_Filial
	FROM tb_Asignacion_Filial WHERE referencia = '".$referencia_ok."' and ser_n= '".$ser_n_ok."' and str_Punta = 'A'";
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	$id_Filial=  $RS->fields(0);
	
	//Trae datos punta B,Filial
	$SQL_2 = "SELECT 
	id_Filial
	FROM tb_Asignacion_Filial WHERE referencia = '".$referencia_ok."' and ser_n= '".$ser_n_ok."' and str_Punta = 'B'";
	//echo $SQL_2;
	$RS_2 = TraeRecordset($SQL_2);
	if (!$RS_2) die('Error en DB!');
		
	$id_Filialb=  $RS_2->fields(0);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>TELMEX - IOS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    .combos_referencia
	{
		width: 200px;
		font-family:Verdana, Geneva, sans-serif;
		color:#666;
		font-size:12px;
			
	}
    </style>
	<!--<link rel="stylesheet" media="screen" type="text/css" href="css/ios.css" />-->
        <script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"></script>
        <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"></script>
<script type="text/javascript">
		
        window.addEvent('domready', function() {
		//pedirDatos();
		$('actualizar').addEvent('click',update)
    });

//function pedirDatos(){
//     	
//	var referencia= '<?php //echo $referencia; ?>';
//	var id_empresa_filial_pta_A= '<?php //echo $id_Filial; ?>';
//	//var id_empresa_fiial_pta_B= $('filial_b').value;
//	
//
	//var datos = "referencia="+referencia;
//	+"&id_empresa_filial_pta_A="+id_empresa_filial_pta_A;
//	//+"&id_empresa_fiial_pta_B="+id_empresa_fiial_pta_B;
//}

function update()
{
	var datos_referencia = 'update_filial.php?referencia=<?php echo $referencia_ok; ?>&ser_n=<?php echo $ser_n_ok; ?>';
	//alert (datos_referencia);
		var filial_a= $('filial_a').value;
		var filial_b= $('filial_b').value;
		var datos = "";
		if (filial_a != "")
		{
			datos += "&filial_a="+filial_a;
		}
		if (filial_b != "")
		{
			datos += "&filial_b="+filial_b;
		}
		var myHTMLRequest = new Request.HTML({
		url: datos_referencia,
		onRequest : function (){
			//Si nos muestra el resultado correcto, pinta en pantalla
			$('resultado').set('html','Cargando..');
			}	,
		
		onSuccess : function(tree, elements, html)	{
			$('resultado').set('html',html);
			}	
		}).send({ 
			method:'get',
			data: datos
		});
}
 
</script>       
</head>
  <body style="margin: 0; padding: 0;">
  <table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td width="171"><img src="images/telmex.jpg" width="158" height="89" alt="TELMEX" /></td>
    <td width="370"><img src="images/login.gif" width="225" height="35" alt="TELMEX" border="0" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left"><div id="referencia" style="float:center; width:400px; overflow:auto; background:#FFF url(images/page-background.jpg) repeat-x top left; min-height: 250px; max-height: 500px; margin-left: 5px; margin-right: 5px;margin-top: 0px; font-family:Verdana, Geneva, sans-serif; color: #666666; font-size:12px;" >

<table width="100" border="0" align="center">
  <tr>
    <td>REFERENCIA:</td>
    <td><?php echo "<b>$referencia_ok </b>" ?></td>
  </tr>
</table>
     <fieldset><legend><strong>CENTRAL A</strong></legend>
      <table width="350" border="0" align="left" class="Texto_Mediano_Gris" height="50">
  <tr>
    <td>Empresa Filial:</td>
    <td><?php echo ImprimeCombo(7,$id_Filial);?></td>
  </tr>
</table>
</fieldset>
    
      <fieldset><legend><strong>CENTRAL B</strong></legend>
      <table width="350" border="0" align="left" class="Texto_Mediano_Gris" height="50">
  <tr>
    <td>Empresa Filial:</td>
    <td><?php echo ImprimeCombo(8,$id_Filialb);?></td>
  </tr>
</table>
</fieldset>
<table width="100" border="0" align="right">
  <tr>
    <td>&nbsp;</td>
    <td align="right"><input type="button" name="actualizar" id="actualizar" value="Registrar Actualizaci&oacute;n" /></td>
  </tr>
</table><div id="resultado"></div>	
    </div></td>
  </tr>
</table>

</body>
</html>
<?php 
//} else {
//	echo "No hay referencia especificada...";
//}
?>