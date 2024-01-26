<?php


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

        ?>
        
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
                                    <img src="../penjual/images/produk/<?php echo $gambar['nama_gambar']; ?>" class="d-block w-100" alt="...">
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

            <div class="col-md-6 mb-3">
            <div class="card shadow ">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $data_produk['nama_produk']; ?></h3>
                    <a href="index.php?profile_toko&id_penjual=<?php echo $data_produk['id_penjual'];?>">
                        <p>Kunjungi toko <?php echo $data_produk['nama_toko'];?></p>
                    </a>
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <p class="form-control"><?php echo $data_produk['deskripsi']; ?></p>
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
                            <label for="" class="col-sm-3 col-form-label">Pilih Jumlah</label>
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
        echo '<script>window.location.href = "admin/login.php";</script>';
        exit();
    }

    // Ambil data dari formulir
    $id_produk = $_POST['id_produk'];
    $harga = $_POST['harga'];
    $jumlah_beli = $_POST['jumlah_beli'];
    $total = $harga * $jumlah_beli;
    $id_warna = isset($_POST['id_warna']) ? $_POST['id_warna'] : null;
    $id_ukuran = isset($_POST['id_ukuran']) ? $_POST['id_ukuran'] : null;

    // Pastikan pengguna sudah login dan dapatkan ID pengguna dari sesi
    $id_pembeli = $_SESSION['id_pembeli'];
    $id_penjual = $data_produk['id_penjual'];
    $gambar_produk = $gambar['nama_gambar'];

    // Tambahkan validasi untuk memeriksa apakah warna dan ukuran telah dipilih
    if ($id_warna === null || $id_ukuran === null) {
        // Jika tidak, tampilkan notifikasi dan hentikan eksekusi
        echo "<script>alert('Pilih warna dan ukuran terlebih dahulu.');</script>";
        echo "<script>location='index.php?detail_produk&id_produk=$id_produk';</script>";
        exit();
    }

    // Tambahkan data ke dalam tabel keranjang
    $query = "INSERT INTO keranjang (id_pembeli, id_produk, id_warna, id_ukuran, id_penjual, gambar_produk, jumlah, total) 
              VALUES ('$id_pembeli', '$id_produk', '$id_warna', '$id_ukuran', '$id_penjual', '$gambar_produk', '$jumlah_beli', '$total')";

    if ($koneksi->query($query)) {
        echo "<script>alert('Data Berhasil ditambahkan Ke Keranjang');</script>";
        echo "<script>location='index.php?keranjang';</script>";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}



?>

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



