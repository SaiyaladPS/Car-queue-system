<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$dr_tel = $_POST['dr_tel'];

$sql = "SELECT * FROM driving WHERE dr_tel = '" . $dr_tel . "'";

$query = mysqli_query($conn, $sql);

$row = mysqli_num_rows($query);

echo json_encode($row);

?>