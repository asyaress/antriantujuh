<?php
session_start();
include 'koneksi.php';

$_SESSION['huruf'] = 'D';
$_SESSION['halaman'] = 'desain1.php';
$_SESSION['loket'] = '1';

// Memeriksa apakah parameter 'loket', 'meja', dan 'id_karyawan' ada di URL
if (isset($_GET['loketkaryawan']) && isset($_GET['meja']) && isset($_GET['id_karyawan'])) {
  $loketkaryawan = $_GET['loketkaryawan'];          // Menangkap nilai parameter 'loket'
  $meja = $_GET['meja'];            // Menangkap nilai parameter 'meja'
  $id_karyawan = $_GET['id_karyawan'];  // Menangkap nilai parameter 'id_karyawan'
  // Menampilkan atau menggunakan nilai yang diambil


  // Update preferensi loket dan meja di tabel tb_karyawan
  include 'koneksi.php'; // Koneksi ke database

  // Query untuk update preferensi_loket dan preferensi_meja
  $updateQuery = "UPDATE tb_karyawan SET preferensi_loket='$loketkaryawan', tombol_klik = '$meja',  preferensi_meja='$meja' WHERE id_karyawan='$id_karyawan'";

  // Eksekusi query
  if (mysqli_query($conn, $updateQuery)) {
    // Simpan data yang diperbarui ke dalam sesi
    $_SESSION['loketkaryawan'] = $loketkaryawan;
    $_SESSION['meja'] = $meja;
    $_SESSION['id_karyawan'] = $id_karyawan;
  } else {
    echo "Error: " . mysqli_error($conn);
  }
} else {
  echo "Parameter tidak lengkap!";
}

include 'koneksi.php'; // Koneksi ke database

$tampilkan = mysqli_query($conn, "SELECT * FROM tb_bpjs WHERE panggil='' ORDER BY id ASC");

if (!$tampilkan) {
  die("Query Error: " . mysqli_error($conn)); // Jika query gagal
}

$data = mysqli_fetch_array($tampilkan);

if ($data) {
  $nomor = $data['nomor']; // Ambil nomor antrian jika ada
} else {
  $nomor = NULL; // Jika tidak ada data
}

?>

<?php
$tampilkan = mysqli_query($conn, "SELECT * FROM tb_bpjs WHERE panggil='' ORDER BY id ASC");
$data = mysqli_fetch_array($tampilkan);
error_reporting(0);
$nomor = $data['nomor'];
?>

<?php
// Pastikan koneksi sudah terhubung
// Ambil data karyawan berdasarkan id_karyawan dari parameter URL atau session
$id_karyawan = $_GET['id_karyawan'] ?? null;

if ($id_karyawan) {
  $queryKaryawan = "SELECT nama_karyawan, preferensi_loket, preferensi_meja FROM tb_karyawan WHERE id_karyawan = '$id_karyawan'";
  $resultKaryawan = mysqli_query($conn, $queryKaryawan);

  if ($resultKaryawan && mysqli_num_rows($resultKaryawan) > 0) {
    $dataKaryawan = mysqli_fetch_assoc($resultKaryawan);
    $namaKaryawan = $dataKaryawan['nama_karyawan'];
    $preferensiLoket = $dataKaryawan['preferensi_loket'];
    $preferensiMeja = $dataKaryawan['preferensi_meja'];
  } else {
    $namaKaryawan = "Tidak Diketahui";
    $preferensiLoket = "Tidak Diketahui";
    $preferensiMeja = "Tidak Diketahui";
  }
} else {
  $namaKaryawan = "Tidak Diketahui";
  $preferensiLoket = "Tidak Diketahui";
  $preferensiMeja = "Tidak Diketahui";
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DESAIN MEJA <?= $_SESSION['loket']; ?></title>
  <link rel="stylesheet" href="css/layar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <img src="img/TOEDJOE.svg" alt="">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">

          </li>
          <li class="nav-item">

          </li>
          <li class="nav-item">

          </li>
        </ul>
        <span class="navbar-text" id="date_time">

        </span>
      </div>
    </div>
  </nav>

  <!-- end navbar -->
  <div class="text-center">
    <h3>Selamat datang, <?= $namaKaryawan; ?>!</h3>
    <p>Selamat bekerja di Loket <?= $preferensiLoket; ?> Meja <?= $preferensiMeja; ?>.</p>
    <div class="row cetak">
      <!-- navbar -->

      <div class="col-sm-5">

        <div class="b1">
          <div class="card card-header bpjs">
            <p>DESAIN 1</p>
          </div>
          <div class=" card card-body bpjs">
            <h5 class="card-title ">Nomor Antrian</h5>
            <h1><?php print "$_SESSION[huruf]$nomor"; ?> </h1>
            <div>

              <a href="#" class="btn btn-danger" onclick="panggil()"> <i class="fa fa-bell"></i> Panggil</a>
              <a href="#" class="btn btn-success" onclick="panggil()"> <i class="fa fa-bell"></i> Panggil</a>
              <input type="hidden" id="nomorAntrian" value="<?= $nomor; ?>">

              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  const nomorAntrian1 = document.getElementById('nomorAntrian').value;
                  console.log(nomorAntrian1); // Confirm value on DOMContentLoaded
                  window.panggil = function () {
                    audioPlaying = false;
                    console.log("Initiating AJAX call..."); // Trace AJAX call initiation
                    
                    $.ajax({
                      url: 'loadmonitorbunyi1.php',
                      method: 'POST',
                      data: {
                        nomorAntrian1: nomorAntrian1
                      },
                      // dataType: 'json',
                      success: function (response) {
                        console.log("AJAX success function triggered"); // Confirm AJAX success function
                        console.log(response); // Add this line to see the response
                        if (response.status === 'success') {
                          console.log(nomorAntrian1); // Confirm value in success function
                          console.log("test");
                        } else {
                          alert(response.message);
                        }
                      },
                      error: function () {
                        alert('Terjadi kesalahan saat memanggil audio');
                      }
                    });
                  };
                });

              </script>

              <a href="#" class="btn btn-primary" id="ambilAntrianBtn">
                Ambil Antrian Selanjutnya <i class="fa fa-forward"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col col-sm-5">
        <div>
          <h5>Data Antrian Customer Desain Meja <?= $_SESSION['loket']; ?> (Realtime)</h5>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="highlight">Tanggal</th>
              <th class="highlight">Waktu</th>
              <th class="highlight">Nomor Antrian</th>
              <th class="highlight">Loket</th>
              <th class="highlight">Status Panggil</th>
              <th class="highlight">Petugas</th> <!-- Kolom baru untuk nama petugas -->
            </tr>
          </thead>
          <tbody id="table">

          </tbody>
        </table>
        <script>
          function table() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {
              document.getElementById("table").innerHTML = this.responseText;
            }
            xhttp.open("GET", "api2.php");
            xhttp.send();

          }

          setInterval(function () {
            table();
          }, 1000)

          // Menggunakan jQuery untuk Ajax
          $('#ambilAntrianBtn').click(function (e) {
            e.preventDefault(); // Mencegah refresh halaman otomatis

            // Lakukan Ajax untuk mengambil antrian selanjutnya
            $.ajax({
              url: 'ambil_antrian.php', // Memanggil file PHP yang menangani pengambilan antrian
              method: 'GET',
              success: function (response) {
                // Debug: Menampilkan respon dari server di console

                if (response !== "Tidak ada antrian" && response !== "Gagal memperbarui data antrian") {
                  // Simpan nomor antrian di sessionStorage
                  sessionStorage.setItem('nomorAntrian', response);

                  // Refresh halaman setelah sukses
                  location.reload();
                } else {
                  // Menampilkan pesan jika tidak ada antrian
                  alert(response);
                }
              }
            });
          });

          // Setelah halaman dimuat ulang, periksa sessionStorage dan ubah teks <h1>
          $(document).ready(function () {
            var nomorAntrian = sessionStorage.getItem('nomorAntrian');
            if (nomorAntrian) {
              $('h1').text(nomorAntrian); // Ubah teks <h1> dengan nomor antrian yang disimpan
              sessionStorage.removeItem('nomorAntrian'); // Hapus data setelah digunakan
            }
          });




        </script>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/date_time.js"></script>
  <script type="text/javascript">window.onload = date_time('date_time');</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>