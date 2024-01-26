<?php 
    //tangkap id kategori dari url
    $id_pesanan = $_GET['id_pesanan'];

    $koneksi->query("DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'");

    echo "<script>alert('Data pesanan Berhasil dihapus');</script>";
    echo "<script>location='index.php?pembelian';</script>";
?>