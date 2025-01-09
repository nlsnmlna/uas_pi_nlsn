<?php
session_start();
include "../../config/db.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$cari = mysqli_query($koneksi, "SELECT * FROM tbl_user_nelsen WHERE username_nelsen='$username' AND password_nelsen='$password'");
$data = mysqli_fetch_array($cari);
if (!empty($data['username_nelsen'])) {
    $_SESSION['username'] = $data['username_nelsen'];
    $_SESSION['password'] = $data['password_nelsen'];
    $_SESSION['nama_lengkap'] = $data['nama_lengkap_nelsen'];
    $_SESSION['level'] = $data['level_nelsen'];
    if ($data['level_nelsen'] == 'admin') {
        echo "<script>alert('Login Berhasil'); window.location = '../pages/dashboard.php';</script>";
    } else if ($data['level_nelsen'] == 'user') {
        echo "<script>alert('Login Berhasil'); window.location = '../pages/dashboard_user.php';</script>";
    }
} else {
    echo "<script>alert('Gagal Login'); window.location='../pages/login.php';</script>";
}
