<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$des_in = $_POST['des_in'];

$sql = "SELECT * FROM car INNER JOIN queue ON car.qu_id = queue.qu_id WHERE queue.qu_name = '" . $des_in . "' AND car_status ='Loose'";
$query = mysqli_query($conn, $sql);
$rows = array();

while ($row = mysqli_fetch_assoc($query)) {
    $rows[] = $row;
}

echo json_encode($rows);
?>