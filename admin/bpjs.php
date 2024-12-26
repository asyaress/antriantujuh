<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login2.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="light">

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
                <li>
                    <a href="index.php" class="side-menu ">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="side-menu side-menu--active">
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
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar"></div>
            <!-- END: Top Bar -->
            <!-- BEGIN: General Report -->
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Data Antrian Desain</h2>
                <a href="javascript:location.reload()" class="ml-auto flex items-center text-primary">
                    <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                </a>
            </div>

            <!-- Filter Form -->
            <form method="GET" action="" class="mb-5">
                <div class="flex space-x-4">
                    <div>
                        <select name="id_karyawan" id="id_karyawan">
                            <option value="">Pilih ID Karyawan</option>
                            <?php
                            include '../koneksi.php';
                            $query = "SELECT id_karyawan, nama_karyawan FROM tb_karyawan";
                            $dewan1 = $conn->prepare($query);
                            $dewan1->execute();
                            $res1 = $dewan1->get_result();
                            while ($baris = $res1->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $baris['id_karyawan']; ?>"><?php echo $baris['nama_karyawan']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" name="tanggal" id="tanggal"
                            value="<?php echo isset($_GET['tanggal']) ? $_GET['tanggal'] : ''; ?>">
                    </div>
                    <div>
                        <label for="waktu">Waktu:</label>
                        <input type="time" name="waktu" id="waktu"
                            value="<?php echo isset($_GET['waktu']) ? $_GET['waktu'] : ''; ?>">
                    </div>
                    <div>
                        <label for="loket">Loket:</label>
                        <select name="loket" id="loket">
                            <option value="">Semua</option>
                            <option value="desain" <?php echo (isset($_GET['loket']) && $_GET['loket'] == 'desain') ? 'selected' : ''; ?>>Desain</option>
                            <option value="siap cetak" <?php echo (isset($_GET['loket']) && $_GET['loket'] == 'siap cetak') ? 'selected' : ''; ?>>Siap Cetak</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
            <div style="display: flex; gap: 10px; align-items: center;">
    <a href="del-bpjs.php" class="btn btn-danger">Hapus Semua Data</a>
    <a href="export_excel.php?id_karyawan=<?php echo isset($_GET['id_karyawan']) ? $_GET['id_karyawan'] : ''; ?>&tanggal=<?php echo isset($_GET['tanggal']) ? $_GET['tanggal'] : ''; ?>&waktu=<?php echo isset($_GET['waktu']) ? $_GET['waktu'] : ''; ?>&loket=<?php echo isset($_GET['loket']) ? $_GET['loket'] : ''; ?>" class="btn btn-success">Export to Excel</a>
</div>

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">No</th>
                            <th class="whitespace-nowrap">Tanggal</th>
                            <th class="whitespace-nowrap">Waktu</th>
                            <th class="whitespace-nowrap">Nomor Antrian</th>
                            <th class="whitespace-nowrap">Meja</th>
                            <th class="whitespace-nowrap">Status Antrian</th>
                            <th class="whitespace-nowrap">Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php';
                        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                        $limit = 10;
                        $limit_start = ($page - 1) * $limit;
                        $no = $limit_start + 1;

                        $query = "SELECT tb_rekap_antrian.*, tb_karyawan.nama_karyawan
                                  FROM tb_rekap_antrian
                                  JOIN tb_karyawan ON tb_rekap_antrian.id_karyawan = tb_karyawan.id_karyawan
                                  WHERE 1=1";

                        if (isset($_GET['id_karyawan']) && $_GET['id_karyawan'] != '') {
                            $query .= " AND tb_rekap_antrian.id_karyawan = " . intval($_GET['id_karyawan']);
                        }
                        if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
                            $query .= " AND tb_rekap_antrian.tanggal = '" . $_GET['tanggal'] . "'";
                        }
                        if (isset($_GET['waktu']) && $_GET['waktu'] != '') {
                            $query .= " AND tb_rekap_antrian.waktu = '" . $_GET['waktu'] . "'";
                        }
                        if (isset($_GET['loket']) && $_GET['loket'] != '') {
                            $query .= " AND tb_rekap_antrian.loket = '" . $_GET['loket'] . "'";
                        }

                        $query .= " ORDER BY tb_rekap_antrian.tanggal ASC LIMIT $limit_start, $limit;";
                        $dewan1 = $conn->prepare($query);
                        $dewan1->execute();
                        $res1 = $dewan1->get_result();
                        while ($baris = $res1->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $baris['tanggal']; ?></td>
                                <td><?php echo $baris['waktu']; ?></td>
                                <td><?= $baris['huruf']; ?> - <?php echo $baris['nomor']; ?></td>
                                <td><?php echo $baris['loket']; ?></td>
                                <td><?php echo $baris['Status']; ?></td>
                                <td><?php echo $baris['nama_karyawan']; ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
                <?php
                $query_jumlah = "SELECT count(*) AS jumlah FROM tb_rekap_antrian WHERE 1=1";

                if (isset($_GET['id_karyawan']) && $_GET['id_karyawan'] != '') {
                    $query_jumlah .= " AND id_karyawan = " . intval($_GET['id_karyawan']);
                }
                if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
                    $query_jumlah .= " AND tanggal = '" . $_GET['tanggal'] . "'";
                }
                if (isset($_GET['waktu']) && $_GET['waktu'] != '') {
                    $query_jumlah .= " AND waktu = '" . $_GET['waktu'] . "'";
                }
                if (isset($_GET['loket']) && $_GET['loket'] != '') {
                    $query_jumlah .= " AND loket = '" . $_GET['loket'] . "'";
                }

                $dewan1 = $conn->prepare($query_jumlah);
                $dewan1->execute();
                $res1 = $dewan1->get_result();
                $row = $res1->fetch_assoc();
                $total_records = $row['jumlah'];
                ?>
                <p>Total Antrian : <b> <?php echo $total_records; ?> </b></p>
                <nav class="mb-5 ">
                    <ul class="pagination justify-content-center">
                        <?php
                        $jumlah_page = ceil($total_records / $limit);
                        $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
                        $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
                        $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;

                        if ($page == 1) {
                            echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                            echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
                        } else {
                            $link_prev = ($page > 1) ? $page - 1 : 1;
                            echo '<li class="page-item"><a class="page-link" href="?page=1">First</a></li>';
                            echo '<li class="page-item"><a class="page-link" href="?page=' . $link_prev . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                        }
                        for ($i = $start_number; $i <= $end_number; $i++) {
                            $link_active = ($page == $i) ? ' active' : '';
                            echo '<li class="page-item ' . $link_active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                        if ($page == $jumlah_page) {
                            echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                            echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                        } else {
                            $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                            echo '<li class="page-item"><a class="page-link" href="?page=' . $link_next . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                            echo '<li class="page-item"><a class="page-link" href="?page=' . $jumlah_page . '">Last</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div data-url="side-menu-dark-dashboard-overview-1.html"
        class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
        <div class="dark-mode-switcher__toggle border"></div>
    </div>
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="../ admin/dist/js/app.js"></script>
</body>

</html>