<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$car_name = $_POST['car_name'];
$car_num = $_POST['car_num'];
$car_remak = $_POST['car_remak'];
$qu_id = $_POST['qu_id'];
$dr_id = $_POST['dr_id'];
$ti_id = $_POST['ti_id'];
$sql = "INSERT INTO car (car_name, car_num, car_status, car_qty, car_remak, qu_id, dr_id,ti_id) 
VALUES ('" . $car_name . "','" . $car_num . "','Loose','0','" . $car_remak . "','" . $qu_id . "','" . $dr_id . "','" . $ti_id . "')";
$query = mysqli_query($conn, $sql);
?>