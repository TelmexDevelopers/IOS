<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Blogdephp.com, ¿cómo hacer un login de usuarios en php? Ver script y demo!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="http://www.blogdephp.com/script/php-login.css" type="text/css" media="screen">
<!--<link rel="stylesheet" href="../../php-login.css" type="text/css" media="screen">-->
</head>

<body style="margin-top:0px">
<?php echo form_open('php/login'); ?>
<div class="Info">
   <p class="Titulo">Demo: ¿cómo hacer un login de usuarios en php?</p>
   <p>&nbsp;</p>   
</div>
<div id="LoginUsuarios">
   <div class="fila">
      <div class="LoginUsuariosCabecera">E-mail:</div>
      <div class="LoginUsuariosDato"><input type="text" name="maillogin" value="<?= set_value('maillogin'); ?>" size="25" /></div>
      <div class="LoginUsuariosError">
      <?
      if(isset($error)){
         echo "<p>".$error."</p>";
      }
      echo form_error('maillogin');
      ?>
      </div>
   </div>      
   <div class="fila">
      <div class="LoginUsuariosCabecera">Contraseña:</div>
      <div class="LoginUsuariosDato"><input type="password" name="passwordlogin" value="<?= set_value('passwordlogin'); ?>" size="25" /></div>
      <div class="LoginUsuariosError"><?= form_error('passwordlogin');?></div>
   </div>
   <div class="fila">
      <div class="LoginUsuariosCabecera"></div>
      <div class="LoginUsuariosDato"></div>
   </div>      
   <div class="fila">
      <div class="LoginUsuariosCabecera"><input type="submit" value="Ingresar"></div>
      <div class="LoginUsuariosDato"></div>
   </div>      
</div>
<p>&nbsp;</p>   
<p>&nbsp;</p>   
</form>
<div class="Info">
   <p><strong><u>Datos de acceso</u></strong> (correspondiente a un usuario ya ingresado en la base de datos)</p>
   <p><strong>e-mail</strong>: diego@blogdephp.com</p>
   <p><strong>password</strong>: blogdephp</strong></p>
</div>
<p>&nbsp;</p>   
<p>&nbsp;</p>   
<div class="Info">
   <p><strong><u>Requerimientos</u></strong></p>
   <p>Para poder implementar este script de login, se requiere el framework de php "Codeigniter"</p>
   <p>(esta maravillosa herramienta nos ayuda a ahorrar mucho tiempo y esfuerzo en nuestros trabajos de programación php).</p>
   <p>&nbsp;</p>
   <p>La empresa <a href="http://www.solo10.com/productos/WebHostingLinux/?safblogdephp">Solo10.com</a>, cuando contratas un paquete de hosting anual desde u$s 49.95,</p>
   <p>te ofrece la instalación y configuración inicial del Codeigniter gratis :-)</p>
   <p>&nbsp;</p>   
   <p>Este blog y demo se encuentran alojados en los servidores de Solo10.com.</p>
   <p>Te recomiendo el <a href="http://www.solo10.com/productos/WebHostingLinux/?safblogdephp">servicio de hosting</a> que ofrece esta empresa de hablahispana!</p>
</div>
<div class="Info">
   <p><a href="http://www.blogdephp.com/php-login/">Volver a Blog</a></p>
</div>
</body>
</html>