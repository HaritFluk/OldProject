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
$sql = "SELECT * FROM stock_product";
$query = $condb->query($sql);
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
img
{
   float: left;
   margin: 5px;
   width: 60px;
   height: 60px;
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
    <script src="../../../js/bootstrap.min.js"></script>\
    <script>
        $('#Ptable').dataTable({
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

    function checkpname()
    {
        var pname = document.getElementById('pname').value; // Get Value By id = fname in Table
        var nump = pname.length;  // Length's fname To Check Length in Requirement in non-functional requirement
        document.getElementById('pn').innerHTML = ""; //Clear Text Warning Error
        // Check First Name Thai
        if(!pname.match(/^([ก-๏\s])+$/i))
        {
            document.getElementById('pname').value = ""; // Clear Input Text
            document.getElementById('pn').style.color = "red"; // Warning Style
            document.getElementById("pn").innerHTML = "กรอกได้เฉพาะตัวอักษรภาษาไทยเท่านั้น"; // Warning Text
        }
        else if(nump < 2) // Check Length min
        {
            document.getElementById('pn').style.color = "red" // Warning Style
            document.getElementById('pn').innerHTML = "กรุณากรอกข้อมูลมากกว่า 2 ตัวอักษร" // Warning Text
            document.getElementById('pname').innerHTML = "" // Clear Input Text

        }
        else if(nump > 25) // Check Length max
        {
            document.getElementById('pn').style.color = "red" // Warning Style
            document.getElementById('pn').innerHTML = "กรุณากรอกข้อมูลน้อยกว่า 25 ตัวอักษร" // Warning Text
            document.getElementById('pname').innerHTML = "" // Clear Input Text
        }
    }

    </script>
</body>

</html>
<?php }?>