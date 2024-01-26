<?php 
    // Ambil ID_penjual dari sesi (sesuaikan dengan struktur sesi Anda)
     $id_penjual = isset($_SESSION['id_penjual']) ? $_SESSION['id_penjual'] : '';
     //  mengambil data penjual,toko,rekening dari database 
     $data_penjual = array();
     $ambil = $koneksi->query("SELECT * FROM penjual 
     WHERE id_penjual = $id_penjual");
    
    $values = $ambil->fetch_assoc();
  
    
?>


<h1 class="h3 mb-4 text-gray-800">Profile Pemilik</h1>

<form action="" method="post" enctype="multipart/form-data">
<div class="card shadow mb-2">
    <div class="card-body">
    <center><h3 class="h3 mb-4 text-gray-800"> Data Pemilik</h3></center>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value ="<?php echo $values['nama_penjual'] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value ="<?php echo $values['email'] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">No Handphone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value ="<?php echo $values['no_hp'] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value ="<?php echo $values['alamat_penjual'] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-9">
                    <img src="images/profile/<?php echo $values['gambar_penjual'] ?>" class="img-responsive" width="150">
                </div>
            </div>
    </div>
</div>

<div class="card-footer py-3">
    <div class="row">
        <div class="col">
            <a href="#" class="btn btn-sm btn-danger">
                <i class="fas fa-chevron-left"></i> Kembali
            </a>
        </div>

        <div class="col text-right">
            <a href="index.php?edit_profile" class="btn btn-sm btn-primary">
                Edit Profile <i class="fas fa-chevron-right"></i>
            </a>
        </div>
    </div>
</div>
</div>
  
    </div>
</form>