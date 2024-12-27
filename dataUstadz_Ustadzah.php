<?php include("koneksi.php"); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ustadz / Ustadzah</title>
    <link rel="stylesheet" href="dataUstadz_Ustadzah.css">
</head>
<body>
    <header><h1>Data Ustadz / Ustadzah</h1></header>
    <nav>
        <a href="index.php">[+] Home</a>
        <a href="forminput_Ustadz_Ustadzah.php">[+] Tambah Data Ustadz/Ustadzah</a>
        <a href="datasantri.php">[+] Data Calon Santri</a>
    </nav>
    <br>

    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>No</th>
                <th>NIU</th>
                <th>Nama Ustadz / Ustadzah</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = mysqli_query($koneksi, "SELECT * FROM Ustadz");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td><?php echo $data['niu']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['jenkel']; ?></td>
                <td><?php echo $data['tggl']; ?></td>
                <td><?php echo $data['tmpl']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['telepon']; ?></td>
                <td>
                    <a href="formedit_Ustadz_Ustadzah.php?niu=<?php echo $data['niu']; ?>">Edit</a> |
                    <a href="hapus_Ustadz_Ustadzah.php?niu=<?php echo $data['niu']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <p>Total: <?php echo mysqli_num_rows($sql); ?></p>

    <!-- Tombol untuk mencetak data Ustadz / Ustadzah -->
    <button onclick="window.open('print_Ustadz_Ustadzah.php', '_blank')">Print Document</button>

</body>
</html>
