<h1 class="h3 mb-4 text-gray-800"> Tambah Data Kategori</h1>
<form action="" method="post" >
    <div class="card shadow">
        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_ongkir" class="form-control" placeholder="Nama ongkir" required>
                </div>
            </div>

            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Ongkir</label>
                <div class="col-sm-9">
                    <input type="number" name="ongkir" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?ongkir" class="btn btn-sm btn-danger">
                        <i class="fas fa-chevron-left"></i> Kembali
                    </a>
                </div>

                <div class="col text-right">
                    <button name="simpan" class="btn btn-sm btn-primary">
                        Simpan <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- queri tambah data kedalam database -->
<?php
    if(isset($_POST['simpan'])){
        $nama_ongkir = $_POST['nama_ongkir'];
        $ongkir = $_POST['ongkir'];
        // Ambil ID Penjual dari sesi 
         $id_penjual = isset($_SESSION['id_penjual']) ? $_SESSION['id_penjual'] : '';
        $result = $koneksi->query("INSERT INTO ongkir (id_penjual,jenis_pengiriman,jumlah_ongkir) VALUES ('$id_penjual','$nama_ongkir','$ongkir')");

        if ($result) {
            echo "<script>alert('Data Pengiriman Berhasil Ditambahkan');</script>";
            echo "<script>location='index.php?ongkir';</script>";
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $result . '<br>' . $conn->error . '</div>';
        }
    }
?>