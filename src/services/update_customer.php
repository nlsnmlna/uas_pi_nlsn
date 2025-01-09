<?php
include "../../config/db.php";

/* memasukan setiap data inputan kedalam etiap variabel */

$nik_ktp_nelsen_tmp = $_POST['nik_ktp_nelsen_tmp'];
$nik_ktp_nelsen = $_POST['nik_ktp_nelsen'];
$nama_nelsen = $_POST['nama_nelsen'];
$no_hp_nelsen = $_POST['no_hp_nelsen'];
$alamat_nelsen = $_POST['alamat_nelsen'];

//Menjalankan kueri update
$update = mysqli_query($koneksi, "UPDATE tbl_pelanggan_nelsen SET
nik_ktp_nelsen='$nik_ktp_nelsen',
nama_nelsen='$nama_nelsen',
no_hp_nelsen='$no_hp_nelsen',
alamat_nelsen='$alamat_nelsen'
WHERE nik_ktp_nelsen='$nik_ktp_nelsen_tmp'
");

if ($update) {
    //Jika proses delete berhasil
    header("location: ../pages/dashboard_customer.php");
} else {
    //Jika proses update gagal
    echo "<p>Gagal Menyimpan !</p>";
    echo "<a href='../pages/dashboard_customer.php;'>Coba Lagi</a>";
}
