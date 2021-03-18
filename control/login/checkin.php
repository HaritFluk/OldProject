<?php
session_start();
    include '../connect/condb.php';
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $protectuser = $condb->real_escape_string($username);
    $protectpass = $condb->real_escape_string($password);
    $realpassword = md5($protectpass);

    $sql = "SELECT * FROM member WHERE M_user = '".$protectuser."' AND M_pass = '".$realpassword."' ";
    $query = $condb->query($sql);
    $result = mysqli_fetch_array($query,MYSQLI_ASSOC);

    // echo $result["M_Status"]

    if($result) {
        if($result["M_Status"]==1) {
            $_SESSION["status"] = 'Administator (ผู้ดูแลระบบ)';
            $_SESSION["id"] = $result["M_id"];
            $_SESSION["cart_item"] = '';
            header("location: ../../page/admin/dashbroad/Main.php");

        }
        else if($result["M_Status"]==2){
            $_SESSION["status"] = "Member";
            $_SESSION["id"] = $result["M_id"];
            $_SESSION["Fname"] = $result["M_Fname"];
            $_SESSION["Lname"] = $result["M_Lname"];
            $_SESSION["cart_member"] = '';
            header("location: ../../page/member/profile/Main.php");
        }
        else {
            echo "<script>";
            echo "alert('กรุณาตรวจสอบ Username และ Password');";
            echo "window.location='./index.php';";
            echo "</script>";
        }
    }
    else {
        echo "<script>";
        echo "alert('กรุณาตรวจสอบ Username และ Password');";
        echo "window.location='./index.php';";
        echo "</script>";
    }  
     ?>