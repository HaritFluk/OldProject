<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->

<div class="form-group">
    <a href="#addEmployeeModal" data-toggle="modal" class="btn btn btn-success">เพิ่มสมาชิกลูกค้า</a>
</div>
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางจัดการข้อมูล ลูกค้า</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="Ctable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
								<th>รหัสลูกค้า</th>
								<th>ชื่อ</th>
           						<th>ที่อยู่</th>
            					<th>เบอร์โทร</th>
								<th>การจัดการ</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
						<td><?php echo $result['C_id']; ?></td>
						<td><?php echo $result['C_name'];?></td>
            			<td><?php echo $result['C_add']; ?></td>
						<td><?php echo $result['C_tel']; ?></td>
						<td align="center"><a href="#" data-target="#editEmployeeModal<?php echo $result['C_id'];?>" class="btn btn btn-warning" data-toggle="modal">แก้ไขข้อมูล</a>
            			<a href="#" data-target="#deleteEmployeeModal<?php echo $result['C_id']; ?>" class="btn btn btn-danger" data-toggle="modal" >ลบข้อมูล</a></td>

					</tr>
					<!-- Edit Modal HTML -->
	<div id="editEmployeeModal<?php echo $result['C_id'];?>" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../../../control/customer/Edit.php">
					<div class="modal-header">
						<h4 class="modal-title">แก้ไขทะเบียนลูกค้า</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
						<label></label>
						<input  type="hidden" value="<?php echo $result['C_id'];?>" name="id" id="id" class="form-control" readonly required>
					</div>
						<div class="form-group">
							<label>ชื่อ</label>
							<input type="text" value="<?php echo $result['C_name'];?>" name="name" id="cusname" class="form-control" onchange="checkname();" required><p id="n"></p>
						</div>
						<div class="form-group">
							<label>ที่อยู่</label>
							<input class="form-control" value="<?php echo $result['C_add'];?>" name="add" id="add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>เบอร์โทร</label>
							<input type="text" value="<?php echo $result['C_tel'];?>" name="tel" id="custel" class="form-control" onchange="checktel();" maxlength="10" required><p id="errortel"></p>
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
	<div id="deleteEmployeeModal<?php echo $result['C_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">ลบทะเบียนลูกค้า</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสลูกค้า : <?php echo $result['C_id']; ?></p>
                        <p>ชื่อ : <?php echo $result['C_name'];?></p>
                        <p>ที่อยู่ : <?php echo $result['C_add']; ?></p>
						<p>เบอร์โทร : <?php echo $result['C_tel']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-danger" href="../../../control/customer/Delete.php?delid=<?php echo $result['C_id']; ?>" role="button" value="Delete">ยืนยัน</a>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
					</div>
				</form>
			</div>
		</div>
	</div>
    <?php } ?>
    <!-- add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../../../control/customer/Add.php">
					<div class="modal-header">
						<h4 class="modal-title">เพิ่มทะเบียนลูกค้า</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>ชื่อ</label>
							<input type="text" value="" name="cusname" id="cusname" class="form-control" onchange="checkname();" maxlength="25" minlength="2" required><p id="n"></p>
						</div>
						<div class="form-group">
							<label>ที่อยู่</label>
							<input class="form-control" value="" name="add" id="add" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>เบอร์โทร</label>
							<input type="text" value="" name="custel" id="custel" class="form-control" onblur="checktel();" maxlength="10" required><p id="errortel"></p>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
						<input type="submit" class="btn btn-success" value="เพิ่มข้อมูล">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--End add Modal -->
			</tbody>
			</table>
			</div>
		</div>
		</div>
	<!--End Delete Modal -->