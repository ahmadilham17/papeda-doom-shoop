<?php
    $ambil = $koneksi->query("SELECT * FROM pembeli WHERE id_pembeli = $id_pembeli");
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



<div class="shadow bg-white p-3 mt-3 mb-2 rounded">
<h4><strong>Profile</strong></h4>
</div>
<div class="shadow bg-white  p-3 mt-3 mb-2 rounded">
    <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td> <?php echo $pecah['nama_pembeli'];?></td>
                        </tr>

                        <tr>
                            <th>Username</th>
                            <td> <?php echo $pecah['username'];?></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td> <?php echo $pecah['email'];?></td>
                        </tr>

                        <tr>
                            <th>No Telepon</th>
                            <td> <?php echo $pecah['no_hp'];?></td>
                        </tr>

                        <tr>
                            <th>Alamat</th>
                            <td> <?php echo $pecah['alamat'];?></td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <img src="images/profile/<?php echo $pecah['gambar_pembeli'];?>" width="250" class="img-responsive img-thumbnail">
            </div>
    </div>
</div>
