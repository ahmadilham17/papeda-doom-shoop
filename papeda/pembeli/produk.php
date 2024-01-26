<?php
$ambil = $koneksi->query("SELECT * FROM produk_penjual
	INNER JOIN produk ON produk_penjual.id_produk = produk.id_produk
	INNER JOIN penjual ON produk_penjual.id_penjual = penjual.id_penjual;
	");

?>

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
                    <li class="list-group-item"><i class="fas fa-angle-right"></i><a href="index.php?idkategori=<?php echo $values['id_kategori'];?>" style="text-decoration: none;"> <?php echo $values['nama_kategori'];?></a></li>
                <?php endforeach ?>
                <li class="list-group-item"><i class="fas fa-angle-right"></i><a href="index.php" style="text-decoration: none; ">Semua Produk</a></li>

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
                    <li class="list-group-item"><i class="fas fa-angle-right"></i> <a href="index.php?idprodukkategori=<?php echo $values['id_produk_kategori'];?>" style="text-decoration: none; "><?php echo $values['nama_kategori_produk'];?></a></li>
                <?php endforeach ?>
                <li class="list-group-item"><i class="fas fa-angle-right"></i><a href="index.php" style="text-decoration: none; ">Semua Produk</a></li>

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
                                    <img src="../admin/images/banner/<?php echo $baner['gambar_banner_utama']; ?>" class="d-block w-100">
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
                WHERE id_kategori = $id_kategori  AND status_produk = 'valid';
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
                INNER JOIN toko ON penjual.id_toko = toko.id_toko  AND status_produk = 'valid';
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
                                <img src="../penjual/images/produk/<?php echo $values['gambar_produk'] ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $values['nama_produk'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $values['nama_toko'] ?></h6>
                                    <h5 class="card-subtitle mb-2 text-muted text-center">Rp. <?php echo number_format($values['harga'], 0, ',', '.'); ?></h5>
                                    <div class="mt-2 d-flex align-items-center mb-0">
                                        <a href="index.php?detail_produk&id_produk=<?php echo $values['id_produk'] ?>" class="btn btn-primary me-2">Detail</a>
                            
                                        <a href="index.php?detail_produk&id_produk=<?php echo $values['id_produk'] ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Keranjang</a>
    
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