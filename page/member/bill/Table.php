<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->

<!-- <div class="form-group">
    <a href="#addModal" data-toggle="modal" class="btn btn btn-primary">เพิ่มสินค้าหน้าร้าน</a>
</div> -->
<div class="col col-12">
    <div class="card">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางยอดการจองสินค้าของท่าน</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="Botable" width="100%" cellspacing="0">
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
                                <th>การจัดการ</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
        			<tr>
                        <td id="bid" class="boid"><?php echo $row["Bo_id"]; ?></td>
                        <td><?php echo $row["C_name"]; ?></td>
						            <td><?php echo $row['Bo_total_amount']." แก้ว";?></td>
            			      <td><?php echo $row['Bo_total_price']." บาท"; ?></td>
                        <td><?php echo $row['Bo_date']; ?></td>
                        <td><?php echo $row['Bo_getdate']; ?></td>
                        <td><?php echo $row['get_name']; ?></td>
                        <td><?php echo $row['bill_name']; ?></td>
                        <td align="center">
              <a href="#" data-target="#billModal<?php  echo $row["Bo_id"]; ?>" class="btn btn-sm btn-success" data-toggle="modal">แจ้งชำระเงิน</a>
              <a href="#" data-target="#boodetailModal<?php  echo $row["Bo_id"]; ?>" class="btn btn-sm btn-warning" data-toggle="modal">รายละอียด</a>
              <a href="#" data-target="#cancelModal<?php  echo $row["Bo_id"]; ?>" class="btn btn-sm btn-danger" data-toggle="modal">ยกเลิก</a>
                        </td>
                    </tr>
										    <!-- Modal -->
<div class="modal fade" id="billModal<?php  echo $row["Bo_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
<form  method="POST" action="../../../control/booking/bill.php">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ยืนยันการชำระเงินและส่งมอบเสร็จสิ้น</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	  <p>รหัส : <?php  echo $row["Bo_id"]; ?></p>
        <p>ชื่อลูกค้า : <?php echo $row["C_name"]; ?></p>
        <p>ที่อยู่ลูกค้า : <?php echo $row["C_add"]; ?></p>
        <p>เบอร์โทรลูกค้า : <?php echo $row["C_tel"]; ?></p>
					<div class="form-group">
						<label>วันที่ผู้จองมารับจริง</label>
						<input type="date" name="date" id="date" class="form-control" onchange="" min="0" maxlength="7" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')">
					</div>
        <input type="hidden" value="<?php  echo $row["Bo_id"]; ?>" id="id" name="id">
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="ยืนยันการชำระเงินส่งมอบ"></input>
      </div>
    </div>
  </div>
</div>
</form>

<form  method="POST" action="../../../control/booking/Add.php">
<div class="modal fade" id="cancelModal<?php  echo $row["Bo_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">รายการจองสินค้าที่ต้องการยกเลิก</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<p>รหัส : <?php  echo $row["Bo_id"]; ?></p>
        <p>ชื่อลูกค้า : <?php echo $row["C_name"]; ?></p>
        <p>ที่อยู่ลูกค้า : <?php echo $row["C_add"]; ?></p>
        <p>เบอร์โทรลูกค้า : <?php echo $row["C_tel"]; ?></p>
        <p>วันที่รับ-ส่ง : <?php echo $row['get_date']; ?></p>
        <p>ประเภทการส่ง : <?php echo $row['get_name']; ?></p>
        <input type="hidden" value="<?php  echo $row["id"]; ?>" id="id" name="id">
        <input type="hidden" value="" id="name" name="name">
        <input type="hidden" value="" id="add" name="add">
        <input type="hidden" value="" id="phone" name="phone">
        <input type="hidden" value="" id="getdate" name="getdate">
        <input type="hidden" value="" id="gettype" name="gettype">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">ยืนยันการยกเลิก</button>
      </div>
    </div>
  </div>
</div>
</form>
  <!--End Delete Modal -->
  <div id="boodetailModal<?php echo $row['Bo_id']; ?>" name="boodetail" class="modal w-100 fade " >
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
                                        ON A.P_id = B.id WHERE A.Bo_id = '".$row["Bo_id"]."'";
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