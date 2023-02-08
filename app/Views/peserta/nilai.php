<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<style type="text/css">
		body {
  margin: 2em;
}
/* override styles when printing */
@media print {

  body {
    margin: 0;
  }
	</style>
</head>
<body>
	<div style="position: absolute; width: 100%; height: 100%;">	
	<p style="text-align: center; margin-top: 300px;"> <img src="/logodis.png" style=" z-index: -2; opacity: 0.1; height: 400px; width: 400px;"></p>
	</div>
	<p class="text-center">
	    <img src="/gambar/header.png" style="width:100%;">
	</p>
<h3 style="text-align: center;">Daftar Nilai</h3>
<table style=" margin-bottom: 60px;">
	<tr>
		<td>Nama</td>
		<td width="50px;" align="center">:</td>
		<td><?php echo $diri[0]['nama']; ?></td>
	</tr>
	<tr>
		<td>NIM</td>
		<td width="50px;" align="center">:</td>
		<td><?php echo $diri[0]['nim']; ?></td>
	</tr>
	<tr>
		<td>Jurusan</td>
		<td width="50px;" align="center">:</td>
		<td><?php echo $diri[0]['jurusan']; ?></td>
	</tr>
	<tr>
		<td>Tempat</td>
		<td width="50px;" align="center">:</td>
		<td>Dinas Perhubungan Kabupaten Jepara</td>
	</tr>
</table>
<table class="table" style="margin-top: 20px; margin-bottom: 50px;">
	<thead>
		<th>No</th>
		<th>Macam Penilaian</th>
		<th>Nilai</th>
	</thead>
	<tbody>
		<?php
		$no = 1;
		$total = 0;
		foreach ($kriteria as $key) {
		 ?>
		 <tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $key['kriteria']; ?></td>
			<td><?php echo $key['nilai']; ?></td>
			<?php $total=$total+$key['nilai']; ?>
		</tr>
		 <?php
		 $jumlah = number_format(($total/7),1,",",".");
		 } 
		 ?>
		<tr>
			<td><b>Total</b></td>
			<td></td>
			<td><b><?php echo $jumlah; ?></b></td>
		</tr>
		<tr>
			<td><b>Keterangan</b></td>
			<td></td>
			<td><b><?php
			if ($jumlah <= 35.99) {
             echo "Tidak Memuaskan";
		        }else if($jumlah <= 51.99){
		             echo "Kurang Memuaskan";
		        }else if($jumlah <= 67.99){
		             echo "Cukup Memuaskan";
		        }else if($jumlah <= 83.99){
		             echo "Memuaskan";
		        }else{
		             echo "Sangat Memuaskan";
		        } ?>

			</b></td>
		</tr>
	</tbody>
</table>
<div style="float: left;">
	<b><i>Keterangan Nilai :</i></b>
	<table>
		<tr>
			<td>84 - 100</td>
			<td>- Sangat Memuaskan</td>
		</tr>
		<tr>
			<td>68 - 83,99</td>
			<td>- Memuaskan</td>
		</tr>
		<tr>
			<td>52 - 67,99</td>
			<td>- Cukup Memuaskan</td>
		</tr>
		<tr>
			<td>36 - 51,99</td>
			<td>- Kurang Memuaskan</td>
		</tr>
		<tr>
			<td>20 - 35,99</td>
			<td>- Tidak Memuaskan</td>
		</tr>
	</table>
</div>
<div style="float: right;">
	<p>Jepara, <?php echo $tanggal; ?></p>
	<p style="line-height: 0;">Pembimbing Lapangan</p>
	<br><br><br>
	<p><b>M ADJIB GHUFRON, SH,MH</b></p>
	<p style="line-height: 0;">NIP. 197205082006041011</p>
</div>
</body>
</html>