<?php
session_start();
include 'koneksi.php';

// Log the received GET parameters
// Tangkap data dari AJAX
$tampil = mysqli_query($conn, "SELECT * FROM tb_bpjs WHERE panggil ='sudah' ORDER BY id DESC");
$data = mysqli_fetch_array($tampil);

if ($data['nomor']) {
    $nomorantrian = $data['nomor'];
    $jumlahantrian = strlen($nomorantrian);
    $hurufantrian = $data['huruf'];
    $loketantrian = $data['loket'];

    $_SESSION['audio_data_desain'] = [
        'nomorantriandesain' => $nomorantrian,
        'jumlahantriandesain' => $jumlahantrian,
        'hurufantriandesain' => $hurufantrian,
        'loketantriandesain' => $loketantrian
    ];

    echo json_encode([
        'status' => 'success',
        'audio_data_desain' => $_SESSION['audio_data_desain'],
        'id' => $data['id'],
        'loket' => $data['loket']
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Tidak ada antrian yang memenuhi kriteria.']);
}
?>
