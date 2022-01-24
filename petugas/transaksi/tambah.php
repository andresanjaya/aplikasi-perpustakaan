<?php
$pinjam = date("d-m-Y");
$kembali = date("d-m-Y", time() + 60 * 60 * 24 * 5);
?>

<?php
session_start();
require '../../functions.php';

if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
	echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='../index.php'</script>";
}

$buku = query("SELECT * FROM tb_buku");
$siswa = query("SELECT * FROM tb_siswa");
$pinjam = date("d-m-Y");
$kembali = date("d-m-Y", time() + 60 * 60 * 24 * 5);
?>

<?php

if (isset($_POST['simpan'])) {
	$tgl_pinjam    = isset($_POST['pinjam']) ? $_POST['pinjam'] : "";
	$tgl_kembali  = isset($_POST['kembali']) ? $_POST['kembali'] : "";

	$dapat_buku    = isset($_POST['judul']) ? $_POST['judul'] : "";
	$pecah_buku    = explode(".", $dapat_buku);
	$id_buku    = $pecah_buku[0];
	$judul      = $pecah_buku[1];

	$dapat_siswa  = isset($_POST['nama']) ? $_POST['nama'] : "";
	$pecah_siswa  = explode(".", $dapat_siswa);
	$id_siswa     = $pecah_siswa[0];
	$siswa      = $pecah_siswa[1];


	$query = query("SELECT * FROM tb_buku WHERE judul = '$judul'");
	foreach ($query as $hasil) {
		$sisa = $hasil['jumlah_buku'];

		//cek data yang duplikate
		$cek = $koneksi->query("SELECT * FROM tb_transaksi WHERE nis=$id_siswa AND id_buku=$id_buku");


		if ($sisa == 0) {
			echo "
		<script>
		  alert('Stok buku telah habis, tidak bisa melakukan transaksi, silahkan tambahkan stok buku segera');
		  document.location.href = 'tambah.php';
		</script>";
		} elseif ($sisa != 0) {
			$qt = $koneksi->query("INSERT INTO tb_transaksi VALUES (null, '$id_buku', '$judul', '$id_siswa', '$siswa', '$tgl_pinjam', '$tgl_kembali', 'Pinjam', null)") or die("Gagal Masuk");

			$qu  = $koneksi->query("UPDATE tb_buku SET jumlah_buku = (jumlah_buku-1) WHERE id_buku = $id_buku ");
			if ($qt && $qu) {
				echo "
		  <script>
			alert('TRANSAKSI BERHASIL');
			document.location.href = 'transaksi.php';
		  </script>";
			} else {
				echo "
		  <script>
			alert('TRANSAKSI GAGAL');
			document.location.href = 'transaksi.php';
		  </script>";
			}
		} else {
			echo "
		<script>
		  alert('Anda sudah meminjam buku yang sama');
		  document.location.href = 'tambah.php';
		</script>";
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home Admin</title>

	<!-- Custom fonts for this template-->
	<link href="../../admin/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="../../admin/assets/css/sb-admin-2.min.css" rel="stylesheet">

	<script src="https://kit.fontawesome.com/70753bf0c6.js" crossorigin="anonymous"></script>

</head>

<body id="page-top">

	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-0">
					<i class="fas fa-book"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Bibliotheca <sup></sup></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item ">
				<a class="nav-link" href="../home_petugas.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Tambah Data
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="CRUD_SISWA/tambah.php">
					<i class="fas fa-user-graduate"></i>
					<span>Data Siswa</span>
				</a>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="CRUD_PETUGAS/tambah.php">
					<i class="fas fa-portrait"></i>
					<span>Data Petugas</span>
				</a>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="CRUD_BUKU/tambah.php">
					<i class="fas fa-book-open"></i>
					<span>Data Buku</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
                Transaksi Buku
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item ">
                <a class="nav-link" href="transaksi/transaksi.php">
                    <i class="fas fa-file-signature"></i>
                    <span>Transaksi</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="transaksi/tambah.php">
                    <i class="fas fa-book-reader"></i>
                    <span>Pinjam Buku</span></a>
            </li>



		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->
					<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-success" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-success" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>



						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $_SESSION['nama_lengkap'] ?></span>
								<img class="img-profile rounded-circle" src="../../admin/assets/img/undraw_profile.svg">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<a class="dropdown-item" href="#">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Settings
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<h1 class="h3 mb-2 text-gray-800">Tambah Data Pinjam Buku</h1>
					<hr>

					<div class="card mb-4 py-3 border-left-success">
						<div class="card-body">
							<div class="panel panel-default">

								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">

											<form action="" method="POST">
												<div class="form-group mb-3">
													<label class="mb-2x"> Judul Buku</label>
													<select class="form-control" name="judul">
														<option>== Pilih Buku==</option>
														<?php
														foreach ($buku as $bku) {
															echo "<option value='$bku[id_buku].$bku[judul]'>$bku[judul]</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group mb-3">
													<label class="mb-2">Nama Siswa</label>
													<select class="form-control" name="nama">
														<option>== Pilih Siswa==</option>
														<?php
														foreach ($siswa as $swa) {
															echo "<option value='$swa[username].$swa[nama_lengkap]'>$swa[username] - $swa[nama_lengkap]</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group mb-3">
													<label class="mb-2">Tanggal Pinjam</label>
													<input class="form-control" type="text" name="pinjam" value="<?php echo $pinjam; ?>" readonly />
												</div>

												<div class="form-group mb-3">
													<label class="mb-2">Tanggal Kembali</label>
													<input class="form-control" type="text" name="kembali" value="<?php echo $kembali; ?>" readonly />
												</div>

												<div>
													<input type="submit" name="simpan" value="simpan" class="btn btn-success">
													<input type="reset" name="simpan" value="reset" class="btn btn-warning">
												</div>

										</div>

										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<!-- /.container-fluid -->

				</div>
				<!-- End of Main Content -->

			</div>
			<!-- End of Content Wrapper -->

		</div>



	</div>

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-success" href="../index.php">Logout</a>
				</div>
			</div>
		</div>
	</div>



	<script src="../../admin/assets/vendor/jquery/jquery.min.js"></script>
	<script src="../../admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../../admin/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../../admin/assets/js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="../../admin/assets/vendor/chart.js/Chart.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="../../admin/assets/js/demo/chart-area-demo.js"></script>
	<script src="../../admin/assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>