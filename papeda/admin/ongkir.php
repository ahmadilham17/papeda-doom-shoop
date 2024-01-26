
<!-- mengambil data dari ketegori dari database -->
<?php

    $data_ongkir = array();
    $ambil = $koneksi->query("SELECT * FROM ongkir" );
    while($pecah = $ambil->fetch_assoc()){
        $data_ongkir[] = $pecah;
    }
?>


<h1 class="h3 mb-4 text-gray-800">Data ongkir</h1>
<div class="card shadow">
    <div class="card-header py-3">
        <a href="index.php?tambah_ongkir" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>ongkir</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_ongkir as $key => $values): ?>
                    
                    <tr>
                        <td width="50"><?php echo $key+1 ?></td>
                        <td> <?php echo $values['jenis_pengiriman'];?></td>
                        <td>Rp.<?php echo number_format($values['jumlah_ongkir']);?></td>
                        <td class="text-center" width="150">
                            <a href="index.php?edit_ongkir&id_ongkir=<?php echo $values['id_ongkir']; ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <a href="index.php?hapus_ongkir&id_ongkir=<?php echo $values['id_ongkir']; ?>" class="btn btn-sm btn-danger">
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