<?php
include("koneksi.php");

if (isset($_GET['nis'])) {
    $nis = mysqli_real_escape_string($koneksi, $_GET['nis']);
    $query = "SELECT * FROM santri WHERE nis = '$nis'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "Data tidak ditemukan! <a href='datasantri.php'>Kembali</a>";
        exit;
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
    <title>Edit Data Calon Santri</title>

    <link rel="stylesheet" href="formedit.css">
</head>
<body>
    <h1>Edit Data Calon Santri</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="nis" value="<?php echo htmlspecialchars($data['nis']); ?>">
        
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required><br><br>

        <label for="tggl">Tanggal Lahir:</label><br>
        <input type="date" id="tggl" name="tggl" value="<?php echo htmlspecialchars($data['tggl']); ?>" required><br><br>

        <label for="tmpl">Tempat Lahir:</label><br>
        <input type="text" id="tmpl" name="tmpl" value="<?php echo htmlspecialchars($data['tmpl']); ?>" required><br><br>

        <label for="jurusan">Jurusan:</label><br>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo htmlspecialchars($data['jurusan']); ?>" required><br><br>

        <label for="tahun">Tahun Masuk:</label><br>
        <input type="number" id="tahun" name="tahun" value="<?php echo htmlspecialchars($data['tahun']); ?>" required><br><br>

        <label for="jenkel">Jenis Kelamin:</label><br>
        <select id="jenkel" name="jenkel" required>
            <option value="Laki-laki" <?php echo ($data['jenkel'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="Perempuan" <?php echo ($data['jenkel'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
        </select><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
