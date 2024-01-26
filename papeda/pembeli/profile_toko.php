<?php
$id_penjual = $_GET['id_penjual'];


$ambil = $koneksi->query("SELECT * FROM penjual
INNER JOIN toko ON penjual.id_toko = toko.id_toko
WHERE id_penjual = '$id_penjual'");

$toko = $ambil->fetch_assoc();

$id_penjual = $toko['id_penjual'];

$ambil = $koneksi->query("SELECT * FROM pembeli
WHERE id_pembeli = '$id_pembeli'");

$koment = $ambil->fetch_assoc();

$ambil = $koneksi->query("SELECT ulasan.komentar, pembeli.nama_pembeli FROM ulasan
INNER JOIN pembeli ON ulasan.id_pembeli = pembeli.id_pembeli
WHERE ulasan.id_penjual = '$id_penjual'");


$hasilkoment = array();
while($pecah = $ambil->fetch_assoc()){
    $hasilkoment []= $pecah;
}

?>


<!-- Page Wrapper -->
<div id="wrapper">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="shadow bg-white  p-3 mt-3 mb-2 rounded">
        <h4><strong>Profile Toko</strong></h4>
        </div>

            <!-- Data Toko -->
<div class="card mb-4">
    <div class="card-header bg-info">
        <i class="fas fa-store"></i>
        Data Toko
    </div>
    <div class="row bg-light">
        <div class="card-body col m-2">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td colspan="2" class="text-center">
                            <img src="../penjual/images/profile/<?php echo $toko['gambar_penjual']; ?>" class="rounded-circle img-responsive" width="80" alt="Foto Profil">
                            <h5 class="mt-2"><?php echo $toko['nama_toko']; ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Pemilik</th>
                        <td><?php echo $toko['nama_penjual']; ?></td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td><?php echo $toko['no_hp']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $toko['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $toko['alamat_penjual']; ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi Toko</th>
                        <td><textarea class="form-control" id="comment" rows="3" readonly><?php echo $toko['deskrip_toko']; ?></textarea></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


            <!-- Ulasan -->
            <div class="card mb-4">
                <div class="card-header bg-warning">
                    <i class="fas fa-comments"></i>
                    Ulasan Pengunjung
                </div>
                <div class="card-body">
                    <!-- Tampilkan daftar ulasan di sini -->
                    <div class="comments-container">
                        <?php foreach ($hasilkoment as $key => $values): ?>
                            <div class="comment">
                                <div class="comment-author"><strong><?php echo $values['nama_pembeli']; ?></strong></div>
                                <?php 
                                if (!empty($values['komentar'])) {
                                    echo '<div class="comment-content">' . $values['komentar'] . '</div>';
                                } else {
                                    echo '<div class="comment-content">tidak ada komentar</div>';
                                }
                                ?>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <!-- Formulir tambah komentar -->
                    <form id="commentForm" method="post">
                        <div class="form-group">
                            <label for="comment">Tambah Komentar:</label>
                            <textarea class="form-control" id="comment" rows="3" required name="koment" required></textarea>
                        </div>
                        <button type="submit" name="kirim" class="btn btn-primary">Kirim Komentar</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php
    if(isset($_POST['kirim'])){
        $koment = $_POST['koment'];


        $koneksi->query("INSERT INTO ulasan (id_penjual,id_pembeli,komentar)
        VALUES ('$id_penjual','$id_pembeli','$koment')");

    }
?>