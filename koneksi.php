<?php
//buat koneksi dengan database mysql
$dbhost = "localhost";
$dbuser ="root";
$dbpass ="";
$dbname = "dbakademik";
$koneksi = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//periksa koneksi, tampilkan pesan kesalahan jika gagal
if (!$koneksi){
    die("koneksi database gagal:" .mysqli_connect_errno(). "-". mysqli_connect_errno());
}
/*
mysql_connect_errnoc() untuk mengembalikan kode kesalahan dari koneksi terakhir yang mengalami kegagalan
mysqli_connect_error() untuk mengembalikan deskripsi kesalahan dari koneksi terakhir yang mengalami kegagalan
die() untuk segera menghentikan eksekusi skrip dan mengeluarkan pesan
*/
?>