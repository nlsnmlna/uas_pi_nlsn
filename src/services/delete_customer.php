<?php
include "../../config/db.php";

/* Mengambil nilai nim dari parameter get
yang dikirim dari tampil customer_nelsen
*/
$nik_ktp_nelsen = $_GET['nik_ktp_nelsen'];

//Menjalankan kueri delete
$delete = mysqli_query($koneksi, "DELETE FROM tbl_pelanggan_nelsen WHERE nik_ktp_nelsen='$_GET[nik_ktp_nelsen]'");
if ($delete) {
    //Jika proses delete berhasil
    header("location: ../pages/dashboard_customer.php");
} else {
    //Jika proses delete gagal
    echo "<p>Gagal Menghapus !</p>";
    echo "<a href='../pages/dashboard_customer.php'>Coba Lagi</a>";
}
