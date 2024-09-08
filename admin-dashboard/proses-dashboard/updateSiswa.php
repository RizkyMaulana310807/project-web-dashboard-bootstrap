<?php
include "connect.php";

$id = $_POST['id_siswa'];
// $nisn = $_POST['nisn_siswa'];
$nama = $_POST['nama_siswa'];
$idKelas = $_POST['idKelas_siswa'];
$gender = $_POST['gender_siswa'];
$tgllahir = $_POST['tgllahir_siswa'];

$sql = "UPDATE tabel_siswa SET nama_siswa='$nama', idKelas_siswa='$idKelas', gender_siswa='$gender', tgllahir_siswa='$tgllahir' WHERE id_siswa='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
