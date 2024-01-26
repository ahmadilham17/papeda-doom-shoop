<!-- mengambil data dari Banner dari database -->
<?php
    $ambil = $koneksi->query("SELECT * FROM penjual");

    $data_penjual = array();
    while($pecah = $ambil->fetch_assoc()){
        $data_penjual[] = $pecah;
    }
?>
<h1 class="h3 mb-4 text-gray-800">Data Penjual</h1>

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
                    <?php foreach ($data_penjual as $key => $values): ?>
                        <tr>
                            <td width="50"><?php echo $key+1 ?></td>
                            <td><?php echo $values['nama_penjual'] ?></td>
                            <td><?php echo $values['email'] ?></td>
                            <td>
                                <img src="../penjual/images/profile/<?php echo $values['gambar_penjual'] ?>" alt="" class="img-renponsive" width="100">
                            </td>
                            <td><?php echo $values['no_hp'] ?></td>
                            <td><?php echo $values['alamat_penjual'] ?></td>
                            <td class="text-center" width="100">
                                <a href="index.php?hapus_penjual&id_penjual=<?php echo $values['id_penjual'] ?>" class="btn btn-sm btn-danger">
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