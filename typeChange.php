<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['kelas'])) {
    $selectedKelas = $_GET['kelas'];
    
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "rizkymaulana31";
    $dbname = "dummy_presensi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk mendapatkan data sesuai dengan kelas yang dipilih
    $sql = "SELECT * FROM siswa WHERE kelas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedKelas);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah ada hasil
    if ($result->num_rows > 0) {
        // Output data setiap baris
        $ind = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $ind . "</td>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["kelas"] . "</td>";
            echo "<td>" . $row["nisn"] . "</td>";
            echo "<td>" . "<input class='text-center' type='radio' name='hadir_$ind'>" . "</td>";
            echo "<td>" . "<input class='text-center' type='radio' name='sakit_$ind'>" . "</td>";
            echo "<td>" . "<input class='text-center' type='radio' name='ijin_$ind'>" . "</td>";
            echo "<td>" . "<input class='text-center' type='radio' name='alpha_$ind'>" . "</td>";
            echo "</tr>";
            $ind++;
        }
    } else {
        echo "<tr><td colspan='8'>Tidak ada data untuk kelas yang dipilih</td></tr>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<tr><td colspan='8'>Kelas tidak dipilih atau data tidak tersedia</td></tr>";
}
?>