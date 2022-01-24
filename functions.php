<?php
$koneksi = mysqli_connect("localhost", "root", "", "dblatihan");

function query($sql)
{
	global $koneksi;
	$result = mysqli_query($koneksi, $sql);

	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function registrasi($data)
{
	global $koneksi;

	$username = (stripslashes($data["username"]));
	$nama = (stripslashes($data["nama"]));
	$password = mysqli_real_escape_string($koneksi, $data["password"]);
	$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
	$level = "siswa";
	$cek_username = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE username = '$username'");

	if ($password !== $password2) {
		echo "<script>alert('Password Yang Anda Masukkan Salah')</script>";
		return false;
	}
	if (mysqli_num_rows($cek_username) === 1) {
		echo "<script>
				alert('username sudah terpakai!');
				document.location.href = '';
			  </script>";
		return false;
	}

	$password = md5($password);
	mysqli_query($koneksi, "INSERT INTO tb_siswa VALUES('', '$username', '$nama', '$password', '$level') ");

	return mysqli_affected_rows($koneksi);
}



function hapusSiswa($id)
{
	global $koneksi;
	mysqli_query($koneksi, "delete from tb_siswa where id_siswa = $id");

	return mysqli_affected_rows($koneksi);
}
function hapusPetugas($id)
{
	global $koneksi;
	mysqli_query($koneksi, "delete from tb_petugas where id_petugas = $id");

	return mysqli_affected_rows($koneksi);
}
function hapusBuku($id)
{
	global $koneksi;
	mysqli_query($koneksi, "delete from tb_buku where id_buku = $id");

	return mysqli_affected_rows($koneksi);
}


function tambahSiswa($data)
{
	global $koneksi;

	$username = htmlspecialchars($data["username"]);
	$nama = htmlspecialchars($data["nama_lengkap"]);
	$password = md5($data["password"]);
	$level = htmlspecialchars($data["level"]);

	$sql = "INSERT INTO tb_siswa
				VALUES
			('', '$username', '$nama', '$password', '$level')";

	mysqli_query($koneksi, $sql);

	return mysqli_affected_rows($koneksi);
}
function tambahPetugas($data)
{
	global $koneksi;

	$username = htmlspecialchars($data["username"]);
	$nama = htmlspecialchars($data["nama_lengkap"]);
	$password = md5($data["password"]);
	$level = htmlspecialchars($data["level"]);

	$sql = "INSERT INTO tb_petugas
				VALUES
			('', '$username', '$nama', '$password', '$level')";

	mysqli_query($koneksi, $sql);

	return mysqli_affected_rows($koneksi);
}

function tambahBuku($data)
{
	global $koneksi;

	$judul = stripslashes($data["judul"]);
	$pengarang = strtolower(stripslashes($data["pengarang"]));
	$penerbit = stripslashes($data["penerbit"]);
	$kode_buku = stripslashes($data["kode_buku"]);

	// Cek username sudah ada atau belum
	$result = mysqli_query($koneksi, "SELECT judul FROM tb_buku WHERE judul = '$judul'");

	if (mysqli_fetch_assoc($result)) {
		echo "
      <script>
        alert('BUKU SUDAH TERSEDIA!');
      </script>
    ";
		return false;
	}

	// Upload cover
	$cover = upload();
	if (!$cover) {
		return false;
	}

	// Tambah user baru ke database
	mysqli_query($koneksi, "INSERT INTO tb_buku VALUES('', '$judul',  '$pengarang', '$penerbit', '$kode_buku', '$cover')");

	return mysqli_affected_rows($koneksi);;
}


function upload()
{
	$namaFile = $_FILES['cover']['name'];
	$ukuranFile = $_FILES['cover']['size'];
	$error = $_FILES['cover']['error'];
	$tmpName = $_FILES['cover']['tmp_name'];

	//Cek apakah tidak ada cover yang diupload
	if ($error === 4) {
		echo "<script>
             alert('PILIH cover TERLEBIH DAHULU!!')
          </script>";
		return false;
	}

	//Cek apakah yang di upload adalah cover?
	$ekstensicoverValid = ['jpg', 'jpeg', 'png'];
	$ekstensicover = explode('.', $namaFile);
	$ekstensicover = strtolower(end($ekstensicover));
	if (!in_array($ekstensicover, $ekstensicoverValid)) {
		echo "<script>
            alert('YANG ANDA UPLOAD BUKAN cover!')
          </script>";
		return false;
	}

	//Cek jika ukurannya terlalu besar
	if ($ukuranFile > 1500000) {
		echo "<script>
            alert('UKURAN cover TERLALU BESAR!')
          </script>";
		return false;
	}

	//Lolos pengecekan, cover siap diupload
	//Generate nama cover baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensicover;



	move_uploaded_file($tmpName, 'buku/' . $namaFileBaru);
	return $namaFileBaru;
}

function ubahSiswa($data)
{
	global $koneksi;

	$id = $data["id"];
	$username = htmlspecialchars($data["username"]);
	$nama = htmlspecialchars($data["nama_lengkap"]);
	$level = htmlspecialchars($data["level"]);

	$sql = "UPDATE tb_siswa SET
				username = '$username',
				nama_lengkap = '$nama',
				level = '$level'
			WHERE
				id_siswa = $id
			";

	mysqli_query($koneksi, $sql);

	return mysqli_affected_rows($koneksi);
}

function ubahPetugas($data)
{
	global $koneksi;

	$id = $data["id"];
	$username = htmlspecialchars($data["username"]);
	$nama = htmlspecialchars($data["nama_lengkap"]);
	$level = htmlspecialchars($data["level"]);

	$sql = "UPDATE tb_petugas SET
				username = '$username',
				nama_lengkap = '$nama',
				level = '$level'
			WHERE
				id_petugas = $id
			";

	mysqli_query($koneksi, $sql);

	return mysqli_affected_rows($koneksi);
}

function ubahBuku($data)
{
	global $koneksi;

	$id = $data["id"];
	$judul = htmlspecialchars($data["judul"]);
	$pengarang = htmlspecialchars($data["pengarang"]);
	$penerbit = htmlspecialchars($data["penerbit"]);
	$kode_buku = htmlspecialchars($data["kode_buku"]);
	$cover = htmlspecialchars($data["cover"]);

	$sql = "UPDATE tb_buku SET
				judul = '$judul',
				pengarang = '$pengarang',
				penerbit = '$penerbit',
				kode_buku = '$kode_buku',
				cover = '$cover',
			WHERE
				id_buku = $id
			";

	mysqli_query($koneksi, $sql);

	return mysqli_affected_rows($koneksi);
}

function cariSiswa($keyword)
{
	$query = "SELECT * FROM tb_siswa
            WHERE
            username LIKE '%$keyword%' OR
            nama_lengkap LIKE '%$keyword%'
            
            ";
	return query($query);
}

function cariPetugas($keyword)
{
	$query = "SELECT * FROM tb_petugas
            WHERE
            username LIKE '%$keyword%' OR
            nama_lengkap LIKE '%$keyword%'
            
            ";
	return query($query);
}
function terlambat($tgl_dateline, $tgl_kembali)
{

	$tgl_dateline_tai = explode("-", $tgl_dateline);
	$tgl_dateline_tai = $tgl_dateline_tai[2] . "-" . $tgl_dateline_tai[1] . "-" . $tgl_dateline_tai[0];

	$tgl_kembali_tai = explode("-", $tgl_kembali);
	$tgl_kembali_tai = $tgl_kembali_tai[2] . "-" . $tgl_kembali_tai[1] . "-" . $tgl_kembali_tai[0];

	$selisih = strtotime($tgl_kembali_tai) - strtotime($tgl_dateline_tai);

	$selisih = $selisih / 86400;

	if ($selisih >= 1) {
		$hasil_tgl = floor($selisih);
		// folorr pake buletin kebawah
	} else {
		$hasil_tgl = 0;
	}
	return $hasil_tgl;
}
