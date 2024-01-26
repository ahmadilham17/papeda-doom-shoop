
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/style/main.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	
	
	<link href="assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


	<title>Papeda Doom Shop | Homepage</title>
</head>
<body>

	<header>
		<nav class="main-nav">  
			<div class="brand text-main">
				<a href="index.php">
					<h1>Papeda Doom Shop</h1>
				</a>
			</div>
			<div class="links">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="tentang.php">Tentang</a></li>
					<li>
						<form class="d-flex" action="shop.php" method="get">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" required>
							<button class="btn btn-outline-success" type="submit">Cari</button>
						</form>
					</li>
				</ul>
			</div>
			
			<div class="icon-for-user">
				<a href="login.php" onclick ="return confirm ('Login terlebih dahulu!');">
					<img src="assets/icons/shop-bag.svg" alt="person">
				</a>
			</div>
			<ul class="navbar-nav mr-2">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/icons/person.svg" alt="person">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="login.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Login
                                </a>
                        
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pilihUser.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Daftar
                                </a>
                            </div>
                        </li>

                    </ul>
			<div class="menu">
				<img src="assets/icons/menu.svg" alt="menu">
			</div>
		</nav>
	</header><!-- /header -->
	<main>

		<!--BANNER-->
		<section class="banner">
			<div class="container">
				<div class="row justify-content-center align-items-center pad-tab" data-aos="fade-up">
					<div class="banner-text col-sm-12 col-md-6">
						<p class="text-second">PapedaDoom Shop</p>
						<h1 class="text-main secondary-col">Selamat Datang 
						</h1>
						<p class="text-second"> Papeda Doom Shop Website mencakup 
							berbagai aspek yang secara keseluruhan bertujuan untuk 
							mendorong pertumbuhan usaha lokal di Pulau Doom  </p>
						<a href="shop.php" class="btn-rounded text-main">Beli Sekarang</a>
					</div>
					<div class="banner-image col-sm-14 col-md-6 d-none d-sm-block">
						<img src="assets/images/utama.png" alt="image-banner" class="img-fluid">
					</div>
				</div>
			</div>
		</section>


				<!--Preview-->
		<section class="preview-section d-md-flex align-items-center mb-2">
			<div class="container">
				<div class="preview row">
					<div class="preview-item col-12 col-sm-12 col-md-6">
						<div class="image-preview">
							<img src="assets/img/header-bg.jpg" alt="preview" class="img-fluid">
							<a class="bg-lihgt">
								<p class="text-main">Doom 
									<br>
									Island</p>
							</a>
						</div>
					</div>

					<div class="preview-item col-12 col-sm-12 col-md-6">
						<div class="image-preview">
							<img src="assets/images/header-bg.jpg" alt="preview" class="img-fluid">
							<a href="#">
								<p class="text-main">Find a Attractive 
									<br>
									Suits</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		</section>


		</main><!--main-->
<footer>
		<div class="container">
			<div class="footer-content row mb-4">
				<div class="footer-brand col-12 col-sm-12 col-md-3 col-lg-3">
					<div>
						<h1 class="text-main">PAPEDA DOOM SHOP</h1>
					</div>
				</div>

				<div class="footer-items-box col-12 col-sm-12 col-md-9 col-lg-9">
					<div class="footer-items row">
						<div class="footer-item col-12 col-sm-12 col-md-4">
							<div>
								<div class="footer-item-content">
									<h3 class="text-main">Store</h3>
									<p><a href="index.php">Home</a></p>
									<p><a href="shop.php">Shop</a></p>
									<p><a href="tentang.php">Tentang</a></p>
								</div>
							</div>
						</div>
	
						<div class="footer-item col-12 col-sm-12 col-md-4">
							<div>
								<div class="footer-item-content">
									<h3 class="text-main">Business</h3>
									<p><a href="#">papedadoomshop@gmail.com</a></p>
									<p><a href="#">Pulau Doom, Papua Barat Daya</a></p>
								</div>
							</div>
						</div>
	
						<div class="footer-item col-12 col-sm-12 col-md-4">
							<div>
								<div class="footer-item-content">
									<h3 class="text-main">Social</h3>
									<a href="#" class="ig-icon">
										<img src="assets/images/instagram.png" alt="ig" class="img-fluid">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="copyright-section border-top">
				<div class="row">
					<div class="col-12">
						<div class="copyright-content text-center mt-4">
							<p class="text-second">Papeda Doom Shop Copyright &copy; 2024 All Rights Reserved</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

		

	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="library/bootstrap/js/bootstrap.min.js"></script> -->
	<script src="assets/script/index.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>

	<!-- Bootstrap core JavaScript-->
    <script src="assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/admin/js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
     <script src="assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/admin/js/demo/datatables-demo.js"></script>
	<script>
		AOS.init();
	</script>
</body>
</html>