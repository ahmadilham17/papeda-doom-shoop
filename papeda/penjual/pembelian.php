<!-- mengambil data dari ketegori dari database -->
<?php
$ambil = $koneksi->query("SELECT * FROM pesanan 
WHERE id_penjual = $id_penjual ");
$pecah = $ambil->fetch_assoc();

$invoice_no_toko  = $pecah['invoice_no_toko'];

$data_pesanan = array();
$ambil_pesanan = $koneksi->query("SELECT * FROM pesanan 
    INNER JOIN pembeli ON pesanan.id_pembeli = pembeli.id_pembeli
    WHERE id_penjual = $id_penjual 
    GROUP BY pembeli.id_pembeli AND invoice_no_toko = '$invoice_no_toko'
    ORDER BY pesanan.tanggal_pesanan DESC");
while($pecah_pesanan = $ambil_pesanan->fetch_assoc()){
    $data_pesanan[] = $pecah_pesanan;
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
                        <th>Invoice No Toko</th>
                        <th>Nama Pembeli</th>
                        <th>Tanggal Pembelian</th>
                        <th>status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data_pesanan as $key => $values): ?>
                    <tr>
                        <td width="50"><?php echo $key+1 ?></td>
                        <td><?php echo $values['invoice_no_toko'] ?></td>
                        <td><?php echo $values['nama_pembeli'] ?></td>
                        <td><?php echo $values['tanggal_pesanan'] ?></td>
                        <td style="color:red;"><?php echo $values['status'] ?></td>
                        <td class="text-center" width="150">
                            <a href="index.php?detail_pembelian&id_pembeli=<?php echo $values['id_pembeli'] ?>&invoice_no_toko=<?php echo $values['invoice_no_toko'] ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>