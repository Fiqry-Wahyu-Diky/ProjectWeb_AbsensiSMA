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
        $id = $_GET["idguru"];
        $tampil = "SELECT*FROM guru WHERE id_guru = $id";
        $hasil = mysqli_query($koneksi,$tampil);

        if(isset($_POST["update"])){
            $id             = $_POST["id_guru"];
            $nama           = $_POST["nama"];
            $nip            = $_POST["nip"];
            $jenis_kelamin  = $_POST["jenis_kelamin"];
            $tanggal_lahir  = $_POST["tanggal_lahir"];
            $username       = $_POST["username"];
            $password       = $_POST["password"];

            $edit_guru= "UPDATE guru SET
                nama_guru       ='$nama',
                NIP             ='$nip',
                jenis_kelamin   ='$jenis_kelamin',
                tanggal_lahir   ='$tanggal_lahir',
                username        ='$username',
                password        ='$password',
                level           ='guru'   
                WHERE id_guru   = $id";
            // var_dump($tambah);die;
            $hasil_edit = mysqli_query($koneksi,$edit_guru);
            // echo $hasil_edit;die;
            if($hasil_edit){ ?>
                <script>
                Swal.fire({
                    title: 'BERHASIL',
                    text: "Data Guru DiUpdate",
                    icon: 'success',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "../data-guru.php";
                    }
                })
            </script>
            <?php }
        }
        
    ?>
    <div class="container">
        <header>Edit Data Guru</header>

        <?php 
            while($rows = mysqli_fetch_assoc($hasil)){
        ?>
        <form action="" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Detail Guru</span>
                    <input hidden name="id_guru" type="text" placeholder="id_guru" required value="<?=$rows["id_guru"]?>">
                    <div class="fields">
                        <div class="input-field">
                            <label>Nama</label>
                            <input name="nama" type="text" placeholder="Nama lengkap" required value="<?=$rows["nama_guru"]?>">
                        </div>
                        
                        <div class="input-field">
                            <label>NIP</label>
                            <input name="nip" type="text" placeholder="NIP" required value="<?=$rows["NIP"]?>">
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
                            <input name="tanggal_lahir" type="date" placeholder="Tanggal Lahir" required value="<?=$rows["tanggal_lahir"]?>">
                        </div>

                        <div class="input-field">
                            <label>Username</label>
                            <input name="username" type="text" placeholder="Username" required value="<?=$rows["username"]?>">
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input name="password" type="password" placeholder="Password baru" required >
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
                        <button class="sumbit" type="submit" name="update">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                        </a>
                    </div>
                </div> 
            </div>
        </form>
        <?php } ?>
    </div>

    <!--<script src="script.js"></script>-->
</body>
</html>
