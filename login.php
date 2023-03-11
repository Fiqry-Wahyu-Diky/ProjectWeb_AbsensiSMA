<?php
include "koneksi.php";
session_start();
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    // echo $username;die;
    $password = $_POST["password"];
    $login = mysqli_query($koneksi,"SELECT*FROM siswa WHERE username = '$username' AND password = '$password'");
    // var_dump($login);die;
    $cek = mysqli_num_rows($login);

    if($cek > 0){
        $data = mysqli_fetch_assoc($login);
        if($data['level'] == "siswa"){
            $_SESSION['login'] = true;
            $_SESSION['nama_siswa'] = $data['nama_siswa'];
            $_SESSION['username'] = $username;
            $_SESSION['level']   = "siswa";
            $_SESSION['password'] = $password;
            $_SESSION['NIS'] = $data['NIS'];
            $_SESSION['kelas'] = $data['kelas'];
            $_SESSION['jurusan'] = $data['jurusan'];
            $_SESSION['id'] = $data['id_siswa'];

            header("location:siswa/dashboard-siswa.php");
        }
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login siswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="templatess/tampilan-login/login-form/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
                        <a href="landing.php"><i class="fa fa-arrow-left"></i></a>
		      	        <div class="icon d-flex align-items-center justify-content-center">
		      		        <span class="fa fa-user-o"></span>
		      	        </div>
		      	        <h3 class="text-center mb-4">Sign In Siswa</h3>
						<form action="#" method="POST" class="login-form">
		      		        <div class="form-group">
		      			        <input type="text" class="form-control rounded-left" name="username" placeholder="Username" required>
		      		        </div>
	                        <div class="form-group d-flex">
	                            <input type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
	                        </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>
	                        <div class="form-group d-md-flex">	            	
                                <div class="w-50 text-md-left">
                                    <a href="login-guru.php">Login sebagai guru</a>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="login-admin.php">Login sebagai admin</a>
                                </div>
	                        </div>
	                    </form>
	                </div>
				</div>
			</div>
		</div>
	</section>

    <script src="templatess/tampilan-login/login-form/js/jquery.min.js"></script>
  <script src="templatess/tampilan-login/login-form/js/popper.js"></script>
  <script src="templatess/tampilan-login/login-form/js/bootstrap.min.js"></script>
  <script src="templatess/tampilan-login/login-form/js/main.js"></script>

	</body>
</html>

