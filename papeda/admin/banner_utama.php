<!-- mengambil data dari Banner dari database -->
<?php
    $ambil = $koneksi->query("SELECT * FROM baner_utama");

    $data_banner_utama = array();
    while($pecah = $ambil->fetch_assoc()){
        $data_banner_utama[] = $pecah;
    }
?>
<h1 class="h3 mb-4 text-gray-800">Data Banner Utama</h1>

<div class="card shadow">
    <div class="card-header py-3">
        <a href="index.php?tambah_banner_utama" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Banner</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_banner_utama as $key => $values): ?>
                        <tr>
                            <td width="50"><?php echo $key+1 ?></td>
                            <td>
                                <img src="images/banner/<?php echo $values['gambar_banner_utama'] ?>" alt="" class="img-renponsive" width="200">
                            </td>
                            <td class="text-center" width="170">
                                <a href="index.php?edit_banner_utama&id_banner_utama=<?php echo $values['id_banner_utama'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <a href="index.php?hapus_banner_utama&id_banner_utama=<?php echo $values['id_banner_utama'] ?>" class="btn btn-sm btn-danger">
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