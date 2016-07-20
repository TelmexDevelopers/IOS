<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');	
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

	include('connection.php');
	include('Libreria_OT_construccion.php');
	include('../../adodb/adodb.inc.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORDEN DE TRABAJO</title>
<link rel="stylesheet" type="text/css" href="formato_style.css"/>


</head>
<body>
</h3>
  
<table width="900" height="1320" border="0" align="">
    <tr>
      <td width="167" height="110"><img src="http://10.94.130.36/iosphp/images/telmex.jpg" width="158" height="89" alt="LOGO" /></td>
      <td width="729"><div align="center"><strong>TEL&Eacute;FONOS DE M&Eacute;XICO <br />
        SUBDIRECCI&Oacute;N DE INGENIERIA Y CONSTRUCCI&Oacute;N <br />
      GERENCIA DE INGENIERIA Y CONSTRUCCI&Oacute;N RED DE ACCESSO PROYECTOS Y CONSTRUCCION RDA, METRO SUR</strong></div></td>
      <td width="382">&nbsp;</td>
    </tr>
    <tr>
      <td height="24" colspan="3" align="center"><table width="800"   style="border: solid 1px #000000; ">
        <tr>
          <td  align="center"><strong>ORDEN DE TRABAJO PRA CIA. CICSA</strong></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="110" colspan="3"><div align="center">
        <table width="500" border="0">
          <tr>
            <td><table width="371" border="1" rules="rows">
              <tr>
                <td width="103"><strong>C&Oacute;DIGO:</strong></td>
                <td width="252" ><label for="codigo"></label>
                  <input type="text" name="codigo" id="codigo" /></td>
                </tr>
              <tr>
                <td colspan="2"><div align="center"><strong>PRIORIDAD</strong></div></td>
                </tr>
              <tr>
                <td colspan="2" align="center"><?php echo ImprimeCombo(1,""); ?></td>
                </tr>
            </table></td>
            <td><table width="500" border="1" rules="rows">
              <tr>
                <td width="93"><div align="center"><strong>NO. ORDEN:</strong></div></td>
                <td width="391"><strong>
                  UIL 1332/2013
                </strong></td>
                </tr>
              <tr>
                <td><div align="center"><strong>ASIGNADO A:</strong></div></td>
                <td>CARSO INFRAESTRUCTURA, S.A</td>
                </tr>
              <tr>
                <td><div align="center"><strong>DOMICILIO:</strong></div></td>
                <td rowspan="2" >PONIENTE 140 N0. 739 CL. IND. VALLEJO, MEXICO, D.F C.P 02300</td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td align="center"><strong>Telefono:</strong></td>
                <td>5392-5732/6937 FAX.5 594 24 00</td>
              </tr>
              <tr>
                <td><div align="center"><strong>FECHA:</strong></div></td>
                <td><label for="fecha"></label>
                  <input type="text" name="fecha" id="fecha"  value="MIERCOLES, 24 ABRIL DE 2013" size="35"/></td>
                </tr>
            </table></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="51" colspan="3" align="center"><table width="800"   style="border: solid 1px #000000; ">
        <tr>
          <td  align="center"><strong>SIRVASE EJECUTAR LOS TRABAJOS ABAJO DESCRITOS, PARA PROPORCIONAR SERVICIOS R.D.A AL USUARIO:</strong></td>
        </tr>
        <tr>
        <td><div align="center"><strong>DATOS DEL CLIENTE Y NODO DE ACCESO:</strong></div></td>
        </tr>
      </table></td>
  </tr>
    <tr>
      <td height="104" colspan="3" align="center"><table width="899" border="1" rules="rows">
        <tr>
          <td width="128">RAZ&Oacute;N SOCIAL:</td>
          <td width="756" >SECRETARIA DE SEGURIDAD PUBLICA</td>
        </tr>
        <tr>
          <td>DOMICILIO:</td>
          <td><label for="domicilio"></label>
          <input type="text" name="domicilio" id="domicilio" value="AV. MELCHOR OCAMPO 171 COL. TLAXPANA DELG. MIGUEL HIDALGO" size="100" /></td>
        </tr>
        <tr>
          <td>RESPONSABLE:</td>
          <td >
            <table width="754" border="0">
              <tr>
                <td width="338" ><label for="reponsable"></label>
                <input type="text" name="reponsable" id="reponsable" value="PEDRO RAMIREZ TREJO" size="35"/></td>
                <td width="84" align="right">TELEFONO:</td>
                <td width="318" ><label for="tel_responsable"></label>
                <input type="text" name="tel_responsable" id="tel_responsable" value="5242-8100" size="15" /></td>
                </tr>
              </table>
            
            
          </td>
        </tr>
        <tr>
          <td>NODO DE ACCESO:</td>
          <td>
          		<table width="766" border="0">
                	<tr>
                    	<td width="128" >
                    	  <label for="text"></label>
                   	    <input type="text" name="text" id="text" value="MADRID"/></td>
                        <td width="93" align="right">ANILLO:</td>
                        <td width="111" ><label for="anillo"></label>
                        <input type="text" name="anillo" id="anillo" value="MA/FT" /></td>
                        <td width="185" align="right">FIBRAS ASIGNADAS:</td><td width="220"></form></td>
                    </tr>
                </table>
          
          </td>
        </tr>
        <tr>
          <td>CLL:</td>
          <td >
          	<table width="100%" border="0">
                	<tr>
                    	<td width="154"><label for="CLLI"></label>
                   	    <input type="text" name="CLLI" id="CLLI" VALUE="CDMXDFMA"/></td>
                        <td width="109">&nbsp;</td>
                        <td width="145">POSICION DEL DBFO:</td>
                        <td width="317" ><label for="posicion"></label>
                        <input type="text" name="posicion" id="posicion" value="01.Q101B16" /></td>
                    </tr>
                </table>
          
          </td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="77" colspan="3" align="center"><table width="899"   style="border: solid 1px #000000; ">
        <tr>
          <td width="171"  align="center">REFERENCIA SISA:</td>
          <td width="138"  align="center" ><label for="REFERENCIA_SISA"></label>
          <input type="text" name="REFERENCIA_SISA" id="REFERENCIA_SISA" VALUE="F20-1303-0026"/></td>
          <td width="146"  align="center">FECHA INICIO:</td>
          <td width="120"  align="center" ><label for="FECHA_INI"></label>
          <input type="text" name="FECHA_INI" id="FECHA_INI" VALUE="24-ABR-13" /></td>
          <td width="149"  align="center">ELEMENTO PEP DE F.O</td>
          <td width="147"  align="center" s><label for="ELEMT_DFO"></label>
          <input type="text" name="ELEMT_DFO" id="ELEMT_DFO" VALUE="C-4505422 B014" /></td>
        </tr>
        <tr>
          <td  align="center">FECHA INGRESO A SISA:</td>
          <td  align="center" ><label for="FECHA_ING_SISA"></label>
          <input type="text" name="FECHA_ING_SISA" id="FECHA_ING_SISA" /></td>
          <td  align="center">FECHA TERMINO:</td>
          <td  align="center" ><label for="FECHA_TERM"></label>
          <input type="text" name="FECHA_TERM" id="FECHA_TERM" /></td>
          <td rowspan="2"  align="center">ELEMENTO PEP CANALIZACION:</td>
          <td rowspan="2"  align="center"><label for="ELMENTO_PEP"></label>
          <input type="text" name="ELMENTO_PEP" id="ELMENTO_PEP" VALUE="N.A"/></td>
        </tr>
        <tr>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="77" colspan="3" align="center"><table width="899" rules="rows" border="1">
        <tr>
          <td width="171"  align="center"><strong>TRABAJOS A REALIZAR:</strong></td>
          <td  align="center" style="border: solid 1px #000000; "><strong>AMPLIACION DE FIBRAS PARA EL USUARIO INDICADO</strong></td>
        </tr>
        <tr>
          <td colspan="2"  align="left">REMATE EN DF USUARIO 05.06 TRABAJO 11.12 RESPALDO</td>
        </tr>
        <tr>
          <td colspan="2"  align="left">REALIZARA AMPLIACION DE FIBRA ANILLO ROF MA/FT PES FC</td>
        </tr>
        <tr>
          <td colspan="2"  align="left">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"  align="left">ENTREGA MEMORIA TECNICA BAJO NORMAS DE TELMEX</td>
        </tr>
        <tr>
          <td colspan="2"  align="left">ENTREGA MEDICIONES IMPRESAS POR OTDR(CTL-USUARIO Y USUARIO-CTL.)</td>
        </tr>
        <tr>
          <td colspan="2"  align="center">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"  align="center">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"  align="center"><div align="center"><strong>NOTA: 
          </strong></div>            <strong>
            <label for="NOTA"></label>
            <div align="center">
              <textarea name="NOTA" id="NOTA" cols="75" rows="5" >
             PARA INICIAR LA CONST. DEL PROYECTO, VERIFICAR QUE LAS FIBRAS CIERREN EN ANILLO Y LA HERMETICIDAD DEL CIERRE CHECARLA ANTES Y DESPUES DE EMPALMAR.LA ENTREGA DE LA MEMORIA TECNICA Y LAS UNIDADES DE CONSTRUCCION DEBEN ENTREGARSE AL CONSTRUIR EL PROYECTO.</textarea>
            </div>
          </strong></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="77" colspan="3" align="center"><table width="899"   style="border: solid 1px #000000; ">
        <tr>
          <td width="171"  align="center"><strong>OBSERVACIONES:</strong></td>
          <td colspan="4" rowspan="2"  align="center"><label for="obs"></label>
          <textarea name="obs" id="obs" cols="45" rows="5">
          ENTREGAR UN REPORTE DE LOS CLIENTES QUE SE ENCUENTRAN DERIVADOS EN EL CIERREA INTERVENIR
          </textarea></td>
          <td width="147"  align="center" >TIPO DE SERVICIO</td>
        </tr>
        <tr>
          <td  align="center">&nbsp;</td>
          <td rowspan="2"  align="center" ><label for="tipo_serv"></label>
          <input type="text" name="tipo_serv" id="tipo_serv" value="AMPIACION FIBRA" /></td>
        </tr>
        <tr>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="110" colspan="3" align="center"><table width="899"   style="border: solid 1px #000000; ">
        <tr>
          <td width="190"  align="center"><strong>ELABORO:</strong></td>
          <td width="190"  align="center"><strong>Vo.Bo.</strong></td>
          <td width="190"  align="center"><strong>SUBGERENTE</strong></td>
          <td width="190"  align="center" ><strong>RECIBE POR PROCISA</strong></td>
        </tr>
        <tr>
          <td height="103"  align="center" style="border: solid 1px #000000; ">&nbsp;</td>
          <td  align="center" style="border: solid 1px #000000; ">&nbsp;</td>
          <td  align="center" style="border: solid 1px #000000; ">&nbsp;</td>
          <td  align="center" style="border: solid 1px #000000; ">&nbsp;</td>
        </tr>
        <tr>
          <td height="25"  align="center"><label for="elaboro"></label>
          <input type="text" name="elaboro" id="elaboro" value="VICTOR VILORIA NAVARRO" size="30" /></td>
          <td  align="center"><label for="vobo"></label>
          <input type="text" name="vobo" id="vobo" value="ING. RICARDO ROCHA P." SIZE="30" /></td>
          <td  align="center"><strong>ING.JAIME TAPIA JIMENEZ</strong></td>
          <td  align="center" ><label for="recibe"></label>
          <input type="text" name="recibe" id="recibe" value="ING. LUIS CARLOS OROZCO" SIZE="30"/></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="110" colspan="3" align="center"><table width="899" rules="all" border="1" >
        <tr>
          <td colspan="4"  align="center"><strong>UNIDADES DE CONSTRUCCION REQUERIDAS PARA ESTE PROYECTO</strong></td>
        </tr>
        <tr>
          <td width="171"  align="center"><strong>CANTIDAD</strong></td>
          <td width="138"  align="center" ><strong>DESCRIPCION</strong></td>
          <td width="146"  align="center"><strong>CANTIDAD</strong></td>
          <td width="147"  align="center" ><strong>DESCRIPCION</strong></td>
        </tr>
        <tr>
          <td  align="center"><label for="CANT1"></label>
          <input type="text" name="CANT1" id="CANT1" size="10"/></td>
          <td  align="center"><label for="descrip"></label>
          <input type="text" name="descrip" id="descrip" value="INTERVENCION CIERRE"/></td>
          <td  align="center">&nbsp;</td>
          <td  align="center" >&nbsp;</td>
        </tr>
        <tr>
          <td  align="center"><input type="text" name="CANT2" id="CANT2" size="10"/></td>
          <td  align="center"><label for="descrip2"></label>
          <input type="text" name="descrip2" id="descrip2" value="FUSIONES DE FIBRA" /></td>
          <td  align="center">&nbsp;</td>
          <td  align="center" >&nbsp;</td>
        </tr>
        <tr>
          <td  align="center"><input type="text" name="CANT3" id="CANT3" size="10"/></td>
          <td  align="center"><label for="descrip3"></label>
          <input type="text" name="descrip3" id="descrip3" value="PRUEBAS DE FIBRA" /></td>
          <td  align="center">&nbsp;</td>
          <td  align="center" >&nbsp;</td>
        </tr>
        <tr>
          <td  align="center"><input type="text" name="CANT4" id="CANT4" size="10"/></td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center" >&nbsp;</td>
        </tr>
        <tr>
          <td  align="center"><input type="text" name="CANT5" id="CANT5" size="10"/></td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center" >&nbsp;</td>
        </tr>
        <tr>
          <td  align="center"><input type="text" name="CANT6" id="CANT6" size="10"/></td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center" >&nbsp;</td>
        </tr>
        <tr>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center" >&nbsp;</td>
        </tr>
        <tr>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center" >&nbsp;</td>
        </tr>
        <tr>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center" >&nbsp;</td>
        </tr>
        <tr>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center" >&nbsp;</td>
        </tr>
        <tr>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center">&nbsp;</td>
          <td  align="center" >&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="110" colspan="3" align="center" ><table width="899" rules="all" border="1" >
        <tr>
          <td colspan="2"  align="center"><strong>UNIDADES RESPONSABLES DE RECEPCION PRUEBA Y ACEPTACION</strong></td>
          <td colspan="2"  align="center"><strong>ANTEFIRMAS:</strong></td>
        </tr>
        <tr>
          <td  align="center"><strong>NOMBRE:</strong></td>
          <td  align="center"><strong>ING. NESTOR FLORES VAZQUEZ</strong></td>
          <td  align="center"><strong>NOMBRE:</strong></td>
          <td width="290"  align="center"><strong>ING. JAIME TAPIA JIMENEZ</strong></td>
        </tr>
        <tr>
          <td width="181"  align="center"><div align="center"><strong>PUESTO:</strong></div></td>
          <td width="274"  align="center"><strong>SUBGERENTE DE ING. Y CONST. METRO</strong></td>
          <td width="126"  align="center"><div align="center"><strong>PUESTO:</strong></div></td>
          <td  align="center"><strong>SUBGERENTE DE ING. Y CONST. METRO</strong></td>
        </tr>
        <tr>
          <td height="35"  align="center"><div align="center"><strong>FIRMA:</strong></div></td>
          <td  align="center">&nbsp;</td>
          <td  align="center"><div align="center"><strong>FIRMA:</strong></div></td>
          <td  align="center">&nbsp;</td>
        </tr>
        <tr>
          <td  align="center"><div align="center"><strong>N0.FIRMA:</strong></div></td>
          <td  align="center">&nbsp;</td>
          <td  align="center"><div align="center"><strong>N0.FIRMA</strong>:</div></td>
          <td  align="center">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="110" colspan="3" align="center">&nbsp;</td>
    </tr>
</table>
<br>
</body>
</html>

