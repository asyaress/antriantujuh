<?php
include 'koneksi.php';

$tampil =mysqli_query($conn, "SELECT *FROM tb_bpjs WHERE id_karyawan !='' AND loket='2' ORDER BY id DESC ");
$data = mysqli_fetch_array($tampil);
error_reporting(0);
?>

<?php
if (strlen($data['nomor'])==1)
{
    print"$data[huruf]0$data[nomor]";
}
else{
    print"$data[huruf]$data[nomor]";
}
?>