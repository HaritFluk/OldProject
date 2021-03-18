<?php
include '../connect/condb.php';

$id = $_POST["mid"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$add = $_POST["add"];
$tel = $_POST["tel"];

// echo $id;
// echo $fname;
// echo $lname;
// echo $add;
// echo $tel;

$sql = "UPDATE `member` SET `M_Fname`= '".$fname."', `M_Lname`='".$lname."', `M_add`='".$add."', `M_tel`='".$tel."' WHERE id = '".$id."' ";
// echo $sql;
$query = $condb->query($sql);
if($query)
{
    echo "<script>";
    echo "alert('แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว');";
    echo "window.location='../../page/admin/member/Main.php';";
    echo "</script>";
}
else
{
    echo "<script>";
    echo "alert('ไม่สามารถแก้ไขข้อมูลผู้ใช้งานได้');";
    echo "window.location='../../page/admin/member/Main.php';";
    echo "</script>";
}
?>