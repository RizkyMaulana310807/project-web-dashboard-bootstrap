<?php
include "connect.php";

// Ensure POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $id_guru = $_POST['id_guru'];
    // $nik_guru = $_POST['nik_guru'];
    $nama_guru = $_POST['nama_guru'];
    $gender_guru = $_POST['gender_guru'];
    $idGuru = $_POST['idGuru'];
    $idKelas = $_POST['idKelas'];

    // Debugging output
    // error_log("Received data: id_guru=$id_guru, nik_guru=$nik_guru, nama_guru=$nama_guru, gender_guru=$gender_guru, idGuru=$idGuru, idKelas=$idKelas");

    // Prepare and bind
    $sql = "UPDATE tabel_guru SET 
                nama_guru = ?, 
                gender_guru = ?, 
                idGuru = ?, 
                idKelas = ? 
            WHERE id_guru = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sssss", $nama_guru, $gender_guru, $idGuru, $idKelas, $id_guru);

    // Execute statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
}

$conn->close();
?>
