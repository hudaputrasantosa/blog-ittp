<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<h4>Halaman Admin</h4>
<?php 
session_start();
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

 <a href="tambahPetugas.php">Tambah Petugas</a>
 <a href="logout.php">Logout</a>	<br>

<h4>Buat Postingan Baru</h4>
 <form action="savePost.php" method="POST" enctype="multipart/form-data">
 	<input type="hidden" name="nama" value="<?php echo $_SESSION['nama']; ?>">
 	<input type="hidden" name="tgl" value="<?php echo $tgl; ?>">

 	<label>Judul</label>
 	<input type="text" name="judul">
 	<label>Isi postingan</label>
 	<textarea name="isi"></textarea>
 	<label>Foto</label>
 	<input type="file" name="foto">
 	<p style="color: red">file yang diperbolehkan adalah : jpg, png dan gif</p>
 	<button type="submit">Post</button>
 </form>
</body>
</html>