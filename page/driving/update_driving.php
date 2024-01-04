<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$dr_id = $_POST['dr_id'];
$dr_name = $_POST['dr_name'];
$dr_gander = $_POST['dr_gander'];
$dr_dob = $_POST['dr_dob'];
$pro_id = $_POST['pro_id'];
$qu_id = $_POST['qu_id'];
$dr_tel = $_POST['dr_tel'];
$dis_id = $_POST['dis_id'];
$vi_id = $_POST['vi_id'];

$sql = "UPDATE `driving` SET `dr_name`='" . $dr_name . "',`dr_gander`='" . $dr_gander . "',`dr_dob`='" . $dr_dob . "',`dr_tel`='" . $dr_tel . "',`qu_id`='" . $qu_id . "',`pro_id`='" . $pro_id . "',`dis_id`='" . $dis_id . "',`vi_id`='" . $vi_id . "' WHERE dr_id = '" . $dr_id . "'";

$query = mysqli_query($conn, $sql);
?>