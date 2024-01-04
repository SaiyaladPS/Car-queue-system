<?php
require '../../db/connect.php';
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}

$dr_id = $_POST['dr_id'];
$car_num = $_POST['car_num'];

$sql = "SELECT * FROM car WHERE dr_id ='" . $dr_id . "' OR car_num = '" . $car_num . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);

echo json_encode($row);
?>