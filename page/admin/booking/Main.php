<?php
session_start();
//error_reporting(0);
if(!$_SESSION["status"]){
    if(!$_SESSION["id"]){
        echo "<script>";
        echo "alert('ท่านไม่มีสิทธิ์การเข้าใช้งาน');";
        echo "window.location='./index.php';";
        echo "</script>";
    }        
}else{
include '../../../control/connect/condb.php';
$sql ="SELECT * FROM booking AS A
INNER JOIN member AS B ON A.M_id = B.M_id
INNER JOIN customer AS C ON A.C_id = C.C_id
INNER JOIN get_tb AS D ON A.get_type = D.get_id
INNER JOIN bill_tb AS E ON A.bill_type = E.bill_id
WHERE A.bill_type = 1";
$query = $condb->query($sql);

$sql2 ="SELECT * FROM booking AS A
INNER JOIN member AS B ON A.M_id = B.M_id
INNER JOIN customer AS C ON A.C_id = C.C_id
INNER JOIN get_tb AS D ON A.get_type = D.get_id
INNER JOIN bill_tb AS E ON A.bill_type = E.bill_id
WHERE A.bill_type = 2";
$query2 = $condb->query($sql2);
?>
<!doctype html>
<html lang="en">
<head>
    <title>หน้า Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../DataTables/datatables.css">
    <link rel="stylesheet" href="../../../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
</style>
<body class="sb-nav-fixed">
<?php include './Sidebar.php'; ?>
<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
  <!-- Table Member -->
  <?php include './Table.php'; ?>
    <!-- END Page Content  -->
    </div>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="../../../js/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="../../../DataTables/datatables.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../../js/main.js"></script> 
    <script src="../../../js/popper.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script>
    $("#botable").DataTable({
    "oLanguage": {
    "sEmptyTable": "ไม่มีข้อมูลในตาราง",
    "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
    "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
    "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
    "sInfoPostFix": "",
    "sInfoThousands": ",",
    "sLengthMenu": "แสดง _MENU_ แถว",
    "sLoadingRecords": "กำลังโหลดข้อมูล...",
    "sProcessing": "กำลังดำเนินการ...",
    "sSearch": "ค้นหา: ",
    "sZeroRecords": "ไม่พบข้อมูล",
    "oPaginate": {
        "sFirst": "หน้าแรก",
        "sPrevious": "ก่อนหน้า",
        "sNext": "ถัดไป",
        "sLast": "หน้าสุดท้าย"
    },
    "oAria": {
        "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
        "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
    }
}
});

$("#billtable").DataTable({
    "oLanguage": {
    "sEmptyTable": "ไม่มีข้อมูลในตาราง",
    "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
    "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
    "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
    "sInfoPostFix": "",
    "sInfoThousands": ",",
    "sLengthMenu": "แสดง _MENU_ แถว",
    "sLoadingRecords": "กำลังโหลดข้อมูล...",
    "sProcessing": "กำลังดำเนินการ...",
    "sSearch": "ค้นหา: ",
    "sZeroRecords": "ไม่พบข้อมูล",
    "oPaginate": {
        "sFirst": "หน้าแรก",
        "sPrevious": "ก่อนหน้า",
        "sNext": "ถัดไป",
        "sLast": "หน้าสุดท้าย"
    },
    "oAria": {
        "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
        "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
    }
}
});

    </script>
</body>

</html>
<?php }?>