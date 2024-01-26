<?php
    $invoice_no_toko = $_GET['invoice_no_toko'];
    $ambil = $koneksi->query("SELECT * FROM transaksi 
    WHERE id_pembeli = $id_pembeli AND invoice_no_toko = '$invoice_no_toko'
    ORDER BY id_transaksi DESC");
    $pecah = $ambil->fetch_assoc();

    if(empty($pecah)){
        echo "<script>alert('Belum ada data Pembayaran');</script>";
        echo "<script>location='index.php?pesanan';</script>";
    }

    if($_SESSION['id_pembeli'] != $pecah['id_pembeli']){
        echo "<script>alert('Sesion tidak ditemukan');</script>";
        echo "<script>location='index.php?pesanan';</script>";
    }
?>



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
                <img src="images/bayar/<?php echo $pecah['bukti'];?>" width="250" class="img-responsive img-thumbnail">
            </div>
    </div>
</div>
<div class="card-footer py-3 mt-2">
            <div class="row">
                <div class="col">
                <a href="index.php?pesanan" class="btn btn-sm btn-danger">
                    <i class="fas fa-chevron-left"></i> Kembali
                </a>


                </div>
            </div>
        </div>
