<!-- <?php
// $servername = "localhost";
// $username = "root";
// $password = "rizkymaulana31";
// $dbname = "testing_presensi4";

// $conn = new mysqli($servername, $username, $password, $dbname);

// $sql = "SELECT statusSiswa_presensi, COUNT(statusSiswa_presensi) as jumlah FROM tabel_presensi GROUP BY status";
// $result = $conn->query($sql);

// $jumlah_hadir = 0;
// $jumlah_sakit = 0;
// $jumlah_izin = 0;
// $jumlah_alpha = 0;

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         switch ($row["statusSiswa_presensi"]) {
//             case 'Hadir':
//                 $jumlah_hadir = $row["jumlah"];
//                 break;
//             case 'Sakit':
//                 $jumlah_sakit = $row["jumlah"];
//                 break;
//             case 'Izin':
//                 $jumlah_izin = $row["jumlah"];
//                 break;
//             case 'Alpha':
//                 $jumlah_alpha = $row["jumlah"];
//                 break;
//         }
//     }
// }

// $conn->close();

?>  -->

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
    <link href="../../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
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
                    <!-- <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Guru</th>
                                <th>Kelas Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Status Siswa</th>
                                <th>Waktu Presensi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // $servername = "localhost";
                            // $username = "root";
                            // $password = "rizkymaulana31";
                            // $dbname = "testing_presensi4";

                            // $conn = new mysqli($servername, $username, $password, $dbname);

                            // if ($conn->connect_error) {
                            //     die("Connection failed: " . $conn->connect_error);
                            // }

                            // $sql = "SELECT * FROM tabel_presensi where statusSiswa_presensi = 'Hadir'";
                            // $result = $conn->query($sql);

                            // if ($result->num_rows > 0) {

                            //     while ($row = $result->fetch_assoc()) {
                            //         echo "<tr>";
                            //         echo "<td>" . $row["id_presensi"] . "</td>";
                            //         echo "<td>" . $row["namaGuru_presensi"] . "</td>";
                            //         echo "<td>" . $row["kelasSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["namaSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["statusSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["waktu_presensi"] . "</td>";
                            //         echo "</tr>";
                            //     }
                            // } else {
                            //     echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                            // }

                            // $conn->close();
                            ?>
                        </tbody>
                    </table> -->
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
                    <!-- <table id="datatablesSimple" class="table table-bordered sticky-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Guru</th>
                                <th>Kelas Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Status Siswa</th>
                                <th>Waktu Presensi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // $servername = "localhost";
                            // $username = "root";
                            // $password = "rizkymaulana31";
                            // $dbname = "testing_presensi4";

                            // $conn = new mysqli($servername, $username, $password, $dbname);

                            // if ($conn->connect_error) {
                            //     die("Connection failed: " . $conn->connect_error);
                            // }

                            // $sql = "SELECT * FROM tabel_presensi where statusSiswa_presensi = 'Sakit'";
                            // $result = $conn->query($sql);

                            // if ($result->num_rows > 0) {

                            //     while ($row = $result->fetch_assoc()) {
                            //         echo "<tr>";
                            //         echo "<td>" . $row["id_presensi"] . "</td>";
                            //         echo "<td>" . $row["namaGuru_presensi"] . "</td>";
                            //         echo "<td>" . $row["kelasSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["namaSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["statusSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["waktu_presensi"] . "</td>";
                            //         echo "</tr>";
                            //     }
                            // } else {
                            //     echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                            // }

                            // $conn->close();
                            ?>
                        </tbody>
                    </table> -->
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
                    <!-- <table id="datatablesSimple" class="table table-bordered sticky-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Guru</th>
                                <th>Kelas Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Status Siswa</th>
                                <th>Waktu Presensi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // $servername = "localhost";
                            // $username = "root";
                            // $password = "rizkymaulana31";
                            // $dbname = "testing_presensi4";

                            // $conn = new mysqli($servername, $username, $password, $dbname);

                            // if ($conn->connect_error) {
                            //     die("Connection failed: " . $conn->connect_error);
                            // }

                            // $sql = "SELECT * FROM tabel_presensi where statusSiswa_presensi = 'Izin'";
                            // $result = $conn->query($sql);

                            // if ($result->num_rows > 0) {

                            //     while ($row = $result->fetch_assoc()) {
                            //         echo "<tr>";
                            //         echo "<td>" . $row["id_presensi"] . "</td>";
                            //         echo "<td>" . $row["namaGuru_presensi"] . "</td>";
                            //         echo "<td>" . $row["kelasSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["namaSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["statusSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["waktu_presensi"] . "</td>";
                            //         echo "</tr>";
                            //     }
                            // } else {
                            //     echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                            // }

                            // $conn->close();
                            ?>
                        </tbody>
                    </table> -->
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
                    <!-- <table id="datatablesSimple" class="table table-bordered sticky-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Guru</th>
                                <th>Kelas Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Status Siswa</th>
                                <th>Waktu Presensi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // $servername = "localhost";
                            // $username = "root";
                            // $password = "rizkymaulana31";
                            // $dbname = "testing_presensi4";

                            // $conn = new mysqli($servername, $username, $password, $dbname);

                            // if ($conn->connect_error) {
                            //     die("Connection failed: " . $conn->connect_error);
                            // }

                            // $sql = "SELECT * FROM tabel_presensi where statusSiswa_presensi = 'Alpha'";
                            // $result = $conn->query($sql);

                            // if ($result->num_rows > 0) {

                            //     while ($row = $result->fetch_assoc()) {
                            //         echo "<tr>";
                            //         echo "<td>" . $row["id_presensi"] . "</td>";
                            //         echo "<td>" . $row["namaGuru_presensi"] . "</td>";
                            //         echo "<td>" . $row["kelasSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["namaSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["statusSiswa_presensi"] . "</td>";
                            //         echo "<td>" . $row["waktu_presensi"] . "</td>";
                            //         echo "</tr>";
                            //     }
                            // } else {
                            //     echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                            // }

                            // $conn->close();
                            ?>
                        </tbody>
                    </table> -->
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
                    <div class="small">Logged in as:</div>locak
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <!-- End Sidebar -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>


                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Hadir : <?php echo $jumlah_hadir ?></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#myModal">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Sakit : <?php echo $jumlah_sakit ?></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#myModal1">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Izin : <?php echo $jumlah_izin ?></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#myModal2">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Alpha : <?php echo $jumlah_alpha ?></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#myModal3">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Analisa kehadiran
                                </div>
                                <div class="card-body"><canvas id="barChart" width="100%" height="350"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Analisa kehadiran
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="350"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Presensi
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Guru</th>
                                        <th>Kelas Siswa</th>
                                        <th>Nama Siswa</th>
                                        <th>Status Siswa</th>
                                        <th>Waktu Presensi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    include "../proses-dashboard/connect.php";

                                    $sql = "SELECT * FROM tabel_presensi";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data setiap baris
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["id_presensi"] . "</td>";
                                            echo "<td>" . $row["namaGuru_presensi"] . "</td>";
                                            echo "<td>" . $row["kelasSiswa_presensi"] . "</td>";
                                            echo "<td>" . $row["namaSiswa_presensi"] . "</td>";
                                            echo "<td>" . $row["statusSiswa_presensi"] . "</td>";
                                            echo "<td>" . $row["waktu_presensi"] . "</td>";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../../js/datatables-simple-demo.js"></script>
    <script>
        const ctx = document.getElementById('barChart').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                        label: 'Hadir',
                        data: [110, 120, 130, 140, 150, 160, 170, 180, 190, 200, 210, 220],
                        borderColor: 'green',
                        backgroundColor: 'rgba(0, 255, 0, 0.2)',
                        fill: true
                    },
                    {
                        label: 'Sakit',
                        data: [10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65],
                        borderColor: 'yellow',
                        backgroundColor: 'rgba(255, 255, 0, 0.2)',
                        fill: true
                    },
                    {
                        label: 'Izin',
                        data: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60],
                        borderColor: 'blue',
                        backgroundColor: 'rgba(0, 0, 255, 0.2)',
                        fill: true
                    },
                    {
                        label: 'Alpha',
                        data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                        borderColor: 'red',
                        backgroundColor: 'rgba(255, 0, 0, 0.2)',
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: '#ffffff'
                        }
                    },
                    y: {
                        ticks: {
                            color: '#ffffff'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#ffffff'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItem) {
                                return tooltipItem[0].label;
                            }
                        },
                        backgroundColor: '#000000',
                        titleColor: '#ffffff'
                    }
                }
            }
        });
    </script>
</body>

</html>