<?php
// Sambungkan ke database
include 'koneksi.php';

// Pastikan data POST dikirim dan diterima dengan benar
if (isset($_POST['loket']) && isset($_POST['nomor'])) {
    $loket = $_POST['loket'];
    $nomor = $_POST['nomor'];

    // Lakukan update
    $query = "UPDATE tb_bpjs SET loket='$loket', panggil='sudah' WHERE nomor='$nomor'";
    $result = mysqli_query($conn, $query);

    // Berikan respon
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Data tidak lengkap";
}
?>
