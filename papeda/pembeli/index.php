<!-- mengambil data dari produk dari database -->
<?php
    
// Pemeriksaan sesi
session_start();

if (!isset($_SESSION['username'])) {
    // Jika sesi tidak ada, redirect ke halaman login
    header("Location: ../login.php");
    exit();
}
	include('../config/koneksi.php');

	// Ambil ID Pembeli dari sesi 
    $id_pembeli = isset($_SESSION['id_pembeli']) ? $_SESSION['id_pembeli'] : '';

	// Menghitung jumlah produk di keranjang
	$ambil = $koneksi->query("SELECT id_pembeli, COUNT(*) as jumlah_produk
	FROM keranjang
	WHERE id_pembeli = '$id_pembeli'
	GROUP BY id_pembeli");

	// Memeriksa apakah ada data yang ditemukan
	$jumlah_produk = 0; // Inisialisasi jumlah_produk
	if ($ambil && $ambil->num_rows > 0) {
	$jumlah = $ambil->fetch_assoc();
	$jumlah_produk = $jumlah['jumlah_produk'];
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/style/main.css">
	<link rel="stylesheet" href="../assets/style/main.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/admin/vendor/fontawesome-free/css/all.min.css">

	<link href="../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="../assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
					<li><a href="index.php">Shop</a></li>
					<li>
                    <form class="d-flex" action="index.php" method="get">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" required>
							<button class="btn btn-outline-success" type="submit">Cari</button>
						</form>
					</li> 
				</ul>
			</div>
			<div class="icon-for-user">
				<a href="index.php?keranjang">
					<img src="../assets/icons/shop-bag.svg" alt="person"><?php echo $jumlah_produk; ?>
				</a>
			</div>
			<ul class="navbar-nav mr-2">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/icons/person.svg" alt="person">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="index.php?profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

								<a class="dropdown-item" href="index.php?pesanan">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Pesanan
                                </a>
                        
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
			<div class="menu">
				<img src="../assets/icons/menu.svg" alt="menu">
			</div>
		</nav>

		 <!-- Logout Modal-->
		 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
	</header><!-- /header -->
	<main>
		
		<!-- content start -->

		<?php
            //detail produk
            if(isset($_GET['detail_produk'])){
                include 'detail_produk.php';
            }
			//keranjang
            elseif(isset($_GET['keranjang'])){
                    include 'keranjang.php';
            }

            elseif(isset($_GET['hapus_keranjang'])){
				include 'hapus/hapus_keranjang.php';
			}

			//profile
			elseif(isset($_GET['profile'])){
				include 'profile.php';
		}
		//profile
		elseif(isset($_GET['hapus_profile'])){
			include 'hapus/hapus_profile.php';
		}
		//sub profile pesanan
		elseif(isset($_GET['pesanan'])){
			include 'profile.php';
		}
		// sub profile deatil pesanan
		elseif(isset($_GET['detail_pesanan'])){
			include 'profile.php';
		}

		//sub profie bayar
		elseif(isset($_GET['bayar'])){
			include 'profile.php';
		}

		//sub profie detail_bayar
		elseif(isset($_GET['detail_bayar'])){
			include 'profile.php';
		}

		//sub profile Edit profile
		elseif(isset($_GET['edit_profile'])){
			include 'profile.php';
		}
		//sub profile riwayat
		elseif(isset($_GET['riwayat'])){
			include 'profile.php';
		}
		//sub profile riwayat
		elseif(isset($_GET['detail_riwayat'])){
			include 'profile.php';
		}
		//sub profile riwayat
		elseif(isset($_GET['hapus_riwayat'])){
			include 'profile.php';
		}
		
		//profile tok
		elseif(isset($_GET['profile_toko'])){
			include 'profile_toko.php';
		}

			//produk
            else{
				include 'produk.php';
            }
        ?>



		<!-- content end -->

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
										<img src="assets/icons/instagram.png" alt="ig" class="img-fluid">
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
	<script src="../assets/script/index.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- Bootstrap core JavaScript-->
    <script src="../assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/admin/js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
     <script src="../assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/admin/js/demo/datatables-demo.js"></script>
	<script>
		AOS.init();
	</script>
</body>
</html>