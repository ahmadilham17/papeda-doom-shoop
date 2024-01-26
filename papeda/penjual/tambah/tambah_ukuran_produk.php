<?php 
    $id_produk = $_GET['id_produk'];
?>

<h1 class="h3 mb-4 text-gray-800"> Tambah Ukuran</h1>
<form action="" method="post" >
    <div class="card shadow">
        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Nama Ukuran</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_ukuran" class="form-control" placeholder="Nama Ukuran">
                </div>
            </div>
        </div>

        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?detail_produk&id_produk=<?php echo $id_produk?>" class="btn btn-sm btn-danger">
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
        $nama_ukuran = $_POST['nama_ukuran'];

        $result = $koneksi->query("INSERT INTO ukuran (id_produk,nama_ukuran) VALUES ('$id_produk','$nama_ukuran')");

        if ($result) {
            echo "<script>alert('Data ukuran Berhasil Ditambahkan');</script>";
            echo "<script>location='index.php?detail_produk&id_produk=$id_produk';</script>";
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $result . '<br>' . $conn->error . '</div>';
        }
    }
?>