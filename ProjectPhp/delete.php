<?php
    //Kết nối databse
include 'connect.php';
session_start();
if(isset($_SESSION['id'])){
 


    $id = $_GET['idProduct'];
    $sql = "DELETE FROM `product` WHERE `id`='".$id."'";
    // Chạy câu SQL

    if ($result = $con->query($sql)) {
        header("Location:my-product.php");
        echo "<h1>Xóa sản phẩm thành công Click vào <a href='my-product.php'>đây</a> để về trang danh sách</h1>";

    }else{
        echo "<h1>Có lỗi xảy ra Click vào <a href='index.php'>đây</a> để về trang danh sách</h1>";
    }

}
else{
    header("Location: index.php");
}


?>  