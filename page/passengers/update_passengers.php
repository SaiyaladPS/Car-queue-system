<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}

require "../../db/connect.php";

$pa_name = $_POST['pa_name'];
$pa_tel = $_POST['pa_tel'];
$ti_id = $_POST['ti_id'];
$pa_id = $_POST['pa_id'];

$sql = "UPDATE `passengers` SET `pa_name`='" . $pa_name . "',`pa_tel`='" . $pa_tel . "',`ti_id`='" . $ti_id . "' WHERE pa_id = '" . $pa_id . "'";
$query = mysqli_query($conn, $sql);
?>