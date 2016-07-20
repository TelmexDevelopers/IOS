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
		header('Location: http://10.94.130.36/iosphp/TELMEX_IOS/logout.php');
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
					<!--<a href="inicio.php">Home</a>-->
						<a href="http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/inicio.php">Home</a>
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
										<a href="http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/inicio.php">Servicios</a>
									</li>
									<li>
										<a href="http://10.94.130.36/iosphp/TELMEX_IOS/asignacion_ipe/index.php">Asignaci&oacute;n IPE</a>
									</li>';
							if ($id_Area_Responsable == 4)
							{
								if ($_SESSION["id_Usuario"] == 19 || $_SESSION["id_Usuario"] == 22  )
								{
								$html .= '
									<li>
										<a href="http://10.94.130.36/iosphp/TELMEX_IOS/asignacion_responsables/index.php">Asignaci&oacute;n Responsables</a>
									</li>';
								}
							}
								$html .= '
								</ul>
							</div>
					</div>
					';
					
					$html .= '
					<div class="boton">
						<a href="javascript:void(0);">Control Tiempo Extra</a>
							<div>
								<ul>
									<li>
										<a href="http://10.94.130.36/iosphp/TELMEX_IOS/tiempo_extra/index.php">Carga de Tiempo Extra</a>
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
										<a href="http://10.94.130.36/iosphp/ios/busq_esp/Formularios_OT/busqueda_ot.php">Consulta de OT&apos;s</a>
									</li>
									<li>
										<a href="http://10.94.130.36/iosphp/ios/busq_esp/Formularios_OT/orden_trabajo.php">Generaci&oacute;n de Nueva OT</a>
									</li>
								</ul>
							</div>
					</div>
					';
						    }
					}		
			
						  
		
 
		         
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
	
	header('Location: http://10.94.130.36/iosphp/TELMEX_IOS/index.php');
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
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 2: //DOCUMENTACION
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 3: //SEGUIMIENTO
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 4: //ENTREGA
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 5: //EQUIPAMIENTO FO
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/Equipamiento.php';
		break;
		case 6: //EQUIPAMIENTO HDSL
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/Equipamiento.php';
		break;
		case 7: //EQUIPAMIENTO RADIO
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/Equipamiento.php';
		break;
		case 9: //CONSTRUCCION LP
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/Equipamiento.php';
		break;
		case 10: //SEGUIMIENTO CNS
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_CNS.php';
		break;
		case 12: //SEGUIMIENTO ALE
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Modulo_ALE_search/index.php';
		break;
		case 21: //CONSTRUCCION FO
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/Equipamiento.php';
		break;
		case 24: //FILIAL
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/filial_search_ref.php';
		break;
		default:
			$location = 'Location: http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_Principal.php';
		break;
	}
	//echo $location;
	header($location);
}



?>