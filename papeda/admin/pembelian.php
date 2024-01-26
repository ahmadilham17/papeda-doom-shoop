<!-- mengambil data dari ketegori dari database -->
<?php

    $data_pembelian = array();
    $ambil = $koneksi->query("SELECT * FROM pesanan");
    while($pecah = $ambil->fetch_assoc()){
        $data_pembelian[] = $pecah;
    }
?>


<h1 class="h3 mb-4 text-gray-800">Data Pembelian</h1>

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Invoice No</th>
                        <th>Nama Produk</th>
                        <th>Tanggal Pembelian</th>
                        <th>Total</th>
                        <th>status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data_pembelian as $key => $values): ?>
                    <tr>
                        <td width="50"><?php echo $key+1 ?></td>
                        <td><?php echo $values['invoice_no'] ?></td>
                        <td><?php echo $values['nama_produk'] ?></td>
                        <td><?php echo $values['tanggal_pesanan'] ?></td>
                        <td><?php echo $values['subtotal'] ?></td>
                        <td style="color:red;"><?php echo $values['status'] ?></td>
                        <td class="text-center" width="170">
                            <a href="index.php?detail_pembelian&id_pembeli=<?php echo $values['id_pembeli']?>&id_penjual=<?php echo $values['id_penjual']?>&invoice_no_toko=<?php echo $values['invoice_no_toko'] ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> Detail
                            </a>

                            <a href="index.php?hapus_pembelian&id_pesanan=<?php echo $values['id_pesanan'] ?>" class="btn btn-sm btn-danger">
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