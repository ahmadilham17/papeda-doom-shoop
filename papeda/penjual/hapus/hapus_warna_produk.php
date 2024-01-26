<?php 
    //tangkap id produk dan warna dari url
    $id_produk = $_GET['id_produk'];
    $id_warna = $_GET['id_warna'];

    // menghapus data
    $koneksi->query("DELETE FROM warna WHERE id_warna ='$id_warna'");

    echo "<script>alert('Data Warna Berhasil dihapus');</script>";
    echo "<script>location='index.php?detail_produk&id_produk=$id_produk';</script>";
?>