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
if(empty($_SESSION['ent']))
{
echo "
<p><span class=text>Регистрация</span></p>
<div class=data>
<div class='mail'>
<img src='images/mail.png' width=15><input type=text  name=mail placeholder=логин onChange=check()>
</div>
<div class=pass>
<img src='images/pass.png' width=10><input type=text  name=pass placeholder=пароль onChange=compare()>
</div>
<div class=pass>
<img src='images/pass.png' width=10><input type=text  name=pass placeholder='повтор пароля пароль' onChange=compare()>
</div>
</div>
<input type=button onClick=enter() value=Регистрация class='lul'name=en disabled>";
}
else
{
	echo "<p><span class=text>Поздравляем</span></p>
		  <p><span class=textt>Вы успешно зарегистрированы</span></p>
		  <input type=button onClick=\"document.location.replace('account.php');\" value=Далее class='lul'name=en>
		  ";
	echo"<script>
	function func(){
	document.location.replace('account.php');
}
	setTimeout(func,3000)</script>";
}
?>
</div>
</body>
</form>
</html>
<script>
var mailcheck;
function check()
{
	var but=document.getElementsByName("en");
	var str=document.getElementsByName("mail");
	var reg= /.+@.+\..+/i;
	if(reg.test(str[0].value))
	{
		mailcheck=true;
	}
	else
	{
		mailcheck=false;
	}
}
function compare()
{
	var pass=document.getElementsByName("pass");
	var but=document.getElementsByName("en");
	if(pass[0].value==pass[1].value)
		 but[0].disabled=false;
	 else
		 but[0].disabled=true;
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
function enter()
{ 
if(mailcheck)
{
var login = document.getElementsByName("mail");
 var password = document.getElementsByName("pass");
	xhttp.open("GET","server/regist.php?log="+login[0].value+"&pas="+password[0].value); 
	xhttp.send();
}
else
	alert("Некорректный mail");
}
</script>