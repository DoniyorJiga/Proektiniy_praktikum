<?php 
session_start();
if(!!$_SESSION['step_number'])
    unset($_SESSION['step_number']);
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel=stylesheet href="css/css.css">
</head>
<body>
<form method=POST>
<div class=mainn >
<div class=top>
<span class=aim> Рамка цели</span>
<img src='images/avatar.png' width=30 onClick="document.location.replace('inform.php')">
</div>
<?php
$lul=explode('@',$_SESSION['login']);
if(!empty($_SESSION['is_aim']))
{
	if($_SESSION['is_aim']==true)
	{
	echo "<div class=left><div class=aims><div class=top>Мои цели <img src='images/info.png' width=20 onClick=inf()></div>";
	for($i=0;$i<$_SESSION['aims_count'];$i++)
		echo "<div class=aimy onClick=show(".$i.",".$_SESSION['aims'][$i]['id'].")>".$_SESSION['aims'][$i]['name']."</div>";
	echo "<p><img src='images/plus.png' width=15 onclick=newa() > Добавить цель</div><div class=about>Выберите цель</div></div>";
	}
	else echo "
<div class=menu1>
<div class=top>
<span class=aim>Рамка цели</span>
</div>
<center><img src='images/aim.png' width=100></center>
<p>Рамка цели- это базовая техника поставновки целей, разработанная специалистами НЛП,
которая позволяет добиться следующего:
<p>1.Включить подсознание в процесс достижения цели.
<p>2.Понять действительно ли ТЫ хочешь достигнуть эту цкль или это достижение навязано тебе
окружающими людьми
<p>3.Глубоко сонастроиться со своей целью и результатами ее достижения.
<p>4.Запустить процесс достижения цели.
</p>
<a href='#' on class='creat' onClick=newa()>Создать цель</a>
</div>
</div>";
}
else
echo "
<div class=menu1>
<div class=top>
<span class=aim>Рамка цели</span>
</div>
<center><img src='images/aim.png' width=100></center>
<p>Рамка цели- это базовая техника поставновки целей, разработанная специалистами НЛП,
которая позволяет добиться следующего:
<p>1.Включить подсознание в процесс достижения цели.
<p>2.Понять действительно ли ТЫ хочешь достигнуть эту цкль или это достижение навязано тебе
окружающими людьми
<p>3.Глубоко сонастроиться со своей целью и результатами ее достижения.
<p>4.Запустить процесс достижения цели.
</p>
<a href='#' class='creat' onClick=newa()>Создать цель</a>
</div>
</div>";
?>
</body>
</html>
<script>
var b;
var counter=0;
var counter1=0;
var ii=0;
var iid=0;
var kk=0;
var idd=0;
var counter2=0;
var counter3=0;
var chan=false;
var	che=false;
$(document).mouseup(function (e) {
    var container = $(".t");
	if($("textarea").is(".t"))
	{
		if (!container.is(e.target)){
		chan=true;
		var child=document.getElementsByClassName('t');
		var text=child[0].value;
		xhttp2.open("GET","server/addstep.php?step="+text+"&id="+idd);
		xhttp2.send();
	}
	}
});
 xhttp=new XMLHttpRequest(); 
xhttp.onreadystatechange=function(){ 
if (xhttp.readyState==4 && xhttp.status==200)
		document.location.replace("menu.php");
}
 xhttp1=new XMLHttpRequest(); 
xhttp1.onreadystatechange=function(){ 
if (xhttp1.readyState==4 && xhttp1.status==200)
{
	var div=document.getElementsByClassName('about');
	div[0].innerHTML=xhttp1.responseText;
}
}
 xhttp2=new XMLHttpRequest(); 
xhttp2.onreadystatechange=function(){ 
if (xhttp2.readyState==4 && xhttp2.status==200)
{
	if(chan==false)
	{
	var child=document.getElementsByClassName('stepy');
	var parent=document.getElementsByClassName('about');
	parent[0].removeChild(child[0]);
	show(ii,iid);
	}
	else
	{
		var child=document.getElementsByClassName('t');
		var text=child[0].value;
		var parent=child[0].parentNode;
		parent.removeChild[0];
		parent.innerHTML="<input type=checkbox class=ch>"+text;
		chan=false;
	}
	counter1++;
}
}
 xhttp3=new XMLHttpRequest(); 
xhttp3.onreadystatechange=function(){ 
if (xhttp3.readyState==4 && xhttp3.status==200)
{
	if(che==false)
	document.location.reload();
	else
	{
		show(ii,iid);
	}
	
}
}
 xhttp4=new XMLHttpRequest(); 
function newa()
{ 
	xhttp4.open("GET","server/newa.php?entered=true"); 
	xhttp4.send();
}
xhttp4.onreadystatechange=function(){ 
if (xhttp4.readyState==4 && xhttp4.status==200)
{
    alert(xhttp4.responseText);
	var delayInMilliseconds = 100;
setTimeout(function() {
	document.location.replace('newaim.php');
}, delayInMilliseconds);
}
}
 xhttp5=new XMLHttpRequest(); 
xhttp5.onreadystatechange=function(){ 
if (xhttp5.readyState==4 && xhttp5.status==200)
{
    show(ii,iid);
}		
}
function exi()
{ 
	xhttp.open("GET","server/exit.php"); 
	xhttp.send();
}
function show(i,id)
{
	ii=i;
	iid=id;
	xhttp1.open("GET","server/show_aim.php?id="+id+"&i="+i);
	xhttp1.send();
}
function inf()
{
	var text="<p>Рамка цели- это базовая техника поставновки целей, разработанная специалистами НЛП,которая позволяет добиться следующего: <p>1.Включить подсознание в процесс достижения цели. <p>2.Понять действительно ли ТЫ хочешь достигнуть эту цкль или это достижение навязано тебе окружающими людьми <p>3.Глубоко сонастроиться со своей целью и результатами ее достижения. <p>4.Запустить процесс достижения цели.</p>";
	if(counter % 2==0)
	{
	var t=document.getElementsByClassName('aims');
	//var aim=document.
	var aims=document.getElementsByClassName('aimy');
	var div= document.createElement('div');
	t[0].insertBefore(div,aims[0]);
	div.classList+='aimy';
	div.innerHTML+=text
	}
	else
	{
		var child=document.getElementsByClassName('aimy');
		var parent=document.getElementsByClassName('aims');
		parent[0].removeChild(child[0]);
		//var div=document.getElementsByClassName('menu');
		//div[0].style.height='650px'
	}
	counter++;
}
function new_step(event)
{
	if(counter1%2==0)
	{
		var t=document.createElement('textarea');
		t.onkeypress=function(e) {
		if(e.keyCode==13)
		{
			var text=document.getElementsByClassName('stepy');
			xhttp2.open("GET","server/addstep.php?step="+text[0].value);
			xhttp2.send();
		}};
		t.classList+='stepy';
		var parent=document.getElementsByClassName("about");
		parent[0].appendChild(t);
	}
	else
	{
		var child=document.getElementsByClassName('stepy');
		var parent=document.getElementsByClassName('about');
		parent[0].removeChild(child[0]);
	}	
	counter1++;
}
function change(k,id)
{
	kk=k;
	idd=id;
	chan=true;
	var textar=document.getElementsByClassName("t");
	if(!!textar[0])
	{

		var child=document.getElementsByClassName('t');
		var text=child[0].value;
		var parent=child[0].parentNode;
		parent.removeChild[0];
		parent.innerHTML=text;
		//parent[kk].removeChild(child[0]);*/
	}
	var step=document.getElementsByClassName('step');
	var str="<textarea class=t id="+k+">"+step[k].textContent+"</textarea>";
	step[k].innerHTML=str;
	var t=document.getElementsByClassName('t');
	t[0].onkeypress=function(e,id) {
	if(e.keyCode==13)
	{
		var text=document.getElementsByClassName('t');
		xhttp2.open("GET","server/addstep.php?step="+text[0].value+"&id="+idd);
		xhttp2.send();
	}};
}
	
function del()
{
	che=false;
	var ch=document.getElementsByClassName('ch');
	for(i=0;i<ch.length;i++)
	{
		if(ch[i].checked)
		{
			che=true;
			break;
		}
	}
	if(che==false)
	{
	if(counter2%2==0)
		$("<div class=del>вы действительно хотите удалить вашу цель?<input type=button value=нет onClick=dell(false)><input type=button value=да onClick=dell(true)></div>").insertAfter($('.about .top'));
	else
		$('.about .del').remove();
	}
	else
	{
		if(counter2%2==0)
			$("<div class=del>вы действительно хотите удалить выбранный(ые) шаг(и)?<input type=button value=нет onClick=dell(false)><input type=button value=да onClick=dell(true)></div>").insertAfter($('.about .top'));
		else
			$('.about .del').remove();
	}
	counter2++;
}
function red()
{
	xhttp4.open("GET","server/newa.php?entered=true&redd=true"); 
	xhttp4.send();
}
function dell(t)
{
	var str="";
	var ch=document.getElementsByClassName('ch');
	for(i=0;i<ch.length;i++)
	{
		if(ch[i].checked)
		{
			var parent=ch[i].parentNode;
			str+=parent.id+"|";
			//parent.remove();
		}
			//$('.about').
	}
	if(che==true)
	{
		if(str.charAt(str.length - 1) == '|'&&str.length>2)
			str.slice(0,-1);
	}
	if(t==false)
		$('.about .del').remove();
	else
	{
		if(che==false)
		{
			alert(ii);
			xhttp3.open("GET","server/del.php?id="+iid+"&idd="+ii);
		}
		else
			xhttp3.open("GET","server/del.php?id_step="+str+"&idd="+ii);
		xhttp3.send();
	}
}
function end()
{
  	if(counter3%2==0)
		$("<div class=compl>вы действительно хотите завершить вашу цель?<input type=button value=нет onClick=endd(false)><input type=button value=да onClick=endd(true)></div>").insertAfter($('.about .top'));
	else
		$('.about .compl').remove();  
	counter3++;
}
function endd(t)
{
    if(t==false)
        $('.about .compl').remove();
    else
    {
        xhttp5.open("GET","server/compl.php?id="+iid+"&compl=1&idd="+ii);
        xhttp5.send();
    }
     counter3++;
}
function ret()
{
        xhttp5.open("GET","server/compl.php?id="+iid+"&compl=0&idd="+ii);
        xhttp5.send();
}
</script>
                <div class='row border' style='width: 375px; height: 72px; background-color:white; padding-top:24px;'>
                    <div class='col-1 ml-auto'>
                        <img src='images/redac.png'>
                    </div>
                    <div class='col-2'>
                        <img src='images/korz.png' style='padding-right: 10px;'>
                    </div>