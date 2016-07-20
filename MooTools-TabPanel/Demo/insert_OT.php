<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../../adodb/adodb.inc.php');
include('../../includes/connection.php');

$F_ini=$_POST["F_ini"];
$F_term=$_POST["F_term"];
$anillo=$_POST["anillo"];
$cll=$_POST["cll"];
$codigo=$_POST["codigo"];
$element=$_POST["element"];
$elemnt_pep=$_POST["elemnt_pep"];
$f_REF=$_POST["f_REF"];
$f_asignadas=$_POST["f_asignadas"];
$filial=$_POST["filial"];
$id_prioridad=$_POST["id_prioridad"];
$id_tramos=$_POST["id_tramos"];
$n_accesso=$_POST["n_accesso"];
$nota=$_POST["nota"];
$observaciones=$_POST["observaciones"];
$posicion_dbfo=$_POST["posicion_dbfo"];
$referencia=$_POST["referencia"];
$str_Direccion=$_POST["str_direccion_ot"];
$str_tipo_servicio=$_POST["str_tipo_servicio"];
$str_Usuario=$_POST["str_usuario_ot"];
$str_Usuario_Puntas=$_POST["str_usuario_puntas_ot"];
$trabajos_realizar=$_POST["trabajos_realizar"];

$id_Area_Resp=$_POST["id_Area_Resp"];
$id_Tipo_Usuario=$_POST["id_Tipo_Usuario"];
$id_Usuario_Elab=$_POST["id_Usuario_Elab"];
$id_Usuario_subgte = "3";


if ($id_Tipo_Usuario == 3 || $id_Tipo_Usuario == 4)
{
	$SQL_sel = "SELECT id_Usuario_Jefe_Inmediato FROM cat_Usuarios WHERE id_usuario = ".$id_Usuario_Elab;
	$RS_sel = TraeRecordset($SQL_sel);
	if (!$RS_sel) die('Error en DB!');
	$id_Usuario_VoBo = $RS_sel->fields(0);
} else {
	$id_Usuario_VoBo = "3";
}
if ($referencia!='' && $id_tramos !='')
{
	
	$valores='';
	$campos='';

		if ($id_Usuario_Elab!='')
		{
			$campos.=", id_Usuario_elab";
			$valores.=", ".$id_Usuario_Elab."";
			$contador++;
		}
		if ($id_Usuario_VoBo!='')
		{
			$campos.=", id_Usuario_VoBo";
			$valores.=", ".$id_Usuario_VoBo."";
			$contador++;
		}
		if ($id_Usuario_subgte!='')
		{
			$campos.=", id_Usuario_subgte";
			$valores.=", ".$id_Usuario_subgte."";
			$contador++;
		}
		if ($filial!='')
		{
			$campos.=", id_filial";
			$valores.=", ".$filial."";
			$contador++;
		}
		if ($codigo!='')
		{
			$campos.=", str_codigo";
			$valores.=	", '".$codigo."'";
			$contador++;
		}
		if ($n_accesso!='')
		{
			$campos.=", n_accesso";
			$valores.=", '".$n_accesso."'";
			$contador++;
		}
		if ($f_REF!='')
		{
			$campos.=", f_REF ";
			$valores.=", '".$f_REF."'";
			$contador++;
		}
		if ($anillo!='')
		{
			$campos.=", anillo";
			$valores.=", '".$anillo."'";
			$contador++;
		}
		if ($posicion_dbfo!='')
		{
			$campos.=", posicion_dbfo";
			$valores.=", '".$posicion_dbfo."'";
			$contador++;
		}
		if ($F_ini!='')
		{
			$campos.=", F_ini";
			$valores.=", '".$F_ini."'";
			$contador++;
		}
		if ($F_term!='')
		{
			$campos.=", F_term";
			$valores.=", '".$F_term."'";
			$contador++;
		}
		if ($f_asignadas!='')
		{
			$campos.=", f_asignadas";
			$valores.=", '".$f_asignadas."'";
			$contador++;
		}
		if ($element!='')
		{
			$campos.=", element";
			$valores.=", '".$element."'";
			$contador++;
		}
		if ($elemnt_pep!='')
		{
			$campos.=", elemnt_pep";
			$valores.=", '".$elemnt_pep."'";
			$contador++;
		}
		if ($trabajos_realizar!='')
		{
			$campos.=", trabajos_realizar";
			$valores.=", '".$trabajos_realizar."'";
			$contador++;
		}
		if ($nota!='')
		{
			$campos.=", nota";
			$valores.=", '".$nota."'";
			$contador++;
		}
		if ($observaciones!='')
		{
			$campos.=", observaciones";
			$valores.=", '".$observaciones."'";
			$contador++;
		}
		if ($id_prioridad!='')
		{
			$campos.=", id_prioridad ";
			$valores.=", '".$id_prioridad."'";
			$contador++;
		}
		if ($str_tipo_servicio!='')
		{
			$campos.=", str_tipo_servicio";
			$valores.=", '".$str_tipo_servicio."'";
			$contador++;
		}
		if ($cll!='')
		{
			$campos.=", cll";
			$valores.=", '".$cll."'";
			$contador++;
		}
		if ($str_Usuario!='')
		{
			$campos.=", str_Usuario";
			$valores.=", '".$str_Usuario."'";
			$contador++;
		}
		if ($str_Usuario_Puntas!='')
		{
			$campos.=", str_Usuario_Puntas";
			$valores.=", '".$str_Usuario_Puntas."'";
			$contador++;
		}
		if ($str_Direccion!='')
		{
			$campos.=", str_Direccion";
			$valores.=", '".$str_Direccion."'";
			$contador++;
		}
		
		//echo $campos."<br>";
		//echo $valores."<br>";
		
			$SQL="INSERT INTO tb_ot_equip (referencia,id_tramos".$campos.") VALUES ('".$referencia."','".$id_tramos."'".$valores.")";
			echo $SQL."<br>";
			//$RS = EjecutaQuery($SQL);
			$db = AbrirConexion();
			//$RS = $db->Execute($SQL);
			$insert_ID = $db->Insert_ID();
			
			if ($insert_ID > 0)
			{
				$str_ot=$uil.$insert_ID.$date;

				$SQL="UPDATE tb_ot_equip SET str_OT = '".$str_ot."'WHERE id_ot = ".$insert_ID;
				$db = AbrirConexion();
				$RS = $db->Execute($SQL);
				
				if (count($_POST["cantidad"]) > 0)
				{
					$valores_insert = "";
					$cont = 0;
					$cont_1 = 0;
					foreach($_POST["cantidad"] as $campo_0 => $valor_0)
					{
						foreach($valor_0 as $campo_1 => $valor_1)
						{
							$cont_1++;
							if ($cont == 0)
							{
								$valores_insert.="(".$insert_ID.",".$valor_1;
							} else {
								$valores_insert.=",'".$valor_1."')";
								if ($cont_1 < count($_POST["cantidad"])-1)
								{
									$valores_insert.= ", ";
								}
							}
							if ($cont == 0)
							{
								$cont++;
							} else {
								$cont = 0;
							}
						}
					}
					
					$SQL_cant="INSERT INTO tb_insumos (id_ot, int_cantidad,str_descripcion) VALUES ".$valores_insert."";
					$RS_cant =  EjecutaQuery($SQL_cant);
					//echo $SQL_cant;
				}
			}
		
		if ($RS==false)
		{
			echo "Error2";
		} else {
			if ($insert_ID > 0)
			{
				echo '<br />Actualiz&oacute; Registro Correctamente!';
				echo '<input type="text" id="hidden_num_ot" name="hidden_num_ot" value="'.$insert_ID.'">';
			}
		}
}
?>
