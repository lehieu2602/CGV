<div class="my-main-container">
    <div class="my-container">

        <div class="left-col col-3">
            <div class="head-left" Style="color: red; font-size: x-large;"><strong>TÀI KHOẢN CGV</strong></div>


            <ul class="nav nav-pills flex-column" id="myPill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link " id="tab-thong-tin" data-toggle="tab" href="#thong-tin-chung" role="tab">
                        <strong>THÔNG TIN CHUNG</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-chi-tiet" data-toggle="tab" href="#chi-tiet-tai-khoan" role="tab">
                        <strong>CHI TIẾT TÀI KHOẢN</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="tab-lich-su" data-toggle="tab" href="#lich-su-giao-dich" role="tab">
                        <strong>LỊCH SỬ GIAO DỊCH</strong>
                    </a>
                </li>
            </ul>



        </div>
        <div class="right-col col">
            <div class="tab-content" id="myPillContent">
                <div class="tab-pane fade" id="thong-tin-chung" role="tabpanel" aria-labelledby="tab-thong-tin">
                    THÔNG TIN CHUNG
                </div>
                <div class="tab-pane fade" id="chi-tiet-tai-khoan" role="tabpanel" aria-labelledby="tab-chi-tiet">
                    CHI TIẾT TÀI KHOẢN
                </div>
                <div class="tab-pane fade show active" id="lich-su-giao-dich" role="tabpanel" aria-labelledby="tab-lich-su">
                    LỊCH SỬ GIAO DỊCH
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
    navItem = [];
    navItem = document.getElementsByClassName("nav-link");
    navItem.addEventListener("click", function() {
        navItem.style.backgroundColor = "red";
    });
</script>