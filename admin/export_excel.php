<?php
include '../koneksi.php';

// Set headers for the Excel file
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_antrian.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Prepare the SQL query to fetch data
$query = "SELECT tb_rekap_antrian.*, tb_karyawan.nama_karyawan
          FROM tb_rekap_antrian
          JOIN tb_karyawan ON tb_rekap_antrian.id_karyawan = tb_karyawan.id_karyawan
          WHERE 1=1";

// Apply filters based on GET parameters
if (isset($_GET['id_karyawan']) && $_GET['id_karyawan'] != '') {
    $query .= " AND tb_rekap_antrian.id_karyawan = " . intval($_GET['id_karyawan']);
}
if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
    $query .= " AND tb_rekap_antrian.tanggal = '" . $_GET['tanggal'] . "'";
}
if (isset($_GET['waktu']) && $_GET['waktu'] != '') {
    $query .= " AND tb_rekap_antrian.waktu = '" . $_GET['waktu'] . "'";
}
if (isset($_GET['loket']) && $_GET['loket'] != '') {
    $query .= " AND tb_rekap_antrian.loket = '" . $_GET['loket'] . "'";
}

$result = $conn->query($query);

// Create the Excel table header
echo "<table border='1'>";
echo "<tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Nomor Antrian</th>
        <th>Meja</th>
        <th>Status Antrian</th>
        <th>Pegawai</th>
      </tr>";

// Populate the table with data
$no = 1;
while ($baris = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$no}</td>
            <td>{$baris['tanggal']}</td>
            <td>{$baris['waktu']}</td>
            <td>{$baris['huruf']} - {$baris['nomor']}</td>
            <td>{$baris['loket']}</td>
            <td>{$baris['Status']}</td>
            <td>{$baris['nama_karyawan']}</td>
          </tr>";
    $no++;
}
echo "</table>";
?>