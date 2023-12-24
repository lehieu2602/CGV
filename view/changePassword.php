<?php

if (isset($_POST['changeInfo'])) {

    $email = $_SESSION['user'];
    $password = md5($_POST['change_password']);
    $newpass = md5($_POST['new_password']);
    $sql_login = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `user_email` = '$email' and `user_password` = '$password'");
    $idUser = $_SESSION['idUser'];
    $count = mysqli_num_rows($sql_login);

    if($count > 0) {
        $sql_change = mysqli_query($mysqli, "UPDATE `users` SET 
        `user_password` = '$newpass' , 
        
        WHERE `user_id` ='$idUser'");
    } else {
        echo "<script type='text/javascript'>
        alert('Sai mật khẩu hiện tại');
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
        <h1>THAY ĐỔI MẬT KHẨU</h1>
    </div>
    <div>
        <form action="" method="post">
            <div class="form-group">
                <label for="change_password" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Mật khẩu hiện tại
                    <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <input type="password" class="form-control" name="change_password" id="change_password" placeholder="Password" required>
                <span id="pswError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; " ;></span>

            </div>
            <div class="form-group">
                <label for="change_password" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Mật khẩu mới
                    <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password" required>
                <span id="pswError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; " ;></span>

            </div>
            <div class="form-group">
                <label for="change_password" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Xác nhận mật khẩu mới
                    <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="Password" required>
                <span id="pswError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; " ;></span>

            </div>
            <button type="submit" name="changePass" id="changePass" class="btn btn-danger" style="width: 100%;background-color: #e71a0f;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;text-transform: uppercase;">Thay Đổi Thông Tin</button>

        </form>


        <script>
            

            var passwordInput = document.getElementById("change_password");
            var newPass = document.getElementById("new_password");
            var confirmNewPass = document.getElementById("confirm_new_password");

            var submitchange = document.getElementById("changePass");


            submitchange.addEventListener('click', function() {


                if (passwordInput.value === "" || newPass.value === "" || confirmNewPass.value === "") {
                    alert("Vui lòng điền đầy đủ thông tin!");
                    event.preventDefault();
                }
            })

            passwordInput.addEventListener("input", function() {
                if (passwordInput.value !== "") {
                    pswError.innerHTML = ""; // Ẩn cảnh báo nếu trường không rỗng
                }
            });
        </script>
    </div>
</div>