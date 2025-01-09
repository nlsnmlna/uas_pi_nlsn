<?php
include "../../config/db.php";

/* Mengambil nilai nim dari parameter get
yang dikirim dari tampil rental_nelsen
*/
$no_trx_nelsen = $_GET['no_trx_nelsen'];

//Menjalankan kueri delete
$delete = mysqli_query($koneksi, "DELETE FROM tbl_rental_nelsen WHERE no_trx_nelsen='$_GET[no_trx_nelsen]'");
if ($delete) {
    //Jika proses delete berhasil
    header("location: ../pages/dashboard_rental.php");
} else {
    //Jika proses delete gagal
    echo "<p>Gagal Menghapus !</p>";
    echo "<a href='../pages/dashboard_rental.php'>Coba Lagi</a>";
}
