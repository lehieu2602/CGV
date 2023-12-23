<?php
include_once("db\connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/listMovies.css" />
    <link rel="stylesheet" href="../css/movieD.css" />
    <link rel="stylesheet" href="../css/all-theater.css" />
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/slider.css" />
    <link rel="stylesheet" href="../css/myAccount.css" />
    <link rel="stylesheet" href="../css/special_cinema.css" />
    <link rel="stylesheet" href="../css/listEvent.css" />
    <link rel="stylesheet" href="../css/newsD.css" />
    <link rel="stylesheet" href="../css/membership.css" />
    <!-- <link rel="stylesheet" href="../css/stylesignin.css" /> -->
    <!-- <link rel="stylesheet" href="../css/stylelogin.css" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <script src="js/index.js"></script>
    <script src="js/react.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>CGV</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="img\cgvcinemas-vietnam-favicon.ico" type="image/x-icon" />
    <script>
        var $j = jQuery.noConflict();
    </script>
</head>

<body style="background-color: #fdfcf0">
    <?php
    include("view/header.php");

    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
    } else {
        $controller = '';
    }

    if ($controller == 'phim') {
        include('view/movieDetail.php');
    } else if ($controller == 'listnews') {
        include('view/listNew.php');
    } else if ($controller == 'listmovies') {
        include('view/listMovie.php');
    } else if ($controller == 'commingsoon') {
        include('view/commingSoon.php');
    } else if ($controller == 'userInfo') {
        if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
            include('view/myAccount.php');
        } else {
            include("view/slider.php");
            include('view/home.php');
        }
    } else if ($controller == 'newsDetail') {
        include('view/newsDetail.php');
    } else if ($controller == 'allTheater') {
        include('view/allTheater.php');
    } else if ($controller == 'specialTheater') {
        include('view/special_cinema.php');
    } else if ($controller == 'login') {
        include('view/login-signup.php');
    } else if ($controller == 'membership') {
        include('view/membership.php');
    } else {
        include("view/slider.php");
        include('view/home.php');
    }
    include("view/footer.html");
    ?>
    <script type="text/javascript" src="js/header.js"></script>
    <script type="text/javascript" src="js/footer.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/movieD.js"></script>
    <script type="text/javascript" src="js\special_cinema.js"></script>
</body>

</html>