<?php
session_start();
include '../connect/condb.php';

if($_POST){
  if(isset($_FILES['upload'])){
      $name_file =  $_FILES['upload']['name'];
      $tmp_name =  $_FILES['upload']['tmp_name'];
      $locate_img ="../../pic/";
      move_uploaded_file($tmp_name,$locate_img.$name_file);
  }
}
$name = $_POST["cpname"];
$quantity = $_POST["amount"];
$price = $_POST["price"];
$img = $_FILES["upload"]['name'];

// echo $locate_img;
// echo $img;

$check = "SELECT * FROM stock_product";
$qcheck = $condb->query($check);
while( $result = mysqli_fetch_array($qcheck,MYSQLI_ASSOC)){
    if($img == $result["image"]){
            echo "<script>";
            echo "alert('ข้อมูลนี้มีอยู่ในระบบแล้ว');";
            echo "window.location='../../page/admin/stock/Main.php';";
            echo "</script>";
            exit;
    }
    else if($name == $result["name"]){
            echo "<script>";
            echo "alert('ข้อมูลนี้มีอยู่ในระบบแล้ว');";
            echo "window.location='../../page/admin/stock/Main.php';";
            echo "</script>";
            exit;
    }
}
$sql = "INSERT INTO `stock_product`(`id`, `name`, `amount`, `price`, `date_update`, `image`) VALUES (null, '".$name."', '".$quantity."', '".$price."', CURDATE(), '".$img."')";
// echo $sql;
// echo $_SESSION["status"];
$query = $condb->query($sql);
if($query){
    echo "<script>";
    echo "alert('เพิ่มสินค้าเสร็จสิ้น');";
    echo "window.location='../../page/admin/stock/Main.php';";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert('ไม่สามารถเพิ่มสินค้าได้');";
    echo "window.location='../../page/admin/stock/Main.php';";
    echo "</script>";
}

?>