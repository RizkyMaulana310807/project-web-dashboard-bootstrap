<?php
session_start();

// Koneksi ke database
$conn = new mysqli('localhost', 'root', 'rizkymaulana31', 'testing_presensi');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$success = true;

foreach ($_POST as $key => $value) {
    if (strpos($key, 'kehadiran_') === 0) {
        $id_siswa = str_replace('kehadiran_', '', $key);
        $status_siswa = $value;
        $nisn_siswa = ''; // Lakukan query untuk mendapatkan NISN siswa berdasarkan ID siswa
        $id_guru = 'G003'; // Sesuaikan ID guru yang akan menyimpan data presensi

        // Query untuk mendapatkan NISN siswa
        // $sql_nisn = "SELECT nisn FROM siswa WHERE id='$id_siswa'";
        // $result_nisn = $conn->query($sql_nisn);
        // if ($result_nisn->num_rows > 0) {
        //     $row_nisn = $result_nisn->fetch_assoc();
        //     $nisn_siswa = $row_nisn['nisn'];
        // }

        // Query untuk memasukkan data presensi
        $sql = "INSERT INTO tabel_presensi (idGuru_presensi, idKelas_presensi, idSiswa_presensi, statusSiswa_presensi, waktu_presensi)
                VALUES ('001', '001', '001';, '$status_siswa', NOW())";
        if (!$conn->query($sql)) {
            $success = false;
            break;
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
