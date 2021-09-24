<?php

require 'template/header.php';
$data = mysqli_query($conn, "SELECT * FROM tb_fakultas");

if (isset($_POST["tambahdata"])){
    $nama_admin = $_POST['nama_admin'];
    $nama_fakultas = $_POST['nama_fakultas'];
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $query = "INSERT INTO tb_fakultas VALUES (null, '$nama_admin', '$nama_fakultas', '$username', '$password')";

    if (mysqli_query($conn, $query)) {
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

    if ($password == "") {
    # code...
        mysqli_query($conn, "UPDATE tb_fakultas set nama_admin='$nama_admin', nama_fakultas='$nama_fakultas', username='$username' WHERE id='$id'");
    } else {
        mysqli_query($conn, "UPDATE tb_fakultas set nama_admin='$nama_admin', nama_fakultas='$nama_fakultas', username='$username', password='$password' WHERE id='$id'");

    }


    if (mysqli_affected_rows($conn)){
        $notif = ["success", "Berhasil update data"]; 
    }
    // else {
    //     $notif = ["error", mysqli_error($conn)]; 
    // }
}


?>


<div class="page-container">

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <center><h3 class="title-5 m-b-35">Data Fakultas / Lembaga</h3></center>
                    <div class="table-data__tool">                            
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#modaltambah">
                                <i class="zmdi zmdi-plus"></i>add item</button>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Fakultas / Lembaga</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th width="50">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($data as $dta) : ?>
                                    <tr class="tr-shadow">
                                        <td><?=$no ?></td>
                                        <td><?=$dta["nama_admin"] ?></td>
                                        <td><?=$dta["nama_fakultas"] ?></td>
                                        <td><?=$dta["username"] ?></td>
                                        <td><?=$dta["password"] ?></td>
                                        <td class="text-center">
                                            <div class="table-data-feature text-center">
                                                <button class="btn btn-sm btn-info" data-toggle1="tooltip" data-placement="top" title="Update Akun" data-toggle="modal" data-target="#mediumModal<?=$dta["id"] ?>">
                                                    <i class="fa fa-user"></i> &nbsp; Update Akun
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
                <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nf-text" class=" form-control-label">Nama Admin</label>
                        <input type="text" id="nf-text" name="nama_admin" placeholder="Nama Anda" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nf-text" class=" form-control-label">Nama Fakultas</label>
                        <input type="text" id="nf-text" name="nama_fakultas" placeholder="Nama Fakultas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nf-text" class=" form-control-label">Username</label>
                        <input type="text" id="nf-text" name="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nf-text" class=" form-control-label">Password</label>
                        <input type="text" id="nf-text" name="password" placeholder="Password" class="form-control">
                    </div>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="tambahdata" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($data as $dta) {  ?>
<div class="modal fade" id="mediumModal<?=$dta["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
        <?php }?>        </script>