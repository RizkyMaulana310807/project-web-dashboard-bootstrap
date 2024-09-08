<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link rel="icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <link href="../../css/styles.css" rel="stylesheet"/>
    <link href="../../css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../../font/fontawesome/css/all.min.css">
    <script src="../../js/scripts.js"></script>
    <script src="../../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../js/datatables-simple-demo.js"></script>
</head>

<body class="sb-nav-fixed">

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
                                <a class="nav-link" href="../proses-dashboard/tambahSiswa.php">Siswa</a>
                                <a class="nav-link" href="../proses-dashboard/tambahGuru.php">Guru</a>
                                <a class="nav-link" href="../proses-dashboard/buatSesi.php">Tambah Sesi</a>
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
            <!-- Konten utama akan ditempatkan di sini -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>GENDER</th>
                                <th>ID GURU</th>
                                <th>ID KELAS</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include "../proses-dashboard/connect.php";

                            $sql = "SELECT * FROM tabel_guru";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output data setiap baris
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id_guru"] . "</td>";
                                    echo "<td>" . $row["nik_guru"] . "</td>";
                                    echo "<td>" . $row["nama_guru"] . "</td>";
                                    echo "<td>" . $row["gender_guru"] . "</td>";
                                    echo "<td>" . $row["idGuru"] . "</td>";
                                    echo "<td>" . $row["idKelas"] . "</td>";
                                    echo "<td>";
                                    echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editModal' data-id='" . $row["id_guru"] . "' data-nik='" . $row["nik_guru"] . "' data-nama='" . $row["nama_guru"] . "' data-gender='" . $row["gender_guru"] . "' data-idguru='" . $row["idGuru"] . "' data-idkelas='" . $row["idKelas"] . "'>Edit</button>";
                                    echo "<button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal' data-id='" . $row["id_guru"] . "'>Hapus</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
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
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <form id="editForm">
                    <div class="modal-body">
                        <input type="hidden" id="editId" name="id_guru">
                        <div class="mb-3">
                            <label for="editNIK" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="editNIK" name="nik_guru" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="editNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="editNama" name="nama_guru">
                        </div>
                        <div class="mb-3">
                            <label for="editGender" class="form-label">Gender</label>
                            <select class="form-select" id="editGender" name="gender_guru">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editIdGuru" class="form-label">ID Guru</label>
                            <input type="text" class="form-control" id="editIdGuru" name="idGuru">
                        </div>
                        <div class="mb-3">
                            <label for="editIdKelas" class="form-label">ID Kelas</label>
                            <input type="text" class="form-control" id="editIdKelas" name="idKelas">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapusnya ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script>
        // Edit Modal Event
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nik = button.getAttribute('data-nik');
            var nama = button.getAttribute('data-nama');
            var gender = button.getAttribute('data-gender');
            var idGuru = button.getAttribute('data-idguru');
            var idKelas = button.getAttribute('data-idkelas');

            console.log({
                id,
                nik,
                nama,
                gender,
                idGuru,
                idKelas
            }); // Debugging output

            var modal = editModal.querySelector('form');
            modal.querySelector('#editId').value = id;
            modal.querySelector('#editNIK').value = nik;
            modal.querySelector('#editNama').value = nama;
            modal.querySelector('#editGender').value = gender;
            modal.querySelector('#editIdGuru').value = idGuru;
            modal.querySelector('#editIdKelas').value = idKelas;
        });


        // Edit Form Submit
        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            // Debugging output
            for (var [key, value] of formData.entries()) {
                console.log(key + ': ' + value);
            }

            fetch('../proses-dashboard/updateGuru.php', {
                    method: 'POST',
                    body: formData
                }).then(response => response.text())
                .then(result => {
                    alert(result); // Show server response
                    window.location.reload();
                }).catch(error => {
                    console.error('Error:', error);
                });
        });



        // Delete Modal Event
        var deleteModal = document.getElementById('deleteModal');
        var deleteId = null;

        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            deleteId = button.getAttribute('data-id');
        });

        // Confirm Delete
        document.getElementById('confirmDelete').addEventListener('click', function() {
            fetch('../proses-dashboard/deleteGuru.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'id=' + encodeURIComponent(deleteId)
                }).then(response => response.text())
                .then(result => {
                    alert('Data deleted successfully');
                    window.location.reload();
                }).catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>