<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$ti_name = $_POST['ti_name'];
$ti_remak = $_POST['ti_remak'];
$sql = "INSERT INTO timer(ti_name, ti_remak) VALUES ('" . $ti_name . "','" . $ti_remak . "')";
$query = mysqli_query($conn, $sql);
?>