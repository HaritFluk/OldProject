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
$id = $_SESSION["id"];
$sql = "SELECT A.B_id, B.M_id, B.M_Fname, B.M_Lname, A.B_total_amount, A.B_total_price, A.B_date FROM buy AS A INNER JOIN member AS B ON A.M_id = B.M_id";
$query = $condb->query($sql);
$sqlstock = "SELECT * FROM stock_product";
$qchecks = $condb->query($sqlstock);
while ($rows = mysqli_fetch_array($qchecks,MYSQLI_ASSOC)){
    if($rows["P_amount"] == 0){
        $alert = "ตอนนี้ ".$rows["P_name"]." หมดแล้ว ";
        echo "<script>";
        echo "alert('$alert');";
        echo "</script>";
}else if($rows["P_amount"] < 10){
        $alert = "ตอนนี้ ".$rows["P_name"]." เหลือแค่ ".$rows["P_amount"]." แก้ว กรุณาเติมสินค้า";
        echo "<script>";
        echo "alert('$alert');";
        echo "</script>";
}
}
// totalBuy
$sqltotalcus = "SELECT COUNT(A.C_id) AS Totalcus FROM customer AS A";
$totalcus = $condb->query($sqltotalcus);
//totalbooking
$sqltotalbo = "SELECT COUNT(A.Bo_id) AS Totalbooking FROM booking AS A";
$totalbo = $condb->query($sqltotalbo);
//totalmember
$sqltotalm = "SELECT COUNT(A.M_id) AS Total FROM member AS A WHERE A.M_Status = 2";
$totalm = $condb->query($sqltotalm);
//totalstock
$sqltotalst = "SELECT SUM(A.P_amount) AS Totalstock FROM stock_product AS A";
$totalst = $condb->query($sqltotalst);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../DataTables/datatables.css">
  <link rel="stylesheet" href="../../../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>หน้าหลัก</title>
</head>
<body class="sb-nav-fixed">
<?php include './Sidebar.php'; ?>
<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
    <?php include './Card.php'; ?>
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
        $('#Btable').dataTable({
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
            "oPaginate":
            {
            "sFirst": "หน้าแรก",
            "sPrevious": "ก่อนหน้า",
            "sNext": "ถัดไป",
            "sLast": "หน้าสุดท้าย"
            },
            "oAria":
            {
            "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
            "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
            }
        }
    });
  </script>
</body>
</html>
<?php }?>