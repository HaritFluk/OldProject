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
$sql = "SELECT * FROM customer";
$query = $condb->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <title>หน้าการจัดการลูกค้า</title>
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
        $('#Ctable').dataTable({
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

function checkname()
{
var name = document.getElementById('cusname').value; // Get Value By id = fname in Table
var numn = name.length;  // Length's fname To Check Length in Requirement in non-functional requirement
document.getElementById('n').innerHTML = ""; //Clear Text Warning Error
// Check First Name Thai
if(!name.match(/^([ก-๏\s])+$/i))
{
document.getElementById('cusname').value = ""; // Clear Input Text
document.getElementById('n').style.color = "red"; // Warning Style
document.getElementById("n").innerHTML = "กรอกได้เฉพาะตัวอักษรภาษาไทยเท่านั้น"; // Warning Text
}
else if(numn < 2){ // Check Length min
document.getElementById('n').style.color = "red" // Warning Style
document.getElementById('n').innerHTML = "กรุณากรอกข้อมูลมากกว่า 2 ตัวอักษร" // Warning Text
document.getElementById('cusname').innerHTML = "" // Clear Input Text

}
else if(numn > 25) // Check Length max
{
document.getElementById('n').style.color = "red" // Warning Style
document.getElementById('n').innerHTML = "กรุณากรอกข้อมูลน้อยกว่า 25 ตัวอักษร" // Warning Text
document.getElementById('cusname').innerHTML = "" // Clear Input Text
}
}

function checktel()
{
var tel = document.getElementById('custel').value; // Get Value By id = lname in Table
var numtel = tel.length;  // Length's lname To Check Length in Requirement in non-functional requirement
document.getElementById('errortel').innerHTML = ""; //Clear Text Warning Error
// Check Last Name Thai
if(!tel.match(/^0[689]{1}[0-9]{8}$/i))
{
document.getElementById('custel').value = ""; // Clear Input Text
document.getElementById('errortel').style.color = "red"; // Warning Style
document.getElementById("errortel").innerHTML = "กรอกได้เฉพาะตัวเลขเท่านั้น"; // Warning Text
}
else if(numtel > 10)
{
document.getElementById('errortel').style.color = "red" // Warning Style
document.getElementById('errortel').innerHTML = "กรุณากรอกข้อมูลน้อยกว่า 10 ตัวอักษร" // Warning Text
document.getElementById('custel').innerHTML = "" // Clear Input Text
}
}
    </script>
</body>

</html>
<?php }?>