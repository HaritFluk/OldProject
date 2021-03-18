<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div>
<a href="#" data-target="#createModal" class="btn btn btn-success" data-toggle="modal">เพิ่มสินค้าใหม่</a>
</div>
<br>
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางจัดการข้อมูล สินค้าหน้าร้าน</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="Ptable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
								<th>#</th>
								<th>ชื่อ</th>
           						<th>ยอดคงเหลือ</th>
            					<th>ราคาต่อหน่วย</th>
								<th>การจัดการ</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
						<td align="center"><img src="../../../pic/<?php echo $result["image"]; ?>"></td>
						<td><?php echo $result['P_name'];?></td>
            			<td><?php echo $result['P_amount']." แก้ว"; ?></td>
						<td><?php echo $result['P_price']." บาท"; ?></td>
						<td align="center">
						<a href="#" data-target="#updateModal<?php echo $result['P_id'];?>" class="btn btn btn-success" data-toggle="modal">เพิ่มยอดสินค้าคงคลัง</a>
						<a href="#" data-target="#editModal<?php echo $result['P_id'];?>" class="btn btn btn-warning" data-toggle="modal">แก้ไขข้อมูลสินค้า</a>
            			<a href="#" data-target="#deleteModal<?php echo $result['P_id']; ?>" class="btn btn btn-danger" data-toggle="modal" >ลบข้อมูลสินค้า</a></td>
					</tr>
		<!-- Edit Modal HTML -->
		<div id="updateModal<?php echo $result['P_id'];?>" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../../../control/stock/Update.php">
					<div class="modal-header">
						<h4 class="modal-title">นำเข้าสินค้า</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
						<label></label>
						<input  type="hidden" value="<?php echo $result['P_id'];?>" name="id" id="id" class="form-control" readonly required>
					</div>
					<div class="form-group">
						<label></label>
						<input type="text" value="<?php echo $result['P_name'];?>" name="pname" id="pname" class="form-control" onchange="checkpname();" maxlength="25" minlength="2" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" readonly><p id="pn"></p>
					</div>
					<div class="form-group">
						<label>จำนวนที่นำเข้า</label>
						<input type="number" value="" name="amount" id="amount" class="form-control" onchange="" min="0" maxlength="7" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')">
					</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
						<input type="submit" class="btn btn-success" value="แก้ไข">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--End Edit Modal -->
	<!-- Edit Modal HTML -->
	<div id="editModal<?php echo $result['P_id'];?>" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../../../control/stock/Edit.php">
					<div class="modal-header">
						<h4 class="modal-title">แก้ไขข้อมูลสินค้า</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
						<label></label>
						<input  type="hidden" value="<?php echo $result['P_id'];?>" name="id" id="id" class="form-control" readonly required>
					</div>
					<div class="form-group">
						<label></label>
						<input type="text" value="<?php echo $result['P_name'];?>" name="pname" id="pname" class="form-control" maxlength="25" minlength="2" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')" readonly>
					</div>
					<div class="form-group">
						<label>จำนวนที่นำเข้า</label>
						<input type="number" value="<?php echo $result['P_amount'];?>" name="amount" id="amount" class="form-control" onchange="" min="0" maxlength="7" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')">
					</div>
					<div class="form-group">
						<label>ราคาต่อหน่วย</label>
						<input type="number" value="<?php echo $result['P_price'];?>" name="price" id="price" class="form-control" onchange="" min="0" maxlength="7" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')">
					</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
						<input type="submit" class="btn btn-success" value="แก้ไข">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--End Edit Modal -->
	<!-- Delete Modal HTML -->
	<div id="deleteModal<?php echo $result['P_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">ยืนยันการลบสินค้าหน้าร้าน</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัส : <?php echo $result['P_id']; ?></p>
                        <p>ชื่อ  : <?php echo $result['P_name'];?></p>
                        <p>จำนวน : <?php echo $result['P_amount']; ?></p>
						<p>ราคา : <?php echo $result['P_price']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-danger" href="../../../control/stock/Delete.php?delid=<?php echo $result['P_id']; ?>" role="button" value="Delete">ยืนยัน</a>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- Add Modal HTML -->
	<div id="createModal" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../../../control/stock/create.php" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">เพิ่มข้อมูลสินค้า</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
						<label>ชื่อสินค้า</label>
						<input type="text" name="cpname" id="cpname" class="form-control" onchange="checkpname()" maxlength="25" minlength="2" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')"><p id="pna"></p>
					</div>
					<div class="form-group">
						<label>จำนวนที่นำเข้า</label>
						<input type="number" name="amount" id="amount" class="form-control" onchange="" min="0" maxlength="7" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')">
					</div>
					<div class="form-group">
						<label>ราคาต่อหน่วย</label>
						<input type="number" name="price" id="price" class="form-control" onchange="" min="0" maxlength="7" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล')">
					</div>
					<input type="file" name="upload" id="upload">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
						<input type="submit" class="btn btn-success" value="เพิ่มสินค้า">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--End Add Modal -->
			</tbody>
			</table>
			</div>
		</div>
		</div>
