<?php
session_start();

// Cek apakah data audio ada di session
if (isset($_SESSION['audio_data_siap'])) {
    echo json_encode([
        'status' => 'success',
        'audio_data_siap' => $_SESSION['audio_data_siap']
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Data audio tidak ditemukan.'
    ]);
}
?>
