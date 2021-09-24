<?php

require 'template/header.php';
$data = mysqli_query($conn, "SELECT * FROM tb_laporan WHERE status='Laporan Terima'");



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

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <center><h3 class="title-5 m-b-35">Data Laporan Pengaduan</h3></center>
                    <div class="table-data__tool">                            
                       <!--  <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small"  data-target="#modaltambah">
                                <i class="zmdi zmdi-plus"></i>add item</button>
                            </div>
                        </div> -->
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik / Nim</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th width="50">Status</th>
                                        <th width="50">Validasi Fak.</th>
                                        <th width="50">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($data as $dta) : ?>
                                    <tr class="tr-shadow">
                                        <td><?=$no ?></td>
                                        <td><?=$dta["nim"] ?></td>
                                        <td><?=$dta["nama"] ?></td>
                                        <td><?=$dta["email"] ?></td>
                                        <td>
                                            <span class="btn btn-success btn-sm"><?=$dta["status"] ?></span>
                                        </td>
                                        <td>
                                            <?php if($dta['readby_fakultas'] == 0) : ?>
                                                <span class="btn btn-warning btn-sm">
                                                    WAITING
                                                </span>
                                            <?php else : ?>
                                                <span class="btn btn-success btn-sm">
                                                    VERIFIED
                                                </span>
                                            <?php endif ?>
                                        </td>

                                        <td class="text-center">
                                         <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="fa fa-check-square"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-times-circle"></i>
                                            </button>
                                            <button class="item" data-toggle="modal" data-target="#modaltambah" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php $no=$no+1; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-lg-12">
                <!-- TOP CAMPAIGN-->
                <div class="top-campaign">
                   <center><h3 class="title-3 m-b-30">Data Laporan Pengaduan</h3></center> 
                   <div class="table-responsive">
                    <table class="table table-top-campaign">
                        <tbody>
                            <tr>
                                <td>1. NIK / NIM:</td>
                                <td><?=$dta["nim"]?></td>
                            </tr>
                            <tr>
                                <td>2. Nama:</td>
                                <td><?=$dta["nama"] ?></td>
                            </tr>
                            <tr>
                                <td>3. Email:</td>
                                <td><?=$dta["email"] ?></td>
                            </tr>
                            <tr>
                                <td>4. No Telpon:</td>
                                <td><?=$dta["no_telpon"] ?></td>
                            </tr>
                            <tr>
                                <td>5. Fakultas / Lembaga:</td>
                                <td><?=$dta["fak"] ?></td>
                            </tr>
                            <tr>
                                <td>6. Deskripsi:</td>
                                <td><?=$dta["deksripsi"] ?></td>
                            </tr>
                            <tr>
                                <td>7. Foto:</td>
                                <td><?=$dta["foto"] ?></td>
                            </tr>
                            <tr>
                                <td>8. Status:</td>
                                <td><?=$dta["status"] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--  END TOP CAMPAIGN-->
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