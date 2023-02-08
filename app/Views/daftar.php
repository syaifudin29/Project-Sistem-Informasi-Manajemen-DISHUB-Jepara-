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
<body>
	<div class="container-fluid">
		<h3 class="text-center judul"><img style="height: 50px;" src="<?= base_url('gambar/logo.png') ?>"> E-PKL DINAS PERHUBUNGAN JEPARA</h3>
		<div class="card" style="width: 30rem; margin: 0 auto; margin-top: 40px;">
		  <div class="card-body" >
		  	<form action="/daftar/simpan" method="post" enctype="multipart/form-data">
		    <h5 class="card-title text-center">Daftar</h5>
		    <?php if (isset($notif)) { ?>
		    	<div class="alert alert-danger" role="alert">
				  <?php echo $notif; ?>
				</div>
		    <?php
		    } ?>
		    <div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">NIM</label>
			  <input type="number" class="form-control" name="nim" id="exampleFormControlInput1" required>
			</div>
		    <div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
			  <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" required>
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Tempat Tanggal Lahir</label>
			  <p style="font-size: 12px; font-style: italic;">Contoh : Jepara, 29 Agustus 2000</p style="font-size: 12px; ">
			  <input type="text" class="form-control" name="ttl" id="exampleFormControlInput1"required >
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">No HP</label>
			  <input type="text" class="form-control" name="nohp" id="exampleFormControlInput1" required>
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Alamat</label>
			  <textarea class="form-control" name="alamat" required></textarea>
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
			  <input type="text" class="form-control" name="jurusan" id="exampleFormControlInput1" required>
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Asal Sekolah</label>
			  <input type="text" class="form-control" name="asalsekolah" id="exampleFormControlInput1" required>
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">File Pengantar</label>
			  <p><i>*Harus format gambar (JPG / JPEG / PNG)</i></p>
			    <input class="form-control" name="rekom" type="file" id="formFile" required>
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Email</label>
			  <input type="text" class="form-control" name="email" id="exampleFormControlInput1" required>
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Username</label>
			  <input type="text" class="form-control" name="username" id="exampleFormControlInput1" required> 
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">password</label>
			  <input type="password" class="form-control" name="password" id="exampleFormControlInput1" required>
			</div>
			  <button class="btn btn-success" style="width: 100%;">Daftar PKL</i></button>
			  <a href="/" class="btn btn-danger" style="width: 100%; margin-top: 10px;">Batal</i></a>
		  </form>
		  </div>

		</div>
	</div>
</body>
</html>