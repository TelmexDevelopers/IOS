<?php 

////////////////////////////////////////////////////////////////////
// LIBRERIA DE FUNCIONES PARA EL FUNCIONAMIENTO ENRAL DEL SISTEMA //
////////////////////////////////////////////////////////////////////

//VERIFICA DATOS DE USUARIO Y CREA SESIONES DE INGRESO AL SISTEMA

function ValidaUsuario($usuario,$password)
{
	$SQL = "SELECT id_Usuario,id_Tipo_Usuario,id_Area_Responsable,str_Nombre,str_Ap_Paterno,str_Ap_Materno,id_filial FROM cat_Usuarios WHERE str_Login = '".$usuario."' AND str_Password = '".$password."'"  ;
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
		if ($num_registros > 0) {
			session_start();
			session_regenerate_id();
			$_SESSION["logged_in"] = "is_set";
			$_SESSION["id_Usuario"] = $RS->fields(0);
			$_SESSION["id_Tipo_Usuario"] = $RS->fields(1);
			$_SESSION["id_Area_Responsable"] = $RS->fields(2);
			$nombre_usuario = htmlentities(ucwords(strtolower($RS->fields(3)." ".$RS->fields(4)." ".$RS->fields(5))));
			if ($RS->fields(6) != "")
			{
				$_SESSION["id_Filial"] = $RS->fields(6);
			}
			$SQL_Bitacora = "INSERT INTO tb_bitacora_accesos (id_Usuario,id_Tipo_Usuario, id_Area_Responsable, str_IP_User, str_IP_Server, str_Navegador_User, str_URL_Script, session_string) VALUES (".$_SESSION["id_Usuario"].",".$_SESSION["id_Tipo_Usuario"].",".$_SESSION["id_Area_Responsable"].",'".$_SERVER["REMOTE_ADDR"]."','".$_SERVER["SERVER_ADDR"]."','".$_SERVER["HTTP_USER_AGENT"]."','".$_SERVER["PHP_SELF"]."','".session_id()."')";
			//echo $SQL_Bitacora; 
			$db = AbrirConexion();
			$RS_Bitacora = $db->Execute($SQL_Bitacora);
			$insert_ID = $db->Insert_ID();
			$_SESSION["id_Acceso"] = $insert_ID;
			
			$html = 'Bienvenido<br />'.$nombre_usuario.'';
		} else {
			$_SESSION["logged_in"] = "";
			$_SESSION["id_Usuario"] = "";
			$_SESSION["id_Tipo_Usuario"] = "";
			$_SESSION["id_Area_Responsable"] = "";
			$_SESSION["id_Filial"] = "";
			$_SESSION["id_Acceso"] = "";
			session_unset();
			$html = "Datos de Usuario Incorrectos!";
		}
	$json = array('mensaje' => $html, 'registros' => $num_registros);
	
	return json_encode($json);
}


//REVISA SESIONES, PARA EL INGRESO AL SISTEMA
function CheckSession()
{
//	echo "hola";
//	echo "logged_in: ".$_SESSION["logged_in"]."<br />";
//	echo "id_Usuario: ".$_SESSION["id_Usuario"]."<br />";
//	echo "id_Tipo_Usuario: ".$_SESSION["id_Tipo_Usuario"]."<br />";
//	echo "id_Area_Responsable: ".$_SESSION["id_Area_Responsable"]."<br />";

	if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] != "is_set" || !isset($_SESSION["id_Usuario"]) || $_SESSION["id_Usuario"] == "" || !isset($_SESSION["id_Tipo_Usuario"]) || $_SESSION["id_Tipo_Usuario"] == "" || !isset($_SESSION["id_Area_Responsable"]) || $_SESSION["id_Area_Responsable"] == "" || !isset($_SESSION["id_Acceso"]) || $_SESSION["id_Acceso"] == "" )
	{
		header('Location: .../iosphp/TELMEX_IOS/logout.php');
	}
}

function CreaHeader()
{
	session_start();
	if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == "is_set" && isset($_SESSION["id_Tipo_Usuario"]) && $_SESSION["id_Area_Responsable"] != "" )
	{
		$id_Tipo_Usuario=    $_SESSION["id_Tipo_Usuario"];
		$id_Area_Responsable=$_SESSION["id_Area_Responsable"];
		
		/////////////////////////////////////			
		$html = '
				<!--INICIA HEADER-->
				<div id="botonera">
					<div class="boton" style="width:80px;">
						<a href=".../iosphp/TELMEX_IOS/Busqueda_Principal/inicio.php">Home</a>
					</div>
				';
				
		/////////////////////////////////////
		
        	    if ($id_Tipo_Usuario == 1 || $id_Tipo_Usuario == 2 || $id_Tipo_Usuario == 3  )
				{ 					
 	$html .= '
					<div class="boton">
						<a href="javascript:void(0);">Seguimiento Servicios</a>
							<div>
								<ul>
									<li>
										<a href=".../iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_Principal_1.php">Servicios</a>
									</li>
									<li>
										<a href=".../iosphp/TELMEX_IOS/asignacion_ipe/index.php">Asignaci&oacute;n IPE</a>
									</li>';
							if ($id_Area_Responsable == 4)
							{
								if ($_SESSION["id_Usuario"] == 19 || $_SESSION["id_Usuario"] == 22  )
								{
								$html .= '
									<li>
										<a href=".../iosphp/TELMEX_IOS/asignacion_responsables/index.php">Asignaci&oacute;n Responsables</a>
									</li>';
								}
							}
								$html .= '
									<li>
						<a href=".../iosphp/TELMEX_IOS/Busqueda_Principal/consulta_x_referencia.php">Consulta por Referencia</a>
									</li>
								</ul>
							</div>
					</div>
					';
					
					$html .= '
					<div class="boton">
						<a href="javascript:void(0);">Control TE</a>
							<div>
								<ul>
									<li>
										<a href=".../iosphp/TELMEX_IOS/tiempo_extra/index.php">Carga de Tiempo Extra</a>
									</li>
								</ul>
							</div>
					</div>
					';
				}
					
				if ($id_Tipo_Usuario == 4 || $id_Tipo_Usuario == 1 || $id_Tipo_Usuario == 2 || $id_Tipo_Usuario == 3)
		 		 { 
		 			 if ($id_Area_Responsable == 4)
							{
		$html .= '
					<div class="boton">
						<a href="javascript:void(0);">Seguimiento OT&apos;s</a>
							<div>
								<ul>	
									<li>
										<a href=".../iosphp/ios/busq_esp/Formularios_OT/busqueda_ot.php">Consulta de OT&apos;s</a>
									</li>
									<li>
										<a href=".../iosphp/ios/busq_esp/Formularios_OT/orden_trabajo.php">Generaci&oacute;n de Nueva OT</a>
									</li>
								</ul>
							</div>
					</div>
					';
						    }
					}		
					$html .= '
					<div class="boton">
						<a href="javascript:void(0);">Reportes</a>
							<div>
								<ul>
									<li>
										<a href="javascript:void(0);">Reportes</a>
									</li>
								</ul>
							</div>
					</div>
					';
					$html .= '
					<div class="boton">
						<a href="javascript:void(0);">Alarmas</a>
							<div>
								<ul>
									<li>
										<a href="javascript:void(0);">Alarmas</a>
									</li>
								</ul>
							</div>
					</div>
					';
					$html .= '
					<div class="boton">
						<a href="javascript:void(0);">Equipamiento</a>
							<div>
								<ul>
									<li>
					<a href=".../iosphp/TELMEX_IOS/Busqueda_Principal/Equipamiento_FO_combos.php">M&oacute;dulo Equipamiento</a>
									</li>
								</ul>
							</div>
					</div>
					';
						  
		
 
		         
//		$html .= '
//					<div class="boton">
//						<a href="javascript:void(0);">Extras</a>
//							<div>
//								<ul>
//									<li>
//										<a href="javascript:void(0);">Gestion de Documentos</a>
//									</li>
//									<li>
//										<a href="javascript:void(0);">Control Vehicular</a>
//									</li>
//								</ul>
//							</div>
//					</div>
//					';
					
		/////////////////////////////////////			
		$html .= '
				</div>
				<!--TERMINA HEADER-->
		';
		/////////////////////////////////////	
		
		return strval($html);
				
	}
}


function CloseSession()
{
	$_SESSION["logged_in"] = "";
	$_SESSION["id_Usuario"] = "";
	$_SESSION["id_Tipo_Usuario"] = "";
	$_SESSION["id_Area_Responsable"] = "";
	$_SESSION["id_Filial"] = "";
	$_SESSION["id_Acceso"] = "";

	session_unset();
	
	header('Location: .../iosphp/TELMEX_IOS/index.php');
}

function opciones_usuarios($tipo_usuario,$area_responsable,$valor_seleccionado)
{
	if ($tipo_usuario != "")
	{
	$SQL = "SELECT * FROM cat_usuarios WHERE id_Tipo_Usuario IN (".$tipo_usuario.")";
	
	if ($area_responsable != '')
	{
		$SQL .=  " AND id_Area_Responsable IN (".$area_responsable.")";
	}
	 
	$SQL .= " ORDER BY str_Nombre ASC";
	
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	$html = "";
	while (!$RS->EOF)
	{
		$id = $RS->fields(0);
		$nombre = htmlentities(ucwords(strtolower(strval($RS->fields(1)." ".$RS->fields(2)." ".$RS->fields(3)))));
		$html .= '<option value="'.$id.'"';
		if($id == $valor_seleccionado)
		{
			$html .= ' selected="selected"';
		}
		$html .= '>'.$nombre.'</option>';

		$RS->MoveNext();
	}
		$RS->Close();
		$RS = NULL;
	return strval($html);
	}
}


function imprime_combo_ipe_TE()
{
	$html = '<select name="ipe" id="ipe" class="required"><option value="">Seleccione</option>';
	$html .= opciones_usuarios(4, '','');
	$html .= '</select>';
	return strval($html);
}


function imprime_combo_ipe_Supervisor()
{
	$html = '<select name="supervisor" id="supervisor"><option value="">Seleccione</option>';
	$html .= opciones_usuarios(4, '','');
	$html .= '</select>';
	return strval($html);
}

function Trae_Datos_IPE_TE($id_Usuario_IPE)
{
	$SQL = "
		SELECT		a.id_Usuario, a.str_Expediente, 
					CONCAT(b.str_Nombre,' ',b.str_Ap_Paterno,' ',b.str_Ap_Materno) as str_Nombre_Sup,
					CONCAT(c.str_Nombre,' ',c.str_Ap_Paterno,' ',c.str_Ap_Materno) as str_Nombre_SG
		FROM		cat_usuarios a
		LEFT JOIN	cat_usuarios b on b.id_Usuario = a.id_Usuario_Jefe_Inmediato
		LEFT JOIN	cat_usuarios c on c.id_Usuario = b.id_Usuario_Jefe_Inmediato
		WHERE		a.id_Usuario = '".$id_Usuario_IPE."'
		LIMIT 1
	";
	//echo $SQL;
	$RS = TraeRecordset($SQL);

	if (!$RS)
	{
		die('Error en DB!');
	} else {
	
			$json = array('id_Usuario_IPE' => $RS->fields(0), 'str_Expediente' => $RS->fields(1), 'str_Nombre_Sup' => htmlentities($RS->fields(2)), 'str_Nombre_SG' => htmlentities($RS->fields(3)));
		$RS->Close();
		$RS = NULL;
		return json_encode($json);
	}
}

function Combo_Motivos_TE($valor_seleccionado)
{
	$SQL = "SELECT * FROM cat_Motivos_TE ORDER BY str_Motivo_TE ASC"  ;
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');

	$html = '<select name="motivos" id="motivos" style="width:380px" class="required"><option value="">Seleccione</option>';
	
	while (!$RS->EOF)
	{
		$id = $RS->fields(0);
		$valor = ucwords(strtolower(htmlentities($RS->fields(1))));
		
		$html .= '<option value="'.$id.'"';
		if($id == $valor_seleccionado)
		{
			$html .= ' selected="selected"';
		}
		$html .= '>'.$valor.'</option>';
		$RS->MoveNext();

	}
	$html .= '</select>';
		$RS->Close();
		$RS = NULL;
	return strval($html);
	
	
}
function Update_PWD($id_Usuario,$nombre_usuario,$old_pwd,$new_pwd_1,$new_pwd_2)
{
	if ($id_Usuario != "" && $nombre_usuario != "" && $old_pwd != "" && $new_pwd_1 != "" && $new_pwd_2 != "")
	{
		if ($new_pwd_1 == $new_pwd_2)
		{
			$sql = "UPDATE cat_Usuarios SET str_Password = '".$new_pwd_1."' WHERE id_Usuario = '".$id_Usuario."' AND str_Login = '".$nombre_usuario."' AND str_Password = '".$old_pwd."'";
			echo $sql;
			//$RS = EjecutaQuery($SQL);
			
			if ($RS == true)
			{
				$html = "Contrase&ntilde;a Actualizada Exitosamente!";
			} else {
				$html = "Error en Actualizacion de Contrase&ntilde;a!";
				
			}
			echo $html;
		} else {
			echo "los datos de nueva contrase&ntilde;a no coinciden!!!";	
		}
	} else {
		echo "Error en Datos!";	
	}
}

function Redirect($id_Area_Responsable,$id_Tipo_Usuario)
{
	switch($id_Area_Responsable)
	{
		case 1: //ANALISIS
			$location = 'Location: .../Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 2: //DOCUMENTACION
			$location = 'Location: .../Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 3: //SEGUIMIENTO
			$location = 'Location: /Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 4: //ENTREGA
			$location = 'Location: /Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 5: //EQUIPAMIENTO FO
			$location = 'Location: /Busqueda_Principal/Equipamiento_FO_combos.php';
		break;
		case 6: //EQUIPAMIENTO HDSL
			$location = 'Location: /Busqueda_Principal/Equipamiento.php';
		break;
		case 7: //EQUIPAMIENTO RADIO
			$location = 'Location: /Busqueda_Principal/Equipamiento.php';
		break;
		case 9: //CONSTRUCCION LP
			$location = 'Location: /Busqueda_Principal/Equipamiento.php';
		break;
		case 10: //SEGUIMIENTO CNS
			$location = 'Location: /Busqueda_Principal/Busqueda_CNS.php';
		break;
		case 12: //SEGUIMIENTO ALE
			$location = 'Location: /Modulo_ALE_search/index.php';
		break;
		case 21: //CONSTRUCCION FO
			$location = 'Location: /Busqueda_Principal/Equipamiento_FO_combos.php';
		break;
		case 24: //FILIAL
			$location = 'Location: telmex/Busqueda_Principal/filial_search_ref.php';
		break;
		default:
			$location = 'Location: /Busqueda_Principal/Busqueda_Principal.php';
		break;
	}
	//echo $location;
	header($location);
}


function Print_Detalle_Equipamiento($referencia)
{
	$html = '';
	if ($referencia != "")
	{
	$SQL="SELECT referencia, id_tramos,ref_tramo, edo_tramo, coordinacion_abrev, DATE_FORMAT(fecha_afect,'%Y-%m-%d') as fecha_afect FROM tb_tramos WHERE referencia = '".$referencia."' AND coordinacion_abrev = 'WIFE'";
	
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	$cuantos = $RS->RecordCount();
	
	$html = '
<div>
	<input id="ac-12" name="accordion-1" type="checkbox" style="visibility:hidden"  />
	<label for="ac-12">Detalle Equipamiento FO (WIFE)<br/><br></label>
	  <article class="ac-medium">
      <br />
	  <center>
		';
	if ($cuantos > 0)
	{
		$html .= '
		  <table width="700" border="0" align="center" class="Texto_Mediano_Blanco">
			<tr align="center" bgcolor="#000066">
				<td>Referencia</td>
				<td>Estado del Tramo</td>
				<td>Coordinaci&oacute;n Abrev</td>
				<td>Fecha Afectaci&oacute;n</td>
			</tr>';
	
		while (!$RS->EOF)
		{
			$referencia = $RS->fields(0);
			$id_tramos = $RS->fields(1);
			$ref_tramo = $RS->fields(2);
			$edo_tramo = $RS->fields(3);
			$coordinacion_abrev = $RS->fields(4);
			$fecha_afect = $RS->fields(5);
			$js_equipamiento_tramo = '<a href="javascript:detalle_eq_tramo('.$id_tramos.');">'.$ref_tramo.'</a>';
			
		$html .= '        
			<tr align="center">
				<td class="Texto_Mediano_Negro">'.$js_equipamiento_tramo.'</td>
				<td class="Texto_Mediano_Negro">'.$edo_tramo.'</td>
				<td class="Texto_Mediano_Negro">'.$coordinacion_abrev.'</td>
				<td class="Texto_Mediano_Negro">'.$fecha_afect.'</td>
			</tr>';
			
	
			$RS->MoveNext();
		}
			$RS->Close();
			$RS = NULL;
		
		$html .= '
		</table>
		';
			
	} else {
		$html .= '<br /><br /><table width="700" border="0" class="Titulo_Gris">
<tr><td align="center"><b>La referencia no tiene tramos afectados</b></td></tr></table>';
	}
	
	$html .= '
	</center>
    <br />
    </article>
</div>
	';
	}
	
	return strval($html);
}

function estilo_semaforo($area_responsable,$valor)
{
	if ($valor != "")
	{
		 switch($area_responsable)
		 {
			case 1:
			   if ($valor == 1)
			   {
				   $class= 'class="combo_green"';
			   } else if ($valor >= 2){
				   $class= 'class="combo_yellow"';
			   } else if ($valor > 2){
				   $class= 'class="combo_red"';
			   }
			break;
			case 2:
			   if ($valor == 1)
			   {
				   $class= 'class="combo_green"';
			   } else if ($valor >= 2){
				   $class= 'class="combo_yellow"';
			   } else if ($valor > 2){
				   $class= 'class="combo_red"';
			   }
			break;
			case 3:
//			   if ($valor == 0)
//			   {
//				   $class= 'class="combo_green"';
//			   } else if ($valor >= 1 && $valor <= 2){
//				   $class= 'class="combo_yellow"';
//			   } else if ($valor > 2){
//				   $class= 'class="combo_red"';
//			   }
			break;
			case 4:
			   if ($valor <=4)
			   {
				   $class= 'class="combo_green"';
			   } else if ($valor >= 5 && $valor <= 6){
				   $class= 'class="combo_yellow"';
			   } else if ($valor > 6){
				   $class= 'class="combo_red"';
			   }
			break;
			case 5:
			   if ($valor <=14)
			   {
				   $class= 'class="combo_green"';
			   } else if ($valor >= 15 && $valor <= 20){
				   $class= 'class="combo_yellow"';
			   } else if ($valor > 20){
				   $class= 'class="combo_red"';
			   }
			break;
			case 21:
			   if ($valor <=14)
			   {
				   $class= 'class="combo_green"';
			   } else if ($valor >= 15 && $valor <= 21){
				   $class= 'class="combo_yellow"';
			   } else if ($valor > 21){
				   $class= 'class="combo_red"';
			   }
			break;
			default:
			
			break;
		 }
	} else {
		$class = "";
	}
	
	return strval($class);      
}

///////////////////////////////////////////////////FORMULARIO DE SEMÁFOROS/////////////////////////////////////////////////////////////////////////////////
function Form_Dilaciones($referencia,$ser_n)
{
	if ($referencia != "" && $ser_n != "")
	{
	$arreglo_valores = array();
 	$arreglo_areas_responsables = array(1, 2, 3, 4, 5, 21);

	foreach ($arreglo_areas_responsables as $i => $value)
	{
//		$SQL= "CALL SP_CALCULA_DILACION (".$value.",'".$referencia."','".$ser_n."');";
//		$RS = TraeRecordset($SQL);
//		if (!$RS) die('Error en DB!');
		
//		$val_0 = $RS->fields(0);
//		$val_1 = $RS->fields(1);
//		$val_2 = $RS->fields(2);
	
//		switch($value)
//		{
//			case 1:
//				$dilacion_analisis = $val_0;
//				$fecha_ini_analisis = $val_1;
//				$fecha_fin_analisis = $val_2;
//			break;	
//			case 2:
//				$dilacion_documentacion = $val_0;
//				$fecha_ini_documentacion = $val_1;
//				$fecha_fin_documentacion = $val_2;
//			break;	
//			case 3:
//				$dilacion_seguimiento = $val_0;
//				$fecha_ini_seguimiento = $val_1;
//				$fecha_fin_seguimiento = $val_2;
//			break;	
//			case 4:
//				$dilacion_entrega = $val_0;
//				$fecha_ini_entrega = $val_1;
//				$fecha_fin_entrega = $val_2;
//			break;	
//			case 5:
//				$dilacion_equipa = $val_0;
//				$fecha_ini_equipa = $val_1;
//				$fecha_fin_equipa = $val_2;
//			break;	
//			case 21:
//				$dilacion_construccion = $val_0;
//				$fecha_ini_construccion = $val_1;
//				$fecha_fin_construccion = $val_2;
//			break;	
//		}
//		sleep(1);
//		$RS->Close();
//		$RS = NULL;

	}
	
	$html = '
<div>
	<input id="ac-13" name="accordion-1" type="checkbox" style="visibility:hidden"  />
	<label for="ac-13">Semaforos de Dilacion por Area Responsable <br/><br></label>
	  <article class="ac-medium">
      <br />
	  <center>
		';
		$html .= '
<table width="650" height="150" border="0" align="center" class="Texto_Mediano_Negro">
  <tr align="center" bgcolor="#000066" class="Texto_Mediano_Blanco">
    <td>Area</td>
    <td>Dilaci&oacute;n</td>
    <td>Fecha Inicio</td>
    <td>Fecha Fin</td>
  </tr>
  <tr>
    <td>An&aacute;lisis</td>
    <td align="center"><input type="text" name="dilacion_analisis" id="dilacion_analisis" value = "'.$dilacion_analisis.'" '.estilo_semaforo(1,$dilacion_analisis).' /></td>
    <td align="center"><input type="text" name="fecha_fin_analisis" id="fecha_fin_analisis" value = "'.$fecha_ini_analisis.'" '.estilo_semaforo(1,$fecha_ini_analisis).' /></td>
    <td align="center"><input type="text" name="fecha_fin_analisis" id="fecha_fin_analisis" value = "'.$fecha_fin_analisis.'" '.estilo_semaforo(1,$fecha_fin_analisis).' /></td>
  </tr>
  <tr>
    <td>Seguimiento</td>
    <td align="center"><input type="text" name="dilacion_seguimiento" id="dilacion_seguimiento" value = "'.$dilacion_seguimiento.'" '.estilo_semaforo(3,$dilacion_seguimiento).' /></td>
    <td align="center"><input type="text" name="fecha_fin_seguimiento" id="fecha_fin_seguimiento" value = "'.$fecha_ini_seguimiento.'" '.estilo_semaforo(3,$fecha_ini_seguimiento).' /></td>
    <td align="center"><input type="text" name="fecha_fin_seguimiento" id="fecha_fin_seguimiento" value = "'.$fecha_fin_seguimiento.'" '.estilo_semaforo(3,$fecha_fin_seguimiento).' /></td>
  </tr>
  <tr>
    <td>Documentaci&oacute;n</td>
    <td align="center"><input type="text" name="dilacion_documentacion" id="dilacion_documentacion" value = "'.$dilacion_documentacion.'" '.estilo_semaforo(2,$dilacion_documentacion).' /></td>
    <td align="center"><input type="text" name="fecha_fin_documentacion" id="fecha_fin_documentacion" value = "'.$fecha_ini_documentacion.'" '.estilo_semaforo(2,$fecha_ini_documentacion).' /></td>
    <td align="center"><input type="text" name="fecha_fin_seguimiento" id="fecha_fin_seguimiento" value = "'.$fecha_fin_documentacion.'" '.estilo_semaforo(2,$fecha_fin_documentacion).' /></td>
  </tr>
  <tr>
    <td>Equipamiento</td>
    <td align="center"><input type="text" name="dilacion_equipa" id="dilacion_equipa" value = "'.$dilacion_equipa.'" '.estilo_semaforo(5,$dilacion_equipa).' /></td>
    <td align="center"><input type="text" name="fecha_fin_equipa" id="fecha_fin_equipa" value = "'.$fecha_ini_equipa.'" '.estilo_semaforo(5,$fecha_ini_equipa).' /></td>
    <td align="center"><input type="text" name="fecha_fin_equipa" id="fecha_fin_equipa" value = "'.$fecha_fin_equipa.'" '.estilo_semaforo(5,$fecha_fin_equipa).' /></td>
  </tr>
  <tr>
    <td>Entrega</td>
    <td align="center"><input type="text" name="dilacion_entrega" id="dilacion_entrega" value = "'.$dilacion_entrega.'" '.estilo_semaforo(4,$dilacion_entrega).' /></td>
    <td align="center"><input type="text" name="fecha_fin_entrega" id="fecha_fin_entrega" value = "'.$fecha_ini_entrega.'" '.estilo_semaforo(4,$fecha_ini_entrega).' /></td>
    <td align="center"><input type="text" name="fecha_fin_seguimiento" id="fecha_fin_seguimiento" value = "'.$fecha_fin_entrega.'" '.estilo_semaforo(4,$fecha_fin_entrega).' /></td>
  </tr>
  <tr>
    <td>Construccion</td>
    <td align="center"><input type="text" name="dilacion_construccion" id="dilacion_construccion" value = "'.$dilacion_construccion.'" '.estilo_semaforo(21,$dilacion_construccion).' /></td>
    <td align="center"><input type="text" name="fecha_fin_construccion" id="fecha_fin_construccion" value = "'.$fecha_ini_construccion.'" '.estilo_semaforo(21,$fecha_ini_construccion).' /></td>
    <td align="center"><input type="text" name="fecha_fin_seguimiento" id="fecha_fin_seguimiento" value = "'.$fecha_fin_construccion.'" '.estilo_semaforo(21,$fecha_fin_construccion).' /></td>
  </tr>
</table>';

	$html .= '
	</center>
    <br /> 
    </article>
</div>
	';		
	}
		return strval($html);

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
?>