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

    <div class="login-signup">
        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="diemthuong-tab" data-toggle="tab" href="#login" role="tab" aria-controls="diemthuong" aria-selected="true">Đăng Nhập</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="quatang-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="quatang" aria-selected="false">Đăng Kí</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                <div class="cgvfc form-login-content">
                    <form action="" class="cgv-login-form" method="post" id="cgv-login-form">
                        <div id="correct"></div>
                        <label for="fname">Email hoặc số điện thoại</label><br>
                        <input type="text" name="emailUser" id="emailUser" class="input-text required-entry" placeholder="Email hoặc số điện thoại" autocomplete="off">
                        <label for="lname">Mật khẩu</label>
                        <input type="password" id="password" name="password" class="input-text required-entry" placeholder="Mật khẩu" autocomplete="off">

                        <button type="submit" name ="login" class="btn btn-primary">Đăng Nhập</button>
                        <div class="cgv-login-forgotp-link">
                            <a href="" class="forgot-pwd required-entry">Bạn muốn tìm lại mật khẩu?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade show" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                <form action="" class="cgv-signup-form" method="post" id="cgv-signup-form">
                    <fieldset>
                        <label>Tên <span>*</span></label> <br>
                        <input type="text" name="register_fullname" id="register_fullname" class="input-text required-entry validation-failes" required onkeyup="validateForm(this.id,'fullname')" placeholder="Tên" autocomplete="off">
                        <!-- <span id="error-validate">Họ tên chưa nhập</span> -->
                        <label>Số điện thoại <span>*</span></label><br>
                        <input type="number" name="phone" id="phone" placeholder="Số điện thoại" required>
                        <label>Email <span>*</span></label><br>
                        <input type="email" name="emailReg" id="emailReg" placeholder="Email" required>
                        <label>Mật khẩu <span>*</span></label><br>
                        <input type="password" name="passwordReg" id="passwordReg" placeholder="Mật khẩu" required>
                        <label for="r-birthday">Ngày sinh
                            <span>*</span>
                        </label><br>
                        <input type="date" name="birthday" id="birthday" required>
                        <label for="r-fname" class="gender-title">
                            <span class="sp-gender">Giới tính</span>
                            <span>*</span>
                            <input type="radio" name="r-gender" id="male-gender" value="1">
                            Nam
                            <input type="radio" name="r-gender" id="female-gender" value="0">
                            Nữ
                        </label><br>
                        <!-- checked tu ktra input de de xuat san gioi tinh nma nguoi dung van co the thay doi dc -->
                        <label for="city">Khu vực <span>*</span></label><br>
                        <select name="selectedCity" id="mySelect">
                        </select>
                        <script>
                            // Mảng dữ liệu các tùy chọn
                            var options = ["Khu vực", "Hà Nội", "Hồ Chí Minh", "An Giang", "Bà Rịa - Vũng Tàu", "Bắc Giang", "Bắc Kạn", "Bạc Liêu", "Bắc Ninh", "Bến Tre", "Bình Định", "Bình Dương", "Bình Phước", "Bình Thuận", "Cà Mau", "Cao Bằng", "Đắk Lắk",
                                "Đắk Nông", "Điện Biên", "Đồng Nai", "Đồng Tháp", "Gia Lai", "Hà Giang", "Hà Nam", "Hà Tĩnh", "Hải Dương", "Hậu Giang", "Hòa Bình", "Hưng Yên", "Khánh Hòa",
                                "Kiên Giang", "Kon Tum", "Lai Châu", "Lâm Đồng", "Lạng Sơn", "Lào Cai", "Long An", "Nam Định", "Nghệ An", "Ninh Bình", "Ninh Thuận", "Phú Thọ",
                                "Quảng Bình", "Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", "Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa", "Thừa Thiên Huế", "Tiền Giang",
                                "Trà Vinh", "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái", "Phú Yên", "Cần Thơ", "Đà Nẵng", "Hải Phòng"
                            ];

                            // Lặp qua mảng và thêm mỗi option vào select
                            var select = document.getElementById("mySelect");
                            for (var i = 0; i < options.length; i++) {
                                var option = document.createElement("option");
                                option.text = options[i];
                                select.add(option);
                            }
                        </script>
                        <label for="cinema">Rạp yêu thích</label><br>
                        <select name="selectedTheater" id="Select">
                        </select>
                        <script>
                            // Mảng dữ liệu các tùy chọn
                            var options = ["CGV Vincom Center Bà Triệu - Hà Nội", "CGV Vincom Mega Mall Royal City - Hà Nội", "CGV Vincom Times City - Hà Nội", "CGV Vincom Long Biên - Hà Nội",
                                "CGV Vincom Nguyễn Chí Thanh - Hà Nội", "CGV Vincom Phạm Ngọc Thạch - Hà Nội", "CGV Vincom Mega Mall Thảo Điền - TP. Hồ Chí Minh", "CGV Vincom Landmark 81 - TP. Hồ Chí Minh",
                                "CGV Vincom Quang Trung - TP. Hồ Chí Minh", "CGV Vincom 3/2 - TP. Hồ Chí Minh", "CGV Vincom Thủ Đức - TP. Hồ Chí Minh", "CGV Vincom Lê Văn Việt - TP. Hồ Chí Minh",
                                "CGV Vincom Plaza Biên Hòa - Đồng Nai", "CGV Vincom Plaza Bà Rịa - Vũng Tàu", "CGV Vincom Plaza Cần Thơ - Cần Thơ",
                            ];

                            // Lặp qua mảng và thêm mỗi option vào select
                            var select = document.getElementById("Select");
                            for (var i = 0; i < options.length; i++) {
                                var option = document.createElement("option");
                                option.text = options[i];
                                select.add(option);
                            }
                        </script>


                    </fieldset>
                    <div class="terms-register">
                        <label class="r-terms">
                            <input type="checkbox" checked="checked" name="cgv-termsdob" id="cgv-termsdob" value="ok" onchange="validateForm(this.id,termsdob)">
                            Xác nhận email chính xác và ngày sinh khớp với thông tin trên CMND/CCCD. Nếu không trùng khớp, các thông tin này sẽ không được hỗ trợ cập nhật thay đổi và có thể không được hưởng các Quyền lợi thành viên
                            <a href="">Quyền lợi thành viên</a>
                            <br>
                            <input type="checkbox" checked="checked" name="cgv-terms" id="cgv-terms" value="ok" onchange="validateForm(this.id,termsdob)">
                            Tôi đồng ý với
                            <a href="">Điều khoản Sử dụng của CGV</a>
                        </label>
                        <button type="submit" name="register" class="btn btn-primary">Đăng Ký</button>
                    </div>
                    <div class="cgv-register-requirement"></div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>