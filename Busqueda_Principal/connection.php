<?php 

//*****************************************************************************************************************

	function AbrirConexion(){
	 $conn = ADONewConnection("mysql"); 
    $conn->Connect('10.94.130.36','ios_new','provi','ios_new') or die('Connection Failed');

	 return $conn;
	}

//*****************************************************************************************************************
   function EjecutaQuery($sql){
		$db = AbrirConexion();
		$RS = $db->Execute($sql);
		if (!$RS) {
			$resultado = false;
		}else{
			$resultado = true;
		}
		return $resultado;
		$RS->Close();
		$db->Close();
	}
//*****************************************************************************************************************

	function TraeRecordset($sql){
	 $db = AbrirConexion();
     $RS = $db->Execute($sql);
     return $RS;
     $db->Close();
	}
//*****************************************************************************************************************
	function Pager($sql,$rows_per_page)
	{
		if (isset($_SESSION['ref_telmex']))
		{
			$referencia = $_SESSION['ref_telmex'];
		} else {
			$referencia = "";
		}
		$db = AbrirConexion();
		//echo $sql;
		$pager = new ADODB_Pager($db,$sql,$referencia);
		$pager->Render($rows_per_page);
	}
//*****************************************************************************************************************

function Excel_Columns()
{
	$abecedario = array();
	for ($i="A" ; $i!="IW" ; $i++) {
		 $abecedario[] = $i;
	}
	return $abecedario;
}
//*****************************************************************************************************************

?>