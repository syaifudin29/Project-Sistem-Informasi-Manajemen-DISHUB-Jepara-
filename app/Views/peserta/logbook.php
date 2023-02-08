<?= $this->extend('peserta/template');
	$this->section('content_peserta');

	function hari($tanggal){
		$hari = date('D', strtotime($tanggal));

    	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
		}

		return $hari_ini;
	}
?>
<h4 style="margin-bottom: 20px;">Logbook</h4>
<div class="card">
	<div class="card-body">
		<table class="table">
			<thead>
				<th>Tanggal</th>
				<th>Kegiatan</th>
				<th>Nilai</th>
			</thead>
			<tbody>
				<?php foreach ($logbook as $key): ?>
					<tr>
					<td><?php echo hari($key['tgl']).", ".date('d M Y', strtotime($key['tgl'])); ?></td>
					<td>
					<?php if ($key['kegiatan'] == "") {
						?>
						<a href="" data-bs-toggle="modal" data-bs-target="#modalTambahKegiatan<?php echo $key['id_logbook']; ?>" ><span class="badge text-bg-primary">+ Tambah kegiatan</span></a>
						<?php
					}else{
						echo $key['kegiatan'];
					} ?>
					</td>
					<td>
						<?php if ($key['nilai'] == 0) {
						?>
						<i class="text-danger">*belum dinilai</i>
						<?php
					}else{
						echo "<b class='text-success'>".$key['nilai']."</b>";
					} ?>
						
					</td>
				</tr>


				<!-- Modal -->
				<form method="post" action="/peserta/logbook/tambah">
				<div class="modal fade" id="modalTambahKegiatan<?php echo $key['id_logbook']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo hari($key['tgl']).", ".date('d M Y', strtotime($key['tgl'])); ?></h1>
				      </div>
				      <div class="modal-body">
				      	<div class="mb-3">
						  <label for="exampleFormControlTextarea1" class="form-label">Jelaskan kegiatanmu di tanggal ini : </label>
						  <input type="hidden" name="id_logbook" value="<?php echo $key['id_logbook']; ?>">
						  <textarea class="form-control" name="kegiatan" id="exampleFormControlTextarea1" rows="3"></textarea>
						</div>
				      </div>
				         <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
				        <button type="submit" class="btn btn-primary">Simpan</button>
				      </div>
				    </div>
				  </div>
				</div>
				</form>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<?php $this->endSection(); ?>