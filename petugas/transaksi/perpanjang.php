<?php


session_start();
require '../../functions.php';

$id = $_GET['id'];
$judul = $_GET['judul'];
$tgl_kembali = $_GET['tgl_kembali'];
$lambat = $_GET['lambat'];


if	 ($lambat > 5) {
?>
	<script type="text/javascript">
		alert("buku lewat tidak dapat diperpanjang ");
		window.location.href = "transaksi.php";
	</script>
	<?php
} else {

	$pecah			= explode("-", $tgl_kembali);
	$next_2_hari	= mktime(0, 0, 0, $pecah[1], $pecah[0] + 2, $pecah[2]);
	$hari_next		= date("d-m-Y", $next_2_hari);

	$update = $koneksi->query("UPDATE tb_transaksi SET tgl_kembali='$hari_next' where id_transaksi='$id'");

	if ($update) {
	?>
		<script type="text/javascript">
			alert("berhasil diperpanjang");
			window.location.href = "transaksi.php"
		</script>
	<?php
	} else {
	?>
		<script type="text/javascript">
			alert("Gagal Diperpanjang");
			window.location.href = "transaksi.php";
		</script>
<?php
	}
}

?>