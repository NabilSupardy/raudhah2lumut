<?php
include("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi input
    if (isset($_POST['username'], $_POST['password'], $_POST['nama_lengkap'])) {
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
        $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);

        // Periksa apakah username sudah ada
        $check_sql = "SELECT username FROM users WHERE username = ?";
        if ($check_stmt = mysqli_prepare($koneksi, $check_sql)) {
            mysqli_stmt_bind_param($check_stmt, "s", $username);
            mysqli_stmt_execute($check_stmt);
            mysqli_stmt_store_result($check_stmt);

            if (mysqli_stmt_num_rows($check_stmt) > 0) {
                echo "Username sudah digunakan. Silakan gunakan username lain.";
                mysqli_stmt_close($check_stmt);
                exit;
            }
            mysqli_stmt_close($check_stmt);
        } else {
            echo "Error: Gagal memeriksa username.";
            exit;
        }

        // Persiapkan query dengan prepared statements
        $sql = "INSERT INTO users (username, password, nama_lengkap) VALUES (?, ?, ?)";

        // Menggunakan prepared statement untuk mencegah SQL Injection
        if ($stmt = mysqli_prepare($koneksi, $sql)) {
            // Mengikat parameter
            mysqli_stmt_bind_param($stmt, "sss", $username, $password, $nama_lengkap);

            // Eksekusi query
            if (mysqli_stmt_execute($stmt)) {
                echo "Registrasi berhasil! <a href='login.php'>Login</a>";
            } else {
                // Menampilkan error jika eksekusi gagal
                echo "Error: " . mysqli_error($koneksi);
            }

            // Menutup prepared statement
            mysqli_stmt_close($stmt);
        } else {
            // Menampilkan error jika query tidak dapat dipersiapkan
            echo "Error: Gagal mempersiapkan query.";
        }
    } else {
        echo "Data tidak lengkap. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="registerProses.css">
</head>
<body>
</body>
</html> 
