<?php

session_start();
$_SESSION = [];
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama_lengkap']);
unset($_SESSION['level']);


setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

session_destroy();
                        echo "<script>alert('Anda telah keluar dari halaman Siswa');document.location='../index.php'</script>";

?>

