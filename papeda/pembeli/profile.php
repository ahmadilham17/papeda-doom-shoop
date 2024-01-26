<!-- mengambil data dari produk dari database -->
<?php


$ambil = $koneksi->query("SELECT * FROM pembeli WHERE id_pembeli = $id_pembeli");
$data_pembeli = $ambil->fetch_assoc();

?>

<div class="row m-3 ">
    <div class="col-md-3 ">
        <div class="shadow card alert alert-info " style="width: 19rem;">
            <img src="images/profile/<?php echo $data_pembeli['gambar_pembeli']; ?>" class="card-img-top rounded-circle rounded mx-auto img-responsive p-3" width="100">
            <div class="card-body">
                <h5 class="card-title text-center"><strong>Nama : <?php echo $data_pembeli['nama_pembeli']; ?></strong></h5>
            </div>
            <ul class="list-group list-group-flush text-center ">
                <strong>
                <li class="list-group-item"><a href="index.php?pesanan" style=" text-decoration: none;">Pesanan</a></li>
                <li class="list-group-item"><a href="index.php?riwayat" style=" text-decoration: none;">Riwayat</a></li>
                <li class="list-group-item"><a href="index.php?edit_profile" style=" text-decoration: none;">Edit Profile</a></li>
                <li class="list-group-item"><a href="index.php?hapus_profile" onclick="return confirm('Hapus Akun,Yakin?');" style=" text-decoration: none;">Hapus Akun</a></li>
                <li class="list-group-item"><a href="../logout.php" onclick="return confirm('Logout?');" style=" text-decoration: none;">Logout</a></li>
                </strong>
            </ul>
            </div>
    </div>

    <div class="col-md-9 shadow">
        <?php
            //pesanan
            if(isset($_GET['pesanan'])){
                include 'pesanan.php';
            }

            //detail pesanan
            elseif(isset($_GET['detail_pesanan'])){
                include 'detail/detail_pesanan.php';
            }

            //bayar
            elseif(isset($_GET['bayar'])){
                include 'bayar.php';
            }

            
            //bayar
            elseif(isset($_GET['detail_bayar'])){
                include 'detail/detail_bayar.php';
            }
            //edit profile
            elseif(isset($_GET['edit_profile'])){
                include 'edit/edit_profile.php';
        }
            // riwayat
            elseif(isset($_GET['riwayat'])){
                    include 'riwayat.php';
            }
            // riwayat
            elseif(isset($_GET['detail_riwayat'])){
                include 'detail/detail_riwayat.php';
        }
        else {
           include 'detail/detail_profile.php';
        }

        ?>
        </div>
</div>


