<?php
include '../connect/condb.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$user = $_POST["user"];
$pass = $_POST["pass"];
$add = $_POST["add"];
$tel = $_POST["tel"];
$mdpass = md5($pass);

// echo $fname;
// echo $lname;
// echo $user;
// echo $pass;
// echo $add;
// echo $tel;
// echo $mdpass;

$sql = "INSERT INTO `member`(`M_id`, `M_Fname`, `M_Lname`, `M_user`, `M_pass`, `M_add`, `M_tel`, `M_Status`)
                     VALUES (null, '".$fname."', '".$lname."', '".$user."', '".$mdpass."', '".$add."', '".$tel."', 2)";
$query = $condb->query($sql);
if($query)
{
    echo "";
    echo "<script>";
    echo "alert('เพิ่มผู้ใช้งานเรียบร้อยแล้ว');";
    echo "window.location='../../page/admin/member/Main.php';";
    echo "</script>";
}
else
{
    echo "";
    echo "<script>";
    echo "alert('ไม่สามารถเพิ่มผู้ใช้งานได้');";
    echo "window.location='../../page/admin/member/Main.php';";
    echo "</script>";
}

?>