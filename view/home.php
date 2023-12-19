<!-- Content -->
<?php
$sql_listMovie = mysqli_query($mysqli, 'Select * from movies order by movie_id desc');
?>
<div class="content container">
    <div class="content-movie">
        <div class="content-movie-title" style="text-align: center;">
            <img src="img\h3_movie_selection.png" style="max-width: 100%; height: auto; display: inline-block;">
        </div>

        <div class="content-movie-list">

            <div class="slider slider-nav">

                <?php
                while ($row_listMovie = mysqli_fetch_array($sql_listMovie)) {
                ?>
                    <a href="?controller=phim&id=<?php echo $row_listMovie['id'] ?>">
                        <img src="<?php echo $row_listMovie['image'] ?>" alt="" style="height: 450px;">
                    </a>
                <?php
                }
                ?>
            </div>


        </div>




        <div class="content-event-title" style="text-align: center;">
            <img src=" img\event.png" style="  max-width: 100%; height: auto; display: inline-block;">
        </div>
        <div class="content-event">

            <div class="content-event-list">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-3 banner">
                        <a href="">
                            <img src="./img/evleft.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 banner">
                        <a href="">
                            <img src="./img/evcenter.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-3 col-3 banner">
                        <a href="">
                            <img src="./img/evleft.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->