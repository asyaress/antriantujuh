<?php 
session_start();

require 'koneksi.php';

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Ambil data dari tb_karyawan, karena ini adalah login untuk karyawan
    $result = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE username = '$username'");
    
    // Cek username
    if( mysqli_num_rows($result) === 1 ) {

        // Cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]))  {
            // Set session untuk karyawan yang login
            $_SESSION["login"] = true;
            $_SESSION['id_karyawan'] = $row['id_karyawan'];
            $_SESSION['nama_karyawan'] = $row['nama_karyawan'];
            $_SESSION['preferensi_loket'] = $row['preferensi_loket'];
            $_SESSION['preferensi_meja'] = $row['preferensi_meja'];

            // Redirect ke halaman dashboard karyawan setelah login
            echo "<script>
            document.location.href = 'pilihkaryawan.php'; // Ganti sesuai halaman utama karyawan
            </script>";
            exit;
        } else {
            // Jika password salah
            $error = true;
        }
    } else {
        // Jika username tidak ditemukan
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="light">
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Login Karyawan">
        <meta name="keywords" content="login karyawan, sistem antrian">
        <meta name="author" content="Your Company">
        <title>Login Karyawan</title>
        <link rel="stylesheet" href="dist/css/app.css" />
    </head>
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Logo" class="w-6" src="dist/images/logo.svg">
                        <span class="text-white text-lg ml-3"> Karyawan Login </span> 
                    </a>
                    <div class="my-auto">
                        <img alt="Illustration" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10"></div>
                    </div>
                </div>
                <!-- Login Form -->
                <form action="" method="POST">
                    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                        <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                                Login Karyawan
                            </h2>
                            <?php if( isset($error) ) : ?>
                                <p style="color: red; font-style: italic;">Username / Password Salah</p>
                            <?php endif; ?>
                            <div class="intro-x mt-8">
                                <input type="text" name="username" class="intro-x login__input form-control py-3 px-4 block" placeholder="Username" required>
                                <input type="password" name="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password" required>
                            </div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button type="submit" name="login" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- End Login Form -->
            </div>
        </div>
        <script src="dist/js/app.js"></script>
    </body>
</html>
