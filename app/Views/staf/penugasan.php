<?= $this->extend('staf/template');
	$this->section('content_staf');
?>
<h4 style="margin-bottom: 20px;">Penugasan</h4>
<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahTugas" style="float: right;">+ Tambah tugas</button>
	<input type="date" class="form-control" value="<?php echo $tanggal; ?>" name="tanggal" onchange="getObject(this);"  style="width: 40%; margin-bottom: 20px;">

<div class="card">
	<div class="card-body">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Nama</th>
				<th>Tugas</th>
				<th>Tanggal</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				$nom = count($tugas); 
				foreach ($tugas as $keys): ?>
				<tr>
					<td><?php echo $nom--; ?></td>
					<td><?php echo $keys->nama; ?></td>
					<td><?php echo $keys->judul; ?></td>
					<td><?php echo date('d M Y' , strtotime($keys->tgl)); ?></td>
					<?php if ($keys->status == "belum") { ?>
						<td><i class="badge text-bg-danger">Belum</i></td>
						<?php
					}elseif($keys->status == "proses"){
						?><td><i class="badge text-bg-warning">Proses</i></td><?php
					}else{
						?><td><i class="badge text-bg-success">Selesai</i></td><?php
					} ?>
					<td>
						<button data-bs-toggle="modal" data-bs-target="#modalBukaTugas<?php echo $keys->id_tugas; ?>" class="btn btn-warning"><i class="fa-solid fa-eye"></i></button> 
						<a class="btn btn-danger" href="/staf/penugasan/hapus/<?php echo $keys->id_tugas; ?>"><i class="fa-solid fa-trash"></i></a></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTambahTugas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<form method="post" action="/staf/penugasan/tambah" enctype="multipart/form-data">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Tugas</h1>
      </div>
      <div class="modal-body">
        <div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Judul tugas</label>
		  <input type="text" class="form-control" name="judul" id="exampleFormControlInput1">
		</div>
		 <div class="mb-3">
		  <label for="exampleFormControlInput2" class="form-label">Keterangan</label>
		  <textarea class="form-control" name="keterangan"></textarea>
		</div>
		<div class="mb-3">
		  <label for="formFile" class="form-label">Pilih file</label>
		  <input class="form-control" name="file_staf" type="file" id="formFile">
		</div>
		<div class="mb-3">
		  <label for="formFile" class="form-label">Pilih peserta</label>
		  <select class="form-select" name="id_user" aria-label="Default select example">
			  <option selected >pilih peserta</option>
			  <?php
			   foreach ($user as $key) {
			   	?> <option value="<?php echo $key['id_user'] ?>"><?php echo $key['nama'] ?></option><?php
			   }
			   ?>
			</select>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button"  data-bs-dismiss="modal" class="btn btn-secondary">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>


<!-- Modal -->
<?php foreach ($tugas as $keyu): ?>
<div class="modal fade" id="modalBukaTugas<?php echo $keyu->id_tugas; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Tugas - <?php echo $keyu->nama; ?></h1>
      </div>
      <div class="modal-body">
        <div class="mb-3 border-bottom">
		  <h6>Judul Tugas</h6>
		  <p><?php echo $keyu->judul; ?></p>
		</div>
		 <div class="mb-3 border-bottom">
		  <h6>Keterangan</h6>
		  <p><?php echo $keyu->keterangan; ?></p>
		</div>
		<div class="mb-3 border-bottom">
		  <h6>Berkas file dari staf</h6>
		  <p><a href="/tugas/<?php echo $keyu->file_staf; ?>" class="btn btn-info" download><i class="fa-solid fa-file"></i> Download Berkas</a></p>
		</div>
	      <div class="mb-3 border-bottom">
		  <h6 class="text-success">Berkas file sudah selesai dari peserta</h6>
		 <?php if($keyu->status == 'sudah' || $keyu->status == 'proses' ){ ?>
		 	<p><a href="/tugas/<?php echo $keyu->file_peserta; ?>" class="btn btn-warning" download><i class="fa-solid fa-file"></i> Download Berkas</a></p>
		 <?php } else {
		 	echo "<p><i>*Belum mengerjakan</i></p>";
		 }?>
		</div>
      </div>
      <div class="modal-footer">
      	<form action="/staf/penugasan/proses" method="post">
      	<input type="hidden" name="id_tugas" value="<?php echo $keyu->id_tugas; ?>">
        <button type="button"  data-bs-dismiss="modal" class="btn btn-secondary">Close</button>
        <?php if ($keyu->status=='sudah') {
        }else{ ?>
        <button type="submit" name="aksi" value="ulangi" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-repeat"></i> Ulangi</button>
        <button type="submit" name="aksi" value="benar" class="btn btn-primary"><i class="fa-solid fa-check"></i> Benar</button>
   		<?php } ?>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<script type="text/javascript">
	function getObject(object)
	{	  
	  console.log(object.value); // result 2019-01-03
	  window.location.href = "/staf/penugasan/cari/"+object.value;
	}
</script>
<?php $this->endSection(); ?>