<?php
include "../../config/db.php";

/* Mengambil nilai nim dari parameter get
yang dikirim dari tampil mobil_nelsen
*/
$no_plat_nelsen = $_GET['no_plat_nelsen'];

//Menjalankan kueri delete
$delete = mysqli_query($koneksi, "DELETE FROM tbl_mobil_nelsen WHERE no_plat_nelsen='$_GET[no_plat_nelsen]'");
if ($delete) {
    //Jika proses delete berhasil
    header("location: ../pages/dashboard_car.php");
} else {
    //Jika proses delete gagal
    echo "<p>Gagal Menghapus !</p>";
    echo "<a href='../pages/dashboard_car.php'>Coba Lagi</a>";
}
