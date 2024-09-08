<?php
session_start();
?>
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
    <!-- Navbar -->
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
                                <a class="nav-link" href="presensi.php">Presensi</a>
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

        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main>
            <div class="container mt-5 d-flex flex-column gap-3">
        <h2 class="mb-4">Form Pembuatan Sesi Presensi</h2>
        <form action="prosesBuatSesi.php" method="post">
            <div class="form-group mb-4">
                <label for="namaSesi">Nama Sesi:</label>
                <input class="form-control" type="text" name="namaSesi" id="namaSesi" placeholder="Masukkan nama sesi ..." required>
            </div>

            <div class="form-group mb-4">
                <label for="group">Pilih Grup:</label>
                <select id="group" name="group" class="form-control" required>
                    <option value="">-- Pilih Grup --</option>
                    <option value="Group A">Group A</option>
                    <option value="Group B">Group B</option>
                    <option value="Group C">Group C</option>
                    <!-- Tambahkan grup sesuai kebutuhan -->
                </select>
            </div>

            <div class="form-group d-flex gap-3 mb-4">
                <label>Pilih Hari Sesi:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="days[]" value="Monday" id="monday">
                    <label class="form-check-label" for="monday">Senin</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="days[]" value="Tuesday" id="tuesday">
                    <label class="form-check-label" for="tuesday">Selasa</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="days[]" value="Wednesday" id="wednesday">
                    <label class="form-check-label" for="wednesday">Rabu</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="days[]" value="Thursday" id="thursday">
                    <label class="form-check-label" for="thursday">Kamis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="days[]" value="Friday" id="friday">
                    <label class="form-check-label" for="friday">Jumat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="days[]" value="Saturday" id="saturday">
                    <label class="form-check-label" for="saturday">Sabtu</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="days[]" value="Sunday" id="sunday">
                    <label class="form-check-label" for="sunday">Minggu</label>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="start_date">Tanggal Awal:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>

            <div class="form-group mb-4">
                <label for="end_date">Tanggal Akhir:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>

            <div class="form-group mb-4">
                <label for="start_time">Jam Mulai:</label>
                <input type="time" id="start_time" name="start_time" class="form-control" required>
            </div>

            <div class="form-group mb-4">
                <label for="end_time">Jam Selesai:</label>
                <input type="time" id="end_time" name="end_time" class="form-control" required>
            </div>

            <div class="form-group mb-4">
                <label for="repeat_interval">Ulangi Sesi Setiap:</label>
                <select id="repeat_interval" name="repeat_interval" class="form-control" required>
                    <option value="1">1 Minggu</option>
                    <option value="2">2 Minggu</option>
                    <option value="3">3 Minggu</option>
                    <option value="4">4 Minggu</option>
                    <!-- Tambahkan interval sesuai kebutuhan -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Buat Sesi</button>
        </form>
    </div>

            </main>
            <div id="layoutAuthentication_footer">
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
        <!-- End Main Content -->
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>