<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$qu_id = $_POST['qu_id'];
$sql = "SELECT * FROM queue WHERE qu_id != '" . $qu_id . "'";
$query = mysqli_query($conn, $sql);
$rows = array();

while ($row = mysqli_fetch_assoc($query)) {
    $rows[] = $row;
}

echo json_encode($rows);
?>