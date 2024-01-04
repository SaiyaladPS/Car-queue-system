<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$dr_name = $_POST['dr_name'];
$dr_gander = $_POST['dr_gander'];
$dr_dob = $_POST['dr_dob'];
$pro_id = $_POST['pro_id'];
$qu_id = $_POST['qu_id'];
$dr_tel = $_POST['dr_tel'];
$dis_id = $_POST['dis_id'];
$vi_id = $_POST['vi_id'];

$sql = "INSERT INTO driving(dr_name,dr_gander, dr_dob, dr_tel, qu_id, pro_id, dis_id, vi_id)
 VALUES ('" . $dr_name . "','" . $dr_gander . "','" . $dr_dob . "','" . $dr_tel . "','" . $qu_id . "','" . $pro_id . "','" . $dis_id . "','" . $vi_id . "')";

$query = mysqli_query($conn, $sql);
?>