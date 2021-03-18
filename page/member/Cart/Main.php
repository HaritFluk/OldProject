<?php
session_start();
error_reporting(0);
if(!$_SESSION["status"]){
    if(!$_SESSION["id"]){
        echo "<script>";
        echo "alert('ท่านไม่มีสิทธิ์การเข้าใช้งาน');";
        echo "window.location='../../../index.php';";
        echo "</script>";
    }
}else{
include '../../../control/connect/condb.php';
include '../../../control/connect/conbuybooking.php';
$db_handle = new DBController();
$check = "SELECT * FROM stock_product WHERE P_id = '".$_GET["id"]."' ";
$qcheck = $condb->query($check);
$result = mysqli_fetch_array($qcheck,MYSQLI_ASSOC);
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if($_POST["quantity"] > $result["P_amount"]){
                echo "<script>";
                echo "window.alert('สินค้าในคลังไม่เพียงพอ');";
                echo "</script>";
                unset($_SESSION["cart_item"]);
            break;
            }
            else{
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM stock_product WHERE P_id = '".$_GET["id"]."' ");
                $itemArray = array($productByCode[0]["P_id"]=>array('name'=>$productByCode[0]["P_name"], 'id'=>$productByCode[0]["P_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["P_price"],));

            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode[0]["P_id"], array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                        if($productByCode[0]["P_id"] == $k) {
                            if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                $_SESSION["cart_item"][$k]["quantity"] = 0;
                            }
                            $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                        }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
    }
        break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["id"] == $k)
                    unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                    unset($_SESSION["cart_item"]);
                }
            }
            else {
                unset($_SESSION["cart_item"]);
            }
        break;
        case "empty":
            unset($_SESSION["cart_item"]);
        break;
    }
}
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
    .no-records {
    text-align: center;
    clear: both;
    margin: 40px 0;
    color: red;
    }
img
{
   float: left;
   margin: 5px;
   width: 75px;
   height: 75px;
}
</style>
<body class="sb-nav-fixed">
<?php include './Sidebar.php'; ?>
<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
    <div class="row">
  <!-- Table  -->
  <?php include './Table.php'; ?>
  <!-- Cart  -->
  <?php include './Cart.php'; ?>
    <!-- END Page Content  -->
    </div>
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
</body>

</html>
<?php }?>