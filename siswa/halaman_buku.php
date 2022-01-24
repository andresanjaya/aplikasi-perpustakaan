<?php
session_start();
require 'functions.php';


if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
}


if (isset($_POST["cari"])) {
    $buku = cari($_POST["keyword"]);
} else {
    $buku = query("select * from buku");
}

?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Books | Halaman Buku</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home_siswa.css">
    <script src="https://kit.fontawesome.com/70753bf0c6.js" crossorigin="anonymous"></script>


	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>

<header id="wn__header" class="header__area header__absolute sticky__header static-top shadow ">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="index.html">
								<img src="images/logo/logo4.png" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="home_siswa.php">Home</a>
									
								</li>
								<li class="drop"><a href="halaman_buku.php">Books</a>
									
								<li class="drop"><a href="shop-grid.html">Favorite</a>
									
								</li>
								<li class="drop"><a href="logout.php">Log Out</a>
									
								</li>
							
							
							</ul>
                            <form action="" method="POST" class="form-inline my-2 my-lg-0" style="margin-left: auto;">
                                <input id="keyword" name="keyword" class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
                                <button name="cari" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                            </form>

						</nav>
                        
					</div>

                    
                    
				
				</div>


				
			</div>		
</header>

<section class="wn__product__area brown--color pt--150  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">New Books Is Coming</h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					<!-- Start Single Product -->
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" ><img src="images/buku/buku2.jpg" alt="product image"></a>
				
								<div class="hot__box">
									<span class="hot-label" >HOT</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Spider-Man/Venom</a></h4>
                                <ul class="prize d-flex" >
									<li style="color: #4287f5;">2021</li>
									
								</ul>
							
							
							</div>
						</div>
					</div>

					<!-- PRODUCT BUKU 1-->
					
                    <div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" ><img src="images/buku/buku3.jpg" alt="product image"></a>
				
								<div class="hot__box">
									<span class="hot-label" >HOT</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Spider-Man/Venom</a></h4>
                                <ul class="prize d-flex" >
									<li style="color: #4287f5;">2021</li>
									
								</ul>
							
							
							</div>
						</div>
					</div>
					<!-- PRODUCT BUKU 2 -->
                    <div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" ><img src="images/buku/buku4.jpg" alt="product image"></a>
				
								<div class="hot__box">
									<span class="hot-label" >HOT</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Spider-Man/Venom</a></h4>
                                <ul class="prize d-flex" >
									<li style="color: #4287f5;">2021</li>
									
								</ul>
							
							
							</div>
						</div>
					</div>
					
					<!-- PRODUCT BUKU 3 -->
                    <div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" ><img src="images/buku/buku6.jpg" alt="product image"></a>
				
								<div class="hot__box">
									<span class="hot-label" >HOT</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Spider-Man/Venom</a></h4>
                                <ul class="prize d-flex" >
									<li style="color: #4287f5;">2021</li>
									
								</ul>
							
							
							</div>
						</div>
					</div>

			    	<!-- PRODUCT BUKU 4 -->
                    <div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" ><img src="images/buku/buku7.jpg" alt="product image"></a>
				
								<div class="hot__box">
									<span class="hot-label" >HOT</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Spider-Man/Venom</a></h4>
                                <ul class="prize d-flex" >
									<li style="color: #4287f5;">2021</li>
									
								</ul>
							
							
							</div>
						</div>
					</div>
					
					
				</div>
				<!-- End Single Tab Content -->
			</div>
            
		</section>

        <hr>

      
            <div class="card-body">
                <div class="card shadow mb-4">
                <div class="card-body">
                <div class="row d-flex justify-content-center">



                    <?php if (empty($buku)) : ?>
                        <tr>
                            <td colspan="7" align="center">data buku tidak ditemukan</td>
                        </tr>
                    <?php endif; ?>

                    <?php $i = 1; ?>
                    <?php foreach ($buku as $row) { ?>


                        <div class="card mb-3 col-md-6 mr-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="../admin/CRUD_BUKU/buku/<?= $row["cover"]; ?>" width="150" style="border-radius: 0px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row["judul"]; ?></h5>
                                       
                                        <p class="card-text"><b><p class="text-muted">Pengarang:</b> <?= $row["pengarang"]; ?></p>
                                      
                                        <p class="card-text"><b><p class="text-muted">Penerbit:</b> <?= $row["penerbit"]; ?></p></p>
                                        <p class="card-text"><small class="text-muted"><?= $row["kode_buku"]; ?></small></p>
                                        <a href="#" class="btn btn-success">Pinjam</a>
                                        <a href="#" class="btn btn-primary"><i class="fas fa-bookmark"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php } ?>

                </div>
            </div>
                </div>
            </div>
   


    <script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>

    <hr>
		<footer id="wn__footer" class="footer__area bg__cat--8 brown--color" style="background-color: black;">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo" style="color: white;">
									<a href="index.html">
										<img src="images/logo/logo2.png" alt="logo">
									</a>
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
								</div>
								<div class="footer__content" >
									<ul class="social__net social__net--2 d-flex justify-content-center">
										<li ><a href="#"><i class="bi bi-facebook" style="color: white;"></i></a></li>
										<li><a href="#"><i class="bi bi-google" style="color: white;"></i></a></li>
										<li><a href="#"><i class="bi bi-twitter" style="color: white;"></i></a></li>
										<li><a href="#"><i class="bi bi-linkedin" style="color: white;"></i></a></li>
										<li><a href="#"><i class="bi bi-youtube" style="color: white;"></i></a></li>
									</ul>
									<ul class="mainmenu d-flex justify-content-center" >
										<li><a href="index.html" style="color: white;">Trending</a></li>
										<li><a href="index.html" style="color: white;">Best Seller</a></li>
										<li><a href="index.html" style="color: white;">All Product</a></li>
										<li><a href="index.html" style="color: white;">Wishlist</a></li>
										<li><a href="index.html" style="color: white;">Blog</a></li>
										<li><a href="index.html" style="color: white;">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</footer>
</body>

</html>