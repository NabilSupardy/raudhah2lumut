<?php include("koneksi.php"); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Calon Santri</title>
    <link rel="stylesheet" href="print.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        header h1 {
            font-size: 24px;
            margin: 0;
        }
        header h2 {
            font-size: 20px;
            margin: 0;
        }
        header h4 {
            font-size: 16px;
            margin-top: 10px;
            font-weight: normal;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 14px;
        }
        table thead tr {
            background-color: #f2f2f2;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            text-align: center;
        }
        .no {
            width: 5%;
            text-align: center;
        }
        footer {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <header>
        <h1>PONDOK PESANTREN</h1>
        <h2>AR RAUDLATUL HASANAH 2 LUMUT</h2>
        <h4>Data Laporan Santri</h4>
    </header>

    <table>
        <thead>
            <tr>
                <th class="no">No</th>
                <th>NIU</th>
                <th>Nama Calon Santri</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = mysqli_query($koneksi, "SELECT * FROM santri");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td class="no"><?php echo $no++; ?></td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['jurusan']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <footer>
        <p>Dicetak pada: <?php echo date("d-m-Y H:i:s"); ?></p>
    </footer>

    <script>
        window.print(); // Perintah untuk mencetak dokumen
    </script>
</body>
</html>
