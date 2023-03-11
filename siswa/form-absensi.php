<?php
include "../koneksi.php";
require "session-siswa.php";
// session_start();

?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../templatess/tampilan-form/style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--<title>Responsive Regisration Form </title>--> 
</head>
<body>
    <?php
        include "../koneksi.php";
        if(isset($_POST["submit"])){
            $nama           = $_SESSION["nama_siswa"];
            $nis            = $_SESSION["NIS"];
            $kelas          = $_POST["kelas"]       ;
            $jurusan        = $_POST["jurusan"];
            $tanggal        = date("d-m-Y");
            $keterangan     = $_POST["keterangan"];

            $cek_absensi = mysqli_query($koneksi,"SELECT*FROM absensi WHERE NIS = '$nis' AND tanggal = '$tanggal'");
            if(mysqli_num_rows($cek_absensi) == 0){
                $tambah_absensi= "INSERT INTO absensi VALUES(
                    NULL,
                    '$nis',
                    '$nama',
                    '$kelas',
                    '$jurusan',
                    '$tanggal',
                    '$keterangan'
                )";
                // var_dump($tambah);die;
                $hasil = mysqli_query($koneksi,$tambah_absensi);
                // echo $hasil;die;
                if($hasil){?>
                    <script>
                    Swal.fire({
                        title: 'BERHASIL',
                        text: "Anda berhasil absen",
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "dashboard-siswa.php";
                        }
                    })
                </script>
                <?php
                }
            }else{
                echo "<script>Swal.fire('ERROR','Anda sudah absen hari ini','error')</script>";
            }
        }
    ?>
    <div class="container">
        <header>ABSENSI</header>

        <form action="" method="POST">
            <div class="form first">
                <div class="details personal">

                    <div class="fields">
                        <div class="input-field">
                            <label>Nama</label>
                            <input style="background-color: #C1C1C1;" name="nama" type="text" placeholder="Nama lengkap" disabled required value="<?=$_SESSION["nama_siswa"]?>">
                        </div>
                        
                        <div class="input-field">
                            <label>NIS</label>
                            <input style="background-color: #C1C1C1;" name="nis" type="text" placeholder="NIS" disabled required value="<?=$_SESSION["NIS"]?>">
                        </div>
                        
                        <div class="input-field">
                            <label>Kelas</label>
                            <select required name="kelas">
                                <option disabled selected>--Pilih Kelas--</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Jurusan</label>
                            <select required name="jurusan">
                                <option disabled selected>--Pilih jurusan--</option>
                                <option value="IPA">IPA</option>
                                <option value="IPS">IPS</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Tanggal</label>
                            <input name="tanggal" type="text" placeholder="tanggal" value="<?= date("d-m-Y")?>" required>
                        </div>

                        <div class="input-field">
                            <label>KETERANGAN</label>
                            <select required name="keterangan">
                                <option disabled selected>--Pilih keterangan--</option>
                                <option value="hadir">HADIR</option>
                                <option value="izin">IZIN</option>
                                <option value="alasan">ALASAN</option>
                            </select>
                        </div>
                    </div>
                </div>

                    <div class="buttons">
                        <a href="dashboard-siswa.php" style="margin-right: 10px;">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                                <span class="btnText" style="color: white;">Back</span>
                            </div>
                        </a>
                        
                        <a href="">
                        <button class="sumbit" type="submit" name="submit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                        </a>
                    </div>
                </div> 
            </div>
        </form>
    </div>

    <!--<script src="script.js"></script>-->
</body>
</html>
