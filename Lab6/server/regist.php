<?php
session_start();
include("db.php");
$result1=$mysqli->query("SELECT * FROM users WHERE email='".$_GET['log']."'");
$row=$result1->fetch_assoc();
if($row['email']==$_GET['log'])
	echo "false";
else
{
$result=$mysqli->query("INSERT INTO users VALUES('','$_GET[log]','$_GET[pas]','','')");
	$_SESSION['login']=$_GET['log'];
	$_SESSION['password']=$_GET['pas'];
	$_SESSION['name']=$row['name'];
	$_SESSION['gender']=$row['gender'];
$_SESSION['ent']=true;
	if(!empty($_SESSION['aim']))
	{
		include("function.php");
		add_aim(GetLastUserId(),$_SESSION['steps'][4]['last_aim'],$_SESSION['context'],$_SESSION['representation']);
		for($i=0;$i<3;$i++)
			add_step(GetLastAimId(),$_SESSION['stepy'][$i]);
				$i=0;
		$aims=array();
		$_SESSION['is_aim']=true;
		$_SESSION['aims_count']=1;
		$result=$mysqli->query('SELECT * FROM aims WHERE id_user='.GetLastUserId());
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
echo $_SESSION['ent'];
}
?>