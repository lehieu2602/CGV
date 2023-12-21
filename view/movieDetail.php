<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}
$_SESSION['IDMovie'] = $id;
if (isset($_POST['booking'])) {
    $_SESSION['ticket'] = $_POST['listTicket'];
    $reserved = array();
    $arr = array_map('trim', explode(',', $_SESSION['ticket']));
    foreach ($arr as $seat) {
        $sql_checkReserved = mysqli_query($mysqli, "SELECT * FROM `seat` 
            WHERE `seat_name` = '$seat' and `seat_room` = '" . $_SESSION['idRoom'] . "' and `seat_status` = 1");
        $checkReserved = mysqli_num_rows($sql_checkReserved);
        if ($checkReserved == 1) {
            array_push($reserved, $seat);
        } else {
            $sql_getSeat = mysqli_query($mysqli, "UPDATE `seat` SET `seat_status`= 1 
                WHERE `seat_room`= '" . $_SESSION['idRoom'] . "' and seat_name = '$seat'");
            $sql_insertBookingHis = mysqli_query($mysqli, "INSERT INTO `booking` (`booking_id`, `booking_user`, `booking_movie`, `booking_theater`, `booking_seat`, `booking_ticket`, `booking_time`) 
                VALUES (NULL, '" . $_SESSION['idUser'] . "', '" . $_SESSION['IDMovie'] . "', '" . $_SESSION['theaterName'] . "', '$seat', '" . $_SESSION['ticketName'] . "', NOW())");
        }
    }
    if (empty($reserved)) {
        echo "<script type='text/javascript'>alert('Đặt vé thành công, vui lòng kiểm tra lịch sử đặt vé.');</script>";
    } else {
        $reservedString = implode(", ", $reserved);
        echo "<script type='text/javascript'>alert('Ghế $reservedString. đã có người đặt');</script>";
    }
}

?>
<?php
$sql_detail = mysqli_query($mysqli, "SELECT * FROM movies WHERE movie_id = '$id'");

while ($detail = mysqli_fetch_array($sql_detail)) {
    //
    $movie_id = $detail['movie_id'];
    $sql_react = mysqli_query($mysqli, "SELECT COUNT(*) AS count_records FROM react WHERE movie_id = '$movie_id'");
    $row = mysqli_fetch_assoc($sql_react);
    $count = $row['count_records'];
    if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
        $sql_user_react = mysqli_query($mysqli, "SELECT COUNT(*) AS count_user_records FROM react WHERE movie_id = '$movie_id' AND user_id = '" . $_SESSION['idUser'] . "'");
        $row_user_react = mysqli_fetch_assoc($sql_user_react);
        $count_user = $row_user_react['count_user_records'];
    }
    //
    $myinput = $detail['movie_date'];
    $sqldate = date('d/m/Y', strtotime($myinput))
?>
    <!-- Content -->
    <div class="movie-detail container">
        <div class="title">
            <h3>Nội Dung Phim</h3>
        </div>
        <div class="movie-detail-content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-6">
                    <img src="<?php echo $detail['movie_img'] ?>" alt="">
                </div>
                <div class="col-md-9 col-sm-6 col-6">
                    <h4 class="movie-detail-content-name">
                        <?php echo $detail['movie_name'] ?>
                    </h4>
                    <hr>
                    <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Đạo Diễn:</span>
                        <span>
                            <?php echo $detail['movie_directors'] ?>
                        </span>
                    </div>
                    <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Diễn Viên:</span>
                        <span>
                            <?php echo $detail['movie_cast'] ?>
                        </span>
                    </div>
                    <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Thể Loại:</span>
                        <span>
                            <?php echo $detail['movie_cate'] ?>
                        </span>
                    </div>
                    <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Khởi Chiếu:</span>
                        <span>
                            <?php echo $sqldate ?>
                        </span>
                    </div>
                    <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Thời Lượng:</span>
                        <span>
                            <?php echo $detail['movie_time'] ?>
                        </span>
                    </div>
                    <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Ngôn Ngữ:</span>
                        <span>
                            <?php echo $detail['movie_language'] ?>
                        </span>
                    </div>
                    <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Rated:</span>
                        <span>
                            <?php echo $detail['movie_rate'] ?>
                        </span>
                    </div>
                    <div id="notificationMessage">
                        <button type="button" class="btn btn-danger" data-toggle="modal" <?php if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
                                                                                                echo 'data-target="#myModal"';
                                                                                            } else {
                                                                                                echo 'onclick="showAlert()"';
                                                                                            } ?>>
                            MUA VÉ
                        </button>
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user'] != '') {

                            if ($count_user == 1) {
                        ?>
                                <button type="button" class="btn btn-light" onclick="unlike('<?php echo $movie_id; ?>', '<?php echo $_SESSION['idUser']; ?>')">Like:
                                    <?php echo $count ?>
                                </button>
                            <?php

                            }
                            if ($count_user == 0) {
                            ?>
                                <button type="button" class="btn btn-primary" onclick="like('<?php echo $movie_id; ?>', '<?php echo $_SESSION['idUser']; ?>')">Like:
                                    <?php echo $count ?>
                                </button>
                            <?php
                            }
                        } else {
                            ?>
                            <button type="button" class="btn btn-primary" onclick="showAlert()">Like:
                                <?php echo $count ?>
                            </button>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Chọn suất chiếu</h4>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form id="form2">
                                        <div class="form-group">
                                            <label for="city" style="font-weight: bold;">Thành Phố:</label>
                                            <select id="city" class="form-control" name="city">
                                                <option class="">Chọn Thành Phố</option>
                                                <?php
                                                $sql_listCity = mysqli_query($mysqli, 'SELECT `name`, `id` from `location`');
                                                while ($row_listCity = mysqli_fetch_array($sql_listCity)) {
                                                ?>
                                                    <option id="<?php $string = $row_listCity['id'];
                                                                echo $string ?>" value="<?php echo $row_listCity['id'] ?>">
                                                        <?php

                                                        echo $row_listCity['name'];

                                                        ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="theater " style="font-weight: bold;">Danh Sách Rạp:</label>

                                            <select id="theater" class="form-control" name="theaterName">

                                                <option class="theater <?php
                                                                        $sql_listCityId = mysqli_query($mysqli, 'SELECT`id` from `location`');
                                                                        while ($row_listCityId = mysqli_fetch_array($sql_listCityId)) {
                                                                            echo $row_listCityId['id'] . " ";
                                                                        }

                                                                        ?>">Chọn Rạp</option>
                                                <?php
                                                $firstArr = true;
                                                $lastValue = "";
                                                $sql_listTheater = mysqli_query($mysqli, "SELECT `name`, `id_location`,`id` FROM `cinemas`");
                                                while ($row_listTheater = mysqli_fetch_array($sql_listTheater)) {
                                                    if ($lastValue != $row_listTheater['id_location']) {
                                                        $firstArr = true;
                                                    } else {
                                                        $firstArr = false;
                                                    }
                                                ?>

                                                    <option value="<?php echo $row_listTheater['id'] ?>" class=<?php $string = $row_listTheater['id_location'];
                                                                                                                echo '"theater ' . $string . '"';
                                                                                                                $lastValue = $row_listTheater['id_location']; ?>><?php echo $row_listTheater['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="showings" style="font-weight: bold;">Xuất Chiếu:</label>
                                            <select id="showings" class="form-control" name="showings">
                                                <?php
                                                $sql_show = mysqli_query($mysqli, "SELECT * FROM `schedule`, `cinemas`, `rooms`,`movies` WHERE showings_room = room_id and showings_name_movie = movie_id and room_theater = cinemas.id and movie_id = '$id'");
                                                while ($row_show = mysqli_fetch_array($sql_show)) {
                                                ?>
                                                    <option class="<?php $theater = preg_replace('/\s+/', '', $row_show['name']);
                                                                    $city = preg_replace('/\s+/', '', $row_show['id_location']);
                                                                    echo "$theater $city"; ?>" value="<?php echo $row_show['showings_room'] ?>">
                                                        <?php echo $row_show['showings_time'] ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="id-movies"></div>
                                        <button type="submit" class="btn btn-primary">Đăng ký giữ ghế</button>
                                    </form>
                                    <div class="mapTheater" id="mapTheater" style="padding: 0; margin-top: 15px"></div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="movie-detail-content-summary">
                <div>
                    <?php echo $detail['movie_description'] ?>
                </div>
                <div class="trailer" style="text-align: center">
                    <h4>Trailer</h4>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="<?php echo $detail['movie_trailer'] ?>" frameborder="0" allowfullscreen class="embed-responsive-item"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
<?php
}
?>


<!-- <script>
    // Lấy reference đến select element
    var selectElement = document.getElementById('city');
    var selectTheater = document.getElementById('theater')
    // Thêm event listener cho sự kiện change
    selectElement.addEventListener('change', function() {
        // Lấy giá trị của option được chọn
        var selectedValue = selectElement.value;
        console.log("Select: " + selectedValue);

        // Hiển thị thông báo với giá trị được chọn
        var listTheater = document.getElementsByClassName("theater");
        for (var i = 0; i < listTheater.length; i++) {
            listTheater[i].style.display = "none";
        }
        selectTheater.value = "Chọn Rạp";

        // for(int i=0; i<listTheater.length;i++) {
        //     listTheater[i].style.display = "none";
        // };
        var listTheaterShow = document.getElementsByClassName("theater " + selectedValue);
        for (var i = 0; i < listTheaterShow.length; i++) {
            listTheaterShow[i].style.display = "block";
        };

    });
    selectTheater.addEventListener('click')
</script> -->