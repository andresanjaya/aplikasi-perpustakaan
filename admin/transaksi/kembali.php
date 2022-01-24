<?php

require '../../functions.php';

$id = $_GET['id'];
$id_buku = $_GET['judul'];

// $sql = $koneksi->query("update tb_transaksi set status='kembali' where id = '$id'");
$sql = $koneksi->query("DELETE FROM tb_transaksi WHERE id_transaksi = '$id'");

$buku = $koneksi->query("UPDATE  tb_buku SET jumlah_buku = (jumlah_buku+1) WHERE judul='$id_buku' ");

if ($sql || $buku) {
?>

	<script type="text/javascript">
		alert("Buku Berhasil Dikembalikan");

		window.location.href = "transaksi.php";
	</script>
<?php
}

?>