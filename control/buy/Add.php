<?php
session_start();
error_reporting(0);
include '../connect/condb.php';
$total_price = 0;
$total_buy = 0;
$total_amount = 0;

$boid = "SELECT COUNT(*) AS num_rows FROM buy";
$q = $condb->query($boid);
$result = mysqli_fetch_array($q, MYSQLI_ASSOC);
// echo $result["num_rows"];
if($result["num_rows"] == 0){
    $count = 1;
    // echo $count;
}
else {
    $count = $result["num_rows"] + 1;
}

if(isset($_SESSION["cart_item"])) {
        foreach($_SESSION["cart_item"] as $item) {
                $item_price = $item["quantity"] * $item["price"];
                $total_buy += $item["price"];
                $id = $item["id"];
$pname = $item["name"];
$quantity = $item["quantity"];
$price = $item["price"];
$total_amount += $item["quantity"];
$total_price += ($item["price"] * $item["quantity"]);
$seller = $_SESSION["id"];
$check = "SELECT * FROM stock_product WHERE id = '".$id."'";
$qcheck = $condb->query($check);
$result  = mysqli_fetch_array($qcheck,MYSQLI_ASSOC);
$unit = $result["amount"];

// echo " id :".$id."<br>";
// echo " name :".$pname."<br>";
// echo " quantity :".$quantity."<br>";
// echo "price :".$price."<br>";
// echo "item price :".$item_price."<br>";
// echo "total_price :".$total_price."<br>";
// echo "total amount : ".$total_amount."<br>";
// echo "<br>";

if($quantity > $unit){
        $alert =  "ไม่สามารถทำรายการได้เนื่องจาก"." ".$result["name"]." ไม่พอจำหน่าย";
        unset($_SESSION["cart_item"]);
        echo "<script>";
        echo "alert('$alert');";
        echo "window.location='../../page/member/Cart/Main.php';";
        echo "</script>";
        exit();
}
else{
$sql2 = "INSERT INTO `buy_detail`(`B_id`, `P_id`, `B_amount`, `B_price`)
                          VALUES ('".$count."', '".$id."', '".$quantity."', '".$item_price."')";
// echo $sql2;
// echo "<br>";
$query2 = $condb->query($sql2);
$update = "UPDATE `stock_product` SET `amount`=(`amount` - '".$quantity."') WHERE `id` = '".$id."' ";
$updatestock = $condb->query($update);
if($query2){
    // unset($_SESSION["cart_item"]);
    // echo "<script>";
    // echo "alert('ไม่สามารถทำรายการได้');";
    // echo "window.location='../../page/member/Cart/Main.php';";
    // echo "</script>";
}
else{
    unset($_SESSION["cart_item"]);
    echo "<script>";
    echo "alert('ไม่สามารถทำรายการได้');";
    echo "window.location='../../page/member/Cart/Main.php';";
    echo "</script>";
}
    }
   }
 }
 $bill_number = '0'.$count.'2563';
 $sql = "INSERT INTO `buy`(`B_id`, `M_id`, `B_number`, `B_total_amount`, `B_total_price`, `B_date`, `Bo_id`)
                    VALUES ('".$count."', '".$seller."', '".$bill_number."' , '".$total_amount."', '".$total_price."', CURDATE() , null)";
//  echo $sql;
//  echo "<br>";
$query = $condb->query($sql);
if($query){
    unset($_SESSION["cart_item"]);
    echo "<script>";
    echo "alert('ทำรายการเสร็จสิ้น');";
    echo "window.location='../../page/member/Cart/Main.php';";
    echo "</script>";
    }
else{
    unset($_SESSION["cart_item"]);
    echo "<script>";
    echo "alert('ไม่สามารถทำรายการได้');";
    echo "window.location='../../page/member/Cart/Main.php';";
    echo "</script>";
}
?>