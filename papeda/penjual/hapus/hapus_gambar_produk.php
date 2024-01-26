<?php 
    //tangkap id kategori dari url
    $id_produk = $_GET['id_produk'];
    $id_gambar = $_GET['id_gambar'];

    // menngambil data dari database
    $ambil = $koneksi->query("SELECT * FROM gambar WHERE id_gambar ='$id_gambar'");
    $foto = $ambil->fetch_assoc();

    $nama_foto = $foto['nama_gambar'];

    unlink("images/produk/" . $nama_foto);

    $koneksi->query("DELETE FROM gambar WHERE id_gambar = '$id_gambar'");

    echo "<script>alert('Data gambar Berhasil dihapus');</script>";
    echo "<script>location='index.php?detail_produk&id_produk=$id_produk';</script>";
?>