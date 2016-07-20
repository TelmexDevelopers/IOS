<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/estilo.css" media="screen" rel="stylesheet" type="text/css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>
        	$(document).ready(function(){
				$("#frmArchivo").submit(function(){
      				     				
      				var datos = new FormData();
      				datos.append('archivo',$('#archivo')[0].files[0]);
									
      				$.ajax({
      					type:"post",
      					dataType:"json",
      					url:"importar.php",      					
      					contentType:false,
						data:datos,
						processData:false,
						cache:false
      				}).done(function(respuesta){      					
      					alert(respuesta.mensaje);      					
      				});
      				return false;
      			});
      		});
        </script>        
    </head>
    <body>                 
       	<form name='frmArchivo' id="frmArchivo" method="post">       	
  			<label>Archivo:</label>
   			<input type="file" name="archivo" id="archivo" accept=".csv" />
   			<input type="hidden" name="MAX_FILE_SIZE" value="20000" />       			       
   			<input type = "submit" name="enviar" value="Importar"/>       	
      	</form>       
    </body>
</html>
