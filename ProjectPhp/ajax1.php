<?php 

session_start();

include "connect.php";
$id = $_POST['id'];

if(!isset($_SESSION['giohang'])){
	$_SESSION['giohang']=[];
}

//
if(isset($_SESSION['giohang'][$id]) && $_SESSION['giohang'][$id]["id"] == $id){
	$row=$_SESSION['giohang'][$id];
	$row["qty"]=$row["qty"]+1;
	$_SESSION['giohang'][$id]=$row;

} else {
	$sql = "SELECT * FROM `product` WHERE`id`='".$id."'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
     	while ($row = $result->fetch_assoc()) {
	     $row['qty'] = 1;
	     $_SESSION['giohang'][$id] = $row;
      	}
     }
}



var_dump($_SESSION['giohang']);
