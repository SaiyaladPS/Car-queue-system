<?php
require "db/connect.php";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username ='" . $username . "' AND password = md5('" . $password . "')";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);
echo json_encode($row);
?>