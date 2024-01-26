<!-- mengambil data dari Banner dari database -->
<?php
    $ambil = $koneksi->query("SELECT * FROM penjual
    INNER JOIN toko ON penjual.id_toko = toko.id_toko
    ");

    $data_toko = array();
    while($pecah = $ambil->fetch_assoc()){
        $data_toko[] = $pecah;
    }
?>
<h1 class="h3 mb-4 text-gray-800">Data Toko</h1>

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_toko as $key => $values): ?>
                        <tr>
                            <td width="50"><?php echo $key+1 ?></td>
                            <td><?php echo $values['nama_toko'] ?></td>
                            <td class="text-center" width="100">
                                <a href="index.php?detail_toko&id_penjual=<?php echo $values['id_penjual'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Detail
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>