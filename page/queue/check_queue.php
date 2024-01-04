<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$qu_name = $_POST['qu_name'];

$sql = "SELECT * FROM queue WHERE qu_name = '" . $qu_name . "'";
$query = mysqli_query($conn, $sql);

$row = mysqli_num_rows($query);

echo json_encode($row);
?>