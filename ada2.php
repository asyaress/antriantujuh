<?php
include 'koneksi.php';

// Periksa koneksi database
if (!$conn) {
    echo json_encode(['status' => 'error', 'message' => 'Koneksi database gagal.']);
    exit;
}

// Tangkap data dari AJAX
$nomor = $_POST['nomorAntrian1'] ?? null;

if ($nomor) {
    // Validasi input untuk memastikan hanya angka yang diterima
    if (!is_numeric($nomor)) {
        echo json_encode(['status' => 'error', 'message' => 'Nomor antrian harus berupa angka.']);
        exit;
    }

$stmt1 = $conn->prepare("UPDATE tb_umum SET Status = 'Selesai' WHERE nomor = ?");
$stmt1->bind_param("i", $nomor);

if ($stmt1->execute()) {
    if ($stmt1->affected_rows > 0) {
        // Update tb_rekap_antrian
        $stmt2 = $conn->prepare("UPDATE tb_rekap_antrian SET Status = 'Selesai' WHERE nomor = ?");
        $stmt2->bind_param("s", $nomor); // Assuming nomor_antrian is a string

        if ($stmt2->execute()) {
            if ($stmt2->affected_rows > 0) {
                echo json_encode(['status' => 'success', 'message' => 'Status berhasil diperbarui menjadi Selesai di kedua tabel.']);
            } else {
                echo json_encode(['status' => 'failed', 'message' => 'Data tidak ditemukan atau tidak diperbarui di tb_rekap_antrian.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menjalankan query pada tb_rekap_antrian: ' . mysqli_error($conn)]);
        }

        // Tutup statement kedua
        $stmt2->close();
    } else {
        echo json_encode(['status' => 'failed', 'message' => 'Data tidak ditemukan atau tidak diperbarui di tb_bpjs.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Gagal menjalankan query pada tb_bpjs: ' . mysqli_error($conn)]);
}

// Tutup statement pertama
$stmt1->close();

} else {
    // Jika nomor tidak dikirim
    echo json_encode(['status' => 'error', 'message' => 'Nomor antrian tidak dikirim.']);
}

// Tutup koneksi
$conn->close();
?>
