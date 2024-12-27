<?php
include("koneksi.php");

if (isset($_GET['niu'])) {
    $niu = $_GET['niu'];
    $sql = "DELETE FROM ustadz WHERE niu='$niu'";
    if (mysqli_query($koneksi, $sql)) {
        $message = "Data berhasil dihapus.";
    } else {
        $message = "Error: " . mysqli_error($koneksi);
    }
} else {
    $message = "NIU tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Ustadz / Ustadzah</title>
    <link rel="stylesheet" href="hapus_Ustadz_ustadzah.css">
</head>
<body>
    <div class="container">
        <h1>Status Penghapusan</h1>
        <p><?php echo $message; ?></p>
        <a href="dataUstadz_Ustadzah.php">Kembali ke Halaman Data Ustadz / Ustadzah</a>
    </div>
</body>
</html>
