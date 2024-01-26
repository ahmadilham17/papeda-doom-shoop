<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

    <?php

include '../config/koneksi.php';
// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Fungsi untuk mendapatkan jumlah data dari tabel
function getJumlahData($koneksi, $table)
{
    $sql = "SELECT COUNT(*) as jumlah FROM $table";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['jumlah'];
    } else {
        return 0;
    }
}

// Fungsi untuk mendapatkan jumlah produk dengan status "invalid"
function getJumlahProdukInvalid($koneksi)
{
    $sql = "SELECT COUNT(*) as jumlah FROM produk WHERE status_produk = 'invalid'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['jumlah'];
    } else {
        return 0;
    }
}

// Mendapatkan jumlah data untuk masing-masing tabel
$jumlahProduk = getJumlahData($koneksi, "produk");
$jumlahPembeli = getJumlahData($koneksi, "pembeli");
$jumlahinvalid = getJumlahProdukInvalid($koneksi, "produk");
$jumlahPenjual = getJumlahData($koneksi, "penjual");
$jumlahPesanan = getJumlahData($koneksi, "pesanan"); // Tambahkan ini

// Tutup koneksi database
$koneksi->close();
?>

        <!-- jumlah produk -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahProduk; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jumlah pembeli -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Pembeli</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahPembeli; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-3">
                    <div class="row">
                        <div class="col text-right">
                                <a href="index.php?pelanggan" class="text-success">
                                    lihat <i class="fas fa-chevron-right"></i>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jumlah penjual -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Penjual
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlahPenjual; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-3">
                    <div class="row">
                        <div class="col text-right">
                                <a href="index.php?penjual" class="text-primary">
                                    lihat <i class="fas fa-chevron-right"></i>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah pembelian Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Pembelian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahPesanan; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-3">
                    <div class="row">
                        <div class="col text-right">
                                <a href="index.php?pembelian" class="text-warning">
                                    lihat <i class="fas fa-chevron-right"></i>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Produk Invalid Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Jumlah Produk Invalid</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahinvalid; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
        <div class="card-footer py-3">
                    <div class="row">
                        <div class="col text-right">
                                <a href="index.php?produk" class="text-danger">
                                    lihat <i class="fas fa-chevron-right"></i>
                                </a>
                        </div>
                    </div>
                </div>
    </div>
</div>

    </div>

</div>
