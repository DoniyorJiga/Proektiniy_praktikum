<?php
session_start();
include("db.php");
$result1=$mysqli->query("SELECT * FROM users WHERE email='".$_GET['log']."'");
$row=$result1->fetch_assoc();
if($row['email']!=$_GET['log'])
	echo "false";
else
{
$_SESSION['rec']=true;
$_SESSION['login']=$_GET['log'];
$subject="Восстановление пароля на сатйе Рамка цели";
$message="Ваш пароль: ".$row['password'];
/* Здесь будет рассылка пароля
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Рамка цели ' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($_SESSION['login'],$subject,$message);*/
echo $_SESSION['rec'];
}
?>