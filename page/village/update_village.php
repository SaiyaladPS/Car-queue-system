<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$vi_id = $_POST['vi_id'];
$pro_id = $_POST['pro_id'];
$dis_id = $_POST['dis_id'];
$vi_name = $_POST['vi_name'];
$vi_remak = $_POST['vi_remak'];

$sql = "UPDATE `village` SET `pro_id`='" . $pro_id . "',`dis_id`='" . $dis_id . "',`vi_name`='" . $vi_name . "',`vi_remak`='" . $vi_remak . "' WHERE vi_id = '" . $vi_id . "'";

$query = mysqli_query($conn, $sql);

?>