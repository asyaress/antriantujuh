<?php
require 'koneksi.php';
session_start();

if (isset($_SESSION['id_karyawan'])) {
    $id_karyawan = $_SESSION['id_karyawan'];
    $resetQuery = "UPDATE tb_karyawan SET tombol_klik = NULL WHERE id_karyawan = '$id_karyawan'";

    if (!mysqli_query($conn, $resetQuery)) {
        echo "Error: " . mysqli_error($conn);
    }
}

// Hapus session dan redirect
session_unset();
session_destroy();
header("location:loginkaryawan.php");
exit;
?>
