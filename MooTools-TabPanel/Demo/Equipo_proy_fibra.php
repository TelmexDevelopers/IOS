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

$id_requerimiento=$_GET["id_requerimiento"];
$id_edo_acometida=$_GET["id_edo_acometida"];
$dt_PROGRAMADA=$_GET["dt_PROGRAMADA"];
$id_supervisor_fo=$_GET["id_supervisor_fo"];
$id_resp_sucope=$_GET["id_resp_sucope"];
$id_resp_ipr=$_GET["id_resp_ipr"];
$dt_solicitud_fo=$_GET["dt_solicitud_fo"];
$str_planificador=$_GET["str_planificador"];
$dt_sol_planificacion=$_GET["dt_sol_planificacion"];
$dt_rec_planificacion=$_GET["dt_rec_planificacion"];
$dt_sol_permiso_ssp=$_GET["dt_sol_permiso_ssp"];
$dt_rec_permiso=$_GET["dt_rec_permiso"];
$dt_entrega_esp_fo=$_GET["dt_entrega_esp_fo"];
$dt_ok_adecuaciones=$_GET["dt_ok_adecuaciones"];
$delegacion=$_GET["delegacion"];
$dt_elab_ot=$_GET["dt_elab_ot"];
$dt_Entr_ot=$_GET["dt_Entr_ot"];
$str_recibe_OT=$_GET["str_recibe_OT"];
$PEP_09=$_GET["PEP_09"];
$str_ped45=$_GET["str_ped45"];
$id_problematica=$_GET["id_problematica"];
$constructor=$_GET["id_constructor"];
$dt_proyecto_Ok=$_GET["dt_proyecto_Ok"];
$FOt1=$_GET["FOt1"];
$FOt2=$_GET["FOt2"];
$clte_fo1=$_GET["clte_fo1"];
$clte_fo2=$_GET["clte_fo2"];
$id_tipo=$_GET["id_tipo"];
$FOT1_resp=$_GET["FOT1_resp"];
$FOT2_resp=$_GET["FOT2_resp"];
$clte_fo1_resp=$_GET["clte_fo1_resp"];
$clte_fo2_resp=$_GET["clte_fo2_resp"];
$id_tipo_fo=$_GET["id_tipo_fo"];
$id_FO_Const_Estatus=$_GET["id_FO_Const_Estatus"];
$id_problem_cons=$_GET["id_problem_cons"];
$str_anillo_rof=$_GET["str_anillo_rof"];
$SubAnillo_Fi=$_GET["SubAnillo_Fi"];
$PES=$_GET["PES"];
$Atenuacion_Trab=$_GET["Atenuacion_Trab"];
$Atenuacion_Resp=$_GET["Atenuacion_Resp"];
$Longitud_Trab=$_GET["Longitud_Trab"];
$Longitud_Resp=$_GET["Longitud_Resp"];
$dt_ini_real=$_GET["dt_ini_real"];
$dt_remate_fo=$_GET["dt_remate_fo"];
$dt_entrega_fo=$_GET["dt_entrega_fo"];
$supervisor_construccion=$_GET["id_sup_const"];
//////checkbox cancelado FO_Cancel
$FO_Cancel=$_GET["id_cancel"];


$contador=0;

if ($referencia!='' && $id_tramos !='')
{
	
	$SQL_count = "SELECT COUNT(*) FROM tb_eq_construcion WHERE referencia = '".$referencia."' and id_tramos = '".$id_tramos."'";
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
		if ($id_requerimiento!='')
		{		
			$campos.="id_requerimiento = '".$id_requerimiento."'";
			$contador++;
		}
		if ($id_edo_acometida!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_edo_acometida = '".$id_edo_acometida."'";
			$contador++;
		}
		if ($dt_PROGRAMADA!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_PROGRAMADA = '".$dt_PROGRAMADA."'";
			$contador++;
		}
		if ($id_supervisor_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_supervisor_fo = '".$id_supervisor_fo."'";
			$contador++;
		}
		if ($id_resp_sucope!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_resp_sucope = '".$id_resp_sucope."'";
			$contador++;
		}
		if ($id_resp_ipr!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_resp_ipr = '".$id_resp_ipr."'";
			$contador++;
		}
		
		if ($str_planificador!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_planificador = '".$str_planificador."'";
			$contador++;
		}
		if ($dt_sol_planificacion!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_sol_planificacion = '".$dt_sol_planificacion."'";
			$contador++;
		}
		if ($dt_rec_planificacion!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_rec_planificacion = '".$dt_rec_planificacion."'";
			$contador++;
		}
		if ($dt_sol_permiso_ssp!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_sol_permiso_ssp = '".$dt_sol_permiso_ssp."'";
			$contador++;
		}
		if ($dt_rec_permiso!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_rec_permiso = '".$dt_rec_permiso."'";
			$contador++;
		}
		if ($dt_entrega_esp_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_entrega_esp_fo = '".$dt_entrega_esp_fo."'";
			$contador++;
		}
		if ($dt_ok_adecuaciones!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_ok_adecuaciones = '".$dt_ok_adecuaciones."'";
			$contador++;
		}
		if ($delegacion!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="delegacion = '".$delegacion."'";
			$contador++;
		}
		if ($dt_elab_ot!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}	
			$campos.="dt_elab_ot = '".$dt_elab_ot."'";
			$contador++;
		}
		if ($dt_Entr_ot!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_Entr_ot = '".$dt_Entr_ot."'";
			$contador++;
		}
		if ($str_recibe_OT!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_recibe_OT = '".$str_recibe_OT."'";
			$contador++;
		}
		if ($PEP_09!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="PEP_09 = '".$PEP_09."'";
			$contador++;
		}
		if ($str_ped45!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_ped45 = '".$str_ped45."'";
			$contador++;
		}
		if ($id_problematica!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_problematica = '".$id_problematica."'";
			$contador++;
		}
		if ($constructor!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_Constructor = '".$constructor."'";
			$contador++;
		}
		if ($dt_proyecto_Ok!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_proyecto_Ok = '".$dt_proyecto_Ok."'";
			$contador++;
		}
		if ($FOt1!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="FOt1 = '".$FOt1."'";
			$contador++;
		}
		if ($FOt2!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="FOt2 = '".$FOt2."'";
			$contador++;
		}
		if ($clte_fo1!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="clte_fo1 = '".$clte_fo1."'";
			$contador++;
		}
		if ($clte_fo2!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="clte_fo2 = '".$clte_fo2."'";
			$contador++;
		}
		if ($id_tipo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_tipo = '".$id_tipo."'";
			$contador++;
		}
		if ($FOT1_resp!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="FOT1_resp = '".$FOT1_resp."'";
			$contador++;
		}
		if ($FOT2_resp!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="FOT2_resp = '".$FOT2_resp."'";
			$contador++;
		}
		if ($clte_fo1_resp!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="clte_fo1_resp = '".$clte_fo1_resp."'";
			$contador++;
		}
		if ($clte_fo2_resp!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="clte_fo2_resp = '".$clte_fo2_resp."'";
			$contador++;
		}
		if ($id_tipo_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_tipo_fo = '".$id_tipo_fo."'";
			$contador++;
		}
		if ($id_FO_Const_Estatus!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_FO_Const_Estatus = '".$id_FO_Const_Estatus."'";
			$contador++;
		}
		if ($id_problem_cons!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_problem_cons = '".$id_problem_cons."'";
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
		if ($SubAnillo_Fi!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="SubAnillo_Fi = '".$SubAnillo_Fi."'";
			$contador++;
		}
		if ($PES!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="PES = '".$PES."'";
			$contador++;
		}
		if ($Atenuacion_Trab!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="Atenuacion_Trab = '".$Atenuacion_Trab."'";
			$contador++;
		}
		if ($Atenuacion_Resp!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="Atenuacion_Resp = '".$Atenuacion_Resp."'";
			$contador++;
		}
		if ($Longitud_Trab!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="Longitud_Trab = '".$Longitud_Trab."'";
			$contador++;
		}
		if ($Longitud_Resp!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="Longitud_Resp = '".$Longitud_Resp."'";
			$contador++;
		}
		if ($dt_ini_real!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_ini_real = '".$dt_ini_real."'";
			$contador++;
		}
		if ($dt_remate_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_remate_fo = '".$dt_remate_fo."'";
			$contador++;
		}
		if ($dt_entrega_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_entrega_fo = '".$dt_entrega_fo."'";
			$contador++;
		}
		if ($supervisor_construccion!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_sup_const = '".$supervisor_construccion."'";
			$contador++;
		}
		if ($FO_Cancel!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_cancel = '".$FO_Cancel."'";
			$contador++;
		}

		$SQL_UPDATE ="UPDATE tb_eq_construcion SET ".$campos." WHERE referencia = '".$referencia."' and id_tramos = '".$id_tramos."'";
		//echo $SQL_UPDATE."<br>";
		$RS_UPDATE = EjecutaQuery($SQL_UPDATE);
				$RS_UPDATE = EjecutaQuery($SQL_UPDATE);
				if ($RS_UPDATE==false) {
					echo "Error EQUIPO_FO<br />";
				}else{
					echo "<br />Actualiz&oacute; Registro Correctamente!<br />";
				}		
///////////////////////////////////////////////////////////						
///////////////////////////////////////////////////////////			
	} else {
$valores='';
$campos='';
		if ($id_requerimiento!='')
		{
			$campos.=", id_requerimiento";
			$valores.=	", '".$id_requerimiento."'";
			$contador++;
		}
		if ($id_edo_acometida!='')
		{
			$campos.=", id_edo_acometida";
			$valores.=", '".$id_edo_acometida."'";
			$contador++;
		}
		if ($dt_PROGRAMADA!='')
		{
			$campos.=", dt_PROGRAMADA";
			$valores.=", '".$dt_PROGRAMADA."'";
			$contador++;
		}
		if ($id_supervisor_fo!='')
		{
			$campos.=", id_supervisor_fo";
			$valores.=", '".$id_supervisor_fo."'";
			$contador++;
		}
		if ($id_resp_sucope!='')
		{
			$campos.=", id_resp_sucope";
			$valores.=", '".$id_resp_sucope."'";
			$contador++;
		}
		if ($id_resp_ipr!='')
		{
			$campos.=", id_resp_ipr";
			$valores.=", '".$id_resp_ipr."'";
			$contador++;
		}
		if ($str_planificador!='')
		{
			$campos.=", str_planificador";
			$valores.=", '".$str_planificador."'";
			$contador++;
		}
		if ($dt_sol_planificacion!='')
		{
			$campos.=", dt_sol_planificacion";
			$valores.=", '".$dt_sol_planificacion."'";
			$contador++;
		}
		if ($dt_rec_planificacion!='')
		{
			$campos.=", dt_rec_planificacion";
			$valores.=", '".$dt_rec_planificacion."'";
			$contador++;
		}
		if ($dt_sol_permiso_ssp!='')
		{
			$campos.=", dt_sol_permiso_ssp";
			$valores.=", '".$dt_sol_permiso_ssp."'";
			$contador++;
		}
		if ($dt_rec_permiso!='')
		{
			$campos.=", dt_rec_permiso";
			$valores.=", '".$dt_rec_permiso."'";
			$contador++;
		}
		if ($dt_entrega_esp_fo!='')
		{
			$campos.=", dt_entrega_esp_fo";
			$valores.=", '".$dt_entrega_esp_fo."'";
			$contador++;
		}
		if ($dt_ok_adecuaciones!='')
		{
			$campos.=", dt_ok_adecuaciones";
			$valores.=", '".$dt_ok_adecuaciones."'";
			$contador++;
		}
		if ($delegacion!='')
		{
			$campos.=", delegacion";
			$valores.=", '".$delegacion."'";
			$contador++;
		}
		if ($dt_elab_ot!='')
		{
			$campos.=", dt_elab_ot";
			$valores.=", '".$dt_elab_ot."'";
			$contador++;
		}
		if ($dt_Entr_ot!='')
		{
			$campos.=", dt_Entr_ot";
			$valores.=", '".$dt_Entr_ot."'";
			$contador++;
		}
		if ($str_recibe_OT!='')
		{
			$campos.=", str_recibe_OT";
			$valores.=", '".$str_recibe_OT."'";
			$contador++;
		}
		if ($PEP_09!='')
		{
			$campos.=", PEP_09";
			$valores.=", '".$PEP_09."'";
			$contador++;
		}
		if ($str_ped45!='')
		{
			$campos.=", str_ped45";
			$valores.=", '".$str_ped45."'";
			$contador++;
		}
		if ($id_problematica!='')
		{
			$campos.=", id_problematica";
			$valores.=", '".$id_problematica."'";
			$contador++;
		}
		if ($constructor!='')
		{
			$campos.=", id_constructor";
			$valores.=", '".$constructor."'";
			$contador++;
		}
		if ($dt_proyecto_Ok!='')
		{
			$campos.=", dt_proyecto_Ok";
			$valores.=", '".$dt_proyecto_Ok."'";
			$contador++;
		}
		if ($FOt1!='')
		{
			$campos.=", FOt1";
			$valores.=", '".$FOt1."'";
			$contador++;
		}
		if ($FOt2!='')
		{
			$campos.=", FOt2";
			$valores.=", '".$FOt2."'";
			$contador++;
		}
		if ($clte_fo1!='')
		{
			$campos.=", clte_fo1";
			$valores.=", '".$clte_fo1."'";
			$contador++;
		}
		if ($clte_fo2!='')
		{
			$campos.=", clte_fo2";
			$valores.=", '".$clte_fo2."'";
			$contador++;
		}
		if ($id_tipo!='')
		{
			$campos.=", id_tipo";
			$valores.=", '".$id_tipo."'";
			$contador++;
		}
		if ($FOT1_resp!='')
		{
			$campos.=", FOT1_resp";
			$valores.=", '".$FOT1_resp."'";
			$contador++;
		}
		if ($FOT2_resp!='')
		{
			$campos.=", FOT2_resp";
			$valores.=", '".$FOT2_resp."'";
			$contador++;
		}
		if ($clte_fo1_resp!='')
		{
			$campos.=", clte_fo1_resp";
			$valores.=", '".$clte_fo1_resp."'";
			$contador++;
		}
		if ($clte_fo2_resp!='')
		{
			$campos.=", clte_fo2_resp";
			$valores.=", '".$clte_fo2_resp."'";
			$contador++;
		}
		if ($id_tipo_fo!='')
		{
			$campos.=", id_tipo_fo";
			$valores.=", '".$id_tipo_fo."'";
			$contador++;
		}
		if ($id_FO_Const_Estatus!='')
		{
			$campos.=", id_FO_Const_Estatus";
			$valores.=", '".$id_FO_Const_Estatus."'";
			$contador++;
		}
		if ($id_problem_cons!='')
		{
			$campos.=", id_problem_cons";
			$valores.=", '".$id_problem_cons."'";
			$contador++;
		}
		if ($str_anillo_rof!='')
		{
			$campos.=", str_anillo_rof";
			$valores.=", '".$str_anillo_rof."'";
			$contador++;
		}
		if ($SubAnillo_Fi!='')
		{
			$campos.=", SubAnillo_Fi";
			$valores.=", '".$SubAnillo_Fi."'";
			$contador++;
		}
		if ($PES!='')
		{
			$campos.=", PES";
			$valores.=", '".$PES."'";
			$contador++;
		}
		if ($Atenuacion_Trab!='')
		{
			$campos.=", Atenuacion_Trab";
			$valores.=", '".$Atenuacion_Trab."'";
			$contador++;
		}
		if ($Atenuacion_Resp!='')
		{
			$campos.=", Atenuacion_Resp";
			$valores.=", '".$Atenuacion_Resp."'";
			$contador++;
		}
		if ($Longitud_Trab!='')
		{
			$campos.=", Longitud_Trab";
			$valores.=", '".$Longitud_Trab."'";
			$contador++;
		}
		if ($Longitud_Resp!='')
		{
			$campos.=", Longitud_Resp";
			$valores.=", '".$Longitud_Resp."'";
			$contador++;
		}
		if ($dt_ini_real!='')
		{
			$campos.=", dt_ini_real";
			$valores.=", '".$dt_ini_real."'";
			$contador++;
		}
		if ($dt_remate_fo!='')
		{
			$campos.=", dt_remate_fo";
			$valores.=", '".$dt_remate_fo."'";
			$contador++;
		}
		if ($dt_entrega_fo!='')
		{
			$campos.=", dt_entrega_fo";
			$valores.=", '".$dt_entrega_fo."'";
			$contador++;
		}
		if ($supervisor_construccion!='')
		{
			$campos.=", id_sup_const";
			$valores.=", '".$supervisor_construccion."'";
			$contador++;
		}
		if ($FO_Cancel!='')
		{
			$campos.=", id_cancel";
			$valores.=", '".$FO_Cancel."'";
			$contador++;
		}
			
			
		//echo $campos."<br>";
		//echo $valores."<br>";
		$SQL="INSERT INTO tb_eq_construcion (referencia, id_tramos".$campos.") VALUES ('".$referencia."','".$id_tramos."'".$valores.")";
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
