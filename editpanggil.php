<?php include 'koneksi.php' ?>

<?php

$nomor =$_POST['nomor'];
$loket =$_POST['loket'];

$edit = mysqli_query($conn, "UPDATE tb_bpjs SET loket='$_SESSION[loket]', panggil='sudah' WHERE nomor='$nomor'");


?>