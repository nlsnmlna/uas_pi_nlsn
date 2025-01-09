<?php
include "../../config/db.php";

/* memasukan setiap data inputan kedalam etiap variabel */

$no_plat_nelsen_tmp = $_POST['no_plat_nelsen_tmp'];
$no_plat_nelsen = $_POST['no_plat_nelsen'];
$nama_mobil_nelsen = $_POST['nama_mobil_nelsen'];
$brand_mobil_nelsen = $_POST['brand_mobil_nelsen'];
$tipe_transmisi_nelsen = $_POST['tipe_transmisi_nelsen'];

//Menjalankan kueri update
$update = mysqli_query($koneksi, "UPDATE tbl_mobil_nelsen SET
no_plat_nelsen='$no_plat_nelsen',
nama_mobil_nelsen='$nama_mobil_nelsen',
brand_mobil_nelsen='$brand_mobil_nelsen',
tipe_transmisi_nelsen='$tipe_transmisi_nelsen'
WHERE no_plat_nelsen='$no_plat_nelsen_tmp'
");

if ($update) {
    //Jika proses delete berhasil
    header("location: ../pages/dashboard_car.php");
} else {
    //Jika proses update gagal
    echo "<p>Gagal Menyimpan !</p>";
    echo "<a href='../pages/dashboard_car.php;'>Coba Lagi</a>";
}
