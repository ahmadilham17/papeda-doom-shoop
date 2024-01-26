<?php 
    //tangkap id produk dari parameter url
    $id_produk = $_GET['id_produk'];

     //  mengambil data warna dari database 
     $data_warna = array();
     $ambil1 = $koneksi->query("SELECT * FROM warna WHERE id_produk = $id_produk");
     while($pecah = $ambil1->fetch_assoc()){
         $data_warna[]= $pecah;
     }
  
    //  mengambil data ukuran produk dari database  
 
     $data_ukuran = array();
     $ambil2 = $koneksi->query("SELECT * FROM ukuran WHERE id_produk = $id_produk");
     while($pecah = $ambil2->fetch_assoc()){
         $data_ukuran[] = $pecah;
     }

     //  mengambil data gambar produk dari database  
 
     $data_gambar = array();
     $ambil3 = $koneksi->query("SELECT * FROM gambar WHERE id_produk = $id_produk");
     while($pecah = $ambil3->fetch_assoc()){
         $data_gambar[] = $pecah;
     }

    //mengambil data produk
    $ambil = $koneksi->query("SELECT * FROM produk 
        JOIN kategori ON produk.id_kategori = kategori.id_kategori
        JOIN produk_kategori ON produk.id_produk_kategori = produk_kategori.id_produk_kategori
        WHERE id_produk = '$id_produk'
    ");

    $produk = $ambil->fetch_assoc();

    //  mengambil data warna dari database 
    $ambil1 = $koneksi->query("SELECT * FROM warna WHERE id_produk = $id_produk");
    $warna = $ambil1->fetch_assoc();

    //  mengambil data ukuran dari database 
    $ambil2 = $koneksi->query("SELECT * FROM ukuran WHERE id_produk = $id_produk");
    $ukuran = $ambil2->fetch_assoc();

    //  mengambil data ukuran dari database 
    $ambil3 = $koneksi->query("SELECT * FROM gambar WHERE id_produk = $id_produk");
    $gambar = $ambil3->fetch_assoc();



    // echo "<prev>";
    // print_r($produk);
    // echo "</prev>";
?>


<h1 class="h3 mb-4 text-gray-800"> Detail Data  Produk</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow">
    <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Kategori</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value ="<?php echo $produk['nama_kategori'] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Kategori Produk</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value ="<?php echo $produk['nama_kategori_produk'] ?> " readonly>
                </div>
            </div>
        


        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Nama produk</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" value ="<?php echo $produk['nama_produk'] ?> " readonly>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Harga produk</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value ="<?php echo $produk['harga'] ?> " readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Deskrisi produk</label>
            <div class="col-sm-9">
                <textarea  name="deskripsi_produk" class="form-control" readonly><?php echo $produk['deskripsi'] ?> </textarea>
            </div>
        </div>
        
         <div class="form-group row">
             <label for="" class="col-sm-3 col-form-label">Stok produk</label>
            <div class="col-sm-9">
                   <input type="number" name="stok_produk" class="form-control" value="<?php echo $produk['stok'] ?>" readonly>
             </div>
        </div>
        
         <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Warna produk</label>
            <div class="col-sm-9">
                <div class="row">
                    <?php foreach ($data_warna as $key => $warna): ?>
                        <div class="col">
                            <input type="text" class="form-control" value ="<?php echo $warna['nama_warna'] ?> " readonly>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        
        <div class="form-group row">
             <label for="" class="col-sm-3 col-form-label">Ukuran produk</label>
             <div class="col-sm-9">
                <div class="row">
                        <?php foreach ($data_ukuran as $key => $ukuran): ?>
                            <div class="col">
                                <input type="text" class="form-control" value ="<?php echo $ukuran['nama_ukuran'] ?> " readonly>
                            </div>
                        <?php endforeach ?>
                    </div>
            </div>
        </div>
       
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Foto Produk</label>
            <div class="col-sm-9">
            <div class="row">
                        <?php foreach ($data_gambar as $key => $gambar): ?>
                            <div class="col">
                                <img src="images/produk/<?php echo $gambar['nama_gambar'] ?>" class="img-responsive" width="150 ">
                            </div>
                        <?php endforeach ?>
                    </div>
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
                    <a href="index.php?edit_produk&id_produk=<?php echo $produk['id_produk'] ?>&id_warna=<?php echo $warna['id_warna'] ?>&id_ukuran=<?php echo $ukuran['id_ukuran'] ?>&id_gambar=<?php echo $gambar['id_gambar'] ?>" class="btn btn-sm btn-primary">
                        Edit Produk <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>