<?= $this->extend('peserta/template');
	$this->section('content_peserta');
?>

<h4 style="margin-bottom: 20px;">Sertifikat & Nilai</h4>
<div class="card" style="margin-top: 10px;">
	<div class="card-body">
	<h5>Sertifikat PKL</h5>
	<?php
	if ($status == 2) {
		?><a href="/peserta/sertifikasi/sertifikat" class="btn btn-success">Download Sertifikat</a><?php
	 }else{
	 	echo "<i>Hubungi staf untuk penilaian.</i>";
	 } 
	 ?>
	
	</div>
</div>
<div class="card" style="margin-top: 10px;">
	<div class="card-body">
	<h5>Nilai PKL</h5>
	<?php
	if ($status == 2) {
		?>
		<table class="table table-striped">
		<thead>
			<th>No</th>
			<th>Kriteria</th>
			<th>Nilai</th>
		</thead>
		<tbody>
			<?php
			$no=1; 
			foreach ($kriteria as $key) {
				$juml = 0;
				foreach ($nilai as $keys) {
					if ($key['id_kriteria'] == $keys['id_kriteria']) {
						$juml = $keys['nilai']+$juml;
					}
				}
			 ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $key['kriteria']; ?></td>
				<td><?php echo $juml/2; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<a href="/peserta/sertifikasi/nilai" class="btn btn-success">Download Nilai</a>
		<?php
	 }else{
	 	echo "<i>Hubungi staf untuk penilaian.</i>";
	 } 
	 ?>
	
	</div>
</div>

<?php $this->endSection(); ?>