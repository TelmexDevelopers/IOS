<!DOCTYPE html 
    PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Simple MooTools TabPane component</title>
    <script src="mootools-core-1.4.2.js" type="text/javascript"></script>
    <script src="../Source/TabPane.js" type="text/javascript"></script>
    <script src="../Source/TabPane.Extra.js" type="text/javascript"></script>
    <script src="../../../SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
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

            $('new-tab').addEvent('click', function() {
                var title = $('new-tab-title').get('value');
                var content = $('new-tab-content').get('value');

                if (!title || !content) {
                    window.alert('Title or content text empty, please fill in some text.');
                    return;
                }

                title = new Element('li', {'class': 'tab', text: title}).adopt(new Element('span', {'class': 'remove', html: '&times'}));
				content = new Element('p', {'class': 'content', text: content}).setStyle('display', 'none');
				tabPane.add(title, content);
            });
        });
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
<!--<fieldset>
    <legend>Informaci&oacute;n Sisa</legend>-->   
 <table width="100" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td>Referencia:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="" /></td>
    <td><input type="text" name="SIGLAS_ios" id="SIGLAS_ios" class="combo_pink" value="" /></td>
    <td><input type="text" name="usuario" id="usuario" class="combos_3" value="" /></td>
    <td><input type="text" name="usuario_puntas" id="usuario_puntas" class="combos_3" value="" /></td>
    <td><input type="text" name="direccion" id="direccion" class="combos_3" value="" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">Factibilidad:</td>
    <td><input type="text" name="factibilidad" id="factibilidad" class="combos_3" value="" /></td>
  </tr>
</table>
<!--</fieldset>-->
<div id="demo">
    <ul class="tabs">
        <li class="tab">Sisa </li>
        <li class="tab">Proyecto Equipamiento </li>
        <li class="tab">Proyecto de Fibra &Oacute;ptica </li>
        <li class="tab">Construcci&oacute;n </li>
    </ul>
    <!--DIV DEMO CIERRA-------------------------------------------------------------------------------------------------->
  <!--  </div>-->
    <div class="content">
        <table width="1000" border="0">
  <tr>
    <td>
<fieldset>
    <legend><strong>Informaci&oacute;n Sisa</strong></legend>   
    <table width="950" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td>Empresa:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="NUEVA WAL MART DE M&Eacute;XICO" /></td>
    <td>Tipo_Serv</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="ALT" /></td>
    <td>Edo_Serv:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="ECO" /></td>
    <td>SISA Pend</td>
    <td><input name="Pendiente" type="checkbox" value="" /></td>
  </tr>
  <tr>
    <td>Empresa_UNINET:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="NUEVA WAL MART DE M&Eacute;XICO" /></td>
    <td>Edo_Tramo</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="ECO" /></td>
    <td>Entidad</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="WIFE" /></td>
    <td>Tramo_Afe</td>
    <td><input name="Pendiente" type="checkbox" value="" /></td>
  </tr>
  <tr>
    <td>Puntas:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="A" /></td>
    <td>F Tramo Afe</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="16/04/2012" /></td>
    <td>Entidad Vig:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="" /></td>
    <td>Edo Serv</td>
    <td><input type="text" name="referencia" size="4px" id="referencia" value="" /></td>
  </tr>
  <tr>
    <td>Direcci&oacute;n:</td>
    <td><textarea name="direccion" cols="18" rows="1"></textarea></td>
    <td>Due Date:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="16/04/2012" /></td>
    <td>Tramo:</td>
    <td colspan="3"><input type="text" name="referencia" id="referencia" class="combos_3" value="" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Obs_tramo:</td>
    <td colspan="5"><textarea name="obs_tramo" cols="32" rows="1"></textarea></td>
  </tr>
</table>
</fieldset>
     <table width="950" height="143" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td>GOA:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="" /></td>
    <td>Analiza Ing-Equipo:</td>
    <td><input name="Ing_Equipo" id="Ing_Equipo" type="checkbox" value="" /></td>
    <td>F_OK_Ing-Eqp:</td>
    <td><input type="text" name="F_OK_Ing" id="F_OK_Ing" class="combo_red" value="" /></td>
  </tr>
  <tr>
    <td>Central:</td>
    <td><input type="text" name="referencia" id="referencia" class="combo_pink" value="" /></td>
    <td>Zona:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="" /></td>
    <td>N_ctrl:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="" /></td>
  </tr>
  <tr>
    <td>Grupo de Proyecto:</td>
    <td><input type="text" name="referencia" id="referencia" class="combo_green" value="" /></td>
    <td>Edo_proy_RDA:</td>
    <td><input type="text" name="referencia" id="referencia" class="combo_green" value="" /></td>
    <td>Observaciones:</td>
    <td><textarea name="obs_tramo" cols="32" rows="1">&nbsp;</textarea></td>
  </tr>
  <tr>
    <td>Fecha_prog:</td>
    <td><input type="text" name="referencia" id="referencia" class="combo_green" value="" /></td>
    <td>Vencido:</td>
    <td><input name="Pendiente" type="checkbox" value="" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Documento p&aacute;g. Web:</td>
    <td><input type="text" name="referencia" id="referencia" class="combos_3" value="" /></td>
    <td>Cancelado:</td>
    <td><input name="Pendiente" type="checkbox" value="" /></td>
    <td>&nbsp;</td>
  </tr>
</table>

<table width="100" border="0">
  <tr>
    <td>
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
    <td>
<fieldset>
    <legend><strong>Proyecto:</strong></legend>
     <table width="351" height="43" border="0" class="Texto_Mediano_Negro">
  <tr>
    <td width="103">PrTxStatus:</td>
    <td width="273"><input type="text" name="referencia9" id="referencia9" class="combo_yellow" value="" /></td>
    </tr>
  <tr>
    <td>F Proy Concl:</td>
    <td>
      <input type="text" name="referencia" id="referencia" class="combo_yellow" value="" /></td>
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
  </tr>
</table>
    </td>
  </tr>
</table>
    </div>
    
   <!-- </div>-->
    <div class="content">
<table width="1000" border="0">
  <tr>
    <td width="376" height="175">
  <fieldset>
    <legend><strong>Grupo de Referencias:</strong></legend>
    <table width="273" border="0" class="Texto_Mediano_Negro">
      <tr>
        <td colspan="2" align="right">Principal:
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
        <td colspan="2" align="right">Proyecto Concluido
           <input type="checkbox" name="proyecto_concluido" id="proyecto_concluido" /></td>
        <td colspan="2">F proy Concluido:
        <input type="text" name="Concl" id="Concl" class="combo_green" value="" /></td>
      </tr>
     <!-- <tr>-->
        <td width="302">
  <fieldset>
        <legend><strong>Proyecto Tx Central</strong></legend>
          <table width="300" border="0">
            <tr>
              <td>Proveedor:</td>
              <td><input type="text" name="Proveedor" id="Proveedor" class="combo_green" value="" /></td>
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
              <td><input type="text" name="Proveedor_Inst" id="Proveedor_Inst" class="combo_green" value="" /></td>
            </tr>
          </table>
          </fieldset>
          </td>
          
        <td colspan="3">
<!--Inicio de codigo para cliente----------------------------------------------------------------------------------->
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

<!--fin Codigo cliente------------------------------------------------------------------------------->
</td> 
        </tr>
      <tr>
        <td colspan="4">
            <legend>Colectora</legend>
            <table width="300" border="0" >
              <tr>
                <td>Colectora:</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Trab_Col</td>
                <td><input name="Trab_Col" type="text" id="Trab_Col" size="45" /></td>
              </tr>
            </table>
            <input name="Colectora" id="Colectora" type="text" size="45" />
            <table width="300" border="0">
              <tr>
                <td>TOP FO:</td>
                <td>Anillo ROF:</td>
                <td>Fot1:</td>
                <td>Fot2:</td>
              </tr>
              <tr>
                <td><input name="TOP" id="TOP2"type="text" size="20" /></td>
                <td><input name="TOP2" id="TOP3"type="text" size="15" /></td>
                <td><input name="Fot1" id="TOP4"type="text" size="15" /></td>
                <td><input name="Fot2" id="TOP"type="text" size="15" /></td>
              </tr>
              <tr>
                <td colspan="4">
                		<table width="407" border="0">
                        	<tr>
                            	<td>PrTx Status</td>
                                <td><input name="Status" type="text" size="15" /></td>
                                <td>F meta Term Proy</td>
                                <td><input name="meta" type="text" size="15" /></td>
                                
                            </tr>
                        </table>
                </td>
              </tr>
              <tr>
                <td colspan="4">&nbsp;
                </td>
              </tr>
            </table>
        </fieldset>
        
        
        </td>
        </tr>
    </table>
    <form id="form4" method="post" action="">
      <p><span id="sprycheckbox1">
        <label for="proy"></label>
        <span class="checkboxRequiredMsg"></span></span></p>
    </form></td>
&nbsp;  </tr>
  <tr>
    <td><table width="320" border="0">
      <tr>
        <td>Tipo de Trabajo:</td>
        <td><input type="text" name="referencia6" id="referencia6" class="combos_3" value="" /></td>
      </tr>
      <tr>
        <td>Requiere Trabajo de FO:</td>
        <td><input name="principal2" type="checkbox" value="" /></td>
      </tr>
      <tr>
        <td>F_Req_FO:</td>
        <td><input type="text" name="referencia4" id="referencia4" class="combos_3" value="" /></td>
      </tr>
      <tr>
        <td>Responsable Supervisor:</td>
        <td><input type="text" name="referencia5" id="referencia5" class="combos_3" value="" /></td>
      </tr>
      <tr>
        <td>IPE Proyecto:</td>
        <td><input type="text" name="referencia4" id="referencia5" class="combos_3" value="" /></td>
      </tr>
      <tr>
        <td>Pendiente por Clte_Proy:</td>
        <td><input type="text" name="referencia3" id="referencia3" class="combos_3" value="" /></td>
      </tr>
      <tr>
        <td colspan="2"><fieldset>
          <legend>Puerto Tx:</legend>
          <table width="300" border="0">
            <tr>
              <td>Requiere Pto Tx</td>
              <td><input type="text" name="referencia2" id="referencia2" class="combos_3" value="" /></td>
            </tr>
            <tr>
              <td>F_Req Pto Tx</td>
              <td><input type="text" name="referencia2" id="referencia2" class="combos_3" value="" /></td>
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
          <legend>Intra SISA</legend>
            <table width="300" border="0">
              <tr>
                <td><input type="text" name="Carga" id="Carga" class="combos_3" value="" /></td>
                <td>Carga Mat. OK</td>
                </tr>
              <tr>
                <td><input type="text" name="Asig" id="Asig" class="combos_3" value="" /></td>
                <td>Asig. PEP</td>
                </tr>
              <tr>
                <td><input type="text" name="45" id="45" class="combos_3" value="" /></td>
                <td>Asig. P-45</td>
                </tr>
              </table>
      </fieldset>        
              </td>
          <td>
     <fieldset>
          <legend>Anexos</legend>
            <table width="300" border="0">
              <tr>
                <td><input type="text" name="OK" id="OK" class="combos_3" value="" /></td>
                <td>OT´s OK</td>
                </tr>
              <tr>
                <td><input type="text" name="Anexos" id="Anexos" class="combos_3" value="" /></td>
                <td>Anexos OK</td>
                </tr>
              <tr>
                <td><input type="text" name="Pag" id="Pag" class="combos_3" value="" /></td>
                <td>Pag. Web OK</td>
                </tr>
              </table>
       </fieldset>       
              </td>
          <td><legend>Gesti&oacute;n:</legend>
            <table width="300" border="0">
              <tr>
                <td><input type="text" name="referencia8" id="referencia8" class="combos_3" value="" /></td>
                <td>Sol_CLLI</td>
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
              </table></td>
          </tr>
        </table>
      </td>
  </tr>
  <tr>
    <td>Observaciones de Proyecto:</td>
    <td><form id="form3" method="post" action="">
      <p>
        <label for="obs"></label>
        <textarea name="obs" id="obs" cols="80" rows="5" tabindex="20"></textarea>
        </p>
      </form></td>
  </tr>
</table>
    </div>
    
    <div class="content">
					<table width="1000" border="0">
  <tr>
    <td width="338"><fieldset><legend></legend>
    		<table width="336" border="0">
            <tr>
            	<td width="130">Requierimiento:</td>
                <td width="190"><input type="text" name="Requierimiento" id="Requierimiento" class="combos_3"  /></td>
            </tr>
            <tr>
            	<td>Edp.Acometida</td>
                <td><input type="text" name="Acometida" id="Acometida" class="combos_3" value="insertar combo" /></td>
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
    		<table width="613" border="0"> 
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
    <td><fieldset><legend>Planificaci&oacute;n</legend>
    		<table width="336" border="0">
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
    <td><fieldset><legend>Proyectos</legend>
    		<table width="592" border="0">
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
                <td><input type="text" name="Problematica1" id="Problematica1" class="combos_3"  /></td>
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
                <td><input type="text" name="Envio" id="Envio" class="combos_3"  /></td>
                <td>FO Cancel</td>
                <td><form id="form1" name="form1" method="post" action="">
                  <input type="checkbox" name="fo_cancel" id="fo_cancel" />
                  <label for="fo_cancel"></label>
                </form></td>
              </tr> 
          
            <tr>
            	<td>Fecha Ent 50</td>
                <td><input type="text" name="Ent" id="Ent" class="combos_3"  /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                
            </tr>
            <tr>
            	  <td>&nbsp;</td>
            	  <td><form id="form2" name="form2" method="post" action="">
            	    <input type="submit" name="solicitud" id="solicitud" value="Solicitud de Planificacion " />
          	    </form></td>
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
    		<table width="550" border="0">    
				<tr>
                	<td colspan="4">
                    	<table width="600" border="0">
                        		<tr>
                                    
                                    <td width="74">FOt1</td>
                                    <td width="34" ><input name="FOt" type="text" size="5" maxlength="25" /></td>
                                    <td width="42">Fot2</td>
                                    <td width="40"><input name="FOt2" type="text" size="5" maxlength="25" /></td>
                                    <td width="102">Clte FO</td>
                                    <td width="30"><input name="FOt3" type="text" size="5" maxlength="25" /></td>
                                    <td width="45"><input name="FOt4" type="text" size="5" maxlength="25" /></td>
                                    <td width="40">Tipo</td>
                                    <td width="155"><input type="text" name="Tipo" id="Tipo" class="combos_3" value= "COMBO" /></td>
                                <tr>
                                
                        </table>
                    </td>
                 
              </tr>
                <tr>
                	<td>FO Const Estatus</td>
                    <td><input type="text" name="Const" id="Const" class="combos_3" VALUE= "COMBO" /></td>
                    <td>F ini real</td>
                    <td><input type="text" name="ini" id="ini" class="combos_3"  /></td>
                </tr>
                 <tr>
                	<td>Problematica</td>
                    <td><input type="text" name="Problematica" id="Problematica" class="combos_3" VALUE= "COMBO" /></td>
                    <td>F remate fo</td>
                    <td><input type="text" name="remate" id="remate" class="combos_3"  /></td>
                </tr>
                 <tr>
                	<td>Anillo ROF</td>
                    <td><input type="text" name="Anillo" id="Anillo" class="combos_3"  /></td>
                    <td>Sup cons</td>
                    <td><input type="text" name="Sup" id="Sup" class="combos_3"  /></td>
                </tr>
                 <tr>
                	<td>SubAnillo Fi</td>
                    <td><input type="text" name="SubAnillo" id="SubAnillo" class="combos_3"  /></td>
                    <td>f entrega fo</td>
                    <td><input type="text" name="entrega" id="entrega" class="combos_3"  /></td>
                </tr>
                 <tr>
                	<td>PES</td>
                    <td><input type="text" name="PES" id="PES" class="combos_3"  /></td>
                    <td>Atenuacion Resp</td>
                    <td><input type="text" name="Atenuacion" id="Atenuacion" class="combos_3"  /></td>
                </tr>
                 <tr>
                	<td>Atenuacion Trab</td>
                    <td><input type="text" name="Atenuacion" id="Atenuacion" class="combos_3"  /></td>
                    <td>Longitud Resp</td>
                    <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
                </tr>
                 <tr>
                	<td>Longitud Trap</td>
                    <td><input type="text" name="Longitud" id="Longitud" class="combos_3"  /></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
    </fieldset>
    
    
    </td>
  </tr>
  
</table>
    </div>
    <div class="content">
     
    
<div>

<!---div de construccion-------------------------------->
					<table width="500" border="0">
                        <tr>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="2">
                          		<table width="939" border="0">                                	<tr>
                                		<td width="90">Const Status</td>
                                        <td width="111"><input name="Const" type="text" size="15" /></td>
                                        <td width="153">F meta Term Const</td>
                                        <td width="120"><input name="meta" type="text" size="15" /></td>				 <td width="196">Pendiente por Clte Const</td>
                                        <td width="243"><input name="Pendiente" type="text" size="15" /></td>
                                	<tr>
                                </table>
                          </td>
                        </tr>
                        <tr>
                       	  <td>
                          <fieldset><legend><strong>Equipamiento Central</strong></legend>
                                <table width="624" border="0">
                                		<tr>
                                        	<td width="135"><input name="instalacion" type="text" size="15" /></td>
                                            <td width="107">Instalaci&oacute;n</td>
                                            <td width="93"><input name="insta_acceso" type="text" size="15" /></td>
                                            <td width="235">Instalacion Eq. Acceso</td>
                                        </tr>
                                        <tr>
                                        	<td><input name="Entrega_gestion" type="text" size="15" /></td>
                                            <td>Entrega y Gestion Col.</td>
                                            <td><input name="ent_acceso" type="text" size="15" /></td>
                                            <td>Enrega Eq. Acceso</td>
                                        </tr>
                                        <tr>
                                        	<td><input name="Integra_colectora" type="text" size="15" /></td>
                                          <td>Integracion Colectora</td>
                                            <td><input name="Gestion" type="text" size="15" /></td>
                                            <td>Gesti&oacute;n Eq. Acceso</td>
                                        </tr>
                                        <tr>
                                        	<td><input name="enlace_Adva" type="text" size="15" /></td>
                                            <td>Enlace Adva-Colectora</td>
                                            <td><input name="Enlace" type="text" size="15" /></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                </table>
                             </fieldset>
                          </td>
                            <td>
                            <fieldset><legend>Rechazo por Proyecto</legend>
                          		<table width="400" border="0">      
                                     <tr>
                                          <td width="179" align="center"><input type="submit" name="btn" id="btn" value="BTN" /></td>
                                          <td width="96">Cont Rech</td>
                                          <td width="211"><input name="Cont" type="text" size="15" /></td>
                                    </tr>
                                    <tr>
                                          <td>&nbsp;</td>
                                          <td>Fecha Rech:</td>
                                          <td><input name="Fecha" type="text" size="15" /></td>
                                    </tr>
                                    <tr>
                                          <td>&nbsp;</td>
                                          <td>Motivo:</td>
                                          <td><input name="Motivo" type="text" size="25" /></td>
                                    </tr>
                                </table>
                                </fieldset>
                            </td>
                           
                        </tr>
                        <tr>
                        	<td>
                            <fieldset><legend><strong>Cliente</strong></legend>
                            	<table width="500" border="0">
                                
                                		<tr>
                                       	  <td><input name="inst" type="text" size="15" /></td>
                                          <td>Instalaci&oacute;n</td>
                                        </tr>
                                        
                                        <tr>
                                       	  <td><input name="alimentacion" type="text" size="15" /></td>
                                          <td>Alimentaci&oacute;n Entrega</td>
                                        </tr>
                                        <tr>
                                       	  <td><input name="Inst_eq" type="text" size="15" /></td>
                                          <td>Instalaci&oacute;n Eq. Acceso</td>
                                        </tr>
                                        <tr>
                                       	  <td><input name="Entrega_Eq" type="text" size="15" /></td>
                                          <td>Entrega Eq. Acceso</td>
                                        </tr>
                                        <tr>
                                       	  <td><input name="Gestion" type="text" size="15" /></td>
                                          <td>Gestion Eq. Acceso(FRIDA/Gesti&oacute;n NX)</td>
                                        </tr>
                                </table>
                                </fieldset>
                            </td>
                            <td><textarea name="comentario2" cols="40" rows="10"></textarea></td>
                        </tr>
                     </table>
<!-----Fin de div de construccion -------------------------------------------------------------------------->
    
    
</div></div></div>

<script type="text/javascript">
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
</script>
</body>

</html>
