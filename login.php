<?php include("koneksi.php"); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="loginproses.php" method="POST">
            <h1>Login</h1>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>

            <p>Belum memiliki akun? <a href="register.php">Daftar di sini</a>.</p>
        </form>
    </div>
</body>
</html>