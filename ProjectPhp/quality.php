<?php 
session_start();
$qty=0;
if(isset($_SESSION["giohang"])){
 $row=$_SESSION["giohang"];
 foreach($row as $value){
 	$qty+=$value["qty"];
 }
}else{
	$qty="";
}
echo $qty;





 ?>