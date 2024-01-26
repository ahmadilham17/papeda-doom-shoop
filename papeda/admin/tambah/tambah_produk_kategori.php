<h1 class="h3 mb-4 text-gray-800"> Tambah Data Kategori Produk</h1>

<form action="" method="post" >
    <div class="card shadow">
        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Nama produk Kategori</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_kategori_produk" class="form-control" placeholder="Nama Kategori" required>
                </div>
            </div>
        </div>

        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?kategori_produk" class="btn btn-sm btn-danger">
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
        $nama_produk_kategori = $_POST['nama_kategori_produk'];

        $result = $koneksi->query("INSERT INTO produk_kategori (nama_kategori_produk) VALUES ('$nama_produk_kategori')");

        if ($result) {
            echo "<script>alert('Data Kategori Berhasil Ditambahkan');</script>";
            echo "<script>location='index.php?kategori_produk';</script>";
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $result . '<br>' . $conn->error . '</div>';
        }
    }
?>