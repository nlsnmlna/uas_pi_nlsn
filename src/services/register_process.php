<?php
include "../../config/db.php";

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email']; // Meskipun email tidak disebutkan dalam tabel, saya tetap menyimpannya
$full_name = $_POST['full_name'];
$level = 'user'; // Set level ke 'user'

// Enkripsi password menggunakan MD5
$hashed_password = md5($password);

// Simpan data ke database
$query = "INSERT INTO tbl_user_nelsen (username_nelsen, password_nelsen, nama_lengkap_nelsen, level_nelsen) VALUES ('$username', '$hashed_password', '$full_name', '$level')";
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil
if ($result) {
    echo "<script>alert('Registrasi berhasil'); window.location = '../pages/login.php'</script>";
} else {
    echo "<script>alert('Registrasi gagal: " . mysqli_error($koneksi) . "'); window.location = '../pages/register.php'</script>";
}
