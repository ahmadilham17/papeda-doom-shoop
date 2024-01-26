<?php
$data_pesanan = array();
$ambil_pesanan = $koneksi->query("SELECT * FROM riwayat_pesanan 
INNER JOIN penjual ON riwayat_pesanan.id_penjual = penjual.id_penjual
INNER JOIN toko ON penjual.id_toko = toko.id_toko
WHERE id_pembeli = $id_pembeli
GROUP BY riwayat_pesanan.invoice_no_toko
ORDER BY riwayat_pesanan.tanggal_pesanan DESC");
while($pecah_pesanan = $ambil_pesanan->fetch_assoc()){
    $data_pesanan[] = $pecah_pesanan;
}

?>

<div class="shadow bg-white  p-3 mt-3 mb-2 rounded">
<h4><strong>Data Pesanan</strong></h4>
</div>
<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                            <th>No</th>
                            <th>Invoice no</th>
                            <th>Toko</th>
                            <th>Tanggal Pesanan</th>
                            <th>Status</th>
                            <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_pesanan as $key => $values): ?>
                    <tr>
                        <td><?php echo $key+1 ?></td>
                        <td style="color:orange;"><?php echo $values['invoice_no_toko'] ?></td>
                        <td><?php echo $values['nama_toko'] ?></td>
                        <td><?php echo $values['tanggal_pesanan'] ?></td>
                        <td style="color:red;"><?php echo $values['status'] ?></td>
                        <td width="180">
                            <a href="index.php?detail_riwayat&id_produk=<?php echo $values['id_produk'] ?>&id_penjual=<?php echo $values['id_penjual'] ?>&invoice_no_toko=<?php echo $values['invoice_no_toko'] ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                                    <a href="index.php?bayar&id_pembeli=<?php echo $values['id_pembeli'] ?>&id_penjual=<?php echo $values['id_penjual'] ?>&invoice_no_toko=<?php echo $values['invoice_no_toko'] ?>" class="btn btn-sm btn-danger">
                                        <i class="fas fa-solid fa-money-bill"></i>  Hapus
                                    </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
