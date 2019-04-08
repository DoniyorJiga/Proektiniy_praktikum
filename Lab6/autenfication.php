<?php session_start() ?>
<html>
<head>
<link rel=stylesheet href="css/css.css">
</head>
<body>
<form method=POST>
<div class=menu1>
<span class=aim>Рамка цели</span>
<?php
if(empty($_SESSION['aim']))
	echo "<p><span class=text>Войдите для продолжения</span></p>";
else
	echo "<p><span class=text>Войдите для сохранения цели</span></p>";
?>
<div class=data>
<div class="mail">
<img src="images/mail.png" width=15><input type=text  name=mail placeholder=логин>
</div>
<div class=pass>
<img src="images/pass.png" width=10><input type=text  name=pass placeholder=пароль>
</div>
</div>
<a href="recovery.php" class='lost'>Забыли пароль?</a>
<a href="registration.php" class='regist'>Новый пользователь? Регистрация</a>
<input type=button onClick=enter() value=Войти class="lul">
</div>
</body>
</form>
</html>
<script>
xhttp=new XMLHttpRequest(); 
xhttp.onreadystatechange=function(){ 
if (xhttp.readyState==4 && xhttp.status==200)
{
	if(xhttp.responseText=="admin")
		document.location.replace("admin/admin.php");
	if(xhttp.responseText=="user")
		document.location.replace("account.php");
	if(xhttp.responseText=="fail")
		alert(xhttp.responseText);
}
} 
function enter()
{
 var login = document.getElementsByName("mail");
 var password = document.getElementsByName("pass");
xhttp.open("GET","server/auth.php?log="+login[0].value+"&pas="+password[0].value); 
xhttp.send();
}
</script>