<?php
include '../connect/condb.php';

$id = $_POST["id"];
$amount = $_POST["amount"];
$price = $_POST["price"];

// echo $id;
// echo $amount;
// echo $price;

if($price == 0)
{
    $sql = "UPDATE `stock_product` 
    SET `amount`= (`amount` + '".$amount."'), `date_update`= CURDATE() WHERE id = '".$id."' ";
}
else
{
    $sql = "UPDATE `stock_product` 
    SET `amount`= (`amount` + '".$amount."'), `price`='".$price."' , `date_update`= CURDATE() WHERE id = '".$id."' ";
}
// echo $sql;
$query = $condb->query($sql);
if($query)
{
    echo "<script>";
    echo "alert('นำเข้าสินค้าเสร็จสิ้น');";
    echo "window.location='../../page/member/stock/Main.php';";
    echo "</script>";
}
else
{
    echo "<script>";
    echo "alert('ไม่สามารถนำเข้าสินค้าได้ ');";
    echo "window.location='../../page/member/stock/Main.php';";
    echo "</script>";
}

?>