<?php

include './control/connect/condb.php';

$boid = "SELECT COUNT(*) AS num_rows FROM buy";
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
$bill_number = '0'.$count . '/' . '2563';
echo $bill_number;
?>