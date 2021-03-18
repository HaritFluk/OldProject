<?php

include '../connect/condb.php';

$id = $_GET["delid"];
$sqldel = "DELETE FROM member WHERE id = '$id'";
$querydel = $condb->query($sqldel);
if($querydel){
    echo "<script>";
    echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
    echo "window.location='../../page/admin/member/Main.php';";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert('ไม่สามารถลบข้อมูลได้)";
    echo "window.location='../../page/admin/member/Main.php';";
    echo "</script>";
}
?>