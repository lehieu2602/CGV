<?php
$sql_listNews = mysqli_query($mysqli, 'Select * from news order by news_id');
?>
<!-- Content -->
<div class="listnews container">
    <div class="listnews-title">

    </div>
    <div class="row">
        <?php
        while ($row_listNews = mysqli_fetch_array($sql_listNews)) {
        ?>
            <div class="col-md-3 col-sm-4 col-4">
                <a href="?controller=newsDetail&id=<?php echo $row_listNews['news_id'] ?>">
                    <img src="<?php echo $row_listNews['news_img'] ?>" alt="">
                    <i class="far fa-calendar-alt"></i>
                    <span><?php echo $row_listNews['date'] ?></span>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="listnews-line">
    </div>
</div>
<!-- End Content   -->