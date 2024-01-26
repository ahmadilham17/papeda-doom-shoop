<?php 
    //tangkap id kategori dari url
    $id_kategori = $_GET['id_kategori'];

    // menngambil data dari database
    $result = $koneksi->query("DELETE FROM kategori WHERE id_kategori ='$id_kategori'");

    if ($result) {
        echo "<script>alert('Data Kategori Berhasil Dihapus');</script>";
        echo "<script>location='index.php?kategori';</script>";
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $result . '<br>' . $conn->error . '</div>';
    }
?>