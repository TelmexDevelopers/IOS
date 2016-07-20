<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Auto Complete - MooTools &amp; PHP</title>
	<script type="text/javascript" src="../autocomplete/scripts/mootools.js"></script>
	<script type="text/javascript" src="../autocomplete/scripts/Observer.js"></script>
	<script type="text/javascript" src="../autocomplete/scripts/Autocompleter.js"></script>

<link rel="stylesheet" type="text/css" href="Autocompleter.css"/>

	<script type="text/javascript">
	/* <![CDATA[ */
	window.addEvent('domready', function()
	  
	 {
		new Autocompleter.Ajax.Json('CAJA1', 'autocomplete.php', 
		{
			//name the element containing the search term something suitable
			//otherwise defaults to 'value'
			'postVar': 'q'
		});
	});
	
	</script>
	<style type="text/css">
	#demo-local, #demo-remote
	{
		width:350px;
		border:1px solid #444;
	}
	</style>
</head>
<body>

<h1>Auto Complete</h1>
<h2>&nbsp;</h2>
<form name="AUTOCOMPLETE" id="AUTOCOMPLETE" action="#" method="post">
  <p>
<label for="hola">Country</label>
<input type="text" name="country" id="CAJA1" />
</p>
</form>


</html>
