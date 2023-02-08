<?= $this->extend('staf/template');
	$this->section('content_staf');
?>

<h4 style="margin-bottom: 20px;">Detail Calon Peserta PKL <button class="btn btn-primary" style="float: right;" disabled> ID: <?php echo $user[0]['id_user']; ?></button></h4>
<div class="card">
	<div class="card-body">
		<div class="row">
		  <div class="col">
		  	 <label class="col-form-label">Nama Lengkap</label>
		    <input type="text" class="form-control" value="<?php echo $user[0]['nama']; ?>" aria-label="First name" disabled>
		  </div>
		  <div class="col">
		  	 <label class="col-form-label">TTL</label>
		    <input type="text" class="form-control" value="<?php echo $user[0]['ttl']; ?>" aria-label="Last name" disabled>
		  </div>
		</div>
		<div class="row">
		  <div class="col">
		  	<label class="col-form-label">No Hp</label>
		    <input type="text" class="form-control" value="<?php echo $user[0]['no_hp']; ?>" aria-label="First name" disabled>
		  </div>
		  <div class="col">
		  	<label class="col-form-label">Alamat</label>
		    <textarea class="form-control" disabled><?php echo $user[0]['alamat']; ?>
		    </textarea>
		  </div>
		</div>
		<div class="row">
		  <div class="col">
		  	<label class="col-form-label">Asal Sekolah</label>
		    <input type="text" class="form-control" value="<?php echo $user[0]['asal_sekolah']; ?>" disabled>
		  </div>
		  <div class="col">
		  	<label class="col-form-label">Jurusan</label>
		    <input type="text" class="form-control"  value="<?php echo $user[0]['jurusan']; ?>" disabled>
		  </div>
		</div>
	</div>
	</div>
	<h5 style="margin-top: 10px;">Data PKL</h5>
	<div class="card" style="margin-top: 10px;">
		<form method="post" action="/staf/calon/terima">
		<div class="card-body">
			<div class="row">
				<input type="hidden" value="<?php echo $user[0]['id_user']; ?>" name="id_user">
			  <div class="col">
			  	<label class="col-form-label">Tanggal Awal PKL </label>
			    <input type="date"  name="tgl_awal" class="form-control" required>
			  </div>
			  <div class="col">
			  	<label class="col-form-label">Tanggal Akhir PKL </label>
			    <input type="date" name="tgl_akhir" class="form-control" required>
			  </div>
			</div>
			<div class="row">
			 <div class="col">
			  	<label class="col-form-label">Materi Pekerjaan</label>
			  	<select class="form-select" name="id_bidang" aria-label="Default select example" required>
				  <option disabled >Open this select menu</option>
				 <?php foreach ($bidang as $key) {
				 	echo "<option value='".$key['id_bidang']."'>".$key['nama_bidang']."</option>";
				 } ?>
				</select>
		 	 </div>
		 	 <div class="col">
			  	<label class="col-form-label">Pembimbing PKL</label>
			  	<select class="form-select" name="id_staf" aria-label="Default select example" required>
				  <option disabled >Open this select menu</option>
				 <?php foreach ($staf as $key) {
				 	echo "<option value='".$key['id_user']."'>".$key['nama']."</option>";
				 } ?>
				</select>
		 	 </div>
		    </div>
		</div>
	</div>
	<div style="margin-top: 10px;">
		<a href="/staf/" class="btn btn-secondary"><< Kembali</a>
		<div style="float: right;">
		<button class="btn btn-success" name="action" value="1">Terima PKL</button>
		<button class="btn btn-danger" name="action" value="2">Tidak</button>
		</div>
	</div>
	</form>

<?php $this->endSection(); ?>