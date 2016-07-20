<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

session_start();
include('../../adodb/adodb.inc.php');
include('includes/connection.php');
require("includes/funciones.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>IOS - Generaci&oacute;n de Orden de Trabajo</title>
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
 </style>
    <link rel="stylesheet" media="screen" type="text/css" href="css/ios.css" />
	<script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"> </script>
    <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"> </script>
</head>
<style type="text/css">
<!--
.estilo1 {
font-family: Lucida Sans Unicode;
font-size: 11px;
color: #003366;
}
.estilo2 {
color: #990000;
font-weight: bold;
}
.estilo3 {font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #660099; }
-->
</style>
<body>
<div align="center">
    <div id="container">
      <div id="body_space">
        <div id="header">
		  <div id="logo-block">
		    <!-- type your logo and small slogan here -->
            <p id="logo"><a href="logout.php"><img src="images/telmex.jpg" width="158" height="89" alt="TELMEX" border="0" /></a></p>
		    <!-- <p id="slogan">a small website slogan goes here</p>
			end logo and small slogan -->
		  </div>
		  <div id="definels">
		    <!-- login -->
		    <div id="login_top">
            <p style="font-size:10px;"><?php echo date("l, F jS Y "); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Cerrar Sistema</a></p>
			</div>
			<!-- end login -->
			<!-- search -->
			<div id="search">
			  <form name="search" method="get" action="">
              Buscar Referencia: 
                <input type="text" class="box" />
                <button class="btn" title="Buscar Referencia">Buscar</button>
              </form>
            </div>
		    <!-- end search -->
		  </div>
		  <div class="cls"></div>
  		  <div id="top-nav-bg">
            <div id="top-nav">
			  <!-- start top navigation bar -->
				<?php echo CreaHeader(); ?>
			  <!-- end top navigation bar -->
            </div>
	      </div>          
	    </div>
	  </div>
	</div>
  <div id="page">
	  <div id="page-padding">
	    <div id="content">
	      <div id="content-padding">
        <!-- start content -->


<table width="949" height="640" border="0">
  <tr>
    <td width="325" class="estilo1"><div align="right">NUMERO DE OT:
      <input type="text" name="numero_ot" id="numero_ot" style="width: 150px" />
    </div></td>
    <td width="313" class="estilo1"><div align="right">REFERENCIA:
      <input type="text" name="numero_ot22" id="numero_ot22" style="width: 150px" />
    </div></td>
    <td width="365" class="estilo1"><div align="right">DD PUNTA A:
      <input type="text" name="numero_ot30" id="numero_ot30" style="width: 150px" />
    </div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">AÑO:
      <input type="text" name="numero_ot2" id="numero_ot2" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">ELABORO:
      <input type="text" name="numero_ot23" id="numero_ot23" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">CENTRAL A:
      <input type="text" name="numero_ot31" id="numero_ot31" style="width: 150px" />
    </div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">FOLIO GLOBAL:
      <input type="text" name="numero_ot3" id="numero_ot3" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">TELEFONO:
      <input type="text" name="numero_ot24" id="numero_ot24" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">JEFE DE TRANS. A:
      <input type="text" name="numero_ot32" id="numero_ot32" style="width: 150px" />
    </div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">FOLIO DIVISION:
      <input type="text" name="numero_ot4" id="numero_ot4" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">SUPERVISOR:
      <input type="text" name="numero_ot25" id="numero_ot25" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">RECIBIO MANTTO A:
        <input type="text" name="numero_ot33" id="numero_ot33" style="width: 150px" />
    </div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">FOLIO ENTIDAD:
      <input type="text" name="numero_ot5" id="numero_ot5" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">TELEFONO:
  <input type="text" name="numero_ot26" id="numero_ot26" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">CENTRAL B:
      <input type="text" name="numero_ot34" id="numero_ot34" style="width: 150px" />
    </div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">CLIENTE:
      <input type="text" name="numero_ot6" id="numero_ot6" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">SUBGERENTE:
      <input type="text" name="numero_ot27" id="numero_ot27" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">JEFE DE TRANSMISIÓN B:      
        <input type="text" name="numero_ot35" id="numero_ot35" style="width: 150px" />
    </div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">DOMICILIO:
      <input type="text" name="numero_ot7" id="numero_ot7" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">TELEFONO:
      <input type="text" name="numero_ot28" id="numero_ot28" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">RECIBIO MANTTO B:
      <input type="text" name="numero_ot36" id="numero_ot36" style="width: 150px" />
    </div></td>
  </tr>
  <tr>
    <td height="22" class="estilo1"><div align="right">RESPONSABLE CLIENTE:
        <input type="text" name="numero_ot8" id="numero_ot8" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">DESCRIP. DEL TRABAJO:
        <input type="text" name="numero_ot29" id="numero_ot29" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right">FECHA DE ELABORACION:
        <input type="text" name="numero_ot37" id="numero_ot37" style="width: 150px" />
    </div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">TELEFONO CLIENTE:
        <input type="text" name="numero_ot9" id="numero_ot9" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right"></div></td>
    <td class="estilo1"><div align="right">FECHA DE INICIO PROGRAMADA:
        <input type="text" name="numero_ot38" id="numero_ot38" style="width: 150px" />
    </div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">DUE DATE:
        <input type="text" name="numero_ot10" id="numero_ot10" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right"></div></td>
    <td class="estilo1"><div align="right">FECHA DE TERM. PROGRAMADA:
        <input type="text" name="numero_ot39" id="numero_ot39" style="width: 150px" />
    </div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">PRIORIDAD:
        <input type="text" name="numero_ot11" id="numero_ot11" style="width: 150px" />
    </div></td>
    <td><div align="right"></div></td>
    <td class="estilo1"><div align="right">FECHA DE TERMINACION REAL:
        <input type="text" name="numero_ot40" id="numero_ot40" style="width: 150px" />
    </div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">ASIGNADO A:
        <input type="text" name="numero_ot12" id="numero_ot12" style="width: 150px" />
    </div></td>
    <td><div align="right"></div></td>
    <td class="estilo1"><div align="right">RECIBIO CLIENTE:
        <input type="text" name="numero_ot36" id="numero_ot36" style="width: 150px" />
    </div></td>
    </tr>
  <tr>
    <td class="estilo1"><div align="right">RESPON. CONTRATISTA A:
        <input type="text" name="numero_ot13" id="numero_ot13" style="width: 150px" />
    </div></td>
    <td class="estilo1"><div align="right"></div></td>
    <td class="estilo1"><div align="right">NUMERO DE REPORTE:
        <input type="text" name="numero_ot36" id="numero_ot36" style="width: 150px" />
    </div></td>
    </tr>
  <tr>
    <td height="65" class="estilo1"><div align="right">ASIGNADO B:
        <input type="text" name="numero_ot14" id="numero_ot14" style="width: 150px" />
    </div></td>
    <td colspan="2" class="estilo1"><div align="right"></div>      <div align="right">
        <form id="form1" name="form1" method="post" action="">
          <label for="OBSERVACIONES">OBSERVACIONES: </label>
          <textarea name="OBSERVACIONES" id="OBSERVACIONES" cols="45" rows="2"></textarea>
          </form>
    </div></td>
    </tr>
  <tr>
    <td class="estilo1"><div align="right">RESPONS. CONTRATISTA B:
        <input type="text" name="numero_ot15" id="numero_ot15" style="width: 150px" />
    </div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">TIPO DE SERVICIO:
        <input type="text" name="numero_ot16" id="numero_ot16" style="width: 150px" />
    </div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">TIPO DE TRABAJO:
        <input type="text" name="numero_ot17" id="numero_ot17" style="width: 150px" />
    </div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">MEDIO DE TRANSMISION:
        <input type="text" name="numero_ot18" id="numero_ot18" style="width: 150px" />
    </div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">ESTADO DEL SERVICIO:
        <input type="text" name="numero_ot19" id="numero_ot19" style="width: 150px" />
    </div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">TIPO DE MERCADO:
        <input type="text" name="numero_ot20" id="numero_ot20" style="width: 150px" />
    </div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td class="estilo1"><div align="right">METRODATA No. DE SERIE:
        <input type="text" name="numero_ot21" id="numero_ot21" style="width: 150px" />
    </div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
  </tr>
</table>





		<!-- end content -->
		  </div>
		</div>
	  </div>
	  <div id="footer">
	    <div id="footer-pad">
	      <div class="line"></div>
		  <!-- footer and copyright notice -->
	      <p>Telmex&reg; 2013</p>
		  <!-- end footer and copyright notice -->
	    </div>
	  </div>
	</div>


</div>
</body>
</html>
