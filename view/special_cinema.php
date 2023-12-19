<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/special_cinema.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <title>Document</title>
</head>

<body>
    <div class="list-cinema container">
        <a class="cinema" id="cinema1" href="#" onclick="changeImageColor(1, 'structure2')"><img id="img1" src="../img/cgv-cine-1.png" alt="" /></a>
        <a class="cinema" id="cinema2" href="#" onclick="changeImageColor(2, 'structure2')"><img id="img2" src="../img/cgv-cine-2.png" alt="" /></a>
        <a class="cinema" id="cinema3" href="#" onclick="changeImageColor(3,'structure2')"><img id="img3" src="../img/cgv-cine-3.png" alt="" /></a>
        <a class="cinema" id="cinema4" href="#" onclick="changeImageColor(4, 'structure1')"><img id="img4" src="../img/cgv-cine-4.png" alt="" /></a>
        <a class="cinema" id="cinema5" href="#" onclick="changeImageColor(5, 'structure1')"><img id="img5" src="../img/cgv-cine-5.png" alt="" /></a>
        <a class="cinema" id="cinema6" href="#" onclick="changeImageColor(6,'structure2')"><img id="img6" src="../img/cgv-cine-6.png" alt="" /></a>
        <a class="cinema" id="cinema7" href="#" onclick="changeImageColor(7,'structure2')"><img id="img7" src="../img/cgv-cine-7.png" alt="" /></a>
        <a class="cinema" id="cinema8" href="#" onclick="changeImageColor(8,'structure2')"><img id="img8" src="../img/cgv-cine-8.png" alt="" /></a>
        <a class="cinema" id="cinema9" href="#" onclick="changeImageColor(9,'structure2')"><img id="img9" src="../img/cgv-cine-9.png" alt="" /></a>
        <a class="cinema" id="cinema10" href="#" onclick="changeImageColor(10,'structure2')"><img id="img10" src="../img/cgv-cine-10.png" alt="" /></a>
        <a class="cinema" id="cinema11" href="#" onclick="changeImageColor(11,'structure2')"><img id="img11" src="../img/cgv-cine-11.png" alt="" /></a>
        <a class="cinema" id="cinema12" href="#" onclick="changeImageColor(12,'structure2')"><img id="img12" src="../img/cgv-cine-12.png" alt="" /></a>
    </div>
    <div class="image-structure">
        <?php
        $sql_listCinema = mysqli_query($mysqli, 'Select * from special_theater');
        while ($row_listCinema = mysqli_fetch_array($sql_listCinema)) {
        }
        ?>
        <div id="imageStructure"></div>
    </div>

    <div id="textAndSlideStructure" class="text-and-slide-structure">
        <div class="my-slider-container" id="cinema-slider">
            <?php
            $sql_listCinema = mysqli_query($mysqli, 'Select * from special_theater');
            $count = 0;
            while ($row_listCinema = mysqli_fetch_array($sql_listCinema)) {
                $id = $row_listCinema['id'];
                $name = $row_listCinema['name'];
                $imgs = $row_listCinema['img'];
                $captions = $row_listCinema['des_img1'];
                if ($count == 0) {
                    echo '<div class="theater-container product-view" id="show-theater-' . $id . '" style=" display: block;">
        
                        <div id="myCarousel-' . $id . '" class="carousel slide border" data-ride="carousel">
                            <div class="carousel-inner">';
                } else {
                    echo '<div class="theater-container product-view" id="show-theater-' . $id . '" style=" display: none;">
        
                        <div id="myCarousel-' . $id . '" class="carousel slide border" data-ride="carousel">
                            <div class="carousel-inner">';
                }
                $count++;
                $trimmedString = trim($imgs, '[]');
                $trimmedStringCaption = trim($captions, '[]');
                $arrayOfStrings = explode(', ', $trimmedString);
                $arrayOfStringsCaption = explode(', ', $trimmedStringCaption);
                $arrayOfStrings = array_map('trim', $arrayOfStrings);
                foreach ($arrayOfStrings as $index => $img) {
                    $activeClass = ($index === 0) ? "active" : "";


                    echo ' <div class="carousel-item ' . $activeClass . '">
                                <img class="d-block w-100" src=' . $img . '>
                                <div class="carousel-caption">' . $arrayOfStringsCaption[$index] .

                        '</div>
                        </div>';
                };
                echo ' </div>
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
            };
            ?>
        </div>
    </div>
</body>
<script type="text/javascript" src="../js/special_cinema.js"></script>
<script>
    var show = document.getElementsByClassName("my-slider-container");

    var cinemas = document.getElementsByClassName(" cinema ");
    console.log("length: " + cinemas.length);
    var slideshow = document.getElementById("cinema-slider");

    Array.from(cinemas).forEach(function(element) {
        element.addEventListener('click', function() {
            slideshow.style.display = "block";
            for (var i = 0; i < cinemas.length; i++) {
                var index = i + 1;
                var cine = "myCarousel-cinema" + index;
                console.log(cine);
                var showCinema = document.getElementById(cine);
                console.log("show cinema: " + showCinema.id);
                showCinema.style.display = "none";
            }

            var showCinema = document.getElementById("myCarousel-" + element.id);
            showCinema.style.display = "block";
            console.log("Đã click vào phần tử có id:", element.id);
        });
    });
</script>

</html>