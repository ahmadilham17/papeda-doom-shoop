<!-- mengambil data dari Banner dari database -->
<?php
    $ambil = $koneksi->query("SELECT * FROM pembeli");

    $data_pelanggan = array();
    while($pecah = $ambil->fetch_assoc()){
        $data_pelanggan[] = $pecah;
    }
?>
<h1 class="h3 mb-4 text-gray-800">Data Pelanggan</h1>

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>No telepon</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_pelanggan as $key => $values): ?>
                        <tr>
                            <td width="50"><?php echo $key+1 ?></td>
                            <td><?php echo $values['nama_pembeli'] ?></td>
                            <td><?php echo $values['email'] ?></td>
                            <td>
                                <img src="../pembeli/images/profile/<?php echo $values['gambar_pembeli'] ?>" alt="" class="img-renponsive" width="100">
                            </td>
                            <td><?php echo $values['no_hp'] ?></td>
                            <td><?php echo $values['alamat'] ?></td>
                            <td class="text-center" width="100">
                                <a href="index.php?hapus_pembelil&id_pembeli=<?php echo $values['id_pembeli'] ?>" class="btn btn-sm btn-danger">
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