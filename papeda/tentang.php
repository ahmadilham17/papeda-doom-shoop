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
    <div class="container-fluid">

        <!-- Judul Halaman -->
        <div class="shadow bg-white  p-3 mt-3 mb-2 rounded">
<h4><strong>Tentang Kami</strong></h4>
</div>

      <!-- Visi dan Misi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Visi dan Misi</h6>
    </div>
    <div class="container text-justify shadow mt-3 mb-3">
    <div class="card-body">
        <div class="vision">
            <h6 class="font-weight-bold">Visi Kami</h6>
            <p>
                Menjadi platform terdepan yang mendorong pertumbuhan ekonomi lokal di Pulau Doom dengan memberikan solusi perdagangan online yang efisien, mendukung pelaku usaha kecil, dan memberikan pengalaman transaksi yang memuaskan bagi konsumen.
            </p>
        </div>
        <div class="mission">
            <h6 class="font-weight-bold">Misi Kami</h6>
            <ol>
                <li>
                    <strong>Mendorong Pertumbuhan Ekonomi Lokal:</strong><br> Menyediakan platform untuk pelaku usaha kecil di Pulau Doom agar dapat meningkatkan visibilitas dan penjualan produk lokal mereka, mendukung pertumbuhan ekonomi di tingkat lokal.
                </li>
                <li>
                    <strong>Memberikan Solusi Perdagangan Online Efisien:</strong><br> Mengembangkan aplikasi Papeda Doom Shop sebagai solusi perdagangan online yang efisien dan user-friendly, memudahkan proses pemesanan, pembayaran, dan interaksi antara pembeli dan penjual.
                </li>
                <li>
                    <strong>Menyokong Pelaku Usaha Kecil:</strong><br> Memberikan dukungan kepada pelaku usaha kecil dengan menyediakan platform yang terjangkau, mudah digunakan, dan memberikan kesempatan kepada mereka untuk bersaing secara online.
                </li>
                <li>
                    <strong>Memberikan Pengalaman Transaksi yang Memuaskan:</strong><br> Menyajikan pengalaman transaksi yang memuaskan bagi konsumen dengan informasi produk yang jelas, kemudahan dalam proses pemesanan, dan dukungan pelanggan yang responsif.
                </li>
                <li>
                    <strong>Mengoptimalkan Potensi Produk Lokal:</strong><br> Memaksimalkan potensi produk lokal di Pulau Doom dengan menyajikan beragam produk berkualitas tinggi dan memberikan platform bagi pembeli untuk menilai dan memberikan ulasan.
                </li>
                <li>
                    <strong>Berinovasi Secara Berkelanjutan:</strong><b></b> Terus melakukan inovasi dalam pengembangan aplikasi, menambahkan fitur-fitur baru, dan mengikuti perkembangan kebutuhan pengguna serta teknologi.
                </li>
                <li>
                    <strong>Mewujudkan Perubahan Budaya:</strong><br> Merubah pola pikir masyarakat terkait dengan produk lokal, meningkatkan apresiasi terhadap keberagaman produk di Pulau Doom, dan menciptakan dampak positif dalam budaya perekonomian lokal.
                </li>
                <li>
                    <strong>Memberdayakan Pelaku Usaha:</strong><br> Memberdayakan pelaku usaha kecil dengan menyediakan informasi yang akurat, dukungan teknis, dan pelatihan yang diperlukan untuk memaksimalkan potensi bisnis mereka.
                </li>
            </ol>
        </div>
    </div>
    </div>
</div>


       <!-- Tim Kami -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tim Kami</h6>
    </div>
    <div class="card-body">
        <p>
            Kami adalah tim yang berkomitmen untuk memberikan pelayanan terbaik kepada pelanggan kami. Dengan keahlian dan dedikasi kami, kami siap untuk memenuhi kebutuhan Anda.
        </p>
        <div class="row">
            <!-- Tim Member 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <img class="img-fluid" src="assets/images/kami/1 (1).jpeg" alt="Team Member 1">
            </div>

            <!-- Tim Member 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <img class="img-fluid" src="assets/images/kami/1 (2).jpeg" alt="Team Member 2">
            </div>

            <!-- Tim Member 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <img class="img-fluid" src="assets/images/kami/1 (3).jpeg" alt="Team Member 3">
            </div>
        </div>
    </div>
</div>


    </div>
</main>

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
									<p><a href="#">Home</a></p>
									<p><a href="#">Shop</a></p>
									<p><a href="#">Tentang</a></p>
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