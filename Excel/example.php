<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subir archivo</title>
</head>

<body>
<h1>Subir Archivo</h1>
<?php
if(isset($_POST['guardar'])){
    //conectamos al servidor
include('../../includes/connection.php');

//    mysql_connect("localhost","root","");
mysql_select_db("ios_new");
 
    //abrimos el archivo temporal que se crea
    $fh = fopen($_FILES['Lst_SERVICIO.txt']['Lst_SERVICIO.txt'],'r');
    if($fh){    //si se abre bien leemos el archivo
        $archivo = fread($fh, filesize($_FILES['Lst_SERVICIO.txt']['Lst_SERVICIO.txt']));
        fclose($fh);
       
        //limpiamos el contenido
        $archivo = addslashes($archivo);
        $tipo = $_FILES['Lst_SERVICIO.txt']['type'];
        //nombre del archivo
        if(empty($_POST['nombre']))
            $nombre = sql_quote($_FILES['Lst_SERVICIO.txt']['name']);
        else
            $nombre = $_POST['nombre'];
           
        //insertar el archivo a la bd
        $sql="insert into archivos (nombre, archivo, tipo) values ('$nombre', '$archivo', '$tipo')";
        mysql_query($sql);
       
        echo "El archivo se cargo con exito<br />";
    } else
        echo "Error al cargar el archivo<br />";
}   
?>
<form action="subir_archivo.php" method="post" enctype="multipart/form-data" name="form1">
  <p>Archivo.:
    <input type="file" name="archivo" />
</p>
  <p>
    <input type="submit" name="guardar" value="Guardar" />
  </p>
</form>
</body>
</html> 