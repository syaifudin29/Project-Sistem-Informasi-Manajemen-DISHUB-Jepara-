<?= $this->extend('peserta/template');
	$this->section('content_peserta');
?>

<h4 style="margin-bottom: 20px;">Tugas</h4>
<div class="card">
	<div class="card-body">
		<table class="table">
			<thead>
				<th>Tanggal</th>
				<th>Tugas</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php foreach ($tugas as $keys): ?>
				<tr>
					<td><?php echo date('d M Y' , strtotime($keys['tgl'])); ?></td>
					<td><b><?php echo $keys['judul']; ?></b></td>
					<?php if ($keys['status'] == "belum") { ?>
						<td><i class="badge text-bg-danger">Belum</i></td>
						<?php
					}elseif($keys['status'] == "proses"){
						?><td><i class="badge text-bg-warning">Proses</i></td><?php
					}else{
						?><td><i class="badge text-bg-success">Selesai</i></td><?php
					} ?>
					<td><button data-bs-toggle="modal" data-bs-target="#modalBukaTugas<?php echo $keys['id_tugas']; ?>" class="btn btn-primary"><i class="fa-solid fa-folder-open"></i> Buka</button></td>	
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<?php foreach ($tugas as $keyu): ?>
<div class="modal fade" id="modalBukaTugas<?php echo $keyu['id_tugas']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Tugas</h1>
      </div>
      <div class="modal-body">
        <div class="mb-3 border-bottom">
		  <h6>Judul Tugas</h6>
		  <h5><?php echo $keyu['judul']; ?></h5>
		</div>
		 <div class="mb-3 border-bottom">
		  <h6>Keterangan</h6>
		  <p><?php echo $keyu['keterangan']; ?></p>
		</div>
		<div class="mb-3 border-bottom">
		  <h6>Tugas yang harus kamu kerjakan dari staf</h6>
		  <p><a href="/tugas/<?php echo $keyu['file_staf']; ?>" class="btn btn-warning" download><i class="fa-solid fa-file"></i> Download</a></p>
		</div>
		<form method="post" action="/peserta/tugas/simpan" enctype="multipart/form-data">
			<input type="hidden" name="id_tugas" value="<?php echo $keyu['id_tugas']; ?>">
	    <div class="mb-3 border-bottom">
		  
		 <?php if($keyu['status'] == 'sudah'){ ?>
		 	<h6 class="text-success">File tugas yang sudah diselesaikan</h6>
		 	<p><a href="/tugas/<?php echo $keyu['file_peserta']; ?>" class="btn btn-success" download><i class="fa-solid fa-file"></i> Download</a></p>
		 <?php } elseif($keyu['status'] == 'belum') {
		 	echo "<h6 class='text-danger'>Silahkan Upload file tugas yang sudah diselesaikan</h6>";
		 	echo "<input type='file' name='file_peserta' class='form-control'>";
		 }else{
		 	echo "<i>Sedang proses konfirmasi...</i>";
		 }
		 	?>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button"  data-bs-dismiss="modal" class="btn btn-secondary">Close</button>
        <?php if ($keyu['status']=='sudah') {
        }else{ ?>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Sudah Benar</button>
    	<?php } ?>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach ?>

<?php $this->endSection(); ?>