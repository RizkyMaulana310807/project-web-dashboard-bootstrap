<?php
$servername = "localhost";
$username = "root";
$password = "rizkymaulana31";
$dbname = "testing_presensi4";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
