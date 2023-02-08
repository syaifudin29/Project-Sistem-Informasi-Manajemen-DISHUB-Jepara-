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
<h4 style="margin-bottom: 20px;">Absensi</h4>
				<?php foreach ($absensi as $key): ?>	
				<div class="card" style="margin-bottom: 10px;">
				  <div class="card-body">
				  	<div class="row">
				  		<div class="col-md-8">
				  			<h5><?php echo hari($key['tgl']).", ".date('d M Y', strtotime($key['tgl'])); ?></h5>
				  		</div>
				  		<div class="col-md-4">
				  			<?php
				  			if ($key['keterangan'] == '1') { ?>
				  			 	<i style="font-size: 25px;" class="fa-sharp fa-solid fa-x text-danger"></i>
				  			Tidak masuk
				  			<?php
				  			 }elseif ($key['keterangan'] == '2') {
				  			 	?>
				  			 	<i style="font-size: 25px;" class="fa-sharp fa-solid fa-check text-success"></i>
				  				<?php echo date('H:i', strtotime($key['absen'])) ?> Wib
				  			 	<?php
				  			 }else{ ?>
				  			 <form method="post" action="/peserta/absensi/aksi">	
					  			<input type="hidden" name="id_absensi" value="<?php echo $key['id_absensi']; ?>">
					  			<button type="submit" value="2" name="aksi" class="btn btn-success">Masuk</button>
					  			<button value="1" name="aksi" class="btn btn-danger">Tidak</button>
				  			 </form>
				  			<?php } ?>
				  		</div>
				  	</div>
				</div>
				</div>
				<?php endforeach ?>
<?php $this->endSection(); ?>