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

?>