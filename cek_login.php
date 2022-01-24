<?php

//memanggil koneksi database
require "functions.php";


if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $_COOKIE['nama'];
    header("location: siswa/home.php");
  }

$pass = md5($_POST['password']);
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $pass);
$level = mysqli_escape_string($koneksi, $_POST['level']);

// INI USER SISWA
//cek username terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE username = '$username' and level='$level' ");
$user_valid = mysqli_fetch_array($cek_user);

//uji jika uname terdaftar
if ($user_valid) {
    //Jika username terdaftar
    //cek password sesuai atau tidak
    if ($password == $user_valid['password']) {
        //Jika password sesuai
        //buat session 
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
        $_SESSION['level'] = $user_valid['level'];

        // Cek remember me
      if (isset($_POST["remember"])) {
        // buat cookie
        setcookie('id', $cek_user['id_siswa'], time() + 120);
        setcookie('key', $cek_user['username'], time() + 120);
        setcookie('nama', $cek_user['nama'], time() + 120);
      }
        
        //uji level user
        if ($level == "Siswa") {
            header('location:siswa/home_siswa.php');
        }
    } else {
        echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='index.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='index.php'</script>";
}

// INI USER PETUGAS
//cek username terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE username = '$username' and level='$level' ");
$user_valid = mysqli_fetch_array($cek_user);

if ($user_valid) {
    //Jika username terdaftar
    //cek password sesuai atau tidak
    if ($password == $user_valid['password']) {
        //Jika password sesuai
        //buat session 
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
        $_SESSION['level'] = $user_valid['level'];

        //uji level user
        if ($level == "Petugas") {
            header('location:petugas/home_petugas.php');
        }
    } else {
        echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='index.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='index.php'</script>";
}


// INI USER ADMIN
//cek username terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username = '$username' and level='$level' ");
$user_valid = mysqli_fetch_array($cek_user);

//uji jika uname terdaftar
if ($user_valid) {
    //Jika username terdaftar
    //cek password sesuai atau tidak
    if ($password == $user_valid['password']) {
        //Jika password sesuai
        //buat session 
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
        $_SESSION['level'] = $user_valid['level'];

        //uji level user
        if ($level == "Admin") {
            header('location:admin/home_admin.php');
        }
    } else {
        echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='index.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='index.php'</script>";
}
