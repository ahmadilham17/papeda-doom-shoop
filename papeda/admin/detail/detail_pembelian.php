<!-- mengambil data dari kategori dari database -->
<?php

// Ambil ID Pembeli dari sesi 
$id_penjual = $_GET['id_penjual'];

$id_pembeli = $_GET['id_pembeli'];
$invoice_no_toko = $_GET['invoice_no_toko'];

$data_pesanan = array();
$ambil = $koneksi->query("SELECT * FROM pesanan 
INNER JOIN ongkir ON pesanan.id_ongkir = ongkir.id_ongkir
WHERE id_pembeli = '$id_pembeli' AND id_penjual = '$id_penjual' AND invoice_no_toko = '$invoice_no_toko'");
while ($pecah = $ambil->fetch_assoc()) {
    $data_pesanan[] = $pecah;
}

$ambil = $koneksi->query("SELECT * FROM transaksi 
WHERE id_pembeli = $id_pembeli AND invoice_no_toko = '$invoice_no_toko'");
$pecah = $ambil->fetch_assoc();

if(empty($pecah)){
    echo "<script>alert('Belum ada data Pembayaran');</script>";
    echo "<script>location='index.php?pembelian';</script>";
}
//ambil data rekening
$data_rekening = array();
$ambil = $koneksi->query("SELECT * FROM data_bank");
while ($pecah = $ambil->fetch_assoc()) {
    $data_rekening[] = $pecah;
}

$ambil = $koneksi->query("SELECT * FROM transaksi WHERE id_pembeli = $id_pembeli");
    $pecah = $ambil->fetch_assoc();

$ambil = $koneksi->query("SELECT * FROM pembeli WHERE id_pembeli = $id_pembeli");
$pembeli= $ambil->fetch_assoc();



// Inisialisasi variabel total
$total_pembayaran = 0;
$jumlah_ongkir = 0;

?>
<div class="shadow bg-white p-3 mt-3 mb-2 rounded">
<h4><strong>Detail Pesanan</strong></h4>
</div>


<!-- detai pembayaran -->
<div class="shadow bg-white p-3 mt-3 mb-2 rounded">
<h5><strong>Data Pembeli</strong></h5>
</div>
<div class="shadow bg-white p-3 mb-3 rounded">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Nama:</label>
            <div class="col-sm-9">
                <input type="text" name="int" class="form-control" value="<?php echo $pembeli['nama_pembeli']; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Email:</label>
            <div class="col-sm-9">
                <input type="text" name="int" class="form-control" value="<?php echo $pembeli['email']; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" >No Telepon:</label>
            <div class="col-sm-9">
                <input type="text" name="int" class="form-control" value="<?php echo $pembeli['no_hp']; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Alamat:</label>
            <div class="col-sm-9">
                <input type="text" name="int" class="form-control" value="<?php echo $pembeli['alamat']; ?>" readonly>
            </div>
        </div>
        </div>


<!-- detail barang -->

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
    </div>
</div>

<div class="alert alert-primary shadow mt-3">
    <p>
    <?php foreach ($data_pesanan as $key => $values) : ?>
        Jenis Pengiriman : <?php echo $values['jenis_pengiriman'] ?> <br>
        <?php break; ?>
    <?php endforeach ?>
        Jumlah Ongkir: Rp.<?php echo number_format($jumlah_ongkir); ?><br>
       <strong> Total : Rp.<?php echo number_format($total_pembayaran + $jumlah_ongkir); ?></strong>
    </p>
</div>

<div class="alert alert-primary shadow text-dark rounded mt-2 p-2">
    <p>Total Tagihan <?php echo number_format($pecah['total_harga']);?> </p>
</div>
<div class="shadow bg-white  p-3 mt-3 mb-2 rounded">
    <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>No invoice Toko</th>
                            <td> <?php echo $pecah['invoice_no_toko'];?></td>
                        </tr>

                        <tr>
                            <th>Nama</th>
                            <td> <?php echo $pecah['nama'];?></td>
                        </tr>

                        <tr>
                            <th>Bank</th>
                            <td> <?php echo $pecah['nama_bank'];?></td>
                        </tr>

                        <tr>
                            <th>Total</th>
                            <td>Rp.<?php echo number_format($pecah['total_harga']);?></td>
                        </tr>

                        <tr>
                            <th>Tanggal Bayar</th>
                            <td> <?php echo $pecah['tanggal_transaksi'];?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <label for=""><strong>Bukti Pemabayaran :</strong></label>
                <img src="../pembeli/images/bayar/<?php echo $pecah['bukti'];?>" width="250" class="img-responsive img-thumbnail">
            </div>
    </div>
</div>


<form action="" method="post">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Status:</label>
            <div class="col-sm-9">
            <select name="status" class="form-control">
                    <option selected disabled>Pilih Status</option>
                    <option value="pembayaran dikonfirmasi">Pembayaran Dikonfirmasi</option>
                    
            </select>
            </div>
        </div>

        <button name= "kirim" class="btn btn-primary btn-sm">Update status</button>
        </form>
<div class="card-footer py-3 mt-2">
            <div class="row">
                <div class="col">
                    <a href="index.php?pembelian" class="btn btn-sm btn-danger">
                        <i class="fas fa-chevron-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

<?php
if(isset($_POST['kirim'])){
    $status = $_POST['status'];

    $koneksi->query("UPDATE pesanan SET status = '$status'
    WHERE id_penjual = '$id_penjual' AND id_pembeli ='$id_pembeli'  AND invoice_no_toko ='$invoice_no_toko'
    ");

echo "<script>alert('Status Berhasil diUpdate');</script>";
echo "<script>location='index.php?pembelian';</script>";
}
?>