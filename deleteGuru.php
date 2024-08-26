<?php
$servername = "localhost";
$username = "root";
$password = "rizkymaulana31";
$dbname = "testing_presensi2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_guru = $_POST['id'];

    $sql = "DELETE FROM tabel_guru WHERE id_guru = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_guru);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
