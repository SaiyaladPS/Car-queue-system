<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$pro_name = $_POST['pro_name'];

$check_pro = mysqli_query($conn, "SELECT * FROM province WHERE pro_name = '$pro_name'");

$row_pro = mysqli_num_rows($check_pro);

echo json_encode($row_pro);
?>