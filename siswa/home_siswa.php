<?php
session_start();
require 'functions.php';

if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='../index.php'</script>";
}

if( isset($_SESSION["login"]) ) {
	header("Location: ../index.php");
	exit;
}

if (isset($_POST["cari"])) {
    $buku = cari($_POST["keyword"]);
} else {
    $buku = query("select * from tb_buku");
}

?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Home | Halaman Siswa</title>
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
                        <form class="form-inline my-2 my-lg-0" style="margin-left: auto;">
                        	<input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
                        	<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                        </form>
						</nav>
                        
					</div>

                    
                
				</div>


				
			</div>		
		</header>


        <section class="best-seel-area pt--150 pb--60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center pb--50">
							<h2 class="title__be--2">Best <span class="color--theme">Collections </span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
			</div>

			<div class="slider center">
				<!-- Single product start -->
				<div class="product product__style--3">
					<div class="product__thumb">
						<a class="first__img" href="single-product.html"><img src="images/buku/buku1.jpg" alt="product image"></a>
					</div>
				</div>
				
				<div class="product product__style--3">
					<div class="product__thumb">
						<a class="first__img" href="single-product.html"><img src="images/buku/buku12.jpg" alt="product image"></a>
					</div>
				</div>
				
				<div class="product product__style--3">
					<div class="product__thumb">
						<a class="first__img" href="single-product.html"><img src="images/buku/buku9.jpg" alt="product image"></a>
					</div>
				</div>
				
				<div class="product product__style--3">
					<div class="product__thumb">
						<a class="first__img" href="single-product.html"><img src="images/buku/buku4.jpg" alt="product image"></a>
					</div>
				</div>
				
				<div class="product product__style--3">
					<div class="product__thumb">
						<a class="first__img" href="single-product.html"><img src="images/buku/buku11.jpg" alt="product image"></a>
					</div>
				</div>
			
				<div class="product product__style--3">
					<div class="product__thumb">
						<a class="first__img" href="single-product.html"><img src="images/buku/buku6.jpg" alt="product image"></a>
					</div>
					
				</div>
			
				<div class="product product__style--3">
					<div class="product__thumb">
						<a class="first__img" href="single-product.html"><img src="images/buku/buku7.jpg" alt="product image"></a>
					</div>
				</div>
				
				<div class="product product__style--3">
					<div class="product__thumb">
						<a class="first__img" href="single-product.html"><img src="images/buku/buku10.jpg" alt="product image"></a>
					</div>
				</div>
				<!-- Single product end -->
			</div>
		</section>
   
        <hr>
        <!-- End Slider area -->
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
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
					<!-- PRODUCT BUKU 1 -->
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" ><img src="images/buku/buku2.jpg" alt="product image"></a>
								<div class="hot__box">
									<span class="hot-label" >HOT</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Captain Marvel</a></h4>
                                <ul class="prize d-flex" >
									<li style="color: #4287f5;">2019</li>
									
								</ul>
							</div>
						</div>
					</div>


					<!-- PRODUCT BUKU 2-->
                    <div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" ><img src="images/buku/buku3.jpg" alt="product image"></a>
				
								<div class="hot__box">
									<span class="hot-label" >HOT</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Avengers</a></h4>
                                <ul class="prize d-flex" >
									<li style="color: #4287f5;">2012</li>
									
								</ul>
							
							
							</div>
						</div>
					</div>

					<!-- PRODUCT BUKU 3 -->
                    <div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" ><img src="images/buku/buku4.jpg" alt="product image"></a>
				
								<div class="hot__box">
									<span class="hot-label" >HOT</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Secret Wars</a></h4>
                                <ul class="prize d-flex" >
									<li style="color: #4287f5;">2015</li>
									
								</ul>
							
							
							</div>
						</div>
					</div>
					
					<!-- PRODUCT BUKU 4 -->
                    <div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" ><img src="images/buku/buku6.jpg" alt="product image"></a>
				
								<div class="hot__box">
									<span class="hot-label" >HOT</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">X-Men Legends</a></h4>
                                <ul class="prize d-flex" >
									<li style="color: #4287f5;">2021</li>
									
								</ul>
							
							
							</div>
						</div>
					</div>

			    	<!-- PRODUCT BUKU 5 -->
                    <div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" ><img src="images/buku/buku7.jpg" alt="product image"></a>
				
								<div class="hot__box">
									<span class="hot-label" >HOT</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Thanos</a></h4>
                                <ul class="prize d-flex" >
									<li style="color: #4287f5;">2016</li>
									
								</ul>
							
							
							</div>
						</div>
					</div>
					
					
				</div>
				<!-- End Single Tab Content -->
			</div>
            
		</section>

        <hr>
		<!-- Start BEst Seller Area -->
		<!-- Start NEwsletter Area -->
		<section class="wn__newsletter__area bg-image--10" style="margin-bottom: 20px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
						<div class="section__title text-center">
							<h2>Stay With Us</h2>
						</div>
						<div class="newsletter__block text-center">
							<p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers.</p>
							<form action="#">
								<div class="newsletter__box">
									<input type="email" placeholder="Enter your e-mail">
									<button>Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End NEwsletter Area -->
		<!-- Start Best Seller Area -->
	
		<!-- Start BEst Seller Area -->
		<!-- Start Recent Post Area -->
		<section class="wn__recent__post bg--gray ptb--80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Menu </h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt necessitatibus laborum eos earum, consectetur unde! Dolore quos unde explicabo nihil aspernatur, recusandae vero, accusantium nobis esse officiis vitae, iste aperiam!</p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">Koleksi Buku</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt necessitatibus laborum eos earum, consectetur unde! Dolore quos unde explicabo nihil aspernatur, recusandae vero, accusantium nobis esse officiis vitae, iste aperiam!</p>
								<div class="post__time">
								<button href="halaman_buku.p" type="button" class="btn btn-primary btn-lg px-4 me-md-2" >
									<a style="color: white;" href="halaman_buku.php">Lets Go!</a>
								</button>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">Pinjam Buku</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt necessitatibus laborum eos earum, consectetur unde! Dolore quos unde explicabo nihil aspernatur, recusandae vero, accusantium nobis esse officiis vitae, iste aperiam!</p>
								<div class="post__time">
									
									<button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Lets Go!</button>
								
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">Buku Favorite</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt necessitatibus laborum eos earum, consectetur unde! Dolore quos unde explicabo nihil aspernatur, recusandae vero, accusantium nobis esse officiis vitae, iste aperiam!</p>
								<div class="post__time">
								<button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Lets Go!</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Recent Post Area -->
		<!-- Best Sale Area -->
		
		<!-- Best Sale Area Area -->
		<!-- Footer Area -->

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
		<!-- //Footer Area -->
		<!-- QUICKVIEW PRODUCT -->
		
		<!-- END QUICKVIEW PRODUCT -->
		</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
	
</body>
</html>