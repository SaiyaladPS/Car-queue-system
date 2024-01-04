<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$des_in = $_POST['des_in'];
$des_out = $_POST['des_out'];
$des_price = $_POST['des_price'];

$sql = "INSERT INTO destination(des_in, des_out, des_price) 
VALUES ('" . $des_in . "','" . $des_out . "','" . $des_price . "')";
$query = mysqli_query($conn, $sql);
?>