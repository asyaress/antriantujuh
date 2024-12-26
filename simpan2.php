<?php include 'koneksi.php' ?>


<?php

$huruf = $_GET['huruf'];
$tampilkan = mysqli_query($conn, "SELECT * FROM tb_umum");
$hitung = mysqli_num_rows($tampilkan);
$nomor = $hitung + 1;
$tanggal = date('d M Y');
$waktu  = date('H:i');
$input = mysqli_query($conn, "INSERT INTO tb_umum (tanggal, waktu ,nomor, huruf, panggil) 
                        VALUES ('$tanggal', '$waktu', '$nomor', '$huruf', '' )");

if($input)
{
print"<script>window.location='cetak.php?nomor=$nomor&tanggal=$tanggal&waktu=$waktu&huruf=$huruf'</script>";
}
?>