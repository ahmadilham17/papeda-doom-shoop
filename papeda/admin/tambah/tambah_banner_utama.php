<h1 class="h3 mb-4 text-gray-800"> Tambah Data Banner</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Foto Banner Utama</label>
                <div class="col-sm-9">
                    <input type="file" name="foto_banner_utama" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?banner_utama" class="btn btn-sm btn-danger">
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
        $nama_foto = $_FILES['foto_banner_utama']['name'];
        $lokasi_foto = $_FILES['foto_banner_utama']['tmp_name'];

        move_uploaded_file($lokasi_foto,"images/banner/" . $nama_foto);

        $koneksi->query("INSERT INTO baner_utama (gambar_banner_utama) VALUES ('$nama_foto')");

        echo "<script>alert('Data Banner Berhasil ditambahkan');</script>";
        echo "<script>location='index.php?banner_utama';</script>";
    }
?>