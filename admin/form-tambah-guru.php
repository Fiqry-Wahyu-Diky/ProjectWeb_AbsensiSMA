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
            $nip            = $_POST["nip"];
            $jenis_kelamin  = $_POST["jenis_kelamin"];
            $tanggal_lahir  = $_POST["tanggal_lahir"];
            $username       = $_POST["username"];
            $password       = $_POST["password"];

            $cek_nip = mysqli_query($koneksi,"SELECT*FROM guru WHERE NIP = '$nip'");
            if(mysqli_num_rows($cek_nip) == 0){
                $tambah_guru= "INSERT INTO guru VALUES(
                    NULL,
                    '$nama',
                    '$nip',
                    '$jenis_kelamin',
                    '$tanggal_lahir',
                    '$username',
                    '$password',
                    'guru'    
                )";
                // var_dump($tambah);die;
                $hasil = mysqli_query($koneksi,$tambah_guru);
                // echo $hasil;die;
                if($hasil){?>
                    <script>
                    Swal.fire({
                        title: 'BERHASIL',
                        text: "Data Guru Ditambahkan",
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "data-guru.php";
                        }
                    })
                </script>
                <?php
                }
            }else{
                echo "<script>Swal.fire('ERROR','NIP sudah terdaftar','error')</script>";
            }
        }
    ?>
    <div class="container">
        <header>Registration Data Guru</header>

        <form action="" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Detail Guru</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nama</label>
                            <input name="nama" type="text" placeholder="Nama lengkap" required>
                        </div>
                        
                        <div class="input-field">
                            <label>NIP</label>
                            <input name="nip" type="text" placeholder="NIP" required>
                        </div>
                        
                        <div class="input-field">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" required>
                                <option disabled selected>--Pilih Jenis Kelamin--</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" placeholder="Tanggal Lahir" required>
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
                        <a href="data-guru.php" style="margin-right: 10px;">
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
