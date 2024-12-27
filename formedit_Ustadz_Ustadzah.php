<?php
include("koneksi.php");

// Periksa apakah parameter niu ada
if (isset($_GET['niu'])) {
    $niu = $_GET['niu'];

    // Gunakan prepared statement untuk mencegah SQL Injection
    if ($stmt = mysqli_prepare($koneksi, "SELECT * FROM Ustadz WHERE niu = ?")) {
        // Ikat parameter
        mysqli_stmt_bind_param($stmt, "i", $niu);

        // Eksekusi query
        mysqli_stmt_execute($stmt);

        // Ambil hasil
        $result = mysqli_stmt_get_result($stmt);

        // Periksa apakah data ditemukan
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_array($result);
            // Tampilkan data jika perlu
            echo "Nama: " . $data['nama'] . "<br>";
            echo "Alamat: " . $data['alamat'] . "<br>";
        } else {
            echo "Data tidak ditemukan.";
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Query gagal dipersiapkan.";
    }
} else {
    echo "Parameter 'niu' tidak ditemukan.";
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Ustadz / Ustadzah</title>
    <link rel="stylesheet" href="formedit_Ustadz_ustadzah.css">
</head>
<body>
    <header><h1>Edit Data Ustadz/Ustadzah</h1></header>
    <form action="update_Ustadz_Ustadzah.php" method="POST">
        <input type="hidden" name="niu" value="<?php echo $data['niu']; ?>">

        <label for="nama">Nama Ustadz / Ustadzah:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required><br><br>

        <label for="jenkel">Jenis Kelamin:</label><br>
        <select id="jenkel" name="jenkel" required>
            <option value="Laki-laki" <?php echo ($data['jenkel'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="Perempuan" <?php echo ($data['jenkel'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
        </select><br><br>

        <label for="tggl">Tanggal Lahir:</label><br>
        <input type="date" id="tggl" name="tggl" value="<?php echo $data['tggl']; ?>" required><br><br>

        <label for="tmpl">Tempat Lahir:</label><br>
        <input type="text" id="tmpl" name="tmpl" value="<?php echo $data['tmpl']; ?>" required><br><br>

        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required><br><br>

        <label for="telepon">Telepon:</label><br>
        <input type="text" id="telepon" name="telepon" value="<?php echo $data['telepon']; ?>" required><br><br>

        <button type="submit">Update Data</button>
    </form>
</body>
</html>
