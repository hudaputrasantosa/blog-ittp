<?php 
include '../config.php';
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];

$query = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$user' AND password = '$pass' ");
$row = mysqli_fetch_array($query);
$num = mysqli_num_rows($query);

$query_adm = mysqli_query($koneksi,"SELECT * FROM admin WHERE username = '$user' AND password = '$pass' ");
$rows = mysqli_fetch_array($query_adm);
$nums = mysqli_num_rows($query_adm);

if ($num>0 || $nums>0) {
	
if($row['username'] == $user AND $row['password']== $pass){	
	
		$_SESSION['username'] = $user;
		$_SESSION['password'] = $pass;
		$_SESSION['nama'] = $row['nama'];

		$_SESSION["login"] = true;

		header("location:../halaman_user.php?pesan=berhasilLogin");	
}

else if ($rows['username'] == $user AND $rows['password'] == $pass){	
	
		$_SESSION['username'] = $user;
		$_SESSION['password'] = $pass;
		$_SESSION['nama'] = $rows['nama'];

		$_SESSION["login"] = true;

		header("location:../halaman_admin.php?pesan=berhasilLogin");	
}

else {
		
		header("location:login.php?pesan=gagalLogin");
	}
}

else{
	
	header("location:login.php?pesan=gagalLogin");
}

 ?>