<?php

require "../../db/connect.php";
$dis_id = $_POST['dis_id'];
$dis_name = $_POST['dis_name'];
$pro_id = $_POST['pro_id'];
$dis_remak = $_POST['dis_remak'];

$insert_sql = "UPDATE `district` SET `dis_name`='" . $dis_name . "',`pro_id`='" . $pro_id . "',`dis_remak`='" . $dis_remak . "' WHERE dis_id = '" . $dis_id . "'";
$query = mysqli_query($conn, $insert_sql);
?>