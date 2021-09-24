<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "../vendor/autoload.php";

function plugins() { ?>
<link rel="stylesheet" href="/skripsi/assets/plugins/bootstrap-more/css/bootstrap.min.css">
<link rel="stylesheet" href="/skripsi/assets/dist/css2/components.css">
<script src="/skripsi/assets/dist/jquery.min.js"></script>
<script src="../js/sweetalert2/sweetalert2.all.min.js"></script>

<?php }

// function sendEmail($to, $toName, $message, $subject)
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

require('../koneksi.php');


// UPDATE LAPORAN
if (isset($_GET['laporan_diterima'])) {
	$id = $_GET['id'];

	$query = "UPDATE tb_laporan SET status = 'Laporan Terima' WHERE id = '$id'";
	$forEmail = mysqli_query($conn, "SELECT * FROM tb_laporan where id = '$id' ");
		$forEmail = mysqli_fetch_array($forEmail);
		// sendEmail($forEmail['email'], $forEmail['nama'], 'Pengaduan Anda diterima', "Penerima");
		mail($forEmail['email'], 'Pengaduan diterima', 'Pengaduan Anda Telah diterima, Terima Kasih Telah Melakukan Pengaduan !!!', 'From:cs@uin-report.tryapp.my.id');
	// EDIT LAPORAN
	
	if (mysqli_query($conn, $query)) {
		
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Laporan berhasil di Setujui',
					icon: 'success'
				}).then((data) => {
					location.href = 'datalaporan.php';
				});
			});
		</script>
		<?php }
	}

// Laporan Tolak

	if (isset($_GET['tolak_laporan'])) {
		$id = $_GET['id'];
		$query = "UPDATE tb_laporan SET status = 'Laporan Tolak' WHERE id = '$id'";

	// EDIT LAPORAN
		mysqli_query($conn, $query);
		if (mysqli_affected_rows($conn) > 0) {
			$forEmail = mysqli_query($conn, "SELECT * FROM tb_laporan where id = '$id' ");
			$forEmail = mysqli_fetch_array($forEmail);
			sendEmail($forEmail['email'], $forEmail['nama'], 'Pengaduan Anda ditolak', "Penerima");
			plugins(); ?>
			<script>
				$(document).ready(function() {
					swal({
						title: 'Berhasil',
						text: 'Laporan berhasil di Tolak',
						icon: 'success'
					}).then((data) => {
						location.href = 'datalaporan.php';
					});
				});
			</script>
			<?php }
		}

// HAPUS LAPORAN
		if (isset($_GET['hapus_laporan'])) {
			$id = $_GET['id'];

			$query = "DELETE FROM tb_laporan WHERE id = '$id'";
			mysqli_query($conn, $query);
			if (mysqli_affected_rows($conn) > 0) {
				plugins(); ?>
				<script>
					$(document).ready(function() {
						swal({
							title: 'Berhasil Dihapus',
							text: 'Data Laporan berhasil dihapus',
							icon: 'success'
						}).then((data) => {
							location.href = 'datalaporan.php';
						});
					});
				</script>
				<?php }
			}

			?>