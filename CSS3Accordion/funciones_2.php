<?php 
////////////////////////////////////////////////////////////////////
// LIBRERIA DE FUNCIONES PARA EL FUNCIONAMIENTO ENRAR DEL SISTEMA //
////////////////////////////////////////////////////////////////////

//VERIFICA DATOS DE USUARIO Y CREA SESIONES DE INGRESO AL SISTEMA

function pedirDatos($referencia)
{
	$SQL = "SELECT id_Fase_IOS, referencia, str_Fase_IOS, dt_Fecha_Fase_IOS FROM vw_ios_reg WHERE referencia = '".$referencia."'";
	//echo $SQL;
	$RS = TraeRecordset($SQL);
	if (!$RS) die('Error en DB!');
	
	$num_registros = $RS->RecordCount();
	
	$json = array('referencia' => $RS->fields(0), 'str_Fase_IOS' => $RS->fields(1), 'dt_Fecha_Fase_IOS' => $RS->fields(2));

	
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
		if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == "is_set" && isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] != "" )
	{
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
				
	} else {
		header('Location: index.php');
	}
}

function CloseSession()
{
	$_SESSION["logged_in"] = "";
	$_SESSION["nombre_usuario"] = "";
	$_SESSION["tipo_usuario"] = "";
	session_unset();
	
	header('Location: index.php');
}



?>