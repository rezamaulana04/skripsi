
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "../vendor/autoload.php";
require '../koneksi.php';
// function sendEmail($to, $toName = '', $message, $subject)
// {
// 	$from = 'skripsiakhir16@gmail.com';
// 	$fromName = 'Admin';
// 	$mail = new PHPMailer(true);

// 	$mail->IsSMTP();
// 	$mail->Mailer = "smtp";
//     // $mail->SMTPDebug  = 1;  
// 	$mail->SMTPAuth   = TRUE;
// 	$mail->SMTPSecure = "tls";
// 	$mail->Port       = 587;
// 	$mail->Host       = "smtp.gmail.com";
// 	$mail->Username   = "skripsiakhir16@gmail.com";
// 	$mail->Password   = "gowa26mei2017";

//     $mail->From  = $from;
//     $mail->FromName  = $fromName;
//     $mail->Subject = $subject;
//     $mail->Body = $message;
//     $mail->addAddress($to, $toName);
//     try {
//         $mail->send();
//     } catch (Exception $e) {
//         echo "Mailer Error: " . $mail->ErrorInfo;
//         die("a");
//     }
// }
if(isset($_GET['kode_laporan'])) {
	$kode_laporan = $_GET['kode_laporan'];
	mysqli_query($conn, "UPDATE tb_laporan set verified = 1 where kode_laporan = '$kode_laporan'");
	header("location: ../../index.php?verfied=$kode_laporan");
}
if (isset($_POST['req']) && ($_POST['req'] == 'addLaporan')) {
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$no_telepon = $_POST['no_telepon'];
	$fak = $_POST['fak'];
	$deksripsi = $_POST['deksripsi'];
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
		mail($email, 'Konfirmasi email', 'Silahkan verifikasi postigan anda '.$actual_link, 'From:cs@uin-report.cfg.my.id');
		$response = true; 

	} else {
		$response = false;
		die(var_dump(mysqli_error($conn)));
	}
	echo $response;
}

if (isset($_POST['req']) && ($_POST['req'] == 'cekLaporan')) {
	$word = $_POST['deskripsi'];
	$fak = $_POST['fakultas'];

	$laporan = mysqli_query($conn, "SELECT * FROM tb_laporan WHERE status='Laporan Baru' AND fak='$fak'");
	$response = false;

	foreach ($laporan as $lap) {
		$deksripsi = $lap['deksripsi'];

		similar_text($word, $deksripsi, $same);
		if ($same > 70) {
			$response = true;
		}
	}

	echo $response;
}
?>