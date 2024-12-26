<?php
session_start();

include 'koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM tb_setting");
$data = mysqli_fetch_array($query);
$huruf = $_SESSION['huruf'];
$loket = $_SESSION['loket'];
?>

<?php

?>

<?php

$tampilkan = mysqli_query($conn, "SELECT * FROM tb_bpjs WHERE panggil='' ORDER BY id ASC");
$data = mysqli_fetch_array($tampilkan);
error_reporting(0);
$nomor = $data['nomor'];
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MONITOR</title>
  <link rel="stylesheet" href="css/layar.css">
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="body">
  <!-- navbar -->



  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <img src="img/TOEDJOE.svg" alt="">
      <span class="text">
      </span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        </ul>
        <span class="navbar-text" id="date_time">
        </span>
        <button class="btn btn-outline-secondary btn-sm" id="btn" style="margin-left: 10px;">Fullscreen</button>
      </div>

    </div>
  </nav>

  <!-- Video Section -->
  <div class="text-center">
    <div class="row video">
      <div class="col-12">
        <div class="card video">
          <div class="card-body-video">
            <marquee behavior="" direction="">Informasi penting akan ditampilkan di sini.</marquee>
            <iframe width="730" height="330"
              src="https://www.youtube.com/embed/sample_video_id?autoplay=1&mute=1&loop=1"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Queue Section -->
  <div class="text-center">
    <div class="row">
      <!-- Desain 1 -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
        // var audioPlaying = false; // Menandakan status audio apakah sedang diputar atau tidak
        let checked = false; // Menandakan apakah sudah pernah dicek atau belum
        function checkForUpdates() {
          if (checked) {
            return; // Jika sudah pernah dicek, jangan ulangi
          }
          checked = true; // Menandakan sudah pernah dicek
          $.ajax({
            url: 'loadmonitorbunyi2.php',
            method: 'GET',
            dataType: 'json',
            success: function (response) {

              playAudio1();
              setTimeout(function () {

                $.ajax({
                  url: 'loadmonitorbunyi3.php',
                  method: 'POST',
                  data: {
                    nomorAntrian1: response["id"]
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
              }, 1500)
              // }
            },
            error: function () {
              console.log('Terjadi kesalahan saat memanggil audio.');
              checked = false;
            }
          });

        }

        setInterval(checkForUpdates, 1000);
        function playAudio1() {
          var audio1desain = document.getElementById('audio1desain');
          var audio2desain = document.getElementById('audio2desain');
          var audio3desain = document.getElementById('audio3desain');
          var audio4desain = document.getElementById('audio4desain');
          var audio5desain = document.getElementById('audio5desain');
          var audio6desain = document.getElementById('audio6desain');
          var audio7desain = document.getElementById('audio7desain');
          var audio8desain = document.getElementById('audio8desain');
          var audio9desain = document.getElementById('audio9desain');
          var audio10desain = document.getElementById('audio10desain');
          var audio11desain = document.getElementById('audio11desain');
          var audio12desain = document.getElementById('audio12desain');
          var audio13desain = document.getElementById('audio13desain');
          var audio14desain = document.getElementById('audio14desain');

          setTimeout(function () { audio1desain.play(); }, 1000);
          setTimeout(function () { audio2desain.play(); }, 5000);
          setTimeout(function () {
            audio3desain.currentTime = 0;
            audio3desain.play();
          }, 6000);
          audio3desain.addEventListener('ended', function () {
          });
          setTimeout(function () { audio4desain.play(); }, 7000);
          setTimeout(function () { audio5desain.play(); }, 8000);
          setTimeout(function () { audio6desain.play(); }, 8300);
          setTimeout(function () { audio7desain.play(); }, 9000);
          setTimeout(function () { audio8desain.play(); }, 12000);
          setTimeout(function () { audio9desain.play(); }, 8000);
          setTimeout(function () { audio10desain.play(); }, 9000);
          setTimeout(function () { audio11desain.play(); }, 8000);
          setTimeout(function () { audio12desain.play(); }, 9000);
          setTimeout(function () { audio13desain.play(); }, 9800);
          setTimeout(function () { audio14desain.play(); }, 10700);
        }

      </script>
      <script>
        function getAudioData1() {
          $.ajax({
            url: 'get_audio_data_desain.php', // URL endpoint PHP
            method: 'GET',
            dataType: 'json',
            success: function (response) {
              if (response.status === 'success') {
                const audioDataDesain = response.audio_data_desain;
                let jumlah = audioDataDesain.nomorantriandesain.length;
                let nomoradesain = '';
                let nomorbdesain = '';
                let nomorcdesain = '';

                if (jumlah == 1) {
                  audioDataDesain.nomorantriandesain = audioDataDesain.nomorantriandesain;
                }
                if (jumlah == 2) {
                  nomoradesain = audioDataDesain.nomorantriandesain.substring(0, 1);
                  nomorbdesain = audioDataDesain.nomorantriandesain.substring(1, 2);
                }
                if (jumlah == 3) {
                  nomoradesain = audioDataDesain.nomorantriandesain.substring(0, 1);
                  nomorbdesain = audioDataDesain.nomorantriandesain.substring(1, 2);
                  nomorcdesain = audioDataDesain.nomorantriandesain.substring(2, 3);
                }


                document.getElementById('audio3desain').src = `nadav2fix/${audioDataDesain.hurufantriandesain}.mp3`;

                if (audioDataDesain.jumlahantriandesain == 1) {
                  document.getElementById('audio4desain').src = `nadav2fix/${audioDataDesain.nomorantriandesain}.mp3`;
                }
                if (audioDataDesain.nomorantriandesain == "10") {
                  document.getElementById('audio4desain').src = `nadav2fix/10.mp3`;
                }
                if (audioDataDesain.nomorantriandesain == "11") {
                  document.getElementById('audio4desain').src = `nadav2fix/11.mp3`;
                }
                
                if (audioDataDesain.jumlahantriandesain == 2 && audioDataDesain.nomorantriandesain < "20") {
                  document.getElementById('audio4desain').src = `nadav2fix/${nomorbdesain}.mp3`;
                  document.getElementById('audio5desain').src = `nadav2fix/belas.mp3`;
                }
                if (audioDataDesain.jumlahantriandesain == 2 && audioDataDesain.nomorantriandesain > "19") {
                  document.getElementById('audio4desain').src = `nadav2fix/${nomoradesain}.mp3`;
                  document.getElementById('audio5desain').src = `nadav2fix/puluh.mp3`;
                  document.getElementById('audio6desain').src = `nadav2fix/${nomorbdesain}.mp3`;
                }
                if (audioDataDesain.jumlahantriandesain == 3 && audioDataDesain.nomorantriandesain < "110") {
                  document.getElementById('audio9desain').src = `nadav2fix/110.mp3`;
                  document.getElementById('audio6desain').src = `nadav2fix/${nomorcdesain}.mp3`;
                }
                if (audioDataDesain.jumlahantriandesain == 3 && audioDataDesain.nomorantriandesain > "111") {
                  document.getElementById('audio9desain').src = `nadav2fix/100.mp3`;
                  document.getElementById('audio10desain').src = `nadav2fix/${nomorcdesain}.mp3`;
                  document.getElementById('audio6desain').src = `nadav2fix/belas.mp3`;
                }

                document.getElementById('audio8desain').src = `nadav2fix/${audioDataDesain.loketantriandesain}.mp3`;

              } else {
              }
            },
            error: function () {
            }
          });
        }

        setInterval(getAudioData1, 1000); // Refresh every 1 second
        // Call getAudioData() when the page loads
        $(document).ready(function () {
          getAudioData1();  // Fetch data the first time when the page loads
        });

      </script>


      <div id="audioplay1">
        <audio id="audio1desain" src="nadav2fix/bell.wav" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio2desain" src="nadav2fix/nomorantrian.MP3" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio3desain" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio4desain" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio5desain" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio6desain" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio7desain" src="nadav2fix/silahkanmenujukemejadesain.mp3" type="audio/mpeg"
          preload="auto"></audio>
        <audio id="audio8desain" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio9desain" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio10desain" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio11desain" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio12desain" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio13desain" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio14desain" type="audio/mpeg" preload="auto"></audio>
      </div>

      <script>
        let checked2 = false; // Menandakan apakah sudah pernah dicek atau belum
        function checkForUpdates2() {
          if (checked2) {
            return; // Jika sudah pernah dicek, jangan ulangi
          }
          checked2 = true; // Menandakan sudah pernah dicek
          $.ajax({
            url: 'loadmonitorbunyisiap2.php',
            method: 'GET',
            dataType: 'json',
            success: function (response) {

              playAudio2();
              setTimeout(function () {

                $.ajax({
                  url: 'loadmonitorbunyisiap3.php',
                  method: 'POST',
                  data: {
                    nomorAntrian1: response["id"]
                  },
                  // dataType: 'json',
                  success: function (response) {
                    if (response.status === 'success') {
                      checked2 = false;
                    } else {
                      checked2 = false;
                    }
                  },
                  error: function () {
                    checked2 = false;
                  }
                });
              }, 1500)
              // }
            },
            error: function () {
              checked2 = false;
            }
          });

        }

        setInterval(checkForUpdates2, 1000);
        function playAudio2() {
          var audio1siap = document.getElementById('audio1siap');
          var audio2siap = document.getElementById('audio2siap');
          var audio3siap = document.getElementById('audio3siap');
          var audio4siap = document.getElementById('audio4siap');
          var audio5siap = document.getElementById('audio5siap');
          var audio6siap = document.getElementById('audio6siap');
          var audio7siap = document.getElementById('audio7siap');
          var audio8siap = document.getElementById('audio8siap');
          var audio9siap = document.getElementById('audio9siap');
          var audio10siap = document.getElementById('audio10siap');
          var audio11siap = document.getElementById('audio11siap');
          var audio12siap = document.getElementById('audio12siap');
          var audio13siap = document.getElementById('audio13siap');
          var audio14siap = document.getElementById('audio14siap');

          setTimeout(function () { audio1siap.play(); }, 1000);
          setTimeout(function () { audio2siap.play(); }, 5000);
          setTimeout(function () {
            audio3siap.currentTime = 0;
            audio3siap.play();
          }, 6400);
          audio3siap.addEventListener('ended', function () {
          });
          setTimeout(function () { audio4siap.play(); }, 7000);
          setTimeout(function () { audio5siap.play(); }, 8000);
          setTimeout(function () { audio6siap.play(); }, 8300);
          setTimeout(function () { audio7siap.play(); }, 9000);
          setTimeout(function () { audio8siap.play(); }, 12000);
          setTimeout(function () { audio9siap.play(); }, 8000);
          setTimeout(function () { audio10siap.play(); }, 9000);
          setTimeout(function () { audio11siap.play(); }, 8000);
          setTimeout(function () { audio12siap.play(); }, 9000);
          setTimeout(function () { audio13siap.play(); }, 9800);
          setTimeout(function () { audio14siap.play(); }, 10700);
        }

        // function playAudioElement(audio) {
        //   if (audio.paused || audio.ended) {
        //     audio.currentTime = 0;  // Reset waktu audio ke awal
        //     audio.play().catch(function (error) {
        //       console.log('Error saat memutar audio:', error);
        //     });
        //   }
        // }

        // Panggil checkForUpdates() segera saat halaman dimuat

        // Jika ada kebutuhan untuk memutar audio lagi tanpa perlu refresh halaman
        // function playAudioAgain() {
        //   // Anda bisa memanggil fungsi playAudio() lagi untuk memutar audio tanpa refresh halaman
        //   playAudio();
        // }

        // Panggil playAudioAgain() jika Anda ingin memutar ulang audio setelah beberapa waktu atau interaksi

      </script>
      <script>
        // Fungsi untuk mengambil data audio dari server menggunakan AJAX
        function getAudioDatasiap() {
          $.ajax({
            url: 'get_audio_data_siap.php', // URL endpoint PHP
            method: 'GET',
            dataType: 'json',
            success: function (response) {
              if (response.status === 'success') {
                const audioDatasiap = response.audio_data_siap;

                let jumlah = audioDatasiap.nomorantriansiap.length;
                let nomorasiap = '';
                let nomorbsiap = '';
                let nomorcsiap = '';

                if (jumlah == 1) {
                  audioDatasiap.nomorantriansiap = audioDatasiap.nomorantriansiap;
                }
                if (jumlah == 2) {
                  nomorasiap = audioDatasiap.nomorantriansiap.substring(0, 1);
                  nomorbsiap = audioDatasiap.nomorantriansiap.substring(1, 2);
                }
                if (jumlah == 3) {
                  nomorasiap = audioDatasiap.nomorantriansiap.substring(0, 1);
                  nomorbsiap = audioDatasiap.nomorantriansiap.substring(1, 2);
                  nomorcsiap = audioDatasiap.nomorantriansiap.substring(2, 3);
                }


                document.getElementById('audio3siap').src = `nadav2fix/${audioDatasiap.hurufantriansiap}.mp3`;

                if (audioDatasiap.jumlahantriansiap == 1) {
                  document.getElementById('audio4siap').src = `nadav2fix/${audioDatasiap.nomorantriansiap}.mp3`;
                }
                if (audioDatasiap.nomorantriansiap == "10") {
                  document.getElementById('audio4siap').src = `nadav2fix/10.mp3`;
                }
                if (audioDatasiap.nomorantriansiap == "11") {
                  document.getElementById('audio4siap').src = `nadav2fix/11.mp3`;
                }
                
                if (audioDatasiap.jumlahantriansiap == 2 && audioDatasiap.nomorantriansiap < "20") {
                  document.getElementById('audio4siap').src = `nadav2fix/${nomorbsiap}.mp3`;
                  document.getElementById('audio5siap').src = `nadav2fix/belas.mp3`;
                }
                if (audioDatasiap.jumlahantriansiap == 2 && audioDatasiap.nomorantriansiap > "19") {
                  document.getElementById('audio4siap').src = `nadav2fix/${nomorasiap}.mp3`;
                  document.getElementById('audio5siap').src = `nadav2fix/puluh.mp3`;
                  document.getElementById('audio6siap').src = `nadav2fix/${nomorbsiap}.mp3`;
                }
                if (audioDatasiap.jumlahantriansiap == 3 && audioDatasiap.nomorantriansiap < "110") {
                  document.getElementById('audio9siap').src = `nadav2fix/110.mp3`;
                  document.getElementById('audio6siap').src = `nadav2fix/${nomorcsiap}.mp3`;
                }
                if (audioDatasiap.jumlahantriansiap == 3 && audioDatasiap.nomorantriansiap > "111") {
                  document.getElementById('audio9siap').src = `nadav2fix/100.mp3`;
                  document.getElementById('audio10siap').src = `nadav2fix/${nomorcsiap}.mp3`;
                  document.getElementById('audio6siap').src = `nadav2fix/belas.mp3`;
                }

                document.getElementById('audio8siap').src = `nadav2fix/${audioDatasiap.loketantriansiap}.mp3`;

              } else {
              }
            },
            error: function () {
            }
          });
        }

        setInterval(getAudioDatasiap, 1000); // Refresh every 1 second
        // Call getAudioData() when the page loads
        $(document).ready(function () {
          getAudioDatasiap();  // Fetch data the first time when the page loads
        });

      </script>

      <div id="audioplaysiap">
        <audio id="audio1siap" src="nadav2fix/bell.wav" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio2siap" src="nadav2fix/nomorantrian.MP3" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio3siap" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio4siap" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio5siap" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio6siap" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio7siap" src="nadav2fix/silahkanmenujukemejasiapcetak.mp3" type="audio/mpeg"
          preload="auto"></audio>
        <audio id="audio8siap" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio9siap" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio10siap" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio11siap" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio12siap" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio13siap" type="audio/mpeg" preload="auto"></audio>
        <audio id="audio14siap" type="audio/mpeg" preload="auto"></audio>
      </div>

      <div class="col-sm-6">
        <div class="card">
          <div class="card-header bpjs">
            DESAIN 1</p>
          </div>
          <div class="card-body bpjs">
            <h3>Nomor Antrian</h3>
            <h2 id="loadmonitor"></h2>
            <h3>MEJA 1</h3>
          </div>
        </div>
      </div>

      <!-- Siap Cetak 1 -->
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header umum">
            <p>SIAP CETAK 1</p>
          </div>
          <div class="card-body umum">
            <h3>Nomor Antrian</h3>
            <h2 id="loadmonitor3"></h2>
            <h3>MEJA 3</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <!-- Desain 2 -->
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header bpjs">
            <p>DESAIN 2</p>
          </div>
          <div class="card-body bpjs">
            <h3>Nomor Antrian</h3>
            <h2 id="loadmonitor2"></h2>
            <h3>MEJA 2</h3>
          </div>
        </div>
      </div>

      <!-- Siap Cetak 2 -->
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header umum">
            <p>SIAP CETAK 2</p>
          </div>
          <div class="card-body umum">
            <h3>Nomor Antrian</h3>
            <h2 id="loadmonitor4"></h2>
            <h3>MEJA 4</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <marquee style="margin-top: 20px;">PUSKESMAS</marquee> -->
  <script>
    $(document).ready(function () {
      setInterval(function () {
        $("#loadmonitor").load('loadmonitor.php')
      }, 1000);
    });
  </script>
  <script>
    $(document).ready(function () {
      setInterval(function () {
        $("#loadmonitor2").load('loadmonitor2.php')
      }, 1000);
    });
  </script>
  <script>
    $(document).ready(function () {
      setInterval(function () {
        $("#loadmonitor3").load('loadmonitor3.php')
      }, 1000);
    });
  </script>
  <script>
    $(document).ready(function () {
      setInterval(function () {
        $("#loadmonitor4").load('loadmonitor4.php')
      }, 1000);
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/date_time.js"></script>
  <script type="text/javascript">window.onload = date_time('date_time');</script>

  <script>

    let myDocument = document.documentElement;
    let btn = document.getElementById("btn");
    btn.addEventListener("click", () => {
      if (btn.textContent == "Fullscreen") {
        if (myDocument.requestFullscreen) {
          myDocument.requestFullscreen();
        }
        else if (myDocument.msRequestFullscreen) {
          myDocument.msRequestFullscreen();
        }
        else if (myDocument.mozRequestFullScreen) {
          myDocument.mozRequestFullScreen();
        }
        else if (myDocument.webkitRequestFullscreen) {
          myDocument.webkitRequestFullscreen();
        }
        btn.textContent = "Exit";
      }
      else {
        if (document.exitFullscreen) {
          document.exitFullscreen();
        }
        else if (document.msexitFullscreen) {
          document.msexitFullscreen();
        }
        else if (document.mozexitFullscreen) {
          document.mozexitFullscreen();
        }
        else if (document.webkitexitFullscreen) {
          document.webkitexitFullscreen();
        }
        btn.textContent = "Fullscreen";
      }
    });


  </script>
</body>

</html>