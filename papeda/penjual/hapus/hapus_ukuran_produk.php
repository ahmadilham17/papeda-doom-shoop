<?php 
    //tangkap id produk dan warna dari url
    $id_produk = $_GET['id_produk'];
    $id_ukuran = $_GET['id_ukuran'];

    // menghapus data
    $koneksi->query("DELETE FROM ukuran WHERE id_ukuran ='$id_ukuran'");

    echo "<script>alert('Data ukuran Berhasil dihapus');</script>";
    echo "<script>location='index.php?detail_produk&id_produk=$id_produk';</script>";
?>