<style>
    .nav-link {
        border-radius: 0 !important;
        /* background: url(img/ribon_left-ccc.png) no-repeat scroll left 0 #e71a0f; */


        cursor: pointer;
    }

    .nav-link:active,
    .nav-link.active {
        color: #fff;
        background-color: #007bff;
        background-color: RED !important;
        border-color: white;
        outline: none;
        /* background: url(img/ribon_left_menu.gif) no-repeat scroll left 0 #e71a0f; */


    }
</style>


<div class="my-main-container">
    <div class="my-container">

        <div class="left-col col-3">
            <div class="head-left" Style="color: red; font-size: x-large;"><strong>TÀI KHOẢN CGV</strong></div>


            <ul class="nav nav-pills flex-column" id="myPill" role="tablist">
                <li class="nav-item">
                    <button class="nav-link " id="tab-thong-tin" data-toggle="tab" href="#thong-tin-chung" role="tab">
                        <strong>THÔNG TIN CHUNG</strong>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-chi-tiet" data-toggle="tab" href="#chi-tiet-tai-khoan" role="tab">
                        <strong>CHI TIẾT TÀI KHOẢN</strong>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link " id="tab-lich-su" data-toggle="tab" href="#lich-su-giao-dich" role="tab">
                        <strong>LỊCH SỬ GIAO DỊCH</strong>
                    </button>
                </li>
            </ul>
        </div>
        <div class="right-col">
            <div class="tab-content" id="myPillContent">
                <div class="tab-pane fade" id="thong-tin-chung" role="tabpanel" aria-labelledby="tab-thong-tin">
                    <br>
                    <div class="title-header1">
                        <h1>THÔNG TIN CHUNG</h1>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input name="form_key" type="hidden" value="9oLPaEGCo7Exw3CP">
                        <input name="usersatus" type="hidden" value="1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2 col-sm-4">
                                    <div class="info-center">
                                        <label id="fileToUpload" for="fileToUpload">
                                            <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/bg-cgv/icon-profile-cgv.png"
                                                width="120" height="120" alt="Avatar Profile">
                                        </label>
                                    </div>
                                    <div class="info-center">


                                        <!-- <input id="fileInput" type="file" name="file" title="NO" style="width: 100%;color: white; background-color: gray; border-radius: 12%;"/> -->

                                        <!-- <button style="color: white; background-color: gray; border-radius: 12%;"
                                            type="button" id="btnchange">
                                            Thay đổi
                                        </button> -->
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-4">
                                    <br>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="info-center">
                                        <strong>Thẻ thành viên</strong>
                                    </div>
                                    <div class="info-center">
                                        <img src="https://www.webarcode.com/barcode/image.php?code=9992311666546264&amp;style=196&amp;type=C128B&amp;width=220&amp;height=80&amp;xres=1&amp;font=3"
                                            alt="Barcode.">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </form>
                    <div class="info">
                        <h5 style="font-weight: bolder;">Xin chào
                            <?php echo $_SESSION['name'] ?>
                        </h5>
                        <h5 style="color: gray;">Với trang này, bạn sẽ quản lý được tất cả thông tin tài khoản của
                            mình.
                        </h5>
                    </div>
                    <!-- <div class="info">
                        <div class="container-fluid">
                            <div class="row">
                                <div style="color: gray;">
                                    Cấp độ thẻ
                                </div>
                                <br>
                                <div style="color: gray;">
                                    Tổng chi tiêu
                                </div>
                                <br>
                                <div style="color: gray;">
                                    Điểm CGV
                                </div>
                            </div>


                        </div>

                    </div> -->
                    <div class="contact">
                        <h4 style="font-weight: bolder;">Thông tin tài khoản</h4>
                        <hr style="border: none;border-top: 1px solid #ccc;">
                        <span>
                            <h5>LIÊN HỆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre><button type="button"
                                    class="btn btn-outline-secondary" onclick="openTab('tab-chi-tiet')">
                                    Thay đổi
                                </button></h5>
                        </span>
                        <div style="color: gray;">
                            <p>Tên:
                                <?php echo $_SESSION['name'] ?>
                            </p>
                            <p>Email:
                                <?php echo $_SESSION['user'] ?>
                            </p>
                            <p>Điện thoại:
                                <?php echo $_SESSION['phone'] ?>
                            </p>
                        </div>
                        <!-- <a href="#" class="btn">Thay đổi thông tin tài khoản</a>
        <a href="#" class="btn">Xem voucher</a>
        <a href="#" class="btn">Xem coupon</a>
        <a href="#" class="btn">Xem thẻ thành viên</a> -->
                    </div>
                </div>
                <div class="tab-pane fade" id="chi-tiet-tai-khoan" role="tabpanel" aria-labelledby="tab-chi-tiet">
                <br>    
                <div class="title-header2">
                        <h1>THAY ĐỔI THÔNG TIN</h1>
                    </div>

                    <form action="" class="cgv-signup-form" method="post" id="cgv-signup-form">


                        <div class="form-group col-sm-12">
                            <label for="register_fullname"
                                style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Tên
                                <span style="color:#EE2C2C; font-weight: 600;">*</label>
                            <input type="text" class="form-control" name="register_fullname" id="register_fullname"
                                placeholder="Tên">
                            <span id="nameError" class="error"
                                style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; "
                                ;></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="phone"
                                style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Số
                                điện thoại <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Số Điện Thoại">
                            <span id="phoneError" class="error"
                                style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; "
                                ;></span>

                        </div>
                        <div class="form-group col-sm-12">
                            <label for="emailReg"
                                style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Email
                                <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                            <input type="email" class="form-control" name="emailReg" id="emailReg" placeholder="Email">
                            <span id="emailError" class="error"
                                style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; "
                                ;></span>

                        </div>
                        <div class="form-group col-sm-12">
                            <label for="passwordReg"
                                style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Password
                                <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                            <input type="password" class="form-control" name="passwordReg" id="passwordReg"
                                placeholder="Password">
                            <span id="pswError" class="error"
                                style="color: red;font-size: 14px;text-transform: none;font-family: verdana,Arial,sans-serif; "
                                ;></span>

                        </div>
                        <div class="form-group col-sm-12">
                            <label for="birthday"
                                style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Ngày
                                Sinh <span style="color:#EE2C2C; font-weight: 600;">*</span></label>
                            <input type="date" name="birthday" id="birthday" required>
                            <span id="birthError" class="error" style="color: red" ;></span>

                        </div>
                        <div class="form-group col-sm-12" style="text-transform: none;">
                            <label for=""
                                style=" font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;"><span
                                    style="color:#EE2C2C; font-weight: 600;">*</span></label>
                            <input type="radio" name="r-gender" id="male-gender" value="1" required>
                            Nam
                            <input type="radio" name="r-gender" id="female-gender" value="0" required>
                            Nữ
                        </div>
                        <div class=" form-group col-sm-12">
                            <label for="mySelect"
                                style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Khu
                                vực <span style="color:#EE2C2C; font-weight: 600;">*</span></label>

                            <select name="selectedCity" id="mySelect">

                            </select>
                            <span id="cityError" class="error" style="color: red" ;></span>

                        </div>

                        <div class="form-group col-sm-12">
                            <label for="Select"
                                style="font-size: 13px; font-family: Verdana, Arial, sans-serif; font-weight: 600;text-transform: none;">Rạp
                                Yêu Thích <span style="color:#EE2C2C; font-weight: 600;">*</span></label>

                            <select name="selectedTheater" id="Select">
                                <span id="cinemaError" class="error" style="color: red" ;></span>

                            </select>

                        </div>
                    </form>

                </div>
                <div class="tab-pane fade show active" id="lich-su-giao-dich" role="tabpanel"
                    aria-labelledby="tab-lich-su">
                    <?php include("view/history.php"); ?>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>

<script>
    navItem = [];
    navItem = document.getElementsByClassName("nav-link");
    navItem.addEventListener("click", function () {
        navItem.style.backgroundColor = "red";
    });

    function openTab(tabId) {
        var tab = document.getElementById(tabId);
        if (tab) {
            tab.click();
        }
    }
</script>