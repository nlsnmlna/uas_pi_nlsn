<?php
include "../../config/db.php";

// Mengambil data dari form
$no_plat_nelsen = $_POST['no_plat_nelsen'];
$nama_mobil_nelsen = $_POST['nama_mobil_nelsen'];
$brand_mobil_nelsen = $_POST['brand_mobil_nelsen'];
$tipe_transmisi_nelsen = $_POST['tipe_transmisi_nelsen'];


// Menjalankan kueri insert
$insert = mysqli_query($koneksi, "INSERT INTO tbl_mobil_nelsen
(no_plat_nelsen, nama_mobil_nelsen, brand_mobil_nelsen, tipe_transmisi_nelsen)
VALUES
('$no_plat_nelsen', '$nama_mobil_nelsen', '$brand_mobil_nelsen','$tipe_transmisi_nelsen')");

if ($insert) {
    // Jika proses insert berhasil
    header("Location: ../pages/dashboard_car.php");
    exit();
} else {
    // Jika proses insert gagal
    echo "<p>Gagal Menyimpan!</p>";
    echo "<a href='../pages/dashboard_car.php'>Coba Lagi</a>";
}
