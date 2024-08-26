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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <!-- Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.php">Start Bootstrap</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
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
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Content
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
                            Tambah Data
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

        <!-- Main Content Placeholder -->
        <div id="layoutSidenav_content">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Siswa
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>ID Kelas</th>
                                <th>Gender</th>
                                <th>Tanggal Lahir</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "rizkymaulana31";
                            $dbname = "testing_presensi";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM tabel_siswa";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output data setiap baris
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id_siswa"] . "</td>";
                                    echo "<td>" . $row["nisn_siswa"] . "</td>";
                                    echo "<td>" . $row["nama_siswa"] . "</td>";
                                    echo "<td>" . $row["idKelas_siswa"] . "</td>";
                                    echo "<td>" . $row["gender_siswa"] . "</td>";
                                    echo "<td>" . $row["tgllahir_siswa"] . "</td>";
                                    echo "<td>";
                                    echo "<button class='btn btn-primary btn-edit' data-id='" . $row["id_siswa"] . "' data-nisn='" . $row["nisn_siswa"] . "' data-nama='" . $row["nama_siswa"] . "' data-idkelas='" . $row["idKelas_siswa"] . "' data-gender='" . $row["gender_siswa"] . "' data-tgllahir='" . $row["tgllahir_siswa"] . "' data-bs-toggle='modal' data-bs-target='#editSiswaModal'>Edit</button> ";
                                    echo "<button class='btn btn-danger btn-delete' data-id='" . $row["id_siswa"] . "' data-bs-toggle='modal' data-bs-target='#deleteSiswaModal'>Delete</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Main Content Placeholder -->
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editSiswaModal" tabindex="-1" aria-labelledby="editSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSiswaModalLabel">Edit Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSiswaForm">
                        <input type="hidden" id="editId" name="id_siswa">
                        <div class="mb-3">
                            <label for="editNISN" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="editNISN" name="nisn_siswa">
                        </div>
                        <div class="mb-3">
                            <label for="editNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="editNama" name="nama_siswa">
                        </div>
                        <div class="mb-3">
                            <label for="editIdKelas" class="form-label">ID Kelas</label>
                            <input type="text" class="form-control" id="editIdKelas" name="idKelas_siswa">
                        </div>
                        <div class="mb-3">
                            <label for="editGender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="editGender" name="gender_siswa">
                        </div>
                        <div class="mb-3">
                            <label for="editTglLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="editTglLahir" name="tgllahir_siswa">
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteSiswaModal" tabindex="-1" aria-labelledby="deleteSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSiswaModalLabel">Delete Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="deleteSiswaForm">
                        <input type="hidden" id="deleteId" name="id_siswa">
                        <p>Are you sure you want to delete this record?</p>
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Populate edit modal
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', () => {
                const modal = new bootstrap.Modal(document.getElementById('editSiswaModal'));
                document.getElementById('editId').value = button.getAttribute('data-id');
                document.getElementById('editNISN').value = button.getAttribute('data-nisn');
                document.getElementById('editNama').value = button.getAttribute('data-nama');
                document.getElementById('editIdKelas').value = button.getAttribute('data-idkelas');
                document.getElementById('editGender').value = button.getAttribute('data-gender');
                document.getElementById('editTglLahir').value = button.getAttribute('data-tgllahir');
                modal.show();
            });
        });

        // Populate delete modal
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', () => {
                const modal = new bootstrap.Modal(document.getElementById('deleteSiswaModal'));
                document.getElementById('deleteId').value = button.getAttribute('data-id');
                modal.show();
            });
        });

        // Handle form submissions
        document.getElementById('editSiswaForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('updateSiswa.php', {
                method: 'POST',
                body: formData
            }).then(response => response.text())
              .then(data => {
                  alert('Data updated successfully');
                  window.location.reload();
              }).catch(error => console.error('Error:', error));
        });

        document.getElementById('deleteSiswaForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('deleteSiswa.php', {
                method: 'POST',
                body: formData
            }).then(response => response.text())
              .then(data => {
                  alert('Data deleted successfully');
                  window.location.reload();
              }).catch(error => console.error('Error:', error));
        });
    </script>

    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
