<?php
$idUser = $_SESSION['user'];
$sql_ticket = mysqli_query($mysqli, "SELECT * FROM `ticket` WHERE `id_user` = '$idUser'");
