<?php
session_start();
include '../connect/condb.php';

$id = $_POST["id"];
$date = $_POST["date"];
$sql = "UPDATE `booking` SET `bill_type`= 2, `Bo_getdate` = '".$date."' WHERE Bo_id = '".$id."' ";
$sqlcheck = "SELECT * FROM booking_detail WHERE Bo_id = '".$id."' ";
$querycheck = $condb->query($sqlcheck);
while ($resultcheck = mysqli_fetch_array($querycheck, MYSQLI_ASSOC)){
$sqlstck = "SELECT * FROM stock_product WHERE id = '".$resultcheck["P_id"]."' ";
$querystck = $condb->query($sqlstck);
$rowstck = mysqli_fetch_array($querystck, MYSQLI_ASSOC);
if($resultcheck["Bo_amount"] > $rowstck["amount"]){
    $msg = $rowstck["name"]." จำนวนสินค้าในระบบไม่เพียงพอ";
    echo "<script>";
    echo "alert('$msg');";
    echo "window.location='../../page/member/bill/Main.php';";
    echo "</script>";
    exit();
}
else {
    $update = "UPDATE `stock_product` SET `amount`= (`amount` - '".$resultcheck["Bo_amount"]."') WHERE id = '".$resultcheck["P_id"]."' ";
    $qupdate = $condb->query($update);
}
}
// TransForm Booking Data to Buy Data
// echo $sql;
$sqlDetailAdd = "SELECT * FROM Booking_detail WHERE Bo_id = '".$id."' ";
$queryDetailAdd = $condb->query($sqlDetailAdd);
$Countid = "SELECT COUNT(*) AS num_rows FROM buy";
$qCount = $condb->query($Countid);
$resultCount = mysqli_fetch_array($qCount, MYSQLI_ASSOC);
// echo $result["num_rows"];
if($resultCount["num_rows"] == 0){
$Buy_Count = 1;
 // echo $count;
}
else {
    $Buy_Count = $resultCount["num_rows"] + 1;
}
while($rowDetailAdd = mysqli_fetch_array($queryDetailAdd))
{
$sqlBuyDetail = "INSERT INTO `buy_detail`(`B_id`, `P_id`, `B_amount`, `B_price`)
VALUES ('".$Buy_Count."', '".$rowDetailAdd["P_id"]."', '".$rowDetailAdd["Bo_amount"]."', '".$rowDetailAdd["Bo_price"]."')";
// echo $sql2;
// echo "<br>";
$queryBuyDetail = $condb->query($sqlBuyDetail);
if($queryBuyDetail){
    // unset($_SESSION["cart_item"]);
    // echo "<script>";
    // echo "alert('สามารถทำรายการได้');";
    // echo "window.location='../../page/member/Cart/Main.php';";
    // echo "</script>";
}
else {
    echo "<script>";
    echo "alert('ไม่สามารถทำรายการได้ Wrong BuyDetail Script');";
    echo "window.location='../../page/member/bill/Main.php';";
    echo "</script>";
    exit;
}
}
$sqlBookingAdd = "SELECT * FROM Booking WHERE Bo_id = '".$id."' ";
$queryBooking = $condb->query($sqlBookingAdd);
$resultBooking = mysqli_fetch_array($queryBooking, MYSQLI_ASSOC);
$bill_number = '0'.$Buy_Count.'2563';
$sqlBuy = "INSERT INTO `buy`(`B_id`, `M_id`, `B_number`, `B_total_amount`, `B_total_price`, `B_date`, `Bo_id`)
VALUES ('".$Buy_Count."', '".$resultBooking["M_id"]."', '".$bill_number."' , '".$resultBooking["Bo_total_amount"]."', '".$resultBooking["Bo_total_price"]."', '".$resultBooking["Bo_date"]."' , '".$id."')";
$query = $condb->query($sql);
$queryBuy = $condb->query($sqlBuy);
if($query){
    if ($queryBuy){
    $mes = "พนักงานแจ้งชำระเงิน รหัส นี้เสร็จสิ้น";
    echo "<script>";
    echo "alert('$mes');";
    echo "window.location='../../page/member/bill/Main.php';";
    echo "</script>";
}
}
else {
    echo "<script>";
    echo "alert('ไม่สามารถทำรายการได้ Buy or Booking Script Wrong');";
    echo "window.location='../../page/member/bill/Main.php';";
    echo "</script>";
}
