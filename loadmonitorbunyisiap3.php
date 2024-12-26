<?php
include 'koneksi.php';

// Log the received GET parameters
// Tangkap data dari AJAX
$nomor = $_POST['nomorAntrian1'] ?? null;

if ($nomor) { 
    // Menjalankan query pembaruan awal
    $updateQuery = "UPDATE tb_umum SET panggil='belum' WHERE id='$nomor'";
    $result = mysqli_query($conn, $updateQuery);
    
    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo json_encode(['status' => 'success']);
        } 
        
        else {
            echo json_encode(['status' => 'failed', 'message' => 'Gagal doang']);
        }
    } else {
        echo json_encode(['status' => 'success', 'message' => 'Gagal mengupdate data.']);
    }
} else {
    // Jika nomor tidak dikirim
    echo json_encode(['status' => 'error', 'message' => 'Nomor tidak dikirim.']);
}

?>
