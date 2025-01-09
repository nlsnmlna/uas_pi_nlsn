<?php
include "../../config/db.php";

// Mengambil data dari form
$nik_ktp_nelsen = $_POST['nik_ktp_nelsen'];
$nama_nelsen = $_POST['nama_nelsen'];
$no_hp_nelsen = $_POST['no_hp_nelsen'];
$alamat_nelsen = $_POST['alamat_nelsen'];

// Menjalankan kueri insert
$insert = mysqli_query($koneksi, "INSERT INTO tbl_pelanggan_nelsen
(nik_ktp_nelsen, nama_nelsen, no_hp_nelsen, alamat_nelsen)
VALUES
('$nik_ktp_nelsen', '$nama_nelsen', '$no_hp_nelsen','$alamat_nelsen')");

if ($insert) {
    // Jika proses insert berhasil
    header("Location: ../pages/dashboard_customer.php");
    exit();
} else {
    // Jika proses insert gagal
    echo "<p>Gagal Menyimpan!</p>";
    echo "<a href='../pages/dashboard_customer.php'>Coba Lagi</a>";
}
