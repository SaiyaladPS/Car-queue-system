<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';

$dis_id = $_POST['dis_id'];
$vi_name = $_POST['vi_name'];

$sql = "SELECT * FROM village WHERE dis_id = '" . $dis_id . "' AND vi_name = '" . $vi_name . "'";

$query = mysqli_query($conn, $sql);

$row = mysqli_num_rows($query);

echo json_encode($row);

?>