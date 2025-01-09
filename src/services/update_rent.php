<?php
include "../../config/db.php";

/* memasukan setiap data inputan kedalam etiap variabel */

$no_trx_nelsen_tmp = $_POST['no_trx_nelsen_tmp'];
$no_trx_nelsen = $_POST['no_trx_nelsen'];
$nik_ktp_nelsen = $_POST['nik_ktp_nelsen'];
$no_plat_nelsen = $_POST['no_plat_nelsen'];
$tgl_rental_nelsen = $_POST['tgl_rental_nelsen'];
$jam_rental_nelsen = $_POST['jam_rental_nelsen'];
$harga_nelsen = $_POST['harga_nelsen'];
$lama_nelsen = $_POST['lama_nelsen'];
$total_bayar_nelsen = $_POST['total_bayar_nelsen'];

//Menjalankan kueri update
$update = mysqli_query($koneksi, "UPDATE tbl_rental_nelsen SET
no_trx_nelsen='$no_trx_nelsen',
nik_ktp_nelsen='$nik_ktp_nelsen',
no_plat_nelsen='$no_plat_nelsen',
tgl_rental_nelsen='$tgl_rental_nelsen',
jam_rental_nelsen='$jam_rental_nelsen',
harga_nelsen='$harga_nelsen',
lama_nelsen='$lama_nelsen',
total_bayar_nelsen='$total_bayar_nelsen'
WHERE no_trx_nelsen='$no_trx_nelsen_tmp'
");

if ($update) {
    //Jika proses delete berhasil
    header("location: ../pages/dashboard_rental.php");
} else {
    //Jika proses update gagal
    echo "<p>Gagal Menyimpan !</p>";
    echo "<a href='../pages/dashboard_rental.php;'>Coba Lagi</a>";
}
