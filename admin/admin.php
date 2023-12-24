<?php
include_once("../db/connect.php");
session_start();

function uploadImgToFolder($valueTmp)
{
    $client_id = '2a2b91046de3a83';

    $file = file_get_contents($valueTmp);

    $url = 'https://api.imgur.com/3/image.json';
    $headers = array("Authorization: Client-ID $client_id");
    $pvars = array('image' => base64_encode($file));

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_POST => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $pvars
    ));

    $json_returned = curl_exec($curl); // blank response
    $jsonDecode = json_decode($json_returned, true);
    $link = array_column($jsonDecode, 'link');
    $linkPicture =  $link[0];
    curl_close($curl);
    return $linkPicture;
}
if (isset($_POST['deleteRowEvent'])) {
    $idRowNews =  $_POST['idRowNews'];
    $sql_deleteShowing = mysqli_query($mysqli, "DELETE FROM `news` WHERE `news_id` = '$idRowNews'");
    echo "<script type='text/javascript'>alert('Xóa sự tin tức/ sự kiện thành công');</script>";
}
if ((isset($_POST['addNews']))) {
    $nameNewsAdd = $_POST['nameNewsAdd'];
    $decriptionNewsAdd = $_POST['decriptionNewsAdd'];

    if ($_FILES['imgSNewsAdd']['tmp_name'] == '' || $_FILES['imgLNewsAdd']['tmp_name'] == '') {
        echo "<script type='text/javascript'>alert('Vui lòng chọn ảnh cho sự kiện');</script>";
    } else {
        $imgSNewsAdd = uploadImgToFolder($_FILES['imgSNewsAdd']['tmp_name']);
        $imgLNewsAdd = uploadImgToFolder($_FILES['imgLNewsAdd']['tmp_name']);
        if ($imgSNewsAdd == '../img/' || $imgLNewsAdd == '../img/' || ($imgSNewsAdd == '../img/' && $imgLNewsAdd == '../img/')) {
            echo "<script type='text/javascript'>alert('Vui lòng chọn ảnh cho sự kiện');</script>";
        } else {
            $sql_editEvent = mysqli_query($mysqli, "INSERT INTO `news`(`news_title`, `news_img`, `news_img_detail`, `news_content`) 
                VALUES ('$nameNewsAdd','$imgSNewsAdd','$imgLNewsAdd','$decriptionNewsAdd')");
            echo "<script type='text/javascript'>alert('Thêm mới tin tức/ sự kiện thành công');</script>";
        }
    }
}

if (isset($_POST['eventEdit'])) {
    $idNewsEdit = $_POST['idNewsEdit'];
    $nameNewsEdit = $_POST['nameNewsEdit'];
    $decriptionNewsEdit = $_POST['decriptionNewsEdit'];
    $imgSNewsEdit = '';
    $imgLNewsEdit = '';

    if ($_FILES['imgSNewsEdit']['tmp_name'] != '') {
        $imgSNewsEdit = uploadImgToFolder($_FILES['imgSNewsEdit']['tmp_name']);
    }

    if ($_FILES['imgLNewsEdit']['tmp_name'] != '') {
        $imgLNewsEdit = uploadImgToFolder($_FILES['imgLNewsEdit']['tmp_name']);
    }

    if ($imgSNewsEdit == '' && $imgLNewsEdit != '') {
        $sql_editEvent = mysqli_query($mysqli, "UPDATE `news` SET 
        `news_title`='$nameNewsEdit',`news_img_detail`='$imgLNewsEdit',`news_content`='$decriptionNewsEdit' WHERE `news_id` = '$idNewsEdit' ");
    } else if ($imgSNewsEdit == '' && $imgLNewsEdit == '') {
        $sql_editEvent = mysqli_query($mysqli, "UPDATE `news` SET 
            `news_title`='$nameNewsEdit',`news_content`='$decriptionNewsEdit' WHERE `news_id` = '$idNewsEdit' ");
    } else if ($imgLNewsEdit == '') {
        $sql_editEvent = mysqli_query($mysqli, "UPDATE `news` SET 
            `news_title`='$nameNewsEdit',`news_img`='$imgSNewsEdit',`news_content`='$decriptionNewsEdit' WHERE `news_id` = '$idNewsEdit' ");
    } else {
        $sql_editEvent = mysqli_query($mysqli, "UPDATE `news` SET 
            `news_title`='$nameNewsEdit',`news_img`='$imgSNewsEdit',`news_img_detail`='$imgLNewsEdit',`news_content`='$decriptionNewsEdit' WHERE `news_id` = '$idNewsEdit' ");
    }
}
if (isset($_POST['FilmEdit'])) {
    $idFilmEdit = $_POST['idFilmEdit'];
    $filmNameEdit = $_POST['filmNameEdit'];
    $directorEdit = $_POST['directorEdit'];
    $actorEdit = $_POST['actorEdit'];
    $categoryFilmEdit = $_POST['categoryFilmEdit'];
    $dateEdit = $_POST['dateEdit'];
    $timeEdit = $_POST['timeEdit'];
    $languageEdit = $_POST['languageEdit'];
    $rateEdit = $_POST['rateEdit'];
    $decriptionEdit = $_POST['decriptionEdit'];
    $trailerEdit = $_POST['trailerEdit'];
    $searchEdit     = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
    $replaceEdit    = "youtube.com/embed/$1";
    $urlEdit = preg_replace($searchEdit, $replaceEdit, $trailerEdit);
    $posterEdit = '';

    if ($_FILES['posterEdit']['tmp_name'] == '') {
        $sql_editFilm = mysqli_query($mysqli, "UPDATE `movies` 
        SET `movie_name`='$filmNameEdit',`movie_directors`='$directorEdit',`movie_cast`='$actorEdit',`movie_cate`='$categoryFilmEdit',
        `movie_date`='$dateEdit',`movie_time`='$timeEdit',`movie_language`='$languageEdit',`movie_rate`='$rateEdit',
        `movie_description`='$decriptionEdit',`movie_trailer`='$urlEdit' WHERE `movie_id`= '$idFilmEdit'");
        echo "<script type='text/javascript'>alert('Chỉnh sửa thông tin phim thành công');</script>";
    } else {
        $posterEdit = uploadImgToFolder($_FILES['posterEdit']['tmp_name']);
        $sql_editFilm = mysqli_query($mysqli, "UPDATE `movies` 
        SET `movie_name`='$filmNameEdit',`movie_directors`='$directorEdit',`movie_cast`='$actorEdit',`movie_cate`='$categoryFilmEdit',
        `movie_date`='$dateEdit',`movie_time`='$timeEdit',`movie_language`='$languageEdit',`movie_rate`='$rateEdit',`movie_img`='$posterEdit',
        `movie_description`='$decriptionEdit',`movie_trailer`='$urlEdit' WHERE `movie_id`= '$idFilmEdit'");
        echo "<script type='text/javascript'>alert('Chỉnh sửa thông tin phim thành công');</script>";
    }
}
if (isset($_POST['deleteRowMovie'])) {
    $idRowMovie =  $_POST['idRowMovie'];
    $sql_deleteShowing = mysqli_query($mysqli, "DELETE FROM `movies` WHERE `movie_id` = '$idRowMovie'");
    echo "<script type='text/javascript'>alert('Xóa phim thành công');</script>";
}
if (isset($_POST['addShowing'])) {
    $addShowMovieName = $_POST['addShowingName'];
    $addShowRoom = $_POST['addShowingRoom'];
    $addShowTheaterName = $_POST['addShowingTheater'];
    $addShowTime = $_POST['addShowingTime'];
    $sql_roomShowing = mysqli_query($mysqli, "Select * from `rooms` where `room_name` = '$addShowRoom' and `room_theater`='$addShowTheaterName';");
    while ($row_room = mysqli_fetch_array($sql_roomShowing)) {
        $total_seat = $row_room['number_seat'];
        $total_row_seat = ceil($total_seat / 10);
        $remaining_seats = $total_seat;

        $id_room = $row_room['room_id'];
        for ($i = 1; $i <= $total_row_seat; $i++) {
            $char = chr(ord('A') + $i - 1);

            if ($remaining_seats >= 10) {
                $total_row_seat = 10;
                $remaining_seats -= 10;
            } else {
                $total_row_seat = $remaining_seats;
            }

            for ($j = 1; $j <= $total_row_seat; $j++) {
                $seat_name = $char . $j;
                $sql_addNewSeat = mysqli_query($mysqli, "INSERT INTO seat
                (seat_row, seat_room, seat_name, seat_status, seat_movie_id)
                VALUES('$i', '$id_room', '$seat_name', 0, '$addShowMovieName');");
            }
        }

        $sql_addNewShowing = mysqli_query($mysqli, "INSERT INTO `schedule`(`showings_name_movie`, `showings_room`, `showings_time`)
        VALUES ('$addShowMovieName','$id_room','$addShowTime')");
    }
}

if (isset($_POST['deleteRowShowings'])) {
    $idShowingDelete =  $_POST['idRowShowing'];
    $sql_deleteShowing = mysqli_query($mysqli, "DELETE FROM `schedule` WHERE `showings_id` = '$idShowingDelete'");
    echo "<script type='text/javascript'>alert('Xóa suất chiếu thành công');</script>";
}
if (isset($_POST['updateShowing'])) {
    $time = $_POST['editTimeShow'];
    $idShowing = $_POST['idShowUpdate'];
    $sql_updateShowing = mysqli_query($mysqli, "UPDATE `schedule` SET `showings_time` = '$time' WHERE `schedule`.`showings_id` = '$idShowing';");
    echo "<script type='text/javascript'>alert('Cập nhật suất chiếu thành công');</script>";
}
if (!isset($_SESSION['admin_name'])) {
    header("Location: adminLogin.php");
}
if (isset($_POST['addNewFilm'])) {
    $filmName = $_POST['filmName'];
    $director = $_POST['director'];
    $actor = $_POST['actor'];
    $categoryFilm = $_POST['categoryFilm'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $language = $_POST['language'];
    $rate = $_POST['rate'];
    $decription = $_POST['decription'];
    $trailer = $_POST['trailer'];
    $search     = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
    $replace    = "youtube.com/embed/$1";
    $url = preg_replace($search, $replace, $trailer);

    if ($_FILES['posterEdit']['tmp_name'] == '') {
        echo "<script type='text/javascript'>alert('Vui lòng chọn poster cho phim');</script>";
    } else {
        $poster = uploadImgToFolder($_FILES['posterEdit']['tmp_name']);
        if ($poster == '') {
            echo "<script type='text/javascript'>alert('Vui lòng chọn poster cho phim');</script>";
        } else {
            $sql_insertFilm = mysqli_query($mysqli, "INSERT INTO `movies`(`movie_name`, `movie_directors`, `movie_cast`, `movie_cate`, `movie_date`, `movie_time`, `movie_language`, `movie_rate`, `movie_img`, `movie_description`, `movie_trailer`) 
            VALUES ('$filmName','$director','$actor','$categoryFilm','$date','$time','$language','$rate','$poster','$decription','$url')");
        }
    }
}
if (isset($_GET['adminSignOut'])) {
    session_destroy();
    header('location: adminLogin.php');
}
if (isset($_POST['regAdmin'])) {
    $mailAdmin = $_POST['inputEmail'];
    $passwordAdmin = md5($_POST['inputPassword']);

    $sql_check = mysqli_query($mysqli, "SELECT * FROM `admin` WHERE `user` = '$mailAdmin'");
    $countCheck = mysqli_num_rows($sql_check);
    if ($countCheck == 0) {
        $sql_registerAdmin = mysqli_query($mysqli, "INSERT INTO `admin` (`user`, `password`) 
            VALUES ('$mailAdmin', '$passwordAdmin')");
        $sql_checkRegAdmin = mysqli_query($mysqli, "SELECT * FROM `admin` WHERE `user` = '$mailAdmin'");
        $count = mysqli_num_rows($sql_checkRegAdmin);
        if ($count > 0) {
            echo "<script type='text/javascript'>alert('Đăng Ký Tài Khoản Thành Công');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Tên Đăng Nhập Đã Tồn Tại');</script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CGV Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="../summernote-0.8.16-dist/summernote.min.js"></script>
    <link href="../summernote-0.8.16-dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../fontawesome-free-5.13.0-web/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="row" id="parent-row">
        <div class="col-md-2" style="background:rgb(78,115,223);">
            <div class="container tabBarLeft">
                <div class="tabBarLeft-logo">cgv admin</div>
                <hr>
                <a href="" class="tabBarLeft-menu">
                    <i class="fa fa-desktop"></i>
                    <span class="tabBarLeft-menu-title">DashBoard</span>
                </a>
                <hr>
                <div class="tabBarLeft-cate">Quản lý chung</div>
                <a href="#" class="tabBarLeft-menu list-movies-admin">
                    <i class="fa fa-film"></i>
                    <span class="tabBarLeft-menu-title">Danh sách phim</span>
                </a>
                <a href="#" class="tabBarLeft-menu list-showings">
                    <i class="far fa-calendar-alt"></i>
                    <span class="tabBarLeft-menu-title">Danh sách lịch chiếu</span>
                </a>
                <a href="#" class="tabBarLeft-menu list-events">
                    <i class="fas fa-icons"></i>
                    <span class="tabBarLeft-menu-title">Danh sách sự kiện</span>
                </a>
                <hr>
                <div class="tabBarLeft-cate">Quản lý người dùng</div>
                <a href="#" class="tabBarLeft-menu list-admins">
                    <i class="fas fa-users-cog"></i>
                    <span class="tabBarLeft-menu-title">Quản trị viên</span>
                </a>
                <a href="#" class="tabBarLeft-menu list-user">
                    <i class="fas fa-users"></i>
                    <span class="tabBarLeft-menu-title">Khách hàng</span>
                </a>
            </div>
        </div>
        <div class="col-md-10 tabBarRight padding-0" style="background-color: rgb(247,248,251);">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <div class="nav-item dropdown ml-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['admin_name']; ?> </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="?adminSignOut=true"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
                    </div>
                </div>
            </nav>
            <main class="mainContent ml mr" id="mainContent">
                <h3 class="mainContent-title">DashBoard</h3>
                <div class="row card-list">
                    <div class="col-md-3">
                        <div class="card shadow" style="border-left: .25rem solid #4e73df;border-radius: 0.36rem">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#4e73df ">Doanh Thu</h5>
                                <?php
                                $sql_revenue = mysqli_query($mysqli, "select sum(seat.seat_cost) from seat where seat_status = 1;");
                                while ($row_revenue = mysqli_fetch_array($sql_revenue)) {
                                    echo '<p class="card-text">' . $row_revenue[0] . ' VNĐ</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow" style="border-left: .25rem solid #1cc88a;border-radius: 0.36rem">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#1cc88a ">Số Rạp Toàn Quốc</h5>
                                <?php
                                $sql_countTheater = mysqli_query($mysqli, "SELECT * FROM `cinemas`");
                                $countTheater = mysqli_num_rows($sql_countTheater);
                                ?>
                                <p class="card-text"><?php echo "$countTheater rạp" ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow" style="border-left: .25rem solid #36b9cc;border-radius: 0.36rem">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#36b9cc ">Số Khách Hàng</h5>
                                <?php
                                $sql_countCus = mysqli_query($mysqli, "SELECT * FROM `users`");
                                $countCus = mysqli_num_rows($sql_countCus);
                                ?>
                                <p class="card-text"><?php echo "$countCus Người" ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow" style="border-left: .25rem solid #f6c23e;border-radius: 0.36rem">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#f6c23e ">Tổng Số Vé Đã Bán</h5>
                                <?php
                                $sql_countTicket = mysqli_query($mysqli, "SELECT * FROM `booking`");
                                $countTicket = mysqli_num_rows($sql_countTicket);
                                ?>
                                <p class="card-text"><?php echo "$countTicket Vé" ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chart row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">Biểu đồ thống kê số vé đã bán</div>
                            <div class="card-body">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="admin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
    </script>
</body>

</html>