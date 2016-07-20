<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

include('../adodb/adodb.inc.php');
include('../includes/connection.php');

$sql="SELECT * FROM  tb_seguimiento_servicios ";

$q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$t=$_GET["t"];

$cont = 0;

if ($_GET["q"] != "" || $_GET["r"] != "" || $_GET["s"] != "" || $_GET["t"] != "")
{
	$sql.="WHERE ";
}
if ($_GET["q"] != "" || $_GET["q"] == "*")
{
	$sql.="pta_dir_division = '".$_GET["q"]."'  ";
	$cont++;
}
if ($_GET["r"] != "" || $_GET["r"] == "*")
{
	if($cont>0)
	{
		$sql.=" AND";	
	}
	$sql.=" SECTOR = '".$_GET["r"]."'  ";
	$cont++;
}
if ($_GET["s"] != "" || $_GET["s"] == "*")
{
	if($cont>0)
	{
		$sql.=" AND";	
	}
	$sql.=" fase_serv = '".$_GET["s"]."'  ";
	$cont++;
}
if ($_GET["t"] != "")
{
	if($cont>0)
	{
		$sql.=" AND";	
	}
	$sql.=" REFERENCIA= '$t'";
	$cont++;
}
echo $sql;
$RS = TraeRecordset($sql);
if ($RS){
$numero_campos = $RS->FieldCount();

echo $numero_campos;
}
?>
<table style="border:1px solid #FF0000; color:#000099;width:400px;">
<tr style="background:#99CCCC;">
<tr>
<th>AREA_CAT_NUEVO</th>
<th>coordinacion_abrev</th>
<th>fase_serv</th>
</tr>
<?php
while(!$RS->EOF)
  {
  echo "<tr>";
	for($x=0;$x<=$numero_campos;$x++) {
  		echo "<td>" . $RS->fields($x) . "</td>";
	}
  echo "</tr>";
  $RS->MoveNext();
  }
  echo "</table>";
?>
