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
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
	  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- JS -->
     <script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/blog.css">

     <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
</head>
<body>


  <div class="container">
  <header class="blog-header">
  	<p><?php echo "<br>".hari_ini().", ".$tgl; ?></p>
    <div class="row flex-nowrap justify-content-between align-items-center">

      <div class="col-4 ">
        <a href="halaman_user.php"><img src="gambar/images/logo.png" width="180px"></a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="halaman_user.php">ITTP Private Blog</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
       
        <a class="btn btn-sm btn-outline-danger" href="logout.php">Keluar</a>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex">
      <a class="p-2 text-muted" href="#">Home</a>
      <a class="p-2 text-muted" href="#">Pesan</a>
      <a class="p-2 text-muted" href="#">Pemberitahuan</a>
      <a class="p-2 text-muted" href="#">Akun</a>
 
    </nav>
  </div>

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-5">Definisi ITTP Private Blog</h1>
      <p class="lead my-1">Website ITTP private Blog dibuat untuk memenuhi tugas besar PTIK, dan tujuan dibentuknya website
        ini adalah untuk saling berbagi informasi mengenai perkuliahan dan kampus.</p>
     
    </div>
  </div>

  
</div>
<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main" style="border : 0.5px #e6e6e6 solid; padding: 30px 30px 30px 30px;">
    	<h5><?php echo "Halo ".$_SESSION['nama'];?>.. Mau Posting apakah Hari ini ?</h5>
    	<button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapsePost" aria-expanded="false" aria-controls="collapsePost" >Tampilkan Form Posting</button>

    	<div class="collapse" id="collapsePost">
    	<form action="savePostUser.php" method="POST" enctype="multipart/form-data">
    		<input type="hidden" name="nama" value="<?php echo $_SESSION['nama']; ?>">
 			<input type="hidden" name="tgl" value="<?php echo $tgl; ?>">
    		<div class="py-3">
    		<input type="text" name="judul" class="form-control"  style="border : none;" placeholder="Tulis judul Blog disini..">
    		</div>
    		<div  class="py-3">
    		<textarea class="form-control" rows="7" name="isi" style="border : none;" placeholder="Tulis Isi Blog disini.."></textarea>
    		</div>
    		<div>
    			<input type="file" name="foto">
    			<p style="color: red;">foto yang diperbolehkan dengan format jpg, png dan gif</p>
    		</div>
    		<div>
    		<input type="Submit" name="post" class="btn btn-primary" value="Posting Sekarang">
    		</div>
    	</form>
    	</div>
      <h3 class="blog-post-title py-4 ">
        Postingan Terkini
      </h3>
 	<hr>
 	<br>
 	<?php 
 	include 'config.php';

 	$sql = mysqli_query($koneksi,"SELECT * FROM postingan ORDER BY tgl_post DESC");
 	while($data = mysqli_fetch_array($sql)){
 	 ?>

      <div class="blog-post" >
        <h3><?php echo $data['judul_post'];?></h3>
        <p class="blog-post-meta">Dipublikasikan <?php echo $data['tgl_post']; ?> <br>
        	dibuat oleh <a href="#"><?php  echo $data['nama']; ?></a>
        </p>

        <div>
        	<?php if (empty($data['foto'])) {
        		}

        		else { ?>
        <img style="border-radius: 8px; box-shadow: ;" src="gambar/<?php echo $data['foto'];?>" width="70%" >
        	<?php } ?>
        </div>
        <div>
        <p class="py-2"><?php echo $data['isi_post'];?></p>
        <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
        <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
        </div>
        <br>
        <hr>
      </div><!-- /.blog-post -->
<?php } ?>

       
        <a class="btn btn-outline-primary" href="#">Kembali Keatas</a>
     

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4>Tentang Kami</h4>
        <p class="mb-0">Website ITTP Private Blog dibuat untuk memenuhi tugas besar PTIK, dan tujuan dibentuknya website
        ini adalah untuk saling berbagi informasi mengenai perkuliahan dan kampus.</p>
        <p> Anggota Tim Pengembang Website :
        <ul>
        	<li>Huda Putra Santosa</li>
        	<li>M. Naufal Alfaruq</li>
        	<li>M. Fadli</li>
        </ul>	</p>
      </div>

      <div class="p-4 mb-3 bg-light rounded">
        <h4>Arsip Postingan</h4>
        <ol class="list-unstyled mb-0">
          <li><a href="#">November 2020</a></li>
          <li><a href="#">Desember 2020</a></li>
        </ol>
      </div>

      <div class="p-4 mb-3 bg-light rounded">
        <h4>Profil Team Pengembang</h4>
        <ol class="list-unstyled">
        	<li class="py-2">Huda Putra Santosa</li>
        	<ul>
        		<li><a href="#">GitHub</a></li>
        		<li><a href="#">Instagram</a></li>
        		<li><a href="#">Twitter</a></li>
         		 <li><a href="#">Facebook</a></li>
        	</ul>

        	<li class="py-2">M. Naufal Alfaruqi</li>
        	<ul>
        		<li><a href="#">GitHub</a></li>
        		<li><a href="#">Instagram</a></li>
        		<li><a href="#">Twitter</a></li>
         		 <li><a href="#">Facebook</a></li>
        	</ul>

        	<li class="py-2">M. Fadli Hid</li>
        	<ul>
        		<li><a href="#">GitHub</a></li>
        		<li><a href="#">Instagram</a></li>
        		<li><a href="#">Twitter</a></li>
         		 <li><a href="#">Facebook</a></li>
        	</ul>
      
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
  <p>Template from <a href="https://getbootstrap.com/">Bootstrap</a>. Modification by <a href="https://instagram.com/hudazackyvee_6661" target="_blank">Huda Putra Santosa</a>.</p>
</footer>




 <script src="js/bootstrap.bundle.min.js"></script>  
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
</body>
</html>