<?php
session_start();
include('db.php');
if(!empty($_GET['id']))
{
$result=$mysqli->query("DELETE FROM aims WHERE id=".$_GET['id']);
unset($_SESSION['aims'][$_GET['idd']]);
$result1=$mysqli->query("DELETE FROM steps WHERE id_aim=".$_GET['id']);
include('function.php');
if(IsAim($_SESSION['id'])!=null)
	$_SESSION['aims_count']=AimCount($_SESSION['id']);
else
	$_SESSION['is_aim']=false;
}
else
{
	$lul=preg_split('/\|/',$_GET['id_step']);
	$k=count($lul);
	$l="";
	for($i=0;$i<$k;$i++)
	{
		if(is_numeric($lul[$i]))
		{
		$result=$mysqli->query("DELETE FROM steps WHERE id=".$lul[$i]);
		$l=$lul[$i];
		}
	}
	echo $l;
}
?>