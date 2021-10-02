<?php

require "../koneksi.php";

$fakultas = mysqli_query($conn, "SELECT * from tb_fakultas"); 

if (isset($_POST["submit"])){
	$nik = $_POST['kd_tindakan'];
	$nama_tindakan = $_POST['nama_tindakan'];
	$tarif = $_POST['tarif'];
	$kategori = $_POST['kategori'];
	$poli = $_POST['poli'];

	mysqli_query($conn, "INSERT INTO tb_user VALUES (null, '$nim', '$nama', '$tarif', '$kategori', '$poli')");

	if (mysqli_affected_rows($conn) > 0){
		header('location:index.php');
		$notif = ["success", "Pengaduan Berhasil Dibuat"]; 
	}
	else {
		$notif = ["error", mysqli_error($conn)]; 
		exit();
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title> Wizard Form with Validation - Responsive</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="html.design">
	<!-- description -->
	<meta name="description" content="Wizard Form with Validation - Responsive">
	<link rel="shortcut icon" href="images/favicon.ico">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
	<!-- Fonts and icons -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700" rel="stylesheet"> 
	<!-- Reset CSS -->
	<link rel="stylesheet" href="css/reset.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive  CSS -->
	<link rel="stylesheet" href="css/responsive.css">
</head>
<body>

	<div class="wizard-main">
		<div id="particles-js"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 banner-sec">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<img class="d-block img-fluid" src="images/2.jpg" style="width: 500px; height: 662px "  alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<div class="banner-text">
										<h2>Universitas Islam Negeri Alauddin Makassar</h2>
										<p>Perguruan Tinggi Islam Negeri yang berada di Makassar. Penamaan UIN di Makassar dengan Alauddin diambil dari nama raja Kesultanan Gowa yang pertama memeluk Islam dan menerima agama Islam sebagai agama kerajaan.</p>
									</div>	
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block img-fluid" src="images/slider-02.jpg" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<div class="banner-text">
										<h2>Universitas Islam Negeri Alauddin Makassar</h2>
										<p>Perguruan Tinggi Islam Negeri yang berada di Makassar. Penamaan UIN di Makassar dengan Alauddin diambil dari nama raja Kesultanan Gowa yang pertama memeluk Islam dan menerima agama Islam sebagai agama kerajaan.</p>
									</div>	
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block img-fluid" src="images/slider-03.jpg" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<div class="banner-text">
										<h2>Universitas Islam Negeri Alauddin Makassar</h2>
										<p>Perguruan Tinggi Islam Negeri yang berada di Makassar. Penamaan UIN di Makassar dengan Alauddin diambil dari nama raja Kesultanan Gowa yang pertama memeluk Islam dan menerima agama Islam sebagai agama kerajaan.</p>
									</div>	
								</div>
							</div>
						</div>	   
					</div>
				</div>
				<div class="col-lg-6 login-sec">
					<div class="login-sec-bg">
						<h2 class="text-center">Pengaduan Online</h2>
						<form id="example-advanced-form" action="#" method="POST" style="display: none;">
							<h3>Biodata</h3>
							<fieldset class="form-input">
								<h4>Profile Information</h4>

								<label for="name">NIK / NIM <code>*</code></label>
								<input id="name" name="nim" type="text" class="form-control required">
								<label for="surname">NAMA <code>*</code></label>
								<input id="surname" name="nama" type="text" class="form-control required">
								<label for="email">Email <code>*</code></label>
								<input id="email" name="email" type="text" class="form-control  email required">
								<label for="address">Nomor Telpon</label>
								<input id="address" name="no_telepon" type="text" class="form-control">
								<p><code>(*)</code> wajib di isi</p>
							</fieldset>
							<h3>Laporan</h3>
							<fieldset class="form-input">
								<h4>Complaint Information</h4>
								
								<label for="fak">Fakultas / Lembaga <code>*</code></label>
								<select name="fak" class="form-control required">
									<option value="">.:: Pilih Fakultas ::.</option>
									<?php  foreach($fakultas as $key) : ?>
										<option value="<?= $key['id'] ?>">
											<?= $key['nama_fakultas'] ?>
										</option>
									<?php endforeach ?>
								</select>
								<label for="userName">Deskripsi Pengaduan <code>*</code></label>
								<textarea id="userName" name="deksripsi" rows="7" class="form-control mb-2 required"></textarea> 
								<label for="confirm">Foto</label>
								<input id="confirm" name="foto" type="file" class="form-control" >
								<input type="hidden" name="req" value="addLaporan">
								<p><code>(*)</code> wajib di isi</p>
							</fieldset>
<!-- 							<h3>Finish</h3>
							<fieldset class="form-input">
								<h4>Syarat & Ketentuan</h4>

								<input id="acceptTerms-2" name="acceptTerms" type="checkbox" class=""> <label for="acceptTerms-2">
								Saya setuju dengan Syarat dan Ketentuan.</label>
							</fieldset> -->
						</form>			
					</div>
				</div>			
			</div>
			<div class="row">
				<div class="col-lg-12">
					<p class="copyright text-center">All Rights Reserved. &copy; 2018 <a href="#">Wizard Form with Validation</a> Design By : 
						<a href="https://html.design/">html design</a>
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- jquery latest version -->
	<script src="js/jquery.min.js"></script>
	<!-- popper.min.js -->
	<script src="js/popper.min.js"></script>    
	<!-- bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- jquery.steps js -->
	<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js'></script>
	<script src="js/jquery.steps.js"></script>
	<!-- particles js -->
	<script src="js/particles.js"></script>
	<script src="../js/sweetalert2/sweetalert2.all.min.js"></script>
	<script type="text/javascript">
		<?php 
			if (isset($_GET['verfied'])) {
				$kode_laporan = $_GET['verfied'];
				$cheking = mysqli_query($conn, "SELECT * from tb_laporan where kode_laporan = '$kode_laporan' and verified = 1");
				if(mysqli_num_rows($cheking) > 0) {
					?>
						Swal.fire({
							title: 'Berhasil Di Verifikasi',
							text: 'Pengaduan Berhasil Dibuat',
							type: 'success',
						});
					<?php
				}
				
			}
		?>
		$(document).ready(function() {
			particlesJS("particles-js", 
			{
				"particles": {
					"number": {
						"value": 160,
						"density": {
							"enable": true,
							"value_area": 800
						}
					},
					"color": {
						"value": "#ffffff"
					},
					"shape": {
						"type": "circle",
						"stroke": {
							"width": 0,
							"color": "#000000"
						},
						"polygon": {
							"nb_sides": 5
						},
						"image": {
							"src": "img/github.svg",
							"width": 100,
							"height": 100
						}
					},
					"opacity": {
						"value": 1,
						"random": true,
						"anim": {
							"enable": true,
							"speed": 1,
							"opacity_min": 0,
							"sync": false
						}
					},
					"size": {
						"value": 3,
						"random": true,
						"anim": {
							"enable": false,
							"speed": 4,
							"size_min": 0.3,
							"sync": false
						}
					},
					"line_linked": {
						"enable": false,
						"distance": 150,
						"color": "#ffffff",
						"opacity": 0.4,
						"width": 1
					},
					"move": {
						"enable": true,
						"speed": 1,
						"direction": "none",
						"random": true,
						"straight": false,
						"out_mode": "out",
						"bounce": false,
						"attract": {
							"enable": false,
							"rotateX": 600,
							"rotateY": 600
						}
					}
				},
				"interactivity": {
					"detect_on": "canvas",
					"events": {
						"onhover": {
							"enable": true,
							"mode": "bubble"
						},
						"onclick": {
							"enable": true,
							"mode": "repulse"
						},
						"resize": true
					},
					"modes": {
						"grab": {
							"distance": 400,
							"line_linked": {
								"opacity": 1
							}
						},
						"bubble": {
							"distance": 250,
							"size": 0,
							"duration": 2,
							"opacity": 0,
							"speed": 3
						},
						"repulse": {
							"distance": 400,
							"duration": 0.4
						},
						"push": {
							"particles_nb": 4
						},
						"remove": {
							"particles_nb": 2
						}
					}
				},
				"retina_detect": true
			}
			);
});
</script>

<script>
	var form = $("#example-advanced-form").show();

	form.steps({
		headerTag: "h3",
		bodyTag: "fieldset",
		transitionEffect: "slideLeft",
		onStepChanging: function (event, currentIndex, newIndex)
		{
			// Allways allow previous action even if the current form is not valid!
			if (currentIndex > newIndex)
			{
				return true;
			}
			// Forbid next action on "Warning" step if the user is to young
			if (newIndex === 3 && Number($("#age").val()) < 18)
			{
				return false;
			}
			// Needed in some cases if the user went back (clean up)
			if (currentIndex < newIndex)
			{
				// To remove error styles
				form.find(".body:eq(" + newIndex + ") label.error").remove();
				form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
			}
			form.validate().settings.ignore = ":disabled,:hidden";
			return form.valid();
		},
		onStepChanged: function (event, currentIndex, priorIndex)
		{
			// Used to skip the "Warning" step if the user is old enough.
			if (currentIndex === 2 && Number($("#age").val()) >= 18)
			{
				form.steps("next");
			}
			// Used to skip the "Warning" step if the user is old enough and wants to the previous step.
			if (currentIndex === 2 && priorIndex === 3)
			{
				form.steps("previous");
			}
		},
		onFinishing: function (event, currentIndex)
		{
			form.validate().settings.ignore = ":disabled";
			return form.valid();
		},
		onFinished: function (event, currentIndex)
		{
			var data = new FormData($('form')[0]);

			var email_input = $('#email').val()
			var email_verify = "@uin-alauddin.ac.id"
			if (email_input.indexOf(email_verify) == -1) {
				Swal.fire({
					title: 'Email tidak diizinkan!',
					text: 'Pastikan email yang anda gunakan adalah email UIN',
					type: 'warning'
				});
			} else {
				$.ajax({
					url: "controller.php",
					enctype: "multipart/form-data",
					method: "POST",
					data: data,
					contentType: false,
					processData: false,
					success: function (data) {
						if (data == true) {
							Swal.fire({
								title: 'Cek Email',
								text: 'Silahkan Cek Email Untuk Verifikasi Pengaduan',
								type: 'success',
								onClose: () => {
									location.href = "index.php";
								}
							});
						} else {
							Swal.fire({
								title: 'Gagal Diproses',
								text: 'Terjadi kesalahan Proses',
								type: 'error'
							});
						}
					}
				});
			}
		}
	});
</script>

</body>
</html>