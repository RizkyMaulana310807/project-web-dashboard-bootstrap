<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">

    <link href="assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .floating-alert {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1050;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php
    session_start();
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                createAlert('$message');
                setTimeout(function() {
                    $(alertDiv).alert('close');
                    isAlertVisible = false;
                }, 2000);
            });
        </script>";
        unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
    }
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="login.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- End Navbar -->
    <div class="modal fade w-full" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">SISWA HADIR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NISN</th>
                                <th>TANGGAL</th>
                                <th>STATUS</th>
                                <th>TIMESTAMP</th>
                                <th>GURUID</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "rizkymaulana31";
                            $dbname = "rizky_presensi";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM presensi where status = 'hadir'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["nisn"] . "</td>";
                                    echo "<td>" . $row["tanggal"] . "</td>";
                                    echo "<td>" . $row["status"] . "</td>";
                                    echo "<td>" . $row["timestamp"] . "</td>";
                                    echo "<td>" . $row["guruId"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade w-full" id="myModal1" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">SISWA SAKIT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="datatablesSimple" class="table table-bordered sticky-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NISN</th>
                                <th>TANGGAL</th>
                                <th>STATUS</th>
                                <th>TIMESTAMP</th>
                                <th>GURUID</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "rizkymaulana31";
                            $dbname = "rizky_presensi";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM presensi where status = 'sakit'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["nisn"] . "</td>";
                                    echo "<td>" . $row["tanggal"] . "</td>";
                                    echo "<td>" . $row["status"] . "</td>";
                                    echo "<td>" . $row["timestamp"] . "</td>";
                                    echo "<td>" . $row["guruId"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade w-full" id="myModal2" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">SISWA IZIN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="datatablesSimple" class="table table-bordered sticky-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NISN</th>
                                <th>TANGGAL</th>
                                <th>STATUS</th>
                                <th>TIMESTAMP</th>
                                <th>GURUID</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "rizkymaulana31";
                            $dbname = "rizky_presensi";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM presensi where status = 'izin'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["nisn"] . "</td>";
                                    echo "<td>" . $row["tanggal"] . "</td>";
                                    echo "<td>" . $row["status"] . "</td>";
                                    echo "<td>" . $row["timestamp"] . "</td>";
                                    echo "<td>" . $row["guruId"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade w-full" id="myModal3" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">SISWA ALPHA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="datatablesSimple" class="table table-bordered sticky-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NISN</th>
                                <th>TANGGAL</th>
                                <th>STATUS</th>
                                <th>TIMESTAMP</th>
                                <th>GURUID</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "rizkymaulana31";
                            $dbname = "rizky_presensi";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM presensi where status = 'alpha'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["nisn"] . "</td>";
                                    echo "<td>" . $row["tanggal"] . "</td>";
                                    echo "<td>" . $row["status"] . "</td>";
                                    echo "<td>" . $row["timestamp"] . "</td>";
                                    echo "<td>" . $row["guruId"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Sidebar -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Konten</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Konten utama
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="siswa.php">Siswa</a>
                                <a class="nav-link" href="guru.php">Guru</a>
                                <a class="nav-link" href="presensi.php">presensi</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Admin</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#tambahLayout" aria-expanded="false" aria-controls="tambahLayout">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Tambah data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="tambahLayout" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="tambahSiswa.php">Siswa</a>
                                <a class="nav-link" href="tambahGuru.php">Guru</a>
                                <a class="nav-link" href="buatSesi.php">Tambah Sesi</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <!-- End Sidebar -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 border border-secondary rounded p-4">
                            <h2 class="text-center">Tambah Siswa</h2>
                            <form action="siswaProses.php" method="post" class="w-100">
                                <div class="form-group mb-3">
                                    <label for="nisn">Nisn:</label>
                                    <input type="number" class="form-control" id="nisn" name="nisn" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="gender" class="form-label">Pilih Gender:</label>
                                    <select name="gender" id="gender" class="form-select" onchange="handleOnChange()">
                                        <option value="none">Pilih Gender</option>
                                        <option value="Laki-Laki">L</option>
                                        <option value="Perempuan">P</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="kelas" class="form-label">Pilih kelas:</label>
                                    <select name="kelas" id="kelas" class="form-select" onchange="handleOnChange()">
                                        <option value="none">Pilih Kelas</option>
                                        <?php
                                        // Koneksi ke database
                                        $conn = new mysqli('localhost', 'root', 'rizkymaulana31', 'testing_presensi2');

                                        // Cek koneksi
                                        if ($conn->connect_error) {
                                            die("Koneksi gagal: " . $conn->connect_error);
                                        }

                                        // Query untuk mengambil daftar kelas yang unik
                                        $sql = "SELECT DISTINCT(nama_kelas) FROM tabel_kelas";
                                        $result = $conn->query($sql);

                                        // Tampilkan opsi kelas
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $selected = ($kelasDipilih == $row['nama_kelas']) ? 'selected' : '';
                                                echo "<option value='" . $row['nama_kelas'] . "' $selected>" . $row['nama_kelas'] . "</option>";
                                            }
                                        }

                                        // Tutup koneksi
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tanggallahir">Tanggal lahir:</label>
                                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
        var isAlertVisible = false; // Variabel untuk melacak status notifikasi

// Fungsi untuk membuat dan menampilkan alert baru
function createAlert(message) {
    if (!isAlertVisible) {
        isAlertVisible = true;

        // Membuat elemen div untuk alert baru
        var alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-success alert-dismissible fade show floating-alert';
        alertDiv.role = 'alert';
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;

        // Menambahkan alert baru ke dalam body
        document.body.appendChild(alertDiv);

        // Menghilangkan alert secara otomatis setelah 2 detik
        setTimeout(function() {
            alertDiv.remove(); // Menghapus alert dari DOM
            isAlertVisible = false;
        }, 2000);

        // Mengatur agar status diperbarui jika alert ditutup secara manual
        alertDiv.addEventListener('closed.bs.alert', function() {
            isAlertVisible = false;
        });
    }
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>