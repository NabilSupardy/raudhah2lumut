<?php
include("koneksi.php");

// Pastikan permintaan menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dan lakukan sanitasi
    $nis = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $tggl = mysqli_real_escape_string($koneksi, $_POST['tggl']);
    $tmpl = mysqli_real_escape_string($koneksi, $_POST['tmpl']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
    $jenkel = mysqli_real_escape_string($koneksi, $_POST['jenkel']);

    // Validasi data
    if (!empty($nis) && !empty($nama) && !empty($tggl) && !empty($tmpl) && !empty($jurusan) && !empty($tahun) && !empty($jenkel)) {
        // Query update data
        $query = "UPDATE santri SET 
                    nama = '$nama', 
                    tggl = '$tggl', 
                    tmpl = '$tmpl', 
                    jurusan = '$jurusan', 
                    tahun = '$tahun', 
                    jenkel = '$jenkel' 
                  WHERE nis = '$nis'";

        if (mysqli_query($koneksi, $query)) {
            $message = "Data berhasil diupdate!";
            $status = "success";
        } else {
            $message = "Terjadi kesalahan: " . mysqli_error($koneksi);
            $status = "error";
        }
    } else {
        $message = "Semua kolom harus diisi!";
        $status = "error";
    }
} else {
    // Redirect jika halaman diakses tanpa metode POST
    header("Location: datasantri.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Update</title>
    <link rel="stylesheet" href="update.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .container {
            text-align: center;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .message {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .message.success {
            color: #28a745;
        }
        .message.error {
            color: #dc3545;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            background: #007bff;
            color: #fff;
            border-radius: 4px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message <?php echo $status; ?>">
            <h1><?php echo $message; ?></h1>
            <a href="datasantri.php" class="btn">Kembali ke Data santri</a>
        </div>
    </div>
</body>
</html>
