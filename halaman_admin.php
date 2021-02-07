<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("location:login/login.php");
	exit;
}

date_default_timezone_set("Asia/Jakarta");
$tgl = date('d F Y');

function hari_ini(){
	$hari = date('D');
	
		switch ($hari) {
			case 'Sun':
				$hari_ini = "Minggu";
				break;

			case 'Mon':
				$hari_ini = "Senin";
				break;

			case 'Tue':
				$hari_ini = "Selasa";
				break;

			case 'Wed':
				$hari_ini = "Rabu";
				break;

			case 'Thu':
				$hari_ini = "Kamis";
				break;

			case 'Fri':
				$hari_ini = "Jumat";
				break;

			case 'Sat':
				$hari_ini = "Sabtu";
				break;

			default:
				$hari_ini = "Tidak di ketahui";
				break;
	}
	return $hari_ini;
}
echo hari_ini().", ".$tgl."<br>"; 
echo "Halo ".$_SESSION['nama'];

 ?>
<html lang="en">
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
		
		
	</style>
</head>
<body>

<div><a href="tambahPetugas.php">Tambah Petugas</a>
 <a href="logout.php">Logout</a>	</div>

				<form  action="savePost.php" method="POST" enctype="multipart/form-data" class="login100-form validate-form flex-sb flex-w">
					
					<div class="login100-form-title p-b-25"> 
						<img src="gambar/images/logo2.png" width="180px">
					</div>

					<span class="login100-form-title p-b-40">
						Buat Postingan
					</span>

					<input type="hidden" name="nama" value="<?php echo $_SESSION['nama']; ?>">
 					<input type="hidden" name="tgl" value="<?php echo $tgl; ?>">

					<div class="wrap-input100 validate-input m-b-16" data-validate = "judul is required">
						<input class="input100" type="text" name="judul" placeholder="judul">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "isi is required">
						<input class="input100" type="password" name="isi" placeholder="isi">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "isi is required">
						<input class="input100" type="file" name="foto" placeholder="foto">
						<span class="focus-input100"></span>
					</div>
					

					
					

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="Submit">
							Post
						</button>
					</div>

				</form>
		
</body>
</html>