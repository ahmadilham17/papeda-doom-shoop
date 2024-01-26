<?php
    // Ambil ID Pembeli dari sesi 
$id_pembeli = isset($_SESSION['id_pembeli']) ? $_SESSION['id_pembeli'] : '';

$id_penjual = $_GET['id_penjual'];
$invoice_no_toko = $_GET['invoice_no_toko'];

// untuk mengambil data jumlah total
$data_pesanan = array();
$ambil = $koneksi->query("SELECT * FROM pesanan 
INNER JOIN ongkir ON pesanan.id_ongkir = ongkir.id_ongkir
WHERE id_pembeli = '$id_pembeli' AND id_penjual = '$id_penjual'AND invoice_no_toko = '$invoice_no_toko'");
while ($pecah = $ambil->fetch_assoc()) {
    $data_pesanan[] = $pecah;
}

//ambil data rekening untuk metode pembayaran
$data_rekening = array();
$ambil = $koneksi->query("SELECT * FROM data_bank");
while ($pecah = $ambil->fetch_assoc()) {
    $data_rekening[] = $pecah;
}

?>
<?php
    $total_pembayaran = 0;
    $jumlah_ongkir = 0;
?>
<?php foreach ($data_pesanan as $key => $values) : ?>
                        <?php
                        // Menambahkan subtotal ke total_pembayaran
                        $total_pembayaran += $values['subtotal'];
                        $jumlah_ongkir += $values['jumlah_ongkir'];
                        ?>
             <?php endforeach ?>

<div class="shadow bg-white  p-3 mt-3 mb-2 rounded">
<h4><strong>Pembayaran</strong></h4>
</div>

<div class="alert alert-primary shadow">
    <p><strong>Total Tagihan : Rp.<?php echo number_format($total_pembayaran + $jumlah_ongkir); ?> </strong></p>
</div>

<div class="shadow bg-white p-3 mb-3 rounded">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" >invoice no toko:</label>
            <div class="col-sm-9">
                <input type="text" name="int" class="form-control" value="<?php echo $data_pesanan[0]['invoice_no_toko']; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Nama:</label>
            <div class="col-sm-9">
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap Anda" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Bank:</label>
            <div class="col-sm-9">
            <select name="nama_bank" class="form-control">
                    <option selected disabled>Pilih Metode Pembayaran</option>
                    <?php foreach ($data_rekening as $rekening): ?>
                        <option value="<?php echo $rekening['nama_bank']; ?>"><?php echo $rekening['nama_bank']; ?></option>
                    <?php endforeach; ?>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Jumlah:</label>
            <div class="col-sm-9">
                <input type="text" name="jumlah" class="form-control" value="<?php echo $total_pembayaran + $jumlah_ongkir; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Bukti Pembayaran:</label>
            <div class="col-sm-9">
                <input type="file"  name="bukti" require>
            </div>
        </div>

        <div class="card-footer py-3 mt-2">
            <div class="row">
                <div class="col">
                    <a href="index.php?pesanan" class="btn btn-sm btn-danger">
                        <i class="fas fa-chevron-left"></i> Kembali
                    </a>
                </div>

                <div class="col text-right">
                    <button class="btn btn-sm btn-primary" name="kirim">
                         Kirim <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <?php

    if(isset($_POST['kirim'])){
        $int = $_POST['int'];
        $nama = $_POST['nama'];
        $nama_bank = $_POST['nama_bank'];
        $jumlah = $_POST['jumlah'];
        $tgl = date('Y-m-d H:i:s'); // Dapatkan tanggal dan waktu saat ini


        $nama_bukti = $_FILES['bukti']['name'];
        $lokasi_bukti = $_FILES['bukti']['tmp_name'];

        $tgl_bukti = rand(10000,99999).$nama_bukti;

        move_uploaded_file($lokasi_bukti,'images/bayar/'.$tgl_bukti);

        $koneksi->query("INSERT INTO transaksi (id_pembeli,invoice_no_toko,tanggal_transaksi,nama,nama_bank,total_harga,bukti)
        VALUES ('$id_pembeli','$int','$tgl','$nama','$nama_bank','$jumlah','$tgl_bukti')");


        $koneksi->query("UPDATE pesanan SET status = 'sedang diproses' 
        WHERE id_pembeli =' $id_pembeli' AND id_penjual = '$id_penjual' AND invoice_no_toko = '$invoice_no_toko'");


        echo "<script>alert('Data Pembayaran Berhasil ditambahkan');</script>";
        echo "<script>location='index.php?pesanan';</script>";

    }
?>

</div>
 