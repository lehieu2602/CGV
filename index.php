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
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/listMovies.css" />
    <link rel="stylesheet" href="../css/movieD.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <title>Document</title>
</head>

<body>


    <?php
    include("view/header.html");
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
            include('view/userInfo.php');
        } else {
            include("view/slider.php");
            include('view/home.php');
        }
    } else if ($controller == 'newsDetail') {
        include('view/newsDetail.php');
    } else if ($controller == 'listTheater') {
        include('view/listTheater.php');
    } else {
        include("view/slider.php");
        include('view/home.php');
    }

    include("view/footer.html");


    ?>



</body>
<script type="text/javascript" src="js/footer.js"></script>
<script type="text/javascript" src="js/header.js"></script>

</html>