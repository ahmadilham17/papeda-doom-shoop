<?php 
    //tangkap id produk dari parameter url
    $id_penjual = $_GET['id_penjual'];

     //  mengambil data penjual,toko,rekening dari database 
     $data_penjual = array();
     $ambil = $koneksi->query("SELECT * FROM penjual 
     INNER JOIN toko ON penjual.id_toko = toko.id_toko
     INNER JOIN data_bank ON penjual.id_data_bank = data_bank.id_data_bank
     WHERE id_penjual = $id_penjual");
    
    $values = $ambil->fetch_assoc();
  
    
?>


<h1 class="h3 mb-4 text-gray-800"> Detail Data TOKO</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow">
    <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value ="<?php echo $values['nama_toko'] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Pemilik Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value ="<?php echo $values['nama_penjual'] ?> " readonly>
                </div>
            </div>
        


        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Alamat Toko</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" value ="<?php echo $values['alamat_toko'] ?> " readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Deskrisi </label>
            <div class="col-sm-9">
                <textarea  name="deskripsi_toko" class="form-control" readonly><?php echo $values['deskrip_toko'] ?> </textarea>
            </div>
        </div>

         <h3 class="h3 mb-4 text-gray-800"> Data Bank</h3>
        
         <div class="form-group row">
             <label for="" class="col-sm-3 col-form-label">Nama Bank</label>
            <div class="col-sm-9">
                   <input type="text" name="nama_bank" class="form-control" value="<?php echo $values['nama_bank'] ?>" readonly>
             </div>
        </div>

        <div class="form-group row">
             <label for="" class="col-sm-3 col-form-label">Nama Pemilikk Bank</label>
            <div class="col-sm-9">
                   <input type="text" name="nama_bank" class="form-control" value="<?php echo $values['nama_pengguna'] ?>" readonly>
             </div>
        </div>

        <div class="form-group row">
             <label for="" class="col-sm-3 col-form-label">No Rekening</label>
            <div class="col-sm-9">
                   <input type="text" name="nama_bank" class="form-control" value="<?php echo $values['no_rekening'] ?>" readonly>
             </div>
        </div>
        
        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?toko" class="btn btn-sm btn-danger">
                        <i class="fas fa-chevron-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>