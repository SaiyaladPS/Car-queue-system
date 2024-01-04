<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$ti_name = $_POST['ti_name'];
$sql = "SELECT * FROM timer WHERE ti_name = '" . $ti_name . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);
echo json_encode($row);
?>