<?php
if(!empty($_POST['id'])){
    $data = array();
	include '../connect/condb.php';
    $output = '';
	//get user data from the database
	$sql = "SELECT DISTINCT A.id, A.M_id, A.total_amount, B.amount, A.total_price, C.name FROM booking AS A
    INNER JOIN booking_detail AS B
    ON A.id = B.id
    INNER JOIN stock_product AS C
    ON B.P_id = C.id WHERE A.M_id = {$_POST['id']}";
    $query = $condb->query($sql);
    $output .= '<div class="table-responsive">
                <table class="table table-bordered" id="btable">';

        while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            $output .=  '<tr>
                            <th>รหัสการซื้อขาย</th>
                                <td> '. $result["id"] .'</td></tr>
                        <tr>
                            <th>สินค้า</th>
                                <td> '. $result["name"] .' </td></tr>
                        <tr>
                            <th>จำนวนรวม</th>
                                <td> '. $result["amount"] . ' แก้ว </td></tr>
                        </tr><tr><th>-------------------<td>-------------------</td></th></tr>';
        }
    $output .= '</table></div>';
    echo $output;
}
?>