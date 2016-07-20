<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mootools: Form.Validator.Inline by unijimpe</title>

<link rel="stylesheet" type="text/css" href="estilo_validacion_ejemplo.css"/>
</head>
<body>
<p><strong>Mootools: Form.Validator.Inline</strong></p>
<form id="formulario_busqueda" name="formulario_busqueda" method="post" action="">
<p>
	Name:<br />
	<input name="name" type="text" id="name" size="40" class="required" />
</p>
<p>
	Username:<br />
	<input name="user" type="text" id="user" size="40" class="required validate-alphanum minLength:5" />
</p>
<p>
	Password:<br />
    <input name="pass" type="text" id="pass" size="40" class="required validate-alphanum" />
</p>
<p>
	Email:<br />
    <input name="email" type="text" id="email" size="40" class="required validate-email" />
</p>
<p>
	Phone:<br />
	<input name="phone" type="text" id="phone" size="40" class="validate-digits" />
</p>
<p>
    <input type="button" name="enviar_dato" id="enviar" value="Enviar" />
</p>
</form>
<p>&nbsp;</p>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/mootools/1.2.4/mootools-yui-compressed.js"></script>
<script type="text/javascript" src="mootools-more.js"></script>
<script type="text/javascript">
window.addEvent('domready', function() {
	MooTools.lang.setLanguage('es-ES');
	validate = new Form.Validator.Inline("formulario_busqueda");
	$('enviar').addEvent('click', function() { 
		validate.validate();
	});
});
</script>
</body>
</html>