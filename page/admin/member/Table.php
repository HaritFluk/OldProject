<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->

<div class="form-group">
    <a href="#addEmployeeModal" data-toggle="modal" class="btn btn btn-success">เพิ่มผู้ใช้</a>
</div>
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางจัดการข้อมูล สมาชิก</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="Mtable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
								<th>รหัสผู้ใช้</th>
								<th>ชื่อ</th>
           						<th>ที่อยู่</th>
            					<th>เบอร์โทร</th>
								<th>การจัดการ</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
						<td><?php echo $result['M_id']; ?></td>
						<td><?php echo $result['M_Fname']." ".$result['M_Lname'];?></td>
            			<td><?php echo $result['M_add']; ?></td>
						<td><?php echo $result['M_tel']; ?></td>
						<td align="center"><a href="#" data-target="#editEmployeeModal<?php echo $result['M_id'];?>" class="btn btn btn-warning" data-toggle="modal">แก้ไขข้อมูล</a>
            			<a href="#" data-target="#deleteEmployeeModal<?php echo $result['M_id']; ?>" class="btn btn btn-danger" data-toggle="modal" >ลบข้อมูล</a></td>

					</tr>
					<!-- Edit Modal HTML -->
	<div id="editEmployeeModal<?php echo $result['M_id'];?>" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../../../control/member/Edit.php">
					<div class="modal-header">
						<h4 class="modal-title">แก้ไขข้อมูลผู้ใช้งาน</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
						<label></label>
						<input  type="hidden" value="<?php echo $result['M_id'];?>" name="mid" id="mid" class="form-control" readonly required>
					</div>
						<div class="form-group">
							<label>ชื่อ</label>
							<input type="text" value="<?php echo $result['M_Fname'];?>" name="fname" id="fname" class="form-control" onchange="checkfname();" required>
						</div>
						<div class="form-group">
							<label>นามสกุล</label>
							<input type="text" value="<?php echo $result['M_Lname'];?>" name="lname" id="lname" class="form-control" onchange="checklname();" required>
						</div>
						<div class="form-group">
							<label>ที่อยู่</label>
							<input class="form-control" value="<?php echo $result['M_add'];?>" name="add" id="add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>เบอร์โทร</label>
							<input type="text" value="<?php echo $result['M_tel'];?>" name="tel" id="tel" class="form-control" onchange="checktel();" required>
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
	<div id="deleteEmployeeModal<?php echo $result['M_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">ยืนยันการลบพนักงาน</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสพนักงาน : <?php echo $result['M_id']; ?></p>
                        <p>ชื่อพนักงาน : <?php echo $result['M_Fname']." ".$result['M_Lname'];?></p>
                        <p>ที่อยู่ : <?php echo $result['M_add']; ?></p>
						<p>เบอร์โทร : <?php echo $result['M_tel']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-danger" href="../../../control/member/Delete.php?delid=<?php echo $result['M_id']; ?>" role="button" value="Delete">ยืนยัน</a>
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
				<form method="POST" action="../../../control/member/Add.php">
					<div class="modal-header">
						<h4 class="modal-title">เพิ่มพนักงาน</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>ชื่อ</label>
							<input type="text" value="" name="fname" id="fname" class="form-control" onchange="checkfname();" maxlength="25" minlength="2" required><p id="fn"></p>
						</div>
						<div class="form-group">
							<label>นามสกุล</label>
							<input type="text" value="" name="lname" id="lname" class="form-control" onchange="checklname();" maxlength="25" minlength="2" required><p id="ln"></p>
						</div>
						<div class="form-group">
						<label>ชื่อผู้ใช้งาน</label>
							<input type="text" value="" name="user" id="user" class="form-control" onchange="checkuser();" minlength="4" maxlength="10" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อผู้ใช้')"><p id="checku"></p>
						</div>
						<div class="form-group">
							<label>รหัสผ่าน</label>
							<input type="password" value="" name="pass" id="pass" class="form-control" onchange="checkpass()" maxlength="8" required oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่าน')"><p id="checkp"></p>
						</div>
						<div class="form-group">
							<label>ที่อยู่</label>
							<input class="form-control" value="" name="add" id="add" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>เบอร์โทร</label>
							<input type="text" value="" name="tel" id="tel" class="form-control" onchange="checktel();" maxlength="10" required><p id="errortel"></p>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
						<input type="submit" class="btn btn-success" value="เพิ่มผู้ใช้">
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