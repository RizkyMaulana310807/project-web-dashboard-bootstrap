<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "rizkymaulana31";
$dbname = "dummy_presensi";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];

// Menyiapkan statement
$stmt = $conn->prepare("INSERT INTO guru (nik, nama, kelas) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $nik, $nama, $kelas);

// Mengeksekusi statement
if ($stmt->execute()) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $stmt->error;
}

header("Location:tambahGuru.php");
// Menutup statement dan koneksi
$stmt->close();
$conn->close();
?>