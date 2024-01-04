<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$car_id = $_POST['car_id'];
$car_name = $_POST['car_name'];
$car_num = $_POST['car_num'];
$car_remak = $_POST['car_remak'];
$qu_id = $_POST['qu_id'];
$dr_id = $_POST['dr_id'];
$ti_id = $_POST['ti_id'];
$sql = "UPDATE car SET car_name='" . $car_name . "',car_num='" . $car_num . "',car_remak='" . $car_remak . "',qu_id='" . $qu_id . "',dr_id='" . $dr_id . "',ti_id='" . $ti_id . "' WHERE car_id = '" . $car_id . "'";
$query = mysqli_query($conn, $sql);
?>