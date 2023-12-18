<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>



<div class="content container" style="background-color: #363636; border-radius: 10px; margin-top: 2%;">
        <div class="content-movie">

                <div class="content-event">

                        <div class="content-event-list">
                                <div class="row">

                                        <div class="theatre-list product-view">
                                                <div class="theatre-city-tabs cgv-showtime-center">
                                                        <div class="content-list-cinema">
                                                                <div class="title-cgv-cinema">
                                                                        <h1>CGV CINEMAS</h1>
                                                                </div>
                                                                <div>
                                                                        <div class="cinemas-area">
                                                                                <ul style="list-style-type: none;">
                                                                                        <?php
                                                                                        $sql_listCity = mysqli_query($mysqli, 'Select * from location');
                                                                                        while ($city = mysqli_fetch_array($sql_listCity)) {
                                                                                                $id = $city['id'];
                                                                                                $name = $city['name'];
                                                                                                echo ("<li><span id=" . $id . ">" . $name . "</span></li>");
                                                                                        }
                                                                                        ?>
                                                                                </ul>
                                                                        </div>
                                                                </div>
                                                                <div class="cinemas-list">
                                                                        <ul class="nav nav-pills " style=" list-style-type: none;" role="tablist">

                                                                                <?php

                                                                                $sql_listTheater = mysqli_query($mysqli, 'Select * from cinemas');
                                                                                while ($row_listTheater = mysqli_fetch_array($sql_listTheater)) {
                                                                                        $id = $row_listTheater['id'];
                                                                                        $name = $row_listTheater['name'];
                                                                                        $city = $row_listTheater['id_location'];

                                                                                        echo '<li class="nav-item ' . $city . ' cgv_theater" style="display: none;"><span class="nav-link" id="' . $id . '" >' . $name . '</span></li>';
                                                                                }
                                                                                ?>

                                                                        </ul>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="cgv-showtime-bottom"></div>
                                        </div>


                                </div>
                        </div>

                        <div id="loading-mask" style="left: -2px; top: 50%; display: block;">
                                <p class="loader" id="loading_mask_loader">
                                        <img src="img\ajax-loader.gif" alt="Loading...">
                                        <br>Đang tải thông tin...
                                </p>
                        </div>


                        <script type="text/javascript">
                                $j(window).load(function() {
                                        var city = $j('.cinemas-area li span').filter('.siteactive').attr('id');

                                        $j('.cinemas-list .' + city).show();

                                        $j('.cinemas-area li').click(function() {
                                                $j('.cinemas-list li').hide();

                                                var city = $j(this).find('span').attr('id');

                                                $j('.cinemas-list .' + city).show();
                                        });

                                        $j(".carousel").carousel();
                                        $j('#loading-mask').hide();
                                });

                                (function($j) {
                                        $j.fn.carousel = function(options) {
                                                return this.each(function() {
                                                        var $element = $j(this),
                                                                $element_count = 0;
                                                        $element.find("> div").css("overflow", "hidden");
                                                });
                                        };
                                })(jQuery);
                        </script>
                </div>
        </div>
</div>

<div id="wishlist_edit_action_container"></div>

<div class="tab-content">
        <?php
        $sql_listTheater = mysqli_query($mysqli, 'Select * from cinemas');
        while ($row_listTheater = mysqli_fetch_array($sql_listTheater)) {
                $id = $row_listTheater['id'];
                $city = $row_listTheater['id_location'];
                $name = $row_listTheater['name'];
                $imgs = $row_listTheater['img'];
                $info = $row_listTheater['address_info'];
                echo ' <div class="theater-container product-view" id="show-theater-' . $id . '" style=" display: none;">
                        <div class="heater-head">
                                <div class="theatertitle" style="text-align: center;">
                                        <img src="img\theater.jpg" style="max-width: 100%; height: auto; display: inline-block;"></img>

                                </div>
                                <div class="page-title theater-title" style="text-align: center; margin-top: 2%;">
                                        <h2 style="color:dimgray ; font-family: Arial, Helvetica, sans-serif;">' . $name . '</h2>
                                </div>
                        </div>
                        <div id="myCarousel-' . $id . '" class="carousel carousel-fade slide border" data-ride="carousel" style="width: 80%; margin-left: 10%;">
                                <div class="carousel-inner">';
                echo gettype(json_encode($imgs));
                $trimmedString = trim($imgs, '[]');

                // Split the string into an array using the comma as a delimiter
                $arrayOfStrings = explode(', ', $trimmedString);

                // Trim each element in the array to remove any extra spaces
                $arrayOfStrings = array_map('trim', $arrayOfStrings);

                // Print the resulting array
                // print_r($arrayOfStrings);
                foreach ($arrayOfStrings as $index => $img) {
                        $activeClass = ($index === 0) ? "active" : "";


                        echo ' <div class="carousel-item ' . $activeClass . '">
                                <img class="d-block w-100" src=' . $img . '>
                        </div>';
                }
                echo '<div class="carousel-caption">
                                                <div class=" theater-address">' . $info . '</div>
                                                <div class="fax"><label style="font-weight: bold;font-family:';
                echo " 'Arial'";
                echo ', sans-serif;">Fax : </label>
                                                        <div class="fax-input" style="display: inline;"> +84 4 6 275 5240</div>
                                                </div>
                                                <div class="hotline"><label style="font-weight: bold;font-family: ';
                echo "'Arial'";
                echo ', sans-serif;">Hotline : </label>
                                                        <div class="fax-input" style="display: inline;"> 1900 6017</div>
                                                </div>
                                        </div>
                                </div>

                                <a class="carousel-control-prev" href="#myCarousel-' . $id . '" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel-' . $id . '" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                </a>
                        </div>

                </div>';
        }
        ?>
</div>



<script>
        var show = document.getElementsByClassName("theater-container");

        var nameTheater = document.getElementsByClassName("nav-link");
        console.log("nameTheater: " + nameTheater);
        Array.from(nameTheater).forEach(function(element) {
                element.addEventListener('click', function() {
                        // Xử lý sự kiện tại đây
                        for (var i = 0; i < show.length; i++) {
                                show[i].style.display = "none";
                        }
                        var theater = document.getElementById("show-theater-" + element.id);
                        theater.style.display = "block";
                        console.log("Đã click vào phần tử có id:", element.id);
                });
        });
</script>