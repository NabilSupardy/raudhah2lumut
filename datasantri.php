<?php 
include("koneksi.php"); // Pastikan file koneksi.php terkoneksi dengan database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Santri</title>
    <link rel="stylesheet" href="datasSantri.css">
</head>
<body>
    <header>
        <h1>Data Calon Santri</h1>
    </header>
    <nav>
        <a href="index.php"> Home</a>
        <a href="pendaftaran.php"> Tambah Data Calon Santri</a>
        <a href="dataUstadz_Ustadzah.php"> Data Ustadz/Ustadzah</a>
    </nav>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Jurusan</th>
                <th>Tahun Masuk</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Pastikan koneksi berhasil
        if (!$koneksi) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        // Query data santri
        $sql = "SELECT * FROM santri";
        $query = mysqli_query($koneksi, $sql);

        if ($query && mysqli_num_rows($query) > 0) {
            while ($santri = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($santri['nis']) . "</td>";
                echo "<td>" . htmlspecialchars($santri['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($santri['tggl']) . "</td>";
                echo "<td>" . htmlspecialchars($santri['tmpl']) . "</td>";
                echo "<td>" . htmlspecialchars($santri['jurusan']) . "</td>";
                echo "<td>" . htmlspecialchars($santri['tahun']) . "</td>";
                echo "<td>" . htmlspecialchars($santri['jenkel']) . "</td>";
                echo "<td>";
                echo "<a href='formedit.php?nis=" . urlencode($santri['nis']) . "'>Edit</a> | ";
                echo "<a href='hapus.php?nis=" . urlencode($santri['nis']) . "' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' style='text-align: center;'>Tidak ada data.</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <p>Total: <?php echo isset($query) ? mysqli_num_rows($query) : 0; ?></p>
    <button style="margin-left: 5%;" onclick="window.open('print.php', '_blank');">Print Document</button>
    <script>
        function print_d() {
            window.open("print.php", "_blank");
        }
    </script>
</body>
</html>
