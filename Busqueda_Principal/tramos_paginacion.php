<?php
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
	header('Content-Type: text/html; charset=UTF-8');
	
     session_start();
     include_once('../adodb/adodb.inc.php');
     include_once('../adodb/adodb-pager.inc.php');
     require_once("connection.php");
	 require("../includes/funciones.php");
	 $CheckSession = CheckSession();
	 
	
	if ($_GET["tramos"])
	{
		$_SESSION['ref_telmex'] = $_GET['tramos'];
	
	$sql.="SELECT referencia, ref_tramo, edo_tramo, coordinacion_abrev, coordinacion, DATE_FORMAT(fecha_afect,'%Y/%m/%d') as fecha_afect, ete_n, fase_serv, edo_serv, tipo_tecnologia, tipo_lada_enlace, DATE_FORMAT(fec_act,'%Y/%m/%d') as fec_act, tra_obser, tra_punta, ete_n_rc, area_responsable, DATE_FORMAT(fec_real_term,'%Y/%m/%d') as fec_real_term, aca_n_alc  FROM tb_tramos WHERE referencia = '".$_SESSION['ref_telmex']."'";
	
	
	//echo $sql;
	
	$rows_per_page = 10;
	echo '<style type="text/css">
	.Texto_Chico_Blanco {
		font-family:Verdana, Geneva, sans-serif;
		font-size: 8px;
		color: #FFF;
	}
	.Texto_Mediano_Negro {
		font-family:Verdana, Geneva, sans-serif;
		font-size: 12px;
		color: #000000;
	}
	
	.Texto_Mediano_Gris {
		font-family:Verdana, Geneva, sans-serif;
		font-size: 12px;
		color: #666666;
	}
		.Titulo_Gris {
		font-family:Verdana, Geneva, sans-serif;
		font-size: 18px;
		color: #666666;
		text-align: center;
	}

	</style>
	';
	echo '<div class="Titulo_Gris"><b>TRAMOS</b></div>';
	$pager = Pager($sql,$rows_per_page, $_SESSION['ref_telmex']);
//	$pager = Pager(htmlentities($sql,ENT_QUOTES,"UTF-8"),$rows_per_page, $_SESSION['ref_telmex']);

	} else {
		echo "Seleccione una referencia";	
		
	}
	
 ?>
