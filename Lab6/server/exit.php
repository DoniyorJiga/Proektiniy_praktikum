<?php
session_start();
if(empty($_GET['back']))
	session_destroy();
else
	unset($_SESSION['step_number']);
?>