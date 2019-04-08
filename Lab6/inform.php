<?php
session_start();
?>
<html>
<head>
<link rel=stylesheet href="css/css.css">
</head>
<body>
<form method=POST>
<div class=menu1>
<div class=top>
<span class=aim>Рамка цели</span>
<a href=account.php><img src='images/exit.png' width=20px></a>
</div>
<?php
$lul=explode('@',$_SESSION['login']);
echo "
<p><span class=text>Личные данные</span></p>
<div class=inf>
<span class=inf1>имя</span><input type=text  name=nam value='".$_SESSION['name']."' onChange=sav() >
</div>
<div class=inf>
<span class=inf1>пол</span><select name=nam onClick=sav() >";
if($_SESSION['gender']=="м")
	echo "
	<option selected>м<option>ж</select>";
else
	echo "
	<option>м<option selected>ж</select>";
echo "
</div>
<input type=button value='Выход' class='lul' onClick=exi()>";
?>
</div>
</body>
</html>
<script>
 xhttp=new XMLHttpRequest(); 
xhttp.onreadystatechange=function(){ 
if (xhttp.readyState==4 && xhttp.status==200)
{
	var delayInMilliseconds = 100;
	setTimeout(function() {
}, delayInMilliseconds);
}	//document.location.replace("account.php");
}
function sav()
{ 
var inf =document.getElementsByName('nam');
	xhttp.open("GET","server/chang.php?name="+inf[0].value+"&gend="+inf[1].value); 
	xhttp.send();
}
 xhttp1=new XMLHttpRequest(); 
xhttp1.onreadystatechange=function(){ 
if (xhttp1.readyState==4 && xhttp1.status==200)
		document.location.replace('index.php')//document.location.replace("account.php");
}
function exi()
{ 
	xhttp1.open("GET","server/exit.php"); 
	xhttp1.send();
}
</script>