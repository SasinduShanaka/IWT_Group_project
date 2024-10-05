<?php

$servername = "localhost";
$user_name = "root";
$password = "";
$dbname = "iwt_proj";

$conn = mysqli_connect($servername, $user_name, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>