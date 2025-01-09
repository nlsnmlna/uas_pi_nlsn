<?php
include "../../config/db.php";

// Mengambil data dari form
$no_trx_nelsen = $_POST['no_trx_nelsen'];
$nik_ktp_nelsen = $_POST['nik_ktp_nelsen'];
$no_plat_nelsen = $_POST['no_plat_nelsen'];
$tgl_rental_nelsen = $_POST['tgl_rental_nelsen'];
$jam_rental_nelsen = $_POST['jam_rental_nelsen'];
$harga_nelsen = $_POST['harga_nelsen'];
$lama_nelsen = $_POST['lama_nelsen'];
$total_bayar_nelsen = $_POST['total_bayar_nelsen'];

// Menjalankan kueri insert
$insert = mysqli_query($koneksi, "INSERT INTO tbl_rental_nelsen
(no_trx_nelsen, nik_ktp_nelsen, no_plat_nelsen, tgl_rental_nelsen, jam_rental_nelsen, harga_nelsen, lama_nelsen, total_bayar_nelsen)
VALUES
('$no_trx_nelsen', '$nik_ktp_nelsen', '$no_plat_nelsen', '$tgl_rental_nelsen','$jam_rental_nelsen', '$harga_nelsen', '$lama_nelsen', '$total_bayar_nelsen')");

if ($insert) {
    // Jika proses insert berhasil
    header("Location: ../pages/dashboard_rental.php");
    exit();
} else {
    // Jika proses insert gagal
    echo "<p>Gagal Menyimpan!</p>";
    echo "<a href='../pages/dashboard_rental.php'>Coba Lagi</a>";
}
