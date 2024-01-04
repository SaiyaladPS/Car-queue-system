<?php
require "../../db/connect.php";
$des_id = $_POST['delete_id'];
$sql = "DELETE FROM province WHERE pro_id = '" . $des_id . "'";
$query = mysqli_query($conn, $sql);
if ($query) {
    echo json_encode(200);
} else {
    echo json_encode(500);
}
?>