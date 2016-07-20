<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');

$id_tramos=$_POST["id_tramos"];
$referencia=$_POST["referencia"];

$id_cons_estatus=$_POST["id_cons_estatus"];
$dt_ins_col=$_POST["dt_ins_col"];
$dt_entrega_gestion_col=$_POST["dt_entrega_gestion_col"];
$dt_integracion_colectora=$_POST["dt_integracion_colectora"];
$dt_enlace_adva_colectora=$_POST["dt_enlace_adva_colectora"];
$dt_inst_equipo_acceso=$_POST["dt_inst_equipo_acceso"];
$dt_entrega_equipo_acceso=$_POST["dt_entrega_equipo_acceso"];
$dt_gestion_equipo_acceso=$_POST["dt_gestion_equipo_acceso"];
$dt_instalacion=$_POST["dt_instalacion"];
$dt_alimen_entrega=$_POST["dt_alimen_entrega"];
$dt_inst_eq_acceso=$_POST["dt_inst_eq_acceso"];
$dt_entraga_eq_acceso=$_POST["dt_entraga_eq_acceso"];
$dt_gestion_eq_acceso=$_POST["dt_gestion_eq_acceso"];
$const_rech=$_POST["const_rech"];
$dt_rechazado=$_POST["dt_rechazado"];
$idcat_motvo_rch_fo=$_POST["idcat_motvo_rch_fo"];
$folio_gestion_nx=$_POST["folio_gestion_nx"];
$folio_gestion_cns=$_POST["folio_gestion_cns"];
$str_pend_clte_const=$_POST["str_pend_clte_const"];


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
		if ($id_cons_estatus!='')
		{		
			$campos.="id_cons_estatus = '".$id_cons_estatus."'";
			$contador++;
		}
		if ($dt_ins_col!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_ins_col = '".$dt_ins_col."'";
			$contador++;
		}
		if ($dt_entrega_gestion_col!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_entrega_gestion_col = '".$dt_entrega_gestion_col."'";
			$contador++;
		}
		if ($dt_integracion_colectora!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_integracion_colectora = '".$dt_integracion_colectora."'";
			$contador++;
		}
		if ($dt_enlace_adva_colectora!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_enlace_adva_colectora = '".$dt_enlace_adva_colectora."'";
			$contador++;
		}
		if ($dt_inst_equipo_acceso!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_inst_equipo_acceso = '".$dt_inst_equipo_acceso."'";
			$contador++;
		}
		if ($dt_entrega_equipo_acceso!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_entrega_equipo_acceso = '".$dt_entrega_equipo_acceso."'";
			$contador++;
		}
		if ($dt_gestion_equipo_acceso!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_gestion_equipo_acceso = '".$dt_gestion_equipo_acceso."'";
			$contador++;
		}
		if ($dt_instalacion!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_instalacion = '".$dt_instalacion."'";
			$contador++;
		}
		if ($dt_alimen_entrega!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_alimen_entrega = '".$dt_alimen_entrega."'";
			$contador++;
		}
		if ($dt_inst_eq_acceso!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_inst_eq_acceso = '".$dt_inst_eq_acceso."'";
			$contador++;
		}
		if ($dt_entraga_eq_acceso!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_entraga_eq_acceso = '".$dt_entraga_eq_acceso."'";
			$contador++;
		}
		if ($dt_gestion_eq_acceso!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="dt_gestion_eq_acceso = '".$dt_gestion_eq_acceso."'";
			$contador++;
		}
		if ($const_rech!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="const_rech = '".$const_rech."'";
			$contador++;
		}
		if ($dt_rechazado!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}	
			$campos.="dt_rechazado = '".$dt_rechazado."'";
			$contador++;
		}
		if ($idcat_motvo_rch_fo!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="idcat_motvo_rch_fo = '".$idcat_motvo_rch_fo."'";
			$contador++;
		}
		if ($folio_gestion_nx!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="folio_gestion_nx = '".$folio_gestion_nx."'";
			$contador++;
		}
		if ($folio_gestion_cns!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="folio_gestion_cns = '".$folio_gestion_cns."'";
			$contador++;
		}
		if ($str_pend_clte_const!='')
		{
			if($contador>0)
			{
				$campos.=", ";	
			}
			$campos.="str_pend_clte_const = '".$str_pend_clte_const."'";
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
		if ($id_cons_estatus!='')
		{
			$campos.=", id_cons_estatus";
			$valores.=	", '".$id_cons_estatus."'";
			$contador++;
		}
		if ($dt_ins_col!='')
		{
			$campos.=", dt_ins_col";
			$valores.=", '".$dt_ins_col."'";
			$contador++;
		}
		if ($dt_entrega_gestion_col!='')
		{
			$campos.=", dt_entrega_gestion_col";
			$valores.=", '".$dt_entrega_gestion_col."'";
			$contador++;
		}
		if ($dt_integracion_colectora!='')
		{
			$campos.=", dt_integracion_colectora";
			$valores.=", '".$dt_integracion_colectora."'";
			$contador++;
		}
		if ($dt_enlace_adva_colectora!='')
		{
			$campos.=", dt_enlace_adva_colectora";
			$valores.=", '".$dt_enlace_adva_colectora."'";
			$contador++;
		}
		if ($dt_inst_equipo_acceso!='')
		{
			$campos.=", dt_inst_equipo_acceso";
			$valores.=", '".$dt_inst_equipo_acceso."'";
			$contador++;
		}
		if ($dt_entrega_equipo_acceso!='')
		{
			$campos.=", dt_entrega_equipo_acceso";
			$valores.=", '".$dt_entrega_equipo_acceso."'";
			$contador++;
		}
		if ($dt_gestion_equipo_acceso!='')
		{
			$campos.=", dt_gestion_equipo_acceso";
			$valores.=", '".$dt_gestion_equipo_acceso."'";
			$contador++;
		}
		if ($dt_instalacion!='')
		{
			$campos.=", dt_instalacion";
			$valores.=", '".$dt_instalacion."'";
			$contador++;
		}
		if ($dt_alimen_entrega!='')
		{
			$campos.=", dt_alimen_entrega";
			$valores.=", '".$dt_alimen_entrega."'";
			$contador++;
		}
		if ($dt_inst_eq_acceso!='')
		{
			$campos.=", dt_inst_eq_acceso";
			$valores.=", '".$dt_inst_eq_acceso."'";
			$contador++;
		}
		if ($dt_entraga_eq_acceso!='')
		{
			$campos.=", dt_entraga_eq_acceso";
			$valores.=", '".$dt_entraga_eq_acceso."'";
			$contador++;
		}
		if ($dt_gestion_eq_acceso!='')
		{
			$campos.=", dt_gestion_eq_acceso";
			$valores.=", '".$dt_gestion_eq_acceso."'";
			$contador++;
		}
		if ($const_rech!='')
		{
			$campos.=", const_rech";
			$valores.=", '".$const_rech."'";
			$contador++;
		}
		if ($dt_rechazado!='')
		{
			$campos.=", dt_rechazado";
			$valores.=", '".$dt_rechazado."'";
			$contador++;
		}
		if ($idcat_motvo_rch_fo!='')
		{
			$campos.=", idcat_motvo_rch_fo";
			$valores.=", '".$idcat_motvo_rch_fo."'";
			$contador++;
		}
		if ($folio_gestion_nx!='')
		{
			$campos.=", folio_gestion_nx";
			$valores.=", '".$folio_gestion_nx."'";
			$contador++;
		}
		if ($folio_gestion_cns!='')
		{
			$campos.=", folio_gestion_cns";
			$valores.=", '".$folio_gestion_cns."'";
			$contador++;
		}
		if ($str_pend_clte_const!='')
		{
			$campos.=", str_pend_clte_const";
			$valores.=", '".$str_pend_clte_const."'";
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
