<?php
session_start();
include '../connect/condb.php';

$id = $_POST["id"];
$sql = "UPDATE `booking` SET `bill_id`=[value-8] WHERE id = '".$id."' ";
$query = $condb->query($sql);
if($query){

}
else {

}

?>