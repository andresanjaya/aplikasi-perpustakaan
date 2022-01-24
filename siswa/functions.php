<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "dblatihan";

$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));


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

function hapusSiswa($id)
{
  global $koneksi;
  mysqli_query($koneksi, "delete from siswa where id = $id");

  return mysqli_affected_rows($koneksi);
}
function hapusPetugas($id)
{
  global $koneksi;
  mysqli_query($koneksi, "delete from petugas where id = $id");

  return mysqli_affected_rows($koneksi);
}

function hapusBuku($id)
{
  global $koneksi;
  mysqli_query($koneksi, "delete from buku where id = $id");

  return mysqli_affected_rows($koneksi);
}


function tambahSiswa($data)
{
  global $koneksi;

  $username = htmlspecialchars($data["username"]);
  $nama = htmlspecialchars($data["nama_lengkap"]);
  $password = md5($data["password"]);
  $level = htmlspecialchars($data["level"]);

  $sql = "INSERT INTO siswa
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

  $sql = "INSERT INTO petugas
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
  $result = mysqli_query($koneksi, "SELECT judul FROM buku WHERE judul = '$judul'");

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
  mysqli_query($koneksi, "INSERT INTO buku VALUES('', '$judul',  '$pengarang', '$penerbit', '$kode_buku', '$cover')");

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
  if ($ukuranFile > 5000000) {
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

  $sql = "UPDATE siswa SET
				username = '$username',
				nama_lengkap = '$nama',
				level = '$level'
			WHERE
				id = $id
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

  $sql = "UPDATE petugas SET
				username = '$username',
				nama_lengkap = '$nama',
				level = '$level'
			WHERE
				id = $id
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
  $gambarLama =  htmlspecialchars($data["gambarLama"]);


  //Cek apakah user pilih gambar baru atau tidak
  if ($_FILES['cover']['error'] === 4) {
    $cover = $gambarLama;
  } else {
    $cover = upload();
  }


  $query = "UPDATE buku SET
            judul = '$judul',
            pengarang = '$pengarang',
            penerbit = '$penerbit',
            kode_buku = '$kode_buku',
            cover = '$cover'

           WHERE id = $id 
          ";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}


function cari($keyword)
{
  $query = "SELECT * FROM buku
            WHERE
            judul LIKE '%$keyword%' OR
            pengarang LIKE '%$keyword%'
            
            ";
  return query($query);
}
