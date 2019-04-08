<?php
include('/var/www/u0649382/data/www/xn--80aapmhid4a2d.xn--p1ai/server/db.php');
$result=$mysqli->query("SELECT * FROM users WHERE id!=1");
echo"<html>
<head>
<link rel=stylesheet href='/css/css.css'>
</head>
<body>
<form method=POST>
<div width=200>";
while($row=$result->fetch_assoc())
	echo "<div class='usss'><p>Имя: ".$row['name']."<p>Пол: ".$row['gender']."<p>Почта: ".$row['email']."<p>Пароль: ".$row['password']."</div>";
echo"<input type=button onClick=exi() value=Выход></div></form></body>
</html>";
?>
<script>
 xhttp=new XMLHttpRequest(); 
xhttp.onreadystatechange=function(){ 
if (xhttp.readyState==4 && xhttp.status==200)
		document.location.replace('/index.php');
}
function exi()
{ 
	xhttp.open("GET","/server/exit.php"); 
	xhttp.send();
}
</script>