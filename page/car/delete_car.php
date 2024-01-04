<?php
require "../../db/connect.php";
$car_id = $_POST['car_id'];
$sql = "DELETE FROM car WHERE car_id = '" . $car_id . "'";
$query = mysqli_query($conn, $sql);
if ($query) {
    echo json_encode(200);
} else {
    echo json_encode(500);
}
?>