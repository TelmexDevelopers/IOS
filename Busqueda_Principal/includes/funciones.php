<?php 
////////////////////////////////////////////////////////////////////
// LIBRERIA DE FUNCIONES PARA EL FUNCIONAMIENTO ENRAL DEL SISTEMA //
////////////////////////////////////////////////////////////////////

//VERIFICA DATOS DE USUARIO Y CREA SESIONES DE INGRESO AL SISTEMA

function ValidaUsuario($usuario,$password)
{
	$SQL = "SELECT * FROM cat_Datos_Acceso WHERE str_Usuario = '".$usuario."' AND str_Password = '".$password."'"  ;
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
		if ($num_registros > 0) {
			$SQL_Usuarios = "SELECT * FROM cat_Usuarios WHERE id_Datos_Acceso = ".$RS->fields(0)."" ;
			$RS_Usuarios = TraeRecordset($SQL_Usuarios);
			$nombre_usuario = $RS_Usuarios->fields(1)." ".$RS_Usuarios->fields(2)." ".$RS_Usuarios->fields(3);
			$_SESSION["logged_in"] = "is_set";
			$_SESSION["nombre_usuario"] = $nombre_usuario;
			$_SESSION["tipo_usuario"] = $RS->fields(3);
			$html = 'Bienvenido<br />'.$nombre_usuario.'';
		} else {
			$_SESSION["logged_in"] = "";
			$_SESSION["nombre_usuario"] = "";
			$_SESSION["tipo_usuario"] = "";
			session_unset();
			$html = "Datos de Usuario Incorrectos!";
		}
	$json = array('mensaje' => $html, 'registros' => $num_registros);
	
	return json_encode($json);
}


//REVISA SESIONES, PARA EL INGRESO AL SISTEMA
function CheckSession()
{
	if (!isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] != "is_set" && !isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "" )
	{
		header('Location: index.php');
	}
}

function CreaHeader()
{
//		if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == "is_set" && isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] != "" )
//	{
		/////////////////////////////////////			
		$html = '
				<!--INICIA HEADER-->
				<div id="botonera">
					<div class="boton" style="width:80px;">
						<a href="inicio.php">Home</a>
					</div>
				';
				
		/////////////////////////////////////
		$html .= '
					<div class="boton">
						<a href="javascript:void(0);">Seguimiento Servicios</a>
							<div>
								<ul>
									<li>
										<a href="javascript:void(0);">Servicios</a>
									</li>
									<li>
										<a href="javascript:void(0);">Asignaci&oacute;n Responsables</a>
									</li>
									<li>
										<a href="javascript:void(0);">Reportes</a>
									</li>
								</ul>
							</div>
					</div>
					';
			
		$html .= '
					<div class="boton">
						<a href="javascript:void(0);">Seguimiento OT&apos;s</a>
							<div>
								<ul>
									<li>
										<a href="javascript:void(0);">Consulta por Referencia</a>
									</li>
									<li>
										<a href="javascript:void(0);">Consulta por OT</a>
									</li>
									<li>
										<a href="javascript:void(0);">Generaci&oacute;n de Nueva OT</a>
									</li>
									<li>
										<a href="javascript:void(0);">Reportes</a>
									</li>
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
										<a href="javascript:void(0);">Carga de Tiempo Extra</a>
									</li>
									<li>
										<a href="javascript:void(0);">Modificar Registros</a>
									</li>
									<li>
										<a href="javascript:void(0);">Reportes</a>
									</li>
								</ul>
							</div>
					</div>
					';
					
		$html .= '
					<div class="boton">
						<a href="javascript:void(0);">Extras</a>
							<div>
								<ul>
									<li>
										<a href="javascript:void(0);">Gestion de Documentos</a>
									</li>
									<li>
										<a href="javascript:void(0);">Control Vehicular</a>
									</li>
								</ul>
							</div>
					</div>
					';
					
		/////////////////////////////////////			
		$html .= '
				</div>
				<!--TERMINA HEADER-->
		';
		/////////////////////////////////////	
		
		return strval($html);
				
//	} else {
//		header('Location: index.php');
//	}
}

function CloseSession()
{
	$_SESSION["logged_in"] = "";
	$_SESSION["nombre_usuario"] = "";
	$_SESSION["tipo_usuario"] = "";
	session_unset();
	
	header('Location: .../iosphp/TELMEX_IOS/index.php');
}

function opciones_usuarios($tipo_usuario, $area_responsable)
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
		$nombre = htmlentities(ucwords(strtolower(strval($RS->fields(1)." ".$RS->fields(2)))));
		$html .= '<option value="'.$id.'">'.$nombre.'</option>';

		$RS->MoveNext();
	}
	return strval($html);
	}
}


function imprime_combo_ipe_TE()
{
	$html = '<select name="ipe" id="ipe"><option value="">Seleccione</option>';
	$html .= opciones_usuarios(4, '');
	$html .= '</select>';
	
	return strval($html);
	
	//$html = '';$html = '';$html = '';$html = '';$html = '';
}


function Redirect($id_Area_Responsable,$id_Tipo_Usuario)
{
	switch($id_Area_Responsable)
	{
		case 1: //ANALISIS
			$location = '.../iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 2: //DOCUMENTACION
			$location = '.../iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 3: //SEGUIMIENTO
			$location = 'Location: .../iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 4: //ENTREGA
			$location = '.../iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_Principal.php';
		break;
		case 5: //EQUIPAMIENTO FO
			$location = '.../iosphp/TELMEX_IOS/Busqueda_Principal/Equipamiento.php';
		break;
		case 6: //EQUIPAMIENTO HDSL
			$location = 'Location: .../iosphp/TELMEX_IOS/Busqueda_Principal/Equipamiento.php';
		break;
		case 7: //EQUIPAMIENTO RADIO
			$location = 'Location: .../iosphp/TELMEX_IOS/Busqueda_Principal/Equipamiento.php';
		break;
		case 9: //CONSTRUCCION LP
			$location = 'Location: .../iosphp/TELMEX_IOS/Busqueda_Principal/Equipamiento.php';
		break;
		case 10: //SEGUIMIENTO CNS
			$location = 'Location: .../iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_CNS.php';
		break;
		case 12: //SEGUIMIENTO ALE
			$location = 'Location: .../iosphp/TELMEX_IOS/Modulo_ALE_search/index.php';
		break;
		case 21: //CONSTRUCCION FO
			$location = 'Location: .../iosphp/TELMEX_IOS/Busqueda_Principal/Equipamiento.php';
		break;
		case 24: //FILIAL
			$location = 'Location: .../iosphp/TELMEX_IOS/Busqueda_Principal/filial_search_ref.php';
		break;
		default:
			$location = 'Location: .../iosphp/TELMEX_IOS/Busqueda_Principal/Busqueda_Principal.php';
		break;
	}
	//echo $location;
	header($location);
}


?>