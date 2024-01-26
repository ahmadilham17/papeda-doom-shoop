<?php 
    $id_produk = $_GET['id_produk'];
?>

<h1 class="h3 mb-4 text-gray-800"> Tambah Warna</h1>
<form action="" method="post" >
    <div class="card shadow">
        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Nama warna</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_warna" class="form-control" placeholder="Nama warna">
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
        $nama_warna = $_POST['nama_warna'];

        $result = $koneksi->query("INSERT INTO warna (id_produk,nama_warna) VALUES ('$id_produk','$nama_warna')");

        if ($result) {
            echo "<script>alert('Data warna Berhasil Ditambahkan');</script>";
            echo "<script>location='index.php?detail_produk&id_produk=$id_produk';</script>";
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $result . '<br>' . $conn->error . '</div>';
        }
    }
?>