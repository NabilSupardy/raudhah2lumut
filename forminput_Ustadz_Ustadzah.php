<?php include("koneksi.php"); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Ustadz / Ustadzah</title>
    <link rel="stylesheet" href="forminput_Ustadz_ustadzah.css">
</head>
<body>
    <header><h1>Tambah Data Ustadz/Ustadzah</h1></header>
    <form action="simpan_Ustadz_Ustadzah.php" method="POST">
        <label for="niu">NIU:</label><br>
        <input type="text" id="niu" name="niu" required><br><br>

        <label for="nama">Nama Ustadz / Ustadzah:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="jenkel">Jenis Kelamin:</label><br>
        <label for="laki">Laki-laki</label>
        <input type="radio" name="jenkel" value="L" id="laki" required>
        <label for="perempuan">Perempuan</label><br><br>
        <input type="radio" name="jenkel" value="P" id="perempuan" required>
       

        <label for="tggl">Tanggal Lahir:</label><br>
        <input type="date" id="tggl" name="tggl" required><br><br>

        <label for="tmpl">Tempat Lahir:</label><br>
        <input type="text" id="tmpl" name="tmpl" required><br><br>

        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" required><br><br>

        <label for="telepon">Telepon:</label><br>
        <input type="text" id="telepon" name="telepon" required><br><br>

        <button type="submit">Simpan Data</button>
    </form>
</body>
</html>
