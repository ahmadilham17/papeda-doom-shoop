<!-- mengambil data dari ketegori produk dari database -->
<?php

    $data_rekening = array();
    $ambil = $koneksi->query("SELECT * FROM bank_penjual
    WHERE id_penjual = $id_penjual");
    while($pecah = $ambil->fetch_assoc()){
        $data_rekening[] = $pecah;
    }
?>

<h1 class="h3 mb-4 text-gray-800">Data Rekening</h1>

<div class="card shadow">
    <div class="card-header py-3">
        <a href="index.php?tambah_bank" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bank</th>
                        <th>Nama</th>
                        <th>No Rekening</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data_rekening as $key => $values): ?>
                    
                    <tr>
                        <td width="50"><?php echo $key+1 ?></td>
                        <td> <?php echo $values['nama_bank'];?></td>
                        <td> <?php echo $values['nama_pengguna'];?></td>
                        <td> <?php echo $values['no_rekening'];?></td>
                        <td class="text-center" width="150">
                            <a href="index.php?edit_bank&id_bank=<?php echo $values['id_bank']; ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <a href="index.php?hapus_bank&id_bank=<?php echo $values['id_bank']; ?>"  onclick ="return confirm ('Yakin!');" class="btn btn-sm btn-danger ">
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