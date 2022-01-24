<?php
require '../../functions.php';
$id = $_GET["id"];

if( hapusPetugas($id) > 0 ) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = 'crud_petugas.php';
		</script>";
} else {
	echo "<script>
			alert('data gagal dihapus!');
			document.location.href = 'crud_petugas.php';
		</script>";
}

?>