<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AMBILANTRIAN</title>
  <link rel="stylesheet" href="css/layar.css">
  <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
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
          <li class="nav-item">

          </li>
          <li class="nav-item">

          </li>
          <li class="nav-item">

          </li>
        </ul>
        <span class="navbar-text" id="date_time">
          <script type="text/javascript" src="js/date_time.js"></script>
          <script type="text/javascript">window.onload = date_time('date_time');</script>
        </span>
      </div>
    </div>
  </nav>
  <!-- end navbar -->
  <div class="text-center">
    <div class="row cetak">
      <div class="col-sm-5">
        <div class="b1">
          <div class="card card-header bpjs">
            <p>DESAIN</p>
          </div>
          <div class="card card-body bpjs">
            <h5 class="card-title">Nomor Antrian</h5>
            <h1 style="font-size: 124px;">DESAIN</h1>
            <h5 class="card-title" style="font-size: 30px;">Jika anda belum ada desain pilih ini</h5>
            <!-- Tambahkan link yang akan menutupi seluruh card -->
            <a href="simpan.php?huruf=D" class="full-link" target="_blank"></a>
          </div>

        </div>
      </div>

      <div class="col col-sm-5">
        <div class="b1">
          <div class="card card-header umum">
            <p>SIAP CETAK</p>
          </div>
          <div class=" card card-body umum">
            <h5 class="card-title ">Nomor Antrian</h5>
            <h1 style="font-size: 124px;">SIAP CETAK</h1>
            <h5 class="card-title" style="font-size: 30px;">Jika file anda siap cetak pilih ini</h5>

            <div>
              <a href="simpan2.php?huruf=S" class="full-link" target="_blank"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/date_time.js"></script>
  <script type="text/javascript">window.onload = date_time('date_time');</script>
</body>

</html>