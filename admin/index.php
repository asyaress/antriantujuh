<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../login.php");
	exit;
}
?>
<?php
include '../koneksi.php';
$query_jumlah = "SELECT count(*) AS jumlah FROM tb_bpjs";
$data = $conn->prepare($query_jumlah);
$data->execute();
$array = $data->get_result();
$row = $array->fetch_assoc();
$total_records = $row['jumlah'];

?>

<?php
include '../koneksi.php';
$query_jumlah = "SELECT count(*) AS jumlah FROM tb_umum";
$data = $conn->prepare($query_jumlah);
$data->execute();
$array = $data->get_result();
$row = $array->fetch_assoc();
$total_records2 = $row['jumlah'];

?>

<?php
include '../koneksi.php';
$query_jumlah = "SELECT count(*) AS jumlah FROM tb_login";
$data = $conn->prepare($query_jumlah);
$data->execute();
$array = $data->get_result();
$row = $array->fetch_assoc();
$total_records3 = $row['jumlah'];

?>
<!DOCTYPE html>

<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="../admin/dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
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
                        <a href="#" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <li>
                    <a href="bpjs.php" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="clipboard-check"></i> </div>
                        <div class="side-menu__title"> Data Rekap Antrian </div>
                    </a>
                </li>
                    <li>
                        <a href="setting.php" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="airplay"></i> </div>
                            <div class="side-menu__title"> Setting Monitor </div>
                        </a>
                    </li>
                    <li>
                        <a href="data_login.php" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                            <div class="side-menu__title"> Data Admin </div>
                        </a>
                    </li>
                    <li>
                        <a href="data_login_karyawan.php" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                            <div class="side-menu__title"> Data Karyawan </div>
                        </a>
                    </li>
                    <li>
                        <a href="../logout.php" class="side-menu">
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
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 2xl:col-span-9">
                        <div class="grid grid-cols-12 gap-6">
                            <!-- BEGIN: General Report -->
                            <div class="col-span-12 mt-8">
                                <div class="intro-y flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                       Dashboard
                                    </h2>
                                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-lucide="book" class="report-box__icon text-primary"></i> 
                                                    <div class="ml-auto">
                                                        
                                                    </div>
                                                </div>
                                                <div class="text-3xl font-medium leading-8 mt-6"><?php echo $total_records ?></div>
                                                <div class="text-base text-slate-500 mt-1">Total Antrian Desain</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-lucide="book" class="report-box__icon text-pending"></i> 
                                                    <div class="ml-auto">
                                                    </div>
                                                </div>
                                                <div class="text-3xl font-medium leading-8 mt-6"><?php echo $total_records2 ?></div>
                                                <div class="text-base text-slate-500 mt-1">Total Antrian Siap Cetak</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-lucide="monitor" class="report-box__icon text-warning"></i> 
                                                    <div class="ml-auto">
                                                    </div>
                                                </div>
                                                <div class="text-3xl font-medium leading-8 mt-6"><?php echo $total_records + $total_records2 ?></div>
                                                <div class="text-base text-slate-500 mt-1">Total Semua Antrian</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-lucide="user" class="report-box__icon text-success"></i> 
                                                    <div class="ml-auto">
                                                   </div>
                                                </div>
                                                <div class="text-3xl font-medium leading-8 mt-6"><?= $total_records3; ?></div>
                                                <div class="text-base text-slate-500 mt-1">Admin</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        <div data-url="side-menu-dark-dashboard-overview-1.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
            <div class="dark-mode-switcher__toggle border"></div>
        </div>
        <!-- END: Dark Mode Switcher-->
        
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="../admin/dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>