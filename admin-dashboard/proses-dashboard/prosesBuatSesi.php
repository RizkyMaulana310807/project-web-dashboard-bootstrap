<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $namaSesi = $_POST['namaSesi'];
    $group = $_POST['group'];
    $days = isset($_POST['days']) ? $_POST['days'] : [];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $repeat_interval = $_POST['repeat_interval'];

    // Validasi data
    if (empty($namaSesi) || empty($group) || empty($days) || empty($start_date) || empty($end_date) || empty($start_time) || empty($end_time) || empty($repeat_interval)) {
        die('Semua field harus diisi.');
    }

    // Menghubungkan ke database (Gantilah dengan kredensial Anda sendiri)
    include "connect.php";

    // Hitung tanggal sesi berulang untuk setiap hari yang dipilih
    $dates = [];
    $current_date = new DateTime($start_date);
    $end_date_obj = new DateTime($end_date);
    
    while ($current_date <= $end_date_obj) {
        if (in_array($current_date->format('l'), $days)) {
            $date = clone $current_date;
            $dates[] = $date->format('Y-m-d');
        }
        $current_date->modify('next week');
    }

    // Simpan sesi ke database
    foreach ($dates as $date) {
        $session_start = $date . ' ' . $start_time;
        $session_end = $date . ' ' . $end_time;
        $sql = "INSERT INTO sessions (session_name, group_name, session_start, session_end) VALUES ('$namaSesi', '$group', '$session_start', '$session_end')";
        if ($conn->query($sql) === TRUE) {
            echo "Sesi berhasil dibuat untuk tanggal: $date dari $start_time hingga $end_time<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Tutup koneksi
    $conn->close();
}
?>
