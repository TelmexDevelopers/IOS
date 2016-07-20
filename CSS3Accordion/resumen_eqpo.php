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

	$SQL = "SELECT 
a.referencia, a.id_tramos,a.dt_entrega_esp, a.dt_rec_site, a.id_prtx_status, c.str_prtx_status, a.dt_proy_concl,  
b.id_FO_Const_Estatus, f.str_fo_const_estatus, b.dt_entrega_fo, b.id_problem_cons, d.str_problema,
b.id_cons_status, e.str_estatus  
FROM (tb_equip_fo a
LEFT JOIN tb_eq_construcion b ON a.id_tramos = b.id_tramos)
LEFT JOIN cat_prtx_status c ON a.id_prtx_status = c.id_prtx_status
LEFT JOIN cat_problem_const d ON b.id_problem_cons = d.id_problem_cons
LEFT JOIN cat_estatus_cons e ON b.id_cons_estatus = e.id_cons_estatus
LEFT JOIN cat_FO_Const_Estatus f ON b.id_FO_Const_Estatus = f.id_FO_Const_Estatus WHERE a.id_tramos = '".$id_tramos."'";
	
//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB1!');
	
	$num_registros = $RS->RecordCount();
	if ($num_registros > 0)
	{
			$referencia = $RS->fields(0);
			$id_tramos = $RS->fields(1);
			$dt_entrega_esp = $RS->fields(2);
			$dt_rec_site = $RS->fields(3);
			$id_prtx_status = $RS->fields(4);
			$str_prtx_status = $RS->fields(5);
			$dt_proy_concl = $RS->fields(6);
			$id_FO_Const_Estatus = $RS->fields(7);
			$str_fo_const_estatus = $RS->fields(8);
			$dt_entrega_fo = $RS->fields(9);
			$id_problem_const = $RS->fields(10);
			$str_problema = $RS->fields(11);
			$id_cons_status = $RS->fields(12);
			$str_estatus = $RS->fields(13);
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
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="<?php echo $referencia ?>" /></td>
    <td><input type="text" name="SIGLAS_ios" id="SIGLAS_ios" class="combo_pink_ch" value="<?php echo $SIGLAS_ios ?>" /></td>
    <td><input type="text" name="usuario_puntas" id="usuario_puntas" class="combo_purple" value="<?php echo $usuario_puntas ?>" /></td>
    <td><input type="text" name="usuario" id="usuario" class="combo_purple" value="<?php echo $usuario ?>" /></td>
    <td><input type="text" name="punta" id="punta" class="combo1" value="<?php echo $punta ?>" /></td>
    <td><input type="hidden" name="id_tramos" id="id_tramos" class="combos_3" value="<?php echo $id_tramos ?>" /></td>
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
    </tr>
</table>
<table width="100" border="0">
  <tr>
    <td align="center">Edo_Tramo:</td>
    <td align="center">Tramos TERM.</td>
    <td align="center">Tramos RCH.</td>
  </tr>
  <tr>
    <td><input type="text" name="str_estatus" id="str_estatus" class="combo_yellow" value="<?php echo$str_estatus ?>" /></td>
    <td><input type="text" name="str_estatus" id="str_estatus" class="combo_yellow" value="<?php echo$str_estatus ?>" /></td>
    <td><input type="text" name="str_estatus" id="str_estatus" class="combo_yellow" value="<?php echo$str_estatus ?>" /></td>
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