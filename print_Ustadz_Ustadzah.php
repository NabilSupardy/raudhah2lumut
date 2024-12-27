<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Ustadz / Ustadzah</title>
    <link rel="stylesheet" href="print_Ustadz_Ustadzah.css">
</head>
<body>
    <center>
        <h2>DATA LAPORAN Ustadz / Ustadzah</h2>
        <h4>PONDOK PESANTREN AR RAUDLATUL HASANAH 2 LUMUT</h4>
    </center>

    <?php
    include 'koneksi.php';
    ?>

    <table border="1" style="width: 100%; border-collapse: collapse;">
        <tr>
            <th>No</th>
            <th>NIU</th>
            <th>Nama Dosen</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Lahir</th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>

        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, "SELECT * FROM ustadz");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['niu']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['jenkel']; ?></td>
                <td><?php echo $data['tggl']; ?></td>
                <td><?php echo $data['tmpl']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['telepon']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>
