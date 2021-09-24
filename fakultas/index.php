<?php

require 'template/header.php';
$data = mysqli_query($conn, "SELECT * FROM tb_laporan");

?>

<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="row">
                <section class="welcome p-t-10">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="title-4">Welcome back
                                    <span>Dashboard!</span>
                                </h1>
                                <hr class="line-seprate">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="statistic">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <h2 class="number">
                                            <?php
                                            $laporan = mysqli_query($conn, "SELECT * FROM tb_laporan");
                                            $row_laporan = mysqli_num_rows($laporan);
                                            echo "<h3>$row_laporan<h3>";
                                            ?>
                                        </h2>
                                        <span class="desc">Data Pengaduan</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-account-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <h2 class="number">
                                            <?php 
                                            $datafak = mysqli_query($conn, "SELECT * FROM tb_fakultas");
                                            $row_datafak = mysqli_num_rows($datafak);
                                            echo "<h3>$row_datafak<h3>";
                                            ?>
                                        </h2>
                                        <span class="desc">Data Fakultas / Lembaga</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <h2 class="number">
                                           <?php 
                                           $datafak = mysqli_query($conn, "SELECT * FROM tb_laporan WHERE status='Laporan Terima'");
                                           $row_datafak = mysqli_num_rows($datafak);
                                           echo "<h3>$row_datafak<h3>";
                                           ?>
                                        </h2>
                                        <span class="desc">Data Laporan Terima</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-calendar-note"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <h2 class="number">
                                            <?php 
                                            $datafak = mysqli_query($conn, "SELECT * FROM tb_laporan WHERE status='Laporan Tolak'");
                                            $row_datafak = mysqli_num_rows($datafak);
                                            echo "<h3>$row_datafak<h3>";
                                            ?>
                                        </h2>
                                        <span class="desc">Data Laporan Tolak</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-money"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<?php
    require 'template/footer.php';
?>

<script type="text/javascript">
    <?php if (isset($notif) && $notif[0] == 'success') { ?>
        Swal.fire({
            title: 'Berhasil Diproses',
            text: "<?= $notif[1] ?>",
            type: 'success',
            onClose: () => {
                location.href = "fakultas.php";
            }
        });
        <?php } else { ?>
            Swal.fire({
                title: 'Gagal Diproses',
                text: "<?= $notif[1] ?>",
                type: 'error'
            });
            <?php } ?>

        </script>