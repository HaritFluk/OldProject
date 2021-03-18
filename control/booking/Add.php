<?php
session_start();
error_reporting(0);
include '../connect/condb.php';
$total_price = 0;
$total_buy = 0;
$total_amount = 0;

$boid = "SELECT COUNT(*) AS num_rows FROM booking";
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

 if($_POST["id"] == ''){ // New Customer
  //  echo "ไม่มี";
  $cname = $_POST["name"];
  $cadd = $_POST["add"];
  $ctel = $_POST["phone"];
  $cdate = $_POST["getdate"];
  $ctype = $_POST["gettype"];
  $seller = $_SESSION["id"];

  // echo $cname."<br>";
  // echo $cadd."<br>";
  // echo $ctel."<br>";
  // echo $cdate."<br>";
  // echo $ctype."<br>";

  $newcus = "INSERT INTO `customer`(`id`, `C_name`, `C_add`, `C_tel`)
  VALUES (null, '".$cname."', '".$cadd."', '".$ctel."')";
  // echo $newcus;
  $querynew = $condb->query($newcus);

  $sqlcus = "SELECT * FROM customer WHERE C_name = '".$cname."'";
  echo $sqlcus;
  $querycus = $condb->query($sqlcus);
  $result = mysqli_fetch_array($querycus, MYSQLI_ASSOC);
  $cid = $result["id"];
  // echo $cid;
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

$check = "SELECT * FROM stock_product WHERE id = '".$id."'";
$qcheck = $condb->query($check);
$result  = mysqli_fetch_array($qcheck,MYSQLI_ASSOC);
$unit = $result["amount"];

// echo " id :".$id."<br>";
// echo " name :".$pname."<br>";
// echo " quantity :".$quantity."<br>";
// echo "price :".$price."<br>";
// echo " total :".$total_price."<br>";
// echo "total amount : ".$total_amount."<br>";

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
        $sql2 = "INSERT INTO `booking_detail`(`Bo_id`, `P_id`, `Bo_amount`, `Bo_price`)
        VALUES ('".$count."', '".$id."', '".$quantity."', '".$item_price."')";
        // echo $sql2;
        // echo "<br>";
     $query2 = $condb->query($sql2);;
     if($query2){
        //  unset($_SESSION["cart_item"]);
        //  echo "<script>";
        //  echo "alert('ไม่สามารถทำรายการได้');";
        //  echo "window.location='../../page/member/Cart/Main.php';";
        //  echo "</script>";
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
$sql = "INSERT INTO `booking`(`Bo_id`, `$seller`, `C_id`, `Bo_total_amount`, `Bo_total_price`, `Bo_date`, `Bo_getdate`, `get_type`, `bill_type`)
                      VALUES ('$count','$id','$cid', '$total_amount', '$total_price', CURDATE(), '$cdate', '$ctype', 1)";
//  echo $sql;
$query = $condb->query($sql);
if($query){
unset($_SESSION["cart_item"]);
echo "<script>";
echo "alert('ทำรายการจองสินค้าและลงทะเบียนลูกค้าเสร็จสิ้น');";
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
 }


 else{ // Old Customer
  //  echo $_POST["id"];
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

$cid = $_POST["id"];
$cname = $_POST["name"];
$cadd = $_POST["add"];
$ctel = $_POST["phone"];
$cdate = $_POST["getdate"];
$ctype = $_POST["gettype"];
$seller = $_SESSION["id"];

$check = "SELECT * FROM stock_product WHERE id = '".$id."'";
$qcheck = $condb->query($check);
$result  = mysqli_fetch_array($qcheck,MYSQLI_ASSOC);
$unit = $result["amount"];

// echo " id :".$id."<br>";
// echo " name :".$pname."<br>";
// echo " quantity :".$quantity."<br>";
// echo "price :".$price."<br>";
// echo " total :".$total_price."<br>";
// echo "total amount : ".$total_amount."<br>";
// echo $cname."<br>";
// echo $cadd."<br>";
// echo $ctel."<br>";
// echo $cdate."<br>";
// echo $ctype."<br>";

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
      $sql2 = "INSERT INTO `booking_detail`(`Bo_id`, `P_id`, `Bo_amount`, `Bo_price`)
                                    VALUES ('".$count."', '".$id."', '".$quantity."', '".$item_price."')";
      echo $sql2;
      echo "<br>";
      $query2 = $condb->query($sql2);
      if($query2){
      //  unset($_SESSION["cart_item"]);
      //  echo "<script>";
      //  echo "alert('ไม่สามารถทำรายการได้');";
      //  echo "window.location='../../page/member/Cart/Main.php';";
      //  echo "</script>";
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
$sql = "INSERT INTO `booking`(`Bo_id`, `M_id`, `C_id`, `Bo_total_amount`, `Bo_total_price`, `Bo_date`, `Bo_getdate`, `get_type`, `bill_type`)
                      VALUES ('$count','$seller','$cid', '$total_amount', '$total_price', CURDATE(), '$cdate', '$ctype', 1)";
//  echo $sql;
$query = $condb->query($sql);
if($query){
unset($_SESSION["cart_item"]);
echo "<script>";
echo "alert('ทำรายการจองสินค้าเสร็จสิ้น');";
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
 }
?>