<h1 class="h3 mb-4 text-gray-800"> Edit Data Bank</h1>


<?php 
    //tangkap id  dari url
    $id_bank = $_GET['id_bank'];

    // menngambil data dari database
    $ambil = $koneksi->query("SELECT * FROM bank_penjual WHERE id_bank ='$id_bank'");
    $pecah = $ambil->fetch_assoc();
?>

<form action="" method="post" >
    <div class="card shadow">
        <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Bank</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_bank" class="form-control" value="<?php echo $pecah['nama_bank']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama pengguna</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_pengguna" class="form-control" value="<?php echo $pecah['nama_pengguna']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama pengguna</label>
                <div class="col-sm-9">
                    <input type="text" name="nr" class="form-control" value="<?php echo $pecah['no_rekening']; ?>">
                </div>
            </div>
        </div>

        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?rekening" class="btn btn-sm btn-danger">
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
        //tangkap data  dari form
        $nama_bank = $_POST['nama_bank'];
        $nama_pengguna = $_POST['nama_pengguna'];
        $nr = $_POST['nr'];


        //update data nama kategori
       $result = $koneksi->query("UPDATE bank_penjual 
       SET 
       nama_bank = '$nama_bank',
       nama_pengguna = '$nama_pengguna',
       no_rekening ='$nr' 
       WHERE id_bank = '$id_bank'");
        
       if ($result) {
        echo "<script>alert('Data bank Berhasil Diedit');</script>";
        echo "<script>location='index.php?rekening';</script>";
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $conn->error . '</div>';
        }
        
    }
?>