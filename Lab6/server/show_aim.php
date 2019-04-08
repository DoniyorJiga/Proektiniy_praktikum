<?php
session_start();
include("db.php");
$i=$_GET['i'];
$id=$_GET['id'];
$_SESSION['i_aim']=$i;
$_SESSION['id_aim']=$id;
if($_SESSION['aims'][$i]['completed']==0)
    $str="<div class=top>".$_SESSION['aims'][$i]['name']."<img src=images/yes.png width=20 onClick=end()><img src=images/redac.png width=17 onClick=red()><img src=images/korz.png width=20 onclick=del()>";
else
    $str="<div class=top>".$_SESSION['aims'][$i]['name']."      Цель достигнута!<img src=images/korz.png width=20 onclick=del()>";
$str.="</div><p>КОНТЕКСТ ДОСТИЖЕНИЯ ЦЕЛИ<br>".
$_SESSION['aims'][$i]['context']."<p>РЕПРЕЗЕНТАЦИЯ ЦЕЛИ<br>".$_SESSION['aims'][$i]['representation']."
<p>ШАГИ";
$result=$mysqli->query("SELECT * FROM steps WHERE id_aim=".$id);
$k=0;
while($row=$result->fetch_assoc())
{
    if($_SESSION['aims'][$i]['completed']==0)
        $str.="<div class=step ondblclick=change(".$k.",".$row['id'].") id=".$row['id']."><input type=checkbox class=ch>".$row['name']."</div>";
    else
        $str.="<div class=step ><input type=checkbox  checked onClick='window.event.returnValue=false'>".$row['name']."</div>";
	$k++;
}
if($_SESSION['aims'][$i]['completed']==0)
    $str.="<p><img src='images/plus.png' width=15 onClick=new_step()> Добавить шаг";
else
    $str.="<input type=button onClick=ret() value='Отмена достижения цели'>";
echo $str;
?>