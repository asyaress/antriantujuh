<?php
session_start();

if (isset($_SESSION['bunyi'])) {
    echo json_encode([
        'status' => 'ready',
        'nomor' => $_SESSION['bunyi']['nomor'],
        'huruf' => $_SESSION['bunyi']['huruf'],
        'loket' => $_SESSION['bunyi']['loket']
    ]);
    unset($_SESSION['bunyi']); // Hapus setelah diambil
} else {
    echo json_encode(['status' => 'waiting']);
}
?>
