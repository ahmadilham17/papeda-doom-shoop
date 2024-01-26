<?php
        //ambil data dari keranjang
        $data_keranjang = array();
        $ambil_keranjang = $koneksi->query("SELECT * FROM keranjang 
            INNER JOIN produk ON keranjang.id_produk = produk.id_produk
            INNER JOIN warna ON keranjang.id_warna = warna.id_warna
            INNER JOIN ukuran ON keranjang.id_ukuran = ukuran.id_ukuran
            WHERE id_pembeli = $id_pembeli");

        while ($pecah = $ambil_keranjang->fetch_assoc()) {
            $data_keranjang[] = $pecah;
        }

$data_pengiriman = array();
$ambil_pengiriman = $koneksi->query("SELECT * FROM ongkir");

while ($pecah = $ambil_pengiriman->fetch_assoc()) {
    $data_pengiriman[] = $pecah;
}

// Menghitung jumlah produk di keranjang
$ambil = $koneksi->query("SELECT id_pembeli, COUNT(*) as jumlah_produk
                          FROM keranjang
                          WHERE id_pembeli = '$id_pembeli'
                          GROUP BY id_pembeli");

?>

<div class="container mt-3 mb-3">
    <div class="shadow p-3 mt-3 mb-3">
    <h4><strong>Keranjang Belanja</strong></h4>
    <?php
    // Memeriksa apakah ada data yang ditemukan
    if ($ambil && $ambil->num_rows > 0) {
        $jumlah = $ambil->fetch_assoc();
        echo "<p>Anda mempunyai {$jumlah['jumlah_produk']} item di dalam keranjang</p>";
    } else {
        // Tidak ada data ditemukan, mengatur jumlah menjadi 0
        $jumlah_produk = 0;
        echo "<p>Anda mempunyai $jumlah_produk item di dalam keranjang</p>";
    }
    ?>
    </div>
    <div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                            <th>No</th>
                            <th>foto</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Inisialisasi variabel total
                $total_pembelian = 0;

                foreach ($data_keranjang as $key => $values):
                    $subtotal = $values['total'];
                    $total_pembelian += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo $key+1 ?></td>
                        <td>
                            <img src="../penjual/images/produk/<?php echo $values['gambar_produk'];?>" class="img-responsive" width="100">
                        </td>
                        <td><?php echo $values['nama_produk'];?></td>
                        <td><?php echo $values['jumlah'];?></td>
                        <td>Rp.<?php echo number_format($subtotal);?></td>
                        <td class="text-center" width="50">
                            <a href="index.php?hapus_keranjang&id_keranjang=<?php echo $values['id_keranjang'];?>" onclick="return confirm('Yakin?');" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
                <p><b>Total: Rp.<?php echo number_format ($total_pembelian); ?></b></p>
                <form  action="" method="post" >
                <div class="form-group row mt-2">
                            <label for="" class="col-sm-3 col-form-label">Pilih Pengiriman</label>
                            <div class="col-sm-9">
                                <select name="id_ongkir" class="form-control" >
                                    <option selected disabled>Pilih Pengiriman</option>
                                    <?php foreach ($data_pengiriman as $pengiriman): ?>
                                        <option value="<?php echo $pengiriman['id_ongkir']; ?>">Rp.<?php echo number_format($pengiriman['jumlah_ongkir']) .' - '. $pengiriman['jenis_pengiriman']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                </div>
        </div>
        <div class="card-footer py-3">
                    <div class="row">
                        <div class="col">
                            <a href="index.php?produk" class="btn btn-sm btn-danger">
                                <i class="fas fa-chevron-left"></i> Kembali Belanja
                            </a>
                        </div>

                        <div class="col text-right">
                                <button type="submit" name="checkout" class="btn btn-sm btn-warning">
                                    Check Out <i class="fas fa-chevron-right"></i>
                                </button>
                            </form>
                        </div>
                        </div>
                    </div>
    </div>
</div>
</div>

<?php


// Memeriksa apakah tabel keranjang kosong
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["checkout"])) {
    $ambil_keranjang = $koneksi->query("SELECT COUNT(*) as jumlah_produk
                                        FROM keranjang
                                        WHERE id_pembeli = '$id_pembeli'");
    
    $jumlah_produk_keranjang = $ambil_keranjang->fetch_assoc()['jumlah_produk'];

    if ($jumlah_produk_keranjang == 0) {
        echo "<script>alert('Keranjang kosong. Tidak dapat melakukan check-out.');</script>";
        echo "<script>location='index.php?produk';</script>";
        exit(); // Hentikan eksekusi skrip jika keranjang kosong
    }

    // Memeriksa apakah pengiriman telah dipilih
    $id_ongkir = isset($_POST['id_ongkir']) ? $_POST['id_ongkir'] : null;

    if ($id_ongkir === null) {
        echo "<script>alert('Pilih pengiriman terlebih dahulu.');</script>";
        echo "<script>location='index.php?keranjang';</script>";
        exit(); // Hentikan eksekusi skrip jika pengiriman belum dipilih
    }

    // Lakukan check-out
    foreach ($data_keranjang as $item) {
        // Ambil data untuk setiap item
        $id_produk = $item['id_produk'];
        $id_pembeli = $item['id_pembeli'];
        $nama_produk = $item['nama_produk'];
        $warna = $item['nama_warna'];
        $ukuran = $item['nama_ukuran'];
        $id_penjual = $item['id_penjual'];
        $jumlah_produk = $item['jumlah'];
        $subtotal = $item['total'];
        $tanggal_pesanan = date('Y-m-d H:i:s'); // Dapatkan tanggal dan waktu saat ini
        $status = "pending";  // Atur status pesanan sesuai kebutuhan Anda

        // Periksa stok produk
        $stok_produk = $item['stok'];
        if ($stok_produk >= $jumlah_produk) {
            // Kurangi stok produk
            $stok_produk -= $jumlah_produk;

            // Update stok produk di tabel produk
            $koneksi->query("UPDATE produk SET stok = $stok_produk WHERE id_produk = $id_produk");
        } else {
            // Jika stok tidak mencukupi, tampilkan pesan kesalahan
            echo "<script>alert('Stok produk tidak mencukupi untuk item dengan ID $id_produk.');</script>";
            echo "<script>location='index.php?keranjang';</script>";
            exit();
        }

        // Generate nomor invoice toko jika belum ada
        if (!isset($invoice_nos_toko[$id_penjual])) {
            $invoice_nos_toko[$id_penjual] = $id_penjual . mt_rand(10000000, 99999999) ;
        }
        $invoice_no_toko = $invoice_nos_toko[$id_penjual];

        // Generate nomor invoice secara acak untuk setiap produk
        $invoice_no = $id_produk . mt_rand(1000, 9999);

        // Masukkan data pesanan ke tabel "pesanan" dengan invoice_no dan invoice_no_toko yang sama
        $koneksi->query("INSERT INTO pesanan 
                        (id_produk, id_pembeli, nama_produk, invoice_no, invoice_no_toko, warna, ukuran, id_penjual,id_ongkir, jumlah_produk, subtotal, tanggal_pesanan, status)
                        VALUES ('$id_produk', '$id_pembeli', '$nama_produk', '$invoice_no', '$invoice_no_toko', '$warna', '$ukuran', '$id_penjual','$id_ongkir', '$jumlah_produk', '$subtotal', '$tanggal_pesanan', '$status')");
    
    }


    // Hapus data keranjang setelah pesanan berhasil dibuat
    $koneksi->query("DELETE FROM keranjang WHERE id_pembeli = '$id_pembeli'");
    
    // Redirect atau lakukan tindakan lanjutan setelah check-out berhasil
    echo "<script>alert('Data Berhasil ditambahkan');</script>";
    echo "<script>location='index.php?pesanan';</script>";
    exit(); // Penting untuk menghentikan eksekusi skrip setelah mengarahkan pengguna
}





?>
