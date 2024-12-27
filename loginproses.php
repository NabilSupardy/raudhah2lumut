<?php
include("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengamankan input user
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Query ke database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
            $message = [
                "type" => "success",
                "text" => "Login berhasil! <a href='index.php'>Lanjut ke Home</a>"
            ];
        } else {
            $message = [
                "type" => "error",
                "text" => "Password salah! <a href='login.php'>Coba lagi</a>"
            ];
        }
    } else {
        $message = [
            "type" => "error",
            "text" => "Username tidak ditemukan! <a href='register.php'>Register</a>"
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pesantren</title>
    <link rel="stylesheet" href="loginProses.css">
</head>
<body>
    <div class="container">
        <h1>Login Santri</h1>
        <?php if (isset($message)): ?>
            <div class="message <?= $message['type']; ?>">
                <?= $message['text']; ?>
            </div>
        <?php else: ?>
            <form action="" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                
                <button type="submit">Masuk</button>
            </form>
            <p>Belum punya akun? <a href="register.php">Daftar di sini</a>.</p>
        <?php endif; ?>
    </div>
</body>
</html>