<?php
$fp = fopen('Lst_SERVICIO.txt','r');
if (!$fp) {echo 'ERROR: No ha sido posible abrir el archivo. Revisa su nombre y sus permisos.'; exit;}

 
$loop = 0; // contador de líneas
while (!feof($fp)) { // loop hasta que se llegue al final del archivo
$loop++;
$line = fgets($fp, $referencia, $ser_n,$usuario, $fase, $edo, $tipo_proy, $fecha_edo, $criticidad);

// guardamos toda la línea en $line como un string
// dividimos $line en sus celdas, separadas por el caracter |
// e incorporamos la línea a la matriz $field
$field[$loop] = explode ('|', $line);

foreach ($line as $linea_num => $line)
{
    $datos = explode("\t",$line);
 
    $referencia = trim($datos[0]);
    $ser_n = trim($datos[1]);
    $usuario = trim($datos[2]);
	$fase = trim ($datos[3]);
	$edo = trim ($datos[4]);
	$tipo_proy = trim ($datos[5]);
	$fecha_edo = trim ($datos[6]);
	$criticidad = trim ($datos[7]);

 
$sql = "insert into tb_hist_corte (referencia, ser_n, usuario, fase, edo, tipo_proy, fecha_edo, criticidad) values ('$referencia', '$ser_n', '$usuario', '$fase', '$edo', '$tipo_proy', '$fecha_edo','$criticidad')";


mysql_query($sql);
       
//        echo "El archivo se cargo con exito<br />";
//    } else
//        echo "Error al cargar el archivo<br />";



// generamos la salida HTML
echo '
Archivo: <input name="" type="text" />
'
.'<input name="Examinar" type="file" />';

$fp++; // necesitamos llevar el puntero del archivo a la siguiente línea
}
fclose($fp);
}
?>
<?php
echo "<mm:dwdrfml documentRoot=" . __FILE__ .">";$included_files = get_included_files();foreach ($included_files as $filename) { echo "<mm:IncludeFile path=" . $filename . " />"; } echo "</mm:dwdrfml>";
?>