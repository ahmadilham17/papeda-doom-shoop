<h1 class="h3 mb-4 text-gray-800"> Edit Data Banner</h1>


<?php 
    //tangkap id kategori dari url
    $id_banner_utama = $_GET['id_banner_utama'];

    // menngambil data dari database
    $ambil = $koneksi->query("SELECT * FROM baner_utama WHERE id_banner_utama ='$id_banner_utama'");
    $pecah = $ambil->fetch_assoc();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Foto Baner</label>
                <div class="col-sm-9">
                    <img src="../assets/img/banner/banner_utama/<?php echo $pecah['gambar_banner_utama'] ?>" class="img-renponsive mb-3" width="350" required>
                    <input type="file" name="foto_banner_utama" class="form-control">
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

<!-- queri update data -->
<?php
    if(isset($_POST['simpan'])){
        $nama_foto = $_FILES['foto_banner_utama']['name'];
        $lokasi_foto = $_FILES['foto_banner_utama']['tmp_name'];

        move_uploaded_file($lokasi_foto,"../assets/img/banner/banner_utama/" . $nama_foto);

        $koneksi->query("UPDATE baner_utama SET gambar_banner_utama ='$nama_foto' WHERE id_banner_utama ='$id_banner_utama'");

        echo "<script>alert('Data Banner Berhasil update');</script>";
        echo "<script>location='index.php?banner_utama';</script>";
    }
?>