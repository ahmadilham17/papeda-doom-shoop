<?php
$id_produk = $_GET['id_produk']

?>
<h1 class="h3 mb-4 text-gray-800"> Tambah Foto Produk</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Foto Produk</label>
                <div class="col-sm-9">
                    <input type="file" name="foto_produk" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?detail_produk&id_produk=<?php echo $id_produk;?>" class="btn btn-sm btn-danger">
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
        $nama_foto =  uniqid() . '_' . $_FILES['foto_produk']['name'];
        $lokasi_foto = $_FILES['foto_produk']['tmp_name'];

        move_uploaded_file($lokasi_foto,"../assets/img/banner/banner_utama/" . $nama_foto);

        $koneksi->query("INSERT INTO gambar (id_produk,nama_gambar) VALUES ('$id_produk','$nama_foto')");

        echo "<script>alert('Data gambar Berhasil ditambahkan');</script>";
        echo "<script>location='index.php?detail_produk&id_produk=$id_produk';</script>";
    }
?>