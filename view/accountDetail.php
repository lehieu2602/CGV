<div class="account-content" style="width: 100%;">
    <br>
    <div class="title-header2">
        <h1>THAY ĐỔI THÔNG TIN</h1>
    </div>
    <div>
        <form action="" class="cgv-signup-form" method="post" id="cgv-signup-form">


            <div class="form-group col-sm-12">
                <label for="register_fullname" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Tên
                    <span style="color:#EE2C2C; font-weight: 600;">*</label>
                <input type="text" class="form-control" name="register_fullname" id="register_fullname" placeholder="Tên">
                <span id="nameError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; " ;></span>
            </div>
            <div class="form-group col-sm-12">
                <label for="phone" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Số
                    điện thoại <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Số Điện Thoại">
                <span id="phoneError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; " ;></span>

            </div>
            <div class="form-group col-sm-12">
                <label for="emailReg" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Email
                    <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <input type="email" class="form-control" name="emailReg" id="emailReg" placeholder="Email">
                <span id="emailError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; " ;></span>

            </div>
            <div class="form-group col-sm-12">
                <label for="passwordReg" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Password
                    <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <input type="password" class="form-control" name="passwordReg" id="passwordReg" placeholder="Password">
                <span id="pswError" class="error" style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; " ;></span>

            </div>
            <div class="form-group col-sm-12">
                <label for="birthday" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Ngày
                    Sinh <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <input type="date" name="birthday" id="birthday" required>
                <span id="birthError" class="error" style="color: red" ;></span>

            </div>
            <div class="form-group col-sm-12" style="text-transform: none;">
                <label for="" style=" font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;"><span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                <input type="radio" name="r-gender" id="male-gender" value="1" required>
                Nam
                <input type="radio" name="r-gender" id="female-gender" value="0" required>
                Nữ
            </div>
            <div class=" form-group col-sm-12">
                <label for="mySelect" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Khu
                    vực <span style="color:#EE2C2C; font-weight: 600;">*</span></label>

                <select name="selectedCity" id="mySelect">

                </select>
                <span id="cityError" class="error" style="color: red" ;></span>

            </div>

            <div class="form-group col-sm-12">
                <label for="Select" style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Rạp
                    Yêu Thích <span style="color:#EE2C2C; font-weight: 600;">*</span></label>

                <select name="selectedTheater" id="Select">
                    <span id="cinemaError" class="error" style="color: red" ;></span>

                </select>

            </div>
        </form>
    </div>
</div>