<?php 
session_start(); // Mulai sesi
// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Jika belum login, arahkan ke login.php
    exit; // Hentikan eksekusi skrip lebih lanjut
}
if (isset($_POST{'logout'})) {
    session_unset();
    session_destroy();
    header(header: "location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Navigasi dengan Banyak File</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

    <div class="navbar">
        <a href="https://raudhah.ac.id/"><img src="Logo.png" width="100px"></a>
        <a href="#" onclick="loadPage('beranda.php')">Beranda</a>
        <a href="#" onclick="loadPage('pendaftaran.php')">Pendaftaran</a>
        <a href="#" onclick="loadPage('kontak.php')">Kontak</a>
        <a href="#" onclick="loadPage('datasantri.php')">Data Calon Santri</a>
        <form action="" method="POST">
            <button type="submit" name="logout"class="logout-btn">logout</button>
        </form>

        
    </div>

    <div class="content" id="content">
        <!-- Konten dari file HTML akan dimuat di sini -->
        <h1>Selamat Datang di Halaman Utama</h1>
        <p>Mari Telusuri Lebih Lanjut Di Menu Yang Telah Tersedia</p>
    </div>

    <script src="script.js">
    </script>

</body>
</html>
