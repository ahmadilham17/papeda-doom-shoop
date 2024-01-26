<!-- mengambil data dari kategori dari database -->
<?php

// Ambil ID Pembeli dari sesi 
$id_pembeli = isset($_SESSION['id_pembeli']) ? $_SESSION['id_pembeli'] : '';

// tangkap id produk dari url
$invoice_no_toko = $_GET['invoice_no_toko'];
$id_penjual = $_GET['id_penjual'];

$data_pesanan = array();
$ambil = $koneksi->query("SELECT * FROM pesanan 
INNER JOIN ongkir ON pesanan.id_ongkir = ongkir.id_ongkir
WHERE id_pembeli = '$id_pembeli' AND id_penjual = '$id_penjual'  AND invoice_no_toko = '$invoice_no_toko'");
while ($pecah = $ambil->fetch_assoc()) {
    $data_pesanan[] = $pecah;
}

//ambil data rekening
$data_rekening = array();
$ambil = $koneksi->query("SELECT * FROM data_bank");
while ($pecah = $ambil->fetch_assoc()) {
    $data_rekening[] = $pecah;
}




// Inisialisasi variabel total
$total_pembayaran = 0;
$jumlah_ongkir = 0;

?>

<div class="shadow bg-white p-3 mt-3 mb-2 rounded">
<h4><strong>Detail Pesanan</strong></h4>
</div>

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Invoice no</th>
                        <th>nama</th>
                        <th>Qty</th>
                        <th>Warna</th>
                        <th>Ukuran</th>
                        <th>Tanggal Pesanan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_pesanan as $key => $values) : ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td style="color: orange;"><?php echo $values['invoice_no'] ?></td>
                            <td><?php echo $values['nama_produk'] ?></td>
                            <td><?php echo $values['jumlah_produk'] ?></td>
                            <td><?php echo $values['warna'] ?></td>
                            <td><?php echo $values['ukuran'] ?></td>
                            <td><?php echo $values['tanggal_pesanan'] ?></td>
                            <td>Rp. <?php echo number_format($values['subtotal'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php
                        // Menambahkan subtotal ke total_pembayaran
                        $total_pembayaran += $values['subtotal'];
                        $jumlah_ongkir += $values['jumlah_ongkir'];
                        ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer py-3 mt-2">
            <div class="row">
                <div class="col">
                    <a href="index.php?pesanan" class="btn btn-sm btn-danger">
                        <i class="fas fa-chevron-left"></i> Kembali
                    </a>
                </div>
                
                <div class="col text-right">
                    <?php foreach ($data_pesanan as $key => $values): ?>
                        <?php if($values['status']=='pending') : ?>
                            <a href="index.php?bayar&id_pembeli=id_produk=<?php echo $values['id_produk'] ?>&id_penjual=<?php echo $values['id_penjual'] ?>&invoice_no_toko=<?php echo $values['invoice_no_toko'] ?>" class="btn btn-sm btn-success">
                                <i class="fas fa-solid fa-money-bill"></i> Input Bayar
                            </a>
                            <?php break; ?>
                        <?php else : ?>
                            <a href="index.php?detail_bayar&id_pembeli=id_produk=<?php echo $values['id_produk'] ?>&id_penjual=<?php echo $values['id_penjual'] ?>&invoice_no_toko=<?php echo $values['invoice_no_toko'] ?>" class="btn btn-sm btn-info">
                                <i class="fas fa-solid fa-eye"></i> Pembayaran
                            </a>
                            <?php break; ?>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="alert alert-primary shadow mt-3">
    <p>
    <?php foreach ($data_pesanan as $key => $values) : ?>
        Jenis Pengiriman : <?php echo $values['jenis_pengiriman'] ?> <br>
        <?php break; ?>
    <?php endforeach ?>
        Jumlah Ongkir: Rp.<?php echo number_format($jumlah_ongkir); ?><br>
        Silakan melakukan Pembayaran <strong>Rp.<?php echo number_format($total_pembayaran + $jumlah_ongkir); ?></strong><br><br>
        <?php foreach ($data_rekening as $key => $values) : ?>
            <strong id="rekening<?php echo $key; ?>"><?php echo $values['nama_bank'] . ' : ' . $values['no_rekening'] . ' AN. ' . $values['nama_pengguna']; ?></strong><br> 
            <button class="btn btn-info btn-sm" onclick="copyToClipboard('rekening<?php echo $key; ?>')">Salin <?php echo $values['nama_bank']; ?></button><br>
        <?php endforeach ?>
    </p>
</div>

<script>
    function copyToClipboard(elementId) {
        // Mendapatkan nomor rekening dari teks
        var noRekText = document.getElementById(elementId).innerText;
        var noRekOnly = noRekText.split(' : ')[1].split(' AN. ')[0];

        // Membuat elemen textarea sementara untuk menyalin nomor rekening
        var copyText = document.createElement("textarea");
        copyText.value = noRekOnly;
        document.body.appendChild(copyText);

        // Memilih dan menyalin teks
        copyText.select();
        document.execCommand("copy");

        // Menghapus elemen textarea sementara
        document.body.removeChild(copyText);

        // Memberikan umpan balik kepada pengguna (opsional)
        alert("Nomor Rekening telah disalin!");
    }
</script>
