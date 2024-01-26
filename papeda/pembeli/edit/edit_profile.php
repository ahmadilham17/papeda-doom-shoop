<div class="shadow bg-white p-3 mb-3 rounded">
<h4><strong>Edit Profile</strong></h4>
</div>

<?php 

    // menngambil data dari database
    $ambil = $koneksi->query("SELECT * FROM pembeli WHERE id_pembeli ='$id_pembeli'");
    $pecah = $ambil->fetch_assoc();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_pembeli" class="form-control" value="<?php echo $pecah['nama_pembeli']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" value="<?php echo $pecah['username']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" name="email" class="form-control" value="<?php echo $pecah['email']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">No Handphone</label>
                <div class="col-sm-9">
                    <input type="text" name="no_hp" class="form-control" value="<?php echo $pecah['no_hp']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <input type="text" name="alamat" class="form-control" value="<?php echo $pecah['alamat']; ?>">
                </div>
            </div>

            <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">
                <img src="images/profile/<?php echo $pecah['gambar_pembeli']; ?>" class="img-responsive" width="100"><br>
                <input type="file" name="gambar_pembeli">
            </div>
</div>

        </div>

        <div class="card-footer py-3">
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
    if (isset($_POST['simpan'])) {
        // Tangkap data dari formulir
        $nama_pembeli = $_POST['nama_pembeli'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
    
        // Handling file upload
        $gambar_pembeli = uniqid() . '_' . $_FILES['gambar_pembeli']['name'];
        $tmp_gambar = $_FILES['gambar_pembeli']['tmp_name'];
    
        // Periksa apakah file gambar diunggah
        if (!empty($gambar_pembeli)) {
            // Tentukan lokasi penyimpanan gambar (misalnya, folder 'images/profile/')
            $lokasi_simpan = 'images/profile/' . $gambar_pembeli;
    
            // Pindahkan file gambar ke lokasi penyimpanan
            move_uploaded_file($tmp_gambar, $lokasi_simpan);
    
            // Hapus foto lama jika ada
            if (!empty($pecah['gambar_pembeli'])) {
                $lokasi_foto_lama = 'images/profile/' . $pecah['gambar_pembeli'];
                if (file_exists($lokasi_foto_lama)) {
                    unlink($lokasi_foto_lama);
                }
            }
    
            // Update data pembeli ke dalam tabel 'pembeli' termasuk gambar
            $result = $koneksi->query("UPDATE pembeli 
                                      SET nama_pembeli = '$nama_pembeli', 
                                          username = '$username', 
                                          email = '$email', 
                                          no_hp = '$no_hp', 
                                          alamat = '$alamat', 
                                          gambar_pembeli = '$gambar_pembeli' 
                                      WHERE id_pembeli = '$id_pembeli'");
        } else {
            // Jika tidak ada file gambar diunggah, hanya update data tanpa gambar
            $result = $koneksi->query("UPDATE pembeli 
                                      SET nama_pembeli = '$nama_pembeli', 
                                          username = '$username', 
                                          email = '$email', 
                                          no_hp = '$no_hp', 
                                          alamat = '$alamat' 
                                      WHERE id_pembeli = '$id_pembeli'");
        }
    
        if ($result) {
            echo "<script>alert('Data Pembeli Berhasil Diedit');</script>";
            echo "<script>location='index.php?edit_profile';</script>";
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $koneksi->error . '</div>';
        }
    }
    
?>