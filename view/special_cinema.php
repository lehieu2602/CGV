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
    <a class="cinema" id="cinema12" href="#" onclick="changeImageColor(12,'structure2')"><img id="img12" src="" alt="" /></a>
</div>

<div class="content-special-theater">
    <div class=" head-content container">
        <?php
        $sql_listCinema = mysqli_query($mysqli, 'Select * from special_theater');
        $count = 0;
        while ($row_listCinema = mysqli_fetch_array($sql_listCinema)) {
            $id = $row_listCinema['id'];
            $name = $row_listCinema['name'];
            $img = $row_listCinema['thumb'];
            $des1 = $row_listCinema['description1'];
            $des2 = $row_listCinema['description2'];
            $cinemas = $row_listCinema['theaters'];
            if ($count == 0) {
                echo '<div class="content-theater" id="content-' . $id . '" style="margin-top:3%;  display: flex; flex-direction: column; align-items: center">
                            <div class="thumbnail" >
                                <img src=' . $img . ' alt= ' . $name . ' style =" width: 200px">
                            </div>
                            <div class="description" style = "margin-top: 3%;">
                                <p style = "font-size: 20px;">' . $des1 . '</p>
                                <p> ' . $des2 . '</p>
                            </div>
                            <ul class = "list-cinema list-unstyled row" style = "margin-left:10% ; width:100%">'; ?>
                <?php
                $arrayOfCinemas = trim($cinemas, '[]');
                $arrayOfStringCinemas = explode(', ', $arrayOfCinemas);
                foreach ($arrayOfStringCinemas as $index => $cine) {

                    echo '<li style = "flex: 0 0 33.333%;max-width: 33.333%; display:flex;">
                                
                                <div class = "name-special-cinema"><p style = "font-size:15px"><strong>' . trim($cine, "'") . '</strong></p></div>
                                </li>';
                };
                echo '</ul>
                    </div>';
            } else {
                echo '<div class="content-theater" id="content-' . $id . '" style=" display: none; flex-direction: column; align-items: center"><div class="thumbnail">
                <img src=' . $img . ' alt= ' . $name . ' style =" width: 200px">
            </div>
            <div class="description">
                <h3>' . $des1 . '</h3>
                <p> ' . $des2 . '</p>
            </div>
            <ul class = "list-cinema list-unstyled row" style = "margin-left:10%; width:100%">'; ?>
        <?php
                $arrayOfCinemas = trim($cinemas, '[]');
                $arrayOfStringCinemas = explode(', ', $arrayOfCinemas);
                foreach ($arrayOfStringCinemas as $index => $cine) {

                    echo '<li style = "flex: 0 0 33.333%;max-width: 33.333%; display:flex;">
                                
                                <div class = "name-special-cinema"><p style = "font-size:15px"><strong>' . trim($cine, "'") . '</strong></p></div>
                                </li>';
                };
                echo '</ul>
            </div>';
            }
            $count++;
        }
        ?>
    </div>
    <div class="image-structure">
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
                $captions2 = $row_listCinema['des_img2'];
                if ($count == 0) {
                    echo '<div class="theater-container product-view" id="show-theater-' . $id . '" style=" display: flex; flex-direction: column; align-items: center;">
        
                        <div id="myCarousel-' . $id . '" class="carousel slide border" data-ride="carousel" style="width: 60%;">
                            <div class="carousel-inner">';
                } else {
                    echo '<div class="theater-container product-view" id="show-theater-' . $id . '" style=" display: none;">
        
                        <div id="myCarousel-' . $id . '" class="carousel slide border" data-ride="carousel" style="width: 60%;">
                            <div class="carousel-inner">';
                }
                $count++;
                $trimmedString = trim($imgs, '[]');
                $trimmedStringCaption = trim($captions, '[]');
                $arrayOfStrings = explode(', ', $trimmedString);
                $arrayOfStringsCaption = explode(', ', $trimmedStringCaption);
                $arrayOfStrings = array_map('trim', $arrayOfStrings);
                $arrayOfImgDes = trim($captions2, '[]');
                $arrayOfStringsDes2 = explode(', ', $arrayOfImgDes);
                // echo $arrayOfStringsDes2;

                foreach ($arrayOfStrings as $index => $img) {
                    $activeClass = ($index === 0) ? "active" : "";


                    echo ' <div class="carousel-item ' . $activeClass . '">
                                <img class="d-block w-100" src=' . $img . '>
                                <div class="carousel-caption" style = "width: 30%; height:100%; background-color: rgba(0, 0, 0, 0.2); color: #fff; left:0%; top:2%">
                                <h5>' . trim($arrayOfStringsCaption[$index], "'") .

                        '</h5><br><div class = "des2"><small>' . trim($arrayOfStringsDes2[$index], "'") . '</small></div></div>
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
</div>

<script type="text/javascript" src="../js/special_cinema.js"></script>
<script>
    var show = document.getElementsByClassName("my-slider-container");

    var cinemas = document.getElementsByClassName("cinema");
    console.log("length: " + cinemas.length);
    var slideshows_id = document.getElementsByClassName("theater-container product-view");

    var content_id = document.getElementsByClassName("content-theater");
    console.log(content_id);
    Array.from(cinemas).forEach(function(element) {
        element.addEventListener('click', function() {
            for (var i = 0; i < cinemas.length; i++) {
                slideshows_id[i].style.display = "none";
                content_id[i].style.display = "none";
            }
            var id = element.id;
            console.log(id);
            var numericRegex = /\d+/;
            var match = numericRegex.exec(id);

            if (match && match[0]) {
                var idx = match[0];
            } else {
                console.log("No numeric part found.");
            }

            id = slideshows_id[idx - 1].id;

            var showCinema = document.getElementById(id);
            console.log("show cinema: " + showCinema.id);
            showCinema.style.display = "flex";
            showCinema.style.flexDirection = "column";
            showCinema.style.alignItems = "center";

            var uuidRegex = /[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}/;

            var matches = id.match(uuidRegex);

            if (matches) {
                var uuid = matches[0];
            } else {
                console.log("No UUID found in the input string.");
            }
            id = "content-" + uuid
            console.log(id);
            showCinema = document.getElementById(id);
            console.log(showCinema);
            showCinema.style.display = "flex";
        });
    });
</script>

</html>