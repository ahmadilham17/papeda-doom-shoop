
<?php
    // Ambil ID_Anggota dari sesi (sesuaikan dengan struktur sesi Anda)
    $id_penjual = isset($_SESSION['id_penjual']) ? $_SESSION['id_penjual'] : '';

    // <!-- mengambil data kategori dari database -->
    $data_kategori = array();
    $ambil = $koneksi->query("SELECT * FROM kategori");
    while($pecah = $ambil->fetch_assoc()){
        $data_kategori[] = $pecah;
    }

// <!-- mengambil data kategori produk dari database --> 

    $data_produk_kategori = array();
    $ambil = $koneksi->query("SELECT * FROM produk_kategori");
    while($pecah = $ambil->fetch_assoc()){
        $data_produk_kategori[] = $pecah;
    }
?>

<h1 class="h3 mb-4 text-gray-800"> Tambah Data  Produk</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow">
    <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Kategori</label>
                <div class="col-sm-9">
                    <select name="id_kategori" class="form-control">
                        <option selected disabled>Pilih Kategori</option>

                        <?php foreach ($data_kategori as $key => $values): ?>
                            <option value="<?php echo $values['id_kategori'];?>"> <?php echo $values['nama_kategori'];?> </option>
                        <?php endforeach ?>
                        
                    </select>
                </div>
            </div>
             </div>

            <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Kategori produk</label>
                <div class="col-sm-9">
                    <select name="id_produk_kategori" class="form-control">
                        <option selected disabled>Pilih Kategori Produk</option>

                        <?php foreach ($data_produk_kategori as $key => $values): ?>
                            <option value="<?php echo $values['id_produk_kategori'];?>"> <?php echo $values['nama_kategori_produk'];?> </option>
                        <?php endforeach ?>
                        
                    </select>
                </div>
            </div>
        </div>

        
        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Nama produk</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_produk" class="form-control" placeholder="Nama produk" required>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Harga produk</label>
                <div class="col-sm-9">
                    <input type="number" name="harga_produk" class="form-control" placeholder="Harga produk" required>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Warna produk</label>
                <div class="col-sm-9">
                   <div class="input-warna">
                    <input type="text" name="warna_produk[]" class="form-control" placeholder="Warna produk" required>
                   </div>
                   <span class="btn btn-sm btn-primary mt-1 btn-warna">
                    <i class="fas fa-plus"></i> Tambah Warna
                   </span>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Ukuran produk</label>
                <div class="col-sm-9">
                    
                <div class="input-ukuran">
                    <input type="text" name="ukuran_produk[]" class="form-control" placeholder="ukuran produk" required>
                   </div>
                   <span class="btn btn-sm btn-primary mt-1 btn-ukuran">
                    <i class="fas fa-plus"></i> Tambah ukuran
                   </span>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Deskrisi produk</label>
                <div class="col-sm-9">
                    <textarea  name="deskripsi_produk" class="form-control" placeholder="Deskripsi produk"></textarea>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Stok produk</label>
                <div class="col-sm-9">
                    <input type="number" name="stok_produk" class="form-control" placeholder="1" required>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-grup row">
                <label for="" class="col-sm-3 col-form-label">Foto Produk</label>
                <div class="col-sm-9">
                    <div class="input-foto">
                    <input type="file" name="foto_produk[]" class="form-control" required>
                   </div>
                   <span class="btn btn-sm btn-primary mt-1 btn-foto">
                    <i class="fas fa-plus"></i> Tambah foto
                   </span>
                </div>
            </div>
        </div>

        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?produk" class="btn btn-sm btn-danger">
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
    if(isset($_POST['simpan'])){
        // echo '<pre>';
        //     print_r($_POST['warna_produk']);
        //     print_r($_POST['ukuran_produk']);
        //     print_r($_FILES['foto_produk']);
        // echo '</pre>';
        // tangkap data dari method POST
        $id_kategori = $_POST['id_kategori'];
        $id_produk_kategori = $_POST['id_produk_kategori'];
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga_produk'];
        $warna = $_POST['warna_produk'];
        $ukuran = $_POST['ukuran_produk'];
        $deskripsi = $_POST['deskripsi_produk'];
        $stok = $_POST['stok_produk'];

        $nama_foto =  $_FILES['foto_produk']['name'];
        $lokasi_foto = $_FILES['foto_produk']['tmp_name'];

        move_uploaded_file($lokasi_foto[0],"images/produk/".$nama_foto[0]);

        //memasukan data kedalam tabel produk

        $koneksi->query("INSERT INTO produk (id_kategori,id_produk_kategori,nama_produk,deskripsi,gambar_produk,harga,stok,ukuran,warna)
        VALUES ('$id_kategori','$id_produk_kategori','$nama','$deskripsi','$nama_foto[0]','$harga','$stok','$ukuran[0]','$warna[0]')");
    
    
    $id_produk_baru = $koneksi->insert_id;
    //memasukan data kedalam produk_penjual
    $koneksi->query("INSERT INTO produk_penjual (id_produk,id_penjual) VALUES ('$id_produk_baru','$id_penjual')");
    
    //memasukan data kedalam tabel ukuran,warna,gambar
    foreach($ukuran as $key => $nama_ukuran){
        $koneksi->query("INSERT INTO ukuran (id_produk,nama_ukuran) VALUES ('$id_produk_baru','$nama_ukuran')");
    }

    foreach($warna as $key => $nama_warna){
        $koneksi->query("INSERT INTO warna (id_produk,nama_warna) VALUES ('$id_produk_baru','$nama_warna')");
    }
    
    foreach($nama_foto as $key => $namafoto){
        $lokasifoto = $lokasi_foto[$key];
        move_uploaded_file($lokasifoto,"images/produk/".$namafoto);

        $koneksi->query("INSERT INTO gambar (id_produk,nama_gambar) VALUES ('$id_produk_baru','$namafoto')");
    }

   
    echo "<script>alert('Data Produk Ditambahkan , produk akan di konfirmasi Admin');</script>";
    echo "<script>location='index.php?produk';</script>";
}
    
?>
