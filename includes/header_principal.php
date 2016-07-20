<?php 
//$id_tipo_usuario = $_SESSION['id_Tipo_Usuario'];
//$id_Area_Responsable = $_SESSION['id_Area_Responsable'];

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
									<li>
										<a href="http://10.94.130.36/iosphp/TELMEX_IOS/Busqueda_Principal/consulta_x_referencia.php">Consulta por Referencia</a>
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


?>