<h1 class="h3 mb-4 text-gray-800"> Edit Data Kategori Produk</h1>

<?php 
    //tangkap id kategori produk dari url
    $id_kategori_produk = $_GET['id_kategori_produk'];

    // menngambil data dari database
    $ambil = $koneksi->query("SELECT * FROM produk_kategori WHERE id_produk_kategori ='$id_kategori_produk'");
    $pecah = $ambil->fetch_assoc();
?>

<form action="" method="post" >
    <div class="card shadow">
        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Kategori poduk</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_kategori_produk" class="form-control" value="<?php echo $pecah['nama_kategori_produk']; ?>">
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

<?php 
    if (isset($_POST['simpan'])){
        //tangkap nama kategori dari form
        $nama_kategori_produk = $_POST['nama_kategori_produk'];

        //update data nama kategori
       $result = $koneksi->query("UPDATE produk_kategori SET nama_kategori_produk = '$nama_kategori_produk' WHERE id_produk_kategori = '$id_kategori_produk'");
        
       if ($result) {
        echo "<script>alert('Data Kategori produk Berhasil Diedit');</script>";
        echo "<script>location='index.php?kategori_produk';</script>";
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $conn->error . '</div>';
        }
        
    }
?>