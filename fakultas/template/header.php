<?php
require '../koneksi.php';
if (!isset($_SESSION['login_fakultas'])) {
  header("location: login.php");
}
$ses = $_SESSION['login_fakultas'];
$data = mysqli_query($conn, "SELECT * FROM tb_fakultas where username = '$ses' limit 1");
$data = mysqli_fetch_array($data);

$foto = $data['foto'];
if(is_null($data['foto']) || !file_exists($data['foto'])) {
    $foto = '../images/icon/avatar-01.jpg';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="../index.html">
                            <img  src="../images/icon/logo1.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                                        <li class="has-sub">
                                                <a class="js-arrow" href="index.php">
                                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                                </a>
                                            </li>
                                            <li class="has-sub">
                                                <a class="js-arrow" href="#">
                                                    <i class="fas fa-copy"></i>Laporan Pengaduan
                                                </a>
                                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                    <li>
                                                        <a href="data-laporan.php">Data Pengaduan</a>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="dataditerima.php">Pengaduan Di Terima</a>
                                                    </li>
                                                    <li>
                                                        <a href="dataditolak.php">Pengaduan Di Tolak</a>
                                                    </li> -->
                                                </ul>
                                            </li>
                                            <!-- <li>
                                                <a href="fakultas.php">
                                                    <i class="fas fa-table"></i>Fakultass / Lembaga
                                                </a>
                                            </li> -->
                                        </ul>
                                    </div>
                                </nav>
                            </header>
                            <!-- END HEADER MOBILE-->
                            <!-- MENU SIDEBAR-->
                            <aside class="menu-sidebar d-none d-lg-block">
                                <div class="logo">
                                    <a href="#">
                                        <img  style="" src="../images/icon/logo3.png" alt="Cool Admin";>
                                    </a>
                                </div>
                                <div class="menu-sidebar__content js-scrollbar1">
                                    <nav class="navbar-sidebar">
                                        <ul class="list-unstyled navbar__list">
                                            <li class="has-sub">
                                                <a class="js-arrow" href="index.php">
                                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                                </a>
                                            </li>
                                            <li class="has-sub">
                                                <a class="js-arrow" href="#">
                                                    <i class="fas fa-copy"></i>Laporan Pengaduan
                                                </a>
                                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                    <li>
                                                        <a href="data-laporan.php">Data Pengaduan</a>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="dataditerima.php">Pengaduan Di Terima</a>
                                                    </li>
                                                    <li>
                                                        <a href="dataditolak.php">Pengaduan Di Tolak</a>
                                                    </li> -->
                                                </ul>
                                            </li>
                                            <!-- <li>
                                                <a href="fakultas.php">
                                                    <i class="fas fa-table"></i>Fakultass / Lembaga
                                                </a>
                                            </li> -->
                                            <!-- <li class="has-sub">
                                                <a class="js-arrow" href="riwayat.php">
                                                    <i class="fas fa-copy"></i>Riwayat Pengaduan
                                                </a>
                                            </li> -->
                                        </ul>
                                    </nav>
                                </div>
                            </aside>
                            <div class="page-container">
                                <header class="header-desktop">
                                    <div class="section__content section__content--p30">
                                        <div class="container-fluid">
                                            <div class="header-wrap">
                                                <form class="form-header" name="form1" action="fakultas.php" method="get">
                                                    <!-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                                    <button class="au-btn--submit" type="submit" name="submit" value="search">
                                                        <i class="zmdi zmdi-search"></i>
                                                    </button> -->
                                                </form>
                                                <div class="header-button">
                                                    <div class="noti-wrap">
                                                        <div class="account-wrap">
                                                            <div class="account-item clearfix js-item-menu">
                                                                <div class="image">
                                                                    <img src="<?= $foto ?>" alt="John Doe" />
                                                                </div>
                                                                <div class="content">
                                                                    <a class="js-acc-btn" href="../#"></a>
                                                                </div>
                                                                <div class="account-dropdown js-dropdown">
                                                                    <div class="info clearfix">
                                                                        <div class="image">
                                                                            <a href="../#">
                                                                                <img src="<?= $foto ?>" alt="John Doe" />
                                                                            </a>
                                                                        </div>
                                                                        <div class="content">
                                                                            <h5 class="name">
                                                                                <a href="../#"><?=$data["nama_admin"]?></a>
                                                                            </h5>
                                                                            <span class="email"><?= $data['username'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="account-dropdown__body">
                                                                        <div class="account-dropdown__item">
                                                                            <a href="profil.php">
                                                                                <i class="zmdi zmdi-account"></i>Profil</a>
                                                                            </div>
                                                                            <div class="account-dropdown__footer">
                                                                                <a href="logout.php">
                                                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </header>
                                                <!-- HEADER DESKTOP-->

                                                <!-- MAIN CONTENT-->
                                                <!-- END MAIN CONTENT-->
                                                <!-- END PAGE CONTAINER-->
                                            </div>

                                        </div>