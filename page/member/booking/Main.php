<?php
session_start();
error_reporting(0);
if(!$_SESSION["status"]){
    if(!$_SESSION["id"]){
        echo "<script>";
        echo "alert('ท่านไม่มีสิทธิ์การเข้าใช้งาน');";
        echo "window.location='./index.php';";
        echo "</script>";
    }
}else{
    include '../../../control/connect/condb.php';

    $id =  $_SESSION["id"];
    $total_price = 0;
    $total_buy = 0;
    $total_tel = 0;
    $item_details = '';


    $boid = "SELECT COUNT(*) AS num_rows FROM booking";
    $q = $condb->query($boid);
    $result = mysqli_fetch_array($q, MYSQLI_ASSOC);
    // echo $result["num_rows"];
    if($result["num_rows"] == 0){
        $count = 1;
        // echo $count;
    }
    else {
        $count = $result["num_rows"] + 1;
    }

    $order_details = '
    <div class="table-responsive" id="order_table">
     <table class="table table-bordered table-striped">
     <thead>
     <tr>
        <th>รหัสการจอง</th>
        <th>รหัสสินค้า</th>
        <th>สินค้า</th>
        <th>จำนวน</th>
        <th>ราคาต่อหน่วย</th>
        <th>ราคารวม</th>
     </tr>
           </thead>
           <tbody>
    ';
    if(isset($_SESSION["cart_item"])) {
    foreach($_SESSION["cart_item"] as $item) {
        $item_price = $item["quantity"] * $item["price"];
        $total_buy += $item["price"];
      $order_details .= '
      <tr>
      <td>'. $count .'</td>
      <td>'. $item['id'] .'</td>
      <td>'. $item['name'] .'</td>
      <td>'.$item['quantity'].'</td>
      <td>'. $item['price'] .'</td>
      <td>'. number_format($item_price, 2) .'</td>
      </tr>
      ';
      $total_tel += $item["quantity"];
      $total_price += ($item["price"] * $item["quantity"]);

        }

     $item_details .= $item["name"] . ', ';
     $item_details = substr($item_details, 0, -2);
     $order_details .= '
     <tr>
     <td><b>Total</b></td>
     <td>'.$total_tel.'</td>
     <td>'. number_format($total_price, 2) .'</td>
    </tr>
     ';
    }
    $order_details .= '</table>';

    $sql = "SELECT * FROM `get_tb`";
    $query = $condb->query($sql);
    $sql2 = "SELECT * FROM customer";
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
    <body class="sb-nav-fixed">
    <?php include './Sidebar.php'; ?>
    <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
      <!-- Table Member -->
      <?php     $boid = "SELECT * FROM booking";
    $qb = $condb->query($boid);
    while ($result = mysqli_fetch_array($qb, MYSQLI_ASSOC)){
    // echo $result["Bo_id"];
    if($result["Bo_id"] == ''){
        $count = 1;
        // echo $count;
    }else{
        $count = $result["Bo_id"]+1;
        // echo $count;
    }
}
 include './Page.php'; ?>
        <!-- END Page Content  -->
        </div>
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="../../../js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <!-- DataTable -->
        <script src="../../../DataTables/datatables.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../../js/main.js"></script>
        <script src="../../../js/popper.js"></script>
        <script src="../../../js/bootstrap.min.js"></script>
        <script>
$(document).ready(function(){

    $('#oldid').on('change',function(){
        var id = $('#oldid').val();
        $.ajax({
            type:'POST',
            url:'../../../control/booking/select.php',
            dataType: "json",
            data:{id:id},
            success:function(data){
                if(data.status == 'ok'){
                    $('#cname2').val(data.result.C_name);
                    $('#cadd2').val(data.result.C_add);
                    $('#ctel2').val(data.result.C_tel);
                }else{
                    alert("User not found...");
                }
            }
        });
    });

    $("#btn1").on("click",function(){
        var cn = $('#cname').val();
        var add = $("#cadd").val();
        var tel = $("#ctel").val();
        var date = $("#getdate1").val();
        var type = $("#gettype1").val();
        if(cn == ''){
            alert('กรุณากรอกข้อมูล');
        }
        else if(add == ''){
            alert('กรุณากรอกข้อมูล');
        }
        else if(tel == ''){
            alert('กรุณากรอกข้อมูล');
        }
        else if(date == ''){
            alert('กรุณากรอกข้อมูล');
        }
        else if(type == ''){
            alert('กรุณากรอกข้อมูล');
        }
        else{
        $("p.name").text(cn);
        $("p.address").text(add);
        $("p.tel").text(tel);
        $("p.date").text(date);
        $("p.type").text(type);
        $('#name').val(cn);
        $('#add').val(add);
        $('#phone').val(tel);
        $('#getdate').val(date);
        $('#gettype').val(type);
        $('#payModal').modal("show");

        }
    });

    $("#btn2").on("click",function(){
        var id = $('#oldid').val();
        var cn = $('#cname2').val();
        var add = $("#cadd2").val();
        var tel = $("#ctel2").val();
        var date = $("#getdate2").val();
        var type = $("#gettype2").val();

        if(id == ''){
            alert('กรุณาเลือกรหัสลูกค้า');
        }
        else if(date == ''){
            alert('กรุณากรอกข้อมูล');
        }
        else if (type == ''){
            alert('กรุณากรอกข้อมูล');
        }
        else {
        $("p.name").text(cn);
        $("p.address").text(add);
        $("p.tel").text(tel);
        $("p.date").text(date);
        $("p.type").text(type);
        $('#id').val(id);
        $('#name').val(cn);
        $('#add').val(add);
        $('#phone').val(tel);
        $('#getdate').val(date);
        $('#gettype').val(type);
        $('#payModal').modal("show");
        }
    });

});

function checkname()
{
var name = document.getElementById('cname').value; // Get Value By id = fname in Table
var numn = name.length;  // Length's fname To Check Length in Requirement in non-functional requirement
document.getElementById('n').innerHTML = ""; //Clear Text Warning Error
// Check First Name Thai
if(!name.match(/^([ก-๏\s])+$/i))
{
document.getElementById('cname').value = ""; // Clear Input Text
document.getElementById('n').style.color = "red"; // Warning Style
document.getElementById("n").innerHTML = "กรอกได้เฉพาะตัวอักษรภาษาไทยเท่านั้น"; // Warning Text
}
else if(numn < 2){ // Check Length min
document.getElementById('n').style.color = "red" // Warning Style
document.getElementById('n').innerHTML = "กรุณากรอกข้อมูลมากกว่า 2 ตัวอักษร" // Warning Text
document.getElementById('cname').innerHTML = "" // Clear Input Text

}
else if(numn > 25) // Check Length max
{
document.getElementById('n').style.color = "red" // Warning Style
document.getElementById('n').innerHTML = "กรุณากรอกข้อมูลน้อยกว่า 25 ตัวอักษร" // Warning Text
document.getElementById('cname').innerHTML = "" // Clear Input Text
}
}

function checktel()
{
var tel = document.getElementById('ctel').value; // Get Value By id = lname in Table
var numtel = tel.length;  // Length's lname To Check Length in Requirement in non-functional requirement
document.getElementById('errortel').innerHTML = ""; //Clear Text Warning Error
// Check Last Name Thai
if(!tel.match(/^0[689]{1}[0-9]{8}$/i))
{
document.getElementById('ctel').value = ""; // Clear Input Text
document.getElementById('errortel').style.color = "red"; // Warning Style
document.getElementById("errortel").innerHTML = "กรอกได้เฉพาะตัวเลขเท่านั้น"; // Warning Text
}
else if(numtel > 10)
{
document.getElementById('errortel').style.color = "red" // Warning Style
document.getElementById('errortel').innerHTML = "กรุณากรอกข้อมูลน้อยกว่า 10 ตัวอักษร" // Warning Text
document.getElementById('ctel').innerHTML = "" // Clear Input Text
}
}

function showA()
{
    document.getElementById('newcus').hidden = true;
    document.getElementById('oldcus').hidden = false;
}
function showB()
{
    document.getElementById('newcus').hidden = false;
    document.getElementById('oldcus').hidden = true;
}

function showdata()
{
    var id = document.getElementById('id').value;

    
}        </script>
    </body>
    
    </html>
    <?php
} 
?>