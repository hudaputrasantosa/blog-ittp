<?php 
include 'config.php';

$nama = $_POST['nama'];
$tgl = $_POST['tgl'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];

$rand = rand();
$ekstensi = array('jpg','JPG','jpeg','png','PNG');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename,PATHINFO_EXTENSION);

if (in_array($ext,$ekstensi)) {
	if ($ukuran < 544070) {
		$xx = $rand."-".$filename;	
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand."-".$filename);
		mysqli_query($koneksi,"INSERT INTO postingan VALUES ('', '$nama','$tgl','$judul','$isi','$xx')");
		header("location:halaman_user.php?status=uploadBerhasil");
	}
	else{
		mysqli_errno();
		header("location:halaman_user.php?status=uploadGagal");
	}
	
} else {
	mysqli_query($koneksi,"INSERT INTO postingan VALUES ('', '$nama','$tgl','$judul','$isi',NULL)");
	header("location:halaman_user.php?status=uploadBerhasiltanpaFoto");
	
}




 ?>