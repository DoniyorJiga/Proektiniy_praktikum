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
<span class=aim>Рамка цели</span>
<?php
//session_destroy();
if(empty($_SESSION['rec']))
{
echo "
<p><span class=text>Для восстановления пароля введите электронный почтовый ящик</span></p>
<div class=data>
<div class='mail'>
<img src='images/mail.png' width=15><input type=text  name=mail placeholder=логин >
</div>
</div>
<a href='registration.php' class='regist'>Новый пользователь? Регистрация</a>
<input type=button onClick=rec() value='Восстановить пароль'class='lul'name=en>";
}
else
{
echo "
<p><span class=text>Ваш пароль отправлен на указанный почтовый ящик</span></p>
<div class=data>
<div class='mail'>
<img src='images/mail.png' width=15><input type=text  name=mail value=".$_SESSION['login']." readonly>
</div>
</div>
<input type=button onClick=\"document.location.replace('index.php')\" value='Далее' class='lul'name=en>"
;
session_destroy();
	echo"<script>
	function func(){
	document.location.replace('index.php');
}
	setTimeout(func,3000)</script>";
}
?>
</div>
</body>
</form>
</html>
<script>
function rec()
{
	var login=document.getElementsByName("mail");
	xhttp.open("GET","server/rec.php?log="+login[0].value); 
	xhttp.send();
}
xhttp=new XMLHttpRequest(); 
xhttp.onreadystatechange=function(){ 
if (xhttp.readyState==4 && xhttp.status==200)
{
	if(xhttp.responseText==true)
		document.location.reload();
	else
		alert(xhttp.responseText);
	
}
}
</script>