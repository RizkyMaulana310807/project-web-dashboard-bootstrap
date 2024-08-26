<?php
$servername = "localhost";
$username = "root";
$password = "rizkymaulana31";
$dbname = "testing_presensi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id_siswa'];

$sql = "DELETE FROM tabel_siswa WHERE id_siswa='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
