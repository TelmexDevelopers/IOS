<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

$link = @mysql_connect("10.94.130.36", "ios_new", "provi");
mysql_select_db("ios_new", $link);


// maximo por pagina
$limit = 100;

// pagina pedida
//	var datos = 'q='+combo1+'&r='+combo2+'&s='+combo3+'&t='+texto+'&pag='+page;
			

$q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$t=$_GET["t"];
$t=$_GET["h"];
$campos="";
$cont = 0;

if ($_GET["q"] != "" || $_GET["r"] != "" || $_GET["s"] != "" || $_GET["t"] != "" || $_GET["h"] != "")
{
	$campos.="WHERE ";
}
if ($_GET["q"] != "" || $_GET["q"] == "*")
{
	
	$campos.="dir_division = '".$_GET["q"]."'  ";
	$cont++;
}

if ($_GET["r"] != "" || $_GET["r"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" edo_serv = '".$_GET["r"]."'  ";
	$cont++;
}
if ($_GET["s"] != "" || $_GET["s"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" fase_serv = '".$_GET["s"]."'  ";
	$cont++;
}
if ($_GET["h"] != "" || $_GET["h"] == "*")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" str_Fase_ios = '".$_GET["h"]."'  ";
	$cont++;
}
if ($_GET["t"] != "")
{
	if($cont>0)
	{
		$campos.=" AND";	
	}
	$campos.=" REFERENCIA= '$t'";
	$cont++;
}


$pag = (int) $_GET["pag"];
if ($pag < 1)
{
   $pag = 1;
}
$offset = ($pag-1) * $limit;
echo ('pagina: ') ;
echo $pag;

$sql = "SELECT SQL_CALC_FOUND_ROWS 
referencia,
desc_serv,
due_date,
GRUPO_DIL_SERVICIO,
fase_serv,
edo_serv,
fecha_estado,
FAMILIA,
TECNOLOGIA,
usuario,
sector,
coordinacion_abrev,
dir_division,
str_Fase_Ios,
str_Area_responsable,
SUBGERENTE_RESPONSABLE, 
SUPERVISOR ,
dt_Fecha_Fase_IOS,
dt_Fecha_INI_Analisis,
dt_Fecha_FIN_Analisis,
dt_Fecha_INI_Equipamiento,
dt_Fecha_INI_Seguimiento,
dt_Fecha_FIN_Seguimiento,
dt_Fecha_INI_Documentacion, 
dt_Fecha_INI_Construccion,
dt_Fecha_FIN_Construccion,
dt_Fecha_INI_Entrega,
dt_Fecha_FIN_Entrega,
bt_Documentado 



 FROM vw_ios_reg ".$campos." LIMIT $offset, $limit";
echo $sql;
$sqlTotal = "SELECT FOUND_ROWS() as total";

$rs = mysql_query($sql);
$rsTotal = mysql_query($sqlTotal);

$rowTotal = mysql_fetch_assoc($rsTotal);
// Total de registros sin limit
$total = $rowTotal["total"];

?>
<table style="border:1px solid #FF0000; color:#000099;width:400px;">
<table border="1" bordercolor="#000">

   <thead>
      <tr>
<td>referencia</td>
<td>desc_serv</td>
<td>due_date</td>
<td>GRUPO_DIL_SERVICIO</td>
<td>fase_serv</td>
<td>edo_serv</td>
<td>fecha_estado</td>
<td>FAMILIA</td>
<td>TECNOLOGIA</td>
<td>usuario</td>
<td>sector</td>
<td>coordinacion_abrev</td>
<td>dir_division</td>
<td>str_Fase_Ios</td>
<td>str_Area_responsable</td>
<td>SUBGERENTE_RESPONSABLE</td>
<td>SUPERVISOR </td>
<td>dt_Fecha_Fase_IOS</td>
<td>dt_Fecha_INI_Analisis</td>
<td>dt_Fecha_FIN_Analisis</td>
<td>dt_Fecha_INI_Equipamiento</td>
<td>dt_Fecha_INI_Seguimiento</td>
<td>dt_Fecha_FIN_Seguimiento</td>
<td>dt_Fecha_INI_Documentacion</td>
<td>dt_Fecha_INI_Construccion</td>
<td>dt_Fecha_FIN_Construccion</td>
<td>dt_Fecha_INI_Entrega</td>
<td>dt_Fecha_FIN_Entrega</td>
<td>bt_Documentado</td>


      </tr>
   </thead>
   <tbody> 
     <?php

         $totalPag = ceil($total/$limit);
		  $links = array();
		  
         for( $i=1; $i<=$totalPag ; $i++)
         {
			
//            $links[] = "<a href=\"?pag=$i\">$i</a>"; 
			
            $links[] = "<a href=\"javascript:cambia_pagina($i);\">$i</a>";
			
			 
         }
       echo implode(" - ", $links);
		 
      ?>
      <?php
         while ($row = mysql_fetch_assoc($rs))
         {
			 
			 
$referencia= 		$row["referencia"];
$desc_serv= 		$row["desc_serv"];
$due_date= 			$row["due_date"];
$GRUPO_DIL_SERVICIO=$row["GRUPO_DIL_SERVICIO"];
$fase_serv= 		$row["fase_serv"];
$edo_serv= 			$row["edo_serv"];
$fecha_estado= 		$row["fecha_estado"];
$FAMILIA=	  		$row["FAMILIA"];
$TECNOLOGIA=  		$row["TECNOLOGIA"];
$usuario= 		 	$row["usuario"];
$sector= 		 	$row["sector"];
$coordinacion_abrev=$row["coordinacion_abrev"];
$dir_division= 		$row["dir_division"];
$str_Fase_Ios= 		$row["str_Fase_Ios"];
$str_Area_responsable= 	$row["str_Area_responsable"];
$SUBGERENTE_RESPONSABLE=$row["SUBGERENTE_RESPONSABLE"];
$SUPERVISOR = 		$row["SUPERVISOR "];
$dt_Fecha_Fase_IOS= $row["dt_Fecha_Fase_IOS"];
$dt_Fecha_INI_Analisis= $row["dt_Fecha_INI_Analisis"];
$dt_Fecha_FIN_Analisis= $row["dt_Fecha_FIN_Analisis"];
$dt_Fecha_INI_Equipamiento=$row["dt_Fecha_INI_Equipamiento"];
$dt_Fecha_INI_Seguimiento= 	$row["dt_Fecha_INI_Seguimiento"];
$dt_Fecha_FIN_Seguimiento= 	$row["dt_Fecha_FIN_Seguimiento"];
$dt_Fecha_INI_Documentacion=$row["dt_Fecha_INI_Documentacion"];
$dt_Fecha_INI_Construccion= $row["dt_Fecha_INI_Construccion"];
$dt_Fecha_FIN_Construccion= $row["dt_Fecha_FIN_Construccion"];
$dt_Fecha_INI_Entrega= $row["dt_Fecha_INI_Entrega"];
$dt_Fecha_FIN_Entrega= $row["dt_Fecha_FIN_Entrega"];
$bt_Documentado = $row["bt_Documentado "];

			
				
         ?>
         <tr>
         
         
<td><?php echo $referencia; ?></td>
<td><?php echo $desc_serv; ?></td>
<td><?php echo $due_date; ?></td>
<td><?php echo $GRUPO_DIL_SERVICIO; ?></td>
<td><?php echo $fase_serv; ?></td>
<td><?php echo $edo_serv; ?></td>
<td><?php echo $fecha_estado; ?></td>
<td><?php echo $FAMILIA; ?></td>
<td><?php echo $TECNOLOGIA; ?></td>
<td><?php echo $usuario; ?></td>
<td><?php echo $sector; ?></td>
<td><?php echo $coordinacion_abrev; ?></td>
<td><?php echo $dir_division; ?></td>
<td><?php echo $str_Fase_Ios; ?></td>
<td><?php echo $str_Area_responsable; ?></td>
<td><?php echo $SUBGERENTE_RESPONSABLE; ?></td>
<td><?php echo $SUPERVISOR ; ?></td>
<td><?php echo $dt_Fecha_Fase_IOS; ?></td>
<td><?php echo $dt_Fecha_INI_Analisis; ?></td>
<td><?php echo $dt_Fecha_FIN_Analisis; ?></td>
<td><?php echo $dt_Fecha_INI_Equipamiento; ?></td>
<td><?php echo $dt_Fecha_INI_Seguimiento; ?></td>
<td><?php echo $dt_Fecha_FIN_Seguimiento; ?></td>
<td><?php echo $dt_Fecha_INI_Documentacion; ?></td>
<td><?php echo $dt_Fecha_INI_Construccion; ?></td>
<td><?php echo $dt_Fecha_FIN_Construccion; ?></td>
<td><?php echo $dt_Fecha_INI_Entrega; ?></td>
<td><?php echo $dt_Fecha_FIN_Entrega; ?></td>

         
          
         </tr>
         <?php
         }
      ?>
   </tbody>
   <tfoot>
      <tr>
      
         <td colspan="2"></td><p align="center">
          <form method="get" action="http://10.94.130.36/iosphp/ios/busq_esp/reporte.php">
	<input type="button" name="xls" id="xls"  value="Enviar a MS Excel" />
     
         
      <input type="button" name="pdf" id="pdf"  value="Enviar a PDF"/>
      <input type="button" name="xls" id="pdf"  value="Enviar a MS Excel"/>
      <input type="button" name="doc" id="pdf"  value="Enviar a MS Word"/></form>
  <input type="button" name="button" id="button" value="Imprimir" onclick="window.print();
      </tr>
   </tfoot>
</table>