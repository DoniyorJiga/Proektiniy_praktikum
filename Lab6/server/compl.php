<?php
session_start();
include('db.php');
$result=$mysqli->query("UPDATE aims SET completed=".$_GET['compl']." WHERE id=".$_GET['id']);
$_SESSION['aims'][$_GET['idd']]['completed']=$_GET['compl'];
?>