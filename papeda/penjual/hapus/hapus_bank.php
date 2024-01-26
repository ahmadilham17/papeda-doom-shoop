<?php 
    //tangkap id kategori dari url
    $id_bank = $_GET['id_bank'];

    // menngambil data dari database
    $result = $koneksi->query("DELETE FROM bank_penjual WHERE id_bank ='$id_bank'");

    if ($result) {
        echo "<script>alert('Data bank Berhasil Dihapus');</script>";
        echo "<script>location='index.php?rekening';</script>";
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $result . '<br>' . $conn->error . '</div>';
    }
?>