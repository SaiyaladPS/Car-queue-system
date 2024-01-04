<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$pro_name = $_POST['pro_name'];
$pro_remak = $_POST['pro_remak'];
$pro_id = $_POST['pro_id'];

$sql = "UPDATE `province` SET `pro_name`='" . $pro_name . "',`pro_remak`='" . $pro_remak . "' WHERE pro_id = '" . $pro_id . "'";
$insert = mysqli_query($conn, $sql);

?>