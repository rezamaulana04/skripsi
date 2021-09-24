<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Photography Form Responsive Widget Template :: w3layouts</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Photography Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="web/css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Londrina+Outline" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<!-- header -->
	<h1>
		<span>P</span>hotography
		<span>F</span>orm</h1>
	<!-- //header -->
	<!-- content -->
	<div class="main-content-agile">
		<div class="sub-main-w3">
			<form action="cont.php" method="POST" enctype="multipart/form-data">
				<div class="form-style-agile">
					<label> NIK/NIM </label>
					<input placeholder="NIK/NIM" name="nik" type="text" required="">
				</div>
				<div class="form-style-agile">
					<label> Nama Lengkap </label>
					<input placeholder="Nama" name="nama" type="text" required="">
				</div>
				<div class="w3layouts-grids">
					<div class="form-style-agile form-grids-w3l">
						<label>Email</label>
						<input placeholder="Email" name="email" type="email" required="">
					</div>
					<div class="form-style-agile form-grids-w3l">
						<label>Nomor Telpon</label>
						<input placeholder="Telpon" name="no_telepon" type="text" required="">
					</div>
				</div>



	<h1>
		<span>P</span>hotography
		<span>F</span>orm</h1>				

				<div class="form-style-agile">
					<label>Fakultas</label>
					<select name="fak"  class="category" required="">
						<option value="">- Pilih Fakultas</option>
						<option value="Sains dan Teknologi">Sains dan Teknologi</option>
						<option value="Syariah Hukum">Syariah Hukum</option>
					</select>
				</div>
				<div class="form-style-agile">
					<label>Deskrispi Pengaduan</label>
					<textarea name="deskripsi" placeholder="Deskrispikan.." required=""></textarea>
				</div>
				<div class="form-style-agile">
					<label>Foto</label>
					<input type="file" name="foto">
				</div>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</div>
	<!-- content -->
	<!-- footer -->
	<div class="footer">
		<h2>&copy; 2018 Photography Form. All rights reserved | Design by
			<a href="http://w3layouts.com">W3layouts</a>
		</h2>
	</div>
	<!-- //footer -->


	<!-- js -->
	<script src="web/js/jquery-2.1.4.min.js"></script>

	<!-- date-->
	<link rel="stylesheet" href="web/css/jquery-ui.css" />
	<script src="web/js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1").datepicker();
		});
	</script>
	<!-- //date --> 

	<!-- time -->
	<script src="web/js/wickedpicker.js"></script>
	<script>
		$('.timepicker').wickedpicker({
			twentyFour: false
		});
	</script>
	<link href="web/css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
	<!-- //time -->

</body>

</html>