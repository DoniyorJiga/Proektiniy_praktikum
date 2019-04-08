<?php
include("db.php");
function add_aim($id_user,$name,$context,$representation)
{
	include("db.php");
	$result=$mysqli->query("INSERT INTO aims VALUES('',$id_user,'".$name."','".$context."','".$representation."',0)");
}
function add_step($id_aim,$name)
{
		include("db.php");
	$result=$mysqli->query("INSERT INTO steps VALUES('',$id_aim,'".$name."')");
}
function GetLastAimId()
{
	include("db.php");
	$result=$mysqli->query("SELECT id FROM aims WHERE id=(SELECT MAX(id) FROM aims)");
	$roww=$result->fetch_assoc();
	return $roww['id'];
}
function GetLastUserId()
{
	include("db.php");
	$result=$mysqli->query("SELECT id FROM users WHERE id=(SELECT MAX(id) FROM users)");
	$roww=$result->fetch_assoc();
	return $roww['id'];
}
function IsAim($id)
{
	include("db.php");
	$result=$mysqli->query("SELECT * FROM aims WHERE id_user=".$id);
	$roww=$result->fetch_assoc();
	if($roww==null)
    	return null;
    else 
    return true;
//	;
}
function AimCount($id)
{
	include("db.php");
	$result=$mysqli->query("SELECT COUNT(*) AS kolvo FROM aims WHERE id_user=".$id);
	$roww=$result->fetch_assoc();
	return $roww['kolvo'];
}
function ChangeAim($id,$name,$context,$representation)
{	include("db.php");
	$result=$mysqli->query("UPDATE aims SET name='".$name."', representation='".$representation."', context='".$context."' WHERE id=".$id);
}
?>