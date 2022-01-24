<?php
require 'functions.php';
$id = $_GET["id"];

if( hapusBuku($id) > 0 ) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = 'crud_buku.php';
		</script>";
} else {
	echo "<script>
			alert('data gagal dihapus!');
			document.location.href = 'crud_buku.php';
		</script>";
}
