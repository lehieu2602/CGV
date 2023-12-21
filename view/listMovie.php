<!-- Content -->
<?php
$sql_listMovie = mysqli_query($mysqli, 'Select * from movies order by movie_id desc');
$sql_react = mysqli_query($mysqli,'Select * from react order by movie_id desc');
?>
<div class="listMovie-content container">
    <div class="d-flex justify-content-between">
        <h2 class="listMovie-content-title">
            Phim Đang Chiếu
        </h2>
        <div class="d-flex justify-content-end">
            <a class="text-secondary" href="?controller=commingsoon">
                <h4 class="m-0 text-muted">Phim Sắp Chiếu</h4>
            </a>
        </div>
    </div>
    <div class="borderBottom-title"></div>
    <div class="listMovie-content-list">
        <div class="row">
            <?php
            while ($row_listMovie = mysqli_fetch_array($sql_listMovie)) {
                //
                $movie_id = $row_listMovie['movie_id'];
                $sql_react = mysqli_query($mysqli,"SELECT COUNT(*) AS count_records FROM react WHERE movie_id = '$movie_id'");
                $row = mysqli_fetch_assoc($sql_react);
                $count = $row['count_records'];
                if(isset($_SESSION['user']) && $_SESSION['user'] != '') {
                    $sql_user_react = mysqli_query($mysqli, "SELECT COUNT(*) AS count_user_records FROM react WHERE movie_id = '$movie_id' AND user_id = '" . $_SESSION['idUser'] . "'");
                    $row_user_react = mysqli_fetch_assoc($sql_user_react);
                    $count_user = $row_user_react['count_user_records'];
                }

                //
                $myinput = $row_listMovie['movie_date'];
                $sqldate = date('d/m/Y', strtotime($myinput));
                $movieTimestamp = strtotime($myinput);
                $currentTimestamp = time();
                if ($movieTimestamp < $currentTimestamp && $myinput != null) {
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <a href="?controller=phim&id=<?php echo $row_listMovie['movie_id'] ?>">
                            <img class="image-film" src="<?php echo $row_listMovie['movie_img'] ?>" alt="">
                        </a>
                        <!-- <div class="ribon" style="right: -27px;top: -17px;height: 65px;width: 50px;background: url(../img/ribbon-film-final.png) no-repeat scroll 0px 0px transparent;"></div> -->
                        <div class="movie-info">
                            <h5>
                                <?php echo $row_listMovie['movie_name'] ?>
                            </h5>

                            <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Đạo
                                    Diễn:</span> <span class="d">
                                    <?php echo $row_listMovie['movie_directors'] ?>
                                </span></div>
                            <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Khởi
                                    Chiếu:</span> <span class="d">
                                    <?php echo $sqldate ?>
                                </span></div>
                            <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Thời
                                    Lượng:</span> <span class="d">
                                    <?php echo $row_listMovie['movie_time'] ?>
                                </span></div>
                        </div>
                        <div class="movie-btn" >
                            <button type="button" class="btn btn-primary" onclick='window.location.href="?controller=phim&id=<?php echo $row_listMovie["movie_id"] ?> "'>Mua vé</button>                     
                            <?php 
                                if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
                                    
                                    if($count_user == 1) {
                                        ?>
                                            <button type="button" class="btn btn-outline-danger" onclick="unlike('<?php echo $movie_id; ?>', '<?php echo $_SESSION['idUser']; ?>')"> <span>&#10084;</span> <?php echo $count?> </button>
                                        <?php
                                            
                                    } 
                                    if($count_user == 0) {
                                        ?>
                                            <button type="button" class="btn btn-danger" onclick="like('<?php echo $movie_id; ?>', '<?php echo $_SESSION['idUser']; ?>')"><span>&#10084;</span> <?php echo $count ?> </button>
                                        <?php
                                    }
                                } else {
                                    ?>
                                        <button type="button" class="btn btn-primary" onclick="showAlert()"><span>&#10084;</span> <?php echo $count ?> </button>
                                    <?php
                                }  
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<!-- End Content -->