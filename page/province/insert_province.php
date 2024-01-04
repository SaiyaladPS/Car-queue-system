<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$pro_name = $_POST['pro_name'];
$pro_remak = $_POST['pro_remak'];

$sql = "INSERT INTO province(pro_name, pro_remak) VALUES ('" . $pro_name . "','" . $pro_remak . "')";
$insert = mysqli_query($conn, $sql);

?>