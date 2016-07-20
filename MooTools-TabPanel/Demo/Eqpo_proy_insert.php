<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');

$id_tramos=$_GET["id_tramos"];
$referencia=$_GET["referencia"];

	$str_ref_relacionada=$_GET["str_ref_relacionada"];
	$id_Fase_IOS=$_GET["id_Fase_IOS"];
	$id_proy_eqp=$_GET["id_proy_eqp"];
	$id_requiere_trbj=$_GET["id_requiere_trbj"];
	$dt_requiere_fo=$_GET["dt_requiere_fo"];
	$id_res_super=$_GET["id_res_super"];
	$id_ipe_proyecto=$_GET["id_ipe_proyecto"];
	$id_pendt_cliente=$_GET["id_pendt_cliente"];
	$id_req_pto=$_GET["id_req_pto"];
	$id_nivel_pto_tx=$_GET["id_nivel_pto_tx"];
	$dt_req_pto_tx=$_GET["dt_req_pto_tx"];
	$id_status_pto=$_GET["id_status_pto"];
	$dt_carga_mat_ok=$_GET["dt_carga_mat_ok"];
	$dt_asig_PEP=$_GET["dt_asig_PEP"];
	$dt_asig_p45=$_GET["dt_asig_p45"];
	$dt_ots_ok=$_GET["dt_ots_ok"];
	$dt_anexos=$_GET["dt_anexos"];
	$dt_pagina_web=$_GET["dt_pagina_web"];
	$dt_sol_clli=$_GET["dt_sol_clli"];
	$dt_clli_ok=$_GET["dt_clli_ok"];
	$dt_sol_gestion=$_GET["dt_sol_gestion"];
	$dt_gestion_ok=$_GET["dt_gestion_ok"];
	$dt_carga_sise=$_GET["dt_carga_sise"];
	$dt_proy_concl=$_GET["dt_proy_concl"];
	$id_Filial=$_GET["id_Filial"];
	$id_modelo=$_GET["id_modelo"];
	$id_cap_enlace=$_GET["id_cap_enlace"];
	$str_PEP=$_GET["str_PEP"];
	$id_filial_prov=$_GET["id_filial_prov"];
	$str_colectora=$_GET["str_colectora"];
	$id_trabajo_colectora=$_GET["id_trabajo_colectora"];
	$dt_trabcol_ok=$_GET["dt_trabcol_ok"];
	$dt_entrega_esp=$_GET["dt_entrega_esp"];
	$dt_rec_site=$_GET["dt_rec_site"];
	$dt_reporte_site=$_GET["dt_reporte_site"];
	$id_eq_client=$_GET["id_eq_client"];
	$id_instalado=$_GET["id_instalado"];
	$str_top_fo=$_GET["str_top_fo"];
	$str_anillo_rof=$_GET["str_anillo_rof"];
	$int_fot1 =$_GET["int_fot1"];
	$int_fot2=$_GET["int_fot2"];
	$id_prtx_status=$_GET["id_prtx_status"];
	$dt_meta_term_proy=$_GET["dt_meta_term_proy"];
	$Observaciones_Eq=$_GET["Observaciones_Eq"];
//checkbox
$Principal=$_GET["id_principal"];
$proyecto_concluido=$_GET["id_proy_concl"];


$contador=0;

if ($referencia!='' && $id_tramos !='')
{
	
	$SQL_count = "SELECT COUNT(*) FROM tb_equip_fo WHERE referencia = '".$referencia."' and id_tramos = '".$id_tramos."'";
	//echo $SQL_count."<br>";
	$RS_count = TraeRecordset($SQL_count);
	$cuantos = intval($RS_count->fields(0));
	//echo $cuantos."<br>";
	if ($cuantos > 0)
	{
$valores='';
$campos='';
///////////////////////////////////////////////////////////						
///////////////////////////////////////////////////////////			
		if ($str_ref_relacionada!='')
		{		
			$campos.="str_ref_relacionada = '".$str_ref_relacionada."'";
			$contador++;
		}
		if ($id_Fase_IOS!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_Fase_IOS = '".$id_Fase_IOS."'";
			$contador++;
		}
		if ($id_proy_eqp!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_proy_eqp = '".$id_proy_eqp."'";
			$contador++;
		}
		if ($id_requiere_trbj!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_requiere_trbj = '".$id_requiere_trbj."'";
			$contador++;
		}
		if ($dt_requiere_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_requiere_fo = '".$dt_requiere_fo."'";
			$contador++;
		}
		if ($id_res_super!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_res_super = '".$id_res_super."'";
			$contador++;
		}
		if ($id_ipe_proyecto!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_ipe_proyecto = '".$id_ipe_proyecto."'";
			$contador++;
		}
		if ($id_pendt_cliente!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_pendt_cliente = '".$id_pendt_cliente."'";
			$contador++;
		}
		if ($id_req_pto!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_req_pto = '".$id_req_pto."'";
			$contador++;
		}
		if ($id_nivel_pto_tx!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_nivel_pto_tx = '".$id_nivel_pto_tx."'";
			$contador++;
		}
		if ($dt_req_pto_tx!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_req_pto_tx = '".$dt_req_pto_tx."'";
			$contador++;
		}
		if ($id_status_pto!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_status_pto = '".$id_status_pto."'";
			$contador++;
		}
		if ($dt_carga_mat_ok!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_carga_mat_ok = '".$dt_carga_mat_ok."'";
			$contador++;
		}
		if ($dt_asig_PEP!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_asig_PEP = '".$dt_asig_PEP."'";
			$contador++;
		}
		if ($dt_asig_p45!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_asig_p45 = '".$dt_asig_p45."'";
			$contador++;
		}
		if ($dt_ots_ok!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_ots_ok = '".$dt_ots_ok."'";
			$contador++;
		}
		if ($dt_anexos!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_anexos = '".$dt_anexos."'";
			$contador++;
		}
		if ($dt_pagina_web!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_pagina_web = '".$dt_pagina_web."'";
			$contador++;
		}
		if ($dt_sol_clli!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_sol_clli = '".$dt_sol_clli."'";
			$contador++;
		}
		if ($dt_clli_ok!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_clli_ok = '".$dt_clli_ok."'";
			$contador++;
		}
		if ($dt_sol_gestion!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_sol_gestion = '".$dt_sol_gestion."'";
			$contador++;
		}
		if ($dt_gestion_ok!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_gestion_ok = '".$dt_gestion_ok."'";
			$contador++;
		}
		if ($dt_carga_sise!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_carga_sise = '".$dt_carga_sise."'";
			$contador++;
		}
		if ($dt_proy_concl!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_proy_concl = '".$dt_proy_concl."'";
			$contador++;
		}
		if ($id_Filial!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_Filial = '".$id_Filial."'";
			$contador++;
		}
		if ($id_modelo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_modelo = '".$id_modelo."'";
			$contador++;
		}
		if ($id_cap_enlace!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_cap_enlace = '".$id_cap_enlace."'";
			$contador++;
		}
		if ($str_PEP!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_PEP = '".$str_PEP."'";
			$contador++;
		}
		if ($id_filial_prov!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_filial_prov = '".$id_filial_prov."'";
			$contador++;
		}
		if ($str_colectora!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_colectora = '".$str_colectora."'";
			$contador++;
		}
		if ($id_trabajo_colectora!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_trabajo_colectora = '".$id_trabajo_colectora."'";
			$contador++;
		}
		if ($dt_trabcol_ok!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_trabcol_ok = '".$dt_trabcol_ok."'";
			$contador++;
		}
		if ($dt_entrega_esp!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_entrega_esp = '".$dt_entrega_esp."'";
			$contador++;
		}
		if ($dt_rec_site!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_rec_site = '".$dt_rec_site."'";
			$contador++;
		}
		if ($dt_reporte_site!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_reporte_site = '".$dt_reporte_site."'";
			$contador++;
		}
		if ($id_eq_client!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_eq_client = '".$id_eq_client."'";
			$contador++;
		}
		if ($id_instalado!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_instalado = '".$id_instalado."'";
			$contador++;
		}
		if ($str_top_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_top_fo = '".$str_top_fo."'";
			$contador++;
		}
		if ($str_anillo_rof!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_anillo_rof = '".$str_anillo_rof."'";
			$contador++;
		}
		if ($int_fot1!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="int_fot1 = '".$int_fot1."'";
			$contador++;
		}
		if ($int_fot2!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="int_fot2 = '".$int_fot2."'";
			$contador++;
		}
		if ($id_prtx_status!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_prtx_status = '".$id_prtx_status."'";
			$contador++;
		}
		if ($dt_meta_term_proy!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_meta_term_proy = '".$dt_meta_term_proy."'";
			$contador++;
		}
		if ($Observaciones_Eq!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="Observaciones_Eq = '".$Observaciones_Eq."'";
			$contador++;
		}
		if ($Principal!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_principal = '".$Principal."'";
			$contador++;
		}
		if ($proyecto_concluido!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_proy_concl = '".$proyecto_concluido."'";
			$contador++;
		}

		$SQL_UPDATE ="UPDATE tb_equip_fo SET ".$campos." WHERE referencia = '".$referencia."' and id_tramos = '".$id_tramos."'";
		//echo $SQL_UPDATE."<br>";
		$RS_UPDATE = EjecutaQuery($SQL_UPDATE);
				$RS_UPDATE = EjecutaQuery($SQL_UPDATE);
				if ($RS_UPDATE==false) {
					echo "Error EQUIPO<br />";
				}else{
					echo "<br />Actualiz&oacute; Registro Correctamente!<br />";
				}		
///////////////////////////////////////////////////////////						
///////////////////////////////////////////////////////////			
	} else {
$valores='';
$campos='';
		if ($str_ref_relacionada!='')
		{
			$campos.=", str_ref_relacionada";
			$valores.=	", '".$str_ref_relacionada."'";
			$contador++;
		}
		if ($id_Fase_IOS!='')
		{
			$campos.=", id_Fase_IOS";
			$valores.=", '".$id_Fase_IOS."'";
			$contador++;
		}
		if ($id_proy_eqp!='')
		{
			$campos.=", id_proy_eqp";
			$valores.=", '".$id_proy_eqp."'";
			$contador++;
		}
		if ($id_requiere_trbj!='')
		{
			$campos.=", id_requiere_trbj";
			$valores.=", '".$id_requiere_trbj."'";
			$contador++;
		}
		if ($dt_requiere_fo!='')
		{
			$campos.=", dt_requiere_fo";
			$valores.=", '".$dt_requiere_fo."'";
			$contador++;
		}
		if ($id_res_super!='')
		{
			$campos.=", id_res_super";
			$valores.=", '".$id_res_super."'";
			$contador++;
		}
		if ($id_ipe_proyecto!='')
		{
			$campos.=", id_ipe_proyecto";
			$valores.=", '".$id_ipe_proyecto."'";
			$contador++;
		}
		if ($id_pendt_cliente!='')
		{
			$campos.=", id_pendt_cliente";
			$valores.=", '".$id_pendt_cliente."'";
			$contador++;
		}
		if ($id_req_pto!='')
		{
			$campos.=", id_req_pto";
			$valores.=", '".$id_req_pto."'";
			$contador++;
		}
		if ($id_nivel_pto_tx!='')
		{
			$campos.=", id_nivel_pto_tx";
			$valores.=", '".$id_nivel_pto_tx."'";
			$contador++;
		}
		if ($dt_req_pto_tx!='')
		{
			$campos.=", dt_req_pto_tx";
			$valores.=", '".$dt_req_pto_tx."'";
			$contador++;
		}
		if ($id_status_pto!='')
		{
			$campos.=", id_status_pto";
			$valores.=", '".$id_status_pto."'";
			$contador++;
		}
		if ($dt_carga_mat_ok!='')
		{
			$campos.=", dt_carga_mat_ok";
			$valores.=", '".$dt_carga_mat_ok."'";
			$contador++;
		}
		if ($dt_asig_PEP!='')
		{
			$campos.=", dt_asig_PEP";
			$valores.=", '".$dt_asig_PEP."'";
			$contador++;
		}
		if ($dt_asig_p45!='')
		{
			$campos.=", dt_asig_p45";
			$valores.=", '".$dt_asig_p45."'";
			$contador++;
		}
		if ($dt_ots_ok!='')
		{
			$campos.=", dt_ots_ok";
			$valores.=", '".$dt_ots_ok."'";
			$contador++;
		}
		if ($dt_anexos!='')
		{
			$campos.=", dt_anexos";
			$valores.=", '".$dt_anexos."'";
			$contador++;
		}
		if ($dt_pagina_web!='')
		{
			$campos.=", dt_pagina_web";
			$valores.=", '".$dt_pagina_web."'";
			$contador++;
		}
		if ($dt_sol_clli!='')
		{
			$campos.=", dt_sol_clli";
			$valores.=", '".$dt_sol_clli."'";
			$contador++;
		}
		if ($dt_clli_ok!='')
		{
			$campos.=", dt_clli_ok";
			$valores.=", '".$dt_clli_ok."'";
			$contador++;
		}
		if ($dt_sol_gestion!='')
		{
			$campos.=", dt_sol_gestion";
			$valores.=", '".$dt_sol_gestion."'";
			$contador++;
		}
		if ($dt_gestion_ok!='')
		{
			$campos.=", dt_gestion_ok";
			$valores.=", '".$dt_gestion_ok."'";
			$contador++;
		}
		if ($dt_carga_sise!='')
		{
			$campos.=", dt_carga_sise";
			$valores.=", '".$dt_carga_sise."'";
			$contador++;
		}
		if ($dt_proy_concl!='')
		{
			$campos.=", dt_proy_concl";
			$valores.=", '".$dt_proy_concl."'";
			$contador++;
		}
		if ($id_Filial!='')
		{
			$campos.=", id_Filial";
			$valores.=", '".$id_Filial."'";
			$contador++;
		}
		if ($id_modelo!='')
		{
			$campos.=", id_modelo";
			$valores.=", '".$id_modelo."'";
			$contador++;
		}
		if ($id_cap_enlace!='')
		{
			$campos.=", id_cap_enlace";
			$valores.=", '".$id_cap_enlace."'";
			$contador++;
		}
		if ($str_PEP!='')
		{
			$campos.=", str_PEP";
			$valores.=", '".$str_PEP."'";
			$contador++;
		}
		if ($id_filial_prov!='')
		{
			$campos.=", id_filial_prov";
			$valores.=", '".$id_filial_prov."'";
			$contador++;
		}
		if ($str_colectora!='')
		{
			$campos.=", str_colectora";
			$valores.=", '".$str_colectora."'";
			$contador++;
		}
		if ($id_trabajo_colectora!='')
		{
			$campos.=", id_trabajo_colectora";
			$valores.=", '".$id_trabajo_colectora."'";
			$contador++;
		}
		if ($dt_trabcol_ok!='')
		{
			$campos.=", dt_trabcol_ok";
			$valores.=", '".$dt_trabcol_ok."'";
			$contador++;
		}
		if ($dt_entrega_esp!='')
		{
			$campos.=", dt_entrega_esp";
			$valores.=", '".$dt_entrega_esp."'";
			$contador++;
		}
		if ($dt_rec_site!='')
		{
			$campos.=", dt_rec_site";
			$valores.=", '".$dt_rec_site."'";
			$contador++;
		}
		if ($dt_reporte_site!='')
		{
			$campos.=", dt_reporte_site";
			$valores.=", '".$dt_reporte_site."'";
			$contador++;
		}
		if ($id_eq_client!='')
		{
			$campos.=", id_eq_client";
			$valores.=", '".$id_eq_client."'";
			$contador++;
		}
		if ($id_instalado!='')
		{
			$campos.=", id_instalado";
			$valores.=", '".$id_instalado."'";
			$contador++;
		}
		if ($str_top_fo!='')
		{
			$campos.=", str_top_fo";
			$valores.=", '".$str_top_fo."'";
			$contador++;
		}
		if ($str_anillo_rof!='')
		{
			$campos.=", str_anillo_rof";
			$valores.=", '".$str_anillo_rof."'";
			$contador++;
		}
		if ($int_fot1!='')
		{
			$campos.=", int_fot1";
			$valores.=", '".$int_fot1."'";
			$contador++;
		}
		if ($int_fot2!='')
		{
			$campos.=", int_fot2";
			$valores.=", '".$int_fot2."'";
			$contador++;
		}
		if ($id_prtx_status!='')
		{
			$campos.=", id_prtx_status";
			$valores.=", '".$id_prtx_status."'";
			$contador++;
		}
		if ($dt_meta_term_proy!='')
		{
			$campos.=", dt_meta_term_proy";
			$valores.=", '".$dt_meta_term_proy."'";
			$contador++;
		}
		if ($Observaciones_Eq!='')
		{
			$campos.=", Observaciones_Eq";
			$valores.=", '".$Observaciones_Eq."'";
			$contador++;
		}
		if ($Principal!='')
		{
			$campos.=", id_principal";
			$valores.=", '".$Principal."'";
			$contador++;
		}
		if ($proyecto_concluido!='')
		{
			$campos.=", id_proy_concl";
			$valores.=", '".$proyecto_concluido."'";
			$contador++;
		}		
		//echo $campos."<br>";
		//echo $valores."<br>";
		$SQL="INSERT INTO tb_equip_fo (referencia, id_tramos".$campos.") VALUES ('".$referencia."','".$id_tramos."'".$valores.")";
		//echo $SQL;
		$RS = EjecutaQuery($SQL);
		if ($RS==false) {
			echo "Error2";
		} else {
			echo "<br />Actualiz&oacute; Registro Correctamente!";
		}
	}
			
}
?>
