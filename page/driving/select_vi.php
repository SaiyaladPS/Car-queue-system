<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$dis_id = $_POST['dis_id'];

$sql = "SELECT * FROM village WHERE dis_id = '" . $dis_id . "'";
$query = mysqli_query($conn, $sql);

$rows = array(); // Initialize an array to store the rows

while ($row = mysqli_fetch_assoc($query)) {
    $rows[] = $row;
}

echo json_encode($rows);
?>