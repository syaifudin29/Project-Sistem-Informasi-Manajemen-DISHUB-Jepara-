<?= $this->extend('staf/template');
	$this->section('content_staf');
?>

<h4 style="margin-bottom: 20px;">Peserta PKL <button data-bs-toggle="modal" data-bs-target="#oldPeserta" class="btn btn-success" style="float: right; margin-left: 10px;"> Peserta sudah selesai</button><button data-bs-toggle="modal" data-bs-target="#modalTambahPeserta" class="btn btn-primary" style="float: right; "> Calon Peserta PKL</button></h4>
<div class="card">
	<div class="card-body">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Nama</th>
				<th>NIM</th>
				<th>Asal Sekolah</th>
				<th>Masa PKL</th>
				<th>Surat Pengantar</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				$no=1; 
				foreach ($peserta as $key) { ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $key['nama']; ?></td>
					<td><?php echo $key['nim']; ?></td>
					<td><?php echo $key['asal_sekolah']; ?></td>
					<td><?php echo $key['awal']." - ".$key['akhir'];?></td>
					<td><a class="text-success" style="text-decoration: none;" href="/rekom/<?php echo $key['file_rekom']; ?>" download><i style="font-size: 20px;" class="fa-solid fa-file"></i> View</a></td>
					<td>
					<a class="text-warning" href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $key['id_user']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
					<a class="text-danger" href="/staf/daftar_peserta/delete/<?php echo $key['id_user']; ?>"><i class="fa-solid fa-trash"></i></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTambahPeserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Calon Peserta PKL</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body">
      <table class="table">
      	<thead>
      		<th>No</th>
      		<th>Nama</th>
      		<th>Action</th>
      	</thead>
      	<tbody>
      		<?php
      		$nom = 1;
      		 foreach ($cPeserta as $keyp) { ?>
      		<tr>
	      		<td><?php echo $nom++; ?></td>
	      		<td><?php echo $keyp['nama']; ?></td>
	      		<td><a class="btn btn-warning" href="/staf/calon/<?php echo $keyp['id_user']; ?>">Detail</a></td>
      		</tr>
      		<?php } ?>
      	</tbody>
      </table>
  	</div>
    </div>
  </div>
</div>

<div class="modal fade" id="oldPeserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar Peserta Sudah Selesai PKL</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body">
      <table class="table">
      	<thead>
      		<th>No</th>
      		<th>NIM</th>
      		<th>Nama</th>
      		<th>Tamggal Lahir</th>
      		<th>No Hp</th>
      		<th>Alamat</th>
      		<th>Asal Sekolah</th>
      		<th>Surat pengantar</th>
      	</thead>
      	<tbody>
      		<?php
      		$nom = 1;
      		 foreach ($oldPeserta as $keyp) { ?>
      		<tr>
	      		<td><?php echo $nom++; ?></td>
                <td><?php echo $keyp['nim']; ?></td>
	      		<td><?php echo $keyp['nama']; ?></td>
	      		<td><?php echo $keyp['ttl']; ?></td>
	      		<td><?php echo $keyp['no_hp']; ?></td>
	      		<td><?php echo $keyp['alamat']; ?></td>
	      		<td><?php echo $keyp['asal_sekolah']; ?></td>
	      		<td><a class="text-success" style="text-decoration: none;" href="/rekom/<?php echo $keyp['file_rekom']; ?>" download><i style="font-size: 20px;" class="fa-solid fa-file"></i> View</a></td>
      		</tr>
      		<?php } ?>
      	</tbody>
      </table>
  	</div>
    </div>
  </div>
</div>

<?php foreach ($peserta as $key) { ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $key['id_user'];; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="/staf/daftar_peserta/update">
      <div class="modal-body">
      	 <div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">No. ID</label>
		  <input type="text" class="form-control" value="<?php echo $key['id_user'];; ?>" disabled>
		  <input type="hidden" class="form-control" name="id_user" value="<?php echo $key['id_user']; ?>">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">NIM</label>
		  <input type="text" class="form-control" value="<?php echo $key['nim']; ?>" disabled>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
		  <input type="text" class="form-control" name="nama" value="<?php echo $key['nama']; ?>" >
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">No HP</label>
		  <input type="text" class="form-control" name="nohp" value="<?php echo $key['no_hp'];?>" >
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Tempat, Tanggal lahir</label>
		  <input type="text" class="form-control" name="ttl" value="<?php echo $key['ttl']; ?>">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
		  <textarea class="form-control" name="alamat"><?php echo $key['alamat'];?></textarea>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
		  <input type="text" class="form-control" name="jurusan" value="<?php echo $key['jurusan']; ?>">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Asal sekolah</label>
		   <input type="text" class="form-control" name="asalsekolah" value="<?php echo $key['asal_sekolah']; ?>" >
		</div>
		<div class="mb-3">
			<input type="hidden" name="id_magang" value="<?php echo $key['id_magang']; ?>">
		  <label for="exampleFormControlInput1" class="form-label">Bagian PKL</label>
		  <select class="form-select" name="id_bidang" aria-label="Default select example">

				 <?php foreach ($bidang as $keyu) {
				 	if ($keyu['id_bidang'] == $key['id_bidang']) {
				 		$select =  "selected";
				 	}else{
				 		$select = "";
				 	}
				 	?>
				 	<option <?php echo $select; ?> value="<?php echo $keyu['id_bidang']; ?>"><?php echo $keyu['nama_bidang']; ?></option>
				 	<?php
				 } ?>
				</select>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Masa PKL</label>
		   <div class="row">
		  <div class="col">
		  	 <label class="col-form-label">Awal</label>
		    <input type="date" name="awal" value="<?php echo $key['awal'];?>" class="form-control" >
		  </div>
		  <div class="col">
		  	 <label class="col-form-label">Akhir</label>
		    <input type="date" name="akhir" value="<?php echo $key['akhir'];?>" class="form-control" >
		  </div>
		</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
  	 </form>
     </div>
 </div>
</div>


<?php } $this->endSection(); ?>