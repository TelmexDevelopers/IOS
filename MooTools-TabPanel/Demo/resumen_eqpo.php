<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
session_start();
include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');
//include('libreria_serch_ref.php');
//require("../includes/funciones.php");
//$CheckSession = CheckSession();


//$referencia = $_GET['referencia'];
$id_tramos = $_GET['id_tramos'];

	if ($id_tramos != "")
	{
	
	$SQL = "SELECT referencia, id_tramos, usuario, usuario_puntas, dt_entrega_esp, dt_rec_site, str_prtx_status, dt_proy_concl, str_fo_const_estatus, dt_entrega_fo, str_problema, str_estatus, total_tramos, TERM, RECH, PROC, tra_punta, supervisor, dt_liquidada FROM vw_tramos_resumen WHERE id_tramos = '".$id_tramos."'";
	
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB1!');
	
	$num_registros = $RS->RecordCount();
	if ($num_registros > 0)
	{
			$referencia = $RS->fields(0);
			$id_tramos = $RS->fields(1);
			$usuario = $RS->fields(2);
			$usuario_puntas = $RS->fields(3);
			$dt_entrega_esp = $RS->fields(4);
			$dt_rec_site = $RS->fields(5);
			$str_prtx_status = $RS->fields(6);
			$dt_proy_concl = $RS->fields(7);
			$str_fo_const_estatus = $RS->fields(8);
			$dt_entrega_fo = $RS->fields(9);
			$str_problema = $RS->fields(10);
			$str_estatus = $RS->fields(11);
			$total_tramos = $RS->fields(12);
			$TERM = $RS->fields(13);
			$RECH = $RS->fields(14);
			$PROC = $RS->fields(15);
			$tra_punta = $RS->fields(16);
			$supervisor = $RS->fields(17);
			$dt_liquidada = $RS->fields(18);
			
			
	}
}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>TELMEX - IOS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    .combo1
	{
		width: 50px;
		text-align:center;
	}
    .combo2
	{
		width: 150px;
		text-align:center;
	}
    </style>
       </style>
    
    	<style type="text/css">
		*				{ font-family:tahoma; }
		h3				{ border-bottom:0; }
		
		#message		{ padding:7px 10px; float:left; width:350px; }
		#status		{ border:1px solid #999; padding:5px; width:500px; height:75px; margin:5px 0; }
		#statuses	{ width:512px; }
		#submit		{ cursor:pointer; padding:5px; border:1px solid #ccc; float:left; margin:0 20px 0 0; }
		
		.status-box	{ padding:10px 20px 10px 70px; height:48px; border-bottom:1px dotted #aaa; }
		.status-box:hover	{ background-color:#eee; }
		.success		{ color:#008000; }
		.failure		{ color:#f00; }
		.time			{ color:#2a447b; font-size:10px; }
		
	</style>
    <link rel="stylesheet" type="text/css" href="../Busqueda_Principal/scripts_datepicker/datepicker/Source/datepicker_vista/datepicker_vista.css"/>
        <script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"></script>
        <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"></script>
			<script src="LightFace/Source/LightFace.js"></script>
            <link rel="stylesheet" type="text/css" href="../Busqueda_Principal/LightFace/Assets/LightFace.css"/>
			<script src="LightFace/Source/LightFace.js"></script>
			<script src="LightFace/Source/LightFace.IFrame.js"></script>
			<script src="LightFace/Source/LightFace.Image.js"></script>
			<script src="LightFace/Source/LightFace.Request.js"></script>
        <script type="text/javascript">
</script>       
  </head>
  <body style="margin: 0; padding: 0;">
  <table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td><img src="../../../images/telmex.jpg" width="158" height="89" longdesc="../../../images/telmex.jpg" /></td>
    <td><img src="../../../images/login.gif" width="612" height="35" alt="TELMEX" border="0" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><div id="referencia" style="float:center; width:770px; overflow:auto; background:#FFF url(../../../images/page-background.jpg) repeat-x top left; min-height: 250px; max-height: 700px; margin-left: 5px; margin-right: 5px;margin-top: 0px; font-family:Verdana, Geneva, sans-serif; color: #666666; font-size:12px;" ><div id="resultado" style="font-weight:bold;"></div>
    
 <table width="100" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td align="center">Referencia:</td>
    <td align="center">Supervisor:</td>
    <td align="center">Empresa:</td>
    <td align="center">Empresa Uninet:</td>
    <td align="center">Punta:</td>
    <td></td>
  </tr>
  <tr>
    <td><input type="text" name="referencia" id="referencia" readonly="readonly" value="<?php echo $referencia ?>" /></td>
    <td><input type="text" name="supervisor" id="supervisor" readonly="readonly" value="<?php echo htmlentities ($supervisor) ?>" /></td>
    <td><input type="text" name="usuario" id="usuario" readonly="readonly" value="<?php echo $usuario ?>" /></td>
    <td><input type="text" name="usuario_puntas" id="usuario_puntas" readonly="readonly" value="<?php echo $usuario_puntas ?>" /></td>
    <td><input type="text" name="tra_punta" id="tra_punta" class="combo1" readonly="readonly" value="<?php echo $tra_punta ?>" /></td>
    <td><input type="hidden" name="id_tramos" id="id_tramos" readonly="readonly" value="<?php echo $id_tramos ?>" /></td>
  </tr>
</table>
    <table width="733" border="0">
  <tr>
    <td width="364">
<fieldset>
	<legend><strong>Site</strong></legend>
     <table width="350" border="0" class="Texto_Mediano_Negro">
	 <tr>
      <td width="130">Fecha Entrega Esp:</td>
      <td width="209"><input type="text" name="dt_entrega_esp" id="dt_entrega_esp" readonly="readonly" value="<?php echo $dt_entrega_esp ?>" /></td>
    </tr>
 <tr>
    <td>Fecha Rec Site:</td>
    <td><input type="text" name="dt_rec_site" id="dt_rec_site" readonly="readonly" value="<?php echo $dt_rec_site ?>" /></td>
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
        <td width="273"><input type="text" name="str_prtx_status" id="str_prtx_status" readonly="readonly" value="<?php echo $str_prtx_status ?>"  /></td>
        </tr>
      <tr>
        <td>F Proy Concl:</td>
        <td><input type="text" name="dt_proy_concl" id="dt_proy_concl" readonly="readonly" value="<?php echo $dt_proy_concl ?>" /></td>
        </tr>
      </table>
  </fieldset>		
    </td>
    </tr>		
  <tr> 	
    <td>
<fieldset>
    <legend><strong>Fibra Opt&iacute;ca:</strong></legend>
    <table width="350" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td width="60">FO status:</td>
    <td width="60"><input type="text" name="str_fo_const_estatus" id="str_fo_const_estatus" readonly="readonly" value="<?php echo$str_fo_const_estatus ?>" /></td>
    </tr>
  <tr>
    <td>F Term Real FO:</td>
    <td><input type="text" name="dt_entrega_fo" id="dt_entrega_fo" readonly="readonly" value="<?php echo$dt_entrega_fo ?>" /></td>
    </tr>
  <tr>
    <td>Problem&aacute;tica:</td>
    <td><input type="text" name="str_problema" id="str_problema" readonly="readonly" value="<?php echo$str_problema ?>" /></td>
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
        <td width="60"><input type="text" name="str_estatus" id="str_estatus" readonly="readonly" value="<?php echo$str_estatus ?>" /></td>
        </tr>
      <tr>
        <td>Fecha Liq:</td>
        <td><input type="text" name="dt_liquidada" id="dt_liquidada" readonly="readonly" value="<?php echo$dt_liquidada ?>" /></td>
        </tr>
  </table>
  </fieldset>
    </td>
    </tr>
</table>
<table width="100" border="0">
  <tr>
    <td align="center">Total Tramos:</td>
    <td align="center">Tramos TERM.</td>
    <td align="center">Tramos RCH.</td>
    <td align="center">Tramos PROC.</td>
  </tr>
  <tr>
    <td><input type="text" name="total_tramos" id="total_tramos" class="combo1" readonly="readonly" value="<?php echo$total_tramos ?>" /></td>
    <td><input type="text" name="TERM" id="TERM" class="combo2" readonly="readonly" value="<?php echo$TERM ?>" /></td>
    <td><input type="text" name="RECH" id="RECH" class="combo2" readonly="readonly" value="<?php echo$RECH ?>" /></td>
    <td><input type="text" name="PROC" id="PROC" class="combo2" readonly="readonly" value="<?php echo$PROC ?>" /></td>
  </tr>
</table>
    </div>
    </td>
  </tr>
    </td>
  </tr>
</table>
  </body>
</html>