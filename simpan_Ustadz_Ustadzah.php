<?php
include("koneksi.php");

if (isset($_POST['niu']) && isset($_POST['nama']) && isset($_POST['jenkel']) && isset($_POST['tggl']) && isset($_POST['tmpl']) && isset($_POST['alamat']) && isset($_POST['telepon'])) {
    $niu = $_POST['niu'];
    $nama = $_POST['nama'];
    $jenkel = $_POST['jenkel'];
    $tggl = $_POST['tggl'];
    $tmpl = $_POST['tmpl'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql = "INSERT INTO ustadz (niu, nama, jenkel, tggl, tmpl, alamat, telepon) 
            VALUES ('$niu', '$nama', '$jenkel', '$tggl', '$tmpl', '$alamat', '$telepon')";

if (mysqli_query($koneksi, $sql)) {
    $message = "Data Ustadz / Ustadzah berhasil disimpan!";
    $status = "success";
} else {
    // Jika query gagal
    $message = "Terjadi kesalahan: " . mysqli_error($koneksi);
    $status = "error";
}
} else {
// Jika data tidak lengkap
$message = "Data tidak lengkap. Silakan coba lagi.";
$status = "error";
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Penyimpanan</title>
    <link rel="stylesheet" href="simpan_Ustadz_ustadzah.css">
</head>
<body>
    <div class="container">
        <div class="message <?php echo $status; ?>">
            <h1><?php echo $message; ?></h1>
            <a href="dataUstadz_Ustadzah.php" class="btn">Kembali ke Data Ustadz / Ustadzah</a>
        </div>
    </div>
</body>
</html>
