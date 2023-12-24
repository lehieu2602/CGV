<?php
$sql_listCity = mysqli_query($mysqli, 'Select name from location order by id desc');
$sql_listCinema = mysqli_query($mysqli, 'Select name from cinemas order by id desc');

if (isset($_POST['changeInfo'])) {

    $username = $_POST['change_fullname'];
    $email = $_SESSION['user'];
    $password = md5($_POST['current_password']);
    $sql_login = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `user_email` = '$email' and `user_password` = '$password'");
    $phone = $_POST['change_phone'];
    $birth = $_POST['change_birthday'];
    $city = $_POST['selectedCity'];
    $theater = $_POST['selectedTheater'];
    $idUser = $_SESSION['idUser'];
    $count = mysqli_num_rows($sql_login);

    if($count > 0) {

        $sql_change = mysqli_query($mysqli, "UPDATE `users` SET 
        `username` = '$username' , 
        `phone_number` = '$phone', 
        `date_of_birth` = '$birth', 
        `location` = '$city',
        `favorite_theater` = '$theater' 
        WHERE `user_id` ='$idUser'");

        session_destroy();
        echo "<script type='text/javascript'>
        alert('Thay đổi thông tin thành công, vui lòng đăng nhập lại');
        window.location.href = 'index.php?controller=login';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Sai mật khẩu');
    </script>";
    }
    //     echo "<script type='text/javascript'>
    //     alert('Thay đổi thông tin thành công');
    // </script>";
}

?>


<div class="account-content">
    <br>
    <div class="title-header-black">
        <h1>THAY ĐỔI THÔNG TIN</h1>
    </div>
    <div>
        <form action="" method="post">


            <div class="form-group">
                <label for="change_fullname" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Tên
                    <span style="color:#EE2C2C; font-weight: 600;">*</label>
                <input type="text" class="form-control" name="change_fullname" id="change_fullname" placeholder="Tên" value="<?php echo $_SESSION['name'] ?>">
                <span id="nameError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; " ;></span>
            </div>
            <div class="form-group">
                <label for="change_phone" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Số
                    điện thoại <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <input type="text" class="form-control" name="change_phone" id="change_phone" placeholder="Số Điện Thoại" value="<?php echo $_SESSION['phone'] ?>">
                <span id="phoneError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; " ;></span>

            </div>
            <div class="form-group">
                <label for="change_email" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Email</label>
                <input type="email" class="form-control" name="change_email" id="change_email" placeholder="<?php echo $_SESSION['user'] ?>" readonly>
                <span id="emailError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; " ;></span>

            </div>

            <div class="form-group">
                <label for="current_password" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Password Confirm
                    <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Password" required>
                <span id="pswError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; " ;></span>

            </div>
            <div class="form-group">
                <label for="change_birthday" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Ngày
                    Sinh<span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <input type="date" name="change_birthday" id="change_birthday" value="<?php echo $_SESSION['birth']; ?>">
                <span id="birthError" class="error" style="color: red" ;></span>

            </div>
            <div class="form-group">
                <label for="mySelect" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Khu vực <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <?php
                $list_city = array();
                while ($row = mysqli_fetch_assoc($sql_listCity)) {
                    $list_city[] = $row['name'];
                }
                for ($i=0; $i<$list_city; $i++) {
                    if($list_city[$i] == $_SESSION['city']) {
                        $mainCity = $list_city[$i];
                        unset($list_city[$i]);
                        break;
                    }
                }
                ?>
                <select name="selectedCity" id="mySelect">
                    <option selected> <?php echo $mainCity ?></option>
                </select>
                <span id="cityError" class="error" style="color: red" ;></span>
                <script>
                    var select = document.getElementById("mySelect");
                    var option_def = document.createElement("option");
                    var options = [<?php echo '"' . implode('","', $list_city) . '"' ?>];
                    for (var i = 0; i < options.length; i++) {
                        var option = document.createElement("option");
                        option.text = options[i];
                        select.add(option);
                    }
                </script>
            </div>

            <div class="form-group">
                <label for="Select" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Rạp Yêu Thích <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <?php
                $list_cinema = array();
                while ($row = mysqli_fetch_assoc($sql_listCinema)) {
                    $list_cinema[] = $row['name'];
                }
                for ($i=0; $i<$list_cinema; $i++) {
                    if($list_cinema[$i] == $_SESSION['favorite_cinema']) {
                        $mainCinema = $list_cinema[$i];
                        unset($list_cinema[$i]);
                        break;
                    }
                }
                ?>
                <select name="selectedTheater" id="Select">
                    <span id="cinemaError" class="error" style="color: red" ;></span>
                    <option selected> <?php echo $mainCinema ?></option>
                </select>
                <script>
                    var options = [<?php echo '"' . implode('","', $list_cinema) . '"' ?>];

                    var select = document.getElementById("Select");
                    for (var i = 0; i < options.length; i++) {
                        var option = document.createElement("option");
                        option.text = options[i];
                        select.add(option);
                    }
                </script>
            </div>
            <button type="submit" name="changeInfo" id="changeInfo" class="btn btn-danger" style="width: 100%;background-color: #e71a0f;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;text-transform: uppercase;">Thay Đổi Thông Tin</button>

        </form>


        <script>
            var nameInput = document.getElementById("change_fullname");

            var phoneInput = document.getElementById("change_phone");

            var emailInput = document.getElementById("change_email");

            var passwordInput = document.getElementById("current_password");
            var genderInput = document.getElementsByName("r-gender")
            var birthInput = document.getElementById("change_birthday");
            var cityInput = document.getElementById("mySelect");
            var cinemaInput = document.getElementById("Select");

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var phoneRegex = /^0\d{9}$/;

            var submitchange = document.getElementById("changeInfo");


            submitchange.addEventListener('click', function() {


                if (nameInput.value === "" || phoneInput.value === "" || passwordInput.value === "" || birthInput.value === "" || cityInput.value === "" || cinemaInput === "") {
                    alert("Vui lòng điền đầy đủ thông tin!");
                    event.preventDefault();
                }
            })

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
        </script>
    </div>
</div>