<?php

require "../../db/connect.php";

$dis_name = $_POST['dis_name'];
$pro_id = $_POST['pro_id'];
$dis_remak = $_POST['dis_remak'];

$insert_sql = "INSERT INTO district(dis_name, pro_id, dis_remak) VALUES ('" . $dis_name . "','" . $pro_id . "','" . $dis_remak . "')";
$query = mysqli_query($conn, $insert_sql);
?>