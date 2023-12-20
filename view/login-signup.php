<?php
if (isset($_POST['login'])) {
  $username = $_POST['emailUser'];
  $password = md5($_POST['password']);
  $sql_login = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `user_email` = '$username' and `user_password` = '$password'");
  $count = mysqli_num_rows($sql_login);
  if ($count > 0) {
    while ($getId = mysqli_fetch_array($sql_login)) {
      $_SESSION['idUser'] = $getId['user_id'];
    }
    $_SESSION['user'] = $username;
    echo "<script type='text/javascript'>alert('Hello " . $_SESSION['user'] . "'); window.location.href = 'index.php';</script>";
  } else {
    echo "<script type='text/javascript'>alert('Sai Tài Khoản Hoặc Mật Khẩu');</script>";
  }
}
if (isset($_POST['register'])) {
  $username = $_POST['register_fullname'];
  $password = md5($_POST['passwordReg']);
  $email = $_POST['emailReg'];
  $phone = $_POST['phone'];
  $birth = $_POST['birthday'];
  $gender = $_POST['r-gender'];
  $city = $_POST['selectedCity'];
  $theater = $_POST['selectedTheater'];
  $sql_checkName = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `user_email` = '$email' AND `phone_number` = '$phone'");
  $countName = mysqli_num_rows($sql_checkName);
  if ($countName == 0) {
    $sql_register = mysqli_query($mysqli, "INSERT INTO cinema.users
        (username, user_password, phone_number, user_email, date_of_birth, gender, location, favorite_theater)
        VALUES('$username', '$password', '$phone', '$email', '$birth', $gender, '$city', '$theater');");
    $sql_checkreg = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `user_email` = '$email' AND `phone_number` = '$phone'");
    $count = mysqli_num_rows($sql_checkreg);
    if ($count > 0) {
      echo "<script type='text/javascript'>alert('Đăng Ký Tài Khoản Thành Công');</script>";
    }
  } else {
    echo "<script type='text/javascript'>alert('Tên Đăng Nhập Đã Tồn Tại');</script>";
  }
}

?>
<!-- login -->
<div class="login container">
  <?php
  if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
    echo "<ul>
                <a style ='text-transform: none' class='dropdown-toggle noselect' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' >Xin chào <span class='userEmail'>" . $_SESSION['user'] . "</span></a>
                  <div class='dropdown-menu noselect'aria-labelledby='dropdownMenuButton'style ='text-transform: none'>
                    <a class='dropdown-item'href='?controller=userInfo'style ='margin: 0'>Thông Tin Tài Khoản</a>
                    <a class='dropdown-item'href='?signout=true'style ='margin: 0'>Đăng Xuất</a>
                  </div>
                    </ul>";
  } else {
    echo '<ul>
            <a href="">vé của tôi</a>
            <a href="" data-toggle="modal" data-target="#login">đăng nhập/đăng ký</a>
        </ul>';
  }
  ?>

  <div class="login-signup" style="width: 50%; margin-left: 25%; background-color: white;">
    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist" style=" margin-bottom: 2%; background-color: #EE2C2C">
      <li class="nav-item" role="presentation">
        <div class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true" style="border-radius: 5px;border-bottom: 3px solid #fff;color: #fff;background-color: red;font-weight: 700;font-size: 17px;">Đăng Nhập</div>
      </li>
      <li class="nav-item" role="presentation">
        <div class="nav-link" id="signup-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false" style="border-radius: 5px; border-bottom: 3px solid #fff;color: #fff;background-color: red;font-weight: 700;font-size: 17px;">Đăng Kí</div>
      </li>

    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
        <div class="cgvfc form-login-content">
          <form action="" class="cgv-login-form" method="post" id="cgv-login-form">
            <div class="form-group" style="margin-left: 5%;">
              <label for="myEmail" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Email hoặc số điện thoại</label>
              <input type="email" id="myEmail" class="form-control" placeholder="Email hoặc số điện thoại">
              <label for="myPassword" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Mật khẩu</label>
              <input type="password" id="myPassword" class="form-control" placeholder="Mật khẩu">

              <button type="submit" name="login" class="btn btn-danger" style="width: 100%;background-color: #e71a0f;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;text-transform: uppercase;">Đăng Nhập</button>
              <div class="cgv-login-forgotp-link" style="text-align:center;">
                <a href="" class="forgot-pwd required-entry" style=" text-decoration:none;"><small style="font-weight: 600;text-transform: none;font-size: 12px;">Bạn muốn tìm lại mật khẩu?</small></a>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade show" id="signup" role="tabpanel" aria-labelledby="signup-tab">
        <form action="" class="cgv-signup-form" method="post" id="cgv-signup-form">


          <div class="form-group col-sm-12">
            <label for="register_fullname" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Tên <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
            <input type="text" class="form-control" name="register_fullname" id="register_fullname" placeholder="Tên">
            <span id="nameError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; "></span>
          </div>
          <div class="form-group col-sm-12">
            <label for="phone" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Số điện thoại <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Số Điện Thoại">
            <span id="phoneError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; "></span>

          </div>
          <div class="form-group col-sm-12">
            <label for="emailReg" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Email <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
            <input type="email" class="form-control" name="emailReg" id="emailReg" placeholder="Email">
            <span id="emailError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; "></span>

          </div>
          <div class="form-group col-sm-12">
            <label for="passwordReg" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Password <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
            <input type="password" class="form-control" name="passwordReg" id="passwordReg" placeholder="Password">
            <span id="pswError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; "></span>

          </div>
          <div class="form-group col-sm-12">
            <label for="birthday" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Ngày Sinh <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
            <input type="date" name="birthday" id="birthday" required>
            <span id="birthError" class="error" style="color: red" ;></span>

          </div>
          <div class="form-group col-sm-12" style="margin: 4px 0 12px;display: inline-block;font-size: 13px;font-family: Verdana, Arial, sans-serif;font-weight: 600;text-transform: none;">
            <label for="" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;"><span style="color:#EE2C2C; font-weight: 600;">*</span></label>
            <input type="radio" name="r-gender" id="male-gender" value="1" required>
            Nam
            <input type="radio" name="r-gender" id="female-gender" value="0" required>
            Nữ
          </div>
          <div class="form-group col-sm-12">
            <label for="mySelect" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Khu vực <span style="color:#EE2C2C; font-weight: 600;">*</span></label> <br>
            <select name="selectedCity" id="mySelect" style="width: 100%;padding: 5px 5px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 2px;box-sizing: border-box;">
            </select>
            <span id="cityError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; "></span>
            <script>
              var options = ["Khu vực", "Hà Nội", "Hồ Chí Minh", "An Giang", "Bà Rịa - Vũng Tàu", "Bắc Giang", "Bắc Kạn", "Bạc Liêu", "Bắc Ninh", "Bến Tre", "Bình Định", "Bình Dương", "Bình Phước", "Bình Thuận", "Cà Mau", "Cao Bằng", "Đắk Lắk",
                "Đắk Nông", "Điện Biên", "Đồng Nai", "Đồng Tháp", "Gia Lai", "Hà Giang", "Hà Nam", "Hà Tĩnh", "Hải Dương", "Hậu Giang", "Hòa Bình", "Hưng Yên", "Khánh Hòa",
                "Kiên Giang", "Kon Tum", "Lai Châu", "Lâm Đồng", "Lạng Sơn", "Lào Cai", "Long An", "Nam Định", "Nghệ An", "Ninh Bình", "Ninh Thuận", "Phú Thọ",
                "Quảng Bình", "Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", "Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa", "Thừa Thiên Huế", "Tiền Giang",
                "Trà Vinh", "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái", "Phú Yên", "Cần Thơ", "Đà Nẵng", "Hải Phòng"
              ];


              var select = document.getElementById("mySelect");
              for (var i = 0; i < options.length; i++) {
                var option = document.createElement("option");
                option.text = options[i];
                select.add(option);
              }
            </script>
          </div>
          <div class="form-group col-sm-12">
            <label for="Select" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Rạp yêu thích <span style="color:#EE2C2C; font-weight: 600;">*</span></label> <br>
            <select name="selectedTheater" id="Select" style="width: 100%;padding: 5px 5px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 2px;box-sizing: border-box;">
              <span id="cinemaError" class="error" style="color: red" style="font-size:14px" ;></span>

            </select>
            <script>
              var options = ["CGV Vincom Center Bà Triệu - Hà Nội", "CGV Vincom Mega Mall Royal City - Hà Nội", "CGV Vincom Times City - Hà Nội", "CGV Vincom Long Biên - Hà Nội",
                "CGV Vincom Nguyễn Chí Thanh - Hà Nội", "CGV Vincom Phạm Ngọc Thạch - Hà Nội", "CGV Vincom Mega Mall Thảo Điền - TP. Hồ Chí Minh", "CGV Vincom Landmark 81 - TP. Hồ Chí Minh",
                "CGV Vincom Quang Trung - TP. Hồ Chí Minh", "CGV Vincom 3/2 - TP. Hồ Chí Minh", "CGV Vincom Thủ Đức - TP. Hồ Chí Minh", "CGV Vincom Lê Văn Việt - TP. Hồ Chí Minh",
                "CGV Vincom Plaza Biên Hòa - Đồng Nai", "CGV Vincom Plaza Bà Rịa - Vũng Tàu", "CGV Vincom Plaza Cần Thơ - Cần Thơ",
              ];

              var select = document.getElementById("Select");
              for (var i = 0; i < options.length; i++) {
                var option = document.createElement("option");
                option.text = options[i];
                select.add(option);
              }
            </script>
          </div>

          <div class="terms-register">
            <label class="r-terms" style="font-size: 13px;font-family: Verdana, Arial, sans-serif;font-weight: 600; text-transform: none;">
              <input type="checkbox" checked="checked" name="cgv-termsdob" id="cgv-termsdob" value="ok" onchange="validateForm(this.id,termsdob)">
              Xác nhận email chính xác và ngày sinh khớp với thông tin trên CMND/CCCD. Nếu không trùng khớp, các thông tin này sẽ không được hỗ trợ cập nhật thay đổi và có thể không được hưởng các Quyền lợi thành viên
              <a href style="color: #e71a0f;text-decoration: none; font-family: Verdana, Arial, sans-serif; font-size:13px;">Quyền lợi thành viên</a>
              <br>
              <input type="checkbox" checked="checked" name="cgv-terms" id="cgv-terms" value="ok" onchange="validateForm(this.id,termsdob)">
              Tôi đồng ý với
              <a href style="color: #e71a0f;text-decoration: none; font-family: Verdana, Arial, sans-serif; font-size:13px;">Điều khoản Sử dụng của CGV</a>
            </label>
            <button type="submit" name="register" id="register" class="btn btn-danger" style="width: 100%;background-color: #e71a0f;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;text-transform: uppercase;">Đăng Ký</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- <script>
    var register = document.getElementById("register");
    var name = document.getElementById("register_fullname");
    register.addEventListener('click', function(){
        if(name == null){
            alert("Hãy nhập tên!");
        }
    });
</script> -->
<script>
  var nameInput = document.getElementById("register_fullname");
  var phoneInput = document.getElementById("phone");
  var emailInput = document.getElementById("emailReg");
  var passwordInput = document.getElementById("passwordReg");
  var birthInput = document.getElementById("birthday");
  var cityInput = document.getElementById("mySelect");
  var cinemaInput = document.getElementById("Select");
  var emailLog = document.getElementById("");


  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var phoneRegex = /^0\d{9}$/;

  emailInput.addEventListener("input", function() {
    var isValidEmail = emailRegex.test(emailInput.value);
    if (!isValidEmail) {
      emailError.innerHTML = "email không hợp lệ"; // Ẩn cảnh báo nếu trường không rỗng
    } else {
      emailError.innerHTML = "";
    }
  });

  phoneInput.addEventListener("input", function() {
    var isValidPhone = phoneRegex.test(phoneInput.value);
    if (!isValidPhone) {
      phoneError.innerHTML = "số điện thoại không hợp lệ"; // Ẩn cảnh báo nếu trường không rỗng
    } else {
      phoneError.innerHTML = "";
    }
  });



  nameInput.addEventListener("input", function() {
    if (nameInput.value !== "") {
      nameError.innerHTML = ""; // Ẩn cảnh báo nếu trường không rỗng
    }
  });
  birthInput.addEventListener("input", function() {
    if (birthInput.value !== "") {
      birthError.innerHTML = ""; // Ẩn cảnh báo nếu trường không rỗng
    }
  });
  passwordInput.addEventListener("input", function() {
    if (passwordInput.value !== "") {
      pswError.innerHTML = ""; // Ẩn cảnh báo nếu trường không rỗng
    }
  });
  cityInput.addEventListener("input", function() {
    if (cityInput.value !== "") {
      cityError.innerHTML = ""; // Ẩn cảnh báo nếu trường không rỗng
    }
  });
  cinemaInput.addEventListener("input", function() {
    if (cinemaInput.value !== "") {
      cinemaError.innerHTML = ""; // Ẩn cảnh báo nếu trường không rỗng
    }
  });








  document.getElementById("cgv-signup-form").addEventListener("submit", function(event) {
    // Lấy giá trị của các trường input
    var nameValue = document.getElementById("register_fullname").value;
    var pswValue = passwordInput.value;
    var birthValue = birthInput.value;
    var cinemaValue = cinemaInput.value;
    var cityValue = cityInput.value;
    var phoneValue = phoneInput.value;
    var emailValue = emailInput.value;



    // Kiểm tra trường tên
    if (nameValue === "") {
      document.getElementById("nameError").innerHTML = "Họ tên chưa nhập.";
      event.preventDefault(); // Ngăn chặn form từ việc submit
    } else {
      document.getElementById("nameError").innerHTML = "";
    }
    if (pswValue === "") {
      document.getElementById("pswError").innerHTML = "Vui lòng nhập mật khẩu.";
      event.preventDefault();
    } else {
      document.getElementById("pswError").innerHTML = "";
    }
    if (emailValue === "") {
      document.getElementById("emailError").innerHTML = "Vui lòng nhập Email.";
      event.preventDefault();
    } else {
      document.getElementById("emailError").innerHTML = "";
    }
    if (phoneValue === "") {
      document.getElementById("phoneError").innerHTML = "Vui lòng nhập số điện thoại.";
      event.preventDefault();
    } else {
      document.getElementById("phoneError").innerHTML = "";
    }
    if (birthValue === "") {
      document.getElementById("birthError").innerHTML = "Vui lòng nhập ngày sinh.";
      event.preventDefault();
    } else {
      document.getElementById("birthError").innerHTML = "";
    }
    if (cityValue === "Khu vực") {
      document.getElementById("cityError").innerHTML = "Vui lòng chọn khu vực.";
      event.preventDefault();
    } else {
      document.getElementById("cityError").innerHTML = "";
    }
  });
</script>