<?php 
// Include koneksi ke database
include("koneksi.php");

// Cek jika form disubmit
if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jenkel = $_POST['jenkel'];
    $tggl = $_POST['tggl'];
    $tmpl = $_POST['tmpl'];
    $jurusan = $_POST['jurusan'];
    $tahun = $_POST['tahun'];
  
    // Menggunakan prepared statement untuk menghindari SQL injection
    $sql = "INSERT INTO santri (nis, nama, jenkel, tggl, tmpl, jurusan, tahun) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Menyiapkan query
    if ($stmt = mysqli_prepare($koneksi, $sql)) {
        // Bind parameter ke query
        mysqli_stmt_bind_param($stmt, "sssssss", $nis, $nama, $jenkel, $tggl, $tmpl, $jurusan, $tahun);
        
        // Eksekusi query
        $query = mysqli_stmt_execute($stmt);

        // Cek hasil query
        if ($query) {
            echo "Data berhasil ditambahkan!";
            echo "<br><a href='index.php'>Kembali ke Home</a>";
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
        
        // Menutup prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Terjadi kesalahan saat mempersiapkan query: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Calon Santri</title>
    <link rel="stylesheet" href="Pendaftaran.css">
</head>

<body>
    <h1>Tambah Data Calon Santri</h1>
    <form method="POST" action="pendaftaran.php">
        <label for="nis">NIS:</label><br>
        <input type="text" name="nis" id="nis" required><br><br>

        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="jenkel">Jenis Kelamin:</label><br>
        <label for="laki">Laki-laki</label>
        <input type="radio" name="jenkel" value="L" id="laki" required>
        <label for="perempuan">Perempuan</label><br><br>
        <input type="radio" name="jenkel" value="P" id="perempuan" required>

        <label for="tggl">Tanggal Lahir:</label><br>
        <input type="date" name="tggl" id="tggl" required><br><br>

        <label for="tmpl">Tempat Lahir:</label><br>
        <input type="text" name="tmpl" id="tmpl" required><br><br>

        <label for="jurusan">Jurusan:</label><br>
        <input type="text" name="jurusan" id="jurusan" required><br><br>

        <label for="tahun">Tahun Masuk:</label><br>
        <input type="number" name="tahun" id="tahun" min="2000" max="2099" required><br><br>

        <button type="submit" name="submit">Tambah Data</button>
    </form>
    <br>
    <a href="index.php">Kembali ke Home</a>
</body>

</html>