<?php session_start(); ?>
<html>
<head>
<link rel=stylesheet href="css/css.css">
</head>
<body>
<div class=menu>
<div class=top>
<?php
if($_SESSION['step_number']!=9)
{
echo"
<span class=aim>Новая цель</span>";
if(!empty($_SESSION['entered']))
	echo "<a href=account.php><img  src='images/exit.png' onClick=exi(true) width=20px></a>
</div>";
else
echo "
<a href=index.php><img onClick='exi(false)' src='images/exit.png' width=20px></a>
</div>";
$i=$_SESSION['step_number']-1;
echo"
<span class=text>".$_SESSION['steps'][$i]['step'].". Шаг из 8</span></p><div id='more'>";
if($i!=0)
{
	echo "<div class=infoo>".$_SESSION['steps'][$i]['name']."<img onClick='inf(".$i.")' src='images/info.png' width=20 ></div>";
	
}
else
{
	echo "<p>".$_SESSION['steps'][$i]['name'];
}
echo "
</div><span>".$_SESSION['steps'][$i]['result']."</span>";
if($i!=0)
{
	if($i>=4)
	{
	    if(!!!$_SESSION['back'])
	    {
		if($i==4)
			echo "<p>ЦЕЛЬ:<br>".$_SESSION['steps'][$i]['last_aim']."<p><span>КОНТЕКСТ </span><textarea onKeypress=adjustHeight(this) onChange=bl(".$i.",this) id='ai'></textarea>";
		if($i==5)
			echo "<p>ЦЕЛЬ:<br>".$_SESSION['context']."<p><span>РЕПРЕЗЕНТАЦИЯ </span><textarea onKeypress=adjustHeight(this) onChange=bl(".$i.",this) id='ai'></textarea>";
		if($i==6)
			echo "<p>ЦЕЛЬ:<br>".$_SESSION['context']."<p>РЕПРЕЗЕНТАЦИЯ ЦЕЛИ<br>".$_SESSION['representation']."<p><input type=checkbox id=che> Я принял(а) отвественность за все изменения связанные с достижением этой цели, которые просиходят со мной и моим окружением сейчас, и произойдут в будущем.";	
		if($i==7)
			echo "<p>ШАГ 1<textarea class=steps onChange=st()></textarea><p>ШАГ 2<textarea class=steps onChange=st()></textarea><p>ШАГ 3<textarea class=steps onChange=st()></textarea>";
	    }
	    else
	    {
	       echo "мдааа";
	     if($i==4)
			echo "<p>ЦЕЛЬ:<br>".$_SESSION['steps'][$i]['last_aim']."<p><span>КОНТЕКСТ </span><textarea onKeypress=adjustHeight(this) onChange=bl(".$i.",this) id='ai'>".$_SESSION['aims'][$_SESSION['i_aim']]['context']."</textarea>";
		if($i==5)
			echo "<p>ЦЕЛЬ:<br>".$_SESSION['context']."<p><span>РЕПРЕЗЕНТАЦИЯ </span><textarea onKeypress=adjustHeight(this) onChange=bl(".$i.",this) id='ai'>".$_SESSION['aims'][$_SESSION['i_aim']]['representation']."</textarea>";
		if($i==6)
			echo "<p>ЦЕЛЬ:<br>".$_SESSION['context']."<p>РЕПРЕЗЕНТАЦИЯ ЦЕЛИ<br>".$_SESSION['representation']."<p><input type=checkbox id=che> Я принял(а) отвественность за все изменения связанные с достижением этой цели, которые просиходят со мной и моим окружением сейчас, и произойдут в будущем.";	
	    }
	}
	else
	{   
	    if(!!!$_SESSION['back'])
	    	echo "<p>Прошлый вариант:<br>".$_SESSION['steps'][$i]['last_aim']."<p><span>НОВАЯ ЦЕЛЬ </span><textarea onKeypress=adjustHeight(this) onChange=bl(".$i.",this) id='ai'></textarea>";
	    else
	    {
	        echo "мдааа";
	        echo "<p>Прошлый вариант:<br>".$_SESSION['steps'][$i]['last_aim']."<p><span>НОВАЯ ЦЕЛЬ </span><textarea onKeypress=adjustHeight(this) onChange=bl(".$i.",this) id='ai'>".$_SESSION['steps'][$i+1]['last_aim']."</textarea>";
	    }
	}
}
else
{
    if(!!!$_SESSION['back'])
	    echo "<p><span>ЦЕЛЬ </span><textarea onKeypress=adjustHeight(this) onChange=bl(".$i.",this) id='ai'></textarea>";
	else
	{
	     echo "<p><span>ЦЕЛЬ </span><textarea onKeypress=adjustHeight(this) onChange=bl(".$i.",this) id='ai' class>".$_SESSION['steps'][$i+1]['last_aim']."</textarea>";
	}
}
if($i!=0)
	echo "<input type=button class=back value=Назад onClick='number_change(true)'><input type=button class=next value=Далее onClick='number_change(false)' disabled>";
else
{
	echo "<input type=button class='cre' onClick='number_change(false)' value=Далее disabled>";
}
	
}
else
{
	echo "<span class=aim>Поздравляем!</span></div>
<div><p>Вы создали цели и настроили на ее достижение свое подсознание.
<p>Теперь, сделайте первые шаги.
<p>По завершению первых наметьте новые шаги которые приблизят вас к целии завершите их.
<p>Делайте все новые и новые шаги и наблюдайте как ваша цель становится с каждым днем ближе.
</div>";
if(empty($_SESSION['entered']))
	echo "<a href ='autenfication.php' class='creat' onClick='res()'>Готово</a>";
else
	echo "<a href='account.php' class='creat' onClick='res()'>Готово</a>";
}
?>
</div>
</body>
</html>
<script>
window.onload=function(){ 
  //alert("lola");
 // var b;
    var area=document.getElementsByTagName('textarea');
    var incl=false;
    if(!!area)
    {
        for(var i=0;i<area.length;i++)
            if(area[i].value=="")
            {
                 incl=true;
                 break;
            }
        if(incl==false)
        {
            var ta=document.getElementsByClassName('cre');
            var tac=document.getElementsByClassName('next');
            if(!!!ta[0])
            {
                tac[0].disabled=false;
            }
            else
            {
                ta[0].disabled=false;
            }
        }
    }
    
};
 xhttp=new XMLHttpRequest();
 var counter=0;
 var menu=false;
 function res()
 {
	xhttp2.open("GET","server/newa_vision.php?entered=true"); 
	xhttp2.send();
 }
function number_change(ans)
{
	var ch=document.getElementById('che');
	var steps=document.getElementsByClassName("steps");
	if (!!ch)
	{
		if(ans==false && ch.checked==false)
			alert("Примите отвественность");
		else 
		{
			xhttp.open("GET","server/newa.php?back="+ans);
			xhttp.send();
		}
			
	}
	else
	{
    // code
	var aim=document.getElementById('ai');
	if(!!aim)
		xhttp.open("GET","server/newa.php?aim="+aim.value+"&back="+ans); 
	else if(!!steps)
	{
		if(ans==false)
			xhttp.open("GET","server/newa.php?step1="+steps[0].value+"&step2="+steps[1].value+"&step3="+steps[2].value+"&back="+ans);
		else
			xhttp.open("GET","server/newa.php?back="+ans);
	}
	else
		xhttp.open("GET","server/newa.php?back="+ans);
	xhttp.send();
	}
		
}
function adjustHeight(textarea){
    var dif = textarea.scrollHeight - textarea.clientHeight
    if (dif){
        if (isNaN(parseInt(textarea.style.height))){
            textarea.style.height = textarea.scrollHeight + "px"
        }else{
            textarea.style.height = parseInt(textarea.style.height) + dif + "px"
        }
    }
}
function bl(n,textarea)
{
    if(n==0)
    {
     var but=document.getElementsByClassName('cre');
        if(textarea.value=="")
            but[0].disabled=true;
        else
            but[0].disabled=false;
    }
    else
    {
         var but=document.getElementsByClassName('next');
        if(textarea.value=="")
            but[0].disabled=true;
        else
            but[0].disabled=false;   
    }
    
}
xhttp.onreadystatechange=function(){ 
if (xhttp.readyState==4 && xhttp.status==200)
{
	document.location.reload();
}
}
 xhttp1=new XMLHttpRequest(); 
xhttp1.onreadystatechange=function(){ 
if (xhttp1.readyState==4 && xhttp1.status==200)
	if(menu==true)
		document.location.replace("index.php");
}
 xhttp2=new XMLHttpRequest(); 
xhttp2.onreadystatechange=function(){ 
if (xhttp2.readyState==4 && xhttp2.status==200)
{
    setTimeout("", 1000);
       //  alert(xhttp2.responseText);
    var	t=document.getElementById('more');
	var div= document.createElement('div');
	var l=xhttp2.responseText.split('|');
    div.innerHTML=l[0];
     div.classList+='b';
	 t.appendChild(div);
    var main=document.getElementsByClassName('menu');
    main[0].style.height=l[1];
}
}
function exi(num)
{
if(num==true) 
	xhttp1.open("GET","server/exit.php?back=true"); 
else
{
	xhttp1.open("GET","server/exit.php"); 
	menu=true;
}
xhttp1.send();
}
function inf(id)
{
	if(counter % 2==0)
	{
	xhttp2.open("GET","server/newa_vision.php?id="+id);
	xhttp2.send();
	}
	else
	{
		var child=document.getElementsByClassName('b');
		var parent=document.getElementById('more');
		parent.removeChild(child[0]);
		var div=document.getElementsByClassName('menu');
		div[0].style.height='650px'
	}
	counter++;
}
function st()
{
    var ab=true;
    var ste=document.getElementsByClassName('steps');
    for(var i=0;i<ste.length;i++)
    {
        if(ste[i].value=="")
        {
            ab=false;
            break;
        }
    }
    if(ab==true)
    {
         var but=document.getElementsByClassName('next');
         but[0].disabled=false;
    }
}
</script>