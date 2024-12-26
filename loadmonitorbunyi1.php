<?php
session_start();
include 'koneksi.php';
$nomor = $_POST['nomorAntrian1'] ?? null;

if ($nomor) {
    // Menjalankan query pembaruan awal
    $updateQuery = "UPDATE tb_bpjs SET panggil='sudah' WHERE nomor='$nomor'";
    $result = mysqli_query($conn, $updateQuery);

} else {
    // Jika nomor tidak dikirim
    echo json_encode(['status' => 'error', 'message' => 'Nomor tidak dikirim.']);
}

// if ($result && mysqli_affected_rows($conn) > 0) {
    $tampil = mysqli_query($conn, "SELECT * FROM tb_bpjs WHERE panggil='sudah' ORDER BY id DESC");
    $data = mysqli_fetch_array($tampil);

    // if ($data['nomor']) {
        $nomorantrian = $data['nomor'];
        $jumlahantrian = strlen($nomorantrian);
        $hurufantrian = $data['huruf'];
        $loketantrian = $data['loket'];

        $_SESSION['audio_data'] = [
            'nomorantrian' => $nomorantrian,
            'jumlahantrian' => $jumlahantrian,
            'hurufantrian' => $hurufantrian,
            'loketantrian' => $loketantrian
        ];

        // var_dump([$data]);

        // var_dump($_SESSION["audio_data"]);
        // Kirim respons sukses dengan data audio
        echo json_encode([
            'status' => 'success',
            'audio_data' => $_SESSION['audio_data']

        ]);

//     } else {
//         echo json_encode(['status' => 'error', 'message' => 'Tidak ada antrian yang memenuhi kriteria.']);
//     }
// } else {
//     echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data antrian.']);
// }

?>