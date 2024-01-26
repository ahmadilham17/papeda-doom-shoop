<?php

$data_pesanan = array();
$ambil_pesanan = $koneksi->query("SELECT * FROM pesanan 
    INNER JOIN penjual ON pesanan.id_penjual = penjual.id_penjual
    INNER JOIN toko ON penjual.id_toko = toko.id_toko
    WHERE id_pembeli = $id_pembeli
    GROUP BY pesanan.invoice_no_toko
    ORDER BY pesanan.tanggal_pesanan DESC");
while($pecah_pesanan = $ambil_pesanan->fetch_assoc()){
    $data_pesanan[] = $pecah_pesanan;

    // Tambahkan logika untuk memproses status "barang diterima"
    if($pecah_pesanan['status'] == 'barang diterima') {
        // Ambil data dari pesanan
        $id_produk = $pecah_pesanan['id_produk'];
        $id_penjual = $pecah_pesanan['id_penjual'];
        $invoice_no_toko = $pecah_pesanan['invoice_no_toko'];
        $tanggal_pesanan = $pecah_pesanan['tanggal_pesanan'];

        // Insert data ke tabel riwayat_pesanan
        $koneksi->query("INSERT INTO riwayat_pesanan (id_produk, id_pembeli, id_penjual, id_ongkir, nama_produk, invoice_no, invoice_no_toko, warna, ukuran, jumlah_produk, subtotal, tanggal_pesanan, status)
                        VALUES ('$id_produk', '$id_pembeli', '$id_penjual', '{$pecah_pesanan['id_ongkir']}', '{$pecah_pesanan['nama_produk']}', '{$pecah_pesanan['invoice_no']}', '$invoice_no_toko', '{$pecah_pesanan['warna']}', '{$pecah_pesanan['ukuran']}', '{$pecah_pesanan['jumlah_produk']}', '{$pecah_pesanan['subtotal']}', '$tanggal_pesanan', 'barang diterima')");

        // Hapus data pesanan dengan status "barang diterima"
        $koneksi->query("DELETE FROM pesanan WHERE id_produk = '$id_produk' AND id_penjual = '$id_penjual' AND invoice_no_toko = '$invoice_no_toko' AND status = 'barang diterima'");
    }
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
                        <td width="250">
                            <a href="index.php?detail_pesanan&id_produk=<?php echo $values['id_produk'] ?>&id_penjual=<?php echo $values['id_penjual'] ?>&invoice_no_toko=<?php echo $values['invoice_no_toko'] ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> Lihat Pesanan
                            </a>

                            <?php if($values['status']=='pending') : ?>
                                    <a href="index.php?bayar&id_pembeli=<?php echo $values['id_pembeli'] ?>&id_penjual=<?php echo $values['id_penjual'] ?>&invoice_no_toko=<?php echo $values['invoice_no_toko'] ?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-solid fa-money-bill"></i>  Input Bayar
                                    </a>
                                
                                <?php else : ?>
                                    <a href="index.php?detail_bayar&id_pembeli=<?php echo $values['id_pembeli'] ?>&invoice_no_toko=<?php echo $values['invoice_no_toko'] ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-solid fa-eye"></i> Pembayaran
                                    </a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
