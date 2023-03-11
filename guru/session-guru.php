<?php
include "../koneksi.php";
session_start();
if($_SESSION["level"]!="guru" || empty($_SESSION["login"])){
    header("location:../login.php");
}

?>