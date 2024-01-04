<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$ti_id = $_POST['ti_id'];
$ti_name = $_POST['ti_name'];
$ti_remak = $_POST['ti_remak'];
$sql = "UPDATE `timer` SET `ti_name`='" . $ti_name . "',`ti_remak`='" . $ti_remak . "' WHERE ti_id = '" . $ti_id . "'";
$query = mysqli_query($conn, $sql);
?>