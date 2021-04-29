<?php 

// koneksi ke databse
$conn = mysqli_connect("localhost","root","","db_siswa");

function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

//FUNCTION TAMBAH DATA
function menambah($data){
	global $conn ;

	$nis = htmlspecialchars($data["nis"]);
	$nama = htmlspecialchars($data["nama"]);
	$lmt = htmlspecialchars($data["alamat"]);
	$jk = htmlspecialchars($data["jk"]);
	$tg = htmlspecialchars($data["tgl"]);

	//Uploud gambar
	$ft = Uploud();
	if( !$ft){
		return false;
	}

	$query = "INSERT INTO siswa  VALUES ('','$nis','$nama','$lmt','$jk','$tg','$ft')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

//FUNCTION UPLOUD
function uploud(){

	$namafl = $_FILES['ft']['name'];
	$ukuranfl = $_FILES['ft']['size'];
	$error = $_FILES['ft']['error'];
	$tmpname = $_FILES['ft']['tmp_name'];

	//jika tidak ada foto yang di uploud
	if ( $error === 4) {
		echo"
			<script>
				alert('Uploud foto dulu bossss');
			</script>
		";
		return false;
	}

	//cek yang diuploud harus foto
	$ekstensigambarvalid = ['jpg','jpeg','png'];//format gambar
	$ekstensigambar = explode('.', $namafl);//merubah string menjadi array
	//mengambil format terakir dan merubah huruf menjadi kecil semua
	$ekstensigambar = strtolower(end($ekstensigambar));
	//cek adakah string dalam sebuah array
	if ( !in_array($ekstensigambar, $ekstensigambarvalid)){
			echo"
			<script>
				alert('Maaf, ini bukan gambar bosss');
			</script>
		";
		return false;
	}

	//cek jika ukuran terlalu besar(ukuran byte)
	if ($ukuranfl > 9000000) {
		echo "<script>
				alert('Maaf, gambarnya terlalu besar, dadi yo ndiak kuat :v');
			</script>
		";
		return false;
		# code...
	}

	//jika sudah benar
	//memindahkan file dari tempat sementara ke tempat tujuanya
	move_uploaded_file($tmpname, 'assets/img/'. $namafl);

	return $namafl;
}


//FUNCTION HAPUS DATA
function hapus($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM siswa WHERE no = $id");

	return mysqli_affected_rows($conn);
}

//UBAH DATA
function ubah($data){
		global $conn;

	$id = $data["no"];
	$nis =htmlspecialchars( $data["nis"]);
	$nama =htmlspecialchars( $data["nama"]);
	$almt =htmlspecialchars( $data["alamat"]);
	$jk =htmlspecialchars( $data["jk"]);
	$tgl =htmlspecialchars( $data["tgl"]);
	$ft =htmlspecialchars( $data["ft"]);

$query = "UPDATE siswa SET 
			NIS = '$nis',
			Nama = '$nama',
			Alamat = '$almt',
			Jenis_Kelamin = '$jk',
			Tgl_Lahir = '$tgl',
			Foto = '$ft'
			WHERE no = $id";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

//FUNCTION PENCARIAN
function cari($search){
	global $conn;
	$search = htmlspecialchars($_POST['search']);

	$sql = "SELECT * FROM siswa
			WHERE
				NIS LIKE '%$search%' ||
				Nama LIKE '%$search%' ";

		return mysqli_query($conn,$sql);
}
?>
