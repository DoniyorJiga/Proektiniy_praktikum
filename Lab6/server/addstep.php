<?php
session_start();
include("db.php");
if(empty($_GET['id']))
	$reslut=$mysqli->query("INSERT INTO steps VALUES('',".$_SESSION['id_aim'].",'".$_GET['step']."')");
else
	$reslut=$mysqli->query("UPDATE steps SET name='".$_GET['step']."' WHERE id=".$_GET['id']);
echo $_GET['id'];
?>