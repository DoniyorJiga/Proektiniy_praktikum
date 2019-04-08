<?php
session_start();
include("db.php");
$result1=$mysqli->query("UPDATE users SET name='".$_GET['name']."',gender='".$_GET['gend']."' WHERE email='".$_SESSION['login']."'");
$_SESSION['name']=$_GET['name'];
$_SESSION['gender']=$_GET['gend'];
?>