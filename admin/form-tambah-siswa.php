<?php
    require ("session-admin.php");
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
            $nama           = $_POST["nama"];
            $nis            = $_POST["nis"];
            $jenis_kelamin  = $_POST["jenis_kelamin"];
            $tanggal_lahir  = $_POST["tanggal_lahir"];
            $kelas          = $_POST["kelas"];
            $jurusan        = $_POST["jurusan"];
            $username       = $_POST["username"];
            $password       = $_POST["password"];

            $cek_nis = mysqli_query($koneksi,"SELECT*FROM siswa WHERE nis = $nis");
            if(mysqli_num_rows($cek_nis)==0){
                $tambah_siswa = "INSERT INTO siswa VALUES(
                    NULL,
                    '$nama',
                    '$nis',
                    '$jenis_kelamin',
                    '$tanggal_lahir',
                    '$kelas',
                    '$jurusan',
                    '$username',
                    '$password',
                    'siswa'
                )";
                // var_dump($tambah_siswa);die;

                $hasil = mysqli_query($koneksi,$tambah_siswa);
                // var_dump($hasil);
                // echo "<script>alert('data siswa berhasil ditambahkan');document.location.href='data-siswa.php'</script>";
                if($hasil){ ?>
                    <script>
                    Swal.fire({
                        title: 'BERHASIL',
                        text: "Data Siswa Ditambahkan",
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "data-siswa.php";
                        }
                    })
                </script>
                <?php }
            }else{
                echo "<script>Swal.fire('ERROR','NIS sudah terdaftar','error')</script>";
            }
        }
    ?>



    <div class="container">
        <header>Registration Data Siswa</header>

        <form action="" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Detail Siswa</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nama</label>
                            <input name="nama" type="text" placeholder="Nama lengkap" required>
                        </div>
                        
                        <div class="input-field">
                            <label>NIS</label>
                            <input name="nis" type="text" placeholder="NIS" required>
                        </div>
                        
                        <div class="input-field">
                            <label>Jenis Kelamin</label>
                            <select required name="jenis_kelamin">
                                <option disabled selected>--Pilih Jenis Kelamin--</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" placeholder="Tanggal Lahir" required>
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
                            <label>Username</label>
                            <input name="username" type="text" placeholder="Username" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input name="password" type="password" placeholder="Password" required>
                        </div>
                    </div>
                </div>

                    <div class="buttons">
                        <a href="data-siswa.php" style="margin-right: 10px;">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                                <span class="btnText" style="color: white;">Back</span>
                            </div>
                        </a>
                        
                        <button class="sumbit" type="submit" name="submit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>

    <!--<script src="script.js"></script>-->
</body>
</html>
