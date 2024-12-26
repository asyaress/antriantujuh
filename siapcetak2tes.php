<?php
session_start();
include 'koneksi.php';

$_SESSION['huruf'] = 'S';
$_SESSION['halaman'] = 'siapcetak2tes.php';
$_SESSION['loket'] = '4';

if (isset($_GET['loketkaryawan']) && isset($_GET['meja']) && isset($_GET['id_karyawan'])) {
  $loketkaryawan = $_GET['loketkaryawan'];         
  $meja = $_GET['meja'];            
  $id_karyawan = $_GET['id_karyawan'];  
  $_SESSION['loketkaryawan'] = $loketkaryawan;
  $_SESSION['meja'] = $meja;
  $_SESSION['id_karyawan'] = $id_karyawan;

  $updateQuery = "UPDATE tb_karyawan SET preferensi_loket='$loketkaryawan', tombol_klik = '$meja',  preferensi_meja='$meja' WHERE id_karyawan='$id_karyawan'";
  $result = mysqli_query($conn, $updateQuery);

} else {
  echo "Parameter tidak lengkap!";
}
?>
<script>
$(document).ready(function () {
        var id_karyawan = $('#idkaryawan').val();
        var loketkaryawan = $('#loketkaryawan').val();
        var meja = $('#meja').val();

        $.ajax({
            url: 'siapcetak2tes.php',
            method: 'POST',
            data: {
                loketkaryawan: loketkaryawan,
                meja: meja,
                id_karyawan: id_karyawan
            },
            success: function (response) {
                if (response.success) {
                } else {
                }
            },
            error: function (xhr, status, error) {
            }
        });
 
});
</script>

<?php
$tanggalHariIni = date("Y-m-d");
$id_karyawan = $_SESSION['id_karyawan']; // Ambil id_karyawan dari session

// Query untuk menghitung jumlah antrian berdasarkan loket dan id_karyawan
$query = "SELECT 
            loket, 
            COUNT(nomor) AS jumlah 
          FROM 
            tb_rekap_antrian 
          WHERE 
            tanggal = ? AND id_karyawan = ? 
          GROUP BY loket";

// Siapkan statement
$stmt = $conn->prepare($query);
$stmt->bind_param("si", $tanggalHariIni, $id_karyawan); // Bind tanggal dan id_karyawan
$stmt->execute();
$result = $stmt->get_result();

// Inisialisasi jumlah antrian
$jumlahDesain = 0;
$jumlahSiapCetak = 0;

// Ambil hasil query
while ($row = $result->fetch_assoc()) {
    if ($row['loket'] === 'desain') {
        $jumlahDesain = $row['jumlah'];
    } elseif ($row['loket'] === 'siap cetak') {
        $jumlahSiapCetak = $row['jumlah'];
    }
}

$tampilkan = mysqli_query($conn, "SELECT * FROM tb_umum WHERE panggil='' ORDER BY id ASC");

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
$tampilkan = mysqli_query($conn, "SELECT * FROM tb_umum WHERE panggil='' ORDER BY id ASC");
$data = mysqli_fetch_array($tampilkan);
error_reporting(0);
$nomor = $data['nomor'];
?>

<?php
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


<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAP CETAK MEJA <?= $_SESSION['loket']; ?></title>
  <link rel="stylesheet" href="css/layar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
<input type="hidden" id="idkaryawan" value="<?= $id_karyawan; ?>">
<input type="hidden" id="loketkaryawan" value="<?= $loketkaryawan; ?>">
<input type="hidden" id="meja" value="<?= $meja; ?>">


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
        <a href="#" id="logoutButton" class="btn btn-danger ms-3">Logout</a>
        <script>
        // Event listener untuk tombol logout
        document.getElementById('logoutButton').addEventListener('click', function(e) {
            e.preventDefault();  // Mencegah reload halaman saat klik tombol

            // Menampilkan SweetAlert dengan informasi jumlah antrian
            Swal.fire({
                title: "Semangat lagi yaaa!",
                html: `
                    <p>Selamat kamu hari ini mendapatkan:</p>
                    <p><strong>Desain:</strong> <?= $jumlahDesain; ?></p>
                    <p><strong>Siap Cetak:</strong> <?= $jumlahSiapCetak; ?></p>
                `,
                icon: "info",
                confirmButtonText: "OK",
            }).then((result) => {
                // Jika tombol OK ditekan, lanjutkan logout
                if (result.isConfirmed) {
                    // Redirect ke logout.php untuk menghapus session dan redirect ke loginkaryawan.php
                    window.location.href = "logoutkaryawan.php";
                }
            });
        });
    </script>

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
          <div class="card card-header umum">
            <p>SIAP CETAK 2</p>
          </div>
          <div class=" card card-body umum">
            <h5 class="card-title ">Nomor Antrian</h5>
            <h1><?php print "$_SESSION[huruf]$nomor"; ?> </h1>
            <div>
              <input type="hidden" id="nomorAntrian" value="<?= $nomor; ?>">


              <a href="#" class="btn btn-danger" onclick="panggil()"> <i class="fa fa-bell"></i> Panggil</a>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  const nomorAntrian1 = document.getElementById('nomorAntrian').value;
                  window.panggil = function () {
                    audioPlaying = false;

                    $.ajax({
                      url: 'loadmonitorbunyisiap1.php',
                      method: 'POST',
                      data: {
                        nomorAntrian1: nomorAntrian1
                      },
                      // dataType: 'json',
                      success: function (response) {
                        if (response.status === 'success') {
                        } else {
                        }
                      },
                      error: function () {
                      }
                    });
                  };
                });

              </script>
              <a href="#" class="btn btn-primary" id="ambilAntrianBtn">
                Ambil Antrian Selanjutnya <i class="fa fa-forward"></i>
              </a>
              <a href="#" class="btn btn-success" onclick="showModal()">
                <i class="fa fa-check"></i> Klik Jika Antrian Sudah Selesai
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col col-sm-5">
        <div>
          <h5>Data Antrian Customer Siap Cetak Meja <?= $_SESSION['loket']; ?> (Realtime)</h5>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="highlight2">Tanggal</th>
              <th class="highlight2">Waktu</th>
              <th class="highlight2">Nomor Antrian</th>
              <th class="highlight2">Loket</th>
              <th class="highlight2">Petugas</th>
              <th class="highlight2">Status Antrian</th>

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
            xhttp.open("GET", "api.php");
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
              url: 'ambil_antrian2.php', // Memanggil file PHP yang menangani pengambilan antrian
              method: 'GET',
              success: function (response) {

                if (response !== "Tidak ada antrian" && response !== "Gagal memperbarui data antrian") {
                  // Simpan nomor antrian di sessionStorage
                  sessionStorage.setItem('nomorAntrian', response);

                  // Refresh halaman setelah sukses
                  location.reload();
                } else {
                  // Menampilkan pesan jika tidak ada antrian

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    function showModal() {
      Swal.fire({
        title: 'Konfirmasi',
        text: "Apa kondisi antrian saat ini?",
        icon: 'question',
        showDenyButton: true, // Tombol kedua
        showCloseButton: true, // Tombol batal "X" di kanan atas
        confirmButtonColor: '#28a745', // Warna tombol utama
        denyButtonColor: '#d33', // Warna tombol kedua
        confirmButtonText: 'Ada Orangnya 👍', // Teks tombol utama
        denyButtonText: 'Tidak Ada Orangnya 🤣', // Teks tombol kedua
      }).then((result) => {
        if (result.isConfirmed) {
          // Aksi jika tombol "Ada Orangnya 👍" ditekan
          Swal.fire(
            'Berhasil!',
            'Silakan lanjutkan ke antrian berikutnya.',
            'success'
          );
          // Tambahkan logika lainnya, misalnya panggil AJAX
          prosesAdaOrangnya();
        } else if (result.isDenied) {
          // Aksi jika tombol "Tidak Ada Orangnya 🤣" ditekan
          Swal.fire(
            'Silahkan ambil antrian selanjutnya yaa.',
            'Antrian ditandai tidak ada orang',
            'info'
          );
        }
      });
    }

    // Fungsi untuk menangani "Ada Orangnya"
    function prosesAdaOrangnya() {
      const nomorAntrian1 = document.getElementById('nomorAntrian').value;
      $.ajax({
        url: 'ada2.php',
        method: 'POST',
        data: {
          nomorAntrian1: nomorAntrian1
        },
        // dataType: 'json',
        success: function (response) {
          if (response.status === 'success') {
            checked = false;
          } else {
            checked = false;
          }
        },
        error: function () {
          checked = false;
        }
      });
    }
  </script>
</body>
</html>