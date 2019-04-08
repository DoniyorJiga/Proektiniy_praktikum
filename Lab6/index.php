<?php
session_start();
session_destroy();
?>
<html>
<head>
<link rel=stylesheet href="css/css.css">
</head>
<body>
<div class=menu>
<div class=top>
<span class=aim>Рамка цели</span>
<a href="autenfication.php" class="green">Вход</a>
</div>
<center><img src="images/aim.png" width=100></center>
<p>Рамка цели- это базовая техника поставновки целей, разработанная специалистами НЛП,
которая позволяет добиться следующего:
<p>1.Включить подсознание в процесс достижения цели.
<p>2.Понять действительно ли ТЫ хочешь достигнуть эту цкль или это достижение навязано тебе
окружающими людьми
<p>3.Глубоко сонастроиться со своей целью и результатами ее достижения.
<p>4.Запустить процесс достижения цели.
</p>
<a href="#" class="creat" onClick='newa()'>Создать цель</a>
</div>
</body>
</html>
<script>
 xhttp=new XMLHttpRequest(); 
function newa()
{ 
	xhttp.open("GET","server/newa.php"); 
	xhttp.send();
}
xhttp.onreadystatechange=function(){ 
if (xhttp.readyState==4 && xhttp.status==200)
{
	var delayInMilliseconds = 100;
setTimeout(function() {
	document.location.replace('newaim.php');
}, delayInMilliseconds);
}
}

</script>