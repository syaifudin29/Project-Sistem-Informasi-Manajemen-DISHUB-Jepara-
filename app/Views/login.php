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
		<form method="post" action="/login/proses">
		  <div class="card-body" >
		    <h5 class="card-title text-center">Login</h5>
		    <?php if (isset($notif)) { ?>
		    	<div class="alert alert-danger" role="alert">
				  <?php echo $notif; ?>
				</div>
		    <?php
		    } ?>
		    <div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Username</label>
			  <input type="text" class="form-control" name="username" id="exampleFormControlInput1" >
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Password</label>
			  <input type="password" class="form-control" name="pass" id="exampleFormControlInput1">
			</div>
		  <button class="btn btn-success" type="submit">LOGIN <i class="fa-solid fa-right-to-bracket"></i></button>
		  	<div>
		  		<p style="text-align: center;">Tidak punya akun ? <a href="/daftar/">Buat akun.</a> </p>
		  	</div>
		  </div>
		</form>
		</div>
	</div>
</body>
</html>