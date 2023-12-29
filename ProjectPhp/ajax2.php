
<?php
session_start();

if (isset($_POST["id"]) && isset($_POST["dau"]) ) {
    $id = $_POST["id"];
    $dau=$_POST["dau"];
    // $_SESSION['giohang'][$id]["qty"] = $_SESSION['giohang'][$id]["qty"] + 1;

    if($dau=="+"){
       $_SESSION['giohang'][$id]["qty"] = $_SESSION['giohang'][$id]["qty"] + 1;
      echo  $_SESSION['giohang'][$id]["qty"];
   }else if($dau=="-"){ 
   
    if($_SESSION['giohang'][$id]["qty"]==1){
      
     unset($_SESSION['giohang'][$id]);
     echo "-";
      if(empty($_SESSION['giohang'])){
           unset($_SESSION['giohang']);
           echo "--";
    }
       }else{
         $_SESSION['giohang'][$id]["qty"] = $_SESSION['giohang'][$id]["qty"] - 1;
         echo $_SESSION['giohang'][$id]["qty"];
    }

 
    
   }else{
    //xoa 1 sp trong cart
    unset($_SESSION['giohang'][$id]);
    if(empty($_SESSION['giohang'])){
        unset($_SESSION['giohang']);
    }
   }

}

// Hiển thị kết quả sau khi cập nhật

?>

