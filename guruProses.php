<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "rizkymaulana31";
$dbname = "testing_presensi";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$idGuru = $_POST['idGuru'];
$kelas = $_POST['kelas'];

// Menyiapkan statement
$stmt = $conn->prepare("INSERT INTO tabel_guru (nik_guru, nama_guru, gender_guru, idGuru, idKelas) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nik, $nama, $gender, $idGuru, $kelas);

// Mengeksekusi statement
if ($stmt->execute()) {
    echo "Data berhasil disimpan";
    $_SESSION['message'] = "Data presensi berhasil disimpan!";
} else {
    $_SESSION['message'] = "Terjadi kesalahan saat menyimpan data presensi.";
    echo "Error: " . $stmt->error;
}

header("Location:tambahGuru.php");
// Menutup statement dan koneksi
$stmt->close();
$conn->close();
