<?php
require "../../db/connect.php";
$des_id = $_POST['deleteid'];
$car_id = $_POST['car_id'];
$sql = "DELETE FROM passengers WHERE pa_id = '" . $des_id . "'";
$query = mysqli_query($conn, $sql);
if ($query) {
    $update = "UPDATE car SET car_qty = car_qty-1 WHERE car_id = '" . $car_id . "' ";
    $query_upate = mysqli_query($conn, $update);
    echo json_encode(200);
} else {
    echo json_encode(500);
}
?>