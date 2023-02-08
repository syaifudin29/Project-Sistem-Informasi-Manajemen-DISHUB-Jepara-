<?= $this->extend('staf/template');
	$this->section('content_staf');
?>

<h4 style="margin-bottom: 20px;">Data Penilaian </h4>
<div class="card">
	<div class="card-body">
		<div class="row">
		  <div class="col">
		  	<label class="form-label">No. ID</label>
		    <input type="text" class="form-control" value="<?php echo $user[0]['id_user']; ?>" disabled>
		  </div>
		  <div class="col">
		  	<label class="form-label">Nama Lengkap</label>
		    <input type="text" class="form-control" value="<?php echo $user[0]['nama']; ?>" disabled>
		  </div>
		</div>
		<div class="row" style="margin-top: 10px;">
		  <div class="col">
		  <label class="form-label">TTL</label>
		    <input type="text" class="form-control" value="<?php echo $user[0]['ttl']; ?>" disabled>
		  </div>
		  <div class="col">
		  	<label class="form-label">Asal Sekolah</label>
		    <input type="text" class="form-control" value="<?php echo $user[0]['asal_sekolah']; ?>" disabled >
		  </div>
		</div>
	</div>
</div>
<h6 style="text-align: center; margin: 10px;">-- Penilaian --</h6>
<div class="card">
	<form method="post" action="/staf/sertifikasi/peserta/nilai">
		<input type="hidden" name="id_user" value="<?php echo $user[0]['id_user']; ?>">
	<div class="card-body">
		<?php
		if (empty($nilai)) {
		?><input type="hidden" name="aksi" value="simpan"><?php
		$nomor = 1;
		 foreach ($kriteria as $keys) {
			if ($keys['id_kriteria'] == 7) {
				?>
				<div class="mb-3">
				  <label class="form-label"><?php echo $nomor++.". ".$keys['kriteria']; ?></label>
				  <select name="kriteria[]" class="form-control" disabled>
				  	<?php if ($disiplin <= 20) {
				  		$nil = 20;
				  		$ket = "Sangat Kurang baik";
				  	}else if ($disiplin <= 40) {
				  		$nil = 40;
				  		$ket = "Kurang Baik";
				  	}else if ($disiplin <= 60) {
				  		$nil = 60;
				  		$ket = "Cukup";
				  	}else if ($disiplin <= 80) {
				  		$nil = 80;
				  		$ket = "Baik";
				  	}else if ($disiplin <= 100) {
				  		$nil = 100;
				  		$ket = "Sangat Baik";
				  	}
				  	echo "<option>".$ket."</option>";
				  	?>
				  	
				  </select>
				  <input type="hidden" name="kriteria[]" value="<?php echo $nil; ?>">
				</div>
				<?php
			}else if($keys['id_kriteria'] == 22){
				?>
				<div class="mb-3">
				  <label class="form-label"><?php echo $nomor++.". ".$keys['kriteria']; ?></label>
				  <select name="kriteria[]" class="form-control" disabled>
				  	<?php if ($tanggung <= 20) {
				  		$nil = 20;
				  		$ket = "Sangat Kurang baik";
				  	}else if ($disiplin <= 40) {
				  		$nil = 40;
				  		$ket = "Kurang Baik";
				  	}else if ($disiplin <= 60) {
				  		$nil = 60;
				  		$ket = "Cukup";
				  	}else if ($disiplin <= 80) {
				  		$nil = 80;
				  		$ket = "Baik";
				  	}else if ($disiplin <= 100) {
				  		$nil = 100;
				  		$ket = "Sangat Baik";
				  	}
				  	echo "<option>".$ket."</option>";
				  	?>
				  	
				  </select>
				  <input type="hidden" name="kriteria[]" value="<?php echo $nil; ?>">
				</div>
				<?php
			}else{
				?>
				<div class="mb-3">
				  <label class="form-label"><?php echo $nomor++.". ".$keys['kriteria']; ?></label>
				  <select name="kriteria[]" class="form-control">
				  	<option value="100">Sangat Baik</option>
				  	<option value="80">Baik</option>
				  	<option value="60">Cukup</option>
				  	<option value="40">Kurang Baik</option>
				  	<option value="20">Sangat Kurang baik</option>
				  </select>
				</div>
				<?php
			}
		 }
		}else{
			?><input type="hidden" name="aksi" value="update"><?php
			$nomor = 1;
		 foreach ($nilaiKriteria as $keys) {
			if ($keys['id_kriteria'] == 7) {
				?>
				<div class="mb-3">
				  <label class="form-label"><?php echo $nomor++.". ".$keys['kriteria']; ?></label>
				  <select name="kriteria[]" class="form-control" disabled>
				  	<?php if ($disiplin <= 20) {
				  		$nil = 20;
				  		$ket = "Sangat Kurang baik";
				  	}else if ($disiplin <= 40) {
				  		$nil = 40;
				  		$ket = "Kurang Baik";
				  	}else if ($disiplin <= 60) {
				  		$nil = 60;
				  		$ket = "Cukup";
				  	}else if ($disiplin <= 80) {
				  		$nil = 80;
				  		$ket = "Baik";
				  	}else if ($disiplin <= 100) {
				  		$nil = 100;
				  		$ket = "Sangat Baik";
				  	}
				  	echo "<option>".$ket."</option>";
				  	?>
				  	
				  </select>
				  <input type="hidden" name="kriteria[]" value="<?php echo $nil; ?>">
				</div>
				<?php
			}else if($keys['id_kriteria'] == 22){
				?>
				<div class="mb-3">
				  <label class="form-label"><?php echo $nomor++.". ".$keys['kriteria']; ?></label>
				  <select name="kriteria[]" class="form-control" disabled>
				  	<?php if ($tanggung <= 20) {
				  		$nil = 20;
				  		$ket = "Sangat Kurang baik";
				  	}else if ($disiplin <= 40) {
				  		$nil = 40;
				  		$ket = "Kurang Baik";
				  	}else if ($disiplin <= 60) {
				  		$nil = 60;
				  		$ket = "Cukup";
				  	}else if ($disiplin <= 80) {
				  		$nil = 80;
				  		$ket = "Baik";
				  	}else if ($disiplin <= 100) {
				  		$nil = 100;
				  		$ket = "Sangat Baik";
				  	}
				  	echo "<option>".$ket."</option>";
				  	?>
				  	
				  </select>
				  <input type="hidden" name="kriteria[]" value="<?php echo $nil; ?>">
				</div>
				<?php
			}else{
				?>
				<div class="mb-3">
				  <label class="form-label"><?php echo $nomor++.". ".$keys['kriteria']; ?></label>
				  <select name="kriteria[]" class="form-control">
				  	<option <?php echo $keys['nilai'] == 100 ? 'selected' : ''; ?> value="100">Sangat Baik</option>
				  	<option <?php echo $keys['nilai'] == 80 ? 'selected' : ''; ?>  value="80">Baik</option>
				  	<option <?php echo $keys['nilai'] == 60 ? 'selected' : ''; ?>  value="60">Cukup</option>
				  	<option <?php echo $keys['nilai'] == 40 ? 'selected' : ''; ?>  value="40">Kurang Baik</option>
				  	<option <?php echo $keys['nilai'] == 20 ? 'selected' : ''; ?>  value="20">Sangat Kurang baik</option>
				  </select>
				</div>
				<?php
			}
		} } ?>
	</div>
</div>
<button type="submit" class="btn btn-success" style="margin-top: 10px;">Simpan Nilai</button>
</form>

<?php $this->endSection(); ?>