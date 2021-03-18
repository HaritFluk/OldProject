<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางการซื้อขาย สินค้าหน้าร้าน</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="Btable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
								<th>ชื่อผู้พนักงาน</th>
								<th>จำนวนรวม</th>
								<th>ราคารวม</th>
                                <th>วันที่มีการจำหน่ายสินค้า</th>
                                <th>รายละเอียด</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
						<td class="bid" hidden="true"><?php echo $row['B_id']; ?></td>
                        <td class="Mid" hidden="true"><?php echo $row['M_id']; ?></td>
						<td><?php echo $row["M_Fname"]." ".$row["M_Lname"]; ?></td>
						<td><?php echo $row['B_total_amount'].' แก้ว'; ?></td>
						<td><?php echo $row['B_total_price'].' บาท'; ?></td>
                        <td><?php echo $row['B_date']; ?></td>
						<td align="center">
							<a href="#" data-target="#buyDataModal<?php echo $row['B_id']; ?>" class="btn btn btn-warning" data-toggle="modal" >รายละเอียด</a>
							<a href="#" data-target="#delDataModal<?php echo $row['B_id']; ?>" class="btn btn btn-danger" data-toggle="modal" >ลบ</a>
						</td>
					</tr>
		<!-- Start Detail Modal -->
		<div id="buyDataModal<?php echo $row['B_id']; ?>" name="buydetail" class="modal w-100 fade " >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">รายละเอียดประวัติการจองสินค้า</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body" id="detail_body">
                        <p>สินค้า  ----------  จำนวน</p>
                        <?php 	$detail = "SELECT DISTINCT * FROM buy_detail AS A
                                        INNER JOIN stock_product AS B
                                        ON A.P_id = B.P_id WHERE A.B_id = '".$row["B_id"]."'";
                                $detailq = $condb->query($detail);
                                while ($redetail = mysqli_fetch_array($detailq)){
                                ?>
                                <p><?php echo $redetail["P_name"] ?> ---------- <?php echo $redetail["B_amount"] ?> แก้ว</p></tr>
                                <?php } ?>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End Detail Modal -->
		<!-- Delete Modal HTML -->
		<div id="delDataModal<?php echo $row['B_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title"> ยืนยัน ลบข้อมูลการซื้อขาย</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัส : <?php echo $row['B_id']; ?></p>
                        <p>ชื่อผู้จำหน่าย : <?php echo $row['M_Fname']." ".$row["M_Lname"];?></p>
                        <p>จำนวนรวม : <?php echo $row['B_total_amount']; ?></p>
						<p>ราคารวม : <?php echo $row['B_total_price']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-danger" href="###?delid=<?php echo $row['B_id']; ?>" role="button" value="Delete">ยืนยัน</a>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
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