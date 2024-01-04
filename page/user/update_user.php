<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$us_id = $_POST['us_id'];
$us_name = $_POST['us_name'];
$us_gender = $_POST['us_gander'];
$us_dob = $_POST['us_dob'];
$username = $_POST['username'];
$pro_id = $_POST['pro_id'];
$us_status = $_POST['us_status'];
$us_tel = $_POST['us_tel'];
$dis_id = $_POST['dis_id'];
$vi_id = $_POST['vi_id'];
$sql = "UPDATE `users` SET `us_name`='" . $us_name . "',`us_gander`='" . $us_gender . "',`us_dob`='" . $us_dob . "',`us_tel`='" . $us_tel . "',`username`='" . $username . "',`us_status`='" . $us_status . "',`pro_id`='" . $pro_id . "',`dis_id`='" . $dis_id . "',`vi_id`='" . $vi_id . "' WHERE us_id = '" . $us_id . "'";
$query = mysqli_query($conn, $sql);
if ($query) {
    echo json_encode(1);
}
?>