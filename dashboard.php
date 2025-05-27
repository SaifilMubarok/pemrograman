<?php
session_start();
if(isset($_SESSION["username"])){
    echo "<h1>Selamat datang, " . $_SESSION["username"];
}else{
    header("location:login.php");
}