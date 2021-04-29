<?php 
require 'app/function.php';
if (isset($_POST['sbmt'])) {
	//cek apakah berhasil
	if (menambah($_POST) > 0 ) {
		echo"
		<script>
			alert('Data berhasil ditambahkan');
			document.location.href = 'index.php';
		</script>
		";
	}else{
		echo"
		<script>	
			alert('Data gagal ditambahkan');
			document.location.href = 'index.php';
		</script>
		";
	}

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<link rel="stylesheet" type="text/css" href="assets/tambah.css">
</head>
<body>
	<h1>Tambah Data Siswa</h1>
	<form action="" method="post" enctype="multipart/form-data" >
		<table>
			<tr>
				<td>
					<label for="nis">NIS : </label>
					<input class="o" type="text" name="nis" id="nis" placeholder="masukan nis" required >
				</td>
			</tr>
			<tr>
				<td>
					<label for="nama">Nama : </label>
					<input class="o" type="text" id="nama" name="nama" placeholder="masukan nama" required >
				</td>
			</tr>
			<tr>
				<td>
					<label for="alamt">Alamat : </label>
					<input class="o" type="textarea" name="alamat" placeholder="masukan alamat" id="alamt" required >
				</td>
			</tr>
			<tr>	
					<td>
					<label >Jenis Kelamin : </label>
					
					<input type="radio" name="jk" id="jk" required  value="Laki-laki" >Laki-Laki 
					<input type="radio" name="jk" id="jk2" required value="Perempuan" >Perempuan
					</td>
			</tr>
			<tr>
				<td>
					<label>Tanggal Lahir : </label>
					<input class="o" type="date" name="tgl" required >
				</td>
			</tr>
			<tr>
				<td>
					<label>Foto : </label>
					<input class="" type="file" name="ft" id="ft"  >
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit" name="sbmt">Submit</button>
				</td>
				<td>
					<a href="index.php" >Back</a>
				</td>
			</tr>
		</table>
	</form>

</body>
</html>
