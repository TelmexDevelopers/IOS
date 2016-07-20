<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<head>
<script language="JavaScript">
var i=2;

function A()
{
var t=document.getElementById('CONT').innerHTML.toUpperCase();
t=t.substring(0,(t.length-8));
t+="<TR>";
t+="<TD>"+i+",1</TD>";
t+="<TD>"+i+",2</TD>";
t+="<TD>"+i+",3</TD>";
t+="</TR></TABLE>";
document.getElementById('CONT').innerHTML=t;
i++;
}

function B()
{
var t=document.getElementById('CONT').innerHTML.toUpperCase();
var j=t.lastIndexOf("<TBODY>");
if(j>-1){
t=t.substring(0,j);
t+="</TABLE>";
document.getElementById('CONT').innerHTML=t;
}
}

</script>
</head>
<body>
<input type="button" name="af" value="Añadir fila" onClick="A();">
<input type="button" name="af" value="Borrar fila" onClick="B();">
<div id="CONT">
<table id="t" border="1" width="100%">
<tr>
<td>1,1</td>
<td>1,2</td>
<td>1,3</td>
</tr>
</table>
</div>
</body>
</html>
