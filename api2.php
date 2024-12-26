<?php 
include 'koneksi.php';

// Pagination setup
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$limit = 8; 
$limit_start = ($page - 1) * $limit;
$no = $limit_start + 1;

// Query utama dengan join ke tabel karyawan
$query = "
    SELECT tb_bpjs.*, tb_karyawan.nama_karyawan 
    FROM tb_bpjs 
    LEFT JOIN tb_karyawan ON tb_bpjs.id_karyawan = tb_karyawan.id_karyawan 
    ORDER BY tb_bpjs.nomor DESC 
    LIMIT $limit_start, $limit";
    
$dewan1 = $conn->prepare($query);
$dewan1->execute();
$res1 = $dewan1->get_result();

// Tampilkan data ke tabel
while ($baris = $res1->fetch_assoc()) {
?>
    <tr>
        <td class><?php echo $baris['tanggal']; ?></td>
        <td><?php echo $baris['waktu']; ?></td>
        <td><?= $baris['huruf']; ?><?php echo $baris['nomor']; ?></td>
        <td><?php echo $baris['loket']; ?></td>
        <td><?php echo $baris['nama_karyawan'] ?: 'Belum Diambil'; ?></td> <!-- Tampilkan nama karyawan -->
        <td><?php echo $baris['Status']; ?></td>

    </tr>
<?php 
}
?>

<!-- Total antrian -->
<?php
$query_jumlah = "SELECT count(*) AS jumlah FROM tb_bpjs";
$dewan1 = $conn->prepare($query_jumlah);
$dewan1->execute();
$res1 = $dewan1->get_result();
$row = $res1->fetch_assoc();
$total_records = $row['jumlah'];
?>
<div>
    <p>Total Antrian: <b><?php echo $total_records; ?></b></p>
</div>
