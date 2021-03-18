<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->

<!-- <div class="form-group">
    <a href="#addModal" data-toggle="modal" class="btn btn btn-primary">เพิ่มสินค้าหน้าร้าน</a>
</div> -->
<div class="col col-12">
    <div class="card">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางยอดการแจ้งชำระเงินการจองของท่าน</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="billtable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>รหัสการจอง</th>
                                <th>ชื่อผู้จอง</th>
								<th>จำนวนรวม</th>
           						<th>ราคารวม</th>
                                <th>วันที่มีการจองสินค้า</th>
                                <th>วันที่มีการส่ง/รับสินค้า</th>
                                <th>ประเภทการจัดส่ง</th>
                                <th>สถานะการจัดส่งและรับเงิน</th>
                                <th>รายละเอียด</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($result = mysqli_fetch_array($query2,MYSQLI_ASSOC)) { ?>
        			<tr>
                        <td id="bid" class="boid"><?php echo $result["Bo_id"]; ?></td>
                        <td><?php echo $result["C_name"]; ?></td>
						<td><?php echo $result['Bo_total_amount']." แก้ว";?></td>
            			<td><?php echo $result['Bo_total_price']." บาท"; ?></td>
                        <td><?php echo $result['Bo_date']; ?></td>
                        <td><?php echo $result['Bo_getdate']; ?></td>
                        <td><?php echo $result['get_name']; ?></td>
                        <td><?php echo $result['bill_name']; ?></td>
                        <td align="center"><a href="#" data-target="#bodetailModal<?php echo $result['Bo_id']; ?>" class="btn btn btn-warning" data-toggle="modal" >รายละเอียด</a></td>
                    </tr>
    <div id="bodetailModal<?php echo $result['Bo_id']; ?>" name="bodetail" class="modal w-100 fade " >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">รายละเอียดประวัติการซื้อขาย</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body" id="detail_body">
                        <p>สินค้า  ----------  จำนวน</p>
                        <?php 	$detail = "SELECT DISTINCT * FROM booking_detail AS A
                                        INNER JOIN stock_product AS B
                                        ON A.P_id = B.id WHERE A.Bo_id = '".$result["Bo_id"]."'";
                                $qdetail = $condb->query($detail);
                                while ($rowdetail = mysqli_fetch_array($qdetail)){
                                ?>
                                <p><?php echo $rowdetail["name"] ?> ---------- <?php echo $rowdetail["Bo_amount"] ?> แก้ว</p></tr>
                                <?php } ?>
					</div>
				</form>
			</div>
		</div>
	</div>
                        <?php }?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
</div>