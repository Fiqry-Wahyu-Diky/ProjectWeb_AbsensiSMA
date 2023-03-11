<?php
    include "../koneksi.php";
    require ("session-admin.php");
    error_reporting(0);
    if(isset($_POST["submit"])){
        $search = $_POST["search"];
    }
    if($search == ''){
        $tampil_siswa = "SELECT*FROM siswa";
        $hasil_tampil = mysqli_query($koneksi,$tampil_siswa);
    }else{
        $tampil_siswa = "SELECT*FROM siswa WHERE
            nama_siswa LIKE '%".$search."%' OR
            NIS  LIKE '%".$search."%' OR
            jenis_kelamin LIKE '%".$search."%' OR
            tanggal_lahir LIKE '%".$search."%' OR
            kelas LIKE '%".$search."%' OR
            jurusan LIKE '%".$search."%' OR
            username  LIKE '%".$search."%'";

        $hasil_tampil = mysqli_query($koneksi,$tampil_siswa);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Data Siswa</title>

    <!-- Custom fonts for this template-->
    <link href="../templatess/tampilan-body/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../templatess/tampilan-body/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard-admin.php">
                <div class="sidebar-brand-text mx-2">ADMIN | SMA NEGERI 3 NGANJUK</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard-admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-university fa-cog"></i>
                    <span>Data Akademik</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="data-siswa.php">Data Siswa</a>
                        <a class="collapse-item" href="data-guru.php">Data Guru</a>
                        <a class="collapse-item" href="data-absensi.php">Data Absensi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="logout.php" 
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h4 class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION["nama_admin"]?></h4>                                 
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
                    </div>

                    <!-- Content Row -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-2">
                        <div class="card-header row m-0">
                            <div class="col-xl-3 mb-2">
                                <a href="form-tambah-siswa.php">
                                    <button class="btn btn-primary ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>&nbsp Tambah Data
                                    </button>
                                </a>
                            </div>
                            <div class="col-xl-3 justify-content-end" style="margin-left:auto ;">
                                <form action="" method="POST">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-1 small" name="search" placeholder="Search for..."
                                            aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" name="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>NAMA</th>
                                            <th>NIS</th>
                                            <th>JK</th>
                                            <th>TANGGAL LAHIR</th>
                                            <th>KELAS</th>
                                            <th>JURUSAN</th>
                                            <th>USERNAME</th>
                                            <th>PASSWORD</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($rows=mysqli_fetch_assoc($hasil_tampil)){
                                        ?>
                                        <tr>
                                            <td hidden><?=$rows["id_siswa"]?></td>
                                            <td><?=$rows["nama_siswa"]?></td>
                                            <td><?=$rows["NIS"]?></td>
                                            <td><?=$rows["jenis_kelamin"]?></td>
                                            <td><?=$rows["tanggal_lahir"]?></td>
                                            <td><?=$rows["kelas"]?></td>
                                            <td><?=$rows["jurusan"]?></td>
                                            <td><?=$rows["username"]?></td>
                                            <td><?=$rows["password"]?></td>
                                            <td>
                                                <a href="action/edit-siswa.php?idsiswa=<?=$rows["id_siswa"]?>"><i style="color: green;" class="fas fa-edit"></i></a>
                                                <a href="action/hapus-siswa.php?idsiswa=<?=$rows["id_siswa"];?>"><i style="color: red;" class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

                    <!-- Content Row -->
                    

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../templatess/tampilan-body/vendor/jquery/jquery.min.js"></script>
    <script src="../templatess/tampilan-body/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../templatess/tampilan-body/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../templatess/tampilan-body/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../templatess/tampilan-body/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../templatess/tampilan-body/js/demo/chart-area-demo.js"></script>
    <script src="../templatess/tampilan-body/js/demo/chart-pie-demo.js"></script>

</body>

</html>