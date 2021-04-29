<?php 
require 'app/function.php';

//ambil data dulu
$id = $_GET["no"];

//query data
$ssw = query("SELECT * FROM siswa WHERE no = $id")[0];

if (isset($_POST['submit'])) {
	//cek apakah berhasil
	if (ubah($_POST) > 0) {
		
		echo"
		<script>
			alert('Data berhasil diubah');
			document.location.href = 'index.php';
		</script>
		";
	}else{
		echo"
		<script>
			alert('Data gagal diubah');
			document.location.href = 'index.php';
		</script>
		";
	}

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data</title>
	<link rel="stylesheet" type="text/css" href="assets/tambah.css">
</head>
<body>
	<h1>Ubah Data Siswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
				<tr>
				<td>
					<label for="nis">no : </label>
					<input type="hidden" name="no" value="<?= $ssw['no'];  ?>">
				</td>
			</tr>
			<tr>
			<tr>
				<td>
					<label for="nis">NIS : </label>
					<input class="o" type="text" name="nis" id="nis" placeholder="masukan nis" required
					value="<?= $ssw['NIS'];  ?>" >
				</td>
			</tr>
			<tr>
				<td>
					<label for="nama">Nama : </label>
					<input class="o" type="text" id="nama" name="nama" placeholder="masukan nama" required value="<?= $ssw['Nama'];  ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="alamt">Alamat : </label>
					<input class="o" type="textarea" name="alamat" placeholder="masukan alamat" id="alamt" required value="<?= $ssw['Alamat'];  ?>">
				</td>
			</tr>
			<tr>	
					<td>
					<label >Jenis Kelamin : </label>
					
					<input type="radio" name="jk" id="jk" required value="Laki-laki">Laki-Laki 
					<input type="radio" name="jk" id="jk2" required value="Perempuan" >Perempuan
					</td>
			</tr>
			<tr>
				<td>
					<label>Tanggal Lahir : </label>
					<input class="o" type="date" name="tgl" required value="<?= $ssw['Tgl_Lahir'];  ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Foto : </label>
					<input class="o" type="Foto" name="ft" id="ft" required value="<?= $ssw['Foto'];  ?>">
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit" name="submit">Update</button>
				</td>
				<td>
					<a href="index.php" >Back</a>
				</td>
			</tr>
		</table>
	</form>

</body>
</html>