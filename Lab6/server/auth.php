<?php
session_start();
include("db.php");
$result=$mysqli->query("SELECT * FROM users WHERE email='".$_GET['log']."'");
$row=$result->fetch_assoc();
if($row['password']==$_GET['pas'])
{
	if($row['email']=="admin")
	{
		$_SESSION['login']=$_GET['log'];
		$_SESSION['password']=$_GET['pas'];
		echo "admin";
	}
	else
	{
	$_SESSION['id']=$row['id'];
	$_SESSION['login']=$_GET['log'];
	$_SESSION['password']=$_GET['pas'];
	$_SESSION['name']=$row['name'];
	$_SESSION['gender']=$row['gender'];
	include("function.php");
	if(!empty($_SESSION['aim']))
	{
		add_aim($row['id'],$_SESSION['steps'][4]['last_aim'],$_SESSION['context'],$_SESSION['representation']);
		for($i=0;$i<3;$i++)
			add_step(GetLastAimId(),$_SESSION['stepy'][$i]);
	}
	if(IsAim($_SESSION['id'])!=null)
	{
		$i=0;
		$aims=array();
		$_SESSION['is_aim']=true;
		$_SESSION['aims_count']=AimCount($_SESSION['id']);
		$result=$mysqli->query('SELECT * FROM aims WHERE id_user='.$_SESSION['id']);
		while($row=$result->fetch_assoc())
		{
			$aims[$i]['id']=$row['id'];
			$aims[$i]['id_user']=$row['id_user'];
			$aims[$i]['name']=$row['name'];
			$aims[$i]['context']=$row['context'];
			$aims[$i]['representation']=$row['representation'];
			$aims[$i]['completed']=$row['completed'];
			$i++;
		}
		$_SESSION['aims']=$aims;
			
	}
	echo "user";
	}
}
else
	echo "fail";
?>