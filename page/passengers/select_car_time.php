<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$car_id = $_POST['car_id'];
$sql = "SELECT * FROM car INNER JOIN timer ON car.ti_id = timer.ti_id WHERE car.car_id = '" . $car_id . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>