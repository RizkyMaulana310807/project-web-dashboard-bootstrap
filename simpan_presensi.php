<?php
session_start();

// Koneksi ke database
$conn = new mysqli('localhost', 'root', 'rizkymaulana31', 'testing_presensi4');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$success = true;

// Nama guru
$nama_guru = 'Cahyadi';

// Loop melalui semua input presensi
foreach ($_POST as $key => $value) {
    if (strpos($key, 'kehadiran_') === 0) {
        $id_siswa = str_replace('kehadiran_', '', $key);

        // Ambil status siswa dari form
        $status_siswa = $value;

        // Query untuk mendapatkan ID kelas dan nama siswa berdasarkan ID siswa
        $sql_siswa = "SELECT idKelas_siswa, nama_siswa FROM tabel_siswa WHERE id_siswa = '$id_siswa'";
        $result_siswa = $conn->query($sql_siswa);

        if ($result_siswa->num_rows > 0) {
            $row_siswa = $result_siswa->fetch_assoc();
            $idKelas_siswa = $row_siswa['idKelas_siswa'];
            $nama_siswa = $row_siswa['nama_siswa'];

            // Query untuk memasukkan data presensi
            $sql = "INSERT INTO tabel_presensi (namaGuru_presensi, kelasSiswa_presensi, namaSiswa_presensi, statusSiswa_presensi, waktu_presensi)
                    VALUES ('$nama_guru', '$idKelas_siswa', '$nama_siswa', '$status_siswa', NOW())";
            if (!$conn->query($sql)) {
                $success = false;
                break;
            }
        }
    }
}

// Tutup koneksi
$conn->close();

// Set pesan berdasarkan hasil
if ($success) {
    $_SESSION['message'] = "Data presensi berhasil disimpan!";
} else {
    $_SESSION['message'] = "Terjadi kesalahan saat menyimpan data presensi.";
}

// Redirect kembali ke halaman awal
header("Location: presensi.php");
exit();
?>
