<?php 
require 'app/function.php';
$siswa = query("SELECT * FROM siswa");

if (isset($_POST['search']) > 0 ) {
	  $siswa = cari($_POST['search']);

		# code...
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tabel Siswa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
	<form method="post" action="">
		<div class="navbar">
				<h1>Tabel Siswa</h1>
					<div>
						<input class="ser" type="text" name="search" placeholder="Cari" autocomplete="">
						<!-- <button class="cari" name="care" type="submit">Cari</button> -->
					</div>
      	</div>

	<div class="container">
			<div class="tmbah">
				<a href="tmbh.php" name="submit" class="tmbh">Tambah Data</a>
			</div>
	<table  border="1" cellpadding="15" cellspacing="0">
		<tr >
			<th class="lmt">No</th>
			<th class="lmt">Aksi</th>
			<th class="lmt">NIS</th>
			<th class="lmt">Nama</th>	
			<th class="lmt">Alamat</th>
			<th class="lmt">Jenis Kelamin</th>
			<th class="lmt">Tanggal Lahir</th>
			<th class="lmt">Foto</th>
		</tr>
		<?php $i = 0; ?>
		<?php foreach ($siswa as $row): ?>
			<?php $i++ ?>
		<tr>
			<td class="ksjdv"><?= $i  ?></td>
			<td class="telo">
			<a href="update.php?no= <?= $row['no']?>" >Update</a> | 
			<a href="hapus.php?no= <?= $row['no']?>" onclick="
				return confirm('APAKAH YAKIN?')">Hapus</a>
			</td>
			<td class="ksjdv"><?= $row["NIS"]  ?></td>
			<td class="ksjdv"><?= $row["Nama"]  ?></td>
			<td class="ksjdv"><?= $row["Alamat"]  ?></td>
			<td class="ksjdv"><?= $row["Jenis_Kelamin"]  ?></td>
			<td class="ksjdv"><?= $row["Tgl_Lahir"]  ?></td>
			<td class="ksjdv"><img src="assets/img/<?= $row["Foto"]  ?>" width="80px"></td>

		</tr>
	<?php endforeach; ?>
	
	</table>
	</div>
</form>



</body>
</html>