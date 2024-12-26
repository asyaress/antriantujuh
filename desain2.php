<?php
session_start();
$_SESSION ['huruf']='D';
$_SESSION ['halaman']='desain2.php';
$_SESSION ['loket']='2';
?>


<?php include 'koneksi.php' ?>
<?php
$tampilkan = mysqli_query($conn, "SELECT * FROM tb_bpjs WHERE panggil='' ORDER BY id ASC");
$data = mysqli_fetch_array($tampilkan);
error_reporting(error_level: 0);
$nomor = $data['nomor'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DESAIN MEJA<?= $_SESSION['loket']; ?></title>
    <link rel="stylesheet" href="css/layar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <img src="img/TOEDJOE.svg" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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
      <div class="row cetak">
        <div class="col-sm-5">
        <?php
  if($nomor==NULL){

    echo "
      <div class='alert alert-danger d-flex align-items-center' role='alert'>
  <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
    <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
  </svg>
  <div>
    Tidak Ada Antrian
  </div>
</div>
    ";
}
?>
          <div class="b1">
            <div class="card card-header bpjs">
              <p>DESAIN 2</p>
            </div>
            <div class=" card card-body bpjs">
              <h5 class="card-title ">Nomor Antrian</h5>
              <h1><?php print"$_SESSION[huruf]$nomor";?> </h1>
              <div>
              <a href="#" class="btn btn-danger" onclick="panggil()"> <i class="fa fa-bell"></i> Panggil</a>
              <a href="#" class="btn btn-success" onclick="panggil()"> <i class="fa fa-bell"></i> Panggil</a>

              <a href="#" class="btn btn-primary" onclick="next()">Ambil Antrian Selanjutnya <i class="fa fa-forward"></i></a>
              
              </div>
            </div>
          </div>
          <?php include "bunyi3.php"; ?>
        </div>
        
        <div class="col col-sm-5">
        <div>
        <h5>Data Antrian Desain Meja <?= $_SESSION['loket']; ?> (Realtime)</h5>
  </div>
<table class="table table-striped">
  <thead>
  <tr>
      <th scope="col" class="highlight">Tanggal</th>
    <th scope="col" class="highlight">Waktu</th>
     <th scope="col" class="highlight">Nomor Antrian</th>
     <th scope="col" class="highlight">Meja</th>
     <th scope="col" class="highlight">Status Panggil</th>
</tr>
  </thead>
  <tbody id="table">
  
  </tbody>
</table>
<script>
    function table(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            document.getElementById("table").innerHTML = this.responseText;
        }
        xhttp.open ("GET", "api2.php");
        xhttp.send();

    }

    setInterval(function(){
        table();
    }, 1000)
</script>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/date_time.js"></script>
<script type="text/javascript">window.onload = date_time('date_time');</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>