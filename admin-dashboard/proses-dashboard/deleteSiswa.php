<?php
include "connect.php";

$id = $_POST['id_siswa'];

$sql = "DELETE FROM tabel_siswa WHERE id_siswa='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
