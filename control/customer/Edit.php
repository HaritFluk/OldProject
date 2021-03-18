<?php
include '../connect/condb.php';

$id = $_POST["id"];
$name = $_POST["name"];
$add = $_POST["add"];
$tel = $_POST["tel"];

// echo $id;
// echo $fname;
// echo $lname;
// echo $add;
// echo $tel;

$sql = "UPDATE `customer` SET `C_name`= '".$name."', `C_add`='".$add."', `C_tel`='".$tel."' WHERE C_id = '".$id."' ";
// echo $sql;
$query = $condb->query($sql);
if($query)
{
    echo "<script>";
    echo "alert('แก้ไขข้อมูลลูกค้าเสร็จสิ้น');";
    echo "window.location='../../page/admin/customer/Main.php';";
    echo "</script>";
}
else
{
    echo "<script>";
    echo "alert('ไม่สามารถแก้ไขข้อมูลลูกค้าได้');";
    echo "window.location='../../page/admin/customer/Main.php';";
    echo "</script>";
}
?>