<!DOCTYPE html>
<html>
<head>
	<title>E-PKL DISHUB JEPARA</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link  href="/gambar/logo.png" rel="shortcut icon">
	<link rel="stylesheet" href="<?= base_url('style.css') ?>" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body style="background-color: #CEEDC7;">
	<div style="background-color: #EB455F;">
		<br>
	</div>
<div class="container" style="background-color: white; padding-bottom: 50px; border-radius: 1%;">
		<h3 class="text-center judul"><img style="height: 50px;" src="<?= base_url('gambar/logo.png') ?>"> E-PKL DINAS PERHUBUNGAN JEPARA</h3>
		<div class="row" style="margin-top: 50px;">
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
				  <div class="card-body">
				  	<div class="border-bottom">		
				   <p class="text-center">
				   	 <?php
				   		if (empty(($_SESSION['gambar']))) {
				   			?>
				   			<img class="gambar-menu" src="<?= base_url('gambar/avatar_place.png') ?>">
				   			<?php
				   		}else{
				   			?>
				   			<img class="gambar-menu" src="<?= base_url('gambar/'.$_SESSION['gambar']) ?>">
				   			<?php
				   		}
				   	 ?> 
				   </p>
				    <h5 class="text-center" style="margin-bottom: 20px;"><?php echo $_SESSION['nama']; ?></h5>
				    <h6 class="text-center" style="margin-bottom: 20px;"><i>Staf</i></h6>
				  	</div>
				  </div>
				  <ul class="navbar-nav nav-left">
				  	<li class="nav-item item-left <?php echo $menu == 'absensi' ? 'bg-merah' : ''; ?>"><a href="/staf/absensi" class="link-nav <?php echo $menu == 'absensi' ? 'active' : ''; ?>">Absensi</a></li>

				  	<li class="nav-item item-left <?php echo $menu == 'daftarpeserta' ? 'bg-merah' : ''; ?>"><a href="/staf/daftar_peserta" class="link-nav <?php echo $menu == 'daftarpeserta' ? 'active' : ''; ?>">Daftar Peserta</a></li>

				  	<li class="nav-item item-left <?php echo $menu == 'penugasan' ? 'bg-merah' : ''; ?>"><a href="/staf/penugasan" class="link-nav <?php echo $menu == 'penugasan' ? 'active' : ''; ?>">Penugasan</a></li>

				  	<li class="nav-item item-left <?php echo $menu == 'pengawasan' ? 'bg-merah' : ''; ?>"><a href="/staf/pengawasan" class="link-nav <?php echo $menu == 'pengawasan' ? 'active' : ''; ?>">Pengawasan</a></li>

				  	<li class="nav-item item-left <?php echo $menu == 'sertifikasi' ? 'bg-merah' : ''; ?>"><a href="/staf/sertifikasi" class="link-nav <?php echo $menu == 'sertifikasi' ? 'active' : ''; ?>">Sertifikat & Nilai</a></li>

				  	<!-- <li class="nav-item item-left <?php echo $menu == 'profil' ? 'bg-merah' : ''; ?>"><a href="/staf/profil" class="link-nav <?php echo $menu == 'profil' ? 'active' : ''; ?>">Profil</a></li> -->

				  	<li class="nav-item item-left <?php echo $menu == 'logout' ? 'bg-merah' : ''; ?>"><a href="/logout" class="link-nav <?php echo $menu == 'logout' ? 'active' : ''; ?>">Logout</a></li>
				  </ul>
				</div>
			</div>
			<div class="col-md-8">
				<?= $this->renderSection('content_staf') ?>
			</div>
	</div>
	</div>
	<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); margin-top: 50px; width: 100%;">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="/">E-PKL DISHUB JEPARA</a>
  </div>
  <!-- Copyright -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>