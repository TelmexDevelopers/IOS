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
$id_resp_sucope=$_GET["id_resp_sucope"];
$id_resp_ipr=$_GET["id_resp_ipr"];
$str_tipo_proy=$_GET["str_tipo_proy"];
$dt_meta_term_const=$_GET["dt_meta_term_const"];
$id_edo_fo=$_GET["id_edo_fo"];
$id_atraso=$_GET["id_atraso"];
$str_planificador=$_GET["str_planificador"];
$dt_sol_planificacion=$_GET["dt_sol_planificacion"];
$dt_rch=$_GET["dt_rch"];
$dt_def_trayectoria=$_GET["dt_def_trayectoria"];
$dt_ok_acometida=$_GET["dt_ok_acometida"];
$str_ot_fo=$_GET["str_ot_fo"];
$str_pep=$_GET["str_pep"];
$dt_elab_ot=$_GET["dt_elab_ot"];
$str_ped45=$_GET["str_ped45"];
$dt_Entr_ot=$_GET["dt_Entr_ot"];
$dt_ini_real=$_GET["dt_ini_real"];
$str_recibe_OT=$_GET["str_recibe_OT"];
$dt_term_real=$_GET["dt_term_real"];
$dt_PROGRAMADA=$_GET["dt_PROGRAMADA"];
$str_Constructor=$_GET["str_Constructor"];
$id_res_super=$_GET["id_res_super"];
$str_problematica=$_GET["str_problematica"];
$ctrl_fo=$_GET["ctrl_fo"];
$str_anillo_rof=$_GET["str_anillo_rof"];
$clte_fo=$_GET["clte_fo"];
$str_tipo=$_GET["str_tipo"];

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
		if ($str_tipo_proy!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_tipo_proy = '".$str_tipo_proy."'";
			$contador++;
		}
		if ($dt_meta_term_const!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_meta_term_const = '".$dt_meta_term_const."'";
			$contador++;
		}
		if ($id_edo_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_edo_fo = '".$id_edo_fo."'";
			$contador++;
		}
		if ($id_atraso!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="id_atraso = '".$id_atraso."'";
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
		if ($dt_rch!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_rch = '".$dt_rch."'";
			$contador++;
		}
		if ($dt_def_trayectoria!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_def_trayectoria = '".$dt_def_trayectoria."'";
			$contador++;
		}
		if ($dt_ok_acometida!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_ok_acometida = '".$dt_ok_acometida."'";
			$contador++;
		}
		if ($str_ot_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_ot_fo = '".$str_ot_fo."'";
			$contador++;
		}
		if ($str_pep!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_pep = '".$str_pep."'";
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
		if ($str_ped45!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_ped45 = '".$str_ped45."'";
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
		if ($dt_ini_real!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_ini_real = '".$dt_ini_real."'";
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
		if ($dt_term_real!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_term_real = '".$dt_term_real."'";
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
		if ($str_Constructor!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_Constructor = '".$str_Constructor."'";
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
		if ($str_problematica!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_problematica = '".$str_problematica."'";
			$contador++;
		}
		if ($ctrl_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="ctrl_fo = '".$ctrl_fo."'";
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
		if ($clte_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="clte_fo = '".$clte_fo."'";
			$contador++;
		}
		if ($str_tipo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_tipo = '".$str_tipo."'";
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
		if ($str_tipo_proy!='')
		{
			$campos.=", str_tipo_proy";
			$valores.=", '".$str_tipo_proy."'";
			$contador++;
		}
		if ($dt_meta_term_const!='')
		{
			$campos.=", dt_meta_term_const";
			$valores.=", '".$dt_meta_term_const."'";
			$contador++;
		}
		if ($id_edo_fo!='')
		{
			$campos.=", id_edo_fo";
			$valores.=", '".$id_edo_fo."'";
			$contador++;
		}
		if ($id_atraso!='')
		{
			$campos.=", id_atraso";
			$valores.=", '".$id_atraso."'";
			$contador++;
		}
		if ($id_atraso!='')
		{
			$campos.=", id_atraso";
			$valores.=", '".$id_atraso."'";
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
		if ($dt_rch!='')
		{
			$campos.=", dt_rch";
			$valores.=", '".$dt_rch."'";
			$contador++;
		}
		if ($dt_def_trayectoria!='')
		{
			$campos.=", dt_def_trayectoria";
			$valores.=", '".$dt_def_trayectoria."'";
			$contador++;
		}
		if ($dt_ok_acometida!='')
		{
			$campos.=", dt_ok_acometida";
			$valores.=", '".$dt_ok_acometida."'";
			$contador++;
		}
		if ($str_ot_fo!='')
		{
			$campos.=", str_ot_fo";
			$valores.=", '".$str_ot_fo."'";
			$contador++;
		}
		if ($str_pep!='')
		{
			$campos.=", str_pep";
			$valores.=", '".$str_pep."'";
			$contador++;
		}
		if ($dt_elab_ot!='')
		{
			$campos.=", dt_elab_ot";
			$valores.=", '".$dt_elab_ot."'";
			$contador++;
		}
		if ($str_ped45!='')
		{
			$campos.=", str_ped45";
			$valores.=", '".$str_ped45."'";
			$contador++;
		}
		if ($dt_Entr_ot!='')
		{
			$campos.=", dt_Entr_ot";
			$valores.=", '".$dt_Entr_ot."'";
			$contador++;
		}
		if ($dt_ini_real!='')
		{
			$campos.=", dt_ini_real";
			$valores.=", '".$dt_ini_real."'";
			$contador++;
		}
		if ($str_recibe_OT!='')
		{
			$campos.=", str_recibe_OT";
			$valores.=", '".$str_recibe_OT."'";
			$contador++;
		}
		if ($dt_term_real!='')
		{
			$campos.=", dt_term_real";
			$valores.=", '".$dt_term_real."'";
			$contador++;
		}
		if ($dt_PROGRAMADA!='')
		{
			$campos.=", dt_PROGRAMADA";
			$valores.=", '".$dt_PROGRAMADA."'";
			$contador++;
		}
		if ($str_Constructor!='')
		{
			$campos.=", str_Constructor";
			$valores.=", '".$str_Constructor."'";
			$contador++;
		}
		if ($id_res_super!='')
		{
			$campos.=", id_res_super";
			$valores.=", '".$id_res_super."'";
			$contador++;
		}
		if ($str_problematica!='')
		{
			$campos.=", str_problematica";
			$valores.=", '".$str_problematica."'";
			$contador++;
		}
		if ($ctrl_fo!='')
		{
			$campos.=", ctrl_fo";
			$valores.=", '".$ctrl_fo."'";
			$contador++;
		}
		if ($str_anillo_rof!='')
		{
			$campos.=", str_anillo_rof";
			$valores.=", '".$str_anillo_rof."'";
			$contador++;
		}
		if ($clte_fo!='')
		{
			$campos.=", clte_fo";
			$valores.=", '".$clte_fo."'";
			$contador++;
		}
		if ($str_tipo!='')
		{
			$campos.=", str_tipo";
			$valores.=", '".$str_tipo."'";
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
