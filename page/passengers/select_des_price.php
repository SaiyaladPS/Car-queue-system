<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$des_id = $_POST['des_id'];
$sql = "SELECT * FROM destination WHERE des_id = '" . $des_id . "'";

$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($query);

echo json_encode($rows);
?>