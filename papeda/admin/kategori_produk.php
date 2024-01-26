<!-- mengambil data dari ketegori produk dari database -->
<?php

    $data_kategori = array();
    $ambil = $koneksi->query("SELECT * FROM produk_kategori");
    while($pecah = $ambil->fetch_assoc()){
        $data_kategori[] = $pecah;
    }
?>

<h1 class="h3 mb-4 text-gray-800">Data Produk Kategori</h1>

<div class="card shadow">
    <div class="card-header py-3">
        <a href="index.php?tambah_produk_kategori" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk Kategori</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data_kategori as $key => $values): ?>
                    
                    <tr>
                        <td width="50"><?php echo $key+1 ?></td>
                        <td> <?php echo $values['nama_kategori_produk'];?></td>
                        <td class="text-center" width="150">
                            <a href="index.php?edit_produk_kategori&id_kategori_produk=<?php echo $values['id_produk_kategori']; ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <a href="index.php?hapus_produk_kategori&id_kategori_produk=<?php echo $values['id_produk_kategori']; ?>" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>