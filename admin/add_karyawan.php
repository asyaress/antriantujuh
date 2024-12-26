<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login2.php");
    exit;
}
?>
<?php
require 'functionkaryawan.php';
require '../koneksi.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
				alert('Berhasil Ditambahkan!');
                document.location.href = 'admin/data_karyawan.php';
			  </script>";
    } else {
        echo mysqli_error($conn);
    }

}

?>
<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="../admin/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Dashboard - Admin</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="../admin/dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5">
    <div class="flex mt-[4.7rem] md:mt-0">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                <span class="hidden xl:block text-white text-lg ml-3"> Administrator </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <!-- <a href="javascript:;.html" class="side-menu side-menu--active"> -->

                <li>
                    <a href="admin.php" class="side-menu ">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="bpjs.php" class="side-menu ">
                        <div class="side-menu__icon"> <i data-lucide="clipboard-check"></i> </div>
                        <div class="side-menu__title"> Data Rekap Antrian</div>
                    </a>
                </li>
                <li>
                    <a href="setting.php" class="side-menu ">
                        <div class="side-menu__icon"> <i data-lucide="airplay"></i> </div>
                        <div class="side-menu__title"> Setting Monitor </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="side-menu side-menu--active">
                        <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                        <div class="side-menu__title"> Data Admin </div>
                    </a>
                </li>
                <li>
                    <a href="logout.php" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="power"></i> </div>
                        <div class="side-menu__title"> Log Out </div>
                    </a>
                </li>
                <li class="side-nav__devider my-6"></li>
            </ul>
            </li>
            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
            </div>
            <!-- END: Top Bar -->
            <!-- BEGIN: General Report -->
            <h2 class="intro-y text-lg font-medium mt-100 text-center">
                Tambah Admin
            </h2>
            <!-- BEGIN: Data List -->
            <!-- <form action="" method="POST">
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-200 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                       
                        <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">
                            <input type="text" name="username" class="intro-x login__input form-control py-3 px-4 block" placeholder="Username">
                            <input type="password" name="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password">
                            <input type="password" name="password2" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Konfirmasi Password">
                            </div>
                        <div class="intro-x flex items-center text-slate-600 dark:text-slate-500 mt-4 text-xs sm:text-sm">
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <input type="button" class="btn btn-danger py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" value="Batal" onclick="history.back(-1)" />
                        <button type="submit" name="register" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Tambah</button>
                        </div>
                    </div>
                </div>
                </form> -->

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="intro-y box p-5">
                    <div>
                        <br>
                        <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan">
                    </div>
                    <div>
                        <br>
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div>
                        <br>
                        <label for="password2" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password2" id="password2">
                    </div>
                    <br>
                    <div>
                        <div class="mb-3">
                            <input type="button" class="btn btn-danger" value="Kembali" onclick="history.back(-1)" />
                            <button class="btn btn-primary" type="submit" name="register">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- END: Data List -->

            <!-- END: General Report -->

            <!-- END: Schedules -->
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->

    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="../admin/dist/js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>