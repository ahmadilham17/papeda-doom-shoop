<?php 
    //tangkap id kategori dari url
    $id_banner_utama = $_GET['id_banner_utama'];

    // menngambil data dari database
    $ambil = $koneksi->query("SELECT * FROM baner_utama WHERE id_banner_utama ='$id_banner_utama'");
    $foto = $ambil->fetch_assoc();

    $nama_foto = $foto['gambar_banner_utama'];

    unlink("images/banner/" . $nama_foto);

    $koneksi->query("DELETE FROM baner_utama WHERE id_banner_utama = '$id_banner_utama'");

    echo "<script>alert('Data Banner Berhasil dihapus');</script>";
    echo "<script>location='index.php?banner_utama';</script>";
?>