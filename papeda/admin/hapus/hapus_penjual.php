<?php 
    //tangkap id kategori dari url
    $id_penjual = $_GET['id_penjual'];

    // menngambil data dari database
    $ambil = $koneksi->query("SELECT * FROM penjual WHERE id_penjual ='$id_penjual'");
    $foto = $ambil->fetch_assoc();

    $nama_foto = $foto['gambar_penjual'];

    unlink("../penjual/images/profile/" . $nama_foto);

    $koneksi->query("DELETE FROM penjual WHERE id_penjual = '$id_penjual'");

    echo "<script>alert('Data Penjual Berhasil dihapus');</script>";
    echo "<script>location='index.php?penjual';</script>";
?>