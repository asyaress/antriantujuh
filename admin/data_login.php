<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../login2.php");
	exit;
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
                        <a href="index.php" class="side-menu ">
                            <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <li>
                        <a href="bpjs.php" class="side-menu ">
                            <div class="side-menu__icon"> <i data-lucide="clipboard-check"></i> </div>
                            <div class="side-menu__title"> Data Rekap Antrian </div>
                        </a>
                    </li>
                    <li>
                        <a href="setting.php" class="side-menu ">
                            <div class="side-menu__icon"> <i data-lucide="airplay"></i> </div>
                            <div class="side-menu__title"> Setting Monitor </div>
                        </a>
                    </li>
                    <li>
                        <a href="data_login.php" class="side-menu side-menu--active">
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
                            <!-- BEGIN: General Report -->
                            <div class="intro-y flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                     Data Admin
                                    </h2>
                                    <a href="data_login.php" class="ml-auto flex items-center text-primary"></a>
                                </div>
                                <a href="add_admin.php" class="btn btn-primary" role="button">Tambah Admin</a>

                    <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">No</th>
                                    <th class="whitespace-nowrap">Username</th>
                                    <th class="whitespace-nowrap">Password</th>
                                    <th class="whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
        include '../koneksi.php';
        $page = (isset($_GET['page']))? $_GET['page'] : 1;
        $limit = 10; 
        $limit_start = ($page - 1) * $limit;
        $no = $limit_start + 1;

        $query = "SELECT * FROM tb_login ORDER BY id_login ASC LIMIT $limit_start, $limit";
        $dewan1 = $conn->prepare($query);
        $dewan1->execute();
        $res1 = $dewan1->get_result();
        while ($baris = $res1->fetch_assoc()) {
            ?>
            <tr>
                
                <td><?php echo $no++; ?></td>
                <td><?php echo $baris['username']; ?></td>
                <td><?php echo $baris['password']; ?></td>
                <td>    <a class="btn btn-danger" href="del_admin.php?id_login=<?= $baris["id_login"]; ?>" onclick="return confirm('yakin?');">Hapus</a></td>
                </tr>
                
                </tr>
            <?php 
            
        }
        ?>
                            </tbody>
                        </table>
                        
          </ul>
        </nav>
                    </div>
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

        
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="../admin/dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>