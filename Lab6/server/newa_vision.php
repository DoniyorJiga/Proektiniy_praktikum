<?php session_start();
if(!empty($_GET['id']))
		echo $_SESSION['steps'][$_GET['id']]['textt']."|".$_SESSION['steps'][$_GET['id']]['height'];
	else
		$_SESSION['aim']=true;
if(!empty($_GET['entered']))
{
    if(!!!$_SESSION['redd'])
    {
	include("function.php");
		add_aim($_SESSION['id'],$_SESSION['steps'][4]['last_aim'],$_SESSION['context'],$_SESSION['representation']);
			for($i=0;$i<3;$i++)
		    	add_step(GetLastAimId(),$_SESSION['stepy'][$i]);

		$_SESSION['is_aim']=true;
    }
    else
    {
        include("function.php");
        ChangeAim($_SESSION['id_aim'],$_SESSION['steps'][4]['last_aim'],$_SESSION['context'],$_SESSION['representation']);
        unset($_SESSION['redd']);
        unset($_SESSION['steps']);
        unset($_SESSION['back']);
        
    }
	$i=0;
	$aims=array();
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
	unset($_SESSION['step_number']);
			
}
?>