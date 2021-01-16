<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
</head>
<body>
<h4>Selamat Datang di Halaman user</h4>
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

echo "Halo ".$_SESSION['nama'];
echo "<br>".hari_ini().", ".$tgl;
 ?>
 <a href="logout.php">Logout</a>


 <table>
 
 	<?php 
 	include 'config.php';
 	$sql = mysqli_query($koneksi,"SELECT * FROM postingan");
 	while($data = mysqli_fetch_array($sql)){
 	 ?>
 	
 	<tr>
 		<br>
 		<?php echo $data['nama']; ?>	<br>
 		<?php echo $data['tgl_post']; ?>	<br>
 		<?php echo $data['judul_post']; ?>	<br>
 		<?php echo $data['isi_post']; ?>	<br>
 		<img src="gambar/<?php echo $data['foto'];?>" width="500px" > 	<br>
 	</tr>
 <?php } ?>
 </table>
</body>
</html>