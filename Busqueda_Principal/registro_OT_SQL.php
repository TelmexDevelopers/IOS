<?php 
	include('../../adodb/adodb.inc.php');
	include('connection.php');

//variable=$_POST/GET[valor de la caja];
$folio=$_POST['folio'];
$referencia=$_POST['referencia'];
$desc_serv=$_POST['desc_serv'];
$fase=$_POST['fase'];
$edo=$_POST['edo'];
$tipo_proy=$_POST['cat_proyecto'];
$tipo_art=$_POST['tipo_art'];
$cliente=$_POST['cliente'];
$entidad=$_POST['entidad'];
$due_date=$_POST['fecha'];
$date_edo=$_POST['fecha2'];
$division=$_POST['division'];
$siglas=$_POST['siglas'];
$area=$_POST['area'];
$cm=$_POST['cm'];

$valores='';
$campos='';
$contador=0;
//Creamos un if para insertar valores en cada caja de nuestro formulario.
if ($folio!='')
{
	$campos.="SER_N";
	$valores.="'".$folio."'";
	$contador++;
	}
if ($referencia!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="REFERENCIA";
	$valores.="'".$referencia."'";
	$contador++;
	}
if ($desc_serv!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="DESC_SERV";
	$valores.="'".$desc_serv."'";
	$contador++;
	}
if ($fase!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="FASE_SERV";
	$valores.="'".$fase."'";
	$contador++;
	}
if ($edo!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="EDO_SERV";
	$valores.="'".$edo."'";
	$contador++;
	}
if ($tipo_proy!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="TIPO_PROY";
	$valores.="'".$tipo_proy."'";
	$contador++;
	}
if ($tipo_art!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="TIPO_ART";
	$valores.="'".$tipo_art."'";
	$contador++;
	}
if ($cliente!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="USUARIO";
	$valores.="'".$cliente."'";
	$contador++;
	}
if ($entidad!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="SECTOR";
	$valores.="'".$entidad."'";
	$contador++;
	}
if ($due_date!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="´DUE DATE´";
	$valores.="'".$due_date."'";
	$contador++;
	}
if ($date_edo!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="´FECHA DE ESTADO´";
	$valores.="'".$date_edo."'";
	$contador++;
	}
if ($division!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="DD";
	$valores.="'".$division."'";
	$contador++;
	}
if ($siglas!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="A1";
	$valores.="'".$siglas."'";
	$contador++;
	}
if ($area!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="area";
	$valores.="'".$area."'";
	$contador++;
	}
if ($cm!='')

{
	if($contador>0)
	{
		$campos.=" ,";	
		$valores.=" ,";	

	}
	$campos.="ctro_mantto";
	$valores.="'".$cm."'";
	$contador++;
}
//echo $campos."<br>";
//echo $valores."<br>";
//Creamos el insert y concatenamos valores
$SQL="INSERT INTO tabla_seguimiento_serviciosp (".$campos.") values (".$valores.")";
echo $SQL;
//Mensaje de ejecución
$RS = EjecutaQuery($SQL);

if ($RS==true)
{
	echo "Registro correcto";
	}else{
	echo "Error";
		}
?>