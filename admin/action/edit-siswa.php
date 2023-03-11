<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../../templatess/tampilan-form/style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--<title>Responsive Regisration Form </title>--> 
</head>
<body>
    <?php
        include "../../koneksi.php";
        $id = $_GET["idsiswa"];
        $tampil = mysqli_query($koneksi,"SELECT*FROM siswa WHERE id_siswa = $id");
        if(isset($_POST["update"])){
            $id = $_POST["id_siswa"];
            $nama = $_POST["nama"];
            $nis = $_POST["nis"];
            $jenis_kelamin = $_POST["jenis_kelamin"];
            $tanggal_lahir = $_POST["tanggal_lahir"];
            $kelas = $_POST["kelas"];
            $jurusan = $_POST["jurusan"];
            $username = $_POST["username"];
            $password = $_POST["password"];

                $edit_siswa = "UPDATE siswa SET 
                    nama_siswa = '$nama',
                    NIS = '$nis',
                    jenis_kelamin = '$jenis_kelamin',
                    tanggal_lahir = '$tanggal_lahir',
                    kelas = '$kelas',
                    jurusan = '$jurusan',
                    username = '$username',
                    password = '$password',
                    level = 'siswa' WHERE id_siswa = $id";
                // var_dump($edit_siswa);die;

                $hasil = mysqli_query($koneksi,$edit_siswa);
                // var_dump($hasil);
                // echo "<script>alert('data siswa berhasil ditambahkan');document.location.href='data-siswa.php'</script>";
                if($hasil){ ?>
                    <script>
                    Swal.fire({
                        title: 'BERHASIL',
                        text: "Data Siswa DiUpdate",
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "../data-siswa.php";
                        }
                    })
                </script>
                <?php }
        }
    ?>



    <div class="container">
        <header>Registration Data Siswa</header>
<?php
    while ($rows =mysqli_fetch_assoc($tampil)){
        ?>
        <form action="" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Detail Siswa</span>

                    <input hidden name="id_siswa" type="text" placeholder="Nama lengkap" required value="<?=$rows["id_siswa"]?>">
                    <div class="fields">
                        <div class="input-field">
                            <label>Nama</label>
                            <input name="nama" type="text" placeholder="Nama lengkap" required value="<?=$rows["nama_siswa"]?>">
                        </div>
                        
                        <div class="input-field">
                            <label>NIS</label>
                            <input name="nis" type="text" placeholder="NIS" required value="<?=$rows["NIS"]?>">
                        </div>
                        
                        <div class="input-field">
                            <label>Jenis Kelamin</label>
                            <select  name="jenis_kelamin" required>
                                <option disabled selected>--Pilih Jenis Kelamin--</option>
                                <option value="laki-laki" required>Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" placeholder="Tanggal Lahir" required value="<?=$rows["tanggal_lahir"]?>">
                        </div>

                        <div class="input-field">
                            <label>Kelas</label>
                            <select required name="kelas" value="<?=$rows["kelas"]?>">
                                <option disabled selected>--Pilih Kelas--</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Jurusan</label>
                            <select required name="jurusan" value="<?=$rows["jurusan"]?>">
                                <option disabled selected>--Pilih jurusan--</option>
                                <option value="IPA">IPA</option>
                                <option value="IPS">IPS</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Username</label>
                            <input name="username" type="text" placeholder="Username" required value="<?=$rows["username"]?>">
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input name="password" type="password" placeholder="Password Baru" required>
                        </div>
                    </div>
                </div>

                    <div class="buttons">
                        <a href="../data-siswa.php" style="margin-right: 10px;">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                                <span class="btnText" style="color: white;">Back</span>
                            </div>
                        </a>
                        
                        <button class="sumbit" type="submit" name="update">
                            <span class="btnText ">Update</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
        <?php } ?>
    </div>

    <!--<script src="script.js"></script>-->
</body>
</html>
