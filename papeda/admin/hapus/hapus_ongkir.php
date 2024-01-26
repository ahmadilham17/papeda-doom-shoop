<?php 
    $id_ongkir= $_GET['id_ongkir'];

    // menghapus data
    $koneksi->query("DELETE FROM ongkir WHERE id_ongkir='$id_ongkir'");

    echo "<script>alert('Data ongkir Berhasil dihapus');</script>";
    echo "<script>location='index.php?ongkir';</script>";
?>