<?php
require '../koneksi.php';
// SQL untuk menghapus semua data dari tabel
$sql = "DELETE FROM tb_umum";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('data berhasil dihapus!');
    document.location.href = 'umum.php';
</script>";
} else {
    echo "<script>
    alert('data berhasil dihapus!');
    document.location.href = 'umum.php';
</script>" . $conn->error;
}
?>