<h1 class="h3 mb-4 text-gray-800"> Tambah Bank</h1>
<form action="" method="post" >
    <div class="card shadow">
        <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama Bank</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_bank" class="form-control" placeholder="Nama bank" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_pengguna" class="form-control" placeholder="Nama pengguna" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">No Rekening</label>
                <div class="col-sm-9">
                    <input type="number" name="nr" class="form-control" placeholder="No Rekening" required>
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

<!-- queri tambah data kedalam database -->
<?php
    if(isset($_POST['simpan'])){
        $nama_bank = $_POST['nama_bank'];
        $nama_pengguna = $_POST['nama_pengguna'];
        $nr = $_POST['nr'];

        $result = $koneksi->query("INSERT INTO data_bank (nama_bank,nama_pengguna,no_rekening) 
        VALUES ('$nama_bank','$nama_pengguna','$nr')");

        if ($result) {
            echo "<script>alert('Data Bank Berhasil Ditambahkan');</script>";
            echo "<script>location='index.php?rekening';</script>";
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $result . '<br>' . $conn->error . '</div>';
        }
    }
?>