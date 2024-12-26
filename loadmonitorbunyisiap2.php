<?php
session_start();
include 'koneksi.php';

// Log the received GET parameters
// Tangkap data dari AJAX
$tampil = mysqli_query($conn, "SELECT * FROM tb_umum WHERE panggil ='sudah' ORDER BY id DESC");
        $data = mysqli_fetch_array($tampil);

        if ($data['nomor']) {
            $nomorantriansiap = $data['nomor'];
            $jumlahantriansiap = strlen($nomorantriansiap);
            $hurufantriansiap = $data['huruf'];
            $loketantriansiap = $data['loket'];

            $_SESSION['audio_data_siap'] = [
                'nomorantriansiap' => $nomorantriansiap,
                'jumlahantriansiap' => $jumlahantriansiap,
                'hurufantriansiap' => $hurufantriansiap,
                'loketantriansiap' => $loketantriansiap
            ];

            // Kirim respons sukses dengan data audio
            echo json_encode([
                'status' => 'success',
                'audio_data_siap' => $_SESSION['audio_data_siap'],
                'id' => $data['id'],
                'loket' => $data['loket']
            ]);
            
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Tidak ada antrian yang memenuhi kriteria.']);
        }
?>

