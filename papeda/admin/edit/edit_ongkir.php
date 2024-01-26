<h1 class="h3 mb-4 text-gray-800"> Edit Data Pengiriman</h1>


<?php 
    //tangkap id  dari url
    $id_ongkir = $_GET['id_ongkir'];

    // menngambil data dari database
    $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir ='$id_ongkir'");
    $pecah = $ambil->fetch_assoc();
?>

<form action="" method="post" >
    <div class="card shadow">
        <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Pengiriman</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_ongkir" class="form-control" value="<?php echo $pecah['jenis_pengiriman']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Ongkir</label>
                <div class="col-sm-9">
                    <input type="number" name="ongkir" class="form-control" value="<?php echo $pecah['jumlah_ongkir']; ?>">
                </div>
            </div>
        </div>

        <div class="card-footer py-3">
            <div class="row">
                <div class="col">
                    <a href="index.php?ongkir" class="btn btn-sm btn-danger">
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
        $nama_ongkir = $_POST['nama_ongkir'];
        $ongkir = $_POST['ongkir'];


        //update data nama kategori
       $result = $koneksi->query("UPDATE ongkir 
       SET 
       jenis_pengiriman = '$nama_ongkir',
       jumlah_ongkir = '$ongkir' 
       WHERE id_ongkir = '$id_ongkir'");
        
       if ($result) {
        echo "<script>alert('Data Ongkir Berhasil Diedit');</script>";
        echo "<script>location='index.php?ongkir';</script>";
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $conn->error . '</div>';
        }
        
    }
?>