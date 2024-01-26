<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <?php

        
        // Periksa koneksi
        if ($koneksi->connect_error) {
            die("Koneksi database gagal: " .$koneksi->connect_error);
        }
        // Ambil ID_penjual dari sesi (sesuaikan dengan struktur sesi Anda)
        $id_penjual = isset($_SESSION['id_penjual']) ? $_SESSION['id_penjual'] : '';
        // Fungsi untuk mendapatkan jumlah data dari tabel
        function getJumlahData($koneksi, $table, $id_penjual) {
            $sql = "SELECT COUNT(*) as jumlah FROM $table 
            WHERE id_penjual = $id_penjual";
            $result = $koneksi->query($sql);
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['jumlah'];
            } else {
                return 0;
            }
        }
        

        // Mendapatkan jumlah data untuk masing-masing tabel
        $jumlahProduk = getJumlahData($koneksi, "produk_penjual", $id_penjual);
        $jumlahPesanan = getJumlahData($koneksi, "pesanan", $id_penjual); // Tambahkan ini

        // Tutup koneksi database
       $koneksi->close();
        ?>

        <!-- Earnings (Monthly) Card Example -->
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

                <div class="card-footer py-3">
                    <div class="row">
                        <div class="col text-right">
                                <a href="index.php?produk" class="text-primary">
                                    lihat <i class="fas fa-chevron-right"></i>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Pesanan Card Example -->
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
    </div>

</div>
