<div class="shadow bg-white p-3 mb-3 rounded">
<h4><strong>Edit Profile</strong></h4>
</div>

<?php 

    // menngambil data dari database
    $ambil = $koneksi->query("SELECT * FROM penjual WHERE id_penjual ='$id_penjual'");
    $pecah = $ambil->fetch_assoc();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_penjual" class="form-control" value="<?php echo $pecah['nama_penjual']; ?>">
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
                    <input type="text" name="alamat" class="form-control" value="<?php echo $pecah['alamat_penjual']; ?>">
                </div>
            </div>

            <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">
                <img src="images/profile/<?php echo $pecah['gambar_penjual']; ?>" class="img-responsive" width="100"><br>
                <input type="file" name="gambar_penjual">
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
    
</form>

<?php 
    if (isset($_POST['simpan'])) {
        // Tangkap data dari formulir
        $nama_penjual = $_POST['nama_penjual'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
    
        // Handling file upload
        $gambar_penjual = uniqid() . '_' . $_FILES['gambar_penjual']['name'];
        $tmp_gambar = $_FILES['gambar_penjual']['tmp_name'];
    
        // Periksa apakah file gambar diunggah
        if (!empty($gambar_penjual)) {
            // Tentukan lokasi penyimpanan gambar (misalnya, folder 'images/profile/')
            $lokasi_simpan = 'images/profile/' . $gambar_penjual;
    
            // Pindahkan file gambar ke lokasi penyimpanan
            move_uploaded_file($tmp_gambar, $lokasi_simpan);
    
            // Hapus foto lama jika ada
            if (!empty($pecah['gambar_penjual'])) {
                $lokasi_foto_lama = 'images/profile/' . $pecah['gambar_penjual'];
                if (file_exists($lokasi_foto_lama)) {
                    unlink($lokasi_foto_lama);
                }
            }
    
            // Update data penjual ke dalam tabel 'penjual' termasuk gambar
            $result = $koneksi->query("UPDATE penjual 
                                      SET nama_penjual = '$nama_penjual', 
                                          username = '$username', 
                                          email = '$email', 
                                          no_hp = '$no_hp', 
                                          alamat_penjual = '$alamat', 
                                          gambar_penjual = '$gambar_penjual' 
                                      WHERE id_penjual = '$id_penjual'");
        } else {
            // Jika tidak ada file gambar diunggah, hanya update data tanpa gambar
            $result = $koneksi->query("UPDATE penjual 
                                      SET nama_penjual = '$nama_penjual', 
                                          username = '$username', 
                                          email = '$email', 
                                          no_hp = '$no_hp', 
                                          alamat_penjual = '$alamat' 
                                      WHERE id_penjual = '$id_penjual'");
        }
    
        if ($result) {
            echo "<script>alert('Data penjual Berhasil Diedit');</script>";
            echo "<script>location='index.php?edit_profile';</script>";
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $koneksi->error . '</div>';
        }
    }
    
?>