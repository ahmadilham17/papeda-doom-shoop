<h1 class="h3 mb-4 text-gray-800"> Edit Data  Produk</h1>

<?php 
    // mengambil data dari url
    $id_produk = $_GET['id_produk'];
    $id_warna = $_GET['id_warna'];
    $id_ukuran = $_GET['id_ukuran'];
    $id_gambar = $_GET['id_gambar'];

    //mengambil data kategori
    $data_kategori = array();
    $ambil = $koneksi->query("SELECT * FROM kategori");
    while($pecah = $ambil->fetch_assoc()){
        $data_kategori[] = $pecah;
    }

    //mengambil data produk kategori
    $data_produk_kategori = array();
    $ambil = $koneksi->query("SELECT * FROM produk_kategori");
    while($pecah = $ambil->fetch_assoc()){
        $data_produk_kategori[] = $pecah;
    }

    //mengambil data warna
    $data_warna = array();
    $ambil = $koneksi->query("SELECT * FROM warna WHERE id_produk ='$id_produk'");
    while($pecah = $ambil->fetch_assoc()){
        $data_warna[] = $pecah;
    }

    //mengambil data ukuran
    $data_ukuran = array();
    $ambil = $koneksi->query("SELECT * FROM ukuran WHERE id_produk ='$id_produk'");
    while($pecah = $ambil->fetch_assoc()){
        $data_ukuran[] = $pecah;
    }

    //mengambil data gambar
    $data_gambar = array();
    $ambil = $koneksi->query("SELECT * FROM gambar WHERE id_produk ='$id_produk'");
    while($pecah = $ambil->fetch_assoc()){
        $data_gambar[] = $pecah;
    }


    //mengambil data produk
    $ambil = $koneksi->query("SELECT * FROM produk 
        JOIN kategori ON produk.id_kategori = kategori.id_kategori
        JOIN produk_kategori ON produk.id_produk_kategori = produk_kategori.id_produk_kategori
        WHERE id_produk = '$id_produk'
    ");

    $produk = $ambil->fetch_assoc();

    // echo '<pre>';
    //     print_r($produk);
    // echo '</pre>';
    

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow">
    <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Kategori</label>
                <div class="col-sm-9">
                    <select name="id_kategori" class="form-control">
                        <option value="<?php echo $produk['id_kategori'] ?>"><?php echo $produk['nama_kategori'] ?> </option>

                        <?php foreach ($data_kategori as $key => $values): ?>
                            <option value="<?php echo $values['id_kategori'] ?>"><?php echo $values['nama_kategori'] ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Kategori Produk</label>
                <div class="col-sm-9">
                    <select name="id_kategori_produk" class="form-control">
                     <option value="<?php echo $produk['id_produk_kategori'] ?>"><?php echo $produk['nama_kategori_produk'] ?> </option>

                        <?php foreach ($data_produk_kategori as $key => $values): ?>
                            <option value="<?php echo $values['id_produk_kategori'] ?>"><?php echo $values['nama_kategori_produk'] ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

        <div class="form-group row">
             <label for="" class="col-sm-3 col-form-label">Nama produk</label>
            <div class="col-sm-9">
                 <input type="text" name="nama_produk" class="form-control"value="<?php echo $produk['nama_produk'] ?>">
            </div>
        </div>
       

         <div class="form-group row">
             <label for="" class="col-sm-3 col-form-label">Harga produk</label>
            <div class="col-sm-9">
                <input type="number" name="harga_produk" class="form-control" value="<?php echo $produk['harga'] ?>">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Warna produk</label>
            <div class="col-sm-9">
                 <input type="text" name="warna_produk" class="form-control"value="<?php echo $produk['warna'] ?>">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Ukuran produk</label>
            <div class="col-sm-9">
                  <input type="text" name="ukuran_produk" class="form-control"value="<?php echo $produk['ukuran'] ?>">
            </div>
        </div>
       
         <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Deskrisi produk</label>
            <div class="col-sm-9">
                <textarea  name="deskripsi_produk" class="form-control"><?php echo $produk['deskripsi'] ?></textarea>
            </div>
        </div>
       
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Stok produk</label>
            <div class="col-sm-9">
                <input type="number" name="stok_produk" class="form-control" value="<?php echo $produk['stok'] ?>">
            </div>
        </div>
       
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Foto Produk</label>
            <div class="col-sm-9">
                <img src="images/produk/<?php echo $produk['gambar_produk'] ?>" class="img-renponsive" width="150">
                <input type="file" name="foto_produk" class="form-control">
            </div>
        </div>
        
    </div>

        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?detail_produk&id_produk=<?php echo $id_produk ?>" class="btn btn-sm btn-danger">
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

    <!-- tabel untuk add warna -->
    <div class="card shadow mt-3">
        <div class="card-header">
            <a href="index.php?tambah_warna&id_produk=<?php echo $produk['id_produk'] ?>" class="btn btn-sm btn-primary">
                <i fas fa-plus></i> Tambah Warna
            </a>
        </div>
        <div class="card-body">
            <div class="table-renposive">
                <table class="table table-bordered" id ="dataTable" width="100%"  cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Warna</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                        <?php foreach ($data_warna as $key => $values): ?>
                            <td width="50"><?php echo $key+1 ?></td>
                            <td><?php echo $values['nama_warna'] ?></td>
                            <td class="text-center" width="100">
                                <a href="index.php?hapus_warna&id_warna=<?php echo $values['id_warna'] ?>&id_produk=<?php echo $produk['id_produk'] ?>" class="btn btn-sm btn-danger">
                                    <i fas fa-trash></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <!-- tabel untuk add ukuran -->
    <div class="card shadow mt-3">
        <div class="card-header">
            <a href="index.php?tambah_ukuran&id_produk=<?php echo $produk['id_produk'] ?>" class="btn btn-sm btn-primary">
                <i fas fa-plus></i> Tambah Ukuran
            </a>
        </div>
        <div class="card-body">
            <div class="table-renposive">
                <table class="table table-bordered" id ="dataTable" width="100%"  cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Ukuran</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                        <?php foreach ($data_ukuran as $key => $values): ?>
                            <td width="50"><?php echo $key+1 ?></td>
                            <td><?php echo $values['nama_ukuran'] ?></td>
                            <td class="text-center" width="100">
                                <a href="index.php?hapus_ukuran&id_ukuran=<?php echo $values['id_ukuran'] ?>&id_produk=<?php echo $produk['id_produk'] ?>" class="btn btn-sm btn-danger">
                                    <i fas fa-trash></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- tabel untuk add Gambar -->
    <div class="card shadow mt-3">
        <div class="card-header">
            <a href="index.php?tambah_gambar&id_produk=<?php echo $produk['id_produk'] ?>" class="btn btn-sm btn-primary">
                <i fas fa-plus></i> Tambah Gambar
            </a>
        </div>
        <div class="card-body">
            <div class="table-renposive">
                <table class="table table-bordered" id ="dataTable" width="100%"  cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <?php foreach ($data_gambar as $key => $values): ?>
                            <td width="50"><?php echo $key+1 ?></td>
                            <td>
                                <img src="images/produk/<?php echo $values['nama_gambar'] ?>" class="img-responsive" width="150">
                            </td>
                            <td class="text-center" width="100">
                                <a href="index.php?hapus_gambar&id_gambar=<?php echo $values['id_gambar'] ?>&id_produk=<?php echo $produk['id_produk'] ?>" class="btn btn-sm btn-danger">
                                    <i fas fa-trash></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>

<?php 
    if (isset($_POST['simpan'])){
        //tangkap nama kategori dari form
        $id_kategori = $_POST['id_kategori'];
        $id_produk_kategori = $_POST['id_kategori_produk'];
        $nama_produk = $_POST['nama_produk'];
        $harga_produk = $_POST['harga_produk'];
        $warna_produk = $_POST['warna_produk'];
        $ukuran_produk = $_POST['ukuran_produk'];
        $stok_produk = $_POST['stok_produk'];
        $deskripsi_produk = $_POST['deskripsi_produk'];

        $nama_foto =  uniqid() . '_' . $_FILES['foto_produk']['name'];
        $lokasi_foto = $_FILES['foto_produk']['tmp_name'];

        //jika foto di ubah
        if(!empty($lokasi_foto)){

             move_uploaded_file($lokasi_foto,"images/produk/" . $nama_foto);

             $koneksi->query("UPDATE produk SET
             id_kategori = '$id_kategori',
             id_produk_kategori = '$id_produk_kategori',
             nama_produk = '$nama_produk',
             harga = '$harga_produk',
             warna = '$warna_produk',
             ukuran = '$ukuran_produk',
             deskripsi = '$deskripsi_produk',
             stok = $stok_produk ,
             gambar_produk = '$nama_foto'

             WHERE id_produk = '$id_produk'");
        }

        //jika foto tidak di ubah
        else{
            $koneksi->query("UPDATE produk SET
            id_kategori = '$id_kategori',
            id_produk_kategori = '$id_produk_kategori',
            nama_produk = '$nama_produk',
            harga = '$harga_produk',
            warna = '$warna_produk',
            ukuran = '$ukuran_produk',
            deskripsi = '$deskripsi_produk',
            stok = $stok_produk 

            WHERE id_produk = '$id_produk'");
        }

    //edit data warna

    $warnaProduk = $_POST['warna_produk'];

    $koneksi->query("UPDATE warna SET
    id_produk = '$id_produk',
    nama_warna = '$warnaProduk'

    WHERE id_warna  = '$id_warna'
    ");

    //edit data ukuran

    $ukuranProduk = $_POST['ukuran_produk'];

    $koneksi->query("UPDATE ukuran SET
    id_produk = '$id_produk',
    nama_ukuran = '$ukuranProduk'
    
    WHERE id_ukuran = '$id_ukuran'
    ");

    //edit data gambar

    $namaFoto =  uniqid() . '_' . $_FILES['foto_produk']['name'];
    $lokasiFoto = $_FILES['foto_produk']['tmp_name'];
    //jika gambar di ubah
    if(!empty($lokasiFoto)){

        move_uploaded_file($lokasiFoto,"images/produk/" . $namaFoto);

    $koneksi->query("UPDATE gambar SET
    id_produk = '$id_produk',
    nama_gambar = '$namaFoto'
    
    WHERE id_gambar = '$id_gambar'
    ");

    } 

    //jika tidak di ubah
    else{
        $koneksi->query("UPDATE gambar SET
        id_produk = '$id_produk'
        WHERE id_gambar = '$id_gambar'
        ");
    }

        echo "<script>alert('Data produk Berhasil update');</script>";
        echo "<script>location='index.php?detail_produk&id_produk=$id_produk';</script>";
    }
?>
