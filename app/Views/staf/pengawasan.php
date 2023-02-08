<?= $this->extend('staf/template');
	$this->section('content_staf');
?>
<h4 style="margin-bottom: 20px;">Pengawasan</h4>
	<input type="date" value="<?php echo $tgl; ?>" onchange="getObject(this);" class="form-control" name="" style="width: 40%; margin-bottom: 20px;">
<div class="card">
	<div class="card-body">
		<table class="table">
			<thead>
				<th>No.</th>
				<th>Nama</th>
				<th>Tanggal</th>
				<th>Kegiatan</th>
				<th>Nilai</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				$no=1;
				 foreach ($logbook as $key): ?>
					<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $key->nama; ?></td>
					<td><?php echo date('d M Y', strtotime($key->tgl)); ?></td>
					<td><?php echo $key->kegiatan; ?></td>
					<td>
						<?php if($key->nilai == 0){ ?>
							<i>Belum dinilai</i>
						<?php }else{
							echo "<b>".$key->nilai."</b>";
						} ?>
					</td>
					<td>
						<?php if($key->nilai == 0){ ?>
							<button data-bs-toggle="modal" data-bs-target="#modalTambah<?php echo $key->id_logbook; ?>" class="btn btn-danger">+</button>
							<!-- Modal -->
							<form method="post" action="/staf/pengawasan/tambah">
							<div class="modal fade" id="modalTambah<?php echo $key->id_logbook; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Nilai</h1>
							        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							      </div>
							      <div class="modal-body">
							        <div class="mb-3">
							        	<input type="hidden" name="id_logbook" value="<?php echo $key->id_logbook; ?>">
							        	<input type="hidden" name="tgl" value="<?php echo $key->tgl; ?>">
									  <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
									  <input type="text" value="<?php echo $key->nama; ?>" class="form-control" id="exampleFormControlInput1" disabled>
									</div>
									<div class="mb-3 border-bottom">
									  <label for="exampleFormControlInput1" class="form-label">Kegiatan</label>
									 <textarea class="form-control" disabled><?php echo $key->kegiatan; ?></textarea>
									</div>
							      <div class="mb-3 border-bottom">
									 <label for="exampleFormControlInput1" class="form-label text-danger">Tambahkan Nilai Kegiatan</label>
									 <select name="nilai" class="form-control">
									  	<option value="100">Sangat Baik</option>
									  	<option value="80">Baik</option>
									  	<option value="60">Cukup</option>
									  	<option value="40">Kurang Baik</option>
									  	<option value="20">Sangat Kurang baik</option>
									  </select>
									</div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
							        <button type="submit" class="btn btn-primary">Simpan</button>
							      </div>
							    </div>
							  </div>
							</div>
							</form>
						<?php }else{
							?><button data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $key->id_logbook; ?>" class="btn btn-warning">Edit</button>
							<!-- Modal -->
							<form method="post" action="/staf/pengawasan/update">
							<div class="modal fade" id="modalEdit<?php echo $key->id_logbook; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Nilai</h1>
							        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							      </div>
							      <div class="modal-body">
							        <div class="mb-3">
							        	<input type="hidden" name="id_logbook" value="<?php echo $key->id_logbook; ?>">
							        	<input type="hidden" name="tgl" value="<?php echo $key->tgl; ?>">
									  <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
									  <input type="text" value="<?php echo $key->nama; ?>" class="form-control" id="exampleFormControlInput1" disabled>
									</div>
									<div class="mb-3 border-bottom">
									  <label for="exampleFormControlInput1" class="form-label">Kegiatan</label>
									 <textarea class="form-control" disabled><?php echo $key->kegiatan; ?></textarea>
									</div>
							      <div class="mb-3 border-bottom">
									  <label for="exampleFormControlInput1" class="form-label text-danger">Tambahkan Nilai Kegiatan</label>
									  <select name="nilai" class="form-control">
									  	<option <?php echo $key->nilai == 100 ? 'selected' : ''; ?> value="100">Sangat Baik</option>
									  	<option <?php echo $key->nilai == 80 ? 'selected' : ''; ?>  value="80">Baik</option>
									  	<option <?php echo $key->nilai == 60 ? 'selected' : ''; ?>  value="60">Cukup</option>
									  	<option <?php echo $key->nilai == 40 ? 'selected' : ''; ?>  value="40">Kurang Baik</option>
									  	<option <?php echo $key->nilai == 20 ? 'selected' : ''; ?>  value="20">Sangat Kurang baik</option>
									  </select>
									</div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
							        <button type="submit" class="btn btn-primary">Simpan</button>
							      </div>
							    </div>
							  </div>
							</div>
							</form>
							<?php
						} ?>
					</td>
				</tr>
				
				<?php endforeach ?>	
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	function getObject(object)
	{	  
	  console.log(object.value); // result 2019-01-03
	  window.location.href = "/staf/pengawasan/"+object.value;
	}
</script>

<?php $this->endSection(); ?>