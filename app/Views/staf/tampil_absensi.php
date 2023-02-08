<?= $this->extend('staf/template');
	$this->section('content_staf');
?>
<a class="btn btn-warning" href="/staf/absensi/" style="float: right;"><i class="fa-solid fa-backward"></i> Kembali</a>
<h4 style="margin-bottom: 20px;">Absensi</h4>
	

<div class="card">
	<div class="card-body">
		<p>Tanggal : <?php echo $tgl; ?></p>
		<table class="table">
			<thead>
				<th>No. </th>
				<th>Nama</th>
				<th>Keterangan</th>
			</thead>
			<tbody>
			<?php
			$no = 1; 
			foreach ($absensi as $abs) {
			
			?>
				<tr>
					<td><?php echo $no++; ?></td> 
					<td><?php echo $abs['nama']; ?></td>
					<td>
						<?php
						if ($abs['keterangan'] == 0) { ?>
							<span class="badge text-bg-secondary">Belum Absen</span>
						<?php }elseif($abs['keterangan'] == 1){
							?><span class="badge text-bg-danger">Tidak</span><?php
						}elseif ($abs['keterangan'] == 2) {
							?><span class="badge text-bg-success">Masuk</span><?php
						}else{

						}
						?>
					</td>
				</tr>
			<?php  } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTambahAbsensi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<form method="post" action="/staf/absensi/tambah"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Absensi</h1>
      </div>
      <div class="modal-body">
        <div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
		 <input type="date" class="form-control" name="tgl" value="<?php echo date('Y-m-d'); ?>">
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Tambah</button>
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Close</button>
      </div>
    </div>
  </div>
  </form>
</div>

<?php $this->endSection(); ?>