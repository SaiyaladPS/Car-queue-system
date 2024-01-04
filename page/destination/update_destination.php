<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$des_id = $_POST['des_id'];
$des_in = $_POST['des_in'];
$des_out = $_POST['des_out'];
$des_price = $_POST['des_price'];

$sql = "UPDATE `destination` SET `des_in`='" . $des_in . "',`des_out`='" . $des_out . "',`des_price`='" . $des_price . "' WHERE des_id = '" . $des_id . "'";
$query = mysqli_query($conn, $sql);
?>