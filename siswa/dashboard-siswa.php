<?php
    include "../koneksi.php";
    require "session-siswa.php";
    // session_start();
    $nis = $_SESSION['NIS'];
    $tampil = "SELECT*FROM absensi WHERE NIS = $nis ORDER BY tanggal DESC";
    $hasil = mysqli_query($koneksi,$tampil);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB siswa - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../templatess/tampilan-body/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../templatess/tampilan-body/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard-siswa.php">
                <div class="sidebar-brand-text mx-2">SISWA | SMA NEGERI 3 NGANJUK</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard-siswa.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



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

                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <b>Hari ini : <?php  echo date("d-F-Y")?></b>
                            
                        </div>
                    </div>

                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mr-2 d-none d-lg-inline text-gray-600"><?= $_SESSION["nama_siswa"]?></h5>                                
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <br>
                    </div>
                    <a href="form-absensi.php">
                        <button class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i>&ensp;Tambah Absensi
                        </button>
                    </a>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-2">
                        <div class="card-header row m-0">
                            <div class="col-xl-3 mb-2">
                                <h6 class=" font-weight-bold text-primary">Data Absensi Hari Ini</h6>
                            </div>
                            <!-- <div class="col-xl-3 justify-content-end" style="margin-left:auto ;">
                                <form action="">
                                    <div class="input-group">
                                        <form action="">
                                        <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..."
                                            aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"  style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>NAMA</th>
                                            <th>KELAS</th>
                                            <th>JURSAN</th>
                                            <th>TANGGAL</th>
                                            <th>KETERANGAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if(mysqli_num_rows($hasil)){
                                            while ($rows=mysqli_fetch_assoc($hasil)){
                                        ?>
                                        <tr >
                                            <td><?=$rows["NIS"]?></td>
                                            <td><?=$rows["nama"]?></td>
                                            <td><?=$rows["kelas"]?></td>
                                            <td><?=$rows["jurusan"]?></td>
                                            <td><?=$rows["tanggal"]?></td>
                                            <td><?=$rows["keterangan"]?></td>
                                        </tr>
                                        <?php }}else{ ?>
                                            <tr>
                                                <td colspan="6"><b>Tidak ada data ditampilkan</b></td>
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
                <div class="modal-body">Apakah yakin untuk logout?.</div>
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