<?php 


function plugins() { ?>
	<link rel="stylesheet" href="assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dist/css2/components.css">
	<script src="assets/dist/jquery.min.js"></script>
	<script src="assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "../vendor/autoload.php";
require '../koneksi.php';

if (isset($_POST['submit'])) {

	$nim = $_POST['nik'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$no_telepon = $_POST['no_telepon'];
	$fak = $_POST['fak'];
	$deksripsi = $_POST['deskripsi'];
	// SET FOTO 
	$foto = $_FILES['foto']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$file_name = "foto-laporan-".time().".".$ext;
	$file_tmp = $_FILES['foto']['tmp_name'];
	move_uploaded_file($file_tmp, 'images/foto_laporan/'.$file_name);
	$tgl = date('Y-m-d');
	$kode_laporan = md5(rand());
	mysqli_query($conn, "INSERT INTO tb_laporan VALUES (NULL,
		'$nim',
		'$nama', 
		'$email',
		'$no_telepon',
		'$fak', 
		'$deksripsi', 
		'$file_name', 
		'Laporan Baru', 
		'$tgl', 
		'$kode_laporan', 0, 0)
	");

	if (mysqli_affected_rows($conn) > 0){
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."/pengaduan/index"."?kode_laporan=".$kode_laporan;
		sendEmail($email, '', 'silahkan verifikasi postigan anda '.$actual_link, 'email');
		$response = true; 
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Laporan Berhasil Terkirim!',
					icon: 'success'
				}).then((data) => {
					location.href = 'index.php';
				});
			});
		</script>
	<?php

	} else {
		$response = false;
		die(var_dump(mysqli_error($conn)));
	}

}


function sendEmail($to, $toName = '', $message, $subject)
{
	$from = 'skripsiakhir16@gmail.com';
	$fromName = 'Admin';
	$mail = new PHPMailer(true);
	
	$mail->IsSMTP();
	$mail->Mailer = "smtp";
    // $mail->SMTPDebug  = 1;  
	$mail->SMTPAuth   = TRUE;
	$mail->SMTPSecure = "tls";
	$mail->Port       = 587;
	$mail->Host       = "smtp.gmail.com";
	$mail->Username   = "rezam5162@gmail.com";
	$mail->Password   = "lindah26mei2017";

    $mail->From  = $from;
    $mail->FromName  = $fromName;
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->addAddress($to, $toName);
    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        die("a");
    }
}
?>