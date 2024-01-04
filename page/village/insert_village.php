<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";

$pro_id = $_POST['pro_id'];
$dis_id = $_POST['dis_id'];
$vi_name = $_POST['vi_name'];
$vi_remak = $_POST['vi_remak'];

$sql = "INSERT INTO village(pro_id, dis_id, vi_name, vi_remak) 
VALUES ('" . $pro_id . "','" . $dis_id . "','" . $vi_name . "','" . $vi_remak . "')";

$query = mysqli_query($conn, $sql);

?>