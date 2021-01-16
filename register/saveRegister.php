<?php 
include '../config.php';

$nama = $_POST['nama'];
$user = $_POST['username'];
$pass = $_POST['password'];

$query = mysqli_query($koneksi, "INSERT INTO user VALUES('','$nama','$user','$pass')");

if ($query) {
	header("location:../login/login.php?pesan=suksesregister");
} else {
	echo "gagal";
}


 ?>