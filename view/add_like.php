<?php
include_once("db\connect.php");
// Kết nối đến cơ sở dữ liệu
// ... (Thực hiện kết nối tới MySQL hoặc cơ sở dữ liệu khác)

// Nhận dữ liệu từ yêu cầu POST
$movieId = $_POST['movie_id'];
$userId = $_POST['user_id'];

// Thực hiện thêm bản ghi vào cơ sở dữ liệu
$sql = mysqli_query($mysqli, "INSERT INTO react (movie_id, user_id) VALUES ('$movieId', '$userId')");
$result = $mysqli->query($sql);

$mysqli->close();
?>
