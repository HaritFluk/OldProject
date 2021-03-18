<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="./css/login.css">
<title>เข้าสู่ระบบ</title>
</head>
<body>
  <br>
  <center><h1 class="text-white fadeInDown">Thai Orange Store</h1></center>
<div class="wrapper fadeInDown">
  <div id="formContent">
      <h2 class="active">เข้าสู่ระบบ</h2>
    <!-- Login Form -->
    <form action="./control/login/checkin.php" method="POST">
      <input type="text" id="user" class="fadeIn second" name="user"  placeholder="ชื่อผู้ใช้" onblur="checkuser();" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อผู้ใช้')">
      <input type="password" id="pass" class="fadeIn third" name="pass" placeholder="รหัสผ่าน" onblur="checkpass();" required oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่าน')">
      <input type="submit" class="fadeIn fourth" value="เข้าสู่ระบบ">
    </form>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
  function checkuser()
{
    var elem = document.getElementById('user').value;
    if(!elem.match(/^([a-z])+$/i))
    {
        alert("กรอกได้เฉพาะตัวเลขและตัวอักษรภาษาอังกฤษเท่านั้น");
        document.getElementById('user').value = "";
    }
}
function checkpass()
{
    var elem = document.getElementById('pass').value;
    if(!elem.match(/^([a-z0-9])+$/i))
    {
        alert("กรอกได้เฉพาะตัวเลขและตัวอักษรภาษาอังกฤษเท่านั้น");
        document.getElementById('pass').value = "";
    }
}
</script>
</body>
</html>