<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_cat";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully";
?>