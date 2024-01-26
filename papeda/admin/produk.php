<!-- mengambil data dari produk dari database -->
<?php

    
    $ambil = $koneksi->query("SELECT * FROM produk_penjual
     INNER JOIN produk ON produk_penjual.id_produk = produk.id_produk
     INNER JOIN penjual ON produk_penjual.id_penjual = penjual.id_penjual
     INNER JOIN toko ON penjual.id_toko = toko.id_toko
     WHERE status_produk = 'invalid';
     ");

    $data_produk = array();
    while($pecah = $ambil->fetch_assoc()){
        $data_produk[] = $pecah;
    }
?>
<h1 class="h3 mb-4 text-gray-800">Data Produk</h1>

<div class="card shadow">
    <div class="card-header py-3">
        <a href="index.php?tambah_produk" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto produk</th>
                        <th>Nama Penjual</th>
                        <th>Toko</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_produk as $key => $values): ?>
                        <tr>
                            <td width="50"><?php echo $key+1 ?></td>
                            <td>
                                <img src="../penjual/images/produk/<?php echo $values['gambar_produk'] ?>" alt="" class="img-renponsive" width="150">
                            </td>
                            <td><?php echo $values['nama_penjual'] ?></td>
                            <td><?php echo $values['nama_toko'] ?></td>
                            <td><?php echo $values['nama_produk'] ?> </td>
                            <td>Rp.<?php echo $values['harga'] ?></td>
                            <td class="text-center" width="170">
                                <a href="index.php?detail_produk&id_produk=<?php echo $values['id_produk'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Detail
                                </a>

                                <a href="index.php?hapus_produk&id_produk=<?php echo $values['id_produk']; ?>" onclick="return confirm('Yakin!');" class="btn btn-sm btn-danger">
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