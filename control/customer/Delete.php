<?php

include '../connect/condb.php';

$id = $_GET["delid"];
$sqldel = "DELETE FROM customer WHERE C_id = '$id'";
$querydel = $condb->query($sqldel);
if($querydel){
    echo "<script>";
    echo "alert('ลบข้อมูลออกจากทะเบียนเสร็จสิ้น');";
    echo "window.location='../../page/admin/customer/Main.php';";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert('ไม่สามารถลบข้อมูลได้)";
    echo "window.location='../../page/admin/customer/Main.php';";
    echo "</script>";
}
?>