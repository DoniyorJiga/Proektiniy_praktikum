<?php 
$date = $_GET['date']; 
echo strftime("%A, %d/%m/%Y", strtotime($date)); 


$b = strftime("%A"); 

$json_data = array ('day'=>$b); 
echo json_encode($json_data); 
?>
