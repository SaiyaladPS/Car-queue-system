<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$qu_name = $_POST['qu_name'];
$qu_remak = $_POST['qu_remak'];
$qu_id = $_POST['qu_id'];

$sql = "UPDATE `queue` SET `qu_name`='" . $qu_name . "',`qu_remak`='" . $qu_remak . "' WHERE qu_id = '" . $qu_id . "'";
$query = mysqli_query($conn, $sql);

?>