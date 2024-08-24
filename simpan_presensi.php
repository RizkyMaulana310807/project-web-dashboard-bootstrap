<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', 'rizkymaulana31', 'dummy_presensi');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

foreach ($_POST as $key => $value) {
    if (strpos($key, 'kehadiran_') === 0) {
        $id_siswa = str_replace('kehadiran_', '', $key);
        $status_siswa = $value;
        $nisn_siswa = ''; // Lakukan query untuk mendapatkan NISN siswa berdasarkan ID siswa
        $id_guru = 'G002'; // Sesuaikan ID guru yang akan menyimpan data presensi

        // Query untuk mendapatkan NISN siswa
        $sql_nisn = "SELECT nisn FROM siswa WHERE id='$id_siswa'";
        $result_nisn = $conn->query($sql_nisn);
        if ($result_nisn->num_rows > 0) {
            $row_nisn = $result_nisn->fetch_assoc();
            $nisn_siswa = $row_nisn['nisn'];
        }

        // Query untuk memasukkan data presensi
        $sql = "INSERT INTO presensi (session_id, nisn_siswa, status_siswa, time_stamp, id_guru)
                VALUES (NULL, '$nisn_siswa', '$status_siswa', NOW(), '$id_guru')";
        $conn->query($sql);
    }
}

// Tutup koneksi
$conn->close();

// Redirect kembali ke halaman awal
header("Location: presensi.php");
exit();
?>
