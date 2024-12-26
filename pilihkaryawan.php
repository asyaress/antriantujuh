<?php
session_start();

// Ambil ID karyawan dari session atau database jika diperlukan
$id_karyawan = $_SESSION['id_karyawan']; // Atau gunakan data lain sesuai kebutuhan

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Meja</title>
    <link rel="stylesheet" href="css/layar.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* CSS Flexbox untuk responsif layout */
        .cetak {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            /* Menambahkan jarak antar card */
        }

        .card {
            flex: 1;
            min-width: 300px;
            /* Card tidak akan lebih kecil dari 300px */
            max-width: 100%;
            /* Card akan melebar mengikuti lebar kontainer */
            margin: 10px;
            width: 100%;
            /* Card akan mengikuti lebar kontainer */
        }

        /* Mengatur ukuran font responsif */
        .card-title {
            font-size: 2rem;
        }

        .display-1 {
            font-size: 6vw;
            /* Ukuran font responsif berdasarkan lebar layar */
        }

        /* Menambahkan padding agar layout lebih rapi */
        .card-body {
            padding: 20px;
        }

        /* Membuat button lebih responsif */
        .btn {
            width: 30%;
            margin-bottom: 10px;
            font-size: 1.5rem;
            /* Menambah ukuran font tombol */

        }

        /* Media Queries untuk perangkat lebih kecil */
        @media (max-width: 768px) {
            .card-title {
                font-size: 1.5rem;
            }

            .display-1 {
                font-size: 10vw;
                /* Mengurangi ukuran font pada layar lebih kecil */
            }

            .btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .display-1 {
                font-size: 12vw;
            }
        }
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <input type="hidden" id="idkaryawan" value="<?php echo $id_karyawan; ?>">
    <div id="error-message" style="color: red;"></div> <!-- To display error messages -->
    <script>
        $(document).ready(function () {
            var id_karyawan = $('#idkaryawan').val();

            function updateButtons() {
                $.ajax({
                    url: 'fetch_tombol_klik.php',
                    method: 'GET',
                    data: { id_karyawan: id_karyawan },
                    dataType: 'json',
                    success: function (response) {
                        console.log(response); // Log the response for debugging

                        if (response.status === 'success') {
                            var tombol_klik = response.tombol_klik_list; // Array dari server
                            console.log(tombol_klik);

                            if (tombol_klik.includes('1')) {
                                // Jika tombol_klik_list berisi angka 1
                                $('#button-meja1').hide();
                            }
                            if (tombol_klik.includes('2')) {
                                // Jika tombol_klik_list berisi angka 2
                                $('#button-meja2').hide();
                            }
                            if (tombol_klik.includes('3')) {
                                // Jika tombol_klik_list berisi angka 2
                                $('#button-meja3').hide();
                            }
                            if (tombol_klik.includes('4')) {
                                // Jika tombol_klik_list berisi angka 2
                                $('#button-meja4').hide();
                            }

                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        $('#error-message').text('An error occurred while fetching tombol_klik');
                    }
                });
            }

            // Initial call to set button states
            updateButtons();

            // Optionally, set an interval to keep checking for changes (e.g., every 5 seconds)
            setInterval(updateButtons, 5000);
        });

    </script>


    <div class="container-fluid sm:px-10"> <!-- Ganti container dengan container-fluid -->
        <div class="text-center">
            <h1 class="my-4">Anda sedang berada di meja mana?</h1>
            <div class="row cetak justify-content-center">
                <!-- Pilihan Meja Desain -->
                <div class="col-12 col-md-5 mb-4">
                    <div class="b1">
                        <div class="card card-header bpjs">
                            <p>MEJA DESAIN</p>
                        </div>
                        <div class="card card-body bpjs">
                            <h5 class="card-title">Saya berada di meja:</h5>
                            <h1 class="display-1">DESAIN</h1>
                            <div>
                                <a id="button-meja1"
                                    href="desain1tes.php?loketkaryawan=desain&meja=1&id_karyawan=<?php echo $id_karyawan; ?>"
                                    class="btn btn-secondary mb-2" target="_blank"
                                    style="background-color: #800000; color: white; text-decoration: none;"
                                    onmouseover="this.style.backgroundColor='#b22222'"
                                    onmouseout="this.style.backgroundColor='#800000'">
                                    Pilih Meja 1
                                </a>

                                <a id="button-meja2"
                                    href="desain2tes.php?loketkaryawan=desain&meja=2&id_karyawan=<?php echo $id_karyawan; ?>"
                                    class="btn btn-secondary mb-2" target="_blank"
                                    style="background-color: #800000; color: white; text-decoration: none;"
                                    onmouseover="this.style.backgroundColor='#b22222'"
                                    onmouseout="this.style.backgroundColor='#800000'">
                                    Pilih Meja 2
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pilihan Meja Siap Cetak -->
                <div class="col-12 col-md-5 mb-4">
                    <div class="b1">
                        <div class="card card-header umum">
                            <p>MEJA SIAP CETAK</p>
                        </div>
                        <div class="card card-body umum">
                            <h5 class="card-title">Saya berada di meja:</h5>
                            <h1 class="display-1">SIAP CETAK</h1>
                            <div>
                            <a id="button-meja3"
                                    href="siapcetak1tes.php?loketkaryawan=siap cetak&meja=3&id_karyawan=<?php echo $id_karyawan; ?>"
                                    class="btn btn-secondary mb-2" target="_blank"
                                    style="background-color: #7257a3; color: white; text-decoration: none;"
                                    onmouseover="this.style.backgroundColor='#4f3b75'"
                                    onmouseout="this.style.backgroundColor='#7257a3'">
                                    Pilih Meja 3
                                </a>

                                <a id="button-meja4"
                                    href="siapcetak2tes.php?loketkaryawan=siap cetak&meja=4&id_karyawan=<?php echo $id_karyawan; ?>"
                                    class="btn btn-secondary mb-2" target="_blank"
                                    style="background-color: #7257a3; color: white; text-decoration: none;"
                                    onmouseover="this.style.backgroundColor='#4f3b75'"
                                    onmouseout="this.style.backgroundColor='#7257a3'">
                                    Pilih Meja 4
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional Bootstrap JS for interactivity, if needed -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz4fnFO9gyb6C7fEDSROaHkFfzr7K6lRHi7gDg7gDkX2p9Onvo3eFq9w0e"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-pzjw8f+ua7Kw1TIq0RIhA8LHoRb0fJz5l0B+8tWn+K8fw5g5+I01f5xqJZZ5/2fJ"
            crossorigin="anonymous"></script>
</body>

</html>