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
$nisn = isset($_POST['nisn']) ? $_POST['nisn'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$tanggallahir = isset($_POST['tanggallahir']) ? $_POST['tanggallahir'] : '';

// Menyiapkan statement
$stmt = $conn->prepare("INSERT INTO siswa (nama, kelas, nisn, gender, tanggallahir) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nama, $kelas, $nisn, $gender, $tanggallahir);

// Mengeksekusi statement
if ($stmt->execute()) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $stmt->error;
}

// Redirect setelah penyimpanan data
header("Location: tambahSiswa.php");

// Menutup statement dan koneksi
$stmt->close();
$conn->close();
?>
