<?php
session_start();
if($_SESSION["level"] != "admin" || empty($_SESSION["login"])){
    header("location:../login.php");
}


?>