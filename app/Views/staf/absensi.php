<?= $this->extend('staf/template');
	$this->section('content_staf');
?>
<h4 style="margin-bottom: 20px;">Absensi</h4>
<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahAbsensi" style="float: right;">+ Tambah Absensi</button>
	<input type="date" class="form-control" onchange="getObject(this);" name="tgl" value="<?php echo date('Y-m-d'); ?>" style="width: 40%; margin-bottom: 20px;">

<div class="card">
	<div class="card-body">
		<table class="table">
			<thead>
				<th># </th>
				<th>Tanggal</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($absensi as $abs) { ?>
				<tr>
					<td><?php echo $no++; ?></td> 
					<td><?php echo date('d M Y', strtotime($abs->tgl)); ?></td>
					<td>
						<a href="/staf/absensi/tampil/<?php echo date('Y-m-d', strtotime($abs->tgl)); ?>" class="btn btn-warning"><i class="fa-solid fa-eye"></i> </a>
						
					</td>
				</tr>
			<?php } ?>
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
<script type="text/javascript">
	function getObject(object)
	{	  
	  console.log(object.value); // result 2019-01-03
	  window.location.href = "/staf/absensi/tampil/"+object.value;
	}
</script>
<?php $this->endSection(); ?>