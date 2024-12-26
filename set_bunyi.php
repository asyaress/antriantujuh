<?php
session_start();

// Ambil data dari request
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['nomor'], $data['huruf'], $data['loket'])) {
    // Simpan data ke session
    $_SESSION['bunyi'] = [
        'nomor' => $data['nomor'],
        'huruf' => $data['huruf'],
        'loket' => $data['loket']
    ];

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Data tidak valid.']);
}
?>
