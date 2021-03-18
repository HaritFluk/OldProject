<div class="row" align="center" >
<div class="col-md-6" method="POST" >
					<div class="form-header">
          <h4 class="form-title">รายละเอียด</h4>
          <div class="row">
          <center>
            <input type="radio"  name="aorb" onclick="showA();">ลูกค้าที่เป็นสมาชิก | 
            <input type="radio"  name="aorb" onclick="showB();">ลูกค้าที่จองสินค้าเข้ามาใหม่
            </center> 
          </div>
          </div>
					<div class="form-group md-3" id="newcus" hidden="true">
          <h4 class="form-title">ลูกค้าใหม่</h4>
            <div class="form-group">
							<label>ชื่อลูกค้า</label>
							<input type="text"  name="cname" id="cname" class="form-control" onchange="checkname();" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ภาษาไทยเท่านั้น')" required><p id="n"></p>
						</div>
						<div class="form-group">
							<label>ที่อยู่ลูกค้า</label>
							<input type="text"  name="cadd" id="cadd" class="form-control" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ภาษาไทยเท่านั้น')" required>
						</div>
						<div class="form-group">
							<label>เบอร์โทรลูกค้า</label>
							<input type="tel" class="form-control"  name="ctel" id="ctel" class="form-control" onchange="checktel();" oninvalid="this.setCustomValidity('กรุณากรอกเบอร์โทรติดต่อ 10 ตัวเลข โดยขึ้นต้นด้วย 08 หรือ 06 หรือ 09')" required></input><p id="errortel"></p>
						</div>
						<div class="form-group">
							<label>วันที่รับ-ส่ง</label>
							<input type="Date"  name="getdate1" id="getdate1" class="form-control" oninvalid="this.setCustomValidity('กรุณาเลือกวันที่')" required>
                        </div>
                    <label>ประเภทการส่ง</label>
                    <select class="form-control" name="gettype1" id="gettype1" required oninvalid="this.setCustomValidity('กรุณาเลือก')">
                    
						<option value="" required><-- กรุณาเลือกการรับสินค้า --></option>
                    <?php while($productarray = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                        
                        <option value="<?php echo $productarray["id"];?>"><?php echo $productarray["id"]." - ".$productarray["get_name"];?></option>
                    <?php } ?>
                    </select>
                    <br>
                    <div class="form-group">
                    <input type="button" class="btn btn-success" id="btn1" value="จองสินค้า"></input>
                    </div>
                    <br>
                </div>
            <div class="form-group md-3" id="oldcus" hidden="true">
            <h4 class="form-title">ลูกค้าเก่า</h4>
            <label>รหัสลูกค้าที่เป็นสมาชิก</label>
                    <select class="form-control" name="oldid" id="oldid" required oninvalid="this.setCustomValidity('กรุณาเลือก')">
						<option value="" required><-- กรุณาเลือกลูกค้าที่เป็นสมาชิก --></option>
                    <?php while($row = mysqli_fetch_array($query2,MYSQLI_ASSOC)) { ?>
                        
                        <option value="<?php echo $row["C_id"];?>"><?php echo $row["C_id"]." - ".$row["C_name"];?></option>
                        <?php } ?>
                    </select>
                    <br>
            <div class="form-group">
							<label>ชื่อลูกค้า</label>
							<input type="text"  name="cname2" value="" id="cname2" class="form-control" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ภาษาไทยเท่านั้น')" required readonly><p id="n"></p>
						</div>
						<div class="form-group">
							<label>ที่อยู่ลูกค้า</label>
							<input type="text"  name="cadd2" value="" id="cadd2" class="form-control" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ภาษาไทยเท่านั้น')" required readonly>
						</div>
						<div class="form-group">
							<label>เบอร์โทรลูกค้า</label>
							<input type="text" class="form-control" value=""  name="ctel2" id="ctel2" class="form-control" oninvalid="this.setCustomValidity('กรุณากรอกเบอร์โทรติดต่อ 10 ตัวเลข โดยขึ้นต้นด้วย 08 หรือ 06 หรือ 09')" required readonly></input><p id="errortel"></p>
            </div>
						<div class="form-group">
							<label>วันที่รับ-ส่ง</label>
							<input type="Date"  name="getdate2" id="getdate2" class="form-control" oninvalid="this.setCustomValidity('กรุณาเลือกวันที่')" required>
                        </div>
                        <select class="form-control" name="gettype2" id="gettype2" required oninvalid="this.setCustomValidity('กรุณาเลือก')">
                    <option value="" required><-- กรุณาเลือกประเภทการจัดส่ง --></option>
                                <option value="1">มารับสินค้าเอง</option>
                                <option value="1">จัดส่งสินค้าให้</option>
                            </select>
                      <br>
                    <br>
                    <div class="form-group">
                    <input type="button" class="btn btn-success" id="btn2" value="จองสินค้า"></input>
                    </div>
                    <br>
                </div>
                </div>
                <br>
<div class="col-md-6">
        <h4 align="center">รายการที่จอง</h4>
        <?php
        echo $order_details;
        ?>
        <input type="hidden" name="total" id="total" value="<?php echo number_format($total_price, 2); ?>">
			</div>
        </div>
                    </div>
    <!-- Modal -->
<form  method="POST" action="../../../control/booking/Add.php">
<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">รายการจอง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>ชื่อลูกค้า : <p class="name"></p></p>
        <p>ที่อยู่ลูกค้า : <p class="address"></p></p>
        <p>เบอร์โทรลูกค้า : <p class="tel"></p></p>
        <p>วันที่รับ-ส่ง : <p class="date"></p></p>
        <p>ประเภทการส่ง : <p class="type"></p></p>
        <input type="text" hidden="true" value="" id="id" name="id">
        <input type="text" hidden="true" value="" id="name" name="name">
        <input type="text" hidden="true" value="" id="add" name="add">
        <input type="text" hidden="true" value="" id="phone" name="phone">
        <input type="text" hidden="true" value="" id="getdate" name="getdate">
        <input type="text" hidden="true" value="" id="gettype" name="gettype">
        <?php echo $order_details; ?>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary">ใบเสร็จ</button> -->
        <button type="submit" class="btn btn-primary">เสร็ขสิ้น</button>
      </div>
    </div>
  </div>
</div>
</form>