<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";

$des_in = $_POST['des_in'];
$des_out = $_POST['des_out'];

$sql = "SELECT * FROM destination WHERE des_in = '" . $des_in . "' AND des_out = '" . $des_out . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);
echo json_encode($row);
?>