<?php
include "../koneksi.php";
session_start();
if($_SESSION['level']!='siswa' || empty($_SESSION['login'])){
    header("location:../login.php");
}


?>