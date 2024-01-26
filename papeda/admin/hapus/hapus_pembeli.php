<?php 
    //tangkap id kategori dari url
    $id_pembeli = $_GET['id_pembeli'];

    // menngambil data dari database
    $ambil = $koneksi->query("SELECT * FROM pembeli WHERE id_pembeli ='$id_pembeli'");
    $foto = $ambil->fetch_assoc();

    $nama_foto = $foto['gambar_pembeli'];

    unlink("../pembeli/images/profile/" . $nama_foto);

    $koneksi->query("DELETE FROM pembeli WHERE id_pembeli = '$id_pembeli'");

    echo "<script>alert('Data pembeli Berhasil dihapus');</script>";
    echo "<script>location='index.php?pembeli';</script>";
?>