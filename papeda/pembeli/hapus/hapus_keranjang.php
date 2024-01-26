<?php
    include '../config/koneksi.php';
    $id_keranjang = $_GET['id_keranjang'];

    $koneksi->query("DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");

    echo "<script>alert('Data  Berhasil dihapus');</script>";
    echo "<script>location='index.php?keranjang';</script>";
    

?>