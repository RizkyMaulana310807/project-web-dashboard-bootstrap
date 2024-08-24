<?php
$servername = "localhost";
$username = "root";
$password = "rizkymaulana31";
$dbname = "dummy_presensi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
    echo "Connected successfully to database $dbname";
}
?>
