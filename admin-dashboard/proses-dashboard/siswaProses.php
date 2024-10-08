<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "connect.php";

// Mengambil data dari form
$nisn = isset($_POST['nisn']) ? $_POST['nisn'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
$tanggallahir = isset($_POST['tanggallahir']) ? $_POST['tanggallahir'] : '';

// Menyiapkan statement
$stmt = $conn->prepare("INSERT INTO tabel_siswa (nisn_siswa, nama_siswa, idKelas_siswa, gender_siswa, tgllahir_siswa) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nisn, $nama, $kelas, $gender, $tanggallahir);

// Mengeksekusi statement
if ($stmt->execute()) {
    $_SESSION['message'] = "Data Siswa berhasil disimpan!";
    echo "Data berhasil disimpan";
} else {
    $_SESSION['message'] = "Terjadi kesalahan saat menyimpan data presensi.";
    echo "Error: " . $stmt->error;
}

// Redirect setelah penyimpanan data
header("Location: tambahSiswa.php");

// Menutup statement dan koneksi
$stmt->close();
$conn->close();
