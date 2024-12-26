<?php
include 'koneksi.php';

$id_karyawan = $_GET['id_karyawan'] ?? null;

if (!$id_karyawan) {
    echo json_encode(['status' => 'error', 'message' => 'Missing id_karyawan']);
    exit;
}
$query = "SELECT tombol_klik FROM tb_karyawan";
$result = mysqli_query($conn, $query);

if ($result) {
    $tombol_klik_list = []; // Array untuk menyimpan hasil

    // Fetch setiap baris
    while ($row = mysqli_fetch_assoc($result)) {
        $tombol_klik_list[] = $row['tombol_klik']; // Simpan nilai 'tombol_klik' ke array
    }

    // Kirim hasil sebagai JSON
    echo json_encode(['status' => 'success', 'tombol_klik_list' => $tombol_klik_list]);
} else {
    // Kirim pesan error jika query gagal
    echo json_encode(['status' => 'error', 'message' => 'Failed to fetch tombol_klik']);
}

?>
