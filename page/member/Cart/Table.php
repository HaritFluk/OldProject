<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="col-md-6"  method="POST">
<?php
$product_array = $db_handle->runQuery("SELECT * FROM stock_product");
if(!empty($product_array)) {

?>

    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางสินค้าหน้าร้าน</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="#" width="100%" cellspacing="0">
                        <thead>
                            <tr>
            					<th>#</th>
								<th>สินค้า</th>
            					<th>ราคาต่อหน่วย</th>
								<th>ในคลัง</th>
								<th>จำนวนที่ต้องการ</th>
                                <th>ซื้อสินค้า</th>
          					</tr>
                		</thead>
                	<tbody>
					<?php
					foreach($product_array as $key => $value) {
					?>

        			<tr>
						<form action="./Main.php?action=add&id=<?php echo $product_array[$key]["P_id"]; ?>" method="post">
						<td><img class="" src="../../../pic/<?php echo $product_array[$key]["image"];?>"></td>
						<td><?php echo $product_array[$key]["P_name"];?></td>
						<input type="hidden" name="name" value="<?php echo $product_array[$key]["P_name"];?>">
						<td><?php echo $product_array[$key]["P_price"]." บาท"; ?></td>
						<input type="hidden" name="price" value="<?php echo $product_array[$key]["P_price"];?>">
						<td><?php echo $product_array[$key]["P_amount"]." แก้ว"; ?></td>
						<td><input type="number" name="quantity" value="1" class="form-control" size="2" min="1" pattern="[1234567890]" title="ตัวเลขเท่านั้น" required></td>
						<td><input type="submit" value="เพิ่มลงตระกร้า" class="btn btn-sm btn-warning" /></td>
					</form></tr>
				<?php
					}
				}
				?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
	<!--End Delete Modal -->

