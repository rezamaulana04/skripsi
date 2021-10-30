<?php
    require 'template/header.php';
    $username = $_SESSION['username'];
    $result = mysqli_query($conn, "SELECT * FROM tb_fakultas WHERE username = '$username' limit 1");
    $get = mysqli_fetch_assoc($result);
    if(is_null($get['foto'])) {
        $foto = '../images/bg-title-01.jpg';
    }
    else {
        $foto = $get['foto'];
        if(!file_exists($foto)) {
            $foto = '../images/bg-title-01.jpg';
        }else{
            $foto = $get['foto'];
        }
    }
    if(isset($_POST['kirim-profil'])) {
        $nama = $_POST['nama'];
        $username = $get['username'];
        $password = $_POST['password'];
        $imagePost = $_FILES['foto'];
        $target_dir = '../images/';
        $fileName = $imagePost['name'];
        $fileFullName = md5(rand()).'.'.strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $fileFullPath = $target_dir.$fileFullName;
        $fileUpload = move_uploaded_file($imagePost['tmp_name'], $fileFullPath);
        if($fileUpload && trim($_POST['password']) != '') {
            $sql = mysqli_query($conn, "UPDATE tb_fakultas set foto='$fileFullPath', password='$password' where username='$username'");   
            $foto = $fileFullPath;
        }
        elseif(!$fileUpload && trim($_POST['password']) != '') {
            $sql = mysqli_query($conn, "UPDATE tb_fakultas set password='$password' where username='$username'");
        }
        elseif($fileUpload && trim($_POST['password']) == '') {
            $sql = mysqli_query($conn, "UPDATE tb_fakultas set foto='$fileFullPath' where username='$username'");
        }
    }
?>
<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-8">
                        <div class="card">
                           <div class="card-header">Profile</div>
                            <div class="card-body">
                                <div class="row justify-content-md-center">
                                    <img src="<?= $foto ?>" />
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="profil.php" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Nama</label>
                                        <input id="cc-pament" name="nama" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?= $get['nama_admin'] ?>">
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Username</label>
                                        <input id="cc-name" name="username" type="text" value="<?=$get['username']?>" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">Password</label>
                                        <input id="cc-number" name="password" type="password" class="form-control cc-number identified visa" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">Foto</label>
                                        <input id="cc-number" name="foto" type="file" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>
                                    <button type="submit" name="kirim-profil" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancel
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'template/footer.php';
?>