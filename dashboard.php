<?php
session_start();
if (!isset($_SESSION['username'])) {
    // User is already logged in, redirect to welcome page  
    header("Location: login.php");

    exit();

}

$username = $_SESSION['username'];

// Buat nama file untuk menyimpan jumlah login per user
$file = "login_count_{$username}.txt";

// Cek apakah file sudah ada, jika ya ambil isinya, kalau belum mulai dari 0
if (file_exists($file)) {
    $count = (int)file_get_contents($file);
} else {
    $count = 0;
}

// Tambah 1 setiap kali halaman dibuka
$count++;

// Simpan kembali ke file
file_put_contents($file, $count);

if(!isset($_SESSION["daftar"])){
    $_SESSION["daftar"] = [];

}
if(isset($_POST["nama"]) && isset($_POST["umur"])){
    $daftar = [
        "nama"=> $_POST["nama"],
        "umur"=> $_POST["umur"]
    ];

    $_SESSION["daftar"][]=$daftar;
}

?>
<html>
    <head>
        <title>::Login Page::</title>
        <style type="text/css">
            body{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
        </style>
            <title>Dashboard</title>

            <head>
        <title>::Login Page::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-size: cover;
                background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
            }
            table{
                background-color: white;
                border: 3px solid grey;
                padding: 20px;
                border-radius: 10px;
                font-family:Arial, Helvetica, sans-serif;
            }
            td{
                padding: 5px;
            }
            button{
                background-color: greenyellow;
                padding: 10px;
                border-radius: 5px;
            }
            #logout {
                background-color:rgb(236, 80, 80);
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <h1><?php echo "Selamat datang " . $username . " ke-" . $count  ; ?></h1>
            <form action="dashboard.php" method="post">
         <table>
            <tr>
                <td colspan="2" style="text-align: center;" >DAFTAR</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" /></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="text" name="umur" /></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit" >SUBMIT</button>
                    <a href="logout.php">
                        <button id="logout" type="button" >LOGOUT</button>
                    </a>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>Nama</td>
                <td>Umur</td>
            </tr>
                <?php foreach($_SESSION["daftar"] as $daftar): ?>
                 <tr>
                    <td><?php echo $daftar["nama"] ?></td>
                    <td><?php echo $daftar["umur"] ?></td>
                 </tr>
                 <?php endforeach; ?>
        </table>
        </form>
    </body>
</html>