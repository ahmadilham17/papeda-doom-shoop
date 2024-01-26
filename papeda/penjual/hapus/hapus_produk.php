<?php 
    //tangkap id produk dari url
    $id_produk = $_GET['id_produk'];

    // menngambil data dari database
    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk'");
    $pecah = $ambil->fetch_assoc();

    //hapus gambar pada tabel produk
    $hapus = $pecah['gambar_produk'];

    if(file_exists("images/produk/" .$hapus)){

    unlink("images/produk/" . $hapus);
    }
    //hapus produk di produk_penjual
    $koneksi->query("DELETE FROM produk_penjual WHERE id_produk = '$id_produk'");
    
    //hapus produk si tabel produk
    $koneksi->query("DELETE FROM produk WHERE id_produk = '$id_produk'");

    
    //mengambil data gambar
    $data_gambar = array();
    $ambil = $koneksi->query("SELECT * FROM gambar WHERE id_produk ='$id_produk'");
    while($pecah = $ambil->fetch_assoc()){
        $data_gambar[] = $pecah;
    }

    //hapus gambar pada tabel gambar
    foreach($data_gambar as $key => $values){
        $hapusfoto = $values['nama_gambar'];

        if(file_exists("images/produk/" .$hapusfoto)){

            unlink("images/produk/" . $hapusfoto);
            }
        
            $koneksi->query("DELETE FROM gambar WHERE id_produk = '$id_produk'");
    }

    //mengambil data warna
    $data_warna = array();
    $ambil = $koneksi->query("SELECT * FROM warna WHERE id_produk ='$id_produk'");
    while($pecah = $ambil->fetch_assoc()){
        $data_warna[] = $pecah;
    }

    //hapus warna pada tabel warna
    foreach($data_warna as $key => $values){
            $koneksi->query("DELETE FROM warna WHERE id_produk = '$id_produk'");
    }


    //mengambil data ukuran
    $data_ukuran = array();
    $ambil = $koneksi->query("SELECT * FROM ukuran WHERE id_produk ='$id_produk'");
    while($pecah = $ambil->fetch_assoc()){
        $data_ukuran[] = $pecah;
    }

    //hapus ukuran pada tabel ukuran
    foreach($data_ukuran as $key => $values){
            $koneksi->query("DELETE FROM ukuran WHERE id_produk = '$id_produk'");
    }

    //hapus produk di produk_penjual
    $koneksi->query("DELETE FROM produk_penjual WHERE id_produk = '$id_produk'");

    //notifikasi
    echo "<script>alert('Data produk Berhasil dihapus');</script>";
    echo "<script>location='index.php?produk';</script>";
?>