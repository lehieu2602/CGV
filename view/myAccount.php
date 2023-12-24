<div class="my-main-container">
    <div class="my-container">
        <div class="left-col col-3">
            <div class="head-left">TÀI KHOẢN CGV</div>
            <ul class="nav nav-pills flex-column" id="myPill" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="tab-thong-tin" data-toggle="tab" href="#thong-tin-chung" role="tab">
                        THÔNG TIN CHUNG
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-chi-tiet" data-toggle="tab" href="#chi-tiet-tai-khoan" role="tab">
                        CHI TIẾT TÀI KHOẢN
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link " id="tab-lich-su" data-toggle="tab" href="#lich-su-giao-dich" role="tab">
                        LỊCH SỬ GIAO DỊCH
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link " id="tab-change-password" data-toggle="tab" href="#change-password" role="tab">
                        THAY ĐỔI MẬT KHẨU
                    </button>
                </li>
            </ul>
        </div>
        <div class="right-col col-9">
            <div class="tab-content" id="myPillContent">
                <div class="tab-pane fade show active" id="thong-tin-chung" role="tabpanel" aria-labelledby="tab-thong-tin">
                    <br>
                    <div class="title-header-black">
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
                                            <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/bg-cgv/icon-profile-cgv.png" width="120" height="120" alt="Avatar Profile">
                                        </label>
                                    </div>
                                    <div class="info-center">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-4">
                                    <br>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="info-center">
                                        <strong>Thẻ thành viên</strong>
                                    </div>
                                    <div class="info-center" style="text-align: center;">
                                        <?php echo $_SESSION['idUser'] ?>
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

                    <div class="contact">
                        <h4 style="font-weight: bolder;">Thông tin tài khoản</h4>
                        <hr style="border: none;border-top: 1px solid #ccc;">
                        <span>
                            <h5>LIÊN HỆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre><button type="button" class="btn btn-outline-secondary" onclick="openTab('tab-chi-tiet')">
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

                    </div>
                </div>
                <div class="tab-pane fade" id="chi-tiet-tai-khoan" role="tabpanel" aria-labelledby="tab-chi-tiet">
                    <?php include("view/accountDetail.php") ?>
                </div>
                <div class="tab-pane fade " id="lich-su-giao-dich" role="tabpanel" aria-labelledby="tab-lich-su">
                    <?php include("view/history.php"); ?>
                </div>
                <div class="tab-pane fade " id="change-password" role="tabpanel" aria-labelledby="tab-change-password">
                    <?php include("view/changePassword.php"); ?>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->

<script>
    navItem = [];
    navItem = document.getElementsByClassName("nav-link");
    navItem.addEventListener("click", function() {
        navItem.style.backgroundColor = "red";
    });

    function openTab(tabId) {
        var tab = document.getElementById(tabId);
        if (tab) {
            tab.click();
        }
    }
</script>