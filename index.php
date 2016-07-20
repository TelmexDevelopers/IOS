<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

$firefox = strpos($_SERVER["HTTP_USER_AGENT"], 'Firefox') ? true : false;
if(!$firefox)
{
	header("Location: http: .../iosphp/TELMEX_IOS/firefox.php");
} else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>TELMEX - IOS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<link rel="stylesheet" media="screen" type="text/css" href="css/ios.css" />
<script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"> </script>
<script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"> </script>
<script type="text/javascript" src="autocomplete/scripts/Observer.js"></script>
<script type="text/javascript" src="autocomplete/scripts/Autocompleter.js"></script>
<script type="text/javascript" src="Busqueda_Principal/ajax.js"></script>
<link rel="stylesheet" type="text/css" href="autocomplete/styles/Autocompleter.css"/>
<script type="text/javascript">
window.addEvent('domready', function() {
	MooTools.lang.setLanguage("es-ES");
	validate = new Form.Validator.Inline("frmValidar");
	$('btsend').addEvent('click', login);
			
	new Autocompleter.Ajax.Json('usuario', 'Autocomplete_Principal.php',
	{	
		'postVar': 'q',
		 onRequest: function() {
		  $('mensaje').set('html','<img src="../images/loading.gif" width="22" height="22" alt="Cargando..." />');
		},
		 onComplete: function() {
		  $('mensaje').set('html','');
	}
	});
		
//===============================================================================================================	
	$('password').addEvent('keydown', function (event){
		if (event.key == 'enter')
		                          {
				event.stop();
				event.stopPropagation();
				setTimeout('login()', 250);

			                       }
	});

//===============================================================================================================		

//	window.addEvent('keydown',function(event){
		//if (event.key == $('control').focus())
	//		{
	//			alert('You pressed control.');	
	//		} else {
//			if (event.key == 'enter')
//			{
//				event.stop();
//				event.stopPropagation();
//				setTimeout('login()', 250);
//			}
	//}
//	});
//==================================================================================================
//==================================================================================================
}); // domready
		
//==================================================================================================
//==================================================================================================
function login()			
{
	if (validate.validate())
	{
		var myElement = document.id('mensaje');
		
		myElement.set('html','');
		var myRequest = new Request.JSON({
			url: 'validausuario.php',
			onRequest: function(){
				myElement.set('html', '<img src="images/loading.gif" width="32" height="32" alt="Loading..." />');
			},
			onSuccess: function(responseJSON, responseText){
				var json = JSON.parse(responseText);
				
				myElement.set('html', json.mensaje);
				if (json.registros == 1)
				{
					setTimeout('delayer()', 1000)
				}
			},
			onFailure: function(){
				myElement.set('text', 'Sorry, your request failed :(');
			}
		});
		myRequest.send({
			
			method: 'get',
			data: 'usr='+$('usuario').value+'&pwd='+$('password').value
		});
	}
}
//==================================================================================================
//==================================================================================================
	  function delayer()
	  { 
		  window.location="inicio.php";
	  }
//==================================================================================================
//==================================================================================================
</script>
  </head>

  <body>
    <div id="container">
      <div id="body_space">
        <div id="header">
		  <div id="logo-block">
		    <!-- type your logo and small slogan here -->
            <p id="logo"><a href="index.php"><img src="images/telmex.jpg" width="158" height="89" alt="TELMEX" border="0" /></a></p>
		    <!-- <p id="slogan">a small website slogan goes here</p>
			end logo and small slogan -->
		  </div>
		  <div id="definels">
		    <!-- login -->
		    <div id="login_top">
            <p style="font-size:10px;"><?php echo date("l, F jS Y "); ?></p>
			</div>
			<!-- end login -->
			<!-- search -->
			<div id="search">
            <!-- search 
			  <form name="search" method="get" action="">
              Buscar Referencia: 
                <input type="text" class="box" />
                <button class="btn" title="Buscar Referencia">Buscar</button>
              </form>-->
            </div>
		    <!-- end search -->
		  </div>
		  <div class="cls"></div>
  		  <div id="top-nav-bg">
            <div id="top-nav">
			  <!-- start top navigation bar -->

			  <!-- end top navigation bar -->
            </div>
	      </div>
          
	    </div>
	    <div id="clouds">
		  <!-- large slogan here -->
   	      <div id="clouds-slogan1"><p>IOS</p></div>
	      <div id="clouds-slogan2"><p>(Integrador de Operaci&oacute;n y Sistema)</p></div>
		  <!-- end large slogan -->
	    </div>
	  </div>
	</div>
	<div id="page">
	  <div id="page-padding">
        <!-- start content -->	    
	    <div id="content">
	      <div id="content-padding">
            <p><center>
            <form id="frmValidar" name="frRegister" method="post" action="">
			<table width="400" border="0">
              <tr>
                <td colspan="2" align="center"><b>Ingresa tus datos de acceso:</b></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td align="right" width="155">Usuario: </td>
                <td><p><input name="usuario" type="text" id="usuario"  size="20" maxlength="20" class="required validate-alphanum minLength:5" /></p></td><!-- autocomplete="off"-->
              </tr>
              
              <tr>
                <td align="right">Password: </td>
                <td><p><input name="password" type="password" id="password" size="20" maxlength="20" class="required validate-alphanum minLength:6" /></p></td><!-- autocomplete="off"-->
              </tr>
              <tr>
                <td colspan="2" height="32" valign="middle"><div id="mensaje" align="center" style="font-weight:bold; vertical-align:middle;"></div></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="center"><input type="button" name="btsend" id="btsend" value="Ingresar" class="button" /></td>
              </tr>
            </table></form>
            </center></p>
		  </div>
		</div>
		<!-- end content -->
	  </div>
	  <div id="footer">
	    <div id="footer-pad">
	      <div class="line"></div>
		  <!-- footer and copyright notice -->
	      <p>Telmex&reg; 2013</p>
		  <!-- end footer and copyright notice -->
	    </div>
	  </div>
	</div>
  </body>
</html>
<?php } ?>