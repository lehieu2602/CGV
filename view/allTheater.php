<?php
include_once("db\connect.php");
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Site</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="./css/main.css">



        <link rel="shortcut icon" href="img\cgvcinemas-vietnam-favicon.ico" type="image/x-icon" />

        <script>
                var $j = jQuery.noConflict();
        </script>
        <script type="text/javascript" src="js\jquery.colorbox.js"></script>

        <style>
                .title-cgv-cinema {
                        text-align: center;
                }

                .title-cgv-cinema h1 {
                        color: #717171;
                        font-size: 48px;
                        font-weight: bold;
                        text-shadow: 2px 2px 2px #b9b9b9;

                }

                .title-cgv-cinema h1 {
                        font-size: 36px;
                }

                .cinemas-area li span:hover,
                .cinemas-list li span:hover {
                        color: #e71a0f;
                }

                .cinemas-list li.current span,
                .cinemas-list li.current span {
                        background: #e71a0f;
                        border-radius: 5px;
                        padding: 5px;
                }

                .cinemas-area li span,
                .cinemas-list li span {
                        cursor: pointer;
                }

                .cinemas-area ul li span,
                .cinemas-list ul li span {
                        color: #dbdbdb;
                        font-size: 14px;
                }

                .cinemas-area ul li,
                .cinemas-list ul li {
                        float: left;
                        margin-top: 15px;
                        width: 20%;
                }

                .cinemas-area ul,
                .cinemas-list ul {
                        float: left;
                        width: 100%;
                }

                .cinemas-area,
                .cinemas-list {
                        float: left;
                        width: 100%;
                        border-bottom: 2px solid #727171;
                        border-top: 2px solid #727171;
                        padding: 6px 10px 15px;
                }

                .cinemas-area ul li,
                .cinemas-list ul li {
                        padding-right: 2%;
                }

                #loading-mask {
                        background: transparent url(https://www.cgv.vn/skin/adminhtml/default/enterprise/images/blank.gif) repeat scroll 0% 0%;
                        position: fixed;
                        color: #D85909;
                        font-size: 1.1em;
                        font-weight: bold;
                        text-align: center;
                        opacity: 0.8;
                        z-index: 500;
                        width: 100%;
                        height: 100%;
                        display: none;
                }

                .cinemas-list li.current span,
                .cinemas-list li.current span {
                        background: #e71a0f;
                        border-radius: 5px;
                        padding: 5px;
                }

                .cinemas-list {
                        float: left;
                        width: 100%;
                        /*background: #444242;*/
                        padding: 0 0 15px 0;
                }

                .cinemas-list ul {
                        float: left;
                        padding: 0px 10px;
                        width: 100%;
                }

                .cinemas-list ul li {
                        float: left;
                        margin-top: 15px;
                        width: 25%;
                }

                .cinemas-list ul li span {
                        color: #dbdbdb;
                        font-size: 12px;
                }

                /* html {
                        font-family: sans-serif;
                        
                        -webkit-text-size-adjust: 100%;
                        
                        -ms-text-size-adjust: 100%;
                        
                }

                body {
                        margin: 0;
                        background-color: #FFFFF0;
                }

                html {
                        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                        
                        -webkit-text-size-adjust: 100%;
                        
                } */

                .cinemas-list li {
                        font-size: 16px;
                        margin-left: 3.6%;
                }

                .mySlides {
                        display: none;
                }

                .theater-infomation {
                        background: url(../images/bg-box-content-info-theater.png) repeat scroll 0 0 rgba(0, 0, 0, 0);
                        bottom: 0px;
                        color: #fdfcf0;
                        display: block;
                        left: 0px;
                        min-height: 70px;
                        padding: 15px 15px;
                        position: absolute;
                        width: 100%;
                        z-index: 125;
                }

                .theater-infomation .left-info-theater {
                        float: left;
                        width: 68%;
                }

                .theater-infomation .left-info-theater .theater-left-content {
                        font-size: 11px;
                        overflow: hidden;
                        padding-right: 20px;
                }

                .theater-infomation .theater-left-content .screentype {
                        overflow: hidden;
                        padding-top: 5px;
                }

                .theater-infomation .theater-left-content .screentype a {
                        display: block;
                        float: left;
                        height: 17px;
                        margin: 0 5px 10px 0;
                        width: 82px;
                }



                .my-slide-show {


                        overflow: hidden;
                        width: 980px;




                }

                .list-image {
                        display: flex;
                        transition: 0.5s;

                }

                /* body {

                        display: flex;
                        align-items: center;
                        justify-content: center;
                } */

                /* .btns {
                        font-size: 500px;
                        color: #999;
                        position: absolute;
                        top: 50%;
                        transform: translateY(-50%);
                } */
                .theater-gallery {
                        position: relative;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                }

                .theater-left-content {
                        bottom: 0.1%;
                        position: absolute;
                        color: aliceblue;
                        width: 64%;
                        background-color: rgba(0, 0, 0, 0.5);
                        margin-bottom: 0px;

                }
        </style>



</head>

<body>


        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <script src="./js/index.js"></script>
        <script src="./js/listTheater.js"></script>
        <script src="./js/movieD.js"></script>
        <script src="./js/userInfo.js"></script>


        <div class="content container" style="background-color: #363636; border-radius: 10px;">
                <div class="content-movie">

                        <div class="content-event">
                                <!-- <div class="title-cgv-cinema">
                    <h1>CGV CINEMAS</h1>
                </div> -->
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
                                                                                        $sql_listTheater = mysqli_query($mysqli, 'select cinemas.id, cinemas.name ,location.name as theaters_city from cinemas join location on cinemas.id_location = location.id');
                                                                                        while ($row_listTheater = mysqli_fetch_array($sql_listTheater)) {
                                                                                                $id = $row_listTheater['id'];
                                                                                                $city = $row_listTheater['theaters_city'];
                                                                                                $name = $row_listTheater['name'];

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

                <div class="tab-content">
                        <?php
                        $sql_listTheater = mysqli_query($mysqli, 'Select * from theaters');
                        while ($row_listTheater = mysqli_fetch_array($sql_listTheater)) {
                                $id = $row_listTheater['theaters_id'];
                                $city = $row_listTheater['theaters_city'];
                                $name = $row_listTheater['theaters_name'];
                                $img1 = $row_listTheater['theater_img1'];
                                $img2 = $row_listTheater['theater_img2'];
                                $img3 = $row_listTheater['theater_img3'];
                                $img4 = $row_listTheater['theater_img4'];
                                $info = $row_listTheater['theater_info'];
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
                                <div class="carousel-inner">
                                        <div class="carousel-item active">
                                                <img class="d-block w-100" src="' . $img1 . '">

                                        </div>
                                        <div class="carousel-item">
                                                <img class="d-block w-100" src="' . $img2 . '">

                                        </div>
                                        <div class="carousel-item">
                                                <img class="d-block w-100" src="' . $img3 . '">

                                        </div>
                                        <div class="carousel-item">
                                                <img class="d-block w-100" src="' . $img4 . '">


                                        </div>
                                        <div class="carousel-caption">
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

                                <a class="carousel-control-prev" href="#myCarousel-cgv_site_037" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel-cgv_site_037" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                </a>
                        </div>

                </div>';
                        }
                        ?>
                </div>
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






</body>

</html>