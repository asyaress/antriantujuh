<?php
session_start();

// Cek apakah data audio ada di session
if (isset($_SESSION['audio_data_desain'])) {
    echo json_encode([
        'status' => 'success',
        'audio_data_desain' => $_SESSION['audio_data_desain']
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Data audio tidak ditemukan.'
    ]);
}
?>
