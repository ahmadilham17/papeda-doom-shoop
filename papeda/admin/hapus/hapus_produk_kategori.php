<?php 
    //tangkap id kategori dari url
    $id_kategori_produk = $_GET['id_kategori_produk'];

    // menngambil data dari database
    $result = $koneksi->query("DELETE FROM produk_kategori WHERE id_produk_kategori ='$id_kategori_produk'");

    if ($result) {
        echo "<script>alert('Data Kategori produk Berhasil Dihapus');</script>";
        echo "<script>location='index.php?kategori_produk';</script>";
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $result . '<br>' . $conn->error . '</div>';
    }
?>