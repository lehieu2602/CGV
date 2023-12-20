<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "new_cgv_db";
$mysqli = mysqli_connect($servername, $username, $password, $db);

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
