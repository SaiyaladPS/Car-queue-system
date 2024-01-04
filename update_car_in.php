<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: 404.php");
}
require 'db/connect.php';
$car_id = $_POST['car_id'];
$sql = "UPDATE `car` SET `car_status`='Loose' ,`car_qty` = '0' WHERE car_id = '" . $car_id . "'";
$query = mysqli_query($conn, $sql);
?>