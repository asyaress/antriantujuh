
<?php
session_start();

include 'koneksi.php'; // Koneksi ke database

// Cek koneksi database
if (!$conn) {
    echo "<script>alert('Koneksi gagal: " . mysqli_connect_error() . "');</script>";
    exit;
}

// Cek jika session id_karyawan ada
if (!isset($_SESSION['id_karyawan']) || empty($_SESSION['id_karyawan'])) {
    echo "<script>alert('ID Karyawan tidak ditemukan di session.');</script>";
    exit;
}

// Ambil nomor antrian yang berikutnya yang belum dipanggil
$tampilkan = mysqli_query($conn, "SELECT * FROM tb_umum WHERE panggil='' ORDER BY id ASC LIMIT 1");

if (!$tampilkan) {
    echo "<script>alert('Terjadi kesalahan saat mengambil data antrian: " . mysqli_error($conn) . "');</script>";
    exit;
}

$data = mysqli_fetch_array($tampilkan);

// Cek jika data ada
if ($data) {
    $nomor = $data['nomor']; // Ambil nomor antrian
} else {
    echo "<script>alert('Tidak ada antrian yang belum dipanggil.');</script>";
    exit;
}

// Pastikan session untuk 'loket' sudah di-set
if (!isset($_SESSION['loket']) || empty($_SESSION['loket'])) {
    echo "<script>alert('Loket belum diatur.');</script>";
    exit;
}


$loket = $_SESSION['loket']; 
$loketkaryawan = $_SESSION['loketkaryawan'] ;
$meja = $_SESSION['meja'] ;
$id_karyawan = $_SESSION['id_karyawan'] ;


$edit = mysqli_query($conn, "UPDATE tb_umum SET loket='$loket', id_karyawan='$id_karyawan' WHERE nomor='$nomor'");

if (!$edit) {
    echo "<script>alert('Gagal memperbarui data antrian: " . mysqli_error($conn) . "');</script>";
    exit;
} else {
    // Insert data ke tb_rekap_antrian
    $tanggal = date('Y-m-d');
    $waktu = date('H:i:s');
    $insert_rekap = "INSERT INTO tb_rekap_antrian (id_karyawan, tanggal, waktu, loket, meja, Status, nomor, huruf)
    VALUES ('$id_karyawan', '$tanggal', '$waktu', '$loketkaryawan', '$meja', 'Belum Selesai', '$nomor', '{$_SESSION['huruf']}')";

if (!mysqli_query($conn, $insert_rekap)) {
echo "<script>alert('Gagal menyimpan data rekapan antrian: " . mysqli_error($conn) . "');</script>";
}

}

// Simpan nomor antrian ke session
$_SESSION['nomor'] = $nomor;

// Menampilkan nomor antrian yang baru
echo "$_SESSION[huruf]$nomor";
?>