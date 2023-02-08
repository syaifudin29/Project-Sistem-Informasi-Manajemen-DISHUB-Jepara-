	<?= $this->extend('staf/template');
	$this->section('content_staf');
?>

<h4 style="margin-bottom: 20px;">Kriteria Penilaian <button data-bs-toggle="modal" data-bs-target="#modalTambah" class="btn btn-primary" style="float: right;"> + Tambah</button></h4>
<div class="card">
	<div class="card-body table-responsive" style="height: 300px;">
		<table class="table">
			<thead>
				<th>No</th>
				<th>Keterangan</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				$no=1; 
				foreach ($kriteria as $key ) {
					?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $key['kriteria']; ?></td>
					<td><a class="text-warning" href="" data-bs-toggle="modal" data-bs-target="#modalUpdate<?php echo $key['id_kriteria']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
					<a class="text-danger" href="/staf/sertifikasi/delete/<?php echo $key['id_kriteria']; ?>"><i class="fa-solid fa-trash"></i></a></td>
				</tr>

				<!-- Modal -->
				<form action="/staf/sertifikasi/aksi" method="post">
				<div class="modal fade" id="modalUpdate<?php echo $key['id_kriteria']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				    	<input type="hidden" value="<?php echo $key['id_kriteria']; ?>" name="id_kriteria">
				      <div class="modal-header bg-warning text-white">
				        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Kriteria</h1>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      <div class="modal-body">
				        <div class="mb-3">
						  <label for="exampleFormControlTextarea1" class="form-label">Kriteria</label>
						  <input type="textarea" class="form-control" value="<?php echo $key['kriteria']; ?>" name="kriteria">
						</div>
						 <div class="mb-3">
						  <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
						  <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"><?php echo $key['deskripsi']; ?></textarea>
						</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				        <button type="submit" name="action" value="update" class="btn btn-primary">Simpan</button>
				      </div>
				    </div>
				  </div>
				</div>
				</form>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>

<h4 style="margin-bottom: 20px; margin-top: 20px;">Penilaian Peserta </h4>
<div class="card">
	<div class="card-body">
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Nama</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($peserta as $key) {
					if ($key['status'] == 0) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $key['nama']; ?></td>
							<td><a href="/staf/sertifikasi/peserta/<?php echo $key['id_user']; ?>" class="btn btn-success">+ Nilai</a></td>
						</tr>
				<?php }else if($key['status'] == 1){
						if ($key['id_staf'] == session()->get('id_user')) {
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $key['nama']; ?></td>
								<td><a href="/staf/sertifikasi/peserta/<?php echo $key['id_user']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a></td>
							</tr>
							<?php
						}else{ ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $key['nama']; ?></td>
								<td><a href="/staf/sertifikasi/peserta/<?php echo $key['id_user']; ?>" class="btn btn-success">+ Nilai</a></td>
							</tr>
						<?php
						}
					?>
				
				<?php	
					}else{
						if ($key['id_staf1'] == session()->get('id_user') || $key['id_staf2'] == session()->get('id_user')) {
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $key['nama']; ?></td>
								<td><a href="/staf/sertifikasi/peserta/<?php echo $key['id_user']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a></td>
							</tr>
							<?php
						}
					}
				?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>


<!-- Modal -->
<form action="/staf/sertifikasi/aksi" method="post">
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kriteria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
		  <label for="exampleFormControlTextarea1" class="form-label">Kriteria</label>
		  <input type="textarea" class="form-control" name="kriteria">
		</div>
		 <div class="mb-3">
		  <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
		  <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="action" value="simpan" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>


<?php $this->endSection(); ?>