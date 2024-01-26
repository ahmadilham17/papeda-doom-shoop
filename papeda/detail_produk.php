<?php
    // koneksi database
    include('config/koneksi.php');

    session_start();

    $id_produk = $_GET['id_produk'];

    //mengambil data poduk dan penjual   
    $ambil = $koneksi->query("SELECT * FROM produk_penjual
    INNER JOIN produk ON produk_penjual.id_produk = produk.id_produk
    INNER JOIN penjual ON produk_penjual.id_penjual = penjual.id_penjual
    INNER JOIN toko ON penjual.id_toko = toko.id_toko
    WHERE produk_penjual.id_produk = $id_produk");

    $data_produk = $ambil->fetch_assoc();

     // <!-- mengambil data kategori dari database -->
     $data_warna = array();
     $ambil1 = $koneksi->query("SELECT * FROM warna WHERE id_produk = $id_produk");
     while($pecah = $ambil1->fetch_assoc()){
         $data_warna[]= $pecah;
     }
 
 // <!-- mengambil data kategori produk dari database --> 
 
     $data_ukuran = array();
     $ambil2 = $koneksi->query("SELECT * FROM ukuran WHERE id_produk = $id_produk");
     while($pecah = $ambil2->fetch_assoc()){
         $data_ukuran[] = $pecah;
     }

     // <!-- mengambil data gambar produk dari database --> 
 
     $data_gambar = array();
     $ambil3 = $koneksi->query("SELECT * FROM gambar WHERE id_produk = $id_produk");
     while($pecah = $ambil3->fetch_assoc()){
         $data_gambar[] = $pecah;
     }


     $data_ulasan = array();
     $ambil4 = $koneksi->query("SELECT * FROM ulasan WHERE id_produk = $id_produk");
     while($pecah = $ambil4->fetch_assoc()){
         $data_ulasan[] = $pecah;
     }

        ?>
    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/style/main.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

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
					<li><a href="#">Shop</a></li>
					<li><a href="#">Tentang</a></li>
					<li>
                    <form class="d-flex" action="shop.php" method="get">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" required>
							<button class="btn btn-outline-success" type="submit">Cari</button>
						</form>
					</li>
				</ul>
			</div>
			<div class="icon-for-user">
				<a href="index.php?keranjang">
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
                                <a class="dropdown-item" href="index.php?profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
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
				<img src="assets/icons/menu.svg" alt="menu">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
	</header><!-- /header -->
	<main>
  
    <div class="container">
    <div class="shadow bg-white  p-3 mt-3 mb-2 rounded">
     <h2 class="card-title text-center text-dark m-2">Detail Produk</h2>
     </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <!-- Carousel Start -->
                <div class="border">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php foreach ($data_gambar as $key => $gambar): ?>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $key; ?>" <?php if ($key == 0) echo 'class="active"'; ?> aria-label="Slide <?php echo $key + 1; ?>"></button>
                            <?php endforeach; ?>
                        </div>
                        <div class="carousel-inner">
                            <?php foreach ($data_gambar as $key => $gambar): ?>
                                <div class="carousel-item <?php if ($key == 0) echo 'active'; ?>">
                                    <img src="penjual/images/produk/<?php echo $gambar['nama_gambar']; ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!-- Carousel End -->
            </div>

            <div class="col-md-6  mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $data_produk['nama_produk']; ?></h3>
                    <a href="pembeli/index.php?profile_toko&id_penjual=<?php echo $data_produk['id_penjual'];?>">
                        <p>Kunjungi toko <?php echo $data_produk['nama_toko'];?></p>
                    </a>
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <p class="form-control-static"><?php echo $data_produk['deskripsi']; ?></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Pilih Warna</label>
                            <div class="col-sm-9">
                                <select name="id_warna" class="form-control">
                                    <option selected disabled>Pilih Warna</option>
                                    <?php foreach ($data_warna as $warna): ?>
                                        <option value="<?php echo $warna['id_warna']; ?>"><?php echo $warna['nama_warna']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Pilih ukuran</label>
                            <div class="col-sm-9">
                                <select name="id_ukuran" class="form-control">
                                    <option selected disabled>Pilih ukuran</option>
                                    <?php foreach ($data_ukuran as $ukuran): ?>
                                        <option value="<?php echo $ukuran['id_ukuran']; ?>"><?php echo $ukuran['nama_ukuran']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- ... (atribut lain seperti warna, ukuran, jumlah, total, dll.) ... -->

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="Rp. <?php echo number_format($data_produk['harga'], 0, ',', '.'); ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Stok</label>
                            <div class="col-sm-9">
                                <p class="form-control-static">Tersisah <?php echo $data_produk['stok']; ?> Buah</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm-9">
                                <select name="jumlah_beli" id="jumlah_beli" class="form-control" onchange="hitungTotal()">
                                    <?php for ($i = 1; $i <= $data_produk['stok']; $i++): ?>
                                        <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Total</label>
                            <div class="col-sm-9">
                                <input type="text" name="total" id="total" class="form-control" value="Rp. <?php echo number_format($data_produk['harga'], 0, ',', '.'); ?>" readonly>
                            </div>
                        </div>

                        <input type="hidden" name="id_produk" value="<?php echo $data_produk['id_produk']; ?>">
                        <input type="hidden" name="harga" value="<?php echo $data_produk['harga']; ?>">

                        <button type="submit" class="btn btn-primary" name="tambah_ke_keranjang">
                            <i class="fas fa-shopping-cart"></i> Tambahkan ke Keranjang
                        </button>
                    </form>
                </div>
            </div>

            </div>
            
        </div>
    </div>



    <?php

    // Tambahkan data ke dalam tabel keranjang ketika tombol tambahkan ke keranjang ditekan
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah_ke_keranjang"])) {
       
        // Periksa apakah pengguna sudah login
        if (!isset($_SESSION['username'])) {
            // Pengguna belum login, tampilkan notifikasi alert dan arahkan ke halaman login
            $_SESSION['error_message'] = "Anda harus login untuk menambahkan produk ke keranjang.";
            echo '<script>alert("Anda harus login untuk menambahkan produk ke keranjang.");</script>';
            echo '<script>window.location.href = "login.php";</script>';
            exit();
        }



                // Ambil data dari formulir dan tambahkan ke dalam tabel keranjang
                $id_produk = $_POST['id_produk'];
                $harga = $_POST['harga'];
                $jumlah_beli = $_POST['jumlah_beli'];
                $total = $harga * $jumlah_beli;
                $id_warna = isset($_POST['id_warna']) ? $_POST['id_warna'] : null;  // Tambahkan validasi isset
                $id_ukuran = isset($_POST['id_ukuran']) ? $_POST['id_ukuran'] : null; // Tambahkan validasi isset

                // Pastikan pengguna sudah login dan dapatkan ID pengguna dari sesi
                $id_pembeli = $_SESSION['id_pembeli'];

                // Tambahkan data ke dalam tabel keranjang
                $query = "INSERT INTO keranjang (id_pembeli, id_produk, id_warna, id_ukuran, jumlah, total) 
                VALUES ('$id_pembeli', '$id_produk', '$id_warna', '$id_ukuran', '$jumlah_beli', '$total')";

                if ($koneksi->query($query)) {
                    echo "<script>alert('Data  Berhasil ditambahkan Keranjang');</script>";
                    echo "<script>location='keranjang.php';</script>";
                } else {
                    echo "Error: " . $query . "<br>" . $koneksi->error;
                }
    }



  
?>
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

<script>
    // Deklarasi fungsi untuk menghitung total dan format rupiah
    function hitungTotal() {
        var harga = <?php echo $data_produk['harga']; ?>;
        var jumlahBeli = document.getElementById('jumlah_beli').value;
        var total = harga * jumlahBeli;
        document.getElementById('total').value = formatRupiah(total);
    }

    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join('');
        var ribuan = reverse.match(/\d{1,3}/g);
        if (ribuan) {
            var result = ribuan.join('.').split('').reverse().join('');
            return 'Rp. ' + result;
        } else {
            return 'Rp. ' + angka; // Tambahkan penanganan jika ribuan tidak ditemukan
        }
    }

    // Pemanggilan hitungTotal saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
        hitungTotal();
    });
</script>



