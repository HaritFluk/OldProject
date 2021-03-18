<div id="content" class="p-4 p-md-5 pt-5">
<!-- Card Buy Content  -->
<div class="row" align="center" >
<div class="col-md-6"  >
					<div class="form-header">
					<h4 class="form-title">ชำระเงิน</h4>
          </div>
					<div class="form-group md-3" method="POST">
                    <div class="input-group-append">
                    <input type="text"name="pay" id="pay" value="0" class="form-control" min="0" pattern="[0-9]{7}" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลและกรอกตัวเลขเท่านั้น')" title="ตัวเลขเท่านั้น"  required>
                    <div class="input-group-append">
                    <span class="input-group-text">บาท</span>
                    </div>
                    </div>
                    <br>
                    <div class="form-group">
                    <a type="submit"class="btn btn-success text-white" id="btn" data-target="#payModal"  data-toggle="modal">จ่ายเงิน</a>
                    </div>
                    <br>
                </div>
                </div>
                <br>
<div class="col-md-6">
        <h4 align="center">รายการที่ซื้อ</h4>
        <?php
        echo $order_details;
        ?>
        <input type="hidden" name="total" id="total" value="<?php echo $total_price; ?>">
			</div>
        </div>
    </div>			
</div>
    <!-- Modal -->
<form class="pay"  method="POST" action="../../../control/buy/Add.php">
<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="payModal">ทำการจ่าย</h5>
        <a type="a" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
          <p>จ่ายเงินจำนวน :</p><p class="number"> </p>
          <p>ราคารวม :</p><p class="total"></p>
          <p>ทอนเงิน :</p><p class="money"> </p>
        <?php echo $order_details; ?>
      </div>
      <div class="modal-footer">
        <!-- <a type="a" class="btn btn-secondary">ใบเสร็จ</a> -->
        <button type="submit" id="success" class="btn btn-primary">เสร็ขสิ้น</button>
        <input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
      </div>
    </div>
  </div>
</div>
</form>