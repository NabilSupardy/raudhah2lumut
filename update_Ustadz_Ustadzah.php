<?php
include("koneksi.php");

if (isset($_POST['niu'])) {
    $niu = $_POST['niu'];
    $nama = $_POST['nama'];
    $jenkel = $_POST['jenkel'];
    $tggl = $_POST['tggl'];
    $tmpl = $_POST['tmpl'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql = "UPDATE Ustadz SET nama='$nama', jenkel='$jenkel', tggl='$tggl', tmpl='$tmpl', alamat='$alamat', telepon='$telepon' WHERE niu='$niu'";
    if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil diupdate. <a href='dataUstadz_Ustadzah.php'>Kembali ke halaman data Ustadz / Ustadzah</a>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Update</title>
    <link rel="stylesheet" href="update_Ustadz_ustadzah.css">