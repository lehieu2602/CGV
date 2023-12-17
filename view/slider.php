<div class="slideshow">
    <div id="demo" class="slideshow-content carousel slide border" data-ride="carousel" style="width: 80%; height: 10%; margin-left: 10%;">
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
                    <img class="img-silder" src="<?php echo $row_slider['slideshow_img'] ?>" width="900" height="450">
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