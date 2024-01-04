<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$qu_name = $_POST['qu_name'];
$qu_remak = $_POST['qu_remak'];

$sql = "INSERT INTO queue(qu_name, qu_remak)
 VALUES ('" . $qu_name . "','" . $qu_remak . "')";
$query = mysqli_query($conn, $sql);

?>