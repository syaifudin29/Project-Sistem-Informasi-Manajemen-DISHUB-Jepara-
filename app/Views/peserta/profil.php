<?= $this->extend('peserta/template');
	$this->section('content_peserta');
?>
<h4 style="margin-bottom: 20px;">Profile</h4>

<div class="card">
	<form action="/peserta/profil/photo" method="post" enctype="multipart/form-data">
	<div class="card-body">
		<?php
			if (empty($user[0]->photo)) {
				?>
				<img class="gambar-menu" src="<?= base_url('gambar/avatar_place.png') ?>">
				<?php
			}else{
				?>
				<img src="/gambar/<?php echo $user[0]->photo; ?>" class="img-thumbnail" style="width: 100px; height: 100px; margin-bottom: 10px;" alt="...">
				<?php
			}
		 ?>

		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Update photo</label>
		   <input type="file" name="gambar" class="form-control" required>
		</div>
		   <button type="submit" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i> Ubah Photo</button>
	</div>
	</form>
</div>
<h5 style="margin-bottom: 20px; margin-top: 20px;">Data Diri</h5>
<div class="card">
	<div class="card-body">
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">NIM</label>
		  <input type="text" class="form-control" value="<?php echo $user[0]->nim; ?>" disabled>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
		  <input type="text" class="form-control" value="<?php echo $user[0]->nama; ?>" disabled>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Tempat, Tanggal lahir</label>
		  <input type="text" class="form-control" value="<?php echo $user[0]->ttl; ?>" disabled>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
		  <textarea class="form-control" disabled><?php echo $user[0]->alamat; ?></textarea>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
		  <input type="text" class="form-control" value="<?php echo $user[0]->jurusan; ?>" disabled>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Asal sekolah</label>
		   <input type="text" class="form-control" value="<?php echo $user[0]->asal_sekolah; ?>" disabled>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Bagian Magang</label>
		   <input type="text" class="form-control" value="Lalu Lintas" disabled>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Masa Magang</label>
		   <input type="text" class="form-control" value="<?php echo date('d M Y', strtotime($user[0]->awal))." - ".date('d M Y', strtotime($user[0]->akhir)); ?>" disabled>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Email</label>
		  <input type="text" class="form-control" value="<?php echo $user[0]->email; ?>" disabled>
		</div>
	</div>
</div>
	<button data-bs-toggle="modal" data-bs-target="#modalBukaTugas" class="btn btn-success " style="float: right; margin-top: 20px;"> <i class="fa-solid fa-pen-to-square"></i> Ubah Data</button>


<div class="modal fade" id="modalBukaTugas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data</h1>
      </div>
      <form action="/peserta/profil/update" method="post">
      <div class="modal-body">
        <div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">No. ID</label>
		  <input type="text" class="form-control" value="<?php echo $user[0]->id_user; ?>" disabled>
		  <input type="hidden" name="id_user" class="form-control" value="<?php echo $user[0]->id_user; ?>">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">NIM</label>
		  <input type="text" class="form-control" name="nim" value="<?php echo $user[0]->nim; ?>">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
		  <input type="text" class="form-control" name="nama" value="<?php echo $user[0]->nama; ?>">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Tempat, Tanggal lahir</label>
		  <input type="text" class="form-control" name="ttl" value="<?php echo $user[0]->ttl; ?>">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
		  <textarea class="form-control" name="alamat"><?php echo $user[0]->alamat; ?></textarea>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
		  <input type="text" class="form-control" name="jurusan" value="<?php echo $user[0]->jurusan; ?>">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Asal sekolah</label>
		   <input type="text" class="form-control" name="asal_sekolah" value="<?php echo $user[0]->asal_sekolah; ?>">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Email</label>
		  <input type="text" class="form-control" name="email" value="<?php echo $user[0]->email; ?>">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php $this->endSection(); ?>