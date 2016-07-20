<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subir archivo</title>
</head>

<body>
<h1>Subir Archivo</h1>
<?php
    //conectamos al servidor
include('../../includes/connection.php');

//    mysql_connect("localhost","root","");
mysql_select_db("ios_new");
 
    //abrimos el archivo temporal que se crea
    $fh = fopen($_FILES['archivo']['name'],'r');
    if($fh){    //si se abre bien leemos el archivo
        $archivo = fread($fh, filesize($_FILES['archivo']['name']));
        fclose($fh);
       
        //limpiamos el contenido
        $archivo = addslashes($Lst_SERVICIO);
        $tipo = $_FILES['archivo']['type'];
//        //nombre del archivo
//        if(empty($_POST['nombre']))
//            $nombre = sql_quote($_FILES['archivo']['nombre']);
//        else
//            $nombre = $_POST['nombre'];
           
        //insertar el archivo a la bd
        $sql="insert into tb_hist_corte (referencia, ser_n, usuario, fase, edo, tipo_proy, fecha_edo, criticidad, fecha_insert_regis) values ('$referencia', '$ser_n', '$usuario', '$fase', '$edo', '$tipo_proy', '$fecha_edo','$criticidad', '$fecha_insert_regis')";
        mysql_query($sql);
       
        echo "El archivo se cargo con exito<br />";
    } else
        echo "Error al cargar el archivo<br />";
   
?>
