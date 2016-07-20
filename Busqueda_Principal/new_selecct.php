<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">



var objetoXhr = Xajax();

var READY_STATE_UNINITIALIZED = 0;
var READY_STATE_LOADING = 1;
var READY_STATE_LOADED = 2;
var READY_STATE_INTERACTING = 3;
var READY_STATE_COMPLETE = 4;
var READY_STATUS = 200;

function Xajax() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
        }else if(window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    
function cargarAjax(url,metodo,funcion,parametros,objetoAjax) {
    if (objetoAjax) {
        objetoAjax.onreadystatechange = funcion;
        objetoAjax.open(metodo,url,true);
        objetoAjax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        objetoAjax.send(parametros);
        }
    }

// aqui realizo la llamada y recepcion de datos con ajax y lo inserto
// en el div llenarDatos del codigo html...
    
function ajaxProduct() {
    var texto = "";
    var div = document.getElementById('llenarDatos');
        if (objetoXhr.readyState == READY_STATE_COMPLETE) {
            if (objetoXhr.status == READY_STATUS) {
                var JSON = eval("("+objetoXhr.responseText+")");
                texto += "<p>Codigo=" + JSON.Codigo + "</p>";
                texto += "<p>Producto=" + JSON.Producto + "</p>";
                texto += "<p>Marca=" + JSON.Marca + "</p>";
                div.innerHTML = texto;
            }
        }
}
    
function llamarDatos() {
    var elSelect = document.getElementById('productosSelect');
    var codigo = elSelect.options[elSelect.selectedIndex].value;
    var query = "codigo="+codigo+"&nocache="+Math.random();
    cargarAjax("productos.php","POST",ajaxProduct,query,objetoXhr);
}

window.onload = function() {
    document.getElementById('boton').onclick = llamarDatos;
} 




</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>