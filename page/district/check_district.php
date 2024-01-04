<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';

$dis_name = $_POST['dis_name'];
$pro_id = $_POST['pro_id'];

$sql = "SELECT * FROM district WHERE dis_name = '" . $dis_name . "' AND pro_id = '" . $pro_id . "'";
$query = mysqli_query($conn, $sql);

$rows = mysqli_num_rows($query);

echo json_encode($rows);
?>