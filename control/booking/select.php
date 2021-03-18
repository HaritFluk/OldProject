<?php
if(!empty($_POST['id'])){
    $data = array();
	
	include '../connect/condb.php';
    
	//get user data from the database
	$sql = "SELECT * FROM `customer` WHERE C_id = {$_POST['id']}";
    $query = $condb->query($sql);
    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}
?>