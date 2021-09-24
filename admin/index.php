<?php

require 'template/header.php';
$data = mysqli_query($conn, "SELECT * FROM tb_laporan");

if (isset($_POST["tambahdata"])){
    $nama_admin = $_POST['nama_admin'];
    $nama_fakultas = $_POST['nama_fakultas'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($conn, "INSERT INTO tb_laporan VALUES (null, '$nama_admin', '$nama_fakultas', '$username', '$password')");

    if (mysqli_affected_rows($conn) > 0){
        $notif = ["success", "Berhasil tambah data"]; 
    }
    else {
        $notif = ["error", mysqli_error($conn)]; 
    }
}

if (isset($_POST["updatedata"])){
    $id = $_POST['id'];
    $nama_admin = $_POST['nama_admin'];
    $nama_fakultas = $_POST['nama_fakultas'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($password!="") {
    # code...
        mysqli_query($conn, "UPDATE tb_laporan set nama_admin='$nama_admin', nama_fakultas='$nama_fakultas', username='$username' WHERE id='$id'");
    } else {
        mysqli_query($conn, "UPDATE tb_laporan set nama_admin='$nama_admin', nama_fakultas='$nama_fakultas', username='$username', password='$password' WHERE id='$id'");

    }


    if (mysqli_affected_rows($conn) > 0){
        $notif = ["success", "Berhasil update data"]; 
    }
    else {
        $notif = ["error", mysqli_error($conn)]; 
    }
}
?>

<div class="page-container">

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="row">

                <!-- WELCOME-->
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
                <!-- END WELCOME-->
                <!-- STATISTIC-->
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
            <!-- END STATISTIC-->
             <!--    <div id="container2" style="min-width: fit-content; height: fit-content; margin: 0 auto"></div>
         -->
     </div>
 </div>
</div>
</div>
</div>


<?php foreach ($data as $dta) {  ?>
<!-- <div class="modal fade" id="mediumModal<?=$dta["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Update Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nf-text" class=" form-control-label"></label>
                        <input type="text" id="nf-text" name="nama_admin" placeholder="Nama Anda" value="<?=$dta['nama_admin'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nf-text" class=" form-control-label">Nama Fakultas</label>
                        <input type="text" id="nf-text" name="nama_fakultas" placeholder="Nama Fakultas" value="<?=$dta['nama_fakultas']?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nf-text" class=" form-control-label">Username</label>
                        <input type="text" id="nf-text" name="username" placeholder="Username" value="<?=$dta['username']?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nf-text" class=" form-control-label">Password</label>
                        <input type="text" id="nf-text" name="password" placeholder="Password" class="form-control">
                    </div>      
                    <span>
                        NOTE : Masukkan password baru untuk mengganti password          
                    </span>
                    <input type="hidden" name="id" value="<?=$dta['id']?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="updatedata" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
-->
<?php }

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