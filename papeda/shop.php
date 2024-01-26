<?php
include 'config/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/style/main.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/admin/vendor/fontawesome-free/css/all.min.css">
	
	
	<link href="assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


	<title>Papeda Doom Shop | Homepage</title>
</head>
<body>

	<header>
		<nav class="main-nav">
			<div class="brand text-main">
				<a href="#">
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
    <div class="row">
        <!-- Kategori -->
        <div class="col-md-3 bg-light mt-2">
            <ul class="list-group list-group-flush p-2">
                <li class="list-group-item bg-warning"><i class="fas fa-list"></i> Kategori</li>

                <?php
                $data_kategori = array();
                $ambil = $koneksi->query("SELECT * FROM kategori");
                while($pecah = $ambil->fetch_assoc()){
                    $data_kategori[] = $pecah;
                }
                ?>

                <?php foreach ($data_kategori as $key => $values): ?>
                    <li class="list-group-item"><i class="fas fa-angle-right"></i><a href="shop.php?idkategori=<?php echo $values['id_kategori'];?>" style="text-decoration: none;"> <?php echo $values['nama_kategori'];?></a></li>
                <?php endforeach ?>
                <li class="list-group-item"><i class="fas fa-angle-right"></i><a href="shop.php" style="text-decoration: none; ">Semua Produk</a></li>

            </ul>

            <ul class="list-group list-group-flush p-2">
                <li class="list-group-item bg-warning"><i class="fas fa-list"></i> Kategori Produk</li>

                <?php
                $data_produk_kategori = array();
                $ambil = $koneksi->query("SELECT * FROM produk_kategori");
                while($pecah = $ambil->fetch_assoc()){
                    $data_produk_kategori[] = $pecah;
                }
                ?>

                <?php foreach ($data_produk_kategori as $key => $values): ?>
                    <li class="list-group-item"><i class="fas fa-angle-right"></i> <a href="shop.php?idprodukkategori=<?php echo $values['id_produk_kategori'];?>" style="text-decoration: none; "><?php echo $values['nama_kategori_produk'];?></a></li>
                <?php endforeach ?>
                <li class="list-group-item"><i class="fas fa-angle-right"></i><a href="shop.php" style="text-decoration: none; ">Semua Produk</a></li>

            </ul>
        </div>
        <!-- Kategori end -->

        <?php
            $data_baner_utama = array();
            $ambil = $koneksi->query("SELECT * FROM baner_utama");
            while($pecah = $ambil->fetch_assoc()){
                $data_baner_utama[] = $pecah;
            }
            ?>

            <div class="col-md-9 mt-2">
                <!-- Carousel start -->
                <?php if (!empty($data_baner_utama)): ?>
                    <div id="carouselExampleCaptions" class="carousel slide mb-4">
                        <div class="carousel-indicators">
                            <?php for ($i = 0; $i < count($data_baner_utama); $i++): ?>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" <?php echo ($i == 0) ? 'class="active" aria-current="true"' : ''; ?> aria-label="Slide <?php echo $i + 1; ?>"></button>
                            <?php endfor; ?>
                        </div>
                        <div class="carousel-inner">
                            <?php foreach ($data_baner_utama as $key => $baner): ?>
                                <div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">
                                    <img src="admin/images/banner/<?php echo $baner['gambar_banner_utama']; ?>" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                <?php else: ?>
                    <!-- Tampilkan pesan atau tindakan alternatif ketika tidak ada data baner_utama -->
                    <p>Tidak ada data untuk ditampilkan.</p>
                <?php endif; ?>
                <!-- Carousel end -->
           
            


            <!-- Produk -->
            <h4 class="text-center font-weight-bold m-4 text-dark" id="produk">Produk Terbaru</h4>
			<?php


            if(isset($_GET['idkategori'])){

                $id_kategori = $_GET['idkategori'];

                $ambil = $koneksi->query("SELECT * FROM produk_penjual
                INNER JOIN produk ON produk_penjual.id_produk = produk.id_produk
                INNER JOIN penjual ON produk_penjual.id_penjual = penjual.id_penjual
                INNER JOIN toko ON penjual.id_toko = toko.id_toko
                WHERE id_kategori = $id_kategori AND status_produk = 'valid';
                ");
    
                $data_produk = array();
                while($pecah = $ambil->fetch_assoc()){
                    $data_produk[] = $pecah;
                }
            }elseif(isset($_GET['idprodukkategori'])){

                $id_produk_kategori = $_GET['idprodukkategori'];
                $ambil = $koneksi->query("SELECT * FROM produk_penjual
                INNER JOIN produk ON produk_penjual.id_produk = produk.id_produk
                INNER JOIN penjual ON produk_penjual.id_penjual = penjual.id_penjual
                INNER JOIN toko ON penjual.id_toko = toko.id_toko
                WHERE id_produk_kategori = $id_produk_kategori  AND status_produk = 'valid';
                ");
    
                $data_produk = array();
                while($pecah = $ambil->fetch_assoc()){
                    $data_produk[] = $pecah;
                }

            }elseif(isset($_GET['keyword'])){

                $keyword = $_GET['keyword'];

                $ambil = $koneksi->query("SELECT * FROM produk_penjual
                INNER JOIN produk ON produk_penjual.id_produk = produk.id_produk
                INNER JOIN kategori ON produk.id_kategori = kategori.id_kategori
                INNER JOIN produk_kategori ON produk.id_produk_kategori = produk_kategori.id_produk_kategori
                INNER JOIN penjual ON produk_penjual.id_penjual = penjual.id_penjual
                INNER JOIN toko ON penjual.id_toko = toko.id_toko
                WHERE nama_kategori = '$keyword' OR  nama_kategori_produk = '$keyword' OR  nama_produk = '$keyword'  AND status_produk = 'valid';
                ");
    
                $data_produk = array();
                while($pecah = $ambil->fetch_assoc()){
                    $data_produk[] = $pecah;
                }

            }else{
                $ambil = $koneksi->query("SELECT * FROM produk_penjual
                INNER JOIN produk ON produk_penjual.id_produk = produk.id_produk
                INNER JOIN penjual ON produk_penjual.id_penjual = penjual.id_penjual
                INNER JOIN toko ON penjual.id_toko = toko.id_toko
                WHERE  status_produk = 'valid';
                ");
    
                $data_produk = array();
                while($pecah = $ambil->fetch_assoc()){
                    $data_produk[] = $pecah;
                }
            }
    
           
        ?>
            <div class="row row-cols-1 row-cols-sm-2">
                <?php foreach ($data_produk as $key => $values): ?>
                    <div class="card m-1" style="max-width: 485px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="penjual/images/produk/<?php echo $values['gambar_produk'] ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $values['nama_produk'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $values['nama_toko'] ?></h6>
                                    <h5 class="card-subtitle mb-2 text-muted text-center">Rp. <?php echo number_format($values['harga'], 0, ',', '.'); ?></h5>
                                    <div class="mt-2 d-flex align-items-center mb-0">
                                        <a href="detail_produk.php?id_produk=<?php echo $values['id_produk'] ?>" class="btn btn-primary me-2">Detail</a>
                            
                                        <a href="detail_produk.php?id_produk=<?php echo $values['id_produk'] ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Keranjang</a>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- Produk end -->

        </div>
    </div>
</div>


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
										<img src="assets/" alt="ig" class="img-fluid">
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