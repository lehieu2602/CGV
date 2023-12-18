<div class="list-cinema container">
    <a class="cinema" id="cinema1" href="#" onclick="changeImageColor(1, 'structure2')"><img id="img1" src="../img/cgv-cine-1.png" alt="" /></a>
    <a class="cinema" id="cinema2" href="#" onclick="changeImageColor(2, 'structure2')"><img id="img2" src="../img/cgv-cine-2.png" alt="" /></a>
    <!-- <a class="cinema" id="cinema3" href="#" onclick="changeImageColor(3,'structure2')"><img id="img3" src="../img/cgv-cine-3.png" alt="" /></a>
    <a class="cinema" id="cinema4" href="#" onclick="changeImageColor(4, 'structure1')"><img id="img4" src="../img/cgv-cine-4.png" alt="" /></a>
    <a class="cinema" id="cinema5" href="#" onclick="changeImageColor(5, 'structure1')"><img id="img5" src="../img/cgv-cine-5.png" alt="" /></a>
    <a class="cinema" id="cinema6" href="#" onclick="changeImageColor(6,'structure2')"><img id="img6" src="../img/cgv-cine-6.png" alt="" /></a>
    <a class="cinema" id="cinema7" href="#" onclick="changeImageColor(7,'structure2')"><img id="img7" src="../img/cgv-cine-7.png" alt="" /></a>
    <a class="cinema" id="cinema8" href="#" onclick="changeImageColor(8,'structure2')"><img id="img8" src="../img/cgv-cine-8.png" alt="" /></a>
    <a class="cinema" id="cinema9" href="#" onclick="changeImageColor(9,'structure2')"><img id="img9" src="../img/cgv-cine-9.png" alt="" /></a>
    <a class="cinema" id="cinema10" href="#" onclick="changeImageColor(10,'structure2')"><img id="img10" src="../img/cgv-cine-10.png" alt="" /></a>
    <a class="cinema" id="cinema11" href="#" onclick="changeImageColor(11,'structure2')"><img id="img11" src="../img/cgv-cine-11.png" alt="" /></a>
    <a class="cinema" id="cinema12" href="#" onclick="changeImageColor(12,'structure2')"><img id="img12" src="../img/cgv-cine-12.png" alt="" /></a> -->
</div>
<div id="imageStructure" class="image-structure"></div>

<div id="textAndSlideStructure" class="text-and-slide-structure">
    <h2>Cấu trúc chữ và slide</h2>
    <!-- Thêm mã HTML cho cấu trúc chữ và slide tại đây -->
    <div class="my-slider-container" id="cinema-slider" style="display: none;">
        <?php
        $sql_listCinema = mysqli_query($mysqli, 'Select * from special_cinema');
        while ($row_listCinema = mysqli_fetch_array($sql_listCinema)) {
            $id = $row_listCinema['id'];

            $name = $row_listCinema['name'];
            $imgs = $row_listCinema['img'];
            $captions = $row_listCinema['captions'];
            echo '<div id="myCarousel-' . $id . '" class="carousel slide border" data-ride="carousel" style = "display:none">
        <div class="carousel-inner">
        ';
            echo gettype(json_encode($imgs));
            $trimmedString = trim($imgs, '[]');
            $trimmedStringCaption = trim($captions, '[]');
            // Split the string into an array using the comma as a delimiter
            $arrayOfStrings = explode(', ', $trimmedString);
            $arrayOfStringsCaption = explode(', ', $trimmedStringCaption);
            // Trim each element in the array to remove any extra spaces
            $arrayOfStrings = array_map('trim', $arrayOfStrings);

            // Print the resulting array
            // print_r($arrayOfStrings);
            foreach ($arrayOfStrings as $index => $img) {
                $activeClass = ($index === 0) ? "active" : "";


                echo ' <div class="carousel-item ' . $activeClass . '">
                                <img class="d-block w-100" src=' . $img . '>
                                <div class="carousel-caption">' . $arrayOfStringsCaption[$index] .

                    '</div>
                        </div>';
            };
            echo ' </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>';
        };
        ?>
    </div>
</div>

<script type="text/javascript" src="js\special_cinema.js"></script>
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