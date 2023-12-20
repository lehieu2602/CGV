<div class="menu container">
    <ul>
        <a href="?controller=allTheater">
            <img src="../img/header-logo-1.png" alt="" />
        </a>
        <a href="?controller=listmovies">
            <img src="../img/header-logo-2.png" alt="" />
        </a>
        <a href="?controller=specialTheater">
            <img src="../img/header-logo-3.png" alt="" />
        </a>
        <a href="">
            <img src="../img/header-logo-4.png" alt="" />
        </a>
        <a href="">
            <img src="../img/header-logo-5.png" alt="" />
        </a>
        <a href="?controller=listnews">
            <img src="../img/header-logo-6.png" alt="" />
        </a>
        <a href="">
            <img src="../img/header-logo-7.png" alt="" />
        </a>
    </ul>
    <hr class="hr-line" />
</div>
<div class="slideshow">
    <div id="demo" class="slideshow-content carousel slide border" data-ride="carousel" data-interval="2500" style="width: 80%; height: 10%; margin-left: 10%;">
        <!-- Indicators -->


        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php
            $counter = 0;
            $sql_slider = mysqli_query($mysqli, 'SELECT * FROM sidleshow ');
            while ($row_slider = mysqli_fetch_array($sql_slider)) {
            ?>
                <a class="carousel-item <?php if ($counter < 1) {
                                            echo " active";
                                        } ?>" href="">
                    <img class="img-silder" src="<?php echo $row_slider['slideshow_img'] ?>" width="900" height="450" style="border-radius: 10px">
                <?php
                $counter++;
            }
                ?>
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>