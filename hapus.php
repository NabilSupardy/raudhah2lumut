<?php
include("koneksi.php");

if (isset($_GET['nis'])) {
    $nis = mysqli_real_escape_string($koneksi, string: $_GET['nis']);

    $query = "DELETE FROM santri WHERE nis = '$nis'";
    if (mysqli_query($koneksi, $query)) {
        $message = "Data berhasil dihapus!";
        $status = "success";
    } else {
        $message = "Error: " . mysqli_error($koneksi);
        $status = "error";
    }
} else {
    header("Location: datasantri.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Hapus</title>
    <link rel="stylesheet" href="hapus.css">
</head>
<body>
    <div class="container">
        <div class="message <?php echo $status; ?>">
            <h1><?php echo $message; ?></h1>
            <a href="datasantri.php" class="btn">Kembali ke Data Calon Santri</a>
        </div>
    </div>
</body>
</html>
